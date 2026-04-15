<?php 
//include ("../../conexiones/config_pr.php");
$sql677 = "SELECT valor, gastos FROM `convenio_practica` WHERE `cod_practica` = 677 AND `nro_os` = $nro_os";
$result = $db->Execute($sql677);
$valor_677 = $result->fields["valor"];
$gastos_677 = $result->fields["gastos"];
$honorarios_677 = $result->fields["honorarios"];
  
$sql = "SELECT valor, gastos, honorarios FROM `convenio_practica` WHERE nro_os = $nro_os and cod_practica = 998";
$result1 = $db->Execute($sql);
$valor_998 = $result1->fields["valor"];
$gastos_998 = $result1->fields["gastos"];
$honorarios_998 = $result1->fields["honorarios"];

$sql = "SELECT * FROM `convenio_practica` WHERE nro_os = $nro_os and cod_practica = 001";
$result1 = $db->Execute($sql);
$valor_001 = $result1->fields["valor"];
$gastos_001 = $result1->fields["gastos"];
$honorarios_001 = $result1->fields["honorarios"];


switch ($modalidad){
	 case "1": // honorarios / nbu
	 {

$valor_001 = 0;
$valor_677 = 0;
$valor_998 = 0;
$valor_998=round(($valor_998) + ($vuh * $honorarios_998),2);
$valor_677=round(($valor_677) + ($vuh * $honorarios_677),2);
$valor_001=round(($valor_001) + ($vuh * $honorarios_001),2);
break;
	 }
	 case "2": // unid bioq / unid. gastos
	 {

$valor_001 = 0;
$valor_677 = 0;
$valor_998 = 0;
$valor_998=round(($valor_998) + (($vuh * $honorarios_998) + ($vug * $gastos_998)),2);
$valor_677=round(($valor_677) + (($vuh * $honorarios_677) + ($vug * $gastos_677)),2);
$valor_001=round(($valor_001) + (($vuh * $honorarios_001) + ($vug * $gastos_001)),2);
break;
	 }

case "3": //valor
	 {

$valor_001 = $result1->fields["valor"];
break;
	 }
 }



