 

<style type="text/css">
<!--
body {
	background-color: #DDE6E6; 
}
.Estilo12 {font-weight: bold}
.Estilo25 {font-weight: bold; font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>

 <link href="../../css/botonera.css" rel="stylesheet" type="text/css" />

<?php

include("../../conexiones/config.inc.php");

$sql = "ALTER TABLE `pacientes` CHANGE `track` `track` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL";
 $result = $db->Execute($sql);
 $sql = "ALTER TABLE `pacientes` ADD `cuit_verificacion` VARCHAR(20) NOT NULL";
 $result = $db->Execute($sql);
 $sql = "ALTER TABLE `ordenes` ADD `aut_mail` INT(20) NOT NULL";
 $result = $db->Execute($sql);
 $sql = "ALTER TABLE `detalle` ADD `PracticaObs` VARCHAR(40) NOT NULL";
 $result = $db->Execute($sql);

require_once("../../nusoap/lib/nusoap.php");

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('requisitos', $param1);

if ($response != ""){
  $sql = "TRUNCATE TABLE requisitos_os";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

  $a = "INSERT INTO `requisitos_os` (`nro_os` ,`denominacion` ,`sigla` ,`requisitos` ,`version` ,`suspendido` ,`vigencia` ,`comunes` ,`especiales` ,`alta` ,`antibiograma` ,`diagnostico` ,
`planes` ,`info_planes` ,`planes_rechazados` ,`motivo_rechazo`) VALUES ".$response;
 $result = $db->Execute($a);


$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('rechazadas', $param1);

  $sql = "TRUNCATE TABLE a_practicas_rechazadas";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

 $a = "INSERT INTO `a_practicas_rechazadas`  (`nro_os`, `cod_practica`, `motivo`, `fecha` , `tipo` , `plan` ) VALUES ".$response;
 $result = $db->Execute($a);


//-------------------------------------------------------------------------------------------//

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('planes', $param1);

  $sql = "TRUNCATE TABLE planes_os";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

  $a = "INSERT INTO `planes_os` (`nro_os`, `cod_operacion`, `nro_plan`, `nombre_plan`, `reducido_plan`, `coseguro`, `comunes`, `especiales`, `alta`, `pmo`, `texto`) VALUES ".$response;
 $result = $db->Execute($a);





//// actualizar convenio        ///
include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('actualizar', $param1);



include ("../../conexiones/config.inc.php");

  $sql = "TRUNCATE TABLE `arancel_migrado`";
 $result = $db->Execute($sql);

   $a = "INSERT INTO `arancel_migrado` (`nro_os`, `modalidad`, `ug`, `uh`, `modalidad_especiales`, `ug_especiales`, `uh_especiales`, `modalidad_alta`, `ug_alta`, `uh_alta`, `nomenclador`) VALUES ".$response;
 $result = $db->Execute($a);

 


$sql2="select * from arancel where nro_os > 999 and nro_os < 9999 order by nro_os";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=strtoupper($result2->fields["nro_os"]);
$modalidad=strtoupper($result2->fields["modalidad"]);
$ug=strtoupper($result2->fields["ug"]);
$uh=strtoupper($result2->fields["uh"]);
$modalidad_especiales=strtoupper($result2->fields["modalidad_especiales"]);
$ug_especiales=strtoupper($result2->fields["ug_especiales"]);
$uh_especiales=strtoupper($result2->fields["uh_especiales"]);
$modalidad_alta=strtoupper($result2->fields["modalidad_alta"]);
$ug_alta=strtoupper($result2->fields["ug_alta"]);
$uh_alta=strtoupper($result2->fields["uh_alta"]);
$nomenclador=strtoupper($result2->fields["nomenclador"]);


$sql3="select * from arancel_migrado where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$uh_abm=strtoupper($result3->fields["uh"]);
$uh_especiales_abm=strtoupper($result3->fields["uh_especiales"]);
$uh_alta_abm=strtoupper($result3->fields["uh_alta"]);


$sql3="select * from datos_os where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$sigla=strtoupper($result3->fields["sigla"]);
$nro_os2=strtoupper($result3->fields["nro_os"]);
$denominacion=strtoupper($result3->fields["denominacion"]);

if ($nro_os2 != ""){
  $sql = "UPDATE `arancel` SET `uh` = '$uh_abm', `uh_especiales` = '$uh_especiales_abm', `uh_alta` = '$uh_alta_abm' WHERE `nro_os` = $nro_os";
$result = $db->Execute($sql);
}else{
  $sql = "INSERT INTO `arancel` ( `nro_os` , `modalidad` , `ug` , `uh` , `modalidad_especiales` , `ug_especiales` , `uh_especiales` , `modalidad_alta` , `ug_alta` , `uh_alta` , `nomenclador` )VALUES ( '$nro_os' , '$modalidad' , '$ug' , '$uh_abm' , '$modalidad_especial' , '$ug_especiales' , '$uh_especiales_abm' , '$modalidad_alta' , '$ug_alta' , '$uh_alta_abm' , '$nomenclador')";
 $result = $db->Execute($sql);
}


$result2->MoveNext();
}





