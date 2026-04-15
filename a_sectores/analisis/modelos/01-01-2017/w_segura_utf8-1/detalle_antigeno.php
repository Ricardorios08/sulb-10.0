<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_antigeno where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$enzima=utf8_decode(strtoupper($result11->fields["enzima"]));
$elisa=utf8_decode(strtoupper($result11->fields["elisa"]));
$razon_porcentual=utf8_decode(strtoupper($result11->fields["razon_porcentual"]));
$observaciones =utf8_decode(strtoupper($result11->fields["observaciones"]));



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=utf8_decode(strtoupper($result11->fields["practica"]));
$unidad=utf8_decode($result11->fields["unidad"]);



$pdf->SetFont('Arial','BI',12);
$pdf->Setx(30);
$pdf->Cell(40,10,'ANTIGENO PROSTATICO ESPECIFICO');
$pdf->SetFont('Arial','',10);
$pdf->ln();

$pdf->Setx(30);
$pdf->Cell(50,3,"Met. Enzimainmunoensayo",0);   

 
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(50,5,"Resultado: ",0);     
$pdf->Cell(50,5,$enzima,0);  
$pdf->Cell(50,5,"ng/ml",0);  
$pdf->ln();
 $pdf->Setx(30);

$pdf->SetFont('Arial','',7);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('Valores referenciales',$referencia1,$referencia2,$referencia3));
$pdf->Setx(30);
$pdf->Row(array('40 a 49 años: 0.02 a 2.50 ng/ml',$referencia1,'60 a 69 años: 0.00 a 5.40 ng/ml',$referencia3));
$pdf->Setx(30);
$pdf->Row(array('50 a 99 años: 0.00 a 3.50 ng/ml',$referencia1,'70 a 79 años: 0.00 a 6.30 ng/ml',$referencia3));



$pdf->Setx(30);
$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'ANTIGENO PROSTATICO ESPECIFICO LIBRE');
$pdf->SetFont('Arial','',10);
$pdf->ln();

   $pdf->Setx(30);
$pdf->Cell(50,5,"Met. Elisa",0);   
 
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(50,5,"Resultado",0);     
$pdf->Cell(50,5,$elisa,0);  
$pdf->Cell(50,5,"ng/ml",0);  
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(50,5,"Razón Porcentual:",0);     
$pdf->Cell(50,5,$razon_porcentual,0);  
$pdf->Cell(50,5,"ng/ml",0);  

//////
$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('Valor referenciales',$referencia1,$referencia2,$referencia3));
$pdf->Setx(30);
$pdf->Row(array('Con PSA TOTAL: 3-4 ng/ml',$referencia1,'Con PSA TOTAL: 4.1-10.0 ng/ml',$referencia3));
$pdf->Setx(30);
$pdf->Row(array('Razón Valor de Corte:',$referencia1,'Razón Valor de Corte:',$referencia3));
$pdf->Setx(30);
$pdf->Row(array('Inferior al 10% del PSA TOTAL',$referencia1,'Inferior al 26% del PSA TOTAL',$referencia3));



/////////////////////////////

$pdf->Ln();
 $pdf->Setx(30);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
?>