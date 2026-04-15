<script language="javascript">
function on_load()
{
document.getElementById("diuresis").focus();
document.getElementById("diuresis").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "diuresis":
				document.getElementById("valor_hallado").focus();
				document.getElementById("valor_hallado").select();
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


  $sql11="select * from detalle_proteinura where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);




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
          <td><span class="Estilo1">PROTEINURIA EN ORINA DE 24 HS.</span></td>
        </tr>
</table>
      <table width="750" border="0">
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        <tr>
          <td colspan="4"><div align="left">Electrofotométrico con calmagile </div></td>
        </tr>
	 
        
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        
        <tr>
          <td width="199">Diuresis </td>
          <td width="189"><input name="diuresis" type="text" id="diuresis" value="<?php echo $diuresis?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"> 
            l</td>
          <td width="145">&nbsp;</td>
          <td width="199">&nbsp;</td>
        </tr>
        <tr>
          <td>Valor Hallado</td>
          <td><input name="valor_hallado" type="text" id="valor_hallado" value="<?php echo $valor_hallado?>" size="8"  tabindex = "1">
          mg/en 24 hs </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        
        <tr>
          <td colspan="4"><div align="center">Valores referenciales </div></td>
        </tr>
        
        <tr>
          <td colspan="4"><div align="center">6.0 a 10.0 m/Eq/24 hs. </div></td>
        </tr>
        <tr>
          <td colspan="4"><div align="center">
            <div align="center">72.9 a 121.5 m/Eq/24 hs. </div>
          </div></td>
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
