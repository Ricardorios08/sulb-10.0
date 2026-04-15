import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const ParasitologicoForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    metodo_macro: '',
    resultado_macro: '',
    metodo_micro: '',
    resultado_micro: '',
    resultado_micro1: '',
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
      <div className="alert alert-success py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Parasitología (736)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-success border-bottom d-block mb-2 pb-1">EXAMEN MACROSCOPICO</small></div>
        <InputField label="Método" field="metodo_macro" col={6} />
        <InputField label="Resultado" field="resultado_macro" col={6} />

        <div className="col-12 mt-2"><small className="fw-black text-success border-bottom d-block mb-2 pb-1">EXAMEN MICROSCOPICO</small></div>
        <InputField label="Método" field="metodo_micro" col={4} />
        <InputField label="Resultado 1" field="resultado_micro" col={4} />
        <InputField label="Resultado 2" field="resultado_micro1" col={4} />

        <div className="col-12 mt-2">
          <label className="form-label small fw-bold text-muted">Observaciones</label>
          <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} />
        </div>
      </div>
    </div>
  );
};

export default ParasitologicoForm;