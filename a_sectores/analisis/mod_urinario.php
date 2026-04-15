<script language="javascript">
function on_load()
{
document.getElementById("resultado").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "resultado":
				document.getElementById("sodio").focus();
				break;
				case "sodio":
				document.getElementById("potasio").focus();
				break;
				case "potasio":
				document.getElementById("cloro").focus();
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


 $sql11="select * from detalle_iono_urinario where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$resultado=strtoupper($result11->fields["resultado"]);
$sodio=strtoupper($result11->fields["sodio"]);
$potasio=strtoupper($result11->fields["potasio"]);
$cloro=strtoupper($result11->fields["cloro"]);
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
          <td colspan="2"><hr noshade></td>
        </tr>
        <tr>
          <td colspan="2"><span class="Estilo1">IONOGRAMA - URINARIO </span></td>
        </tr>
        <tr>
          <td colspan="2">M&eacute;todo Fotometr&iacute;a de llama. </td>
        </tr>
        <tr>
          <td width="276">Diuresis remitida al laboratorio: 
          <input name="resultado" type="text" id="resultado" value="<?php echo $resultado;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
          <td width="464">nl.</td>
        </tr>
</table>
      <table width="750" border="0">
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        
        <tr>
          <td width="200">SODIO (Na) Contiene: </td>
          <td width="168"><input name="sodio" type="text" id="sodio" value="<?php echo $sodio;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
          <td width="168">mmo</td>
          <td width="198">en la orina de 24 Hs </td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">V. de R: 30 a 300 mmol/ en la orina de 24 hs. </div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>POTASIO (K) Contiene: </td>
          <td><input name="potasio" type="text" id="potasio" value="<?php echo $potasio;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
          <td>mmo</td>
          <td>en la orina de 24 Hs </td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">V. de R: 23 a 125 mmol/ en la orina de 24 hs. </div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>CLORO (Cl) Contiene: </td>
          <td><input name="cloro" type="text" id="cloro" value="<?php echo $cloro;?>" size="8"   tabindex = "1"></td>
          <td>mmo</td>
          <td>en la orina de 24 Hs </td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">V. de R: 110 a 250 mmol/ en la orina de 24 hs. </div></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="750" border="0">
        
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
