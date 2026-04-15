<?php 

 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$metodo=strtoupper($result11->fields["metodo"]);
$unidad=$result11->fields["unidad"];

	$pdf->SetX(30);
$tamanio = 12;
$pdf->SetFont('Arial','BI',$tamanio);
$pdf->Cell(40,5,$nombre_practica);
$tamanio = 9;
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();
	$pdf->SetX(30);
if  ($metodo != ""){
$pdf->Cell(40,5,"Método: ".$metodo);
}


$pdf->ln();
?>