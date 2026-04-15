import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const ClearenceForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    creatinina_serica: '',
    creatinina_orina: '',
    diuresis: '',
    clearence: ''
  });

  useEffect(() => {
    if (initialData) setData(initialData);
  }, [initialData]);

  const handleChange = (field, value) => {
    const newData = { ...data, [field]: value };
    setData(newData);
    onChange(newData);
  };

  const InputField = ({ label, field, unit, col = 3 }) => (
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
      <div className="alert alert-primary py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Clearence de Creatinina (193)</span>
      </div>

      <div className="row g-2">
        <InputField label="Creatinina Sérica" field="creatinina_serica" unit="mg/dL" col={3} />
        <InputField label="Creatinina Orina" field="creatinina_orina" unit="mg/dL" col={3} />
        <InputField label="Diuresis 24h" field="diuresis" unit="ml" col={3} />
        <InputField label="Clearence" field="clearence" unit="ml/min" col={3} />
      </div>
    </div>
  );
};

export default ClearenceForm;