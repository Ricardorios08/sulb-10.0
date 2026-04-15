<?php 

  $sql="select * from informe  where contador_salto > 0 ";
$result = $db->Execute($sql);
$contador_salto=$result->fields["contador_salto"];
$contador;
$contador9;

 if ($contador >= $contador_salto){

$pdf->ln();
//$pdf->AddPage();
$contador = 1;


}




   $sql1="SELECT * FROM convenio_practica_complejo where cod_practica = $nro_practica";
$result13 = $db->Execute($sql1);

$renglon1=utf8_decode($result13->fields["renglon1"]);
$renglon1_2=utf8_decode($result13->fields["renglon1_2"]); 
$renglon1_3=utf8_decode($result13->fields["renglon1_3"]); 	
$renglon1_4=utf8_decode($result13->fields["renglon1_4"]); 

$renglon2=utf8_decode($result13->fields["renglon2"]);
$renglon2_2=utf8_decode($result13->fields["renglon2_2"]); 
$renglon2_3=utf8_decode($result13->fields["renglon2_3"]); 	
$renglon2_4=utf8_decode($result13->fields["renglon2_4"]);

$renglon3=utf8_decode($result13->fields["renglon3"]);
$renglon3_2=utf8_decode($result13->fields["renglon3_2"]); 
$renglon3_3=utf8_decode($result13->fields["renglon3_3"]); 	
$renglon3_4=utf8_decode($result13->fields["renglon3_4"]);

$renglon4=utf8_decode($result13->fields["renglon4"]);
$renglon4_2=utf8_decode($result13->fields["renglon4_2"]); 
$renglon4_3=utf8_decode($result13->fields["renglon4_3"]); 	
$renglon4_4=utf8_decode($result13->fields["renglon4_4"]);

$renglon5=utf8_decode($result13->fields["renglon5"]);
$renglon5_2=utf8_decode($result13->fields["renglon5_2"]); 
$renglon5_3=utf8_decode($result13->fields["renglon5_3"]); 	
$renglon5_4=utf8_decode($result13->fields["renglon5_4"]);

$renglon6=utf8_decode($result13->fields["renglon6"]);
$renglon6_2=utf8_decode($result13->fields["renglon6_2"]); 
$renglon6_3=utf8_decode($result13->fields["renglon6_3"]); 	
$renglon6_4=utf8_decode($result13->fields["renglon6_4"]);

$renglon7=utf8_decode($result13->fields["renglon7"]);
$renglon7_2=utf8_decode($result13->fields["renglon7_2"]); 
$renglon7_3=utf8_decode($result13->fields["renglon7_3"]); 	
$renglon7_4=utf8_decode($result13->fields["renglon7_4"]);

$renglon8=utf8_decode($result13->fields["renglon8"]);
$renglon8_2=utf8_decode($result13->fields["renglon8_2"]); 
$renglon8_3=utf8_decode($result13->fields["renglon8_3"]); 	
$renglon8_4=utf8_decode($result13->fields["renglon8_4"]);

$renglon9=utf8_decode($result13->fields["renglon9"]);
$renglon9_2=utf8_decode($result13->fields["renglon9_2"]); 
$renglon9_3=utf8_decode($result13->fields["renglon9_3"]); 	
$renglon9_4=utf8_decode($result13->fields["renglon9_4"]);

$renglon10=utf8_decode($result13->fields["renglon10"]);
$renglon10_2=utf8_decode($result13->fields["renglon10_2"]); 
$renglon10_3=utf8_decode($result13->fields["renglon10_3"]); 	
$renglon10_4=utf8_decode($result13->fields["renglon10_4"]);

$renglon11=utf8_decode($result13->fields["renglon11"]);
$renglon11_2=utf8_decode($result13->fields["renglon11_2"]); 
$renglon11_3=utf8_decode($result13->fields["renglon11_3"]); 	
$renglon11_4=utf8_decode($result13->fields["renglon11_4"]);

$renglon12=utf8_decode($result13->fields["renglon12"]);
$renglon12_2=utf8_decode($result13->fields["renglon12_2"]); 
$renglon12_3=utf8_decode($result13->fields["renglon12_3"]); 	
$renglon12_4=utf8_decode($result13->fields["renglon12_4"]);

