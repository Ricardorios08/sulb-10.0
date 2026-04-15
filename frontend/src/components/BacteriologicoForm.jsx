import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const BacteriologicoForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    muestra: '',
    color: '',
    aspecto: '',
    obs_micro: '',
    nicolle: '',
    cultivo: ''
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
      <div className="alert alert-dark py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Examen Bacteriológico (105)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">MACROSCOPICO</small></div>
        <InputField label="Muestra" field="muestra" col={4} />
        <InputField label="Color" field="color" col={4} />
        <InputField label="Aspecto" field="aspecto" col={4} />

        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">MICROSCOPICO</small></div>
        <InputField label="Observación Microscópica" field="obs_micro" col={6} />
        <InputField label="Gram/Nicolle" field="nicolle" col={6} />

        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">CULTIVO</small></div>
        <InputField label="Cultivo" field="cultivo" col={12} />
      </div>
    </div>
  );
};

export default BacteriologicoForm;