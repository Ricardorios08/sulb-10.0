const express = require('express');
const router = express.Router();
const { getResultados, saveResultados } = require('../controllers/resultadoController');

/**
 * @swagger
 * /api/resultados/{cod_grabacion}:
 *   get:
 *     summary: Obtener resultados de una orden
 *     tags: [Resultados]
 *     parameters:
 *       - in: path
 *         name: cod_grabacion
 *         required: true
 *         schema:
 *           type: integer
 *         description: Código de grabación de la orden
 *     responses:
 *       200:
 *         description: Resultados encontrados
 */
router.get('/:cod_grabacion', getResultados);

/**
 * @swagger
 * /api/resultados/{cod_grabacion}:
 *   post:
 *     summary: Guardar resultados de una orden
 *     tags: [Resultados]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               resultados:
 *                 type: array
 *                 items:
 *                   type: object
 *               nro_practica:
 *                 type: integer
 *     responses:
 *       201:
 *         description: Resultados guardados
 */
router.post('/:cod_grabacion', saveResultados);

module.exports = router;
