const { DataTypes } = require('sequelize');
const db = require('../config/db');
const sequelize = db.sequelize;

const ConvenioPractica = sequelize.define('ConvenioPractica', {
  cod_practica: {
    type: DataTypes.INTEGER,
    primaryKey: true,
  },
  nro_os: {
    type: DataTypes.STRING(6),
    primaryKey: true, // It seems nro_os + cod_practica is the unique combination for different insurers
  },
  practica: {
    type: DataTypes.STRING(50),
  },
  clase: {
    type: DataTypes.INTEGER,
  },
  unidad: {
    type: DataTypes.STRING(10),
  },
  metodo: {
    type: DataTypes.TEXT,
  },
  referencia: {
    type: DataTypes.TEXT,
  },
  honorarios: {
    type: DataTypes.DECIMAL(10, 2),
    field: 'honorarios'
  },
  categoria: {
    type: DataTypes.INTEGER,
    defaultValue: 1
  }
}, {
  tableName: 'convenio_practica',
  timestamps: false,
});

module.exports = ConvenioPractica;
