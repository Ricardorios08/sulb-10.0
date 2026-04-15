<?php 
include ("../../../conexiones/config.inc.php");

$cod_practica=$_POST["cod_practica"];


 $sql1="SELECT * FROM convenio_practica_complejo where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$cod_pra=$result1->fields["cod_practica"];




$renglon1=$_POST["renglon1"];
$renglon1_2=$_POST["renglon1_2"];
$renglon1_3=$_POST["renglon1_3"];
$renglon1_4=$_POST["resultado1"];
$renglon1_4=$_POST["resultado1"];
$visible_1=$_POST["visible_1"];
$mostrar_1=$_POST["mostrar_1"];


$renglon2=$_POST["renglon2"];
$renglon2_2=$_POST["renglon2_2"];
$renglon2_3=$_POST["renglon2_3"];
$renglon2_4=$_POST["resultado2"];

$renglon3=$_POST["renglon3"];
$renglon3_2=$_POST["renglon3_2"];
$renglon3_3=$_POST["renglon3_3"];
$renglon3_4=$_POST["resultado3"];

$renglon4=$_POST["renglon4"];
$renglon4_2=$_POST["renglon4_2"];
$renglon4_3=$_POST["renglon4_3"];
$renglon4_4=$_POST["resultado4"];

$renglon5=$_POST["renglon5"];
$renglon5_2=$_POST["renglon5_2"];
$renglon5_3=$_POST["renglon5_3"];
$renglon5_4=$_POST["resultado5"];

$renglon6=$_POST["renglon6"];
$renglon6_2=$_POST["renglon6_2"];
$renglon6_3=$_POST["renglon6_3"];
$renglon6_4=$_POST["resultado6"];

$renglon7=$_POST["renglon7"];
$renglon7_2=$_POST["renglon7_2"];
$renglon7_3=$_POST["renglon7_3"];
$renglon7_4=$_POST["resultado7"];

$renglon8=$_POST["renglon8"];
$renglon8_2=$_POST["renglon8_2"];
$renglon8_3=$_POST["renglon8_3"];
$renglon8_4=$_POST["resultado8"];

$renglon9=$_POST["renglon9"];
$renglon9_2=$_POST["renglon9_2"];
$renglon9_3=$_POST["renglon9_3"];
$renglon9_4=$_POST["resultado9"];

$renglon10=$_POST["renglon10"];
$renglon10_2=$_POST["renglon10_2"];
$renglon10_3=$_POST["renglon10_3"];
$renglon10_4=$_POST["resultado10"];

$renglon11=$_POST["renglon11"];
$renglon11_2=$_POST["renglon11_2"];
$renglon11_3=$_POST["renglon11_3"];
$renglon11_4=$_POST["resultado11"];

$renglon12=$_POST["renglon12"];
$renglon12_2=$_POST["renglon12_2"];
$renglon12_3=$_POST["renglon12_3"];
$renglon12_4=$_POST["resultado12"];

$renglon13=$_POST["renglon13"];
$renglon13_2=$_POST["renglon13_2"];
$renglon13_3=$_POST["renglon13_3"];
$renglon13_4=$_POST["resultado13"];

$renglon14=$_POST["renglon14"];
$renglon14_2=$_POST["renglon14_2"];
$renglon14_3=$_POST["renglon14_3"];
$renglon14_4=$_POST["resultado14"];

$renglon15=$_POST["renglon15"];
$renglon15_2=$_POST["renglon15_2"];
$renglon15_3=$_POST["renglon15_3"];
$renglon15_4=$_POST["resultado15"];

$renglon16=$_POST["renglon16"];
$renglon16_2=$_POST["renglon16_2"];
$renglon16_3=$_POST["renglon16_3"];
$renglon16_4=$_POST["resultado16"];


//////////////////////////////////////////////////////////////////



$renglon17=$_POST["renglon17"];
$renglon17_2=$_POST["renglon17_2"];
$renglon17_3=$_POST["renglon17_3"];
$renglon17_4=$_POST["renglon17_4"];

