import React, { useState, useEffect } from 'react';
import { getPacienteById } from '../services/api';
import Draggable from 'react-draggable';
import { FaUser, FaIdCard, FaPhone, FaHome, FaEnvelope, FaNotesMedical, FaCalendarAlt, FaTimes, FaExpandAlt } from 'react-icons/fa';

const PacienteDetail = ({ pacienteId, visible, onClose }) => {
  const [paciente, setPaciente] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    if (visible && pacienteId) {
      fetchPaciente();
    }
  }, [visible, pacienteId]);

  const fetchPaciente = async () => {
    setLoading(true);
    try {
      const data = await getPacienteById(pacienteId);
      setPaciente(data);
    } catch (error) {
      console.error('Error fetching paciente:', error);
    } finally {
      setLoading(false);
    }
  };

  if (!visible) return null;

  const InfoItem = ({ icon: Icon, label, value }) => (
    <div className="p-3 bg-white rounded border shadow-sm h-100 hover-lift">
      <div className="d-flex align-items-center mb-1">
        <div className="text-info me-2"><Icon size={18} /></div>
        <small className="text-uppercase fw-bold text-muted" style={{ fontSize: '0.65rem', letterSpacing: '0.5px' }}>{label}</small>
      </div>
      <div className="fw-bold text-dark text-truncate" style={{ fontSize: '0.9rem' }}>{value || '-'}</div>
    </div>
  );

  return (
    <div className="draggable-modal-overlay">
      <Draggable handle=".modal-header-handle">
        <div className="custom-draggable-modal bg-white shadow-lg rounded-3 border" style={{ width: '850px', maxWidth: '95vw' }}>
          {/* Header Draggable Handle */}
          <div className="modal-header-handle p-3 border-bottom bg-light d-flex justify-content-between align-items-center cursor-move">
            <div className="d-flex align-items-center gap-2">
              <FaExpandAlt className="text-muted opacity-50" />
              <h5 className="mb-0 fw-bold text-secondary small text-uppercase">Ficha Integral del Paciente</h5>
            </div>
            <button className="btn btn-sm btn-link text-danger p-0" onClick={onClose}>
              <FaTimes size={20} />
            </button>
          </div>

          {/* Modal Body */}
          <div className="modal-body-custom p-4" style={{ maxHeight: '80vh', overflowY: 'auto' }}>
            {loading ? (
              <div className="d-flex justify-content-center align-items-center py-5">
                <div className="spinner-border text-info" role="status"><span className="visually-hidden">...</span></div>
              </div>
            ) : paciente ? (
              <div className="container-fluid p-0">
                {/* Visual Header */}
                <div className="p-4 rounded-3 border-start border-5 border-info shadow-sm mb-4" style={{ backgroundColor: '#f0f9ff' }}>
                  <div className="d-flex justify-content-between align-items-center">
                    <div>
                      <h2 className="text-info-emphasis fw-bold text-uppercase mb-1">{paciente.apellido}, {paciente.nombre}</h2>
                      <div className="d-flex gap-2 mt-2">
                        <span className="badge rounded-pill bg-info px-3">ID: {paciente.nro_paciente}</span>
                        <span className="badge rounded-pill bg-secondary px-3">HISTORIA: {paciente.nro_historia || 'N/A'}</span>
                      </div>
                    </div>
                    <FaUser size={48} className="text-info opacity-25" />
                  </div>
                </div>

                {/* Grid */}
                <div className="row g-3 mb-4">
                  <div className="col-12 col-md-4"><InfoItem icon={FaIdCard} label="Documento" value={paciente.nro_documento} /></div>
                  <div className="col-12 col-md-4"><InfoItem icon={FaPhone} label="Teléfonos" value={`${paciente.celular || ''} ${paciente.telefono || ''}`} /></div>
                  <div className="col-12 col-md-4"><InfoItem icon={FaEnvelope} label="Email" value={paciente.email} /></div>
                  <div className="col-12 col-md-4">
                    <InfoItem 
                      icon={FaCalendarAlt} 
                      label="Nacimiento" 
                      value={paciente.fecha_nacimiento ? (() => {
                        const parts = paciente.fecha_nacimiento.split('T')[0].split('-');
                        if (parts.length === 3) {
                          const [y, m, d] = parts;
                          return `${d}/${m}/${y}`;
                        }
                        return paciente.fecha_nacimiento;
                      })() : '-'} 
                    />
                  </div>
                  <div className="col-12 col-md-4"><InfoItem icon={FaHome} label="Dirección" value={paciente.direccion} /></div>
                  <div className="col-12 col-md-4"><InfoItem icon={FaNotesMedical} label="Obra Social" value={paciente.cod_obra_social} /></div>
                </div>

                {/* Observations */}
                <div className="mb-4">
                  <h6 className="text-muted fw-bold text-uppercase mb-3 small" style={{ letterSpacing: '1px' }}>Observaciones</h6>
                  <div className="p-3 bg-light border-start border-3 border-warning rounded">
                    <p className="mb-0 text-dark small" style={{ whiteSpace: 'pre-wrap' }}>{paciente.observaciones || 'Sin registros.'}</p>
                  </div>
                </div>

                <hr className="my-4 opacity-10" />

                <div className="row text-center bg-light py-3 rounded">
                  <div className="col-6 border-end">
                    <small className="text-muted d-block">Saldo</small>
                    <h5 className="fw-bold text-danger mb-0">$ 0.00</h5>
                  </div>
                  <div className="col-6">
                    <small className="text-muted d-block">Visita</small>
                    <h5 className="fw-bold text-primary mb-0">12/03/2026</h5>
                  </div>
                </div>
              </div>
            ) : (
              <div className="text-center py-4 text-muted">No hay datos.</div>
            )}
          </div>

          {/* Footer */}
          <div className="p-3 border-top bg-light text-end">
            <button className="btn btn-outline-secondary px-4 fw-bold" onClick={onClose}>Cerrar Ficha</button>
          </div>
        </div>
      </Draggable>
    </div>
  );
};

export default PacienteDetail;
