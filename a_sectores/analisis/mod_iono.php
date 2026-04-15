<script language="javascript">
function on_load()
{
document.getElementById("natremia").focus();
document.getElementById("natremia").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "natremia":
				document.getElementById("kalemia").focus();
document.getElementById("kalemia").select();
				break;

				case "kalemia":
				document.getElementById("cloremia").focus();
								document.getElementById("cloremia").select();
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



 $sql11="select * from detalle_iono where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$natremia=strtoupper($result11->fields["natremia"]);
$kalemia=strtoupper($result11->fields["kalemia"]);
$cloremia=strtoupper($result11->fields["cloremia"]);


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
          <td bgcolor="#B8B8B8"><span class="Estilo1">IONOGRAMA PLASMATICO </span></td>
        </tr>
</table>
      <table width="750" border="0">
        
        
        <tr>
          <td width="200">SODIO</td>
          <td><input name="natremia" type="text" id="natremia" value="<?php echo $natremia;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          mmol/l</td>
          </tr>
        
        
        <tr>
          <td>POTASIO</td>
          <td><input name="kalemia" type="text" id="kalemia" value="<?php echo $kalemia;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            mmol/l</td>
        </tr>
        
        <tr>
          <td width="200">CLORO</td>
          <td><input name="cloremia" type="text" id="cloremia" value="<?php echo $cloremia;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          mmol/l</td>
        </tr>
  </table>
      <table width="750" border="0">
        
        
        <tr>
          <td><hr noshade></td>
        </tr>
        
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
