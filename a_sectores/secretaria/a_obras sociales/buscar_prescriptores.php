<?php 

global $buscador_rapido;



include ("../../../conexiones/config.inc.php");

$B = 1;

$buscador_rapido=$_POST["buscador_rapido"];
$palabra=$_POST["busca"];
$buscar_os=$_POST["busca_os"];



if (($nro_os == "")&&($palabra=="")) {
$sql="select * from prescriptor";
}
elseif ($palabra==""){
$sql="select * from prescriptor where nro_os like %$buscar_os";
}
else
{
$sql="select * from prescriptor where matricula like '$palabra' and nro_os like '%$buscar_os' or nombre like '$palabra%' and nro_os like '%$buscar_os'";
}

	
$result = $db->Execute($sql);




switch ($buscador_rapido)
{
	case "1"://mostrar sin modificar
	{ 
		include ("pres_sm.php");
  

	break;
}	


	case "2": //mostrar con modificar
	{		


		include ("os_m.php");

		break;
	}

}
 





 
