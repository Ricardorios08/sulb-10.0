<?php

include("../../conexiones/config.inc.php");

 $q=$_GET["q"];

 $sql1="select * from pacientes where nro_afiliado = '$q'";
$result1 = $db->Execute($sql1);
 $nombre=strtoupper($result1->fields["nombre"]);
 echo "---".$apellido=strtoupper($result1->fields["apellido"]);

$hint = $apellido." ".$nombre;

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?> 