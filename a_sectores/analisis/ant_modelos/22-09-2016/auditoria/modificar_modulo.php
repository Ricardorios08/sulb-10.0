<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo1 {color: #FFFFFF}
.Estilo2 {color: #000000}
-->
</style>

<body>
<?php 
include ("../../conexiones/config.inc.php");
?>


<table width="850" border="0">
<tr>
<td colspan="14"><img src="../../imagenes/modulos_1.jpg" width="850" height="35"></td>
</tr>
<tr bgcolor="#333333"> 
<td width="3%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">COD </font></div></td>
<td width="50%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">NOMBRE</font></div></td>
<td width="9%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">CATEGORIA</font></div></td>


<td width="11%"><div align="center" class="Estilo1"><font face="Arial, Helvetica, sans-serif"><font size="2">MODIFICAR </font></font></div></td>
<td width="9%"><div align="center" class="Estilo1"><font face="Arial, Helvetica, sans-serif"><font size="2">ELIMINAR </font></font></div></td>

<?php 



if ($palabra == ""){
$sql1="select * from modulo  order by cod_modulo asc";
}else{
$sql1="select * from modulo  where  cod_modulo like '$palabra' or nombre_modulo like '$palabra' order by cod_modulo asc";
}
	
	$result = $db->Execute($sql1);

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
	
$cod_modulo=strtoupper($result->fields["cod_modulo"]);
$nombre_modulo=strtoupper($result->fields["nombre_modulo"]);
$categoria=strtoupper($result->fields["categoria"]);




?>
<tr> 
<td><div align="center"><?php print("$cod_modulo");?></div></td>
<td><div align="left"><?php print("$nombre_modulo");?></div></td>
<td><div align="center"><?php print("$categoria");?></div></td>

<td><a href="modificar.php?cod_modulo=<?php print("$cod_modulo");?>" target = "central"><div align="center"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></div></td>

<td><div align="center"><a href="borra_practica.php?cod_modulo=<?php print("$cod_modulo");?>" onclick="return confirm('¿Está seguro de Borrar la practica del MODULO?');"><IMG SRC="../../imagenes/office//007.ico" alt="Ficha" border = "0"></a></font></div></td></tr>
</table>
<table width="850" border="1" cellpadding="1" cellspacing="0">
  <tr bgcolor="#C4D7E6">
    <td width="50"><div align="center" class="Estilo18">ITEM</div></td>
    <td width="100"><div align="center" class="Estilo18">NRO PRACTICA</div></td>
    <td width="600"><div align="center" class="Estilo4 Estilo2">PRACTICA</div></td>
	 <td width="50"><div align="center" class="Estilo4 Estilo2">BORRAR</div></td>
  </tr>


<?php 
$sql10="select * from deta_modulo where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);

$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

$cantidad = $cantidad + 1;

?>
    <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">

    <td><div align="center" class="Estilo18"><?php echo $cantidad;?></div></td>
    <td><div align="center" class="Estilo18"><?php echo $cod_practica;?></div></td>
    <td><div class="Estilo18"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" class="Estilo18" > <?php echo $practica;?></a>
	
	
	
	</div></td>
	<td><div align="center"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" class="Estilo18" >  <IMG SRC="../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 


$result10->MoveNext();

	}


$result->MoveNext();
	}


?>
</table>

</body>
</html>
