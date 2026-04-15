import React, { useState, useEffect, useCallback } from 'react';
import Draggable from 'react-draggable';
import { FaTimes, FaSave, FaTrash, FaPlus } from 'react-icons/fa';
import { getReferencias, saveReferencia, deleteReferencia } from '../services/api';

const ReferenciaModal = ({ codPractica, practicaNombre, visible, isNew, onClose, onSave }) => {
  const [loading, setLoading] = useState(false);
  const [referencias, setReferencias] = useState([]);
  const [form, setForm] = useState({
    cod_operacion: null,
    tipo: '',
    columna1: '',
    desde: '',
    hasta: '',
    columna2: '',
    anio_d: '',
    anio_h: '',
    nro_ref: '0'
  });

  const fetchReferencias = useCallback(async () => {
    setLoading(true);
    try {
      const data = await getReferencias(codPractica);
      let refs = data;
      if (data && !Array.isArray(data)) {
        refs = [data];
      }
      setReferencias(refs || []);
      if (!isNew && refs && refs.length > 0 && refs[0] && refs[0].nro_ref !== undefined) {
        const ref = refs[0];
        setForm(prev => ({
          ...prev,
          cod_operacion: ref.cod_operacion || null,
          tipo: ref.tipo || '',
          columna1: ref.columna1 || '',
          desde: ref.desde || '',
          hasta: ref.hasta || '',
          columna2: ref.columna2 || '',
          anio_d: ref.anio_d || '',
          anio_h: ref.anio_h || '',
          nro_ref: ref.nro_ref || '0'
        }));
      }
    } catch (error) {
      console.error('Error fetching referencias:', error);
    } finally {
      setLoading(false);
    }
  }, [codPractica]);

  useEffect(() => {
    if (visible && codPractica) {
      fetchReferencias();
      if (isNew) {
        setForm({
          cod_operacion: null,
          tipo: '',
          columna1: '',
          desde: '',
          hasta: '',
          columna2: '',
          anio_d: '',
          anio_h: '',
          nro_ref: '0'
        });
      }
    }
  }, [visible, codPractica, isNew, fetchReferencias]);

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm(prev => ({ ...prev, [name]: value }));
  };

  const handleSave = async () => {
    try {
      await saveReferencia(codPractica, form);
      if (onSave) onSave();
      fetchReferencias();
    } catch (error) {
      console.error('Error saving referencia:', error);
      alert('Error al guardar');
    }
  };

  const handleDelete = async (cod_operacion) => {
    if (!window.confirm('¿Está seguro de eliminar esta referencia?')) return;
    try {
      await deleteReferencia(codPractica, cod_operacion);
      if (onSave) onSave();
      fetchReferencias();
    } catch (error) {
      console.error('Error deleting referencia:', error);
      alert('Error al eliminar');
    }
  };

  const handleNew = () => {
    setForm({
      cod_operacion: null,
      tipo: '',
      columna1: '',
      desde: '',
      hasta: '',
      columna2: '',
      anio_d: '',
      anio_h: '',
      nro_ref: '1'
    });
  };

  if (!visible) return null;

  return (
    <div className="draggable-modal-overlay" style={{ zIndex: 1060 }}>
      <Draggable handle=".modal-header-handle">
        <div className="custom-draggable-modal bg-white shadow-lg rounded-3 border" style={{ width: '650px', maxWidth: '90vw', marginTop: '-100px' }}>
          <div className="modal-header-handle p-3 border-bottom bg-light d-flex justify-content-between align-items-center cursor-move">
            <div className="d-flex align-items-center gap-2 text-primary">
              <h5 className="mb-0 fw-bold small">Valores de Referencia</h5>
              <button className="btn btn-sm btn-success px-2 py-0" onClick={handleNew} title="Nueva Referencia">
                <FaPlus size={12} /> Nuevo
              </button>
            </div>
            <button className="btn btn-sm btn-link text-danger p-0" onClick={onClose}>
              <FaTimes size={20} />
            </button>
          </div>

          <div className="modal-body-custom p-4" style={{ maxHeight: '75vh', overflowY: 'auto' }}>
            <div className="bg-light p-3 rounded-3 mb-3">
              <div className="d-flex align-items-center gap-3">
                <span className="badge bg-primary px-3 py-2">{codPractica}</span>
                <span className="fw-bold text-dark">{practicaNombre}</span>
              </div>
            </div>

            <div className="row g-3">
              <div className="col-md-6">
                <label className="form-label small fw-bold text-muted">Tipo</label>
                <select name="tipo" className="form-select" value={form.tipo} onChange={handleChange}>
                  <option value="">Seleccionar...</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </div>
              <div className="col-md-6">
                <label className="form-label small fw-bold text-muted">N° Ref</label>
                <select name="nro_ref" className="form-select" value={form.nro_ref} onChange={handleChange}>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
              <div className="col-md-12">
                <label className="form-label small fw-bold text-muted">Título Columna 1</label>
                <input type="text" name="columna1" className="form-control" value={form.columna1} onChange={handleChange} placeholder="Ej: Niños" />
              </div>
              <div className="col-md-4">
                <label className="form-label small fw-bold text-muted">Desde</label>
                <input type="text" name="desde" className="form-control" value={form.desde} onChange={handleChange} />
              </div>
              <div className="col-md-4">
                <label className="form-label small fw-bold text-muted">Hasta</label>
                <input type="text" name="hasta" className="form-control" value={form.hasta} onChange={handleChange} />
              </div>
              <div className="col-md-4">
                <label className="form-label small fw-bold text-muted">Título Columna 2</label>
                <input type="text" name="columna2" className="form-control" value={form.columna2} onChange={handleChange} />
              </div>
              <div className="col-md-6">
                <label className="form-label small fw-bold text-muted">Años Desde</label>
                <input type="number" name="anio_d" className="form-control" value={form.anio_d} onChange={handleChange} />
              </div>
              <div className="col-md-6">
                <label className="form-label small fw-bold text-muted">Años Hasta</label>
                <input type="number" name="anio_h" className="form-control" value={form.anio_h} onChange={handleChange} />
              </div>
            </div>

            {loading && <div className="text-center py-3"><div className="spinner-border text-primary"></div></div>}

            <div className="mt-4">
              <h6 className="fw-bold text-muted mb-3">Referencias existentes</h6>
              <table className="table table-sm table-hover">
                <thead className="bg-light">
                  <tr>
                    <th>N°</th>
                    <th>Tipo</th>
                    <th>Título 1</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Título 2</th>
                    <th>Años</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  {!loading && referencias && referencias.length === 0 && (
                    <tr><td colSpan="8" className="text-center text-muted">Sin referencias</td></tr>
                  )}
                  {!loading && referencias && referencias.map((ref, idx) => (
                    <tr 
                      key={idx} 
                      onClick={() => {
                        setForm({
                          cod_operacion: ref.cod_operacion || null,
                          tipo: ref.tipo || '',
                          columna1: ref.columna1 || '',
                          desde: ref.desde || '',
                          hasta: ref.hasta || '',
                          columna2: ref.columna2 || '',
                          anio_d: ref.anio_d || '',
                          anio_h: ref.anio_h || '',
                          nro_ref: ref.nro_ref || '1'
                        });
                      }}
                      style={{ cursor: 'pointer' }}
                      className={form.nro_ref === String(ref.nro_ref) ? 'table-active' : ''}
                    >
                      <td>{ref.nro_ref}</td>
                      <td>{ref.tipo || '-'}</td>
                      <td>{ref.columna1 || '-'}</td>
                      <td>{ref.desde}</td>
                      <td>{ref.hasta}</td>
                      <td>{ref.columna2 || '-'}</td>
                      <td>{ref.anio_d} - {ref.anio_h}</td>
                      <td>
                        <button 
                          className="btn btn-sm btn-link text-danger p-0"
                          onClick={(e) => {
                            e.stopPropagation();
                            handleDelete(ref.cod_operacion);
                          }}
                          title="Eliminar"
                        >
                          <FaTrash size={14} />
                        </button>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>

          <div className="p-3 border-top bg-light text-end">
            <button className="btn btn-secondary me-2" onClick={onClose}>Cancelar</button>
            <button className="btn btn-primary px-4" onClick={handleSave}>
              <FaSave className="me-2" />Guardar
            </button>
          </div>
        </div>
      </Draggable>
    </div>
  );
};

export default ReferenciaModal;
