<style type="text/css">
<!--
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12; }
.Estilo4 {font-size: 12}
-->
</style>



<table width="850" border="0" cellpadding="0">
  <tr>
    <td colspan="5"><div align="center" class="Estilo3"></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center"><span class="Estilo4"></span><span class="Estilo4"></span><span class="Estilo4"></span><span class="Estilo4"></span><span class="Estilo4"><span class="Estilo3">ARANCELES </span></span></div></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="2" bgcolor="#B8B8B8"><span class="Estilo4"></span>      <div align="center" class="Estilo3">OBRA SOCIAL ACTUALES </div>      <span class="Estilo4"></span><span class="Estilo4"></span></td>
    <td colspan="3" bgcolor="#6699CC"><div align="center" class="Estilo3">ABM</div>      <div align="center" class="Estilo3"></div></td>
  </tr>
  <tr>
    <td width="62" bgcolor="#6699CC"><div align="center" class="Estilo3">COM</div></td>
    <td width="58" bgcolor="#6699CC"><div align="center" class="Estilo3">BF</div></td>
    <td width="55" bgcolor="#6699CC"><div align="center" class="Estilo3">AF</div></td>
  </tr>
 
<?php





//// actualizar convenio        ///
include("../../../conexiones/config.inc.php");
require_once("../../../nusoap/lib/nusoap.php");

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('actualizar', $param1);



include ("../../../conexiones/config.inc.php");

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


?>

 <tr>
    <td width="35" bgcolor="#EDEDED"><span class="Estilo3">
      <?php echo $nro_os;?>
    </span></td>
    <td width="450" bgcolor="#EDEDED"><span class="Estilo3">
      <?php echo $sigla;?>
    - <?php echo $denominacion;?></span></td>
    <td bgcolor="#EDEDED"><div align="center" class="Estilo3"><?php echo $uh_abm;?></div></td>
    <td bgcolor="#EDEDED"><div align="center" class="Estilo3"><?php echo $uh_especiales_abm;?></div></td>
    <td bgcolor="#EDEDED"><div align="center" class="Estilo3"><?php echo $uh_alta_abm;?></div></td>
  </tr>

  <?php


 
}


$result2->MoveNext();
}


?>


</table>
</FORM>
