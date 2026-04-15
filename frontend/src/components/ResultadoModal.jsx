import React, { useState, useEffect, useCallback } from 'react';
import { FaFlask, FaTimes, FaEdit, FaChevronUp, FaSave, FaVial, FaSync } from 'react-icons/fa';
import Draggable from 'react-draggable';
import { getResultadosByOrden, saveResultados } from '../api/resultado';
import LoadingSpinner from './LoadingSpinner';
import HemoForm from './HemoForm';
import CoagulogramaForm from './CoagulogramaForm';
import OrinaForm from './OrinaForm';
import IonoForm from './IonoForm';
import BilirrubinaForm from './BilirrubinaForm';
import HepatogramaForm from './HepatogramaForm';
import LipidogramaForm from './LipidogramaForm';
import CalcioForm from './CalcioForm';
import FosforoForm from './FosforoForm';
import MagnesioForm from './MagnesioForm';
import UrocultivoForm from './UrocultivoForm';
import WidalForm from './WidalForm';
import CoombsForm from './CoombsForm';
import CurvaForm from './CurvaForm';
import AglutininasForm from './AglutininasForm';
import BacteriologicoForm from './BacteriologicoForm';
import VaginalForm from './VaginalForm';
import ExudadoForm from './ExudadoForm';
import UrethralForm from './UrethralForm';
import ParasitologicoForm from './ParasitologicoForm';
import PMNForm from './PMNForm';
import EspermoForm from './EspermoForm';
import CoprocultivoForm from './CoprocultivoForm';
import RastForm from './RastForm';
import FecalForm from './FecalForm';
import AntigenoForm from './AntigenoForm';
import ClearenceForm from './ClearenceForm';
import HemoglobinaForm from './HemoglobinaForm';
import AntibiogramaForm from './AntibiogramaForm';
import IonoUrinarioForm from './IonoUrinarioForm';

