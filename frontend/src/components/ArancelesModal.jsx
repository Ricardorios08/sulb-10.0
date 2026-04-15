import React, { useState, useEffect } from 'react';
import LoadingSpinner from './LoadingSpinner';
import { createArancel, updateArancel, deleteArancel } from '../services/api';
import { FaPlus, FaEdit, FaTrash, FaSave, FaTimes } from 'react-icons/fa';

const ArancelesModal = ({ nro_os, sigla, visible, onClose, onSave }) => {
  const [aranceles, setAranceles] = useState([]);
  const [loading, setLoading] = useState(true);
  const [saving, setSaving] = useState(false);
  const [editing, setEditing] = useState(null);
  const [error, setError] = useState('');

  const [formData, setFormData] = useState({
    modalidad: '',
    ug: '',
    uh: '',
    modalidad_especiales: '',
    ug_especiales: '',
    uh_especiales: '',
    modalidad_alta: '',
    ug_alta: '',
    uh_alta: '',
    nomenclador: ''
  });

  useEffect(() => {
    if (visible) {
      loadAranceles();
    }
  }, [visible]);

  const loadAranceles = async () => {
    setLoading(true);
    try {
      const response = await fetch(`http://localhost:3001/api/obras-sociales/${nro_os}`, {
        headers: {
          'Authorization': `Bearer ${localStorage.getItem('token')}`
        }
      });
      const data = await response.json();
      setAranceles(data.arancel || []);
    } catch (err) {
      console.error('Error loading aranceles:', err);
      setAranceles([]);
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
    setFormData({
      modalidad: '',
      ug: '',
      uh: '',
      modalidad_especiales: '',
      ug_especiales: '',
      uh_especiales: '',
      modalidad_alta: '',
      ug_alta: '',
      uh_alta: '',
      nomenclador: ''
    });
  };

  const handleEdit = (arc) => {
    setEditing({ isNew: false, old: { modalidad: arc.modalidad } });
    setFormData({
      modalidad: arc.modalidad || '',
      ug: arc.ug || '',
      uh: arc.uh || '',
      modalidad_especiales: arc.modalidad_especiales || '',
      ug_especiales: arc.ug_especiales || '',
      uh_especiales: arc.uh_especiales || '',
      modalidad_alta: arc.modalidad_alta || '',
      ug_alta: arc.ug_alta || '',
      uh_alta: arc.uh_alta || '',
      nomenclador: arc.nomenclador || ''
    });
  };

  const handleCancel = () => {
    setEditing(null);
    setFormData({
      modalidad: '',
      ug: '',
      uh: '',
      modalidad_especiales: '',
      ug_especiales: '',
      uh_especiales: '',
      modalidad_alta: '',
      ug_alta: '',
      uh_alta: '',
      nomenclador: ''
    });
    setError('');
  };

  const handleSave = async () => {
    if (!formData.modalidad.trim()) {
      setError('La modalidad es obligatoria');
      return;
    }

    setSaving(true);
    try {
      const payload = {
        ...formData,
        ug: parseFloat(formData.ug) || 0,
        uh: parseFloat(formData.uh) || 0,
        ug_especiales: parseFloat(formData.ug_especiales) || 0,
        uh_especiales: parseFloat(formData.uh_especiales) || 0,
        ug_alta: parseFloat(formData.ug_alta) || 0,
        uh_alta: parseFloat(formData.uh_alta) || 0
      };

      if (editing?.isNew) {
        await createArancel(nro_os, payload);
      } else {
        await updateArancel(nro_os, { ...payload, old_modalidad: editing?.old.modalidad });
      }
      await loadAranceles();
      setEditing(null);
      setFormData({
        modalidad: '', ug: '', uh: '', modalidad_especiales: '', ug_especiales: '', uh_especiales: '', modalidad_alta: '', ug_alta: '', uh_alta: '', nomenclador: ''
      });
    } catch (err) {
      console.error('Error saving arancel:', err);
      setError(err.response?.data?.message || 'Error al guardar');
    } finally {
      setSaving(false);
    }
  };

  const handleDelete = async (arc) => {
    if (!window.confirm(`¿Eliminar el arancel ${arc.modalidad}?`)) return;
    
    setSaving(true);
    try {
      await deleteArancel(nro_os, { modalidad: arc.modalidad });
      await loadAranceles();
    } catch (err) {
      console.error('Error deleting arancel:', err);
      alert('Error al eliminar');
    } finally {
      setSaving(false);
    }
  };

  if (!visible) return null;

  return (
    <div className="modal fade show d-block" tabIndex="-1" style={{ backgroundColor: 'rgba(0,0,0,0.5)' }}>
      <div className="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div className="modal-content">
          <div className="modal-header bg-primary text-white">
            <h5 className="modal-title">
              Aranceles: {sigla || `OS #${nro_os}`}
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
              <LoadingSpinner message="Cargando aranceles..." />
            ) : (
              <>
                <div className="d-flex justify-content-between align-items-center mb-3">
                  <h6 className="mb-0">Aranceles registrados: {aranceles.length}</h6>
                  {!editing && (
                    <button className="btn btn-sm btn-success" onClick={handleNew}>
                      <FaPlus size={12} /> Nuevo
                    </button>
                  )}
                </div>

                {aranceles.length === 0 && !editing && (
                  <div className="text-center text-muted py-4">
                    No hay aranceles registrados
                  </div>
                )}

                {aranceles.length > 0 && (
                  <div className="table-responsive">
                    <table className="table table-sm table-bordered">
                      <thead className="table-light">
                        <tr>
                          <th>Mod.</th>
                          <th>UG</th>
                          <th>UH</th>
                          <th>Mod.Esp.</th>
                          <th>UG Esp.</th>
                          <th>UH Esp.</th>
                          <th>Nomenclador</th>
                          <th width="80">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        {aranceles.map((arc, idx) => (
                          <tr key={idx}>
                            <td><strong>{arc.modalidad || '-'}</strong></td>
                            <td>{parseFloat(arc.ug).toFixed(3)}</td>
                            <td>{parseFloat(arc.uh).toFixed(3)}</td>
                            <td>{arc.modalidad_especiales || '-'}</td>
                            <td>{parseFloat(arc.ug_especiales).toFixed(3)}</td>
                            <td>{parseFloat(arc.uh_especiales).toFixed(3)}</td>
                            <td>{arc.nomenclador || '-'}</td>
                            <td className="text-center">
                              <div className="d-flex justify-content-center gap-1">
                                {editing?.old?.modalidad === arc.modalidad ? (
                                  <>
                                    <button className="btn btn-sm btn-success p-1" onClick={handleSave} disabled={saving} title="Guardar">
                                      <FaSave size={14} />
                                    </button>
                                    <button className="btn btn-sm btn-secondary p-1" onClick={handleCancel} disabled={saving} title="Cancelar">
                                      <FaTimes size={14} />
                                    </button>
                                  </>
                                ) : (
                                  <>
                                    <button className="btn btn-sm btn-link text-primary p-1" onClick={() => handleEdit(arc)} disabled={editing} title="Editar">
                                      <FaEdit size={14} />
                                    </button>
                                    <button className="btn btn-sm btn-link text-danger p-1" onClick={() => handleDelete(arc)} disabled={editing} title="Eliminar">
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
                  </div>
                )}

                {editing && (
                  <div className="card bg-light mt-3">
                    <div className="card-body py-3">
                      <h6 className="mb-3 text-primary">{editing.isNew ? 'Nuevo Arancel' : 'Editar Arancel'}</h6>
                      <div className="row g-2">
                        <div className="col-md-2">
                          <label className="form-label small fw-bold">Modalidad *</label>
                          <input
                            type="text"
                            className="form-control form-control-sm"
                            value={formData.modalidad}
                            onChange={(e) => handleChange('modalidad', e.target.value)}
                            maxLength={2}
                            placeholder="Ej: SC"
                          />
                        </div>
                        <div className="col-md-2">
                          <label className="form-label small fw-bold">UG</label>
                          <input
                            type="number"
                            className="form-control form-control-sm"
                            value={formData.ug}
                            onChange={(e) => handleChange('ug', e.target.value)}
                            step="0.001"
                          />
                        </div>
                        <div className="col-md-2">
                          <label className="form-label small fw-bold">UH</label>
                          <input
                            type="number"
                            className="form-control form-control-sm"
                            value={formData.uh}
                            onChange={(e) => handleChange('uh', e.target.value)}
                            step="0.001"
                          />
                        </div>
                        <div className="col-md-2">
                          <label className="form-label small fw-bold">Mod. Esp.</label>
                          <input
                            type="text"
                            className="form-control form-control-sm"
                            value={formData.modalidad_especiales}
                            onChange={(e) => handleChange('modalidad_especiales', e.target.value)}
                            maxLength={2}
                          />
                        </div>
                        <div className="col-md-2">
                          <label className="form-label small fw-bold">UG Esp.</label>
                          <input
                            type="number"
                            className="form-control form-control-sm"
                            value={formData.ug_especiales}
                            onChange={(e) => handleChange('ug_especiales', e.target.value)}
                            step="0.001"
                          />
                        </div>
                        <div className="col-md-2">
                          <label className="form-label small fw-bold">UH Esp.</label>
                          <input
                            type="number"
                            className="form-control form-control-sm"
                            value={formData.uh_especiales}
                            onChange={(e) => handleChange('uh_especiales', e.target.value)}
                            step="0.001"
                          />
                        </div>
                        <div className="col-md-3">
                          <label className="form-label small fw-bold">Modalidad Alta</label>
                          <input
                            type="text"
                            className="form-control form-control-sm"
                            value={formData.modalidad_alta}
                            onChange={(e) => handleChange('modalidad_alta', e.target.value)}
                            maxLength={2}
                          />
                        </div>
                        <div className="col-md-3">
                          <label className="form-label small fw-bold">UG Alta</label>
                          <input
                            type="number"
                            className="form-control form-control-sm"
                            value={formData.ug_alta}
                            onChange={(e) => handleChange('ug_alta', e.target.value)}
                            step="0.001"
                          />
                        </div>
                        <div className="col-md-3">
                          <label className="form-label small fw-bold">UH Alta</label>
                          <input
                            type="number"
                            className="form-control form-control-sm"
                            value={formData.uh_alta}
                            onChange={(e) => handleChange('uh_alta', e.target.value)}
                            step="0.001"
                          />
                        </div>
                        <div className="col-md-3">
                          <label className="form-label small fw-bold">Nomenclador</label>
                          <input
                            type="text"
                            className="form-control form-control-sm"
                            value={formData.nomenclador}
                            onChange={(e) => handleChange('nomenclador', e.target.value)}
                            maxLength={3}
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

export default ArancelesModal;
