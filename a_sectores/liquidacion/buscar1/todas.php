<style type="text/css">
<!--
.Estilo1 {color: #FFFFFF}
.Estilo2 {font-size: 10px}
.Estilo3 {color: #FFFFFF; font-size: 10px; }
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
.Estilo7 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo8 {color: #FFFFFF; font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo9 {color: #000000}
.Estilo10 {font-weight: bold}
-->
H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}

.Estilo11 {font-size: 12px}
.Estilo12 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo13 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo14 {font-size: 12px; color: #000000; }
.Estilo15 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 10px; }
.Estilo17 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; }
.Estilo19 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; }
.Estilo21 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; }
.Estilo4 {font-size: 14px}
.Estilo27 {font-size: 16px; font-family: Arial, Helvetica, sans-serif; }
</style>



<!-- <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">    -->
<?
$band_deb = 1;
$band_acred = 1;


$band = 1;
$bande = 1;
$bande1 = 1;
$bande2=1;
$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$anio= $_REQUEST['anio'];
$periodo= $_REQUEST['periodo'];
$nro_liquidacion= $_REQUEST['nro_liquidacion'];
$que_ver= $_REQUEST['que_ver'];

$radiobutton= $_REQUEST['radiobutton'];


$anio_liquidacion = $_REQUEST['anio'];





include ("../../../conexiones/config.inc.php");
$sql2 = "SELECT * FROM `liquidacion` WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio' and periodo like '$periodo' and operacion like '100' order by nro_liquidacion";
$result2 = $db_liq->Execute($sql2);
$fecha22=strtoupper($result2->fields["fecha"]); //1580

if ($fecha22 == "") { //no tiene facturas a cobrar

include ("../../../conexiones/config.inc.php");
$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;

?>


<!-- <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();"> -->
<table width="641" border="0" bgcolor="#D0F9FB">
  <tr bgcolor="#C9FADF">
    <td width="637" scope="col"><div align="center" class="Estilo13">LIQUIDACION SIN FACTURAS PARA ACREEDITAR</div></td>
  </tr>
  <tr>
    <td scope="col"><div align="center"><em>Cuenta: <?echo $nombre_laboratorio;?>      </em></div></td>
  </tr>
</table><?


 $sql_deuda = "SELECT * FROM `deudas` WHERE `nro_laboratorio` = '$nro_laboratorio'";
$result_deuda = $db_liq->Execute($sql_deuda);
$nro_factura= $result_deuda->fields["nro_factura"];
?>
<table width="636" border="0">
<tr class="Estilo2">
  <td colspan="10" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo2">
  <td colspan="11" scope="col">&nbsp;</td>
</tr>
<tr bgcolor="#C9FADF" class="Estilo6">
  <td colspan="10" scope="col"><div align="center" class="Estilo12">ESTADO DE CTA CTE POR OPERACIONES ADEUDADAS A LA ASOCIACION BIOQUIMICA DE MENDOZA</div></td>
</tr>
<tr bgcolor="#FFFFFF" class="Estilo6">
  <td colspan="11" scope="col"><hr noshade></td>
</tr>
<tr class="Estilo8">
  <td bgcolor="#000099" class="Estilo5" scope="col">Fecha</td>
  <td width="73" bgcolor="#000099" class="Estilo5" scope="col">Operacion</td>
  <td width="44" bgcolor="#000099" class="Estilo5" scope="col">Comp.</td>
  <td width="53" bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Fec. Orig</div></td>
  <td bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Importe</div></td>
  <td bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Dto x Liq</div>    </td>
  <td bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Fec. Caja</div></td>
  <td colspan="2" bgcolor="#000099" class="Estilo5" scope="col">Pago Caja </td>
  <td width="65" bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Saldo </div></td>
</tr>
<?


  if (!$result_deuda) die("fallo".$db_liq->ErrorMsg());

  while (!$result_deuda->EOF) {


$saldo= $result_deuda->fields["saldo"];

$fecha_origen= $result_deuda->fields["fecha_origen"];
$importe= $result_deuda->fields["importe_original"];
$nro_factura= $result_deuda->fields["nro_factura"];
$importe_pagado= $result_deuda->fields["importe_pagado"];
$porcentaje= $result_deuda->fields["porcentaje"];

$dto_liq= $result_deuda->fields["dto_liq"];
$fecha_liq= $result_deuda->fields["fecha_liq"];
$pago_caja= $result_deuda->fields["pago_caja"];
$fecha_caja= $result_deuda->fields["fecha_caja"];



 $cod_ajuste= $result_deuda->fields["cod_ajuste"];
 $tipo_ajuste= $result_deuda->fields["tipo_ajuste"];


$sql_ajuste = "SELECT * FROM `ajustes` WHERE `cod_ajuste` = $cod_ajuste and `tipo_ajuste` like '$tipo_ajuste'";
$result_ajuste = $db_cont->Execute($sql_ajuste);

$motivo= strtoupper($result_ajuste->fields["ajuste"]);

$hoy = date("d/m/y");
	?>


<tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo5"  scope="col"><div align="center"><?echo $hoy;?></td>
  <td bgcolor="#FFFFFF" class="Estilo5" scope="col"><?echo $motivo;?></td>
  <td bgcolor="#FFFFFF" class="Estilo5" scope="col"><span class="Estilo7"><?echo $nro_factura;?>
</span>    <div align="center"></div></td>
  <td bgcolor="#FFFFFF" class="Estilo5" scope="col"><div align="rigth"><span class="Estilo7"><?echo $fecha_origen;?></span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo5" scope="col"><div align="right"><span class="Estilo7"><?echo $importe;?></span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo5" scope="col"><div align="right"><span class="Estilo7"><?echo $importe_pagado;?></span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo5" scope="col"><div align="center"><?echo $fecha_caja;?></td>
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo5" scope="col"><div align="right"><?echo $pago_caja;?></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?echo $saldo;?></span></div></td>
</tr>






<?
	$total_caja = $total_caja + $pago_caja;
	$importe_total = $importe_total + $importe;
	$importe_pagado_total = $importe_pagado_total + $importe_pagado;
	$saldo_total = $saldo_total + $saldo;

  $result_deuda->MoveNext();
	}


?>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo17" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td colspan="6" bgcolor="#FFFFFF" class="Estilo2" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo2">
  <td colspan="4" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo7">Total:</div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth" class="Estilo7">
    <div align="right"><?echo NUMBER_FORMAT($importe_total,2);?></div>
  </div></td>


  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth" class="Estilo7">
    <div align="right"><?echo NUMBER_FORMAT($importe_pagado_total,2);?></div>
  </div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth" class="Estilo7">
    <div align="right"><?echo NUMBER_FORMAT($total_caja,2);?> </div>
  </div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right" class="Estilo6">$ <?echo NUMBER_FORMAT($saldo_total,2);?>
    </div></td>
</tr>
<tr class="Estilo2">
  <td colspan="11" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><hr noshade></td>
  </tr>
</table>
<?
exit;
}








