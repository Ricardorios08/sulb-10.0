<?php 

		$a = "firma_segura1.jpg";
$pdf->Image('../../../logos/'.$a,145,105,35);

 switch  ($nro_practica){

	 case "475":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "711":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
 	 case "736":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "764":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "413":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "110":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case  "13":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
 	// case "546":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "193":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "481":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "2734":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "136":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 //case "363":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
 	 case "654":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 //case "767":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "35":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "105":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "547":{ include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "171":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
 	 case "169":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "615":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "911":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "953":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "186":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "931":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "309":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "903":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "298":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "1130":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "187":{include ("cant.php");$contador = $contador + $cant_renglones;break;}
 }

 
 
 switch  ($nro_practica){

	 case "475":{if ($contador > 1){include ("hoja_nueva_firma.php");}include ("detalle_hemograma.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "711":{if ($contador > 1){include ("hoja_nueva_firma.php");}include ("detalle_orina711.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
 	 case "736":{include ("hoja_nueva_firma.php");include ("detalle_parasitologico.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "764":{include ("hoja_nueva_firma.php");include ("detalle_proteinograma.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "413":{include ("hoja_nueva_firma.php");include ("detalle_curva.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "110":{include ("hoja_nueva_firma.php");include ("detalle_bilirrubina.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "13":{include ("hoja_nueva_firma.php");include ("detalle_aglutininas.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
 	 case "546":{include ("hoja_nueva_firma.php");include ("detalle_ionograma.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "193":{include ("hoja_nueva_firma.php");include ("detalle_creatinina.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "481":{include ("hoja_nueva_firma.php");include ("detalle_hepatograma.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "2734":{include ("hoja_nueva_firma.php");include ("detalle_antigeno.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "136":{include ("hoja_nueva_firma.php");include ("detalle_calcio.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "363":{include ("hoja_nueva_firma.php");include ("detalle_orina.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
 	 case "654":{include ("hoja_nueva_firma.php");include ("detalle_magnesio.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 //case "767":{include ("hoja_nueva_firma.php");include ("detalle_proteinuria.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "35":{include ("hoja_nueva_firma.php");include ("detalle_antibiograma.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "105":{include ("hoja_nueva_firma.php");include ("detalle_bacteriologica.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "547":{include ("hoja_nueva_firma.php");include ("detalle_urinario.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "171":{include ("hoja_nueva_firma.php");include ("detalle_coagulograma.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
 	 case "169":{include ("hoja_nueva_firma.php");include ("detalle_coagulograma_169.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "615":{include ("hoja_nueva_firma.php");include ("detalle_lipidograma.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "911":{include ("hoja_nueva_firma.php");include ("detalle_urocultivo.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "953":{include ("hoja_nueva_firma.php");include ("detalle_widal.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "186":{include ("hoja_nueva_firma.php");include ("detalle_coombs.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "931":{include ("hoja_nueva_firma.php");include ("detalle_vaginal.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "309":{include ("hoja_nueva_firma.php");include ("detalle_exudado.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "903":{include ("hoja_nueva_firma.php");include ("detalle_uretral.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "298":{include ("hoja_nueva_firma.php");include ("detalle_espermograma_chico.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "1130":{include ("hoja_nueva_firma.php");include ("detalle_microalbuminuria.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
	 case "187":{include ("hoja_nueva_firma.php");include ("detalle_coprocultivo.php");include ("cant.php");$contador = $contador + $cant_renglones;break;}
 }
