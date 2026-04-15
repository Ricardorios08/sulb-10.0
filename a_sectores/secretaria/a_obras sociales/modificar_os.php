<?php
include ("../../../conexiones/config.inc.php");


$nro_os=$_POST["nro_os"];

$denominacion=$_POST["denominacion"];
$sigla=$_POST["sigla"];

$inscripcio=$_POST["inscripcion"];
	for ($i=0;$i<count($inscripcio);$i++)    
	{     
	$inscripcion = $inscripcio[$i];    
	}

if ($inscripcion== ""){
$sql="select * from datos_os where nro_os like $nro_os";
$result = $db->Execute($sql);
$inscripcion=$result->fields["inscripcion"];
}


$cuit=$_POST["cuit"];
$cod_area_n=$_POST["cod_area_n"];
$domicilio_n=$_POST["domicilio_n"];
$telefono_n=$_POST["telefono_n"];
$telefax_n=$_POST["telefax_n"];
$email_n=$_POST["email_n"];

$domicilio_l=$_POST["domicilio_l"];
$cod_area_l=$_POST["cod_area_l"];
$telefono_l=$_POST["telefono_l"];
$telefax_l=$_POST["telefax_l"];
$email_l=$_POST["email_l"];
$nro_prestador=$_POST["nro_prestador"];
$contacto=$_POST["contacto"];
$cargo=$_POST["cargo"];
$nivel=$_POST["nivel"];

$webservice=$_POST["webservice"];
$nro_os_facturar=$_POST["nro_os_facturar"];

 $inscripcion;

	
  $sql = "UPDATE `datos_os` SET `denominacion` = '$denominacion' , `sigla` = '$sigla', `domicilio_n` = '$domicilio_n' ,`cod_area_n` = '$cod_area_n' , `telefono_n` = '$telefono_n', `telefax_n` = '$telefax_n' ,`email_n` = '$email_n', `domicilio_l` = '$domicilio_l' , `cod_area_l` = '$cod_area_l', `telefono_l` = '$telefono_l', `telefax_l` = '$telefax_l', `email_l` = '$email_l', `inscripcion` = '$inscripcion', `cuit` = '$cuit', `nro_prestador` = '$nro_prestador' , `contacto` = '$contacto', `nivel` = '$nivel', `cargo` = '$cargo' , `webservice` = '$webservice' WHERE `nro_os` = '$nro_os'" ;
mysql_query($sql);

  $sql = "UPDATE `datos_os` SET `nro_os_facturar` = '$nro_os_facturar' WHERE `nro_os` = '$nro_os'" ;
mysql_query($sql);

/*
$sql = "UPDATE `datos_os` SET `denominacion` = '$denominacion', `sigla` = '$sigla', `domicilio_n` = '$domicilio_n', `cod_area_n` = '$cod_area_n', `telefono_n` = '$telefono_n', `telefax_n` = '$telefax_n', `email_n` = '$email_n', domicilio_l` = '$domicilio_l', `cod_area_l` = '$cod_area_l', `telefono_l` = '$telefono_l', `telefax_l` = '$telefax_l', `email_l` = '$email_l', `inscripcion` = '$inscripcion', `cuit` = '$cuit', `nro_prestador` = '$nro_prestador' , `contacto` = '$contacto', `nivel` = '$nivel', `cargo` = '$cargo' WHERE `nro_os` = '$nro_os' LIMIT 1" ;





ECHO $sql = "UPDATE datos_os SET   `denominacion` = '$denominacion' , `sigla` =  '$sigla' , `domicilio_n` = '$domicilio_n' , `cod_area_n` = '$cod_area_n', `telefono_n` ='$telefono_n'  , `telefax_n`= '$telefax_n' , `email_n` = '$email_n' , `domicilio_l` = '$domicilio_l' , `cod_area_l` = '$cod_area_l', `telefono_l` = '$telefono_l'  , `telefax_l` = '$telefax_l' , `email_l`  = '$email_l', `inscripcion` = '$inscripcion' , `cuit` = '$cuit' , `nro_prestador` = '$nro_prestador' , `contacto` = '$contacto' , `nivel` = '$nivel' , `cargo` '$cargo' WHERE `nro_os` = '$nro_os'";
*/




			$hoy = date("ymd");
$ruta="c:/informes/web/obras_sociales_".$hoy.".txt";

 $sql= "SELECT nro_os, denominacion, sigla FROM datos_os  where nro_os < 9999 and nro_os > 999 order by nro_os INTO OUTFILE '$ruta' FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n'";
$result = $db->Execute($sql);


			
		
			include ("../a_obras sociales/entrada_os.php");
?>