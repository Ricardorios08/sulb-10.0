<?php 
//$pdf->AddPage();

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
$observaciones =$result11->fields["observaciones"];
$observaciones1 =$result11->fields["observaciones1"];
$globulina =strtoupper($result11->fields["globulina"]);

$uni_albumina =strtoupper($result11->fields["uni_albumina"]);
$uni_globulina =strtoupper($result11->fields["uni_globulina"]);
$uni_alfa1 =strtoupper($result11->fields["uni_alfa1"]);
$uni_alfa2 =strtoupper($result11->fields["uni_alfa2"]);
$uni_beta =strtoupper($result11->fields["uni_beta"]);
$uni_gamma =strtoupper($result11->fields["uni_gamma"]);
$uni_relacion_ag =strtoupper($result11->fields["uni_relacion_ag"]);
$uni_totales =strtoupper($result11->fields["uni_totales"]);

 
$globulina = $alfa1 + $alfa2 + $beta + $gamma;


include ("practica.php");


$tamanio = 9;



 

$unidad = "g/l "; 
$vr = "V.R: 66.00 ".$unidad." - 85.00 ".$unidad; 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"PROTEINAS TOTALES",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$proteinas_totales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);




$pdf->ln();
$pdf->ln();


if ($uni_albumina == 0){
$res_gl_a =round(($albumina * $proteinas_totales) / 100,2);
$res_porc_a = $albumina;
}ELSE{
$res_porc_a =round((($albumina * 100)/ $proteinas_totales),2);
$res_gl_a = $albumina;
}


$unidad = "g/l ";
$vr = "V.R: 35.00 ".$unidad." - 50.00 ".$unidad; 
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Albumina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$albumina,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);

$pdf->ln();

$globulina = $proteinas_totales - $albumina;
if ($uni_globulina == 0){
$res_gl_g =round(($globulina * $proteinas_totales) / 100,2);
$res_porc_g = $globulina;
}ELSE{
$res_porc_g =round((($globulina * 100)/ $proteinas_totales),2);
$res_gl_g = $globulina;
}
$unidad = "g/l ";
$vr = "V.R: 23.80 ".$unidad." - 33.60 ".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$globulina,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();


//////

if ($uni_alfa1 == 0){
$res_gl =round(($alfa1 * $proteinas_totales) / 100,2);
$res_porc = $alfa1;
}ELSE{
$res_porc =round((($alfa1 * 100)/ $proteinas_totales),2);
$res_gl = $alfa1;
}
$unidad = "g/l ";
$vr = "V.R:  1.70 ".$unidad." -  3.30  ".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Alfa 1 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$alfa1,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();


if ($uni_alfa2 == 0){
$res_gl =round(($alfa2 * $proteinas_totales) / 100,2);
$res_porc = $alfa2;
}ELSE{
$res_porc =round((($alfa2 * 100)/ $proteinas_totales),2);
$res_gl = $alfa2;
}
$unidad = "g/l ";
$vr = "V.R:  5.30 ".$unidad." -  7.50  ".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Alfa 2 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$alfa2,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);

$pdf->ln();


if ($uni_beta == 0){
$res_gl =round(($beta * $proteinas_totales) / 100,2);
$res_porc = $beta;
}ELSE{
$res_porc =round((($beta * 100)/ $proteinas_totales),2);
$res_gl = $beta;
}
$unidad = "g/l ";
$vr = "V.R:  5.10 ".$unidad." -  9.10  ".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Beta Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$beta,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);

$pdf->ln();


if ($uni_gamma == 0){
$res_gl =round(($gamma * $proteinas_totales) / 100,2);
$res_porc = $gamma;
}ELSE{
$res_porc =round((($gamma * 100)/ $proteinas_totales),2);
$res_gl = $gamma;
}
$unidad = "g/l ";
$vr = "V.R:  8.40 ".$unidad." - 16.80 ".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Gamma Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$gamma,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();


 
 
$unidad = "g/l ";
$vr = "V.R:  1.20 ".$unidad." -  2.20  ".$unidad;
$todo = $unidad.$vr.$unidad;
$res = round(($res_porc_a / $res_porc_g),2);
 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Relacion A/G",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
 
$pdf->Cell(45,5,$vr,0);  
$pdf->ln();


 





/////////////////////////////

$pdf->Ln();

$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Ln();
 
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(60,6,$observaciones,0);
$pdf->Ln();
$pdf->Cell(60,6,$observaciones1,0);

?>