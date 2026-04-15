const { Orden, OrdenDetalle, Practica, Paciente, ObraSocial } = require('../models/associations');
const Convenio = require('../models/ConvenioPractica');
const { sequelize } = require('../config/db');
const { Op } = require('sequelize');
const Arancel = require('../models/Arancel');

// GET all orders for a patient
const getOrdenesByPaciente = async (req, res) => {
  try {
    const { nro_paciente } = req.params;
    const pacienteNum = parseInt(nro_paciente);
    console.log('Fetching orders for paciente:', nro_paciente, '-> parsed:', pacienteNum);
    
    // Get all orders for this patient
    const ordenes = await sequelize.query(
      `SELECT * FROM ordenes WHERE nro_paciente = ? ORDER BY fecha DESC`,
      {
        replacements: [pacienteNum],
        type: sequelize.QueryTypes.SELECT,
        model: Orden,
        mapToModel: true
      }
    );
    
    console.log('Found ordenes:', ordenes.length);

    // Now get all detalles for these orders
    const codGrabaciones = ordenes.map(o => o.cod_grabacion);
    console.log('codGrabaciones:', codGrabaciones.slice(0, 5), '...total:', codGrabaciones.length);
    let detallesRaw = [];
    
    if (codGrabaciones.length > 0) {
      // Debug: check if 31618 is in the list
      console.log('31618 in list:', codGrabaciones.includes(31618));
      
       detallesRaw = await sequelize.query(
         `SELECT d.cod_operacion, d.cod_grabacion, d.nro_practica, d.nro_paciente, d.valor, d.confirmada,
          c.practica as practica_nombre, c.honorarios, c.categoria, c.nro_os as nro_os_convenio
          FROM detalle d 
           LEFT JOIN convenio_practica c ON d.nro_practica = c.cod_practica
          WHERE d.cod_grabacion IN (:codGrabaciones)`,
         {
           replacements: { codGrabaciones },
           type: sequelize.QueryTypes.SELECT
         }
       );
    }
    
    console.log('Raw detalles count:', detallesRaw.length);
    console.log('Sample raw detalle cod_grabacion:', detallesRaw[0] ? detallesRaw[0].cod_grabacion : 'no data');
    console.log('Sample orden cod_grabacion:', ordenes[0] ? ordenes[0].cod_grabacion : 'no ordenes');

    // Group detalles by cod_grabacion
    const detallesPorOrden = {};
    for (const d of detallesRaw) {
      const key = String(d.cod_grabacion);
      if (!detallesPorOrden[key]) {
        detallesPorOrden[key] = [];
      }
      detallesPorOrden[key].push(d);
    }
    
    console.log('Keys in detallesPorOrden:', Object.keys(detallesPorOrden));

    // Calculate valorCalculado for each order
    const ordenesConValores = await Promise.all(ordenes.map(async (orden) => {
      const ordenJson = orden.toJSON ? orden.toJSON() : orden;
      let totalOrden = 0;
      
      const key = String(ordenJson.cod_grabacion);
      const detalles = detallesPorOrden[key] || [];
      console.log('Orden:', ordenJson.cod_grabacion, 'Detalles:', detalles.length);
      
      // Add convenience data and calculate values
      for (const detalle of detalles) {
        // Build Practica object from convenience
        detalle.Practica = {
          cod_practica: detalle.nro_practica,
          practica: detalle.practica_nombre || 'Practica ' + detalle.nro_practica
        };
        
        // Calculate value if honorarios exist
        if (detalle.honorarios && detalle.nro_os_convenio) {
          const honorarios = parseFloat(detalle.honorarios) || 0;
          
          // Get arancel
          const arancelResult = await sequelize.query(
            `SELECT * FROM arancel WHERE nro_os = :nro_os`,
            {
              replacements: { nro_os: detalle.nro_os_convenio },
              type: sequelize.QueryTypes.SELECT
            }
          );
          
          if (arancelResult.length > 0 && honorarios > 0) {
            const arancel = arancelResult[0];
            const categoria = detalle.categoria || 1;
            let uh = 0;
            
            if (categoria === 1) {
              uh = parseFloat(arancel.uh) || 0;
            } else if (categoria === 2) {
              uh = parseFloat(arancel.uh_especiales) || 0;
            } else if (categoria === 3) {
              uh = parseFloat(arancel.uh_alta) || 0;
            }
            
            detalle.valorCalculado = parseFloat((honorarios * uh).toFixed(2));
            totalOrden += detalle.valorCalculado;
          }
        }
      }
      
      ordenJson.OrdenDetalles = detalles;
      ordenJson.total_orden = totalOrden.toFixed(2);
      
      return ordenJson;
    }));

    res.json(ordenesConValores);
  } catch (error) {
    console.error('Error in getOrdenesByPaciente:', error);
    res.status(500).json({ message: error.message });
  }
};

