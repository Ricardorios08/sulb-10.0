<?php 
$descarg=$_POST["descarga"];
	for ($i=0;$i<count($descarg);$i++)    
	{     
	$descarga = $descarg[$i];    
	}

switch ($descarga){

	case "01":{

	
include ("ver_validadas.v1.php");
		break;
			}


	case "02":{
		$caso= "impresion";
include ("imprimir_validada.php");
		break;
		}


	case "03":{
		$caso = "excel";
include ("imprimir_validada.php");
		break;
		}

}
	

