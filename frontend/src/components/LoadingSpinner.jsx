import React from 'react';
import './LoadingSpinner.css';

const LoadingSpinner = ({ message = "Procesando..." }) => {
  return (
    <div className="loader-overlay">
      <div className="loader-container">
        <div className="test-tube">
          <div className="liquid"></div>
          <div className="drop"></div>
        </div>
        <p className="loader-text">{message}</p>
      </div>
    </div>
  );
};

export default LoadingSpinner;
