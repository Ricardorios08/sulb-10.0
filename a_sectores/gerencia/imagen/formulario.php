<HTML>
<HEAD>
<TITLE>Binario a BD</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style></HEAD>
<BODY>
<?php
if (isset($_GET['proceso'])){
echo $_GET['proceso']."<br>";
}
?>
<table width="850" border="0">
  <tr bgcolor="#D1D1D1">
    <td height="44"><div align="center"><img src="../../../imagenes/anadir.jpg" width="846" height="35"></div></td>
  </tr>
  <tr>
    <td height="27"><div align="center">INSERTE LOGO </div>      <div align="center">MEDIDAS 20px x 20px </div></td>
  </tr>
  <tr>
    <td><FORM enctype="multipart/form-data" method="post" action="insertar.php">
      <div align="center">Archivo:
          <INPUT type="file" name="archivo" size="30">
          <INPUT type="submit" name="submit" value="Subir archivo">
      </div>
    </FORM></td>
  </tr>
</table>
</BODY>
</HTML>