<?php

include ("../../conexiones/config.inc.php");
$cod_operacion = $_REQUEST['cod_operacion'];


$SQL="Delete From deta_planillas_ver where cod_operacion= $cod_operacion";
$db->Execute($SQL);


$leyenda = "SE HA BORRADO LA COLUMNA";
include ("../../alertas/campo_informacion.php");
