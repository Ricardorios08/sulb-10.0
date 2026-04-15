	<link rel="stylesheet" type="text/css" media="screen" href="../../menus.css" />
	<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
	
	<?php

include ("../../conexiones/config.inc.php");

?>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 24px;
}
-->
</style>


<form action="osde_ws_varios.php" method="post">
<table width="630" border="0" cellpadding="0">
  
<?php

 $sql="select * from datos_osde order by cod_operacion desc";
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
  <td width="626" height="106" bgcolor="#EDEDED"><div align="center">
    <p class="Estilo5 Estilo1">SELECCIONE EL CUIT </p>
    <p class="Estilo5 Estilo1">QUE DESEA AUTORIZAR  </p>
  </div></td>
</tr>
<tr>
    <td bgcolor="#FFFFFF">  <div align="center">
</div>
      <div align="center">
        <label>
        <?php 
$sql = "SELECT * FROM datos_osde order by cod_operacion desc";
$result = $db->Execute($sql);
echo "<select name=cuit[] size='15' width='150' id =cuit onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione CUIT</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cuit=$result->fields["cuit"];
$prestador=strtoupper($result->fields["prestador"]);
$sucursal=strtoupper($result->fields["sucursal"]);

echo"<option value=$cuit>$cuit / ($prestador)  $sucursal</option>";
$result->MoveNext();
	}
echo"</select>";
?>
        </label>
      </div></td>
    </tr>
<tr>
  <td bgcolor="#B8B8B8"><div align="center">
    <input type="submit" name="Submit" value="AUTORIZAR" class = "bot1">
  </div></td>
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