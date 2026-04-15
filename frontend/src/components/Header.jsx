import React, { useState } from 'react';
import { Navbar, Container, Button, Nav, Form, Row, Col, InputGroup, FormControl, Modal } from 'react-bootstrap';
import { useAuth } from '../context/AuthContext';
import { useSearch } from '../context/SearchContext';
import { useNavigate, useLocation } from 'react-router-dom';
import { FaSearch, FaFileAlt, FaCalendarAlt, FaPowerOff } from 'react-icons/fa';
const FilterContent = ({ isMobile, localSearch, setLocalSearch, localPractica, setLocalPractica, startDate, setStartDate, endDate, setEndDate, onSearchKeyDown, triggerSearch }) => (
  <div className={`d-flex flex-wrap gap-2 align-items-center ${isMobile ? 'flex-column w-100' : ''}`}>
    <div className={isMobile ? 'w-100' : ''} style={{ flex: '1 1 280px' }}>
      <InputGroup size="sm" className="shadow-sm rounded-pill overflow-hidden border">
        <InputGroup.Text className="bg-white border-0 ps-3"><FaSearch className="text-primary opacity-75" /></InputGroup.Text>
        <FormControl 
          placeholder="Paciente (Nombre, DNI...)" 
          className="border-0 py-2 shadow-none" 
          value={localSearch}
          onChange={(e) => setLocalSearch(e.target.value)}
          onKeyDown={onSearchKeyDown}
        />
      </InputGroup>
    </div>

    <div className={isMobile ? 'w-100' : ''} style={{ width: isMobile ? '100%' : '200px' }}>
      <InputGroup size="sm" className="shadow-sm rounded-pill overflow-hidden border">
        <InputGroup.Text className="bg-white border-0 ps-3"><FaFileAlt className="text-info opacity-75" /></InputGroup.Text>
        <FormControl 
          placeholder="Código Práctica (475...)" 
          className="border-0 py-2 shadow-none" 
          value={localPractica}
          onChange={(e) => setLocalPractica(e.target.value)}
          onKeyDown={onSearchKeyDown}
        />
      </InputGroup>
    </div>

    <div className={isMobile ? 'w-100' : ''} style={{ flex: '1 1 320px' }}>
      <InputGroup size="sm" className="shadow-sm rounded-pill overflow-hidden border bg-white">
        <InputGroup.Text className="bg-white border-0 ps-3"><FaCalendarAlt className="text-success opacity-75" /></InputGroup.Text>
        <FormControl 
          type="date" 
          className="border-0 py-2 shadow-none" 
          value={startDate}
          onChange={(e) => setStartDate(e.target.value)}
        />
        <InputGroup.Text className="bg-white border-0 px-1 text-muted opacity-50">-</InputGroup.Text>
        <FormControl 
          type="date" 
          className="border-0 py-2 shadow-none" 
          value={endDate}
          onChange={(e) => setEndDate(e.target.value)}
        />
        <Button 
          variant="primary" 
          className="px-4 fw-bold text-uppercase border-0 shadow-sm"
          style={{ fontSize: '0.75rem', letterSpacing: '0.5px' }}
          onClick={triggerSearch}
        >
          Buscar
        </Button>
      </InputGroup>
    </div>
  </div>
);

const Header = ({ onToggle }) => {
  const { user, logout } = useAuth();
  const { setPacienteSearch, setPracticaSearch, startDate, setStartDate, endDate, setEndDate } = useSearch();
  const navigate = useNavigate();
  const location = useLocation();
  const [showMobileFilters, setShowMobileFilters] = useState(false);
  
  // Local states for header inputs to prevent live-search lag
  const [localSearch, setLocalSearch] = useState('');
  const [localPractica, setLocalPractica] = useState('');

  const handleClose = () => setShowMobileFilters(false);
  const handleShow = () => setShowMobileFilters(true);

  const triggerSearch = () => {
    // Commit local searches to global context only on explicit trigger
    setPacienteSearch(localSearch);
    setPracticaSearch(localPractica);
    
    if (location.pathname !== '/pacientes/list') {
      navigate('/pacientes/list');
    }
    handleClose();
  };

  const onSearchKeyDown = (e) => {
    if (e.key === 'Enter') {
      e.preventDefault();
      triggerSearch();
    }
  };

  const commonProps = {
    localSearch, setLocalSearch,
    localPractica, setLocalPractica,
    startDate, setStartDate,
    endDate, setEndDate,
    onSearchKeyDown, triggerSearch
  };

  return (
    <Navbar expand="lg" className="navbar-custom py-2 shadow-sm sticky-top w-100">
      <Container fluid className="px-3">
        {/* Toggle & Brand */}
        <div className="d-flex align-items-center me-3">
          <Button variant="link" className="text-secondary p-0 me-3 shadow-none" onClick={onToggle}>
            <span style={{ fontSize: '24px' }}>☰</span>
          </Button>
          <Navbar.Brand href="#" className="brand-text d-flex align-items-center" onClick={() => navigate('/dashboard')}>
            <span className="fs-4 fw-bold text-primary">LABORATORIO</span>
            <span className="ms-1 fs-5 fw-light text-muted d-none d-sm-inline italic">SEGURA</span>
          </Navbar.Brand>
        </div>

        {/* Desktop Filters Area */}
        <div className="flex-grow-1 d-none d-xl-block px-4">
          <Form onSubmit={(e) => e.preventDefault()}>
            <FilterContent isMobile={false} {...commonProps} />
          </Form>
        </div>

        {/* Right Section: Mobile Search Lupa + User Info */}
        <div className="d-flex align-items-center ms-auto">
          {/* Mobile Search Lupa */}
          <Button
            variant="light"
            className="d-xl-none border-0 me-2 text-primary bg-light rounded-circle"
            style={{ width: '40px', height: '40px' }}
            onClick={handleShow}
          >
            <FaSearch />
          </Button>

          <div className="d-flex flex-column text-end me-3 d-none d-lg-flex">
            <small className="text-muted fw-bold" style={{ fontSize: '0.75rem' }}>{user?.usuario}</small>
            <small className="text-primary fw-bold" style={{ fontSize: '0.65rem' }}>MODO {user?.rol}</small>
          </div>

          <Button
            variant="outline-danger"
            size="sm"
            className="rounded-pill px-3 d-flex align-items-center border-0 bg-light shadow-none"
            onClick={logout}
          >
            <FaPowerOff className="me-2 text-danger" /> <span className="d-none d-sm-inline">Salir</span>
          </Button>
        </div>
      </Container>

      <Modal show={showMobileFilters} onHide={handleClose} centered size="lg">
        <Modal.Header closeButton className="border-0">
          <Modal.Title className="fs-5 fw-bold text-primary">Búsqueda Global</Modal.Title>
        </Modal.Header>
        <Modal.Body className="bg-light-blue p-4 rounded-bottom">
          <Form onSubmit={(e) => e.preventDefault()}>
            <div className="mb-4">
              <FilterContent isMobile={true} {...commonProps} />
            </div>
            <div className="text-center mt-3">
              <Button variant="info" className="w-100 text-white fw-bold py-2 shadow-sm rounded-pill" onClick={triggerSearch}>
                BUSCAR AHORA
              </Button>
            </div>
          </Form>
        </Modal.Body>
      </Modal>
    </Navbar>
  );
};

export default Header;
