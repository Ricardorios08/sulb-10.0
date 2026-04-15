 <?php 

global $inicio;
global $fin;
global $tipo;
global $modalidad;
global $ug;
global $uh;
global $prorrateo;
global $cuota;
global $porcentaje;
global $porcentaje_cuota;
global $vencimiento;
global $antiguedad;
global $interes;
global $plan;
global $material_descartable;
global $acto_bioquimico;
global $toma_muestra;
global $detalle;
global $post_factura;
global $separacion;
global $coseguro;
global $valor_porcentaje;
global $gastos;
global $honorarios;
global $operacion;
global $efector;
global $prescriptor;
global $afiliado;

$fecha = date("d/m/y");
include ("../../conexiones/config_os.php");
global $a;
$a=$_REQUEST['id'];

/* $sql6="select * from convenios where nro_os like '$a'";
$result6 = $db->Execute($sql6);

$inicio=strtoupper($result6->fields["inicio"]);
$fin=strtoupper($result6->fields["fin"]);
$tipo=strtoupper($result6->fields["tipo"]);

 $sql9="select * from datos_os where nro_os like '$a'";
$result9 = $db->Execute($sql9);

$denominacion=strtoupper($result9->fields["denominacion"]);
$sigla=strtoupper($result9->fields["sigla"]);



$sql="select * from arancel where nro_os like '$a'";
$result = $db->Execute($sql);

$modalidad=strtoupper($result->fields["modalidad"]);
$ug=strtoupper($result->fields["ug"]);
$uh=strtoupper($result->fields["uh"]);
$nomenclador=strtoupper($result->fields["nomenclador"]);


 $sql1="select * from capitacion where nro_os like '$a'";
$result1 = $db->Execute($sql1);

$prorrateo=strtoupper($result1->fields["prorrateo"]);
$cuota=strtoupper($result1->fields["cuota"]);
$porcentaje=strtoupper($result1->fields["porcentaje"]);
$porcentaje_cuota=strtoupper($result1->fields["porcentaje_cuota"]);


 $sql2="select * from forma_pago where nro_os like '$a'";
$result2 = $db->Execute($sql2);

$vencimiento=strtoupper($result2->fields["vencimiento"]);
$antiguedad=strtoupper($result2->fields["antiguedad"]);
$interes=strtoupper($result2->fields["interes"]);
$plan=strtoupper($result2->fields["plan"]);


 $sql3="select * from incremento where nro_os like '$a'";
$result3 = $db->Execute($sql3);

$material_descartable=strtoupper($result3->fields["material_descartable"]);
$acto_bioquimico=strtoupper($result3->fields["acto_bioquimico"]);
$toma_muestra=strtoupper($result3->fields["toma_muestra"]);

 $sql4="select * from op_facturacion where nro_os like '$a'";
$result4 = $db->Execute($sql4);

$detalle=strtoupper($result4->fields["detalle"]);
$post_factura=strtoupper($result4->fields["post_factura"]);
$separacion=strtoupper($result4->fields["separacion"]);
$coseguro=strtoupper($result4->fields["coseguro"]);
$valor_porcentaje=strtoupper($result4->fields["valor_porcentaje"]);
$gastos=strtoupper($result4->fields["gastos"]);
$honorarios=strtoupper($result4->fields["honorarios"]);
$operacion=strtoupper($result4->fields["operacion"]);


 $sql5="select * from op_practicas where nro_os like '$a'";
$result5 = $db->Execute($sql5);

$efector=strtoupper($result5->fields["efector"]);
$prescriptor=strtoupper($result5->fields["prescriptor"]);
$afiliado=strtoupper($result5->fields["afiliado"]);

*/
$bande_variables = 2;
include ("variables_convenio.php");
?>
<style type="text/css">
<!--
.Estilo2 {
	font-size: 24px;
	font-weight: bold;
}
.Estilo4 {
	font-size: 10px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo10 {
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo18 {font-size: x-small}
.Estilo19 {font-size: x-small; font-family: Arial, Helvetica, sans-serif; }
-->
</style>




<table width="103%" height="1163" border="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="28" colspan="10"><div align="center"><span class="Estilo2">Asociaci&oacute;n Bioqu&iacute;mica de Mendoza</span></div></td>
    <td height="28" colspan="3"><div align="right"><strong>Mendoza, <?php echo $fecha;;?></strong></div></td>
  </tr>
  <tr bgcolor="#000000">
    <td height="21" colspan="13"><div align="center" class="Estilo10">
      <div align="left">DATOS DE OBRAS SOCIALES: </div>
    </div></td>
  </tr>
  <tr>
    <td height="20" colspan="7"><div align="right" class="Estilo4 Estilo18">
      <div align="left">Obra Social: <span class="Estilo5"><strong><?php echo $denominacion;?></strong></span></div>
    </div>      </td>
    <td colspan="6"><div align="right" class="Estilo19">
        <div align="left">Sigla: <span class="Estilo5"><strong><?php echo $sigla;?> (<strong><?php echo $a;?>)</strong></strong></span></div>
    </div>      </td>
  </tr>
  <tr>
    <td height="20" colspan="4"><div align="right" class="Estilo19">
      <div align="left">Incripci&oacute;n: <span class="Estilo5"><strong><?php echo $inscripcion;?></strong></span></div>
    </div>      </td>
    <td colspan="9" class="Estilo19">Cuit:<strong><?php echo $cuit;?></strong></td>
  </tr>
  <tr>
    <td height="20" colspan="7"><div align="right" class="Estilo19">
      <div align="left">Domicilio: <span class="Estilo5"><strong><?php echo $domicilio_l;?></strong></span></div>
    </div>      </td>
    <td colspan="6"><div align="right" class="Estilo19">
      <div align="left">Localidad: <strong><?php echo $localidad_l;?></strong></div>
    </div>      
    </td>
  </tr>
  <tr>
    <td height="21" colspan="7"><div align="right" class="Estilo19">
      <div align="left">Cod Area<span class="Estilo5">: <strong><?php echo $cod_area_l;?> - </strong>Tel&eacute;fono:<strong> <strong><?php echo $telefono_l;?></strong></strong></span></div>
    </div>      <div align="right" class="Estilo19">
        <div align="left"></div>
      </div>      <div align="left" class="Estilo19"></div></td>
    <td colspan="6"><div align="right" class="Estilo19">
      <div align="left">Email: <span class="Estilo5"><strong><?php echo $email_l;?></strong></span></div>
    </div>      </td>
  </tr>
  <tr>
    <td height="21" colspan="4"><span class="Estilo19">Contacto:<strong> <?php echo $contacto;?></strong></span></td>
    <td colspan="3"><span class="Estilo19">N&ordm; Prestador: <strong><?php echo $nro_prestador;?></strong></span></td>
    <td colspan="5"><div align="right" class="Estilo5 Estilo18">
      <div align="left">Nivel: <span class="Estilo5"><strong><?php echo $nivel;?></strong></span></div>
    </div>      
    </td>
    <td width="24%"><span class="Estilo19">Cargo<strong>: <?php echo $cargo;?></strong></span></td>
  </tr>
  <tr>
    <td height="22" colspan="13"><HR noshade class="Estilo2"></td>
  </tr>
  <tr>
    <td height="21" colspan="8"><div align="left"><strong>VIGENCIA: </strong>Nomenclador:<strong><strong> <?php echo $nomenclador;?> </strong></strong>Tipo:<strong><strong> <?php echo $tipo;?> </strong></strong></div>      </td>
    <td height="21" colspan="5">Inicio: <strong> <strong><?php echo $inicio;?></strong> </strong>Fin:<strong> <strong><?php echo $fin;?></strong> </strong></td>
  </tr>
  <tr>
    <td height="22" colspan="13"><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="8"><div align="left"><strong>ARANCEL:</strong> Modalidad:<strong><?php echo $modalida;?> </strong></div></td>
    <td height="21" colspan="5"> Gastos:<strong> <?php echo $ug;?> </strong> Bioqu&iacute;mico:<strong> <?php echo $uh;?></strong></td>
  </tr>
  <tr>
    <td height="22" colspan="13"><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="13"><div align="left"><strong>TRATAMIENTO</strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="13"><div align="left">Material Descartable (677): 1 por <strong><?php echo $mat;?></strong></div>      
    </td>
  </tr>
  <tr>
    <td height="21" colspan="13"><div align="left">Toma y Muestra (998):1 por<strong> <?php echo $tom;?></strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="13"><div align="left">Acto Bioquimico (001):<strong> <?php echo $acto_bioquimico;?></strong></div>      </td>
  </tr>
  <tr>
    <td height="22" colspan="13"><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="13"><div align="left"><strong>CRITERIOS PARA FACTURAR </strong></div>      </td>
  </tr>
  <tr>
    <td height="21" colspan="13"><div align="left">Separacion de Facturas: <strong><?php echo $separacio;?></strong></div>      </td>
  </tr>
  <tr>
    <td height="21" colspan="13"><div align="left">Coseguro Prac. Comunes <strong><?php echo $valor_porcentaje." ".$cosegur;?></strong></div>      <div align="right"></div> <div align="right"></div>      <div align="right"></div></td>
  </tr>
  <tr>
    <td height="21" colspan="13"><div align="left">Coseguro Prac. Especiales <strong><?php echo $valor_porc_esp." ".$coseguro_es;?></strong></div>      <div align="right"></div>  </td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><div align="left">Coseguro Alta Complejidad <strong><?php echo $valor_porc_esp." ".$coseguro_com;?></strong></div>      <div align="right"></div> </td>
  </tr>
  <tr>
    <td height="22" colspan="13" ><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="13" ><div align="left"><strong>AJUSTE AL VALOR DE LAS PRACTICAS </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="13"><div align="left">Porcentaje sobre Unidades Gastos: <strong><?php echo $gastos;?> </strong>%</div></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><div align="left">Porcentaje sobre Unidades de Bioquimicos: <strong><?php echo $honorarios;?> </strong>%</div></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><div align="left">Operacion:<strong>
      <?php echo $operacion;?>
</strong></div></td>
  </tr>
  <tr>
    <td height="22" colspan="13" class=""><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><div align="left"><strong>AJUSTE AL VALOR DE LAS ORDENES </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class="">Porcentaje:<strong>      
<?php echo $porcentaje_total;?>
</strong>%    </td>
  </tr>
  <tr>
    <td height="21" colspan="13" class="">Operacion:<strong>
    <?php echo$operacion_orden;?>
    </strong></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class="">Denominacion del Ajuste:<strong>
    <?php echo $denominacion_ajuste;?>
    </strong></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><strong>OPCIONES DE CONTROL </strong></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><div align="left"> Efector:<strong>
      <?php echo $efector;?> - 
</strong> Imprimir Detalle:<strong><strong> <?php echo $detalle;?> </strong></strong><strong><strong><strong> </strong></strong></strong> - Prescriptor<strong><strong><strong>:<strong> <?php  echo $prescriptor;?></strong></strong></strong></strong>  - Afiliados: <strong><strong><strong><strong><strong><?php  echo $afiliado;?> </strong></strong></strong></strong></strong> - Medios Magneticos<strong><strong><strong><strong><strong><strong><strong> <strong> <?php  echo $post_factura;?></strong></strong></strong></strong></strong></strong></strong> </strong></div></td>
  </tr>
  <tr>
    <td height="22" colspan="13" class=""><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><div align="left"><strong>FORMAS DE PAGO </strong></div></td>
  </tr>
  <tr>
    <td width="11%" height="21" class=""><div align="left">Vencimiento:</div></td>
    <td colspan="4" class=""><strong><?php echo $dia_3;?> </strong>dias </td>
    <td colspan="3" class="">Antiguedad:<strong> <?php echo $antiguedad;?></strong></td>
    <td width="15%" class="">Interes:
      <strong><?php echo $interes;?> </strong>% </td>
    <td colspan="4" class=""><div align="left">Plan: <strong><?php echo $plan;?></strong></div>      </td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="13" class=""><strong>CAPITACION</strong></td>
  </tr>
  <tr>
    <td height="21" colspan="5" class="">Prorrateo:<strong> <?php echo $prorrateo;?> </strong>% </td>
    <td colspan="3" class="">Cuota: <strong><?php echo $cuota;?></strong></td>
    <td colspan="2" class="">Valor: <strong><?php echo $porcentaje;?> </strong></td>
    <td colspan="3" class="">Porcentaje: <strong><?php echo $porcentaje_cuota;?> </strong>% </td>
  </tr>
  <tr>
    <td height="22" colspan="13" class=""><hr noshade></td>
  </tr>
</table>
