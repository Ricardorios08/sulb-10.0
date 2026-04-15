<?php

 include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");
 
 $sql10="select * from ordenes WHERE cod_grabacion = '$cod_grabacion'";
$result10 = $db->Execute($sql10);

$nro_os=strtoupper($result10->fields["nro_os"]);
 $autorizacion=strtoupper($result10->fields["autorizacion"]);
 $autorizacion_ws=strtoupper($result10->fields["autorizacion_ws"]);
 $nro_afiliado=strtoupper($result10->fields["nro_afiliado"]);
 $nro_paciente=strtoupper($result10->fields["nro_paciente"]);
 $palabra=strtoupper($result10->fields["nro_paciente"]);
 
$sql = "UPDATE `a_ordenes` SET `anulada` = '1' WHERE `nroautored` = $autorizacion";
 
$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);
$nro_autorizacion = $response;


$sql = "UPDATE `ordenes` SET `autorizacion` = ''  ,`autorizacion_ws` = '' , `cuit_osde` = ''  WHERE `cod_grabacion` = $cod_grabacion";
mysql_query($sql);

///////////////////   NUSOAP  ///////////


$leyenda = "ANULE EL NUMERO EN LA ORDEN. SE ANULO LA TRANSACCION: ".$autorizacion;

?><table width="350" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </th>
  </tr>
</table>
<table width="349" border="1">
  <tr>
    <td><div align="center"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"> Volver al paciente</a></div></td>
  </tr>
</table>
<?php

 
EXIT;


















