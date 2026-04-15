<?php 
include ("../../../conexiones/config.inc.php");

$cod_practica = $_REQUEST['cod_practica'];

 $sql1="SELECT * FROM convenio_practica where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);



$nro_os=$result1->fields["nro_os"];
$cod_equivalencia=$result1->fields["cod_equivalencia"]; 
$categoria=$result1->fields["categoria"]; 	
$honorarios=$result1->fields["honorarios"]; 	
$gastos=$result1->fields["gastos"]; 
$valor=$result1->fields["valor"]; 	
$practica=$result1->fields["practica"]; 	
$metodo=$result1->fields["metodo"]; 
$referencia=$result1->fields["referencia"];
$referencia1=$result1->fields["referencia1"];
$referencia2=$result1->fields["referencia2"];
$referencia3=$result1->fields["referencia3"];
 $unidad=$result1->fields["unidad"];
 $por=$result1->fields["por"];
 $clase=$result1->fields["clase"];
$salto=$result1->fields["salto"];
$decimal=$result1->fields["decimal"];

 $tipo_det=$result1->fields["tipo_det"];

  $lab_derivacion=$result1->fields["lab_derivacion"];
  $deriva=$result1->fields["deriva"];


 $sql1="SELECT * FROM convenio_practica_complejo where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);

$renglon1=$result1->fields["renglon1"];
$renglon1_2=$result1->fields["renglon1_2"]; 
$renglon1_3=$result1->fields["renglon1_3"]; 	
$renglon1_4=$result1->fields["renglon1_4"]; 

$visible_1=$result1->fields["visible_1"]; 
$mostrar_1=$result1->fields["mostrar_1"]; 

$renglon2=$result1->fields["renglon2"];
$renglon2_2=$result1->fields["renglon2_2"]; 
$renglon2_3=$result1->fields["renglon2_3"]; 	
$renglon2_4=$result1->fields["renglon2_4"];

$renglon3=$result1->fields["renglon3"];
$renglon3_2=$result1->fields["renglon3_2"]; 
$renglon3_3=$result1->fields["renglon3_3"]; 	
$renglon3_4=$result1->fields["renglon3_4"];

$renglon4=$result1->fields["renglon4"];
$renglon4_2=$result1->fields["renglon4_2"]; 
$renglon4_3=$result1->fields["renglon4_3"]; 	
$renglon4_4=$result1->fields["renglon4_4"];

$renglon5=$result1->fields["renglon5"];
$renglon5_2=$result1->fields["renglon5_2"]; 
$renglon5_3=$result1->fields["renglon5_3"]; 	
$renglon5_4=$result1->fields["renglon5_4"];

$renglon6=$result1->fields["renglon6"];
$renglon6_2=$result1->fields["renglon6_2"]; 
$renglon6_3=$result1->fields["renglon6_3"]; 	
$renglon6_4=$result1->fields["renglon6_4"];

$renglon7=$result1->fields["renglon7"];
$renglon7_2=$result1->fields["renglon7_2"]; 
$renglon7_3=$result1->fields["renglon7_3"]; 	
$renglon7_4=$result1->fields["renglon7_4"];

$renglon8=$result1->fields["renglon8"];
$renglon8_2=$result1->fields["renglon8_2"]; 
$renglon8_3=$result1->fields["renglon8_3"]; 	
$renglon8_4=$result1->fields["renglon8_4"];

$renglon9=$result1->fields["renglon9"];
$renglon9_2=$result1->fields["renglon9_2"]; 
$renglon9_3=$result1->fields["renglon9_3"]; 	
$renglon9_4=$result1->fields["renglon9_4"];

$renglon10=$result1->fields["renglon10"];
$renglon10_2=$result1->fields["renglon10_2"]; 
$renglon10_3=$result1->fields["renglon10_3"]; 	
$renglon10_4=$result1->fields["renglon10_4"];

$renglon11=$result1->fields["renglon11"];
$renglon11_2=$result1->fields["renglon11_2"]; 
$renglon11_3=$result1->fields["renglon11_3"]; 	
$renglon11_4=$result1->fields["renglon11_4"];

$renglon12=$result1->fields["renglon12"];
$renglon12_2=$result1->fields["renglon12_2"]; 
$renglon12_3=$result1->fields["renglon12_3"]; 	
$renglon12_4=$result1->fields["renglon12_4"];

