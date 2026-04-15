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

<style type="text/css">
<!--
.Estilo3 {
	font-family: "Trebuchet MS";
	color: #FFFFFF;
}
-->
</style>

<link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
.Estilo16 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 12px}
.Estilo41 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
-->
</style>


</head>
<body>

<?php
$q = intval($_GET['q']);

include("../../conexiones/config.inc.php");

$sql1="select * from datos_os where nro_os = '$q'";
$result1 = $db->Execute($sql1);
 $sigla=strtoupper($result1->fields["sigla"]);
$webservice=strtoupper($result1->fields["webservice"]);

$sql1="select * from planes_os where nro_os = '$q'";
$result1 = $db->Execute($sql1);



 $nombre_plan=strtoupper($result1->fields["nombre_plan"]);

$nro_plan=strtoupper($result->fields["nro_plan"]);

 
   include("../../conexiones/config.inc.php");

$sql = "SELECT * FROM planes_os where nro_os = '$q' ";
$result = $db->Execute($sql);

echo "<div class='styled-select'>";
echo "<select name=planes_os[] size=5 id =nro_os '>";
echo"<option value=''>Seleccione Plan   * * * * *</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_os=$result->fields["nro_os"];
$nombre_plan=strtoupper($result->fields["nombre_plan"]);
echo"<option value='$nombre_plan'>$nombre_plan </option>";
$result->MoveNext();
	}
echo"</select>";
echo"</div>";
?>

<input name = "palabra" type = "text" size = "22" class = 'ctxt'/>
<input type = "hidden" name = "usuario" value = "<?php echo $usuario;?>" />
<br>

<input type = "submit" name = "buscar" value = "AGREGAR PRACTICA" class ='bot1' >
<br>

<input type = "submit" name = "buscar" value = "VER PRESUPUESTO" class ='bot1' >
<br>

<input type = "submit" name = "buscar" value = "         LIMPIAR TODO     " class ='bot1' >

</body>
</html>