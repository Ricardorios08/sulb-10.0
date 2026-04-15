<?php

include("../../../conexiones/config.inc.php");



$numero_credencial= $_REQUEST['nro_afiliado'];

    $soapClient = new SoapClient("http://wsospeonline.gmssa.com.ar/wsoPadronSAN.asmx?wsdl");

       // Setup the RemoteFunction parameters
       $ap_param = array(
'cuil'     =>  $numero_credencial,  
'nf'   =>  '0',
'username' =>  '30545508652',
'password' =>  'cb1999ae13d1c438abd1b43c5fe08f8e'
);
                 
       // Call RemoteFunction ()
       $error = 0;
       try {
           $info = $soapClient->__call("ObtenerInfoPadron", array($ap_param));
       } catch (SoapFault $fault) {
           $error = 1;
           print("Sorry, the WebService returned the following ERROR: ".$fault->faultcode."-".$fault->faultstring.". We will now take you back to our home page.");
       }
     
       if ($error == 0) {      
//print_r($info->ObtenerInfoPadronResult);

$resultado = $info->ObtenerInfoPadronResult;

}
 
unset($soapClient); 


foreach ($resultado as $k => $v) {
$c = $c.$v."*";
}

$r=  list($nombre, $apellido, $credencial,  $TipoDocumento, $NumDocumento, $CUIL,  $NF, $FechaNacimiento,  $Edad,  $Sexo, $Parentesco,  $mensaje_display,  $NroPlan, $plan, $Coseguro,  $CodigoPostal, $Localidad,  $Provincia, $ProvinciaDesc, $NivelPlan, $Saldo) = explode("*",$c);
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




