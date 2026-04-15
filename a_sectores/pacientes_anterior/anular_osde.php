<?php 
include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");


$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

$nro_laboratorio1=$result10->fields["matricula"];
$cuit_prestador=$result10->fields["cuit_prestador"];

 
$cod_grabacion= $_REQUEST['cod_grabacion'];
$nro_paciente= $_REQUEST['nro_paciente'];
$numero_credencial= $_REQUEST['nro_afiliado'];

$sql10="select * from ordenes where cod_grabacion = $cod_grabacion";
$result10 = $db->Execute($sql10);

$autorizacion=$result10->fields["autorizacion"];
$autorizacion_ws=$result10->fields["autorizacion_ws"];
$nro_os=$result10->fields["nro_os"];

 $fechaTrx=$result10->fields["fecha_osde"];
 $HoraTrx=$result10->fields["hora_osde"];
$cuit_prestador=$result10->fields["cuit_osde"];

$sql10="select * from datos_osde where cuit = $cuit_prestador";
$result10 = $db->Execute($sql10);

 $cuenta_abm=$result10->fields["cuenta_abm"];
 $clave=$result10->fields["cuenta_abm"];
 


if (($autorizacion_ws == "") or ($autorizacion_ws == 0)){
$leyenda = "NO SE PUEDE ANULAR PORQUE NO ESTA AUTORIZADA";
include ("../../alertas/campo_informacion2.php");
EXIT;
}




$fecha=$result10->fields["fecha"];

$numero_credencial=$result10->fields["nro_afiliado"];

$sql10="select * from pacientes where nro_paciente = $nro_paciente";
$result10 = $db->Execute($sql10);

$numero_credencial=$result10->fields["nro_afiliado"];


$numero_credencial = $numero_credencial * 1;

$nro_os;
if ($nro_os == 1041){
include ("anula_osde_ws.php");
}elseif ($nro_os == 4723){
include ("anula_swiss_ws.php");
}elseif ($nro_os == 2042){
include ("anula_aapm_ws.php");
}elseif ($nro_os == 3771){
include ("anula_osdipp_ws.php");
}elseif ($nro_os == 5080){
include ("anula_sancor_ws.php");
}elseif ($nro_os == 5396){
include ("anula_boreal_ws.php");
}elseif ($nro_os == 5073){
include ("anula_pami_ws.php");
}else{
include ("anula_abm_ws.php");
}


