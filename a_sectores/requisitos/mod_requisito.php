<?php

include ("../../conexiones/config.inc.php");

$nro_os=$_POST["nro_os"];
$requisitos=$_POST["requisitos"];
$version=$_POST["version"];
$suspendido=$_POST["suspendido"];
$vigencia=$_POST["vigencia"];
$comunes=$_POST["comunes"];
$especiales=$_POST["especiales"];
$alta=$_POST["alta"];
$antibiograma=$_POST["antibiograma"];

$diagnostico=$_POST["diagnostico"];
$planes=$_POST["planes"];
$info_planes=$_POST["info_planes"];
$planes_rechazados=$_POST["planes_rechazados"];
$motivo_rechazo=$_POST["motivo_rechazo"];




echo $sql = "UPDATE `requisitos_os` SET requisitos = '$requisitos' , version = '$version' , suspendido = '$suspendido' , vigencia = '$vigencia' , comunes = '$comunes' , especiales = '$especiales' , alta = '$alta' , antibiograma = '$antibiograma' , diagnostico = '$diagnostico' , planes = '$planes' , info_planes = '$info_planes' , planes_rechazados = '$planes_rechazados' , motivo_rechazo = '$motivo_rechazo' WHERE `nro_os` = $nro_os";
mysql_query($sql);