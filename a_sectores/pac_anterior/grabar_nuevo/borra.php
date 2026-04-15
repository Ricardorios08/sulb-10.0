<?php 
global $bandera_borrar;
include ("../../../conexiones/config_gb.php");


$cod_grabacion1 = ereg_replace( " ", "", $cod_grabacion1 );

$cod_grabacion1 = trim($_REQUEST['cod_grabacion']);
$cod_grabacion1 = ereg_replace( " ", "", $cod_grabacion1 );
$palabra= $_REQUEST['cod_grabacion'];
$palabra= ereg_replace( " ", "", $palabra );
$nro_practica = $_REQUEST['nro_practica'];
$nro_os = $_REQUEST['nro_os'];
$nro_orden = $_REQUEST['nro_orden'];

$cod_operacion= $_REQUEST['cod_operacion'];
$autorizacion= $_REQUEST['autorizacion'];
$afiliado= $_GET['afiliado'];
$prescriptor= $_GET['prescriptor'];
$periodo= $_REQUEST['periodo'];
$nro_laboratorio= $_REQUEST['nro_laboratorio'];
$anio= $_REQUEST['anio'];
$fecha_orden= $_REQUEST['fecha_orden'];

$dia = substr($fecha_orden,6,2);
$mes = substr($fecha_orden,4,2);
$anio_o = substr($fecha_orden,0,4);

$autorizacion= $_REQUEST['autorizacion'];
$coseguro= $_REQUEST['coseguro'];
$operador= $_REQUEST['operador'];


$sql="Delete From historial_detalle where cod_grabacion = $cod_grabacion1 and nro_practica = $nro_practica and cod_operacion = $cod_operacion";
mysql_query($sql);

$sql="Delete From detalle where cod_operacion = $cod_operacion";
mysql_query($sql);

$actualizar_practicas = "SI";
$bandera = 1;

include ("../../../conexiones/config_gb.php");
 $sql8 = "SELECT operador, fecha FROM `ordenes` WHERE nro_orden like '$nro_orden'";
$result8 = $db->Execute($sql8);
$operad=strtoupper($result4->fields["operador"]);
$fech=strtoupper($result4->fields["fecha"]);

if ($operad != ""){
$operador = $operad;
}

include ("pagina2.php");
//include ("actualizar_practicas.php");
