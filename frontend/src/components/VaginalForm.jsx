import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const VaginalForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    muestra: '',
    celulas_epiteliales: '',
    leucocitos: '',
    piocitos: '',
    elementos_hongos: '',
    trichomonas_vaginalis: '',
    test_aminas: '',
    coloracion: '',
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
      <div className="alert alert-warning py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Examen Vaginal (931)</span>
      </div>

      <div className="row g-2">
        <InputField label="Muestra" field="muestra" col={12} />
        
        <div className="col-12 mt-2"><small className="fw-black text-warning border-bottom d-block mb-2 pb-1">MICROSCOPICO</small></div>
        <InputField label="Células Epiteliales" field="celulas_epiteliales" col={4} />
        <InputField label="Leucocitos" field="leucocitos" col={4} />
        <InputField label="Piocitos" field="piocitos" col={4} />
        <InputField label="Elementos de Hongos" field="elementos_hongos" col={6} />
        <InputField label="Trichomonas Vaginalis" field="trichomonas_vaginalis" col={6} />
        
        <div className="col-12 mt-2"><small className="fw-black text-warning border-bottom d-block mb-2 pb-1">PRUEBAS COMPLEMENTARIAS</small></div>
        <InputField label="Test de Aminas" field="test_aminas" col={6} />
        <InputField label="Coloración Gram" field="coloracion" col={6} />
        
        <div className="col-12 mt-2"><small className="fw-black text-warning border-bottom d-block mb-2 pb-1">CULTIVO</small></div>
        <InputField label="Cultivo" field="cultivo" col={12} />
      </div>
    </div>
  );
};

export default VaginalForm;