import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const CoprocultivoForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    color: '',
    consistencia: '',
    moco: '',
    sangre: '',
    resto_alimentario: '',
    leveduras: '',
    parasitos: '',
    trofozoitos: '',
    quistes: '',
    huevos: '',
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
        <span className="fw-bold text-uppercase small">Coprocultivo (187)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">EXAMEN MACROSCOPICO</small></div>
        <InputField label="Color" field="color" col={4} />
        <InputField label="Consistencia" field="consistencia" col={4} />
        <InputField label="Moco" field="moco" col={4} />
        <InputField label="Sangre" field="sangre" col={4} />
        <InputField label="Resto Alimentario" field="resto_alimentario" col={4} />

        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">EXAMEN MICROSCOPICO</small></div>
        <InputField label="Leveduras" field="leveduras" col={4} />
        <InputField label="Parásitos" field="parasitos" col={4} />
        <InputField label="Trofozoitos" field="trofozoitos" col={4} />
        <InputField label="Quistes" field="quistes" col={4} />
        <InputField label="Huevos" field="huevos" col={4} />

        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">CULTIVO</small></div>
        <InputField label="Cultivo" field="cultivo" col={12} />
      </div>
    </div>
  );
};

export default CoprocultivoForm;