include ("../../../conexiones/config.inc.php");
$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;
	
	?>

<!-- 4524100 hotel -->

<!-- <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();"> -->

	<table width="641" border="0" bgcolor="#D0F9FB">
  <tr bgcolor="#C9FADF">
    <td width="637" scope="col"><div align="center" class="Estilo13">ACTUALIZACION DE CUENTA CORRIENTE POR LIQUIDACION </div></td>
    </tr>
  <tr>
    <td scope="col"><div align="center"><em>Cuenta: <?echo $nombre_laboratorio;?>      </em></div></td>
    </tr>
</table>

<?if ($nro_liquidacion == ""){
	
	?>
	<table width="641" border="0">
 <tr bgcolor="#E6E6E6" class="Estilo7">
    <td width="9%"><span class="Estilo2">Periodo</span></td>
    <td width="14%"><span class="Estilo2"><?echo $periodo;?></span></td>
    <td><span class="Estilo2">A&ntilde;o:<?echo $anio;?></span></td>
    <td><div align="right"><span class="Estilo2"></span></div></td>
  </tr>
 <tr bgcolor="#000099" class="Estilo7">
   <td colspan="2"><div align="center" class="Estilo1">Fecha de Liquidaci&oacute;n</div></td>
   <td><div align="center"><span class="Estilo1">N&ordm; Liquidacion </span></div></td>
   <td><div align="center"><span class="Estilo1">Importe Depositado en Banco</span></div></td>
 </tr>

  <?

$sql2 = "SELECT * FROM `liquidacion` WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio' and periodo like '$periodo' and operacion like '1100' order by nro_liquidacion, operacion";
$result2 = $db_liq->Execute($sql2);

if (!$result2) die("fallo".$db_liq->ErrorMsg());
  while (!$result2->EOF) {
$importe=strtoupper($result2->fields["importe"]); //1580
$tipo_pago=strtoupper($result2->fields["tipo_pago"]); //1580

SWITCH ($tipo_pago){

	case "TR_NEGATIVO"://novedades al debito
		{
			$importe_debito= $importe;
		break;
	}


	case "TR_POSITIVA":{
 $importe_credito= $importe;


		break;
	}
}


$nro_liquidacion=strtoupper($result2->fields["nro_liquidacion"]); //1580


$fecha=strtoupper($result2->fields["fecha"]); //1580


$dia_1 = substr($fecha,8,2);
$mes_2 = substr($fecha,5,2);
$anio_3 = substr($fecha,0,4);
 $fecha = $dia_1."-".$mes_2."-".$anio_3;


?> <tr bgcolor="#FFFFFF" class="Estilo7">
   <td colspan="2"><div align="center" class="Estilo12"><span class="Estilo9"><span class="Estilo6"><?echo $fecha;?></span></span></div></td>
   <td><div align="center" class="Estilo12"><span class="Estilo9"><span class="Estilo6"><?echo $nro_liquidacion;?></span></span></div></td>
   <td><div align="center" class="Estilo12"><span class="Estilo9"><span class="Estilo6">$ <?echo number_format($importe_debito,2);?></span></span></div></td>
      <td><div align="center" class="Estilo12"><span class="Estilo9"><span class="Estilo6">$ <?echo number_format($importe_credito,2);?></span></span></div></td>
 </tr>


<?
	  $total = $total + $importe;
$result2->MoveNext();
  }
?>  
  <tr bgcolor="#FFFFFF">
    <td colspan="3"><span class="Estilo11"></span></td>
    <td><hr noshade class="Estilo6"></td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="3"><div align="right" class="Estilo12">TOTAL:</div></td>
    <td><div align="center" class="Estilo12"><span class="Estilo9">$ <?echo number_format($total,2);?></span></div></td>
  </tr>
</table>
	<?
  
	exit;
							}




?>
<table width="641" border="0">
  <!--DWLayoutTable-->
 <tr bgcolor="#E6E6E6" class="Estilo7">
    <td width="50"><span class="Estilo2">Periodo</span></td>
    <td colspan="2"><span class="Estilo2"><?echo $periodo;?></span></td>
    <td width="76"><span class="Estilo2">A&ntilde;o:<?echo $anio;?></span></td>
    <td colspan="5" valign="top"><div align="right"><span class="Estilo2">Liquidacion N&ordm; <?echo $nro_liquidacion;?></span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="9"><hr noshade></td>
  </tr>
 
