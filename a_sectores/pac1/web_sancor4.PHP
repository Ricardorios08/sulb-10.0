<?php



$soapClient = new SoapClient("http://x.esancorsalud.com.ar/apawe_ssa.aspx?wsdl"); //prueba
$soapClient = new SoapClient("http://e.sancorsalud.com.ar/apawe_ssa.aspx?wsdl"); //produccion

$ap_param = array(
'Entidad'     =>  30400,  
'Tiponroefector'   =>  CU,
'Nroefector' =>  30710747101, // cuit del bioq
'Formaidafiliado' =>  'AS',
'Afiliado' =>  11779800, //
'Usuario' =>  'WSRVSSA',
'Clave' =>  '15WSSA08'
);

var_dump($ap_param);

$info = $soapClient->__call("ELEGIBILIDAD", array($ap_param));
echo "NOMBRE: ".$Nombreentidad = $info->Descripcionrespuesta;ECHO "<BR>";
echo "EFECTOR: ".$Nombreefector = $info->Nombreefector;ECHO "<BR>";
echo "AFILIADO: ".$Nombreafiliado = $info->Nombreafiliado;ECHO "<BR>";
echo "EDAD: ".$Edad = $info->Edad;ECHO "<BR>";
echo "RESPUESTA: ".$Codigorespuesta = $info->Codigorespuesta;ECHO "<BR>";
echo "DESCRIPCION: ".$Descripcionrespuesta = $info->Descripcionrespuesta;ECHO "<BR>";
echo "PLAN RTA: ".$Planrta = $info->Planrta;ECHO "<BR>";

ECHO "<BR>";

 var_dump($info);

unset($soapClient); 

 
foreach ($resultado as $k => $v) {
$c = $c.$v."*";
}

$r=  list($nombre, $apellido, $credencial,  $TipoDocumento, $nro_documento, $CUIL,  $NF, $fecha_nacimiento,  $Edad,  $sexo, $Parentesco,  $mensaje_display,  $NroPlan, $plan, $coseguro,  $CodigoPostal, $Localidad,  $Provincia, $ProvinciaDesc, $NivelPlan, $Saldo) = explode("*",$c);

