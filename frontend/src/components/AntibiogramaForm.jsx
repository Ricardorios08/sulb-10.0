import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const AntibiogramaForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    antibiograma: '',
    sensible1: '',
    resistente1: '',
    intermedio1: '',
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
      <div className="alert alert-dark py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Antibiograma (35)</span>
      </div>

      <div className="row g-2">
        <InputField label="Antibiograma" field="antibiograma" col={12} />
        
        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">SENSIBLE</small></div>
        <InputField label="Sensible 1" field="sensible1" col={12} />

        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">RESISTENTE</small></div>
        <InputField label="Resistente 1" field="resistente1" col={12} />

        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">INTERMEDIO</small></div>
        <InputField label="Intermedio 1" field="intermedio1" col={12} />

        <div className="col-12 mt-2">
          <label className="form-label small fw-bold text-muted">Observaciones</label>
          <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} />
        </div>
      </div>
    </div>
  );
};

export default AntibiogramaForm;