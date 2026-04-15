import React, { useState, useEffect } from 'react';
import { FaMicroscope, FaCheckCircle, FaExclamationTriangle } from 'react-icons/fa';

const HemoForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    hematies: '',
    hemoglobina: '',
    hematocrito: '',
    reticulocitos: '',
    plaquetas: '',
    mcv: '',
    mch: '',
    mchc: '',
    leucocitos: '',
    neutro_segmentado: '',
    neutro_cayado: '',
    eosinofilos: '',
    basofilos: '',
    monocitos: '',
    linfocitos: '',
    carac_plaquetas: '',
    carac_leucocitos: '',
    carac_hematies: '',
    carac_hematies2: '',
    observaciones: '',
    formula: 'no'
  });

  const [absValues, setAbsValues] = useState({});
  const [totalPercent, setTotalPercent] = useState(0);

  useEffect(() => {
    if (initialData) setData(initialData);
  }, [initialData]);

  useEffect(() => {
    // Calculate Absolute Values and Total Percentage
    const leu = parseFloat(data.leucocitos) || 0;
    const n_seg = parseFloat(data.neutro_segmentado) || 0;
    const n_cay = parseFloat(data.neutro_cayado) || 0;
    const eos = parseFloat(data.eosinofilos) || 0;
    const bas = parseFloat(data.basofilos) || 0;
    const mon = parseFloat(data.monocitos) || 0;
    const lin = parseFloat(data.linfocitos) || 0;

    const total = n_seg + n_cay + eos + bas + mon + lin;
    setTotalPercent(total);

    if (leu > 0) {
      setAbsValues({
        n_seg: Math.round(leu * n_seg / 100),
        n_cay: Math.round(leu * n_cay / 100),
        eos: Math.round(leu * eos / 100),
        bas: Math.round(leu * bas / 100),
        mon: Math.round(leu * mon / 100),
        lin: Math.round(leu * lin / 100)
      });
    } else {
      setAbsValues({});
    }
  }, [data]);

  const handleChange = (field, value) => {
    const newData = { ...data, [field]: value };
    setData(newData);
    onChange(newData);
  };

  const FormField = ({ label, field, unit, absValue }) => (
    <div className="col-12 col-md-4 mb-3">
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <div className="input-group input-group-sm">
        <input
          type="text"
          className="form-control text-center fw-bold"
          value={data[field] || ''}
          onChange={(e) => handleChange(field, e.target.value)}
        />
        {unit && <span className="input-group-text bg-light border-start-0" style={{ fontSize: '0.65rem', minWidth: '45px' }}>{unit}</span>}
        {absValue !== undefined && (
          <span className="input-group-text bg-white text-primary fw-bold" style={{ fontSize: '0.75rem', minWidth: '60px' }} title="Valor Absoluto">
            {absValue || '-'}
          </span>
        )}
      </div>
    </div>
  );

  return (
    <div className="bg-white p-2 border-0">
      {/* Visual Header */}
      <div className="alert alert-danger py-2 mb-4 d-flex align-items-center gap-2">
        <FaMicroscope />
        <span className="fw-bold text-uppercase small">Protocolo de Hemograma Completo (475)</span>
      </div>
      
      {/* Formula Absolute Toggle */}
      <div className="bg-light p-2 rounded mb-4 d-flex justify-content-between align-items-center border">
        <span className="small fw-bold text-muted text-uppercase">¿Incluir Fórmula Leucocitaria Absoluta en Informe?</span>
        <div className="btn-group btn-group-sm">
          <button 
            className={`btn ${data.formula === 'si' ? 'btn-danger' : 'btn-outline-secondary'}`}
            onClick={() => handleChange('formula', 'si')}
          >SI</button>
          <button 
            className={`btn ${data.formula === 'no' ? 'btn-danger' : 'btn-outline-secondary'}`}
            onClick={() => handleChange('formula', 'no')}
          >NO</button>
        </div>
      </div>

      <div className="row g-3">
        <div className="col-12"><small className="fw-black text-danger border-bottom d-block mb-1 pb-1" style={{ letterSpacing: '1px' }}>SERIE ROJA</small></div>
        <FormField label="Hematíes" field="hematies" unit="mill/mm3" />
        <FormField label="Hemoglobina" field="hemoglobina" unit="g/dL" />
        <FormField label="Hematocrito" field="hematocrito" unit="%" />
        <FormField label="VCM" field="mcv" unit="fL" />
        <FormField label="HCM" field="mch" unit="pg" />
        <FormField label="CHCM" field="mchc" unit="g/dL" />
        <FormField label="Reticulocitos" field="reticulocitos" unit="%" />
        <div className="col-md-4"></div>
        <div className="col-md-4"></div>
      </div>

      <div className="row g-3 mt-2">
        <div className="col-12 d-flex justify-content-between align-items-center border-bottom mb-2 pb-1">
          <small className="fw-black text-danger text-uppercase" style={{ letterSpacing: '1px' }}>Serie Blanca (Fórmula Leucocitaria)</small>
          <div className={`badge ${totalPercent === 100 ? 'bg-success' : 'bg-warning text-dark'} d-flex align-items-center gap-1`}>
            {totalPercent === 100 ? <FaCheckCircle /> : <FaExclamationTriangle />}
            SUMA: {totalPercent}%
          </div>
        </div>
        <FormField label="Leucocitos" field="leucocitos" unit="/mm3" />
        <div className="col-md-8"></div>
        
        <FormField label="N. Cayados" field="neutro_cayado" unit="%" absValue={absValues.n_cay} />
        <FormField label="N. Segmentados" field="neutro_segmentado" unit="%" absValue={absValues.n_seg} />
        <FormField label="Eosinófilos" field="eosinofilos" unit="%" absValue={absValues.eos} />
        <FormField label="Basófilos" field="basofilos" unit="%" absValue={absValues.bas} />
        <FormField label="Linfocitos" field="linfocitos" unit="%" absValue={absValues.lin} />
        <FormField label="Monocitos" field="monocitos" unit="%" absValue={absValues.mon} />
      </div>

      <div className="row g-3 mt-2">
        <div className="col-12"><small className="fw-black text-danger border-bottom d-block mb-1 pb-1" style={{ letterSpacing: '1px' }}>PLAQUETAS Y MORFOLOGÍA</small></div>
        <FormField label="Plaquetas" field="plaquetas" unit="/mm3" />
        <FormField label="VHS 1° Hora" field="vhs_1" unit="mm" />
        <FormField label="VHS 2° Hora" field="vhs_2" unit="mm" />
        <FormField label="Índice de Katz" field="indice_katz" />
        
        <div className="col-12 mt-3">
          <div className="p-3 bg-light rounded border">
            <h6 className="small fw-bold text-muted text-uppercase mb-3">Caracteres Morfológicos</h6>
            <div className="row g-2">
              <div className="col-12">
                <div className="input-group input-group-sm">
                  <span className="input-group-text bg-white" style={{ width: '100px' }}>Plaquetas</span>
                  <input type="text" className="form-control" value={data.carac_plaquetas || ''} onChange={(e) => handleChange('carac_plaquetas', e.target.value)} maxLength="120" />
                </div>
              </div>
              <div className="col-12">
                <div className="input-group input-group-sm">
                  <span className="input-group-text bg-white" style={{ width: '100px' }}>Leucocitos</span>
                  <input type="text" className="form-control" value={data.carac_leucocitos || ''} onChange={(e) => handleChange('carac_leucocitos', e.target.value)} maxLength="120" />
                </div>
              </div>
              <div className="col-12">
                <div className="input-group input-group-sm">
                  <span className="input-group-text bg-white" style={{ width: '100px' }}>Hematíes</span>
                  <input type="text" className="form-control" value={data.carac_hematies || ''} onChange={(e) => handleChange('carac_hematies', e.target.value)} maxLength="120" />
                </div>
              </div>
              <div className="col-12">
                <input type="text" className="form-control form-control-sm" placeholder="..." value={data.carac_hematies2 || ''} onChange={(e) => handleChange('carac_hematies2', e.target.value)} maxLength="120" />
              </div>
              <div className="col-12 mt-3">
                <label className="form-label small fw-bold text-muted mb-1 text-uppercase">Observaciones</label>
                <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} maxLength="120" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default HemoForm;
