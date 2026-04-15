<?php
include ("../../conexiones/config.inc.php");

$cod_grabacion=$_POST["cod_grabacion"];
$nro_paciente=$_POST["nro_paciente"];
$nro_os=$_POST["nro_os"];





$cui=$_POST["cuit"];
for ($i=0;$i<count($cui);$i++)    
{     
$cuit = $cui[$i];    
}

 $sql="select * from datos_osde where cuit = $cuit";
 $result5 = $db->Execute($sql);

$nro_laboratorio1=strtoupper($result5->fields["cuenta_abm"]);
$sucursal=strtoupper($result5->fields["sucursal"]);
$prestador=strtoupper($result5->fields["prestador"]);
$cuenta_abm=strtoupper($result5->fields["cuenta_abm"]);
  $cuit_prestador = $cuit;


$sql10="select * from pacientes where nro_paciente = $nro_paciente";
$result10 = $db->Execute($sql10);
$cuit_verificacion11=$result10->fields["cuit_verificacion"];
if (($cuit_verificacion11 == "") or ($cuit_verificacion11 == 0)){

$sql = "UPDATE pacientes SET `cuit_verificacion` = '$cuit'    WHERE `nro_paciente` = $nro_paciente;";
mysql_query($sql);
}



switch ($nro_os){
case "1041":{	include ("osde_ws.php");break;}
case "4723":{	include ("swiss_ws.php");break;}
case "5080":{	include ("sancor_ws.php");break;}
case "5396":{	include ("boreal_ws.php");break;}
case "5073":{	include ("pami.php");break;}
}

