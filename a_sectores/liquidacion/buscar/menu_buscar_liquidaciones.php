<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../../../menus.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo3 {
	font-family: "Trebuchet MS";
	color: #FFFFFF;
}
.Estilo6 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
</head>


<?php
$nro_liquidacion = 4;
$periodo = 10;
$anio = 13;


?>

<body>
  <form action="buscar_liquidacion.php" method="post"  target ="central">
  <table width="152" border="0">
      <tr bgcolor="#000099">
        <td colspan="2" bgcolor="#666666"><div align="center" class="Estilo3"><font color="#FFFFFF">LIQUIDACIONES</font> </div></td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td width="57"><span class="Estilo6">Cuenta:</font>
          </div>
        </span></td>
        <td width="85"><input type = "text" name = "nro_laboratorio" size = "4" id = "nro_laboratorio"  onkeypress="return verif_caracter(this,event)" />        </td>
        <input type = "hidden" name = "buscador_rapido" value = "1" />
      </tr>
      <tr bordercolor="#FFFFFF">
        <td><span class="Estilo6">N&ordm; Liq.:</font>
        </div>
        </span></td>
        <td><strong><font color="#000000" size="2">
          <input name = "nro_liquidacion" type = "text" value="<?php echo $nro_liquidacion;?>" size = "4" id = "nro_liquidacion"  onkeypress="return verif_caracter(this,event)" />
        </font></strong></td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td><span class="Estilo6">Periodo:</font> 
        </div>
        </span></td>
        <td><input name = "periodo" type = "text" value="<?php echo $periodo;?>" size = "4" id = "periodo"  onkeypress="return verif_caracter(this,event)" />        </td>
      </tr>
      <tr>
        <td><span class="Estilo6">A&ntilde;o:</font>
        </div>
        </span></td>
        <td><strong><font color="#000000" size="2">
          <input name = "anio" type = "text" value="<?php echo $anio;?>" size = "4" id = "anio"  onkeypress="return verif_caracter(this,event)" />
        </font></strong></td>
      </tr>
      <tr>
        <td colspan="2"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="que_ver" type="radio" value="1" checked="checked" />
          PANTALLA</font></div></td>
      </tr>
      
      <tr>
        <td colspan="2"><div align="center">
            <input type = "submit" name = "buscar" value = "BUSCAR" id = "buscar" />
        </div></td>
      </tr>
    </table>
  </form>

</body>
</html>
