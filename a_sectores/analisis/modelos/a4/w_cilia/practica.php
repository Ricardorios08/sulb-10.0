<?php 

if ($contador >= 45){
$pdf->AddPage();
	$contador = 1;


}


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$metodo=strtoupper($result11->fields["metodo"]);
$unidad=$result11->fields["unidad"];

$pdf->ln();
$letra = "ARIAL";
$pdf->SetFont($letra,'BI',12);

$pdf->Cell(40,5,$nombre_practica);
$tamanio = 9;
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();

if  ($metodo != ""){
$pdf->Cell(40,5,"Método: ".$metodo);
$pdf->ln();
}


?>