$renglon18=$_POST["renglon18"];
$renglon18_2=$_POST["renglon18_2"];
$renglon18_3=$_POST["renglon18_3"];
$renglon18_4=$_POST["renglon18_4"];

$renglon19=$_POST["renglon19"];
$renglon19_2=$_POST["renglon19_2"];
$renglon19_3=$_POST["renglon19_3"];
$renglon19_4=$_POST["renglon19_4"];

$renglon20=$_POST["renglon20"];
$renglon20_2=$_POST["renglon20_2"];
$renglon20_3=$_POST["renglon20_3"];
$renglon20_4=$_POST["renglon20_4"];

$renglon21=$_POST["renglon21"];
$renglon21_2=$_POST["renglon21_2"];
$renglon21_3=$_POST["renglon21_3"];
$renglon21_4=$_POST["renglon21_4"];

$renglon22=$_POST["renglon22"];
$renglon22_2=$_POST["renglon22_2"];
$renglon22_3=$_POST["renglon22_3"];
$renglon22_4=$_POST["renglon22_4"];

$renglon23=$_POST["renglon23"];
$renglon23_2=$_POST["renglon23_2"];
$renglon23_3=$_POST["renglon23_3"];
$renglon23_4=$_POST["renglon23_4"];

$renglon24=$_POST["renglon24"];
$renglon24_2=$_POST["renglon24_2"];
$renglon24_3=$_POST["renglon24_3"];
$renglon24_4=$_POST["renglon24_4"];

$renglon25=$_POST["renglon25"];
$renglon25_2=$_POST["renglon25_2"];
$renglon25_3=$_POST["renglon25_3"];
$renglon25_4=$_POST["renglon25_4"];

$renglon26=$_POST["renglon26"];
$renglon26_2=$_POST["renglon26_2"];
$renglon26_3=$_POST["renglon26_3"];
$renglon26_4=$_POST["renglon26_4"];

$renglon27=$_POST["renglon27"];
$renglon27_2=$_POST["renglon27_2"];
$renglon27_3=$_POST["renglon27_3"];
$renglon27_4=$_POST["renglon27_4"];

$renglon28=$_POST["renglon28"];
$renglon28_2=$_POST["renglon28_2"];
$renglon28_3=$_POST["renglon28_3"];
$renglon28_4=$_POST["renglon28_4"];

$renglon29=$_POST["renglon29"];
$renglon29_2=$_POST["renglon29_2"];
$renglon29_3=$_POST["renglon29_3"];
$renglon29_4=$_POST["renglon29_4"];

$renglon30=$_POST["renglon30"];
$renglon30_2=$_POST["renglon30_2"];
$renglon30_3=$_POST["renglon30_3"];
$renglon30_4=$_POST["renglon30_4"];


$cantidad_renglones=$_POST["cantidad_renglones"];







////////////////////////////////////


 






