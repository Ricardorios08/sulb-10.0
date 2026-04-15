<?php 
//$pdf->AddPage();

$pdf->Ln();

$sql11="select * from detalle_coombs where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$salino=utf8_decode($result11->fields["salino"]);
$albuminoso=utf8_decode($result11->fields["albuminoso"]);
$coombs=utf8_decode($result11->fields["coombs"]);
 
$observaciones=utf8_decode($result11->fields["observaciones"]);




include ("practica.php");

	$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(90,5,'AGLUTININAS ANTI RH EN MEDIO SALINO:');
$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(30,5,"RESULTADO: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(80,5,$salino,0); 
$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(90,5,'AGLUTININAS ANTI RH EN MEDIO ALBUMINOSO:');
$pdf->ln();
$pdf->Setx(30);

$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(30,5,"RESULTADO: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(80,5,$albuminoso,0); 
$pdf->ln();
$pdf->ln();
$pdf->Setx(30);


$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(90,5,'TEST DE COOMBS INDIRECTO');
$pdf->ln();
$pdf->Setx(30);


$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(30,5,"RESULTADO: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(80,5,$coombs,0); 
$pdf->ln();
$pdf->ln();
 
$pdf->Setx(30);
 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(20,5,"Nota: ",0);     
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(100,5,$observaciones,0);


  

?>