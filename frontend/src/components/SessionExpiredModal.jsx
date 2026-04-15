import React, { useState } from 'react';
import { FaLock, FaSignInAlt, FaEye, FaEyeSlash } from 'react-icons/fa';
import { login } from '../services/api';

const SessionExpiredModal = ({ onRestored }) => {
  const [usuario, setUsuario] = useState('');
  const [contrasena, setContrasena] = useState('');
  const [showPass, setShowPass] = useState(false);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');

  const handleLogin = async (e) => {
    e.preventDefault();
    setError('');
    setLoading(true);
    try {
      const data = await login(usuario, contrasena);
      localStorage.setItem('token', data.token);
      localStorage.setItem('user', JSON.stringify(data.user));
      onRestored(); // Tell parent: session is back
    } catch (err) {
      setError(err.response?.data?.message || 'Credenciales incorrectas');
    } finally {
      setLoading(false);
    }
  };

  return (
    <div
      style={{
        position: 'fixed',
        inset: 0,
        background: 'rgba(0,0,0,0.6)',
        zIndex: 99999,
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        backdropFilter: 'blur(4px)',
      }}
    >
      <div className="bg-white rounded-4 shadow-lg p-4" style={{ width: '360px', maxWidth: '95vw' }}>
        {/* Header */}
        <div className="text-center mb-4">
          <div className="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
            style={{ width: 56, height: 56, background: 'linear-gradient(135deg, #1e40af, #0ea5e9)' }}>
            <FaLock size={24} className="text-white" />
          </div>
          <h5 className="fw-bold mb-1">Sesión expirada</h5>
          <p className="text-muted small mb-0">
            Tu sesión de 8 horas venció. Volvé a ingresar para continuar.
          </p>
        </div>

        {error && (
          <div className="alert alert-danger py-2 small mb-3">{error}</div>
        )}

        <form onSubmit={handleLogin}>
          <div className="mb-3">
            <label className="form-label small fw-bold">Usuario</label>
            <input
              type="text"
              className="form-control form-control-sm"
              value={usuario}
              onChange={e => setUsuario(e.target.value)}
              autoFocus
              required
            />
          </div>
          <div className="mb-4">
            <label className="form-label small fw-bold">Contraseña</label>
            <div className="input-group input-group-sm">
              <input
                type={showPass ? 'text' : 'password'}
                className="form-control"
                value={contrasena}
                onChange={e => setContrasena(e.target.value)}
                required
              />
              <button
                type="button"
                className="btn btn-outline-secondary"
                onClick={() => setShowPass(v => !v)}
                tabIndex={-1}
              >
                {showPass ? <FaEyeSlash /> : <FaEye />}
              </button>
            </div>
          </div>
          <button
            type="submit"
            className="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2"
            disabled={loading}
          >
            <FaSignInAlt />
            {loading ? 'Ingresando...' : 'Continuar'}
          </button>
        </form>
      </div>
    </div>
  );
};

export default SessionExpiredModal;
