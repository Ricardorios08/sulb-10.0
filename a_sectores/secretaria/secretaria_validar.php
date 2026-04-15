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
-->
</style>
</head>

<body>
<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">OBRAS SOCIALES </div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
			<!-- <li><a href="a_obras sociales/entrada_os.php" target = "central">1. Agregar Ob. Social </a></li> -->
			<li><a href="a_obras sociales/informe_pdf.php" target = "central">1. Informe Req. </a></li>
			<!-- <li><a href="../../a_sectores/gerencia/ingresar_convenios.php" target = "central" title="Ingrese un nuevo convenio o modifique alguno">2. Modificar Convenio </a></li> -->
			
		  </ul>
		</ul>
</div>
  
<FORM ACTION="busquedas_validar.php" method="post" TARGET = "central">
  <table width="166"  border="0">
    <tr bgcolor="#990033"> </tr>
    <tr>
      <td bgcolor="#666666"><div align="center" class="titulo">BUSCAR</div></td>
    </tr>
    <tr>
      <td><!-- <div align="center">
          <select name="busqueda[]" id="busqueda">
            <option value ="TODAS" selected="selected">Modificar O.S.</option>
          </select>
          <br /> -->
          <input type = "text" name = "busca" size = "10" class = "ctxt"/>
          <input type = "submit" name = "ok" value = "OK" class = "bot1"/>
          <input type="hidden" name="buscador_rapido" value="2" />
      </div></td>
    </tr>
    <tr>
      <td><label>
        <input name="requisito" type="checkbox" id="requisitos" value="1" />
      </label>
      Requisitos</td>
    </tr>
  </table>
</form>
</body>
</html>
