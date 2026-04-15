<?php 

//$contador = $contador + 9;
     if ($nro_practica == 711){if ($contador > 1){$pdf->AddPage();} include ("detalle_orina711.php");$contador = 1;
}elseif ($nro_practica == 309){	include ("detalle_exudado.php");$contador11 = 1;
}elseif ($nro_practica == 736){ include ("detalle_parasitologico.php");$contador11 = 1;
}elseif ($nro_practica == 475){	if ($contador > 1){$pdf->AddPage();}include ("detalle_hemograma.php");$contador = 30;
}elseif ($nro_practica == 764){	include ("detalle_proteinograma.php");$contador11 = 1;
}elseif ($nro_practica == 413){	include ("detalle_curva.php");$contador11 = 1;
}elseif ($nro_practica == 110){if ($contador > 1){$pdf->AddPage();}	include ("detalle_bilirrubina.php");$contador = 15;
}elseif ($nro_practica == 13){	include ("detalle_aglutininas.php");$contador11 = 1;
}elseif ($nro_practica == 546){	include ("detalle_ionograma.php");$contador11 = 1;
}elseif ($nro_practica == 193){include ("detalle_creatinina.php");$contador11 = 1;
}elseif ($nro_practica == 481){	include ("detalle_hepatograma.php");$contador11 = 1;
}elseif ($nro_practica == 2734){include ("detalle_antigeno.php");$contador11 = 1;
}elseif ($nro_practica == 136){	include ("detalle_calcio.php");$contador11 = 1;
}elseif ($nro_practica == 363){	include ("detalle_orina.php");$contador11 = 1;
}elseif ($nro_practica == 654){	include ("detalle_magnesio.php");$contador11 = 1;
}elseif ($nro_practica == 767){	include ("detalle_proteinuria.php");$contador11 = 1;
}elseif ($nro_practica == 35){if ($contador > 1){$pdf->AddPage();}	include ("detalle_antibiograma.php");$contador = 30;
}elseif ($nro_practica == 105){if ($contador > 1){$pdf->AddPage();}	include ("detalle_bacteriologica.php");$contador = 30;
}elseif ($nro_practica == 547){	include ("detalle_urinario.php");$contador11 = 1;
}elseif ($nro_practica == 171){	include ("detalle_coagulograma.php");$contador11 = 1;
}elseif ($nro_practica == 615){	include ("detalle_lipidograma.php");$contador11 = 1;
}elseif ($nro_practica == 911){include ("detalle_urocultivo.php");$contador = 1;
}elseif ($nro_practica == 953){include ("detalle_widal.php");$contador11 = 1;
}elseif ($nro_practica == 186){	include ("detalle_coombs.php");$contador11 = 1;
}elseif ($nro_practica == 4858){	include ("detalle_espermo.php");$contador11 = 1;
}elseif ($nro_practica == 408){	include ("detalle_pmn.php");$contador11 = 1;
}elseif ($nro_practica == 6614){	include ("detalle_rast.php");$contador11 = 1;
}elseif ($nro_practica == 931){	include ("detalle_vaginal.php");$contador11 = 1;
}



 