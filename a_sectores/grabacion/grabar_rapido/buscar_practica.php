<?php 
include ("../../../conexiones/config.inc.php");


if ($nro_practica==""){
$sql="select * from convenio_practica order by cod_practica ";
}
else{
 $sql="select * from convenio_practica where  practica like '%$nro_practica%' order by cod_practica ";
}

	$result = $db->Execute($sql);
?>
<link href="../../../drivers/css/titulos.css" rel="stylesheet" type="text/css">


<table width="850" border="0" cellspacing="0" id="pract">

<tr bordercolor="#0066FF" bgcolor="#0033FF"> 

<td width="19%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2"><strong>CODIGO</strong></font></div></td>
<td width="81%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2"><strong>PRACTICA</strong></font></div></td>

	

	
	<?php 

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_practica=strtoupper($result->fields["cod_practica"]);
$practica=strtoupper($result->fields["practica"]);

?>  </tr><td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cod_practica");?></font></div></td>
<td bgcolor="#E6E6E6"><font size="2" face="Arial, Helvetica, sans-serif">

<a href="pagina_completa_reducida.php?cod_practica=<?php print("$cod_practica");?>"> <?php print("$practica");?></a>

</font></td>
</tr>
<?php 
$result->MoveNext();
	}

?>

</table>

<?php exit;?>
