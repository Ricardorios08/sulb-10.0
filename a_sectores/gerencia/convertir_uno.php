<?php 
include ("../../conexiones/config.inc.php");
$sql6="select * from arancel where nro_os like '$nro_os'";
$result6 = $db_os->Execute($sql6);
$modalidad=ucwords($result6->fields["modalidad"]);
$modalidad_especiales=ucwords($result6->fields["modalidad_especiales"]);
$modalidad_alta=ucwords($result6->fields["alta"]);

$vuh=ucwords($result6->fields["uh"]);
$vug=ucwords($result6->fields["ug"]);

$vuh_especiales=ucwords($result6->fields["uh_especiales"]);
$vug_especiales=ucwords($result6->fields["ug_especiales"]);

$vuh_alta=ucwords($result6->fields["uh_alta"]);
$vug_alta=ucwords($result6->fields["ug_alta"]);



 $sql="select * from convenio_practica where nro_os like '$nro_os' order by cod_practica asc";
$result = $db_pr->Execute($sql);

if (!$result) die("fallo".$db_pr->ErrorMsg());

 while (!$result->EOF) {

 echo $cod_practica=$result->fields["cod_practica"];
 echo " - ";
echo $categoria=$result->fields["categoria"];
 echo " - ";
echo $honorarios=$result->fields["honorarios"];
 echo " - ";
echo $gastos=$result->fields["gastos"];
 echo " - ";
$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];
echo  $valor=$result->fields["valor"];
 echo " - ";
$autorizada=$result->fields["autorizada"];
$practica=$result->fields["practica"];





switch ($categoria){

case "1":{//practicas comunes

	if ($modalidad == 2){ 
$valor = round(($honorarios * $vuh),2) + round(($gastos * $vug),2);
$honorarios= 0;
$gastos= 0;}
elseif ($modalidad == 1){
	$valor = $valor;
}
elseif ($modalidad == 3){
$valor = round(($honorarios * $vuh),2);
}

break;
}


case "2":{ //practicas especiales

	if ($modalidad_especiales == 2){
$valor = round(($honorarios * $vuh),2) + round(($gastos * $vug),2);
$honorarios= 0;
$gastos= 0;
}
elseif ($modalidad == 1){
	$valor = $valor;
}
elseif ($modalidad == 3){
$valor = round(($honorarios * $vuh),2);
}
break;
}


case "3":{ //practicas alta

	if ($modalidad_especiales == 2){
$valor = round(($honorarios * $vuh),2) + round(($gastos * $vug),2);
$honorarios= 0;
$gastos= 0;
}
elseif ($modalidad == 1){
	$valor = $valor;
}
elseif ($modalidad == 3){
$valor = round(($honorarios * $vuh),2);
}
break;
}

}





  $sql1 = "INSERT INTO `convenio_practica` ( `cod_practica` , `nro_os` , `categoria` , `honorarios` , `gastos` , `toma` , `urgencia` , `material_descartable` , `valor` , `autorizada` , `practica` ) VALUES ( '$cod_practica' , '$nro_os_nu' , '$categoria' , '$honorarios' , '$gastos' , '$toma' , '$urgencia' , '$material_descartable' , '$valor' , '$autorizada' , '$practica')";
$result8 = $db_pr->Execute($sql1);
echo "<br>";
	
$result->MoveNext();



	}


?>

<center>
<?php $leyenda = "SUS DATOS HAN SIDO GUARDADOS";
include ("../../alertas/campo_informacion.php");
?>
<a href="../../a_sectores/gerencia/menu_convertir.php" target = "central">Volver</a>"
</center>
