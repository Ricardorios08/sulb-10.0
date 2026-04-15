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

$sql2 = "SELECT * FROM `liquidacion` WHERE  `anio` like '$anio' and periodo like '$periodo' and operacion like '100' group by nro_laboratorio";
$result2 = $db_liq->Execute($sql2);





if (!$result2) die("fallo".$db_liq->ErrorMsg());
  while (!$result2->EOF) {


$nro_laboratorio=strtoupper($result2->fields["nro_laboratorio"]); //1580


$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;



////

$result->MoveNext();
	}

exit;

  if (!$result100) die("fallo".$db_mg->ErrorMsg());
  while (!$result100->EOF) {

$renglon = $renglon + 10;
$columna = 10;
$nro_pagina = 1;
$cuenta=strtoupper($result100->fields["cuenta"]);
$tipo_cuenta=strtoupper($result100->fields["tipo_cuenta"]);
$fecha_facturacion = $result100->fields["fecha_factura"];

$dia = substr($fecha_facturacion,8,2);
$mes= substr($fecha_facturacion,5,2);
$anio = substr($fecha_facturacion,0,4);
$fecha_facturacion = $dia."/".$mes."/".$anio;

$nro_factura = $result100->fields["nro_factura"];
$total_original= $result100->fields["total_original"];


if ($tipo_cuenta == '2'){
 $sql3="select * from clientes where cuenta like '$cuenta'";
$result3 = $db_pro->Execute($sql3);
$denominacion=strtoupper($result3->fields["denominacion"]);
}elseif ($tipo_cuenta == "1"){
$sql4="select * from datos_laboratorio where nro_laboratorio like '$cuenta'";
$result4=$db_bq->Execute($sql4);
$denominacion=strtoupper($result4->fields["nombre_laboratorio"]);
}

if ($denominacion == ""){	$denominacion = "INEXISTENTE EN BASE DE DATOS";}
$pdf->AddPage();
$renglon1 = "Lab. ".$cuenta." - ".$denominacion;
$renglon2 = "Fecha Facturación: ".$fecha_facturacion." Nº Factura: ".$nro_factura." - Total Factura $ ".$total_original." Pag. ".$nro_pagina;




$renglon3 = "Noambre Practica";
$renglon41 = "Cantidad";
$renglon5 = "Laboratorio Deriv.";
$renglon6 = "Total";
$renglon7 = "Nº Muestra - Dia - IVA";

$pdf->Cell(150,6,$renglon1,0,5,'C');
$pdf->Cell(150,6,$renglon2,0,5,'C');

$pdf->SetFont("Arial","B",10);
$pdf->Cell(70,6,$renglon3,0);
$pdf->Cell(20,6,$renglon4,0);
$pdf->Cell(20,6,$renglon5,0);
$pdf->Cell(16);
$pdf->Cell(20,6,$renglon6,0);
$pdf->Multicell(40,6,$renglon7,0,5,'C');


$sql = "SELECT * FROM practicas_facturadas	WHERE nro_factura = $nro_factura and cuenta = $cuenta order by nro_muestra, cod_practica, fecha";
$result = $db_mg->Execute($sql);


  if (!$result) die("fallo".$db_mg->ErrorMsg());
  while (!$result->EOF) {


$contador = $contador + 1;

if ($contador == 49){
$nro_pagina = $nro_pagina + 1;
$contador = 0;
$pdf->AddPage();
$renglon1 = "Lab. ".$cuenta." - ".$denominacion;
$renglon2 = "Fecha Facturación: ".$fecha_facturacion." Nº Factura: ".$nro_factura." - Total Factura $ ".$total_original." Pag. ".$nro_pagina;



$renglon3 = "Nombre Practica";
$renglon41 = "Cantidad";
$renglon5 = "Laboratorio Deriv.";
$renglon6 = "Total";
$renglon7 = "Nº Muestra - Dia - IVA";

$pdf->Cell(150,6,$renglon1,0,5,'C');
$pdf->Cell(150,6,$renglon2,0,5,'C');

$pdf->SetFont("Arial","B",10);
$pdf->Cell(70,6,$renglon3,0);
$pdf->Cell(20,6,$renglon4,0);
$pdf->Cell(20,6,$renglon5,0);
$pdf->Cell(16);
$pdf->Cell(20,6,$renglon6,0);
$pdf->Multicell(40,6,$renglon7,0,5,'C');
}



$fecha=strtoupper($result->fields["fecha"]);
$fecha_guardar = $fecha;
$dia = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio= substr($fecha,0,4);
$fecha = $dia."-".$mes."-".$anio;

$cod_practica=strtoupper($result->fields["cod_practica"]);

$laboratorio_derivacion=strtoupper($result->fields["laboratorio_derivacion"]);
$codigo_iva=strtoupper($result->fields["codigo_iva"]);

if ($codigo_iva == 1){
$codigo_iva=" *";}else{
	$codigo_iva = "";
}

if ($laboratorio_derivacion == 0){
	$laboratorio_derivacion = "";
}


$nro_muestra=strtoupper($result->fields["nro_muestra"]);
$sector=strtoupper($result->fields["sector"]);
$derivacion=strtoupper($result->fields["derivacion"]);
$estado=strtoupper($result->fields["estado"]);
$precio=$result->fields["valor_practica"];
$precio_mostrar=$result->fields["valor_practica"];

 $sql6 = "SELECT * FROM precio_derivaciones WHERE  `cod_practica` = '$cod_practica' and laboratorio_realizacion = '$laboratorio_derivacion'";
$result6 = $db_mg->Execute($sql6);
$descripcion=$result6->fields["descripcion"];

$nro_muestra = $nro_muestra." - ".$fecha.$codigo_iva;
$pdf->SetFont("Arial","",9);
$pdf->Cell(10,5,$cod_practica,0);
$pdf->Cell(100,5,$descripcion,0);
$pdf->Cell(20,5,$laboratorio_derivacion,0);
$pdf->Cell(20,5,$precio_mostrar,0);
$pdf->Multicell(40,5,$nro_muestra,0,5,'C');

	$result->MoveNext();


	}



$result100->MoveNext();
	}



$pdf->Output();
?>

