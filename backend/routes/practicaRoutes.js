const express = require('express');
const router = express.Router();
const verifyToken = require('../middleware/auth');
const { sequelize } = require('../config/db');

const CLASE_OPTIONS = {
  0: 'Simple',
  1: 'Compleja',
  2: 'Módulo',
  3: 'Texto',
  4: 'Compuesto'
};

const getPracticas = async (req, res) => {
  try {
    const { search, clase } = req.query;
    
    let query = 'SELECT * FROM practica';
    let conditions = [];
    let replacements = [];
    
    if (search) {
      conditions.push('(cod_practica LIKE ? OR practica LIKE ?)');
      replacements.push(`%${search}%`, `%${search}%`);
    }
    
    if (clase !== undefined && clase !== '') {
      conditions.push('clase = ?');
      replacements.push(clase);
    }
    
    if (conditions.length > 0) {
      query += ' WHERE ' + conditions.join(' AND ');
    }
    
    query += ' ORDER BY cod_practica';
    
    const results = await sequelize.query(query, {
      replacements,
      type: sequelize.QueryTypes.SELECT,
      raw: true
    });
    
    const formatted = results.map(r => ({
      ...r,
      clase_texto: CLASE_OPTIONS[r.clase] || 'Desconocida'
    }));
    
    res.json(formatted);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const getPracticaById = async (req, res) => {
  try {
    const { cod_practica, nro_os } = req.params;
    const query = 'SELECT * FROM practica WHERE cod_practica = ? AND nro_os = ?';
    const [result] = await sequelize.query(query, {
      replacements: [cod_practica, nro_os],
      type: sequelize.QueryTypes.SELECT,
      raw: true
    });
    res.json(result);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const updatePractica = async (req, res) => {
  try {
    const { cod_practica, nro_os } = req.params;
    const { practica, metodo, unidad, clase, tipo_det, deriva, lab_derivacion, decimal, honorarios, valor, categoria } = req.body;
    
    const query = `
      UPDATE practica SET
        practica = ?, metodo = ?, unidad = ?, clase = ?, tipo_det = ?, 
        deriva = ?, lab_derivacion = ?, \`decimal\` = ?, honorarios = ?, valor = ?, categoria = ?
      WHERE cod_practica = ? AND nro_os = ?
    `;
    
    await sequelize.query(query, {
      replacements: [practica, metodo, unidad, clase, tipo_det, deriva || 0, lab_derivacion || 0, decimal || 0, honorarios, valor, categoria || 1, cod_practica, nro_os]
    });
    
    res.json({ message: 'Práctica actualizada correctamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const createPractica = async (req, res) => {
  try {
    const { cod_practica, practica, metodo, unidad, clase, tipo_det, deriva, lab_derivacion, decimal, honorarios, valor, categoria } = req.body;
    
    const query = `
      INSERT INTO practica 
        (cod_practica, nro_os, practica, metodo, unidad, clase, tipo_det, deriva, lab_derivacion, \`decimal\`, honorarios, valor, categoria)
      VALUES (?, '4975', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    `;
    
    await sequelize.query(query, {
      replacements: [cod_practica, practica, metodo || '', unidad || '', clase || 1, tipo_det || 'Libre', deriva || 0, lab_derivacion || 0, decimal || 0, honorarios || '0.00', valor || '0.00', categoria || 1]
    });
    
    res.json({ message: 'Práctica creada correctamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const getLastCodPractica = async (req, res) => {
  try {
    const [results] = await sequelize.query('SELECT MAX(cod_practica) as lastCod FROM practica');
    const lastCod = results && results.length > 0 ? results[0].lastCod : 0;
    res.json({ lastCod: lastCod || 0 });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

/**
 * @swagger
 * /api/practicas:
 *   get:
 *     summary: Obtener prácticas
 *     tags: [Prácticas]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: query
 *         name: search
 *         schema:
 *           type: string
 *         description: Término de búsqueda
 *       - in: query
 *         name: clase
 *         schema:
 *           type: integer
 *         description: Clase de práctica (0=Simple, 1=Compleja, etc)
 *     responses:
 *       200:
 *         description: Lista de prácticas
 */
router.get('/', verifyToken, getPracticas);

/**
 * @swagger
 * /api/practicas/last/codigo:
 *   get:
 *     summary: Obtener último código de práctica
 *     tags: [Prácticas]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Último código
 */
router.get('/last/codigo', verifyToken, getLastCodPractica);

/**
 * @swagger
 * /api/practicas/options/metodos:
 *   get:
 *     summary: Obtener métodos disponibles
 *     tags: [Prácticas]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de métodos
 */
router.get('/options/metodos', verifyToken, async (req, res) => {
  try {
    const query = 'SELECT DISTINCT metodo FROM practica WHERE metodo IS NOT NULL AND metodo != "" ORDER BY metodo';
    const results = await sequelize.query(query, {
      type: sequelize.QueryTypes.SELECT,
      raw: true
    });
    res.json(results.map(r => r.metodo));
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
});

/**
 * @swagger
 * /api/practicas/options/unidades:
 *   get:
 *     summary: Obtener unidades disponibles
 *     tags: [Prácticas]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de unidades
 */
router.get('/options/unidades', verifyToken, async (req, res) => {
  try {
    const query = 'SELECT DISTINCT unidad FROM practica WHERE unidad IS NOT NULL AND unidad != "" ORDER BY unidad';
    const results = await sequelize.query(query, {
      type: sequelize.QueryTypes.SELECT,
      raw: true
    });
    res.json(results.map(r => r.unidad));
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
});

/**
 * @swagger
 * /api/practicas/{cod_practica}/{nro_os}:
 *   get:
 *     summary: Obtener práctica por código y obra social
 *     tags: [Prácticas]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: cod_practica
 *         required: true
 *         schema:
 *           type: integer
 *       - in: path
 *         name: nro_os
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Práctica encontrada
 */
router.get('/:cod_practica/:nro_os', verifyToken, getPracticaById);

/**
 * @swagger
 * /api/practicas/{cod_practica}/{nro_os}:
 *   put:
 *     summary: Actualizar práctica
 *     tags: [Prácticas]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: cod_practica
 *         required: true
 *         schema:
 *           type: integer
 *       - in: path
 *         name: nro_os
 *         required: true
 *         schema:
 *           type: integer
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *     responses:
 *       200:
 *         description: Práctica actualizada
 */
router.put('/:cod_practica/:nro_os', verifyToken, updatePractica);

/**
 * @swagger
 * /api/practicas:
 *   post:
 *     summary: Crear práctica
 *     tags: [Prácticas]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               cod_practica:
 *                 type: integer
 *               practica:
 *                 type: string
 *               metodo:
 *                 type: string
 *               unidad:
 *                 type: string
 *               clase:
 *                 type: integer
 *               honorarios:
 *                 type: number
 *     responses:
 *       201:
 *         description: Práctica creada
 */
router.post('/', verifyToken, createPractica);

/**
 * @swagger
 * /api/practicas/{cod_practica}/{nro_os}:
 *   delete:
 *     summary: Eliminar práctica
 *     tags: [Prácticas]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: cod_practica
 *         required: true
 *         schema:
 *           type: integer
 *       - in: path
 *         name: nro_os
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Práctica eliminada
 */
router.delete('/:cod_practica/:nro_os', verifyToken, async (req, res) => {
  try {
    const { cod_practica, nro_os } = req.params;
    await sequelize.query('DELETE FROM practica WHERE cod_practica = ? AND nro_os = ?', {
      replacements: [cod_practica, nro_os]
    });
    res.json({ message: 'Práctica eliminada correctamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
});

module.exports = router;
