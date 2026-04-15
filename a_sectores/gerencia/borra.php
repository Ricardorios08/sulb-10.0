<?php

include ("../../conexiones/config_os.php");
$a = $_GET['id'];
$SQL="Delete From `convenios` where `nro_os` = $a";
$db->Execute($SQL);
$SQL="Delete From `forma_pago` where where `nro_os` = $a";
$db->Execute($SQL);
$SQL="Delete From `capitacion` where `nro_os`= $a";
$db->Execute($SQL);
$SQL="Delete From `arancel` where `nro_os`= $a";
$db->Execute($SQL);
$SQL="Delete From `incremento` where `nro_os`= $a";
$db->Execute($SQL);
$SQL="Delete From `op_practicas` where `nro_os`= $a";
$db->Execute($SQL);
$SQL="Delete From `op_facturacion` where `nro_os`= $a";
$db->Execute($SQL);

$buscador_rapido = 2;
include ("buscar_convenios.php");





