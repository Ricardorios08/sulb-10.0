<?php 

 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$metodo=strtoupper($result11->fields["metodo"]);
$unidad=$result11->fields["unidad"];



$pdf->SetFont('ARIAL','BI',12);

$pdf->SetFillColor(255,200,100);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(0);
$pdf->SetFont('','B');

$pdf->Cell(130,5,$nombre_practica,1,0,'L',true); 

$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);


$pdf->SetFont('ARIAL','',10);
$pdf->ln();

if  ($metodo != ""){
$pdf->Cell(40,5,"Método: ".$metodo);
}


$pdf->ln();
?>