<?




 $sql2 = "SELECT * FROM `liquidacion` WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion";
// order by nro_laboratorio, nro_liquidacion, nro_factura, operacion ";

$result2 = $db_liq->Execute($sql2);



//trae las matriculas......................................................
if (!$result2) die("fallo".$db_liq->ErrorMsg());
  while (!$result2->EOF) {

$operacion=strtoupper($result2->fields["operacion"]); //1580
$importe=strtoupper($result2->fields["importe"]); //1580
$nro_factura=strtoupper($result2->fields["nro_factura"]); //1580
$motivo=strtoupper($result2->fields["motivo"]); //1580
$cod_operacion= $result2->fields["cod_operacion"];
$ajuste= $result2->fields["motivo"];
$tipo_ajuste= $result2->fields["tipo_pago"];
$nro_os=$result2->fields["nro_os"];
$tipo_pago=$result2->fields["tipo_pago"];
$acumulado_mensual=$result2->fields["acumulado_mensual"];

$fecha=$result2->fields["fecha"];
$porcentaje=$result2->fields["porcentaje"];
$bruto=$result2->fields["bruto"];
$transaccion =$result2->fields["tipo_pago"];

$importe_original=$result2->fields["importe"];
$dto_liq=$result2->fields["bruto"];
$pago_caja=$result2->fields["pago_caja"];








$dia_1 = substr($fecha,8,2);
$mes_2 = substr($fecha,5,2);
$anio_3 = substr($fecha,0,4);
 $fecha = $dia_1."-".$mes_2."-".$anio_3;


switch ($operacion){
	case "100":{


?>
<tr>
    <td colspan="9"><div align="center"><span class="Estilo19">SALDO DE FACTURAS ADEUDADAS ANTERIOR A LA LIQUIDACION: $ <?  number_format($importe,2);?></span>
      </div>      
      <div align="right" class="Estilo21"><div align="center" class="Estilo6"></div>
    </div></td>
  </tr>
<tr>
  <td colspan="9"><HR noshade></td>
  </tr>
<tr bgcolor="#C9FADF" class="Estilo8">
  <td colspan="9"><div align="center"><span class="Estilo14">FACTURAS PAGADAS A LA FECHA</span></div></td>
</tr>
<tr bgcolor="#FFFFFF" class="Estilo8">
  <td colspan="9"><div align="center">
    <HR noshade>
  </div></td>
  </tr>
<tr bgcolor="#000099" class="Estilo8">
  <td><div align="center"><span class="Estilo1 Estilo2 Estilo6 Estilo4"><span class="Estilo3">Fec. Mov </span></span></div></td>
  <td width="171"><span class="Estilo5 Estilo2">O.Social</span></td>
  <td width="26"><div align="center"><span class="Estilo5">%</span></div></td>
  <td><div align="center"><span class="Estilo5">Saldo</span></div></td>
  <td width="47"><div align="center"><span class="Estilo5">Comp.</span></div></td>
  <td width="58"><div align="center"><span class="Estilo5">Fec. Fact </span></div></td>
  <td width="59"><div align="center"><span class="Estilo5">Imp. Orig</span></div></td>
  <td width="56"><div align="center"><span class="Estilo2"><span class="Estilo5">Exc Capita</span></span></div></td>
   <td width="60"><div align="center"><span class="Estilo2"><span class="Estilo5">Imp. Pag.</span></span></div></td>
  </tr>

<?
	$saldo_cta_cte = $importe;
	break;
	}

case "200":{


$sql1="select * from factura where nro_factura = '$nro_factura' and nro_os = $nro_os"; //4
$result1 = $db_fa->Execute($sql1);

$nro_os=strtoupper($result1->fields["nro_os"]); // 2617
$fecha_pago_fact=strtoupper($result1->fields["fecha_pago_fact"]); // 2617

$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;

if ($fecha_pago_fact == "-/0-00/0"){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}
elseif ($fecha_pago_fact == "--"){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}
elseif ($fecha_pago_fact == ""){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}


include ("../../../conexiones/config_liq.php");
$sql123="select *  from composicion where nro_os like '$nro_os' and nro_factura = $nro_factura and nro_laboratorio = $nro_laboratorio";
$result123 = $db_liq->Execute($sql123);

$iva=$result123->fields["iva"];
$neto_gravado=$result123->fields["neto_gravado"];
$exento=$result123->fields["exento"];


if (($iva == 0.00) and ($neto_gravado == 0.00) and ($exento == 0.00)){
	$exento1 = $importe;
	}


$iva1 = ($iva * $porcentaje /100);
$neto_gravado1 = ($neto_gravado * $porcentaje /100);
$neto_exento1 = ($exento * $porcentaje /100);




$total_iva = $total_iva + $iva1;
$total_neto_gravado = $total_neto_gravado + $neto_gravado1;
$total_exento = $total_exento + $neto_exento1;


include ("../../../conexiones/config_os.php");
$sql12="select * from datos_os where nro_os like '$nro_os'";
$result12 = $db_os->Execute($sql12);
$sigla=strtoupper($result12->fields["sigla"]);

$ex_capita = $importe - $bruto;
?>
<tr class="Estilo7">
    <td class="Estilo7"><span class="Estilo2"><?echo $fecha_pago_fact;?></span></td>
    <td class="Estilo7"><span class="Estilo7"><?echo $sigla." (".$nro_os.")";?></span></td>
    <td class="Estilo7"><div align="center"><?echo $porcentaje;?></div></td>
    <td class="Estilo7"><div align="center"><?echo $tipo_pago;?>
        </div>
      <div align="center"></div>
    <div align="center" class="Estilo11"></div></td>
    <td><div align="center"><span class="Estilo7"><?echo $nro_factura;?></span></div></td>
    <td><span class="Estilo7"><?echo $fecha;?></span></td>
    <td><div align="right" class="Estilo2" > <?echo number_format($importe,2);?>  </div></td>
    <td><div align="right" class="Estilo2"> -<?echo $ex_capita;?> </div></td>
     <td><div align="right" class="Estilo2"><?echo number_format($bruto,2);?> </div></td>
  </tr>
<?
break;
}

case "300":{

//$saldo_cta_cte = $saldo_cta_cte - $bruto;

?>
<tr><td colspan="5" scope="col">&nbsp;</td>
  <td colspan="4" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="8" class="Estilo7" scope="col"><div align="right" class="Estilo2"></div>    <div align="right"><span class="Estilo2">Total Facturas Pagadas a liquidar: </span></div>    <div align="right"></div>    <div align="right"></div>    <div align="right" class="Estilo6">
        <div align="right"></div>
    </div></td>
  <td><div align="right"><span class="Estilo6"><?ECHO number_format($bruto,2);?></span></div></td>
  <?

$brut = $bruto;
break;
}

case "390":{

if ($band_deb == 1){
?>
<tr class="Estilo7">
  <td colspan="9" class="Estilo19" scope="col"><HR noshade></td>
<tr class="Estilo7">
  <td colspan="9" class="Estilo19" scope="col"><div align="center">SALDO ACTUALIZADO DE FACTURAS ACREEDITADAS PENDIENTES DE PAGO: $ <? number_format($importe,2);?></div>    </td>
  <tr class="Estilo7">
  <td colspan="9" scope="col"><hr noshade></td>
</table>


<table width="641" border="0">
  <tr bgcolor="#C9FADF">
    <td colspan="8" scope="col"><div align="center" class="Estilo12">AJUSTES SOBRE FACTURAS PAGADAS (DEBITOS O CREDITOS)</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="8" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td width="55" scope="col"><div align="center" class="Estilo3 Estilo4"><span class="Estilo5 Estilo2">Fec. Mov. </span></div></td>
    <td width="93" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">O. Social </span></div></td>
    <td width="43" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Comp.</span></div></td>
    <td width="225" scope="col"><div align="center" class="Estilo5">Motivo</div></td>
    <td width="35" scope="col"><div align="center" class="Estilo5"><span class="Estilo7 "><span class="Estilo5">Debitos</span></span></div></td>
    <td width="35" scope="col"><div align="center" class="Estilo5">Cr&eacute;dito</div></td>
    <td width="65" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Neto</span></div></td>
  </tr>
  <tr class="Estilo7">
    <td colspan="5" scope="col"><span class="Estilo2">BRUTO PAGADO </span></td>
    <td scope="col"><div align="center"></div></td>
    <td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($brut,2);?></span></div></td>
  </tr>


<?
$band_deb = 2;
}

$saldo_debitos = $brut;
break;

}


case "400":{

$sql12="select * from datos_os where nro_os like '$nro_os'";
$result12 = $db_os->Execute($sql12);
$sigla=strtoupper($result12->fields["sigla"]);

 $sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617
$motivo=substr($motivo,0,33);


?>
  <tr class="Estilo7">
    <td scope="col"><span class="Estilo2"><?ECHO $fecha;?></span></td>
    <td scope="col"><span class="Estilo2"><?ECHO $sigla;?></span></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $nro_factura;?></span></div></td>
    <td scope="col"><div align="left"><span class="Estilo2"><?ECHO $motivo;?></span></div></td>


<?	


switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			$saldo_debitos = $saldo_debitos + $importe;
?> <td scope="col"><div align="center"><span class="Estilo2"> - </span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
<td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_debitos,2);?></span></div></td>
  </tr>
<?
		break;}

case "AJ_NEGATIVO"://novedades al debito
		{
		
			$saldo_debitos = $saldo_debitos - $importe;

?>  <td scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"> - </span></div></td>
<td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_debitos,2);?></span></div></td>
  </tr>
<?	


		break;}
}



    

	
	?>

  



