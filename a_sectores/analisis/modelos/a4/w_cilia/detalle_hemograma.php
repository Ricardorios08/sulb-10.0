<?php


//include ("enca_pdf.php");




 $sql11="select * from detalle_hemo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$hematies=number_format($result11->fields["hematies"], 0, ',', '.');
$hemoglobina=number_format($result11->fields["hemoglobina"], 2, ',', '.');
$reticulocitos=number_format($result11->fields["reticulocitos"], 2, ',', '.');

//$plaquetas=number_format($result11->fields["plaquetas"], 0, ',', '.');
$plaquetas=$result11->fields["plaquetas"];


$leucocitos=$result11->fields["leucocitos"];
/*
$hematies=$result11->fields["hematies"];
$hemoglobina=$result11->fields["hemoglobina"];
$reticulocitos=$result11->fields["reticulocitos"];
$plaquetas=$result11->fields["plaquetas"];

*/


$hematocrito=round($result11->fields["hematocrito"],0);

$mcv1=number_format($result11->fields["mcv1"],2);
$mcv=number_format($result11->fields["mcv"],2);
$mch=number_format($result11->fields["mch"],2);
$mchc=number_format($result11->fields["mchc"],2);

$neutro_cayado=$result11->fields["neutro_cayado"];
$neutro_segmentado=$result11->fields["neutro_segmentado"];
$eosinofilos=$result11->fields["eosinofilos"];
$basofilos=$result11->fields["basofilos"];
$linfocitos=$result11->fields["linfocitos"];
$monocitos=$result11->fields["monocitos"];



$carac_plaquetas=$result11->fields["carac_plaquetas"];
$carac_leucocitos=$result11->fields["carac_leucocitos"];
$carac_hematies=$result11->fields["carac_hematies"];
$carac_hematies2=$result11->fields["carac_hematies2"];





$observaciones =$result11->fields["observaciones"];
$formula =strtoupper($result11->fields["formula"]);
$promielocitos =strtoupper($result11->fields["promielocitos"]);

$formula = "NO";


 $absoluto_neutro_cayado = $leucocitos * $neutro_cayado/100;
$absoluto_neutro_segmentado= $leucocitos * $neutro_segmentado/100;
 $absoluto_eosinofilos= $leucocitos * $eosinofilos/100;
$absoluto_basofilos= $leucocitos * $basofilos/100;
$absoluto_linfocitos= $leucocitos * $linfocitos/100;
$absoluto_monocitos= $leucocitos * $monocitos/100;

$total_leucocitos = $neutro_cayado + $neutro_segmentado + $eosinofilos + $basofilos + $linfocitos + $monocitos;
$total_absoluto_leucocitos = $absoluto_neutro_cayado + $absoluto_neutro_segmentado + $absoluto_eosinofilos + $absoluto_basofilos + $absoluto_linfocitos + $absoluto_monocitos;

$leucocitos=number_format($result11->fields["leucocitos"], 0, ',', '.');


if ($hematies == 0){$hematies = "--------";}
if ($hematocrito == 0){$hematocrito = "--------";}
if ($hemoglobina == 0){$hemoglobina = "--------";}
if ($leucocitos == 0){$leucocitos = "--------";}


INCLUDE ("practica.php");

  /////////////////////////////
  $pdf->Cell(35,5,"Hematocrito: ",0);  
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$hematocrito,0);   
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(30,5,"%",0); 

  $pdf->Cell(35,5,"VR: Hombre: 42-52% / Mujer: 34-47%",0);  

