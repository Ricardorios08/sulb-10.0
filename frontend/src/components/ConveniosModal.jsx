import React, { useState } from 'react';
import LoadingSpinner from './LoadingSpinner';
import { createConvenio, updateConvenio, deleteConvenio } from '../services/api';
import { FaPlus, FaEdit, FaTrash, FaSave, FaTimes } from 'react-icons/fa';

const ConveniosModal = ({ nro_os, sigla, visible, onClose, onSave }) => {
  const [convenios, setConvenios] = useState([]);
  const [loading, setLoading] = useState(true);
  const [saving, setSaving] = useState(false);
  const [editing, setEditing] = useState(null);
  const [error, setError] = useState('');

  const [formData, setFormData] = useState({
    inicio: '',
    fin: '',
    tipo: ''
  });

  const tiposConvenio = [
    { value: '', label: 'Seleccionar...' },
    { value: 'CAPITACION', label: 'Capitación' },
    { value: 'FEE', label: 'Fee' },
    { value: 'ARancel', label: 'Arancel' },
    { value: 'AMBOS', label: 'Ambos' },
    { value: 'PRESUPUESTO', label: 'Presupuesto' },
    { value: 'COSEGURO', label: 'Coseguro' }
  ];

  React.useEffect(() => {
    if (visible) {
      loadConvenios();
    }
  }, [visible]);

  const loadConvenios = async () => {
    setLoading(true);
    try {
      const response = await fetch(`http://localhost:3001/api/obras-sociales/${nro_os}`, {
        headers: {
          'Authorization': `Bearer ${localStorage.getItem('token')}`
        }
      });
      const data = await response.json();
      setConvenios(data.convenios || []);
    } catch (err) {
      console.error('Error loading convenios:', err);
      setConvenios([]);
    } finally {
      setLoading(false);
    }
  };

  const handleChange = (field, value) => {
    setFormData(prev => ({ ...prev, [field]: value }));
    setError('');
  };

  const handleNew = () => {
    setEditing({ isNew: true });
    setFormData({ inicio: '', fin: '', tipo: '' });
  };

  const handleEdit = (conv) => {
    setEditing({ isNew: false, old: { ...conv } });
    setFormData({
      inicio: conv.inicio || '',
      fin: conv.fin || '',
      tipo: conv.tipo || ''
    });
  };

  const handleCancel = () => {
    setEditing(null);
    setFormData({ inicio: '', fin: '', tipo: '' });
    setError('');
  };

  const handleSave = async () => {
    if (!formData.inicio.trim() && !formData.fin.trim() && !formData.tipo.trim()) {
      setError('Complete al menos un campo');
      return;
    }

    setSaving(true);
    try {
      if (editing?.isNew) {
        await createConvenio(nro_os, formData);
      } else {
        await updateConvenio(nro_os, { ...formData, ...editing?.old });
      }
      await loadConvenios();
      setEditing(null);
      setFormData({ inicio: '', fin: '', tipo: '' });
    } catch (err) {
      console.error('Error saving convenio:', err);
      setError(err.response?.data?.message || 'Error al guardar');
    } finally {
      setSaving(false);
    }
  };

  const handleDelete = async (conv) => {
    if (!window.confirm(`¿Eliminar el convenio ${conv.tipo} (${conv.inicio} - ${conv.fin})?`)) return;
    
    setSaving(true);
    try {
      await deleteConvenio(nro_os, conv);
      await loadConvenios();
    } catch (err) {
      console.error('Error deleting convenio:', err);
      alert('Error al eliminar');
    } finally {
      setSaving(false);
    }
  };

  if (!visible) return null;

  return (
    <div className="modal fade show d-block" tabIndex="-1" style={{ backgroundColor: 'rgba(0,0,0,0.5)' }}>
      <div className="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div className="modal-content">
          <div className="modal-header bg-primary text-white">
            <h5 className="modal-title">
              Convenios: {sigla || `OS #${nro_os}`}
            </h5>
            <button type="button" className="btn-close btn-close-white" onClick={onClose}></button>
          </div>
          <div className="modal-body">
            {error && (
              <div className="alert alert-danger py-2" role="alert">
                {error}
              </div>
            )}

            {loading ? (
              <LoadingSpinner message="Cargando convenios..." />
            ) : (
              <>
                <div className="d-flex justify-content-between align-items-center mb-3">
                  <h6 className="mb-0">Convenios registrados: {convenios.length}</h6>
                  {!editing && (
                    <button className="btn btn-sm btn-success" onClick={handleNew}>
                      <FaPlus size={12} /> Nuevo
                    </button>
                  )}
                </div>

                {convenios.length === 0 && !editing && (
                  <div className="text-center text-muted py-4">
                    No hay convenios registrados
                  </div>
                )}

                {convenios.length > 0 && (
                  <table className="table table-sm table-bordered">
                    <thead className="table-light">
                      <tr>
                        <th>Tipo</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th width="100">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      {convenios.map((conv, idx) => (
                        <tr key={idx}>
                          <td>{conv.tipo || '-'}</td>
                          <td>{conv.inicio || '-'}</td>
                          <td>{conv.fin || '-'}</td>
                          <td className="text-center">
                            <div className="d-flex justify-content-center gap-1">
                              {editing?.old === conv ? (
                                <>
                                  <button
                                    className="btn btn-sm btn-success p-1"
                                    onClick={handleSave}
                                    disabled={saving}
                                    title="Guardar"
                                  >
                                    <FaSave size={14} />
                                  </button>
                                  <button
                                    className="btn btn-sm btn-secondary p-1"
                                    onClick={handleCancel}
                                    disabled={saving}
                                    title="Cancelar"
                                  >
                                    <FaTimes size={14} />
                                  </button>
                                </>
                              ) : (
                                <>
                                  <button
                                    className="btn btn-sm btn-link text-primary p-1"
                                    onClick={() => handleEdit(conv)}
                                    disabled={editing}
                                    title="Editar"
                                  >
                                    <FaEdit size={14} />
                                  </button>
                                  <button
                                    className="btn btn-sm btn-link text-danger p-1"
                                    onClick={() => handleDelete(conv)}
                                    disabled={editing}
                                    title="Eliminar"
                                  >
                                    <FaTrash size={14} />
                                  </button>
                                </>
                              )}
                            </div>
                          </td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                )}

                {editing?.isNew && (
                  <div className="card bg-light mt-3">
                    <div className="card-body py-3">
                      <h6 className="mb-3 text-primary">Nuevo Convenio</h6>
                      <div className="row g-2">
                        <div className="col-4">
                          <label className="form-label small fw-bold">Tipo</label>
                          <select
                            className="form-select form-select-sm"
                            value={formData.tipo}
                            onChange={(e) => handleChange('tipo', e.target.value)}
                          >
                            {tiposConvenio.map(t => (
                              <option key={t.value} value={t.value}>{t.label}</option>
                            ))}
                          </select>
                        </div>
                        <div className="col-4">
                          <label className="form-label small fw-bold">Inicio</label>
                          <input
                            type="date"
                            className="form-control form-control-sm"
                            value={formData.inicio}
                            onChange={(e) => handleChange('inicio', e.target.value)}
                          />
                        </div>
                        <div className="col-4">
                          <label className="form-label small fw-bold">Fin</label>
                          <input
                            type="date"
                            className="form-control form-control-sm"
                            value={formData.fin}
                            onChange={(e) => handleChange('fin', e.target.value)}
                          />
                        </div>
                      </div>
                      <div className="mt-3 d-flex gap-2 justify-content-end">
                        <button className="btn btn-sm btn-secondary" onClick={handleCancel} disabled={saving}>
                          Cancelar
                        </button>
                        <button className="btn btn-sm btn-success" onClick={handleSave} disabled={saving}>
                          {saving ? 'Guardando...' : 'Guardar'}
                        </button>
                      </div>
                    </div>
                  </div>
                )}
              </>
            )}
          </div>
          <div className="modal-footer">
            <button type="button" className="btn btn-secondary" onClick={onClose}>
              Cerrar
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ConveniosModal;
