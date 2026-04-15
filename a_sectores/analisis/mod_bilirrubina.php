<script language="javascript">
function on_load()
{
document.getElementById("directa").focus();
document.getElementById("directa").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				
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



 $sql11="select * from detalle_bilirrubina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


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
          <td bgcolor="#B8B8B8"><span class="Estilo1">BILIRRUBINA TOTAL, DIRECTA E INDIRECTA </span></td>
        </tr>
</table>
      <table width="750" border="0">
        
        
        <tr>
          <td width="354" bgcolor="#F0F0F0">BILIRRUBINA DIRECTA </td>
          <td width="386" bgcolor="#F0F0F0"><input name="directa" type="text" id="directa" value="<?php echo $directa;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0">BILIRRUBINA INDIRECTA </td>
          <td bgcolor="#F0F0F0"><input name="indirecta" type="text" id="indirecta" value="<?php echo $indirecta;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "3"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0">BILIRRUBINA TOTAL </td>
          <td bgcolor="#F0F0F0"><input name="total" type="text" id="total" value="<?php echo $total;?>" size="8"   tabindex = "1"></td>
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
