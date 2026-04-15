<?php

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

$periodo_liq = $periodo;
$anio_liquidacion_liq = $anio_liquidacion;



$cuenta_ab=$_POST["cuenta_abm"];
for ($i=0;$i<count($cuenta_ab);$i++)    
{     
$cuenta_abm = $cuenta_ab[$i];    
}
  $nro_laboratorio = $cuenta_abm;


$contra=$_POST["contra"];

if ($contra != "321"){
$leyenda = "NO ESTA AUTORIZADO A REALIZAR ESTA CONSULTA";
include("../../alertas/campo_informacion2.php");
exit;
}


	include ("../../conexiones/config.inc.php");

require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('variable1'=>$cuenta_abm , 'variable2'=>$periodo , 'variable3'=>$anio_liquidacion , 'variable4'=>$nro_liquidacion);


$response= $client->call('producto', $param1);


   $sql = "TRUNCATE TABLE liquido_producto";
 $result = $db->Execute($sql);


 $a = "INSERT INTO `liquido_producto` (`tipo_fact`, `nro_factura`, `fecha_factura`, `cuenta`, `condicion_iva`, `exento`, `neto_gravado`, `importe_iva`, `importe_descuentos`, `total_original`, `saldo`, `fecha_ultimo_pago`, `pago_caja`, `pago_liquidacion`, `fecha_liquidacion`, `nro_liquidacion`, `mes_liquidacion`, `anio_liquidacion`, `tipo_cuenta`, `cod_operacion`, `facturado`, `gastos_adm`, `afip`, `atm`, `debitos`, `creditos`, `bruto`, `afectada`, `cuota`, `boca_expendio`, `cae`, `vencimiento_cae`, `tipo_emision`, `reproceso`, `errores`, `resultado`, `codigo`)VALUES ".$response.";";
$result = $db->Execute($a);


//VALUES (`tipo_fact`, `nro_factura`, `fecha_factura`, `cuenta`, `condicion_iva`, `exento`, `neto_gravado`, `importe_iva`, `importe_descuentos`, `total_original`, `saldo`, `fecha_ultimo_pago`, `pago_caja`, `pago_liquidacion`, `fecha_liquidacion`, `nro_liquidacion`, `mes_liquidacion`, `anio_liquidacion`, `tipo_cuenta`, `cod_operacion`, `facturado`, `gastos_adm`, `afip`, `atm`, `debitos`, `creditos`, `bruto`, `afectada`, `cuota`, `boca_expendio`, `cae`, `vencimiento_cae`, `tipo_emision`, `reproceso`, `errores`, `resultado`, `codigo`)";

 

 
if ($tipo_fact == "A"){
	include ("factura_papel_ele_a.php");
	exit;
}else{
	include ("factura_papel_ele_b.php");
	exit;
}