<?


break;

}

case "500":{
?>
	<tr class="Estilo7">
  <td colspan="4" scope="col">&nbsp;</td>
  <td colspan="3" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="4" scope="col"><div align="right" class="Estilo2">Sub-Total </div></td>
  <td class="Estilo2" scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($bruto,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo2"><?ECHO number_format($acumulado_mensual,2);?></span></div>
  </div></td>
</tr><?$saldo_debitos = $acumulado_mensual; ?>
<tr>
  <td colspan="7" scope="col"><hr noshade></td>
</tr><?
	break;
?></TABLE>
<?
}

case "600":
	{

	if ($bande == 1){

?>

<table width="641" border="0">
  <tr bgcolor="#C9FADF">
    <td colspan="8" scope="col"><div align="center" class="Estilo12">AJUSTES SOBRE FACTURAS LIQUIDAD ANTERIORMENTE</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="8" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td width="56" scope="col"><div align="center" class="Estilo3 Estilo4"><span class="Estilo5 Estilo2">Fec. Mov. </span></div></td>
    <td width="60" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">O. Social </span></div></td>
    <td width="39" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Comp.</span></div></td>
    <td width="56" scope="col"><div align="center" class="Estilo5"><span class="Estilo5"> </span></div></td>
    <td width="250" scope="col"><div align="center" class="Estilo5">Motivo</div></td>
    
	<td width="40" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Debitos</span></div></td>
    <td width="40" scope="col"><div align="center" class="Estilo5">Cr&eacute;dito</div></td>
    
	<td width="65" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Neto</span></div></td>
  </tr>

  <tr class="Estilo7">
    <td colspan="6" scope="col"><span class="Estilo2">NETO DE AJUSTES </span></td>
    <td class="Estilo2" scope="col"><div align="center"></div></td>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_debitos,2);?></span></div></td>
  </tr>
<!--   </TABLE> -->
<?$saldo= $saldo_debitos;
	  $bande = 2;
	}

	
 $sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617


$sql1="select fecha from factura where nro_factura like '$nro_factura'";
$result1 = $db_fa->Execute($sql1);
$fecha_original=$result1->fields["fecha"];


$sql1="select sigla from datos_os where nro_os like '$nro_os'";
$result1 = $db_os->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);


	?>
 <tr class="Estilo7">
    <td scope="col"><span class="Estilo2"><?ECHO $fecha;?></span></td>
    <td scope="col"><span class="Estilo2"><?ECHO $sigla;?></span></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $nro_factura;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"></span></div></td>
    <td scope="col"><div align="left"><span class="Estilo2"><?ECHO $motivo;?></span></div></td>


