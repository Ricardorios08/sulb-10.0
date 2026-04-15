<?php

include ("../conexiones/config.inc.php");


$sql2="select * from detalle order by cod_grabacion, cod_operacion";
$result2 = $db->Execute($sql2);

$nro_orden = 0;

if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {




$cod = $cod_grabacion;
 
 $cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);
 $cod_operacion=strtoupper($result2->fields["cod_operacion"]);

if ($cod_grabacion != $cod){
$orden = "1";
}else{
 $orden = $orden + 1;
}


 

echo  $sql = "UPDATE detalle SET orden = '$orden' WHERE cod_operacion = $cod_operacion";
$result = $db->Execute($sql);
echo "<br>";

$result2->MoveNext();

	}


$leyenda = "SE ELIMINO TODO";
include ("../alertas/campo_informacion.php");
 
?>


