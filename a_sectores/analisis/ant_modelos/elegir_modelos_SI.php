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

	 case "A":{include ("A5 NUEVOS/x_modelo1_ok/caratula_a.php");break;}
	 case "B":{include ("A5 NUEVOS/x_modelo1_ok/caratula_a.php");break;}
	 case "C":{include ("A5 NUEVOS/x_modelo1_ok/caratula_a.php");break;}
	 case "D":{include ("A5 NUEVOS/x_modelo1_ok/caratula_a.php");break;}
	 		 }
				 }
elseif($hoja == 'A4'){

 switch ($modelo){
	 case "A":{include ("A5 NUEVOS/x_modelo1_ok/caratula_a.php");break;}
	 case "B":{include ("A5 NUEVOS/x_modelo1_ok/caratula_b.php");break;}
	 case "C":{include ("A5 NUEVOS/x_modelo1_ok/caratula_c.php");break;}
	 case "D":{include ("A5 NUEVOS/x_modelo1_ok/caratula_d.php");break;}
				}
				} 

/*

	 case "A":{include ("a5/x_modelo1/caratula_a.php");break;}
	 case "B":{include ("a5/x_modelo1/caratula_b.php");break;}
	 case "C":{include ("a5/x_modelo1/caratula_c.php");break;}
	 case "D":{include ("a4/w_yapur/emision_reducidal_3.php");break;}

	 */