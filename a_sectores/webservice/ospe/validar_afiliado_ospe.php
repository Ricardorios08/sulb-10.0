<?php
require_once("../../../nusoap/lib/nusoap.php");



 $afil = "20-27980594-2/00";

$numero_credencial = "2025180764800";
 
$nf = substr($numero_credencial,11,2);
$wsdl='http://wsospeonline.gmssa.com.ar/wsoPadronSAN.asmx?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 
$ap_param=array('cuil'=>$numero_credencial,'nf'=>$nf,'username'=>'30545508652','password'=>'cb1999ae13d1c438abd1b43c5fe08f8e'); 


echo "aca".$response= $client->call('ObtenerInfoPadron', array($ap_param));

$resultado = $info->ObtenerInfoPadronResult;


foreach ($response as $k => $v) {
$c = $c.$v."*";
}

$r=  list($nombre, $apellido, $credencial,  $TipoDocumento, $nro_documento, $CUIL,  $NF, $fecha_nacimiento,  $Edad,  $sexo, $Parentesco,  $mensaje_display,  $NroPlan, $plan, $coseguro,  $CodigoPostal, $Localidad,  $Provincia, $ProvinciaDesc, $NivelPlan, $Saldo) = explode("*",$c);




echo "/*/*/*/**".$resultado = $info->ObtenerInfoPadronResult;

?>


<table width="822" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo42">VALIDACION AFILIADO OSPE </div></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo42">Afiliado</span></div></td>
    <td><?php echo $apellido;?> <?php echo $nombre;?> </td>
  </tr>
  
  <tr>
    <td width="151"><div align="center"><span class="Estilo42">Activo</span></div></td>
    <td width="665"><?php echo $mensaje_display;?></td>
  </tr>
  <!-- <tr>
    <td><div align="center"><span class="Estilo42">id</span></div></td>
    <td><?php echo $id;?></td>
  </tr> -->
  <tr>
    <td><div align="center"><span class="Estilo42">Credencial</span></div></td>
    <td><?php echo $credencial;?></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo42">Plan</span></div></td>
    <td><?php echo $plan;?></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo42">Coseguro</span></div></td>
    <td><?php echo $Coseguro;?></td>
  </tr>

</table>




