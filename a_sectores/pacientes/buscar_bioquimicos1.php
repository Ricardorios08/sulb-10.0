
<?php
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];

 
switch ($buscador_rapido)
{
	case "1"://mostrar sin modificar
	{ 

			include ("bioq_sm.php");
	break;
}


	case "2": //mostrar con modificar
	{
			include ("bioq_cm.php");
	break;
}	

}