const ResultadoModal = ({ isOpen, onClose, paciente, cod_grabacion, onSaveSuccess }) => {
  const [resultados, setResultados] = useState([]);
  const [loading, setLoading] = useState(false);
  const [saving, setSaving] = useState(false);
  const [expandedComplex, setExpandedComplex] = useState(null);

  const fetchResultados = useCallback(async () => {
    if (!cod_grabacion) return;
    setLoading(true);
    try {
      const data = await getResultadosByOrden(cod_grabacion);
      setResultados(data);
    } catch (error) {
      console.error('Error fetching resultados:', error);
    } finally {
      setLoading(false);
    }
  }, [cod_grabacion]);

  useEffect(() => {
    if (isOpen && cod_grabacion) {
      fetchResultados();
    } else if (isOpen && !cod_grabacion) {
      setResultados([]);
      setLoading(false);
    }
  }, [isOpen, cod_grabacion, fetchResultados]);

  const handleValueChange = (index, value) => {
    const newResultados = [...resultados];
    if (newResultados[index].clase === 1) {
      newResultados[index].complexData = value;
    } else {
      newResultados[index].newValue = value;
    }
    setResultados(newResultados);
  };

  const handleSave = async () => {
    setSaving(true);
    try {
      // Prepare data for backend
      const dataToSave = resultados.map(r => ({
        ...r,
        // Use newValue if present, otherwise keep original from res.resultado.valor
        valor: r.newValue !== undefined ? r.newValue : (r.resultado ? r.resultado.valor : ''),
        hemoData: r.complexData || r.resultado || null
      }));

      await saveResultados(cod_grabacion, dataToSave);
      onSaveSuccess();
      onClose();
    } catch (error) {
      console.error('Error saving:', error);
      alert('Error al guardar resultados');
    } finally {
      setSaving(false);
    }
  };

  if (!isOpen) return null;

  return (
    <div className="draggable-modal-overlay">
      <Draggable handle=".modal-header-handle">
        <div className="custom-draggable-modal bg-white shadow-lg rounded-3 border" style={{ width: '800px', maxWidth: '95vw' }}>
          
          {/* Header */}
          <div className="modal-header-handle p-3 border-bottom bg-light d-flex justify-content-between align-items-center cursor-move">
            <div className="d-flex align-items-center gap-2 text-danger">
              <FaFlask size={20} />
              <h5 className="mb-0 fw-bold text-uppercase small">Resultados de Análisis</h5>
            </div>
            <button className="btn btn-sm btn-link text-muted p-0" onClick={onClose}>
              <FaTimes size={20} />
            </button>
          </div>

          {/* Body */}
          <div className="p-4" style={{ maxHeight: '75vh', overflowY: 'auto' }}>
            <div className="bg-light p-3 rounded mb-4 border-start border-4 border-danger">
              <div className="row small fw-bold text-muted text-uppercase mb-1" style={{ fontSize: '0.7rem' }}>
                <div className="col-8">Paciente</div>
                <div className="col-4">Orden / Grabación</div>
              </div>
              <div className="row align-items-center">
                <div className="col-8">
                  <span className="h5 mb-0 fw-bold text-dark">{paciente?.apellido}, {paciente?.nombre}</span>
                </div>
                <div className="col-4">
                  <span className="badge bg-danger px-3 py-2">{cod_grabacion || 'SIN ORDEN'}</span>
                </div>
              </div>
            </div>

            {loading ? (
              <div className="text-center py-5">
                <div className="spinner-border text-danger mb-3" role="status"></div>
                <p className="text-muted fw-bold text-uppercase small">Cargando protocolos...</p>
              </div>
            ) : !cod_grabacion ? (
              <div className="alert alert-warning text-center">
                No se encontró una orden activa para este paciente.
              </div>
            ) : (
              <div className="practicas-list">
                {resultados.map((res, index) => (
                  <div key={index} className="card mb-3 border-light shadow-sm">
                    <div className="card-body p-3">
                      <div className="row align-items-center">
                        <div className="col-5">
                          <div className="fw-bold text-primary">{res.Practica?.practica || 'Práctica'}</div>
                          <small className="text-muted">Cód: {res.nro_practica}</small>
                        </div>
                        <div className="col-7">
                          {res.clase === 0 ? (
                            <div className="input-group">
                              <span className="input-group-text bg-white"><FaEdit className="text-muted" /></span>
                              <input
                                type="text"
                                className="form-control form-control-sm fw-bold text-center"
                                placeholder="Ingresar valor..."
                                defaultValue={res.resultado ? res.resultado.valor : ''}
                                onChange={(e) => handleValueChange(index, e.target.value)}
                              />
                            </div>
                          ) : (
                            <button 
                              onClick={() => setExpandedComplex(expandedComplex === index ? null : index)}
                              className={`btn btn-sm w-100 d-flex align-items-center justify-content-center gap-2 ${expandedComplex === index ? 'btn-danger' : 'btn-outline-danger'}`}
                            >
                              {expandedComplex === index ? <FaChevronUp /> : <FaEdit />}
                              {expandedComplex === index ? 'Cerrar Formulario' : 'Editar Formulario Complejo'}
                            </button>
                          )}
                        </div>
                      </div>

                      {expandedComplex === index && (
                        <div className="mt-3 pt-3 border-top animate-in fade-in duration-300">
                          {res.nro_practica === 475 && (
                            <HemoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 171 && (
                            <CoagulogramaForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 711 && (
                            <OrinaForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 546 && (
                            <IonoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 110 && (
                            <BilirrubinaForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 481 && (
                            <HepatogramaForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 615 && (
                            <LipidogramaForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 136 && (
                            <CalcioForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 363 && (
                            <FosforoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 654 && (
                            <MagnesioForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 911 && (
                            <UrocultivoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 953 && (
                            <WidalForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 186 && (
                            <CoombsForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 413 && (
                            <CurvaForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 13 && (
                            <AglutininasForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 105 && (
                            <BacteriologicoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 931 && (
                            <VaginalForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 309 && (
                            <ExudadoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 903 && (
                            <UrethralForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 736 && (
                            <ParasitologicoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 408 && (
                            <PMNForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {(res.nro_practica === 4858 || res.nro_practica === 298) && (
                            <EspermoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 187 && (
                            <CoprocultivoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 6614 && (
                            <RastForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 373 && (
                            <FecalForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 2734 && (
                            <AntigenoForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 193 && (
                            <ClearenceForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 764 && (
                            <HemoglobinaForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 35 && (
                            <AntibiogramaForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {res.nro_practica === 547 && (
                            <IonoUrinarioForm 
                              initialData={res.resultado}
                              onChange={(data) => handleValueChange(index, data)}
                            />
                          )}
                          {[711,764,911,953,186,413,110,13,546,193,481,2734,136,363,654,35,105,931,309,903,547,171,736,615,408,4858,298,187,6614,373].indexOf(res.nro_practica) === -1 && (
                            <div className="alert alert-info py-2 small mb-0">
                              Formulario para práctica {res.nro_practica} en desarrollo.
                            </div>
                          )}
                        </div>
                      )}
                    </div>
                  </div>
                ))}
                {resultados.length === 0 && (
                  <div className="text-center py-4 text-muted fst-italic">
                    No hay prácticas registradas en esta orden.
                  </div>
                )}
              </div>
            )}
          </div>

          {/* Footer */}
          <div className="p-3 border-top bg-light d-flex justify-content-end gap-2 rounded-bottom">
            <button className="btn btn-outline-secondary px-4 fw-bold" onClick={onClose}>
              Cancelar
            </button>
            <button 
              className="btn btn-danger px-4 fw-bold d-flex align-items-center gap-2 shadow-sm"
              onClick={handleSave}
              disabled={loading || saving || !cod_grabacion}
            >
              {saving ? <FaSync className="fa-spin" /> : <FaSave />}
              {saving ? 'Guardando...' : 'Guardar Resultados'}
            </button>
          </div>
        </div>
      </Draggable>
    </div>
  );
};

export default ResultadoModal;
