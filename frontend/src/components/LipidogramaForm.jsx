import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const LipidogramaForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    suero: '',
    quilomicrones: '',
    beta: '',
    prebeta: '',
    alfa: '',
    observaciones: ''
  });

  useEffect(() => {
    if (initialData) setData(initialData);
  }, [initialData]);

  const handleChange = (field, value) => {
    const newData = { ...data, [field]: value };
    setData(newData);
    onChange(newData);
  };

  const InputField = ({ label, field, unit, col = 4 }) => (
    <div className={`col-${col} mb-3`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <div className="input-group input-group-sm">
        <input type="text" className="form-control text-center fw-bold" value={data[field] || ''} onChange={(e) => handleChange(field, e.target.value)} />
        {unit && <span className="input-group-text bg-light" style={{ fontSize: '0.65rem' }}>{unit}</span>}
      </div>
    </div>
  );

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-secondary py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Lipidograma (615)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-secondary border-bottom d-block mb-2 pb-1">LIPOPROTEÍNAS</small></div>
        <InputField label="Suero" field="suero" col={12} />
        <InputField label="Quilomicrones" field="quilomicrones" unit="mg/dL" col={4} />
        <InputField label="Beta LP" field="beta" unit="mg/dL" col={4} />
        <InputField label="Pre-Beta LP" field="prebeta" unit="mg/dL" col={4} />
        <InputField label="Alfa LP" field="alfa" unit="mg/dL" col={4} />
        
        <div className="col-12 mt-2">
          <label className="form-label small fw-bold text-muted">Observaciones</label>
          <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} />
        </div>
      </div>
    </div>
  );
};

export default LipidogramaForm;