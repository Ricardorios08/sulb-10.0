<script language="javascript">
function on_load()
{
document.getElementById("resultado1").focus();
document.getElementById("resultado1").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "resultado1":
				document.getElementById("clase_1").focus();
				document.getElementById("clase_1").select();
				break;
				
				case "clase_1":
				document.getElementById("nivel_1").focus();
				document.getElementById("nivel_1").select();
				break;

				case "nivel_1":
				document.getElementById("resultado2").focus();
				document.getElementById("resultado2").select();
				break;

				case "resultado2":
				document.getElementById("clase_2").focus();
				document.getElementById("clase_2").select();
				break;

				case "clase_2":
				document.getElementById("nivel_2").focus();
				document.getElementById("nivel_2").select();
				break;
				
				case "nivel_2":
				document.getElementById("resultado3").focus();
				document.getElementById("resultado3").select();
				break;

			

				case "resultado3":
				document.getElementById("clase_3").focus();
				document.getElementById("clase_3").select();
				break;

				case "clase_3":
				document.getElementById("nivel_3").focus();
				document.getElementById("nivel_3").select();
				break;
				
				case "nivel_3":
				document.getElementById("resultado4").focus();
				document.getElementById("resultado4").select();
				break;


				case "resultado4":
				document.getElementById("clase_4").focus();
				document.getElementById("clase_4").select();
				break;

				case "clase_4":
				document.getElementById("nivel_4").focus();
				document.getElementById("nivel_4").select();
				break;
				
				case "nivel_4":
				document.getElementById("observaciones").focus();
				document.getElementById("observaciones").select();
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
	font-size: 24px;
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


 $sql11="select * from `detalle_rast` where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$clase_1=$result11->fields["clase_1"];
$clase_2=$result11->fields["clase_2"];
$clase_3=$result11->fields["clase_3"];
$clase_4=$result11->fields["clase_4"];

$nivel_1=$result11->fields["nivel_1"];
$nivel_2=$result11->fields["nivel_2"];
$nivel_3=$result11->fields["nivel_3"];
$nivel_4=$result11->fields["nivel_4"];

$rast1=$result11->fields["rast1"];
$rast2=$result11->fields["rast2"];
$rast3=$result11->fields["rast3"];
$rast4=$result11->fields["rast4"];

$resultado1=$result11->fields["resultado1"];
$resultado2=$result11->fields["resultado2"];
$resultado3=$result11->fields["resultado3"];
$resultado4=$result11->fields["resultado4"];

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
          <td width="1480" colspan="2" bgcolor="#B8B8B8"><div align="center"><span class="Estilo1">RAST</span></div></td>
        </tr>
</table>
      <table width="750" border="0" cellspacing="0">
        
        <tr>
          <td bgcolor="#F0F0F0"><div align="right">ALERGENO:</div></td>
          <td colspan="5" bgcolor="#F0F0F0"><?php 
$sql = "SELECT * FROM rast";
$result = $db->Execute($sql);
echo "<select name='rast1[]' size=1 id =rast1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $rast1;?>" selected="selected"><?php echo $rast1;?></option>
            <?php

echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$rast=$result->fields["rast"];
 
echo"<option value='$rast'>$rast</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td width="232" bgcolor="#F0F0F0"><div align="right">VALOR HALLADO:</div></td>
          <td colspan="5" bgcolor="#F0F0F0"><input name="resultado1" type="text" id="resultado1" onKeyPress='return verif_caracter(this,event)' value="<?php echo $resultado1;?> " size="4">            CLASE:
          <input name="clase_1" type="text" id="clase_1" value="<?php echo $clase_1;?>" size="4" onKeyPress='return verif_caracter(this,event)'>
          NIVEL: 
          <input name="nivel_1" type="text" id="nivel_1" value="<?php echo $nivel_1;?>" size="4" onKeyPress='return verif_caracter(this,event)'>
          <div align="right"></div>          <div align="right"></div>          </td>
        </tr>
        <tr>
          <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="right">ALERGENO:</div></td>
          <td colspan="5" bgcolor="#F0F0F0">:
            <?php 
$sql = "SELECT * FROM rast";
$result = $db->Execute($sql);
echo "<select name=rast2[] size=1 id =rast1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $rast2;?>" selected="selected"><?php echo $rast2;?></option>
            </optgroup>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$rast=$result->fields["rast"];
 
echo"<option value=$rast>$rast</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="right">VALOR HALLADO: </div></td>
          <td colspan="5" bgcolor="#F0F0F0"><input name="resultado2" type="text" id="resultado2" value="<?php echo $resultado2;?>" onKeyPress='return verif_caracter(this,event)' size="4">
          CLASE:
            <input name="clase_2" type="text" id="clase_2" value="<?php echo $clase_2;?>" size="4" onKeyPress='return verif_caracter(this,event)'>
            NIVEL:<input name="nivel_2" type="text" id="nivel_2" value="<?php echo $nivel_2;?>" size="4" onKeyPress='return verif_caracter(this,event)'></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td width="435" colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="right">ALERGENO</div></td>
          <td colspan="5" bgcolor="#F0F0F0">:
            <?php 
$sql = "SELECT * FROM rast";
$result = $db->Execute($sql);
echo "<select name=rast3[] size=1 id =rast1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $rast3;?>" selected="selected"><?php echo $rast3;?></option>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$rast=$result->fields["rast"];
 
echo"<option value=$rast>$rast</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="right">VALOR HALLADO:</div></td>
          <td colspan="5" bgcolor="#F0F0F0"><input name="resultado3" type="text" id="resultado3" value="<?php echo $resultado3;?>" onKeyPress='return verif_caracter(this,event)' size="4">
              CLASE:
              <input name="clase_3" type="text" id="clase_3" value="<?php echo $clase_3;?>" size="4" onKeyPress='return verif_caracter(this,event)'>
              NIVEL:<input name="nivel_3" type="text" id="nivel_3" value="<?php echo $nivel_3;?>" size="4" onKeyPress='return verif_caracter(this,event)'></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="right">ALERGENO</div></td>
          <td colspan="5" bgcolor="#F0F0F0"><?php 
$sql = "SELECT * FROM rast";
$result = $db->Execute($sql);
echo "<select name=rast4[] size=1 id =rast1 onKeyPress='return verif_caracter(this,event)'>";
?>
            <optgroup label="SELECCIONADA">
            </optgroup>
            <option value="<?php echo $rast4;?>" selected="selected"><?php echo $rast4;?></option>
            </optgroup>
            <?php
echo"<option value='Vacio'>Vacio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$rast=$result->fields["rast"];
 
echo"<option value=$rast>$rast</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="right">VALOR HALLADO:</div></td>
          <td colspan="5" bgcolor="#F0F0F0"><input name="resultado4" type="text" id="resultado4" value="<?php echo $resultado4;?>" onKeyPress='return verif_caracter(this,event)' size="4">
          CLASE: 
          <input name="clase_4" type="text" id="clase_4" value="<?php echo $clase_4;?>" size="4" onKeyPress='return verif_caracter(this,event)'>           NIVEL:          
          <input name="nivel_4" type="text" id="nivel_4" value="<?php echo $nivel_4;?>" size="4" onKeyPress='return verif_caracter(this,event)'>
          <div align="right"></div></td>
        </tr>
        

        <tr>
          <td colspan="6">Notas:
          <input name="observaciones" type="text" id="observaciones"   tabindex = "1" value="<?php echo $observaciones;?> "  size="100"></td>
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
      
    
 
