<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_fosforo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


include ("practica.php");
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(30,5,"Diuresis de 24 hs: ",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$diuresis."  lts",0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->ln();
$pdf->SetX(30);

 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$valor_hallado."  mg/24 hs",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"",0);  
$pdf->ln();
$pdf->ln();


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if ($desde == 0.00){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 

//Table with 20 rows and 4 columns
$pdf->SetWidths(array(90,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->SetX(60);
$pdf->Row(array("V.R:  0.40 - 1.36  mg/24 hs "));
$pdf->ln();




 



$pdf->ln();
$pdf->Ln();

IF ($observaciones != ""){
	$pdf->SetX(30);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
}


?>