
<!--  <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">  -->
<?
$band_deb = 1;
$band_acred = 1;

$band = 1;
$bande = 1;
$bande1 = 1;
$bande2=1;
$banderin = 1;
$parcial_a = "";
$total_excedente ="";
$importe = "";


$tot_ex = "";
$total_iva = "";
$total_a_cuenta = "";
include_once ("../../../conexiones/config.inc.php");





$liquidacion = "liquidacion";






$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;
	
$sql6 = "SELECT * FROM `afip` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result6 = $db_bq->Execute($sql6);
$sit_iva=ucwords($result6->fields["sit_iva"]);




 $sql2 = "SELECT * FROM $liquidacion WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion ";
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
$fecha_movimiento=$result2->fields["fecha_movimiento"];

$importe_original=$result2->fields["importe"];
$dto_liq=$result2->fields["bruto"];
$pago_caja=$result2->fields["acumulado_mensual"];



$saldo_deuda=$result2->fields["saldo_deuda"];
$importe_liq=$result2->fields["importe"];
$nro_factu=strtoupper($result2->fields["nro_factura"]); //1580

$dia_1 = substr($fecha,8,2);
$mes_2 = substr($fecha,5,2);
$anio_3 = substr($fecha,0,4);
 //$fecha = $dia_1."-".$mes_2."-".$anio_3;

$dia_6 = substr($fecha_movimiento,8,2);
$mes_6 = substr($fecha_movimiento,5,2);
$anio_6 = substr($fecha_movimiento,0,4);
// $fecha_movimiento = $dia_6."-".$mes_6."-".$anio_6;



