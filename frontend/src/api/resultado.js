import axios from 'axios';

const API_URL = import.meta.env.VITE_API_URL || 'http://localhost:3001/api';

export const getResultadosByOrden = async (cod_grabacion) => {
  const response = await axios.get(`${API_URL}/resultados/${cod_grabacion}`);
  return response.data;
};

export const saveResultados = async (cod_grabacion, resultados) => {
  const response = await axios.post(`${API_URL}/resultados/${cod_grabacion}`, { resultados });
  return response.data;
};
