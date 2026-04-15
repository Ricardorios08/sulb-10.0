<?php 

//$aa = " | banderin ".$banderin." |clase ".$clase." |practica ".$nro_practica." |contador ".$contador;

//$aa = "+++".$cantidad_renglones;
 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=utf8_decode(strtoupper($result11->fields["practica"]));
$unidad=utf8_decode($result11->fields["unidad"]);

$pdf->SetFont('ARIAL','BI',12);

$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
$pdf->SetX(30);
$pdf->Cell(160,5,$nombre_practica.$aa ,0,0,'L',false); 

$pdf->SetFont('');
$pdf->ln();




?>