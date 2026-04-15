<?php 
	
 	$tipo_det;
  $edad;

//if ($edad == "SIN CARGAR"){
//$tipo_det = "libre";
//	}

$tipo_det = "Libre";
	SWITCH ($tipo_det){

case "Libre": {


//$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";


//$pdf->AddPage();


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {


$contador = $contador + 1;


$result11->MoveNext();


 }

$contador = $contador + $contador1;
/*
$pdf->SetX(160);
$pdf->Cell(20,5,$contador); 
*/

 $pdf->Ln();
if ($contador >= 27){
$pdf->AddPage();
	$contador = 0;
	include ("titulo_practica.php");
	//$contador = 0;
}else{
	include ("titulo_practica.php");
	
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica order by cod_operacion";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if ($desde == 0.00){
	$desde = " < ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " > ".$desde;
$hasta = "";
}

 $desde1=$result11->fields["desde"];
$hasta1=$result11->fields["hasta"];

$desde1=number_format($result11->fields["desde"], 0, ',', '.');
$hasta1=number_format($result11->fields["hasta"], 0, ',', '.');

$contador = $contador + 1;
 

$pdf->SetX(10); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(60,60, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R: ".$columna1, $desde.'  '.$hasta , $unidad,  $columna2));


$result11->MoveNext();


 }


//$pdf->ln();





breaK;}


case "Desde-Hasta": {

if ($contador >= 27){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");

}else{
	include ("titulo_practica.php");
}


 $sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if ($desde == 0.00){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R ".$columna1, $desde.'  '.$hasta , $unidad,  $columna2));
$pdf->ln();

$contador = $contador + 1;


breaK;}

case "Mayor": {

$sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {


$contador = $contador + 1;



$result11->MoveNext();


 }



if ($contador >= 27){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");
	//$contador = 0;
}else{
	include ("titulo_practica.php");
	
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica order by cod_operacion";
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

if ($desde == 0.00){
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
$pdf->Row(array("V.R: ".$columna1, $desde." ".$unidad ,  $columna2));


$result11->MoveNext();


 }


$pdf->ln();






breaK;}



case "Des-Has+años": {

if ($contador >= 27){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");
	//$contador = 0;
}else{
	include ("titulo_practica.php");
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if ($desde == 0.00){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($columna1, $desde.'  '.$hasta , $unidad,  $columna2));
$pdf->ln();

$contador = $contador + 1;


breaK;}

case "Des-Has+Sexo": {

if ($contador >= 27){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");
	//$contador = 0;
}else{
	include ("titulo_practica.php");
}

 $sql11="select * from convenio_referencia where cod_practica =  $nro_practica  and tipo like '$sexo'";

 
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if ($desde == 0.00){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R: ".$columna1, $desde.'  '.$hasta , $unidad,  $columna2));
$pdf->ln();

$contador = $contador + 1;


breaK;}


case "Sin Valor Ref.": {

	if ($contador >= 36){
$pdf->AddPage();

	$contador = 1;
	include ("titulo_practica.php");
//	$contador = 0;
}else{
	include ("titulo_practica.php");
}

$pdf->ln();
//$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";
$sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
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






CASE "Años":{

if ($contador >= 27){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");
	//$contador = 0;
}else{
	include ("titulo_practica.php");
}


 $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h";
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
$pdf->SetWidths(array(20,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


 if ($desde == 0.00){
$desde = "Hasta ";
 }

$pdf->Row(array("V.R ".$columna1, $desde.'  '.$hasta , $unidad,  $columna2));
 




 
$pdf->ln();










break;}

CASE "Años Sexo":{

if ($contador >= 27){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");
	//$contador = 0;
}else{
	include ("titulo_practica.php");
}



  $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h and tipo like '$sexo'";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];




$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R: ".$columna1, $desde.'  '.$hasta , $unidad,  $columna2));
$pdf->ln();


$pdf->ln();

break;}



CASE "Valores":{

if ($contador >= 27){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");
	//$contador = 0;
}else{
	include ("titulo_practica.php");
}


   $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $valor between desde and hasta";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];


 

$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(70,40,60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

 
$pdf->Row(array("V.R: ".$columna1,$columna2, $desde.' - '.$hasta." ".$unidad));


$pdf->ln();
break;}



CASE "Valores Hasta":{

if ($contador >= 27){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");
//	$contador = 0;
}else{
	include ("titulo_practica.php");
}




$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $valor between desde and hasta";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];



if ($desde == ""){
   $sql11="select * from convenio_referencia where cod_practica =  $nro_practica order by desde desc limit 1";
$result11 = $db->Execute($sql11);


$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];
}


$pdf->SetX(10);
$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(70,40,60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

if ($hasta == '0.00'){
	$hasta = "";
}

if ($desde== '0.00'){
	$desde = "";
}


 if (($desde != '') and ($hasta != '')){
$pdf->Row(array("V.R: ".$columna1,$columna2, $desde.' - '.$hasta." ".$unidad));
 }
 elseif (($desde == '') and ($hasta != '')){
$pdf->Row(array("V.R: ".$columna1,$columna2, ' < de '.$hasta." ".$unidad));
 } 
 elseif (($desde != '') and ($hasta == '')){
$pdf->Row(array("V.R: ".$columna1,$columna2, ' > de: '.$desde." ".$unidad));
 }

$pdf->ln();

break;}



CASE "Valores Sexo":{

if ($contador >= 27){
$pdf->AddPage();
	$contador = 1;
	include ("titulo_practica.php");
	//$contador = 0;
}else{
	include ("titulo_practica.php");
}


  $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];



 if ($desde == 0.00){
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
$pdf->Row(array("V.R: ".$columna1, $desde." ".$unidad ,  $columna2));

$pdf->ln();

break;}





}