<?
require_once("nusoap.php");

$ns = 'http://sistemadeodenes.com.ar/sulb/nusoap/lib'; //Espacio de nombres o sitio; sitio donde estará alojado el web service

$server = new soap_server();
$server->configureWSDL('CanadaTaxCalculator',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('CalculateOntarioTax',array('amount' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);


$server->register('pacientes',array('sql' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('nro_os',   array('sql' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('practicas',array('sql' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('actualizar',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('obras',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('mega',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('requisitos',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('planes',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('rechazadas',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('mega_facturas',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('proveeduria_facturas',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('buscar_orden',array('cod_grabacion' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('informe',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('liquidacion',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string' , 'variable3' => 'xsd:string' , 'variable4' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('op_facturacion',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);


function CalculateOntarioTax($amount,$apellido){

$taxcalc=$amount.$apellido;

return new soapval('return','xsd:string',$taxcalc);
}






function pacientes($sql){
include ("../../conexiones/config.inc.php");
$sql1=$sql;
mysql_query($sql1);

$a = mysql_insert_id();
return new soapval('return','xsd:string',$a);
}


function liquidacion($variable1 , $variable2, $variable3 , $variable4){
include ("../../conexiones/config.inc.php");

$nro_laboratorio=$variable1;
$periodo=$variable2;
$anio_liquidacion=$variable3;
$nro_liquidacion=$variable4;

$sql2="select * from liquidacion_web where nro_laboratorio = $nro_laboratorio  and  nro_liquidacion = $nro_liquidacion and periodo = $periodo and anio = $anio_liquidacion";
$result2 = $db->Execute($sql2);


if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=$result2->fields["nro_os"];
$nro_laboratorio=$result2->fields["nro_laboratorio"];
$nro_factura=$result2->fields["nro_factura"];
$nro_liquidacion=$result2->fields["nro_liquidacion"];
$periodo=$result2->fields["periodo"];
$anio=$result2->fields["anio"];
$operacion=$result2->fields["operacion"];
$importe=$result2->fields["importe"];
$tipo_pago=$result2->fields["tipo_pago"];
$motivo=$result2->fields["motivo"];
$fecha=$result2->fields["fecha"];
$porcentaje=$result2->fields["porcentaje"];
$bruto=$result2->fields["bruto"];
$acumulado_mensual=$result2->fields["acumulado_mensual"];
$fecha_movimiento=$result2->fields["fecha_movimiento"];
$saldo_deuda=$result2->fields["saldo_deuda"];
$cod_renglon=$result2->fields["cod_renglon"];
$nombre_os=$result2->fields["nombre_os"];

 
if ($conta == ""){

$sqla = "('$nro_os' , '$nro_laboratorio' , '$nro_factura' , '$nro_liquidacion' , '$periodo' , '$anio' , '$operacion' , '$importe' , '$tipo_pago' , '$motivo' , '$fecha' , '$porcentaje' , '$bruto' , '$acumulado_mensual' , '$fecha_movimiento' , '$saldo_deuda' , '$cod_renglon' , '$nombre_os')";
$conta = $conta + 1;
$sql1a = $sqla;
}else{
	$conta = $conta + 1;
$sqla = "('$nro_os' , '$nro_laboratorio' , '$nro_factura' , '$nro_liquidacion' , '$periodo' , '$anio' , '$operacion' , '$importe' , '$tipo_pago' , '$motivo' , '$fecha' , '$porcentaje' , '$bruto' , '$acumulado_mensual' , '$fecha_movimiento' , '$saldo_deuda' , '$cod_renglon' , '$nombre_os')";
$sql1a = $sql1a.",".$sqla;
}
$result2->MoveNext();
}




return new soapval('return','xsd:string',$sql1a);
}


function informe($sql){
include ("../../conexiones/config.inc.php");
$sql2="SELECT * FROM `mensaje`";
$result2 = $db->Execute($sql2);
$mensaje=$result2->fields["mensaje"];
return new soapval('return','xsd:string',$mensaje);
}

function nro_os($sql){
include ("../../conexiones/config.inc.php");
$nro_os=$sql;

$sql2="select * from datos_os where nro_os > 999 and nro_os = $nro_os";
$result2 = $db->Execute($sql2);

if ($nro_os1 == ""){
$nro_os = "NO EXISTE OBRA SOCIAL EN ABM";
}


return new soapval('return','xsd:string',$nro_os);
}



function practicas($sql,$apellido){
include ("../../conexiones/config.inc.php");
$desde=$sql;
$hasta=$apellido; 
$enter = "";
$cont = 0;

$sql2="select * from a_ordenes where fecauto between '$desde' and '$hasta'";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=$result2->fields["nro_os"];
$nro_laboratorio=$result2->fields["codbioq"];
$nroautored=$result2->fields["nroautored"];
$nroafi=$result2->fields["nroafi"];
$nro_practica=$result2->fields["codpres"];
$cantidad=$result2->fields["cantidad"];
$matpresc=$result2->fields["matpresc"];
$fecpresc=$result2->fields["fecpresc"];
$fecrea=$result2->fields["fecrea"];
 $fecauto=$result2->fields["fecauto"];
$codseg=$result2->fields["codseg"];
$nombre_afiliado=$result2->fields["nombre_afiliado"];


 

if ($cont == ""){
$sql = "('$nro_laboratorio' , '$nroautored' , '$nroafi' , '$nro_practica' , '$cantidad' , '$matpresc' , '$fecpresc' , '$fecrea' , '$fecauto' , '$codseg' , '$nro_os' , '$nombre_afiliado')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$nro_laboratorio' , '$nroautored' , '$nroafi' , '$nro_practica' , '$cantidad' , '$matpresc' , '$fecpresc' , '$fecrea' , '$fecauto' , '$codseg' , '$nro_os' , '$nombre_afiliado')";
$sql1 = $sql1.",".$sql;
}





$result2->MoveNext();

	}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}

/////////////////////////////////////////////////////////////
function actualizar($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$desde=$variable1;
$hasta=$variable2; 

$sql2="select * from arancel order by nro_os";
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


if ($cont == ""){
$sql = "('$nro_os', '$modalidad', '$ug', '$uh', '$modalidad_especiales', '$ug_especiales', '$uh_especiales', '$modalidad_alta', '$ug_alta', '$uh_alta', '$nomenclador')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$nro_os', '$modalidad', '$ug', '$uh', '$modalidad_especiales', '$ug_especiales', '$uh_especiales', '$modalidad_alta', '$ug_alta', '$uh_alta', '$nomenclador')";
$sql1 = $sql1.",".$sql;
}
$result2->MoveNext();
}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}

/////////////////////////////////////////////////////////////
function obras($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$desde=$variable1;
$hasta=$variable2; 

$sql2="select * from datos_os_abm  order by nro_os";
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
$wa=strtoupper($result2->fields["wa"]);


if ($cont == ""){
$sql = "('$nro_os', '$domicilio_n', '$localidad_n', '$cod_area_n', '$telefono_n', '$telefax_n', '$denominacion', '$sigla', '$cod_postal_n', '$email_n', '$cuit', '$nro_prestador', '$contacto', '$nivel', '$cargo', '$domi_facturacion', '$domicilio_l', '$cod_area_l', '$telefono_l', '$telefax_l', '$localidad_l', '$cod_postal_l', '$email_l', '$inscripcion' , '$activa' , '$ws')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$nro_os', '$domicilio_n', '$localidad_n', '$cod_area_n', '$telefono_n', '$telefax_n', '$denominacion', '$sigla', '$cod_postal_n', '$email_n', '$cuit', '$nro_prestador', '$contacto', '$nivel', '$cargo', '$domi_facturacion', '$domicilio_l', '$cod_area_l', '$telefono_l', '$telefax_l', '$localidad_l', '$cod_postal_l', '$email_l', '$inscripcion' , '$activa' , '$ws')";
$sql1 = $sql1.",".$sql;
}
$result2->MoveNext();
}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}
//////////////////////////////



function mega($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$desde=$variable1;
$hasta=$variable2; 

$sql2="select * from precio_derivaciones";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {

$cod_practica=$result2->fields["cod_practica"];
//$letra=strtoupper($result->fields["letra"]);
$descripcion=strtoupper($result2->fields["descripcion"]);
$laboratorio_realizacion=strtoupper($result2->fields["laboratorio_realizacion"]);
$precio=strtoupper($result2->fields["precio"]);
$metodo=strtoupper($result2->fields["metodo"]);


if ($cont == ""){
$sql = "('$nro_os', '$domicilio_n', '$localidad_n', '$cod_area_n', '$telefono_n', '$telefax_n', '$denominacion', '$sigla', '$cod_postal_n', '$email_n', '$cuit', '$nro_prestador', '$contacto', '$nivel', '$cargo', '$domi_facturacion', '$domicilio_l', '$cod_area_l', '$telefono_l', '$telefax_l', '$localidad_l', '$cod_postal_l', '$email_l', '$inscripcion')";



$sql = "('$cod_practica' , '$descripcion' , '$laboratorio_realizacion' , '$precio' , '' , '$metodo')";



$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$cod_practica' , '$descripcion' , '$laboratorio_realizacion' , '$precio' , '' , '$metodo')";
$sql1 = $sql1.",".$sql;
}
$result2->MoveNext();
}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}
//////////////////////////////




function buscar_orden($cod_grabacion){
include ("../../conexiones/config.inc.php");
$cod_grabacion1=$cod_grabacion;

$sql2="select * from ordenes where cod_grabacion = $cod_grabacion1";
$result2 = $db->Execute($sql2);
$cod_gr=$result2->fields["cod_grabacion"];



return new soapval('return','xsd:string', $cod_gr);
}



function mega_facturas($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$nro_laboratorio=$variable1;
$hasta=$variable2; 

$sql2="select * from facturas_mega where cuenta = $nro_laboratorio order by tipo_fact, fecha_factura, nro_factura";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {

$tipo_fact=strtoupper($result2->fields["tipo_fact"]);
$nro_factura=strtoupper($result2->fields["nro_factura"]);
$fecha_factura=strtoupper($result2->fields["fecha_factura"]);
$cuenta=strtoupper($result2->fields["cuenta"]);
$condicion_iva=strtoupper($result2->fields["condicion_iva"]);
$exento=strtoupper($result2->fields["exento"]);
$neto_gravado=strtoupper($result2->fields["neto_gravado"]);
$importe_iva=strtoupper($result2->fields["importe_iva"]);

$importe_descuentos=strtoupper($result2->fields["importe_descuentos"]);
$total_original=strtoupper($result2->fields["total_original"]);
$saldo=strtoupper($result2->fields["saldo"]);
$fecha_ultimo_pago=strtoupper($result2->fields["fecha_ultimo_pago"]);
$pago_caja=strtoupper($result2->fields["pago_caja"]);
$pago_liquidacion=strtoupper($result2->fields["pago_liquidacion"]);
$fecha_liquidacion=strtoupper($result2->fields["fecha_liquidacion"]);
$nro_liquidacion=strtoupper($result2->fields["nro_liquidacion"]);
$mes_liquidacion=strtoupper($result2->fields["mes_liquidacion"]);
$anio_liquidacion=strtoupper($result2->fields["anio_liquidacion"]);
$tipo_cuenta=strtoupper($result2->fields["tipo_cuenta"]);

$cod_operacion=strtoupper($result2->fields["cod_operacion"]);
$facturado=strtoupper($result2->fields["facturado"]);
$periodo=strtoupper($result2->fields["periodo"]);
$anio=strtoupper($result2->fields["anio"]);
$cant_muestras=strtoupper($result2->fields["cant_muestras"]);
$precio_tubo=strtoupper($result2->fields["precio_tubo"]);
$descuento_precio=strtoupper($result2->fields["descuento_precio"]);
$bruto=strtoupper($result2->fields["bruto"]);



if ($cont == ""){
$sql = "('$tipo_fact', '$nro_factura', '$fecha_factura', '$cuenta', '$condicion_iva', '$exento', '$neto_gravado', '$importe_iva', '$importe_descuentos', '$total_original', '$saldo', '$fecha_ultimo_pago', '$pago_caja', '$pago_liquidacion', '$fecha_liquidacion', '$nro_liquidacion', '$mes_liquidacion', '$anio_liquidacion', '$tipo_cuenta', '$cod_operacion', '$facturado', '$periodo', '$anio', '$cant_muestras', '$precio_tubo', '$descuento_precio', '$bruto')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$tipo_fact', '$nro_factura', '$fecha_factura', '$cuenta', '$condicion_iva', '$exento', '$neto_gravado', '$importe_iva', '$importe_descuentos', '$total_original', '$saldo', '$fecha_ultimo_pago', '$pago_caja', '$pago_liquidacion', '$fecha_liquidacion', '$nro_liquidacion', '$mes_liquidacion', '$anio_liquidacion', '$tipo_cuenta', '$cod_operacion', '$facturado', '$periodo', '$anio', '$cant_muestras', '$precio_tubo', '$descuento_precio', '$bruto')";
$sql1 = $sql1.",".$sql;
}
$result2->MoveNext();
}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}
//////////////////////////////


function proveeduria_facturas($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$nro_laboratorio=$variable1;
$hasta=$variable2; 

$sql2="select * from facturas_provee where cuenta = $nro_laboratorio order by fecha_emision, comprobante";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {

$cuenta=strtoupper($result2->fields["cuenta"]);
$tipo_cuenta=strtoupper($result2->fields["tipo_cuenta"]);
$tipo_fact=strtoupper($result2->fields["tipo_fact"]);
$comprobante=strtoupper($result2->fields["comprobante"]);
$fecha_emision=strtoupper($result2->fields["fecha_emision"]);
$importe_original=strtoupper($result2->fields["importe_original"]);
$fecha_pago=strtoupper($result2->fields["fecha_pago"]);
$saldo=strtoupper($result2->fields["saldo"]);

$vencimiento=strtoupper($result2->fields["vencimiento"]);
$cuotas=strtoupper($result2->fields["cuotas"]);
$cuotas_pagadas=strtoupper($result2->fields["cuotas_pagadas"]);
$cod_movimiento=strtoupper($result2->fields["cod_movimiento"]);




if ($cont == ""){
$sql = "('$cuenta', '$tipo_cuenta', '$tipo_fact', '$comprobante', '$fecha_emision', '$importe_original', '$fecha_pago', '$saldo', '$vencimiento', '$cuotas', '$cuotas_pagadas', '$cod_movimiento')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$cuenta', '$tipo_cuenta', '$tipo_fact', '$comprobante', '$fecha_emision', '$importe_original', '$fecha_pago', '$saldo', '$vencimiento', '$cuotas', '$cuotas_pagadas', '$cod_movimiento')";
$sql1 = $sql1.",".$sql;
}
$result2->MoveNext();
}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}
//////////////////////////////



function requisitos($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$desde=$variable1;
$hasta=$variable2; 

$sql2="select * from requisitos_os order by nro_os";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {

$nro_os=$result2->fields["nro_os"];

$sigla=$result2->fields["sigla"];
$denominacion=$result2->fields["denominacion"];


$requisitos=$result2->fields["requisitos"];
$version=$result2->fields["version"];
$suspendido=$result2->fields["suspendido"];
$vigencia=$result2->fields["vigencia"];

$planes=$result2->fields["planes"];
$diagnostico=$result2->fields["diagnostico"];
$info_planes=$result2->fields["info_planes"];
$planes_rechazados=$result2->fields["planes_rechazados"];
$motivo_rechazo=$result2->fields["motivo_rechazo"];


if ($cont == ""){
$sql = "('$nro_os' ,'$denominacion' ,'$sigla' ,'$requisitos' ,'$version' ,'$suspendido' ,'$vigencia' ,'$comunes' ,'$especiales' ,'$alta' ,'$antibiograma' ,'$diagnostico' ,
'$planes' ,'$info_planes' ,'$planes_rechazados' ,'$motivo_rechazo')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$nro_os' ,'$denominacion' ,'$sigla' ,'$requisitos' ,'$version' ,'$suspendido' ,'$vigencia' ,'$comunes' ,'$especiales' ,'$alta' ,'$antibiograma' ,'$diagnostico' ,
'$planes' ,'$info_planes' ,'$planes_rechazados' ,'$motivo_rechazo')";
$sql1 = $sql1.",".$sql;
}


$result2->MoveNext();
}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}
//////////////////////////////

function rechazadas($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$desde=$variable1;
$hasta=$variable2; 

$sql2="select * from a_practicas_rechazadas order by nro_os";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=$result2->fields["nro_os"];

$nro_practica=$result2->fields["cod_practica"];
$motivo=$result2->fields["motivo"];


$fecha=$result2->fields["fecha"];
$tipo=$result2->fields["tipo"];
$plan=$result2->fields["plan"];


if ($cont == ""){
$sql = "('$nro_os', '$nro_practica', '$motivo', '$fecha' , '$tipo' , '$plan')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$nro_os', '$nro_practica', '$motivo', '$fecha' , '$tipo' , '$plan')";
$sql1 = $sql1.",".$sql;
}


$result2->MoveNext();
}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}
//////////////////////////////

function planes($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$desde=$variable1;
$hasta=$variable2; 

$sql2="select * from planes_os order by nro_os";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=$result2->fields["nro_os"];

$cod_operacion=$result2->fields["cod_operacion"];
$nro_plan=$result2->fields["nro_plan"];


$nombre_plan=$result2->fields["nombre_plan"];
$reducido_plan=$result2->fields["reducido_plan"];
$coseguro=$result2->fields["coseguro"];
$comunes=$result2->fields["comunes"];

$especiales=$result2->fields["especiales"];
$alta=$result2->fields["alta"];
$pmo=$result2->fields["pmo"];
$texto=$result2->fields["texto"];



if ($cont == ""){
$sql = "('$nro_os', '$cod_operacion', '$nro_plan', '$nombre_plan', '$reducido_plan', '$coseguro', '$comunes', '$especiales', '$alta', '$pmo', '$texto')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$nro_os', '$cod_operacion', '$nro_plan', '$nombre_plan', '$reducido_plan', '$coseguro', '$comunes', '$especiales', '$alta', '$pmo', '$texto')";
$sql1 = $sql1.",".$sql;
}


$result2->MoveNext();
}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}


function op_facturacion($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$desde=$variable1;
$hasta=$variable2; 

$sql2="select * from op_facturacion order by nro_os";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {



$nro_os=$result2->fields["nro_os"];
$detalle=$result2->fields["detalle"];
$post_factura=$result2->fields["post_factura"];
$separacion=$result2->fields["separacion"];
$coseguro=$result2->fields["coseguro"];
$valor_porcentaje=$result2->fields["valor_porcentaje"];


$coseguro_esp=$result2->fields["coseguro_esp"];
$valor_porc_esp=$result2->fields["valor_porc_esp"];

$coseguro_comp=$result2->fields["coseguro_comp"];
$valor_porc_comp=$result2->fields["valor_porc_comp"];
$gastos=$result2->fields["gastos"];
$honorarios=$result2->fields["honorarios"];

$operacion=$result2->fields["operacion"];
$porcentaje_total=$result2->fields["porcentaje_total"];
$operacion_orden=$result2->fields["operacion_orden"];
$denominacion_ajuste=$result2->fields["denominacion_ajuste"];
$iva=$result2->fields["iva"];



//$sql = "INSERT INTO `laboratorio`.`op_facturacion` (`nro_os`, `detalle`, `post_factura`, `separacion`, `coseguro`, `valor_porcentaje`, `coseguro_esp`, `valor_porc_esp`, `coseguro_comp`, `valor_porc_comp`, `gastos`, `honorarios`, `operacion`, `porcentaje_total`, `operacion_orden`, `denominacion_ajuste`, `iva`) VALUES (\'0\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'0.00\', \'\', \'\', \'0.00\');";

if ($cont == ""){
$sql = " ('$nro_os', '$detalle', '$post_factura', '$separacion', '$coseguro', '$valor_porcentaje', '$coseguro_esp', '$valor_porc_esp', '$coseguro_comp', '$valor_porc_comp', '$gastos', '$honorarios', '$operacion', '$porcentaje_total', '$operacion_orden', '$denominacion_ajuste', '$iva')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = " ('$nro_os', '$detalle', '$post_factura', '$separacion', '$coseguro', '$valor_porcentaje', '$coseguro_esp', '$valor_porc_esp', '$coseguro_comp', '$valor_porc_comp', '$gastos', '$honorarios', '$operacion', '$porcentaje_total', '$operacion_orden', '$denominacion_ajuste', '$iva')";
$sql1 = $sql1.",".$sql;
}


$result2->MoveNext();
}

$sql1 = $sql1.";";
return new soapval('return','xsd:string',$sql1);
}
















//////////////////////////////
$server->service($HTTP_RAW_POST_DATA);

?>