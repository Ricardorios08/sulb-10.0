<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_espermograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$color=utf8_decode($result11->fields["color"]);
$grumos=utf8_decode($result11->fields["grumos"]);
$viscocidad=utf8_decode($result11->fields["viscocidad"]);
$volumen=utf8_decode($result11->fields["volumen"]);
$ph=utf8_decode($result11->fields["ph"]);

$espermatozoides=utf8_decode($result11->fields["espermatozoides"]);
$celulas=utf8_decode($result11->fields["celulas"]);
$leucocitos=utf8_decode($result11->fields["leucocitos"]);
$piocitos=utf8_decode($result11->fields["piocitos"]);
$hematies=utf8_decode($result11->fields["hematies"]); 

$nro_espermatozoides=utf8_decode($result11->fields["nro_espermatozoides"]); 

$grado_a=utf8_decode($result11->fields["grado_a"]);
$grado_b=utf8_decode($result11->fields["grado_b"]);
$grado_c=utf8_decode($result11->fields["grado_c"]);
$grado_d=utf8_decode($result11->fields["grado_d"]);

$normales=utf8_decode($result11->fields["normales"]);
$anomalias_cabeza=utf8_decode($result11->fields["anomalias_cabeza"]);
$anomalias_segmentado=utf8_decode($result11->fields["anomalias_segmentado"]);
$anomalias_cola=utf8_decode($result11->fields["anomalias_cola"]);




include ("practica.php");



$pdf->Setx(30);
 
$pdf->SetFont('ARIAL','',$tamanio);
$pdf->Cell(80,5,"EXAMEN MACROSCOPICO",0);  
$pdf->ln();
$pdf->Setx(30);
 
$pdf->SetFont('ARIAL','',$tamanio);

$pdf->Cell(30,5,"Color:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$color,0);

$pdf->sETx(100);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"Volumen:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$volumen,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"ml",0);  
$pdf->ln();
$pdf->Setx(30);
 

$pdf->Cell(30,5,"Grumos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$grumos,0);

$pdf->sETx(100);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"pH:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$ph,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();
$pdf->Setx(30);
 

$pdf->Cell(30,5,"Viscocidad:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$viscocidad,0);
$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(80,5,"EXAMEN MICROSCOPICO (Por campo de 400 X)",0);  

$pdf->SetFont($letra,'',$tamanio);
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(30,5,"Espermatozoides:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$espermatozoides,0);

$pdf->sETx(100);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"Piocitos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$piocitos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();
$pdf->Setx(30);
 

$pdf->Cell(30,5,"Celulas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$celulas,0);

$pdf->sETx(100);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"Hematíes:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$hematies,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();
$pdf->Setx(30);
 

$pdf->Cell(30,5,"Leucocitos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$leucocitos,0);
$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
 

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(70,5,"NUMERO DE ESPERMATOZOIDES POR ml.:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(25,5,$nro_espermatozoides,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(80,5,"(V.R: 60 - 90 MILLONES POR ml)",0);  
$pdf->ln();

$pdf->ln();
$pdf->Setx(30);
 

$pdf->Cell(100,5,"MOTILIDAD (V.N: A+ B Mayor a 45%",0);  
 $pdf->Cell(60,5,"FORMULA ESPERMATICA",0);  
$pdf->ln();
$pdf->Setx(30);
 



$pdf->Cell(30,5,"Grado a:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$grado_a,0,0,'R');
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0); 

$pdf->Cell(50,5,"Normales:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$normales,0,0,'R');
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();
$pdf->Setx(30);
 


$pdf->Cell(30,5,"Grado b:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$grado_b,0,0,'R');
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0); 

$pdf->Cell(50,5,"Anomalias de Cabeza:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$anomalias_cabeza,0,0,'R');
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();
$pdf->Setx(30);
 

$pdf->Cell(30,5,"Grado c:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$grado_c,0,0,'R');
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0); 

$pdf->Cell(50,5,"Anomalias seg. intermedio:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$anomalias_segmentado,0,0,'R');
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();
$pdf->Setx(30);
 

$pdf->Cell(30,5,"Grado d:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$grado_d,0,0,'R');
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0); 


$pdf->Cell(50,5,"Anomalias de cola:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$anomalias_cola,0,0,'R');
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();
$pdf->Setx(30);


/*$pdf->Cell(50,5,"Anomalias de cola:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$anomalias_cola,0,0,'R');
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();
$pdf->Setx(30);
 */
 
 

 


?>