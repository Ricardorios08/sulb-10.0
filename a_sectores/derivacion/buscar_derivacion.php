<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo2 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo25 {color: #FFFFFF}
.Estilo26 {font-size: 10px; color: #FFFFFF; }
.Estilo27 {color: #FFFFFF; font-family: "Trebuchet MS"; }
.Estilo28 {font-family: "Trebuchet MS"}
.Estilo29 {font-size: 10px; color: #FFFFFF; font-family: "Trebuchet MS"; }
.Estilo31 {
	font-family: "Trebuchet MS";
	font-size: 24px;
	font-weight: bold;
}
.Estilo32 {font-size: 24px}
.Estilo40 {font-family: "Trebuchet MS"; font-size: 14px; font-weight: bold; }
-->
</style>



</head>
<table width="800" border="1" cellspacing="0" >
  <!--DWLayoutTable-->
  <tr bgcolor="#CECECE">
    <td height="34" colspan="5"><div align="center">TABLA DE CONVERSIO MEGA - MANLAB </div></td>
  </tr>
  <tr bgcolor="#CECECE">
    <td width="90" bgcolor="#FFFFFF"><div align="center">NBU</div></td>
    <td width="509" bgcolor="#FFFFFF"><div align="center">PRACTICA</div></td>
    <td width="84" bgcolor="#FFFFFF"><div align="center">MEGA</div></td>
    <td width="63" bgcolor="#FFFFFF"><div align="center">MANLAB</div></td>
    <td width="32" bgcolor="#FFFFFF"><div align="center">MOD</div></td>
  </tr>
  
  </table>
  <table width="800" border="1" cellspacing="0">
  <?php 


include ("../../conexiones/config.inc.php");
  $palabra = $_REQUEST['palabra'];





 $sql="select * from tabla_conversion";
 	
$result = $db->Execute($sql);

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $nbu=$result->fields["nbu"];
 $mega=strtoupper($result->fields["mega"]);
  $manlab=strtoupper($result->fields["manlab"]);
    $cod_operacion=strtoupper($result->fields["cod_operacion"]);

 $sql11="select * from convenio_practica where cod_practica =  $nbu";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);


?>
  <tr bgcolor="#CECECE">
    <td bgcolor="#FFFFFF"><div align="center"><?php echo $nbu;?></div></td>
    <td bgcolor="#FFFFFF"><div align="left"><?php echo $nombre_practica;?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><?php echo $mega;?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><?php echo $manlab;?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><a href="modificar_tabla.php?cod_operacion=<?php print("$cod_operacion");?>"><img src="../../imagenes/office//005.ico" alt="Informe" border = "0"></a></div></td>
  </tr>
  <?php
$result->MoveNext();
	}


?>
</table>
</body>
</html>
