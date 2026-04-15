const express = require('express');
const cors = require('cors');
require('dotenv').config();
const { connectDB } = require('./config/db');

const app = express();
const PORT = process.env.PORT || 3001;

app.use(cors());
app.use(express.json());
connectDB();

const authRoutes = require('./routes/authRoutes');
const pacienteRoutes = require('./routes/pacienteRoutes');
const ordenRoutes = require('./routes/ordenRoutes');
const resultadoRoutes = require('./routes/resultadoRoutes');
const practicaRoutes = require('./routes/practicaRoutes');
const referenciaRoutes = require('./routes/referenciaRoutes');
const obraSocialRoutes = require('./routes/obraSocialRoutes');

app.use('/api/auth', authRoutes);
app.use('/api/pacientes', pacienteRoutes);
app.use('/api/ordenes', ordenRoutes);
app.use('/api/resultados', resultadoRoutes);
app.use('/api/practicas', practicaRoutes);
app.use('/api/referencias', referenciaRoutes);
app.use('/api/obras-sociales', obraSocialRoutes);

app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
