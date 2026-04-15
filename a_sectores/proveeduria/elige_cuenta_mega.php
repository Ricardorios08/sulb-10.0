<?php

include ("../../conexiones/config.inc.php");

?>
<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
-->
</style>


<form action="saldos_mega.php" method="post">
<table width="851" border="0" cellpadding="0">
  
<?php

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
  <td><span class="Estilo1">
    <?php 
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
?>
    Contrase&ntilde;a</span>
    <label>
    <input name="contra" type="password" id="contra">
    <input type="submit" name="Submit" value="BUSCAR">
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

</form>