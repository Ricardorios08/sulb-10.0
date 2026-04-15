const { sequelize } = require('./config/db');

async function test() {
  const q = 'hemo';
  try {
    const [results] = await sequelize.query(
      `SELECT cod_practica, CONVERT(practica USING utf8) as nombre, 0 as valor 
       FROM practica 
       WHERE practica LIKE :q OR cod_practica = :exactId
       
       UNION 
       
       SELECT cod_practica, CONVERT(practica USING utf8) as nombre, 0 as valor 
       FROM convenio_practica 
       WHERE practica LIKE :q OR cod_practica = :exactId 
       
       LIMIT 20`,
      { 
        replacements: { 
          q: `%${q}%`, 
          exactId: isNaN(q) ? 0 : Number(q) 
        } 
      }
    );
    console.log("Success", results.length);
  } catch (err) {
    console.error("ERROR:", err.message);
  }
  process.exit(0);
}
test();
