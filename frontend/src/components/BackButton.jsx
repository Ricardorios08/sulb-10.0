import React from 'react';
import { Button } from 'react-bootstrap';
import { useNavigate } from 'react-router-dom';
import { FaArrowLeft } from 'react-icons/fa';

const BackButton = ({ to, label = 'Volver' }) => {
  const navigate = useNavigate();

  return (
    <Button 
      variant="link" 
      className="text-muted p-0 d-flex align-items-center mb-3 text-decoration-none hover-primary"
      onClick={() => to ? navigate(to) : navigate(-1)}
    >
      <FaArrowLeft className="me-2" /> 
      <span className="fw-bold small text-uppercase" style={{ letterSpacing: '1px' }}>{label}</span>
    </Button>
  );
};

export default BackButton;
