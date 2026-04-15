<?php

 require("../../../drivers/fpdf/fpdf.php");
include ("../../../conexiones/config.inc.php");



$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",25);

$renglon1 = "ASOCIACION BIOQUIMICA DE MENDOZA";
$renglon2 = "PLANILLA TOTAL DE EXENTOS Y GRAVADOS CON IVA";

$pdf->SetFont("Arial","",9);


$sep = ";";




$band_deb = 1;
$band_acred = 1;

$band = 1;
$bande = 1;
$bande1 = 1;
$bande2=1;
$banderin = 1;
$parcial_a = "";
$total_excedente ="";
$importe = "";


$tot_ex = "";
$total_iva = "";
$total_a_cuenta = "";



if ($base == 10){
include ("../../../conexiones/config.inc.php");
}



$liquidacion = "liquidacion";


$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);

	
$sql6 = "SELECT * FROM `afip` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result6 = $db_bq->Execute($sql6);
$sit_iva=ucwords($result6->fields["sit_iva"]);


$emp = "ASOCIACION BIOQUIMICA DE MENDOZA";
$tit = "PLANILLA TOTAL DE EXENTOS Y GRAVADOS CON IVA";

$lab = $nombre_laboratorio." (".$nro_laboratorio.")";
$lab1 = "Período: (".$periodo_liq." - 20".$anio_liquidacion_liq.")";

$pdf->Cell(200,4,$emp." / ".$tit,0,5,'C');
 
$pdf->ln();
$pdf->Cell(200,4,$lab." - ".$lab1,0,5,'C');

$pdf->ln();






 

if ($sit_iva == "1"){
$pdf->Cell(30,5,'O. Social',1,0,'C'); 
$pdf->Cell(17,5,'Liq',1,0,'C'); 
$pdf->Cell(17,5,'%',1,0,'C'); 
$pdf->Cell(17,5,"Pago",1,0,'C'); 
$pdf->Cell(17,5,"Factura",1,0,'C'); 
$pdf->Cell(17,5,"Fec. Fact",1,0,'C'); 
$pdf->Cell(17,5,"Exento",1,0,'C'); 
$pdf->Cell(17,5,"Gravado",1,0,'C'); 
$pdf->Cell(17,5,"IVA",1,0,'C'); 
$pdf->Cell(17,5,'Importe',1,0,'C');
$pdf->ln();
}else{
 

$pdf->Cell(30,5,'O. Social',1,0,'C'); 
$pdf->Cell(17,5,'Liq',1,0,'C'); 
$pdf->Cell(17,5,'%',1,0,'C'); 

$pdf->Cell(17,5,"Pago",1,0,'C'); 
$pdf->Cell(17,5,"Factura",1,0,'C'); 
$pdf->Cell(17,5,"Fec. Fact",1,0,'C'); 
$pdf->Cell(17,5,"",1,0,'C'); 
$pdf->Cell(17,5,"Imp. Original",1,0,'C'); 
$pdf->Cell(17,5,"IVA",1,0,'C'); 
$pdf->Cell(17,5,'Importe',1,0,'C');
$pdf->ln();


}
 $sql2 = "SELECT * FROM $liquidacion WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion_liq' and periodo like '$periodo_liq' and operacion = 200";
// order by nro_laboratorio, nro_liquidacion, nro_factura, operacion ";

$result2 = $db_liq->Execute($sql2);



