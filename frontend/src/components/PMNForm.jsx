import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const PMNForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    aspecto: '',
    enfresco: '',
    enfresco1: '',
    giemsa: '',
    giemsa1: '',
    pmn: ''
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
      <div className="alert alert-primary py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">PMN (408)</span>
      </div>

      <div className="row g-2">
        <InputField label="Aspecto" field="aspecto" col={12} />

        <div className="col-12 mt-2"><small className="fw-black text-primary border-bottom d-block mb-2 pb-1">EN FRESCO</small></div>
        <InputField label="Resultado 1" field="enfresco" col={6} />
        <InputField label="Resultado 2" field="enfresco1" col={6} />

        <div className="col-12 mt-2"><small className="fw-black text-primary border-bottom d-block mb-2 pb-1">GIEMSA</small></div>
        <InputField label="Resultado 1" field="giemsa" col={6} />
        <InputField label="Resultado 2" field="giemsa1" col={6} />

        <div className="col-12 mt-2"><small className="fw-black text-primary border-bottom d-block mb-2 pb-1">PMN</small></div>
        <InputField label="PMN" field="pmn" col={12} />
      </div>
    </div>
  );
};

export default PMNForm;