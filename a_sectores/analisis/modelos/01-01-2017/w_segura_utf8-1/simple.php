<?php 
////$pdf->AddPage();
//$pdf->Ln();
 
  $sql2="select * from detalle join convenio_practica on (detalle.nro_practica = convenio_practica.cod_practica) where detalle.cod_grabacion = $cod_grabacion and imprimir = 1 GROUP BY detalle.nro_practica order by orden, cod_operacion";
$result2 = $db->Execute($sql2);



if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {

$clase_guardada = $clase;
$con = $con +1;

$nro_os=utf8_decode(strtoupper($result2->fields["nro_os"]));
$nro_paciente=utf8_decode(strtoupper($result2->fields["nro_paciente"]));
$periodo=utf8_decode(strtoupper($result2->fields["periodo"]));
$marca=utf8_decode(strtoupper($result2->fields["marca"]));
$lote=utf8_decode(strtoupper($result2->fields["lote"]));
$cod_operacion=utf8_decode(strtoupper($result2->fields["cod_operacion"]));
$año=utf8_decode(strtoupper($result2->fields["ano"]));
$nro_afiliado=utf8_decode($result2->fields["nro_afiliado"]);
$nro_orden=utf8_decode($result2->fields["nro_orden"]);
$autorizacion=utf8_decode(strtoupper($result2->fields["autorizacion"]));
$operador=utf8_decode(strtoupper($result2->fields["operador"]));
$cod_grabacion=utf8_decode(strtoupper($result2->fields["cod_grabacion"]));
$fecha_grabacion=utf8_decode(strtoupper($result2->fields["fecha_grabacion"]));
$fecha=utf8_decode(strtoupper($result2->fields["fecha"]));
$matricula=utf8_decode(strtoupper($result2->fields["matricula"]));
$prescriptor=utf8_decode(strtoupper($result2->fields["medico"]));
$confirmada=utf8_decode(strtoupper($result2->fields["confirmada"]));
$nro_practica=utf8_decode(strtoupper($result2->fields["nro_practica"]));
$medico=utf8_decode(strtoupper($result2->fields["medico"]));
$clase=utf8_decode(strtoupper($result2->fields["clase"]));
$nro_ref=utf8_decode(strtoupper($result2->fields["nro_ref"]));
 $decimal=utf8_decode(strtoupper($result2->fields["decimal"]));
$enter=utf8_decode(strtoupper($result2->fields["enter"]));

if ($enter == 1){
	$pdf->AddPage();
}

//echo $contador;
//echo "<br>";

/*
if ($contador >= 20){
$pdf->AddPage();
	$contador = 1;

}
if ($clase != $clase_guardada){
	$pdf->AddPage();
}

if (($clase == 1) and ($clase_guardada == 1)){
	$pdf->AddPage();
}


if (($clase($clase == 1) == 1) and ($clase_guardada == 1) and ($nro_practica == 711)){
	$pdf->AddPage();
}

if (($clase == 2) and ($clase_guardada == 2)){
	$pdf->AddPage();
}

if (($clase == 3) and ($clase_guardada == 3)){
	$pdf->AddPage();
}

if (($clase == 4) and ($clase_guardada == 4)){
	$pdf->AddPage();
}


*/
	

switch ($clase){
case "0":{
	$has_contador = 22;
	if ($contador >= $has_contador) {
	$pdf->AddPage();
	$contador = 0;
	}
include ("comun.php");break;}
case "1":{include ("complejos.php");  break;}
case "2":{$has_contador = 17;
	if ($contador >= 1) {
	$pdf->AddPage();
	$contador = 0;
	}
	include ("modulos.php");break;}
case "3":{include ("texto.php");break;}
case "4":{include ("mostrar_complejos.php");break;}
}



$result2->MoveNext();

	}
