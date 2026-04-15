const express = require('express');
const router = express.Router();
const { getAllPacientes, getPacienteById } = require('../controllers/pacienteController');
const verifyToken = require('../middleware/auth');

/**
 * @swagger
 * /api/pacientes:
 *   get:
 *     summary: Obtener todos los pacientes
 *     tags: [Pacientes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: query
 *         name: search
 *         schema:
 *           type: string
 *         description: Término de búsqueda por nombre o número
 *     responses:
 *       200:
 *         description: Lista de pacientes
 */
router.get('/', verifyToken, getAllPacientes);

/**
 * @swagger
 * /api/pacientes/{id}:
 *   get:
 *     summary: Obtener paciente por ID
 *     tags: [Pacientes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
 *         required: true
 *         schema:
 *           type: integer
 *         description: Número de paciente
 *     responses:
 *       200:
 *         description: Paciente encontrado
 */
router.get('/:id', verifyToken, getPacienteById);

module.exports = router;
