<style type="text/css">
<!--
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12; }
.Estilo4 {font-size: 12}
-->
</style>


<table width="850" border="0" cellpadding="0">
  <tr>
    <td colspan="3"><div align="center"><span class="Estilo3">ASOCIACION BIOQUIMICA DE MENDOZA</span></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="Estilo3"> OBRA SOCIALES</div></td>
  </tr>
  <tr>
    <td colspan="3"><span class="Estilo4"></span><span class="Estilo4"></span><span class="Estilo4"></span><span class="Estilo4"></span><span class="Estilo4"></span></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#B8B8B8"><span class="Estilo4"></span>
        <div align="center" class="Estilo3"> OBRAS SOCIALES  </div>
      <span class="Estilo4"></span><span class="Estilo4"></span></td>
  </tr>
  
 
<?php

//// actualizar obras sociales  ///

include("../../../conexiones/config.inc.php");
require_once("../../../nusoap/lib/nusoap.php");

$sql2="delete from `datos_os` where nro_os > 999 and nro_os < 9999 order by nro_os";
$result2 = $db->Execute($sql2);



$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('obras', $param1);

  $sql = "TRUNCATE TABLE `datos_os_abm`";
 $result = $db->Execute($sql);


  $a = "INSERT INTO `datos_os_abm` (`nro_os`, `domicilio_n`, `localidad_n`, `cod_area_n`, `telefono_n`, `telefax_n`, `denominacion`, `sigla`, `cod_postal_n`, `email_n`, `cuit`, `nro_prestador`, `contacto`, `nivel`, `cargo`, `domi_facturacion`, `domicilio_l`, `cod_area_l`, `telefono_l`, `telefax_l`, `localidad_l`, `cod_postal_l`, `email_l`, `inscripcion` , `activa` , `ws`) VALUES ".$response;
 $result = $db->Execute($a);



$sql2="select * from `datos_os_abm` where nro_os > 999 and nro_os < 9999 or nro_os = 26169  order by nro_os";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=strtoupper($result2->fields["nro_os"]);
$denominacion=strtoupper($result2->fields["denominacion"]);
$sigla=strtoupper($result2->fields["sigla"]);
$inscripcion=strtoupper($result2->fields["inscripcion"]);
$cuit=strtoupper($result2->fields["cuit"]);
$domicilio_l=strtoupper($result2->fields["domicilio_l"]);
$cod_area_l=strtoupper($result2->fields["cod_area_l"]);
$telefono_l=strtoupper($result2->fields["telefono_l"]);
$telefax_l=strtoupper($result2->fields["telefax_l"]);
$email_l=strtoupper($result2->fields["email_l"]);
$domicilio_n=strtoupper($result2->fields["domicilio_n"]);
$cod_area_n=strtoupper($result2->fields["cod_area_n"]);
$telefono_n=strtoupper($result2->fields["telefono_n"]);
$telefax_n=strtoupper($result2->fields["telefax_n"]);
$email_n=strtoupper($result2->fields["email_n"]);
$nro_prestador=strtoupper($result2->fields["nro_prestador"]);
$contacto=strtoupper($result2->fields["contacto"]);
$nivel=strtoupper($result2->fields["nivel"]);
$cargo=strtoupper($result2->fields["cargo"]);

$activa=strtoupper($result2->fields["activa"]);
$ws=strtoupper($result2->fields["ws"]);


$sql3="select * from datos_os where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$nro_os1=strtoupper($result3->fields["sigla"]);


$sql3="select * from arancel_migrado where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$uh_abm=strtoupper($result3->fields["uh"]);
$uh_especiales_abm=strtoupper($result3->fields["uh_especiales"]);
$uh_alta_abm=strtoupper($result3->fields["uh_alta"]);


$denominacion = substr($denominacion,0,40);



 $sql3="select * from arancel where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$nro_o=strtoupper($result3->fields["nro_os"]);
