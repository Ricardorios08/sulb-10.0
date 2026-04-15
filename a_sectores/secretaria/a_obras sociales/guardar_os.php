<?php 
include ("../../../conexiones/config.inc.php");
global $domicilio_l;
global $telefono_1;
global $cod_area_n;
global $cod_area_l;
$nro_os=$_POST["nro_os"];

if ($nro_os == ""){
$leyenda = "NO INGRESO NUMERO DE OBRA SOCIAL";
include ("../../../alertas/campo_informacion2.php");
exit;
}


if ($nro_os > 999){
$leyenda = "DEBE INGRESAR UN NUMERO MENOR A 1000";
include ("../../../alertas/campo_informacion2.php");
exit;
}



  $sql1="SELECT * FROM datos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);
 $nro_o=$result1->fields["nro_os"];

if ($nro_o != ""){
$leyenda = "YA EXISTE OBRA SOCIAL CON ESE NUMERO";
include ("../../../alertas/campo_informacion2.php");
exit;
}

$denominacion=$_POST["denominacion"];
$sigla=$_POST["sigla"];

if ($denominacion == ""){
$leyenda = "NO INGRESO DENOMINACION DE OBRA SOCIAL";
include ("../../../alertas/campo_informacion2.php");
exit;
}

if ($sigla == ""){
$leyenda = "NO INGRESO SIGLA DE OBRA SOCIAL";
include ("../../../alertas/campo_informacion2.php");
exit;
}




$inscripcio=$_POST["inscripcion"];
	for ($i=0;$i<count($inscripcio);$i++)    
	{     
	$inscripcion = $inscripcio[$i];    
	}

$cuit=$_POST["cuit"];
$domicilio_n=$_POST["domicilio_n"];
$telefono_n=$_POST["telefono_n"];
$telefax_n=$_POST["telefax_n"];
$email_n=$_POST["email_n"];

$domicilio_l=$_POST["domicilio_l"];
$telefono_1=$_POST["telefono_1"];
$telefax_l=$_POST["telefax_l"];
$email_l=$_POST["email_l"];
$nro_prestador=$_POST["nro_prestador"];
$nom_contacto=$_POST["contacto"];
$cargo=$_POST["cargo"];
$nivel=$_POST["nivel"];

$localidad_l=$_POST["localidad_l"];
$localidad_n=$_POST["localidad_n"];
$cod_postal_l=$_POST["cod_postal_l"];
$cod_postal_n=$_POST["cod_postal_n"];


$factura=$_POST["facturar"];
	for ($i=0;$i<count($factura);$i++)    
	{     
	$facturar = $factura[$i];    
	}



if ($sigla!="") {
	


echo $sql = "INSERT INTO datos_os ( `nro_os` , `denominacion` , `sigla` , `domicilio_n` , `cod_area_n` , `telefono_n` , `telefax_n` , `localidad_n` , `cod_postal_n` , `email_n` , `domicilio_l` , `cod_area_l` , `telefono_l` , `telefax_l` , `localidad_l` , `cod_postal_l` , `email_l` , `inscripcion` , `cuit` , `nro_prestador` , `contacto` , `nivel` , `cargo` , `domi_facturacion`) VALUES ( '$nro_os' , '$denominacion' , '$sigla' , '$domicilio_n' , '$cod_area_n' ,'$telefono_n' , '$telefax_n' ,  '$localidad_n' , '$cod_postal_n' , '$email_n' , '$domicilio_l' , '$cod_area_l' , '$telefono_1' , '$telefax_l' ,  '$localidad_l' , '$cod_postal_l' , '$email_l' , '$inscripcion' , '$cuit' , '$nro_prestador' , '$nom_contacto' , '$nivel' , '$cargo' , '$facturar')";


mysql_query($sql);



			
			}

			$leyenda = "SE GUARDO LA OBRA SOCIAL CON EXITO";
		
			
			$hoy = date("ymd");
$ruta="c:/informes/web/obras_sociales_".$hoy.".txt";

 $sql= "SELECT nro_os, denominacion, sigla FROM datos_os  where nro_os < 9999 and nro_os > 999 order by nro_os INTO OUTFILE '$ruta' FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n'";
$result = $db->Execute($sql);
		include ("../../../alertas/campo_informacion.php");
?>