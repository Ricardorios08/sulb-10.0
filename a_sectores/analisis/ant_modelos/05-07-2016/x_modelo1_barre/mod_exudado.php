<script language="javascript">
function on_load()
{
document.getElementById("muestra").focus();
document.getElementById("muestra").select();
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
				document.getElementById("coloracion").focus();
				document.getElementById("coloracion").select();
				break;

				case "coloracion":
				document.getElementById("cultivo").focus();
				document.getElementById("cultivo").select();
				break;

				case "cultivo":
				document.getElementById("cultivo1").focus();
				document.getElementById("cultivo1").select();
				break;

				case "cultivo1":
				document.getElementById("cultivo2").focus();
				document.getElementById("cultivo2").select();
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


  $sql11="select * from detalle_exudado where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=$result11->fields["muestra"];
$coloracion=$result11->fields["coloracion"];
$cultivo=$result11->fields["cultivo"];
 
  
$cultivo1=$result11->fields["cultivo1"];
$cultivo2=$result11->fields["cultivo2"];



 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina>
<table width="850" border="0">
        <tr>
          <td height="34" colspan="4" bgcolor="#B8B8B8"><div align="center">EXUDADO </div></td>
        </tr>
        
	 
        <tr>
          <td width="264" bgcolor="#F0F0F0"><div align="center">Exudado </div></td>
          <td width="476" colspan="3"><input name="muestra" type="text" id="muestra" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $muestra?>" size="100" maxlength="120"></td>
        </tr>
        
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Coloracion de Gram-Nicolle </div></td>
          <td colspan="3"><input name="coloracion" type="text" id="coloracion" tabindex = "1"  value="<?php echo $coloracion?>" size="100" maxlength="120" onKeyPress="return verif_caracter(this,event)"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Cultivo</div></td>
          <td colspan="3"><input name="cultivo" type="text" id="cultivo" tabindex = "1"  value="<?php echo $cultivo?>" size="100" maxlength="120" onKeyPress="return verif_caracter(this,event)" ></td>
        </tr>
        
        <tr>
          <td bgcolor="#F0F0F0">&nbsp;</td>
          <td colspan="3"><input name="cultivo1" type="text" id="cultivo1" tabindex = "1"  value="<?php echo $cultivo1?>" size="100" maxlength="120" onKeyPress="return verif_caracter(this,event)"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0">&nbsp;</td>
          <td colspan="3"><input name="cultivo2" type="text" id="cultivo2" tabindex = "1"  value="<?php echo $cultivo2?>" size="100" maxlength="120"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center"></div></td>
          <td colspan="3"><input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR"></td>
        </tr>
  </table>
</form>
      
    

 
