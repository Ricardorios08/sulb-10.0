<script language="javascript">
function on_load()
{
document.getElementById("muestra").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "muestra":
				document.getElementById("color").focus();
				break;

				case "color":
				document.getElementById("aspecto").focus();
				break;

				case "aspecto":
				document.getElementById("obs_micro").focus();
				break;

				case "obs_micro":
				document.getElementById("nicolle").focus();
				break;

				case "nicolle":
				document.getElementById("cultivo").focus();
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


  $sql11="select * from detalle_bacteriologico where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=strtoupper($result11->fields["muestra"]);
$color=strtoupper($result11->fields["color"]);
$aspecto=strtoupper($result11->fields["aspecto"]);
$obs_micro=strtoupper($result11->fields["obs_micro"]);
$nicolle=strtoupper($result11->fields["nicolle"]);
$cultivo=strtoupper($result11->fields["cultivo"]);
 




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
          <td><span class="Estilo1">EXAMEN BACTERIOLOGICO</span></td>
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
          <td width="264"><div align="center">Muestra y obtenci&oacute;n </div></td>
          <td width="476" colspan="3"><input name="muestra" type="text" id="muestra" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $muestra?>" size="30" maxlength="30"></td>
        </tr>
        <tr>
          <td><div align="center">Color</div></td>
          <td colspan="3"><input name="color" type="text" id="color" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $color?>" size="30" maxlength="30"></td>
        </tr>
        <tr>
          <td><div align="center">Aspecto</div></td>
          <td colspan="3"><input name="aspecto" type="text" id="aspecto" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $aspecto?>" size="30" maxlength="30"></td>
        </tr>
        <tr>
          <td><div align="center">OBSERVACION MICROSCOPICA EN FRESCO: </div></td>
          <td colspan="3"><input name="obs_micro" type="text" id="obs_micro" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $obs_micro?>" size="80" maxlength="120"></td>
        </tr>
        <tr>
          <td><div align="center">Con coloracion de GRM-NICOLLE </div></td>
          <td colspan="3"><input name="nicolle" type="text" id="nicolle" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $nicolle?>" size="80" maxlength="120"></td>
        </tr>
        <tr>
          <td><div align="center">Cultivo e identificacion bioquimica </div></td>
          <td colspan="3"><input name="cultivo" type="text" id="cultivo" tabindex = "1"  value="<?php echo $cultivo?>" size="80" maxlength="120"></td>
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
