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


 $sql11="select * from `detalle_urocultivo` where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$muestra=$result11->fields["muestra"];
$color=$result11->fields["color"];
$aspecto=$result11->fields["aspecto"];
$sedimento=$result11->fields["sedimento"];
$reaccion=$result11->fields["reaccion"];

$en_fresco=$result11->fields["en_fresco"];
$gramm=$result11->fields["gramm"];
$cultivo=$result11->fields["cultivo"];
$recuento=$result11->fields["recuento"];

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

$en_fresco1=$result11->fields["en_fresco1"];
$potencia=$result11->fields["potencia"];
$densidad=$result11->fields["densidad"];

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
          <td colspan="2"><div align="right">Muestra</div></td>
          <td colspan="2">
            <div align="left">
              <input name="muestra" type="text" id="muestra" value="<?php echo $muestra;?>" size="50" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            </div>            <div align="center"></div></td>
        </tr>
        
        <tr>
          <td width="127" rowspan="4"><div align="center">Examen Fisico</div></td>
          <td width="60"><div align="right">Color</div></td>
          <td colspan="2"><div align="left">
              <select name="color[]" id="color[]">
                <optgroup label="SELECCIONADA"> </optgroup>
                <option value="<?php echo $color;?>" selected><?php echo $color;?></option>
                </optgroup>
                <option value="Amarillo">Amarillo</option>
                <option value="Amarillo Ambar">Amarillo Ambar</option>
                <option value="Amarillo Claro">Amarillo Claro</option>
                <option value="Amarillo Rojizo">Amarillo Rojizo</option>
                <option value="Amarillo Pardo">Amarillo Pardo</option>
                <option value="Amarillo Verdoso">Amarillo Verdoso</option>
		 <option value="Azul">Azul</option>
              </select>
          </div></td>
        </tr>
        <tr>
          <td><div align="right">Aspecto</div></td>
          <td colspan="2"><div align="left">
              <select name="aspecto[]" id="aspecto[]">
                <optgroup label="SELECCIONADA"> </optgroup>
                <option value="<?php echo $aspecto;?>" selected><?php echo $aspecto;?></option>
                </optgroup>
                <option value="L&iacute;mpido" >L&iacute;mpido</option>
                <option value="Lig. Opalescente">Lig. Opalescente</option>
                <option value="Opalescente">Opalescente</option>
                <option value="Turbio">Turbio</option>
              </select>
          </div></td>
        </tr>
        <tr>
          <td><div align="right">Sedimento</div></td>
          <td colspan="2"><div align="left">
              <select name="sedimento[]" id="select">
                <optgroup label="SELECCIONADA"> </optgroup>
                <option value="<?php echo $sedimento;?>" selected><?php echo $sedimento;?></option>
                <option value="Escaso" >Escaso</option>
                <option value="Discreto">Discreto</option>
                <option value="Moderado">Moderado</option>
                <option value="Abundante">Abundante</option>
              </select>
          </div></td>
        </tr>
        <tr>
          <td><div align="right">Reacci&oacute;n</div></td>
          <td colspan="2"><div align="left">
              <select name="reaccion[]" id="reaccion[]">
                <optgroup label="SELECCIONADA"> </optgroup>
                <option value="<?php echo $reaccion;?>" selected><?php echo $reaccion;?></option>
                <option value="Acida" >Acida</option>
                <option value="Neutra">Neutra</option>
                <option value="Alcalina">Alcalina</option>
              </select>
          </div></td>
        </tr>

     <tr>
          <td><div align="right">Densidad</div></td>
          <td colspan="2"><div align="left">
               <input name="densidad" type="text" id="densidad" value="<?php echo $densidad;?>" size="50" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
             </div></td>
        </tr>



        <tr>
          <td colspan="2"><div align="right">Directo </div></td>
          <td colspan="2"><input name="en_fresco" type="text" id="en_fresco"   tabindex = "1" value="<?php echo $en_fresco;?>" size="80"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><input name="en_fresco1" type="text" id="en_fresco1"   tabindex = "1" value="<?php echo $en_fresco1;?>" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Coloracion de Gram-Nicolle </div></td>
          <td colspan="2">
              <div align="left">
                <input name="gramm" type="text" id="gramm"   tabindex = "1" value="<?php echo $gramm;?>" size="80">
                .            </div>            <div align="center"></div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Cultivo</div></td>
          <td colspan="2"><input name="cultivo" type="text" id="cultivo"   tabindex = "1" value="<?php echo $cultivo;?>" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Recuento</div></td>
          <td colspan="2"><div align="left">
            <input name="recuento" type="text" id="recuento" value="10" size="10" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          U.F.C / ml. Potencia 
          <input name="potencia" type="text" id="potencia" value="<?php echo $potencia;?>" size="10" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          </div></td>
        </tr>
        <tr>
          <td colspan="4"><div align="center">Antibiograma</div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Sensible a:</td>
          <td>Resistente a: </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name='sensible1[]' size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $sensible1;?>" selected="selected"><?php echo $sensible1;?></option>
            </optgroup>
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
echo "<select name=resistente1[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $resistente1;?>" selected="selected"><?php echo $resistente1;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
            <option value="<?php echo $sensible2;?>" selected="selected"><?php echo $sensible2;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=resistente2[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $resistente2;?>" selected="selected"><?php echo $resistente2;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
            <option value="<?php echo $sensible3;?>" selected="selected"><?php echo $sensible3;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=resistente3[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $resistente3;?>" selected="selected"><?php echo $resistente3;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
echo "<select name=sensible4[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $sensible4;?>" selected="selected"><?php echo $sensible4;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
            <option value="<?php echo $resistente4;?>" selected="selected"><?php echo $resistente4;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
echo "<select name=sensible5[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $sensible5;?>" selected="selected"><?php echo $sensible5;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
            <option value="<?php echo $resistente5;?>" selected="selected"><?php echo $resistente5;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
echo "<select name=sensible6[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $sensible6;?>" selected="selected"><?php echo $sensible6;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
            <option value="<?php echo $resistente6;?>" selected="selected"><?php echo $resistente6;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
echo "<select name=med_sensible1[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $med_sensible1;?>" selected="selected"><?php echo $med_sensible1;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
            <option value="<?php echo $med_sensible4;?>" selected="selected"><?php echo $med_sensible4;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
            <option value="<?php echo $med_sensible2;?>" selected="selected"><?php echo $med_sensible2;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
            <option value="<?php echo $med_sensible5;?>" selected="selected"><?php echo $med_sensible5;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right"></div></td>
          <td width="294"><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=med_sensible3[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $med_sensible3;?>" selected="selected"><?php echo $med_sensible3;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
          <td width="251"><?php 
$sql = "SELECT * FROM antibioticos";
$result = $db->Execute($sql);
echo "<select name=med_sensible6[] size=1 id =sensible1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $med_sensible6;?>" selected="selected"><?php echo $med_sensible6;?></option>
            </optgroup>
          <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["antibiotico"];
 
echo"<option value=$antibiotico>$antibiotico</option>";
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
      
    

   <div align="center"></div>
