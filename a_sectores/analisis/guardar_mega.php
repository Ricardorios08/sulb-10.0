<?php 

include("../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_paciente= $_REQUEST['nro_paciente'];



   $sql10="select * from detalle where cod_grabacion = $cod_grabacion  order by prioridad, nro_practica";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

 $cod_operacion=$result10->fields["cod_operacion"];


$cod_mega=$_POST[cod_mega.$cod_operacion];
$deriva=$_POST[nro_practica.$cod_operacion];


$imprimir=$_POST[imprimir.$cod_operacion];





$nro_la=$_POST[nro_lab.$cod_operacion];
	for ($i=0;$i<count($nro_la);$i++)    
	{     
	$nro_lab = $nro_la[$i];    
	}


$nro_lab;

if ($deriva == 'on'){
$deriva = 1;
}
else
	 {
$deriva = "";
	 }


if ($imprimir == 'on'){
$imprimir = 1;
}
else
	 {
$imprimir = "";
	 }

/////////////////////////////////////////////////////////////////////

  $sql = "UPDATE detalle SET `deriva` = '$deriva' , `imprimir` = '$imprimir' , `cod_mega` = '$cod_mega' , `nro_lab` = '$nro_lab' WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);




$result10->MoveNext();

	}

	$banderin = 1;
include ("practicas_imp.php");


?>