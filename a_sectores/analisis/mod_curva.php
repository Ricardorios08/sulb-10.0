<script language="javascript">
function on_load()
{
document.getElementById("basal").focus();
document.getElementById("basal").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "basal":
				document.getElementById("a30").focus();
				document.getElementById("a30").select();
				break;
				case "a30":
				document.getElementById("a60").focus();
				document.getElementById("a60").select();
				break;
				case "a60":
				document.getElementById("a120").focus();
				document.getElementById("a120").select();
				break;
				case "a120":
				document.getElementById("a180").focus();
				document.getElementById("a180").select();
				break;
				case "a180":
				document.getElementById("basal_mg").focus();
				document.getElementById("basal_mg").select();
				break;

				case "basal_mg":
				document.getElementById("a30mg").focus();
				document.getElementById("a30mg").select();
				break;
				case "a30mg":
				document.getElementById("a60mg").focus();
				document.getElementById("a60mg").select();
				break;
				case "a60mg":
				document.getElementById("a120mg").focus();
				document.getElementById("a120mg").select();
				break;
				case "a120mg":
				document.getElementById("a180mg").focus();
				document.getElementById("a180mg").select();
				break;
				
				


				
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
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



 $sql11="select * from detalle_curva where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$basal=strtoupper($result11->fields["basal"]);
$a30=strtoupper($result11->fields["a30"]);

$a30=strtoupper($result11->fields["a30"]);
$a60=strtoupper($result11->fields["a60"]);
$a120=strtoupper($result11->fields["a120"]);
$a180=strtoupper($result11->fields["a180"]);
$basal_mg=strtoupper($result11->fields["basal_mg"]);
$a30mg=strtoupper($result11->fields["a30mg"]);
$a60mg=strtoupper($result11->fields["a60mg"]);
$a120mg=strtoupper($result11->fields["a120mg"]);
$a180mg=strtoupper($result11->fields["a180mg"]);




 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina>
<table width="750" border="0">
        
        
        
        <tr>
          <td colspan="4" bgcolor="#B8B8B8"> <div align="center"><strong>CURVA DE TOLERANCIA ORAL A LA GLUCOSA  </strong></div></td>
        </tr>
        <tr>
          <td>Valores Hallados </td>
          <td><div align="center">Glucemia</div></td>
          <td><div align="center">Insulemia</div></td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td width="200">Basal</td>
          <td width="168"><input name="basal" type="text" id="basal" value="<?php echo $basal;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          mg/dl</td>
          <td width="168"><input name="basal_mg" type="text" id="basal_mg" value="<?php echo $basal_mg;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "6">
            mg/dl</td>
          <td width="198">&nbsp;</td></tr>
        <tr>
          <td>A los 30 min. </td>
          <td><input name="a30" type="text" id="a30" value="<?php echo $a30;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "2">
          mg/dl</td>
          <td><input name="a30mg" type="text" id="a30mg" value="<?php echo $a30mg;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "7">
            mg/dl</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>A los 60 min. </td>
          <td><input name="a60" type="text" id="a60" value="<?php echo $a60;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "3">
          mg/dl</td>
          <td><input name="a60mg" type="text" id="a60mg" value="<?php echo $a60mg;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "8">
            mg/dl</td>
          <td>&nbsp;</td></tr>
        <tr>
          <td>A los 120 min. </td>
          <td><input name="a120" type="text" id="a120" value="<?php echo $a120;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "4">
          mg/dl</td>
          <td><input name="a120mg" type="text" id="a120mg" value="<?php echo $a120mg;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "9">
            mg/dl</td>
          <td>&nbsp;</td></tr>
        <tr>
          <td>A los 180 min. </td>
          <td><input name="a180" type="text" id="a180" value="<?php echo $a180;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "5">
            mg/dl</td>
          <td><input name="a180mg" type="text" id="a180mg" value="<?php echo $a180mg;?>" size="8"   tabindex = "10">
            mg/dl</td>
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
      
    


