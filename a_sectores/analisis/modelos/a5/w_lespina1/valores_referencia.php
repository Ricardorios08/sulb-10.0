<?php 
	
 	$tipo_det;
	SWITCH ($tipo_det){

case "Desde-Hasta": {

if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


 $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}




if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}


if (($desde == 0.00) or ($desde == 0)){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,40, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R ".$columna1, $desde.'  '.$hasta."  ".$unidad,  $columna2));
$pdf->ln();

$contador = $contador + 1;


breaK;}

case "Mayor": {

$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {


$contador = $contador + 1;



$result11->MoveNext();


 }



if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref order by cod_operacion";
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

if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if (($desde == 0.00) or ($desde == 0)){
	$desde = " < ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = "  ".$desde;
$hasta = "";
}





$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(35,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R: ".$columna1, $desde."  ".$unidad ,  $columna2));


$result11->MoveNext();


 }

$contador = $contador + 1;
$pdf->ln();






breaK;}



case "Des-Has+años": {

if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];


 if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if (($desde == 0.00) or ($desde == 0)){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 



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

if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}

 $sql11="select * from convenio_referencia where cod_practica =  $nro_practica  and tipo like '$sexo' and nro_ref = $nro_ref";

 
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if (($desde == 0.00) or ($desde == 0)){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 
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

	if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


//$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";
$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref";
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


case "Libre": {


//$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";


//$pdf->AddPage();


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref";
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


if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref order by cod_operacion";
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

if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}


if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}
if (($desde == 0.00) or ($desde == 0)){
	$desde = " < ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " > ".$desde;
$hasta = "";
}


$contad = $contad + 1;

if ($contad == 1){
	$valor_referencia = "V. de R.:";
}else
	 {
$valor_referencia = "              ";
	 }



$pdf->SetX(10); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(50,55));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($valor_referencia." ".$columna1, $desde.' - '.$hasta.'  '.$unidad,  $columna2));


$result11->MoveNext();


 }
$contad = 0;
$contador = $contador + 1;
$pdf->ln();





breaK;}



CASE "Años":{

 
if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


 $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
 $hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

 

$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(40,40, 40));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if (($desde == 0.00) or ($desde == 0)){
$desde = "Hasta ";
 }

$pdf->Row(array("V.R ".$columna1, $desde.' - '.$hasta."  ".$unidad,  $columna2));
 




 $contador = $contador + 1;
$pdf->ln();










break;}

CASE "Años Sexo":{

if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}



  $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h and tipo like '$sexo' and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}




$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,40, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R: ".$columna1, $desde.'  '.$hasta.'  '.$unidad,  $columna2));
$pdf->ln();

$contador = $contador + 1;
 

break;}



CASE "Valores":{

if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


   $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $valor between desde and hasta and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];


 if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}





$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(70,40,60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

 
$pdf->Row(array("V.R: ".$columna1,$columna2, $desde.' - '.$hasta."  ".$unidad));

$contador = $contador + 1;
$pdf->ln();
break;}



CASE "Valores Hasta":{

if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}



$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $valor between desde and hasta and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];



if ($desde == ""){
   $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref order by desde desc limit 1";
$result11 = $db->Execute($sql11);


$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];
}


$pdf->SetX(10);
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,40, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

$pdf->ln();

if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}



if (($hasta == 0.00) or ($hasta == 0)){


 
	$hasta = "";
}

if ($desde== '0.00'){
	$desde = "";
}


 if (($desde != '') and ($hasta != '')){
$pdf->Row(array("V.R: ".$columna1,$desde.' - '.$hasta."  ".$unidad, $columna2));
 }
 elseif (($desde == '') and ($hasta != '')){
$pdf->Row(array("V.R: ".$columna1, ' menor de '.$hasta."  ".$unidad, $columna2));
 } 
 elseif (($desde != '') and ($hasta == '')){
$pdf->Row(array("V.R: ".$columna1, ' mayor de: '.$desde."  ".$unidad , $columna2));
 }

$contador = $contador + 1;
$pdf->ln();

break;}



CASE "Valores Sexo":{

if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


  $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo' and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];



if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if (($desde == 0.00) or ($desde == 0)){
	$desde = " < ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " > ".$desde;
$hasta = "";
}







$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(35,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R: ".$columna1, $desde."  ".$unidad ,  $columna2));

$contador = $contador + 1;
$pdf->ln();

break;}


case "Sexo+Libre": {


//$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";


//$pdf->AddPage();


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref";
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


if ($contador >= 17){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo' and nro_ref = $nro_ref order by cod_operacion";
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

if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$desde = number_format($desde);;
}

  if (($nro_practica == 873) or ($nro_practica == 874) or ($nro_practica == 357) or ($nro_practica == 22) or ($nro_practica == 190) or ($nro_practica == 594) or ($nro_practica == 420)  or ($nro_practica == 613) or ($nro_practica == 18) or ($nro_practica == 1045) or ($nro_practica == 23)       ){
$hasta = number_format($hasta);;
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if (($desde == 0.00) or ($desde == 0)){
	$desde = " < ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " > ".$desde;
$hasta = "";
}




$pdf->SetX(10); 
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

$pdf->SetFont($letra,'BI',12);
$pdf->Cell(40,5,"% SATURACION: ");


$pdf->Cell(20,5,$saturacion);
$contador = $contador + 2;
$saturacion = "";
$pdf->ln();
$pdf->ln();
}
