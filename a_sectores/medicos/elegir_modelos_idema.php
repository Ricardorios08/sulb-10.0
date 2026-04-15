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

case "A":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "B":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "C":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "D":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "E":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "F":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
				 }
				 }
elseif($hoja == 'A4'){

 switch ($modelo){
case "A":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "B":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "C":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "D":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "E":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
case "F":{include ("x_modelo1_a4_2019/caratula_a.php");break;}
				}
				} 