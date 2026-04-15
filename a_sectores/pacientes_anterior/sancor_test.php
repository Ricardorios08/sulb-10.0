<?PHP

//DATOS DE CONECCION
$servicio="http://e.sancorsalud.com.ar/APAWE_SSA.aspx?wsdl"; // Dirección del WS

// PARAMETROS
$parametros=array();
$prestitem=array();
$item=array();

$cuit_prestador = 20125735496;
// PARAMETROS Datos del prestador
$parametros['Nroorden']=1;
$parametros['Entidad']=30400;
$parametros['Tiponroefector']="CU";
$parametros['Nroefector']=$cuit_prestador;
$parametros['Formaidafiliado']="AS";
$parametros['Afiliado']=12129700;
$parametros['Matriculaprescribiente']=0;
$parametros['Descripcionprescribiente']="0";
// PARAMETROS Prestaciones
$item[] = array('TipoNomenclador' => 'NU', 'Prestacion' => '660001', 'Cantidad' => 1, 'Formulario' => 0);
$item[] = array('TipoNomenclador' => 'NU', 'Prestacion' => '660475', 'Cantidad' => 1, 'Formulario' => 0);
$prestitem['PrestacionesItem'] = $item;
$parametros['Prestaciones'] = $prestitem;
// PARAMETROS Login
$parametros['Usuario']="WSRVSSA";
$parametros['Clave']="15WSSA08";

//LLAMADA AL MÉTODO
$client = new SoapClient($servicio, $parametros);
$result = $client->AUTORIZACION($parametros);


//LECTURA DEL ARRAY
$result = obj2array($result);
$respuestas=$result['Codigorespuesta'];
$n=count($respuestas);


//////////////////

echo $Nroautorizacion = $result['Nroautorizacion'];
echo $Nombreentidad = $result['Nombreentidad'];
echo $Nombreefector = $result['Nombreefector'];
echo $Nombreafiliado = $result['Nombreafiliado'];
echo $Edad = $result['Edad'];
echo $Codigorespuesta = $result['Codigorespuesta'];
echo $Descripcionrespuesta = $result['Descripcionrespuesta'];
echo $Planrta = $result['Planrta'];
echo $Prestacionesrta =$result['Prestacionesrta'];
echo $nombre = $result['nombre'];
echo $apellido = $result['apellido'];
echo $credencial  = $result['Codicredencialgorespuesta'];
echo $nro_documento = $result['nro_documento'];
echo $fecha_nacimiento  = $result['fecha_nacimiento'];
echo $sexo = $result['sexo'];
echo $mensaje_display  = $result['mensaje_display'];
echo $mensaje_display1  = $result['mensaje_display1'];
echo $NroPlan= $result['NroPlan'];
echo $plan= $result['plan'];
echo $tp_afiliado = $result['tp_afiliado'];




//MOSTRAMOS/*
/*echo 'Cantidad de items del array devuelto: '.$n;
echo '<br>';
echo 'Código de respuesta: '.$result['Codigorespuesta'];
echo 'Auto: '.$result['Nroautorizacion'];

echo '<br>';
echo 'Descripción de la respuesta: '.$result['Descripcionrespuesta'];
*/

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