// GET single order by cod_grabacion
const getOrdenById = async (req, res) => {
  try {
    const orden = await Orden.findByPk(req.params.id, {
      include: [
        {
          model: OrdenDetalle,
          include: [{ model: Practica }]
        },
        { model: ObraSocial }
      ]
    });
    if (!orden) return res.status(404).json({ message: 'Orden no encontrada' });
    res.json(orden);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

// POST create new order
const createOrden = async (req, res) => {
  const t = await sequelize.transaction();
  try {
    const {
      nro_paciente,
      nro_os,
      fecha,
      fecha_realizacion,
      nro_afiliado,
      nombre_medico,
      medico,
      observaciones,
      usuario,
      practicas = []
    } = req.body;

    if (!nro_paciente) {
      await t.rollback();
      return res.status(400).json({ message: 'nro_paciente es obligatorio' });
    }
    if (!fecha) {
      await t.rollback();
      return res.status(400).json({ message: 'La fecha es obligatoria' });
    }

    const orden = await Orden.create({
      nro_paciente,
      nro_os: nro_os || 0,
      fecha,
      fecha_realizacion: fecha_realizacion || fecha,
      fecha_grabacion: new Date().toISOString().slice(0, 10),
      nro_afiliado: nro_afiliado || '',
      nombre_medico: nombre_medico || '',
      medico: medico || '',
      observaciones: observaciones || '',
      usuario: usuario || 1,
      confirmada: 0,
      total_orden: 0
    }, { transaction: t });

    const cod_grabacion = orden.cod_grabacion;

    if (practicas.length > 0) {
      const detalles = practicas.map(p => ({
        cod_grabacion,
        nro_paciente,
        nro_practica: p.nro_practica,
        nro_os: p.nro_os || nro_os || 0,
        valor: p.valor || 0,
        confirmada: 'N'
      }));
      await OrdenDetalle.bulkCreate(detalles, { transaction: t });
    }

    await t.commit();

    const fullOrden = await Orden.findByPk(cod_grabacion, {
      include: [{ model: OrdenDetalle, include: [{ model: Practica }] }]
    });
    res.status(201).json(fullOrden);
  } catch (error) {
    await t.rollback();
    console.error('Error creating orden:', error);
    res.status(500).json({ message: error.message });
  }
};

// PUT update order header
const updateOrden = async (req, res) => {
  try {
    const { id } = req.params;
    const { fecha, fecha_realizacion, nro_os, nro_afiliado, nombre_medico, medico, observaciones } = req.body;

    const orden = await Orden.findByPk(id);
    if (!orden) return res.status(404).json({ message: 'Orden no encontrada' });

    await orden.update({ fecha, fecha_realizacion, nro_os, nro_afiliado, nombre_medico, medico, observaciones });
    res.json(orden);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

// POST add a practice to an existing order
const addPractica = async (req, res) => {
  try {
    const { id } = req.params;
    const { nro_practica, valor } = req.body;

    const orden = await Orden.findByPk(id);
    if (!orden) return res.status(404).json({ message: 'Orden no encontrada' });

    const existing = await OrdenDetalle.findOne({
      where: { cod_grabacion: id, nro_practica }
    });
    if (existing) {
      return res.status(409).json({ message: 'La practica ya esta en esta orden' });
    }

    const detalle = await OrdenDetalle.create({
      cod_grabacion: id,
      nro_paciente: orden.nro_paciente,
      nro_practica,
      nro_os: orden.nro_os,
      valor: valor || 0,
      confirmada: 'N'
    });

    const full = await OrdenDetalle.findByPk(detalle.cod_operacion, {
      include: [{ model: Practica }]
    });
    res.status(201).json(full);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

// DELETE remove a practice from an order
const removePractica = async (req, res) => {
  try {
    const { id, cod_operacion } = req.params;
    const detalle = await OrdenDetalle.findOne({
      where: { cod_operacion, cod_grabacion: id }
    });
    if (!detalle) return res.status(404).json({ message: 'Detalle no encontrado' });

    await detalle.destroy();
    res.json({ message: 'Practica eliminada de la orden' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

// GET search practices (for autocomplete)
const searchPracticas = async (req, res) => {
  try {
    const { q } = req.query;
    if (!q || q.length < 2) return res.json([]);

    const isNumeric = !isNaN(q) && q.trim() !== '';
    const isExactCode = isNumeric && String(Number(q)).length === String(q).length;

    let practicas;
    if (isExactCode) {
      practicas = await sequelize.query(
        `SELECT c.cod_practica, c.practica as nombre, c.honorarios as valor, c.nro_os, c.categoria
         FROM convenio_practica c
         WHERE c.cod_practica = :codNum
         ORDER BY c.practica
         LIMIT 20`,
        {
          replacements: { codNum: Number(q) },
          type: sequelize.QueryTypes.SELECT
        }
      );
    } else {
      practicas = await sequelize.query(
        `SELECT c.cod_practica, c.practica as nombre, c.honorarios as valor, c.nro_os, c.categoria
         FROM convenio_practica c
         WHERE c.practica LIKE :q OR CAST(c.cod_practica AS CHAR) LIKE :q
         ORDER BY c.practica
         LIMIT 20`,
        {
          replacements: { q: `%${q}%` },
          type: sequelize.QueryTypes.SELECT
        }
      );
    }

    console.log('searchPracticas:', { found: practicas.length });

    res.json(practicas.map(p => ({
      cod_practica: p.cod_practica,
      nombre: p.nombre,
      valor: p.valor || 0,
      nro_os: p.nro_os,
      categoria: p.categoria
    })));
  } catch (error) {
    console.error('searchPracticas error:', error);
    res.status(500).json({ message: error.message, stack: error.stack, type: error.name });
  }
};

// GET search insurance (OS) - simple list
const searchObrasSociales = async (req, res) => {
  try {
    const { q } = req.query;
    const obras = await ObraSocial.findAll({
      where: {
        [Op.or]: [
          { denominacion: { [Op.like]: `%${q}%` } },
          { sigla: { [Op.like]: `%${q}%` } },
          { nro_os: isNaN(q) ? 0 : Number(q) }
        ]
      },
      limit: 30,
      order: [['denominacion', 'ASC']]
    });
    res.json(obras);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

// GET search doctors (distinct nombre_medico & medico)
const searchMedicos = async (req, res) => {
  try {
    const { q } = req.query;
    const [results] = await sequelize.query(
      `SELECT MIN(medico) as medico, nombre_medico 
       FROM ordenes 
       WHERE nombre_medico LIKE :q OR medico LIKE :q 
       GROUP BY nombre_medico 
       HAVING nombre_medico != ''
       ORDER BY nombre_medico ASC 
       LIMIT 30`,
      { replacements: { q: `%${q || ''}%` } }
    );
    res.json(results);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

module.exports = {
  getOrdenesByPaciente,
  getOrdenById,
  createOrden,
  updateOrden,
  addPractica,
  removePractica,
  searchPracticas,
  searchObrasSociales,
  searchMedicos
};