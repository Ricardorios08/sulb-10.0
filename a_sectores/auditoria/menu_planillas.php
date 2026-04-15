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
    <td bgcolor="#666666"><div align="center" class="titulo">PLANILLAS </div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
			
			 <!-- <li><a href="../../a_sectores/auditoria/atributos/metodo/metodo.php" target = "central">1. Agregar Categoría </a></li>	 -->
			 <li><a href="../../a_sectores/auditoria/planillas/agregar_practica.php?palabra=poner lo que quieras" target = "central">1. Agregar Planilla </a></li>
			<li><a href="../../a_sectores/auditoria/planillas/index_excel.php?palabra=poner lo que quieras" target = "central">2. Importar CM</a></li>
		  </ul>
		</ul>
</div>
  
<form action="buscar_convenida_planillas.php" method="post"  target ="central">
  <table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  
  <tr>
    <td><div align="center">
      <input name = "busca2" type = "text" size = "21" class = 'ctxt'/>
    </div></td>
  </tr>
  
  <tr>
    <td><div align="center"><span class="Estilo5">
      <input type = "hidden" name = "usuario2" value = "<?php echo $usuario;?>" />
      <input type = "submit" name = "buscar2" value = "BUSCAR" class ='bot1' />
    </span></div></td>
  </tr>
</table>

</form>

<form action="planillas/buscar_paciente_trabajo.php" method="post"  target ="central">

<table width="166"  border="0">

  <tr>
    <td><?php 


$sql = "SELECT * FROM planillas order by  nombre_modulo";
$result = $db->Execute($sql);
echo "<select name=planillas[] size=1 id =planillas class ='titulo2' onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_os=$result->fields["cod_modulo"];
$sigla=strtoupper($result->fields["nombre_modulo"]);
echo"<option value=$nro_os>$sigla ($nro_os)</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo16">DESDE</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <input name = "dia_d" type = "text" id="dia_d" size = "2" maxlength="2"   value  = "<?php echo $dia;?>" />
      /
      <input name = "mes_d" type = "text" id="mes_d" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
      /
      <input name = "anio_d" type = "text" id="anio_d" size = "2" maxlength="2" value  = "<?php echo $anio;?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo16">HASTA</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <input name = "dia_h" type = "text" id="dia_h" size = "2" maxlength="2" value  = "<?php echo $dia;?>" />
      /
      <input name = "mes_h" type = "text" id="mes_h" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
      /
      <input name = "anio_h" type = "text" id="anio_h" size = "2" maxlength="2" value  = "<?php echo $anio;?>" />
    </div></td>
  </tr>
  
  <tr>
    <td><span class="Estilo16">
      <input name="por" type="radio" value="1" / checked="checked" /> 
      PANTALLA
</span></span></td>
  </tr>
  <tr>
    <td><span class="Estilo16">
      <input name="por" type="radio" value="2" /> 
      EXCEL
</span></span></td>
  </tr>

    <tr>
    <td><span class="Estilo16">
      <input name="por" type="radio" value="3" /> 
      CM EXPORTAR
</span></span></td>
  </tr>


  <tr>
    <td><div align="center"><span class="Estilo5">
      <input type = "hidden" name = "usuario22" value = "<?php echo $usuario;?>" />
      <input type = "submit" name = "buscar22" value = "BUSCAR" class ='bot1'/>
    </span></div></td>
  </tr>
</table>
</form>
</body>
</html>
