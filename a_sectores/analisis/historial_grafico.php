<style type="text/css">
<!--
.Estilo1 {
	font-family: "Trebuchet MS";
	font-weight: bold;
	color: #000000;
}
-->
</style>
 <table width="800" border="0" cellspacing="0">
 <!--DWLayoutTable-->
 
 <?php
 $nro_paciente = $_REQUEST['nro_paciente'];
	
 $sql12="select * from detalle_referencia where nro_paciente = $nro_paciente group by nro_practica";
$result12 = $db->Execute($sql12);

if (!$result12) die("fallo".$db->ErrorMsg());
 while (!$result12->EOF) {

$nro_practica=strtoupper($result12->fields["nro_practica"]);

  $sql11="select * from convenio_practica where cod_practica = $nro_practica";
$result11 = $db->Execute($sql11);
 $nombre_practica=strtoupper($result11->fields["practica"]);
 $metodo=$result11->fields["metodo"];
$unidad=$result11->fields["unidad"];


?>
 <tr><td height="21" colspan="2">&nbsp;</td>
   <tr>
   <td height="24" colspan="2" valign="top" bgcolor="#F0F0F0"><span class="Estilo1"><?php echo $nombre_practica;?> </span></td>
 <tr>

 <?php


$sql="select * from detalle_referencia where nro_paciente = $nro_paciente and nro_practica = $nro_practica group by cod_grabacion";
$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());
 while (!$result->EOF) {

 $cod_grabacion=strtoupper($result->fields["cod_grabacion"]);
$valor=strtoupper($result->fields["valor"]);

  $sql11="select * from detalle where cod_grabacion = $cod_grabacion";
$result11 = $db->Execute($sql11);
 $fec=strtoupper($result11->fields["fecha"]);

$dia_fec = substr($fec,8,2);
$mes_fec = substr($fec,5,2);
$anio_fec = substr($fec,0,4);
$fec = $dia_fec."/".$mes_fec."/".$anio_fec;


?>
 
     <td width="168" bgcolor="#FFFFFF"><div align="left"><?php echo  $fec.": ";?>
   <td width="193" bgcolor="#FFFFFF"><strong><?php echo $valor." ".$unidad;?></strong></td>
   <tr>

 <?php 
/*
echo " ";
echo $nro_practica;
echo " - ";
echo $valor;
echo " - ";
echo $fec;
echo "<br>";

*/

$result->MoveNext();

	}





$result12->MoveNext();

	}

?>
 </table>

<?php

/*

 $valor=strtoupper($result12->fields["valor"]);
 $cod_g=strtoupper($result12->fields["cod_grabacion"]);

  $sql11="select * from detalle where cod_grabacion = $cod_g";
$result11 = $db->Execute($sql11);
 $fec=strtoupper($result11->fields["fecha"]);

$dia_fec = substr($fec,8,2);
$mes_fec = substr($fec,5,2);
$anio_fec = substr($fec,0,4);
$fec = $dia_fec."/".$mes_fec."/".$anio_fec;


echo  $fec;
echo $valor;

$valor_y = $valor_y.",".$fec;
$valor_x = $valor_x.",".$valor;


$result12->MoveNext();

	}*/
	
	?>