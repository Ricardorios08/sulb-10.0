<?php 
	include ("../../../conexiones/config_GRABACION.php");
if ($nro_os == 5073){
$sql2 = "SELECT * FROM `afiliados_pami` WHERE nro_os = $nro_os and nro_afiliado = $afiliado";
$result2 = $db_OS->Execute($sql2);
$nombre_afiliado=strtoupper($result2->fields["nombre"]);

if (($control_afiliados == "SI") && ($nombre_afiliado == "")) {
$leyenda = "No Existe ese Afiliado";
include ("../../../alertas/campo_vacio.php");
exit;
}
}

if ($nro_os == 3764){
$sql2 = "SELECT * FROM `afiliados_cimesa` WHERE nro_afiliado = '$afiliado'";
$result2 = $db_os->Execute($sql2);
$nro_afil=strtoupper($result2->fields["nro_afiliado"]);
$condicion=strtoupper($result2->fields["condicion"]);
echo $plan=strtoupper($result2->fields["plan"]);

switch ($plan){
	case "0":{

$coseguro = 0;
	}
	
	case "2000":{
$coseguro = 20;
		break;
	}

	case "3000":{
$coseguro = 30;
		break;
	}

}

if (($control_afiliados == "SI") && ($nro_afil == "")) {
$leyenda = "No Existe ese Afiliado";
include ("../../../alertas/campo_vacio.php");
exit;
}
}

//***************************** MEDIFE ***********************
if ($nro_os == 4975) {

 $afiliado;
// $cuenta = substr($afiliado,0,6);
//$adherente= substr($afiliado,6,2);

//$cuenta="00".$cuenta;

$nodo= substr($afiliado,0,1);
$cuenta= substr($afiliado,1,8);
$adherente= substr($afiliado,9,2);
$efector= substr($afiliado,11,3);

echo $sql1 = "SELECT distinct (tipo_cliente) , cuenta, nodo, efector FROM `afiliados_medife`  WHERE  `cuenta` = '$cuenta' and adherente = '$adherente' and nodo = '$nodo' and efector = '$efector'";
$result1 = $db_os->Execute($sql1);
 $nro_afiliado_padron=$result1->fields["cuenta"];
//$efector_padron=$result1->fields["efector"];
//$plan =$result1->fields["plan"];
//$nodo=$result1->fields["nodo"];



$cod_zona=$result1->fields["tipo_cliente"];

if ($cod_zona == "VOLUNTARIO"){
$cod_zona = 1;
}
elseif ($cod_zona == "OBLIGATORIO"){
$cod_zona = 0;
}



$afiliado = $nro1;

if ($nro_afiliado_padron != ""){
switch ($cod_zona){
		case "0":{
		
$cod_grabacion;
$cont_sin_iva = $cont_sin_iva + 1;

$sql2 = "UPDATE `ordenes` SET `marca` = 'sin_iva' WHERE `cod_grabacion` = $cod_grabacion";
$result2 = $db_gb->Execute($sql2);

$sql1 = "UPDATE `detalle` SET `marca` = 'sin_iva' WHERE `cod_grabacion` = $cod_grabacion";
$result1 = $db_gb->Execute($sql1);

$tipo_afiliado = "SIN IVA";
break;
	}

	case "1":{
$sql = "UPDATE `ordenes` SET `marca` = 'con_iva' WHERE `cod_grabacion` = $cod_grabacion";
$result = $db_gb->Execute($sql);
$sql1 = "UPDATE `detalle` SET `marca` = 'con_iva' WHERE `cod_grabacion` = $cod_grabacion";
$result1 = $db_gb->Execute($sql1);

$tipo_afiliado = "CON IVA";
$cont_iva = $cont_iva + 1;
break;
	}
}
}else{

if (($control_afiliados == "SI") && ($nro_afiliado_padron == "")) {
$leyenda = "No Existe ese Afiliado";
include ("../../../alertas/campo_informacion2.php");
exit;
}


}
}

/*

if (($nro_os == 1041) or ($nro_os == 10411)){


$nro1 = $afiliado;


echo  $sql1 = "SELECT distinct (afiliado) , estado FROM `afiliados_osde`  WHERE  `afiliado` = '$nro1'";
$result1 = $db_os->Execute($sql1);
$nro_afiliado_padron=$result1->fields["afiliado"];
 $cod_zona=strtoupper($result1->fields["estado"]);

if ($cod_zona == "DIRECTOS"){
$cod_zona = 1;
}
elseif ($cod_zona == "EMPRESA"){
$cod_zona = 0;
}





if ($nro_afiliado_padron != ""){
switch ($cod_zona){
		case "0":{
		
$cod_grabacion;
$cont_sin_iva = $cont_sin_iva + 1;
include ("../../../conexiones/config_gb.php");
$sql = "UPDATE `ordenes` SET `marca` = 'sin_iva' WHERE `cod_grabacion` = $cod_grabacion";
//mysql_query($sql);
$sql1 = "UPDATE `detalle` SET `marca` = 'sin_iva' WHERE `cod_grabacion` = $cod_grabacion";
//mysql_query($sql1);

$tipo_afiliado = "SIN IVA";
break;
	}

	case "1":{
$cod_grabacion;
include ("../../../conexiones/config_gb.php");
$sql = "UPDATE `ordenes` SET `marca` = 'con_iva' WHERE `cod_grabacion` = $cod_grabacion";
//mysql_query($sql);
$sql1 = "UPDATE `detalle` SET `marca` = 'con_iva' WHERE `cod_grabacion` = $cod_grabacion";
//mysql_query($sql1);

$tipo_afiliado = "CON IVA";
$cont_iva = $cont_iva + 1;
break;
	}
}
}else{

if (($control_afiliados == "SI") && ($nro_afiliado_padron == "")) {
$leyenda = "No Existe ese Afiliado";
include ("../../../alertas/campo_vacio.php");
exit;
}


}
}
/*
?>