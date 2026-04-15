import React, { useState, useEffect } from 'react';
import Draggable from 'react-draggable';
import { FaTimes, FaSave } from 'react-icons/fa';
import { createPractica, getMetodos, getUnidades, getLastCodPractica } from '../services/api';

const NuevaPracticaModal = ({ visible, onClose, onSave }) => {
  const [loading, setLoading] = useState(false);
  const [metodos, setMetodos] = useState([]);
  const [unidades, setUnidades] = useState([]);
  const [form, setForm] = useState({
    cod_practica: '',
    practica: '',
    metodo: '',
    unidad: '',
    clase: '1',
    tipo_det: 'Libre',
    deriva: 0,
    lab_derivacion: 0,
    decimal: 0,
    honorarios: '0.00',
    valor: '0.00',
    categoria: 1
  });

  useEffect(() => {
    if (visible) {
      fetchOptions();
      fetchLastCod();
    }
  }, [visible]);

  const fetchLastCod = async () => {
    try {
      const data = await getLastCodPractica();
      setForm(prev => ({ ...prev, cod_practica: String((data.lastCod || 0) + 1) }));
    } catch (error) {
      console.error('Error fetching last cod:', error);
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

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setForm(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? (checked ? 1 : 0) : value
    }));
  };

  const handleSave = async () => {
    if (!form.cod_practica || !form.practica) {
      alert('Código y Nombre son obligatorios');
      return;
    }
    setLoading(true);
    try {
      await createPractica(form);
      if (onSave) onSave();
      onClose();
    } catch (error) {
      console.error('Error creating practica:', error);
      alert('Error al crear práctica');
    } finally {
      setLoading(false);
    }
  };

  if (!visible) return null;

  return (
    <div className="draggable-modal-overlay">
      <Draggable handle=".modal-header-handle">
        <div className="custom-draggable-modal bg-white shadow-lg rounded-3 border" style={{ width: '600px', maxWidth: '95vw' }}>
          <div className="modal-header-handle p-3 border-bottom bg-light d-flex justify-content-between align-items-center cursor-move">
            <div className="d-flex align-items-center gap-2 text-primary">
              <h5 className="mb-0 fw-bold small">Nueva Práctica</h5>
            </div>
            <button className="btn btn-sm btn-link text-danger p-0" onClick={onClose}>
              <FaTimes size={20} />
            </button>
          </div>

          <div className="modal-body-custom p-4" style={{ maxHeight: '70vh', overflowY: 'auto' }}>
            <div className="row g-3">
              <div className="col-md-4">
                <label className="form-label small fw-bold text-muted">Código *</label>
                <input type="number" name="cod_practica" className="form-control" value={form.cod_practica} onChange={handleChange} />
              </div>
              <div className="col-md-4">
                <label className="form-label small fw-bold text-muted">Categoría</label>
                <select name="categoria" className="form-select" value={form.categoria} onChange={handleChange}>
                  <option value="1">1. Comunes</option>
                  <option value="2">2. Especiales (NN)</option>
                  <option value="3">3. Alta Complejidad</option>
                </select>
              </div>
              <div className="col-12">
                <label className="form-label small fw-bold text-muted">Nombre de Práctica *</label>
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
                  list="metodos-new"
                  autoComplete="off"
                />
                <datalist id="metodos-new">
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
                  list="unidades-new"
                  autoComplete="off"
                />
                <datalist id="unidades-new">
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
                <label className="form-label small fw-bold text-muted">Decimal</label>
                <select name="decimal" className="form-select" value={form.decimal} onChange={handleChange}>
                  <option value="0">Decimal (147.50)</option>
                  <option value="1">Entero (147)</option>
                </select>
              </div>
              <div className="col-md-6">
                <label className="form-label small fw-bold text-muted">Honorarios</label>
                <input type="text" name="honorarios" className="form-control" value={form.honorarios} onChange={handleChange} />
              </div>
              <div className="col-md-6">
                <label className="form-label small fw-bold text-muted">Valor</label>
                <input type="text" name="valor" className="form-control" value={form.valor} onChange={handleChange} />
              </div>
            </div>
          </div>

          <div className="p-3 border-top bg-light text-end">
            <button className="btn btn-secondary me-2" onClick={onClose}>Cancelar</button>
            <button className="btn btn-primary px-4" onClick={handleSave} disabled={loading}>
              {loading ? 'Guardando...' : <><FaSave className="me-2" />Guardar</>}
            </button>
          </div>
        </div>
      </Draggable>
    </div>
  );
};

export default NuevaPracticaModal;
