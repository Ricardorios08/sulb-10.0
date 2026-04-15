<?php 
include ("../../../conexiones/config.inc.php");


$caratula=$_POST["caratula"];
$hoja=$_POST["hoja"];
$firma=$_POST["firma"];
$modelo=$_POST["modelo"];
ECHO "**".$usuario=$_REQUEST["usuario"];


$sql= "delete from informe where  id = $usuario";
mysql_query($sql);

 $sql= "INSERT INTO informe ( `caratula`, `hoja`, `firma` , `modelo` ,`id`  ) VALUES ( '$caratula', '$hoja', '$firma' , '$modelo' , '$usuario')";
mysql_query($sql);

include ("datos_informe.php");	

?>

