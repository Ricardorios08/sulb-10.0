<?php 


 require("../../../drivers/fpdf/fpdf.php");
include ("../../../conexiones/config.inc.php");



$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",25);

$renglon1 = "ASOCIACION BIOQUIMICA DE MENDOZA";
$renglon2 = "PLANILLA TOTAL DE EXENTOS Y GRAVADOS CON IVA";

$pdf->SetFont("Arial","",9);



$liquidacion = "liquidacion";



$liquidacion = "liquidacion";
SWITCH ($radiobutton){
case "1":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '1' and '300' group by nro_laboratorio";
break;
}
case "2":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '301' and '600' group by nro_laboratorio";
break;
}
case "3":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '601' and '900' group by nro_laboratorio";
break;
}
case "4":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '901' and '7999' group by nro_laboratorio";
break;
}
case "5":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '8000' and '10000' group by nro_laboratorio";
break;
}

}



$result20 = $db_liq->Execute($sql20);

if (!$result20) die("fallo44".$db_liq->ErrorMsg());
  while (!$result20->EOF) {

include ("borrar_va.php");
$pasada = 1;

$nro_lab = $nro_laboratorio;
$nro_laboratorio=strtoupper($result20->fields["nro_laboratorio"]); 
$nro_liquidacion=strtoupper($result20->fields["nro_liquidacion"]);



include ("buscar_liquidacion_iva_pdf.php");
$pdf->AddPage();


  $result20->MoveNext();


	}


	$pdf->Output();
?>
