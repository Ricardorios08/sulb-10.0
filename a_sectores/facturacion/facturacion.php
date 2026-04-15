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
body {
	background-repeat: repeat-y;
}
-->
</style>
</head>

<body>
  <table width="166"  border="0">
    <tr bgcolor="#990033"> </tr>
    <tr>
      <td colspan="2" bgcolor="#666666"><div align="center" class="titulo">FACTURACION</div></td>
    </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
			<!-- <li><a href="../../a_sectores/facturacion/facturacion_os.php" target = "central">1. Facturar Ordenes</a></li>
			<li><a href="../../a_sectores/facturacion/borrar_anular/borrar_anular.php" target = "izquierda">2. Anular Facturas </a></li> -->
				<li><a href="../../a_sectores/facturacion/lote/agregar_practica.php" target = "central">1. Agregar Lote</a></li>
			
		  </ul>
		</ul>
</div> 
  
  <?php $anio = date("y");?>
<form action ="menu_buscar.php" method="post" target ="central">
  <table width="166"  border="0">
    <tr bgcolor="#990033"> </tr>

    <tr>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">A&ntilde;o: </font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name = "anio" type = "text" value="<?php echo $anio;?>" size = "6" />
      </font></div></td>
    </tr>
    <tr>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Mes: </font></div></td>
      <td>
        
          <div align="left">
              <select name="mes[]" id="select3" onkeypress="return verif_caracter(this,event)">
                <option value = "<?php echo $mes;?>" selected="selected" class = "titulo2"><?php echo $periodo1;?></option>
                <option value = "13" selected="selected">TODOS</option>
                <option value = "01" >ENE</option>
                <option value = "02">FEB</option>
                <option value = "03">MAR</option>
                <option value = "04">ABR</option>
                <option value = "05">MAY</option>
                <option value = "06">JUN</option>
                <option value = "07">JUL</option>
                <option value = "08">AGO</option>
                <option value = "09">SET</option>
                <option value = "10">OCT</option>
                <option value = "11">NOV</option>
                <option value = "12">DIC</option>
              </select>
        </div></td>
    </tr>
    <tr>
      <td> 
        <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Tipo</font></div></td>
      <td>
        <div align="left">
          <select name="buscar_por[]" id="select5" class = "titulo2" onkeypress="return verif_caracter(this,event)">
            <option value ="facturar">A FACTURAR</option>
            <option value ="ordenes">ORDENES</option>
            <option value ="imprimir">FACTURAS</option>
          </select>
        </div></td>
    </tr>
    <tr>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"></font><font size="2" face="Arial, Helvetica, sans-serif">. N&ordm;: </font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <input type = "text" name = "nro_factura" size = "15" class = "ctxt" / >
      </font></div></td>
    </tr>
    <tr>
      <td> 
        <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Ord</font></div></td>
      <td>
        <div align="left">
          <select name="orden[]" id="orden" class = "titulo2" onkeypress="return verif_caracter(this,event)">
            <option value ="nro_factura" selected="selected" class = "titulo2">N&ordm; Fact</option>
            <option value ="nro_os">O. Social</option>
            <option value ="fecha">Fecha</option>
            <!--  <option value ="obra">O.SOCIAL</option> -->
          </select>
        </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
          <input type = "submit" name = "ok" value = "BUSCAR" class = "bot1"  />
      </font></div></td>
    </tr>
  </table>
</form>
</body>
</html>
