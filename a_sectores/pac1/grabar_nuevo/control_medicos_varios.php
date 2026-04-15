<?php 
include ("../../../conexiones/config_os.php");
$sql2 = "SELECT * FROM `prescriptor` WHERE nro_os = $nro_os and matricula = $prescriptor";
$result2 = $db->Execute($sql2);
$nombre=strtoupper($result2->fields["nombre"]);


if (($control_prescriptor == "SI") && ($nombre == "")) {
$leyenda = "No Existe ese Prescriptor";
include ("../../../alertas/campo_vacio.php");
exit;
}


?>