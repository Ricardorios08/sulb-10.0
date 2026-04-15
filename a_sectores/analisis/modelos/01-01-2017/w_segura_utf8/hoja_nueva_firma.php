<?php

if ($contador > 17){
	$pdf->AddPage();
	$contador = $cant_renglones;
	
			$a = "firma_segura1.jpg";
$pdf->Image('../../../logos/'.$a,145,105,35);

	}


  /*$cantidad_practicas;


if (($contador_de_practicas > 1) or ($contador_de_practicas < $cantidad_practicas)){
$pdf->AddPage();

}
*/

/*
$nro_contador = 20;
if ($contador >=$nro_contador){
$pdf->AddPage();
 }

 */
 ?>