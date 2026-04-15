const { Op } = require('sequelize');
const ConvenioPractica = require('./models/ConvenioPractica');

async function test() {
  try {
    const practicas = await ConvenioPractica.findAll({
      where: {
        nro_os: '5073',
        practica: { [Op.like]: '%hemo%' }
      },
      limit: 1
    });
    console.log("Success", practicas.length);
  } catch (err) {
    console.error("ERROR:", err.message);
  }
  process.exit(0);
}
test();
