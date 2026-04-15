import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const WidalForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    flagelares: '',
    somatico: '',
    paratyphi_a: '',
    paratyphi_b: '',
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

  const InputField = ({ label, field, col = 3 }) => (
    <div className={`col-${col} mb-3`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <input type="text" className="form-control form-control-sm text-center fw-bold" value={data[field] || ''} onChange={(e) => handleChange(field, e.target.value)} />
    </div>
  );

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-warning py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Reacción de Widal (953)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-warning border-bottom d-block mb-2 pb-1">TITULOS</small></div>
        <InputField label="Ag. Flagelares H" field="flagelares" col={6} />
        <InputField label="Ag. Somáticos O" field="somatico" col={6} />
        <InputField label="Paratyphi A" field="paratyphi_a" col={6} />
        <InputField label="Paratyphi B" field="paratyphi_b" col={6} />
        
        <div className="col-12 mt-2">
          <label className="form-label small fw-bold text-muted">Observaciones</label>
          <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} />
        </div>
      </div>
    </div>
  );
};

export default WidalForm;