switch ($operacion){
	case "100":{

IF (($periodo <= 8) and ($nro_liquidacion < 2) and ($anio == 10)){
$importe = "";
}


	 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` , `nombre_os` )  VALUES ( '', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '100', '$importe', 'SALDO INICIAL', '', '$fecha', '', '', '', '', '', '' , '$nombre_laboratorio')";
$result6 = $db_liq->Execute($sql6);


	$saldo_cta_cte = $importe;
	break;
	}

case "200":{

if ($pagadas == ""){
	$pagadas = 1;

}

$ex_capita = "";
$a_cuenta = "";

$sql1="select * from factura where nro_factura = '$nro_factura' and nro_os = $nro_os"; //4
$result1 = $db_fa->Execute($sql1);

$nro_os=strtoupper($result1->fields["nro_os"]); // 2617
$fecha_pago_fact=strtoupper($result1->fields["fecha_pago_fact"]); // 2617
$fecha_original=strtoupper($result1->fields["fecha"]); // 2617

$dia2 = substr($fecha_original,8,2);
$mes2 = substr($fecha_original,5,2);
$anio2 = substr($fecha_original,0,4);
//$fecha_original_fact = $dia2."-".$mes2."-".$anio2;


$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
//$fecha_pago_fact = $dia."-".$mes."-".$anio;



if ($fecha_pago_fact == "-/0-00/0"){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $anio."-".$mes."-".$dia;
}
elseif ($fecha_pago_fact == "--"){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $anio."-".$mes."-".$dia;
}
elseif ($fecha_pago_fact == ""){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";

$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $anio."-".$mes."-".$dia;
}

/*include ("../../../conexiones/config_liq.php");
 $sql12="select * from composicion where nro_os like '$nro_os' and nro_factura = $nro_factura and nro_laboratorio = $nro_laboratorio";
$result12 = $db_liq->Execute($sql12);
$iva=$result12->fields["iva"];
$neto_gravado=$result12->fields["neto_gravado"];
$exento=$result12->fields["exento"];

$iva_porc = ($iva * $porcentaje / 100);

if ($iva > 0){
 $sql5 = "INSERT INTO `iva_facturar` ( `nro_laboratorio` , `nro_liquidacion` , `periodo_liquidacion` , `anio_liquidacion` , `importe_original` , `iva` , `porcentaje` )  VALUES ('$nro_laboratorio'  , '$nro_liquidacion' , '$periodo' , '$anio_liquidacion' , '$iva' , '$iva_porc' , '$porcentaje' )";
$result5 = $db_liq->Execute($sql5);
}
*/


include ("../../../conexiones/config_liq.php");
$sql123="select *  from composicion where nro_os like '$nro_os' and nro_factura = $nro_factura and nro_laboratorio = $nro_laboratorio";
$result123 = $db_liq->Execute($sql123);

$iva=$result123->fields["iva"];
$neto_gravado=$result123->fields["neto_gravado"];
$exento=$result123->fields["exento"];
$tipo_iva=$result123->fields["tipo_iva"];

if (($nro_factura == 8649) and ($nro_os == 4975)){
$iva = "";
}

if ($iva > 0) {
$marca = "*";
$tipo_iva;

$ex_capita = ($importe - $bruto);
$iva=$importe - $bruto;

$total_iva=$total_iva + $iva;

}else{
$marca = "";
$total_excedente = $total_excedente + $ex_capita;
}


/*
if (($iva > 0.00) and ($neto_gravado == 0.00) and ($exento == 0.00)){
	$exento = $importe;
	}

$total_iva = $total_iva + $iva;
$total_neto_gravado = $total_neto_gravado + $neto_gravado;
$total_exento = $total_exento + $exento;

$total_iva = ($total_iva * $porcentaje / 100);
$total_neto_gravado = ($total_neto_gravado * $porcentaje / 100);
$total_exento = ($total_exento * $porcentaje / 100);

*/


include ("../../../conexiones/config_os.php");
$sql12="select * from datos_os where nro_os like '$nro_os'";
$result12 = $db_os->Execute($sql12);
$sigla=strtoupper($result12->fields["sigla"]);
$sigla = substr($sigla,0,7);

if ($tipo_pago != "PARCIAL A CUENTA"){
$ex_capita = $importe - $bruto;
}

if ($tipo_pago == "PARCIAL A CUENTA"){
$tipo_pago = "PARC.A/CTA";
$parcial_a = $importe - $bruto;
$a_cuenta = $importe - $bruto;
$ex_capita = "";
$total_a_cuenta = $total_a_cuenta + $a_cuenta;
}

if ($tipo_iva == 1){

	$a = $bruto + $iva;
if (($tipo_pago == "COMPLETA") AND ($a = $importe)){
$ex_capita = "";
$a_cuenta = $importe - $bruto;
$total_a_cuenta = $total_a_cuenta + $a_cuenta;
}
}

$tot_importe = $tot_importe + $importe;


$tot_ex = $tot_ex + $ex_capita;

 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` , `nombre_os` )  VALUES ( '$nro_os', '$nro_laboratorio', '$nro_factura', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '200', '$importe', '$tipo_pago', '$motivo', '$fecha_original', '$porcentaje', '$a_cuenta', '$ex_capita', '$fecha_pago_fact', '$bruto', '' , '$sigla')";
$result6 = $db_liq->Execute($sql6);



if ($a_cuenta != 0.00){$a_cuenta = number_format($a_cuenta,2);}else{$a_cuenta = "-";}
if ($ex_capita != 0.00){$ex_capita = number_format($ex_capita,2);}else{$ex_capita = "";}


break;
}

case "300":{


 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '300', '$tot_importe', '$total_a_cuenta', 'TOTAL LIQUIDADO', '$fecha', '', '$tot_ex', '', '', '$bruto', '')";
$result6 = $db_liq->Execute($sql6);


$brut = $bruto;

break;
}

case "390":{

IF (($periodo <= 8) and ($nro_liquidacion < 2) and ($anio_liquidacion == 10)){
$importe = "";

}


//if ($band_deb == 1){


if ($sit_iva == 1){
	$total_iva = "";
}


$total_excedente = $tot_ex - $total_iva;
//$importe = $importe + $total_a_cuenta;


	 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '310', '$total_excedente', '', 'TOTAL EXCEDENTE', '$fecha', '', '', '', '', '', '')";
