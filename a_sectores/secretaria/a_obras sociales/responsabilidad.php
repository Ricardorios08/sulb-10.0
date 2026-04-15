<?php 

global $buscador_rapido;


include ("../../../conexiones/config.inc.php");

$B = 1;

$buscador_rapido=$_POST["buscador_rapido"];
$palabra=$_POST["busca"];

	if ($palabra == ""){
	
$sql="select * from datos_os order by localidad_n, denominacion, nro_os";

} else {

$sql="select * from datos_os where sigla like '$palabra%' or nro_os like '$palabra%' or denominacion like '%$palabra%' order by localidad_n, denominacion, nro_os";
}
	
$result = $db->Execute($sql);

?>
<table width="103%" height="104" border="0">
  <tr bordercolor="#0066FF" bgcolor="#000066">
    <td height="39" colspan="5"><div align="center"><strong><font color="#FFFFFF">LISTADO DE OBRAS SOCIALES</font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#DAFAFC"> 
<td width="7%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">ID</font></div></td>
    <td width="20%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">SIGLA</font></div></td>
    <td width="45%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">DOMICILIO DE FACTURACION</font></div></td>
    <td width="11%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">INSCRIPCION</font></div></td>
	    <td width="17%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">CUIT</font></div></td>
  </tr>

<?php 
   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$id=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$domi_facturacion=strtoupper($result->fields["domi_facturacion"]);
$inscripcion=strtoupper($result->fields["inscripcion"]);
$cuit=strtoupper($result->fields["cuit"]);

switch ($inscripcion){
	case "1":{ // R.I
$inscripcion = "RESP. INSC.";
break;
}

	case "2":{ // R.I
$inscripcion = "RESP. NO INSC.";
break;
}

	case "3":{ // R.I
$inscripcion = "EXENTO";
break;
}

	case "4":{ // R.I
$inscripcion = "MONOTRIBUTO";
break;
}

}

if (strlen($telefono) == 7){
$telefono = "4".$telefono;
}

if (strlen($telefono) == 6){
$telefono = "4".$telefono;
}

 if ($cuit == 0){$telefono = "-";}



	if ($B == 1) {

?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#E6E6E6"> <?php 

			}
?>
<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$id");?></font>
</div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$sigla");?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$domi_facturacion");?></font></div></td>
<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$inscripcion");?></font></div></td>
<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cuit");?></font></div></td>

<?php 
	$cont = $cont + 1;
	$result->MoveNext();
	}

?> <tr bordercolor="#FFFFCC" bgcolor="#E6E6E6">
  <td colspan="5">Cantidad de Obras Sociales: <?php echo $cont;?></td>
  </tr>
</table>