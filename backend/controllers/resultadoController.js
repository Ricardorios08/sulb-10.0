const { Orden, OrdenDetalle, Paciente, Practica } = require('../models/associations');
const Convenio = require('../models/ConvenioPractica');
const DetalleReferencia = require('../models/DetalleReferencia');
const DetalleHemo = require('../models/DetalleHemo');
const Arancel = require('../models/Arancel');

const getResultados = async (req, res) => {
  const { cod_grabacion } = req.params;

  try {
    const orden = await Orden.findOne({ where: { cod_grabacion } });
    if (!orden) return res.status(404).json({ message: 'Orden no encontrada' });

    const detalles = await OrdenDetalle.findAll({
      where: { cod_grabacion },
      include: [
        {
          model: Practica,
          attributes: ['practica', 'cod_practica']
        }
      ]
    });

    const resultados = await Promise.all(detalles.map(async (detalle) => {
      // 1. Get practice class from convenio_practica
      // Try OS-specific first
      let convenio = await Convenio.findOne({
        where: { 
          cod_practica: detalle.nro_practica,
          nro_os: orden.nro_os
        }
      });

      // If not found, try a default/global one
      if (!convenio) {
        convenio = await Convenio.findOne({
          where: { cod_practica: detalle.nro_practica }
        });
      }

      const clase = convenio ? convenio.clase : 0;
      
      // Calculate value: honorarios (ub) * arancel.uh
      let valorCalculado = null;
      if (convenio) {
        const honorarios = parseFloat(convenio.honorarios) || 0;
        
        // Get arancel for the OS
        const arancel = await Arancel.findOne({
          where: { nro_os: orden.nro_os }
        });
        
        if (arancel && honorarios > 0) {
          // Determine which uh to use based on category
          const categoria = convenio.categoria || 1;
          let uh = 0;
          
          if (categoria === 1) {
            uh = parseFloat(arancel.uh) || 0;
          } else if (categoria === 2) {
            uh = parseFloat(arancel.uh_especiales) || 0;
          } else if (categoria === 3) {
            uh = parseFloat(arancel.uh_alta) || 0;
          }
          
          valorCalculado = parseFloat((honorarios * uh).toFixed(2));
        }
      }

      let resultado = null;

      if (clase === 0) {
        resultado = await DetalleReferencia.findOne({
          where: { 
            cod_grabacion: detalle.cod_grabacion,
            nro_practica: detalle.nro_practica
          }
        });
      } else if (clase === 1) {
        // Complex (e.g. Hemogram 475)
        if (detalle.nro_practica === 475) {
          resultado = await DetalleHemo.findOne({
            where: { 
              cod_grabacion: detalle.cod_grabacion,
              nro_practica: detalle.nro_practica
            }
          });
        }
      }

      return {
        ...detalle.toJSON(),
        clase,
        valorCalculado,
        resultado: resultado ? resultado.toJSON() : null,
        practicaNombre: detalle.Practica ? detalle.Practica.practica : 'Desconocida'
      };
    }));

    res.json(resultados);
  } catch (error) {
    console.error('Error fetching resultados:', error);
    res.status(500).json({ message: 'Error al obtener los resultados' });
  }
};

const saveResultados = async (req, res) => {
  const { cod_grabacion } = req.params;
  const { resultados } = req.body;

  try {
    for (const item of resultados) {
      if (item.clase === 0) {
        // Find existing or create new
        const [record, created] = await DetalleReferencia.findOrCreate({
          where: { 
            cod_grabacion: item.cod_grabacion,
            nro_practica: item.nro_practica 
          },
          defaults: {
            valor: item.valor,
            nro_paciente: item.nro_paciente,
            nro_orden: item.nro_orden,
          }
        });

        if (!created) {
          await record.update({ valor: item.valor });
        }
      } else if (item.clase === 1 && item.nro_practica === 475) {
        // Save to detalle_hemo
        const [record, created] = await DetalleHemo.findOrCreate({
          where: { 
            cod_grabacion: item.cod_grabacion,
            nro_practica: item.nro_practica 
          },
          defaults: {
            ...item.hemoData,
            nro_paciente: item.nro_paciente,
            nro_orden: item.nro_orden,
          }
        });

        if (!created) {
          await record.update(item.hemoData);
        }
      }
    }
    res.json({ message: 'Resultados guardados correctamente' });
  } catch (error) {
    console.error('Error saving resultados:', error);
    res.status(500).json({ message: 'Error al guardar los resultados' });
  }
};

module.exports = { getResultados, saveResultados };