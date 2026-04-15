import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const UrocultivoForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    muestra: 'Orina',
    color: 'Amarillo',
    aspecto: 'Limpido',
    sedimento: 'Escaso',
    reaccion: 'Acida',
    en_fresco: '',
    gramm: '',
    cultivo: '',
    recuento: '',
    sensible1: '',
    sensible2: '',
    sensible3: '',
    sensible4: ''
  });

  useEffect(() => {
    if (initialData) setData(initialData);
  }, [initialData]);

  const handleChange = (field, value) => {
    const newData = { ...data, [field]: value };
    setData(newData);
    onChange(newData);
  };

  const SelectField = ({ label, field, options, col = 4 }) => (
    <div className={`col-${col} mb-2`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <select className="form-select form-select-sm" value={data[field] || ''} onChange={(e) => handleChange(field, e.target.value)}>
        {options.map(opt => <option key={opt} value={opt}>{opt}</option>)}
      </select>
    </div>
  );

  const InputField = ({ label, field, col = 4 }) => (
    <div className={`col-${col} mb-2`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <input type="text" className="form-control form-control-sm" value={data[field] || ''} onChange={(e) => handleChange(field, e.target.value)} />
    </div>
  );

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-dark py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Urocultivo (911)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">EXAMEN FISICO</small></div>
        <InputField label="Muestra" field="muestra" col={3} />
        <SelectField label="Color" field="color" options={['Amarillo', 'Amarillo Claro', 'Amarillo Oscuro', 'Incoloro']} col={3} />
        <SelectField label="Aspecto" field="aspecto" options={['Limpido', 'Turbio', 'Opalescente']} col={3} />
        <SelectField label="Sedimento" field="sedimento" options={['Escaso', 'Regular', 'Abundante']} col={3} />

        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">EXAMEN MICROSCOPICO</small></div>
        <InputField label="En Fresco" field="en_fresco" col={6} />
        <InputField label="Gram" field="gramm" col={6} />

        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">CULTIVO</small></div>
        <InputField label="Cultivo" field="cultivo" col={6} />
        <InputField label="Recuento" field="recuento" col={6} />

        <div className="col-12 mt-2"><small className="fw-black text-dark border-bottom d-block mb-2 pb-1">ANTIBIOGRAMA</small></div>
        <InputField label="Sensible 1" field="sensible1" col={3} />
        <InputField label="Sensible 2" field="sensible2" col={3} />
        <InputField label="Sensible 3" field="sensible3" col={3} />
        <InputField label="Sensible 4" field="sensible4" col={3} />
      </div>
    </div>
  );
};

export default UrocultivoForm;