<?php if ($buscar_por == 5){?>
<a href="../a_sectores/auditoria/imprimir.php?nro_os=<?php print("$nro_os");?>&&buscar_por=5&&a_imp=SI"><IMG SRC="../imagenes/botones//btn_imprimir.gif" alt="Imprimir" border = "0"></a>
<a href="../a_sectores/auditoria/imprimir.php?nro_os=<?php print("$nro_os");?>&&buscar_por=5&&a_imp=NO"><IMG SRC="../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a>


<?php }else{?>
<a href="../a_sectores/auditoria/imprimir.php?nro_os=<?php print("$nro_os");?>&&a_imp=SI"><IMG SRC="../imagenes/botones//btn_imprimir.gif" alt="Imprimir" border = "0"></a>

<a href="../a_sectores/auditoria/imprimir.php?nro_os=<?php print("$nro_os");?>&&a_imp=NO"><IMG SRC="../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a>
<?php }


include ("../conexiones/config_os.php");

?>
<br>
<font color="#FF0000"><strong>
Nº Obra Social:  
<font color="#000000">
<?php 
echo $nro_os;
?>
</strong></font>
<br>
<font color="#FF0000"><strong>
Nombre de Obra Social: 
</strong></font>
<font color="#000000"><strong>




<?php include ("convenio.php");




echo $sql1="select * from datos_os  where  nro_os like '$nro_os'";
	$result = $db->Execute($sql1);


$sigla =strtoupper($result->fields["sigla"]);
echo $sigla;


include ("../conexiones/config_pr.php");
$sql1="select * from convenio_practica  where nro_os = '$nro_os' and cod_practica = '998'";
$result1 = $db->Execute($sql1);

 $honorarios1=number_format($result1->fields["honorarios"],2);
$gastos1=number_format($result1->fields["gastos"],2);
$valor11=number_format($result1->fields["valor"],2);



include ("../conexiones/config_pr.php");
if ($palabra==""){
$sql="select * from convenio_practica where nro_os = '$nro_os' order by cod_practica $orden";

}
else{
$sql="select * from convenio_practica  where (nro_os = '$nro_os' and cod_practica = '$palabra') or (nro_os = '$nro_os' and practica like '%$palabra%') order by cod_practica $orden";
}


$result = $db->Execute($sql);

?>

<table width="107%" height="50" border="0">
  <tr bordercolor="#0066FF" bgcolor="#E8DCFC"> 

    <td width="4%" height="22"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
    <td width="39%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">PRACssTICA</font></div></td>


<?php switch ($modalidad){

case 1:
	{

	?>	
	<td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="8%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td>
	<td width="8%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td>
	<?php 
	break;
}

case 2:
	{
	
?>	<td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td>
	<td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="8%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td><?php 


break;
}

case 3:
{?>
	<td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td>
	<td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td><?php 
	
break;
}
}



if (($toma_muestra != 1) && ($toma_muestra != 3)){?>   

    <td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">TOMA</font></div></td>
	

	 <td width="6%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">FINAL</font></div></td>
<?php }?>
<!-- <td width="9%"><div align="center"><font color="#000000"
	 size="2" face="Arial, Helvetica, sans-serif">MAT/DESC</font></div></td>
<td width="9%"><div align="center"><font color="#000000"
	 size="2" face="Arial, Helvetica, sans-serif">AUTORIZ.</font></div></td> -->
		 <td width="7%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">CATEG.</font></div></td>
		     
	 
<?php 
	
	if ($buscador_rapido =! 2){?>	
	<?php }?>
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
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
$categoria=strtoupper($result->fields["categoria"]);
$honorarios=number_format($result->fields["honorarios"],2);
$gastos=$result->fields["gastos"];
$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];
$valor=$result->fields["valor"];
$autorizar=$result->fields["autorizada"];

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




	if ($B == 1) {?>
	<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php }?>

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
	

    
<?php 
$result->MoveNext();
	}
	$valor_final = 0;
		$valor_toma = 0;
  }
?>
</table>