<?
   switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			$saldo = $saldo + $importe;
			$total_credito = $total_credito + $importe;
?> <td scope="col"><div align="center"><span class="Estilo2"> - </span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
<td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo,2);?></span></div></td>
</tr>
<?
		break;}

case "AJ_NEGATIVO"://novedades al debito
		{
		
			$saldo = $saldo - $importe;
			$total_debito = $total_debito + $importe;
?>  <td scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"> - </span></div></td>
<td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo,2);?></span></div></td>
  </tr>
<?	


		break;}
}

  



$total_debitos_pen = $total_de + $importe;
	break;
	}

	case "700":{
?>
	<tr class="Estilo7">
  <td colspan="5" scope="col">&nbsp;</td>
  <td colspan="3" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="5" scope="col"><div align="right" class="Estilo2">Sub-Total </div></td>
  <td class="Estilo2" scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($total_debito,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($total_credito,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo2"><?ECHO number_format($saldo,2);?></span></div>
  </div></td>
</tr>
<tr>
  <td colspan="8" scope="col"><hr noshade></td>
</tr><?
	$saldo_retenciones = $saldo;
	break;
	?><?
}

case "800":{

	switch ($motivo) {
	case "10": {

if ($bande1 == 1){
?>



<table width="641" border="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#C9FADF">
    <td colspan="5" scope="col"><div align="center" class="Estilo12">RETENCIONES Y APORTES</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="5" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td scope="col"><div align="center" class="Estilo9">
      <div align="center" class="Estilo8">Retenci&oacute;n </div>
    </div>      <div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8"></div></td>
    <td scope="col"><div align="center"><span class="Estilo8"><span class="Estilo5">Base</span></span></div></td>
    <td width="101" scope="col"><div align="center" class="Estilo8">Porc./Cuota DGI </div></td>
    <td width="93" scope="col"><div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8"><span class="Estilo5">Importe Desc </span></div></td>
    <td width="87" scope="col"><div align="center" class="Estilo9"><span class="Estilo8">Neto Retenc.</span></div>      
      <div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8"></div>      <div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8"></div></td>
  </tr>
  <tr class="Estilo7">
    <td height="21" colspan="4" class="Estilo7" scope="col">SUJETO A RETENCIONES
    <div align="center"></div></td>
    <td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($importe,2);?> </span></div></td>
  </tr><?

	  $bruto_sujeto_a = $importe;
$saldo_retenciones_adm = $importe;
$base_impuesto = $importe;
	$bande1=2;

	}
	break;
	}


case "11": {
$base_cos = $importe;
break;
}

case "20": {

$saldo_retenciones_adm = $base_impuesto - $importe;
$total_importe = $total_importe + $importe;

?>  <tr class="Estilo7">
    <td width="250" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">Aportes Administrativos</span></div>
    <div align="center" class="Estilo10"></div></td>
    <td width="84" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo7"><?ECHO number_format($base_cos,2);?></span></div></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO number_format($porcentaje,2)." %";?>  </span></div></td>
    <td class="Estilo2" scope="col"><div align="center"><?


	ECHO number_format($importe,2);?>    
    </div>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_retenciones_adm,2);?></span> </div>
    <?
		break;}

		case "30": {
$saldo_retenciones_adm = 	$saldo_retenciones_adm - $importe;
$total_importe = $total_importe + $importe;
if ($importe > 0){
?>  

  <tr class="Estilo7">
    <td width="250" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">DGI Retención: </span> </div>
    <div align="center" class="Estilo10"></div></td>
    <td width="84" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo7"><?ECHO number_format($bruto,2);?></span></div></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo10"><?ECHO number_format($acumulado_mensual,2);?></span></div></td>
    <td valign="top" class="Estilo2" scope="col">      <div align="center"><?
	ECHO number_format($importe,2);?>    
    </div>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_retenciones_adm,2);?></span> </div>
<?}
	
 
		break;
	}



case "40": {

$saldo_retenciones_adm = $saldo_retenciones_adm - $importe;
$total_importe = $total_importe + $importe;
if ($importe > 0){
	?>  
  <tr class="Estilo7">
    <td width="250" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">DGR Retención: </span> </div>
    <div align="center" class="Estilo10"></div></td>
    <td width="84" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo10"><?ECHO number_format($bruto,2);?></span></div></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO number_format($porcentaje,2)." %";?>  </span></div></td>
    <td valign="top" class="Estilo2" scope="col"><div align="center"><?
	ECHO number_format($importe,2);?>    
    </div>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_retenciones_adm,2);?></span> </div>
<?
}	
		break;
	}


}
	break;
