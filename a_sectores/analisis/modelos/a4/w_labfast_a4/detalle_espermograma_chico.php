<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_espermograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$color=$result11->fields["color"];
$grumos=$result11->fields["grumos"];
$viscocidad=$result11->fields["viscocidad"];
$volumen=$result11->fields["volumen"];
$ph=$result11->fields["ph"];

$espermatozoides=$result11->fields["espermatozoides"];
$celulas=$result11->fields["celulas"];
$leucocitos=$result11->fields["leucocitos"];
$piocitos=$result11->fields["piocitos"];
$hematies=$result11->fields["hematies"]; 

$nro_espermatozoides=$result11->fields["nro_espermatozoides"]; 

$grado_a=$result11->fields["grado_a"];
$grado_b=$result11->fields["grado_b"];
$grado_c=$result11->fields["grado_c"];
$grado_d=$result11->fields["grado_d"];

$normales=$result11->fields["normales"];
$anomalias_cabeza=$result11->fields["anomalias_cabeza"];
$anomalias_segmentado=$result11->fields["anomalias_segmentado"];
$anomalias_cola=$result11->fields["anomalias_cola"];




include ("practica.php");




$pdf->SetFont('ARIAL','',$tamanio);
$pdf->Cell(80,10,"EXAMEN MACROSCOPICO",0);  
$pdf->ln();
$pdf->SetFont('ARIAL','',$tamanio);

$pdf->Cell(30,10,"Color:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$color,0);

$pdf->sETx(100);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,10,"Volumen:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$volumen,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"ml",0);  
$pdf->ln();

$pdf->Cell(30,10,"Grumos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$grumos,0);

$pdf->sETx(100);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,10,"pH:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$ph,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"",0);  
$pdf->ln();

$pdf->Cell(30,10,"Viscocidad:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$color,0);
$pdf->ln();
$pdf->ln();
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(80,10,"EXAMEN MICROSCOPICO (Por campo de 400 X)",0);  

$pdf->SetFont($letra,'',$tamanio);
$pdf->ln();
$pdf->Cell(30,10,"Espermatozoides:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$espermatozoides,0);

$pdf->sETx(100);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,10,"Piocitos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$piocitos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"",0);  
$pdf->ln();

$pdf->Cell(30,10,"Celulas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$grumos,0);

$pdf->sETx(100);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,10,"Hematíes:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$hematies,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"",0);  
$pdf->ln();

$pdf->Cell(30,10,"Leucocitos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$color,0);
$pdf->ln();
$pdf->ln();

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,10,"NUMERO DE MILLONES DE ESPERMATOZOIDES POR ml.:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$nro_espermatozoides,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(80,10,"(V.N: MayoR a 20)",0);  
$pdf->ln();

$pdf->ln();


$pdf->Cell(100,10,"MOTILIDAD (V.N: A+ B MayoR a 45%",0);  
 $pdf->Cell(60,10,"FORMULA ESPERMATICA",0);  
$pdf->ln();




$pdf->Cell(30,10,"Grado a:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$grado_a,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"&",0); 

$pdf->Cell(50,10,"Normales:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$normales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"%",0);  
$pdf->ln();


$pdf->Cell(30,10,"Grado b:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$grado_b,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"%",0); 

$pdf->Cell(50,10,"Anomalias de Cabeza:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$anomalias_cabeza,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"%",0);  
$pdf->ln();

$pdf->Cell(30,10,"Grado c:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$grado_c,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"%",0); 

$pdf->Cell(50,10,"Anomalias seg. intermedio:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$anomalias_segmentado,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"%",0);  
$pdf->ln();


$pdf->Cell(30,10,"Grado d:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$grado_d,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"%",0); 

$pdf->Cell(50,10,"Anomalias de cola:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$anomalias_cola,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,10,"%",0);  
$pdf->ln();

 
 

 


?>