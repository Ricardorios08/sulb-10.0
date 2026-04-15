<script language="javascript">
function on_load()
{
document.getElementById("salino").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "salino":
				document.getElementById("albuminoso").focus();
				break;

				 
				


				
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>

<?php 
include("../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica= $_REQUEST['nro_practica'];
 $nro_paciente= $_REQUEST['nro_paciente'];



 $sql11="select * from detalle_aglutininas where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$salino=strtoupper($result11->fields["salino"]);
$albuminoso=strtoupper($result11->fields["albuminoso"]);



$observaciones =strtoupper($result11->fields["observaciones"]);





 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina> 
<table width="750" border="0">
        <tr>
          <td><hr noshade></td>
        </tr>
        <tr>
          <td><span class="Estilo1">DETERMINACION DE TIT. DE AGLUTINAS ANTI Rh </span></td>
        </tr>
</table>
      <table width="750" border="0">
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        <tr>
          <td colspan="4"><div align="left"></div></td>
        </tr>
        
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        
        <tr>
          <td width="200">Medio Salino </td>
          <td width="168"><input name="salino" type="text" id="salino" value="<?php echo $salino;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
          <td width="168">&nbsp;</td>
          <td width="198">&nbsp;</td></tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Medio Albuminoso </td>
          <td><input name="albuminoso" type="text" id="albuminoso" value="<?php echo $albuminoso;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
  </table>
      <table width="750" border="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td><hr noshade></td>
        </tr>
        
        <tr>
          <td><div align="center">
            <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR">
          </div></td>
  </tr></table>

</form>
      
    

   <div align="center"></div>
