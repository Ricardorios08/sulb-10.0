<script language="javascript">
function on_load()
{
document.getElementById("salino").focus();
document.getElementById("salino").select();
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
				document.getElementById("albuminoso").select();
				break;
				case "albuminoso":
				document.getElementById("coombs").focus();
				document.getElementById("coombs").select();
				break;
		 
				case "coombs":
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


 $sql11="select * from `detalle_coombs` where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$salino=$result11->fields["salino"];
$albuminoso=$result11->fields["albuminoso"];
$coombs=$result11->fields["coombs"];

$observaciones=$result11->fields["observaciones"];

 




 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina> 
<table width="850" border="0">
        
        <tr>
          <td width="958" height="30" colspan="2" bgcolor="#EDEDED"><div align="center">COOMBS INDIRECTA O RH VARIEDAD D&micro;</div></td>
        </tr>
</table>
      <table width="850" border="0">
        <!--DWLayoutTable-->
        
        
        <tr>
          <td width="537" valign="top"><div align="right">DOSAJE DE AGLUTININAS    ANTI RH EN MEDIO SALINO</div></td>
          <td width="303" valign="top"><input name="salino" type="text" id="salino" value="<?php echo $salino;?>" size="30" onKeyPress="return verif_caracter(this,event)" tabindex = "1">            </div>           </td>
        </tr>
        
        <tr>
          <td valign="top"><div align="right">DOSAJE DE AGLUTININAS ANTI RH EN MEDIO ALBUMINOSO</div></td>
          <td valign="top"><input name="albuminoso" type="text" id="albuminoso"   tabindex = "1" value="<?php echo $albuminoso;?> " onKeyPress="return verif_caracter(this,event)" size="30"></td>
        </tr>
        <tr>
          <td valign="top"><div align="right">
            <div align="right">TEST DE COOMS INDIRECTO</div>
          </div></td>
          <td valign="top"><input name="coombs" type="text" id="coombs"   tabindex = "1" value="<?php echo $coombs;?>" onKeyPress="return verif_caracter(this,event)"size="30"></td>
        </tr>
        
        
        
        <tr>
          <td colspan="2">Notas:
          <input name="observaciones" type="text" id="observaciones"   tabindex = "1" value="<?php echo $observaciones;?>" size="100"></td>
        </tr>
  </table>
  <table width="850" border="0">
        

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
