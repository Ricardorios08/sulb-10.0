<?php  if ($a==1){

?>
   <A HREF="../a_sectores/secretaria/a_cuentas/laboratorio_imp.php?a='imprimir'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../imagenes/botones//btn_imprimir.gif" alt="Imprimir" border = "0"></A> 


<a href="../a_sectores/secretaria/a_cuentas/laboratorio_imp.php?a='excel'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a><?php 

}
else
{
?> <A HREF="a_cuentas/laboratorio_imp.php?a='imprimir'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../../../imagenes/botones//btn_imprimir.gif" alt="Imprimir" border = "0"></A> 


<a href="a_cuentas/laboratorio_imp.php?a='excel'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../../../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a><?php 
}


$hoy=date("d/m/y");?>
<table width="104%">
<tr bgcolor="#000066">
  <td height="44" colspan="8"><div align="center"><font color="#FFFFFF" size="5">Listado de Backup de Aranceles.  Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
<tr bgcolor="#DAFAFC"><td width="23%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Obra Social</font></div>  </td>
<td width="11%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Fecha Backup</font></div></td>
<td width="7%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Periodo</font></div></td>
<td width="5%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Año</font></div></td>

<td width="19%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">nombre Arancel</font></div></td>

<td width="28%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Observaciones</font></div></td>

<td width="7%"><div align="center"><font color="#006633" size="1" face="Arial, Helvetica, sans-serif">RESTAURAR</font></div></td>




</tr>	
<?php 

 include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "obrasocial_backup");
$palabra;
if ($palabra=="")
{
$sql= "SELECT * FROM `fecha_aranceles`";
}else{
$sql="select * from datos_laboratorio where nro_laboratorio like '%$palabra%' or nombre_laboratorio like '%$palabra%' or matricula like '%$palabra%' ";
}

$result = $db->Execute($sql);
 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	

$nro_laboratorio=$result->fields["nro_laboratorio"];

$nro_os=strtoupper($result->fields["nro_os"]);
$nro_os_vi=strtoupper($result->fields["nro_os_vi"]);
$fecha=strtoupper($result->fields["fecha"]);
$periodo=$result->fields["periodo"];
$anio = $result->fields["anio"];
$nombre_arancel=strtoupper($result->fields["nombre_arancel"]);
$detalle=strtoupper($result->fields["detalle"]);

include ("../../../conexiones/config_os.php");
$sql1="select * from datos_os where nro_os = $nro_os_vi";
$result1 = $db->Execute($sql1);

$sigla=strtoupper($result1->fields["sigla"]);

?>

	<td height="20"><font size="1" face="Arial, Helvetica, sans-serif">(<?php print("$nro_os_vi");?>) <?php print("$sigla");?></font></td>
     <td><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$fecha");?></font></td>
     <td><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$periodo");?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$anio");?></font></td>
	<td><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$nombre_arancel");?></font></td>
	<td><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$detalle");?></font></td>

	<td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../../gerencia/restaurar.php?id=<?php print("$nro_laboratorio");?>"><IMG SRC="../../../imagenes/office//984.ico" alt="Restaurar" border = "0"></a></font></div></td>
  </tr>
<?php 

$result->MoveNext();
	}

?>
</table>
