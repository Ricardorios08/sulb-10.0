<?php 
if ($buscar_por == 5){
		include ("practicas_convenidas_modif.php");
exit;
	}
?>
<a href="..//auditoria/imprimir.php?nro_os=<?php print("$nro_os");?>&&buscar_por=5&&a_imp=SI"><IMG SRC="../../imagenes/botones//btn_imprimir.gif" alt="Imprimir" border = "0"></a>
<a href="..//auditoria/imprimir.php?nro_os=<?php print("$nro_os");?>&&buscar_por=5&&a_imp=NO"><IMG SRC="../../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a>
<br>

<?php 

include ("../../conexiones/config_os.php");
?>
<font color="#FF0000"><strong>
Nro_os:  
<font color="#000000">
<?php 
echo $nro_os;
?>
</strong></font>
<br>
<font color="#FF0000"><strong>
Nombre de OS: 
</strong></font>
<font color="#000000"><strong>
<?php 
	
include ("../facturacion/convenio.php");

	$sql1="select * from datos_os  where  nro_os like '$nro_os'";
	$result = $db->Execute($sql1);


$sigla =strtoupper($result->fields["sigla"]);
echo $sigla;
echo "<br>";
echo "Unidad de Gastos: (".$vug1.") = ".number_format($vug,3);
echo "<br>";
echo "Unidad de Bioquimicos: (".$vuh1.") = ".number_format($vuh,3);

include ("../../conexiones/config_pr.php");


		if ($palabra == ""){
$sql="select * from convenio_practica where nro_os = '$nro_os' and categoria = 1 order by cod_practica $orden";
		}
else
		{
$sql="select * from convenio_practica where nro_os = '$nro_os' and categoria = 1 and cod_practica like '%$palabra' order by cod_practica $orden";
}

	

$result = $db->Execute($sql);




?>
</strong></font>
<table width="88%" height="58" border="0">
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 

    <td width="4%" bgcolor="#E1F2EF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nº </font></font></div></td>
    <td width="14%" bgcolor="#E1F2EF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">PRACTICA</font></font></div></td>


	
	<td width="5%" bgcolor="#E1F2EF"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="8%" bgcolor="#E1F2EF"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td>
	<td width="8%" bgcolor="#E1F2EF"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td>


 

    <td width="6%" bgcolor="#E1F2EF"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">TOMA</font></div></td>
	

    <td width="5%" bgcolor="#E1F2EF"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">FINAL</font></div></td>

<td width="9%" bgcolor="#E1F2EF"><div align="center"><font color="#000000"
	 size="2" face="Arial, Helvetica, sans-serif">MAT/DESC</font></div></td>
<td width="9%" bgcolor="#E1F2EF"><div align="center"><font color="#000000"
	 size="2" face="Arial, Helvetica, sans-serif">AUTORIZ.</font></div></td>
    <td width="7%" bgcolor="#E1F2EF"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">CATEG.</font></div></td>
		     
	 
<?php 



  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_practica=strtoupper($result->fields["cod_practica"]);

if ($cod_practica == 0){
$result->MoveNext();
}
else
	  {

$practica=strtoupper($result->fields["practica"]);
$categoria=strtoupper($result->fields["categoria"]);

switch ($categoria){
	case "1":{
		$categoria = "COMUNES";
		BREAK;
	}

		case "2":{
		$categoria = "ESPECIALES";
		BREAK;
	}

		case "3":{
		$categoria = "A. COMPL.";
		BREAK;
	}

}


$honorarios=number_format($result->fields["honorarios"],2);
$gastos=number_format($result->fields["gastos"],2);
$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];
$valor=number_format($result->fields["valor"],2);
$autorizar=$result->fields["autorizada"];





	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$cod_practica");?></font></div></td>
    <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$practica");?></font></div></td>


