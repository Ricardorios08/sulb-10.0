<?php 
include ("../../conexiones/config.inc.php");
echo $sql4 = "SELECT * FROM pacientes_ant";
$result5 = $db->Execute($sql4);

if (!$result5) die("fallo".$db->ErrorMsg());
	 while (!$result5->EOF) {		

//echo $apellido=$result5->fields["apellido"];
echo $nombre=$result5->fields["nombre"];
echo $nro_paciente=$result5->fields["nro_paciente"];
$nombre_com = $apellido." ".$nombre;

echo $sql = "UPDATE pacientes SET nombre = '$nombre' WHERE `nro_paciente` = '$nro_paciente'";
$result = $db->Execute($sql);

echo "<br>";
$result5->MoveNext();
}

?>