//trae las matriculas......................................................
if (!$result2) die("fallo".$db_liq->ErrorMsg());
  while (!$result2->EOF) {

$operacion=strtoupper($result2->fields["operacion"]); //1580
$importe=strtoupper($result2->fields["importe"]); //1580
$nro_factura=strtoupper($result2->fields["nro_factura"]); //1580
$motivo=strtoupper($result2->fields["motivo"]); //1580
$cod_operacion= $result2->fields["cod_operacion"];
$ajuste= $result2->fields["motivo"];
$tipo_ajuste= $result2->fields["tipo_pago"];
$nro_os=$result2->fields["nro_os"];
$tipo_pago=$result2->fields["tipo_pago"];
$acumulado_mensual=$result2->fields["acumulado_mensual"];

$fecha=$result2->fields["fecha"];
$porcentaje=$result2->fields["porcentaje"];
$bruto=$result2->fields["bruto"];
$transaccion =$result2->fields["tipo_pago"];
$fecha_movimiento=$result2->fields["fecha_movimiento"];

$importe_original=$result2->fields["importe"];
$dto_liq=$result2->fields["bruto"];
$pago_caja=$result2->fields["acumulado_mensual"];

$nro_liquidacion=$result2->fields["nro_liquidacion"];
$periodo_liquidacion=$result2->fields["periodo"];
$anio_liquidacion=$result2->fields["anio"];


$saldo_deuda=$result2->fields["saldo_deuda"];
$importe_liq=$result2->fields["importe"];
$nro_factu=strtoupper($result2->fields["nro_factura"]); //1580

$dia_1 = substr($fecha,8,2);
$mes_2 = substr($fecha,5,2);
$anio_3 = substr($fecha,0,4);
 $fecha = $dia_1."-".$mes_2."-".$anio_3;

$dia_6 = substr($fecha_movimiento,8,2);
$mes_6 = substr($fecha_movimiento,5,2);
$anio_6 = substr($fecha_movimiento,0,4);
$fecha_movimiento = $dia_6."-".$mes_6."-".$anio_6;





$ex_capita = "";
$a_cuenta = "";

$sql1="select * from factura where nro_factura = '$nro_factura' and nro_os = $nro_os"; //4
$result1 = $db_fa->Execute($sql1);

$nro_os=strtoupper($result1->fields["nro_os"]); // 2617
$fecha_pago_fact=strtoupper($result1->fields["fecha_pago_fact"]); // 2617
$fecha_original=strtoupper($result1->fields["fecha"]); // 2617

$dia2 = substr($fecha_original,8,2);
$mes2 = substr($fecha_original,5,2);
$anio2 = substr($fecha_original,0,4);
$fecha_original_fact = $dia2."-".$mes2."-".$anio2;


$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;



if ($fecha_pago_fact == "-/0-00/0"){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}
elseif ($fecha_pago_fact == "--"){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}
elseif ($fecha_pago_fact == ""){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";

$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}



$sql123="select *  from composicion where nro_os like '$nro_os' and nro_factura = $nro_factura and nro_laboratorio = $nro_laboratorio";
$result123 = $db_liq->Execute($sql123);

$iva=$result123->fields["iva"];
$neto_gravado=$result123->fields["neto_gravado"];


if ($sit_iva == 1){
$exento=$result123->fields["exento"];
}else
	  {
$exento=$result123->fields["exento"];
	  }

$tipo_iva=$result123->fields["tipo_iva"];

if ($iva > 0) {
$marca = "*";
}else{
$marca = "";
}

/*echo "<br>";
echo "**** ".$bruto_iva = $bruto_iva + $iva;
echo " orig ".$importe_original;
echo "<br>";
*/

if ($importe_original != 0){

if ($importe_original != $bruto_iva){

$porcentaje = $bruto * 100 / $importe_original;

$iva_porc = round(($iva * $porcentaje / 100),2);
$iva_porc1 = round(($iva * $porcentaje / 100),2);
$neto_porc = round(($neto_gravado * $porcentaje / 100),2);
$exento_porc = round(($exento * $porcentaje / 100),2);
}else{
$iva_porc = round(($iva * $porcentaje / 100),2);
$neto_porc = round(($neto_gravado * $porcentaje / 100),2);
$exento_porc = round(($exento * $porcentaje / 100),2);
}


}

if ($sit_iva == 1){
$iva_porc = $iva_porc;
}else{
$iva_porc = $iva;
$porcentaje = 100;

}


if (($iva > 0.00) and ($neto_gravado == 0.00) and ($exento == 0.00)){
	$exento = $importe;
	}





if ($marca == "*"){
/*$total_iva = $total_iva + $iva;
$total_neto_gravado = $total_neto_gravado + $neto_gravado;
$total_exento = $total_exento + $exento;

$total_iva = ($total_iva * $porcentaje / 100);
$total_neto_gravado = ($total_neto_gravado * $porcentaje / 100);
$total_exento = ($total_exento * $porcentaje / 100);*/
}



$sql12="select * from datos_os where nro_os like '$nro_os'";
$result12 = $db_os->Execute($sql12);
$sigla=strtoupper($result12->fields["sigla"]);
$sigla = substr($sigla,0,7);

if ($tipo_pago != "PARCIAL A CUENTA"){
$ex_capita = $importe - $bruto;
}

if ($tipo_pago == "PARCIAL A CUENTA"){
$tipo_pago = "PARC.A/CTA";
$parcial_a = $importe - $bruto;
$a_cuenta = $importe - $bruto;
$ex_capita = "";
$total_a_cuenta = $total_a_cuenta + $a_cuenta;
}

if (($tipo_pago == "COMPLETA") AND (($bruto + $iva) < $importe)){
$ex_capita = "";
$a_cuenta = $importe - $bruto;
$total_a_cuenta = $total_a_cuenta + $a_cuenta;
}


if ($marca == "*"){
$total_ng = $total_ng + $neto_porc;
$total_exe = $total_exe + $exento_porc;
$total_iva = $total_iva + $iva_porc;
$total_total = $total_total + $bruto;
}else{
$total_ng1 = $total_ng1 + $neto_porc;
$total_exe1 = $total_exe1 + $exento_porc;
$total_iva1= $total_iva1 + $iva_porc;
$total_total1 = $total_total1 + $bruto;
}



if ($iva_porc == 0.00){
$iva_porc = "-";
}else{
$iva_porc = number_format($iva_porc,2);
}


if ($sit_iva == "1"){



$ob = $sigla." (".$nro_os.")";
$li = $nro_liquidacion." - ".$periodo_liquidacion."/".$anio_liquidacion;
$nro_f = $nro_factura." - ".$marca;
$exe = number_format($exento_porc,2);
$net = number_format($neto_porc,2);
$bru = number_format($bruto,2);
 


$pdf->Cell(30,5,$ob,0,0,'L'); 
$pdf->Cell(17,5,$li,0,0,'C'); 
$pdf->Cell(17,5,$por,0,0,'C'); 

$pdf->Cell(17,5,"COMPLETA",0,0,'C'); 
$pdf->Cell(17,5,$nro_f,0,0,'R'); 
$pdf->Cell(17,5,$fecha_original_fact,0,0,'C'); 
$pdf->Cell(17,5,$exe,0,0,'R'); 
$pdf->Cell(17,5,$neto,0,0,'R'); 
$pdf->Cell(17,5,$iva_porc,0,0,'R'); 
$pdf->Cell(17,5,$bruto,0,0,'R');
$pdf->ln();



}else{


	$ob = $sigla." (".$nro_os.")";
$li = $nro_liquidacion." - ".$periodo_liquidacion."/".$anio_liquidacion;
$nro_f = $nro_factura." - ".$marca;
$exe = number_format($exento_porc,2);
$net = number_format($importe_original,2);
$bru = number_format($bruto,2);
 


$pdf->Cell(30,5,$ob,0,0,'C'); 
$pdf->Cell(17,5,$li,0,0,'C'); 
$pdf->Cell(17,5,$por,0,0,'C'); 

$pdf->Cell(17,5,"COMPLETA",0,0,'R'); 
$pdf->Cell(17,5,$nro_f,0,0,'R'); 
$pdf->Cell(17,5,$fecha_original_fact,0,0,'R'); 
$pdf->Cell(17,5,$exe,0,0,'R'); 
$pdf->Cell(17,5,$neto,0,0,'R'); 
$pdf->Cell(17,5,$iva_porc,0,0,'R'); 
$pdf->Cell(17,5,$bruto,0,0,'R');
$pdf->ln();

 

}


//}

$result2->MoveNext();
  }

