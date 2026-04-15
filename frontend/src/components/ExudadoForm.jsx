import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const ExudadoForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    muestra: '',
    coloracion: '',
    cultivo: '',
    cultivo1: '',
    cultivo2: ''
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
      <div className="alert alert-info py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Exudado (309)</span>
      </div>

      <div className="row g-2">
        <InputField label="Muestra" field="muestra" col={12} />
        
        <div className="col-12 mt-2"><small className="fw-black text-info border-bottom d-block mb-2 pb-1">MICROSCOPICO</small></div>
        <InputField label="Coloración Gram" field="coloracion" col={12} />
        
        <div className="col-12 mt-2"><small className="fw-black text-info border-bottom d-block mb-2 pb-1">CULTIVO</small></div>
        <InputField label="Cultivo 1" field="cultivo" col={4} />
        <InputField label="Cultivo 2" field="cultivo1" col={4} />
        <InputField label="Cultivo 3" field="cultivo2" col={4} />
      </div>
    </div>
  );
};

export default ExudadoForm;