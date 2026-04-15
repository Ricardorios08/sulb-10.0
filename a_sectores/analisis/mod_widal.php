<script language="javascript">
function on_load()
{
document.getElementById("flagelares").focus();
document.getElementById("flagelares").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "flagelares":
				document.getElementById("somatico").focus();
				document.getElementById("somatico").select();
				break;
				case "somatico":
				document.getElementById("paratyphi_a").focus();
				document.getElementById("paratyphi_a").select();
				break;
				case "paratyphi_a":
				document.getElementById("paratyphi_b").focus();
				document.getElementById("paratyphi_b").select();
				break;
				case "paratyphi_b":
				document.getElementById("observaciones").focus();
				document.getElementById("observaciones").select();
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


 $sql11="select * from `detalle_widal` where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$flagelares=$result11->fields["flagelares"];
$somatico=$result11->fields["somatico"];
$paratyphi_a=$result11->fields["paratyphi_a"];
$paratyphi_b=$result11->fields["paratyphi_b"];
$observaciones=$result11->fields["observaciones"];

 




 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina> 
<table width="750" border="0">
        
        <tr>
          <td width="1480" colspan="2" bgcolor="#EDEDED"><div align="center"><span class="Estilo1">WIDAL</span></div></td>
        </tr>
</table>
      <table width="983" border="0">
        
        
        <tr>
          <td colspan="2"><div align="right">Flagelares</div></td>
          <td width="694" colspan="2">
            <div align="left">
              <input name="flagelares" type="text" id="flagelares" value="<?php echo $flagelares;?>" size="30" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            </div>            <div align="center"></div></td>
        </tr>
        
        <tr>
          <td colspan="2"><div align="right">Somatico </div></td>
          <td colspan="2"><input name="somatico" type="text" id="somatico"   tabindex = "1" value="<?php echo $somatico;?> " onKeyPress="return verif_caracter(this,event)" size="30"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">paratyphi A</div></td>
          <td colspan="2"><input name="paratyphi_a" type="text" id="paratyphi_a"   tabindex = "1" value="<?php echo $paratyphi_a;?>" onKeyPress="return verif_caracter(this,event)"size="30"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">paratyphi B </div></td>
          <td colspan="2">
              <div align="left">
                <input name="paratyphi_b" type="text" id="paratyphi_b"   tabindex = "1" value="<?php echo $paratyphi_b;?>" onKeyPress="return verif_caracter(this,event)" size="30">
                .            </div>            <div align="center"></div></td>
        </tr>
        
        
        <tr>
          <td colspan="4">Notas:
          <input name="observaciones" type="text" id="observaciones"   tabindex = "1" value="<?php echo $observaciones;?>" size="100"></td>
        </tr>
      </table>
  <table width="750" border="0">
        

        <tr>
          <td bgcolor="#EDEDED"><div align="center">
            <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR">
          </div></td>
  </tr></table>

</form>
      
    

   <div align="center"></div>
