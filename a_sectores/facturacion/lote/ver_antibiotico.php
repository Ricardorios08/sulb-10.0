<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE LOTES</title>
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







<table width="850" border="1" cellspacing="0">
  
  
  <tr>
    <td width="597" colspan="-2" valign="middle" bgcolor="#B8B8B8">
      <div align="center">NOMBRE
    </div></td>
    <td width="100" bgcolor="#B8B8B8"><div align="center">BORRAR</div></td>
  </tr>

<?php 

include ("../../../conexiones/config.inc.php");

 $sql="select * from lote  order by lote";
$result = $db->Execute($sql);

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $antibiotico=$result->fields["lote"];
 $cod_antibiotico=strtoupper($result->fields["cod_lote"]);
 


?>
  
  <tr>
    <td colspan="-2" valign="middle" bgcolor="#F0F0F0"><span class="Estilo40"><?php echo $antibiotico;?></span></td>
    <td bgcolor="#F0F0F0"><div align="center"><a href="borra.php?cod_antibiotico=<?php print("$cod_antibiotico");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar el lote?');"><img src="../../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
  </tr>
 


<?php


  $result->MoveNext();
		}


?>
</table>




</body>
</html>