$ng = $ng + $total_ng + $total_ng1;
$ex = $ex + $total_exe + $total_total1;
$iv = $iv + $total_iva + $total_iva1;
$to = $to + $total_total + $total_total1;

$total_facA = $total_ng + $total_iva;

$to_exentoA = $total_exe + $total_exe1;
 


if ($sit_iva == 1){
$pdf->SetX(100);
$pdf->Cell(25,5,'',0,0,'C'); 
$pdf->Cell(17,5,$total_exe,1,0,'R'); 
$pdf->Cell(17,5,$total_ng,1,0,'R'); 
$pdf->Cell(17,5,$total_iva,1,0,'R'); 
$pdf->Cell(17,5,$total_total,1,0,'R'); 

$pdf->ln();
$pdf->SetX(100);
$pdf->Cell(25,5,'',0,0,'R'); 
$pdf->Cell(17,5,$total_total1,1,0,'R'); 
$pdf->Cell(17,5,'',1,0,'R'); 
$pdf->Cell(17,5,'',1,0,'R'); 
$pdf->Cell(17,5,$total_total1,1,0,'R');
$pdf->ln();
}

if ($sit_iva == 1){
$pdf->SetX(100);
$pdf->Cell(25,5,'SUBTOTAL',0,0,'C'); 
$pdf->Cell(17,5,$ex,1,0,'R'); 
$pdf->Cell(17,5,$ng,1,0,'R'); 
$pdf->Cell(17,5,$iv,1,0,'R'); 
$pdf->Cell(17,5,$to,1,0,'R'); 

}
 
  $sql5 = "SELECT sum(importe) as debitos FROM $liquidacion WHERE  (`nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion_liq' and periodo like '$periodo_liq' and operacion = 400 and tipo_pago = 'AJ_NEGATIVO') or ( `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo_liq' and operacion = 600 and tipo_pago = 'AJ_NEGATIVO') ";