$result6 = $db_liq->Execute($sql6);


	 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '320', '$total_iva', '', 'TOTAL IVA', '$fecha', '', '', '', '', '', '')";
$result6 = $db_liq->Execute($sql6);

	 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '390', '$importe', '', 'SALDO ACTUALIZADO', '$fecha', '', '', '', '', '', '')";
$result6 = $db_liq->Execute($sql6);



$band_deb = 2;
//}

$saldo_debitos = $brut;
break;

}


case "400":{

		if ($banderin == 1){
$banderin = 0;




}
  

	$sql12="select * from datos_os where nro_os like '$nro_os'";
$result12 = $db_os->Execute($sql12);
$sigla=strtoupper($result12->fields["sigla"]);
$sigla = substr($sigla,0,7);

 $sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617
$motivo=substr($motivo,0,25);


?>
>



<?	


switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			$saldo_debitos = $saldo_debitos + $importe;

 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon`  , `nombre_os` )  VALUES ( '$nro_os', '$nro_laboratorio', '$nro_factura', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '400', '', 'AJ_POSITIVO', '$motivo', '$fecha', '', '$importe', '', '', '$saldo_debitos', '' , '$sigla')";
$result6 = $db_liq->Execute($sql6);




		break;}

case "AJ_NEGATIVO"://novedades al debito
		{
		
			$saldo_debitos = $saldo_debitos - $importe;

 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` , `nombre_os` )  VALUES ( '$nro_os', '$nro_laboratorio', '$nro_factura', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '400', '$importe', 'AJ_NEGATIVO', '$motivo', '$fecha', '', '', '', '', '$saldo_debitos', '' , '$sigla')";
$result6 = $db_liq->Execute($sql6);




		break;}

}
		if ($saldo_debitos == 0){

include ("sin_acreeditacion.php");

}




    

	
	?>


  




<?


break;


}

case "500":{


 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '500', '$importe', '', 'TOTAL DEB-CRED', '$fecha', '', '$bruto', '$acumulado_mensual', '', '', '')";
$result6 = $db_liq->Execute($sql6);




}

case "600":

	{

	if ($bande == 1){


 $saldo= $saldo_debitos;

	  $bande = 2;
	}

	
 $sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617
$motivo=substr($motivo,0,25);

$sql1="select fecha from factura where nro_factura like '$nro_factura'";
$result1 = $db_fa->Execute($sql1);
$fecha_original=$result1->fields["fecha"];


$sql1="select sigla from datos_os where nro_os like '$nro_os'";
$result1 = $db_os->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);
$sigla = substr($sigla,0,7);



   switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			 $saldo = round($saldo + $importe,2);
			$total_credito = round($total_credito + $importe,2);

 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` , `nombre_os`)  VALUES ( '$nro_os', '$nro_laboratorio', '$nro_factura', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '600', '', 'AJ_POSITIVO', '$motivo', '$fecha_movimiento', '', '$importe', '', '', '$saldo', '' , '$sigla')";
$result6 = $db_liq->Execute($sql6);



		break;}


case "AJ_NEGATIVO"://novedades al debito
		{
		
			 $saldo = round($saldo - $importe,2);
			$total_debito = round($total_debito + $importe,2);


 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` , , `nombre_os`)  VALUES ( '$nro_os', '$nro_laboratorio', '$nro_factura', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '600', '$importe', 'AJ_NEGATIVO', '$motivo', '$fecha', '', '', '', '', '$saldo', '' , '$sigla')";
$result6 = $db_liq->Execute($sql6);


		break;}
}

if ($saldo == 0){


	if ($saldo == 0){


include ("sin_acreeditacion.php");

}

}

  


