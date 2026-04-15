<?php


//$pdf->AddPage();

$pdf->Ln();$pdf->SetX(30);

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


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

$tamanio = 12;
$pdf->SetFont($letra,'BU',$tamanio);
$pdf->Cell(40,5,$nombre_practica);


$pdf->Ln();$pdf->SetX(30);
$tamanio = 10;
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5,"EXAMEN FISICO",0);     

$pdf->Cell(60,5," ",0); 
$pdf->Cell(40,5,"EXAMEN QUIMICO",0);
$pdf->SetFont($letra,'',$tamanio);


$pdf->Ln();$pdf->SetX(30);
// $pdf->line(10,45,200,45);

$pdf->Cell(40,5,"Densidad:  ",0);     


$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$densidad,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Proteinas: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$proteinas,0);     
$pdf->Ln();$pdf->SetX(30); 

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Color: ",0);     

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$color,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Glucosa: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$glucosa,0);     
$pdf->Ln();$pdf->SetX(30); 

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Aspecto: ",0);     

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$aspecto,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Pig. Biliares: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$biliares,0);     
$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Sedimento: ",0);     

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$sedimento,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Cuerpos Cetónicos: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$cetonicos,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Ln();$pdf->SetX(30); 

$pdf->Cell(40,5,"Reacción: ",0);     

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$reaccion,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(35,5,"Hemoglobina: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$hemoglobina,0);     
$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
      


$pdf->Cell(40,5,"",0);
$pdf->Cell(40,5,"",0); 
$pdf->Cell(35,5,"Urobilinogeno: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$nitritos,0);     
$pdf->Ln();$pdf->SetX(30); 

$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(0,10,"EXAMEN MICROSCOPICO DEL SEDIMENTO",0,0,'C');
$pdf->SetFont($letra,'',$tamanio);

$pdf->Ln();$pdf->SetX(30); 


IF ($epiteliales == ""){$epiteliales = "No contiene";}
IF ($leucocito == ""){$leucocito = "No contiene";}
IF ($piocitos == ""){$piocitos = "No contiene";}
IF ($hematies == ""){$hematies = "No contiene";}
IF ($cilindros == ""){$cilindros = "No contiene";}
IF ($mucus == ""){$mucus = "No contiene";}
IF ($uratos == ""){$uratos = "No contiene";}



//$pdf->line(10,78,200,78);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Celulas Epiteliales: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$epiteliales,0);

$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Leucocitos: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$leucocito,0);

$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Piocitos (pl. de pus): ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$piocitos,0);

$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Hematies: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$hematies,0);

$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Cilindros: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$cilindros,0);


$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Mucus: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$mucus,0);

$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Cristales: ",0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$uratos,0);

$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Otros: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,$otros,0); 


if ($observaciones != ""){
$pdf->Ln();$pdf->SetX(30); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(80,5,"Observaciones: ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,$observaciones_orina,0); 

}

$pdf->Ln();$pdf->SetX(30); 
$pdf->Ln();$pdf->SetX(30); 
$pdf->Ln();$pdf->SetX(30); 