<?php

include ("../../conexiones/config.inc.php");

 $orientacion = $_REQUEST['orientacion'];
 $orden = $_REQUEST['orden'];


  $cod_operacion = $_REQUEST['cod_operacion'];

 $cod_grabacion = $_REQUEST['cod_grabacion'];


switch ($orientacion){

case "arriba":{


if ($orden > 1){
$nuevo_orden = $orden - 1;


  $sql2="select * from detalle  where orden = $nuevo_orden and cod_grabacion = $cod_grabacion";
$result2 = $db->Execute($sql2);

$orden_anterior=$result2->fields["orden"] + 1;
$cod_operacion_anterior=strtoupper($result2->fields["cod_operacion"]);


   $sql = "UPDATE detalle SET `orden` = '$orden_anterior' WHERE `cod_grabacion` = $cod_grabacion and cod_operacion = $cod_operacion_anterior";
mysql_query($sql);

  $sql = "UPDATE detalle SET `orden` = '$nuevo_orden' WHERE `cod_grabacion` = $cod_grabacion and cod_operacion = $cod_operacion";
mysql_query($sql);

}


//


	break;
}


case "abajo":{

$nuevo_orden = $orden + 1;


   $sql2="select * from detalle  where cod_grabacion = $cod_grabacion order by orden desc";
$result2 = $db->Execute($sql2);

 $orde=$result2->fields["orden"];

if ($nuevo_orden <= $orde){





   $sql2="select * from detalle  where orden = $nuevo_orden and  cod_grabacion = $cod_grabacion";
$result2 = $db->Execute($sql2);

$orden_anterior=$result2->fields["orden"] - 1;
$cod_operacion_anterior=strtoupper($result2->fields["cod_operacion"]);


   $sql = "UPDATE detalle SET `orden` = '$orden_anterior' WHERE `cod_grabacion` = $cod_grabacion and cod_operacion = $cod_operacion_anterior";
mysql_query($sql);

    $sql = "UPDATE detalle SET `orden` = '$nuevo_orden' WHERE `cod_grabacion` = $cod_grabacion and cod_operacion = $cod_operacion";
mysql_query($sql);


}


	break;
}

}



//$leyenda = "SE ELIMINO LA ORDEN Y SUS RESULTADOS";
//include ("../../alertas/campo_informacion.php");

$banderin = 2;
$palabra = $nro_paciente;

$banderin = 1;
include ("emision_mod.php");
?>


