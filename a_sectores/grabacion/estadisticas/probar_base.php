<?php 
include ("../../../conexiones/config.inc.php");
$sql2="select nro_os , sigla, denominacion from datos_os";
$result2 = $db_os->Execute($sql2);


//if (!$result2) die("fallo".$db_os->ErrorMsg());
// while (!$result2->EOF) {
$sigla=strtoupper($result2->fields["sigla"]);
$nro_os=strtoupper($result2->fields["nro_os"]);
$denominacion=strtoupper($result2->fields["denominacion"]);


//echo $sql4="select nro_laboratorio from ordenes where nro_os like $nro_os and periodo = 04 and ano = 08 group by nro_laboratorio";
//$result4 = $db_gb->Execute($sql4);

/*if (!$result4) die("fallo".$db_gb->ErrorMsg());
 while (!$result4->EOF) {
*/
//echo $nro_laboratorio=strtoupper($result4->fields["nro_laboratorio"]);

/*$result4->MoveNext(); 
 }
*/
/*
echo $sql6="SELECT * FROM `datos_laboratorio`";
$result6 = $db_bq->Execute($sql6);
echo "--".$nombre_laboratorio=strtoupper($result6->fields["nombre_laboratorio"]);
echo "<br>";
*/
//$result2->MoveNext(); 

// }

$fecha  = time();
echo date("h:i:s",$fecha); 
?>
