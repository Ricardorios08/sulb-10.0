const Orden = require('./Orden');
const OrdenDetalle = require('./OrdenDetalle');
const Paciente = require('./Paciente');
const Practica = require('./Practica');
const ObraSocial = require('./ObraSocial');
const Arancel = require('./Arancel');

// Associations
Paciente.hasMany(Orden, { foreignKey: 'nro_paciente' });
Orden.belongsTo(Paciente, { foreignKey: 'nro_paciente' });

Orden.hasMany(OrdenDetalle, { foreignKey: 'cod_grabacion' });
OrdenDetalle.belongsTo(Orden, { foreignKey: 'cod_grabacion' });

// Relation with Practicas master list
OrdenDetalle.belongsTo(Practica, { foreignKey: 'nro_practica', targetKey: 'cod_practica' });
Practica.hasMany(OrdenDetalle, { foreignKey: 'nro_practica', sourceKey: 'cod_practica' });

// Relation with ObraSocial
Paciente.belongsTo(ObraSocial, { foreignKey: 'nro_os' });
Orden.belongsTo(ObraSocial, { foreignKey: 'nro_os' });

module.exports = { Paciente, Orden, OrdenDetalle, Practica, ObraSocial, Arancel };
