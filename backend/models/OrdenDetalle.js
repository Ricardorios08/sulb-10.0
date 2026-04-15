const { DataTypes } = require('sequelize');
const db = require('../config/db');
const sequelize = db.sequelize;

const OrdenDetalle = sequelize.define('OrdenDetalle', {
  cod_operacion: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,
  },
  cod_grabacion: {
    type: DataTypes.INTEGER,
    allowNull: false,
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
  nro_os: {
    type: DataTypes.INTEGER,
    allowNull: true,
  },
  valor: {
    type: DataTypes.DECIMAL(10, 2),
  },
  confirmada: {
    type: DataTypes.CHAR(2),
  }
}, {
  tableName: 'detalle',
  timestamps: false,
});

module.exports = OrdenDetalle;
