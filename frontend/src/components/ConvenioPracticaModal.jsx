import React, { useState, useEffect } from 'react';
import Draggable from 'react-draggable';
import { FaTimes, FaSave, FaFlask, FaPlus } from 'react-icons/fa';
import { getPracticaById, updatePractica, getMetodos, getUnidades, getReferencias } from '../services/api';
import ReferenciaModal from './ReferenciaModal';

const ConvenioPracticaModal = ({ codPractica, nroOs, practicaNombre, visible, onClose, onSave }) => {
  const [loading, setLoading] = useState(false);
  const [metodos, setMetodos] = useState([]);
  const [unidades, setUnidades] = useState([]);
  const [referencias, setReferencias] = useState([]);
  const [showReferenciaModal, setShowReferenciaModal] = useState(false);
  const [form, setForm] = useState({
    practica: '',
    metodo: '',
    unidad: '',
    clase: '1',
    tipo_det: 'Libre',
    deriva: 0,
    lab_derivacion: 0,
    decimal: 0,
    honorarios: '',
    valor: '',
    categoria: 1
  });

  useEffect(() => {
    if (visible && codPractica && nroOs) {
      fetchPractica();
      fetchOptions();
      fetchReferencias();
    }
  }, [visible, codPractica, nroOs]);

  const fetchPractica = async () => {
    setLoading(true);
    try {
      const data = await getPracticaById(codPractica, nroOs);
      if (data) {
        setForm({
          practica: data.practica || '',
          metodo: data.metodo || '',
          unidad: data.unidad || '',
          clase: data.clase !== undefined ? String(data.clase) : '1',
          tipo_det: data.tipo_det || 'Libre',
          deriva: data.deriva || 0,
          lab_derivacion: data.lab_derivacion || 0,
          decimal: data.decimal || 0,
          honorarios: data.honorarios || '',
          valor: data.valor || '',
          categoria: data.categoria || 1
        });
      }
    } catch (error) {
      console.error('Error fetching practica:', error);
    } finally {
      setLoading(false);
    }
  };

  const fetchOptions = async () => {
    try {
      const [metodosData, unidadesData] = await Promise.all([getMetodos(), getUnidades()]);
      setMetodos(metodosData || []);
      setUnidades(unidadesData || []);
    } catch (error) {
      console.error('Error fetching options:', error);
    }
  };

  const fetchReferencias = async () => {
    try {
      const data = await getReferencias(codPractica);
      setReferencias(Array.isArray(data) ? data : []);
    } catch (error) {
      console.error('Error fetching referencias:', error);
    }
  };

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setForm(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? (checked ? 1 : 0) : value
    }));
  };

  const handleSave = async () => {
    try {
      await updatePractica(codPractica, nroOs, form);
      if (onSave) onSave();
      onClose();
    } catch (error) {
      console.error('Error saving practica:', error);
      alert('Error al guardar');
    }
  };

  if (!visible) return null;

  return (
    <div className="draggable-modal-overlay">
      <Draggable handle=".modal-header-handle">
        <div className="custom-draggable-modal bg-white shadow-lg rounded-3 border" style={{ width: '800px', maxWidth: '95vw' }}>
          <div className="modal-header-handle p-3 border-bottom bg-light d-flex justify-content-between align-items-center cursor-move">
            <div className="d-flex align-items-center gap-2 text-primary">
              <FaFlask />
              <h5 className="mb-0 fw-bold small">Editar Práctica - {codPractica}</h5>
            </div>
            <button className="btn btn-sm btn-link text-danger p-0" onClick={onClose}>
              <FaTimes size={20} />
            </button>
          </div>

          <div className="modal-body-custom p-4" style={{ maxHeight: '75vh', overflowY: 'auto' }}>
            {loading ? (
              <div className="text-center py-5">
                <div className="spinner-border text-primary"></div>
              </div>
            ) : (
              <>
                <div className="bg-light p-3 rounded-3 mb-3">
                  <div className="d-flex align-items-center gap-3">
                    <span className="badge bg-primary px-3 py-2">Código: {codPractica}</span>
                    <span className="badge bg-secondary px-3 py-2">OS: {nroOs}</span>
                  </div>
                </div>

                <div className="row g-3">
                  <div className="col-12">
                    <label className="form-label small fw-bold text-muted">Nombre de Práctica</label>
                    <input type="text" name="practica" className="form-control" value={form.practica} onChange={handleChange} />
                  </div>
                  
                  <div className="col-md-6">
                    <label className="form-label small fw-bold text-muted">Método</label>
                    <input 
                      type="text" 
                      name="metodo" 
                      className="form-control" 
                      value={form.metodo} 
                      onChange={handleChange} 
                      list="metodos-list"
                      autoComplete="off"
                    />
                    <datalist id="metodos-list">
                      {metodos.map((m, i) => <option key={i} value={m} />)}
                    </datalist>
                  </div>
                  
                  <div className="col-md-6">
                    <label className="form-label small fw-bold text-muted">Unidad</label>
                    <input 
                      type="text" 
                      name="unidad" 
                      className="form-control" 
                      value={form.unidad} 
                      onChange={handleChange} 
                      list="unidades-list"
                      autoComplete="off"
                    />
                    <datalist id="unidades-list">
                      {unidades.map((u, i) => <option key={i} value={u} />)}
                    </datalist>
                  </div>

                  <div className="col-md-4">
                    <label className="form-label small fw-bold text-muted">Clase</label>
                    <select name="clase" className="form-select" value={form.clase} onChange={handleChange}>
                      <option value="0">0. Simple</option>
                      <option value="1">1. Compleja</option>
                      <option value="2">2. Módulo</option>
                      <option value="3">3. Texto</option>
                      <option value="4">4. Compuesto</option>
                    </select>
                  </div>

                  <div className="col-md-4">
                    <label className="form-label small fw-bold text-muted">Tipo Detalle</label>
                    <select name="tipo_det" className="form-select" value={form.tipo_det} onChange={handleChange}>
                      <option value="Libre">Libre</option>
                      <option value="Sin Valor Ref.">Sin Valor Ref.</option>
                      <option value="Sexo+Libre">Sexo + Libre</option>
                      <option value="Des-Has+Sexo">Desde-Hasta + Sexo</option>
                      <option value="Des-Has+años">Desde-Hasta + Años</option>
                      <option value="Hasta+Sexo">Hasta + Sexo</option>
                    </select>
                  </div>

                  <div className="col-md-4">
                    <label className="form-label small fw-bold text-muted">Categoría</label>
                    <select name="categoria" className="form-select" value={form.categoria} onChange={handleChange}>
                      <option value="1">1. Comunes</option>
                      <option value="2">2. Especiales (NN)</option>
                      <option value="3">3. Alta Complejidad</option>
                    </select>
                  </div>

                  <div className="col-md-4">
                    <label className="form-label small fw-bold text-muted">Honorarios</label>
                    <input type="text" name="honorarios" className="form-control" value={form.honorarios} onChange={handleChange} />
                  </div>

                  <div className="col-md-4">
                    <label className="form-label small fw-bold text-muted">Valor</label>
                    <input type="text" name="valor" className="form-control" value={form.valor} onChange={handleChange} />
                  </div>

                  <div className="col-md-4">
                    <label className="form-label small fw-bold text-muted">Decimal</label>
                    <select name="decimal" className="form-select" value={form.decimal} onChange={handleChange}>
                      <option value="0">Decimal (147.50)</option>
                      <option value="1">Entero (147)</option>
                    </select>
                  </div>

                  <div className="col-md-6">
                    <label className="form-label small fw-bold text-muted">
                      <input type="checkbox" name="deriva" checked={form.deriva === 1} onChange={handleChange} className="me-2" />
                      Derivación
                    </label>
                  </div>
                </div>

                <hr className="my-4" />

                <div className="d-flex justify-content-between align-items-center mb-3">
                  <h6 className="fw-bold text-muted mb-0">
                    <FaFlask className="me-2" />Valores de Referencia
                  </h6>
                  <button className="btn btn-sm btn-success" onClick={() => setShowReferenciaModal(true)}>
                    <FaPlus size={12} /> Nuevo
                  </button>
                </div>

                <table className="table table-sm table-hover table-bordered">
                  <thead className="table-light">
                    <tr>
                      <th>N°</th>
                      <th>Tipo</th>
                      <th>Título 1</th>
                      <th>Desde</th>
                      <th>Hasta</th>
                      <th>Título 2</th>
                      <th>Años</th>
                    </tr>
                  </thead>
                  <tbody>
                    {referencias.length === 0 && (
                      <tr><td colSpan="7" className="text-center text-muted">Sin referencias</td></tr>
                    )}
                    {referencias.map((ref, idx) => (
                      <tr key={idx}>
                        <td>{ref.nro_ref}</td>
                        <td>{ref.tipo || '-'}</td>
                        <td>{ref.columna1 || '-'}</td>
                        <td>{ref.desde}</td>
                        <td>{ref.hasta}</td>
                        <td>{ref.columna2 || '-'}</td>
                        <td>{ref.anio_d} - {ref.anio_h}</td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              </>
            )}
          </div>

          <div className="p-3 border-top bg-light text-end">
            <button className="btn btn-secondary me-2" onClick={onClose}>Cancelar</button>
            <button className="btn btn-primary px-4" onClick={handleSave}>
              <FaSave className="me-2" />Guardar
            </button>
          </div>
        </div>
      </Draggable>

      {showReferenciaModal && (
        <ReferenciaModal
          codPractica={codPractica}
          practicaNombre={form.practica}
          visible={showReferenciaModal}
          isNew={true}
          onClose={() => { setShowReferenciaModal(false); fetchReferencias(); }}
          onSave={() => { fetchReferencias(); if (onSave) onSave(); }}
        />
      )}
    </div>
  );
};

export default ConvenioPracticaModal;
