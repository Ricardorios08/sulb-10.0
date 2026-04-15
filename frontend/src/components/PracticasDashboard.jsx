import React from 'react';
import { useNavigate } from 'react-router-dom';
import { Row, Container } from 'react-bootstrap';
import DashboardCard from './DashboardCard';
import { 
  FaPrescriptionBottleAlt, 
  FaSyringe, 
  FaBookMedical
} from 'react-icons/fa';

const PracticasDashboard = () => {
  const navigate = useNavigate();
  
  const agregarCards = [
    {
      title: '1. Agregar Antibiótico',
      description: 'Registrar nuevos fármacos en la base de datos',
      icon: FaPrescriptionBottleAlt,
      borderClass: 'border-top-2',
      iconColor: '#FFDAB9',
      onAction: () => alert('Agregar Antibiótico - En desarrollo')
    },
    {
      title: '2. Agregar Alergeno',
      description: 'Control de montos y cantidades de antígenos',
      icon: FaSyringe,
      borderClass: 'border-top-3',
      iconColor: '#e9e950ff',
      onAction: () => alert('Agregar Alergeno - En desarrollo')
    },
    {
      title: '3. Ver Nomencladores',
      description: 'Consulta histórica y actual de nomencladores',
      icon: FaBookMedical,
      borderClass: 'border-top-4',
      iconColor: '#FFE4E1',
      onAction: () => navigate('/practicas/nomenclador')
    }
  ];

  return (
    <Container className="py-5" style={{ maxWidth: '1200px' }}>
      <div className="text-center mb-5">
        <h1 className="fw-bold text-secondary text-uppercase" style={{ letterSpacing: '1px' }}>
          PRÁCTICAS
        </h1>
        <div className="mx-auto" style={{ height: '3px', width: '40px', backgroundColor: '#AEEEEE' }}></div>
      </div>

      <Row className="justify-content-center">
        {agregarCards.map((card, idx) => (
          <DashboardCard key={idx} {...card} />
        ))}
      </Row>
    </Container>
  );
};

export default PracticasDashboard;