if ($nro_o == ""){
 $sql = "INSERT INTO `arancel` ( `nro_os` , `modalidad` , `ug` , `uh` , `modalidad_especiales` , `ug_especiales` , `uh_especiales` , `modalidad_alta` , `ug_alta` , `uh_alta` , `nomenclador` )VALUES ( '$nro_os' , '$modalidad' , '$ug' , '$uh_abm' , '$modalidad_especial' , '$ug_especiales' , '$uh_especiales_abm' , '$modalidad_alta' , '$ug_alta' , '$uh_alta_abm' , '$nomenclador')";
 $result = $db->Execute($sql);
}



IF ($nro_os1 == ""){

if ($no_os == 3813){
 $sql = "INSERT INTO datos_os ( `nro_os` , `domicilio_n` , `localidad_n` , `cod_area_n` , `telefono_n` , `telefax_n` , `denominacion` , `sigla` , `cod_postal_n` , `email_n` , `cuit` , `nro_prestador` , `contacto` , `nivel` , `cargo` , `domi_facturacion` , `domicilio_l` , `cod_area_l` , `telefono_l` , `telefax_l` , `localidad_l` , `cod_postal_l` , `email_l` , `inscripcion` , `activa` , `ws` ) VALUES ( '$nro_os' , '$domicilio_n' , '$localidad_n' , '$cod_area_n' , '$telefono_n' ,'$telefax_n' , '$denominacion' ,  '$sigla' , '$cod_postal_n' , '$email_n' , '$cuit' , '$nro_prestador' , '$nom_contacto' , '$nivel' ,  '$cargo' , '$facturar' , '$domicilio_l' , '$cod_area_l' , '$telefono_1' , '$telefax_l' , '$localidad_l' , '$cod_postal_l' , '$email_l' , '$inscripcion' , '$activa' , '$ws')";
}

  $sql = "INSERT INTO datos_os ( `nro_os` , `domicilio_n` , `localidad_n` , `cod_area_n` , `telefono_n` , `telefax_n` , `denominacion` , `sigla` , `cod_postal_n` , `email_n` , `cuit` , `nro_prestador` , `contacto` , `nivel` , `cargo` , `domi_facturacion` , `domicilio_l` , `cod_area_l` , `telefono_l` , `telefax_l` , `localidad_l` , `cod_postal_l` , `email_l` , `inscripcion` , `activa` , `ws` ) VALUES ( '$nro_os' , '$domicilio_n' , '$localidad_n' , '$cod_area_n' , '$telefono_n' ,'$telefax_n' , '$denominacion' ,  '$sigla' , '$cod_postal_n' , '$email_n' , '$cuit' , '$nro_prestador' , '$nom_contacto' , '$nivel' ,  '$cargo' , '$facturar' , '$domicilio_l' , '$cod_area_l' , '$telefono_1' , '$telefax_l' , '$localidad_l' , '$cod_postal_l' , '$email_l' , '$inscripcion' , '$activa' , '$ws')";
$result = $db->Execute($sql);


?>
  <tr>
    <td width="72" bgcolor="#EDEDED"><span class="Estilo3"> <?php echo $nro_os;?> </span></td>
    <td width="630" bgcolor="#EDEDED"><span class="Estilo3"> <?php echo $sigla;?> - <?php echo $denominacion;?> </span></td>
    <td width="140" bgcolor="#EDEDED"><div align="center"><span class="Estilo3">ACTUALIZADAS</span></div></td>
  </tr>
  <?php
}ELSE{

?>
  <tr>
    <td width="72" bgcolor="#EDEDED"><span class="Estilo3"> <?php echo $nro_os;?> </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3"> <?php echo $sigla;?> - <?php echo $denominacion;?> </span></td>
    <td bgcolor="#EDEDED"><div align="center"><span class="Estilo3">EXISTENTE</span></div></td>
  </tr>
  <?php

}



$result2->MoveNext();
}


?>

</table>
</FORM>