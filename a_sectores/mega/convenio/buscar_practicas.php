<?php

include("../../../conexiones/config.inc.php");
 
$palabra = $_REQUEST['palabra'];
$buscador_rapido=$_REQUEST['buscador_rapido'];


  $sql="select * from fecha_actualizacion_mega";
	$result = $db->Execute($sql);

$fecha_actualizacion=$result->fields["fecha_actualizacion"];

$dia = substr($fecha_actualizacion,8,2);
$mes = substr($fecha_actualizacion,5,2);
$anio= substr($fecha_actualizacion,0,4);

$fecha_actualizacion = $dia."/".$mes."/".$anio;


if ($palabra==""){

 $sql="select * from precio_derivaciones order by laboratorio_realizacion, descripcion ";
}
else{
$sql="select * from precio_derivaciones where cod_practica like '$palabra' or  descripcion like '%$palabra%' order by descripcion ";
}


	$result = $db->Execute($sql);
?>
<link href="../../../drivers/css/titulos.css" rel="stylesheet" type="text/css">



<style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	font-family: "Trebuchet MS";
	font-weight: bold;
}
-->
</style>
<table width="780" border="0" id="pract">
<!--DWLayoutTable-->
<!-- 
  <THEAD>
     <TR> ...DICCIONARIO DE PRACTICAS...
</THEAD> -->

<tr bordercolor="#0066FF" bgcolor="#0033FF">
  <td colspan="5" bgcolor="#666666"><div align="center" class="Estilo1">NOMENCLADOR MEGA ACTUALIZADO EL <?php print("$fecha_actualizacion");?></div></td>
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 
<td width="57" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2"><strong>CODIGO</strong></font></div></td>
<!-- <td width="45" bgcolor="#C1F2FF"><div align="center"><font color="#000000" size="2"><strong>LETRA</strong></font></div></td> -->
<td width="349" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2"><strong>DESCRIPCION</strong></font></div></td>
<td width="218" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2"><strong>LAB. </strong></font></div></td>
<td width="64" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2"><strong>METODO</strong></font></div></td>
<td width="70" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2"><strong>PRECIO</strong></font></div></td>
<!-- <td width="85" bgcolor="#C1F2FF"><div align="center"><font color="#000000" size="2"><strong>MODIFICAR</strong></font></div></td>
<td width="57" bgcolor="#C1F2FF"><div align="center"><font color="#000000" size="2"><strong>BORRAR</strong></font></div></td> -->

</table>

<table width="780" border="0" id="pract1">
<?php 

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_practica=$result->fields["cod_practica"];
//$letra=strtoupper($result->fields["letra"]);
$descripcion=strtoupper($result->fields["descripcion"]);
$laboratorio_realizacion=strtoupper($result->fields["laboratorio_realizacion"]);
$precio=strtoupper($result->fields["precio"]);
$metodo=strtoupper($result->fields["metodo"]);


$sql3 = "SELECT * FROM `lab_realizacion` WHERE `nro_lab` = $laboratorio_realizacion";
$result3 = $db->Execute($sql3);
$laboratorio_realizacion=strtoupper($result3->fields["nombre"]);
?>
<tr>
<td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cod_practica");?></font></div></td>
<!-- <td bgcolor="#FFFFFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$letra");?></font></div></td> -->
<td bgcolor="#E6E6E6"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$descripcion");?></font></td>
<td bgcolor="#E6E6E6"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$laboratorio_realizacion");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$metodo");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$precio");?></font></div></td>
<!-- <td><div align="center"><a href="../convenio/modificar.php?descripcion=<?php print("$descripcion");?>&&cod_practica=<?php print("$cod_practica");?>&&laboratorio_realizacion=<?php print("$laboratorio_realizacion");?>" target = "central"><font color="#FF0000"><img src="../../../imagenes/office//003.ico" alt="Modificar" border = "0"></font></a></div></td>


<td bgcolor="#E6E6E6"><div align="center"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><a href="../convenio/borra_practica.php?cod_practica=<?php print("$cod_practica");?>&&laboratorio_realizacion=<?php print("$laboratorio_realizacion");?>&&metodo=<?php print("$metodo");?>"  onclick="return confirm('¿Está seguro de Borrar esta practica?');" target = "central"><font color="#FF0000"><img src="../../../imagenes/office//005.ico" alt="Borrar" border = "0"></a></div></td> -->
<?php 


$result->MoveNext();
	}

?>
</table>
