<?php 


$hoy=date("d/m/y");
$nro_paciente= $_REQUEST['nro_paciente'];
$nro_os= $_REQUEST['nro_os'];
$cod_grabacion= $_REQUEST['cod_grabacion'];
$fecha_grabacion= $_REQUEST['fecha_grabacion'];

$fecha_mostrar= $_REQUEST['fecha_grabacion'];
$modulo= $_REQUEST['modulo'];


include("../../../conexiones/config.inc.php");

 $sql="select * from informe";
$result = $db->Execute($sql);
$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);
$modelo=strtoupper($result->fields["modelo"]);


if ($hoja == 'A5'){
 
 switch ($modelo){
	 case "A":{include ("a5/w_garcia/emision_reducidal.php");break;}
 	 case "B":{include ("a5/b/emision_reducidal.php");break;}
 	 case "C":{include ("a5/c/emision_reducidal.php");break;}
	 case "D":{include ("a5/d/emision_reducidal.php");break;}
				 }
				 }
elseif($hoja == 'A4'){

 switch ($modelo){
	 case "A":{include ("a4/a/emision_reducidal.php");break;}
 	 case "B":{include ("a4/b/emision_reducidal.php");break;}
 	 case "C":{include ("a4/c/emision_reducidal.php");break;}
	 case "D":{include ("a4/d/emision_reducidal.php");break;}
				}
				} 

