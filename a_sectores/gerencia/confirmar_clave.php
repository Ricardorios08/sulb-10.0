<?php 
$usuario = $_REQUEST['usuario'];
$password= $_REQUEST['password'];

include ("../../conexiones/config.inc.php");

$sql= "select * from usuarios where usuario = '$usuario' and contraseña = '$password'" ;
$result = $db->Execute($sql);

$rol=strtoupper($result->fields["rol"]);

if ($rol == "GERENCIA"){

include ("gerencia.php");

}
else
{
include ("clave.php");
}
