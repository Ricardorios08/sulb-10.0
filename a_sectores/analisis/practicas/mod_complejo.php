<script language="javascript">
function on_load()
{
document.getElementById("valor1").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "valor1":
				document.getElementById("valor2").focus();
				document.getElementById("valor2").select();
				break;

				case "valor2":
				document.getElementById("valor3").focus();
				document.getElementById("valor3").select();
				break;
				
				case "valor3":
				document.getElementById("valor4").focus();
				document.getElementById("valor4").select();
				break;

				case "valor4":
				document.getElementById("valor5").focus();
				document.getElementById("valor5").select();
				break;

				case "valor5":
				document.getElementById("valor6").focus();
				document.getElementById("valor6").select();
				break;

				case "valor6":
				document.getElementById("valor7").focus();
				document.getElementById("valor7").select();
				break;

				case "valor7":
				document.getElementById("valor8").focus();
				document.getElementById("valor8").select();
				break;

				case "valor8":
				document.getElementById("valor9").focus();
				document.getElementById("valor9").select();
				break;

				case "valor9":
				document.getElementById("valor10").focus();
				document.getElementById("valor10").select();
				break;

				case "valor10":
				document.getElementById("valor11").focus();
				document.getElementById("valor11").select();
				break;

				case "valor11":
				document.getElementById("valor12").focus();
				document.getElementById("valor12").select();
				break;

				case "valor12":
				document.getElementById("valor13").focus();
				document.getElementById("valor13").select();
				break;

				case "valor13":
				document.getElementById("valor14").focus();
				document.getElementById("valor14").select();
				break;

				case "valor14":
				document.getElementById("valor15").focus();
				document.getElementById("valor15").select();
				break;

				case "valor15":
				document.getElementById("valor16").focus();
				document.getElementById("valor16").select();
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
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>

<?php 

include("../../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica= $_REQUEST['nro_practica'];
 $nro_paciente= $_REQUEST['nro_paciente'];



 $sql1="SELECT * FROM convenio_practica_complejo where cod_practica = $nro_practica";
$result13 = $db->Execute($sql1);

$renglon1=$result13->fields["renglon1"];
$renglon1_2=$result13->fields["renglon1_2"]; 
$renglon1_3=$result13->fields["renglon1_3"]; 	
$renglon1_4=$result13->fields["renglon1_4"]; 

$renglon2=$result13->fields["renglon2"];
$renglon2_2=$result13->fields["renglon2_2"]; 
$renglon2_3=$result13->fields["renglon2_3"]; 	
$renglon2_4=$result13->fields["renglon2_4"];

$renglon3=$result13->fields["renglon3"];
$renglon3_2=$result13->fields["renglon3_2"]; 
$renglon3_3=$result13->fields["renglon3_3"]; 	
$renglon3_4=$result13->fields["renglon3_4"];

$renglon4=$result13->fields["renglon4"];
$renglon4_2=$result13->fields["renglon4_2"]; 
$renglon4_3=$result13->fields["renglon4_3"]; 	
$renglon4_4=$result13->fields["renglon4_4"];

$renglon5=$result13->fields["renglon5"];
$renglon5_2=$result13->fields["renglon5_2"]; 
$renglon5_3=$result13->fields["renglon5_3"]; 	
$renglon5_4=$result13->fields["renglon5_4"];

$renglon6=$result13->fields["renglon6"];
$renglon6_2=$result13->fields["renglon6_2"]; 
$renglon6_3=$result13->fields["renglon6_3"]; 	
$renglon6_4=$result13->fields["renglon6_4"];

$renglon7=$result13->fields["renglon7"];
$renglon7_2=$result13->fields["renglon7_2"]; 
$renglon7_3=$result13->fields["renglon7_3"]; 	
$renglon7_4=$result13->fields["renglon7_4"];

$renglon8=$result13->fields["renglon8"];
$renglon8_2=$result13->fields["renglon8_2"]; 
$renglon8_3=$result13->fields["renglon8_3"]; 	
$renglon8_4=$result13->fields["renglon8_4"];

$renglon9=$result13->fields["renglon9"];
$renglon9_2=$result13->fields["renglon9_2"]; 
$renglon9_3=$result13->fields["renglon9_3"]; 	
$renglon9_4=$result13->fields["renglon9_4"];

$renglon10=$result13->fields["renglon10"];
$renglon10_2=$result13->fields["renglon10_2"]; 
$renglon10_3=$result13->fields["renglon10_3"]; 	
$renglon10_4=$result13->fields["renglon10_4"];

$renglon11=$result13->fields["renglon11"];
$renglon11_2=$result13->fields["renglon11_2"]; 
$renglon11_3=$result13->fields["renglon11_3"]; 	
$renglon11_4=$result13->fields["renglon11_4"];

$renglon12=$result13->fields["renglon12"];
$renglon12_2=$result13->fields["renglon12_2"]; 
$renglon12_3=$result13->fields["renglon12_3"]; 	
$renglon12_4=$result13->fields["renglon12_4"];

$renglon13=$result13->fields["renglon13"];
$renglon13_2=$result13->fields["renglon13_2"]; 
$renglon13_3=$result13->fields["renglon13_3"]; 	
$renglon13_4=$result13->fields["renglon13_4"];

$renglon14=$result13->fields["renglon14"];
$renglon14_2=$result13->fields["renglon14_2"]; 
$renglon14_3=$result13->fields["renglon14_3"]; 	
$renglon14_4=$result13->fields["renglon14_4"];

$renglon15=$result13->fields["renglon15"];
$renglon15_2=$result13->fields["renglon15_2"]; 
$renglon15_3=$result13->fields["renglon15_3"]; 	
$renglon15_4=$result13->fields["renglon15_4"];

$renglon16=$result13->fields["renglon16"];
$renglon16_2=$result13->fields["renglon16_2"]; 
$renglon16_3=$result13->fields["renglon16_3"]; 	
$renglon16_4=$result13->fields["renglon16_4"];
 




 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);


 $sql1="SELECT * FROM detalle_complejos where cod_grabacion = $cod_grabacion";
$result13 = $db->Execute($sql1);

$valor1=$result13->fields["valor1"];
$valor2=$result13->fields["valor2"];
$valor3=$result13->fields["valor3"];
$valor4=$result13->fields["valor4"];

$valor5=$result13->fields["valor5"];
$valor6=$result13->fields["valor6"];
$valor7=$result13->fields["valor7"];
$valor8=$result13->fields["valor8"];

$valor9=$result13->fields["valor9"];
$valor10=$result13->fields["valor10"];
$valor11=$result13->fields["valor11"];
$valor12=$result13->fields["valor12"];

$valor13=$result13->fields["valor13"];
$valor14=$result13->fields["valor14"];
$valor15=$result13->fields["valor15"];
$valor16=$result13->fields["valor16"];



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_complejos.php" METHOD = "POST">

<H1 class=SaltoDePagina>
<table width="850" border="0" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
  <!--DWLayoutTable-->
  <tr align="center">
    <td colspan="6"><strong>CARGAR RESULTADOS </strong></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" colspan="6" bgcolor="#C0C0C0"><div align="left" class="Estilo3"><?php echo $cod_practica;?> - <?php echo $practica;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 1 </td>
    <td width="300" valign="top"><div align="left"><?php echo $renglon1;?></div></td>
    <td width="189" valign="top"><?php if ($renglon1_4 != 4){?>
      <input name="valor1" type="text" id="valor1" size="20" value = "<?php echo $valor1;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td width="39" valign="top"><?php echo $renglon1_2;?></td>
    <td width="284" valign="top"><div align="left"><?php echo $renglon1_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td width="38" height="24" bgcolor="#C0C0C0"> 2 </td>
    <td valign="top"><div align="left"><?php echo $renglon2;?></div></td>
    <td valign="top"><?php if ($renglon2_4 != 4){?><input name="valor2" type="text" id="valor2" size="20" value = "<?php echo $valor2;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon2_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon2_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 3 </td>
    <td valign="top"><div align="left"><?php echo $renglon3;?></div></td>
    <td valign="top"><?php if ($renglon3_4 != 4){?><input name="valor3" type="text" id="valor3" size="20" value = "<?php echo $valor3;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon3_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon3_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 4 </td>
    <td valign="top"><div align="left"><?php echo $renglon4;?></div></td>
    <td valign="top"><?php if ($renglon4_4 != 4){?><input name="valor4" type="text" id="valor4" size="20" value = "<?php echo $valor4;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon4_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon4_3;?></div></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 5 </td>
    <td valign="top"><div align="left"><?php echo $renglon5;?></div></td>
    <td valign="top"><?php if ($renglon5_4 != 4){?><input name="valor5" type="text" id="valor5" size="20" value = "<?php echo $valor5;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon5_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon5_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 6 </td>
    <td valign="top"><div align="left"><?php echo $renglon6;?></div></td>
    <td valign="top"><?php if ($renglon6_4 != 4){?><input name="valor6" type="text" id="valor6" size="20" value = "<?php echo $valor6;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon6_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon6_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 7 </td>
    <td valign="top"><div align="left"><?php echo $renglon7;?></div></td>
    <td valign="top"><?php if ($renglon7_4 != 4){?><input name="valor7" type="text" id="valor7" size="20" value = "<?php echo $valor7;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon7_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon7_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 8 </td>
    <td valign="top"><div align="left"><?php echo $renglon8;?></div></td>
    <td valign="top"><?php if ($renglon8_4 != 4){?><input name="valor8" type="text" id="valor8" size="20" value = "<?php echo $valor8;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon8_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon8_3;?></div></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 9 </td>
    <td valign="top"><div align="left"><?php echo $renglon9;?></div></td>
    <td valign="top"><?php if ($renglon9_4 != 4){?><input name="valor9" type="text" id="valor9" size="20" value = "<?php echo $valor9;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon9_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon9_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 10 </td>
    <td valign="top"><div align="left"><?php echo $renglon10;?></div></td>
    <td valign="top"><?php if ($renglon10_4 != 4){?><input name="valor10" type="text" id="valor10" size="20" value = "<?php echo $valor10;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon10_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon10_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 11 </td>
    <td valign="top"><div align="left"><?php echo $renglon11;?></div></td>
    <td valign="top"><?php if ($renglon11_4 != 4){?><input name="valor11" type="text" id="valor11" size="20" value = "<?php echo $valor11;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon11_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon11_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 12 </td>
    <td valign="top"><div align="left"><?php echo $renglon12;?></div></td>
    <td valign="top"><?php if ($renglon12_4 != 4){?><input name="valor12" type="text" id="valor12" size="20" value = "<?php echo $valor12;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon12_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon12_3;?></div></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 13 </td>
    <td valign="top"><div align="left"><?php echo $renglon13;?></div></td>
    <td valign="top"><?php if ($renglon13_4 != 4){?><input name="valor13" type="text" id="valor13" size="20" value = "<?php echo $valor13;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon13_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon13_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 14 </td>
    <td valign="top"><div align="left"><?php echo $renglon14;?></div></td>
    <td valign="top"><?php if ($renglon14_4 != 4){?><input name="valor14" type="text" id="valor14" size="20" value = "<?php echo $valor14;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon14_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon14_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 15 </td>
    <td valign="top"><div align="left"><?php echo $renglon15;?></div></td>
    <td valign="top"><?php if ($renglon15_4 != 4){?><input name="valor15" type="text" id="valor15" size="20" value = "<?php echo $valor15;?>" onkeypress="return verif_caracter(this,event)"><?php }?></td>
    <td valign="top"><?php echo $renglon15_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon15_3;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 16 </td>
    <td valign="top"><div align="left"><?php echo $renglon16;?></div></td>
    <td valign="top"><?php if ($renglon16_4 != 4){?><input name="valor16" type="text" id="valor16" size="20" value = "<?php echo $valor16;?>"><?php }?></td>
    <td valign="top"><?php echo $renglon16_2;?></td>
    <td valign="top"><div align="left"><?php echo $renglon16_3;?></div></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" colspan="6" bgcolor="#C0C0C0"><input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
      <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
      <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
      <input type="hidden" name="cod_practica2" value="<?php echo $cod_practica;?>">
      <input type="submit" name="Submit2" value="OK">    </td>
  </tr>
</table>

</form>
      
    

 
