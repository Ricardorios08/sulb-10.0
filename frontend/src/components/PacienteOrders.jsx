import React, { useState, useEffect } from 'react';
import { getOrdenesByPaciente } from '../services/api';
import Draggable from 'react-draggable';
import { FaFileAlt, FaTimes, FaCalendarCheck, FaCheckCircle, FaExclamationCircle, FaVial, FaEdit } from 'react-icons/fa';

const PacienteOrders = ({ pacienteId, visible, onClose, onEditOrder, onEnterResults }) => {
  const [ordenes, setOrdenes] = useState([]);
  const [loading, setLoading] = useState(true);
  const [activeOrdenId, setActiveOrdenId] = useState(null);

  useEffect(() => {
    if (visible && pacienteId) {
      fetchOrdenes();
    }
  }, [visible, pacienteId]);

  const fetchOrdenes = async () => {
    setLoading(true);
    try {
      const data = await getOrdenesByPaciente(pacienteId);
      setOrdenes(data || []);
      // Pre-select first order if exists
      if (data && data.length > 0) {
        setActiveOrdenId(data[0].cod_grabacion);
      }
    } catch (error) {
      console.error('Error fetching ordenes:', error);
      setOrdenes([]);
    } finally {
      setLoading(false);
    }
  };

  const toggleOrden = (id) => {
    setActiveOrdenId(activeOrdenId === id ? null : id);
  };

  if (!visible) return null;

  return (
    <div className="draggable-modal-overlay">
      <Draggable handle=".modal-header-handle">
        <div className="custom-draggable-modal bg-white shadow-lg rounded-3 border" style={{ width: '900px', maxWidth: '95vw' }}>
          {/* Header */}
          <div className="modal-header-handle p-3 border-bottom bg-light d-flex justify-content-between align-items-center cursor-move">
            <div className="d-flex align-items-center gap-2 text-primary">
              <FaFileAlt />
              <h5 className="mb-0 fw-bold small text-uppercase">Historial de Protocolos y Prácticas</h5>
            </div>
            <button className="btn btn-sm btn-link text-danger p-0" onClick={onClose}>
              <FaTimes size={20} />
            </button>
          </div>

          {/* Body */}
          <div className="modal-body-custom p-4" style={{ maxHeight: '75vh', overflowY: 'auto' }}>
            {loading ? (
              <div className="text-center py-5">
                <div className="spinner-border text-primary" role="status"></div>
                <p className="mt-2 text-muted">Buscando órdenes...</p>
              </div>
            ) : ordenes.length > 0 ? (
              <div className="accordion" id="ordersAccordion">
                {ordenes.map((orden, index) => {
                  const isExpanded = activeOrdenId === orden.cod_grabacion;
                  
                  return (
                    <div className="accordion-item mb-2 border rounded-3 shadow-sm overflow-hidden" key={orden.cod_grabacion}>
                      <h2 className="accordion-header">
                        <button 
                          className={`accordion-button p-3 bg-white ${!isExpanded ? 'collapsed' : ''}`} 
                          type="button" 
                          onClick={() => toggleOrden(orden.cod_grabacion)}
                          style={{ boxShadow: 'none' }}
                        >
                          <div className="d-flex justify-content-between align-items-center w-100 me-3">
                            <div className="d-flex align-items-center gap-3 text-start">
                              <div className="bg-primary bg-opacity-10 p-2 rounded text-primary d-none d-sm-block">
                                <FaCalendarCheck size={18} />
                              </div>
                              <div>
                                <h6 className="mb-0 fw-bold text-dark">
                                  Protocolo: <span className="text-primary">{orden.cod_grabacion}</span>
                                  <span className="ms-2 badge bg-secondary">{orden.nro_paciente}</span>
                                </h6>
                                <div className="small text-muted">
                                  <span className="fw-medium">
                                    {orden.fecha ? (() => {
                                      const parts = orden.fecha.split('T')[0].split('-');
                                      if (parts.length === 3) {
                                        const [y, m, d] = parts;
                                        return `${d}/${m}/${y}`;
                                      }
                                      return orden.fecha;
                                    })() : 'S/F'}
                                  </span>
                                  <span className="mx-2">|</span>
                                  <span>Médico: {orden.nombre_medico || orden.medico || 'S/D'}</span>
                                </div>
                              </div>
                            </div>
                            <div className="text-end ms-auto d-flex align-items-center gap-3">
                              <div>
                                <span className={`badge rounded-pill ${orden.confirmada ? 'bg-success' : 'bg-warning'} px-3 d-block mb-1`}>
                                  {orden.confirmada ? 'CONFIRMADA' : 'PENDIENTE'}
                                </span>
                                <div className="small fw-bold text-primary">Total: ${orden.total_orden || '0.00'}</div>
                              </div>
                              <div className="d-flex align-items-center gap-2">
                                <button 
                                  className="btn btn-sm btn-link text-primary p-0 hover-scale"
                                  title="Editar Orden"
                                  onClick={(e) => {
                                    e.stopPropagation();
                                    if (typeof onEditOrder === 'function') onEditOrder(orden.cod_grabacion);
                                  }}
                                >
                                  <FaEdit size={20} />
                                </button>
                                <button 
                                  className="btn btn-sm btn-link text-danger p-0 hover-scale"
                                  title="Cargar Resultados"
                                  onClick={(e) => {
                                    e.stopPropagation();
                                    if (typeof onEnterResults === 'function') onEnterResults(orden.cod_grabacion);
                                  }}
                                >
                                  <FaVial size={22} />
                                </button>
                              </div>
                            </div>
                          </div>
                        </button>
                      </h2>
                      <div className={`accordion-collapse collapse ${isExpanded ? 'show' : ''}`}>
                        <div className="accordion-body p-0 border-top bg-light">
                          <table className="table table-hover table-sm mb-0">
                            <thead className="bg-white">
                              <tr>
                                <th className="ps-4 py-2 small fw-bold text-muted text-uppercase" style={{ fontSize: '0.65rem' }}>Cód.</th>
                                <th className="py-2 small fw-bold text-muted text-uppercase" style={{ fontSize: '0.65rem' }}>Análisis / Práctica</th>
                                <th className="py-2 small fw-bold text-muted text-uppercase" style={{ fontSize: '0.65rem' }}>Paciente</th>
                                <th className="py-2 small fw-bold text-muted text-uppercase" style={{ fontSize: '0.65rem' }}>Valor</th>
                                <th className="py-2 small fw-bold text-muted text-uppercase text-center" style={{ fontSize: '0.65rem' }}>Estado</th>
                              </tr>
                            </thead>
                            <tbody>
                              {orden.OrdenDetalles && orden.OrdenDetalles.length > 0 ? (
                                orden.OrdenDetalles.map((detalle) => (
                                  <tr key={detalle.cod_operacion} className="bg-white border-bottom">
                                    <td className="ps-4 fw-bold text-secondary py-2">
                                      {detalle.nro_practica}
                                      <span className="ms-1 text-muted" style={{fontSize: '0.65rem'}}>(P:{detalle.nro_paciente})</span>
                                    </td>
                                    <td className="text-dark py-2 small text-uppercase fw-medium">
                                      {detalle.Practica?.practica || 'Descripción no disponible'}
                                    </td>
                                    <td className="text-muted py-2 small">
                                      {detalle.nro_paciente}
                                    </td>
                                    <td className="text-dark py-2 font-monospace">
                                      ${detalle.valorCalculado ? detalle.valorCalculado.toFixed(2) : (detalle.valor || '0.00')}
                                    </td>
                                    <td className="text-center py-2">
                                      {detalle.confirmada ? <FaCheckCircle className="text-success" /> : <span className="text-muted opacity-50">-</span>}
                                    </td>
                                  </tr>
                                ))
                              ) : (
                                <tr>
                                  <td colSpan="5" className="text-center py-3 text-muted italic small">No hay prácticas registradas para esta orden.</td>
                                </tr>
                              )}
                            </tbody>
                          </table>
                          {orden.observaciones && (
                            <div className="p-3 ps-4 border-top bg-white small text-muted">
                              <span className="badge bg-secondary bg-opacity-10 text-secondary me-2">OBSERVACIONES</span>
                              {orden.observaciones}
                            </div>
                          )}
                        </div>
                      </div>
                    </div>
                  );
                })}
              </div>
            ) : (
              <div className="text-center py-5">
                <FaExclamationCircle size={40} className="text-muted opacity-25 mb-3" />
                <h5 className="text-muted">No se encontraron órdenes para este paciente.</h5>
              </div>
            )}
          </div>

          {/* Footer */}
          <div className="p-3 border-top bg-light text-end">
            <button className="btn btn-primary px-4 fw-bold" onClick={onClose}>Cerrar Historial</button>
          </div>
        </div>
      </Draggable>
    </div>
  );
};

export default PacienteOrders;