$renglon13=$result1->fields["renglon13"];
$renglon13_2=$result1->fields["renglon13_2"]; 
$renglon13_3=$result1->fields["renglon13_3"]; 	
$renglon13_4=$result1->fields["renglon13_4"];

$renglon14=$result1->fields["renglon14"];
$renglon14_2=$result1->fields["renglon14_2"]; 
$renglon14_3=$result1->fields["renglon14_3"]; 	
$renglon14_4=$result1->fields["renglon14_4"];

$renglon15=$result1->fields["renglon15"];
$renglon15_2=$result1->fields["renglon15_2"]; 
$renglon15_3=$result1->fields["renglon15_3"]; 	
$renglon15_4=$result1->fields["renglon15_4"];

$renglon16=$result1->fields["renglon16"];
$renglon16_2=$result1->fields["renglon16_2"]; 
$renglon16_3=$result1->fields["renglon16_3"]; 	
$renglon16_4=$result1->fields["renglon16_4"];

///////////////////

$renglon17=$result1->fields["renglon17"];
$renglon17_2=$result1->fields["renglon17_2"]; 
$renglon17_3=$result1->fields["renglon17_3"]; 	
$renglon17_4=$result1->fields["renglon17_4"];

$renglon18=$result1->fields["renglon18"];
$renglon18_2=$result1->fields["renglon18_2"]; 
$renglon18_3=$result1->fields["renglon18_3"]; 	
$renglon18_4=$result1->fields["renglon18_4"];

$renglon19=$result1->fields["renglon19"];
$renglon19_2=$result1->fields["renglon19_2"]; 
$renglon19_3=$result1->fields["renglon19_3"]; 	
$renglon19_4=$result1->fields["renglon19_4"];

$renglon20=$result1->fields["renglon20"];
$renglon20_2=$result1->fields["renglon20_2"]; 
$renglon20_3=$result1->fields["renglon20_3"]; 	
$renglon20_4=$result1->fields["renglon20_4"];

$renglon21=$result1->fields["renglon21"];
$renglon21_2=$result1->fields["renglon21_2"]; 
$renglon21_3=$result1->fields["renglon21_3"]; 	
$renglon21_4=$result1->fields["renglon21_4"];

$renglon22=$result1->fields["renglon22"];
$renglon22_2=$result1->fields["renglon22_2"]; 
$renglon22_3=$result1->fields["renglon22_3"]; 	
$renglon22_4=$result1->fields["renglon22_4"];

$renglon23=$result1->fields["renglon23"];
$renglon23_2=$result1->fields["renglon23_2"]; 
$renglon23_3=$result1->fields["renglon23_3"]; 	
$renglon23_4=$result1->fields["renglon23_4"];

$renglon24=$result1->fields["renglon24"];
$renglon24_2=$result1->fields["renglon24_2"]; 
$renglon24_3=$result1->fields["renglon24_3"]; 	
$renglon24_4=$result1->fields["renglon24_4"];

$renglon25=$result1->fields["renglon25"];
$renglon25_2=$result1->fields["renglon25_2"]; 
$renglon25_3=$result1->fields["renglon25_3"]; 	
$renglon25_4=$result1->fields["renglon25_4"];

$renglon26=$result1->fields["renglon26"];
$renglon26_2=$result1->fields["renglon26_2"]; 
$renglon26_3=$result1->fields["renglon26_3"]; 	
$renglon26_4=$result1->fields["renglon26_4"];

$renglon27=$result1->fields["renglon27"];
$renglon27_2=$result1->fields["renglon27_2"]; 
$renglon27_3=$result1->fields["renglon27_3"]; 	
$renglon27_4=$result1->fields["renglon27_4"];

$renglon28=$result1->fields["renglon28"];
$renglon28_2=$result1->fields["renglon28_2"]; 
$renglon28_3=$result1->fields["renglon28_3"]; 	
$renglon28_4=$result1->fields["renglon28_4"];

$renglon29=$result1->fields["renglon29"];
$renglon29_2=$result1->fields["renglon29_2"]; 
$renglon29_3=$result1->fields["renglon29_3"]; 	
$renglon29_4=$result1->fields["renglon29_4"];

$renglon30=$result1->fields["renglon30"];
$renglon30_2=$result1->fields["renglon30_2"]; 
$renglon30_3=$result1->fields["renglon30_3"]; 	
$renglon30_4=$result1->fields["renglon30_4"];
$cantidad_renglones=$result1->fields["cantidad_renglones"];




?>