?>	
<?
}//cierra motivo en 800 retenciones

case "900":{
?>
<tr class="Estilo7">
  <td class="Estilo2" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td class="Estilo2" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td colspan="3" class="Estilo2" scope="col"><hr noshade></td>
</tr>
<tr class="Estilo7"><td class="Estilo2" scope="col"><div align="right" class="Estilo2">Sub -Total Neto Retenciones y Aportes</div></td>
  <td class="Estilo2" scope="col">&nbsp;</td>
  <td class="Estilo2" scope="col">&nbsp;</td>
  <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO number_format($total_importe,2);?>
  </span></div></td>
  <td scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo7">
      <?


  
  ECHO number_format($importe,2);?>
    </span></div>
  </div></td>
</tr>
<tr class="Estilo2">
  <td colspan="5" class="Estilo2" scope="col"><hr noshade></td>
</tr>
</table>
<?
if ($band_acred ==1){
?>	

	<table width="641" border="0">
  <tr bgcolor="#C9FADF">
    <td colspan="10" scope="col"><div align="center" class="Estilo12">ACREEDITACIONES Y DESCUENTOS</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="10" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td width="63" class="Estilo5" scope="col"><div align="center" class="Estilo4 Estilo3"><span class="Estilo5 Estilo2">Fec. Mov. </span></div></td>
    <td colspan="3" class="Estilo5" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Motivo</span></div></td>
    <td width="59" class="Estilo5" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Comp.</span></div></td>
  <!--   <td width="59" class="Estilo5" scope="col"><div align="center" class="Estilo5">Fec. Orig<span class="Estilo7 ">.</span></div></td> -->
    <td width="53" class="Estilo5" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Debitos</span></div></td>
    <td width="35" class="Estilo5" scope="col"><div align="center" class="Estilo5">Cr&eacute;dito</div></td>
    <td colspan="2" class="Estilo5" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Neto</span></div></td>
  </tr>

  <tr>
    <td colspan="7" class="Estilo2" scope="col"><span class="Estilo7">SUB - TOTAL ACREEDITACIONES Y DESCUENTOS </span></td>
    <td class="Estilo2" scope="col"><div align="center"></div></td>
    <td colspan="2" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?ECHO number_format($importe,2);?></span></div></td>
  </tr>
<?
$saldo_novedades = $importe;
  $band_acred = 2;
}

break;
} //cierra el caso 900


case "1000": // NOVEDADES
	{

IF ($transaccion == 'TR_POSITIVA'){
	$transaccion = 'TR_POSITIVO';
}


 $sql1="select * from ajustes where cod_ajuste = '$ajuste' and tipo_ajuste like '$transaccion'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["abreviatura"]); // 2617

?>
  <tr>
    <td class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $fecha;?></span></td>
    <td colspan="3" class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $motivo;?></span></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $nro_factura;?></span></div></td>
    <!-- <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $fecha;?></span></div></td> -->


<?	switch ($tipo_pago){

case "TR_POSITIVA":{
				$saldo_novedades = $saldo_novedades + $importe;
?><td class="Estilo7" scope="col"><div align="center"><span class="Estilo7"> - <? number_format($importe,2);?></span></div></td>
<td class="Estilo7" scope="col"><div align="center"><span class="Estilo7"><?ECHO number_format($importe,2);?></span></div></td>
 <td colspan="2" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?ECHO number_format($saldo_novedades,2);?></span></div></td>
  </tr>
<?
		break;}

case "TR_NEGATIVO"://novedades al debito
		{
			$saldo_novedades = $saldo_novedades - $importe;
?><td class="Estilo7" scope="col"><div align="center"><span class="Estilo7"><?ECHO number_format($importe,2);?></span></div></td>
<td width="149" class="Estilo7" scope="col"><div align="center"><span class="Estilo7"> - <? number_format($importe,2);?></span></div></td>
 <td colspan="2" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?ECHO number_format($saldo_novedades,2);?></span></div></td>
  </tr>
<?	


		break;}
}




break;
	}

	case "1100": // acreeditaciones y descuentos
	{

 $sql_ajuste = "SELECT ajuste FROM `ajustes` WHERE cod_ajuste = $ajuste and `tipo_ajuste` = '$transaccion'";
$result_ajuste = $db_cont->Execute($sql_ajuste);

$motivo= STRTOUPPER($result_ajuste->fields["ajuste"]);


?>
  <tr>
    <td class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $fecha;?></span></td>
    <td colspan="3" class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $motivo;?></span></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $nro_factura;?></span></div></td>
    <!-- <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $fecha;?></span></div></td> -->


<?	switch ($tipo_pago){

case "TR_POSITIVO":{
				$saldo_novedades = $saldo_novedades + $importe;
?><td class="Estilo7" scope="col"><div align="center"><span class="Estilo7"> - <? number_format($importe,2);?></span></div></td>
<td class="Estilo7" scope="col"><div align="center"><span class="Estilo7"><?ECHO number_format($importe,2);?></span></div></td>
 <td colspan="2" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?ECHO number_format($saldo_novedades,2);?></span></div></td>
  </tr>
<?
		break;}

case "TR_NEGATIVO"://novedades al debito
		{
			$saldo_novedades = round($saldo_novedades - $importe,2);
?><td class="Estilo7" scope="col"><div align="center"><span class="Estilo7"><?ECHO number_format($importe,2);?></span></div></td>
<td class="Estilo7" scope="col"><div align="center"><span class="Estilo7"> - <? number_format($importe,2);?></span></div></td>
 <td colspan="2" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?ECHO number_format($saldo_novedades,2);?></span></div></td>
  </tr>
<?	


		break;}
}



break;
	}



	case "1200":{

		IF ($saldo_novedades == 0){
?>
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<tr>
  <td colspan="10" bordercolor="#000000" bgcolor="#F7A4B3" scope="col"><div align="center" class="Estilo6">
    <div align="center"><strong>LIQUIDACION SIN ACREDITACION</strong></div>
  </div></td>
</tr>
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<?$acree = 1;
		}
		else{
	include ("../../../conexiones/config.inc.php");
 $sql_facturante = "SELECT * FROM `facturante` WHERE `nro_laboratorio` = '$nro_laboratorio'";
$result_facturante = $db_bq->Execute($sql_facturante);

$banco= $result_facturante->fields["banco"];
$nro_cuenta= $result_facturante->fields["nro_cuenta"];
$cuenta= $result_facturante->fields["cuenta"];
$sucursal = substr($nro_cuenta,0,3);
$nro_cuenta = substr($nro_cuenta,4,6);

?>

<table width="641" border="0">
  <!-- <tr>
    <td colspan="7" class="Estilo2" scope="col"><span class="Estilo7">SUB - TOTAL NETO DE ACREEDITACIONES </span></td>
    <td class="Estilo2" scope="col"><div align="center"></div></td>
    <td colspan="2" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?ECHO number_format($importe,2);?></span></div></td>
  </tr>-->
<tr class="Estilo2">
  <td colspan="9" scope="col"><hr noshade></td>
  </tr> 
<tr class="Estilo7">
  <td colspan="9" scope="col"><div align="center"><span class="Estilo4"><strong>IMPORTE ACREDITADO EN BANCO</strong><span class="Estilo13"><strong>:</strong></span><strong><?ECHO $banco;?> </strong></span></div></td>
  </tr>
<tr class="Estilo7">
  <td colspan="9" bgcolor="#E1F2EF" scope="col"><div align="center"><span class="Estilo15"><span class="Estilo27">$ <?ECHO number_format($saldo_novedades,2);?></span></span></div></td>
  </tr>
</table>
<?
		}
		
		break;
	}
}//cierra el bucle operacion

