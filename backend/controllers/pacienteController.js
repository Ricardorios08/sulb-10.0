const { Paciente, Orden } = require('../models/associations');
const { sequelize } = require('../config/db');
const { Op } = require('sequelize');

const getAllPacientes = async (req, res) => {
  try {
    const { search, startDate: rawStart, endDate: rawEnd, practica } = req.query;
    let startDate = rawStart;
    let endDate = rawEnd;

    // Auto-swap if dates are inverted
    if (startDate && endDate && startDate > endDate) {
      [startDate, endDate] = [endDate, startDate];
    }

    const conditions = [];

    // 1. Patient Search: Name, DNI, or Protocol (Ignores Dates)
    if (search) {
      const parts = search.trim().split(/[\s,]+/).filter(Boolean);
      conditions.push({
        [Op.and]: parts.map(part => ({
          [Op.or]: [
            { nombre: { [Op.like]: `%${part}%` } },
            { apellido: { [Op.like]: `%${part}%` } },
            { nro_documento: { [Op.like]: `%${part}%` } },
            sequelize.literal(`EXISTS (SELECT 1 FROM ordenes AS o WHERE o.nro_paciente = Paciente.nro_paciente AND o.cod_grabacion = '${part}')`)
          ]
        }))
      });
    }

    // 2. Practice Search: Strictly respects Date Range
    if (practica) {
      if (!startDate || !endDate) {
        return res.status(400).json({ message: 'Se requiere un rango de fechas para buscar por práctica.' });
      }
      conditions.push({
        nro_paciente: {
          [Op.in]: sequelize.literal(`(
            SELECT DISTINCT o.nro_paciente 
            FROM ordenes o
            JOIN detalle d ON o.cod_grabacion = d.cod_grabacion
            WHERE d.nro_practica = ${Number(practica)}
            AND o.fecha BETWEEN '${startDate}' AND '${endDate}'
          )`)
        }
      });
    } 
    // 3. Date-only Search: If no text search is provided
    else if (!search && startDate && endDate) {
      conditions.push({
        nro_paciente: {
          [Op.in]: sequelize.literal(`(
            SELECT DISTINCT nro_paciente 
            FROM ordenes 
            WHERE fecha BETWEEN '${startDate}' AND '${endDate}'
          )`)
        }
      });
    }

    const pacientes = await Paciente.findAll({
      attributes: {
        include: [
          [
            sequelize.literal(`(
              SELECT COUNT(*)
              FROM ordenes AS o
              WHERE o.nro_paciente = Paciente.nro_paciente
            )`),
            'ordenesCount'
          ],
          [
            sequelize.literal(`(
              SELECT MAX(fecha)
              FROM ordenes AS o
              WHERE o.nro_paciente = Paciente.nro_paciente
            )`),
            'ultimaFecha'
          ],
          [
            sequelize.literal(`(
              SELECT MAX(cod_grabacion)
              FROM ordenes AS o
              WHERE o.nro_paciente = Paciente.nro_paciente
            )`),
            'ultimaOrdenId'
          ]
        ]
      },
      where: conditions.length > 0 ? { [Op.and]: conditions } : {},
      order: [
        [
          sequelize.literal(`(
            SELECT MAX(cod_grabacion)
            FROM ordenes AS o
            WHERE o.nro_paciente = Paciente.nro_paciente
          )`),
          'DESC'
        ]
      ],
      limit: 1000
    });
    
    res.json(pacientes);
  } catch (error) {
    console.error('Error in getAllPacientes:', error);
    res.status(500).json({ message: error.message });
  }
};

const getPacienteById = async (req, res) => {
  try {
    const { Paciente, ObraSocial } = require('../models/associations');
    const paciente = await Paciente.findByPk(req.params.id, {
      include: [{ model: ObraSocial }]
    });
    if (paciente) {
      res.json(paciente);
    } else {
      res.status(404).json({ message: 'Paciente no encontrado' });
    }
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

module.exports = {
  getAllPacientes,
  getPacienteById
};
