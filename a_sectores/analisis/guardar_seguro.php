<?php
include ("../../../conexiones/config.inc.php");
 
$matricula=$_POST["matricula"];
						if ($matricula == ""){

	$leyenda = "Usted no ingreso la matricula";
include ("../../../alertas/campo_vacio.php");

											}
else
										{


$sql="select * from datos_personales where matricula = $matricula";
 $result = $db->Execute($sql);

$a =$result->fields["matricula"];

if ($a == "") {

include ("../a_bioquimicos/entrada_malapraxis.php");
$leyenda = "NO EXISTE BIOQUIMICO CON ESA MATRICULA";
include ("../../../alertas/campo_vacio.php");


				}
else
				{


$compania=$_POST["compania"];
$vigencia=$_POST["vigencia"];
$vencimiento=$_POST["vencimiento"];


$sql = "INSERT INTO `seguro` ( `matricula` , `compañia` , `vigencia` , `vencimiento` ) VALUES ( '$matricula' , '$compania' , '$vigencia' , '$vencimiento')";



mysql_query($sql);

$bandera=$_POST["bandera"];
$facturante=$_POST["facturante"];

$leyenda = "LOS DATOS DEL SEGURO DE MALAPRAXIS HAN SI GUARDADOS EN EL SISTEMA";								
include ("../../../alertas/campo_vacio.php");


if ($facturante == "SI"){

include ("../a_cuentas/cuenta.php");
}
elseif ($bandera == "1"){
	include ("../a_bioquimicos/entrada_dato.php");
}
		else{
include ("../a_bioquimicos/entrada_malapraxis.php");
}

}
										}
?>

