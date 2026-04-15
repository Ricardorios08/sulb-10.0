import React from 'react';
import { Row, Container } from 'react-bootstrap';
import DashboardCard from './DashboardCard';
import { useNavigate } from 'react-router-dom';
import {
  FaPlusCircle,
  FaEye
} from 'react-icons/fa';

const PacienteDashboard = () => {
  const navigate = useNavigate();

  const cards = [
    {
      title: '1. Dar Ingreso',
      description: 'Registro de fecha y cumplimiento del nuevo paciente',
      icon: FaPlusCircle,
      borderClass: 'border-top-1',
      iconColor: '#AEEEEE',
      onAction: () => alert('Dar Ingreso - En desarrollo')
    },
    {
      title: '2. Ver Pacientes',
      description: 'Visualizar pacientes registrados, búsquedas históricas y actuales.',
      icon: FaEye,
      borderClass: 'border-top-2',
      iconColor: '#FFDAB9',
      onAction: () => navigate('/pacientes/list')
    }
  ];

  return (
    <Container className="py-5" style={{ maxWidth: '1200px' }}>
      <div className="text-center mb-5">
        <h1 className="fw-bold text-secondary text-uppercase" style={{ letterSpacing: '1px' }}>
          PACIENTES
        </h1>
        <div className="mx-auto" style={{ height: '3px', width: '40px', backgroundColor: '#AEEEEE' }}></div>
      </div>
      
      <Row className="justify-content-center">
        {cards.map((card, idx) => (
          <DashboardCard key={idx} {...card} />
        ))}
      </Row>
    </Container>
  );
};

export default PacienteDashboard;
