<?php 
//$pdf->AddPage();


$sql11="select * from detalle_rast where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$clase_1=$result11->fields["clase_1"];
$clase_2=$result11->fields["clase_2"];
$clase_3=$result11->fields["clase_3"];
$clase_4=$result11->fields["clase_4"];

$nivel_1=$result11->fields["nivel_1"];
$nivel_2=$result11->fields["nivel_2"];
$nivel_3=$result11->fields["nivel_3"];
$nivel_4=$result11->fields["nivel_4"];

$rast1=$result11->fields["rast1"];
$rast2=$result11->fields["rast2"];
$rast3=$result11->fields["rast3"];
$rast4=$result11->fields["rast4"];

$resultado1=$result11->fields["resultado1"];
$resultado2=$result11->fields["resultado2"];
$resultado3=$result11->fields["resultado3"];
$resultado4=$result11->fields["resultado4"];


$observaciones=$result11->fields["observaciones"];


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);

$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


INCLUDE ("practica.php");

$pdf->SetFont('Arial','',9);
$pdf->ln();



$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(90,5,"ALERGENO:",0); 

$pdf->Cell(40,5,"Valor Hallado: ",0); 

$pdf->Cell(20,5,"Clase:",0); 

$pdf->Cell(30,5,"Nivel:",0); 


$pdf->ln();

//alergeno 1
$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,$rast1,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(30,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(25,5,$resultado1." ".$unidad,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(15,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,$clase_1,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(15,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,$nivel_1,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();



//alergeno 2
$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,$rast2,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(30,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(25,5,$resultado2." ".$unidad,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(15,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,$clase_2,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(15,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,$nivel_2,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();

//alergeno 3
$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,$rast3,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(30,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(25,5,$resultado3." ".$unidad,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(15,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,$clase_3,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(15,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,$nivel_3,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();

//alergeno 4
$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,$rast4,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(30,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(25,5,$resultado4." ".$unidad,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(15,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,$clase_4,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(15,5,"",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,$nivel_4,0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();


/*
if ($observaciones != ''){

$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(120,6,$observaciones,0);
$pdf->SetFont('Arial','',10);
}*/

$pdf->ln();
$pdf->ln();


$sql11="select * from convenio_referencia where cod_practica =  6614 and nro_ref = $nro_ref order by cod_operacion";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {

$tipo=strtoupper($result11->fields["tipo"]);

$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];


if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}
if (($desde == 0.00) or ($desde == 0)){
	$desde = " Menor de ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " Mayor de ".$desde;
$hasta = "";
}


$contad = $contad + 1;



if ($contad == 1){
	$valor_referencia = "V. de R.:";
}else
	 {
$valor_referencia = "              ";
	 }

$contador = $contador +1;

$pdf->SetX(50); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(50,55));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


if (($desde > 0) and ($hasta > 0)){
$pdf->SetX(50); 
$pdf->Row(array($valor_referencia." ".$columna1, $desde.' - '.$hasta.'  '.$unidad,  $columna2));
}else{
	$pdf->SetX(50); 
$pdf->Row(array($valor_referencia." ".$columna1, $desde.' '.$hasta.'  '.$unidad,  $columna2));
}


$result11->MoveNext();


 }
?>