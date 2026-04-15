<?php


include ("../../conexiones/config.inc.php");
$nro_paciente=$_POST["nro_paciente"];
$nro_afiliado=$_POST["nro_afiliado"];
$nro_os=$_POST["nro_os"];

$hoy = date("Y-m-d");
$sql="select * from pacientes where ultima_fecha = '$hoy' order by nro_llegada desc";
$result = $db->Execute($sql);
$nro_llegada=$result->fields["nro_llegada"]+1;

  $sql = "UPDATE pacientes SET  `ultima_fecha` = '$hoy', `nro_llegada` = '$nro_llegada' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
mysql_query($sql);


if ($nro_os == 1041){


}elseif($nro_os == 5171){


 $numero_credencial = $nro_afiliado;

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

$r=  list($nombre, $apellido, $credencial,  $TipoDocumento, $nro_documento, $CUIL,  $NF, $fecha_nacimiento,  $Edad,  $sexo, $Parentesco,  $mensaje_display,  $NroPlan, $plan, $coseguro,  $CodigoPostal, $Localidad,  $Provincia, $ProvinciaDesc, $NivelPlan, $Saldo) = explode("*",$c);





$dia_nac = substr($fecha_nacimiento,6,2);
$mes_nac = substr($fecha_nacimiento,4,2);
$anio_nac = substr($fecha_nacimiento,0,4);


if ($sexo == "F"){
$sexo = "Femenino";
}else{
$sexo = "Masculino";
}


   $sql = "UPDATE pacientes SET  `nombre` = '$nombre', `apellido` = '$apellido',`nro_documento` = '$nro_documento', `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
mysql_query($sql);




}else{


}


