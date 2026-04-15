<?php

include ("../../conexiones/config.inc.php");
$cod_modulo = $_REQUEST['cod_modulo'];

$SQL="Delete From planillas where cod_modulo= $cod_modulo";
$db->Execute($SQL);

$SQL="Delete From deta_planillas where cod_modulo= $cod_modulo";
$db->Execute($SQL);

$SQL="Delete From deta_planillas_ver where cod_modulo= $cod_modulo";
$db->Execute($SQL);


$leyenda = "SE HA BORRADO LA PLANILLA";
include ("../../alertas/campo_informacion.php");
