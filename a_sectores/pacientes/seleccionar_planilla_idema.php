<?php 

$planilla=$_POST["planillas"];
	for ($i=0;$i<count($planilla);$i++)    
	{     
	$planillas = $planilla[$i];    
	}

$dia_d  =$_REQUEST["dia_d"];
$mes_d  =$_REQUEST["mes_d"];
$anio_d  =$_REQUEST["anio_d"];

$dia_h  =$_REQUEST["dia_h"];
$mes_h  =$_REQUEST["mes_h"];
$anio_h  =$_REQUEST["anio_h"];

$desde = "20".$anio_d."-".$mes_d."-".$dia_d;
$hasta = "20".$anio_h."-".$mes_h."-".$dia_h;

$desde_m = $dia_d."/".$mes_d."/".$anio_d;
$hasta_m = $dia_h."/".$mes_h."/".$anio_h;
 $planillas;

$planillas = 1;
switch ($planillas){
case "1":{ 	include ("buscar_paciente_diaria_idema.php"); 		break; 	} //Diaria 
case "2":{ 	include ("buscar_paciente_mega.php"); 		break; 	} //Mega
case "3":{ 	include ("buscar_paciente_lista_idema.php"); 		break; 	} //Pacientes
case "4":{ 	include ("estadisticas.php"); 		break; 	} //Practicas
case "5":{ 	include ("estadisticas_os.php"); 		break; 	} //Practicas
case "6":{ 	include ("buscar_paciente_diaria_idema.php"); 		break; 	} //Practicas
case "7":{ 	include ("buscar_paciente_osde.php"); 		break; 	} //Practicas
case "8":{ 	include ("buscar_paciente_protocolo_incompletos.php"); 		break; 	} //Practicas

}