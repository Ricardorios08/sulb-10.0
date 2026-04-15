<?php
 //Visto en : www.entrecodigos.net
include("conexion.php"); //llamamos a la conexion

//Recuperamos los valores del formulario
$id= limpiarcampo($_POST['id_foto']);//20120613172143.jpg
$nombre=limpiarcampo($_POST['nombre_foto']);
$des=limpiarcampo($_POST['des']);

//Haces un update por el id de la foto para agregar nombre y descripcion
$consul="update fotos set nombre='$nombre', des='$des' where id_foto='$id'";
$modifica=mysql_query($consul,$conectar);

//Finalizamos actualizando la pagina
echo "<script>window.location.replace('index.php');</script>";


/*funcion para limpiar campos y evitar inyecciones mysql con mysql_real_escape_string()*/
function limpiarcampo($texto){
if (get_magic_quotes_gpc()) {
$liberate = mysql_real_escape_string(stripslashes($texto));
}else{
$liberate = mysql_real_escape_string($texto);
}
return $liberate;
}
?>


