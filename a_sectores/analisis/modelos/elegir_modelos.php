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


 $modelo;
if ($hoja == 'A5'){
 
 switch ($modelo){

case "A":{include ("01-01-2017/w_segura_utf8/emision_reducidal.php");break;}
case "B":{include ("01-01-2017/w_segura_utf8/emision_reducidal_firma_libertad.php");break;}
case "C":{include ("01-01-2017/w_segura_utf8/emision_reducidal_vitalis.php");break;}
case "D":{include ("01-01-2017/w_segura_utf8/emision_reducidal_firma_vitalis.php");break;}

/*
case "A":{include ("01-01-2017/w_segura_utf8/emision_reducidal.php");break;}
case "B":{include ("01-01-2017/w_segura_utf8/emision_reducidal_firma.php");break;}
case "D":{include ("01-01-2017/w_segura_utf8/emision_reducidal_vitalis.php");break;}
case "E":{include ("01-01-2017/w_segura_utf8/emision_reducidal_firma_vitalis.php");break;}
*/				 }
				 }
elseif($hoja == 'A4'){

 switch ($modelo){
case "A":{include ("01-01-2017/x_modelo1/caratula_a.php");break;}
case "B":{include ("01-01-2017/x_modelo1_a4/caratula_b.php");break;}
case "C":{include ("01-01-2017/x_modelo1_vertical/emision_reducidal.php");break;}
case "D":{include ("01-01-2017/x_modelo1/caratula_a.php");break;}
case "E":{include ("01-01-2017/x_modelo1/caratula_a.php");break;}
case "F":{include ("01-01-2017/x_modelo1/caratula_a.php");break;}
				}
				} 

