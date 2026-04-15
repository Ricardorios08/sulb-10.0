<?php


//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_orina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$valor=strtoupper($result11->fields["valor"]);
$referencia=strtoupper($result11->fields["referencia"]);

 
$densidad=utf8_decode($result11->fields["densidad"]);
$color=utf8_decode($result11->fields["color"]);
$aspecto=utf8_decode($result11->fields["aspecto"]);
$sedimento=utf8_decode($result11->fields["sedimento"]);
$reaccion=utf8_decode($result11->fields["reaccion"]);
$proteinas=utf8_decode($result11->fields["proteinas"]);
$glucosa=utf8_decode($result11->fields["glucosa"]);
$biliares=utf8_decode($result11->fields["biliares"]);
$cetonicos=utf8_decode($result11->fields["cetonicos"]);
$hemoglobina=utf8_decode($result11->fields["hemoglobina"]);
$epiteliales=utf8_decode($result11->fields["epiteliales"]);
$leucocito=utf8_decode($result11->fields["leucocito"]);
$piocitos=utf8_decode($result11->fields["piocitos"]);
$hematies=utf8_decode($result11->fields["hematies"]);
$cilindros=utf8_decode($result11->fields["cilindros"]);
$mucus=utf8_decode($result11->fields["mucus"]);
$uratos=utf8_decode($result11->fields["uratos"]);
$observaciones_orina =utf8_decode($result11->fields["observaciones"]);

$nitritos=utf8_decode($result11->fields["nitritos"]);
$otros=utf8_decode($result11->fields["otros"]);
$ph=utf8_decode($result11->fields["ph"]);

include ("practica.php");


$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"EXAMEN FISICO",0);     

$pdf->Cell(60,5,"EXAMINADA",0); 
$pdf->Cell(40,5,"EXAMEN QUIMICO",0);
$pdf->SetFont($letra,'B',$tamanio);


$pdf->Ln();
// $pdf->line(10,45,200,45);
$pdf->Setx(30);
$pdf->Cell(40,5,"Densidad:  ",0);     


$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$densidad,0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Proteinas: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$proteinas,0);     
$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Color: ",0);     

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$color,0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Glucosa: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$glucosa,0);     
$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Aspecto: ",0);     

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$aspecto,0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Pig. Biliares: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$biliares,0);     
$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Sedimento: ",0);     

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$sedimento,0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Cuerpos Cetónicos: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$cetonicos,0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Ln(); 
$pdf->Setx(30);

$pdf->Cell(40,5,"Reacción: ",0);     

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$reaccion,0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Hemoglobina: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$hemoglobina,0);     

$pdf->Ln();
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
      


$pdf->Cell(40,5,"pH",0);
$pdf->Cell(40,5,$ph,0); 
$pdf->SetFont($letra,'B',$tamanio); 
$pdf->Cell(40,5,"Urobilinogeno: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$nitritos,0);     
$pdf->Ln(); 
$pdf->Setx(30);

$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(0,10,"EXAMEN MICROSCOPICO DEL SEDIMENTO",0,0,'C');
$pdf->SetFont($letra,'',$tamanio);

$pdf->Ln(); 
$pdf->Setx(30);

IF ($epiteliales == ""){$epiteliales = "No contiene";}
IF ($leucocito == ""){$leucocito = "No contiene";}
IF ($piocitos == ""){$piocitos = "No contiene";}
IF ($hematies == ""){$hematies = "No contiene";}
IF ($cilindros == ""){$cilindros = "No contiene";}
IF ($mucus == ""){$mucus = "No contiene";}
IF ($uratos == ""){$uratos = "No contiene";}



//$pdf->line(10,78,200,78);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Celulas Epiteliales: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$epiteliales,0);

$pdf->Ln();
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Leucocitos: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$leucocito,0);

$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Piocitos (pl. de pus): ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$piocitos,0);

$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Hematies: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$hematies,0);

$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Cilindros: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$cilindros,0);


$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Mucus: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$mucus,0);

$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Cristales: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$uratos,0);

$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"Otros: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,$otros,0); 


if ($observaciones != ""){
$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(80,5,"Observaciones: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,$observaciones_orina,0); 

}

