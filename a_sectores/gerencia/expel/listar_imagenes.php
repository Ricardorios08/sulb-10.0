<?php
   
include ("../../../conexiones/config.inc.php");
$sql = "SELECT * FROM archivos";
$result = $db->Execute($sql);
$id=$result->fields["id"];
echo "<img src=\"ver.php?id=".$id."\">";





?> 