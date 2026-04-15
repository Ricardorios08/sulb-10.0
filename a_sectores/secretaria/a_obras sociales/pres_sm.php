<table width="90%" height="104" border="0">
  <tr bordercolor="#0066FF" bgcolor="#0033FF">
    <td height="39" colspan="4" bgcolor="#993300"><div align="center"><strong><font color="#FFFFCC">LISTADO DE OBRAS SOCIALES</font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 
<td width="44%" bgcolor="#FFFF99"><div align="left"><font color="#006633" size="2">PRESCRIPTOR</font></div></td>
    <td width="13%" bgcolor="#FFFF99"><div align="center"><font color="#006633" size="2">MATRICULA</font></div></td>
    <td width="23%" bgcolor="#FFFF99"><div align="center"><font color="#006633" size="2">OBRA SOCIAL </font></div></td>
    <td width="20%" bgcolor="#FFFF99"><div align="center"><font color="#006633" size="2">ESPECIALIDAD</font></div></td>
  </tr>

<?php 
   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
  
$medico=strtoupper($result->fields["nombre"]);
$matricula=strtoupper($result->fields["matricula"]);
$nro_os=strtoupper($result->fields["nro_os"]);

$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$sigl=strtoupper($result1->fields["sigla"]);

$sigla = $sigl." (".$nro_os.")";
$especialidad=strtoupper($result->fields["especialidad"]);






if ($B == 1) {

?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <?php 

			}
?>
<td><div align="left"><font size="2"><?php print("$medico");?></font>
</div></td>
    <td><div align="center"><font size="2"><?php print("$matricula");?></font></div></td>
    <td><div align="left"><font size="2"><?php print("$sigla");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$especialidad");?></font></div></td>



<?php 
	$result->MoveNext();
	}

?>	</table>