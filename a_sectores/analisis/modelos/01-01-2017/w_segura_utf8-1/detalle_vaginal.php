<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_vaginal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=utf8_decode($result11->fields["muestra"]);
$celulas_epiteliales=utf8_decode($result11->fields["celulas_epiteliales"]);
$leucocitos=utf8_decode($result11->fields["leucocitos"]);
$piocitos=utf8_decode($result11->fields["piocitos"]);
$elementos_hongos=utf8_decode($result11->fields["elementos_hongos"]);
 $trichomonas_vaginalis=utf8_decode($result11->fields["trichomonas_vaginalis"]);
$test_aminas=utf8_decode($result11->fields["test_aminas"]);
$coloracion=utf8_decode($result11->fields["coloracion"]);
$cultivo=utf8_decode($result11->fields["cultivo"]);

 
$cultivo1=utf8_decode($result11->fields["cultivo1"]);
$cultivo2=utf8_decode($result11->fields["cultivo2"]);

$cultivo1=utf8_decode($result11->fields["cultivo1"]);
$cultivo2=utf8_decode($result11->fields["cultivo2"]);


$hematies=$result11->fields["hematies"];
$coloracion1=$result11->fields["coloracion1"];

 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

INCLUDE ("practica.php");



$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio); 
$pdf->Cell(50,5,"FLUJO VAGINAL:",0);  

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$muestra,0);  

$pdf->ln();


$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio); 
$pdf->Cell(50,5,"Exámen en fresco: ",0); 

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Células epiteliales: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$celulas_epiteliales,0); 
$pdf->SetFont('Arial','B',$tamanio);

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Leucocitos: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$leucocitos,0); 
$pdf->SetFont('Arial','B',$tamanio);

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Piocitos: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$piocitos,0);  
$pdf->SetFont('Arial','B',$tamanio);

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Elementos de hongos: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$elementos_hongos,0);  
$pdf->SetFont('Arial','B',$tamanio);

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Trichomonas vaginalis: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$trichomonas_vaginalis,0);  
$pdf->SetFont('Arial','B',$tamanio);

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Hematies: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$hematies,0);  
$pdf->SetFont('Arial','B',$tamanio);
$pdf->ln();



$pdf->SetX(30);
$pdf->Cell(50,5,"Test de Aminas: ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$test_aminas,0);  
$pdf->SetFont('Arial','B',$tamanio);



$pdf->ln();
$pdf->ln();

$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Coloración de Gram-Nicolle: ",0); 
$pdf->SetFont('Arial','',$tamanio);
 $pdf->MultiCell(100, 5, $coloracion);
$pdf->SetFont('Arial','',$tamanio);

if ($coloracion1 != ""){

$pdf->SetX(30);
$pdf->Cell(50,5,"",0); 
$pdf->SetFont('Arial','',$tamanio);
 $pdf->MultiCell(100, 5, $coloracion1);
$pdf->SetFont('Arial','B',$tamanio);

}


 $pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Cultivo: ",0); 
$pdf->SetFont('Arial','',$tamanio);
 $pdf->MultiCell(100, 5, $cultivo);
$pdf->SetFont('Arial','B',$tamanio);
 


if ($cultivo1 != ""){

$pdf->SetX(30);
$pdf->Cell(50,5,"",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->MultiCell(100, 5, $cultivo1);
$pdf->SetFont('Arial','',$tamanio);
}




if ($cultivo2 != ""){
 $pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->MultiCell(100, 5, $cultivo2);
$pdf->SetFont('Arial','',$tamanio);
}

?>