<?php 
$bande_variables = 1;
include ("variables_convenio.php");

?>
<script language="javascript">


function on_load()
{
document.getElementById("tipo").focus();
}



function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "tipo":
				document.getElementById("dia").focus();
				
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("año").focus();
				break;
				case "año":
				document.getElementById("dia_2").focus();
				break;

				case "dia_2":
				document.getElementById("mes_2").focus();
				break;
				case "mes_2":
				document.getElementById("año_2").focus();
				break;
				case "año_2":
				document.getElementById("modalidad").focus();
				break;





				case "modalidad":
				document.getElementById("ug").focus();
				break;
				case "ug":
				document.getElementById("uh").focus();
				break;
				case "uh":
				document.getElementById("material_descartable").focus();
				break;
				case "material_descartable":
				document.getElementById("toma_muestra").focus();
				break;
				case "toma_muestra":
				document.getElementById("separacion").focus();
				break;
												
				case "separacion":
				document.getElementById("coseguro").focus();
				break;

				case "coseguro":
				document.getElementById("valor_porcentaje").focus();
				break;
				case "valor_porcentaje":
				document.getElementById("gastos").focus();
				break;
				case "gastos":
				document.getElementById("honorarios").focus();
				break;
				case "honorarios":
				document.getElementById("post_factura").focus();
				break;
				case "post_factura":
				document.getElementById("prorrateo").focus();
				break;
				case "prorrateo":
				document.getElementById("cuota").focus();
				break;
				case "cuota":
				document.getElementById("porcentaje").focus();
				break;
				case "porcentaje":
				document.getElementById("porcentaje_cuota").focus();
				break;
				case "porcentaje_cuota":
				document.getElementById("dia_3").focus();
				break;
				case "dia_3":
				document.getElementById("mes_3").focus();
				break;
				case "mes_3":
				document.getElementById("año_3").focus();
				break;
				case "año_3":
				document.getElementById("antiguedad").focus();
				break;
				case "antiguedad":
				document.getElementById("interes").focus();
				break;
				
				case "interes":
				document.getElementById("plan").focus();
				break;
						



				
		}
		return false;
	}
	return true;
}


</script>

<?php 
include ("../../../conexiones/config_pr.php");
 $sql="select cod_practica, practica, honorarios, gastos, valor, categoria from convenio_practica  where nro_os = '$nro_os' and cod_practica = '475' or nro_os = '$nro_os' and cod_practica = '65' or nro_os = '$nro_os' and cod_practica = '63' or nro_os = '$nro_os' and cod_practica = '902' or nro_os = '$nro_os' and cod_practica = '105' or nro_os = '$nro_os' and cod_practica = '711' or nro_os = '$nro_os' and cod_practica = '174' or nro_os = '$nro_os' and cod_practica = '001' or nro_os = '$nro_os' and cod_practica = '677' or nro_os = '$nro_os' and cod_practica = '998' order by cod_practica";
$result = $db->Execute($sql);

?>
<BODY onload = "on_load()">

<form action="modificar_convenios.php" method="post">
  <table width="103%"  border="0">
    <tr bgcolor="#FFFFFF">
      <td colspan="6"><div align="center"><font color="#000099"><strong><font color="#000000">OBRA SOCIAL: </font></strong></font><strong><font size="3" face="Arial, Helvetica, sans-serif"><?php echo $sigla." (".$nro_os.")"." - ".$denominacion;?></font></strong></div></td>
    </tr>
	<input type="hidden" name="nro_os" value = "<?php echo $nro_os;?>">
    <tr bgcolor="#FFFFFF">
    <td colspan="2"><div align="right">Nomenclador: </div></td>
    <td colspan="4"><strong><?php echo $nomenclador;?></strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6"><hr noshade></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><div align="center"><font color="#000000"><strong>Practicas Comunes </strong>: </font></div></td>
      <td><div align="right"><font color="#000000">Modalidad</font></div></td>
      <td colspan="4"><font color="#000000"><strong><?php print("$modalida");?> </strong> </font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="right"><font color="#000000">Unidad de Gastos: </font></div></td>
      <td colspan="4"><font color="#000000"><strong><?php echo $ug;?> </strong> </font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="right"><font color="#000000">Unidad de Bioquimicos: </font></div></td>
      <td colspan="4"><font color="#000000">
