<?php 
$nro_os = $_REQUEST['nro_os'];
$a_imp= $_REQUEST['a_imp'];
$hoy = date("d-m-y");
if ($a_imp == "SI"){?>
<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<?php }else{

	$a = $nro_os."(".$hoy.")";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$a");
}
?>

<table width="720" border="0">
  <tr>
    <th colspan="2" scope="col"><?php 
$buscar_por = $_REQUEST['buscar_por'];

switch ($buscar_por){
	case "1":
	{
		$titulo = "Comunes";
		break;
	}

	case "2":
	{
		$titulo = "P.Especiales";
		break;
	}

		case "3":
	{
		$titulo = "A.Complejidad";
		break;
	}
}
$hoy = date("d/m/y");
include ("../../conexiones/config_os.php");
?>
      <div align="left">Listado de Practicas por Categoria: <?php echo $titulo;?> Emitido el: <?php echo $hoy;?> </div></th>
  </tr>
  <tr>
    <td width="251"><font color="#FF0000"><strong>Nro_os: <font color="#000000">
    <?php 



echo $nro_os;
?>
    </font></strong> <br>
    <font color="#FF0000"><strong> Nombre de OS: </strong></font> <font color="#FF0000"><font color="#000000"><strong>
    <?php 


include ("../../conexiones/config_os.php");

	
	$sql1="select * from datos_os  where  nro_os like '$nro_os'";
	$result = $db->Execute($sql1);


$sigla =strtoupper($result->fields["sigla"]);
echo $sigla;

 $sql="select * from arancel where nro_os = $nro_os";
$result = $db->Execute($sql);
 
$modalidad=ucwords($result->fields["modalidad"]);
$vuh=ucwords($result->fields["uh"]);
$vug=ucwords($result->fields["ug"]);



//

$buscar_por;

switch ($buscar_por){

	case "1": //comunes
	{
		if ($palabra == ""){

include ("../../conexiones/config_pr.php");
$sql="select * from convenio_practica where nro_os = '$nro_os' and categoria = 1 order by cod_practica" ;
		}
else
		{
include ("../../conexiones/config_pr.php");
$sql="select * from convenio_practica where nro_os = '$nro_os' and categoria = 1 and cod_practica like '%$palabra' order by cod_practica";
}
		break;
	}


	case "2": //practicas especiales
	{
		if ($palabra == ""){
			include ("../../conexiones/config_pr.php");
$sql="select * from convenio_practica where nro_os = '$nro_os' and categoria = 2 order by cod_practica";
		}
else
		{
include ("../../conexiones/config_pr.php");
$sql="select * from convenio_practica where nro_os = '$nro_os' and categoria = 2 and cod_practica like '%$palabra' order by cod_practica";
}
		break;
	}

	case "3": //alta complejidad
	{
		if ($palabra == ""){
			include ("../../conexiones/config_pr.php");
$sql="select * from convenio_practica where nro_os = '$nro_os' and categoria = 3 order by cod_practica";
		}
else
		{
include ("../../conexiones/config_pr.php");
$sql="select * from convenio_practica where nro_os = '$nro_os' and categoria = 3 and cod_practica like '%$palabra' order by cod_practica";
}
		break;
	}

	case "4": //todas
	{
if ($palabra == ""){
include ("../../conexiones/config_pr.php");
$sql="select * from convenio_practica where nro_os = '$nro_os' order by cod_practica ";
		}
else
		{
include ("../../conexiones/config_pr.php");
$sql="select * from convenio_practica where nro_os = '$nro_os' and cod_practica like '%$palabra' order by cod_practica";
}
		break;
	}

case "5":{
	include ("../../conexiones/config_pr.php");
$sql="select * from convenio_practica where nro_os = '$nro_os' order by cod_practica ";
break;
}
}


$result = $db->Execute($sql);




?>
    </strong></font></font><font color="#000000"><strong>    </strong></font></font></td>
    <td width="459"><?php echo "Unidad de Gastos: (".$vug1.") = ".number_format($vug,3);