include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('mega', $param1);

  $sql = "TRUNCATE TABLE precio_derivaciones";
 $result = $db->Execute($sql);

  $sql = "TRUNCATE TABLE fecha_actualizacion_mega";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

   $a = "INSERT INTO fecha_actualizacion_mega ( `fecha_actualizacion`  ) VALUES ('$hoy')";
 $result = $db->Execute($a);

   $a = "INSERT INTO precio_derivaciones ( `cod_practica`  , `descripcion` ,`laboratorio_realizacion` , `precio` ,`cod_operacion` ,`metodo`) VALUES ".$response;
 $result = $db->Execute($a);




include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('op_facturacion', $param1);

  $sql = "TRUNCATE TABLE op_facturacion";
 $result = $db->Execute($sql);


$hoy = date("Y-m-d");

   $a = "INSERT INTO op_facturacion ( `nro_os`, `detalle`, `post_factura`, `separacion`, `coseguro`, `valor_porcentaje`, `coseguro_esp`, `valor_porc_esp`, `coseguro_comp`, `valor_porc_comp`, `gastos`, `honorarios`, `operacion`, `porcentaje_total`, `operacion_orden`, `denominacion_ajuste`, `iva`) VALUES ".$response;
 $result = $db->Execute($a);




$leyenda = "REGLAS DE AUDITORIA";
$leyenda1 = "ARANCELES";
$leyenda3 = "NOMENCLADOR MEGA";
$leyenda2 = "OBRAS SOCIALES";


require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$informe= $client->call('informe', $param1);


$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/actualizar_sulb.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde);
$response= $client->call('cargar_sulb', $param1);

if ($response != ""){
  $sql = "TRUNCATE TABLE sulb";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");
/////
   $a = "INSERT INTO sulb (`cuit` ,`nombre_laboratorio` ) VALUES ".$response;
 $result = $db->Execute($a);
}


?>
<table style=" font-family: Trebuchet MS; background-color: #fff !important; border: 1px solid #000;" width="200" height="400" border="0" cellspacing="0">
  <tr>
    <th height="35" scope="col">INFORMES ABM</th>
  </tr>
  <tr>
    <th height="61" scope="col"><span class="Estilo12"><?php echo $informe;?></span></th>
  </tr>
  <tr>
    <th height="55" scope="col"> SE ACTUALIZ&Oacute; </th>
  </tr>
  <tr>
    <td scope="col"><span class="Estilo25"><blink></blink><blink>
      </span>
      <ul class="Estilo25">
        <li><?php echo $leyenda;?></li>
      </ul>    </td>
  </tr>
  <tr>
    <td scope="col"><ul class="Estilo25">
      <li><?php echo $leyenda1;?></li>
    </ul></td>
  </tr>
  <tr>
    <td scope="col"><ul class="Estilo25">
      <li><?php echo $leyenda2;?></li>
    </ul></td>
  </tr>
  <tr>
    <td scope="col"><ul class="Estilo25">
      <li><?php echo $leyenda3;?></li>
    </ul></td>
  </tr>
</table>








<?PHP
}

?>





