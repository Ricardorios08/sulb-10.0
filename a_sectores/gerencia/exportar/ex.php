<?php
$b = "ORDENES.TXT";
header("Content-type: application/text/txt");
header("Content-Disposition: attachment; filename=$b");


$dia_d  =$_REQUEST["dia"];
$mes_d  =$_REQUEST["mes"];
$anio_d  =$_REQUEST["anio"];
$dia_h  =$_REQUEST["dia_h"];
$mes_h  =$_REQUEST["mes_h"];
$anio_h  =$_REQUEST["anio_h"];
$desde = "20".$anio_d."-".$mes_d."-".$dia_d;
$hasta = "20".$anio_h."-".$mes_h."-".$dia_h;
$desde_m = $dia_d."/".$mes_d."/".$anio_d;
$hasta_m = $dia_h."/".$mes_h."/".$anio_h;
$sep = ";";
$enter = "\r\n"; 


include("../../../conexiones/config.inc.php");
 $sql2="select * from detalle where fecha between '$desde' and '$hasta'";
$result20 = $db->Execute($sql2);
if (!$result20) die("fallo".$db->ErrorMsg());
while (!$result20->EOF) {

 $cod_grabacion=$result20->fields["cod_grabacion"];
 $nro_os=$result20->fields["nro_os"];
 $nro_paciente=$result20->fields["nro_paciente"];
 $nro_orden=$result20->fields["nro_orden"];
 $nro_practica=$result20->fields["nro_practica"];
 $marca=$result20->fields["marca"];

 $sql12="select * from ordenes where cod_grabacion = $cod_grabacion";
$result201 = $db->Execute($sql12);

$nro_afiliado=$result201->fields["nro_afiliado"];
$medico=$result201->fields["medico"];
$fecha=$result201->fields["fecha"];
$autorizacion=$result201->fields["autorizacion"];
$nombre_medico=$result201->fields["nombre_medico"];
$autorizacion_ws=$result201->fields["autorizacion_ws"];
$nro_afiliado=$result201->fields["nro_afiliado"];
$matricula=$result201->fields["matricula"];
$cuit_osde=$result201->fields["cuit_osde"];


 $sql12="select * from pacientes where nro_afiliado = $nro_afiliado";
$result201 = $db->Execute($sql12);

$nombre=$result201->fields["nombre"];
$apellido=$result201->fields["apellido"];
$sexo=$result201->fields["sexo"];
$fecha_nacimiento=$result201->fields["fecha_nacimiento"];
$nro_os=$result201->fields["nro_os"];

echo $string3 =  $apellido.$sep.$nombre.$sep.$sexo.$sep.$cod_grabacion.$sep.$nro_os.$sep.$nro_paciente.$sep.$nro_orden.$sep.$nro_afiliado.$sep.$nombre_medico.$sep.$fecha.$sep.$autorizacion.$sep.$autorizacion_ws.$sep.$marca.$sep.$nro_practica.$enter;


$result20->MoveNext();}?>