echo "<br>";
echo "Unidad de Bioquimicos: (".$vuh1.") = ".number_format($vuh,3);?></td>
  </tr>
</table>
<font color="#FF0000"><strong>
</strong></font>
<table width="121%" height="58" border="0">
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 

    <td width="5%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">Nº </font></strong></font></div></td>
    <td width="33%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">PRACTICA</font></strong></font></div></td>


<?php switch ($modalidad){

case 1:
	{
	?>	<td width="5%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">VAL</font></strong></font></div></td>
<?php 
	break;
}

case 2:
	{
?>	<!--  <td width="4%"><div align="center"><strong><font color="#FFFFFF" size="2">HON.</font></strong></div></td><?php 
	?><td width="4%"><div align="center"><strong><font color="#FFFFFF" size="2">GAS.</font></strong></div></td>-->

	<td width="5%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">VAL</font></strong></font></div></td>
	<?php 


break;
}

case 3:
{
	?>	<td width="5%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">VAL</font></strong></font></div></td>
	<?php 
break;
}
}
?>
<td width="7%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">CATEGORIA</font></strong></font></div></td>
<?php if ($buscar_por != 5){?>
   
    <td width="4%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">TOMA</font></strong></font></div></td>

	 <td width="3%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">DESC.</font></strong></font></div></td>
<td width="5%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font
	 size="2">AUTORIZ.</font></strong></font></div></td>
		 
		     <td width="3%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">URG.</font></strong></font></div></td>
	 <td width="2%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">Nº </font></strong></font></div></td>
	 <?php }?>

<?php if ($buscador_rapido =! 2){?>	
	<td width="6%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">MOD.</font></strong></font></div></td>
	<td width="5%" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><strong><font size="2">BORRAR</font></strong></font></div></td>
	 
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

$practica=strtoupper($result->fields["practica"]);
$categoria=strtoupper($result->fields["categoria"]);

switch ($categoria){
	case "1":
	{
		$categoria = "Comunes";
		break;
	}

	case "2":
	{
		$categoria = "P.Especiales";
		break;
	}

		case "3":
	{
		$categoria = "A.Complejidad";
		break;
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
?><tr bordercolor="#FFFFFF" bgcolor="#E6E6E6"><?php 
	$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cod_practica");?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$practica");?></font></div></td>




<?php switch ($modalidad){

case 1:
	{

	$valor = ($honorarios * $vuh);
	?>    <!-- <td><div align="right"><font size="2"><?php print("$honorarios");?></font></div></td> -->
	<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo number_format($valor,2);?></font></div></td>
	<?php 
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

					}


?>	   <!--  <td><div align="right"><font size="2"><?php print("$honorarios");?></font></div></td><?php 
	?>    <td><div align="right"><font size="2"><?php print("$gastos");?></font></div></td> -->
	<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo number_format($valor,2);?></font></div></td><?php 
	$valor = 0;


break;
}

case 3:
{
						{
$valor = ($valor) +  ($vug * $gastos);

					}

	?>	<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($valor,2);?></font></div></td><?php 
break;
}
}

?> <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$categoria");?></font></div></td>
<?php 
if ($buscar_por != 5){
?>

	<td><div align="center"><font size="2"><?php print("$toma");?></font></div></td>
	<td><div align="center"><font size="2"><?php print("$material_descartable");?></font></div></td>
		<td><div align="center"><font size="2"><?php print("$autorizar");?></font></div></td>

	<td><div align="center"><font size="2"><?php print("$urgencia");?></font></div></td>
	 <td><div align="center"><font size="2"><?php print("$cod_practica");?></font></div></td>
<?php }
if ($buscador_rapido =! 2){?>
<td><font size="2"><a href="modificar.php" target = "central">
<div align="center">[Modificar]</div></td><td><div align="center"><font size="2">
<a href="practicas/borra_practica.php?id=<?php print("$cod_practica");?>">[Eliminar]</a>
		      </font></div></td>
			   <td width="12%"><div align="center"><font size="2"><?php print("$cod_practica");?></font></div></td>
  </tr>
  <?php }

$result->MoveNext();
	}
  }
?>
</table>
