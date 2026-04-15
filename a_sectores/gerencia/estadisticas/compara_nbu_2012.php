<style type="text/css">
<!--
.Estilo35 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo36 {font-size: 10px}
.Estilo37 {font-family: "Trebuchet MS"}
.Estilo38 {font-family: "Trebuchet MS"; font-size: 10px; }
.Estilo40 {font-size: 24px}
-->
</style>


<table width="850" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" bgcolor="#B8B8B8"><div align="center" class="Estilo35">COMPARA NBU </div></td>
  </tr>
  <tr>
    <td height="43" colspan="5" bgcolor="#EDEDED"><div align="center" class="Estilo40">CAMBIO VALOR EN LAS UNIDADES BIOQUIMICAS </div></td>
  </tr>
  <tr>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFF99"><div align="center">2010</div></td>
    <td colspan="2" bgcolor="#FFFF99"><div align="center">2012</div></td>
  </tr>
  <tr>
    <td width="61" bgcolor="#EDEDED"><div align="center"><span class="Estilo35">COD </span></div></td>
    <td width="366" bgcolor="#EDEDED"><div align="center" class="Estilo35">PRACTICA</div></td>
    <td width="68" bgcolor="#EDEDED"><div align="center" class="Estilo35">HON.</div></td>
    <td width="296" bgcolor="#EDEDED"><div align="center" class="Estilo35">PRACTICA</div></td>
    <td width="47" bgcolor="#EDEDED"><div align="center" class="Estilo35">HON.</div></td>
  </tr>

	<?php 
	
include("../../../conexiones/config.inc.php");
	
	 $sql="select * from convenio_practica2010 order by cod_practica asc";
	$result = $db->Execute($sql);


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$honorarios=$result->fields["honorarios"];
$practica=$result->fields["practica"];
$cod_practica=$result->fields["cod_practica"];

	$sql11="select * from convenio_practica2012 where cod_practica = $cod_practica";
	$result1 = $db->Execute($sql11);

$honorarios2012=$result1->fields["honorarios"];
$practica2012=$result1->fields["practica"];

if ($practica2012 != ""){

if ($honorarios != $honorarios2012){
	$cant = $cant + 1;


 $sql = "UPDATE `convenio_practica2010` SET `honorarios` = '$honorarios2012' WHERE `cod_practica` = $cod_practica";
//mysql_query($sql);

  ?><tr>
	  <td><div align="center" class="Estilo36"><span class="Estilo37"><?php echo $cod_practica;?></span></div></td>
    <td><span class="Estilo38"><?php echo $practica;?></span></td>
    <td><div align="center" class="Estilo38"><?php echo $honorarios;?></div></td>
    <td><div align="left" class="Estilo38"><?php echo $practica2012;?></div></td>
    <td><div align="center" class="Estilo38"><?php echo $honorarios2012;?></div></td>
  </tr>

<?php }

}
$result->MoveNext();
	}
?>

<tr><td colspan="5">Cambiadas de Valor <span class="Estilo38"><?php echo $cant;$cant = 0;?></span></td></tr>
</table>



<table width="850" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td height="43" colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo40">PRACTICAS CAMBIADAS DE NOMBRE</div></td>
  </tr>
  <tr>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#FFFF99"><div align="center">2010</div></td>
    <td bgcolor="#FFFF99"><div align="center">2012</div></td>
  </tr>
  <tr>
    <td width="61" bgcolor="#EDEDED"><div align="center"><span class="Estilo35">COD </span></div></td>
    <td bgcolor="#EDEDED"><div align="center" class="Estilo35">PRACTICA</div>      
    <div align="center" class="Estilo35"></div></td>
    <td bgcolor="#EDEDED"><div align="center" class="Estilo35">PRACTICA</div>      <div align="center" class="Estilo35"></div></td>
  </tr>

	<?php 
	
include("../../../conexiones/config.inc.php");
	
	 $sql="select * from convenio_practica2010 order by cod_practica asc";
	$result = $db->Execute($sql);


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$honorarios=$result->fields["honorarios"];
$practica=trim($result->fields["practica"]);
$cod_practica=$result->fields["cod_practica"];

	$sql11="select * from convenio_practica2012 where cod_practica = $cod_practica";
	$result1 = $db->Execute($sql11);

$honorarios2012=$result1->fields["honorarios"];
$practica2012=trim($result1->fields["practica"]);


 
if ($practica2012 != ""){

if ($practica2012 != $practica){
$cant = $cant +1;

$sql = "UPDATE `convenio_practica2010` SET `practica` = '$practica2012' WHERE `cod_practica` = $cod_practica";
//mysql_query($sql);


 
  ?><tr>
	  <td><div align="center" class="Estilo36"><span class="Estilo37"><?php echo $cod_practica;?></span></div></td>
    <td><span class="Estilo38"><?php echo $practica;?></span>      <div align="center" class="Estilo38"></div></td>
    <td><div align="left" class="Estilo38"><?php echo $practica2012;?></div>   <div align="center" class="Estilo38"></div></td>

  </tr>

<?php }}


 
$result->MoveNext();
	}
?>
<tr><td colspan="5">Cambiadas de Nombre <span class="Estilo38"><?php echo $cant;$cant = 0;?></span></td></tr>
</table>


