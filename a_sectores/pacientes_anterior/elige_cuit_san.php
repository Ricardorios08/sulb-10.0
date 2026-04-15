<?php

include ("../../conexiones/config.inc.php");

?>

<form action="osde_ws_varios.php" method="post">
<table width="851" border="0" cellpadding="0">
  
<?php

 $sql="select * from datos_osde order by cod_operacion";
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
  <td width="858" height="30" bgcolor="#B8B8B8"><div align="center"><span class="Estilo5">SELECCIONE EL CUIT QUE DESEA AUTORIZAR SANCOR </span></div></td>
</tr>
<tr>
    <td> <?php 
$sql = "SELECT * FROM datos_osde";
$result = $db->Execute($sql);
echo "<select name=cuit[] size=1 id =cuit onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione CUIT</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cuit=$result->fields["cuit"];
$prestador=strtoupper($result->fields["prestador"]);
$sucursal=strtoupper($result->fields["sucursal"]);

echo"<option value=$cuit>$cuit ($prestador) Suc: $sucursal</option>";
$result->MoveNext();
	}
echo"</select>";
?> <label>
      <input type="submit" name="Submit" value="AUTORIZAR">
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