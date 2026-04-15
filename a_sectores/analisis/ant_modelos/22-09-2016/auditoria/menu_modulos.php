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
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo13 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo14 {font-family: "Trebuchet MS"}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 12px}
-->
</style>
</head>

<body>

 <?php 
	include ("../../conexiones/config.inc.php");
	$dia = date ("d");
$mes = date("m");
$anio = date("y");

?>
<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">MODULOS</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
			
			 <!-- <li><a href="../../a_sectores/auditoria/atributos/metodo/metodo.php" target = "central">1. Agregar Categoría </a></li>	 -->
			 
			 <li><a href="../../a_sectores/auditoria/modulos/agregar_practica.php?palabra=poner lo que quieras" target = "central">1. Agregar Módulos </a></li>
			<li><a href="../../a_sectores/auditoria/ayuda/abreviaturas.php" target = "central">2. Ver Abreviaturas</a></li>
 
			
			
			
		  </ul>
		</ul>
</div>
  
<form action="buscar_convenida.php" method="post"  target ="central">

<table width="152"  border="0">
  <tr bgcolor="#990033"> </tr>
  
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">BUSCAR</div></td>
  </tr>

  <tr>
    <td><div align="left" class="Estilo16">
      <input name="radiobutton" type="radio" value="2" / checked="checked" >
      MODULOS</span></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <input name = "busca" type = "text" size = "21" class = "ctxt" />
    </div></td>
  </tr>
  <tr>
    <td><span class="Estilo16">Unidad Bq</span>
      <input name = "variable" type = "text" size = "5" /></td>
  </tr>
  <tr>
    <td><span class="Estilo13 Estilo14">Por:</span>
      <select name="buscar_por[]" id="buscar_por" class = "titulo2" onkeypress="return verif_caracter(this,event)">
        <option value="4">Todas</option>
        <option value="1">Comunes</option>
        <option value ="2">Especiales</option>
        <option value="3">Complejidad</option>
        <option value ="5">Modificar</option>
        </select></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo5">
      <input type = "hidden" name = "usuario" value = "<?php echo $usuario;?>" />
      <input type = "submit" name = "buscar" value = "BUSCAR" class = "bot1">
    </span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>





</form>


</body>
</html>
