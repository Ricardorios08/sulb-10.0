<?php
require ("../../../drivers/fpdf/fpdf.php");
include ("../../../conexiones/config.inc.php");

$anio= $_REQUEST['anio'];
$periodo= $_REQUEST['periodo'];
$nro_liquidacion= $_REQUEST['nro_liquidacion'];


$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",25);

$renglon1 = "LIQUIDACION: ".$nro_liquidacion;
$renglon2 = "PRACTICAS FACTURADAS DEL ".$periodo." - ".$anio;

$pdf->Cell(200,35,"",0,5,'C');
$pdf->Cell(200,35,"",0,5,'C');
$pdf->Cell(200,6,$renglon1,0,5,'C');
$pdf->Cell(200,35,"",0,5,'C');
$pdf->Cell(200,6,$renglon2,0,5,'C');

$band = 1;
$tasa_iva = 10.5;

$anio1 = $anio;

$sql2 = "SELECT * FROM `liquidacion` WHERE  `anio` like '$anio' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion and operacion like '100' and nro_liquidacion between '1' and '100' group by nro_laboratorio";
$result2 = $db_liq->Execute($sql2);





if (!$result2) die("fallo".$db_liq->ErrorMsg());
  while (!$result2->EOF) {


$nro_laboratorio=strtoupper($result2->fields["nro_laboratorio"]); //1580


$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;

$pdf->AddPage();


$renglon2 = "NRO LIQUDIACION ".$nro_liquidacion." / ". $periodo." - ".$anio;

$pdf->Cell(200,35,"",0,5,'C');
$pdf->Cell(200,35,"",0,5,'C');
$pdf->Cell(200,6,$nombre_laboratorio,0,5,'C');
$pdf->Cell(200,35,"",0,5,'C');
$pdf->Cell(200,6,$renglon2,0,5,'C');

////

$result2->MoveNext();
	}


$pdf->Output();
