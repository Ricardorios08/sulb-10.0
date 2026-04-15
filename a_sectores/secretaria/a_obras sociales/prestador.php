<?php 
include ("../../../conexiones/config.inc.php");

 ?>
<table width="124%" height="98" border="0" cellpadding="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#0066FF" bgcolor="#000066">
    <td height="33" colspan="7"><div align="center"><font color="#FFFFFF"><strong>LISTADO DE OBRAS SOCIALES POR PRESTADORES</strong></font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#DAFAFC"> 
<td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">PRESTADOR</font></div>  </td>
<td width="23"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">N&ordm;</font></div></td>
    <td width="91"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">SIGLA</font></div></td>
    <td width="258"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">RAZON SOCIAL</font></div></td>
    <td width="75"><font size="2" face="Arial, Helvetica, sans-serif">TELEFONO</font></td>
	    <td width="269"><font size="2" face="Arial, Helvetica, sans-serif">LOCALIDAD</font></td>
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
$localidad_n=strtoupper($result->fields["localidad_n"]);

if (strlen($telefono) == 7){
$telefono = "4".$telefono;
}

if (strlen($telefono) == 6){
$telefono = "4".$telefono;
}

if ($telefono == 0){$telefono = "-";}
if ($prestador == ""){$prestador= "-";}



	if ($B == 1) {

?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#E6E6E6"> <?php 

			}
?>

<td width="43"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_prestador");?></font>
</div></td>
<td width="93"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$prestador");?></font>
</div></td>
<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$id");?></font>
</div></td>
<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$sigla");?></font></div></td>
<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$denominacion");?></font></div></td>
<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$telefono");?></font></div></td>
<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$localidad_n");?></font></div></td>
</tr>

<?php 
	$cont = $cont + 1;
	$result->MoveNext();
	}

?> <tr bordercolor="#FFFFCC" bgcolor="#E6E6E6">
  <td colspan="7">Cantidad de Obras Sociales: <?php echo $cont;?></td>
  </tr>
</table>
