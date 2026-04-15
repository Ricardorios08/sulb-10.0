<?php 

global $buscador_rapido;



 include("adodb.inc.php");

 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "obrasocial");

	
$sql="select * from datos_os";
$result = $db->Execute($sql);
?>
<table width="77%" height="104" border="0">
  <tr bordercolor="#0066FF" bgcolor="#0033FF">
    <td height="39" colspan="4" bgcolor="#993300"><div align="center"><strong><font color="#FFFFCC">LISTADO DE OBRAS SOCIALES</font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 
<td width="4%" bgcolor="#FFFF99"><div align="center"><strong><font color="#006633" size="2">ID</font></strong></div></td>
    <td width="9%" bgcolor="#FFFF99"><div align="center"><strong><font color="#006633" size="2">SIGLA</font></strong></div></td>
    <td width="38%" bgcolor="#FFFF99"><div align="center"><strong><font color="#006633" size="2">RAZON SOCIAL</font></strong></div></td>
    <td width="15%" bgcolor="#FFFF99"><div align="center"><strong><font color="#006633" size="2">TELEFONO</font></strong></div></td>
  </tr>

<?php 
   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$id=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$telefono=strtoupper($result->fields["telefono_n"]);





if ($B == 1) {

?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <?php 

			}
?>
<td><div align="center"><strong><font size="2"><?php print("$id");?></font></strong>
</div></td>
    <td><div align="center"><strong><font size="2"><?php print("$sigla");?></font></strong></div></td>
    <td><div align="center"><strong><font size="2"><?php print("$denominacion");?></font></strong></div></td>
<td><div align="center"><strong><font size="2"><?php print("$telefono");?></font></strong></div></td>



<?php 
	$result->MoveNext();
	}

?>	</table>







 
