<?php 
include ("../../../conexiones/config.inc.php");
$sql12="select * from op_practicas where nro_os = $nro_os";
$result12 = $db->Execute($sql12);

$control_afiliados=ucwords($result12->fields["afiliado"]);
$control_prescriptor=ucwords($result12->fields["prescriptor"]);

 $sql6="select * from op_grabacion where nro_os like '$nro_os'";
$result6 = $db->Execute($sql6);

$requiere_automatico=strtoupper($result6->fields["requiere_automatico"]);
$requiere_coseguro=strtoupper($result6->fields["requiere_coseguro"]);
$requiere_autorizacion=strtoupper($result6->fields["requiere_autorizacion"]);