if ($cod_pra == ""){
 $sql = "INSERT INTO `convenio_practica_complejo` (`cod_practica`, `renglon1`, `renglon1_2`, `renglon1_3`, `renglon1_4`, `renglon2`, `renglon2_2`, `renglon2_3`, `renglon2_4`, `renglon3`, `renglon3_2`, `renglon3_3`, `renglon3_4`, `renglon4`, `renglon4_2`, `renglon4_3`, `renglon4_4`, `renglon5`, `renglon5_2`, `renglon5_3`, `renglon5_4`, `renglon6`, `renglon6_2`, `renglon6_3`, `renglon6_4`, `renglon7`, `renglon7_2`, `renglon7_3`, `renglon7_4`, `renglon8`, `renglon8_2`, `renglon8_3`, `renglon8_4`, `renglon9`, `renglon9_2`, `renglon9_3`, `renglon9_4`, `renglon10`, `renglon10_2`, `renglon10_3`, `renglon10_4`, `renglon11`, `renglon11_2`, `renglon11_3`, `renglon11_4`, `renglon12`, `renglon12_2`, `renglon12_3`, `renglon12_4`, `renglon13`, `renglon13_2`, `renglon13_3`, `renglon13_4`, `renglon14`, `renglon14_2`, `renglon14_3`, `renglon14_4`, `renglon15`, `renglon15_2`, `renglon15_3`, `renglon15_4`, `renglon16`, `renglon16_2`, `renglon16_3`, `renglon16_4`, `renglon17`, `renglon17_2`, `renglon17_3`, `renglon17_4`, `renglon18`, `renglon18_2`, `renglon18_3`, `renglon18_4`, `renglon19`, `renglon19_2`, `renglon19_3`, `renglon19_4`, `renglon20`, `renglon20_2`, `renglon20_3`, `renglon20_4`, `renglon21`, `renglon21_2`, `renglon21_3`, `renglon21_4`, `renglon22`, `renglon22_2`, `renglon22_3`, `renglon22_4`, `renglon23`, `renglon23_2`, `renglon23_3`, `renglon23_4`, `renglon24`, `renglon24_2`, `renglon24_3`, `renglon24_4`, `renglon25`, `renglon25_2`, `renglon25_3`, `renglon25_4`, `renglon26`, `renglon26_2`, `renglon26_3`, `renglon26_4`, `renglon27`, `renglon27_2`, `renglon27_3`, `renglon27_4`, `renglon28`, `renglon28_2`, `renglon28_3`, `renglon28_4`, `renglon29`, `renglon29_2`, `renglon29_3`, `renglon29_4`, `renglon30`, `renglon30_2`, `renglon30_3`, `renglon30_4` ,  `cantidad_renglones` ) VALUES ('$cod_practica', '$renglon1', '$renglon1_2', '$renglon1_3' , '$renglon1_4' , '$renglon2', '$renglon2_2', '$renglon2_3' , '$renglon2_4' , '$renglon3', '$renglon3_2', '$renglon3_3' , '$renglon3_4' , '$renglon4', '$renglon4_2', '$renglon4_3' , '$renglon4_4' , '$renglon5', '$renglon5_2', '$renglon5_3' , '$renglon5_4' , '$renglon6', '$renglon6_2', '$renglon6_3' , '$renglon6_4' ,'$renglon7', '$renglon7_2', '$renglon7_3' , '$renglon7_4' , '$renglon8', '$renglon8_2', '$renglon8_3' , '$renglon8_4' , '$renglon9', '$renglon9_2', '$renglon9_3' , '$renglon9_4' , '$renglon10', '$renglon10_2', '$renglon10_3' , '$renglon10_4' ,'$renglon11', '$renglon11_2', '$renglon11_3' , '$renglon11_4' , '$renglon12', '$renglon12_2', '$renglon12_3' , '$renglon12_4' ,'$renglon13', '$renglon13_2', '$renglon13_3' , '$renglon13_4' ,'$renglon14', '$renglon14_2', '$renglon14_3' , '$renglon14_4' , '$renglon15', '$renglon15_2', '$renglon15_3' , '$renglon15_4' , '$renglon16', '$renglon16_2', '$renglon16_3' , '$renglon16_4' , '$renglon17', '$renglon17_2', '$renglon17_3' , '$renglon17_4' , '$renglon18', '$renglon18_2', '$renglon18_3' , '$renglon18_4' , '$renglon19', '$renglon19_2', '$renglon19_3' , '$renglon19_4' , '$renglon20', '$renglon20_2', '$renglon20_3' , '$renglon20_4' , '$renglon21', '$renglon21_2', '$renglon21_3' , '$renglon21_4' , '$renglon22', '$renglon22_2', '$renglon22_3' , '$renglon22_4' , '$renglon23', '$renglon23_2', '$renglon23_3' , '$renglon23_4' ,'$renglon24', '$renglon24_2', '$renglon24_3' , '$renglon24_4' , '$renglon25', '$renglon25_2', '$renglon25_3' , '$renglon25_4' , '$renglon26', '$renglon26_2', '$renglon26_3' , '$renglon26_4' , '$renglon27', '$renglon27_2', '$renglon27_3' , '$renglon27_4' ,'$renglon28', '$renglon28_2', '$renglon28_3' , '$renglon28_4' , '$renglon29', '$renglon29_2', '$renglon29_3' , '$renglon29_4' ,'$renglon30', '$renglon30_2', '$renglon30_3' , '$renglon30_4'  , '$cantidad_renglones' )";
$result = $db->Execute($sql);
}else{
   $sql = "UPDATE `convenio_practica_complejo` SET `renglon1` = '$renglon1' , `renglon1_2` = '$renglon1_2' , `renglon1_3` = '$renglon1_3' , `renglon1_4` = '$renglon1_4' , `renglon2` = '$renglon2' , `renglon2_2` = '$renglon2_2' , `renglon2_3` = '$renglon2_3' , `renglon2_4` = '$renglon2_4'  , `renglon3` = '$renglon3' , `renglon3_2` = '$renglon3_2' , `renglon3_3` = '$renglon3_3' , `renglon3_4` = '$renglon3_4' , `renglon4` = '$renglon4' , `renglon4_2` = '$renglon4_2' , `renglon4_3` = '$renglon4_3' , `renglon4_4` = '$renglon4_4' , `renglon5` = '$renglon5' , `renglon5_2` = '$renglon5_2' , `renglon5_3` = '$renglon5_3' , `renglon5_4` = '$renglon5_4' , `renglon6` = '$renglon6' , `renglon6_2` = '$renglon6_2' , `renglon6_3` = '$renglon6_3' , `renglon6_4` = '$renglon6_4' , `renglon7` = '$renglon7' , `renglon7_2` = '$renglon7_2' , `renglon7_3` = '$renglon7_3' , `renglon7_4` = '$renglon7_4' , `renglon8` = '$renglon8' , `renglon8_2` = '$renglon8_2' , `renglon8_3` = '$renglon8_3' , `renglon8_4` = '$renglon8_4' , `renglon9` = '$renglon9' , `renglon9_2` = '$renglon9_2' , `renglon9_3` = '$renglon9_3' , `renglon9_4` = '$renglon9_4' , `renglon10` = '$renglon10' , `renglon10_2` = '$renglon10_2' , `renglon10_3` = '$renglon10_3' , `renglon10_4` = '$renglon10_4' , `renglon11` = '$renglon11' , `renglon11_2` = '$renglon11_2' , `renglon11_3` = '$renglon11_3' , `renglon11_4` = '$renglon11_4' , `renglon12` = '$renglon12' , `renglon12_2` = '$renglon12_2' , `renglon12_3` = '$renglon12_3' , `renglon12_4` = '$renglon12_4' , `renglon13` = '$renglon13' , `renglon13_2` = '$renglon13_2' , `renglon13_3` = '$renglon13_3' , `renglon13_4` = '$renglon13_4' , `renglon14` = '$renglon14' , `renglon14_2` = '$renglon14_2' , `renglon14_3` = '$renglon14_3' , `renglon14_4` = '$renglon14_4' , `renglon15` = '$renglon15' , `renglon15_2` = '$renglon15_2' , `renglon15_3` = '$renglon15_3' , `renglon15_4` = '$renglon15_4' , `renglon16` = '$renglon16' , `renglon16_2` = '$renglon16_2' , `renglon16_3` = '$renglon16_3' , `renglon16_4` = '$renglon16_4' , `renglon17` = '$renglon17' , `renglon17_2` = '$renglon17_2' , `renglon17_3` = '$renglon17_3' , `renglon17_4` = '$renglon17_4' , `renglon18` = '$renglon18' ,`renglon18_2` = '$renglon18_2' ,`renglon18_3` = '$renglon18_3' ,`renglon18_4` = '$renglon18_4' ,`renglon19` = '$renglon19' ,`renglon19_2` = '$renglon19_2' ,`renglon19_3` = '$renglon19_3' ,`renglon18_4` = '$renglon19_4' , `renglon20` = '$renglon20' ,`renglon20_2` = '$renglon20_2' ,`renglon20_3` = '$renglon20_3' ,`renglon20_4` = '$renglon20_4' , `renglon21` = '$renglon21' ,`renglon21_2` = '$renglon21_2' ,`renglon21_3` = '$renglon21_3' ,`renglon21_4` = '$renglon21_4' , `renglon22` = '$renglon22' ,`renglon22_2` = '$renglon22_2' ,`renglon22_3` = '$renglon22_3' ,`renglon22_4` = '$renglon22_4' , `renglon23` = '$renglon23' ,`renglon23_2` = '$renglon23_2' ,`renglon23_3` = '$renglon23_3' ,`renglon23_4` = '$renglon23_4' , `renglon24` = '$renglon24' ,`renglon24_2` = '$renglon24_2' ,`renglon24_3` = '$renglon24_3' ,`renglon24_4` = '$renglon24_4' ,
`renglon25` = '$renglon25' ,`renglon25_2` = '$renglon25_2' ,`renglon25_3` = '$renglon25_3' ,`renglon25_4` = '$renglon25_4' , `renglon26` = '$renglon26' ,`renglon26_2` = '$renglon26_2' ,`renglon26_3` = '$renglon26_3' ,`renglon26_4` = '$renglon26_4' , `renglon27` = '$renglon27' ,`renglon27_2` = '$renglon27_2' ,`renglon27_3` = '$renglon27_3' ,`renglon27_4` = '$renglon27_4' , `renglon28` = '$renglon28' ,`renglon28_2` = '$renglon28_2' ,`renglon28_3` = '$renglon28_3' ,`renglon28_4` = '$renglon28_4' , `renglon29` = '$renglon29' ,`renglon29_2` = '$renglon29_2' ,`renglon29_3` = '$renglon29_3' ,`renglon29_4` = '$renglon29_4' , `renglon30` = '$renglon30' ,`renglon30_2` = '$renglon30_2' ,`renglon30_3` = '$renglon30_3' ,`renglon30_4` = '$renglon30_4'  ,`visible_1` = '$visible_1'   , `mostrar_1` = '$mostrar_1'  , `cantidad_renglones` = '$cantidad_renglones'  WHERE `cod_practica` = '$cod_practica'";


// $sql = "UPDATE `convenio_practica_complejo` SET renglon1 = '1', renglon1_2 = '2', renglon1_3 = '3', renglon1_4 = '4', renglon2 = '5', renglon2_2 = '6', renglon2_3 = '7', renglon2_4 = '8', renglon3 = '9', renglon3_2 = '10', renglon3_3 = '11', renglon3_4 = '12', renglon4 = '13', renglon4_2 = '14', renglon4_3 = '15', renglon4_4 = '16', renglon5 = '17', renglon5_2 = '18', renglon5_3 = '19', renglon5_4 = '20', renglon6 = '21', renglon6_2 = '22', renglon6_3 = '23', renglon6_4 = '24', renglon7 = '25', renglon7_2 = '26', renglon7_3 = '27', renglon7_4 = '28', renglon8 = '29', renglon8_2 = '30', renglon8_3 = '31', renglon8_4 = '32', renglon9 = '33', renglon9_2 = '34', renglon9_3 = '35', renglon9_4 = '36', renglon10 = '37', renglon10_2 = '38', renglon10_3 = '39', renglon10_4 = '40', renglon11 = '41', renglon11_2 = '42', renglon11_3 = '43', renglon11_4 = '44', renglon12 = '45', renglon12_2 = '46', renglon12_3 = '47', renglon12_4 = '48', renglon13 = '49', renglon13_2 = '50', renglon13_3 = '51', renglon13_4 = '52', renglon14 = '53', renglon14_2 = '54', renglon14_3 = '55', renglon14_4 = '56', renglon15 = '57', renglon15_2 = '58', renglon15_3 = '59', renglon15_4 = '60', renglon16 = '61', renglon16_2 = '62', renglon16_3 = '63', renglon16_4 = '64', renglon17 = '$renglon17', renglon17_2 = '66', renglon17_3 = '67', renglon17_4 = '68', renglon18 = '69', renglon18_2 = '70', renglon18_3 = '71', renglon18_4 = '72', renglon19 = '73', renglon19_2 = '74', renglon19_3 = '75', renglon19_4 = '76', renglon20 = '77', renglon20_2 = '78', renglon20_3 = '79', renglon20_4 = '80', renglon21 = '81', renglon21_2 = '82', renglon21_3 = '83', renglon21_4 = '84', renglon22 = '85', renglon22_2 = '86', renglon22_3 = '87', renglon22_4 = '88', renglon23 = '89', renglon23_2 = '90', renglon23_3 = '91', renglon23_4 = '92', renglon24 = '93', renglon24_2 = '94', renglon24_3 = '95', renglon24_4 = '96', renglon25 = '97', renglon25_2 = '98', renglon25_3 = '99', renglon25_4 = '100', renglon26 = '101', renglon26_2 = '102', renglon26_3 = '103', renglon26_4 = '104', renglon27 = '105', renglon27_2 = '106', renglon27_3 = '107', renglon27_4 = '108', renglon28 = '109', renglon28_2 = '110', renglon28_3 = '111', renglon28_4 = '112', renglon29 = '113', renglon29_2 = '114', renglon29_3 = '115', renglon29_4 = '116', renglon30 = '117', renglon30_2 = '118', renglon30_3 = '119', renglon30_4 = '120'  WHERE `cod_practica` = '$cod_practica'";
$result = $db->Execute($sql);
}


