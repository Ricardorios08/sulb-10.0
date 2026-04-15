<script language="javascript">
function on_load()
{
document.getElementById("aspartato").focus();
document.getElementById("aspartato").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "aspartato":
				document.getElementById("alanina").focus();
				document.getElementById("alanina").select();
				break;

				case "alanina":
				document.getElementById("fosfatasa").focus();
				document.getElementById("fosfatasa").select();
				break;
				 
				case "fosfatasa":
				document.getElementById("directa").focus();
				document.getElementById("directa").select();
				break;
				case "directa":
				document.getElementById("indirecta").focus();
				document.getElementById("indirecta").select();
				break;
				case "indirecta":
				document.getElementById("total").focus();
				document.getElementById("total").select();
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



 $sql11="select * from detalle_hepatograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$aspartato=strtoupper($result11->fields["aspartato"]);
$alanina=strtoupper($result11->fields["alanina"]);

$fosfatasa=strtoupper($result11->fields["fosfatasa"]);
$total=strtoupper($result11->fields["total"]);

$directa=strtoupper($result11->fields["directa"]);
$indirecta=strtoupper($result11->fields["indirecta"]);


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
          <td bgcolor="#B8B8B8"><span class="Estilo1">HEPATOGRAMA</span></td>
        </tr>
</table>
      <table width="750" border="0">
        
        
        
        <tr>
          <td colspan="3">ASPARTAT
            
          O AMINOTRANSFER. (ALT/ASAT/GOT) </td>
          <td width="311"><input name="aspartato" type="text" id="aspartato" value="<?php echo $aspartato?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
        </tr>
        
        <tr>
          <td colspan="3">ALANINA AMINOTRANSFER. (ALT/ALAT/GPT) </td>
          <td><input name="alanina" type="text" id="alanina" value="<?php echo $alanina?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
        </tr>
        
        <tr>
          <td colspan="3">FOSFATASA ALCALINA (FAL) </td>
          <td><input name="fosfatasa" type="text" id="fosfatasa" value="<?php echo $fosfatasa?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
        </tr>
        
        <tr>
          <td colspan="3">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3">BILIRRUBINA DIRECTA </td>
          <td><input name="directa" type="text" id="directa" value="<?php echo $directa;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
        </tr>
        <tr>
          <td colspan="3">BILIRRUBINA INDIRECTA </td>
          <td><input name="indirecta" type="text" id="indirecta" value="<?php echo $indirecta;?>" size="8"   tabindex = "3" onKeyPress="return verif_caracter(this,event)"></td>
        </tr>
        <tr>
          <td colspan="3">BILIRRUBINA TOTAL </td>
          <td><input name="total" type="text" id="total" value="<?php echo $total;?>" size="8"  tabindex = "1"></td>
        </tr>
  </table>
      <table width="750" border="0">
        
        
        <tr>
          <td bgcolor="#B8B8B8"><div align="center">
            <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR">
          </div></td>
  </tr></table>

</form>
      
    

   <div align="center"></div>
