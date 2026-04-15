<?php 

include ("../conexiones/config.inc.php");
$B = 1;
$palabra=$_POST["busca"];

$sql="select * from datos_laboratorio where nro_laboratorio like '%$palabra%'";

	$result = $db->Execute($sql);
?>
<table width="83%" height="58" border="0">
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 


    <td width="11%"><div align="center"><strong><font color="#FFFFFF" size="2">NRO</font></strong></div></td>
    <td width="10%"><div align="center"><strong><font color="#FFFFFF" size="2">NOMBRE </font></strong></div></td>
    <td width="13%"><div align="center"><strong><font color="#FFFFFF" size="2">DIRECCION</font></strong></div></td>
	<td width="12%"><div align="center"><strong><font color="#FFFFFF" size="2">TELEFONO</font></strong></div></td>
<td width="13%"><div align="center"><strong><font color="#FFFFFF" size="2">ESPECIALIDAD</font></strong></div></td>
<td width="13%"><div align="center"><strong><font color="#FFFFFF" size="2">ORIENTACION</font></strong></div></td>
	<td width="12%"><div align="center"><strong><font color="#FFFFFF" size="2">MODIFICAR </font></strong></div></td>
	<td width="12%"><div align="center"><strong><font color="#FFFFFF" size="2">ELIMINAR </font></strong></div></td>
	<td width="12%"><div align="center"><strong><font color="#FFFFFF" size="2">FICHA </font></strong></div></td>

  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $nro_laboratorio=$result->fields["nro_laboratorio"];
$domicilio=$result->fields["domicilio"];
$nro_domicilio=$result->fields["nro_domicilio"];
$direccion = $domicilio." ".$nro;
$telefono=$result->fields["telefono"];
$orientacion=$result->fields["orientacion"];
$especialidad=$result->fields["especialidad"];


	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#CCCCCC"><?php 
	$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>

   
	<td><font size="2"><?php print("$nro_laboratorio");?></font></td>
    <td><font size="2"><?php print("$direccion");?></font></td>
	    <td><font size="2"><?php print("$direccion");?></font></td>
     <td><font size="2"><?php print("$telefono");?></font></td>
         <td><font size="2"><?php print("$orientacion");?></font></td>
		      <td><font size="2"><?php print("$especialidad");?></font></td>
   
	    <td><div align="center"><font size="2"><a href="modificar_cu.php?id=<?php print("$nro_laboratorio");?>" target = "central">[Modificar]</font></div></td>
		<td><div align="center"><font size="2">
		
		<a href="borra_cu.php?id=<?php print("$nro_laboratorio");?>">[Eliminar]</a>
		</font></div></td><td><div align="center"><font size="2">
		<a href="ficha_cu.php?id=<?php print("$nro_laboratorio");?>">[Ficha]</font></div></td>

  </tr>
  <?php 

$result->MoveNext();
	}

?>
</table>


