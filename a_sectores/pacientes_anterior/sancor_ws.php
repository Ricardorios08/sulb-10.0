<?php

//header ("Content-Type:text/xml");
include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");


 $cuit;
  $sql10="select * from pacientes where nro_paciente = $nro_paciente";
$result10 = $db->Execute($sql10);

 $numero_credencial=$result10->fields["nro_afiliado"];
//$numero_credencial = $numero_credencial * 1;
$ultima_fecha=$result10->fields["ultima_fecha"];
$track=$result10->fields["track"];
$ultima_01a=$result10->fields["ultima_01a"];


$dia = substr($ultima_fecha,8,2);
$mes= substr($ultima_fecha,5,2);
$anio = substr($ultima_fecha,0,4);

$ultima_fecha = $anio.$mes.$dia;



$cuit_prestador= 20125735496;
//$medico = 1000;
//$nombre_medico = "Perez,Raul";

 $cuit = $cuit *1;

//$numero_credencial = 12129700;

//DATOS DE CONECCION
$servicio="http://e.sancorsalud.com.ar/APAWE_SSA.aspx?wsdl"; // Dirección del WS

// PARAMETROS
$parametros=array();
$prestitem=array();
$item=array();

//$cuit = 20125735496;
// PARAMETROS Datos del prestador
$parametros['Nroorden']=1;
$parametros['Entidad']=30400;
$parametros['Tiponroefector']="CU";
$parametros['Nroefector']=$cuit;
$parametros['Formaidafiliado']="AS";
$parametros['Afiliado']=$numero_credencial;
$parametros['Matriculaprescribiente']=$medico;
$parametros['Descripcionprescribiente']="0";
// PARAMETROS Prestaciones



  $sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000";
$result10 = $db->Execute($sql10);
if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
  $nro_practica=$result10->fields["nro_practica"];
$cod_autorizacion=$result10->fields["cod_autorizacion"];

$nro_practica = str_pad($nro_practica, 4, "0", STR_PAD_LEFT);
$nro_practica = "66".$nro_practica;
$cont = $cont + 1;

 $item[] = array('TipoNomenclador' => 'NU', 'Prestacion' => $nro_practica, 'Cantidad' => 1, 'Formulario' => $cod_autorizacion);

$result10->MoveNext();
	}


$prestitem['PrestacionesItem'] = $item;



$parametros['Prestaciones'] = $prestitem;
// PARAMETROS Login
$parametros['Usuario']="WSRVSSA";
$parametros['Clave']="15WSSA08";


//LLAMADA AL MÉTODO

$client = new SoapClient($servicio, $parametros);
$result = $client->AUTORIZACION($parametros);

//var_dump($result);

//file_put_contents("respuesta_sancor.xml", $result);

//LECTURA DEL ARRAY
$result = obj2array($result);
$respuestas=$result['Codigorespuesta'];
$n=count($respuestas);


//////////////////

$Nroautorizacion = $result['Nroautorizacion'];
$Nombreentidad = $result['Nombreentidad'];
$Nombreefector = $result['Nombreefector'];
$Nombreafiliado = $result['Nombreafiliado'];
$Edad = $result['Edad'];
$Condicionafiliado = $result['Condicionafiliado'];
$Codigorespuesta = $result['Codigorespuesta'];
$Descripcionrespuesta = $result['Descripcionrespuesta'];
$Planrta = $result['Planrta'];

$Prestacionesrta =$result['Prestacionesrta'];



//var_dump($Prestacionesrta);

//var_dump($producto1);

//var_dump($Prestacionesrta);
/*echo "0".$Prestacionesrta[0];
echo "1".$Prestacionesrta[1];
echo "2".$Prestacionesrta[2];
echo "3".$Prestacionesrta[3];

echo "<br>";
echo print_r($Prestacionesrta);
echo "<br>";
//echo print_r($Prestacionesrta->DescripcionErrorPrest);*/




$Nombre = $result['Nombre'];
$Apellido = $result['Apellido'];
$Fechanacimiento  = $result['Fechanacimiento'];
$Nrodocumento = $result['Nrodocumento'];
$Sexo = $result['Sexo'];



/*//////////////////
echo "Nroautorizacion: ".$Nroautorizacion = $result['Nroautorizacion'];
echo "<br>";
echo "Nombreentidad: ".$Nombreentidad = $result['Nombreentidad'];
echo "<br>";
echo "Nombreefector: ".$Nombreefector = $result['Nombreefector'];
echo "<br>";
echo "Nombreafiliado: ".$Nombreafiliado = $result['Nombreafiliado'];
echo "<br>";
echo "Edad: ".$Edad = $result['Edad'];
echo "<br>";
echo "Condicionafiliado: ".$Condicionafiliado = $result['Condicionafiliado'];
echo "<br>";
echo "Codigorespuesta: ".$Codigorespuesta = $result['Codigorespuesta'];
echo "<br>";
echo "Descripcionrespuesta: ".$Descripcionrespuesta = $result['Descripcionrespuesta'];
echo "<br>";
echo "Planrta: ".$Planrta = $result['Planrta'];
echo "<br>";
echo "Prestacionesrta: ".$Prestacionesrta =$result['Prestacionesrta'];
echo "<br>";
echo "nombre: ".$Nombre = $result['Nombre'];
echo "<br>";
echo "apellido: ".$Apellido = $result['Apellido'];
echo "<br>";
echo "fecha_nacimiento: ".$Fechanacimiento  = $result['Fechanacimiento'];
echo "<br>";
echo "Nrodocumento: ".$Nrodocumento = $result['Nrodocumento'];
echo "<br>";
echo "Sexo: ".$Sexo = $result['Sexo'];
echo "<br>";
*/

