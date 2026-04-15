<?php 
include ("../../conexiones/config.inc.php");

 $cod_practica=$_POST["cod_practica"];
  $nro_practica=$_POST["cod_practica"];


$cod_grabacion=$_POST["cod_grabacion"];
$nro_paciente=$_POST["nro_paciente"];




$valor1=$_POST["valor1"];
$valor2=$_POST["valor2"];
$valor3=$_POST["valor3"];
$valor4=$_POST["valor4"];
$valor5=$_POST["valor5"];
$valor6=$_POST["valor6"];
$valor7=$_POST["valor7"];
$valor8=$_POST["valor8"];
$valor9=$_POST["valor9"];
$valor10=$_POST["valor10"];
$valor11=$_POST["valor11"];
$valor12=$_POST["valor12"];
$valor13=$_POST["valor13"];
$valor14=$_POST["valor14"];
$valor15=$_POST["valor15"];
$valor16=$_POST["valor16"];


$valor17=$_POST["valor17"];
$valor18=$_POST["valor18"];
$valor19=$_POST["valor19"];
$valor20=$_POST["valor20"];
$valor21=$_POST["valor21"];
$valor22=$_POST["valor22"];
$valor23=$_POST["valor23"];
$valor24=$_POST["valor24"];
$valor25=$_POST["valor25"];
$valor26=$_POST["valor26"];
$valor27=$_POST["valor27"];
$valor28=$_POST["valor28"];
$valor29=$_POST["valor29"];
$valor30=$_POST["valor30"];





   $sql11="select * from detalle_complejos where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
 $codi=strtoupper($result11->fields["cod_grabacion"]);

if ($codi == ""){

  $sql1 = "INSERT INTO `detalle_complejos` (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `valor1`, `valor2`, `valor3`, `valor4`, `valor5`, `valor6`, `valor7`, `valor8`, `valor9`, `valor10`, `valor11`, `valor12`, `valor13`, `valor14`, `valor15`, `valor16`) VALUES ('$cod_grabacion', '$nro_os', '$nro_paciente', '$nro_orden', '$nro_practica', '$valor1', '$valor2', '$valor3', '$valor4', '$valor5', '$valor6', '$valor7', '$valor8', '$valor9', '$valor10', '$valor11', '$valor12', '$valor13', '$valor14', '$valor15', '$valor16')";
 $result11 = $db->Execute($sql1);
}else{
    $sql11 = "UPDATE `detalle_complejos` SET `valor1` = '$valor1' , `valor2` = '$valor2', `valor3` = '$valor3', `valor4` = '$valor4', `valor5` = '$valor5', `valor6` = '$valor6', `valor7` = '$valor7', `valor8` = '$valor8', `valor9` = '$valor9', `valor10` = '$valor10', `valor11` = '$valor11', `valor12` = '$valor12', `valor13` = '$valor13', `valor14` = '$valor14', `valor15` = '$valor15', `valor16` = '$valor16'  , `valor17` = '$valor17'  , `valor18` = '$valor18'  , `valor19` = '$valor19'  , `valor20` = '$valor20'  , `valor21` = '$valor21'  , `valor22` = '$valor22'  , `valor23` = '$valor23'  , `valor24` = '$valor24'  , `valor25` = '$valor25'  , `valor26` = '$valor26'  , `valor27` = '$valor27'  , `valor28` = '$valor28'  , `valor29` = '$valor29'  , `valor30` = '$valor30'   WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica LIMIT 1";
 $result11 = $db->Execute($sql11);
}







$banderin = 1;
include ("emision_mod.php");


?>
