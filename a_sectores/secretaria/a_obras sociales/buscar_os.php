<?php 

global $buscador_rapido;



include ("../../conexiones/config.inc.php");

$B = 1;

$buscador_rapido=$_POST["buscador_rapido"];
$palabra=$_POST["busca"];

	if ($palabra == ""){
	
$sql="select * from datos_os order by nro_os, localidad_n, denominacion";

} else {

$sql="select * from datos_os where sigla like '$palabra%' or nro_os like '$palabra%' or denominacion like '%$palabra%' order by localidad_n, denominacion, nro_os";
}
	
$result = $db->Execute($sql);




switch ($buscador_rapido)
{
	case "1"://mostrar sin modificar
	{ 
		include ("os_sm.php");
  

	break;
}	


	case "2": //mostrar con modificar
	{		


		include ("os_m.php");

		break;
	}

	case "3": //por prestador
	{		


		include ("responsabilidad.php");

		break;
	}

}
 





 
