import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:3001/api',
});

// Add a request interceptor to include the JWT token
api.interceptors.request.use((config) => {
  const token = localStorage.getItem('token');
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
}, (error) => {
  return Promise.reject(error);
});

// Add a response interceptor to handle token expiry globally
api.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response?.status === 401 && !error.config._isLoginRequest) {
      // Dispatch a custom event so any component can show a re-login modal
      window.dispatchEvent(new CustomEvent('session-expired'));
    }
    return Promise.reject(error);
  }
);

export const login = async (usuario, contrasena) => {
  const response = await api.post('/auth/login', { usuario, contrasena });
  return response.data;
};

export const getPacientes = async (search = '', startDate = '', endDate = '', practica = '') => {
  const params = new URLSearchParams();
  if (search) params.append('search', search);
  if (startDate) params.append('startDate', startDate);
  if (endDate) params.append('endDate', endDate);
  if (practica) params.append('practica', practica);
  
  const response = await api.get(`/pacientes?${params.toString()}`);
  return response.data;
};

export const getPacienteById = async (id) => {
  const response = await api.get(`/pacientes/${id}`);
  return response.data;
};

export const getOrdenesByPaciente = async (nro_paciente) => {
  const response = await api.get(`/ordenes/paciente/${nro_paciente}`);
  return response.data;
};

export const getPracticas = async (search = '', tipo = '', clase = '') => {
  const params = new URLSearchParams();
  if (search) params.append('search', search);
  if (tipo) params.append('tipo', tipo);
  if (clase !== '') params.append('clase', clase);
  
  const response = await api.get(`/practicas?${params.toString()}`);
  return response.data;
};

export const getPracticaById = async (cod_practica, nro_os) => {
  const response = await api.get(`/practicas/${cod_practica}/${nro_os}`);
  return response.data;
};

export const updatePractica = async (cod_practica, nro_os, data) => {
  const response = await api.put(`/practicas/${cod_practica}/${nro_os}`, data);
  return response.data;
};

export const createPractica = async (data) => {
  const response = await api.post('/practicas', data);
  return response.data;
};

export const deletePractica = async (cod_practica, nro_os) => {
  const response = await api.delete(`/practicas/${cod_practica}/${nro_os}`);
  return response.data;
};

export const getLastCodPractica = async () => {
  const response = await api.get('/practicas/last/codigo');
  return response.data;
};

export const getMetodos = async () => {
  const response = await api.get('/practicas/options/metodos');
  return response.data;
};

export const getUnidades = async () => {
  const response = await api.get('/practicas/options/unidades');
  return response.data;
};

export const getReferencias = async (cod_practica) => {
  const response = await api.get(`/referencias/${cod_practica}`);
  return response.data;
};

export const saveReferencia = async (cod_practica, data) => {
  const response = await api.post(`/referencias/${cod_practica}`, data);
  return response.data;
};

export const deleteReferencia = async (cod_practica, cod_operacion) => {
  const response = await api.delete(`/referencias/${cod_practica}/${cod_operacion}`);
  return response.data;
};

export const getObrasSociales = async (search = '') => {
  const params = new URLSearchParams();
  if (search) params.append('search', search);
  
  const response = await api.get(`/obras-sociales?${params.toString()}`);
  return response.data;
};

export const getObraSocialById = async (nro_os) => {
  const response = await api.get(`/obras-sociales/${nro_os}`);
  return response.data;
};

export const updateObraSocial = async (nro_os, data) => {
  const response = await api.put(`/obras-sociales/${nro_os}`, data);
  return response.data;
};

export const createObraSocial = async (data) => {
  const response = await api.post('/obras-sociales', data);
  return response.data;
};

export const saveObraSocialCompleta = async (nro_os, data) => {
  const response = await api.post(`/obras-sociales/${nro_os}/completa`, data);
  return response.data;
};

export const createConvenio = async (nro_os, data) => {
  const response = await api.post(`/obras-sociales/${nro_os}/convenios`, data);
  return response.data;
};

export const updateConvenio = async (nro_os, data) => {
  const response = await api.put(`/obras-sociales/${nro_os}/convenios`, data);
  return response.data;
};

export const deleteConvenio = async (nro_os, params) => {
  const response = await api.delete(`/obras-sociales/${nro_os}/convenios`, { params });
  return response.data;
};

export const createArancel = async (nro_os, data) => {
  const response = await api.post(`/obras-sociales/${nro_os}/aranceles`, data);
  return response.data;
};

export const updateArancel = async (nro_os, data) => {
  const response = await api.put(`/obras-sociales/${nro_os}/aranceles`, data);
  return response.data;
};

export const deleteArancel = async (nro_os, params) => {
  const response = await api.delete(`/obras-sociales/${nro_os}/aranceles`, { params });
  return response.data;
};

export default api;