$result5 = $db_liq->Execute($sql5);

$debitos=$result5->fields["debitos"];

$sql5 = "SELECT sum(importe) as creditos FROM $liquidacion WHERE  (`nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion_liq' and periodo like '$periodo_liq' and operacion = 400 and tipo_pago = 'AJ_POSITIVO') or ( `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion_liq' and periodo like '$periodo_liq' and operacion = 600 and tipo_pago = 'AJ_POSITIVO') ";
$result5 = $db_liq->Execute($sql5);

$creditos=$result5->fields["creditos"];

$tot_mes = $to - $debitos + $creditos;

 
$pdf->ln();
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(126,5,'- DEBITOS REALIZADOS POR OBRA SOCIAL',1,0,'R'); 
 
$pdf->SetX(176);
$pdf->Cell(17,5,$debitos,1,0,'R'); 
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(126,5,'+ CREDITOS REALIZADOS POR OBRA SOCIAL',1,0,'R'); 
 
$pdf->SetX(176);
$pdf->Cell(17,5,$creditos,1,0,'R'); 
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(126,5,'TOTAL MES',1,0,'R'); 
 
$pdf->SetX(176);
$pdf->Cell(17,5,$tot_mes,1,0,'R');

$pdf->ln();
$leyenda = "*** El detalle de los débitos y/o créditos se encuentran en las liquidaciones correspondientes de cada período ***";
$pdf->ln();

$pdf->Cell(17,5,$leyenda,0,0,'c');
$pdf->ln();

