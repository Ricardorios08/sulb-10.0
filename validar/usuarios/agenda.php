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
.Estilo6 {color: #0000FF}
.Estilo14 {font-family: "Trebuchet MS"}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 12px}
.Estilo19 {color: #FFFFFF}
.Estilo9 {font-size: 14px}
-->
</style>
</head>

<body>
<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">ABM</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
<li><a href="entrada_empleado.php" target = "central">1. Agenda</a></li>
<li><a href="../../a_sectores/gerencia/abm/abm.php?usuario=<?php print("$usuario");?>" target = "central">2. Presentar ABM</a></li>
<li><a href="../../a_sectores/proveeduria/elige_cuenta_liq.php" target ="central" title = "Busca Liquidaciones anteriores" >3. Liquidaciones</a></li>
<li><a href="../../a_sectores/proveeduria/elige_cuenta.php" target ="central" title = "Busca Liquidaciones anteriores" >4. Proveeduria</a></li>
<li><a href="../../a_sectores/proveeduria/elige_cuenta_mega.php" target ="central" title = "Busca Liquidaciones anteriores" >5. Mega</a></li>
<li><a href="../../a_sectores/proveeduria/elige_cuenta_producto.php" target ="central" title = "Busca Liquidaciones anteriores" >6. Liquido Producto</a></li>
<li><a href="../../a_sectores/proveeduria/elige_cuenta_mega_atm.php" target ="central" title = "Busca Liquidaciones anteriores" >7. Retención Atm</a></li>

<li><a href="buscar_bioquimicos.php" target = "central">8. Colegas Bioquimicos </a></li>
<li><a href="../../a_sectores/actualizacion/compara_base.php" target = "central">9. Comparar Base </a></li>
</ul>
</ul>
</div>
  
  


<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">BUSCAR</div></td>
  </tr>
  
  <tr>
    <td><form action="buscar_empleado.php" method="post" target = "central">
      <div align="center">
        <input type = "text" name = "busca" size = "10"class = "ctxt" />
        <input type="hidden" name="buscador_rapido" value="2" />
        <input type="hidden" name="mod" value="SI" />
        <input type = "submit" name = "ok" value = "OK" class = "bot1" />
      </div>
    </form></td>
  </tr>
</table>
</body>
</html>
