<?php 
include ("../../../conexiones/config.inc.php");




$mes = "01";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$uno = $uno + 1;
$result->MoveNext();
	}

$mes = "02";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
 $dos = $dos+ 1;
$result->MoveNext();
	}

$mes = "03";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$tres = $tres + 1;
$result->MoveNext();
	}

$mes = "04";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cuatro = $cuatro + 1;
$result->MoveNext();
	}

$mes = "05";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cinco = $cinco + 1;
$result->MoveNext();
	}

$mes = "06";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$seis = $seis+ 1;
$result->MoveNext();
	}

$mes = "07";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$siete = $siete + 1;
$result->MoveNext();
	}

$mes = "08";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$ocho = $ocho + 1;
$result->MoveNext();
	}

$mes = "09";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nueve = $nueve + 1;
$result->MoveNext();
	}

$mes = "10";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$diez = $diez + 1;
$result->MoveNext();
	}

$mes = "11";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$once = $once + 1;
$result->MoveNext();
	}

$mes = "12";
$desde = $anio."-".$mes."-01";$hasta= $anio."-".$mes."-31";
$sql="SELECT count(nro_paciente) as cuenta FROM `ordenes` WHERE fecha_grabacion between '$desde' and '$hasta' group by nro_paciente ";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$doce = $doce + 1;
$result->MoveNext();
	}


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

