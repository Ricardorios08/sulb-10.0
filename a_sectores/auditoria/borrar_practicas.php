<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />
<?php 

include ("../conexiones/config_pr.php");
$a = $_GET['id'];
$SQL="Delete From datos_os where nro_os = $a";
$db->Execute($SQL);

echo "dskfsdklfgsdklgf";

$sql1="select * from datos_os";

	
$result = $db->Execute($sql1);

?>
<table width="77%" height="58" border="0">
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 
    <td width="4%"><div align="center"><strong><font color="#FFFFFF" size="2">ID</font></strong></div></td>
    <td width="9%"><div align="center"><strong><font color="#FFFFFF" size="2">SIGLA</font></strong></div></td>
    <td width="38%"><div align="center"><strong><font color="#FFFFFF" size="2">RAZON SOCIAL</font></strong></div></td>
    <td width="15%"><div align="center"><strong><font color="#FFFFFF" size="2">TELEFONO</font></strong></div></td>
    <td width="15%"><div align="center"><strong><font color="#FFFFFF" size="2">Modificar</font></strong></div></td>
    <td width="8%"><div align="center"><strong><font color="#FFFFFF" size="2">Eliminar</font></strong></div></td>
    <td width="11%"><div align="center"><strong><font color="#FFFFFF" size="2">Ficha</font></strong></div></td>
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$id=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$telefono=strtoupper($result->fields["telefono"]);





if ($B == 1) {
?>
<tr bordercolor="#FFFFFF" bgcolor="#CCCCCC"><?php 
	$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>
  
    <td><div align="center"><font size="2"><?php print("$id");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$denominacion");?></font></div></td>
	<td><div align="center"><font size="2"><?php print("$telefono");?></font></div></td>
	<td><div align="center"><a href="modificar.php?id=<?php print("$id");?>">[Modificar]</a></div></td>
	<td><div align="center"><font size="2">
  

	  

      <a href="borra.php?id=<?php print("$id");?>">[Eliminar]</a>
  

  

  
  </font></div></td>
    <td><div align="center"><a href="ficha.php?id=<?php print("$id");?>">[Ficha]</a></div></td>
</tr>
  <?php 

$result->MoveNext();
	}


?>
</table>

 
