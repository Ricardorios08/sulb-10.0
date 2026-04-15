const express = require('express');
const router = express.Router();
const verifyToken = require('../middleware/auth');
const { sequelize } = require('../config/db');

const getObrasSociales = async (req, res) => {
  try {
    const { search } = req.query;
    
    let query = `
      SELECT DISTINCT d.* 
      FROM datos_os d
      LEFT JOIN convenios c ON d.nro_os = c.nro_os
      WHERE d.nro_os > 0
    `;
    let replacements = [];
    
    if (search) {
      query += ' AND (CAST(d.nro_os AS CHAR) LIKE ? OR d.denominacion LIKE ? OR d.sigla LIKE ?)';
      replacements = [`%${search}%`, `%${search}%`, `%${search}%`];
    }
    
    query += ' ORDER BY d.denominacion';
    
    const results = await sequelize.query(query, {
      replacements,
      type: sequelize.QueryTypes.SELECT,
      raw: true
    });
    
    res.json(results);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const getObraSocialById = async (req, res) => {
  try {
    const nro_os = parseInt(req.params.nro_os, 10);
    
    const [datos] = await sequelize.query(
      'SELECT * FROM datos_os WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true }
    );
    
    const [convenios] = await sequelize.query(
      'SELECT * FROM convenios WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true }
    );
    
    const arancelResult = await sequelize.query(
      'SELECT * FROM arancel WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true, logging: console.log }
    );
    const arancel = Array.isArray(arancelResult) ? arancelResult[0] || arancelResult : {};

    const [capitacion] = await sequelize.query(
      'SELECT * FROM capitacion WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true }
    );

    const [formaPago] = await sequelize.query(
      'SELECT * FROM forma_pago WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true }
    );

    const [incremento] = await sequelize.query(
      'SELECT * FROM incremento WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true }
    );

    const [opFacturacion] = await sequelize.query(
      'SELECT * FROM op_facturacion WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true }
    );

    const [opPracticas] = await sequelize.query(
      'SELECT * FROM op_practicas WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true }
    );

    const [opGrabacion] = await sequelize.query(
      'SELECT * FROM op_grabacion WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true }
    );

    const [esCapita] = await sequelize.query(
      'SELECT * FROM es_capita WHERE nro_os = ?',
      { replacements: [nro_os], type: sequelize.QueryTypes.SELECT, raw: true }
    );
    
    res.json({ 
      datos, 
      convenios: convenios[0] || {}, 
      arancel: arancel || {}, 
      capitacion: capitacion[0] || {},
      formaPago: formaPago[0] || {},
      incremento: incremento[0] || {},
      opFacturacion: opFacturacion[0] || {},
      opPracticas: opPracticas[0] || {},
      opGrabacion: opGrabacion[0] || {},
      esCapita: esCapita[0] || {}
    });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const updateDatosOS = async (req, res) => {
  try {
    const { nro_os } = req.params;
    const { 
      denominacion, sigla, domicilio_n, localidad_n, cod_area_n, telefono_n, 
      email_n, nro_prestador, contacto, domi_facturacion, activa
    } = req.body;
    
    const query = `
      UPDATE datos_os SET
        denominacion = ?, sigla = ?, domicilio_n = ?, localidad_n = ?, 
        cod_area_n = ?, telefono_n = ?, email_n = ?, nro_prestador = ?, 
        contacto = ?, domi_facturacion = ?, activa = ?
      WHERE nro_os = ?
    `;
    
    await sequelize.query(query, {
      replacements: [denominacion, sigla, domicilio_n, localidad_n, cod_area_n, telefono_n, email_n, nro_prestador, contacto, domi_facturacion, activa, nro_os]
    });
    
    res.json({ message: 'Datos de obra social actualizados' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const createDatosOS = async (req, res) => {
  try {
    const { 
      denominacion, sigla, domicilio_n, localidad_n, cod_area_n, telefono_n, 
      email_n, nro_prestador, contacto, domi_facturacion, activa
    } = req.body;
    
    const query = `
      INSERT INTO datos_os (
        denominacion, sigla, domicilio_n, localidad_n, cod_area_n, telefono_n, 
        email_n, nro_prestador, contacto, domi_facturacion, activa
      ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    `;
    
    const [result] = await sequelize.query(query, {
      replacements: [
        denominacion || '', sigla || '', domicilio_n || '', localidad_n || '', 
        cod_area_n || '', telefono_n || 0, email_n || '', nro_prestador || '', 
        contacto || '', domi_facturacion || '', activa !== undefined ? activa : 1
      ],
      type: sequelize.QueryTypes.INSERT
    });
    
    res.status(201).json({ 
      message: 'Obra social creada exitosamente',
      nro_os: result
    });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const saveObraSocialCompleta = async (req, res) => {
  const t = await sequelize.transaction();
  try {
    const { nro_os } = req.params;
    const { datos, convenios, arancel, capitacion, formaPago, incremento, opFacturacion, opPracticas, opGrabacion, esCapita } = req.body;
    
    // Update datos_os
    if (datos) {
      await sequelize.query(`
        UPDATE datos_os SET
          denominacion = ?, sigla = ?, domicilio_n = ?, localidad_n = ?, 
          cod_area_n = ?, telefono_n = ?, email_n = ?, nro_prestador = ?, 
          contacto = ?, domi_facturacion = ?, activa = ?
        WHERE nro_os = ?
      `, {
        replacements: [
          datos.denominacion || '', datos.sigla || '', datos.domicilio_n || '', datos.localidad_n || '',
          datos.cod_area_n || '', datos.telefono_n || 0, datos.email_n || '', datos.nro_prestador || '',
          datos.contacto || '', datos.domi_facturacion || '', datos.activa !== undefined ? datos.activa : 1,
          nro_os
        ],
        transaction: t
      });
    }
    
    // Update convenios (single record per OS)
    if (convenios) {
      const [existing] = await sequelize.query(
        'SELECT nro_os FROM convenios WHERE nro_os = ?',
        { replacements: [nro_os], transaction: t }
      );
      if (existing.length > 0) {
        await sequelize.query(`
          UPDATE convenios SET inicio = ?, fin = ?, tipo = ? WHERE nro_os = ?
        `, {
          replacements: [convenios.inicio || '', convenios.fin || '', convenios.tipo || '', nro_os],
          transaction: t
        });
      } else {
        await sequelize.query(`
          INSERT INTO convenios (nro_os, inicio, fin, tipo) VALUES (?, ?, ?, ?)
        `, {
          replacements: [nro_os, convenios.inicio || '', convenios.fin || '', convenios.tipo || ''],
          transaction: t
        });
      }
    }
    
    // Update arancel (single record per OS)
    if (arancel) {
      const [existing] = await sequelize.query(
        'SELECT nro_os FROM arancel WHERE nro_os = ?',
        { replacements: [nro_os], transaction: t }
      );
      if (existing.length > 0) {
        await sequelize.query(`
          UPDATE arancel SET modalidad = ?, ug = ?, uh = ?, modalidad_especiales = ?, ug_especiales = ?, uh_especiales = ?, modalidad_alta = ?, ug_alta = ?, uh_alta = ?, nomenclador = ? WHERE nro_os = ?
        `, {
          replacements: [
            arancel.modalidad || '', arancel.ug || 0, arancel.uh || 0, 
            arancel.modalidad_especiales || '', arancel.ug_especiales || 0, arancel.uh_especiales || 0,
            arancel.modalidad_alta || '', arancel.ug_alta || 0, arancel.uh_alta || 0, arancel.nomenclador || '',
            nro_os
          ],
          transaction: t
        });
      } else {
        await sequelize.query(`
          INSERT INTO arancel (nro_os, modalidad, ug, uh, modalidad_especiales, ug_especiales, uh_especiales, modalidad_alta, ug_alta, uh_alta, nomenclador)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        `, {
          replacements: [
            nro_os, arancel.modalidad || '', arancel.ug || 0, arancel.uh || 0,
            arancel.modalidad_especiales || '', arancel.ug_especiales || 0, arancel.uh_especiales || 0,
            arancel.modalidad_alta || '', arancel.ug_alta || 0, arancel.uh_alta || 0, arancel.nomenclador || ''
          ],
          transaction: t
        });
      }
    }
    
    // Update capitacion
    if (capitacion) {
      const [existing] = await sequelize.query(
        'SELECT nro_os FROM capitacion WHERE nro_os = ?',
        { replacements: [nro_os], transaction: t }
      );
      if (existing.length > 0) {
        await sequelize.query(`
          UPDATE capitacion SET prorrateo = ?, cuota = ?, porcentaje = ?, porcentaje_cuota = ? WHERE nro_os = ?
        `, {
          replacements: [capitacion.prorrateo || '', capitacion.cuota || '', capitacion.porcentaje || '', capitacion.porcentaje_cuota || '', nro_os],
          transaction: t
        });
      } else {
        await sequelize.query(`
          INSERT INTO capitacion (nro_os, prorrateo, cuota, porcentaje, porcentaje_cuota) VALUES (?, ?, ?, ?, ?)
        `, {
          replacements: [nro_os, capitacion.prorrateo || '', capitacion.cuota || '', capitacion.porcentaje || '', capitacion.porcentaje_cuota || ''],
          transaction: t
        });
      }
    }
    
    // Update forma_pago
    if (formaPago) {
      const [existing] = await sequelize.query(
        'SELECT nro_os FROM forma_pago WHERE nro_os = ?',
        { replacements: [nro_os], transaction: t }
      );
      if (existing.length > 0) {
        await sequelize.query(`
          UPDATE forma_pago SET vencimiento = ?, antiguedad = ?, interes = ?, plan = ? WHERE nro_os = ?
        `, {
          replacements: [formaPago.vencimiento || '', formaPago.antiguedad || '', formaPago.interes || '', formaPago.plan || '', nro_os],
          transaction: t
        });
      } else {
        await sequelize.query(`
          INSERT INTO forma_pago (nro_os, vencimiento, antiguedad, interes, plan) VALUES (?, ?, ?, ?, ?)
        `, {
          replacements: [nro_os, formaPago.vencimiento || '', formaPago.antiguedad || '', formaPago.interes || '', formaPago.plan || ''],
          transaction: t
        });
      }
    }
    
    // Update incremento
    if (incremento) {
      const [existing] = await sequelize.query(
        'SELECT nro_os FROM incremento WHERE nro_os = ?',
        { replacements: [nro_os], transaction: t }
      );
      if (existing.length > 0) {
        await sequelize.query(`
          UPDATE incremento SET material_descartable = ?, acto_bioquimico = ?, toma_muestra = ? WHERE nro_os = ?
        `, {
          replacements: [incremento.material_descartable || '', incremento.acto_bioquimico || '', incremento.toma_muestra || '', nro_os],
          transaction: t
        });
      } else {
        await sequelize.query(`
          INSERT INTO incremento (nro_os, material_descartable, acto_bioquimico, toma_muestra) VALUES (?, ?, ?, ?)
        `, {
          replacements: [nro_os, incremento.material_descartable || '', incremento.acto_bioquimico || '', incremento.toma_muestra || ''],
          transaction: t
        });
      }
    }
    
    // Update op_facturacion
    if (opFacturacion) {
      const [existing] = await sequelize.query(
        'SELECT nro_os FROM op_facturacion WHERE nro_os = ?',
        { replacements: [nro_os], transaction: t }
      );
      if (existing.length > 0) {
        await sequelize.query(`
          UPDATE op_facturacion SET detalle = ?, post_factura = ?, separacion = ?, coseguro = ?, valor_porcentaje = ?, coseguro_esp = ?, valor_porc_esp = ?, coseguro_comp = ?, valor_porc_comp = ?, gastos = ?, honorarios = ?, operacion = ?, porcentaje_total = ?, operacion_orden = ?, denominacion_ajuste = ?, iva = ? WHERE nro_os = ?
        `, {
          replacements: [
            opFacturacion.detalle || '', opFacturacion.post_factura || '', opFacturacion.separacion || '',
            opFacturacion.coseguro || '', opFacturacion.valor_porcentaje || '', opFacturacion.coseguro_esp || '',
            opFacturacion.valor_porc_esp || '', opFacturacion.coseguro_comp || '', opFacturacion.valor_porc_comp || '',
            opFacturacion.gastos || '', opFacturacion.honorarios || '', opFacturacion.operacion || '',
            opFacturacion.porcentaje_total || 0, opFacturacion.operacion_orden || '', opFacturacion.denominacion_ajuste || '',
            opFacturacion.iva || 0, nro_os
          ],
          transaction: t
        });
      } else {
        await sequelize.query(`
          INSERT INTO op_facturacion (nro_os, detalle, post_factura, separacion, coseguro, valor_porcentaje, coseguro_esp, valor_porc_esp, coseguro_comp, valor_porc_comp, gastos, honorarios, operacion, porcentaje_total, operacion_orden, denominacion_ajuste, iva)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        `, {
          replacements: [
            nro_os, opFacturacion.detalle || '', opFacturacion.post_factura || '', opFacturacion.separacion || '',
            opFacturacion.coseguro || '', opFacturacion.valor_porcentaje || '', opFacturacion.coseguro_esp || '',
            opFacturacion.valor_porc_esp || '', opFacturacion.coseguro_comp || '', opFacturacion.valor_porc_comp || '',
            opFacturacion.gastos || '', opFacturacion.honorarios || '', opFacturacion.operacion || '',
            opFacturacion.porcentaje_total || 0, opFacturacion.operacion_orden || '', opFacturacion.denominacion_ajuste || '',
            opFacturacion.iva || 0
          ],
          transaction: t
        });
      }
    }
    
    // Update op_practicas
    if (opPracticas) {
      const [existing] = await sequelize.query(
        'SELECT nro_os FROM op_practicas WHERE nro_os = ?',
        { replacements: [nro_os], transaction: t }
      );
      if (existing.length > 0) {
        await sequelize.query(`
          UPDATE op_practicas SET efector = ?, prescriptor = ?, afiliado = ? WHERE nro_os = ?
        `, {
          replacements: [opPracticas.efector || '', opPracticas.prescriptor || '', opPracticas.afiliado || '', nro_os],
          transaction: t
        });
      } else {
        await sequelize.query(`
          INSERT INTO op_practicas (nro_os, efector, prescriptor, afiliado) VALUES (?, ?, ?, ?)
        `, {
          replacements: [nro_os, opPracticas.efector || '', opPracticas.prescriptor || '', opPracticas.afiliado || ''],
          transaction: t
        });
      }
    }
    
    // Update op_grabacion
    if (opGrabacion) {
      const [existing] = await sequelize.query(
        'SELECT nro_os FROM op_grabacion WHERE nro_os = ?',
        { replacements: [nro_os], transaction: t }
      );
      if (existing.length > 0) {
        await sequelize.query(`
          UPDATE op_grabacion SET requiere_automatico = ?, requiere_autorizacion = ?, requiere_coseguro = ?, cos_en_orden = ? WHERE nro_os = ?
        `, {
          replacements: [opGrabacion.requiere_automatico || 'NO', opGrabacion.requiere_autorizacion || 'NO', opGrabacion.requiere_coseguro || 'NO', opGrabacion.cos_en_orden || 0, nro_os],
          transaction: t
        });
      } else {
        await sequelize.query(`
          INSERT INTO op_grabacion (nro_os, requiere_automatico, requiere_autorizacion, requiere_coseguro, cos_en_orden) VALUES (?, ?, ?, ?, ?)
        `, {
          replacements: [nro_os, opGrabacion.requiere_automatico || 'NO', opGrabacion.requiere_autorizacion || 'NO', opGrabacion.requiere_coseguro || 'NO', opGrabacion.cos_en_orden || 0],
          transaction: t
        });
      }
    }
    
    // Update es_capita
    if (esCapita !== undefined) {
      const [existing] = await sequelize.query(
        'SELECT nro_os FROM es_capita WHERE nro_os = ?',
        { replacements: [nro_os], transaction: t }
      );
      if (existing.length > 0) {
        await sequelize.query(`
          UPDATE es_capita SET es_capita = ? WHERE nro_os = ?
        `, {
          replacements: [esCapita.es_capita || 0, nro_os],
          transaction: t
        });
      } else {
        await sequelize.query(`
          INSERT INTO es_capita (nro_os, es_capita) VALUES (?, ?)
        `, {
          replacements: [nro_os, esCapita.es_capita || 0],
          transaction: t
        });
      }
    }
    
    await t.commit();
    res.json({ message: 'Obra social guardada exitosamente' });
  } catch (error) {
    await t.rollback();
    res.status(500).json({ message: error.message });
  }
};

const createConvenio = async (req, res) => {
  try {
    const { nro_os } = req.params;
    const { inicio, fin, tipo } = req.body;
    
    const query = `
      INSERT INTO convenios (nro_os, inicio, fin, tipo)
      VALUES (?, ?, ?, ?)
    `;
    
    await sequelize.query(query, {
      replacements: [nro_os, inicio || '', fin || '', tipo || ''],
      type: sequelize.QueryTypes.INSERT
    });
    
    res.status(201).json({ message: 'Convenio creado exitosamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const updateConvenio = async (req, res) => {
  try {
    const { nro_os } = req.params;
    const { inicio, fin, tipo, old_inicio, old_fin, old_tipo } = req.body;
    
    const query = `
      UPDATE convenios 
      SET inicio = ?, fin = ?, tipo = ?
      WHERE nro_os = ? AND inicio = ? AND fin = ? AND tipo = ?
    `;
    
    await sequelize.query(query, {
      replacements: [inicio || '', fin || '', tipo || '', nro_os, old_inicio || '', old_fin || '', old_tipo || ''],
      type: sequelize.QueryTypes.UPDATE
    });
    
    res.json({ message: 'Convenio actualizado exitosamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const deleteConvenio = async (req, res) => {
  try {
    const { nro_os } = req.params;
    const { inicio, fin, tipo } = req.query;
    
    const query = `
      DELETE FROM convenios 
      WHERE nro_os = ? AND inicio = ? AND fin = ? AND tipo = ?
    `;
    
    await sequelize.query(query, {
      replacements: [nro_os, inicio || '', fin || '', tipo || ''],
      type: sequelize.QueryTypes.DELETE
    });
    
    res.json({ message: 'Convenio eliminado exitosamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const createArancel = async (req, res) => {
  try {
    const { nro_os } = req.params;
    const { modalidad, ug, uh, modalidad_especiales, ug_especiales, uh_especiales, modalidad_alta, ug_alta, uh_alta, nomenclador } = req.body;
    
    const query = `
      INSERT INTO arancel (nro_os, modalidad, ug, uh, modalidad_especiales, ug_especiales, uh_especiales, modalidad_alta, ug_alta, uh_alta, nomenclador)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    `;
    
    await sequelize.query(query, {
      replacements: [nro_os, modalidad || '', ug || 0, uh || 0, modalidad_especiales || '', ug_especiales || 0, uh_especiales || 0, modalidad_alta || '', ug_alta || 0, uh_alta || 0, nomenclador || ''],
      type: sequelize.QueryTypes.INSERT
    });
    
    res.status(201).json({ message: 'Arancel creado exitosamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const updateArancel = async (req, res) => {
  try {
    const { nro_os } = req.params;
    const { modalidad, ug, uh, modalidad_especiales, ug_especiales, uh_especiales, modalidad_alta, ug_alta, uh_alta, nomenclador, old_modalidad } = req.body;
    
    const query = `
      UPDATE arancel 
      SET modalidad = ?, ug = ?, uh = ?, modalidad_especiales = ?, ug_especiales = ?, uh_especiales = ?, modalidad_alta = ?, ug_alta = ?, uh_alta = ?, nomenclador = ?
      WHERE nro_os = ? AND modalidad = ?
    `;
    
    await sequelize.query(query, {
      replacements: [modalidad || '', ug || 0, uh || 0, modalidad_especiales || '', ug_especiales || 0, uh_especiales || 0, modalidad_alta || '', ug_alta || 0, uh_alta || 0, nomenclador || '', nro_os, old_modalidad || ''],
      type: sequelize.QueryTypes.UPDATE
    });
    
    res.json({ message: 'Arancel actualizado exitosamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

const deleteArancel = async (req, res) => {
  try {
    const { nro_os } = req.params;
    const { modalidad } = req.query;
    
    const query = `DELETE FROM arancel WHERE nro_os = ? AND modalidad = ?`;
    
    await sequelize.query(query, {
      replacements: [nro_os, modalidad || ''],
      type: sequelize.QueryTypes.DELETE
    });
    
    res.json({ message: 'Arancel eliminado exitosamente' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

/**
 * @swagger
 * /api/obras-sociales:
 *   get:
 *     summary: Obtener obras sociales
 *     tags: [Obras Sociales]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: query
 *         name: search
 *         schema:
 *           type: string
 *     responses:
 *       200:
 *         description: Lista de obras sociales
 */
router.get('/', verifyToken, getObrasSociales);

/**
 * @swagger
 * /api/obras-sociales/{nro_os}:
 *   get:
 *     summary: Obtener obra social por número
 *     tags: [Obras Sociales]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: nro_os
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Datos de la obra social
 */
router.get('/:nro_os', verifyToken, getObraSocialById);

/**
 * @swagger
 * /api/obras-sociales:
 *   post:
 *     summary: Crear obra social
 *     tags: [Obras Sociales]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *     responses:
 *       201:
 *         description: Obra social creada
 */
router.post('/', verifyToken, createDatosOS);

/**
 * @swagger
 * /api/obras-sociales/{nro_os}:
 *   put:
 *     summary: Actualizar obra social
 *     tags: [Obras Sociales]
 *     security:
 *       - bearerAuth: []
 *     parameters:
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
 *         description: Obra social actualizada
 */
router.put('/:nro_os', verifyToken, updateDatosOS);

/**
 * @swagger
 * /api/obras-sociales/{nro_os}/completa:
 *   post:
 *     summary: Guardar obra social completa
 *     tags: [Obras Sociales]
 *     security:
 *       - bearerAuth: []
 *     parameters:
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
 *       201:
 *         description: Obra social guardada
 */
router.post('/:nro_os/completa', verifyToken, saveObraSocialCompleta);

router.post('/:nro_os/convenios', verifyToken, createConvenio);
router.put('/:nro_os/convenios', verifyToken, updateConvenio);
router.delete('/:nro_os/convenios', verifyToken, deleteConvenio);
router.post('/:nro_os/aranceles', verifyToken, createArancel);
router.put('/:nro_os/aranceles', verifyToken, updateArancel);
router.delete('/:nro_os/aranceles', verifyToken, deleteArancel);

module.exports = router;
