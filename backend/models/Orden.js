const { DataTypes } = require('sequelize');
const { sequelize } = require('../config/db');

const Orden = sequelize.define('Orden', {
  cod_grabacion: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,
  },
  nro_paciente: {
    type: DataTypes.INTEGER,
    allowNull: false,
  },
  nro_os: {
    type: DataTypes.INTEGER,
  },
  fecha: {
    type: DataTypes.DATEONLY,
  },
  nro_orden: {
    type: DataTypes.STRING(40),
  },
  nro_afiliado: {
    type: DataTypes.TEXT,
  },
  fecha_grabacion: {
    type: DataTypes.DATEONLY,
  },
  confirmada: {
    type: DataTypes.INTEGER,
  },
  usuario: {
    type: DataTypes.INTEGER,
  },
  total_orden: {
    type: DataTypes.DECIMAL(10, 2),
  },
  observaciones: {
    type: DataTypes.STRING(120),
  },
  nombre_medico: {
    type: DataTypes.STRING(25),
  },
  medico: {
    type: DataTypes.STRING(15), // Matricula
  },
  fecha_realizacion: {
    type: DataTypes.DATEONLY, // Fecha Médico
  }
}, {
  tableName: 'ordenes',
  timestamps: false,
});

module.exports = Orden;
