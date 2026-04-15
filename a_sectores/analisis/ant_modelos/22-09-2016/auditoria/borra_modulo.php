<?php

include ("../../conexiones/config.inc.php");
$cod_modulo = $_REQUEST['cod_modulo'];

$SQL="Delete From modulo where cod_modulo= $cod_modulo";
$db->Execute($SQL);

$SQL="Delete From deta_modulo where cod_modulo= $cod_modulo";
$db->Execute($SQL);


$leyenda = "SE HA BORRADO EL MODULO";
include ("../../alertas/campo_informacion.php");
