import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const CoagulogramaForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    min: '',
    seg_coa: '',
    porcentaje: '',
    seg: '',
    ttpk_seg: '',
    sangria: '',
    seg_san: '',
    plaquetas: ''
  });

  useEffect(() => {
    if (initialData) setData(initialData);
  }, [initialData]);

  const handleChange = (field, value) => {
    const newData = { ...data, [field]: value };
    setData(newData);
    onChange(newData);
  };

  const FormField = ({ label, field, unit, col = 4 }) => (
    <div className={`col-${col} mb-3`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <div className="input-group input-group-sm">
        <input
          type="text"
          className="form-control text-center fw-bold"
          value={data[field] || ''}
          onChange={(e) => handleChange(field, e.target.value)}
        />
        {unit && <span className="input-group-text bg-light" style={{ fontSize: '0.65rem' }}>{unit}</span>}
      </div>
    </div>
  );

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-info py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Protocolo de Coagulograma (171)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-info border-bottom d-block mb-2 pb-1">TIEMPO DE COAGULACIÓN</small></div>
        <FormField label="Minutos" field="min" unit="min" col={3} />
        <FormField label="Segundos" field="seg_coa" unit="seg" col={3} />
        <div className="col-6"></div>

        <div className="col-12 mt-2"><small className="fw-black text-info border-bottom d-block mb-2 pb-1">TIEMPO DE PROTOMBINA (TP)</small></div>
        <FormField label="Porcentaje %" field="porcentaje" unit="%" col={3} />
        <FormField label="Segundos" field="seg" unit="seg" col={3} />
        <div className="col-6"></div>

        <div className="col-12 mt-2"><small className="fw-black text-info border-bottom d-block mb-2 pb-1">TTPK</small></div>
        <FormField label="Segundos" field="ttpk_seg" unit="seg" col={3} />
        <div className="col-9"></div>

        <div className="col-12 mt-2"><small className="fw-black text-info border-bottom d-block mb-2 pb-1">TIEMPO DE SANGRÍA</small></div>
        <FormField label="Minutos" field="sangria" unit="min" col={3} />
        <FormField label="Segundos" field="seg_san" unit="seg" col={3} />
        <div className="col-6"></div>

        <div className="col-12 mt-2"><small className="fw-black text-info border-bottom d-block mb-2 pb-1">PLAQUETAS</small></div>
        <FormField label="Plaquetas" field="plaquetas" unit="mm³" col={4} />
      </div>
    </div>
  );
};

export default CoagulogramaForm;