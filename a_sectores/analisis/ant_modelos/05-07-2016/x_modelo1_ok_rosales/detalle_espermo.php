<?php 
//$pdf->AddPage();
$letra = "ARIAL";
$pdf->Ln();

 $sql11="select * from detalle_espermo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$abstinencia=$result11->fields["abstinencia"];
$recoleccion=$result11->fields["recoleccion"];
$eyaculacion=$result11->fields["eyaculacion"];
$ambiente=$result11->fields["ambiente"];
$volumen=$result11->fields["volumen"];
$licuacion=$result11->fields["licuacion"];
$aspecto=$result11->fields["aspecto"];
$viscocidad=$result11->fields["viscocidad"];
$coloracion=$result11->fields["coloracion"];
$ph=$result11->fields["ph"];
$mm3=$result11->fields["mm3"];
$ml=$result11->fields["ml"];
$desplazamiento_rapido=$result11->fields["desplazamiento_rapido"];
$desplazamiento_lento=$result11->fields["desplazamiento_lento"];
$no_progresiva=$result11->fields["no_progresiva"];
$inmoviles=$result11->fields["inmoviles"];
$inmoviles_vivos=$result11->fields["inmoviles_vivos"];
$inmoviles_muertos=$result11->fields["inmoviles_muertos"];
$otros_elementos=$result11->fields["otros_elementos"];
$normales=$result11->fields["normales"];
$anormales=$result11->fields["anormales"];
$fructuosa=$result11->fields["fructuosa"];
$citrico=$result11->fields["citrico"];



include ("practica.php");




$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(45,5,"Datos",0); 
 
$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Abstinencia previa:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$abstinencia,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"dias",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();
$pdf->SetX(55);
$pdf->SetFont($letra,'I',8);
$pdf->Cell(45,5,"Método Enzimatico",0); 
$pdf->ln();

$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Método de recolección:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$recoleccion,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();

$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Hora de Eyaculación:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$eyaculacion,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"Hrs",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();


$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Temperatura Ambiente:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$ambiente,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"°C",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 

$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(45,5,"Exámen Físico",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Volumen:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$volumen,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"ml",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();
 

 $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Tiempo de licuación:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$licuacion,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"min",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();
  
 $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Aspecto del esperma:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$aspecto,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();
 
 $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Viscocidad:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$viscocidad,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();
 
  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Coloración:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$viscocidad,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();

  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"pH:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$ph,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 

$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(45,5,"Exámen Microscópico",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Por mm3:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$mm3,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"Mayor a 20.000.000 por mm3 ",0); 
$pdf->ln();

  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"En el total de ml:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$ml,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"Mayor a 40.000.000 por ml ",0); 

$pdf->AddPage();

$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(45,5,"Viavilidad post licuación",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Mov. traslativos rápidos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$desplazamiento_rapido,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"Mayor a 25% ",0); 
$pdf->ln();

  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Mov. traslativos lentos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$desplazamiento_lento,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"Mayor a 25% ",0); 
$pdf->ln();

  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Mov. no progresiva (in situ):",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$no_progresiva,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();

  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Inmóviles:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$inmoviles,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 

$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(45,5,"Test de la eosina",0); 

 
 $pdf->ln();
 $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Inmóviles vivos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$inmoviles_vivos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();

  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Inmóviles muertos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$inmoviles_muertos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();

  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Otros Elementos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf ->MultiCell(150,5,$otros_elementos);
$pdf->SetFont($letra,'',$tamanio);
$pdf->ln();



$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(45,5,"Exámen Físico Químico:",0); 
$pdf->ln();


  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Formas normales:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$normales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"Mayor de 15%",0); 
$pdf->ln();

  $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Formas Anormales:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$anormales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"- - - - ",0); 
$pdf->ln();

 $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Dosaje de Fructuosa:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$anormales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"200 mg% - 380 mg%",0); 
$pdf->ln();
$pdf->SetX(55);
$pdf->SetFont($letra,'I',8);
$pdf->Cell(45,5,"Método Colorimétrico",0); 
$pdf->ln();

 $pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(45,5,"Dosaje de Acido Cítrico:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$anormales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->SetX(160);
$pdf->Cell(50,5,"330 mg% - 600 mg%",0); 
$pdf->ln();
$pdf->SetX(55);
$pdf->SetFont($letra,'I',8);
$pdf->Cell(45,5,"Método Colorimétrico",0); 
$pdf->ln();

?>