$total_debitos_pen = $total_de + $importe;
	break;
	}

	case "700":{

 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '700', '$total_debito', '', 'TOTAL DEB FOR', '$fecha', '', '$total_credito', '$saldo', '', '', '')";
$result6 = $db_liq->Execute($sql6);


}

case "800":{

	switch ($motivo) {
	case "10": {

//if ($bande1 == 1){

	 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '800', '', 'SUB TOTAL RETENCIONES', '10', '$fecha', '', '', '', '', '$importe', '')";
$result6 = $db_liq->Execute($sql6);


$saldo_retenciones_adm = $importe;
$base_impuesto = $importe;
	$bande1=2;

	//}
$dgr_base = $importe;

	$base_sin_cos = $importe;
	break;
	}


case "11": {

$base_cos = $importe;
$dif_cose = $base_cos - $base_sin_cos;

 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '800', '$dif_cose', 'SUB TOTAL COSEGURO', '11', '$fecha', '', '', '', '', '', '')";
$result6 = $db_liq->Execute($sql6);



break;
}

case "20": {

$saldo_retenciones_adm = $base_impuesto - $importe;
$total_importe = $total_importe + $importe;

 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '800', '$base_cos', 'GASTOS_ADM', '20', '$fecha', '$porcentaje', '$importe', '', '', '$saldo_retenciones_adm', '')";
$result6 = $db_liq->Execute($sql6);






$saldo_retenciones_adm = round($saldo_retenciones_adm,2);
if ($saldo_retenciones_adm == 0){
include ("sin_acreeditacion.php");
}


		break;}

		case "30": {
	
$saldo_retenciones_adm = 	round($saldo_retenciones_adm - $importe,2);
$total_importe = round($total_importe + $importe,2);
if ($importe > 0){

$sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '800', '$bruto', 'RETENCION_AFIP', '30', '$fecha', '$porcentaje', '$importe', '', '', '$saldo_retenciones_adm', '')";
$result6 = $db_liq->Execute($sql6);



$saldo_retenciones_adm;


$saldo_retenciones_adm = round($saldo_retenciones_adm,2);
if ($saldo_retenciones_adm == 0){
include ("sin_acreeditacion.php");
}
}
	
 

		break;}



case "40": {

$saldo_retenciones_adm = $saldo_retenciones_adm - $importe;
$total_importe = $total_importe + $importe;


if ($importe > 0){

$sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '800', '$dgr_base', 'RETENCION_DGR', '30', '$fecha', '$porcentaje', '$importe', '', '', '$saldo_retenciones_adm', '')";
$result6 = $db_liq->Execute($sql6);




$saldo_retenciones_adm = round($saldo_retenciones_adm,2);
if ($saldo_retenciones_adm == 0){
include ("sin_acreeditacion.php");
}


}	



		break;	}


}
	break;
?>	
<?
}//cierra motivo en 800 retenciones

case "900":{
$novedades = "";
$sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '900', '', 'TOTAL RETENCIONES', '', '$fecha', '$porcentaje', '$total_importe', '$importe', '', '', '')";
$result6 = $db_liq->Execute($sql6);



$saldo_novedades = $importe;
  $band_acred = 2;
//}

$saldo_novedades = round($saldo_novedades,2);
if ($saldo_novedades == 0){
include ("sin_acreeditacion.php");
}

break;


} //cierra el caso 900


case "1000":
case "1100":
	
