<?php 
	
 	$hasta_contador = 30;
	SWITCH ($tipo_det){


case "Libre": {
  $sql11="select * from convenio_referencia where cod_practica =  $modulo and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {

$co = $co + 1;
$result11->MoveNext();
 }

 $contador9 = $contador + $co;




//echo "co".$contador;
if ($contador9 >= $hasta_contador){
$pdf->AddPage();
	$contador = 1;
	$e = "erg";
	include ("titulo_practica_modulo.php");
	$co = "";

}else{
	$e = "por aca";

	include ("titulo_practica_modulo.php");
	$contador = $contador + $co;
	$co = "";
}

$pdf->SetFont($letra,'B',9);
$pdf->SetX(150);
$pdf->Cell(65,5,"");
$pdf->SetFont($letra,'',9);  
$pdf->ln();

$sql11="select * from convenio_referencia where cod_practica =  $modulo and nro_ref = $nro_ref order by cod_operacion";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {


$tipo=strtoupper($result11->fields["tipo"]);
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$desde1=$result11->fields["desde"];
$hasta1=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];
$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if (($modulo == 873) or ($modulo == 874) or ($modulo == 357) or ($modulo == 22) or ($modulo == 190) or ($modulo == 594) or ($modulo == 420)  or ($modulo == 613) or ($modulo == 18) or ($modulo == 1045) or ($modulo == 23)       ){
$desde = number_format($desde);;
}

  if (($modulo == 873) or ($modulo == 874) or ($modulo == 357) or ($modulo == 22) or ($modulo == 190) or ($modulo == 594) or ($modulo == 420)  or ($modulo == 613) or ($modulo == 18) or ($modulo == 1045) or ($modulo == 23)       ){
$hasta = number_format($hasta);;
}


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
	$valor_referencia = "Valores de Referencia:";
	}else
	 {
$valor_referencia = "              ";
	 }

//$contador = $contador +1;


$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(45,70));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


if (($desde > 0) and ($hasta > 0)){
$pdf->SetFont($letra,'',9);
$pdf->SetX(100); 
$pdf->Row_i(array($columna1." ".$columna2, $desde.' - '.$hasta.'  '.$unidad));
}else{

	IF (($desde1 == 0) and ($hasta1 == 0)){

		$desde = "";
		$hasta = "";
	}


$pdf->SetFont($letra,'',9);
$pdf->SetX(100); 
$pdf->Row_i(array($desde.' '.$hasta.'  '.$unidad,  $columna1." ".$columna2));
}



$result11->MoveNext();


 }


$contador = $contador +1;

$contad = 0;
$contador9 = 0;
//$pdf->ln();





breaK;}





case "Des-Has+años": {

if ($contador>= $hasta_contador){
//$pdf->AddPage();
	 $contador = 1;
	include ("titulo_practica_modulo.php");

}else{
	include ("titulo_practica_modulo.php");
}


$sql11="select * from convenio_referencia where cod_practica =  $modulo and $edad between anio_d and anio_h and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];


 if (($modulo == 873) or ($modulo == 874) or ($modulo == 357) or ($modulo == 22) or ($modulo == 190) or ($modulo == 594) or ($modulo == 420)  or ($modulo == 613) or ($modulo == 18) or ($modulo == 1045) or ($modulo == 23)       ){
$desde = number_format($desde);;
}

  if (($modulo == 873) or ($modulo == 874) or ($modulo == 357) or ($modulo == 22) or ($modulo == 190) or ($modulo == 594) or ($modulo == 420)  or ($modulo == 613) or ($modulo == 18) or ($modulo == 1045) or ($modulo == 23)       ){
$hasta = number_format($hasta);;
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if (($desde == 0.00) or ($desde == 0)){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 


$pdf->SetX(50); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($columna1, $desde.'  '.$hasta."  ".$unidad,  $columna2));
$pdf->ln();

$contador = $contador + 1;


breaK;}

case "Des-Has+Sexo": {

if ($contador>= $hasta_contador){
//$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica_modulo.php");

}else{
	include ("titulo_practica_modulo.php");
}

 $sql11="select * from convenio_referencia where cod_practica =  $modulo  and tipo like '$sexo' and nro_ref = $nro_ref";

 
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if (($modulo == 873) or ($modulo == 874) or ($modulo == 357) or ($modulo == 22) or ($modulo == 190) or ($modulo == 594) or ($modulo == 420)  or ($modulo == 613) or ($modulo == 18) or ($modulo == 1045) or ($modulo == 23)       ){
$desde = number_format($desde);;
}

  if (($modulo == 873) or ($modulo == 874) or ($modulo == 357) or ($modulo == 22) or ($modulo == 190) or ($modulo == 594) or ($modulo == 420)  or ($modulo == 613) or ($modulo == 18) or ($modulo == 1045) or ($modulo == 23)       ){
$hasta = number_format($hasta);;
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if (($desde == 0.00) or ($desde == 0)){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 $pdf->SetX(50); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,40, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R: ".$columna1, $desde.'  '.$hasta.'  '.$unidad,  $columna2));
$pdf->ln();

$contador = $contador + 1;


breaK;}


case "Sin Valor Ref.": {

	if ($contador >= $hasta_contador){
//$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica_modulo.php");

}else{
	include ("titulo_practica_modulo.php");
}


//$sql11="select * from convenio_referencia where cod_practica =  $modulo and tipo like '$sexo'";
$sql11="select * from convenio_referencia where cod_practica =  $modulo and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

$contador = $contador + 1;
$pdf->ln();



breaK;}





case "Sexo+Libre": {


//$sql11="select * from convenio_referencia where cod_practica =  $modulo and tipo like '$sexo'";


//$pdf->AddPage();


$sql11="select * from convenio_referencia where cod_practica =  $modulo and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {


$contador = $contador + 1;



$result11->MoveNext();


 }


/*
$pdf->SetX(160);
$pdf->Cell(20,5,$contador); 
*/


if ($contador>= $hasta_contador){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica_modulo.php");

}else{
	include ("titulo_practica_modulo.php");
}


$sql11="select * from convenio_referencia where cod_practica =  $modulo and tipo like '$sexo' and nro_ref = $nro_ref order by cod_operacion";
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

if (($modulo == 873) or ($modulo == 874) or ($modulo == 357) or ($modulo == 22) or ($modulo == 190) or ($modulo == 594) or ($modulo == 420)  or ($modulo == 613) or ($modulo == 18) or ($modulo == 1045) or ($modulo == 23)       ){
$desde = number_format($desde);;
}

  if (($modulo == 873) or ($modulo == 874) or ($modulo == 357) or ($modulo == 22) or ($modulo == 190) or ($modulo == 594) or ($modulo == 420)  or ($modulo == 613) or ($modulo == 18) or ($modulo == 1045) or ($modulo == 23)       ){
$hasta = number_format($hasta);;
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if (($desde == 0.00) or ($desde == 0)){
	$desde = "Menor de";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " Mayor de ".$desde;
$hasta = "";
}




$pdf->SetX(50); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(40,40, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R: ".$columna1, $desde.'  '.$hasta.'  '.$unidad,  $columna2));


$result11->MoveNext();


 }

$contador = $contador + 1;
$pdf->ln();





breaK;}
 

}




IF ($saturacion > 0){
$pdf->SetX(30); 
$pdf->SetFont($letra,'BI',12);
$pdf->Cell(40,5,"% SATURACION: ");


$pdf->Cell(20,5,$saturacion);
$contador = $contador + 3;
$saturacion = "";
$pdf->ln();
$pdf->ln();
}
