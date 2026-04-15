<script language="javascript">
function on_load()
{
document.getElementById("aspecto").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "aspecto":
				document.getElementById("enfresco").focus();
				break;

				case "enfresco":
				document.getElementById("enfresco1").focus();
				break;

				case "enfresco1":
				document.getElementById("giemsa").focus();
				break;

				case "giemsa":
				document.getElementById("giemsa1").focus();
				break;

				case "giemsa1":
				document.getElementById("pmn").focus();
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


  $sql11="select * from detalle_pmn where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$aspecto=$result11->fields["aspecto"];
$enfresco=$result11->fields["enfresco"];
$enfresco1=$result11->fields["enfresco1"];
$giemsa=$result11->fields["giemsa"];
$giemsa1=$result11->fields["giemsa1"];
$pmn=$result11->fields["pmn"];
 




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
          <td><span class="Estilo1">POLIMORFONUCLEARES</span></td>
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
          <td width="264"><div align="center">Aspecto</div></td>
          <td width="476" colspan="3"><input name="aspecto" type="text" id="aspecto" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $aspecto?>" size="30" maxlength="30"></td>
        </tr>
        <tr>
          <td><div align="center">OBSERVACION MICROSCOPICA EN FRESCO</div></td>
          <td colspan="3"><input name="enfresco" type="text" id="enfresco" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $enfresco?>" size="80" maxlength="120"></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
          <td colspan="3"><input name="enfresco1" type="text" id="enfresco1" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $enfresco1?>" size="80" maxlength="120"></td>
        </tr>
        <tr>
          <td><div align="center">Con coloracion de GIEMSA: </div></td>
          <td colspan="3"><input name="giemsa" type="text" id="giemsa" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $giemsa?>" size="80" maxlength="120"></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
          <td colspan="3"><input name="giemsa1" type="text" id="giemsa1" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $giemsa1?>" size="80" maxlength="120"></td>
        </tr>
        <tr>
          <td><div align="center">PMN:</div></td>
          <td colspan="3"><input name="pmn" type="text" id="pmn" tabindex = "1"  value="<?php echo $pmn?>" size="10" maxlength="10"></td>
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
