import React, { useState } from 'react';
import { useAuth } from '../context/AuthContext';
import { Form, Button, Container, Card, Alert } from 'react-bootstrap';
import { useNavigate } from 'react-router-dom';

const Login = () => {
  const [usuario, setUsuario] = useState('');
  const [contrasena, setContrasena] = useState('');
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);
  const { login } = useAuth();
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');
    setLoading(true);
    try {
      await login(usuario, contrasena);
      navigate('/pacientes');
    } catch (err) {
      setError(err.response?.data?.message || 'Error al iniciar sesión');
    } finally {
      setLoading(false);
    }
  };

  return (
    <Container className="d-flex align-items-center justify-content-center bg-light-blue" style={{ minHeight: "100vh" }}>
      <div className="w-100" style={{ maxWidth: "420px" }}>
        <div className="text-center mb-4">
          <h1 className="brand-text fs-2">LABORATORIO <span className="fw-light text-muted">SEGURA</span></h1>
        </div>
        <Card className="modern-card border-top-cyan shadow-lg p-3">
          <Card.Body>
            <h4 className="text-center mb-4 fw-bold">Iniciar Sesión</h4>
            {error && <Alert variant="danger" className="py-2 small">{error}</Alert>}
            <Form onSubmit={handleSubmit}>
              <Form.Group id="usuario" className="mb-3">
                <Form.Label className="small text-muted fw-bold">USUARIO</Form.Label>
                <Form.Control 
                  type="text" 
                  className="bg-light border-0 py-2"
                  value={usuario} 
                  onChange={(e) => setUsuario(e.target.value)} 
                  required 
                />
              </Form.Group>
              <Form.Group id="password" title="Contraseña" className="mb-4">
                <Form.Label className="small text-muted fw-bold">CONTRASEÑA</Form.Label>
                <Form.Control 
                  type="password" 
                  className="bg-light border-0 py-2"
                  value={contrasena} 
                  onChange={(e) => setContrasena(e.target.value)} 
                  required 
                />
              </Form.Group>
              <Button disabled={loading} variant="info" className="w-100 py-2 text-white fw-bold shadow-sm" type="submit">
                {loading ? 'Entrando...' : 'INGRESAR AL SISTEMA'}
              </Button>
            </Form>
          </Card.Body>
        </Card>
        <div className="text-center mt-4 text-muted small">
          © 2026 Sistema de Gestión de Laboratorio
        </div>
      </div>
    </Container>
  );
};

export default Login;
