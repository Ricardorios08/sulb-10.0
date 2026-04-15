<?php
if(isset($_GET['id'])) {

    // you may have to modify login information for your database server:
    $conexion=mysql_connect("localhost","root","") or die ("no se ha podido conectar a la BD");

    mysql_select_db("laboratorio") or die ("no se ha podido seleccionar la BD");

    $sql = "SELECT archivo_nombre,archivo_binario,archivo_tipo,archivo_peso FROM archivos WHERE id='".$_GET['id']."'";

    $consulta = mysql_query($sql,$conexion);

    $datos = mysql_result($consulta,0,"archivo_binario");
    $tipo = mysql_result($consulta,0,"archivo_tipo");
    $nombre = mysql_result($consulta,0,"archivo_nombre");
    $peso = mysql_result($consulta,0,"archivo_peso");


    header("Content-type: $tipo");
    header("Content-length: $peso"); 
    header("Content-Disposition: inline; filename=$nombre"); 
 
   echo $datos;

}
?> 