$renglon13=utf8_decode($result13->fields["renglon13"]);
$renglon13_2=utf8_decode($result13->fields["renglon13_2"]); 
$renglon13_3=utf8_decode($result13->fields["renglon13_3"]); 	
$renglon13_4=utf8_decode($result13->fields["renglon13_4"]);

$renglon14=utf8_decode($result13->fields["renglon14"]);
$renglon14_2=utf8_decode($result13->fields["renglon14_2"]); 
$renglon14_3=utf8_decode($result13->fields["renglon14_3"]); 	
$renglon14_4=utf8_decode($result13->fields["renglon14_4"]);

$renglon15=utf8_decode($result13->fields["renglon15"]);
$renglon15_2=utf8_decode($result13->fields["renglon15_2"]); 
$renglon15_3=utf8_decode($result13->fields["renglon15_3"]); 	
$renglon15_4=utf8_decode($result13->fields["renglon15_4"]);

$renglon16=utf8_decode($result13->fields["renglon16"]);
$renglon16_2=utf8_decode($result13->fields["renglon16_2"]); 
$renglon16_3=utf8_decode($result13->fields["renglon16_3"]); 	
$renglon16_4=utf8_decode($result13->fields["renglon16_4"]);

///////////////////

$renglon17=utf8_decode($result1->fields["renglon17"]);
$renglon17_2=utf8_decode($result1->fields["renglon17_2"]); 
$renglon17_3=utf8_decode($result1->fields["renglon17_3"]); 	
$renglon17_4=utf8_decode($result1->fields["renglon17_4"]);

$renglon18=utf8_decode($result1->fields["renglon18"]);
$renglon18_2=utf8_decode($result1->fields["renglon18_2"]); 
$renglon18_3=utf8_decode($result1->fields["renglon18_3"]); 	
$renglon18_4=utf8_decode($result1->fields["renglon18_4"]);

$renglon19=utf8_decode($result1->fields["renglon19"]);
$renglon19_2=utf8_decode($result1->fields["renglon19_2"]); 
$renglon19_3=utf8_decode($result1->fields["renglon19_3"]); 	
$renglon19_4=utf8_decode($result1->fields["renglon19_4"]);

$renglon20=utf8_decode($result1->fields["renglon20"]);
$renglon20_2=utf8_decode($result1->fields["renglon20_2"]); 
$renglon20_3=utf8_decode($result1->fields["renglon20_3"]); 	
$renglon20_4=utf8_decode($result1->fields["renglon20_4"]);

$renglon21=utf8_decode($result1->fields["renglon21"]);
$renglon21_2=utf8_decode($result1->fields["renglon21_2"]); 
$renglon21_3=utf8_decode($result1->fields["renglon21_3"]); 	
$renglon21_4=utf8_decode($result1->fields["renglon21_4"]);

$renglon22=utf8_decode($result1->fields["renglon22"]);
$renglon22_2=utf8_decode($result1->fields["renglon22_2"]); 
$renglon22_3=utf8_decode($result1->fields["renglon22_3"]); 	
$renglon22_4=utf8_decode($result1->fields["renglon22_4"]);

$renglon23=utf8_decode($result1->fields["renglon23"]);
$renglon23_2=utf8_decode($result1->fields["renglon23_2"]); 
$renglon23_3=utf8_decode($result1->fields["renglon23_3"]); 	
$renglon23_4=utf8_decode($result1->fields["renglon23_4"]);

$renglon24=utf8_decode($result1->fields["renglon24"]);
$renglon24_2=utf8_decode($result1->fields["renglon24_2"]); 
$renglon24_3=utf8_decode($result1->fields["renglon24_3"]); 	
$renglon24_4=utf8_decode($result1->fields["renglon24_4"]);

$renglon25=utf8_decode($result1->fields["renglon25"]);
$renglon25_2=utf8_decode($result1->fields["renglon25_2"]); 
$renglon25_3=utf8_decode($result1->fields["renglon25_3"]); 	
$renglon25_4=utf8_decode($result1->fields["renglon25_4"]);

