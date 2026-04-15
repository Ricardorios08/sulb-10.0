<script language="javascript">
function on_load()
{
document.getElementById("min").focus();
document.getElementById("min").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "min":
				document.getElementById("porcentaje").focus();
				document.getElementById("porcentaje").select();
				break;
				case "porcentaje":
				document.getElementById("seg").focus();
				document.getElementById("seg").select();
				break;
				case "seg":
				document.getElementById("ttpk_seg").focus();
				document.getElementById("ttpk_seg").select();
				break;
						case "ttpk_seg":
				document.getElementById("sangria").focus();
						document.getElementById("sangria").select();
				break;
						case "sangria":
				document.getElementById("plaquetas").focus();
						document.getElementById("plaquetas").select();
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


 $sql11="select * from detalle_coagulograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$min=strtoupper($result11->fields["min"]);
$seg=strtoupper($result11->fields["seg"]);
$porcentaje=strtoupper($result11->fields["porcentaje"]);
$ttpk_seg=strtoupper($result11->fields["ttpk_seg"]);
$sangria=strtoupper($result11->fields["sangria"]);
$plaquetas=strtoupper($result11->fields["plaquetas"]);

$seg_coa=strtoupper($result11->fields["seg_coa"]);
$seg_san=strtoupper($result11->fields["seg_san"]);



 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina> 
<table width="750" border="0">
        <tr>
          <td width="740" colspan="2"><hr noshade></td>
        </tr>
        <tr>
          <td colspan="2"><span class="Estilo1">COAGULOGRAMA</span></td>
        </tr>
</table>
      <table width="750" border="0">
        <tr>
          <td colspan="3"><hr noshade></td>
        </tr>
        
        <tr>
          <td colspan="2"><div align="center">VALOR HALLADO
          </div>
          <div align="center"></div>            <div align="center"></div>            <div align="center"></div></td>
          <td><div align="center">VALOR REFERENCIAL </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="289">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="247"><div align="center">Tiempo de Coagulaci&oacute;n: </div></td>
          <td>
            <div align="left">
              <input name="min" type="text" id="min" value="<?php echo $min;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            min.            
            <input name="seg_coa" type="text" id="seg_coa" value="<?php echo $seg_coa;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
seg.</div></td>
          <td width="200"><div align="center">de 6 a 15 min. </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="left"></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">Tiempo de Protombina: </div></td>
          <td>
            <div align="left">
                <input name="porcentaje" type="text" id="porcentaje" value="<?php echo $porcentaje;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            %            
            <input name="seg" type="text" id="seg" value="<?php echo $seg;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
seg.</div></td>
          <td><div align="center">de 80 a 100 % </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="left"></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">TTPK:</div></td>
          <td>
              <div align="left">
                <input name="ttpk_seg" type="text" id="ttpk_seg" value="<?php echo $ttpk_seg;?>" size="8"   onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            seg.            </div></td>
          <td><div align="center">de 35 a 50 seg . </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">Tiempo de Sangr&iacute;a </div></td>
          <td><div align="left">
              <input name="sangria" type="text" id="sangria" value="<?php echo $sangria;?>" size="8"  onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            min..             
            <input name="seg_san" type="text" id="seg_san" value="<?php echo $seg_san;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
seg.</div></td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">Plaquetas</div></td>
          <td><div align="left">
              <input name="plaquetas" type="text" id="plaquetas" value="<?php echo $plaquetas;?>" size="8"   tabindex = "1">
            m3. </div></td>
          <td><div align="center"></div></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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
      
    


