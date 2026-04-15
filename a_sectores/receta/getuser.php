<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

include("../../conexiones/config.inc.php");

$sql1="select * from datos_os where nro_os = '$q'";
$result1 = $db->Execute($sql1);
echo $sigla=strtoupper($result1->fields["sigla"]);
$webservice=strtoupper($result1->fields["webservice"]);

$sql1="select * from planes_os where nro_os = '$q'";
$result1 = $db->Execute($sql1);



echo $nombre_plan=strtoupper($result1->fields["nombre_plan"]);

$nro_plan=strtoupper($result->fields["nro_plan"]);

?>
 <?php 
   include("../../conexiones/config.inc.php");

$sql = "SELECT * FROM planes_os where nro_os = '$q' ";
$result = $db->Execute($sql);

echo "<div class='styled-select'>";
echo "<select name=users size=1 id =nro_os '>";
echo"<option value=''>Seleccione OBRA SOCIAL</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_os=$result->fields["nro_os"];
$nombre_plan=strtoupper($result->fields["nombre_plan"]);
echo"<option value=$nro_os>$nombre_plan ($nro_os)</option>";
$result->MoveNext();
	}
echo"</select>";
echo"</div>";
?>

</body>
</html>