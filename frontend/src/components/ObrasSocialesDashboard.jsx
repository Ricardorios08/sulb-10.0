import React from 'react';
import { useNavigate } from 'react-router-dom';
import { Row, Container } from 'react-bootstrap';
import DashboardCard from './DashboardCard';
import { FaBuilding, FaFileContract, FaMoneyBillWave } from 'react-icons/fa';

const ObrasSocialesDashboard = () => {
  const navigate = useNavigate();
  
  const agregarCards = [
    {
      title: '1. Ver Obras Sociales',
      description: 'Listado y gestión de obras sociales',
      icon: FaBuilding,
      borderClass: 'border-top-2',
      iconColor: '#87CEEB',
      onAction: () => navigate('/obras-sociales/nomenclador')
    },
    {
      title: '2. Convenios',
      description: 'Gestión de convenios con obras sociales',
      icon: FaFileContract,
      borderClass: 'border-top-3',
      iconColor: '#98FB98',
      onAction: () => navigate('/obras-sociales/nomenclador')
    },
    {
      title: '3. Aranceles',
      description: 'Configuración de tarifas y valores',
      icon: FaMoneyBillWave,
      borderClass: 'border-top-4',
      iconColor: '#FFDAB9',
      onAction: () => navigate('/obras-sociales/nomenclador')
    }
  ];

  return (
    <Container className="py-5" style={{ maxWidth: '1200px' }}>
      <div className="text-center mb-5">
        <h1 className="fw-bold text-secondary text-uppercase" style={{ letterSpacing: '1px' }}>
          OBRAS SOCIALES
        </h1>
        <div className="mx-auto" style={{ height: '3px', width: '40px', backgroundColor: '#87CEEB' }}></div>
      </div>

      <Row className="justify-content-center">
        {agregarCards.map((card, idx) => (
          <DashboardCard key={idx} {...card} />
        ))}
      </Row>
    </Container>
  );
};

export default ObrasSocialesDashboard;
