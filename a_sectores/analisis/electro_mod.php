<script language="javascript">
function on_load()
{
document.getElementById("proteinas_totales").focus();
document.getElementById("proteinas_totales").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "proteinas_totales":
				document.getElementById("albumina").focus();
				document.getElementById("albumina").select();
				break;

				case "albumina":
				document.getElementById("alfa_1").focus();
				document.getElementById("alfa_1").select();
				break;
			
				case "alfa_1":
				document.getElementById("alfa_2").focus();
				document.getElementById("alfa_2").select();
				break;
				case "alfa_2":
				document.getElementById("beta").focus();
				document.getElementById("beta").select();
				break;
				case "beta":
				document.getElementById("gamma").focus();
				document.getElementById("gamma").select();
				break;
		 
				case "gamma":
				document.getElementById("observaciones").focus();
				document.getElementById("observaciones").select();
				break;

				case "observaciones":
				document.getElementById("observaciones1").focus();
				document.getElementById("observaciones1").select();
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

<BODY onload = "on_load()">
<?php 
include("../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica= $_REQUEST['nro_practica'];
 $nro_paciente= $_REQUEST['nro_paciente'];


 $sql11="select * from detalle_proteino where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$albumina=strtoupper($result11->fields["albumina"]);
$alfa1=strtoupper($result11->fields["alfa1"]);
$alfa2=strtoupper($result11->fields["alfa2"]);
$beta=strtoupper($result11->fields["beta"]);
$gamma=strtoupper($result11->fields["gamma"]);
$relacion_ag=strtoupper($result11->fields["relacion_ag"]);
$proteinas_totales=strtoupper($result11->fields["proteinas_totales"]);
$observaciones =$result11->fields["observaciones"];
$observaciones1 =$result11->fields["observaciones1"];

$globulina =strtoupper($result11->fields["globulina"]);

 $uni_albumina =strtoupper($result11->fields["uni_albumina"]);
$uni_globulina =strtoupper($result11->fields["uni_globulina"]);
$uni_alfa1 =strtoupper($result11->fields["uni_alfa1"]);
$uni_alfa2 =strtoupper($result11->fields["uni_alfa2"]);
$uni_beta =strtoupper($result11->fields["uni_beta"]);
$uni_gamma =strtoupper($result11->fields["uni_gamma"]);
$uni_relacion =strtoupper($result11->fields["uni_relacion"]);
$uni_totales =strtoupper($result11->fields["uni_totales"]);

 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>

<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

 
<table width="750" border="0">
        <tr>
          <td height="26">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#B8B8B8"><span class="Estilo1">Determinacion: <?php echo $nro_practica;?> - <?php echo $nombre_practica;?></span></td>
        </tr>
</table>
      <table width="749" border="0">
        
        <tr>
          <td colspan="2"><div align="center"></div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center">Ingresar valores en:</div></td>
        </tr>
        <tr>
          <td width="106"><div align="center">Proteinas totales. </div></td>
          <td colspan="2"><input name="proteinas_totales" type="text" id="proteinas_totales" value="<?php echo $proteinas_totales;?>" size="8" onKeyPress="return verif_caracter(this,event)">
          g/l</td>
          <td><div align="left"></div></td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td colspan="2"><div align="right">Albumina</div></td>
          <td width="102"><input name="albumina" type="text" id="albumina" value="<?php echo $albumina;?>" size="8" onKeyPress="return verif_caracter(this,event)"></td>
          <td width="165">
            <div align="left"></div></td>
      
		  <td width="289">

<?php
if ($uni_albumina == 1){
?><input name="uni_albumina" type="radio" value="1" checked> 
 % 
 <input name="uni_albumina" type="radio" value="0"> 
 g/l  
 <?php 
}else{
?>
 <input name="uni_albumina" type="radio" value="1" > 
  %
  <input name="uni_albumina" type="radio" value="0" checked>
    g/l    <?php 
}?>		</td>
        </tr>

        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Alfa 1 globulina </td>
          <td>            <div align="left">
            <input name="alfa_1" type="text" id="alfa_1" value="<?php echo $alfa1;?>" size="8" onKeyPress="return verif_caracter(this,event)">
          </div></td>
          <td>
<?php
if ($uni_alfa1 == 1){
?><input name="uni_alfa1" type="radio" value="1" checked>
 % 
 <input name="uni_alfa1" type="radio" value="0"> 
 g/l  <?php 
}else{
?>
 <input name="uni_alfa1" type="radio" value="1" > 
 % 
 <input name="uni_alfa1" type="radio" value="0" checked> 
 g/l  <?php 
}?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Alfa 2 globulina </td>
          <td>
            <div align="left">
              <input name="alfa_2" type="text" id="alfa_2" value="<?php echo $alfa2;?>" size="8" onKeyPress="return verif_caracter(this,event)">
            </div></td>
          <td>

<?php
if ($uni_alfa2 == 1){
?><input name="uni_alfa2" type="radio" value="1" checked> 
 % 
 <input name="uni_alfa2" type="radio" value="0"> 
  g/l  <?php 
}else{
?>
  <input name="uni_alfa2" type="radio" value="1" > 
  % 
  <input name="uni_alfa2" type="radio" value="0" checked>
   g/l   <?php 
}?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Beta globulina </td>
          <td>
            <div align="left">
              <input name="beta" type="text" id="beta" value="<?php echo $beta;?>" size="8" onKeyPress="return verif_caracter(this,event)">
            </div></td>
          <td>
		  
<?php
if ($uni_beta == 1){
?><input name="uni_beta" type="radio" value="1" checked> 
 % 
 <input name="uni_beta" type="radio" value="0"> 
 g/l  <?php 
}else{
?>
 <input name="uni_beta" type="radio" value="1" > 
 % 
 <input name="uni_beta" type="radio" value="0" checked> 
 g/l  <?php 
}?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Gamma globulina </td>
          <td>
            <div align="left">
              <input name="gamma" type="text" id="gamma" value="<?php echo $gamma;?>" onKeyPress="return verif_caracter(this,event)" size="8">
            </div></td>
          <td>

 <?php
if ($uni_gamma == 1){
?><input name="uni_gamma" type="radio" value="1" checked> 
 % 
 <input name="uni_gamma" type="radio" value="0"> 
 g/l  <?php 
}else{
?>
 <input name="uni_gamma" type="radio" value="1" > 
  % 
  <input name="uni_gamma" type="radio" value="0" checked> 
  g/l  <?php 
}?></td>
        </tr>
        
        <tr>
          <td colspan="5"><div align="center">OBSERVACIONES: 
          </div></td>
        </tr>
  </table>
      <table width="750" border="0">
        <tr>
          <td><input name="observaciones" type="text" id="observaciones" value="<?php echo $observaciones;?>" onKeyPress="return verif_caracter(this,event)" size="100" maxlength="100"></td>
        </tr>
        

        <tr>
          <td><input name="observaciones1" type="text" id="observaciones1" value="<?php echo $observaciones1;?>" size="100" maxlength="100"></td>
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
      
    

 