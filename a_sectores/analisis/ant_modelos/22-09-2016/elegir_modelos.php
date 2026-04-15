<?php 


$hoy=date("d/m/y");
$nro_paciente= $_REQUEST['nro_paciente'];
$usuario= $_REQUEST['usuario'];
$nro_os= $_REQUEST['nro_os'];
$cod_grabacion= $_REQUEST['cod_grabacion'];
$fecha_grabacion= $_REQUEST['fecha_grabacion'];

 $fecha_mostrar= $_REQUEST['fecha_grabacion'];
$modulo= $_REQUEST['modulo'];

$usuario= $_REQUEST['usuario'];
include("../../../conexiones/config.inc.php");

$usuario = 3;
$sql="select * from informe where id = $usuario";
$result = $db->Execute($sql);
$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);
$modelo=strtoupper($result->fields["modelo"]);



if ($hoja == 'A5'){
 
 switch ($modelo){

	 case "A":{include ("a5/w_herrera/emision_reducidal.php");break;}
	 case "B":{include ("a5/22-09-2016/caratula_a.php");break;}
	 case "C":{include ("a5/w_herrera/emision_reducidal.php");break;}
	 case "D":{include ("a5/w_herrera/emision_reducidal.php");break;}
	 case "E":{include ("a5/w_herrera/emision_reducidal.php");break;}



 //case "A":{include ("a5/w_herrera/emision_reducidal.php");break;}
// case "A":{include ("a5/w_herrera/emision_reducidal.php");break;}
  	 /*case "A":{include ("a5/w_herrera/emision_reducidal.php");break;}
 	 case "B":{include ("a5/w_herrera/emision_reducidal.php");break;}
 	 case "C":{include ("a5/w_herrera/emision_reducidal.php");break;}
	 case "D":{include ("a5/w_herrera/emision_reducidal.php");break;}
	 case "E":{include ("a5/w_herrera/emision_reducidal.php");break;}*/
				 }
				 }
elseif($hoja == 'A4'){

 switch ($modelo){
	 case "A":{include ("a4/w_yapur/emision_reducidal.php");break;}
 	 case "B":{include ("a4/w_yapur/emision_reducidal_2.php");break;}
 	 case "C":{include ("a4/w_yapur/emision_reducidal.php");break;}
	 case "D":{include ("a4/w_yapur/emision_reducidal.php");break;}
				}
				} 

