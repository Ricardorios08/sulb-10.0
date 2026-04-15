<?php
$conexion= @mysql_connect('www.coprofi.com.ar:2082', 'pg000122_1234', 'vaweweZE64');
if (!$conexion) {
    die('Error de conexion n: ' . mysql_error());
}
echo 'Connected successfully';
mysql_select_db("pg000122_sulb", $conexion);

$queEmp = "SELECT * FROM juego ORDER BY nombre ASC";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

 


?>