<?php 
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica = $_REQUEST['nro_practica'];
$cod_operacion = $_REQUEST['cod_operacion'];
$agregar = $_REQUEST['agregar'];

include ("../../../conexiones/config_gb.php");
 $sql="Delete From detalle where cod_operacion = $cod_operacion";
mysql_query($sql);

$borra = "SI";

include  ("pagina_modificar.php");

