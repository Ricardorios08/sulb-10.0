<?php 

include ("../../../conexiones/config.inc.php");


$cod_rast=$_REQUEST["cod_rast"];//110
 $sql = "DELETE FROM rast WHERE cod_rast = $cod_rast";
mysql_query($sql);

include ("agregar_rast.php");

