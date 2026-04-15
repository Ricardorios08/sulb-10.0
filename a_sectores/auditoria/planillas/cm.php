<?php 
include ("../../../conexiones/config.inc.php");
$b = "ORDENES_".$nro_os."_".$desde_m."-".$hasta_m.".ana";
header("Content-type: application/text/txt");
header("Content-Disposition: attachment; filename=$b");
$sql2="select * from deta_planillas_ver where cod_modulo = $planillas order by cod_operacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo1".$db->ErrorMsg());
  while (!$result20->EOF) {

 $nombre_columna=strtoupper($result20->fields["nombre_columna"]);
 $cod_practica=strtoupper($result20->fields["cod_practica"]);
$contame = $contame + 1;


if ($contame == 1){
	$renglon = $cod_practica;
}else{
	$renglon = $renglon." , ".$cod_practica;
}

$result20->MoveNext();
		}


  $renglon;
$sep = ";";
$enter = "\r\n"; 

$desde_m = $dia_d."/".$mes_d."/".$anio_d;
$hasta_m = $dia_h."/".$mes_h."/".$anio_h;
 $sql2="select * from detalle d inner join pacientes p ON d.nro_paciente = p.nro_paciente where nro_practica in ($renglon) and fecha between '$desde' and '$hasta' order by cod_grabacion, nro_practica";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo".$db->ErrorMsg());
  while (!$result20->EOF) {


 $nro_paciente=strtoupper($result20->fields["nro_paciente"]);
$cod_grabacion=strtoupper($result20->fields["cod_grabacion"]);
$nro_practica=strtoupper($result20->fields["nro_practica"]);
$fecha=strtoupper($result20->fields["fecha"]);

$an = substr($fecha,2,2);
$me= substr($fecha,5,2);
$di = substr($fecha,8,2);

$fech = $di."/".$me."/".$an;

$nombre=strtoupper($result20->fields["nombre"]);
$apellido=strtoupper($result20->fields["apellido"]);

$nombre_paciente = $apellido." ".$nombre;


$sql10="select * from deta_planillas_ver where cod_practica = $nro_practica";
$result10 = $db->Execute($sql10);
 $nombre_columna=strtoupper($result10->fields["nombre_columna"]);



$conta = $conta + 1;

echo $renglon_archivo = $cod_grabacion.";N;".$nombre_paciente.";            ;   ; ;".$fech.";00:00:00;OK; 1;".$nombre_columna.";        0;%".$enter;
 

$result20->MoveNext();
		}
 
 