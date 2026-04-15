<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_calcio where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$tamanio = 11;
INCLUDE ("practica.php");

$pdf->ln();


$pdf->Cell(50,3,"Metodo o-cresolftaleina complexona",0);   

$pdf->ln();

$pdf->ln();

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(80,5,"Diuresis de 24 hs. ",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$diuresis,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"ml",0);
$pdf->Ln(); 

 

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(80,5,"V. Hallado ",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,$valor_hallado,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mg/24 hs",0);
$pdf->Ln(); 

$pdf->ln();

$pdf->ln();

$pdf->Cell(50,5,"Valores Referenciales: ",0);   
$pdf->ln();

$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


$pdf->Row(array('Dieta pobre en calcio: ','5.00 a 40.00','mg/24 hs',$referencia3));
$pdf->Row(array('Dieta media: ','50.00 a 150.00','mg/24 hs',$referencia3));
$pdf->Row(array('Dieta rica en calcio: ','100.00 a 300.00','mg/24 hs',$referencia3));


$pdf->ln();
$pdf->Ln();
$pdf->ln();

if ($observaciones != ""){
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
}


?>