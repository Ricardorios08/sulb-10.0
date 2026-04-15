const { DataTypes } = require('sequelize');
const { sequelize } = require('../config/db');

const ObraSocial = sequelize.define('ObraSocial', {
  nro_os: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: false,
  },
  denominacion: {
    type: DataTypes.STRING(40),
  },
  sigla: {
    type: DataTypes.STRING(20),
  },
  cuit: {
    type: DataTypes.STRING(15),
  },
  activa: {
    type: DataTypes.INTEGER,
  }
}, {
  tableName: 'datos_os',
  timestamps: false,
});

module.exports = ObraSocial;
