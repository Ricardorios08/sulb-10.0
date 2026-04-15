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
    <td bgcolor="#666666"><div align="center" class="titulo">PACIENTES</div></td>
  </tr>
</table>
<div id="menuv">
  <!-- <ul><ul><li><a href="../a_sectores/pacientes/entrada_dato.php" target = "central" onmouseover="window.status='Ingreso Nuevo Paciente';return true" onmouseout="window.status='';return true">Dar Ingreso </a></li> </ul></ul> -->
  <ul><ul><li><a href="../a_sectores/pac/entrada_dato_abm.php" target = "central" onmouseover="window.status='Ingreso Nuevo Paciente';return true" onmouseout="window.status='';return true">1. Dar Ingreso ABM </a></li> </ul></ul>
</div>
  
  <?php $usuario = $_REQUEST['usuario'];?>
  <form action="pacientes/buscar_paciente.php" method="post"  target ="central">

    <table width="166" height="84" border="0">
      <tr bgcolor="#990033"> </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
 
    </table>
  </form>

<!-- <FORM ACTION="../a_sectores/webservice/osde/validar_afiliado.php" method="post" TARGET = "central">
  <table width="152"  border="0">
    <tr bgcolor="#990033"> </tr>
    <tr>
      <td bgcolor="#666666"><div align="center" class="Estilo3">N° Afiliado OSDE</div></td>
    </tr>
    <tr>
      <td><div align="center">
       
          <input type = "text" name = "nro_afiliado" size = "10" />
          <input type = "submit" name = "ok" value = "OK" />
     
      </div></td>
    </tr>
  </table>

</form>
<FORM ACTION="../a_sectores/webservice/osde/validar_afiliado_ospe.php" method="post" TARGET = "central">
  <table width="152"  border="0">
    <tr bgcolor="#990033"> </tr>
    <tr>
      <td bgcolor="#666666"><div align="center" class="Estilo3">N° Afiliado OSPE</div></td>
    </tr>
    <tr>
      <td><div align="center">
       
          <input type = "text" name = "nro_afiliado" size = "10" />
          <input type = "submit" name = "ok" value = "OK" />
     
      </div></td>
    </tr>
  </table>

</form> -->

</body>
</html>
