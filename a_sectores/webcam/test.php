<?php
 //Visto en : www.entrecodigos.net
include("conexion.php");
$id=date('YmdHis');//extraemos la fecha del servidor

//Insertamos el id de la imagen a la tabla
$consulta="insert into fotos values ('".$id."','','')";
$insert=mysql_query($consulta,$conectar) or die(mysql_error());

//guardamos la imagen en el servidor, en la carpeta "fotos"
$filename = "fotos/".$id.'.jpg';//nombre del archivo
$result = file_put_contents( $filename, file_get_contents('php://input') );//renombramos la fotografia y la subimos
if (!$result) {
	exit("No se pudo subir al servidor");
}
echo $id;//20120613172143.jpg
?>