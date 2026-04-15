const { DataTypes } = require('sequelize');
const { sequelize } = require('../config/db');

const Practica = sequelize.define('Practica', {
  cod_practica: {
    type: DataTypes.INTEGER,
    primaryKey: true,
  },
  practica: {
    type: DataTypes.STRING(50),
    allowNull: false,
  },
  sinonimia: {
    type: DataTypes.STRING(50),
  },
  descripcion: {
    type: DataTypes.STRING(40),
  },
  especialidad: {
    type: DataTypes.STRING(40),
  },
  metodo: {
    type: DataTypes.STRING(40),
  },
  muestra: {
    type: DataTypes.STRING(40),
  },
  material: {
    type: DataTypes.STRING(40),
  }
}, {
  tableName: 'practica',
  timestamps: false,
});

module.exports = Practica;