$renglon26=utf8_decode($result1->fields["renglon26"]);
$renglon26_2=utf8_decode($result1->fields["renglon26_2"]); 
$renglon26_3=utf8_decode($result1->fields["renglon26_3"]); 	
$renglon26_4=utf8_decode($result1->fields["renglon26_4"]);

$renglon27=utf8_decode($result1->fields["renglon27"]);
$renglon27_2=utf8_decode($result1->fields["renglon27_2"]); 
$renglon27_3=utf8_decode($result1->fields["renglon27_3"]); 	
$renglon27_4=utf8_decode($result1->fields["renglon27_4"]);

$renglon28=utf8_decode($result1->fields["renglon28"]);
$renglon28_2=utf8_decode($result1->fields["renglon28_2"]); 
$renglon28_3=utf8_decode($result1->fields["renglon28_3"]); 	
$renglon28_4=utf8_decode($result1->fields["renglon28_4"]);

$renglon29=utf8_decode($result1->fields["renglon29"]);
$renglon29_2=utf8_decode($result1->fields["renglon29_2"]); 
$renglon29_3=utf8_decode($result1->fields["renglon29_3"]); 	
$renglon29_4=utf8_decode($result1->fields["renglon29_4"]);

$renglon30=utf8_decode($result1->fields["renglon30"]);
$renglon30_2=utf8_decode($result1->fields["renglon30_2"]); 
$renglon30_3=utf8_decode($result1->fields["renglon30_3"]); 	
$renglon30_4=utf8_decode($result1->fields["renglon30_4"]);

 




$renglon_tipo_letra_1=utf8_decode($result13->fields["renglon_tipo_letra_1"]);
$renglon_tipo_letra_2=utf8_decode($result13->fields["renglon_tipo_letra_2"]);
$renglon_tipo_letra_3=utf8_decode($result13->fields["renglon_tipo_letra_3"]);
$renglon_tipo_letra_4=utf8_decode($result13->fields["renglon_tipo_letra_4"]);
$renglon_tipo_letra_5=utf8_decode($result13->fields["renglon_tipo_letra_5"]);
$renglon_tipo_letra_6=utf8_decode($result13->fields["renglon_tipo_letra_6"]);
$renglon_tipo_letra_7=utf8_decode($result13->fields["renglon_tipo_letra_7"]);
$renglon_tipo_letra_8=utf8_decode($result13->fields["renglon_tipo_letra_8"]);
$renglon_tipo_letra_9=utf8_decode($result13->fields["renglon_tipo_letra_9"]);
$renglon_tipo_letra_10=utf8_decode($result13->fields["renglon_tipo_letra_10"]);
$renglon_tipo_letra_11=utf8_decode($result13->fields["renglon_tipo_letra_11"]);
$renglon_tipo_letra_12=utf8_decode($result13->fields["renglon_tipo_letra_12"]);
$renglon_tipo_letra_13=utf8_decode($result13->fields["renglon_tipo_letra_13"]);
$renglon_tipo_letra_14=utf8_decode($result13->fields["renglon_tipo_letra_14"]);
$renglon_tipo_letra_15=utf8_decode($result13->fields["renglon_tipo_letra_15"]);
$renglon_tipo_letra_16=utf8_decode($result13->fields["renglon_tipo_letra_16"]);

$cantidad_renglones=utf8_decode($result13->fields["cantidad_renglones"]);


if ($cantidad_renglones == "") {
	$cantidad_renglones = 16 ;
	
}

$contador =  $contador + $cantidad_renglones;
if ($contador >= 36){
$pdf->AddPage();
$contador = $cantidad_renglones;
}


$sql1="SELECT * FROM detalle_complejos where cod_grabacion = $cod_grabacion AND nro_practica = $nro_practica";
$result13 = $db->Execute($sql1);

$valor1=utf8_decode($result13->fields["valor1"]);
$valor2=utf8_decode($result13->fields["valor2"]);
$valor3=utf8_decode($result13->fields["valor3"]);
$valor4=utf8_decode($result13->fields["valor4"]);

