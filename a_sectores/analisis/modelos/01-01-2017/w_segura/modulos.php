<?php 
 


  $sql2="select * from detalle where cod_grabacion = $cod_grabacion and clase = 2 order by cod_operacion";
$result5 = $db->Execute($sql2);


 $sql2="select * from detalle join convenio_practica on (detalle.nro_practica = convenio_practica.cod_practica) where detalle.cod_grabacion = $cod_grabacion and convenio_practica.clase = 2 order by cod_operacion";
$result5 = $db->Execute($sql2);



if (!$result5) die("fallo".$db->ErrorMsg());
 while (!$result5->EOF) {


$nro_os=strtoupper($result5->fields["nro_os"]);
$nro_paciente=strtoupper($result5->fields["nro_paciente"]);
$periodo=strtoupper($result5->fields["periodo"]);
$marca=strtoupper($result5->fields["marca"]);
$lote=strtoupper($result5->fields["lote"]);
$cod_operacion=strtoupper($result5->fields["cod_operacion"]);
$año=strtoupper($result5->fields["ano"]);
$nro_afiliado=$result5->fields["nro_afiliado"];
$nro_orden=$result5->fields["nro_orden"];
$autorizacion=strtoupper($result5->fields["autorizacion"]);
$operador=strtoupper($result5->fields["operador"]);
$cod_grabacion=strtoupper($result5->fields["cod_grabacion"]);
$fecha_grabacion=strtoupper($result5->fields["fecha_grabacion"]);
$fecha=strtoupper($result5->fields["fecha"]);
$matricula=strtoupper($result5->fields["matricula"]);
$prescriptor=strtoupper($result5->fields["medico"]);
$confirmada=strtoupper($result5->fields["confirmada"]);
$nro_practica=strtoupper($result5->fields["nro_practica"]);
$medico=strtoupper($result5->fields["medico"]);


$conta_comun = $conta_comun + 1;



IF (($conta_comun == 1) or ($conta_comun == 0)){
//$pdf->AddPage();
//include ("enca_pdf.php");

//$pdf->ln();
$pdf->SetX(10);

}


//$pdf->Cell(50,5,'conta: '.$conta_comun);

$sql="select * from convenio_practica where cod_practica = $nro_practica";
$result = $db->Execute($sql);
$nombre_practica=$result->fields["practica"];

$pdf->SetFont($letra,'BI',11);

//$pdf->Cell(100,5,$nombre_practica);
//$pdf->ln(); // conta 1

//$contador = $contador + 1;
//$contador = $contador + 1;
$pdf->SetFont($letra,'',10);




 $sql10="select * from detalle_modulo where cod_grabacion = $cod_grabacion";
$result10 = $db->Execute($sql10);


$res1=$result10->fields["modulo1"];
$res2=$result10->fields["modulo2"];
$res3=$result10->fields["modulo3"];
$res4=$result10->fields["modulo4"];
$res5=$result10->fields["modulo5"];
$res6=$result10->fields["modulo6"];
$res7=$result10->fields["modulo7"];
$res8=$result10->fields["modulo8"];
$res9=$result10->fields["modulo9"];
$res10=$result10->fields["modulo10"];
$res11=$result10->fields["modulo11"];
$res12=$result10->fields["modulo12"];
$res13=$result10->fields["modulo13"];



 $cont = 2;
 for($i=1;$i<=13;$i=$i+1){

	  $sql="select * from convenio_practica_modulo where cod_practica = $nro_practica";
$result = $db->Execute($sql);

 $cont = $cont + 1;

 $modulo=$result->fields[$i];

$indice = round($res1 / $res2,2);

 $sql="select * from convenio_practica where cod_practica = $modulo";
$result = $db->Execute($sql);
$nombre_practica=$result->fields["practica"];
$metodo=$result->fields["metodo"];
$unidad=$result->fields["unidad"];
$tipo_det=$result->fields["tipo_det"];
$det = substr($nombre_practica,0,22);


switch ($i){
case "1":{$valor1 = $res1;break;}
case "2":{$valor1 = $res2;break;}
case "3":{$valor1 = $res3;break;}
case "4":{$valor1 = $res4;break;}
case "5":{$valor1 = $res5;break;}
case "6":{$valor1 = $res6;break;}
case "7":{$valor1 = $res7;break;}
case "8":{$valor1 = $res8;break;}
case "9":{$valor1 = $res9;break;}
case "10":{$valor1 = $res10;break;}
case "11":{$valor1 = $res11;break;}
case "12":{$valor1 = $res12;break;}
case "13":{$valor1 = $res13;break;}
}


  if ($modulo > 0){

include ("valores_referencia_modulo.php");


 }





 }


if ($nro_practica == 8298){
$pdf->ln();
$pdf->SetX(30);

$letra = "ARIAL";

$pdf->SetFont($letra,'BU',12);

$pdf->Cell(100,5,"INDICE ATERÓGENICO: ");
$pdf->ln();
$pdf->SetX(30);

$pdf->SetFont($letra,'B',12);
 
$pdf->SetX(30);
$pdf->Cell(45,5,"Resultado: ");

$pdf->Cell(25,5,$indice );
$pdf->SetFont($letra,'',9);
$pdf->Cell(66,5," ");
$contador = $contador + 1;
$pdf->ln();
$pdf->ln();
}
























if ($conta_comun == 5){
//$pdf->AddPage();
$conta_comun = 0;
}


$result5->MoveNext();

	}