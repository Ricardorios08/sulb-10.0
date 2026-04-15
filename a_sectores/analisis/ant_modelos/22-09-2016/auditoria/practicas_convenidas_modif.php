
<?php 
echo $usuario;

include ("../../conexiones/config_os.php");?>
<!-- <font color="#FF0000"><strong>Nro_os:  
<font color="#000000"><?php echo $nro_os;?></strong></font><br>
<font color="#FF0000"><strong>Nombre de OS: </strong></font><font color="#000000"><strong> -->


<?php 	include ("convenio2.php");

$sql1="select * from datos_os  where  nro_os like '$nro_os'";
	$result = $db->Execute($sql1);


$sigla =strtoupper($result->fields["sigla"]);
$sigla;


include ("../../conexiones/config_pr.php");
$sql1="select * from convenio_practica  where nro_os = '$nro_os' and cod_practica = '998'";
$result1 = $db->Execute($sql1);

 $honorarios1=$result1->fields["honorarios"];
$gastos1=$result1->fields["gastos"];
$valor11=$result1->fields["valor"];



/*$sql2="select honorarios, gastos, valor from convenio_practica where cod_practica = '677' and nro_os = '$nro_os'";
$result2 = $db->Execute($sq12);
 $honorarios_677=number_format($result2->fields["honorarios"],2);
$gastos_677=$result2->fields["gastos"];
$valor_677=number_format($result2->fields["valor"],2);
*/
include ("../../conexiones/config_pr.php");
if ($palabra==""){
$sql="select * from convenio_practica where nro_os = '$nro_os' order by cod_practica $orden";

}
else{
$sql="select * from convenio_practica  where (nro_os = '$nro_os' and cod_practica = '$palabra') or (nro_os = '$nro_os' and practica like '%$palabra%') order by cod_practica $orden";
}


$result = $db->Execute($sql);

?>
</strong></font>
<table width="114%" height="50" border="0">
  <tr bordercolor="#0066FF" bgcolor="#E8DCFC"> 

    <td width="3%" height="22"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
    <td width="22%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">PRACTICA</font></div></td>


<?php switch ($modalidad){

case 1:
	{

	?>	
	<td width="4%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td>
	<td width="7%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td>
	<?php 
	break;
}

case 2:
	{
	
?>	<td width="4%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td>
	<td width="4%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="6%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td><?php 


break;
}

case 3:
{?>
	<td width="4%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td>
	<td width="4%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="8%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td>
	<?php 
break;
}
}



if (($toma_muestra != 1) && ($toma_muestra != 3)){?>   

    <td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">TOMA</font></div></td>
	

	 <td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">FINAL</font></div></td>
<?php }?>
<!-- <td width="9%"><div align="center"><font color="#000000"
	 size="2" face="Arial, Helvetica, sans-serif">MAT/DESC</font></div></td>
<td width="9%"><div align="center"><font color="#000000"
	 size="2" face="Arial, Helvetica, sans-serif">AUTORIZ.</font></div></td> -->
		 <td width="6%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">CATEG.</font></div></td> 
		 <td width="6%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">MODIF.</font></div></td> 
		 <td width="7%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">BORRAR.</font></div></td>
		     
	 
<?php 
	
	if ($buscador_rapido =! 2){?>	
	<?php }?>
  </tr>
  <?php 
  if (!$result) die("faFllo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_practica=strtoupper($result->fields["cod_practica"]);

if ($cod_practica == 0){
$result->MoveNext();
}
else
	  {

//$sql2="select * from practica  where cod_practica = '$cod_practica'";
//$result2 = $db->Execute($sql2);

$practica=strtoupper($result->fields["practica"]);
$practica_ant=strtoupper($result->fields["practica"]);

$categoria=strtoupper($result->fields["categoria"]);
$categoria_ant=strtoupper($result->fields["categoria"]);

$honorarios=$result->fields["honorarios"];
$honorarios_ant=$result->fields["honorarios"];

$gastos=$result->fields["gastos"];
$gastos_ant=$result->fields["gastos"];

$toma=$result->fields["toma"];
$toma_ant=$result->fields["toma"];

$urgencia=$result->fields["urgencia"];
$urgencia_ant=$result->fields["urgencia"];

$material_descartable=$result->fields["material_descartable"];
$material_descartable_ant=$result->fields["material_descartable"];

$valor=$result->fields["valor"];
$valor_ant=$result->fields["valor"];



$autorizar=$result->fields["autorizada"];
$autorizada=$result->fields["autorizada"];
$autorizada_ant=$result->fields["autorizada"];

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




	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$cod_practica");?></font></div></td>
    <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$practica");?></font></div></td>



<?php 
	

switch ($categoria){
	case "COMUNES":{
		
		include ("modalidad_comunes.php");
		
		BREAK;
	}

		case "ESPECIALES":{
			
		include ("modalidad_especiales.php");
		BREAK;
	}

		case "A. COMPL.":{
		
		include ("modalidad_alta.php");
		BREAK;
	}

}



?>
	

<!-- <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$material_descartable");?></font></div></td>


	<td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$autorizar");?></font></div></td> -->
<td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$categoria");?></font></div></td>
	<td><font size="2"><a href="practicas/modificar_convenidas.php?id=<?php print("$cod_practica");?>&&nro_os=<?php echo $nro_os;?>&practica=<?php echo $practica;?>&obra=<?php echo $obr;?>&valor=<?php echo $valor34;?>&honorarios=<?php echo $honorarios;?>&gastos=<?php echo $gastos;?>&&categoria=<?php echo $categoria;?>&nro_categoria=<?php echo $nro_categoria;?>&&toma=<?php echo $toma;?>&&material_descartable=<?php echo $material_descartable;?>&&urgencia=<?php echo $urgencia;?>&&autorizada=<?php echo $autorizada;?>&&usuario=<?php echo $usuario;?>   &practica_ant=<?php echo $practica_ant;?>&valor_ant=<?php echo $valor_ant;?>&honorarios_ant=<?php echo $honorarios_ant;?>&gastos_ant=<?php echo $gastos_ant;?>&&categoria_ant=<?php echo $categoria_ant;?>&nro_categoria_ant=<?php echo $nro_categoria_ant;?>&&toma_ant=<?php echo $toma_ant;?>&&material_descartable_ant=<?php echo $material_descartable_ant;?>&&urgencia_ant=<?php echo $urgencia_ant;?>&&autorizada_ant=<?php echo $autorizada_ant;?>&&usuario=<?php echo $usuario;?>" target = "central">
<div align="center"><IMG SRC="../../imagenes/office//027.ico" alt="Ficha" border = "0"></div></td><td><div align="center"><font size="2">
<a href="practicas/borra_practica.php?id=<?php print("$cod_practica");?>&nro_os=<?php echo $nro_os;?>&practica=<?php echo $pract;?>&obra=<?php echo $obr;?>"><IMG SRC="../../imagenes/office//1047.ico" alt="Ficha" border = "0"></a>
		      </font></div></td>

    
<?php if ($buscador_rapido =! 2){?>


	    </tr>
  <?php }

$result->MoveNext();
	}
	$valor_final = 0;
		$valor_toma = 0;
  }
?>
</table>