$valor5=utf8_decode($result13->fields["valor5"]);
$valor6=utf8_decode($result13->fields["valor6"]);
$valor7=utf8_decode($result13->fields["valor7"]);
$valor8=utf8_decode($result13->fields["valor8"]);

$valor9=utf8_decode($result13->fields["valor9"]);
$valor10=utf8_decode($result13->fields["valor10"]);
$valor11=utf8_decode($result13->fields["valor11"]);
$valor12=utf8_decode($result13->fields["valor12"]);

$valor13=utf8_decode($result13->fields["valor13"]);
$valor14=utf8_decode($result13->fields["valor14"]);
$valor15=utf8_decode($result13->fields["valor15"]);
$valor16=utf8_decode($result13->fields["valor16"]);


$valor17=utf8_decode($result13->fields["valor17"]);
$valor18=utf8_decode($result13->fields["valor18"]);
$valor19=utf8_decode($result13->fields["valor19"]);
$valor20=utf8_decode($result13->fields["valor20"]);
$valor21=utf8_decode($result13->fields["valor21"]);
$valor22=utf8_decode($result13->fields["valor22"]);
$valor23=utf8_decode($result13->fields["valor23"]);
$valor24=utf8_decode($result13->fields["valor24"]);
$valor25=utf8_decode($result13->fields["valor25"]);
$valor26=utf8_decode($result13->fields["valor26"]);
$valor27=utf8_decode($result13->fields["valor27"]);
$valor28=utf8_decode($result13->fields["valor28"]);
$valor29=utf8_decode($result13->fields["valor29"]);
$valor30=utf8_decode($result13->fields["valor30"]);

$pdf->Ln();

 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result111 = $db->Execute($sql11);
$nombre_practica=utf8_decode(strtoupper($result111->fields["practica"]));
 
$unidad=utf8_decode($result111->fields["unidad"]);

 include ("titulo.php");

/*
include("renglon1.php");

include("renglon2.php");

include("renglon3.php");
include("renglon4.php");
include("renglon5.php");
include("renglon6.php");
include("renglon7.php");
include("renglon8.php");
include("renglon9.php");
include("renglon10.php");
include("renglon11.php");
include("renglon12.php");
include("renglon13.php");
include("renglon14.php");
include("renglon15.php");
include("renglon16.php");
*/

 if (($nro_practica == 2734) and ($valor7 == "")){
$valor7 = round($valor2 / $valor4,2) * 100;
 }

 
$pdf->Ln();$pdf->SetX(30);
$pdf->SetFont($letra,'',10);

 switch ($cantidad_renglones) {

case "1" : {include("renglon1.php");break;}
case "2" : {include("renglon1.php");include("renglon2.php");break;}
case "3" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");break;}
case "4" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");break;}
case "5" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");break;}
case "6" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");break;}/*
case "7" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");break;}
case "8" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");include("renglon8.php");break;}
case "9" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");include("renglon8.php");include("renglon9.php");break;}
case "10" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");include("renglon8.php");include("renglon9.php");include("renglon10.php");break;}
case "11" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");include("renglon8.php");include("renglon9.php");include("renglon10.php");include("renglon11.php");break;}
case "12" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");include("renglon8.php");include("renglon9.php");include("renglon10.php");include("renglon11.php");include("renglon12.php");break;}
case "13" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");include("renglon8.php");include("renglon9.php");include("renglon10.php");include("renglon11.php");include("renglon12.php");include("renglon13.php");break;}
case "14" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");include("renglon8.php");include("renglon9.php");include("renglon10.php");include("renglon11.php");include("renglon12.php");include("renglon13.php");include("renglon14.php");break;}
case "15" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");include("renglon8.php");include("renglon9.php");include("renglon10.php");include("renglon11.php");include("renglon12.php");include("renglon13.php");include("renglon14.php");include("renglon15.php");break;}
case "16" : {include("renglon1.php");include("renglon2.php");include("renglon3.php");include("renglon4.php");include("renglon5.php");include("renglon6.php");include("renglon7.php");include("renglon8.php");include("renglon9.php");include("renglon10.php");include("renglon11.php");include("renglon12.php");include("renglon13.php");include("renglon14.php");include("renglon15.php");include("renglon16.php");
break;}
*/
}

