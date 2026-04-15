<?php


//include ("enca_pdf.php");



$pdf->Ln();

 $sql11="select * from detalle_hemo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$hematies=number_format($result11->fields["hematies"], 0, ',', '.');
$hemoglobina=number_format($result11->fields["hemoglobina"], 2, ',', '.');
$reticulocitos=$result11->fields["reticulocitos"];

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






//////////////////////cALCULO DEGLOBULOS ROJOS
$hematies = ($hematocrito + ($hematocrito *10)) * 10000; 
$hematies=number_format($hematies, 0, ',', '.');


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


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

INCLUDE ("practica.php");


$pdf->SetX(126);
  $pdf->Cell(50,5,"",0);
  $pdf->Ln(); //Esto hace un cambio de línea 

$pdf->SetX(120);
$pdf->Cell(40,10,"");

if ($formula == "SI"){
	
$pdf->SetX(160);
$pdf->Cell(40,10,"");
}
 
$pdf->SetFont('Arial','B',10);

$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();

  $pdf->Cell(35,5,"Hematíes: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$hematies,0); 
 $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(20,5," / mm³",0); 



 
  $pdf->Ln(); //Esto hace un cambio de línea 
 
  /////////////////////////////


  if ($edad < 16){

		if ($sexo == "Masculino"){
$hemoglobina = ($hematocrito * 0.3) + 0.5;
		}else{
$hemoglobina = ($hematocrito * 0.3) + 0.4;
		}


  }else{

		if ($sexo == "Masculino"){
$hemoglobina = ($hematocrito * 0.3) + 1;
		}else{
$hemoglobina = ($hematocrito * 0.3) + 0;
		}


  }
  $pdf->Cell(35,5,"Hemoglobina: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$hemoglobina,0);  
  $pdf->SetFont('Arial','',$tamanio);
 $pdf->Cell(20,5,"gr%",0); 





  $pdf->ln();
 




  /////////////////////////////
  $pdf->Cell(35,5,"Hematocrito: ",0);  
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$hematocrito,0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"%",0); 
  






  $pdf->Ln(); //Esto hace un cambio de línea 
 

    $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(35,5,"Leucocitos: ",0);


    $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$leucocitos);  

 $pdf->SetFont('Arial','',$tamanio);
	$pdf->Cell(20,5," / mm³",0); 
  




  $pdf->Ln(); //Esto hace un cambio de línea 
 
