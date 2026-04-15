<?php 
	
 	$tipo_det;

	$suma_renglones = 31;
	SWITCH ($tipo_det){

case "Desde-Hasta": {

if ($contador >= $suma_renglones){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	$contador = $contador + 1;
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
 $pdf->SetX(20); 
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



if ($contador >= $suma_renglones){
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
	$desde = " menor a ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = "  ".$desde;
$hasta = "";
}




$pdf->SetX(20); 
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

if ($edad == 0){


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h and nro_ref = $nro_ref";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {


$cos = $cos + 1;



$result11->MoveNext();

 }


$contador = $contador + $co;
$co = "";
 
if ($contador >= $suma_renglones){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}

 
$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h and nro_ref = $nro_ref order by orden";
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
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 


$pdf->SetX(20); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(40,60, 60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($columna1, $desde.'  '.$hasta."  ".$unidad,  $columna2));


$contador = $contador + 1;

$result11->MoveNext();


 }

 $pdf->ln();


}else{



if ($contador >= $suma_renglones){
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
 

$pdf->SetX(20); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(40,60, 60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($columna1, $desde.'  '.$hasta."  ".$unidad,  $columna2));
$pdf->ln();

$contador = $contador + 1;

}

breaK;}

case "Des-Has+Sexo": {

if ($contador >= $suma_renglones){
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
 $pdf->SetX(20); 
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

	if ($contador >= $suma_renglones){
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


$co = $co + 1;



$result11->MoveNext();


 }

$contador9 = $contador + $co;
$co = "";
 
 
 


if ($contador9 >= $suma_renglones){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref order by orden, cod_operacion";
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
	$desde = " menor a ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " mayor a ".$desde;
$hasta = "";
}


$contad = $contad + 1;



if ($contad == 1){
	$valor_referencia = "V.R:";
}else
	 {
$valor_referencia = "       ";
	 }

$contador = $contador +1;

$pdf->SetX(5); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(47,55));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

if (($desde == 0) and ($hasta == 0) or ($desde == 0.00) and ($hasta == 0.00)){
		$pdf->SetX(10); 
$pdf->Row(array($valor_referencia." ".$columna1, ''.' '.''.'  '.$unidad,  $columna2));

}else{

if (($desde > 0) and ($hasta > 0)){
$pdf->SetX(10); 
$pdf->Row(array($valor_referencia." ".$columna1, $desde.' - '.$hasta.'  '.$unidad,  $columna2));
}else{
	$pdf->SetX(10); 
$pdf->Row(array($valor_referencia." ".$columna1, $desde.' '.$hasta.'  '.$unidad,  $columna2));
}

}

$result11->MoveNext();


 }
$contad = 0;

$pdf->ln();





breaK;}



CASE "Años":{

 
if ($contador >= $suma_renglones){
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
$pdf->SetX(20); 
$pdf->Row(array("V.R ".$columna1, $desde.' - '.$hasta."  ".$unidad,  $columna2));
 




 $contador = $contador + 1;
$pdf->ln();










break;}

CASE "Años Sexo":{

if ($contador >= $suma_renglones){
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



$pdf->SetX(20); 
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

if ($contador >= $suma_renglones){
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

 $pdf->SetX(20); 
$pdf->Row(array("V.R: ".$columna1,$columna2, $desde.' - '.$hasta."  ".$unidad));

$contador = $contador + 1;
$pdf->ln();
break;}



CASE "Valores Hasta":{

if ($contador >= $suma_renglones){
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
	 $pdf->SetX(20); 
$pdf->Row(array("V.R: ".$columna1,$desde.' - '.$hasta."  ".$unidad, $columna2));
 }
 elseif (($desde == '') and ($hasta != '')){
	 $pdf->SetX(20); 
$pdf->Row(array("V.R: ".$columna1, ' menor a '.$hasta."  ".$unidad, $columna2));
 } 
 elseif (($desde != '') and ($hasta == '')){
	 $pdf->SetX(20); 
$pdf->Row(array("V.R: ".$columna1, ' mayor a: '.$desde."  ".$unidad , $columna2));
 }

$contador = $contador + 1;
$pdf->ln();

break;}



CASE "Valores Sexo":{

if ($contador >= $suma_renglones){
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
	$desde = " menor a ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " mayor a ".$desde;
$hasta = "";
}






$pdf->SetX(20); 
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


if ($contador >= $suma_renglones){
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
	$desde = " menor a ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " mayor a ".$desde;
$hasta = "";
}




$pdf->SetX(20); 
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


$pdf->Cell(20,5,round($saturacion,2));
$contador = $contador + 3;
$saturacion = "";
$pdf->ln();
$pdf->ln();
}

 

 if (($colesterol_reservado > 0) and ($hdl > 0) and ($trigliceridos_reservado)){

IF ($vldl > 0){
$pdf->SetX(30); 
$pdf->SetFont($letra,'BI',12);
$pdf->Cell(60,5,"VLDL: ");


$pdf->Cell(20,5,round($vldl,2)." ".$unidad);
$contador = $contador + 3;
$vldl = "";
$pdf->ln();
$pdf->ln();
}

IF ($ldl > 0){
$pdf->SetX(30); 
$pdf->SetFont($letra,'BI',12);
$pdf->Cell(60,5,"LDL: ");


$pdf->Cell(20,5,round($ldl,2)." ".$unidad);
$contador = $contador + 3;
$vldl = "";
$ldl = "";
$pdf->ln();
$pdf->ln();
}


IF ($riesgo > 0){
$pdf->SetX(30); 
$pdf->SetFont($letra,'BI',12);
$pdf->Cell(60,5,"RIESGO ATEROGENICO: ");


$pdf->Cell(20,5,round($riesgo,3));
$contador = $contador + 3;
$riesgo = "";
$pdf->ln();
$pdf->ln();


}

 } // cierrra colesteror / trigli + hdl = vdl ldl



 

IF ($relacion_ag > 0){
$pdf->SetX(30); 
$pdf->SetFont($letra,'BI',12);
$pdf->Cell(60,5,"RELACION A/G: ");


$pdf->Cell(20,5,round($relacion_ag,2)." ".$unidad);
$contador = $contador + 3;
$relacion_ag = "";
$pdf->ln();
$pdf->ln();
}


 


