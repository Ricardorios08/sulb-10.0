<?php 

 
$unidad = "g/l "; 
$vr = "V.R: 65.0 ".$unidad." - 80.0 ".$unidad; 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"PROTEINAS TOTALES",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$proteinas_totales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);

$unidad = "% ";
$vr = "V.R: 53.0 - 65.0 ".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Albumina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_porc_a,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);

$pdf->ln();
$unidad = "% ";
$vr = " ";
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_gl_g,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();

$pdf->Cell(40,5,"",0); 
$unidad = "% ";
$vr = "V.R:  2 -  5 ".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Alfa 1 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_porc,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);

$pdf->ln();
$pdf->Cell(40,5,"",0); 
$unidad = "% ";
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Alfa 2 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_porc,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);

$pdf->ln();
$pdf->Cell(40,5,"",0); 
$unidad = "% ";
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Beta Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_porc,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);

$pdf->ln();
$pdf->Cell(40,5,"",0); 
$unidad = "% ";
$vr = "V.R: 11 ".$unidad." - 21 ".$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Gamma Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_porc,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);

$pdf->ln();
$unidad = "";
$vr = "V.R: 1.20 - 2.20";
$todo = $unidad.$vr.$unidad;
$res = round(($res_porc_a / $res_porc_g),2);
 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Relacion A/G",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->SetX(72);
$pdf->Cell(50,5,$vr,0);  
$pdf->ln();


 

?>