<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_antibiograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$s1=strtoupper($result11->fields["s1"]);
$s2=strtoupper($result11->fields["s2"]);
$s3=strtoupper($result11->fields["s3"]);
$s4=strtoupper($result11->fields["s4"]);
$s5=strtoupper($result11->fields["s5"]);
$r1=strtoupper($result11->fields["r1"]);
$r2=strtoupper($result11->fields["r2"]);
$r3=strtoupper($result11->fields["r3"]);
$r4=strtoupper($result11->fields["r4"]);
$r5=strtoupper($result11->fields["r5"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


include ("practica.php");

$pdf->ln();
$pdf->SetX(30);

$pdf->SetFont($letra,'',10);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,130));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

$pdf->Row_i(array('SENSIBLE A:'));
$pdf->Row_i(array('',$s1));
$pdf->Row_i(array('',$s2 ));
$pdf->Row_i(array('',$s3 ));
$pdf->Row_i(array('',$s4 ));
$pdf->Row_i(array('',$s5 ));
$pdf->ln();
$pdf->ln();
$pdf->SetX(30);
$pdf->Row_i(array('' ,''));
$pdf->Row_i(array('RESISTENTE A:' ));
$pdf->Row_i(array('',$r1 ));
$pdf->Row_i(array('',$r2 ));
$pdf->Row_i(array('',$r3 ));
$pdf->Row_i(array('',$r4 ));
$pdf->Row_i(array('',$r5 ));




?>