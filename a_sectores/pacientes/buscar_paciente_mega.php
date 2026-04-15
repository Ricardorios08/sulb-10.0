 


<style type="text/css">
<!--
.Estilo1 {font-family: "Times New Roman", Times, serif}
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: "Times New Roman", Times, serif; font-size: 12px; }
-->
</style>
<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">

 <table width="850" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td height="54" colspan="4" bgcolor="#FFFFFF"><div align="center" class="Estilo1 Estilo2">PLANILLA DERIVACION MEGA DESDE  <?php echo $desde_m;?> HASTA <?php echo $hasta_m;?></div></td>
  </tr>
  <tr>
    <td width="200" bgcolor="#FFFFFF"><div align="center" class="Estilo3">ROTULO</div></td>
    <td width="250" bgcolor="#FFFFFF"><div align="center" class="Estilo3">PACIENTE</div></td>
    <td bgcolor="#FFFFFF"><div align="center" class="Estilo3">DETERMINACION</div>      <div align="center" class="Estilo3"></div></td>
    <td bgcolor="#FFFFFF"><div align="center" class="Estilo3">LAB. DERIVACION </div></td>
  </tr>


 <?php 


  $sql10="select * from detalle where fecha between '$desde' and '$hasta' and deriva = 1  group by cod_mega order by cod_mega";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_mega=strtoupper($result10->fields["cod_mega"]);
$nro_paciente=strtoupper($result10->fields["nro_paciente"]);

$sql="select * from pacientes where nro_paciente = $nro_paciente";
 $result = $db->Execute($sql);

 	
 $nombre=strtoupper($result->fields["nombre"]);
  $apellido=strtoupper($result->fields["apellido"]);

 $nro_os=$result->fields["nro_os"];
 $nro_documento=$result->fields["nro_documento"];

 $fecha_nacimiento=$result->fields["fecha_nacimiento"];

 

IF ($fecha_nacimiento == "0000-00-00"){
$edad = "S/C";
}ELSE{
$edad = calculaEdad($fecha_nacimiento);
}

$nombre_completo = $apellido." ".$nombre;

$nombre_completo = substr($nombre_completo,0,20);




 

  ?> 
  
  
    <tr>
    <td height="63" bgcolor="#FFFFFF"><img src="../../a_sectores/analisis/cod_barra.png" width="200" height="113"></td>
    <td rowspan="2" bgcolor="#FFFFFF"><div align="center"><?php echo $nombre_completo;?></div></td>
  
<td colspan="2" rowspan="2" bgcolor="#FFFFFF">


<?php   $sql5="select * from detalle where cod_mega = '$cod_mega' and nro_paciente = $nro_paciente";
$result5 = $db->Execute($sql5);

if (!$result5) die("fallo222".$db->ErrorMsg());
 while (!$result5->EOF) {

$nro_practica=strtoupper($result5->fields["nro_practica"]);
$deriva=strtoupper($result5->fields["deriva"]);
$imprimir=strtoupper($result5->fields["imprimir"]);
$cod_operacion=strtoupper($result5->fields["cod_operacion"]);
$cod_mega=strtoupper($result5->fields["cod_mega"]);
 $nro_lab=strtoupper($result5->fields["nro_lab"]);

$nro_lab=strtoupper($result5->fields["nro_lab"]);



$sql7 = "SELECT * FROM lab_realizacion where  nro_lab = $nro_lab";
$result7 = $db->Execute($sql7);
$lab_realizacion=strtoupper($result7->fields["nombre"]);
$tipo=strtoupper($result7->fields["tipo"]);


$sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);


 $sql11="select * from tabla_conversion where nbu =  $nro_practica";
$result11 = $db->Execute($sql11);
$mega=strtoupper($result11->fields["mega"]);
$manlab=strtoupper($result11->fields["manlab"]);


if ($tipo == 1){$nomenclador = $mega;}
else{$nomenclador = $manlab;}





?>
	
	     
        

<table width="389">
<tr>
	<td width="224"><?php echo $nomenclador;?> - <?php echo $nombre_practica;?></td>
	<td width="153">(<?php echo $nro_lab;?>) / <?php echo $lab_realizacion;?></td>
</tr>
</table>

<?php  $result5->MoveNext();

echo "<br>";
	}

?>
<tr>
    <td bgcolor="#FFFFFF"><div align="center"><?PHP echo $cod_mega;?></div></td>
   </tr>
  



<?php 




	
$result10->MoveNext();

	}


?>
</table>
