<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_antigeno where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$enzima=strtoupper($result11->fields["enzima"]);
$elisa=strtoupper($result11->fields["elisa"]);
$razon_porcentual=strtoupper($result11->fields["razon_porcentual"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$tamanio = 10;
 
$pdf->SetX(30);

$pdf->SetFont($letra,'BU',12);
$pdf->Cell(100,5,"ANTIGENO PROSTATICO ESPECIFICO TOTAL",0);     
$pdf->Ln(); 

$pdf->SetFont($letra,'',8);
$pdf->SetX(30);
$pdf->Cell(60,5,"Método: Quimioluminiscencia",0);     
$pdf->Ln(); 
$pdf->Ln(); 

$pdf->SetX(30);
$pdf->SetFont($letra,'',10);
$pdf->Cell(30,5,"Resultado: ");
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$enzima,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"ng/ml ",0);
$pdf->Ln(); 


$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(45,70));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


$columna1 = "0 a 49 años:";
$desde = "Hasta ";
$hasta = 2.60;
$unidad = "ng/ml";
$pdf->SetX(100); 
$pdf->Row_i(array($columna1." ".$columna2, $desde.' '.$hasta.'  '.$unidad));

$columna1 = "50 a 59 años:";
$desde = "Hasta ";
$hasta = 3.90;
$unidad = "ng/ml";
$pdf->SetX(100); 
$pdf->Row_i(array($columna1." ".$columna2, $desde.' '.$hasta.'  '.$unidad));

$columna1 = "60 a 69 años:";
$desde = "Hasta ";
$hasta = 4.90;
$unidad = "ng/ml";
$pdf->SetX(100); 
$pdf->Row_i(array($columna1." ".$columna2, $desde.' '.$hasta.'  '.$unidad));

$columna1 = "70 a 79 años:";
$desde = "Hasta ";
$hasta = 7.70;
$unidad = "ng/ml";
$pdf->SetX(100); 
$pdf->Row_i(array($columna1." ".$columna2, $desde.' '.$hasta.'  '.$unidad));

$columna1 = "Zona indefinida:";
$desde = "Hasta ";
$hasta = 10;
$unidad = "ng/ml";
$pdf->SetX(100); 
$pdf->Row_i(array($columna1." ".$columna2, $desde.' '.$hasta.'  '.$unidad));



$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);

$pdf->SetFont($letra,'BU',12);
$pdf->Cell(100,5,"ANTIGENO PROSTATICO ESPECIFICO LIBRE",0); 
$pdf->SetFont($letra,'BU',12);
$pdf->Ln(); 
$pdf->SetFont($letra,'',8);
$pdf->SetX(30);
$pdf->Cell(60,5,"Método: Quimioluminiscencia",0);     
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',10);
$pdf->Cell(30,5,"Resultado: ");
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$elisa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"ng/ml ",0);

$relacion = round($elisa/$enzima,2);

$rel = $relacion *100;
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',10);
$pdf->Cell(30,5,"Porcentaje: ");
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$rel,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"% ",0);

$pdf->Ln(); 
$pdf->sETx(100);
$pdf->Cell(30,5,"Para PSA entre 0 y 4. Mayor o Igual al 10% del PSA TOTAL");
$pdf->Ln(); 
$pdf->sETx(100);
$pdf->Cell(30,5,"Para PSA entre 4 y 10. Mayor o Igual al 26% del PSA TOTAL");

$pdf->Ln(); 




$pdf->Ln(); 


/////////////////////////////

if ($observaciones != ""){
 $pdf->SetX(30);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
}


?>