<strong><?php echo $uh;?></strong></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6"><hr noshade></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="36%"><div align="center"><font color="#000000"> <strong>Practicas Especiales</strong>: </font></div></td>
      <td width="15%"><div align="right"><font color="#000000">Modalidad</font></div></td>
      <td colspan="4"><font color="#000000"><strong><?php print("$modalida_especiales");?> </strong></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="right"><font color="#000000">Unidad de Gastos: </font></div></td>
      <td colspan="4"><font color="#000000"><strong><?php echo $ug_especiales;?> </strong> </font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="right"><font color="#000000">Unidad de Bioquimicos: </font></div></td>
      <td colspan="4"><font color="#000000"> <strong><?php echo $uh_especiales;?></strong></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6"><hr noshade></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><div align="center"><font color="#000000"><strong>Alta Complejidad</strong> : </font></div></td>
      <td><div align="right"><font color="#000000">Modalidad</font></div></td>
      <td colspan="4"><font color="#000000"><strong><?php print("$modalida_alta");?> </strong></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="right"><font color="#000000">Unidad de Gastos: </font></div></td>
      <td colspan="4"><font color="#000000"><strong><?php echo $ug_alta;?> </strong> </font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="right"><font color="#000000">Unidad de Bioquimicos: </font></div></td>
      <td colspan="4"><font color="#000000"> <strong><?php echo $uh_alta;?></strong></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6"><hr noshade></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="right"><font color="#000000">Mat. Desc.</font> 677 por: </div></td>
      <td colspan="4"><font color="#000000"><strong><?php print("$mat");?></strong> </font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="right"><font color="#000000">Toma-Muestra</font><font color="#000000"></font>. 998 por:</div></td>
      <td colspan="4"><font color="#000000"><strong><?php print("$tom");?>
</strong> </font></td>
    </tr>

<tr bgcolor="#FFFFFF">
<td colspan="2"><div align="right"><font color="#000000">Acto Bioquimico</font>. 001: </div></td>
<td colspan="4"><font color="#000000"><strong><?php print("$acto_bioquimico");?> </strong></font></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td colspan="6"><hr noshade></td>
  </tr>
<tr bgcolor="#FFFFFF">
  <td colspan="6">&nbsp;</td>
  </tr>
<tr bgcolor="#FFFFFF">
  <td colspan="2"><div align="center">Practica</div></td>
    <td width="14%"><div align="center">U. Gastos </div></td>
  <td width="11%"><div align="center">U. Bioquimica </div></td>
  <td width="18%"><div align="center">Valor</div></td>
  <td width="18%"><div align="center">Categoria</div></td>

  </tr>
<tr bgcolor="#FFFFFF">
  <td height="28" colspan="6"><hr noshade></td>
  </tr>

<?php 
 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$practica=strtoupper($result->fields["practica"]);
$cod_practica=strtoupper($result->fields["cod_practica"]);
$honorarios=number_format($result->fields["honorarios"],2);
$gastos=number_format($result->fields["gastos"],2);
$valor=number_format($result->fields["valor"],2);
$categoria=$result->fields["categoria"];


?>


<tr bgcolor="#FFFFFF">
  <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif"><?php echo $cod_practica." - ".$practica;?></font></td>
  <td><div align="center"><font face="Arial, Helvetica, sans-serif"><?php echo $honorarios?></font></div>
    <div align="center"></div></td>
  <td><div align="center"><?php echo $gastos?></div></td>

<?php  switch ($categoria){
	case "1":{

		$categori= "Comunes";
		include ("modalidad_comunes.php");

		BREAK;
	}

		case "2":{
		$categori= "Especiales";			
		include ("modalidad_especiales.php");

		BREAK;
	}

		case "3":{
		
				$categori= "A. Compl";
				include ("modalidad_alta.php");

		BREAK;
	}

}



?>

  <td width="2%"><div align="center"><strong><?php echo ($categori)?></strong></div></td>
</tr>

<?php 
$result->MoveNext();
	}
?>
  </table>
  <font color="#000099">  </font>
</form>

