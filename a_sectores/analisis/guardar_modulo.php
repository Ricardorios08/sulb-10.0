<?php 

   include("../../conexiones/config.inc.php");

$cod_grabacion= $_REQUEST['cod_grabacion'];
$modulo1=$_POST["modulo1"];
$modulo2=$_POST["modulo2"];
$modulo3=$_POST["modulo3"];
$modulo4=$_POST["modulo4"];
$modulo5=$_POST["modulo5"];
$modulo6=$_POST["modulo6"];
$modulo7=$_POST["modulo7"];
$modulo8=$_POST["modulo8"];
$modulo9=$_POST["modulo9"];
$modulo10=$_POST["modulo10"];
$modulo11=$_POST["modulo11"];
$modulo12=$_POST["modulo12"];
$modulo13=$_POST["modulo13"];

  $sql11="select * from detalle_modulo where cod_grabacion = $cod_grabacion";
$result11 = $db->Execute($sql11);


$cod=$result11->fields["cod_grabacion"];



if ($cod == ""){
   $sql = "INSERT INTO detalle_modulo ( `cod_grabacion` ,`modulo1`, `modulo2`, `modulo3`, `modulo4`, `modulo5`, `modulo6`, `modulo7`, `modulo8`, `modulo9`, `modulo10`, `modulo11`, `modulo12`, `modulo13`) VALUES ('$cod_grabacion', '$modulo1', '$modulo2', '$modulo3', '$modulo4', '$modulo5', '$modulo6', '$modulo7', '$modulo8', '$modulo9', '$modulo10', '$modulo11', '$modulo12', '$modulo13')";
$result = $db->Execute($sql);


}else{
  $sql = "UPDATE detalle_modulo SET   `modulo1` = '$modulo1' ,  `modulo2` = '$modulo2' , `modulo3` = '$modulo3' , `modulo4` = '$modulo4' , `modulo5` = '$modulo5' , `modulo6` = '$modulo6' , `modulo7` = '$modulo7' , `modulo8` = '$modulo8' , `modulo9` = '$modulo9' , `modulo10` = '$modulo10' , `modulo11` = '$modulo11' , `modulo12` = '$modulo12' , `modulo13` = '$modulo13'   WHERE cod_grabacion = '$cod_grabacion' ";
$result = $db->Execute($sql);
}


$banderin = 1;
include ("emision_mod.php");

?>