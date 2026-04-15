import React from 'react';
import { Card, Col } from 'react-bootstrap';

const DashboardCard = ({ title, description, icon: IconComponent, onAction, borderClass, iconColor }) => {
  return (
    <Col md={3} className="mb-4 d-flex">
      <Card 
        as="button"
        className={`modern-card w-100 shadow-sm ${borderClass}`} 
        onClick={onAction}
        style={{ 
          cursor: 'pointer',
          outline: 'none',
          border: 'none'
        }}
      >
        <Card.Body className="d-flex flex-column align-items-center justify-content-center p-2 w-100">
          <div className="card-icon-container" style={{ color: iconColor }}>
            {IconComponent && <IconComponent size={32} />}
          </div>
          <div className="card-number-title">
            {title}
          </div>
          <div className="card-description px-2">
            {description}
          </div>
        </Card.Body>
      </Card>
    </Col>
  );
};

export default DashboardCard;
