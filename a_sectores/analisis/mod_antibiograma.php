<script language="javascript">
function on_load()
{
document.getElementById("min").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "min":
				document.getElementById("seg").focus();
				break;
				case "seg":
				document.getElementById("porcentaje").focus();
				break;
				case "porcentaje":
				document.getElementById("ttpk_seg").focus();
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


 $sql11="select * from `detalle_antibiograma` where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 


$sensible1=$result11->fields["sensible1"];
$sensible2=$result11->fields["sensible2"];
$sensible3=$result11->fields["sensible3"];
$sensible4=$result11->fields["sensible4"];
$sensible5=$result11->fields["sensible5"];
$sensible6=$result11->fields["sensible6"];

$med_sensible1=$result11->fields["med_sensible1"];
$med_sensible2=$result11->fields["med_sensible2"];
$med_sensible3=$result11->fields["med_sensible3"];
$med_sensible4=$result11->fields["med_sensible4"];
$med_sensible5=$result11->fields["med_sensible5"];
$med_sensible6=$result11->fields["med_sensible6"];

$resistente1=$result11->fields["resistente1"];
$resistente2=$result11->fields["resistente2"];
$resistente3=$result11->fields["resistente3"];
$resistente4=$result11->fields["resistente4"];
$resistente5=$result11->fields["resistente5"];
$resistente6=$result11->fields["resistente6"];
$observaciones=$result11->fields["observaciones"];




 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina> 
<table width="750" border="0">
        
        <tr>
          <td width="1480" colspan="2" bgcolor="#EDEDED"><div align="center"><span class="Estilo1">BACTERIOLOGICO</span></div></td>
        </tr>
</table>
      <table width="750" border="0">
        
        <tr>
          <td colspan="4"><div align="center">Antibiograma</div></td>
        </tr>
        <tr>
          <td width="5984" colspan="2">&nbsp;</td>
          <td>Sensible a:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="right"></div></td>
          <td width="294">  <?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=sensible1[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?><optgroup label="SELECCIONADA"> </optgroup>
                <option value="<?php echo $sensible1;?>" selected><?php echo $sensible1;?></option>
                </optgroup><?php

echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?> </td>
          <td width="251"><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=sensible4[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $sensible4;?>" selected><?php echo $sensible4;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=sensible2[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $sensible2;?>" selected><?php echo $sensible2;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=sensible5[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $sensible5;?>" selected><?php echo $sensible5;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
echo $antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=sensible3[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $sensible3;?>" selected><?php echo $sensible3;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=sensible6[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo "$sensible6";?>" selected><?php echo $sensible6;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
 
echo"<option value='$antibiotico'>$antibiotico</option>";


$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        
        
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Medianamente sensible  a</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="right"></div></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=med_sensible1[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?><optgroup label="SELECCIONADA"> </optgroup>
                <option value="<?php echo $med_sensible1;?>" selected><?php echo $med_sensible1;?></option>
                </optgroup><?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=med_sensible4[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $med_sensible4;?>" selected><?php echo $med_sensible4;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=med_sensible2[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $med_sensible2;?>" selected><?php echo $med_sensible2;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";

$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=med_sensible5[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $med_sensible5;?>" selected><?php echo $med_sensible5;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=med_sensible3[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $med_sensible3;?>" selected><?php echo $med_sensible3;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=med_sensible6[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $med_sensible6;?>" selected><?php echo $med_sensible6;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Resistente a: </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="right"></div></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=resistente1[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?><optgroup label="SELECCIONADA"> </optgroup>
                <option value="<?php echo $resistente1;?>" selected><?php echo $resistente1;?></option>
                </optgroup><?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=resistente4[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $resistente4;?>" selected><?php echo $resistente4;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=resistente2[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $resistente2;?>" selected><?php echo $resistente2;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=resistente5[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $resistente5;?>" selected><?php echo $resistente5;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=resistente3[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $resistente3;?>" selected><?php echo $resistente3;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=resistente6[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";v
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $resistente6;?>" selected><?php echo $resistente6;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        
        <tr>
          <td colspan="4">Notas:
          <input name="observaciones" type="text" id="observaciones"   tabindex = "1" value="<?php echo $observaciones;?>" size="100"></td>
        </tr>
      </table>
      <table width="750" border="0">
        

        <tr>
          <td bgcolor="#EDEDED"><div align="center">
            <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR">
          </div></td>
  </tr></table>

</form>
      
    

  
