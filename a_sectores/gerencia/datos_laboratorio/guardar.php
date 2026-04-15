<?php 
include ("../../../conexiones/config.inc.php");
$usuario=$_REQUEST["usuario"];


$nombre_laboratorio=$_POST["nombre_laboratorio"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$localidad=$_POST["localidad"];
$mail=$_POST["mail"];
$renglon1=$_POST["renglon1"];
$renglon3=$_POST["renglon3"];

//
$renglon1_b=$_POST["renglon1_b"];
$renglon2_b=$_POST["renglon2_b"];
$renglon3_b=$_POST["renglon3_b"];
$domicilio_b=$_POST["domicilio_b"];
$localidad_b=$_POST["mail_b"];
$telefono_b=$_POST["telefono_b"];
$mail_b=$_POST["mail_b"];



//
$renglon1_c=$_POST["renglon1_c"];
$renglon2_c=$_POST["renglon2_c"];
$renglon3_c=$_POST["renglon3_c"];
$domicilio_c=$_POST["domicilio_c"];
$localidad_c=$_POST["localidad_c"];
$telefono_c=$_POST["telefono_c"];
$mail_c=$_POST["mail_c"];

//

$renglon1_d=$_POST["renglon1_d"];
$renglon2_d=$_POST["renglon2_d"];
$renglon3_d=$_POST["renglon3_d"];
$domicilio_d=$_POST["domicilio_d"];
$localidad_d=$_POST["localidad_d"];
$telefono_d=$_POST["telefono_d"];
$mail_d=$_POST["mail_d"];



$cuit=$_POST["cuit"];
$ingresos_brutos=$_POST["ingresos_brutos"];
$comercio=$_POST["comercio"];

$dia=$_POST["dia"];
$mes=$_POST["mes"];
$anio=$_POST["anio"];
$terminal=$_POST["terminal"];
$inicio_actividad = $anio."-".$mes."-".$dia;

$matricula=$_POST["matricula"];







$prefijo = substr($cuit,0,2);
$dni= substr($cuit,2,8);
$sufijo= substr($cuit,10,1);

 $cuit1 = $prefijo."-".$dni."-".$sufijo;
require_once("../../../nusoap/lib/nusoap.php");
$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('variable1'=>$cuit1); 
$response= $client->call('cuenta_abm', $param1);
$matri = $response;
$leyenda = $matri;
include ("../../../alertas/campo_informacion.php");


$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('variable1'=>$cuit1); 
$response= $client->call('matricula_abm', $param1);
$cuenta_abm = $response;
//$leyenda = $cuenta_abm;
//include ("../../../alertas/campo_informacion.php");



$sql= "delete from datos_principales  ";
mysql_query($sql);

  $sql= "INSERT INTO datos_principales ( `nombre_laboratorio`, `matricula`, `direccion`, `telefono`, `localidad`, `mail` , `cuit`  , `ingresos_brutos` , `comercio` , `inicio_actividad` , `id`  , `renglon1`  , `renglon3` , `terminal`  ) VALUES ( '$nombre_laboratorio', '$cuenta_abm', '$direccion', '$telefono', '$localidad', '$mail' , '$cuit' , '$ingresos_brutos' , '$comercio' , '$inicio_actividad' , '$usuario' ,  '$renglon1' ,  '$renglon3' ,  '$terminal')";



 $sql = "INSERT INTO `datos_principales` (`nombre_laboratorio`, `matricula`, `direccion`, `telefono`, `localidad`, `mail`, `cuit`, `ingresos_brutos`, `comercio`, `inicio_actividad`, `id`, `renglon1`, `renglon3`, `terminal`, `renglon1_b`, `renglon2_b`, `renglon3_b`, `domicilio_b`, `localidad_b`, `telefono_b`, `mail_b`, `renglon1_c`, `renglon2_c`, `renglon3_c`, `domicilio_c`, `localidad_c`, `telefono_c`, `mail_c`, `renglon1_d`, `renglon2_d`, `renglon3_d`, `domicilio_d`, `localidad_d`, `telefono_d`, `mail_d`) VALUES ('$nombre_laboratorio', '$cuenta_abm', '$direccion', '$telefono', '$localidad', '$mail' , '$cuit' , '$ingresos_brutos' , '$comercio' , '$inicio_actividad' , '$usuario' ,  '$renglon1' ,  '$renglon3' ,  '$terminal', '$renglon1_b', '$renglon2_b', '$renglon3_b', '$domicilio_b', '$localidad_b', '$telefono_b', '$mail_b', '$renglon1_c', '$renglon2_c', '$renglon3_c', '$domicilio_c', '$localidad_c', '$telefono_c', '$mail_c', '$renglon1_d', '$renglon2_d', '$renglon3_d', '$domicilio_d', '$localidad_d', '$telefono_d', '$mail_d')";
mysql_query($sql);



include ("entrada_dato.php");	

?>

<!-- 

$sql = "ALTER TABLE `datos_principales` ADD `renglon1_d` VARCHAR(80) NOT NULL, ADD `renglon2_d` VARCHAR(80) NOT NULL, ADD `renglon3_d` VARCHAR(80) NOT NULL, ADD `domicilio_d` VARCHAR(80) NOT NULL, ADD `localidad_d` VARCHAR(80) NOT NULL, ADD `telefono_d` VARCHAR(80) NOT NULL, ADD `mail_d` VARCHAR(80) NOT NULL";

-->