$result2->MoveNext();
  }




IF ($saldo_novedades == 0){?>
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<tr>
  <td colspan="10" bordercolor="#000000" bgcolor="#F7A4B3" scope="col"><div align="center" class="Estilo6">
    <div align="center"><strong>LIQUIDACION SIN ACREDITACION</strong></div>
  </div></td>
</tr>
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<?}





$sql_8 = "SELECT sum(saldo) as saldo_actual FROM `deudas` WHERE nro_laboratorio = '$nro_laboratorio'";
$result_8 = $db_liq->Execute($sql_8);
$saldo_actual= $result_8->fields["saldo_actual"];

if ($saldo_actual == 0) {

?>
<table width="641" height="30" border="0">
<tr class="Estilo2">
  <td width="627" colspan="11" bgcolor="#00CCFF" class="Estilo2"  scope="col"><div align="center" class="Estilo6 Estilo4 Estilo9"><strong>NO REGISTRA DEUDA ACTUALMENTE CON LA ASOCIACION </strong></div></td>
</tr>

	<?
}
else{

$sql_deuda = "SELECT * FROM liquidacion WHERE `nro_laboratorio` = '$nro_laboratorio' and nro_liquidacion = $nro_liquidacion and periodo = $periodo and anio = $anio1 and operacion = 2000 order by bruto desc";

$result_deuda = $db_liq->Execute($sql_deuda);
$operac= $result_deuda->fields["operacion"];



if ($operac != "") {

?>
<table width="641" border="0">
<tr class="Estilo2">
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<tr class="Estilo2">
  <td colspan="11" scope="col">&nbsp;</td>
</tr>
<tr bgcolor="#C9FADF" class="Estilo6">
  <td colspan="10" scope="col"><div align="center" class="Estilo12">ESTADO DE CTA CTE POR OPERACIONES ADEUDADAS A LA ASOCIACION BIOQUIMICA DE MENDOZA</div></td>
</tr>
<tr bgcolor="#FFFFFF" class="Estilo6">
  <td colspan="11" scope="col"><hr noshade></td>
</tr>
<tr class="Estilo8">
  <td bgcolor="#000099" class="Estilo5" scope="col">Fecha</td>
  <td width="73" bgcolor="#000099" class="Estilo5" scope="col">Operacion</td>
  <td width="44" bgcolor="#000099" class="Estilo5" scope="col">Comp.</td>
  <td width="53" bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Fec. Orig</div></td>
  <td bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Importe</div></td>
  <td bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Dto x Liq</div>    </td>
  <td bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Fec. Caja</div></td>
  <td colspan="2" bgcolor="#000099" class="Estilo5" scope="col">Pago Caja </td>
  <td width="65" bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Saldo Deudor</div></td>
</tr>
<?


  if (!$result_deuda) die("fallo".$db_liq->ErrorMsg());

  while (!$result_deuda->EOF) {


$saldo= $result_deuda->fields["saldo_deuda"];

if (($saldo == 0) or ($saldo == 0.00)) {
  $result_deuda->MoveNext();
}else {



$fecha_origen= $result_deuda->fields["fecha"];
$importe= $result_deuda->fields["importe_original"];
$nro_factura= $result_deuda->fields["nro_factura"];
$importe_pagado= $result_deuda->fields["importe"];


$dto_liq= $result_deuda->fields["bruto"];
$fecha_liq= $result_deuda->fields["fecha_origen"];
$pago_caja= $result_deuda->fields["pago_caja"];
$fecha_caja= $result_deuda->fields["fecha_caja"];



 $cod_ajuste= $result_deuda->fields["motivo"];
 $tipo_ajuste= $result_deuda->fields["tipo_pago"];


$sql_ajuste = "SELECT * FROM `ajustes` WHERE `cod_ajuste` = $cod_ajuste and `tipo_ajuste` like '$tipo_ajuste'";
$result_ajuste = $db_cont->Execute($sql_ajuste);

$motivo= strtoupper($result_ajuste->fields["ajuste"]);
$motivo = substr($motivo,0,29);
$hoy = date("d/m/y");
	?>


<tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo7"  scope="col"><div align="center"><?echo $hoy;?></td>
  <td bgcolor="#FFFFFF" class="Estilo7" scope="col"><?echo $motivo;?></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><span class="Estilo7"><?echo $nro_factura;?>
</span>    <div align="center"></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth"><span class="Estilo7"><?echo $fecha_origen;?></span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?echo $importe_pagado;?></span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?echo $dto_liq;?></span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="center"><?echo $fecha_caja;?></td>
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right"><?echo $pago_caja;?></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?echo $saldo;?></span></div></td>
</tr>






<?
	$total_caja = $total_caja + $pago_caja;
	$importe_total = $importe_total + $importe;
	$importe_pagado_total = $importe_pagado_total + $importe_pagado;
	$saldo_total = $saldo_total + $saldo;
	$dto_total = $dto_total + $dto_liq;

  $result_deuda->MoveNext();
	}


?>
<!-- <tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo17" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td colspan="6" bgcolor="#FFFFFF" class="Estilo2" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo2">
  <td colspan="4" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo7">Total:</div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth" class="Estilo7">
    <div align="right"><?echo NUMBER_FORMAT($importe_total,2);?></div>
  </div></td>


  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth" class="Estilo7">
    <div align="right"><?echo NUMBER_FORMAT($importe_pagado_total,2);?></div>
  </div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth" class="Estilo7">
    <div align="right"><?echo NUMBER_FORMAT($total_caja,2);?> </div>
  </div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right" class="Estilo6">$ <?echo NUMBER_FORMAT($saldo_total,2);?>
    </div></td>
</tr> -->
<!-- <tr class="Estilo2">
  <td colspan="11" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><hr noshade></td>
  </tr> -->


<?
}
?><tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo17" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td colspan="6" bgcolor="#FFFFFF" class="Estilo2" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo2">
  <td colspan="4" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo7">Total:</div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth" class="Estilo7">
    <div align="right"><?echo NUMBER_FORMAT($importe_pagado_total,2);?></div>
  </div></td>


  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth" class="Estilo7">
    <div align="right"><?echo NUMBER_FORMAT($dto_total,2);?></div>
  </div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="rigth" class="Estilo7">

    <div align="right"><?echo NUMBER_FORMAT($total_caja,2);?> </div>
  </div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right" class="Estilo6">$ <?echo NUMBER_FORMAT($saldo_total,2);?>
    </div></td>
</tr> 
<tr class="Estilo2">
  <td colspan="11" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><hr noshade></td>
</tr> 
<tr class="Estilo6 Estilo4 Estilo9">
  <td colspan="11" bgcolor="#FFFFFF" class="Estilo6 Estilo4 Estilo9"  scope="col"><CENTER><STRONG>SR/SRES. <?echo $nombre_laboratorio;?> al día <?echo $fecha_hoy=date("d/m/Y");?> <BR>REGISTRA UNA DEUDA CON LA ASOCIACION DE: $  <?echo NUMBER_FORMAT($saldo_total,2);?></STRONG></CENTER></td>
</tr>

<?
}
else {
?>

<?
?>
<H1 class=SaltoDePagina> </H1>

<?


}

}

