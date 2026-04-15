<?php 
$operador = $_REQUEST['operador'];
$nro_practica = $_REQUEST['nro_practica'];
$cod_operacion = $_REQUEST['cod_operacion'];

include ("../../../conexiones/config.inc.php");
 $sql="Delete From detalle_temp where cod_operacion = $cod_operacion";
mysql_query($sql);

$borra = "SI";
include  ("pagina_completa_reducida.php");

