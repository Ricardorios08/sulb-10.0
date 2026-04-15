<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../menus.css" rel="stylesheet" type="text/css" />
<link href="../css/botonera.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo3 {
	font-family: "Trebuchet MS";
	color: #FFFFFF;
}
-->
</style>
</head>

<body>
<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">ESTADISTICAS - DERIVACIONES</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
			<li><a href="../a_sectores/derivacion/entrada_derivacion.php" target = "central" onmouseover="window.status='Ingreso Nuevo Paciente';return true" onmouseout="window.status='';return true">1. Alta Conversión</a></li>
			<!-- <li><a href="../a_sectores/mega/convenio/buscar_practicas.php" target = "central" onmouseover="window.status='Ingreso Nuevo Paciente';return true" onmouseout="window.status='';return true">Nomenclador Mega</a></li> -->
			<li><a href="../a_sectores/mega/convenio/actualizar_precios.php" target = "central" onmouseover="window.status='Ingreso Nuevo Paciente';return true" onmouseout="window.status='';return true">2. Actualizar MEGA</a></li>
			
	
	<li><a href="gerencia/estadisticas/pacientes_mes.php" target = "central" title="Ingrese un nuevo convenio o modifique alguno">3. Resumen x Mes </a></li>
	<li><a href="gerencia/estadisticas/pac_mes.php" target = "central" title="Ingrese un nuevo convenio o modifique alguno">4. Paciente x Mes </a></li>
	<li><a href="../a_sectores/webcam" target = "central" title="Compara NBU">5. WEB CAM</a></li>
		  </ul>
		</ul>
</div>
  
  <form action="mega/convenio/buscar_practicas.php" method="post"  target ="central">
    <table width="166"  border="0">
      <tr bgcolor="#990033"> </tr>
      <tr>
        <td bgcolor="#666666"><div align="center" class="titulo">MEGA - ABM</div></td>
      </tr>
      <tr>
        <td><div align="center"><font color="#0000FF" face="Arial, Helvetica, sans-serif">
            <input name="palabra" type="text" id="palabra" size = "18" class = "ctxt"166 />
        </font></div></td>
      </tr>
      <tr>
        <td><div align="center">
            <input name="Buscar" type="submit" id="Buscar" value="Buscar" class = "ctxt" />
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>

  <form action="derivacion/buscar_derivacion.php" method="post"  target ="central">
    <table width="152"  border="0">
      <tr bgcolor="#990033"> </tr>
      <tr>
        <td bgcolor="#666666"><div align="center" class="titulo">DERIVACIONES</div></td>
      </tr>
      <tr>
        <td><div align="center"><font color="#0000FF" face="Arial, Helvetica, sans-serif">
            <input name="palabra" type="text" id="palabra" size = "18" class = "ctxt"/>
        </font></div></td>
      </tr>
      <tr>
        <td><div align="center">
            <input name="Buscar" type="submit" id="Buscar" value="Buscar" class = "bot1"/>
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  
 
</body>
</html>
