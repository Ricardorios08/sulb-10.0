<?php

$sql = "SELECT * FROM archivos";
$result = $db->Execute($sql);
$id=$result->fields["id"];


$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$no=$result->fields["nombre"];


$domicilio = $direccion." - ".$localidad." - ".$telefono;
$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

$nro_paciente=$result->fields["nro_paciente"];
$nombre1=strtoupper($result->fields["nombre"]);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];
$apellido=strtoupper($result->fields["apellido"]);

 $nombre_completo = $apellido." ".$nombre1;
$nombre_completo = substr($nombre_completo,0,40);


$nro_paciente=$result->fields["nro_paciente"];
$nombre=$result->fields["nombre"];
$apellido=$result->fields["apellido"];
 $fecha_nacimiento=$result->fields["fecha_nacimiento"];
 $sexo=$result->fields["sexo"];
 
	  

$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$nombre_os=strtoupper($result1->fields["sigla"]);

 


$sql2="select * from ordenes where cod_grabacion = $cod_grabacion";
$result2 = $db->Execute($sql2);

 $nombre_medico=strtoupper($result2->fields["nombre_medico"]);




  

 
include ("simple.php");
 




 








// 428-7755