$contador = $contador + 3;

/*if (($nro_practica == 193) or ($nro_practica == 767) or ($nro_practica == 660547) or ($nro_practica == 134) or ($nro_practica == 654) or ($nro_practica == 363) or ($nro_practica == 905)) {
$pdf->ln();
$pdf->setX(30);
$observaciones3 = "El resultado obtenido se informa aceptando que el Laboratorio ha otorgado las indicaciones pertinentes para la recolección de orina de 24 horas. No obstante, el volumen remitido es responsabilidad del paciente y/o del personal encargado del mismo, entendiendo que la recolección incorrecta (omisión de porción o reemplazo con otro líquido) incurre en errores en los resultados.";
$pdf->MultiCell(0, 5, $observaciones3);
}*/

/*
 
   if (($renglon1_4 != '') || ($valor1 != '') || ($renglon1_2 != '')){
switch ($renglon1_4){
case "1":{
	//$pdf->Cell(80,5,$renglon1." ".$valor1." ".$renglon1_2,0,0,L);
$pdf->Cell(50,5,$renglon1,0,0,L);
$pdf->Cell(80,5,$valor1." ".$renglon1_2,0,0,L,TRUE);
break;}
case "4":{$pdf->Cell(80,5,$renglon1." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon1,0,0,'C',true);include("cambiar_color_normal.php");break;}
}
 $pdf->SetFont($letra,$renglon_tipo_letra_1,9);
$pdf->Cell(80,5,$renglon1_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
   }


  if (($renglon2_4 != '') || ($valor2 != '') || ($renglon2_2 != '')){
switch ($renglon2_4){
//case "1":{$pdf->Cell(80,5,$renglon2." ".$valor2." ".$renglon2_2,0,0,L);break;}
case "1":{
$pdf->Cell(50,5,$renglon2,0,0,L);
$pdf->Cell(80,5,$valor2." ".$renglon2_2,0,0,L,TRUE);
break;}
case "4":{$pdf->Cell(80,5,$renglon2." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon2,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

$pdf->SetX(100); 
 $pdf->SetFont($letra,$renglon_tipo_letra_2,9);
$pdf->Cell(80,5,$renglon2_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
  }



  if (($renglon3_4 != '') || ($valor3 != '') || ($renglon3_2 != '')){
switch ($renglon3_4){
case "1":{
//$pdf->Cell(80,5,$renglon3." ".$valor3." ".$renglon3_2,0,0,L);
$pdf->Cell(50,5,$renglon3,0,0,L);
$pdf->Cell(80,5,$valor3." ".$renglon3_2,0,0,L,TRUE);
break;}
case "4":{$pdf->Cell(80,5,$renglon3." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon3,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_3,9);
$pdf->Cell(80,5,$renglon3_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
  }
  
///////////////

  if (($renglon4_4 != '') || ($valor4 != '') || ($renglon4_2 != '')){
switch ($renglon4_4){
case "1":{
	//$pdf->Cell(80,5,$renglon4." ".$valor4." ".$renglon4_2,0,0,L);
	$pdf->Cell(50,5,$renglon4,0,0,L);
	$pdf->Cell(80,5,$valor4." ".$renglon4_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon4." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon4,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_4,9);
$pdf->Cell(80,5,$renglon4_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
  }


   if (($renglon5_4 != '') || ($valor5 != '') || ($renglon5_2 != '')){
switch ($renglon5_4){
case "1":{
//$pdf->Cell(80,5,$renglon5." ".$valor5." ".$renglon5_2,0,0,L);
$pdf->Cell(50,5,$renglon5,0,0,L);
$pdf->Cell(80,5,$valor5." ".$renglon5_2,0,0,L,TRUE);
break;}
case "4":{$pdf->Cell(80,5,$renglon5." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon5,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_5,9);
$pdf->Cell(80,5,$renglon5_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
   }


   if (($renglon6_4 != '') || ($valor6 != '') || ($renglon6_2 != '')){
switch ($renglon6_4){
case "1":{
	//$pdf->Cell(80,5,$renglon6." ".$valor6." ".$renglon6_2,0,0,L);
	$pdf->Cell(50,5,$renglon6,0,0,L);
	$pdf->Cell(80,5,$valor6." ".$renglon6_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon6." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon6,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_6,9);
$pdf->Cell(80,5,$renglon6_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
   }


  if (($renglon7_4 != '') || ($valor7 != '') || ($renglon7_2 != '')){
switch ($renglon7_4){
case "1":{
	//$pdf->Cell(80,5,$renglon7." ".$valor7." ".$renglon7_2,0,0,L);
	$pdf->Cell(50,5,$renglon7,0,0,L);
	$pdf->Cell(80,5,$valor7." ".$renglon7_2,0,0,L,TRUE);
break;}
case "4":{$pdf->Cell(80,5,$renglon7." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon7,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_7,9);
$pdf->Cell(80,5,$renglon7_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}

   if (($renglon8_4 != '') || ($valor8 != '') || ($renglon8_2 != '')){
switch ($renglon8_4){
case "1":{
//	$pdf->Cell(80,5,$renglon8." ".$valor8." ".$renglon8_2,0,0,L);
	$pdf->Cell(50,5,$renglon8,0,0,L);
	$pdf->Cell(80,5,$valor8." ".$renglon8_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon8." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon8,0,0,'C',true);include("cambiar_color_normal.php");break;}
}
 $pdf->SetFont($letra,$renglon_tipo_letra_8,9);
$pdf->Cell(80,5,$renglon8_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}
 
  if (($renglon9_4 != '') || ($valor9 != '') || ($renglon9_2 != '')){
switch ($renglon9_4){
case "1":{
	//$pdf->Cell(80,5,$renglon9." ".$valor9." ".$renglon9_2,0,0,L);
	$pdf->Cell(50,5,$renglon9,0,0,L);
	$pdf->Cell(80,5,$valor9." ".$renglon9_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon9." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon9,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_9,9);
$pdf->Cell(80,5,$renglon9_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}
 
 if (($renglon10_4 != '') || ($valor10 != '') || ($renglon10_2 != '')){ 
switch ($renglon10_4){
case "1":{
//	$pdf->Cell(80,5,$renglon10." ".$valor10." ".$renglon10_2,0,0,L);
	$pdf->Cell(50,5,$renglon10,0,0,L);
	$pdf->Cell(80,5,$valor10." ".$renglon10_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon10." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon10,0,0,'C',true);include("cambiar_color_normal.php");break;}


}
 $pdf->SetFont($letra,$renglon_tipo_letra_10,9);
$pdf->Cell(80,5,$renglon10_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}


  if (($renglon11_4 != '') || ($valor11 != '') || ($renglon11_2 != '')){
switch ($renglon11_4){
case "1":{
	//$pdf->Cell(80,5,$renglon11." ".$valor11." ".$renglon11_2,0,0,L);
	$pdf->Cell(50,5,$renglon11,0,0,L);
	$pdf->Cell(80,5,$valor11." ".$renglon11_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon11." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon11,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_1,9);
$pdf->Cell(80,5,$renglon11_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}

  if (($renglon12_4 != '') || ($valor12 != '') || ($renglon12_2 != '')){
switch ($renglon12_4){
case "1":{
	//$pdf->Cell(80,5,$renglon12." ".$valor12." ".$renglon12_2,0,0,L);
	$pdf->Cell(50,5,$renglon12,0,0,L);
	$pdf->Cell(80,5,$valor12." ".$renglon12_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon12." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon12,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_12,9);
$pdf->Cell(80,5,$renglon12_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}

 if (($renglon13_4 != '') || ($valor13 != '') || ($renglon13_2 != '')){
switch ($renglon13_4){
case "1":{
	//$pdf->Cell(80,5,$renglon13." ".$valor13." ".$renglon13_2,0,0,L);
	$pdf->Cell(50,5,$renglon13,0,0,L);
	$pdf->Cell(80,5,$valor13." ".$renglon13_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon13." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon13,0,0,'C',true);include("cambiar_color_normal.php");break;}
}
 $pdf->SetFont($letra,$renglon_tipo_letra_13,9);
$pdf->Cell(80,5,$renglon13_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}

 
if (($renglon14_4 != '') || ($valor14 != '') || ($renglon14_2 != '')){ 
switch ($renglon14_4){
case "1":{
	//$pdf->Cell(80,5,$renglon14." ".$valor14." ".$renglon14_2,0,0,L);
	$pdf->Cell(50,5,$renglon14,0,0,L);
	$pdf->Cell(80,5,$valor14." ".$renglon14_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon14." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon14,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_14,9);
$pdf->Cell(80,5,$renglon14_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}

 
if (($renglon15_4 != '') || ($valor15 != '') || ($renglon15_2 != '')){
switch ($renglon15_4){
case "1":{
	//$pdf->Cell(80,5,$renglon15." ".$valor15." ".$renglon15_2,0,0,L);
	$pdf->Cell(50,5,$renglon15,0,0,L);
	$pdf->Cell(80,5,$valor15." ".$renglon15_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon15." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon15,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_15,9);
$pdf->Cell(80,5,$renglon15_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}

 if (($renglon16_4 != '') || ($valor16 != '') || ($renglon16_2 != '')){
switch ($renglon16_4){
case "1":{
//	$pdf->Cell(80,5,$renglon16." ".$valor16." ".$renglon16_2,0,0,L);
	$pdf->Cell(50,5,$renglon16,0,0,L);
	$pdf->Cell(80,5,$valor16." ".$renglon16_2,0,0,L,TRUE);
	break;}
case "4":{$pdf->Cell(80,5,$renglon16." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon16,0,0,'C',true);include("cambiar_color_normal.php");break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_16,9);
$pdf->Cell(80,5,$renglon16_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
 }

*/

