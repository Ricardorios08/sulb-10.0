import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const MagnesioForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    valor_hallado: ''
  });

  useEffect(() => {
    if (initialData) setData(initialData);
  }, [initialData]);

  const handleChange = (field, value) => {
    const newData = { ...data, [field]: value };
    setData(newData);
    onChange(newData);
  };

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-info py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Magnesemia (654)</span>
      </div>

      <div className="row g-2">
        <div className="col-6 mb-3">
          <label className="form-label small fw-bold text-muted mb-1">Magnesio</label>
          <div className="input-group input-group-sm">
            <input type="text" className="form-control text-center fw-bold" value={data.valor_hallado || ''} onChange={(e) => handleChange('valor_hallado', e.target.value)} />
            <span className="input-group-text bg-light" style={{ fontSize: '0.65rem' }}>mg/dL</span>
          </div>
        </div>
      </div>
    </div>
  );
};

export default MagnesioForm;