<table width="850" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td height="43" colspan="5" bgcolor="#EDEDED"><div align="center" class="Estilo40">PRACTICAS ELIMINADAS</div></td>
  </tr>
  <tr>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFF99"><div align="center">2010</div></td>
    <td colspan="2" bgcolor="#FFFF99"><div align="center">2012</div></td>
  </tr>
  <tr>
    <td width="61" bgcolor="#EDEDED"><div align="center"><span class="Estilo35">COD </span></div></td>
    <td width="366" bgcolor="#EDEDED"><div align="center" class="Estilo35">PRACTICA</div></td>
    <td width="68" bgcolor="#EDEDED"><div align="center" class="Estilo35">HON.</div></td>
    <td width="296" bgcolor="#EDEDED"><div align="center" class="Estilo35">PRACTICA</div></td>
    <td width="47" bgcolor="#EDEDED"><div align="center" class="Estilo35">HON.</div></td>
  </tr>

	<?php 
	
include("../../../conexiones/config.inc.php");
	
	 $sql="select * from convenio_practica2010 order by cod_practica asc";
	$result = $db->Execute($sql);


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$honorarios=$result->fields["honorarios"];
$practica=trim($result->fields["practica"]);
$cod_practica=$result->fields["cod_practica"];

	$sql11="select * from convenio_practica2012 where cod_practica = $cod_practica";
	$result1 = $db->Execute($sql11);

$honorarios2012=$result1->fields["honorarios"];
$practica2012=trim($result1->fields["practica"]);


 


if ($practica2012 == ""){

$cant = $cant + 1;
 
  ?><tr>
	  <td><div align="center" class="Estilo36"><span class="Estilo37"><?php echo $cod_practica;?></span></div></td>
    <td><span class="Estilo38"><?php echo $practica;?></span></td>
    <td><div align="center" class="Estilo38"><?php echo $honorarios;?></div></td>
 
<?php if ($practica2012 == ""){?>

<?php  $sql = "delete from `convenio_practica2010` where cod_practica  = $cod_practica";
//mysql_query($sql);
?>

	<td bgcolor="#FF977D"><div align="left" class="Estilo38">
	  <div align="center">ELIMINADA</div>
	</div></td>
	 <td bgcolor="#FF977D"><div align="center" class="Estilo38"><?php echo $honorarios2012;?></div></td>
	<?php }else{?>
<td><div align="left" class="Estilo38"><?php echo $practica2012;?></div></td>


<?php }

?>

  </tr>

<?php }
 
$result->MoveNext();
	}
?>
<tr><td colspan="5">Practicas Eliminadas <span class="Estilo38"><?php echo $cant;$cant = 0;?></span></td></tr>
</table>




<table width="850" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td height="43" colspan="5" bgcolor="#EDEDED"><div align="center" class="Estilo40">PRACTICAS AGREGADAS</div></td>
  </tr>
  <tr>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td colspan="4" bgcolor="#FFFF99"><div align="center">2012</div>      <div align="center"></div></td>
  </tr>
  <tr>
    <td width="61" bgcolor="#EDEDED"><div align="center"><span class="Estilo35">COD </span></div></td>
    <td width="366" bgcolor="#EDEDED"><div align="center" class="Estilo35">PRACTICA</div></td>
    <td width="68" bgcolor="#EDEDED"><div align="center" class="Estilo35">HON.</div></td>
    <td colspan="2" bgcolor="#EDEDED">&nbsp;</td>
  </tr>

	<?php 
	
include("../../../conexiones/config.inc.php");
	
	 $sql="select * from convenio_practica2012 order by cod_practica asc";
	$result = $db->Execute($sql);


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$honorarios2012=$result->fields["honorarios"];
$practica2012=trim($result->fields["practica"]);
$cod_practica=$result->fields["cod_practica"];

$gastos=$result->fields["gastos"];
 $toma=$result->fields["toma"];
 $urgencia=$result->fields["urgencia"];
 $material_descartable=$result->fields["material_descartable"];
 $valor=$result->fields["honorvalorarios"];

 $autorizada=$result->fields["autorizada"];
 $categoria=$result->fields["categoria"];

	$sql11="select * from convenio_practica2010 where cod_practica = $cod_practica";
	$result1 = $db->Execute($sql11);

$honorarios=$result1->fields["honorarios"];
$practica=trim($result1->fields["practica"]);






if ($practica == ""){

 $sql = "INSERT INTO `convenio_practica` ( `cod_practica` , `nro_os` , `cod_equivalencia` ,`categoria` , `honorarios` , `gastos` , `toma` , `urgencia` , `material_descartable` , `valor` , `autorizada` ) VALUES ( '$cod_practica' , '4975' , '$equivalencia' , '$categoria' , '$honorarios' , '$gastos' , '$toma' , '$urgencia' , '$material_descartable' , '$valor' , '$autorizada')";
//mysql_query($sql);


 $cant = $cant + 1;
  ?><tr>
	  <td><div align="center" class="Estilo36"><span class="Estilo37"><?php echo $cod_practica;?></span></div></td>
  
	<td><span class="Estilo38"><?php echo $practica2012;?></span></td>
    <td><div align="center" class="Estilo38"><?php echo $honorarios2012;?></div></td>
 
<?php if ($practica == ""){?>
	<td width="296" bgcolor="#00ff33"><div align="left" class="Estilo38">
	  <div align="center">AGREGADA</div>
	</div></td>
	 <td width="47" bgcolor="#00ff33"><div align="center" class="Estilo38"></div></td>
	<?php }else{?>
<td><div align="left" class="Estilo38"><?php echo $practica;?></div></td>


<?php }

?>

  </tr>
	

<?php }
 

$result->MoveNext();
	}
?>

<tr><td colspan="5">Practicas Agregadas: <span class="Estilo38"><?php echo $cant;$cant = 0;?></span></td></tr>
</table>