$pdf->Ln(); 
  $pdf->Cell(35,5,"Hematíes: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$hematies,0); 
 $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(20,5," / mm³",0); 


$pdf->Ln(); //Esto hace un cambio de línea 
 

/*  $pdf->Cell(35,5,"Reticulocitos: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$reticulocitos,0); 
  $pdf->SetFont('Arial','',$tamanio);
      $pdf->Cell(20,5," %",0); 
*/





$pdf->Cell(35,5,"VCM: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$mcv1,0); 
  $pdf->SetFont('Arial','',$tamanio);
 $pdf->Cell(30,5," fl",0); 
  $pdf->Cell(20,5,"VR: 88 - 100 fl",0); 

$pdf->Ln(); 
	  $pdf->Cell(35,5,"HCM: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$mch,0); 
  $pdf->SetFont('Arial','',$tamanio);
      $pdf->Cell(30,5," pg",0); 
 $pdf->Cell(20,5,"VR: 27 - 33 pg",0); 
$pdf->Ln(); 
	  $pdf->Cell(35,5,"CHCM: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$mchc,0); 
  $pdf->SetFont('Arial','',$tamanio);
     $pdf->Cell(30,5," g/dl",0); 
$pdf->Cell(20,5,"VR: 32 - 36 g/dl",0); 
$pdf->Ln(); 
	  $pdf->Cell(35,5,"ADE: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$ade,0); 
  $pdf->SetFont('Arial','',$tamanio);
     $pdf->Cell(30,5," %",0); 
$pdf->Cell(20,5,"VR:  11,5 - 15,0 %",0); 


$pdf->Ln(); 


  /////////////////////////////
  $pdf->Cell(35,5,"Hemoglobina: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$hemoglobina,0);  
  $pdf->SetFont('Arial','',$tamanio);
 $pdf->Cell(20,5,"gr % ",0); 


$pdf->Ln(); 

  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(35,5,"Leucocitos: ",0);
    $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$leucocitos);  
 $pdf->SetFont('Arial','',$tamanio);
	$pdf->Cell(20,5," / mm³",0); 


$pdf->Ln(); 


if (($plaquetas == "0.00") or ($plaquetas == "")){
	
	$plaquetas = "NORMALES";}else{$plaquetas = $plaquetas." / mm³";}


  $pdf->Cell(35,5,"Plaquetas: ",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$plaquetas,0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(30,5," ",0);

  $pdf->Cell(35,5,"VR: 130.000-400.000 por mm3",0);  

$pdf->Ln(); 
$pdf->Ln(); 




$pdf->Cell(25,5,"Eosinofilos: ",0);
      
  $pdf->SetFont('Arial','B',$tamanio);

  $eosinofilos = number_format($eosinofilos, 0, ',', '.');
   $pdf->Cell(30,5,$eosinofilos,0,0,'R');    
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");
  
  $pdf->Cell(35,5,"VR: 1-3%",0);  



  $pdf->Ln(); 
  
$pdf->Cell(25,5,"Basófilos: ",0);
  $pdf->SetFont('Arial','B',$tamanio);

 $basofilos = number_format($basofilos, 0, ',', '.');
   $pdf->Cell(30,5,$basofilos,0,0,'R');    
  
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");
    
  $pdf->Cell(35,5,"VR: 0-1%",0);


  $pdf->Ln(); 
 $pdf->Cell(25,5,"Neutrófilos en cayado: ",0);
$pdf->SetFont('Arial','B',$tamanio);

 $neutro_cayado = number_format($neutro_cayado, 0, ',', '.');
   $pdf->Cell(30,5,$neutro_cayado,0,0,'R');   

   
 $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");
   $pdf->Cell(35,5,"VR: 0-5%",0);

$pdf->Ln(); 

$pdf->Cell(25,5,"Neutrófilos segmentados: ",0);
  $pdf->SetFont('Arial','B',$tamanio);

 $neutro_segmentado = number_format($neutro_segmentado, 0, ',', '.');
   $pdf->Cell(30,5,$neutro_segmentado,0,0,'R');   

 
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");
     $pdf->Cell(35,5,"VR: 43-65%",0);



$pdf->Ln(); 
  
$pdf->Cell(25,5,"Linfocitos: ",0);
  $pdf->SetFont('Arial','B',$tamanio);

   $linfocitos = number_format($linfocitos, 0, ',', '.');
   $pdf->Cell(30,5,$linfocitos,0,0,'R');  


   
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");
    $pdf->Cell(35,5,"VR: 20-45%",0);


$pdf->Ln(); 
$pdf->Cell(40,5,"Monocitos: ",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($monocitos,0),0,0,'R'); 
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");
  $pdf->Cell(35,5,"VR: 1-5%",0);
$pdf->Ln();


$pdf->Cell(40,5,"Celulas de Turk: ",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($mcv,0),0,0,'R');  
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");

$pdf->Ln();
$pdf->Cell(40,5,"Promielocitos: ",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($promielocitos,0),0,0,'R'); 
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");

$pdf->Ln();
$pdf->Ln();

$pdf->Cell(35,5,"Serie Roja: ",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,$carac_plaquetas,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln();

$pdf->Cell(35,5,"Neutrofilos: ",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,$carac_leucocitos,0); 
$pdf->SetFont('Arial','',$tamanio);
 
$pdf->Ln();



$pdf->Cell(35,5,"Linfocitos: ",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,$carac_hematies,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln();




$pdf->Cell(35,5,"Observaciones:",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,$observaciones,0); 
$pdf->SetFont('Arial','',$tamanio);
 

$pdf->Ln();
$pdf->Ln();