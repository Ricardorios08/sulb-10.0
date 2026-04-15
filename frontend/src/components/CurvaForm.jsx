import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const CurvaForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    basal: '',
    a30: '',
    a60: '',
    a120: '',
    a180: '',
    basal_mg: '',
    a30mg: '',
    a60mg: '',
    a120mg: '',
    a180mg: ''
  });

  useEffect(() => {
    if (initialData) setData(initialData);
  }, [initialData]);

  const handleChange = (field, value) => {
    const newData = { ...data, [field]: value };
    setData(newData);
    onChange(newData);
  };

  const InputField = ({ label, field, unit, col = 4 }) => (
    <div className={`col-${col} mb-2`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <div className="input-group input-group-sm">
        <input type="text" className="form-control text-center fw-bold" value={data[field] || ''} onChange={(e) => handleChange(field, e.target.value)} />
        {unit && <span className="input-group-text bg-light" style={{ fontSize: '0.65rem' }}>{unit}</span>}
      </div>
    </div>
  );

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-primary py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Curva de Glucemia (413)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-primary border-bottom d-block mb-2 pb-1">PORCENTAJE</small></div>
        <InputField label="Basal" field="basal" unit="%" col={2} />
        <InputField label="30'" field="a30" unit="%" col={2} />
        <InputField label="60'" field="a60" unit="%" col={2} />
        <InputField label="120'" field="a120" unit="%" col={2} />
        <InputField label="180'" field="a180" unit="%" col={2} />

        <div className="col-12 mt-2"><small className="fw-black text-primary border-bottom d-block mb-2 pb-1">MG/DL</small></div>
        <InputField label="Basal" field="basal_mg" unit="mg/dL" col={2} />
        <InputField label="30'" field="a30mg" unit="mg/dL" col={2} />
        <InputField label="60'" field="a60mg" unit="mg/dL" col={2} />
        <InputField label="120'" field="a120mg" unit="mg/dL" col={2} />
        <InputField label="180'" field="a180mg" unit="mg/dL" col={2} />
      </div>
    </div>
  );
};

export default CurvaForm;