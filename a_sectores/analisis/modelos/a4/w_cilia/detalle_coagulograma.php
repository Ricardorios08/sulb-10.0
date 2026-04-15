<?php 
//$pdf->AddPage();


 $sql11="select * from detalle_coagulograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$min=strtoupper($result11->fields["min"]);
$seg=strtoupper($result11->fields["seg"]);
$porcentaje=strtoupper($result11->fields["porcentaje"]);
$ttpk_seg=strtoupper($result11->fields["ttpk_seg"]);
$sangria=strtoupper($result11->fields["sangria"]);
$plaquetas=strtoupper($result11->fields["plaquetas"]);
$seg_coag=strtoupper($result11->fields["seg_coag"]);
$seg_sangria=strtoupper($result11->fields["seg_sangria"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


include ("practica.php");




$pdf->Cell(50,5,"Tiempo de coagulación:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(15,5,$min,0);
$pdf->Cell(20,5,'min. ',0);  
$pdf->Cell(10,5,$seg_coag,0);
$pdf->Cell(20,5,'seg. ',0); 


$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,' VR: Hasta 10 min.',0);  
$pdf->ln();

$pdf->Cell(50,5,"Tiempo de protombina:",0);  

if ($seg > 0){
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(15,5,$seg,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'Seg.',0); 
}


$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,round($porcentaje),0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,'%',0); 


$pdf->ln();


$pdf->Cell(50,5,"TTPK: ",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(15,5,$ttpk_seg,0);
$pdf->Cell(20,5,'seg.',0);  
$pdf->Cell(30,5,'',0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'seg. VR: de 30 a 45 seg.',0);  
$pdf->ln();


$pdf->Cell(50,5,"Tiempo de Sangría:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(15,5,$sangria,0);
$pdf->Cell(20,5,'min. ',0); 

$pdf->Cell(10,5,$seg_sangria,0);
$pdf->Cell(20,5,'seg. ',0);

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'min. VR: Hasta 5 min.',0);  




$pdf->ln();


$pdf->Cell(50,5,"Plaquetas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(15,5,$plaquetas,0);
$pdf->Cell(20,5,'mm3',0); 
$pdf->Cell(30,5,'',0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'VR: 130.000 a 400.000',0);  
$pdf->ln();
$pdf->ln();


 
?>