//echo $sql = "UPDATE `convenio_practica_complejo` SET renglon1 = '1', renglon1_2 = '2', renglon1_3 = '3', renglon1_4 = '4', renglon2 = '5', renglon2_2 = '6', renglon2_3 = '7', renglon2_4 = '8', renglon3 = '9', renglon3_2 = '10', renglon3_3 = '11', renglon3_4 = '12', renglon4 = '13', renglon4_2 = '14', renglon4_3 = '15', renglon4_4 = '16', renglon5 = '17', renglon5_2 = '18', renglon5_3 = '19', renglon5_4 = '20', renglon6 = '21', renglon6_2 = '22', renglon6_3 = '23', renglon6_4 = '24', renglon7 = '25', renglon7_2 = '26', renglon7_3 = '27', renglon7_4 = '28', renglon8 = '29', renglon8_2 = '30', renglon8_3 = '31', renglon8_4 = '32', renglon9 = '33', renglon9_2 = '34', renglon9_3 = '35', renglon9_4 = '36', renglon10 = '37', renglon10_2 = '38', renglon10_3 = '39', renglon10_4 = '40', renglon11 = '41', renglon11_2 = '42', renglon11_3 = '43', renglon11_4 = '44', renglon12 = '45', renglon12_2 = '46', renglon12_3 = '47', renglon12_4 = '48', renglon13 = '49', renglon13_2 = '50', renglon13_3 = '51', renglon13_4 = '52', renglon14 = '53', renglon14_2 = '54', renglon14_3 = '55', renglon14_4 = '56', renglon15 = '57', renglon15_2 = '58', renglon15_3 = '59', renglon15_4 = '60', renglon16 = '61', renglon16_2 = '62', renglon16_3 = '63', renglon16_4 = '64', renglon17 = '65', renglon17_2 = '66', renglon17_3 = '67', renglon17_4 = '68', renglon18 = '69', renglon18_2 = '70', renglon18_3 = '71', renglon18_4 = '72', renglon19 = '73', renglon19_2 = '74', renglon19_3 = '75', renglon19_4 = '76', renglon20 = '77', renglon20_2 = '78', renglon20_3 = '79', renglon20_4 = '80', renglon21 = '81', renglon21_2 = '82', renglon21_3 = '83', renglon21_4 = '84', renglon22 = '85', renglon22_2 = '86', renglon22_3 = '87', renglon22_4 = '88', renglon23 = '89', renglon23_2 = '90', renglon23_3 = '91', renglon23_4 = '92', renglon24 = '93', renglon24_2 = '94', renglon24_3 = '95', renglon24_4 = '96', renglon25 = '97', renglon25_2 = '98', renglon25_3 = '99', renglon25_4 = '100', renglon26 = '101', renglon26_2 = '102', renglon26_3 = '103', renglon26_4 = '104', renglon27 = '105', renglon27_2 = '106', renglon27_3 = '107', renglon27_4 = '108', renglon28 = '109', renglon28_2 = '110', renglon28_3 = '111', renglon28_4 = '112', renglon29 = '113', renglon29_2 = '114', renglon29_3 = '115', renglon29_4 = '116', renglon30 = '117', renglon30_2 = '118', renglon30_3 = '119', renglon30_4 = '120'  WHERE `cod_practica` = '$cod_practica'";



