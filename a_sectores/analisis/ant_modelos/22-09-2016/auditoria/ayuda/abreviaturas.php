<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Abreviaturas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo1 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>

<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />


</head>

<body>

<?php 

include ("../../../conexiones/config.inc.php");

 $sql = "SELECT * FROM unidades";
$result = $db->Execute($sql);


?>

<table width="800" border="1" cellspacing="0">
  <tr>
    <td colspan="2"><div align="center"><img src="../../../imagenes/abrevia.jpg" width="800" height="35"></div></td>
  </tr>


<?php

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod_unidad=$result->fields["cod_unidad"];
$unidad=$result->fields["unidad"];
$nombre_unidad=$result->fields["nombre_unidad"];





?>

  <tr>
    <td width="210" bgcolor="#EDEDED"><?php echo $unidad;?>  </td>
    <td width="597" bgcolor="#EDEDED"><?php echo $nombre_unidad;?>    </td>
  </tr>

  <?php $result->MoveNext();
  
  }
  ?>


</table>
</body>
</html>


