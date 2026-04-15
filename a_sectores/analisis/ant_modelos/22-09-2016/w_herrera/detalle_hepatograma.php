<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_hepatograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$aspartato=strtoupper($result11->fields["aspartato"]);
$alanina=strtoupper($result11->fields["alanina"]);

$fosfatasa=strtoupper($result11->fields["fosfatasa"]);
$total=strtoupper($result11->fields["total"]);

$directa=strtoupper($result11->fields["directa"]);
$indirecta=strtoupper($result11->fields["indirecta"]);


$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


include ("practica.php");   

$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"AST - GOT",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$aspartato,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);
$pdf->SetFont($letra,'',9);
$pdf->Cell(60,5,"V.R. Hasta 34 U/l",0); 
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);

$pdf->SetFont($letra,'',10);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"ALT - GPT",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$alanina,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);

$pdf->SetFont($letra,'',9);
$pdf->Cell(60,5,"V.R. Hasta 55 U/l",0); 
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);


$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"FAL",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$fosfatasa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);
$pdf->SetFont($letra,'',9);

$pdf->Cell(60,5,"V.R. Adultos hasta 150 U/l. Niños: hasta 300 U/l",0); 
$pdf->Ln(); 

$pdf->Ln(); 
$pdf->SetX(30);




$pdf->Ln(); 
$pdf->SetX(30);
if (($directa > 0) or ($indirecta > 0) or ($total > 0)){
$pdf->SetFont($letra,'BIU',10);
$pdf->Cell(80,5,"BILIRRUBINA",0); 
$pdf->SetFont($letra,'',10);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);
}


if ($directa > 0){
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"CONJUGADA",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$directa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/L",0);
$pdf->SetFont($letra,'',9);
$pdf->Cell(60,5,"V.R. Hasta 4.00 mg/L",0); 
$pdf->Ln(); 
}



if ($indirecta > 0){
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"NO CONJUGADA",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$indirecta,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/L ",0);

$pdf->Cell(60,5,"",0);
$pdf->Ln(); 
}





if ($total > 0){


$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"TOTAL",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$total,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/L",0);
$pdf->SetFont($letra,'',9);
 $pdf->Cell(60,5,"V.R. Hasta 10.00 mg/L",0); 
$pdf->Ln(); 
}









?>