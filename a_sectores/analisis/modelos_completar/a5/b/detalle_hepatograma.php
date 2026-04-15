<?php 
$pdf->AddPage();

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


$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'HEPATOGRAMA COMPLETO');
$pdf->SetFont('Arial','B',10);

$pdf->ln();
$pdf->Cell(40,10,'TRANSAMINASAS OXALACETICA (GOT-AST)');
$pdf->ln();
$pdf->SetFont($letra,'',10);
$pdf->Cell(20,5,"Resultado: ");
$pdf->SetFont($letra,'B',10);
$pdf->Cell(20,5,$aspartato." Ui/l");
$pdf->SetFont($letra,'',9);
$pdf->Setx(70);
$pdf->Cell(20,5,"V. de R.: ");
$pdf->Cell(40,5,"Hombres: hasta 37 Ui/l");
$pdf->Cell(40,5,"Mujeres: hasta 31 Ui/l");


///
$pdf->SetFont($letra,'B',10);
$pdf->ln();
$pdf->Cell(40,10,'TRANSAMINASAS PIRUVICA (GPT-ALT)');
$pdf->ln();
$pdf->SetFont($letra,'',10);
$pdf->Cell(20,5,"Resultado: ");
$pdf->SetFont($letra,'B',10);
$pdf->Cell(20,5,$alanina." Ui/l");
$pdf->SetFont($letra,'',9);
$pdf->Setx(70);
$pdf->Cell(20,5,"V. de R.: ");
$pdf->Cell(40,5,"Hombres: hasta 40 Ui/l");
$pdf->Cell(40,5,"Mujeres: hasta 31 Ui/l");

//
$pdf->ln();
$pdf->SetFont($letra,'B',10);
$pdf->Cell(40,10,'FOSFATASAS ALCALINAS');
$pdf->ln();
$pdf->SetFont($letra,'',10);
$pdf->Cell(20,5,"Resultado: ");
$pdf->SetFont($letra,'B',10);
$pdf->Cell(20,5,$fosfatasa." mU/ml");
$pdf->SetFont($letra,'',9);
$pdf->Setx(70);
$pdf->Cell(20,5,"V. de R.: ");
$pdf->Cell(40,5,"Adultos: hasta 150 mU/ml");
$pdf->Cell(40,5,"Niños y adolescentes: hasta 400 mU/ml");



//
$pdf->ln();
$pdf->SetFont($letra,'B',10);
$pdf->Cell(40,10,'BILIRRUBINEMIA');

$pdf->ln();
$pdf->SetFont($letra,'',10);
$pdf->Setx(44);
$pdf->Cell(20,5,"Resultado: ");
$pdf->Setx(70);
$pdf->Cell(30,5,"V. de R.: ");

$pdf->ln();
$pdf->Cell(35,5,"Bilirr. Directa ");
$pdf->SetFont($letra,'B',10);
$pdf->Cell(35,5,$directa." mg%");
$pdf->SetFont($letra,'',10);
$pdf->Setx(70);
$pdf->Cell(35,5,"hasta 0.20 mg%");

$pdf->ln();
$pdf->Cell(35,5,"Bilirr. Indirecta ");
$pdf->SetFont($letra,'B',10);
$pdf->Cell(35,5,$indirecta." mg%");
$pdf->SetFont($letra,'',10);
$pdf->Setx(70);
$pdf->Cell(35,5,"hasta 0.80 mg%");

$pdf->ln();
$pdf->Cell(35,5,"Bilirr. Total");
$pdf->SetFont($letra,'B',10);
$pdf->Cell(35,5,$total." mg%");
$pdf->SetFont($letra,'',10);
$pdf->Setx(70);
$pdf->Cell(35,5,"hasta 1.00 mg%");





?>