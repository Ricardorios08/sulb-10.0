<?php

include ("../../conexiones/config.inc.php");

?>
<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
-->
</style>


<form action="liquidacion.php" method="post">
<table width="851" border="0" cellpadding="0">
  
<?php


$nro_liquidacion = 1;
$periodo = date("m");
$anio = date("y");




 $sql="select * from datos_osde";
 $result = $db->Execute($sql);

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_operacion=strtoupper($result->fields["cod_operacion"]);
$prestador=strtoupper($result->fields["prestador"]);
$cuit=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$cuenta_abm=strtoupper($result->fields["cuenta_abm"]);

 ?>
<tr>
  <td width="858" height="30" bgcolor="#B8B8B8"><div align="center"><span class="Estilo5">SELECCIONE LA CUENTA QUE DESEA VER</span></div></td>
</tr>
<tr>
    <td> <?php 
$sql = "SELECT * FROM datos_osde";
$result = $db->Execute($sql);
echo "<select name=cuenta_abm[] size=1 id =cuenta_abm onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione CUIT</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cuenta_abm=$result->fields["cuenta_abm"];
$prestador=strtoupper($result->fields["prestador"]);
$sucursal=strtoupper($result->fields["sucursal"]);

echo"<option value=$cuenta_abm>($prestador) </option>";
$result->MoveNext();
	}
echo"</select>";
?> <label><span class="Estilo1">Contrase&ntilde;a</span>
        <input name="contra" type="password" id="contra">
    </label></td>
    </tr>
<?php


$result->MoveNext();
		}



?>
	  	<input type = "hidden" name = "cod_grabacion" value="<?php echo $cod_grabacion;?>">
		<input type = "hidden" name = "nro_paciente" value="<?php echo $nro_paciente;?>">
				<input type = "hidden" name = "nro_os" value="<?php echo $nro_os;?>">
				
			  	
</table>


<table width="851" border="0">
      
      
      <tr bordercolor="#FFFFFF">
        <td width="57"><span class="Estilo6">N&ordm; Liq.:</font>
        </div>
        </span></td>
        <td width="784"><strong><font color="#000000" size="2">
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