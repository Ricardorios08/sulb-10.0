<?php 

 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$metodo=strtoupper($result11->fields["metodo"]);
$unidad=$result11->fields["unidad"];


$tamanio = 12;
$pdf->SetX(30);
$pdf->SetFont($letra,'BU',$tamanio);
$pdf->Cell(40,10,$nombre_practica);
$tamanio = 9;
$pdf->SetFont($letra,'B',$tamanio);
$pdf->ln();

$pdf->SetX(30);
?>