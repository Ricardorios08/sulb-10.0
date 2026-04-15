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

 $cuit_prestador = $cuit;

include ("osde_ws.php");
