const { DataTypes } = require('sequelize');
const { sequelize } = require('../config/db');

const Arancel = sequelize.define('Arancel', {
  nro_os: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    field: 'nro_os'
  },
  modalidad: {
    type: DataTypes.STRING,
    allowNull: true,
    field: 'modalidad'
  },
  ug: {
    type: DataTypes.DECIMAL(10, 3),
    allowNull: true,
    field: 'ug'
  },
  uh: {
    type: DataTypes.DECIMAL(10, 3),
    allowNull: true,
    field: 'uh'
  },
  modalidad_especiales: {
    type: DataTypes.STRING,
    allowNull: true,
    field: 'modalidad_especiales'
  },
  ug_especiales: {
    type: DataTypes.DECIMAL(10, 3),
    allowNull: true,
    field: 'ug_especiales'
  },
  uh_especiales: {
    type: DataTypes.DECIMAL(10, 3),
    allowNull: true,
    field: 'uh_especiales'
  },
  modalidad_alta: {
    type: DataTypes.STRING,
    allowNull: true,
    field: 'modalidad_alta'
  },
  ug_alta: {
    type: DataTypes.DECIMAL(10, 3),
    allowNull: true,
    field: 'ug_alta'
  },
  uh_alta: {
    type: DataTypes.DECIMAL(10, 3),
    allowNull: true,
    field: 'uh_alta'
  },
  nomenclador: {
    type: DataTypes.STRING,
    allowNull: true,
    field: 'nomenclador'
  }
}, {
  tableName: 'arancel',
  timestamps: false,
  primaryKey: false
});

module.exports = Arancel;