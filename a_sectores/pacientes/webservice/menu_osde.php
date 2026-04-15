<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
<!--
.Estilo3 {
	font-family: "Trebuchet MS";
	color: #FFFFFF;
}
-->
</style>
<link href="../../menus.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo13 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo6 {color: #0000FF}
.Estilo14 {font-family: "Trebuchet MS"}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 12px}
-->
</style>
</head>

<body>

<?php $usuario = $_REQUEST['usuario'];
 ?>


<table width="152"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="Estilo3">WEB-SERVICE</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>

  <li><a href="../../a_sectores/webservice/osde/osde.php?usuario=<?php print("$usuario");?>" target = "central">1. Prueba</a></li>

  <li><a href="../../a_sectores/webservice/osde/prueba1.php?usuario=<?php print("$usuario");?>" target = "central">2. Prueba</a></li>

  <li><a href="../../a_sectores/webservice/osde/prueba3.php?usuario=<?php print("$usuario");?>" target = "central">3. Prueba</a></li>

  <li><a href="../../a_sectores/webservice/swiss/afiliados_swiss.php?usuario=<?php print("$usuario");?>" target = "central">3. swiss</a></li>

  <li><a href="../../a_sectores/webservice/medimas/afiliados_medimas.php?usuario=<?php print("$usuario");?>" target = "central">3. Medimas</a></li>


		  </ul>
		</ul>
</div>
  
<FORM ACTION="osde/validar_afiliado.php" method="post" TARGET = "central">
  <table width="152"  border="0">
    <tr bgcolor="#990033"> </tr>
    <tr>
      <td bgcolor="#666666"><div align="center" class="Estilo3">N° OSDE</div></td>
    </tr>
    <tr>
      <td><div align="center">
       
          <input type = "text" name = "nro_afiliado" size = "10" />
          <input type = "submit" name = "ok" value = "OK" />
     
      </div></td>
    </tr>
  </table>
</form>

<FORM ACTION="osde/validar_afiliado_ospe.php" method="post" TARGET = "central">
  <table width="152"  border="0">
    <tr bgcolor="#990033"> </tr>
    <tr>
      <td bgcolor="#666666"><div align="center" class="Estilo3">N° OSPE</div></td>
    </tr>
    <tr>
      <td><div align="center">
       
          <input type = "text" name = "nro_afiliado" size = "10" />
          <input type = "submit" name = "ok" value = "OK" />
     
      </div></td>
    </tr>
  </table>
</form>


</body>
</html>

