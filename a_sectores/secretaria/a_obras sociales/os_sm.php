

<table width="792" border="0">
  <tr bordercolor="#0066FF" bgcolor="#CCCCCC">
    <td colspan="8"><div align="center"><strong><font color="#000099" face="Arial, Helvetica, sans-serif">LISTADO DE OBRAS SOCIALES</font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#000066"> 
<td width="4%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">ID</font></div></td>
    <td width="17%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">SIGLA</font></div></td>
    <td width="33%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">RAZON SOCIAL</font></div></td>
<td width="4%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">IVA</font></div></td>
    <td width="9%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">TELEFONO</font></div></td>
	    <td width="21%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">LOCALIDAD</font></div></td>
		  <td width="7%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">ESTADO</font></div></td>
		  <td width="5%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">FICHA</font></div></td>
  </tr>

<?php 
   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$id=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$telefono=strtoupper($result->fields["telefono_n"]);
$localidad_n=strtoupper($result->fields["localidad_n"]);
$inscripcion=strtoupper($result->fields["inscripcion"]);


 include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "$menu", "$auxiliar", "ordenes_facturacion");

 $sql1="select * from factura where nro_os = $id";
$result1 = $db->Execute($sql1);
$nro_o=strtoupper($result1->fields["nro_os"]);

if ($nro_o != ""){
	$con = "ACT";
}else
	  {
	$con = "";
	  }


 include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "$menu", "$auxiliar", "obrasocial");
switch ($inscripcion){
	case "1":{
$inscripcion = "RI";
BREAK;
	}

case "2":{
$inscripcion = "RNI";
BREAK;
	}

	case "3":{
$inscripcion = "MONOTRIBUTISTA";
BREAK;
	}

	case "4":{
$inscripcion = "EXENTO";
BREAK;
	}

}


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
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#E1F2EF"> <?php 

			}
?>
<td><div align="right"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><?php print("$id");?></font><font size="2" face="Arial, Helvetica, sans-serif"> </font></div></td>
    <td><div align="left"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;<?php print("$sigla");?></font></div></td>
    <td><div align="left"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><?php print("$denominacion");?></font></div></td>
	<td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><?php print("$inscripcion");?></font></div></td>

<td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><?php print("$telefono");?></font></div></td>
<td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><?php print("$localidad_n");?></font></div></td>

<td><div align="center"><font size="2"><a href="../a_sectores/secretaria/a_obras sociales/descargar_nomenclador.php?nro_os=<?php print("$id");?>"><font face="Arial, Helvetica, sans-serif"><?php echo $con;?></font></a></font></div></td>
<td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../a_sectores/secretaria/a_obras sociales/ficha.php?id=<?php print("$id");?>"><IMG SRC="../imagenes/office//005.ico" alt="Ficha" border = "0"></a></font></div></td>

<?php 
	$cont = $cont + 1;
	$result->MoveNext();
	}

?> <tr bordercolor="#FFFFCC" bgcolor="#E6E6E6">
  <td colspan="8">Cantidad de Obras Sociales: <?php echo $cont;?></td>
  </tr>
</table>