<?php 
switch ($categoria){
	case "COMUNES":{
		
		?>    <td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"> - </font></div></td>
	<td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><?php echo number_format($honorarios,2);?></font></div></td>	
	<td><div align="right"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($valor,2);?></strong></font><font size="1" face="Arial, Helvetica, sans-serif">-</font></div></td>	


<?php 
switch ($modalidad){

case 1: //practicas comunes
	{

 $valor = ($honorarios * $vuh);

$valor_toma = ($honorarios1 * $vuh);

if ($toma == "SI"){
$valor_final = $valor + $valor_toma;
}
break;
	}


case 2:
	{
		 if (($gastos == 0) && ($honorarios == 0))
					{
$valor = $valor;

					}
				else
					{
$valor = ($valor) + (($vuh * $honorarios) + ($vug * $gastos));
$valor_toma = ($valor_toma) + (($vuh * $honorarios1) + ($vug * $gastos1));
if ($toma == "SI"){
$valor_final = $valor + $valor_toma;
}}

break;
					}

					case 3:
{

if ($toma == "SI"){
$valor_final = $valor + $valor11;
$valor_toma = $valor11;
}else{
$valor_final = $valor;
}
break;
}
	}

?>
		<td><div align="right"><font color="#336600" size="1" face="Arial, Helvetica, sans-serif"><strong>$ <?php echo number_format($valor_toma,2);?></strong></font><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$toma");?></font><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"></font></div></td>	
		
								
		<td><div align="right"><font color="#0033FF" size="1" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($valor_final,2);?></strong></font><font color="#336600" size="1" face="Arial, Helvetica, sans-serif"></font></div></td>	

		<td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$material_descartable");?></font><font color="#FF9900" size="1" face="Arial, Helvetica, sans-serif"></font></div></td>	


		<td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$autorizacion");?></font><font color="#0033FF" size="1" face="Arial, Helvetica, sans-serif"></font></div></td>	

		<td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$categoria");?></font></div></td>
<?php 

		
		BREAK;
	}

		case "ESPECIALES":{
			
		switch ($modalidad){

case 1: //practicas comunes
	{

$valor = ($honorarios * $vuh_especiales);
$valor_toma = ($honorarios1 * $vuh_especiales);
if ($toma == "SI"){
$valor_final = $valor + $valor_toma;
}
break;
	}


case 2:
	{
		 if (($gastos == 0) && ($honorarios == 0))
					{
$valor = $valor;

					}
				else
					{
$valor = ($valor) + (($vuh_especiales * $honorarios) + ($vug_especiales * $gastos));
$valor_toma = ($valor_toma) + (($vuh_especiales * $honorarios1) + ($vug_especiales * $gastos1));
if ($toma == "SI"){
$valor_final = $valor + $valor_toma;
}else{
$valor_final = $valor;
}


					}

break;
					}

					case 3:
{

if ($toma == "SI"){
$valor_final = $valor + $valor11;
$valor_toma = $valor11;
}else{
$valor_final = $valor;
}
break;
}
	}

?>
		<td><div align="right"><font color="#336600" size="1" face="Arial, Helvetica, sans-serif"><strong>$ <?php echo number_format($valor_toma,2);?></strong></font><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$toma");?></font><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"></font></div></td>	
		
								
		<td><div align="right"><font color="#0033FF" size="1" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($valor_final,2);?></strong></font><font color="#336600" size="1" face="Arial, Helvetica, sans-serif"></font></div></td>	

		<td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$material_descartable");?></font><font color="#FF9900" size="1" face="Arial, Helvetica, sans-serif"></font></div></td>	


		<td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$autorizacion");?></font><font color="#0033FF" size="1" face="Arial, Helvetica, sans-serif"></font></div></td>	

		<td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$categoria");?></font></div></td>
<?php 

		
		BREAK;
		}

	}
		BREAK;
	}

		case "A. COMPL.":{
		
		include ("modalidad_alta.php");
		BREAK;
	}

}





?>







    <?php }

$result->MoveNext();
	}
  }
?>
</table>
