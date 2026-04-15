const express = require('express');
const router = express.Router();
const verifyToken = require('../middleware/auth');
const { sequelize } = require('../config/db');

const getReferencias = async (req, res) => {
  try {
    const { cod_practica } = req.params;
    const query = `
      SELECT * FROM referencia 
      WHERE cod_practica = ?
      ORDER BY nro_ref
    `;
    const results = await sequelize.query(query, {
      replacements: [cod_practica],
      type: sequelize.QueryTypes.SELECT,
      raw: true
    });
    res.json(Array.isArray(results) ? results : [results]);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const saveReferencia = async (req, res) => {
  try {
    const { cod_practica } = req.params;
    const {
      tipo, columna1, desde, hasta, columna2, anio_d, anio_h, nro_ref, cod_operacion
    } = req.body;
    
    if (cod_operacion) {
      const query = `
        UPDATE referencia SET
          tipo = ?, desde = ?, hasta = ?, columna1 = ?, columna2 = ?, anio_d = ?, anio_h = ?
        WHERE cod_operacion = ?
      `;
      await sequelize.query(query, {
        replacements: [tipo, desde, hasta, columna1, columna2, anio_d, anio_h, cod_operacion]
      });
    } else {
      const query = `
        INSERT INTO referencia 
          (cod_practica, cod_operacion, tipo, desde, hasta, unidades, columna1, columna2, anio_d, anio_h, nro_ref, usuario)
        VALUES (?, 0, ?, ?, ?, '', ?, ?, ?, ?, ?, 0)
      `;
      await sequelize.query(query, {
        replacements: [cod_practica, tipo, desde, hasta, columna1, columna2, anio_d, anio_h, nro_ref]
      });
    }
    
    res.json({ message: 'Referencia guardada correctamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const deleteReferencia = async (req, res) => {
  try {
    const { cod_practica, cod_operacion } = req.params;
    const query = `DELETE FROM referencia WHERE cod_practica = ? AND cod_operacion = ?`;
    await sequelize.query(query, {
      replacements: [cod_practica, cod_operacion]
    });
    res.json({ message: 'Referencia eliminada correctamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

/**
 * @swagger
 * /api/referencias/{cod_practica}:
 *   get:
 *     summary: Obtener referencias de una práctica
 *     tags: [Referencias]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: cod_practica
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Lista de referencias
 */
router.get('/:cod_practica', verifyToken, getReferencias);

/**
 * @swagger
 * /api/referencias/{cod_practica}:
 *   post:
 *     summary: Guardar referencia
 *     tags: [Referencias]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: cod_practica
 *         required: true
 *         schema:
 *           type: integer
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               tipo:
 *                 type: string
 *               desde:
 *                 type: number
 *               hasta:
 *                 type: number
 *               columna1:
 *                 type: string
 *               cod_operacion:
 *                 type: integer
 *     responses:
 *       201:
 *         description: Referencia guardada
 */
router.post('/:cod_practica', verifyToken, saveReferencia);

/**
 * @swagger
 * /api/referencias/{cod_practica}/{cod_operacion}:
 *   delete:
 *     summary: Eliminar referencia
 *     tags: [Referencias]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: cod_practica
 *         required: true
 *         schema:
 *           type: integer
 *       - in: path
 *         name: cod_operacion
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Referencia eliminada
 */
router.delete('/:cod_practica/:cod_operacion', verifyToken, deleteReferencia);

module.exports = router;
