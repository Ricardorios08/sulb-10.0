<?php 

global $buscador_rapido;




include ("../../../conexiones/config.inc.php");

$B = 1;

$buscador_rapido=$_POST["buscador_rapido"];
$palabra=$_POST["busca"];

	if ($palabra == ""){
	
$sql="select * from datos_os";

} else {

$sql="select * from datos_os where sigla like '%$palabra%' or nro_os like '%$palabra%'";
}
	
$result = $db->Execute($sql);



?>
<table width="77%" height="104" border="0">
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="39" colspan="4"><div align="center"><font color="#000000" size="5"><strong>LISTADO DE OBRAS SOCIALES</strong></font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="39" colspan="4">--------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF"> 


  <?php 

switch ($buscador_rapido)
{
	case "1"://mostrar sin modificar
	{ 
		?>

    <td width="4%"><div align="left"><font color="#000000"><strong><font size="2">ID</font></strong></font></div></td>
    <td width="9%"><div align="left"><font color="#000000"><strong><font size="2">SIGLA</font></strong></font></div></td>
    <td width="38%"><div align="left"><font color="#000000"><strong><font size="2">RAZON SOCIAL</font></strong></font></div></td>
    <td width="15%"><div align="left"><font color="#000000"><strong><font size="2">TELEFONO</font></strong></font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td colspan="4">-------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <?php 

	break;
}	


	case "2": //mostrar con modificar
	{		?>

<tr bgcolor="#FFFFFF"><td width="4%"><div align="left"><font color="#000000"><strong><font size="2">ID</font></strong></font></div></td>
    <td width="9%"><div align="left"><font color="#000000"><strong><font size="2">SIGLA</font></strong></font></div></td>
    <td width="38%"><div align="left"><font color="#000000"><strong><font size="2">RAZON SOCIAL</font></strong></font></div></td>
    <td width="15%"><div align="left"><font color="#000000"><strong><font size="2">TELEFONO</font></strong></font></div></td>
  </tr><tr bgcolor="#FFFFFF">
    <td colspan="4">--------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <?php 

	
	break;
	}
}


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$id=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$telefono=strtoupper($result->fields["telefono_n"]);





if ($B == 1) {

?><tr bordercolor="#FFFFCC" bgcolor="#FFFFFF"> <?php 

			}


  
switch ($buscador_rapido)
{
	case "1": //mostrar sin modificar
	{
		?>



    <td><div align="left"><font color="#000000" size="2"><?php print("$id");?></font></div></td>
    <td><div align="left"><font color="#000000" size="2"><?php print("$sigla");?></font></div></td>
    <td><div align="left"><font color="#000000" size="2"><?php print("$denominacion");?></font></div></td>
	<td><div align="left"><font color="#000000" size="2"><?php print("$telefono");?></font></div></td>

  
<?php 

break;
}

	case "2": //mostrar sin modificar
	{
		?>
		<tr>
    <td><div align="left"><font color="#000000" size="2"><?php print("$id");?></font></div></td>
    <td><div align="left"><font color="#000000" size="2"><?php print("$sigla");?></font></div></td>
    <td><div align="left"><font color="#000000" size="2"><?php print("$denominacion");?></font></div></td>
	<td><div align="left"><font color="#000000" size="2"><?php print("$telefono");?></font></div></td>
	
</tr>
  
<?php 

break;
}
}
?>
	  

  
  <?php 

$result->MoveNext();
	}


?>
</table>

 
