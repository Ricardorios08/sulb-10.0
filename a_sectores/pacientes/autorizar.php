<?php 
include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");

 
$cod_grabacion= $_REQUEST['cod_grabacion'];
$nro_paciente= $_REQUEST['nro_paciente'];

 $sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

 $nro_laboratorio1=$result10->fields["matricula"];



///////////// VALIDA FECHA /////////


/////////////////////////////////////////////

   $sql10="select * from ordenes WHERE cod_grabacion = '$cod_grabacion'";
$result10 = $db->Execute($sql10);

   $fecha4=$result10->fields["fecha"];

 $fecha_actual = date("Y-m-d");


$fecha1 = new DateTime($fecha_actual);
$fecha2 = new DateTime($fecha4);
$fecha = $fecha1->diff($fecha2);

 $a = $fecha->y;
 $m = $fecha->m;
 $d = $fecha->d;

if ($m > 1){
 $leyenda = "RECHAZA ORDEN FECHA DEL ANALISIS MAYOR A ".$m." MESES, Revise la orden";
include ("../../alertas/campo_informacion2.php");
EXIT;
}



//////////// VALIDAR PRACTICAS AUTORIZADAS



$sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion'";
$result10 = $db->Execute($sql10);

$a = 1;

if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
$nro_os=strtoupper($result10->fields["nro_os"]);
//$nro_afiliado=strtoupper($result10->fields["nro_afiliado"]);
$medico=$result10->fields["medico"];
$nro_practica=$result10->fields["nro_practica"];


$pract[$a] = $nro_practica;
$a = $a + 1;

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$nro_practica , 'apellido'=>$nro_os);



$response= $client->call('practicas_autorizadas', $param1);
 $resultado = $response;


?>
<table width="850" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><span class="Estilo12"><?php echo $resultado;?></span><span class="Estilo1 Estilo25"></span> </th>
  </tr>
</table>
<?php




$result10->MoveNext();
	}

////////////////////////////////////




//////////// VALIDAR PRACTICAS RECHAZADAS



$sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion'";
$result10 = $db->Execute($sql10);

$a = 1;

if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
$nro_os=strtoupper($result10->fields["nro_os"]);
//$nro_afiliado=strtoupper($result10->fields["nro_afiliado"]);
$medico=$result10->fields["medico"];
$nro_practica=$result10->fields["nro_practica"];


$pract[$a] = $nro_practica;
$a = $a + 1;

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$nro_practica , 'apellido'=>$nro_os);



$response= $client->call('practicas', $param1);
 $resultado = $response;

if ($resultado != ""){
?>
<table width="850" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><span class="Estilo12"><?php echo $resultado;?></span><span class="Estilo1 Estilo25"></span> </th>
  </tr>
</table>
<?php
}







$result10->MoveNext();
	}


////////////////////////////////////




 
if ($resultado == ""){


/////////////////////////////////////////////

 $sql10="select * from ordenes WHERE cod_grabacion = '$cod_grabacion'";
$result10 = $db->Execute($sql10);

$nro_os=strtoupper($result10->fields["nro_os"]);

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$nro_os); 
$response= $client->call('nro_os', $param1);
 $validacion_os = $response;

if ($validacion_os == "NO EXISTE OBRA SOCIAL EN ABM"){
 $leyenda = "RECHAZA ORDEN PORQUE NO EXISTE ESA OBRA SOCIAL EN ABM";
include ("../../alertas/campo_informacion2.php");
EXIT;
}



$nro_paciente=strtoupper($result10->fields["nro_paciente"]);
$nro_afiliado=strtoupper($result10->fields["nro_afiliado"]);
$fecha=strtoupper($result10->fields["fecha"]);
$fecha_realizacion=strtoupper($result10->fields["fecha_realizacion"]);
$medico=$result10->fields["medico"];
$hoy = date("Y-m-d");
 $autorizacion=strtoupper($result10->fields["autorizacion"]);

 $sql10="select * from pacientes WHERE nro_paciente = '$nro_paciente'";
$result10 = $db->Execute($sql10);

$apellido=$result10->fields["apellido"];
$nombre=$result10->fields["nombre"];

$nombre_afiliado = $apellido." ".$nombre;


if (($autorizacion == 0)){


$sql = "INSERT INTO `a_ordenes_encabezado` (`nro_autorizacion`) VALUES (NULL)";
 
$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
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
//$nro_afiliado=strtoupper($result10->fields["nro_afiliado"]);
$medico=$result10->fields["medico"];
$nro_practica=$result10->fields["nro_practica"];

$hoy = date("Y-m-d");
$sql = "INSERT INTO `a_ordenes` (`codbioq`, `nroautored`, `nroafi`, `codpres`, `cantidad`, `matpresc`, `fecpresc`, `fecrea`, `fecauto`, `codseg`, `nro_os` , `nombre_afiliado` , `autorizacion_os`) VALUES ('$nro_laboratorio1', '$nro_autorizacion', '$nro_afiliado', '$nro_practica', '1', '$medico', '$fecha', '$fecha_realizacion', '$hoy', '$codseg', '$nro_os' , '$nombre_afiliado' , '$autorizacion_ws' );";
$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);
////////////////////////////////////
$result10->MoveNext();
	}


$leyenda = "ESCRIBA ESTE NUMERO EN LA ORDEN ".$nro_autorizacion;
include ("../../alertas/campo_informacion.php");
EXIT;

}
}





 $validacion_os = "";
$band = 1;
$bande = 2;
  $palabra = $nro_paciente;

$usuario;
//include ("buscar_paciente_individual.php");


