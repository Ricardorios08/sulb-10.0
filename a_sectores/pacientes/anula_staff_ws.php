<?PHP 


//DATOS DE CONECCION
$servicio="http://e.sancorsalud.com.ar/APAWE_SSA.aspx?wsdl"; // Dirección del WS

// PARAMETROS
$parametros=array();
$prestitem=array();
$item=array();

// PARAMETROS Datos del prestador
 $parametros['Nroautorizacion']=$autorizacion_ws;
 $parametros['Entidad']=30400;
// PARAMETROS Login
$parametros['Usuario']="WSRVSSA";
$parametros['Clave']="15WSSA08";

//LLAMADA AL MÉTODO
$client = new SoapClient($servicio, $parametros);
$result = $client->ANULACION($parametros);

//LECTURA DEL ARRAY
$result = obj2array($result);
$respuestas=$result['Codigorespuesta'];
$n=count($respuestas);


//////////////////


 $Nroordenrta = $result['Nroordenrta'];
 $Nombreentidad = $result['Nombreentidad'];
 $Codigorespuesta = $result['Codigorespuesta'];
 $Descripcionrespuesta = $result['Descripcionrespuesta'];

$Descripcionrespuesta = utf8_decode($Descripcionrespuesta);


function obj2array($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array($val);
         break;
      case is_array($val):
         $out[$key] = obj2array($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}



?>

<table width="350" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo42 Estilo1 Estilo4">RESPUESTA DE OBRA SOCIAL STAFF </div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3"><?php echo $apellido;?><?php echo $nombre;?></div>     </td>
  </tr>
      

  
  <tr>
    <td bgcolor="#F0F0F0"><div align="left"><span class="Estilo1"><span class="Estilo2"></span></span><span class="Estilo3"><?php echo $Codigorespuesta;?></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3"><?php echo $Descripcionrespuesta;?></span></td>
  </tr>

  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3">Transacción: <?php echo $autorizacion_ws;?></span></td>
  </tr>



</table>



<?php

if ($Codigorespuesta == 35){
include ("anula_abm_ws.php");
}














