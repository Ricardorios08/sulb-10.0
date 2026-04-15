<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_proteino where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$albumina=strtoupper($result11->fields["albumina"]);
$alfa1=strtoupper($result11->fields["alfa1"]);
$alfa2=strtoupper($result11->fields["alfa2"]);
$beta=strtoupper($result11->fields["beta"]);
$gamma=strtoupper($result11->fields["gamma"]);
$relacion_ag=strtoupper($result11->fields["relacion_ag"]);
$proteinas_totales=strtoupper($result11->fields["proteinas_totales"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',8);
$pdf->Cell(40,10,'DETERMINACION: '.$nro_practica.' - '.$nombre_practica);
$pdf->SetFont('Arial','',8);
$pdf->ln();


$pdf->Cell(50,5,"",0);     
$pdf->Cell(50,5,"VALORES",0);   
$pdf->Cell(50,5,"HALLADOS",0);  
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(50,5,"Albumina",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$albumina,0);  
$pdf->Cell(50,5,"3.64 A 4.66 GR % [Adultos]",0);  
$pdf->ln();
//////
$pdf->Cell(50,5,"Alfa 1 globulina ",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$alfa1,0);  
$pdf->Cell(50,5,"0.17 A 0.33 GR % [Adultos]",0);  
$pdf->ln();

$pdf->Cell(50,5,"Alfa 2 globulina ",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$alfa2,0);  
$pdf->Cell(50,5,"0.53 A 0.75 GR % [Adultos]",0);  
$pdf->ln();

$pdf->Cell(50,5,"Beta globulina",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$beta,0);  
$pdf->Cell(50,5,"0.51 A 0.91 GR % [Adultos]",0);  
$pdf->ln();

$pdf->Cell(50,5,"Gamma globulina",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$gamma,0);  
$pdf->Cell(50,5,"0.84 A 1.68 GR % [Adultos] ",0);  
$pdf->ln();

$pdf->Cell(50,5,"Relacion a/g",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$relacion_ag,0);  
$pdf->Cell(50,5,"1.10 A 1.84 GR % [Adultos] ",0);  
$pdf->ln();

$pdf->Ln(); 
 $pdf->line(10,83,200,83);
$pdf->Cell(50,5,"PROTEINAS TOTALES",0);     
$pdf->Cell(50,5,"",0);   
$pdf->Cell(50,5,$proteinas_totales,0);  
$pdf->Cell(50,5,"",0);  
$pdf->ln();



/////////////////////////////

$pdf->Ln();
$pdf->Ln();
 $pdf->line(10,100,200,100);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
?>