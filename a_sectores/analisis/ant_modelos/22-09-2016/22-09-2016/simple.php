<?php 
//$pdf->AddPage();
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

   $sql2="select * from detalle join convenio_practica on (detalle.nro_practica = convenio_practica.cod_practica) where detalle.cod_grabacion = $cod_grabacion and imprimir = 1 and detalle.nro_practica != 1 GROUP BY detalle.nro_practica order by orden, cod_operacion";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {
 $cod_operacion_ultimo=strtoupper($result2->fields["cod_operacion"]);


$result2->MoveNext();

	}

 $cod_operacion_ultimo;
   $sql2="select * from detalle join convenio_practica on (detalle.nro_practica = convenio_practica.cod_practica) where detalle.cod_grabacion = $cod_grabacion and imprimir = 1 and detalle.nro_practica != 1 GROUP BY detalle.nro_practica order by orden, cod_operacion";
$result2 = $db->Execute($sql2);



if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {

$clase_guardada = $clase;

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
	$contador = 1;
}


if ($clase != $clase_guardada){
//	$pdf->AddPage();
			//$a = "firma_yapur.jpg";
// $pdf->Image('../../../logos/'.$a,145,80,42);
}

if (($clase == 1) and ($clase_guardada == 1)){
	//$pdf->AddPage();
		//	$a = "firma_yapur.jpg";
 //$pdf->Image('../../../logos/'.$a,145,80,42);
}

if (($clase == 2) and ($clase_guardada == 2)){
	//$pdf->AddPage();
		//	$a = "firma_yapur.jpg";
 //$pdf->Image('../../../logos/'.$a,145,80,42);
}

if (($clase == 3) and ($clase_guardada == 3)){
	$pdf->AddPage();
	$contador = 1;
		//	$a = "firma_yapur.jpg";
// $pdf->Image('../../../logos/'.$a,145,80,42);
}

if (($clase == 4) and ($clase_guardada == 4)){
	//$pdf->AddPage();
		//	$a = "firma_yapur.jpg";
// $pdf->Image('../../../logos/'.$a,145,80,42);
}

/*echo "<br>";
echo "clase: ".$clase;
echo "<br>";
echo "clase guardada: ".$clase_guardada;
echo "<br>";*/

if (($clase == 1) and ($clase_guardada == 4) ){
$pdf->AddPage();
$contador = 1;
}


if (($clase == 1) and ($clase_guardada == 0) ){
$pdf->AddPage();
$contador = 1;
}

if (($clase == 4) and ($clase_guardada == 1) ){
$pdf->AddPage();
$contador = 1;
}



switch ($clase){
case "0":{include ("comun.php");break;}
case "1":{include ("complejos.php"); $contador = 1;   break;}
case "2":{include ("modulos.php");break;}
case "3":{include ("texto.php");break;}
case "4":{include ("mostrar_complejos.php");break;}
}



if (($clase == 1) and ($clase_guardada == 0) or ($clase == 1) and ($clase_guardada == '') or ($clase == 4) and ($clase_guardada == '3')){
	//echo "clase".$clase;
if ($cod_operacion != $cod_operacion_ultimo){
$pdf->AddPage();
}

$contador = 1;
}




$result2->MoveNext();

	}