$band = 1;
$palabra = $cod_practica;
$leyenda = "SE MODIFICO LA PRACTICA COMPUESTA";
include ("../practicas_convenidas_complejas.php");

/*
ALTER TABLE `convenio_practica_complejo`  ADD `renglon17` INT NOT NULL ,  ADD `renglon17_2` INT NOT NULL ,  ADD `renglon17_3` INT NOT NULL ,  ADD `renglon17_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon18` INT NOT NULL ,  ADD `renglon18_2` INT NOT NULL ,  ADD `renglon18_3` INT NOT NULL ,  ADD `renglon18_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon19` INT NOT NULL ,  ADD `renglon19_2` INT NOT NULL ,  ADD `renglon19_3` INT NOT NULL ,  ADD `renglon19_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon20` INT NOT NULL ,  ADD `renglon20_2` INT NOT NULL ,  ADD `renglon20_3` INT NOT NULL ,  ADD `renglon20_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon21` INT NOT NULL ,  ADD `renglon21_2` INT NOT NULL ,  ADD `renglon21_3` INT NOT NULL ,  ADD `renglon21_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon22` INT NOT NULL ,  ADD `renglon22_2` INT NOT NULL ,  ADD `renglon22_3` INT NOT NULL ,  ADD `renglon22_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon23` INT NOT NULL ,  ADD `renglon23_2` INT NOT NULL ,  ADD `renglon23_3` INT NOT NULL ,  ADD `renglon23_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon24` INT NOT NULL ,  ADD `renglon24_2` INT NOT NULL ,  ADD `renglon24_3` INT NOT NULL ,  ADD `renglon24_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon25` INT NOT NULL ,  ADD `renglon25_2` INT NOT NULL ,  ADD `renglon25_3` INT NOT NULL ,  ADD `renglon25_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon26` INT NOT NULL ,  ADD `renglon26_2` INT NOT NULL ,  ADD `renglon26_3` INT NOT NULL ,  ADD `renglon26_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon27` INT NOT NULL ,  ADD `renglon27_2` INT NOT NULL ,  ADD `renglon27_3` INT NOT NULL ,  ADD `renglon27_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon28` INT NOT NULL ,  ADD `renglon28_2` INT NOT NULL ,  ADD `renglon28_3` INT NOT NULL ,  ADD `renglon28_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon29` INT NOT NULL ,  ADD `renglon29_2` INT NOT NULL ,  ADD `renglon29_3` INT NOT NULL ,  ADD `renglon29_4` INT NOT NULL;
ALTER TABLE `convenio_practica_complejo`  ADD `renglon30` INT NOT NULL ,  ADD `renglon30_2` INT NOT NULL ,  ADD `renglon30_3` INT NOT NULL ,  ADD `renglon30_4` INT NOT NULL;


ALTER TABLE `convenio_practica_complejo` CHANGE `renglon18` `renglon18` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon18_2` `renglon18_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon18_3` `renglon18_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon18_4` `renglon18_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon19` `renglon19` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon19_2` `renglon19_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon19_3` `renglon19_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon19_4` `renglon19_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon20` `renglon20` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon20_2` `renglon20_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon20_3` `renglon20_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon20_4` `renglon20_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon21` `renglon21` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon21_2` `renglon21_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon21_3` `renglon21_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon21_4` `renglon21_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon22` `renglon22` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon22_2` `renglon22_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon22_3` `renglon22_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon22_4` `renglon22_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon23` `renglon23` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon23_2` `renglon23_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon23_3` `renglon23_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon23_4` `renglon23_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon24` `renglon24` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon24_2` `renglon24_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon24_3` `renglon24_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon24_4` `renglon24_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon25` `renglon25` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon25_2` `renglon25_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon25_3` `renglon25_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon25_4` `renglon25_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon26` `renglon26` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon26_2` `renglon26_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon26_3` `renglon26_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon26_4` `renglon26_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon27` `renglon27` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon27_2` `renglon27_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon27_3` `renglon27_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon27_4` `renglon27_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon28` `renglon28` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon28_2` `renglon28_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon28_3` `renglon28_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon28_4` `renglon28_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon29` `renglon29` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon29_2` `renglon29_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon29_3` `renglon29_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon29_4` `renglon29_4` VARCHAR( 1 ) NOT NULL; 

ALTER TABLE `convenio_practica_complejo` CHANGE `renglon30` `renglon30` VARCHAR( 100 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon30_2` `renglon30_2` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon30_3` `renglon30_3` VARCHAR( 25 ) NOT NULL; 
ALTER TABLE `convenio_practica_complejo` CHANGE `renglon30_4` `renglon30_4` VARCHAR( 1 ) NOT NULL; 




ALTER TABLE `detalle_complejos` ADD `valor17` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor18` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor19` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor20` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor21` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor22` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor23` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor24` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor25` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor26` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor27` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor28` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor29` VARCHAR(80) NOT NULL;
ALTER TABLE `detalle_complejos` ADD `valor30` VARCHAR(80) NOT NULL;


ALTER TABLE `convenio_practica_complejo` ADD `visible_1` INT( 1 ) NOT NULL , ADD `mostrar_1` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_2` INT( 1 ) NOT NULL , ADD `mostrar_2` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_3` INT( 1 ) NOT NULL , ADD `mostrar_3` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_4` INT( 1 ) NOT NULL , ADD `mostrar_4` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_5` INT( 1 ) NOT NULL , ADD `mostrar_5` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_6` INT( 1 ) NOT NULL , ADD `mostrar_6` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_7` INT( 1 ) NOT NULL , ADD `mostrar_7` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_8` INT( 1 ) NOT NULL , ADD `mostrar_8` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_9` INT( 1 ) NOT NULL , ADD `mostrar_9` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_10` INT( 1 ) NOT NULL , ADD `mostrar_10` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_11` INT( 1 ) NOT NULL , ADD `mostrar_11` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_12` INT( 1 ) NOT NULL , ADD `mostrar_12` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_13` INT( 1 ) NOT NULL , ADD `mostrar_13` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_14` INT( 1 ) NOT NULL , ADD `mostrar_14` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_15` INT( 1 ) NOT NULL , ADD `mostrar_15` INT( 1 ) NOT NULL
ALTER TABLE `convenio_practica_complejo` ADD `visible_16` INT( 1 ) NOT NULL , ADD `mostrar_16` INT( 1 ) NOT NULL


ALTER TABLE `convenio_practica_complejo` CHANGE `renglon17_4` `renglon17_4` VARCHAR(1) NOT NULL

ALTER TABLE `convenio_practica_complejo` ADD `cantidad_renglones` INT(10) NOT NULL ;


*/
