import React, { useState, useEffect } from 'react';
import Header from './Header';
import Sidebar from './Sidebar';
import Footer from './Footer';
import SessionExpiredModal from './SessionExpiredModal';
import { Container } from 'react-bootstrap';

const Layout = ({ children }) => {
  const [showSidebar, setShowSidebar] = useState(true);
  const [sessionExpired, setSessionExpired] = useState(false);

  const toggleSidebar = () => {
    setShowSidebar(!showSidebar);
  };

  // Listen for the global session-expired event dispatched by the API interceptor
  useEffect(() => {
    const handler = () => setSessionExpired(true);
    window.addEventListener('session-expired', handler);
    return () => window.removeEventListener('session-expired', handler);
  }, []);

  return (
    <div className="d-flex flex-column bg-light-blue" style={{ minHeight: "100vh" }}>
      {/* Header occupies full width at the top */}
      <Header onToggle={toggleSidebar} />
      
      <div className="d-flex flex-grow-1 position-relative">
        {/* Mobile Overlay Backdrop */}
        {showSidebar && (
          <div 
            className="d-lg-none position-fixed top-0 start-0 w-100 h-100 bg-dark opacity-25" 
            style={{ zIndex: 1100, cursor: 'pointer' }}
            onClick={toggleSidebar}
          />
        )}

        {/* Sidebar below header */}
        <Sidebar show={showSidebar} onToggle={toggleSidebar} />
        
        {/* Main content next to sidebar */}
        <div className="d-flex flex-column flex-grow-1 overflow-auto">
          <Container fluid className="px-0 flex-grow-1">
            {children}
          </Container>
          <Footer />
        </div>
      </div>

      {/* Session expired re-login modal */}
      {sessionExpired && (
        <SessionExpiredModal onRestored={() => setSessionExpired(false)} />
      )}
    </div>
  );
};

export default Layout;