$fechaTrx = date("Ymd");
$HoraTrx = date("his");


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

function obj2array2($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array2($val);
         break;
      case is_array($val):
         $out[$key] = obj2array2($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}


?>
<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo4 {
	font-size: 12px;
	font-weight: bold;
}
.Estilo5 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>



<table width="315" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo2">VALIDACION SANCOR SULB </div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3 Estilo1"><?php echo $nro_laboratorio1;?> <?php echo $prestador;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Cuit: <?php echo $cuit;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3 Estilo1">Afiliado: <?php echo $Apellido;?>, <?php echo $Nombre;?></div>     </td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">N° Credencial: <?php echo $numero_credencial;?></span></td>
  </tr>
    

    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Plan: <?php echo $Planrta;?></span></td>
    </tr>
    <tr>
      <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Respuesta Sancor:</span></div></td>
    </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="center"><span class="Estilo3 Estilo1"><span class="Estilo5"><?php echo $Descripcionrespuesta;?></span></span></div></td>
  </tr>


<?php

$sql10="select count($nro_practica) as conta from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000";
$result10 = $db->Execute($sql10);

$conta=$result10->fields["conta"];



  foreach($Prestacionesrta as $producto){
     $producto;
}

foreach($producto as $producto1 ){
     $producto1;

}




if ($conta == 1){
$ErrorPrestacion = $producto1['ErrorPrestacion'];
$TipoNomenclador = $producto1['TipoNomenclador'];
$Prestacion = $producto1['Prestacion'];
$DescripcionErrorPrest = $producto1['DescripcionErrorPrest'];
$DescripcionErrorPrest = utf8_decode($DescripcionErrorPrest);
$DescripcionErrorPrest = substr($DescripcionErrorPrest,0,36);
$Prestacion = substr($Prestacion,2,4)*1;

var_dump($producto1);

if ($ErrorPrestacion != 0){
$sql8="select practica from convenio_practica where cod_practica = '$Prestacion' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
?><tr>
     <td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;&nbsp;&nbsp;<?php echo $Prestacion;?> - <?php echo $practica;?><br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $DescripcionErrorPrest;?></span></td>
   </tr>
<?php

}else{

?><tr>
     <td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;&nbsp;&nbsp;<?php echo $Prestacion;?> - <?php echo $practica;?> <?php echo $DescripcionErrorPrest;?></span></td>
   </tr>
<?php

}


}else{

//var_dump($producto1);

for ($i=0;$i<count($producto1);$i++)
      {

      //saco el valor de cada elemento
    $ErrorPrestacion        = $producto1[$i]['ErrorPrestacion'];
	$TipoNomenclador		= $producto1[$i]['TipoNomenclador'];
	$Prestacion				= $producto1[$i]['Prestacion'];
	$DescripcionErrorPrest  = $producto1[$i]['DescripcionErrorPrest'];


$Prestacion = substr($Prestacion,2,4)*1;

$DescripcionErrorPrest = str_replace("AUTORIZADO -", "", $DescripcionErrorPrest);
 


$DescripcionErrorPrest = utf8_decode($DescripcionErrorPrest);
$DescripcionErrorPrest = substr($DescripcionErrorPrest,0,36);
if ($ErrorPrestacion != 0){
$sql8="select practica from convenio_practica where cod_practica = '$Prestacion' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);




     


?><tr>
     <td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;&nbsp;&nbsp;<?php echo $Prestacion;?> - <?php echo $practica;?><br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $DescripcionErrorPrest;?></span></td>
   </tr>
<?php

}else{

?><tr>
     <td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;&nbsp;&nbsp;<?php echo $Prestacion;?> - <?php echo $practica;?> <?php echo $DescripcionErrorPrest;?></span></td>
   </tr>

<?php

}



$practica = "";


}//ciera el for

}



?>
</table>


<?php 
	
	if ($Codigorespuesta == 0){

		   $sql = "UPDATE pacientes SET  `nombre` = '$Nombre', `apellido` = '$Apellido',`nro_documento` = '$nro_documento', `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' , `ultima_01a` = '$fechaTrx' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
//mysql_query($sql);

$leyenda = "SANCOR: ".$Nroautorizacion;

?>
<table width="315" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </th>
  </tr>
</table>
<table width="316" border="0" cellpadding="0">
  <tr>
    <th width="312" scope="col"><div align="left"><span class="Estilo3">Firma: ......................................................</span></div></th>
  </tr>
  <tr>
    <th scope="col"><div align="left"><span class="Estilo3">Tipo y Nro Doc: ........................................ </span></div></th>
  </tr>
  <tr>
    <th scope="col"><div align="left"><span class="Estilo3">Aclaracion: ..............................................</span></div></th>
  </tr>
</table>
<?php 

	include ("abm_ws.php");

	}

	?>



