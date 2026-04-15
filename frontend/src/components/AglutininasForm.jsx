import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const AglutininasForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    salino: '',
    albuminoso: '',
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

  const InputField = ({ label, field, col = 4 }) => (
    <div className={`col-${col} mb-3`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <input type="text" className="form-control form-control-sm text-center fw-bold" value={data[field] || ''} onChange={(e) => handleChange(field, e.target.value)} />
    </div>
  );

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-info py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Aglutininas (13)</span>
      </div>

      <div className="row g-2">
        <InputField label="Salino" field="salino" col={6} />
        <InputField label="Albuminoso" field="albuminoso" col={6} />
        
        <div className="col-12 mt-2">
          <label className="form-label small fw-bold text-muted">Observaciones</label>
          <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} />
        </div>
      </div>
    </div>
  );
};

export default AglutininasForm;