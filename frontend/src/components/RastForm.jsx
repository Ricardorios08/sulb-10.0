import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const RastForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    valor_hallado: '',
    unidad: '',
    clase: '',
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

  const InputField = ({ label, field, col = 6 }) => (
    <div className={`col-${col} mb-2`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <input type="text" className="form-control form-control-sm" value={data[field] || ''} onChange={(e) => handleChange(field, e.target.value)} />
    </div>
  );

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-warning py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">R.A.S.T. (6614)</span>
      </div>

      <div className="row g-2">
        <InputField label="Valor Hallado" field="valor_hallado" col={4} />
        <InputField label="Unidad" field="unidad" col={4} />
        <InputField label="Clase" field="clase" col={4} />
        
        <div className="col-12 mt-2">
          <label className="form-label small fw-bold text-muted">Observaciones</label>
          <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} />
        </div>
      </div>
    </div>
  );
};

export default RastForm;