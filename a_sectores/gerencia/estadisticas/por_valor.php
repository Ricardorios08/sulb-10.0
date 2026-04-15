<?php 
include ("../../../conexiones/config.inc.php");
$mes = "01";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";
$result = $db->Execute($sql);
$uno=$result->fields["uno"];


$mes = "02";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";
$result = $db->Execute($sql);
$dos=$result->fields["uno"];

$mes = "03";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";
$result = $db->Execute($sql);
$tres=$result->fields["uno"];

$mes = "04";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";
$result = $db->Execute($sql);
$cuatro=$result->fields["uno"];

$mes = "05";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";
$result = $db->Execute($sql);
$cinco=$result->fields["uno"];

$mes = "06";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";
$result = $db->Execute($sql);
$seis=$result->fields["uno"];

$mes = "07";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";$result = $db->Execute($sql);
$siete=$result->fields["uno"];

$mes = "08";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";$result = $db->Execute($sql);
$ocho=$result->fields["uno"];

$mes = "09";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";$result = $db->Execute($sql);
$nueve=$result->fields["uno"];

$mes = "10";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";$result = $db->Execute($sql);
$diez=$result->fields["uno"];

$mes = "11";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";$result = $db->Execute($sql);
$once=$result->fields["uno"];

$mes = "12";
$desde = $ano."-".$mes."-01";$hasta= $ano."-".$mes."-31";
$sql = "SELECT sum(valor) AS uno FROM `detalle`  WHERE periodo = '$mes' and ano = $ano";$result = $db->Execute($sql);
$doce=$result->fields["uno"];

$total = $uno + $dos + $tres + $cuatro + $cinco + $seis + $siete + $ocho + $nueve + $diez + $once + $doce;

if ($uno == 0){$uno = "-";}else{$uno = number_format($uno,2);}
if ($dos == 0){$dos = "-";}else{$dos = number_format($dos,2);}
if ($tres == 0){$tres = "-";}else{$tres = number_format($tres,2);}
if ($cuatro == 0){$cuatro = "-";}else{$cuatro = number_format($cuatro,2);}
if ($cinco == 0){$cinco = "-";}else{$cinco = number_format($cinco,2);}
if ($seis == 0){$seis = "-";}else{$seis = number_format($seis,2);}
if ($siete == 0){$siete = "-";}else{$siete = number_format($siete,2);}
if ($ocho == 0){$ocho = "-";}else{$ocho = number_format($ocho,2);}
if ($nueve == 0){$nueve = "-";}else{$nueve = number_format($nueve,2);}
if ($diez == 0){$diez = "-";}else{$diez = number_format($diez,2);}
if ($once == 0){$once = "-";}else{$once = number_format($once,2);}
if ($doce == 0){$doce = "-";}else{$doce = number_format($doce,2);}

$total = "$ ".number_format($total,2);

?>

