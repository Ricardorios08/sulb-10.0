<?php

include ("../../conexiones/config.inc.php");
$cod_practica= $_REQUEST['cod_practica'];

$sql1="select * from convenio_practica  where  cod_practica = $cod_practica";
$result = $db->Execute($sql1);
$nueva=strtoupper($result->fields["nueva"]);




if ($nueva == 1){


$SQL="Delete From convenio_practica where cod_practica= $cod_practica and nueva = 1";
$db->Execute($SQL);


$leyenda = "SE HA BORRADO LA PRACTICA";
include ("../../alertas/campo_informacion.php");
}
else
{
$leyenda = "NO SE PUEDEN BORRAR LAS PRACTICAS DEL NBU, SOLAMENTE LAS INCORPORADAS MANUALMENTE";
include ("../../alertas/campo_informacion.php");
}