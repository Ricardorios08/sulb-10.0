import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const IonoForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    natremia: '',
    kalemia: '',
    cloremia: '',
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
      <div className="alert alert-primary py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Ionograma Plasmático (546)</span>
      </div>

      <div className="row g-2">
        <InputField label="Sodio (Na+)" field="natremia" unit="mmol/L" col={4} />
        <InputField label="Potasio (K+)" field="kalemia" unit="mmol/L" col={4} />
        <InputField label="Cloro (Cl-)" field="cloremia" unit="mmol/L" col={4} />
        
        <div className="col-12 mt-2">
          <label className="form-label small fw-bold text-muted">Observaciones</label>
          <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} />
        </div>
      </div>
    </div>
  );
};

export default IonoForm;