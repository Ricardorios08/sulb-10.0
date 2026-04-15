<?php

include ("../conexiones/config.inc.php");


$sql2="select * from detalle where nro_paciente = 0 order by cod_grabacion, cod_operacion";
$result2 = $db->Execute($sql2);

$nro_orden = 0;

if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {




 $cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);
  $cod_operacion=strtoupper($result2->fields["cod_operacion"]);

$sql4="select * from ordenes where cod_grabacion = $cod_grabacion";
$result4 = $db->Execute($sql4);

$nro_os=strtoupper($result4->fields["nro_os"]);
$nro_paciente=strtoupper($result4->fields["nro_paciente"]);
$periodo=strtoupper($result4->fields["periodo"]);
$marca=strtoupper($result4->fields["marca"]);
$lote=strtoupper($result4->fields["lote"]);
$anio=strtoupper($result4->fields["ano"]);
$nro_afiliado=$result4->fields["nro_afiliado"];
$nro_orden=$result4->fields["nro_orden"];
$autorizacion=strtoupper($result4->fields["autorizacion"]);
$operador=strtoupper($result4->fields["operador"]);
$fecha_grabacion=strtoupper($result4->fields["fecha"]);
$fecha=strtoupper($result4->fields["fecha"]);
$matricula=strtoupper($result4->fields["matricula"]);
$prescriptor=strtoupper($result4->fields["medico"]);
$confirmada=strtoupper($result4->fields["confirmada"]);
$fecha=strtoupper($result4->fields["fecha"]);
 
$sql8="select prioridad,clase from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$prioridad=strtoupper($result8->fields["prioridad"]);
$clase=strtoupper($result8->fields["clase"]);


echo  $sql = "UPDATE detalle SET nro_os = '$nro_os' , nro_paciente = '$nro_paciente' , nro_orden = '$nro_orden' , periodo = '$periodo' , ano = '$anio' ,  clase = '$clase' , fecha = '$fecha' WHERE cod_operacion = $cod_operacion";
// $result = $db->Execute($sql);
echo "<br>";

$result2->MoveNext();

	}


 
 
 
?>


