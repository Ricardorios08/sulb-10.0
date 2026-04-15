<?php 



switch ($modalidad){

case 1: //practicas comunes
	{

	?>    <td><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"> - </font></div></td>
	<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo number_format($honorarios,2);?></font></div></td>	


    
    <?php 


 $valor = round(($honorarios * $vuh),2);

$valor_toma = round(($honorarios1 * $vuh),2);

if ($toma == "SI"){
$valor_final = $valor + $valor_toma;

list($precio_entero1,$precio_decimal1) = explode(".",$valor_final);
if (strlen($precio_decimal1) == 1){
$precio_decimal1 = $precio_decimal1."0";
}
$valor_final = $precio_entero1.",".$precio_decimal1;

}

?>
		
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($valor,2);?></font></div></td>	
		
			
			
				
			<font color="#000000" size="2">
			<?php if (($toma_muestra != 1) && ($toma_muestra != 3)){
			if ($toma == "SI"){?>
		    </font>
		    
			<td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($valor_toma,2);?></font></div></td>	
            <font color="#000000" size="2">
            <?php }else{?>
		    </font>
            
            <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NO</font></div></td>	
            <font color="#000000" size="2">
            <?php }?>



		    </font>
            
            <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php echo number_format($valor_final,2);?></font></div></td>	
            <font color="#000000" size="2">
            <?php }
	break;
}

case 2:
	{
		 if (($gastos == 0) && ($honorarios == 0))
					{
$valor = $valor;
list($precio_entero1,$precio_decimal1) = explode(".",$valor);
if (strlen($precio_decimal1) == 1){
$precio_decimal1 = $precio_decimal1."0";
}
$valor = $precio_entero1.",".$precio_decimal1;


					}
				else
					{
$valor = round(($valor) + (($vuh * $honorarios) + ($vug * $gastos)),2);
$valor_toma = round(($valor_toma) + (($vuh * $honorarios1) + ($vug * $gastos1)),2);
if ($toma == "SI"){
$valor_final = $valor + $valor_toma;

list($precio_entero1,$precio_decimal1) = explode(".",$valor_final);
if (strlen($precio_decimal1) == 1){
$precio_decimal1 = $precio_decimal1."0";
}
$valor_final = $precio_entero1.",".$precio_decimal1;



}


					}
?>	    
            </font>
            
            <td><div align="right"><font color="#000000" size="2"class="Estilo30"><?php echo number_format($honorarios,2);?></font></div></td>
            <font color="#000000" size="2">
            <?php 
	?>    
            </font>
            
            <td><div align="right"><font color="#000000" size="2" class="Estilo30"><?php echo number_format($gastos,2);?></font></div></td>

	<td><div align="right"><font color="#000000" size="2" class="Estilo30">$ <?php echo number_format($valor,2);?></font></div></td>	

	
		<font color="#000000" size="2">
		<?php if (($toma_muestra != 1) && ($toma_muestra != 3)){
			if ($toma == "SI"){?>
		</font>
		
		<td><div align="right"><font color="#000000" size="2" class="Estilo30">$<?php echo number_format($valor_toma,2);?></font></div></td>	
        <font color="#000000" size="2">
        <?php }else{?>
		</font>
        
        <td><div align="right"><font color="#000000" size="2" class="Estilo30">NO</font></div></td>	
        <font color="#000000" size="2">
        <?php }?>



        </font>
        
        <td><div align="right"><font color="#000000" size="2" class="Estilo30">$<?php echo number_format($valor_final,2);?></font></div></td>	
        <font color="#000000" size="2">
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
	?>	 
        </font>
        
        <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> - </font></div></td>
	<td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> - </font></div></td> 
	<td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php ECHO "$ ".number_format($valor,2);?></font></div></td>
    <font color="#000000" size="2">
    <?php if (($toma_muestra != 1) && ($toma_muestra != 3)){
	if ($toma == "SI"){?>
    </font>
    
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($valor_toma,2);?></font></div></td>	
    <font color="#000000" size="2">
    <?php }else{?>
    </font>
    
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NO</font></div></td>	
    <font color="#000000" size="2">
    <?php }?>
	</font>
    
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php ECHO "$ ".number_format($valor_final,2);?></font></div></td>
    <font color="#000000" size="2">
    <?php }
break;
}
}
?>
    </font><font color="#000000" size="2">    </font>