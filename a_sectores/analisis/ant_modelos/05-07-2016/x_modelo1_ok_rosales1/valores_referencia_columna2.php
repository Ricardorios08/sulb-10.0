<?php 
	
 	$tipo_det;

	$nro_contador = 24;
	SWITCH ($tipo_det){

case "Desde-Hasta": {

if ($contador >= $nro_contador){
//$pdf->AddPage();
$conta_col = 1;
$pdf->SetX(120);
 

	$contador = 1;
	include ("titulo_practica_columna2.php");

}else{
	include ("titulo_practica_columna2.php");
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


if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}


if ($desde == 0.00){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));
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



if ($contador >= $nro_contador){
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


if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}


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
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));


$result11->MoveNext();


 }

$contador = $contador + 1;
$pdf->ln();






breaK;}



case "Des-Has+años": {

if ($contador >= $nro_contador){
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


if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}


if ($desde == 0.00){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));
$pdf->ln();

$contador = $contador + 1;


breaK;}

case "Des-Has+Sexo": {

if ($contador >= $nro_contador){
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


if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

if ($desde == 0.00){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));
$pdf->ln();

$contador = $contador + 1;


breaK;}


case "Sin Valor Ref.": {

	if ($contador >= $nro_contador){
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


if ($contador >= $nro_contador){
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
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];


if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}


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
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));


$result11->MoveNext();


 }

$contador = $contador + 1;
$pdf->ln();





breaK;}



CASE "Años":{

 
if ($contador >= $nro_contador){
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

 if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}



$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


 if ($desde == 0.00){
$desde = "Hasta ";
 }

$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));
 




 $contador = $contador + 1;
$pdf->ln();










break;}

CASE "Años Sexo":{

if ($contador >= $nro_contador){
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
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}


$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));
$pdf->ln();

$contador = $contador + 1;
 

break;}



CASE "Valores":{

if ($contador >= $nro_contador){
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


 if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

 
$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));

$contador = $contador + 1;
$pdf->ln();
break;}



CASE "Valores Hasta":{

if ($contador >= $nro_contador){
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
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];



if ($desde == ""){
   $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and nro_ref = $nro_ref order by desde desc limit 1";
$result11 = $db->Execute($sql11);


$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];
}

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

 
$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
if (($nro_practica == 174) or ($nro_practica == 876)) {
$pdf->SetX(155);
$pdf->SetWidths(array(120));
}else{
$pdf->SetX(155);
$pdf->SetWidths(array(120));
}
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

if ($hasta == '0.00'){
	$hasta = "";
}

if ($desde== '0.00'){
	$desde = "";
}


 if (($desde != '') and ($hasta != '')){
 
$pdf->Row(array("V.R ".$columna1." ".$desde.' - '.$hasta." ".$unidad." ".$columna2));
 }
 elseif (($desde == '') and ($hasta != '')){
 
$pdf->Row(array("V.R ".$columna1." < de ".$hasta." ".$unidad." ".$columna2));
 } 
 elseif (($desde != '') and ($hasta == '')){
 
$pdf->Row(array("V.R ".$columna1. '> de: '.$desde." ".$unidad." ".$columna2));
 }

$contador = $contador + 1;
$pdf->ln();



break;}



CASE "Valores Sexo":{

if ($contador >= $nro_contador){
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
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}

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
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));

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


if ($contador >= $nro_contador){
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
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];


if ($decimal == 1){$desde = round($desde);$hasta = round($hasta);}


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
$pdf->SetX(155);
$pdf->SetWidths(array(120));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array("V.R ".$columna1." ".$desde.'  '.$hasta." ".$unidad." ".$columna2));


$result11->MoveNext();


 }

$contador = $contador + 1;
$pdf->ln();





breaK;}
 

}