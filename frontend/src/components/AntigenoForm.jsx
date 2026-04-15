import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const AntigenoForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    resultado: '',
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

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-danger py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Antigeno Helicobacter pylori (2734)</span>
      </div>

      <div className="row g-2">
        <div className="col-6 mb-3">
          <label className="form-label small fw-bold text-muted mb-1">Resultado</label>
          <input type="text" className="form-control form-control-sm" value={data.resultado || ''} onChange={(e) => handleChange('resultado', e.target.value)} />
        </div>
        
        <div className="col-12">
          <label className="form-label small fw-bold text-muted">Observaciones</label>
          <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} />
        </div>
      </div>
    </div>
  );
};

export default AntigenoForm;