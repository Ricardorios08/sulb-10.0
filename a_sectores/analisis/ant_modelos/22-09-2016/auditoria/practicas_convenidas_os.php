<?php 
$buscador_rapido;
include ("../../conexiones/config_pr.php");
?>
<font color="#FF0000"><strong>
Nro Practica:  
<font color="#000000">
<?php 
echo $palabra;
?>
</strong></font>
<br>
<font color="#FF0000"><strong>
Nombre Practica: 
</strong></font>
<font color="#000000"><strong>
<?php 
$buscar_por;
switch ($buscar_por){
	case "1": //comunes
	{
		$sql1="select * from convenio_practica  where  cod_practica like '$palabra' and categoria = 1 order by cod_practica asc";
		break;
	}

	case "2": //practicas especiales
	{
		$sql1="select * from convenio_practica  where  cod_practica like '$palabra' and categoria = 2 order by cod_practica asc";
		break;
	}

	case "3": //alta complejidad
	{
		$sql1="select * from convenio_practica  where  cod_practica like '$palabra' and categoria = 3 order by cod_practica asc";
		break;
	}

	case "4": //todas
	{
		$sql1="select * from convenio_practica  where  cod_practica like '$palabra' order by cod_practica asc";
		break;
	}

	
	$result = $db->Execute($sql1);


$practica =$result->fields["practica"];
echo $practica;

?>
</strong></font>
<table width="86%" height="58" border="0">
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 

    <td width="5%"><div align="center"><strong><font color="#FFFFFF" size="2">Nro</font></strong></div></td>
    <td width="18%"><div align="center"><strong><font color="#FFFFFF" size="2">Obra Social</font></strong></div></td>
	<td width="8%"><div align="center"><strong><font color="#FFFFFF" size="2">Categoria</font></strong></div></td>
	<td width="4%"><div align="center"><strong><font color="#FFFFFF" size="2">Valor</font></strong></div></td>
	<td width="4%"><div align="center"><strong><font color="#FFFFFF" size="2">Hono.</font></strong></div></td>
    <td width="5%"><div align="center"><strong><font color="#FFFFFF" size="2">Gastos</font></strong></div></td>
    <td width="4%"><div align="center"><strong><font color="#FFFFFF" size="2">Toma</font></strong></div></td>
    <td width="6%"><div align="center"><strong><font color="#FFFFFF" size="2">Urgencia</font></strong></div></td>
	<td width="4%"><div align="center"><strong><font color="#FFFFFF" size="2">Desc.</font></strong></div></td>
	<td width="6%"><div align="center"><strong><font color="#FFFFFF" size="2">Autoriz.</font></strong></div></td>

<?php if ($buscador_rapido =! 2){?>
	<td width="12%"><div align="center"><strong><font color="#FFFFFF" size="2">MODIFICAR </font></strong></div></td>
	<td width="9%"><div align="center"><strong><font color="#FFFFFF" size="2">ELIMINAR </font></strong></div></td>
	
  </tr>
  
  <?php 
}

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

include ("../../conexiones/config_pr.php");
	
//$cod_practica=strtoupper($result->fields["cod_practica"]);

//$sql2="select * from practica  where cod_practica = '$cod_practica'";
//$result2 = $db->Execute($sql2);
//$practic=strtoupper($result2->fields["practica"]);

//$practica=$cod_practica." (".$practic.")";


$categoria=strtoupper($result->fields["categoria"]);
$honorarios=$result->fields["honorarios"];
$gastos=$result->fields["gastos"];
$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];
$valor=$result->fields["valor"];
$autorizar=$result->fields["autorizada"];
$nro_os=$result->fields["nro_os"];


include ("../../conexiones/config_os.php");
$sql3="select * from datos_os  where nro_os = '$nro_os'";
$result3 = $db->Execute($sql3);
$sigla=$result3->fields["sigla"];






	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#CCCCCC"><?php 
	$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>

    <td><div align="left"><font size="2"><?php print("$nro_os");?></font></div></td>
    <td><div align="left"><font size="2"><?php print("$sigla");?>d</font></div></td>
    <td><div align="center"><font size="2"><?php print("$categoria");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$valor");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$honorarios");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$gastos");?></font></div></td>
	<td><div align="center"><font size="2"><?php print("$toma");?></font></div></td>
	<td><div align="center"><font size="2"><?php print("$urgencia");?></font></div></td>
	<td><div align="center"><font size="2"><?php print("$material_descartable");?></font></div></td>
	<td><div align="center"><font size="2"><?php print("$autorizar");?></font></div></td>


<?php if ($buscador_rapido =! 2){?>
  


<td><a href="modificar.php?usuario=<?php print("$usuario");?>" target = "central"><div align="center">[Modificar]</div></td>
<td><div align="center"><a href="practicas/borra_practica.php?id=<?php print("$cod_practica");?>">[Eliminar]</a></font></div></td></tr>
    <?php 
}



$result->MoveNext();
	}

?>
</table>
  