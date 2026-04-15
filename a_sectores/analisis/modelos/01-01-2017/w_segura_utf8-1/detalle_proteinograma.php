<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_proteino where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$albumina=utf8_decode(strtoupper($result11->fields["albumina"]));
$alfa1=utf8_decode(strtoupper($result11->fields["alfa1"]));
$alfa2=utf8_decode(strtoupper($result11->fields["alfa2"]));
$beta=utf8_decode(strtoupper($result11->fields["beta"]));
$beta2=utf8_decode(strtoupper($result11->fields["beta2"]));
$gamma=utf8_decode(strtoupper($result11->fields["gamma"]));
$relacion_ag=utf8_decode(strtoupper($result11->fields["relacion_ag"]));
$proteinas_totales=utf8_decode(strtoupper($result11->fields["proteinas_totales"]));
$observaciones =utf8_decode($result11->fields["observaciones"]);
$observaciones1 =utf8_decode($result11->fields["observaciones1"]);
$globulina =utf8_decode(strtoupper($result11->fields["globulina"]));

$uni_albumina =utf8_decode(strtoupper($result11->fields["uni_albumina"]));
$uni_globulina =utf8_decode(strtoupper($result11->fields["uni_globulina"]));
$uni_alfa1 =utf8_decode(strtoupper($result11->fields["uni_alfa1"]));
$uni_alfa2 =utf8_decode(strtoupper($result11->fields["uni_alfa2"]));
$uni_beta =utf8_decode(strtoupper($result11->fields["uni_beta"]));
$uni_beta2 =utf8_decode(strtoupper($result11->fields["uni_beta2"]));
$uni_gamma =utf8_decode(strtoupper($result11->fields["uni_gamma"]));
$uni_relacion_ag =utf8_decode(strtoupper($result11->fields["uni_relacion_ag"]));
$uni_totales =utf8_decode(strtoupper($result11->fields["uni_totales"]));

 
 $globulina = $alfa1 + $alfa2 + $beta + $gamma + $beta2;

 
 $globulina = $alfa1 + $alfa2 + $beta + $gamma;


include ("practica.php");


$tamanio = 9;


$pdf->SetX(30);
 

$unidad = "g/l "; 
$vr = "V.R: 65.0 ".$unidad." - 80.0 ".$unidad; 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"PROTEINAS TOTALES",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$proteinas_totales,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);




$pdf->ln();
$pdf->ln();
$pdf->SetX(30);

if ($uni_albumina == 0){
$res_gl_a =round(($albumina * $proteinas_totales) / 100,2);
$res_porc_a = $albumina;
}ELSE{
$res_porc_a =round((($albumina * 100)/ $proteinas_totales),2);
$res_gl_a = $albumina;
}


$unidad = "g/l ";
$vr = "V.R: 32.0 ".$unidad." - 52.0 ".$unidad; 
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Albumina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_gl_a,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$unidad = "% ";
$vr = "V.R: 53.0 ".$unidad." - 65.0 ".$unidad;
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$res_porc_a,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();
$pdf->SetX(30);


if ($uni_albumina == 0){
$res_gl_g =($globulina * $proteinas_totales) / 100;
$res_porc_g = $globulina;
}ELSE{
$res_porc_g =(($globulina * 100)/ $proteinas_totales);
$res_gl_g = $globulina;
}
$unidad = "g/l ";
$vr = "";
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,number_format($res_gl_g,2),0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$unidad = "% ";
$vr = "";
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,number_format($res_porc_g,2),0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();
$pdf->SetX(30);




//////

if ($uni_alfa1 == 0){
$res_gl =round(($alfa1 * $proteinas_totales) / 100,2);
$res_porc = $alfa1;
}ELSE{
$res_porc =round((($alfa1 * 100)/ $proteinas_totales),2);
$res_gl = $alfa1;
}
$unidad = "g/l ";
$vr = "V.R: 1.2 ".$unidad." - 4.0 ".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Alfa 1 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_gl,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$unidad = "% ";
$vr = "V.R: 2 ".$unidad." - 5 ".$unidad;
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$res_porc,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();
$pdf->SetX(30);

if ($uni_alfa2 == 0){
$res_gl =round(($alfa2 * $proteinas_totales) / 100,2);
$res_porc = $alfa2;
}ELSE{
$res_porc =round((($alfa2 * 100)/ $proteinas_totales),2);
$res_gl = $alfa2;
}
$unidad = "g/l ";
$vr = "V.R: 4.8 ".$unidad." - 11.2".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Alfa 2 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_gl,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$unidad = "% ";
$vr = "V.R: 8 ".$unidad." - 14 ".$unidad;
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$res_porc,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();
$pdf->SetX(30);

if ($uni_beta == 0){
$res_gl =round(($beta * $proteinas_totales) / 100,2);
$res_porc = $beta;
}ELSE{
$res_porc =round((($beta * 100)/ $proteinas_totales),2);
$res_gl = $beta;
}
$unidad = "g/l ";
$vr = "V.R: 6.0 ".$unidad." - 12.0".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Beta Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_gl,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$unidad = "% ";
$vr = "V.R: 10 ".$unidad." - 15 ".$unidad;
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$res_porc,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();
$pdf->SetX(30);

if ($uni_gamma == 0){
$res_gl =round(($gamma * $proteinas_totales) / 100,2);
$res_porc = $gamma;
}ELSE{
$res_porc =round((($gamma * 100)/ $proteinas_totales),2);
$res_gl = $gamma;
}
$unidad = "g/l ";
$vr = "V.R: 6.6 ".$unidad." - 16.8".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Gamma Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res_gl,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$unidad = "% ";
$vr = "V.R: 11 ".$unidad." - 21 ".$unidad;
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$res_porc,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(45,5,$vr,0);
$pdf->ln();
$pdf->SetX(30);

 
 
$unidad = "";
$vr = "";
$todo = $unidad.$vr.$unidad;
$res = round(($res_porc_a / $res_porc_g),2);
 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Relacion A/G",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$res,0,0,'R'); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->SetX(100);
$pdf->Cell(50,5,$vr,0);  
$pdf->ln();
$pdf->SetX(30);

 





/////////////////////////////

$pdf->Ln();
$pdf->SetX(30);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Ln();
$pdf->SetX(30); 
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(60,6,$observaciones,0);
$pdf->Ln();
$pdf->SetX(30);
$pdf->Cell(60,6,$observaciones1,0);

?>