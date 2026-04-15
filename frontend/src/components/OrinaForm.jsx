import React, { useState, useEffect } from 'react';
import { FaFlask } from 'react-icons/fa';

const OrinaForm = ({ initialData, onChange }) => {
  const [data, setData] = useState(initialData || {
    densidad: '',
    color: 'Amarillo',
    aspecto: 'Limpido',
    sedimento: 'Escaso',
    reaccion: 'Acida',
    ph: '',
    proteinas: '',
    glucosa: '',
    biliares: '',
    cetonicos: '',
    hemoglobina: '',
    nitritos: '',
    epiteliales: 'Escasas',
    leucocito: '',
    piocitos: '',
    hematies: '',
    cylinders: '',
    mucus: 'No contiene',
    uratos: '',
    otros: '',
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

  const SelectField = ({ label, field, options, col = 4 }) => (
    <div className={`col-${col} mb-2`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <select className="form-select form-select-sm" value={data[field] || ''} onChange={(e) => handleChange(field, e.target.value)}>
        {options.map(opt => <option key={opt} value={opt}>{opt}</option>)}
      </select>
    </div>
  );

  const InputField = ({ label, field, unit, col = 4 }) => (
    <div className={`col-${col} mb-2`}>
      <label className="form-label small fw-bold text-muted mb-1">{label}</label>
      <div className="input-group input-group-sm">
        <input type="text" className="form-control" value={data[field] || ''} onChange={(e) => handleChange(field, e.target.value)} />
        {unit && <span className="input-group-text bg-light" style={{ fontSize: '0.65rem' }}>{unit}</span>}
      </div>
    </div>
  );

  return (
    <div className="bg-white p-2 border-0">
      <div className="alert alert-warning py-2 mb-3 d-flex align-items-center gap-2">
        <FaFlask />
        <span className="fw-bold text-uppercase small">Protocolo de Orina Completa (711)</span>
      </div>

      <div className="row g-2">
        <div className="col-12"><small className="fw-black text-warning border-bottom d-block mb-2 pb-1">EXAMEN FÍSICO</small></div>
        <InputField label="Densidad a 15°" field="densidad" col={3} />
        <SelectField label="Color" field="color" options={['Amarillo', 'Amarillo Ambar', 'Amarillo Ambar Oscuro', 'Amarillo Claro', 'Amarillo Rojizo', 'Amarillo Pardo', 'Amarillo Verdoso', 'Azul']} col={3} />
        <SelectField label="Aspecto" field="aspecto" options={['Limpido', 'Lig. Opalescente', 'Opalescente', 'Turbio']} col={3} />
        <SelectField label="Sedimento" field="sedimento" options={['Escaso', 'Regular', 'Abundante']} col={3} />
        <SelectField label="Reacción" field="reaccion" options={['Acida', 'Neutra', 'Alcalina']} col={3} />
        <InputField label="pH" field="ph" col={3} />

        <div className="col-12 mt-2"><small className="fw-black text-warning border-bottom d-block mb-2 pb-1">EXAMEN QUÍMICO</small></div>
        <InputField label="Proteínas" field="proteinas" col={3} />
        <InputField label="Glucosa" field="glucosa" col={3} />
        <InputField label="Pigmentos Biliares" field="biliares" col={3} />
        <InputField label="Cuerpos Cetónicos" field="cetonicos" col={3} />
        <InputField label="Hemoglobina" field="hemoglobina" col={3} />
        <InputField label="Urobilinogeno" field="nitritos" col={3} />

        <div className="col-12 mt-2"><small className="fw-black text-warning border-bottom d-block mb-2 pb-1">EXAMEN MICROSCÓPICO</small></div>
        <SelectField label="Células Epiteliales" field="epiteliales" options={['Muy Escasas', 'Escasas', 'Regular', 'Abundantes']} col={4} />
        <InputField label="Leucocitos" field="leucocito" col={8} />
        <InputField label="Piocitos" field="piocitos" col={6} />
        <InputField label="Hematíes" field="hematies" col={6} />
        <InputField label="Cilindros" field="cilindros" col={6} />
        <SelectField label="Mucus" field="mucus" options={['No contiene', 'Escaso', 'Regular', 'Abundante']} col={6} />
        <InputField label="Cristales" field="uratos" col={12} />

        <div className="col-12 mt-2">
          <div className="row g-2">
            <div className="col-6">
              <label className="form-label small fw-bold text-muted">Otros</label>
              <input type="text" className="form-control form-control-sm" value={data.otros || ''} onChange={(e) => handleChange('otros', e.target.value)} />
            </div>
            <div className="col-6">
              <label className="form-label small fw-bold text-muted">Observaciones</label>
              <input type="text" className="form-control form-control-sm" value={data.observaciones || ''} onChange={(e) => handleChange('observaciones', e.target.value)} />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default OrinaForm;