<style type="text/css">
<!--
-->

H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}
.Estilo6 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo30 {font-size: 11px}
</STYLE>

<?php 

$nro_os = $_REQUEST['nro_os'];

include ("../../../conexiones/config.inc.php");
$sql1="select * from datos_os  where  nro_os like '$nro_os'";
	$result = $db_os->Execute($sql1);


$sigla =strtoupper($result->fields["sigla"]);
$denominacion=strtoupper($result->fields["denominacion"]);

$mes= date("m");
$mes = $mes -1;
$anio = date("y");
$hoy = date("d-m-y");



	$a = $nro_os."-".$sigla."(".$hoy.").xls";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$a");





$sql="select * from arancel where nro_os = $nro_os";
$result = $db_os->Execute($sql);
 
$modalidad=ucwords($result->fields["modalidad"]);
$vuh=ucwords($result->fields["uh"]);
$vug=ucwords($result->fields["ug"]);

$modalidad_especiales=ucwords($result->fields["modalidad_especiales"]);
$vuh_especiales=ucwords($result->fields["uh_especiales"]);
$vug_especiales=ucwords($result->fields["ug_especiales"]);

$modalidad_alta=ucwords($result->fields["modalidad_alta"]);
$vuh_alta=ucwords($result->fields["uh_alta"]);
$vug_alta=ucwords($result->fields["ug_alta"]);


$vuh1=ucwords($result->fields["uh"]);
$vug1=ucwords($result->fields["ug"]);


$sql11="select * from incremento where nro_os = $nro_os";
$result11 = $db_os->Execute($sql11);

$material_descartable=ucwords($result11->fields["material_descartable"]);
$acto_bioquimico=ucwords($result11->fields["acto_bioquimico"]);
$toma_muestra=ucwords($result11->fields["toma_muestra"]);

$sql12="select * from op_facturacion where nro_os = $nro_os";
$result12 = $db_os->Execute($sql12);

$operacion=ucwords($result12->fields["operacion"]);
$porc_gastos=ucwords($result12->fields["gastos"]);
$porc_honorarios=ucwords($result12->fields["honorarios"]);

$coseguro=ucwords($result12->fields["coseguro"]);
$valor_porcentaje=ucwords($result12->fields["valor_porcentaje"]);

$coseguro_esp=$result12->fields["coseguro_esp"];
$valor_porc_esp=$result12->fields["valor_porc_esp"];

$coseguro_comp=ucwords($result12->fields["coseguro_comp"]);
$valor_porc_comp=ucwords($result12->fields["valor_porc_comp"]);






$coseguro_esp=ucwords($result12->fields["coseguro"]);
$valor_porc_esp=ucwords($result12->fields["valor_porcentaje"]);

$coseguro_comp=ucwords($result12->fields["coseguro"]);
$valor_porc_comp=ucwords($result12->fields["valor_porcentaje"]);





$vuh1 = $vuh1." + ".$porc_honorarios." %";
$vug1 = $vug1." + ".$porc_gastos." %";

if ($operacion == "SUMA"){
$porc_vuh = (($vuh * $porc_honorarios)/100);
$vuh = $vuh + $porc_vuh;
$porc_vug = (($vug * $porc_gastos)/100);
$vug = $vug + $porc_vug;
}


?>


<table width="201%" height="50" border="0">
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="12"><div align="left"><strong>ASOCIACION BIOQUIMICA DE MENDOZA </strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="14"><font color="#0000FF"><strong><font face="Arial, Helvetica, sans-serif">OBRA SOCIAL:    <?php echo $nro_os;?>
    </font> <font face="Arial, Helvetica, sans-serif">- <?php echo $denominacion;?> - (<?php echo $sigla;?>)</font></strong></font></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="8"><font color="#FF0000" face="Arial, Helvetica, sans-serif"><strong>NOMENCLADOR VIGENTE AL PERIODO: <?php echo $mes."/".$anio;?></strong></font></td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="8"><font color="#FF0000" face="Arial, Helvetica, sans-serif"><strong> </strong><font color="#000000">Emitido el: <?php echo $hoy;?></font></font></td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td height="22">&nbsp;</td>
  </tr>

	
	<?php 



$sql1="select * from convenio_practica  where nro_os = '$nro_os' and cod_practica = '998'";
$result1 = $db_pr->Execute($sql1);

 $honorarios1=number_format($result1->fields["honorarios"],2);
$gastos1=number_format($result1->fields["gastos"],2);
$valor11=number_format($result1->fields["valor"],2);


if ($palabra==""){
$sql="select * from convenio_practica where nro_os = '$nro_os' order by cod_practica $orden";

}
else{
$sql="select * from convenio_practica  where (nro_os = '$nro_os' and cod_practica = '$palabra') or (nro_os = '$nro_os' and practica like '%$palabra%') order by cod_practica $orden";
}


$result = $db_pr->Execute($sql);

?>

  <tr bordercolor="#0066FF" bgcolor="#FFFFFF"> 
    <td width="3%" height="22"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
    <td width="250"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">PRACTICA</font></div></td>


<?php switch ($modalidad){

case 1:
	{

	?>	
	<td width="3%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="6%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td>
	<td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td>
	<?php 
	break;
}

case 2:
	{
	
?>	<td width="3%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td><td width="3%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="5%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td><?php 


break;
}

case 3:
{?>
	<td width="4%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">HON.</font></div></td>
	<td width="3%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GAS.</font></div></td>
	<td width="4%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VALOR</font></div></td><?php 
	
break;
}
}
?>


<?php if (($toma_muestra != 1) && ($toma_muestra != 3)){?>   

    <td width="3%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">TOMA</font></div></td>
	

	 <td width="4%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">FINAL</font></div></td>
<?php }?>
<!-- <td width="9%"><div align="center"><font color="#000000"
	 size="2" face="Arial, Helvetica, sans-serif">MAT/DESC</font></div></td>
<td width="9%"><div align="center"><font color="#000000"
	 size="2" face="Arial, Helvetica, sans-serif">AUTORIZ.</font></div></td> -->
		 <!-- <td width="4%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">CATEG.</font></div></td> -->
		     
	 
<?php 
	
	if ($buscador_rapido =! 2){?>	
	<?php }?>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="10">&nbsp;</td>
   
  </tr>
  <?php 
  if (!$result) die("fallo".$db_pr->ErrorMsg());
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
$gastos=number_format($result->fields["gastos"],2);
$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];
$valor=number_format($result->fields["valor"],2);
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




	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>
    <td><div align="center" class="Estilo30"><?php print("$cod_practica");?></div></td>
    <td><div align="left" class=" Estilo30"><?php print("$practica");?></div></td>



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
<!-- <td><div align="center" class="Estilo30"><?php print("$categoria");?></div></td> -->
	
</tr>
    
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
