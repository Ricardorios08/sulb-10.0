const { DataTypes } = require('sequelize');
const { sequelize } = require('../config/db');

const User = sequelize.define('User', {
  id: {
    type: DataTypes.STRING(10),
    primaryKey: true,
  },
  usuario: {
    type: DataTypes.STRING(20),
    allowNull: false,
  },
  contrasena: {
    type: DataTypes.INTEGER,
    allowNull: false,
  },
  rol: {
    type: DataTypes.STRING(20),
  },
  programa: {
    type: DataTypes.INTEGER,
  }
}, {
  tableName: 'usuario',
  timestamps: false,
});

module.exports = User;
