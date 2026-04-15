<script language="javascript">
function on_load()
{
document.getElementById("creatinemia").focus();
document.getElementById("creatinemia").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "creatinemia":
				document.getElementById("creatinuria").focus();
				document.getElementById("creatinuria").select();
				break;

				case "creatinuria":
				document.getElementById("diuresis").focus();
				document.getElementById("diuresis").select();
				break;
				 
				case "diuresis":
				document.getElementById("sup_corporal").focus();
				document.getElementById("sup_corporal").select();
				break;

				case "sup_corporal":
				document.getElementById("volumen").focus();
				document.getElementById("volumen").select();
				break;	
				
				case "volumen":
				document.getElementById("clearence").focus();
				document.getElementById("clearence").select();
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



 $sql11="select * from detalle_clearence where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$creatinemia=strtoupper($result11->fields["creatinemia"]);
$creatinuria=strtoupper($result11->fields["creatinuria"]);

$diuresis=strtoupper($result11->fields["diuresis"]);
$sup_corporal=strtoupper($result11->fields["sup_corporal"]);

$clearence=strtoupper($result11->fields["clearence"]);


$observaciones =strtoupper($result11->fields["observaciones"]);
$volumen =strtoupper($result11->fields["volumen"]);




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
          <td bgcolor="#B8B8B8"><span class="Estilo1">CLEARENCE DE CREATININA  ENDOGENO </span></td>
        </tr>
</table>
      <table width="750" border="0" cellspacing="0">
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        
        
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        
        <tr>
          <td width="199">Creatinemia</td>
          <td width="189"><input name="creatinemia" type="text" id="creatinemia" value="<?php echo $creatinemia;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"> 
            mg/dl</td>
          <td width="145">&nbsp;</td>
          <td width="199">&nbsp;</td></tr>
        <tr>
          <td>Creatinuria</td>
          <td><input name="creatinuria" type="text" id="creatinuria" value="<?php echo $creatinuria?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            g/l</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        
        <tr>
          <td>Diruresis</td>
          <td><input name="diuresis" type="text" id="diuresis" value="<?php echo $diuresis;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          ml</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Superfice corporal corregida </td>
          <td><input name="sup_corporal" type="text" id="sup_corporal" value="<?php echo $sup_corporal;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            m&sup2;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Volumen</td>
          <td><input name="volumen" type="text" id="volumen" value="<?php echo $volumen;?>" size="8" tabindex = "1" onKeyPress="return verif_caracter(this,event)" >
            ml/min </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Clearence de creatinina </td>
          <td><input name="clearence" type="text" id="clearence" value="<?php echo $clearence;?>" size="8" tabindex = "1">
            ml/min por 1.73 m&sup2;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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
