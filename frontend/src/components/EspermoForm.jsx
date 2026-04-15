import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const EspermoForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    volumen: '',
    aspecto: '',
    viscocidad: '',
    reaccion: '',
    ph: '',
    licuacion: '',
    directo: '',
    citomorfologico: '',
    espermios_ml: '',
    espermios_vol_eyaculado: '',
    espermios_ovales: '',
    megaloespermas: '',
    piriformes: '',
    microespermas: '',
    celulas_duplicadas: '',
    amorfo: '',
    otros_elementos: '',
    leucocitos: '',
    piocitos: '',
    celulas_planas: '',
    conglomerado_espermios: ''
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
      <div className="alert alert-secondary py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Espermatograma (4858)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-secondary border-bottom d-block mb-2 pb-1">EXAMEN MACROSCOPICO</small></div>
        <InputField label="Volumen" field="volumen" unit="ml" col={3} />
        <InputField label="Aspecto" field="aspecto" col={3} />
        <InputField label="Viscocidad" field="viscocidad" col={3} />
        <InputField label="Reacción" field="reaccion" col={3} />
        <InputField label="pH" field="ph" col={3} />
        <InputField label="Licuación" field="licuacion" col={3} />

        <div className="col-12 mt-2"><small className="fw-black text-secondary border-bottom d-block mb-2 pb-1">EXAMEN MICROSCOPICO</small></div>
        <InputField label="Directo" field="directo" col={6} />
        <InputField label="Citomorfologico" field="citomorfologico" col={6} />
        
        <div className="col-12 mt-2"><small className="fw-black text-secondary border-bottom d-block mb-2 pb-1">ESPERMIOS</small></div>
        <InputField label="x ml" field="espermios_ml" col={4} />
        <InputField label="x vol eyaculado" field="espermios_vol_eyaculado" col={4} />
        <InputField label="Ovales" field="espermios_ovales" col={4} />
        <InputField label="Megaloespermas" field="megaloespermas" col={4} />
        <InputField label="Piriformes" field="piriformes" col={4} />
        <InputField label="Microespermas" field="microespermas" col={4} />
        <InputField label="Células Duplicadas" field="celulas_duplicadas" col={6} />
        <InputField label="Amorfo" field="amorfo" col={6} />
        
        <div className="col-12 mt-2"><small className="fw-black text-secondary border-bottom d-block mb-2 pb-1">OTROS ELEMENTOS</small></div>
        <InputField label="Otros" field="otros_elementos" col={4} />
        <InputField label="Leucocitos" field="leucocitos" col={4} />
        <InputField label="Piocitos" field="piocitos" col={4} />
        <InputField label="Células Planas" field="celulas_planas" col={6} />
        <InputField label="Conglomerado" field="conglomerado_espermios" col={6} />
      </div>
    </div>
  );
};

export default EspermoForm;