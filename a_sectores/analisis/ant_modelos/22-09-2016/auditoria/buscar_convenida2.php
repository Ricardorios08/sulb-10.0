<?php
$B = 1;

$palabra=$_POST["busca"];
$nro_os=$_POST["busca_os"];
$buscador_rapido=$_POST["buscador_rapido"];
$buscar_por = 5;

if ($buscador == 31){
		include ("practicas_convenidas_os1.php");
	exit;
}


if ($nro_os=="") {
include ("../a_sectores/auditoria/practicas/buscar_practicas.php");
}
else
{
	if ($nro_os!="0"){
		include ("practicas_convenidas1.php");
	}
	else{
		include ("practicas_convenidas_os1.php");
	}


}
