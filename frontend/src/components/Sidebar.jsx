import React from 'react';
import { Nav } from 'react-bootstrap';
import { Link, useLocation } from 'react-router-dom';
import { 
  FaUser, 
  FaFlask, 
  FaFileAlt, 
  FaTable, 
  FaBox, 
  FaHospital, 
  FaMoneyBillWave, 
  FaChartBar, 
  FaCogs, 
  FaTools 
} from 'react-icons/fa';

const Sidebar = ({ show, onToggle }) => {
  const location = useLocation();

  const menuItems = [
    { label: 'PACIENTES', path: '/pacientes', icon: FaUser },
    { label: 'PRACTICAS', path: '/practicas', icon: FaFlask },
    { label: 'REQUISITOS', path: '/requisitos', icon: FaFileAlt },
    { label: 'PLANILLAS', path: '/planillas', icon: FaTable },
    { label: 'MODULOS', path: '/modulos', icon: FaBox },
    { label: 'OBRAS SOC.', path: '/obras-sociales', icon: FaHospital },
    { label: 'FACTURACION', path: '/facturacion', icon: FaMoneyBillWave },
    { label: 'ESTADISTICAS', path: '/estadisticas', icon: FaChartBar },
    { label: 'CONFIG', path: '/configuracion', icon: FaCogs },
    { label: 'ABM', path: '/abm', icon: FaTools },
  ];

  return (
    <div className={`sidebar-container shadow-sm ${show ? 'show' : ''}`}>
      <div className="pt-3" style={{ width: '260px' }}>
        {/* Sub-header or Breadcrumb area can go here */}
        <div className="px-4 mb-2">
           <small className="text-muted fw-bold d-flex align-items-center">
             <FaUser className="me-2" style={{fontSize: '0.7rem'}}/> MENU PRINCIPAL
           </small>
        </div>

        <Nav className="flex-column">
          {menuItems.map((item) => {
            const Icon = item.icon;
            const isActive = location.pathname.startsWith(item.path);
            return (
              <Nav.Link 
                key={item.label}
                as={Link} 
                to={item.path} 
                className={`sidebar-link py-3 px-4 d-flex align-items-center ${isActive ? 'active' : ''}`}
                onClick={() => window.innerWidth < 992 && show && onToggle()} 
              >
                <Icon className="me-3 fs-5" />
                <span style={{ fontSize: '0.85rem', fontWeight: '600' }}>{item.label}</span>
              </Nav.Link>
            );
          })}
        </Nav>
      </div>
    </div>
  );
};

export default Sidebar;