/*
switch ($renglon17_4){
case "1":{$pdf->Cell(80,5,$renglon17." ".$valor17." ".$renglon17_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon17." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon17_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon18_4){
case "1":{$pdf->Cell(80,5,$renglon18." ".$valor18." ".$renglon18_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon18." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon18_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon19_4){
case "1":{$pdf->Cell(80,5,$renglon19." ".$valor19." ".$renglon19_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon19." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon19_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon20_4){
case "1":{$pdf->Cell(80,5,$renglon20." ".$valor20." ".$renglon20_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon20." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon20_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon21_4){
case "1":{$pdf->Cell(80,5,$renglon21." ".$valor21." ".$renglon21_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon21." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon21_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon22_4){
case "1":{$pdf->Cell(80,5,$renglon22." ".$valor22." ".$renglon22_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon22." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon22_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon23_4){
case "1":{$pdf->Cell(80,5,$renglon23." ".$valor23." ".$renglon23_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon23." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon23_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon24_4){
case "1":{$pdf->Cell(80,5,$renglon24." ".$valor24." ".$renglon24_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon24." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon24_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon25_4){
case "1":{$pdf->Cell(80,5,$renglon25." ".$valor25." ".$renglon25_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon25." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon25_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon26_4){
case "1":{$pdf->Cell(80,5,$renglon26." ".$valor26." ".$renglon26_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon26." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon26_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon27_4){
case "1":{$pdf->Cell(80,5,$renglon27." ".$valor27." ".$renglon27_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon27." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon27_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon28_4){
case "1":{$pdf->Cell(80,5,$renglon28." ".$valor28." ".$renglon28_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon28." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon28_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon29_4){
case "1":{$pdf->Cell(80,5,$renglon29." ".$valor29." ".$renglon29_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon29." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon29_3);$pdf->ln();$pdf->SetX(30);

switch ($renglon30_4){
case "1":{$pdf->Cell(80,5,$renglon30." ".$valor30." ".$renglon30_2,0,0,L);break;}
case "4":{$pdf->Cell(80,5,$renglon30." ".'',0,0,L);break;}}
$pdf->Cell(80,5,$renglon30_3);$pdf->ln();$pdf->SetX(30);

*/