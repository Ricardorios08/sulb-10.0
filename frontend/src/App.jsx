import React from 'react';
import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import { AuthProvider, useAuth } from './context/AuthContext';
import { SearchProvider } from './context/SearchContext';
import Login from './components/Login';
import Layout from './components/Layout';
import PacienteList from './components/PacienteList';
import PacienteDashboard from './components/PacienteDashboard';
import PracticasDashboard from './components/PracticasDashboard';
import PracticaList from './components/PracticaList';
import ObrasSocialesDashboard from './components/ObrasSocialesDashboard';
import ObraSocialList from './components/ObraSocialList';

const ProtectedRoute = ({ children }) => {
  const { user, loading } = useAuth();
  
  if (loading) return <div className="d-flex justify-content-center align-items-center" style={{height: '100vh'}}>Cargando sesión...</div>;
  if (!user) return <Navigate to="/login" />;
  
  return <Layout>{children}</Layout>;
};

const LoginRoute = ({ children }) => {
  const { user, loading } = useAuth();
  
  if (loading) return <div className="d-flex justify-content-center align-items-center" style={{height: '100vh'}}>Cargando...</div>;
  if (user) return <Navigate to="/pacientes" />;
  
  return children;
};

function App() {
  return (
    <Router>
      <AuthProvider>
        <SearchProvider>
          <Routes>
            <Route 
              path="/login" 
              element={
                <LoginRoute>
                  <Login />
                </LoginRoute>
              } 
            />
            <Route 
              path="/pacientes" 
              element={
                <ProtectedRoute>
                  <PacienteDashboard />
                </ProtectedRoute>
              } 
            />
            <Route 
              path="/pacientes/list" 
              element={
                <ProtectedRoute>
                  <PacienteList />
                </ProtectedRoute>
              } 
            />
            <Route 
              path="/practicas" 
              element={
                <ProtectedRoute>
                  <PracticasDashboard />
                </ProtectedRoute>
              } 
            />
            <Route 
              path="/practicas/nomenclador" 
              element={
                <ProtectedRoute>
                  <PracticaList />
                </ProtectedRoute>
              } 
            />
            <Route 
              path="/obras-sociales" 
              element={
                <ProtectedRoute>
                  <ObrasSocialesDashboard />
                </ProtectedRoute>
              } 
            />
            <Route 
              path="/obras-sociales/nomenclador" 
              element={
                <ProtectedRoute>
                  <ObraSocialList />
                </ProtectedRoute>
              } 
            />
            <Route path="/" element={<Navigate to="/pacientes" />} />
            <Route path="*" element={<Navigate to="/pacientes" />} />
          </Routes>
        </SearchProvider>
      </AuthProvider>
    </Router>
  );
}

export default App;
