<?php

	include("../../../conexiones/config.inc.php");
 $sql10="select * from detalle_referencia";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
while (!$result10->EOF) {

$nro_practica=strtoupper($result10->fields["nro_practica"]);
$cod_grabacion=strtoupper($result10->fields["cod_grabacion"]);
$valor=strtoupper($result10->fields["valor"]);

if ($valor != ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


$result10->MoveNext();
	}


///


	 $sql10="select * from detalle where clase = 1";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
while (!$result10->EOF) {

$nro_practica=strtoupper($result10->fields["nro_practica"]);
$cod_grabacion=strtoupper($result10->fields["cod_grabacion"]);



if ($nro_practica == 711){
$sql11="select * from detalle_orina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
$resultado=strtoupper($result11->fields["densidad"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}

}elseif ($nro_practica == 736){ 
$sql11="select * from detalle_parasitologico where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
$resultado=strtoupper($result11->fields["metodo_macro"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 475){	
$sql11="select * from detalle_hemo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$hematies=strtoupper($result11->fields["hematies"]); if ($hematies == "0.00"){$hematies = "";}
$hemoglobina=strtoupper($result11->fields["hemoglobina"]); if ($hemoglobina == "0.00"){$hemoglobina = "";}
$hematocrito=strtoupper($result11->fields["hematocrito"]); if ($hematocrito == "0.00"){$hematocrito = "";}
$reticulocitos=strtoupper($result11->fields["reticulocitos"]); if ($reticulocitos == "0.00"){$reticulocitos = "";}
$plaquetas=strtoupper($result11->fields["plaquetas"]); if ($plaquetas == "0.00"){$plaquetas = "";}
$mcv=strtoupper($result11->fields["mcv"]); if ($mcv == "0.00"){$mcv = "";}
$mch=strtoupper($result11->fields["mch"]); if ($mch == "0.00"){$mch = "";}
$mchc=strtoupper($result11->fields["mchc"]); if ($mchc == "0.00"){$mchc = "";}
$leucocitos=$result11->fields["leucocitos"]; if ($leucocitos == "0.00"){$leucocitos = "";}
$neutro_cayado=$result11->fields["neutro_cayado"]; if ($neutro_cayado == "0.00"){$neutro_cayado = "";}
$neutro_segmentado=$result11->fields["neutro_segmentado"]; if ($neutro_segmentado == "0.00"){$neutro_segmentado = "";}
$eosinofilos=$result11->fields["eosinofilos"]; if ($eosinofilos == "0.00"){$eosinofilos = "";}
$basofilos=$result11->fields["basofilos"]; if ($basofilos == "0.00"){$basofilos = "";}
$linfocitos=$result11->fields["linfocitos"]; if ($linfocitos == "0.00"){$linfocitos = "";}
$monocitos=$result11->fields["monocitos"]; if ($monocitos == "0.00"){$monocitos = "";}


$total_leucocitos = $neutro_cayado + $neutro_segmentado + $eosinofilos + $basofilos + $linfocitos + $monocitos;

if ($total_leucocitos != 100){
$formula = "NO COINCIDE FORM. LEUCO.";
$estado = "";
}ELSE{
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


 




}elseif ($nro_practica == 764){	$sql11="select * from detalle_hemoglobina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["albumina"]);

if ($resultado!= ''){
$estado = "COMPLETA";
echo $sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}



}elseif ($nro_practica == 413){	$sql11="select * from detalle_curva where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["basal"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}

}elseif ($nro_practica == 110){$sql11="select * from detalle_bilirrubina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["total"]);
if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 13){	$sql11="select * from detalle_aglutininas where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["salino"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 546){	$sql11="select * from detalle_iono where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["natremia"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 193){$sql11="select * from detalle_clearence where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["creatinemia"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 481){$sql11="select * from detalle_hepatograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["aspartato"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 2734){$sql11="select * from detalle_antigeno where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["enzima"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 136){	$sql11="select * from detalle_calcio where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["diuresis"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 363){	$sql11="select * from detalle_fosforo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["valor_hallado"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 654){	$sql11="select * from detalle_magnesio where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["valor_hallado"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 767){	$sql11="select * from detalle_proteinura where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["valor_hallado"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 35){	$sql11="select * from detalle_antibiograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["sensible1"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 105){	$sql11="select * from detalle_bacteriologico where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["muestra"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 547){	$sql11="select * from detalle_iono_urinario where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["resultado"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 171){	$sql11="select * from detalle_coagulograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["porcentaje"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 615){	$sql11="select * from detalle_lipidograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["suero"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}
}elseif ($nro_practica == 911){$sql11="select * from detalle_urocultivo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["muestra"]);

if ($resultado != ''){
$estado = "COMPLETA";
echo $sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 953){$sql11="select * from detalle_widal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["flagelares"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 186){	$sql11="select * from detalle_widal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["salino"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 931){	$sql11="select * from detalle_vaginal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["muestra"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}

}elseif ($nro_practica == 309){$sql11="select * from detalle_exudado where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["muestra"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 903){	$sql11="select * from detalle_uretral where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["muestra"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 298){	$sql11="select * from detalle_espermograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["color"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}

}elseif ($nro_practica == 1130){	$sql11="select * from detalle_orina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["densidad"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 187){$sql11="select * from detalle_coprocultivo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["celulas_epiteliales"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 408){$sql11="select * from detalle_pmn where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["aspecto"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 905){$sql11="select * from detalle_uricosuria where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["valor_hallado"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


}elseif ($nro_practica == 4858){$sql11="select * from detalle_espermo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";$result11 = $db->Execute($sql11);$resultado=strtoupper($result11->fields["valor_hallado"]);

if ($resultado!= ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}


} 





$result10->MoveNext();
	}