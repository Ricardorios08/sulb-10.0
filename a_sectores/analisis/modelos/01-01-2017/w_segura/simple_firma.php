<?php 
////$pdf->AddPage();
//$pdf->Ln();

switch ($modelo){
	case "A":{
$nombre_fichero = '../../../prueba/firma_a.jpg';
if (file_exists($nombre_fichero)) {
$firma = "../../../prueba/firma_a.jpg";
} else {
$firma = "../../../logos/blanco.jpg";
}
break;
	}

	case "B":{
$nombre_fichero = '../../../prueba/firma_b.jpg';
if (file_exists($nombre_fichero)) {
$firma = "../../../prueba/firma_b.jpg";
} else {
$firma = "../../../logos/blanco.jpg";
}
break;
	}

	case "C":{
$nombre_fichero = '../../../prueba/firma_c.jpg';
if (file_exists($nombre_fichero)) {
$firma = "../../../prueba/firma_c.jpg";
} else {
$firma = "../../../logos/blanco.jpg";
}
break;
	}

	case "D":{
$nombre_fichero = '../../../prueba/firma_d.jpg';
if (file_exists($nombre_fichero)) {
$firma = "../../../prueba/firma_d.jpg";
} else {
$firma = "../../../logos/blanco.jpg";
}
break;
	}

}

 
  $sql2="select * from detalle join convenio_practica on (detalle.nro_practica = convenio_practica.cod_practica) where detalle.cod_grabacion = $cod_grabacion and imprimir = 1 GROUP BY detalle.nro_practica order by orden, cod_operacion";
$result2 = $db->Execute($sql2);



if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {

$clase_guardada = $clase;
$con = $con +1;

$nro_os=strtoupper($result2->fields["nro_os"]);
$nro_paciente=strtoupper($result2->fields["nro_paciente"]);
$periodo=strtoupper($result2->fields["periodo"]);
$marca=strtoupper($result2->fields["marca"]);
$lote=strtoupper($result2->fields["lote"]);
$cod_operacion=strtoupper($result2->fields["cod_operacion"]);
$año=strtoupper($result2->fields["ano"]);
$nro_afiliado=$result2->fields["nro_afiliado"];
$nro_orden=$result2->fields["nro_orden"];
$autorizacion=strtoupper($result2->fields["autorizacion"]);
$operador=strtoupper($result2->fields["operador"]);
$cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);
$fecha_grabacion=strtoupper($result2->fields["fecha_grabacion"]);
$fecha=strtoupper($result2->fields["fecha"]);
$matricula=strtoupper($result2->fields["matricula"]);
$prescriptor=strtoupper($result2->fields["medico"]);
$confirmada=strtoupper($result2->fields["confirmada"]);
$nro_practica=strtoupper($result2->fields["nro_practica"]);
$medico=strtoupper($result2->fields["medico"]);
$clase=strtoupper($result2->fields["clase"]);
$nro_ref=strtoupper($result2->fields["nro_ref"]);
 $decimal=strtoupper($result2->fields["decimal"]);
$enter=strtoupper($result2->fields["enter"]);

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
	$a = "firma_segura1.jpg";
$pdf->Image('../../../logos/'.$a,145,105,35);
	$contador = 0;
	}
include ("comun.php");break;}
case "1":{include ("complejos_firma.php");  break;}
case "2":{$has_contador = 17;
	if ($contador >= 1) {
	$pdf->AddPage();
		$a = "firma_segura1.jpg";
$pdf->Image('../../../logos/'.$a,145,105,35);
	$contador = 0;
	}
	include ("modulos.php");break;}
case "3":{include ("texto.php");break;}
case "4":{include ("mostrar_complejos.php");break;}
}



$result2->MoveNext();

	}

$a = "firma_segura1.jpg";
$pdf->Image('../../../logos/'.$a,145,105,35);