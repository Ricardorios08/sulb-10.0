<?php 
include("../../../conexiones/config.inc.php");
require_once("../../../nusoap/lib/nusoap.php");

 
$cod_grabacion= $_REQUEST['cod_grabacion'];
$nro_paciente= $_REQUEST['nro_paciente'];

 $sql10="select * from ordenes WHERE cod_grabacion = '$cod_grabacion'";
$result10 = $db->Execute($sql10);

$nro_os=strtoupper($result10->fields["nro_os"]);
$nro_laboratorio=strtoupper($result10->fields["nro_laboratorio"]);
$nro_afiliado=strtoupper($result10->fields["nro_afiliado"]);
$fecha=strtoupper($result10->fields["fecha"]);
$fecha_realizacion=strtoupper($result10->fields["fecha_realizacion"]);
$medico=$result10->fields["medico"];
$hoy = date("Y-m-d");
 $autorizacion=strtoupper($result10->fields["autorizacion"]);


if ($autorizacion == 0){


$nro_laboratorio1 = 1098;


$sql = "INSERT INTO `a_ordenes_encabezado` (`nro_autorizacion`) VALUES (NULL)";
 
$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);
$nro_autorizacion = $response;


 $sql = "UPDATE `ordenes` SET `autorizacion` = '$nro_autorizacion' WHERE `cod_grabacion` = $cod_grabacion;";
mysql_query($sql);

///////////////////   NUSOAP  ///////////





$sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion'";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {


$nro_os=strtoupper($result10->fields["nro_os"]);
$nro_afiliado=strtoupper($result10->fields["nro_afiliado"]);
$medico=$result->fields["medico"];



$hoy = date("Y-m-d");

$sql = "INSERT INTO `a_ordenes` (`codbioq`, `nroautored`, `nroafi`, `codpres`, `cantidad`, `matpresc`, `fecpresc`, `fecrea`, `fecauto`, `codseg`, `cod_diag`) VALUES ('$nro_laboratorio1', '$nro_autorizacion', '$nro_afiliado', '$nro_practica', '1', '$medico', '$fecha', '$fecha_realizacion', '$hoy', '$codseg', '$nro_os');";


$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);

////////////////////////////////////


$result10->MoveNext();

	}


}


 $nro_paciente = $nro_laboratorio;
$band = 1;
$bande = 2;
$palabra = $nro_paciente;
$leyenda = "ESCRIBA ESTE NUMERO EN LA ORDEN ".$nro_autorizacion;
//include ("../../../alertas/campo_informacion.php");
$usuario;
include ("buscar_paciente_individual.php");


