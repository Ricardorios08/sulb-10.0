<?php 


include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");

$tipo_operador = $_REQUEST['tipo_operador'];


$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

//$nro_laboratorio1=$result10->fields["matricula"];
$cuit_prestador=$result10->fields["cuit"];
$terminal=$result10->fields["terminal"];
 
$cod_grabacion= $_REQUEST['cod_grabacion'];
$nro_paciente= $_REQUEST['nro_paciente'];
$numero_credencial= $_REQUEST['nro_afiliado'];

$sql10="select * from ordenes where cod_grabacion = $cod_grabacion";
$result10 = $db->Execute($sql10);

$autorizacion=$result10->fields["autorizacion"];
$numero_credencial=$result10->fields["nro_afiliado"];
$nro_os=$result10->fields["nro_os"];
$fecha=$result10->fields["fecha"];
$di = substr($fecha,8,2);
$me = substr($fecha,5,2);
$an = substr($fecha,0,4);
$fecha_orden = $an.$me.$di;
$fecha_hoy = date("Ymd");
$medico=$result10->fields["medico"];


$sql10="select * from pacientes where nro_paciente = $nro_paciente";
$result10 = $db->Execute($sql10);

$numero_credencial=$result10->fields["nro_afiliado"];
//$numero_credencial = $numero_credencial * 1;
$ultima_fecha=$result10->fields["ultima_fecha"];
$track=$result10->fields["track"];
$ultima_01a=$result10->fields["ultima_01a"];


$dia = substr($ultima_fecha,8,2);
$mes= substr($ultima_fecha,5,2);
$anio = substr($ultima_fecha,0,4);

$ultima_fecha = $anio.$mes.$dia;



if ($autorizacion > 0){
$leyenda = "YA AUTORIZO ESTA ORDEN ".$autorizacion;
include ("../../alertas/campo_informacion2.php");
exit;
}


if ($nro_os == 1041){
 $sql="select count(cuit) as cant from datos_osde";
 $result = $db->Execute($sql);

$cant=strtoupper($result->fields["cant"]);

if ($cant > 1){
include ("elige_cuit.php");
}else{

 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

$cuit_prestador=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$nro_laboratorio1=strtoupper($result->fields["cuenta_abm"]);
include ("osde_ws.php");
	}


}elseif($nro_os == 2042){
	 $sql="select count(cuit) as cant from datos_osde";
 $result = $db->Execute($sql);

$cant=strtoupper($result->fields["cant"]);

if ($cant > 1){
include ("elige_cuit.php");
}else{

 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

$cuit_prestador=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$nro_laboratorio1=strtoupper($result->fields["cuenta_abm"]);
	include	("aapm.php");
}


}elseif($nro_os == 3771){
	 $sql="select count(cuit) as cant from datos_osde";
 $result = $db->Execute($sql);

$cant=strtoupper($result->fields["cant"]);

if ($cant > 1){
include ("elige_cuit.php");
}else{

 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

$cuit_prestador=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$nro_laboratorio1=strtoupper($result->fields["cuenta_abm"]);
	include	("osdipp.php");
}


}elseif($nro_os == 5073){
	 $sql="select count(cuit) as cant from datos_osde";
 $result = $db->Execute($sql);

$cant=strtoupper($result->fields["cant"]);

if ($cant > 1){
include ("elige_cuit.php");
}else{

 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

$cuit_prestador=strtoupper($result->fields["cuit"]);
$cuit=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$nro_laboratorio1=strtoupper($result->fields["cuenta_abm"]);
$prestador=strtoupper($result->fields["prestador"]);
	include	("pami.php");

}

}elseif($nro_os == 5080){
	  $sql="select count(cuit) as cant from datos_osde";
 $result = $db->Execute($sql);

$cant=strtoupper($result->fields["cant"]);

if ($cant > 1){
include ("elige_cuit_san.php");
}else{

 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

$cuit_prestador=strtoupper($result->fields["cuit"]);
$cuit=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$nro_laboratorio1=strtoupper($result->fields["cuenta_abm"]);
$prestador=strtoupper($result->fields["prestador"]);

 $cuit_prestador = $cuit;
	include	("sancor_ws.php");
}

}elseif($nro_os == 5396){
	  $sql="select count(cuit) as cant from datos_osde";
 $result = $db->Execute($sql);

$cant=strtoupper($result->fields["cant"]);

if ($cant > 1){
include ("elige_cuit_bor.php");
}else{

 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

$cuit_prestador=strtoupper($result->fields["cuit"]);
$cuit=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$nro_laboratorio1=strtoupper($result->fields["cuenta_abm"]);
$prestador=strtoupper($result->fields["prestador"]);

 $cuit_prestador = $cuit;


	include	("boreal_ws.php");
}

}else{
 
 
  $sql="select count(cuit) as cant from datos_osde";
 $result = $db->Execute($sql);

$cant=strtoupper($result->fields["cant"]);

if ($cant > 1){
include ("elige_cuit_abm.php");

}else{

 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

$cuit_prestador=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
 $nro_laboratorio1=strtoupper($result->fields["cuenta_abm"]);
 $prestador=strtoupper($result->fields["prestador"]);
include ("abm_ws.php");
	}


}



/*

if ($nro_os == 1041){ // validacion osde

	 $sql="select count(cuit) as cant from datos_osde";
 $result = $db->Execute($sql);

$cant=strtoupper($result->fields["cant"]);

if ($cant > 1){
include ("elige_cuit.php");
}else
	{

 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

$cuit_prestador=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$nro_laboratorio1=strtoupper($result->fields["cuenta_abm"]);
	include ("osde_ws.php");
	}


}else{ /// valiadacion abm


	 $sql="select count(cuit) as cant from datos_osde";
 $result = $db->Execute($sql);

$cant=strtoupper($result->fields["cant"]);

if ($cant > 1){
include ("elige_cuit_abm.php");

}else
	{

 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

$cuit_prestador=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$nro_laboratorio1=strtoupper($result->fields["cuenta_abm"]);
		include ("abm_ws.php");
	}



}

*/