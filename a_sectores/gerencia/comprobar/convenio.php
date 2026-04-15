<?php 


if ($band == "buscar_practicas"){
include ("../../../conexiones/config_os.php");

}
else
{
include ("../../conexiones/config_os.php");
}


if ($facturar == "NO"){
	$nro_os_old = $nro_os;
	$nro_os = $nro_os2;
}



$sql="select * from arancel where nro_os = $nro_os";
$result = $db->Execute($sql);
 
$modalidad=ucwords($result->fields["modalidad"]);
$vuh=$result->fields["uh"];
$vug=$result->fields["ug"];

$modalidad_especiales=ucwords($result->fields["modalidad_especiales"]);
$vuh_especiales=$result->fields["uh_especiales"];
$vug_especiales=$result->fields["ug_especiales"];

$modalidad=ucwords($result->fields["modalidad_alta"]);
$vuh_alta=$result->fields["uh_alta"];
$vug_alta=$result->fields["ug_alta"];



$vuh1=$result->fields["uh"];
$vug1=$result->fields["ug"];


$sql11="select * from incremento where nro_os = $nro_os";
$result11 = $db->Execute($sql11);

$material_descartable=ucwords($result11->fields["material_descartable"]);
$acto_bioquimico=ucwords($result11->fields["acto_bioquimico"]);
$toma_muestra=ucwords($result11->fields["toma_muestra"]);

 $sql12="select * from op_facturacion where nro_os = $nro_os";
$result12 = $db->Execute($sql12);

$operacion=ucwords($result12->fields["operacion"]);
$porc_gastos=ucwords($result12->fields["gastos"]);
$porc_honorarios=ucwords($result12->fields["honorarios"]);

$coseguro=ucwords($result12->fields["coseguro"]);
$valor_porcentaje=ucwords($result12->fields["valor_porcentaje"]);

$coseguro_esp=$result12->fields["coseguro_esp"];
$valor_porc_esp=$result12->fields["valor_porc_esp"];

$coseguro_comp=ucwords($result12->fields["coseguro_comp"]);
$valor_porc_comp=ucwords($result12->fields["valor_porc_comp"]);
$iva_convenido=ucwords($result12->fields["iva"]);

$sql="select * from forma_pago where nro_os = $nro_os";
$result = $db->Execute($sql);
$vencimiento=substr($result->fields["vencimiento"],0,2);



/* switch ($coseguro){

	case "1": //valor por practica
	{

		$cobrar_coseguro = 1;
		break;
	}


	case "2": //valor por orden
	{
				$cobrar_coseguro = 2;
		break;
	}

case "3": //porcentaje por practica
	{
				$cobrar_coseguro = 3;
		break;
	}

case "4": //porcentaje por orden
	{
				$cobrar_coseguro = 4;
		break;
	}
}
*/








if ($operacion == "SUMA"){
$porc_vuh = (($vuh * $porc_honorarios)/100);
$vuh = $vuh + $porc_vuh;
$porc_vug = (($vug * $porc_gastos)/100);
$vug = $vug + $porc_vug;
$vuh1 = $vuh1." + ".$porc_honorarios." %";
$vug1 = $vug1." + ".$porc_gastos." %";

}

if ($operacion == "RESTA"){
$porc_vuh = (($vuh * $porc_honorarios)/100);
$vuh = $vuh - $porc_vuh;
$porc_vug = (($vug * $porc_gastos)/100);
$vug = $vug - $porc_vug;
$vuh1 = $vuh1." - ".$porc_honorarios." %";
$vug1 = $vug1." - ".$porc_gastos." %";
}

if ($facturar == "NO"){
	$nro_os = $nro_os_old;
}

