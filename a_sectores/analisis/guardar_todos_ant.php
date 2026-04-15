<?php 

 

include("../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_paciente= $_REQUEST['nro_paciente'];



  $sql10="select * from detalle_referencia where cod_grabacion = $cod_grabacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

  $cod_operacion=$result10->fields["cod_operacion"];


$valor_obtenido=$_POST[valor.$cod_operacion];


/////////////////////////////////////////////////////////////////////

 $sql = "UPDATE detalle_referencia SET `valor` = '$valor_obtenido' WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);




$result10->MoveNext();

	}


	  $sql10="select * from detalle where cod_grabacion = $cod_grabacion  order by prioridad, nro_practica";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

 $cod_operacion=$result10->fields["cod_operacion"];





$imprimir=$_POST[imprimir.$cod_operacion];
$enter=$_POST[enter.$cod_operacion];
 $facturar=$_POST[facturar.$cod_operacion];





if ($imprimir == 'on'){
$imprimir = 1;
}
else
	 {
$imprimir = "";
	 }


if ($enter == 'on'){
$enter = 1;
}
else
	 {
$enter = "";
	 }


if ($facturar == 'on'){
$facturar = 0;
}
else
	 {
$facturar = "1";
	 }




/////////////////////////////////////////////////////////////////////

 $sql = "UPDATE detalle SET  `imprimir` = '$imprimir' , `enter` = '$enter' , `facturar` = '$facturar'   WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);




$result10->MoveNext();

	}





  $sql10="select * from detalle_referencia where cod_grabacion = $cod_grabacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

 $cod_operacion=$result10->fields["cod_operacion"];
$nro_practica=$result10->fields["nro_practica"];

$valor_obtenido=$_POST[valor.$cod_operacion];


/////////////////////////////////////////////////////////////////////


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);
nl2br( stripslashes( htmlentities($referencia=$result11->fields["referencia"])));
nl2br( stripslashes( htmlentities($referencia1=$result11->fields["referencia1"])));
nl2br( stripslashes( htmlentities($referencia2=$result11->fields["referencia2"])));
nl2br( stripslashes( htmlentities($referencia3=$result11->fields["referencia3"])));
 nl2br( stripslashes( htmlentities($metodo=$result11->fields["metodo"])));


 
  $sql = "UPDATE detalle_referencia SET `valor` = '$valor_obtenido' , `referencia` = '$referencia', `observaciones` = '$observaciones3' , `referencia1` = '$referencia1' , `referencia2` = '$referencia2' , `referencia3` = '$referencia3' WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);




$result10->MoveNext();

	}

include ("emision_mod.php");

?>