if ($reticulocitos == 0){
  /////////////////////////////
  $pdf->Cell(35,5,"",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,"",0); 
  $pdf->SetFont('Arial','',$tamanio);
      $pdf->Cell(20,5,"",0); 
}else
{
  $pdf->Cell(35,5,"Reticulocitos: ",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$reticulocitos,0); 
  $pdf->SetFont('Arial','',$tamanio);
      $pdf->Cell(20,5," / mm³",0); 
}
  

  $pdf->Ln(); //Esto hace un cambio de línea 
 

 if ($plaquetas > 0){
	$plaquetas=number_format($plaquetas, 0, ',', '.');
  $pdf->Cell(35,5,"Plaquetas: ",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$plaquetas,0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5," / mm³",0);


}else{

$pdf->Cell(35,5,"",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,"",0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"",0);

}


 if ($mcv > 0){
	 $pdf->Ln(); 
  /////////////////////////////
  $pdf->Cell(35,5,"MCV: ",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$mcv." fl",0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5," ",0);
 
  }else
{
	
	//$mcv=number_format($mcv, 0, ',', '.');


 $pdf->Cell(35,5,"",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,"",0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"",0);
}


 if ($mch > 0){
  /////////////////////////////
$pdf->Ln(); 
	//$mcv=number_format($mcv, 0, ',', '.');
  $pdf->Cell(35,5,"MCH: ",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$mch." pg",0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"",0);
  }else
{
	

  $pdf->Cell(35,5,"",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,"",0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"",0);
}

 if ($mchc > 0){
  /////////////////////////////
 

$pdf->Ln(); 
     $pdf->Cell(35,5,"MCHC: ",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,$mchc,0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"",0);

  }else
{
	
	 $pdf->Cell(35,5,"",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(17,5,"",0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"",0);
	//$mcv=number_format($mcv, 0, ',', '.');


}


 

///////////////////////////////////////////
   $pdf->Ln();

   $pdf->Ln();

   $pdf->Cell(50,5,"FORMULA LEUCOCITARIA",0);

  $pdf->Ln();

  $pdf->SetX(65);
$pdf->Cell(40,10,"RELATIVA");

if ($formula == "SI"){
	
$pdf->SetX(110);
$pdf->Cell(40,10,"ABSOLUTA");
}


  $pdf->Ln();


  $pdf->Cell(50,5,"Neutrófilos en cayado: ",0);
$pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(20,5,number_format($neutro_cayado,0));
 $pdf->SetFont('Arial','',$tamanio);
$pdf->SetX(70);
  $pdf->Cell(5,5,"%");
  
    if ($formula == "SI"){
$pdf->SetX(100);
$pdf->SetFont('Arial','B',$tamanio);
$absoluto_neutro_cayado=number_format($absoluto_neutro_cayado, 0, ',', '.');
$pdf->Cell(20,5,$absoluto_neutro_cayado);
$pdf->SetFont('Arial','',$tamanio);

$pdf->Cell(10,5,"/ mm³");
}
 
  $pdf->Ln();

 $pdf->Cell(50,5,"Neutrófilos segmentado: ",0);
  $pdf->SetFont('Arial','B',$tamanio);

  $pdf->Cell(20,5,number_format($neutro_segmentado,0)); 
  $pdf->SetFont('Arial','',$tamanio);
 $pdf->SetX(70);
  $pdf->Cell(5,5,"%");

if ($formula == "SI"){
$pdf->SetX(100);
  $pdf->SetFont('Arial','B',$tamanio);
  $absoluto_neutro_segmentado=number_format($absoluto_neutro_segmentado, 0, ',', '.');
$pdf->Cell(20,5,$absoluto_neutro_segmentado);

  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(10,5,"/ mm³");
}

  $pdf->Ln();
$pdf->Cell(50,5,"Eosinofilos: ",0);
      
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(60,5,number_format($eosinofilos,0), 0, ',', '.');    
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");
  

   if ($formula == "SI"){
	   
$pdf->SetX(100);
$pdf->SetFont('Arial','B',$tamanio);
$absoluto_eosinofilos=number_format($absoluto_eosinofilos, 0, ',', '.');
$pdf->Cell(20,5,$absoluto_eosinofilos);
$pdf->SetFont('Arial','',$tamanio);

$pdf->Cell(10,5,"/ mm³");
}

  $pdf->Ln();
$pdf->Cell(50,5,"Basófilos: ",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($basofilos,0));  
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");
     if ($formula == "SI"){
$pdf->SetX(100);
$pdf->SetFont('Arial','B',$tamanio);
$absoluto_basofilos=number_format($absoluto_basofilos, 0, ',', '.');
$pdf->Cell(20,5,$absoluto_basofilos);
$pdf->SetFont('Arial','',$tamanio);

$pdf->Cell(10,5,"/ mm³");
}

  $pdf->Ln();
$pdf->Cell(50,5,"Linfocitos: ",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($linfocitos,0)); 
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");

     if ($formula == "SI"){
$pdf->SetX(100);
$pdf->SetFont('Arial','B',$tamanio);
$absoluto_linfocitos=number_format($absoluto_linfocitos, 0, ',', '.');
$pdf->Cell(20,5,$absoluto_linfocitos);
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(10,5,"/ mm³");
}

  $pdf->Ln();
$pdf->Cell(50,5,"Monocitos: ",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($monocitos,0)); 
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(70);
  $pdf->Cell(20,5,"%");


if ($formula == "SI"){
$pdf->SetX(100);
$pdf->SetFont('Arial','B',$tamanio);
$absoluto_monocitos=number_format($absoluto_monocitos, 0, ',', '.');
$pdf->Cell(20,5,$absoluto_monocitos);
$pdf->SetFont('Arial','',$tamanio);

$pdf->Cell(10,5,"/ mm³");
}

if ($formula == "SI"){
//  $pdf->line(100,85,203,85);
  $pdf->Ln(); 
  }else{
  //$pdf->line(100,85,170,85);
  $pdf->Ln(); 
	  }
  /////////////////////////////
  

$pdf->Cell(50,5,"",0);     
$pdf->Cell(40,5,"",0);

  



 


  

  $pdf->Ln(); //Esto hace un cambio de línea 
  $pdf->ln();
$pdf->SetFont('Arial','BU',$tamanio);
$pdf->Cell(35,6,"Alteraciones Cualitativas: ",0);
  $pdf->ln();

  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(20,6,"Plaquetas: ",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(35,6,$carac_plaquetas,0); 
$pdf->SetFont('Arial','',$tamanio);


 
$pdf->Ln();

$pdf->Cell(20,6,"Leucocitos: ",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,6,$carac_leucocitos,0); 
$pdf->SetFont('Arial','',$tamanio);
 
$pdf->ln();
$pdf->Cell(20,6,"Hematíes: ",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,6,$carac_hematies,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln();
$pdf->Cell(20,6,"",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,6,$carac_hematies2,0); 
$pdf->SetFont('Arial','',$tamanio);
 
