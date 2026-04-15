<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_coagulograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$min=strtoupper($result11->fields["min"]);
$seg=strtoupper($result11->fields["seg"]);
$porcentaje=strtoupper($result11->fields["porcentaje"]);
$ttpk_seg=strtoupper($result11->fields["ttpk_seg"]);
$sangria=strtoupper($result11->fields["sangria"]);
$plaquetas=strtoupper($result11->fields["plaquetas"]);


$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


include ("practica.php");
$tamanio = 11;

$pdf->SetFont($letra,'',$tamanio);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,26,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('','VALOR HALLADO',$referencia2,''));
$pdf->ln();


$pdf->Cell(50,10,"Tiempo de coagulación:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$min,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,10,'min. VR: de 5 - 10 min.',0);  
$pdf->ln();
$pdf->ln();

$pdf->Cell(50,10,"Tiempo de protombina:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$porcentaje,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,'%. VR: de 80 a 120%',0); 

if ($seg > 0){
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$seg,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,10,'Seg.',0); 
}
$pdf->ln();
$pdf->ln();

$pdf->Cell(50,10,"TTPK: ",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$ttpk_seg,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,10,'seg. VR: de 35 a 45 seg.',0);  
$pdf->ln();
$pdf->ln();


$pdf->Cell(50,10,"Tiempo de Sangría:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$sangria,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,10,'min. VR: Hasta 4 min.',0);  
$pdf->ln();
$pdf->ln();

$pdf->Cell(50,10,"Plaquetas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$sangria,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,10,'mm3. ',0);  
$pdf->ln();
$pdf->ln();


 
?>