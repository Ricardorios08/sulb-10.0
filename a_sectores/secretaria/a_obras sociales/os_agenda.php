<?php 

global $buscador_rapido;



include ("../../conexiones/config.inc.php");

$B = 1;

$buscador_rapido=$_POST["buscador_rapido"];
$palabra=$_POST["busca"];

	if ($palabra == ""){
	
$sql="select * from datos_os order by localidad_n, denominacion, nro_os";

} else {

$sql="select * from datos_os where sigla like '$palabra%' or nro_os like '$palabra%' or denominacion like '%$palabra%' order by localidad_n, denominacion, nro_os";
}
	
$result = $db->Execute($sql);

 if ($a==1){

?>
   <!-- <A HREF="../a_sectores/secretaria/a_cuentas/laboratorio_imp.php?a='imprimir'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../imagenes/botones//btn_imprimir.gif" alt="Imprimir" border = "0"></A> 


<a href="../a_sectores/secretaria/a_cuentas/laboratorio_imp.php?a='excel'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a> -->
<?php }else{?> 
<!-- <A HREF="a_cuentas/laboratorio_imp.php?a='imprimir'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../../imagenes/botones//btn_imprimir.gif" alt="Imprimir" border = "0"></A> 

<a href="a_cuentas/laboratorio_imp.php?a=excel&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a> --><?php 
}
?>


<table width="108%" height="104" border="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#0066FF" bgcolor="#000066">
    <td height="39" colspan="7"><div align="center"><strong><font color="#FFFFFF">LISTADO DE OBRAS SOCIALES</font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#DAFAFC"> 
<td width="18"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">ID</font></div></td>
    <td width="48"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">SIGLA</font></div></td>
    <td width="208"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">RAZON SOCIAL</font></div></td>
   
    <td width="76"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Modificar</font></div></td>
    <td width="46"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Ficha</font></div></td>
  </tr>

<?php 
   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$id=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$telefono=strtoupper($result->fields["telefono_n"]);

if (strlen($telefono) == 7){
$telefono = "4".$telefono;
}

if (strlen($telefono) == 6){
$telefono = "4".$telefono;
}
 if ($telefono == 0){$telefono = "-";}



	if ($B == 1) {

?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#E6E6E6"> <?php 

			}
?>
<td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$id");?></font></div></td>
    <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$sigla");?></font></div></td>
    <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$denominacion");?></font></div></td>

	<td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../../a_sectores/secretaria/a_obras sociales/modificar.php?id=<?php print("$id");?>"><IMG SRC="../../imagenes/office//027.ico" alt="Ficha" border = "0"></a></font></div></td>
	
	<td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../../a_sectores/secretaria/a_obras sociales/ficha.php?id=<?php print("$id");?>"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></a></font></div></td>
</tr>

<?php 
	$cont = $cont + 1;
	$result->MoveNext();
	}

?> <tr bordercolor="#FFFFCC" bgcolor="#E6E6E6">
  <td colspan="6">Cantidad de Obras Sociales: <?php echo $cont;?></td>
  </tr>
</table>