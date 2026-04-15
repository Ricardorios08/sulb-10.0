const express = require('express');
const router = express.Router();
const ordenController = require('../controllers/ordenController');
const verifyToken = require('../middleware/auth');

/**
 * @swagger
 * /api/ordenes/search/medicos:
 *   get:
 *     summary: Buscar médicos
 *     tags: [Órdenes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: query
 *         name: q
 *         schema:
 *           type: string
 *         description: Término de búsqueda
 *     responses:
 *       200:
 *         description: Lista de médicos
 */
router.get('/search/medicos', verifyToken, ordenController.searchMedicos);

/**
 * @swagger
 * /api/ordenes/search/practicas:
 *   get:
 *     summary: Buscar prácticas
 *     tags: [Órdenes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: query
 *         name: q
 *         schema:
 *           type: string
 *         description: Término de búsqueda
 *       - in: query
 *         name: nro_os
 *         schema:
 *           type: integer
 *         description: Número de obra social
 *     responses:
 *       200:
 *         description: Lista de prácticas
 */
router.get('/search/practicas', verifyToken, ordenController.searchPracticas);

/**
 * @swagger
 * /api/ordenes/search/os:
 *   get:
 *     summary: Buscar obras sociales
 *     tags: [Órdenes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: query
 *         name: q
 *         schema:
 *           type: string
 *         description: Término de búsqueda
 *     responses:
 *       200:
 *         description: Lista de obras sociales
 */
router.get('/search/os', verifyToken, ordenController.searchObrasSociales);

/**
 * @swagger
 * /api/ordenes/paciente/{nro_paciente}:
 *   get:
 *     summary: Obtener órdenes por paciente
 *     tags: [Órdenes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: nro_paciente
 *         required: true
 *         schema:
 *           type: integer
 *         description: Número de paciente
 *     responses:
 *       200:
 *         description: Lista de órdenes del paciente
 */
router.get('/paciente/:nro_paciente', verifyToken, ordenController.getOrdenesByPaciente);

/**
 * @swagger
 * /api/ordenes/{id}:
 *   get:
 *     summary: Obtener orden por ID
 *     tags: [Órdenes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
 *         required: true
 *         schema:
 *           type: integer
 *         description: ID de la orden
 *     responses:
 *       200:
 *         description: Orden encontrada
 *       404:
 *         description: Orden no encontrada
 */
router.get('/:id', verifyToken, ordenController.getOrdenById);

/**
 * @swagger
 * /api/ordenes:
 *   post:
 *     summary: Crear nueva orden
 *     tags: [Órdenes]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               nro_paciente:
 *                 type: integer
 *               nro_os:
 *                 type: integer
 *               fecha:
 *                 type: string
 *                 format: date
 *               observaciones:
 *                 type: string
 *     responses:
 *       201:
 *         description: Orden creada
 */
router.post('/', verifyToken, ordenController.createOrden);

/**
 * @swagger
 * /api/ordenes/{id}:
 *   put:
 *     summary: Actualizar orden
 *     tags: [Órdenes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
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
 *         description: Orden actualizada
 */
router.put('/:id', verifyToken, ordenController.updateOrden);

/**
 * @swagger
 * /api/ordenes/{id}/practica:
 *   post:
 *     summary: Agregar práctica a orden
 *     tags: [Órdenes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
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
 *               nro_practica:
 *                 type: integer
 *               nro_os:
 *                 type: integer
 *               categoria:
 *                 type: integer
 *     responses:
 *       201:
 *         description: Práctica agregada
 */
router.post('/:id/practica', verifyToken, ordenController.addPractica);

/**
 * @swagger
 * /api/ordenes/{id}/practica/{cod_operacion}:
 *   delete:
 *     summary: Eliminar práctica de orden
 *     tags: [Órdenes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
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
 *         description: Práctica eliminada
 */
router.delete('/:id/practica/:cod_operacion', verifyToken, ordenController.removePractica);

module.exports = router;
