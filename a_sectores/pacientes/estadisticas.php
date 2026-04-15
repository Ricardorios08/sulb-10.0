<?php

include("../../conexiones/config.inc.php");

 
?>




<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style>


<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">


<table width="850" border="0" bgcolor="#FFFFFF">
  <!--DWLayoutTable-->
  <tr>
    <td height="20" colspan="3" valign="top"><div align="center" class="Estilo4 Estilo11">SISTEMA UNICO LABORATORIOS BIOQUIMICOS </div></td>
    <td colspan="2" valign="top"><div align="center"><span class="Estilo4 Estilo11"><span class="Estilo3 Estilo4 Estilo11">EMIITIDO EL: <?php echo $hoy;?></span></span></div></td>
  </tr>
  <tr>
    <td height="20" colspan="5" valign="top">Determinaciones utilizadas</td>
  </tr>
  <tr>
    <td height="20" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
  <tr>
<!-- <td><div align="center" class="Estilo12"><span class="Estilo3">DESCRIPCION</span></div></td> -->
	<td width="358" height="21" valign="top"><div align="center" class="Estilo12"><strong><span class="Estilo3">PRACTICA.</span></strong></div></td>
    <td width="57" valign="top"><div align="center" class="Estilo12"><strong><span class="Estilo3">CANT</span></strong></div></td>
	<td colspan="2" valign="top"><div align="center" class="Estilo12"><strong><span class="Estilo3">PRACTICA.</span></strong></div></td>
    <td width="95" valign="top"><div align="center" class="Estilo12"><strong><span class="Estilo3">CANT</span></strong></div></td>
  </tr>
</TABLE>
  <table width="850" border="1" cellspacing="0" bgcolor="#FFFFFF">


<?php 

/*SELECT * 
  FROM (SELECT colA, colB FROM tableA
        UNION
        SELECT colA, colB FROM tableB) 
 WHERE colA > 1
*/
$laboratorio = "b7000137_laboratorio_torre";

$laboratorio = "laboratorio";
$laboratorio = "fa000651_labo";

  $sql2="select detalle.nro_practica, COUNT(detalle.nro_practica) as repeticiones from detalle  UNION SELECT ordenes.fecha ";


 $sql2 = "SELECT $laboratorio.detalle.cod_grabacion, $laboratorio.detalle.nro_practica, $laboratorio.ordenes.fecha, COUNT($laboratorio.detalle.nro_practica) as repeticiones FROM $laboratorio.detalle INNER JOIN $laboratorio.ordenes ON $laboratorio.detalle.cod_grabacion = $laboratorio.ordenes.cod_grabacion WHERE $laboratorio.ordenes.fecha between '$desde' and '$hasta'   group by $laboratorio.detalle.nro_practica order by repeticiones desc";



 //echo $sql2="select detalle.nro_practica, COUNT(detalle.nro_practica) as repeticiones from detalle  union ALL select * from ordenes.ordenes fecha between '$desde' and '$hasta' group by (nro_practica) order by nro_practica ";
$result = $db->Execute($sql2);

if (!$result) die("fallo".$db->ErrorMsg());
	 while (!$result->EOF) {

$nro_practica=$result->fields["nro_practica"];
$repeticiones =$result->fields["repeticiones"];

$sql8="select practica from convenio_practica where cod_practica = '$nro_practica'  order by rand()";
$result8 = $db->Execute($sql8);
$nombre_practica=strtoupper($result8->fields["practica"]);


// $a= "SELECT nro_practica as ordenes from detalle where nro_os like '$nro_os' and nro_factura like '$nro_factura' and nro_practica  like '$nro_practica' order by nro_practica";
//$total_ordenes = $db_gb->Execute($a);
//$recibidas=$total_ordenes->fields["ordenes"];


$cont = $cont + 1;

if ($cont == 1){
?>
<tr><?php }

?>
  <td width="400"><div align="center" class="Estilo14">
    <div align="left"><span class="Estilo16 Estilo34"><?php  $nro_practica;?> <?php ECHO $nombre_practica;?>:</span></div>
  </div></td>
  <td width="50"><div align="center" class="Estilo14">
    <div align="center"><span class="Estilo12"><?php ECHO $repeticiones;?></span></div>
  </div></td>

  <?php if ($cont == 2){
$cont = 0;
?></tr>

<?php }


$cantidad_practicas = $cantidad_practicas + $repeticiones;

$result->MoveNext();
}



?>
</table>
 <table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">

<tr>
  <td colspan="16">&nbsp;</td>
</tr>
<tr>
  <td colspan="16">Cantidad de Prácticas Analizadas: <span class="Estilo16"><?php ECHO $cantidad_practicas;?>&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
  </tr>
<tr>
  <td colspan="16">Cantidad de Ordenes: <span class="Estilo16"><?php ECHO $grabadas;?>&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
</tr>
</table>
<!--     <td><span class="Estilo12"><?php ECHO $nombre_practica;?></span></td> -->