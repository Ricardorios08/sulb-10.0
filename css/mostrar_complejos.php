<?php 


 $sql1="SELECT * FROM convenio_practica_complejo where cod_practica = $nro_practica";
$result13 = $db->Execute($sql1);

$renglon1=$result13->fields["renglon1"];
$renglon1_2=$result13->fields["renglon1_2"]; 
$renglon1_3=$result13->fields["renglon1_3"]; 	
$renglon1_4=$result13->fields["renglon1_4"]; 

$renglon2=$result13->fields["renglon2"];
$renglon2_2=$result13->fields["renglon2_2"]; 
$renglon2_3=$result13->fields["renglon2_3"]; 	
$renglon2_4=$result13->fields["renglon2_4"];

$renglon3=$result13->fields["renglon3"];
$renglon3_2=$result13->fields["renglon3_2"]; 
$renglon3_3=$result13->fields["renglon3_3"]; 	
$renglon3_4=$result13->fields["renglon3_4"];

$renglon4=$result13->fields["renglon4"];
$renglon4_2=$result13->fields["renglon4_2"]; 
$renglon4_3=$result13->fields["renglon4_3"]; 	
$renglon4_4=$result13->fields["renglon4_4"];

$renglon5=$result13->fields["renglon5"];
$renglon5_2=$result13->fields["renglon5_2"]; 
$renglon5_3=$result13->fields["renglon5_3"]; 	
$renglon5_4=$result13->fields["renglon5_4"];

$renglon6=$result13->fields["renglon6"];
$renglon6_2=$result13->fields["renglon6_2"]; 
$renglon6_3=$result13->fields["renglon6_3"]; 	
$renglon6_4=$result13->fields["renglon6_4"];

$renglon7=$result13->fields["renglon7"];
$renglon7_2=$result13->fields["renglon7_2"]; 
$renglon7_3=$result13->fields["renglon7_3"]; 	
$renglon7_4=$result13->fields["renglon7_4"];

$renglon8=$result13->fields["renglon8"];
$renglon8_2=$result13->fields["renglon8_2"]; 
$renglon8_3=$result13->fields["renglon8_3"]; 	
$renglon8_4=$result13->fields["renglon8_4"];

$renglon9=$result13->fields["renglon9"];
$renglon9_2=$result13->fields["renglon9_2"]; 
$renglon9_3=$result13->fields["renglon9_3"]; 	
$renglon9_4=$result13->fields["renglon9_4"];

$renglon10=$result13->fields["renglon10"];
$renglon10_2=$result13->fields["renglon10_2"]; 
$renglon10_3=$result13->fields["renglon10_3"]; 	
$renglon10_4=$result13->fields["renglon10_4"];

$renglon11=$result13->fields["renglon11"];
$renglon11_2=$result13->fields["renglon11_2"]; 
$renglon11_3=$result13->fields["renglon11_3"]; 	
$renglon11_4=$result13->fields["renglon11_4"];

$renglon12=$result13->fields["renglon12"];
$renglon12_2=$result13->fields["renglon12_2"]; 
$renglon12_3=$result13->fields["renglon12_3"]; 	
$renglon12_4=$result13->fields["renglon12_4"];

$renglon13=$result13->fields["renglon13"];
$renglon13_2=$result13->fields["renglon13_2"]; 
$renglon13_3=$result13->fields["renglon13_3"]; 	
$renglon13_4=$result13->fields["renglon13_4"];

$renglon14=$result13->fields["renglon14"];
$renglon14_2=$result13->fields["renglon14_2"]; 
$renglon14_3=$result13->fields["renglon14_3"]; 	
$renglon14_4=$result13->fields["renglon14_4"];

$renglon15=$result13->fields["renglon15"];
$renglon15_2=$result13->fields["renglon15_2"]; 
$renglon15_3=$result13->fields["renglon15_3"]; 	
$renglon15_4=$result13->fields["renglon15_4"];

$renglon16=$result13->fields["renglon16"];
$renglon16_2=$result13->fields["renglon16_2"]; 
$renglon16_3=$result13->fields["renglon16_3"]; 	
$renglon16_4=$result13->fields["renglon16_4"];



$sql1="SELECT * FROM detalle_complejos where cod_grabacion = $cod_grabacion";
$result13 = $db->Execute($sql1);

$valor1=$result13->fields["valor1"];
$valor2=$result13->fields["valor2"];
$valor3=$result13->fields["valor3"];
$valor4=$result13->fields["valor4"];

$valor5=$result13->fields["valor5"];
$valor6=$result13->fields["valor6"];
$valor7=$result13->fields["valor7"];
$valor8=$result13->fields["valor8"];

$valor9=$result13->fields["valor9"];
$valor10=$result13->fields["valor10"];
$valor11=$result13->fields["valor11"];
$valor12=$result13->fields["valor12"];

$valor13=$result13->fields["valor13"];
$valor14=$result13->fields["valor14"];
$valor15=$result13->fields["valor15"];
$valor16=$result13->fields["valor16"];




 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result111 = $db->Execute($sql11);
$nombre_practica=strtoupper($result111->fields["practica"]);
 
$unidad=$result111->fields["unidad"];

