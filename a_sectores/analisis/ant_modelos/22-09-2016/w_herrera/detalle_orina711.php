<?php


//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_orina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$valor=strtoupper($result11->fields["valor"]);
$referencia=strtoupper($result11->fields["referencia"]);


$densidad=$result11->fields["densidad"];
$color=$result11->fields["color"];
$aspecto=$result11->fields["aspecto"];
$sedimento=$result11->fields["sedimento"];
$reaccion=$result11->fields["reaccion"];
$proteinas=$result11->fields["proteinas"];
$glucosa=$result11->fields["glucosa"];
$biliares=$result11->fields["biliares"];
$cetonicos=$result11->fields["cetonicos"];
$hemoglobina=$result11->fields["hemoglobina"];
$epiteliales=$result11->fields["epiteliales"];
$leucocito=$result11->fields["leucocito"];
$piocitos=$result11->fields["piocitos"];
$hematies=$result11->fields["hematies"];
$cilindros=$result11->fields["cilindros"];
$mucus=$result11->fields["mucus"];
$uratos=$result11->fields["uratos"];
$observaciones_orina =$result11->fields["observaciones"];

$nitritos=$result11->fields["nitritos"];
$otros=$result11->fields["otros"];

$ph =$result11->fields["ph"];

$celulas_epiteliales_planas=$result11->fields["celulas_epiteliales_planas"];
$celulas_epiteliales_redondas =$result11->fields["celulas_epiteliales_redondas"];
$olor =$result11->fields["olor"];

 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$metodo=strtoupper($result11->fields["metodo"]);
$unidad=$result11->fields["unidad"];

$pdf->SetX(30);
$tamanio = 11;
$pdf->SetFont($letra,'BI',$tamanio);
$pdf->Cell(40,10,$nombre_practica);
$tamanio = 9;
$pdf->SetFont($letra,'B',$tamanio);
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,3,"EXAMEN FÍSICO",0);     
$pdf->Cell(50,3,"",0); 
$pdf->Cell(40,3,"EXAMEN QUÍMICO",0);
$pdf->SetFont($letra,'',$tamanio);


$pdf->Ln();
$pdf->Ln();

$pdf->SetX(30);
// $pdf->line(10,45,200,45);

$pdf->Cell(40,5,"Densidad:  ",0);     

$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$densidad,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Proteínas: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,$proteinas,0);     
$pdf->Ln(); 
$pdf->SetX(30);

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Color: ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$color,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Glucosa: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,$glucosa,0);     
$pdf->Ln(); 
$pdf->SetX(30);

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Aspecto: ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$aspecto,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Pig. Biliares: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,$biliares,0);     


$pdf->Ln(); 
$pdf->SetX(30);

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Olor: ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$olor,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Cuerpos Cetónicos: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,$cetonicos,0); 
$pdf->SetFont($letra,'',$tamanio); 



$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Sedimento: ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$sedimento,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Hemoglobina: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,$hemoglobina,0); 
$pdf->SetFont($letra,'',$tamanio);





$pdf->Ln(); 
$pdf->SetX(30);

$pdf->Cell(40,5,"Reacción: ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$reaccion.", pH: ".$ph,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Urobilinógeno: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,$nitritos,0);  



     
$pdf->Ln(); 
$pdf->SetX(30);

$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(0,10,"EXAMEN MICROSCÓPICO DEL SEDIMENTO (400 x)",0,0,'C');
$pdf->SetFont($letra,'',$tamanio);

$pdf->Ln(); 
$pdf->SetX(30);

IF ($epiteliales == ""){$epiteliales = "No contiene";}
IF ($leucocito == ""){$leucocito = "No contiene";}
IF ($piocitos == ""){$piocitos = "No contiene";}
IF ($hematies == ""){$hematies = "No contiene";}
IF ($cilindros == ""){$cilindros = "No contiene";}
IF ($mucus == ""){$mucus = "No contiene";}
IF ($uratos == ""){$uratos = "No contiene";}



//$pdf->line(10,78,200,78);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Cel. Epiteliales planas: ",0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(25,5,$celulas_epiteliales_planas,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Cel. Epiteliales redondas: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,$celulas_epiteliales_redondas,0); 
$pdf->SetFont($letra,'',$tamanio);


$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Leucocitos: ",0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$leucocito,0);

$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Piocitos (pl. de pus): ",0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$piocitos,0);

$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Hematíes: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$hematies,0);

$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Cilindros: ",0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$cilindros,0);


$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Mucus: ",0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,$mucus,0);

$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,4,"Cristales: ",0); 
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,4,$uratos,0);

$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,4,"Otros: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,4,$otros,0); 

$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,4,"Observaciones: ",0);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,4,$observaciones_orina,0);