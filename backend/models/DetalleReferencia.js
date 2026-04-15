const { DataTypes } = require('sequelize');
const db = require('../config/db');
const sequelize = db.sequelize;

const DetalleReferencia = sequelize.define('DetalleReferencia', {
  cod_operacion: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,
  },
  cod_grabacion: {
    type: DataTypes.INTEGER,
  },
  nro_paciente: {
    type: DataTypes.INTEGER,
  },
  nro_orden: {
    type: DataTypes.STRING(20),
  },
  nro_practica: {
    type: DataTypes.INTEGER,
  },
  valor: {
    type: DataTypes.STRING(70),
  },
  referencia: {
    type: DataTypes.TEXT,
  },
  observaciones: {
    type: DataTypes.STRING(120),
  },
  usuario: {
    type: DataTypes.INTEGER,
  }
}, {
  tableName: 'detalle_referencia',
  timestamps: false,
});

module.exports = DetalleReferencia;