$total = $total_neto_gravado + $total_iva + $total_exento;?>

<!-- <table width="641" height="120" border="1" cellpadding="1" cellspacing="0">

<tr bgcolor="#CCCCCC" class="Estilo2">
  <td height="38" colspan="2" class="Estilo2"  scope="col"><div align="center" class="Estilo6 Estilo4 Estilo9"><strong>RECIBO</strong></div></td>
</tr>
<tr class="Estilo2">
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo6"></div>    
    <div align="left"><span class="Estilo6"><STRONG>BRUTO SUJETO A RETENCIONES <?echo number_format($bruto_sujeto_a,2);?></STRONG></span></div></td>
  </tr>
<tr class="Estilo2">
  <td width="529" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo6"> EXENTO </div></td>
  <td width="102" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo23"><STRONG><span class="Estilo6"><span class="Estilo12">&nbsp;&nbsp;<?echo number_format($total_exento,2);?></span></span></STRONG></span></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo6">NETO GRAVADO</div></td>
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo23"><STRONG><span class="Estilo6"><span class="Estilo12">&nbsp;&nbsp;<?echo number_format($total_neto_gravado,2);?></span></span></STRONG></span></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo6">IVA</span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo23"><STRONG>&nbsp;<span class="Estilo12">&nbsp;<strong><?echo number_format($total_iva,2);?></strong></span></STRONG></span></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC"   scope="col"><div align="right"></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo12"><strong>TOTAL</strong></div></td>
  <td bgcolor="#FFFFFF"   scope="col"><div align="right"><span class="Estilo12">&nbsp;&nbsp;<?echo number_format($total,2);?></STRONG></span></div></td>
</tr>
</table>   -->

<?
$total = "";
$total_iva = "";
$total_neto_gravado = "";
$total_exento = "";

?>



