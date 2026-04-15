<?php 
include ("../../../conexiones/config.inc.php");
$mes = "01";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$uno=$result->fields["uno"];


$mes = "02";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10";
$result = $db->Execute($sql);
$dos=$result->fields["uno"];

$mes = "03";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$tres=$result->fields["uno"];

$mes = "04";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$cuatro=$result->fields["uno"];

$mes = "05";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$cinco=$result->fields["uno"];

$mes = "06";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$seis=$result->fields["uno"];

$mes = "07";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$siete=$result->fields["uno"];

$mes = "08";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$ocho=$result->fields["uno"];

$mes = "09";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$nueve=$result->fields["uno"];

$mes = "10";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$diez=$result->fields["uno"];

$mes = "11";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$once=$result->fields["uno"];

$mes = "12";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql = "SELECT count(cod_grabacion) AS uno FROM `ordenes`  WHERE fecha_grabacion between '$desde' and '$hasta' and confirmada = 10 group by nro_paciente";
$result = $db->Execute($sql);
$doce=$result->fields["uno"];

$total = $uno + $dos + $tres + $cuatro + $cinco + $seis + $siete + $ocho + $nueve + $diez + $once + $doce;

if ($uno == 0){$uno = "-";}
if ($dos == 0){$dos = "-";}
if ($tres == 0){$tres = "-";}
if ($cuatro == 0){$cuatro = "-";}
if ($cinco == 0){$cinco = "-";}
if ($seis == 0){$seis = "-";}
if ($siete == 0){$siete = "-";}
if ($ocho == 0){$ocho = "-";}
if ($nueve == 0){$nueve = "-";}
if ($diez == 0){$diez = "-";}
if ($once == 0){$once = "-";}
if ($doce == 0){$doce = "-";}

?>