// NOVEDADES
	{

if ($novedades == ""){
	$novedades = 1;

}

IF ($transaccion == 'TR_POSITIVA'){
	$transaccion = 'TR_POSITIVO';
}


 $sql1="select * from ajustes where cod_ajuste = '$ajuste' and tipo_ajuste like '$transaccion'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["abreviatura"]); // 2617

?>
  


<?	switch ($tipo_pago){

case "TR_POSITIVO":{
				$saldo_novedades = round($saldo_novedades + $importe,2);
					$total_pos = $total_pos + $importe;


$sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '$nro_factura', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '$operacion', '$saldo_deuda', '$transaccion', '$motivo', '$fecha', '$porcentaje', '', '$importe', '', '$saldo_novedades', '')";
$result6 = $db_liq->Execute($sql6);


		break;}


case "TR_NEGATIVO"://novedades al debito
		{

				$total_neg = $total_neg + $importe;
			$saldo_novedades = round($saldo_novedades - $importe,2);

$sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '$nro_factura', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '$operacion', '$saldo_deuda', '$transaccion', '$motivo', '$fecha', '$porcentaje', '$importe', '' , '', '$saldo_novedades', '')";
$result6 = $db_liq->Execute($sql6);



if (($saldo_novedades == 0) or ($saldo_novedades == 0.00)){
$opera = "1250"; // caratula deuda

include ("sin_acreeditacion.php");

}

		break;}
}




break;
	}

	



	case "1200":{

if (($total_neg == 0.00) && ($total_pos == 0.00)){


}


		IF ($saldo_novedades > 0 ){

$sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '$nro_factura', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '$operacion', '', 'ACREEDITAR', '', '$fecha', '', '$', '' , '', '$saldo_novedades', '')";
$result6 = $db_liq->Execute($sql6);


	include ("../../../conexiones/config.inc.php");
 $sql_facturante = "SELECT * FROM `facturante` WHERE `nro_laboratorio` = '$nro_laboratorio'";
$result_facturante = $db_bq->Execute($sql_facturante);

$banco= $result_facturante->fields["banco"];
$nro_cuenta= $result_facturante->fields["nro_cuenta"];
$cuenta= $result_facturante->fields["cuenta"];
$sucursal = substr($nro_cuenta,0,3);
$nro_cuenta = substr($nro_cuenta,4,6);


$acree = 1;
		
		
	}else{

		
		
	$acree = 1;}
break;
	}


	case "2000":{




	


$sql12="select sum(saldo_deuda) as saldo_total from $liquidacion where `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion and operacion = 2000 order by operacion, motivo";
$result12 = $db_liq->Execute($sql12);
$saldo_total=strtoupper($result12->fields["saldo_total"]);
$saldo_1=strtoupper($result12->fields["saldo_total"]);

if ($pasada == ""){
	$pasada = 1;

	$pasada = 2;}

$sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617
$motivo = substr($motivo,0,18);

if ($fecha_movimiento == '00-00-0000'){$fecha_movimiento = "-";}
if ($acumulado_mensual == '0.00'){$acumulado_mensual = "-";}

 $sql6 = "INSERT INTO `liquidacion_web` ( `nro_os` , `nro_laboratorio` , `nro_factura` , `nro_liquidacion` , `periodo` , `anio` , `operacion` , `importe` , `tipo_pago` , `motivo` , `fecha` , `porcentaje` , `bruto` , `acumulado_mensual` , `fecha_movimiento` , `saldo_deuda` , `cod_renglon` )  VALUES ( '$nro_os', '$nro_laboratorio', '$nro_factu', '$nro_liquidacion', '$periodo', '$anio_liquidacion', '$operacion', '$importe', '$motivo', '$motivo', '$fecha', '', '$dto_liq', '$fecha_movimiento' , '$acumulado_mensual', '$saldo_deuda', '')";
$result6 = $db_liq->Execute($sql6);


?>
	


      
     
	<?$saldo_total = $saldo_total + $saldo_deuda;


		

	break;}//cierra el caso 2000 deuda



}//cierra el bucle operacion



$result2->MoveNext();
  }


?>
    <?


if ($nro_lab != $nro_laboratorio){

	$total_importe = 0;


if ($acree != 1){

	
}

	$total = $total_neto_gravado + $total_iva + $total_exento;
	$saldo_1 = "";
	?>

	  <?
}

 $total_excedente = "";
?>
