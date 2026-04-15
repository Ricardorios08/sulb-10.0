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
				document.getElementById("celulas_epiteliales").focus();
				document.getElementById("celulas_epiteliales").select();
				break;

				case "celulas_epiteliales":
				document.getElementById("leucocitos").focus();
				document.getElementById("leucocitos").select();
				break;

				case "leucocitos":
				document.getElementById("piocitos").focus();
				document.getElementById("piocitos").select();
				break;

				case "piocitos":
				document.getElementById("elementos_hongos").focus();
				document.getElementById("elementos_hongos").select();
				break;

				case "elementos_hongos":
				document.getElementById("trichomonas_vaginalis").focus();
				document.getElementById("trichomonas_vaginalis").focus();
				break;


				case "trichomonas_vaginalis":
				document.getElementById("test_aminas").focus();
				document.getElementById("test_aminas").focus();
				break;

				case "test_aminas":
				document.getElementById("coloracion").focus();
				document.getElementById("coloracion").focus();
				break;

				case "coloracion":
				document.getElementById("cultivo").focus();
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


  $sql11="select * from detalle_vaginal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=$result11->fields["muestra"];
$celulas_epiteliales=$result11->fields["celulas_epiteliales"];
$leucocitos=$result11->fields["leucocitos"];
$piocitos=$result11->fields["piocitos"];
$elementos_hongos=$result11->fields["elementos_hongos"];
$trichomonas_vaginalis=$result11->fields["trichomonas_vaginalis"];
$test_aminas=$result11->fields["test_aminas"];
$coloracion=$result11->fields["coloracion"];
$cultivo=$result11->fields["cultivo"];
 
 



 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina>
<table width="850" border="0">
        <tr>
          <td height="34" colspan="4" bgcolor="#B8B8B8"><div align="center">FLUJO VAGINAL </div></td>
        </tr>
        
	 
        <tr>
          <td width="264" bgcolor="#F0F0F0"><div align="center">Flujo vaginal </div></td>
          <td width="476" colspan="3"><input name="muestra" type="text" id="muestra" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $muestra?>" size="100" maxlength="120"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Celulas epiteliales </div></td>
          <td colspan="3"><input name="celulas_epiteliales" type="text" id="celulas_epiteliales" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $celulas_epiteliales?>" size="100" maxlength="100"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Leucocitos</div></td>
          <td colspan="3"><input name="leucocitos" type="text" id="leucocitos" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $leucocitos?>" size="100" maxlength="100"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Piocitos</div></td>
          <td colspan="3"><input name="piocitos" type="text" id="piocitos" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $piocitos?>" size="100" maxlength="120"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Elementos de hongos </div></td>
          <td colspan="3"><input name="elementos_hongos" type="text" id="elementos_hongos" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $elementos_hongos?>" size="100" maxlength="120"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Trichomonas vaginalis </div></td>
          <td colspan="3"><input name="trichomonas_vaginalis" type="text" id="trichomonas_vaginalis" tabindex = "1"  value="<?php echo $trichomonas_vaginalis?>" size="100" maxlength="120" onKeyPress="return verif_caracter(this,event)"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Test de Aminas   </div></td>
          <td colspan="3"><input name="test_aminas" type="text" id="test_aminas" tabindex = "1"  value="<?php echo $test_aminas?>" size="100" maxlength="120" onKeyPress="return verif_caracter(this,event)"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Coloracion de Gram-Nicolle </div></td>
          <td colspan="3"><input name="coloracion" type="text" id="coloracion" tabindex = "1"  value="<?php echo $coloracion?>" size="100" maxlength="120" onKeyPress="return verif_caracter(this,event)"></td>
        </tr>
        <tr>
          <td bgcolor="#F0F0F0"><div align="center">Cultivo</div></td>
          <td colspan="3"><input name="cultivo" type="text" id="cultivo" tabindex = "1"  value="<?php echo $cultivo?>" size="100" maxlength="120"></td>
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
      
    

 
