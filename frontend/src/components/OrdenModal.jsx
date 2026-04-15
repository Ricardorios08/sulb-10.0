import React, { useState, useEffect, useCallback, useRef } from 'react';
import Draggable from 'react-draggable';
import { FaPlus, FaTrash, FaSave, FaTimes, FaSync, FaSearch, FaClipboardList } from 'react-icons/fa';
import api from '../services/api';

const API_BASE = '';  // api instance already has baseURL configured

const OrdenModal = ({ nro_paciente, codGrabacion, pacienteNombre, onClose, onSaved }) => {
  const [orden, setOrden] = useState(null);
  const [loading, setLoading] = useState(true);
  const [saving, setSaving] = useState(false);
  const [isNew, setIsNew] = useState(false);

  // Form state
  const [fecha, setFecha] = useState(new Date().toISOString().slice(0, 10));
  const [fechaRealizacion, setFechaRealizacion] = useState(new Date().toISOString().slice(0, 10));
  const [nroOs, setNroOs] = useState('');
  const [nroAfiliado, setNroAfiliado] = useState('');
  const [nombreMedico, setNombreMedico] = useState('');
  const [medico, setMedico] = useState(''); // Matricula
  const [observaciones, setObservaciones] = useState('');

  // Doctor search state
  const [medicoResults, setMedicoResults] = useState([]);
  const [searchingMedico, setSearchingMedico] = useState(false);
  const [showMedicoDropdown, setShowMedicoDropdown] = useState(false);
  const searchMedicoTimeout = useRef(null);

  // OS text display
  const [osQuery, setOsQuery] = useState('');

  // Practice search
  const [practicaQuery, setPracticaQuery] = useState('');
  const [practicaResults, setPracticaResults] = useState([]);
  const [searchingPractica, setSearchingPractica] = useState(false);
  const searchTimeout = useRef(null);

  // Node ref for draggable to avoid findDOMNode warning
  const nodeRef = useRef(null);
  // Ref for the practice search input
  const practicaInputRef = useRef(null);

  const fetchOrden = useCallback(async () => {
    if (!codGrabacion) {
      setIsNew(true);
      try {
        const pRes = await api.get(`/pacientes/${nro_paciente}`);
        const pData = pRes.data;
        const osId = pData.nro_os || '';
        const osName = pData.ObraSocial?.sigla || '';

        setNroOs(osId);
        setOsQuery(osId ? `${osId} - ${osName}` : '—');
        setNroAfiliado(pData.nro_afiliado || pData.afiliado || '');
      } catch (err) {
        console.error('Error fetching patient data for new order:', err);
      }
      setLoading(false);
      return;
    }
    setLoading(true);
    try {
      const response = await api.get(`/ordenes/${codGrabacion}`);
      const data = response.data;
      setOrden(data);
      setFecha(data.fecha || '');
      setFechaRealizacion(data.fecha_realizacion || data.fecha || '');
      setNroOs(data.nro_os || '');
      setOsQuery(data.nro_os ? `${data.nro_os} - ${data.ObraSocial?.denominacion || ''}` : '—');
      setNroAfiliado(data.nro_afiliado || '');
      setNombreMedico(data.nombre_medico || '');
      setMedico(data.medico || '');
      setObservaciones(data.observaciones || '');
    } catch (error) {
      console.error('Error fetching orden:', error);
      setIsNew(true);
    } finally {
      setLoading(false);
    }
  }, [codGrabacion]);

  useEffect(() => {
    fetchOrden();
  }, [fetchOrden]);

  // Doctor search with debounce
  useEffect(() => {
    if (nombreMedico.length < 2) {
      setMedicoResults([]);
      setShowMedicoDropdown(false);
      return;
    }
    // Only search if we are typing, not if we just selected one
    if (searchMedicoTimeout.current) clearTimeout(searchMedicoTimeout.current);
    searchMedicoTimeout.current = setTimeout(async () => {
      setSearchingMedico(true);
      try {
        const res = await api.get(`/ordenes/search/medicos`, {
          params: { q: nombreMedico }
        });
        setMedicoResults(res.data);
        if (res.data.length > 0) setShowMedicoDropdown(true);
      } catch (e) {
        console.error(e);
      } finally {
        setSearchingMedico(false);
      }
    }, 400);
  }, [nombreMedico]);

  const handleSelectMedico = (doc) => {
    setNombreMedico(doc.nombre_medico);
    setMedico(doc.medico);
    setShowMedicoDropdown(false);
    // Focus out to hide dropdown naturally
  };


  // Practice search with debounce
  useEffect(() => {
    if (practicaQuery.length < 2) {
      setPracticaResults([]);
      return;
    }
    if (searchTimeout.current) clearTimeout(searchTimeout.current);
    searchTimeout.current = setTimeout(async () => {
      setSearchingPractica(true);
      try {
        const res = await api.get(`/ordenes/search/practicas`, {
          params: { q: practicaQuery }
        });
        setPracticaResults(res.data);
      } catch (e) {
        console.error(e);
      } finally {
        setSearchingPractica(false);
      }
    }, 400);
  }, [practicaQuery, nroOs]);

  const handleSaveHeader = async () => {
    setSaving(true);
    try {
      if (isNew) {
        const res = await api.post(`/ordenes`, {
          nro_paciente,
          nro_os: nroOs,
          fecha,
          fecha_realizacion: fechaRealizacion,
          nro_afiliado: nroAfiliado,
          nombre_medico: nombreMedico,
          medico,
          observaciones
        });
        setOrden(res.data);
        setIsNew(false);
        if (onSaved) onSaved(res.data);
        setTimeout(() => practicaInputRef.current?.focus(), 100);
      } else {
        const res = await api.put(`/ordenes/${orden.cod_grabacion}`, {
          fecha,
          fecha_realizacion: fechaRealizacion,
          nro_os: nroOs,
          nro_afiliado: nroAfiliado,
          nombre_medico: nombreMedico,
          medico,
          observaciones
        });
        setOrden(prev => ({ ...prev, ...res.data }));
        if (onSaved) onSaved(res.data);
        setTimeout(() => practicaInputRef.current?.focus(), 100);
      }
    } catch (error) {
      alert('Error al guardar: ' + (error.response?.data?.message || error.message));
    } finally {
      setSaving(false);
    }
  };

  const handleAddPractica = async (practica) => {
    if (!orden) {
      alert('Primero guarde el encabezado de la orden.');
      return;
    }
    try {
      const res = await api.post(`/ordenes/${orden.cod_grabacion}/practica`, {
        nro_practica: practica.cod_practica,
        valor: practica.valor
      });
      setOrden(prev => ({
        ...prev,
        OrdenDetalles: [...(prev.OrdenDetalles || []), res.data]
      }));
      setPracticaQuery('');
      setPracticaResults([]);
      setTimeout(() => practicaInputRef.current?.focus(), 50);
    } catch (error) {
      alert('Error: ' + (error.response?.data?.message || error.message));
    }
  };

  const handleRemovePractica = async (detalle) => {
    if (!window.confirm(`¿Eliminar "${detalle.Practica?.practica || 'esta práctica'}" de la orden?`)) return;
    try {
      await api.delete(`/ordenes/${orden.cod_grabacion}/practica/${detalle.cod_operacion}`);
      setOrden(prev => ({
        ...prev,
        OrdenDetalles: prev.OrdenDetalles.filter(d => d.cod_operacion !== detalle.cod_operacion)
      }));
      setTimeout(() => practicaInputRef.current?.focus(), 50);
    } catch (error) {
      alert('Error: ' + (error.response?.data?.message || error.message));
    }
  };

  const handlePracticaKeyDown = async (e) => {
    if (e.key === 'Enter') {
      e.preventDefault();
      if (!practicaQuery.trim()) return;

      if (practicaResults.length > 0) {
        handleAddPractica(practicaResults[0]);
      } else {
        // Force immediate API call if they typed quickly and pressed Enter before debounce
        if (searchTimeout.current) clearTimeout(searchTimeout.current);
        setSearchingPractica(true);
        try {
          const res = await api.get(`/ordenes/search/practicas`, { params: { q: practicaQuery } });
          if (res.data.length > 0) {
            handleAddPractica(res.data[0]);
          } else {
            alert('Práctica no encontrada.');
          }
        } catch (err) {
          console.error(err);
        } finally {
          setSearchingPractica(false);
        }
      }
    }
  };

  return (
    <div className="draggable-modal-overlay" onClick={(e) => e.target === e.currentTarget && onClose()}>
      <Draggable nodeRef={nodeRef} handle=".modal-drag-handle">
        <div ref={nodeRef} className="custom-draggable-modal rounded-3 shadow-lg"
          style={{ width: '750px', maxWidth: '96vw', minHeight: '550px', maxHeight: '90vh', display: 'flex', flexDirection: 'column' }}>

          {/* Header */}
          <div className="modal-drag-handle cursor-move d-flex justify-content-between align-items-center px-4 py-3 rounded-top-3"
            style={{ background: 'linear-gradient(135deg, #1e40af 0%, #0ea5e9 100%)' }}>
            <div className="text-white">
              <FaClipboardList className="me-2" />
              <span className="fw-bold">
                {isNew ? 'Nueva Orden' : `Orden #${orden?.cod_grabacion}`}
              </span>
              <small className="ms-2 opacity-75">— {pacienteNombre}</small>
            </div>
            <div className="d-flex gap-2">
              <button className="btn btn-sm btn-light text-primary" title="Recargar" onClick={fetchOrden}>
                <FaSync />
              </button>
              <button className="btn btn-sm btn-light text-danger" onClick={onClose}>
                <FaTimes />
              </button>
            </div>
          </div>

          {/* Body */}
          <div className="overflow-auto p-3 bg-white flex-grow-1">
            {loading ? (
              <div className="text-center py-5 text-muted">Cargando...</div>
            ) : (
              <>
                {/* Order Header Form */}
                <div className="p-3 bg-light rounded border mb-3">
                  <h6 className="small fw-bold text-muted text-uppercase mb-3">Datos de la Orden</h6>
                  <div className="row g-2">
                    <div className="col-md-3">
                      <label className="form-label small mb-1 fw-bold">Fecha Análisis</label>
                      <input type="date" className="form-control form-control-sm"
                        value={fecha} onChange={e => setFecha(e.target.value)} />
                    </div>
                    <div className="col-md-3">
                      <label className="form-label small mb-1 fw-bold">Fecha Médico</label>
                      <input type="date" className="form-control form-control-sm"
                        value={fechaRealizacion} onChange={e => setFechaRealizacion(e.target.value)} />
                    </div>
                    <div className="col-md-3">
                      <label className="form-label small mb-1 fw-bold">Obra Social</label>
                      <input type="text" className="form-control form-control-sm bg-light"
                        value={osQuery}
                        readOnly
                        title="La Obra Social proviene del registro del paciente" />
                    </div>
                    <div className="col-md-3">
                      <label className="form-label small mb-1 fw-bold">N° Afiliado</label>
                      <input type="text" className="form-control form-control-sm bg-light"
                        value={nroAfiliado}
                        readOnly
                        title="El N° Afiliado proviene del registro del paciente" />
                    </div>

                    <div className="col-md-5">
                      <label className="form-label small mb-1 fw-bold">Médico</label>
                      <div className="position-relative">
                        <div className="input-group input-group-sm">
                          <input type="text" className="form-control"
                            value={nombreMedico}
                            onChange={e => {
                              setNombreMedico(e.target.value);
                              setShowMedicoDropdown(true);
                            }}
                            onFocus={() => { if (medicoResults.length > 0) setShowMedicoDropdown(true); }}
                            onBlur={() => setTimeout(() => setShowMedicoDropdown(false), 200)}
                            placeholder="Buscar o Nuevo Médico..." maxLength={25} />
                          {searchingMedico && <span className="input-group-text"><FaSync className="fa-spin" /></span>}
                        </div>
                        {showMedicoDropdown && medicoResults.length > 0 && (
                          <div className="position-absolute w-100 bg-white border rounded shadow-sm"
                            style={{ zIndex: 9999, top: '100%', maxHeight: '250px', overflowY: 'auto' }}>
                            {medicoResults.map((doc, idx) => (
                              <div key={idx}
                                className="px-3 py-2 d-flex justify-content-between border-bottom hover-bg-light cursor-pointer"
                                onMouseDown={(e) => { e.preventDefault(); handleSelectMedico(doc); }}>
                                <span>{doc.nombre_medico}</span>
                                <span className="small text-muted text-truncate ms-2" style={{ maxWidth: '80px' }}>
                                  Matr: {doc.medico}
                                </span>
                              </div>
                            ))}
                          </div>
                        )}
                      </div>
                    </div>
                    <div className="col-md-3">
                      <label className="form-label small mb-1 fw-bold">Matrícula</label>
                      <input type="text" className="form-control form-control-sm"
                        value={medico} onChange={e => setMedico(e.target.value)}
                        placeholder="Nueva o actual" maxLength={15} />
                    </div>

                    <div className="col-md-4">
                      <label className="form-label small mb-1 fw-bold">Observaciones</label>
                      <input type="text" className="form-control form-control-sm"
                        value={observaciones} onChange={e => setObservaciones(e.target.value)}
                        maxLength={120} />
                    </div>
                  </div>
                  <div className="d-flex justify-content-end mt-3">
                    <button className="btn btn-sm btn-primary d-flex align-items-center gap-2"
                      onClick={handleSaveHeader} disabled={saving}>
                      <FaSave />
                      {saving ? 'Guardando...' : isNew ? 'Crear Orden' : 'Guardar Cambios'}
                    </button>
                  </div>
                </div>

                {/* Practice Search & Add (only if order exists) */}
                {!isNew && (
                  <div className="mb-3">
                    <label className="form-label small fw-bold text-muted text-uppercase mb-1">Agregar Práctica</label>
                    <div className="position-relative">
                      <div className="input-group input-group-sm">
                        <span className="input-group-text"><FaSearch /></span>
                        <input type="text" className="form-control"
                          ref={practicaInputRef}
                          value={practicaQuery} onChange={e => setPracticaQuery(e.target.value)}
                          onKeyDown={handlePracticaKeyDown}
                          placeholder="Buscar por nombre o número (Ej: 475) y presione Enter..." />
                        {searchingPractica && (
                          <span className="input-group-text"><FaSync className="fa-spin" /></span>
                        )}
                      </div>
                      {practicaResults.length > 0 && (
                        <div className="position-absolute w-100 bg-white border rounded shadow-sm"
                          style={{ zIndex: 9999, top: '100%', maxHeight: '200px', overflowY: 'auto' }}>
                          {practicaResults.map(p => (
                            <div key={p.cod_practica}
                              className="px-3 py-2 d-flex justify-content-between align-items-center border-bottom hover-bg-light"
                              style={{ cursor: 'pointer' }}
                              onClick={() => handleAddPractica(p)}
                              role="button">
                              <div>
                                <span className="fw-bold">{p.cod_practica}</span>
                                <span className="ms-2 text-muted small">{p.nombre}</span>
                              </div>
                              <div className="d-flex align-items-center gap-2">
                                {p.valor > 0 && <span className="badge bg-success">${p.valor}</span>}
                                <FaPlus className="text-primary" />
                              </div>
                            </div>
                          ))}
                        </div>
                      )}
                    </div>
                  </div>
                )}

                {/* Practice List */}
                {!isNew && (
                  <div>
                    <label className="form-label small fw-bold text-muted text-uppercase mb-2">Prácticas en la Orden</label>
                    {!orden?.OrdenDetalles || orden.OrdenDetalles.length === 0 ? (
                      <div className="text-center text-muted py-3 border rounded bg-light small">
                        No hay prácticas en esta orden todavía.
                      </div>
                    ) : (
                      <div className="border rounded overflow-hidden">
                        <table className="table table-sm table-hover mb-0">
                          <thead className="table-dark">
                            <tr>
                              <th style={{ width: '60px' }}>#</th>
                              <th>Práctica</th>
                              <th style={{ width: '90px' }}>Valor</th>
                              <th style={{ width: '50px' }}></th>
                            </tr>
                          </thead>
                          <tbody>
                            {orden.OrdenDetalles.map(d => (
                              <tr key={d.cod_operacion}>
                                <td className="fw-bold text-muted">{d.nro_practica}</td>
                                <td>{d.Practica?.practica || '—'}</td>
                                <td className="text-success fw-bold">
                                  {d.valor > 0 ? `$${d.valor}` : '—'}
                                </td>
                                <td className="text-center">
                                  <button className="btn btn-sm btn-link text-danger p-0"
                                    title="Quitar práctica"
                                    onClick={() => handleRemovePractica(d)}>
                                    <FaTrash />
                                  </button>
                                </td>
                              </tr>
                            ))}
                          </tbody>
                        </table>
                      </div>
                    )}
                  </div>
                )}
              </>
            )}
          </div>
        </div>
      </Draggable>
    </div>
  );
};

export default OrdenModal;
