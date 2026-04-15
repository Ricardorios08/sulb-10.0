import React, { useState } from 'react';
import LoadingSpinner from './LoadingSpinner';
import { createObraSocial } from '../services/api';

const NuevaOSModal = ({ visible, onClose, onSave }) => {
  const [saving, setSaving] = useState(false);
  const [error, setError] = useState('');

  const [formData, setFormData] = useState({
    denominacion: '',
    sigla: '',
    domicilio_n: '',
    localidad_n: '',
    cod_area_n: '',
    telefono_n: '',
    email_n: '',
    nro_prestador: '',
    contacto: '',
    domi_facturacion: '',
    activa: 1
  });

  const handleChange = (field, value) => {
    setFormData(prev => ({ ...prev, [field]: value }));
    setError('');
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    
    if (!formData.denominacion.trim()) {
      setError('La denominación es obligatoria');
      return;
    }

    setSaving(true);
    try {
      await createObraSocial(formData);
      onSave();
      handleClose();
    } catch (err) {
      console.error('Error creating OS:', err);
      setError(err.response?.data?.message || 'Error al crear la obra social');
    } finally {
      setSaving(false);
    }
  };

  const handleClose = () => {
    setFormData({
      denominacion: '',
      sigla: '',
      domicilio_n: '',
      localidad_n: '',
      cod_area_n: '',
      telefono_n: '',
      email_n: '',
      nro_prestador: '',
      contacto: '',
      domi_facturacion: '',
      activa: 1
    });
    setError('');
    onClose();
  };

  if (!visible) return null;

  return (
    <div className="modal fade show d-block" tabIndex="-1" style={{ backgroundColor: 'rgba(0,0,0,0.5)' }}>
      <div className="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div className="modal-content">
          <div className="modal-header bg-success text-white">
            <h5 className="modal-title">Nueva Obra Social</h5>
            <button type="button" className="btn-close btn-close-white" onClick={handleClose}></button>
          </div>
          <form onSubmit={handleSubmit}>
            <div className="modal-body">
              {error && (
                <div className="alert alert-danger py-2" role="alert">
                  {error}
                </div>
              )}

              <div className="row g-3">
                <div className="col-md-6">
                  <label className="form-label fw-bold">Denominación <span className="text-danger">*</span></label>
                  <input
                    type="text"
                    className="form-control"
                    value={formData.denominacion}
                    onChange={(e) => handleChange('denominacion', e.target.value)}
                    maxLength={40}
                    required
                    autoFocus
                  />
                </div>
                <div className="col-md-3">
                  <label className="form-label fw-bold">Sigla</label>
                  <input
                    type="text"
                    className="form-control"
                    value={formData.sigla}
                    onChange={(e) => handleChange('sigla', e.target.value)}
                    maxLength={20}
                  />
                </div>
                <div className="col-md-3">
                  <label className="form-label fw-bold">Activa</label>
                  <select
                    className="form-select"
                    value={formData.activa}
                    onChange={(e) => handleChange('activa', parseInt(e.target.value))}
                  >
                    <option value={1}>Sí</option>
                    <option value={0}>No</option>
                  </select>
                </div>

                <div className="col-12">
                  <hr />
                  <h6 className="text-muted mb-3">Datos de Contacto</h6>
                </div>

                <div className="col-md-6">
                  <label className="form-label fw-bold">Domicilio</label>
                  <input
                    type="text"
                    className="form-control"
                    value={formData.domicilio_n}
                    onChange={(e) => handleChange('domicilio_n', e.target.value)}
                    maxLength={30}
                  />
                </div>
                <div className="col-md-4">
                  <label className="form-label fw-bold">Localidad</label>
                  <input
                    type="text"
                    className="form-control"
                    value={formData.localidad_n}
                    onChange={(e) => handleChange('localidad_n', e.target.value)}
                    maxLength={25}
                  />
                </div>
                <div className="col-md-2">
                  <label className="form-label fw-bold">Cód. Área</label>
                  <input
                    type="text"
                    className="form-control"
                    value={formData.cod_area_n}
                    onChange={(e) => handleChange('cod_area_n', e.target.value)}
                    maxLength={7}
                  />
                </div>

                <div className="col-md-4">
                  <label className="form-label fw-bold">Teléfono</label>
                  <input
                    type="text"
                    className="form-control"
                    value={formData.telefono_n}
                    onChange={(e) => handleChange('telefono_n', e.target.value)}
                  />
                </div>
                <div className="col-md-4">
                  <label className="form-label fw-bold">Email</label>
                  <input
                    type="email"
                    className="form-control"
                    value={formData.email_n}
                    onChange={(e) => handleChange('email_n', e.target.value)}
                    maxLength={50}
                  />
                </div>
                <div className="col-md-4">
                  <label className="form-label fw-bold">Nro. Prestador</label>
                  <input
                    type="text"
                    className="form-control"
                    value={formData.nro_prestador}
                    onChange={(e) => handleChange('nro_prestador', e.target.value)}
                    maxLength={10}
                  />
                </div>

                <div className="col-md-6">
                  <label className="form-label fw-bold">Contacto</label>
                  <input
                    type="text"
                    className="form-control"
                    value={formData.contacto}
                    onChange={(e) => handleChange('contacto', e.target.value)}
                    maxLength={10}
                  />
                </div>
                <div className="col-md-6">
                  <label className="form-label fw-bold">Domi. Facturación</label>
                  <input
                    type="text"
                    className="form-control"
                    value={formData.domi_facturacion}
                    onChange={(e) => handleChange('domi_facturacion', e.target.value)}
                    maxLength={30}
                  />
                </div>
              </div>
            </div>
            <div className="modal-footer">
              <button type="button" className="btn btn-secondary" onClick={handleClose}>
                Cancelar
              </button>
              <button type="submit" className="btn btn-success" disabled={saving}>
                {saving ? (
                  <>
                    <span className="spinner-border spinner-border-sm me-2" role="status"></span>
                    Guardando...
                  </>
                ) : (
                  'Crear Obra Social'
                )}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};

export default NuevaOSModal;