$pdf->ln();
$pdf->Cell(115,5,'DETALLE A FACTURAR',1,0,'C'); 
$pdf->Cell(17,5,'GRAVADO',1,0,'C'); 
$pdf->Cell(17,5,'IVA',1,0,'C'); 
$pdf->Cell(17,5,'EXENTO',1,0,'C'); 
$pdf->Cell(17,5,'TOTAL',1,0,'C');



 switch ($sit_iva){
	 case "1":{


		 $total_exento_a = $to - $total_iva - $total_ng - $debitos + $creditos;

 

$pdf->ln();
$pdf->Cell(115,5,'Serv. Afiliados Voluntarios',0,0,'C'); 
$pdf->Cell(17,5,$total_ng,0,0,'R'); 
$pdf->Cell(17,5,$total_exento_a,0,0,'R');
$pdf->Cell(17,5,$total_iva,0,0,'R');
$pdf->Cell(17,5,$tot_mes,0,0,'R');

   
	 break;
	 }

case "3":{


$tot = $to - $debitos + $creditos;
 

$pdf->ln();
$pdf->Cell(115,5,'Serv. Prestados',0,0,'C'); 
$pdf->Cell(17,5,'',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R');
$pdf->Cell(17,5,'',0,0,'R');
$pdf->Cell(17,5,$tot,0,0,'R');


 
 
}

 }

$total_ng = "";
$total_exe = "";
$total_iva = "";
$total_total = "";

$total_ng1 = "";
$total_exe1 = "";
$total_iva1 = "";
$total_total1 = "";

$ng = "";
$ex = "";
$iv = "";
$to = "";


 



$pdf->ln();
$pdf->ln();

$tit = "RESUMEN DEL IMPORTE BRUTO LIQUIDACIONES";
$pdf->Cell(200,4,$tit,0,5,'C');


$anio_liquidacion_anterior = $anio_liquidacion - 1;
$periodo = $periodo + 1;

if ($periodo == 13){$periodo = "01";
$anio_liquidacion_anterior = $anio_liquidacion;


}


$tipo= $_REQUEST['tipo'];


$periodo = str_pad("$periodo", 2, '0', STR_PAD);
$desde = "01-".$periodo."-20".$anio_liquidacion_anterior;
$hasta=  "01-".$periodo."-20".$anio_liquidacion;



$dia = substr($desde,0,2);
$mes_inicial= substr($desde,3,2);
$mes_empezar = $mes_inicial;
$anio_inicial = substr($desde,6,4);
$anio = substr($desde,8,2);
$anio_ini = substr($desde,8,2);

$fecha_desde = $anio_inicial."-".$mes_inicial."-".$dia;

$dia = substr($hasta,0,2);
$mes_final= substr($hasta,3,2);
$anio_final = substr($hasta,6,4);

$fecha_hasta = $anio_final."-".$mes_final."-".$dia;



$uno = $mes_inicial;
if ($uno == 13){$uno = 1;echo $anio = $anio + 1;}
$pdf->Cell(15,5,$uno."/".$anio,1,0,'C');
$dos = $uno + 1;

if ($dos == 13){$dos = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$dos."/".$anio,1,0,'C');
$tres = $dos+ 1;

if ($tres== 13){$tres= 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$tres."/".$anio,1,0,'C');
$cuatro = $tres+ 1;

if ($cuatro == 13){$cuatro = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$cuatro."/".$anio,1,0,'C');
$cinco = $cuatro + 1;

if ($cinco== 13){$cinco = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$cinco."/".$anio,1,0,'C');
$seis = $cinco + 1;

if ($seis == 13){$seis = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$seis."/".$anio,1,0,'C');
$siete = $seis + 1;
if ($siete == 13){$siete = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$siete."/".$anio,1,0,'C');
$ocho = $siete+ 1;

if ($ocho == 13){$ocho = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$ocho."/".$anio,1,0,'C');
$nueve = $ocho + 1;

if ($nueve == 13){$nueve = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$nueve."/".$anio,1,0,'C');
$diez = $nueve+ 1;

if ($diez == 13){$diez = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$diez."/".$anio,1,0,'C');
$once= $diez+ 1;

if ($once == 13){$once = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$once."/".$anio,1,0,'C');
$doce = $once+ 1;

if ($doce == 13){$doce = 1;$anio = $anio + 1;}
$pdf->Cell(15,5,$doce."/".$anio,1,0,'C');





$sql="select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db_bq->Execute($sql);
$nombre_laboratorio=strtoupper($result1->fields["nombre_laboratorio"]);
$nombre_laboratorio =substr($nombre_laboratorio,0,22);


$uno = $mes_inicial;

if ($uno == 13){$uno = 1; $anio_1 = $anio_ini + 1;}else{$anio_1 = $anio_ini;}


$dos = $uno + 1;
if ($dos == 13){$dos = 1;$anio_2 = $anio_ini + 1;}else{$anio_2 = $anio_1;}


$tres = $dos+ 1;
if ($tres== 13){$tres= 1;$anio_3 = $anio_ini + 1;}else{$anio_3 = $anio_2;}


$cuatro = $tres+ 1;
if ($cuatro == 13){$cuatro = 1;$anio_4 = $anio_ini + 1;}else{$anio_4 = $anio_3;}


$cinco = $cuatro + 1;
if ($cinco== 13){$cinco = 1;$anio_5 = $anio_ini + 1;}else{$anio_5 = $anio_4;}

$seis = $cinco + 1;

if ($seis == 13){$seis = 1;$anio_6 = $anio_ini + 1;}else{$anio_6 = $anio_5;}


$siete = $seis + 1;
if ($siete == 13){$siete = 1;$anio_7 = $anio_ini + 1;}else{$anio_7 = $anio_6;}


$ocho = $siete+ 1;
if ($ocho == 13){$ocho = 1;$anio_8 = $anio_ini + 1;}else{$anio_8 = $anio_7;}


$nueve = $ocho + 1;
if ($nueve == 13){$nueve = 1;$anio_9 = $anio_ini + 1;}else{$anio_9 = $anio_8;}


$diez = $nueve+ 1;
if ($diez == 13){$diez = 1;$anio_10 = $anio_ini + 1;}else{$anio_10 = $anio_9;}


$once= $diez+ 1;
if ($once == 13){$once = 1;$anio_11 = $anio_ini + 1;}else{$anio_11 = $anio_10;}

$doce = $once+ 1;
if ($doce == 13){$doce = 1;$anio_12 = $anio_ini + 1;}else{$anio_12 = $anio_11;}



$sql10 = "SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $uno AND anio = $anio_1 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $dos AND anio = $anio_2 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $tres AND anio = $anio_3 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $cuatro AND anio = $anio_4 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $cinco AND anio = $anio_5 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $seis AND anio = $anio_6 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $siete AND anio = $anio_7 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $ocho AND anio = $anio_8 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $nueve AND anio = $anio_9 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $diez AND anio = $anio_10 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $once AND anio = $anio_11 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $doce AND anio = $anio_12 AND operacion = 800 AND motivo = 10";


$result10 = $db_liq->Execute($sql10);

$pdf->ln();

if (!$result10) die("fallo".$db_liq->ErrorMsg());
  while (!$result10->EOF) {

$importe=$result10->fields["uno"];

$total_bioq = $total_bioq + $importe;

if ($importe > 0){

 
	$pdf->Cell(15,5,$importe,1,0,'C');


}
else
	  {
	$pdf->Cell(15,5,'',1,0,'C');
	  }
$result10->MoveNext(); //mueve registro matricula
 
 }


$tot = $total_bioq;


$pdf->ln();

$pdf->ln();

 

$leyenda = "TOTAL ACUMULADO DURANTE LOS ULTIMOS 12 MESES";
$pdf->Cell(200,4,$leyenda." $".$total_bioq,0,5,'C');




 $pdf->ln();
 $pdf->ln();

IF ($sit_iva == 3){
if (($tot > 120000) and ($tot < 200000)){
$leyenda = "DEBE REALIZAR FACTURA ELECTRONICA";
$pdf->Cell(200,4,$leyenda,0,5,'C');
}elseif($tot < 120000){
$leyenda ='DEBE REALIZAR FACTURA "C" O RECIBO "C"';
$pdf->Cell(200,4,$leyenda,0,5,'C');
}elseif($tot > 200000){
$leyenda ='DEBE REALIZAR FACTURA "C" O RECIBO "C"';
$pdf->Cell(200,4,$leyenda,0,5,'C');
$leyenda ="HA SUPERADO EL MAXIMO ($200000) DE MONOTRIBUTISTA. REVISE SU SITUACION AFIP";
$pdf->Cell(200,4,$leyenda,0,5,'C');
}
}

IF ($sit_iva == 1){
$leyenda ='DEBE REALIZAR FACTURA "A" O RECIBO "A"';
$pdf->Cell(200,4,$leyenda,0,5,'C');
}


$importe= "";
$total_bioq = "";
$uno= "";
$dos= "";
$tres= "";
$cuatro= "";
$cinco= "";
$seis= "";
$siete= "";
$ocho= "";
$nueve= "";
$diez= "";
$once= "";
$doce= "";
$tot = "";
$to= "";
$debitos= "";
$creditos= "";
$exento_porc= "";
$neto_porc= "";
$iva_porc= "";
$bruto= "";
$ng= "";
$total_ng= "";
$total_ng1= "";
$ex= "";
$total_exe= "";
$total_exe1= "";
$iv= "";
$total_iva= "";
$total_iva1 = "";
$total_total = "";
$total_total1= "";
$total_facA = "";
$total_ng = "";
$total_iva = "";
$to_exentoA = "";
$total_exe = "";
$total_exe1= ""; 
$total_exe= "";
$total_iva= "";
$total_total= "";
$total_exe1= "";
$total_total1= "";
$ex= "";
$ng= "";
$iv= "";
$ex_capita = "";
$importe= "";
$parcial_a = "";
$importe = "";
$bruto = "";
$a_cuenta = "";
$total_a_cuenta = "";
$neto_porc = "";
$exento_porc = "";
$iva_porc = "";
$bruto_iva= "";

$periodo = $periodo - 1;
$desde = "01-".$periodo."-20".$anio_liquidacion_anterior;
$hasta=  "01-".$periodo."-20".$anio_liquidacion;


 

 	$pdf->Output();
