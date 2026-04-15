import React, { useState, useEffect } from 'react';
import LoadingSpinner from './LoadingSpinner';
import { saveObraSocialCompleta, getObraSocialById } from '../services/api';

const EditarOSCompletaModal = ({ nro_os, sigla, denominacion, visible, onClose, onSave }) => {
  const [loading, setLoading] = useState(true);
  const [saving, setSaving] = useState(false);
  const [error, setError] = useState('');
  const [activeTab, setActiveTab] = useState('datos');
  const [formData, setFormData] = useState({
    datos: {},
    convenios: {},
    arancel: {},
    capitacion: {},
    formaPago: {},
    incremento: {},
    opFacturacion: {},
    opPracticas: {},
    opGrabacion: {},
    esCapita: {}
  });

  useEffect(() => {
    if (visible && nro_os) {
      loadData();
    }
  }, [visible, nro_os]);

  const loadData = async () => {
    setLoading(true);
    try {
      const data = await getObraSocialById(nro_os);
      setFormData({
        datos: data.datos || {},
        convenios: data.convenios || {},
        arancel: data.arancel || {},
        capitacion: data.capitacion || {},
        formaPago: data.formaPago || {},
        incremento: data.incremento || {},
        opFacturacion: data.opFacturacion || {},
        opPracticas: data.opPracticas || {},
        opGrabacion: data.opGrabacion || {},
        esCapita: data.esCapita || {}
      });
    } catch (err) {
      console.error('Error loading OS data:', err);
      setError('Error al cargar los datos');
    } finally {
      setLoading(false);
    }
  };

  const handleChange = (section, field, value) => {
    setFormData(prev => ({
      ...prev,
      [section]: { ...prev[section], [field]: value }
    }));
    setError('');
  };

  const handleSave = async () => {
    setSaving(true);
    try {
      await saveObraSocialCompleta(nro_os, formData);
      onSave();
      onClose();
    } catch (err) {
      console.error('Error saving:', err);
      setError(err.response?.data?.message || 'Error al guardar');
    } finally {
      setSaving(false);
    }
  };

  const tabs = [
    { id: 'datos', label: 'Datos' },
    { id: 'arancel', label: 'Arancel' }
  ];

  const renderDatosTab = () => (
    <div className="row g-3">
      <div className="col-md-6">
        <label className="form-label fw-bold">Denominación</label>
        <input type="text" className="form-control" value={formData.datos.denominacion || ''}
          onChange={(e) => handleChange('datos', 'denominacion', e.target.value)} maxLength={40} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Sigla</label>
        <input type="text" className="form-control" value={formData.datos.sigla || ''}
          onChange={(e) => handleChange('datos', 'sigla', e.target.value)} maxLength={20} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Activa</label>
        <select className="form-select" value={formData.datos.activa || 0}
          onChange={(e) => handleChange('datos', 'activa', parseInt(e.target.value))}>
          <option value={1}>Sí</option>
          <option value={0}>No</option>
        </select>
      </div>
      <div className="col-md-6">
        <label className="form-label fw-bold">Domicilio</label>
        <input type="text" className="form-control" value={formData.datos.domicilio_n || ''}
          onChange={(e) => handleChange('datos', 'domicilio_n', e.target.value)} maxLength={30} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Localidad</label>
        <input type="text" className="form-control" value={formData.datos.localidad_n || ''}
          onChange={(e) => handleChange('datos', 'localidad_n', e.target.value)} maxLength={25} />
      </div>
      <div className="col-md-2">
        <label className="form-label fw-bold">Cód. Área</label>
        <input type="text" className="form-control" value={formData.datos.cod_area_n || ''}
          onChange={(e) => handleChange('datos', 'cod_area_n', e.target.value)} maxLength={7} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Teléfono</label>
        <input type="text" className="form-control" value={formData.datos.telefono_n || ''}
          onChange={(e) => handleChange('datos', 'telefono_n', e.target.value)} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Email</label>
        <input type="email" className="form-control" value={formData.datos.email_n || ''}
          onChange={(e) => handleChange('datos', 'email_n', e.target.value)} maxLength={50} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Nro. Prestador</label>
        <input type="text" className="form-control" value={formData.datos.nro_prestador || ''}
          onChange={(e) => handleChange('datos', 'nro_prestador', e.target.value)} maxLength={10} />
      </div>
      <div className="col-md-6">
        <label className="form-label fw-bold">Contacto</label>
        <input type="text" className="form-control" value={formData.datos.contacto || ''}
          onChange={(e) => handleChange('datos', 'contacto', e.target.value)} maxLength={10} />
      </div>
      <div className="col-md-6">
        <label className="form-label fw-bold">Domi. Facturación</label>
        <input type="text" className="form-control" value={formData.datos.domi_facturacion || ''}
          onChange={(e) => handleChange('datos', 'domi_facturacion', e.target.value)} maxLength={30} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">CUIT</label>
        <input type="text" className="form-control" value={formData.datos.cuit || ''}
          onChange={(e) => handleChange('datos', 'cuit', e.target.value)} maxLength={15} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Es Capita</label>
        <select className="form-select" value={formData.esCapita.es_capita || 0}
          onChange={(e) => handleChange('esCapita', 'es_capita', parseInt(e.target.value))}>
          <option value={0}>No</option>
          <option value={1}>Sí</option>
        </select>
      </div>
    </div>
  );

  const renderConveniosTab = () => (
    <div className="row g-3">
      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3">Vigencia del Convenio</h6>
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Fecha Inicio</label>
        <input type="date" className="form-control" value={formData.convenios.inicio || ''}
          onChange={(e) => handleChange('convenios', 'inicio', e.target.value)} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Fecha Fin</label>
        <input type="date" className="form-control" value={formData.convenios.fin || ''}
          onChange={(e) => handleChange('convenios', 'fin', e.target.value)} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Tipo</label>
        <select className="form-select" value={formData.convenios.tipo || ''}
          onChange={(e) => handleChange('convenios', 'tipo', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="1">Permanente</option>
          <option value="2">Renovable</option>
          <option value="3">Renovable Automáticamente</option>
        </select>
      </div>
    </div>
  );

  const renderArancelTab = () => (
    <div className="row g-3">
      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3">Prácticas Comunes</h6>
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Modalidad</label>
        <select className="form-select" value={formData.arancel.modalidad || ''}
          onChange={(e) => handleChange('arancel', 'modalidad', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="1">NBU</option>
          <option value="2">U.Gastos/U.Bioquímicos</option>
          <option value="3">Valor</option>
        </select>
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">UG</label>
        <input type="number" className="form-control" value={formData.arancel.ug || ''}
          onChange={(e) => handleChange('arancel', 'ug', e.target.value)} step="0.001" />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">UH</label>
        <input type="number" className="form-control" value={formData.arancel.uh || ''}
          onChange={(e) => handleChange('arancel', 'uh', e.target.value)} step="0.001" />
      </div>

      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3 mt-3">Prácticas Especiales</h6>
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Modalidad</label>
        <select className="form-select" value={formData.arancel.modalidad_especiales || ''}
          onChange={(e) => handleChange('arancel', 'modalidad_especiales', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="1">NBU</option>
          <option value="2">U.Gastos/U.Bioquímicos</option>
          <option value="3">Valor</option>
        </select>
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">UG</label>
        <input type="number" className="form-control" value={formData.arancel.ug_especiales || ''}
          onChange={(e) => handleChange('arancel', 'ug_especiales', e.target.value)} step="0.001" />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">UH</label>
        <input type="number" className="form-control" value={formData.arancel.uh_especiales || ''}
          onChange={(e) => handleChange('arancel', 'uh_especiales', e.target.value)} step="0.001" />
      </div>

      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3 mt-3">Alta Complejidad</h6>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Modalidad</label>
        <select className="form-select" value={formData.arancel.modalidad_alta || ''}
          onChange={(e) => handleChange('arancel', 'modalidad_alta', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="1">NBU</option>
          <option value="2">U.Gastos/U.Bioquímicos</option>
          <option value="3">Valor</option>
        </select>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">UG</label>
        <input type="number" className="form-control" value={formData.arancel.ug_alta || ''}
          onChange={(e) => handleChange('arancel', 'ug_alta', e.target.value)} step="0.001" />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">UH</label>
        <input type="number" className="form-control" value={formData.arancel.uh_alta || ''}
          onChange={(e) => handleChange('arancel', 'uh_alta', e.target.value)} step="0.001" />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Nomenclador</label>
        <input type="text" className="form-control" value={formData.arancel.nomenclador || ''}
          onChange={(e) => handleChange('arancel', 'nomenclador', e.target.value)} maxLength={3} />
      </div>
    </div>
  );

  const renderCapitacionTab = () => (
    <div className="row g-3">
      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3">Datos de Capitación</h6>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Prorrateo</label>
        <input type="text" className="form-control" value={formData.capitacion.prorrateo || ''}
          onChange={(e) => handleChange('capitacion', 'prorrateo', e.target.value)} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Cuota</label>
        <input type="text" className="form-control" value={formData.capitacion.cuota || ''}
          onChange={(e) => handleChange('capitacion', 'cuota', e.target.value)} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Porcentaje</label>
        <input type="text" className="form-control" value={formData.capitacion.porcentaje || ''}
          onChange={(e) => handleChange('capitacion', 'porcentaje', e.target.value)} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">% Cuota</label>
        <input type="text" className="form-control" value={formData.capitacion.porcentaje_cuota || ''}
          onChange={(e) => handleChange('capitacion', 'porcentaje_cuota', e.target.value)} />
      </div>
    </div>
  );

  const renderFormaPagoTab = () => (
    <div className="row g-3">
      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3">Forma de Pago</h6>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Vencimiento</label>
        <input type="date" className="form-control" value={formData.formaPago.vencimiento || ''}
          onChange={(e) => handleChange('formaPago', 'vencimiento', e.target.value)} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Antigüedad</label>
        <input type="text" className="form-control" value={formData.formaPago.antiguedad || ''}
          onChange={(e) => handleChange('formaPago', 'antiguedad', e.target.value)} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Interés</label>
        <input type="text" className="form-control" value={formData.formaPago.interes || ''}
          onChange={(e) => handleChange('formaPago', 'interes', e.target.value)} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Plan</label>
        <input type="text" className="form-control" value={formData.formaPago.plan || ''}
          onChange={(e) => handleChange('formaPago', 'plan', e.target.value)} />
      </div>
    </div>
  );

  const renderIncrementoTab = () => (
    <div className="row g-3">
      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3">Incrementos por Práctica</h6>
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Material Descartable</label>
        <select className="form-select" value={formData.incremento.material_descartable || ''}
          onChange={(e) => handleChange('incremento', 'material_descartable', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="1">No</option>
          <option value="2">Práctica</option>
          <option value="3">Orden</option>
        </select>
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Toma Muestra</label>
        <select className="form-select" value={formData.incremento.toma_muestra || ''}
          onChange={(e) => handleChange('incremento', 'toma_muestra', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="1">No</option>
          <option value="2">Práctica</option>
          <option value="3">Orden</option>
        </select>
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Acto Bioquímico</label>
        <select className="form-select" value={formData.incremento.acto_bioquimico || ''}
          onChange={(e) => handleChange('incremento', 'acto_bioquimico', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="SI">Sí</option>
          <option value="NO">No</option>
        </select>
      </div>
    </div>
  );

  const renderOpFacturacionTab = () => (
    <div className="row g-3">
      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3">Opciones de Facturación</h6>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">IVA (%)</label>
        <input type="number" className="form-control" value={formData.opFacturacion.iva || 0}
          onChange={(e) => handleChange('opFacturacion', 'iva', e.target.value)} step="0.01" />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Separación</label>
        <select className="form-select" value={formData.opFacturacion.separacion || ''}
          onChange={(e) => handleChange('opFacturacion', 'separacion', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="1">IVA</option>
          <option value="2">Sin IVA</option>
          <option value="3">Plan</option>
          <option value="4">Ninguna</option>
        </select>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Coseguro</label>
        <select className="form-select" value={formData.opFacturacion.coseguro || ''}
          onChange={(e) => handleChange('opFacturacion', 'coseguro', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="1">Valor por Práctica $</option>
          <option value="2">Valor por Orden $</option>
          <option value="3">% por Práctica</option>
          <option value="4">% por Orden</option>
          <option value="5">Ninguna</option>
        </select>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Valor/%</label>
        <input type="text" className="form-control" value={formData.opFacturacion.valor_porcentaje || ''}
          onChange={(e) => handleChange('opFacturacion', 'valor_porcentaje', e.target.value)} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Gastos</label>
        <input type="text" className="form-control" value={formData.opFacturacion.gastos || ''}
          onChange={(e) => handleChange('opFacturacion', 'gastos', e.target.value)} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Honorarios</label>
        <input type="text" className="form-control" value={formData.opFacturacion.honorarios || ''}
          onChange={(e) => handleChange('opFacturacion', 'honorarios', e.target.value)} />
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Operación</label>
        <select className="form-select" value={formData.opFacturacion.operacion || ''}
          onChange={(e) => handleChange('opFacturacion', 'operacion', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="SI">Suma</option>
          <option value="NO">Resta</option>
        </select>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">% Total</label>
        <input type="number" className="form-control" value={formData.opFacturacion.porcentaje_total || 0}
          onChange={(e) => handleChange('opFacturacion', 'porcentaje_total', e.target.value)} step="0.01" />
      </div>
    </div>
  );

  const renderOpPracticasTab = () => (
    <div className="row g-3">
      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3">Opciones de Prácticas</h6>
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Efector</label>
        <input type="text" className="form-control" value={formData.opPracticas.efector || ''}
          onChange={(e) => handleChange('opPracticas', 'efector', e.target.value)} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Prescriptor</label>
        <input type="text" className="form-control" value={formData.opPracticas.prescriptor || ''}
          onChange={(e) => handleChange('opPracticas', 'prescriptor', e.target.value)} />
      </div>
      <div className="col-md-4">
        <label className="form-label fw-bold">Afiliado</label>
        <select className="form-select" value={formData.opPracticas.afiliado || ''}
          onChange={(e) => handleChange('opPracticas', 'afiliado', e.target.value)}>
          <option value="">Seleccionar...</option>
          <option value="SI">Sí</option>
          <option value="NO">No</option>
        </select>
      </div>
    </div>
  );

  const renderOpGrabacionTab = () => (
    <div className="row g-3">
      <div className="col-12">
        <h6 className="text-muted border-bottom pb-2 mb-3">Opciones de Grabación</h6>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Requiere Automático</label>
        <select className="form-select" value={formData.opGrabacion.requiere_automatico || 'NO'}
          onChange={(e) => handleChange('opGrabacion', 'requiere_automatico', e.target.value)}>
          <option value="NO">No</option>
          <option value="SI">Sí</option>
        </select>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Requiere Autorización</label>
        <select className="form-select" value={formData.opGrabacion.requiere_autorizacion || 'NO'}
          onChange={(e) => handleChange('opGrabacion', 'requiere_autorizacion', e.target.value)}>
          <option value="NO">No</option>
          <option value="SI">Sí</option>
        </select>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Requiere Coseguro</label>
        <select className="form-select" value={formData.opGrabacion.requiere_coseguro || 'NO'}
          onChange={(e) => handleChange('opGrabacion', 'requiere_coseguro', e.target.value)}>
          <option value="NO">No</option>
          <option value="SI">Sí</option>
        </select>
      </div>
      <div className="col-md-3">
        <label className="form-label fw-bold">Cos. en Orden</label>
        <select className="form-select" value={formData.opGrabacion.cos_en_orden || 0}
          onChange={(e) => handleChange('opGrabacion', 'cos_en_orden', parseInt(e.target.value))}>
          <option value={0}>No</option>
          <option value={1}>Sí</option>
        </select>
      </div>
    </div>
  );

  const renderTabContent = () => {
    switch (activeTab) {
      case 'datos': return renderDatosTab();
      case 'convenios': return renderConveniosTab();
      case 'arancel': return renderArancelTab();
      case 'capitacion': return renderCapitacionTab();
      case 'formaPago': return renderFormaPagoTab();
      case 'incremento': return renderIncrementoTab();
      case 'opFacturacion': return renderOpFacturacionTab();
      case 'opPracticas': return renderOpPracticasTab();
      case 'opGrabacion': return renderOpGrabacionTab();
      default: return renderDatosTab();
    }
  };

  if (!visible) return null;

  return (
    <div className="modal fade show d-block" tabIndex="-1" style={{ backgroundColor: 'rgba(0,0,0,0.5)' }}>
      <div className="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div className="modal-content">
          <div className="modal-header bg-primary text-white">
            <h5 className="modal-title">
              Editar OS: {sigla || denominacion || `#${nro_os}`}
            </h5>
            <button type="button" className="btn-close btn-close-white" onClick={onClose}></button>
          </div>
          <div className="modal-body p-0">
            {error && (
              <div className="alert alert-danger m-3" role="alert">
                {error}
              </div>
            )}

            {loading ? (
              <LoadingSpinner message="Cargando datos..." />
            ) : (
              <>
                <ul className="nav nav-tabs px-3 pt-3 pb-0 mb-0" style={{ fontSize: '0.8rem' }}>
                  {tabs.map(tab => (
                    <li className="nav-item" key={tab.id}>
                      <button
                        className={`nav-link px-2 py-1 ${activeTab === tab.id ? 'active' : ''}`}
                        onClick={() => setActiveTab(tab.id)}
                        style={{ borderRadius: '0.25rem 0.25rem 0 0' }}
                      >
                        {tab.label}
                      </button>
                    </li>
                  ))}
                </ul>
                <div className="tab-content p-3 border border-top-0 bg-white" style={{ minHeight: '500px' }}>
                  {renderTabContent()}
                </div>
              </>
            )}
          </div>
          <div className="modal-footer">
            <button type="button" className="btn btn-secondary" onClick={onClose}>
              Cancelar
            </button>
            <button type="button" className="btn btn-primary" onClick={handleSave} disabled={saving || loading}>
              {saving ? (
                <>
                  <span className="spinner-border spinner-border-sm me-2" role="status"></span>
                  Guardando...
                </>
              ) : (
                'Guardar Todo'
              )}
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default EditarOSCompletaModal;
