<?php 

 include ("../../conexiones/config.inc.php");
 
 $nro_os = $_REQUEST['nro_os'];
 $nueva_os = $_REQUEST['nueva_os'];
$nro_os_nu = $_REQUEST['nro_os_nu'];
 $importe = $_REQUEST['importe'];

 $base= $_REQUEST['base'];

$suma_rest=$_POST["suma_resta"];
	for ($i=0;$i<count($suma_rest);$i++)    
	{     
	$suma_resta = $suma_rest[$i];    
	}

$porcentaje_valo=$_POST["porcentaje_valor"];
	for ($i=0;$i<count($porcentaje_valo);$i++)    
	{     
	$porcentaje_valor = $porcentaje_valo[$i];    
	}

$afectada=$_POST["afectadas"];
	for ($i=0;$i<count($afectada);$i++)    
	{     
	$afectadas = $afectada[$i];    
	}

	$encontrar_bas=$_POST["encontrar_base"];
	for ($i=0;$i<count($encontrar_bas);$i++)    
	{     
	$encontrar_base = $encontrar_bas[$i];    
	}


 $condicion=$suma_resta.$porcentaje_valor; 
$condicion_2 = $_REQUEST['condicion_2'];

if ($condicion_2 == "SI"){

	include ("convertir_uno.php");
	exit;
}





switch ($afectadas){

	case "1":{ //Todas
 $sql="select * from convenio_practica where nro_os like '$nro_os' order by cod_practica asc";
break;}

case "2":{ //comunes
 $sql="select * from convenio_practica where nro_os like '$nro_os' and categoria = '1' order by cod_practica asc";
break;}


case "3":{ //Especiales
$sql="select * from convenio_practica where nro_os like '$nro_os' and categoria = '2' order by cod_practica asc";
break;}

case "4":{ //comunes
 $sql="select * from convenio_practica where nro_os like '$nro_os' and categoria = '3' order by cod_practica asc";
break;}

case "5":{ //comunes
$sql="select * from convenio_practica where nro_os like '$nro_os' and (categoria = 2 and categoria = 3) order by cod_practica asc";
break;}
}




$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

 $cod_practica=$result->fields["cod_practica"];
$categoria=$result->fields["categoria"];
$honorarios=$result->fields["honorarios"];
$gastos=$result->fields["gastos"];
$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];
echo $valor=$result->fields["valor"];
$autorizada=$result->fields["autorizada"];
echo $practica=$result->fields["practica"];

if ($encontrar_base == "SI"){
$valor = ($valor / $base);
}

switch ($condicion)
	{

				case "11": //NO INCREMENTA NADA
						{

				IF ($condicion_2 == "SI") //CONVIERTE UG Y UH EN VALOR
					{


$sql6="select * from arancel where nro_os like '$nro_os'";
$result6 = $db->Execute($sql6);
$modalidad=ucwords($result6->fields["modalidad"]);
$modalidad_especiales=ucwords($result6->fields["modalidad_especiales"]);
$modalidad_alta=ucwords($result6->fields["alta"]);

$vuh=ucwords($result6->fields["uh"]);
$vug=ucwords($result6->fields["ug"]);

$vuh_especiales=ucwords($result6->fields["uh_especiales"]);
$vug_especiales=ucwords($result6->fields["ug_especiales"]);

$vuh_alta=ucwords($result6->fields["uh_alta"]);
$vug_alta=ucwords($result6->fields["ug_alta"]);


switch ($modalidad){
	case "2":{
$valor = round(($honorarios * $vuh),2) + round(($gastos * $vug),2);
$honorarios= 0;
$gastos= 0;
break;
}

	case "3":{ //valor
$valor = $valor;
$honorarios= 0;
$gastos= 0;
break;
}

}

switch ($modalidad_especiales){
	case "2":{
$valor = round(($honorarios * $vuh_especiales),2) + round(($gastos * $vug_especiales),2);
$honorarios= 0;
$gastos= 0;
break;
}


	case "3":{ //valor


echo $valor = $valor;
$honorarios= 0;
$gastos= 0;
break;
}


}

switch ($modalidad_alta){
	case "2":{
$valor = round(($honorarios * $vuh_alta),2) + round(($gastos * $vug_alta),2);
$honorarios= 0;
$gastos= 0;
break;
}

	case "3":{ //valor
$valor = $valor;
$honorarios= 0;
$gastos= 0;
break;
}
}

					}


			break;
					}


				case "22": //suma por porcentaje
						{



				 $valor = $valor + (($valor * $importe)/100) ;

							break;
						}
				
				case "23": //suma por valor
						{

				$valor = $valor + $importe;
				
							break;
						}


				case "32": //resta por porcentaje
						{


				$valor = $valor - (($valor * $importe)*10)/100 ;
	
							break;
						}
				
				case "33": //resta por valor
						{

					$valor = $valor - $importe;
							
						
							break;


						}



	}





//$sql1="SELECT COUNT(*) as convenio_practica FROM convenio_practica where cod_practica = '$cod_practica' and nro_os = '$nro_os_nu'";
//$result1 = $db->Execute($sql1);
//$cantidad=$result1->fields["convenio_practica"];




//switch ($cantidad) 
	 //{

	//case "0":
		// {
	//	echo $practica;
		//echo "<br>";


  $sql1 = "INSERT INTO `convenio_practica` ( `cod_practica` , `nro_os` , `categoria` , `honorarios` , `gastos` , `toma` , `urgencia` , `material_descartable` , `valor` , `autorizada` , `practica` ) VALUES ( '$cod_practica' , '$nro_os_nu' , '$categoria' , '$honorarios' , '$gastos' , '$toma' , '$urgencia' , '$material_descartable' , '$valor' , '$autorizada' , '$practica')";
//mysql_query($sql1);

echo $sql1 = "INSERT INTO `convenio_practica_factura` (`cod_practica`, `nro_os`, `cod_equivalencia`, `categoria`, `honorarios`, `gastos`, `valor`, `practica`) VALUES ('$cod_practica', '$nro_os_nu', '$cod_equivalencia', '$categoria', '$honorarios', '$gastos', '$valor', '$practica')";
mysql_query($sql1);	 
	
	// break;

	// }

	// case "1":
	// {
//echo "Esa practica ya existe";

	//break;
	// }

// }



$result->MoveNext();



	}


?>


<?php
$leyenda = "SUS DATOS HAN SIDO GUARDADOS";
include ("../../alertas/campo_informacion.php");
?>
