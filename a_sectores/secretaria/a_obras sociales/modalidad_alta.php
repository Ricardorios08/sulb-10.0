<?php 

switch ($modalidad_alta){

case 1: //practicas comunes
	{
	?>   

	 <td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"> - </font></div></td>
	 <td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><?php echo number_format($honorarios,2);?></font></div></td>	

<?php $valor = ($honorarios * $vuh_alta);
$valor_toma = ($honorarios1 * $vuh_alta);

if ($toma == "SI"){
$valor_final = $valor + $valor_toma;
}else{
$valor_final = $valor;
}

?>
		<td><div align="right"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($valor,2);?></strong></font></div></td>	
	
			
			<?php if (($toma_muestra != 1) && ($toma_muestra != 3)){ 
				if ($toma == "SI"){?>
		<td><div align="right"><font color="#336600" size="1" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($valor_toma,2);?></strong></font></div></td>	
<?php }else{?>
		<td><div align="right"><font color="#FF9900" size="1" face="Arial, Helvetica, sans-serif"><strong>NO</strong></font></div></td>	
<?php }?>


		<td><div align="right"><font color="#0033FF" size="1" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($valor_final,2);?></strong></font></div></td>	
<?php }
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
 $valor = ($valor) + (($vuh_alta * $honorarios) + ($vug_alta * $gastos));
$valor_toma = ($valor_toma) + (($vuh_alta * $honorarios1) + ($vug_alta * $gastos1));

if ($toma == "SI"){
$valor_final = $valor + $valor_toma;
}else{
$valor_final = $valor;
}


					}
?>	    <td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><?php echo number_format($honorarios,2);?></font></div></td>
<?php 
	?>    <td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><?php echo number_format($gastos,2);?></font></div></td>

	<td><div align="right"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><strong>$ <?php echo number_format($valor,2);?></strong></font></div></td>	


<?php 	if (($toma_muestra != 1) && ($toma_muestra != 3)){
	if ($toma == "SI"){
?>
		<td><div align="right"><font color="#336600" size="1" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($valor_toma,2);?></strong></font></div></td>	
<?php }else{?>
		<td><div align="right"><font color="#FF9900" size="1" face="Arial, Helvetica, sans-serif"><strong>NO</strong></font></div></td>	
<?php }?>


			<td><div align="right"><font color="#0033FF" size="1" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($valor_final,2);?></strong></font></div></td>	
<?php }


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
	?>	 <td><div align="right"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><strong> - </strong></font></div></td>
	<td><div align="right"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><strong> - </strong></font></div></td> 
	<td><div align="right"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><strong><?php ECHO "$ ".number_format($valor,2);?></strong></font></div></td>

<?php 	if (($toma_muestra != 1) && ($toma_muestra != 3)){
		if ($toma == "SI"){?>

		<td><div align="right"><font color="#336600" size="1" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($valor_toma,2);?></strong></font></div></td>	
<?php }else{?>
		<td><div align="right"><font color="#FF9900" size="1" face="Arial, Helvetica, sans-serif"><strong>NO</strong></font></div></td>	
<?php }?>
	
	
	<td><div align="right"><font color="#0033FF" size="1" face="Arial, Helvetica, sans-serif"><strong><?php ECHO "$".number_format($valor_final,2);?></strong></font></div></td>
<?php }
break;
}
}
?>