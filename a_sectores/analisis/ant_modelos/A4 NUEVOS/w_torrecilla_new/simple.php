<?php 
//$pdf->AddPage();
//$pdf->Ln();
 
$sql2="select * from detalle join convenio_practica on (detalle.nro_practica = convenio_practica.cod_practica) where detalle.cod_grabacion = $cod_grabacion GROUP BY detalle.nro_practica order by cod_operacion";
$result2 = $db->Execute($sql2);

$clase2=strtoupper($result2->fields["clase"]);

if ($clase2 == 1){$contador = 35;}elseif ($clase2 == 0){$contador = 10;}

if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=strtoupper($result2->fields["nro_os"]);
$nro_paciente=strtoupper($result2->fields["nro_paciente"]);
$periodo=strtoupper($result2->fields["periodo"]);
$marca=strtoupper($result2->fields["marca"]);
$lote=strtoupper($result2->fields["lote"]);
$cod_operacion=strtoupper($result2->fields["cod_operacion"]);
$año=strtoupper($result2->fields["ano"]);
$nro_afiliado=$result2->fields["nro_afiliado"];
$nro_orden=$result2->fields["nro_orden"];
$autorizacion=strtoupper($result2->fields["autorizacion"]);
$operador=strtoupper($result2->fields["operador"]);
$cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);
$fecha_grabacion=strtoupper($result2->fields["fecha_grabacion"]);
$fecha=strtoupper($result2->fields["fecha"]);
$matricula=strtoupper($result2->fields["matricula"]);
$prescriptor=strtoupper($result2->fields["medico"]);
$confirmada=strtoupper($result2->fields["confirmada"]);
$nro_practica=strtoupper($result2->fields["nro_practica"]);
$medico=strtoupper($result2->fields["medico"]);
$clase=strtoupper($result2->fields["clase"]);




switch ($clase){
case "0":{include ("comun.php");break;}
case "1":{include ("complejos.php");break;}
case "2":{include ("modulos.php");break;}
}



$result2->MoveNext();

	}