$pdf->SetX(10); 
$pdf->SetFont($letra,'BI',12);
$pdf->Cell(100,5,$nombre_practica);
$pdf->SetFont($letra,'',10);

$pdf->ln(); 
//$pdf->Cell(50,5,$renglon1);

if ($valor1 != "*"){
switch ($renglon1_4){
case "1":{$pdf->Cell(80,5,$renglon1." ".$valor1." ".$renglon1_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon1." ".number_format($valor1,2)." ".$renglon1_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon1,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon1." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon1_3);
$pdf->ln(); 
}

if ($valor2 != "*"){
switch ($renglon2_4){
case "1":{$pdf->Cell(80,5,$renglon2." ".$valor2." ".$renglon2_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon2." ".number_format($valor2,2)." ".$renglon2_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon2,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon2." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon2_3);
$pdf->ln(); 
}

if ($valor3 != "*"){
switch ($renglon3_4){
case "1":{$pdf->Cell(80,5,$renglon3." ".$valor3." ".$renglon3_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon3." ".number_format($valor3,2)." ".$renglon3_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon3,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon3." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon3_3);
$pdf->ln(); 
}

///////////////

if ($valor4 != "*"){
switch ($renglon4_4){
case "1":{$pdf->Cell(80,5,$renglon4." ".$valor4." ".$renglon4_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon4." ".number_format($valor4,2)." ".$renglon4_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon4,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon4." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon4_3);
$pdf->ln(); 
}

if ($valor5 != "*"){
switch ($renglon5_4){
case "1":{$pdf->Cell(80,5,$renglon5." ".$valor5." ".$renglon5_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon5." ".number_format($valor5,2)." ".$renglon5_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon5,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon5." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon5_3);
$pdf->ln(); 
}


if ($valor6 != "*"){
switch ($renglon6_4){
case "1":{$pdf->Cell(80,5,$renglon6." ".$valor6." ".$renglon6_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon6." ".number_format($valor6,2)." ".$renglon6_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon6,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon6." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon6_3);
$pdf->ln(); 
}

if ($valor7 != "*"){
switch ($renglon7_4){
case "1":{$pdf->Cell(80,5,$renglon7." ".$valor7." ".$renglon7_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon7." ".number_format($valor7,2)." ".$renglon7_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon7,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon7." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon7_3);
$pdf->ln(); 
}

if ($valor8 != "*"){
switch ($renglon8_4){
case "1":{$pdf->Cell(80,5,$renglon8." ".$valor8." ".$renglon8_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon8." ".number_format($valor8,2)." ".$renglon8_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon8,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon8." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon8_3);
$pdf->ln(); 
}

if ($valor9 != "*"){
switch ($renglon9_4){
case "1":{$pdf->Cell(80,5,$renglon9." ".$valor9." ".$renglon9_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon9." ".number_format($valor9,2)." ".$renglon9_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon9,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon9." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon9_3);
$pdf->ln(); 
}

if ($valor10 != "*"){
switch ($renglon10_4){
case "1":{$pdf->Cell(80,5,$renglon10." ".$valor10." ".$renglon10_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon10." ".number_format($valor10,2)." ".$renglon10_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon10,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon10." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon10_3);
$pdf->ln(); 
}

if ($valor11 != "*"){
switch ($renglon11_4){
case "1":{$pdf->Cell(80,5,$renglon11." ".$valor11." ".$renglon11_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon11." ".number_format($valor11,2)." ".$renglon11_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon11,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon11." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon11_3);
$pdf->ln(); 
}

if ($valor12 != "*"){
switch ($renglon12_4){
case "1":{$pdf->Cell(80,5,$renglon12." ".$valor12." ".$renglon12_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon12." ".number_format($valor12,2)." ".$renglon12_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon12,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon12." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon12_3);
$pdf->ln(); 
}

if ($valor13 != "*"){
switch ($renglon13_4){
case "1":{$pdf->Cell(80,5,$renglon13." ".$valor13." ".$renglon13_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon13." ".number_format($valor13,2)." ".$renglon13_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon13,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon13." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon13_3);
$pdf->ln(); 
}

if ($valor14 != "*"){
switch ($renglon14_4){
case "1":{$pdf->Cell(80,5,$renglon14." ".$valor14." ".$renglon14_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon14." ".number_format($valor14,2)." ".$renglon14_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon14,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon14." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon14_3);
$pdf->ln(); 
}

if ($valor15 != "*"){
switch ($renglon15_4){
case "1":{$pdf->Cell(80,5,$renglon15." ".$valor15." ".$renglon15_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon15." ".number_format($valor15,2)." ".$renglon15_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon15,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon15." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon15_3);
$pdf->ln(); 
}

if ($valor16 != "*"){
switch ($renglon16_4){
case "1":{$pdf->Cell(80,5,$renglon16." ".$valor16." ".$renglon16_2,0,0,L);break;}
case "2":{$pdf->Cell(50,5,$renglon16." ".number_format($valor16,2)." ".$renglon16_2,0,0,R);break;}
case "3":{$pdf->Cell(50,5,$renglon16,0,0,L);break;}
case "4":{$pdf->Cell(50,5,$renglon16." ".'',0,0,R);break;}
}
$pdf->Cell(50,5,$renglon16_3);
$pdf->ln(); 
}







