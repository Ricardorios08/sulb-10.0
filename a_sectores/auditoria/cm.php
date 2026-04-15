<?php 
//include ("../../../conexiones/config.inc.php");
echo $b = "ORDENES_".$nro_os."_".$desde_m."-".$hasta_m.".txt";
//header("Content-type: application/text/txt");
//header("Content-Disposition: attachment; filename=$b");
  echo   $sql2="select * from deta_planillas_ver where cod_modulo = $planillas order by cod_operacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo1".$db->ErrorMsg());
  while (!$result20->EOF) {

 $nombre_columna=strtoupper($result20->fields["nombre_columna"]);
 $cod_practica=strtoupper($result20->fields["cod_practica"]);
$contame = $contame + 1;

 echo $cod_practica; 

$renglon = $nombre_columna.";".$cod_practica;


$result20->MoveNext();
		}



 