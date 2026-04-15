const { DataTypes } = require('sequelize');
const { sequelize } = require('../config/db');

const Paciente = sequelize.define('Paciente', {
  nro_paciente: {
    type: DataTypes.INTEGER,
    primaryKey: true,
  },
  nro_afiliado: {
    type: DataTypes.STRING,
  },
  nombre: {
    type: DataTypes.STRING,
  },
  apellido: {
    type: DataTypes.STRING,
  },
  nro_documento: {
    type: DataTypes.INTEGER,
  },
  domicilio: {
    type: DataTypes.STRING,
  },
  localidad: {
    type: DataTypes.STRING,
  },
  telefono: {
    type: DataTypes.STRING,
  },
  celular: {
    type: DataTypes.STRING,
  },
  sexo: {
    type: DataTypes.STRING,
  },
  fecha_nacimiento: {
    type: DataTypes.DATEONLY,
  },
  nro_os: {
    type: DataTypes.STRING,
  },
  activo: {
    type: DataTypes.STRING,
  }
}, {
  tableName: 'pacientes',
  timestamps: false,
});

module.exports = Paciente;
