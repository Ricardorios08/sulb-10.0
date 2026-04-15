<?php 
include ("../../../conexiones/config.inc.php");

 ?>
<table width="77%" height="104" border="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#0066FF" bgcolor="#0033FF">
    <td height="48" colspan="5" valign="top" bgcolor="#993300"><div align="center"><strong><font color="#FFFFCC">LISTADO DE OBRAS SOCIALES PROVINCIALES </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 
<td width="115" bgcolor="#FFFF99"><div align="center"><strong><font color="#006633" size="2">PRESTADOR</font></strong></div></td>
<td width="36" bgcolor="#FFFF99"><div align="center"><strong><font color="#006633" size="2">ID</font></strong></div></td>
    <td width="66" bgcolor="#FFFF99"><div align="center"><strong><font color="#006633" size="2">SIGLA</font></strong></div></td>
    <td width="230" bgcolor="#FFFF99"><div align="center"><strong><font color="#006633" size="2">RAZON SOCIAL</font></strong></div></td>
    <td width="104" bgcolor="#FFFF99"><div align="center"><strong><font color="#006633" size="2">TELEFONO</font></strong></div></td>
  </tr>

<?php 

if ($palabra == ""){
	
$sql="select * from datos_os order by contacto";

} else {

$sql="select * from datos_os where contacto like '%$palabra%' or nro_os like '%$palabra%' or sigla like '%$palabra%' order by contacto";
}
	
$result = $db->Execute($sql);


   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$prestador=strtoupper($result->fields["contacto"]);
$id=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$telefono=strtoupper($result->fields["telefono_n"]);





if ($B == 1) {

?>
<tr bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <?php 

			}
?>
<td><div align="center"><strong><font size="2"><?php print("$prestador");?></font></strong>
</div></td>
<td><div align="center"><strong><font size="2"><?php print("$id");?></font></strong>
</div></td>
    <td><div align="center"><strong><font size="2"><?php print("$sigla");?></font></strong></div></td>
    <td><div align="center"><strong><font size="2"><?php print("$denominacion");?></font></strong></div></td>
<td><div align="center"><strong><font size="2"><?php print("$telefono");?></font></strong></div></td>
</tr>



<?php 
	$result->MoveNext();
	}

?>	</table>