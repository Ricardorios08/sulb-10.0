const { DataTypes } = require('sequelize');
const db = require('../config/db');
const sequelize = db.sequelize;

const DetalleHemo = sequelize.define('DetalleHemo', {
  cod_operacion: {
    type: DataTypes.INTEGER,
    primaryKey: true,
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
  hematies: { type: DataTypes.DECIMAL(10, 2) },
  hemoglobina: { type: DataTypes.DECIMAL(10, 2) },
  hematocrito: { type: DataTypes.DECIMAL(10, 2) },
  reticulocitos: { type: DataTypes.DECIMAL(10, 2) },
  plaquetas: { type: DataTypes.DECIMAL(10, 2) },
  mcv: { type: DataTypes.DECIMAL(10, 2) },
  mch: { type: DataTypes.DECIMAL(10, 2) },
  mchc: { type: DataTypes.DECIMAL(10, 2) },
  leucocitos: { type: DataTypes.DECIMAL(10, 2) },
  neutro_cayado: { type: DataTypes.DECIMAL(10, 2) },
  neutro_segmentado: { type: DataTypes.DECIMAL(10, 2) },
  eosinofilos: { type: DataTypes.DECIMAL(10, 2) },
  basofilos: { type: DataTypes.DECIMAL(10, 2) },
  linfocitos: { type: DataTypes.DECIMAL(10, 2) },
  monocitos: { type: DataTypes.DECIMAL(10, 2) },
  carac_plaquetas: { type: DataTypes.STRING(120) },
  carac_leucocitos: { type: DataTypes.STRING(120) },
  carac_hematies: { type: DataTypes.STRING(120) },
  observaciones: { type: DataTypes.STRING(120) },
  formula: { type: DataTypes.STRING(2) },
  carac_hematies2: { type: DataTypes.STRING(120) },
  usuario: { type: DataTypes.INTEGER },
}, {
  tableName: 'detalle_hemo',
  timestamps: false,
});

module.exports = DetalleHemo;
