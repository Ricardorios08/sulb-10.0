
<?php

 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}


include ("../../../conexiones/config.inc.php");

$por = $_REQUEST["por"];



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


$cod_modulo= $_REQUEST['cod_modulo'];

$planilla=$_POST["planillas"];
	for ($i=0;$i<count($planilla);$i++)    
	{     
	$planillas = $planilla[$i];    
	}



 $sql10="select * from planillas where cod_modulo = $planillas";
$result10 = $db->Execute($sql10);
 $nombre_modulo=strtoupper($result10->fields["nombre_modulo"]);




    $sql2="select * from deta_planillas_ver where cod_modulo = $planillas order by cod_operacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo1".$db->ErrorMsg());
  while (!$result20->EOF) {

 $nombre_columna=strtoupper($result20->fields["nombre_columna"]);
 $cod_practica=strtoupper($result20->fields["cod_practica"]);
$contame = $contame + 1;

 

$result20->MoveNext();
		}





    $sql2="select * from deta_planillas_ver where cod_modulo = $planillas order by cod_operacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo1".$db->ErrorMsg());
  while (!$result20->EOF) {

 $nombre_columna=strtoupper($result20->fields["nombre_columna"]);
 $cod_practica=strtoupper($result20->fields["cod_practica"]);
$contame = $contame + 1;




$result20->MoveNext();
		}



 

 $sql2="select * from deta_planillas where cod_modulo = $planillas ORDER BY cod_operacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo1".$db->ErrorMsg());
  while (!$result20->EOF) {

 $cod_practica=$result20->fields["cod_practica"];

$consulta = "(fecha between '$desde' and '$hasta' and nro_practica = ". $cod_practica.")";

$consulta2 = $consulta2." or ".$consulta;

$result20->MoveNext();
		}


//echo str_repeat(".",13);


 $resultado = substr($consulta2, 3);


$ordenes = "ordenes";
$detalle = "detalle";




   $sql2="select * from $detalle where $resultado group by cod_grabacion order by cod_grabacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo".$db->ErrorMsg());
  while (!$result20->EOF) {


 $nro_paciente=strtoupper($result20->fields["nro_paciente"]);
$cod_grabacion=strtoupper($result20->fields["cod_grabacion"]);


$conta = $conta + 1;


 




  $sql="select * from pacientes where nro_paciente = $nro_paciente";
 $result = $db->Execute($sql);

 	
 $nro_paciente=$result->fields["nro_paciente"];
 $nombre=strtoupper($result->fields["nombre"]);
  $apellido=strtoupper($result->fields["apellido"]);

 $nro_os=$result->fields["nro_os"];
 $nro_documento=$result->fields["nro_documento"];

 $fecha_nacimiento=$result->fields["fecha_nacimiento"];

 if ($autorizacion == 0){
$autorizacion = "S/A";
}
 

IF ($fecha_nacimiento == "0000-00-00"){
$edad = "S/C";
}ELSE{
$edad = calculaEdad($fecha_nacimiento);
}

$nombre_completo = $apellido." ".$nombre;

$nombre_completo = substr($nombre_completo,0,10);
$nombre_completo = $nombre_completo." (".$nro_paciente.")";




   $sql="select * from deta_planillas where cod_modulo = $planillas order by cod_operacion";
 $result5 = $db->Execute($sql);

 if (!$result5) die("fallo".$db->ErrorMsg());
  while (!$result5->EOF) {

  $cod_practica=$result5->fields["cod_practica"];

    $sql1="select * from detalle where cod_grabacion = $cod_grabacion and nro_practica = $cod_practica";
$result1 = $db->Execute($sql1);
 
$nro_pra=$result1->fields["nro_practica"];
$cod_operacion1=strtoupper($result1->fields["cod_operacion"]);

  $sql8="select * from detalle_referencia where cod_operacion = $cod_operacion1";
$result8 = $db->Execute($sql8);
$valor=$result8->fields["valor"];

 
 $nro_documento=$result2->fields["nro_documento"];

 
 $valor=$_POST[valor.$cod_operacion1];


 


if ($nro_pra == ""){
	  }else{
 $sql3 = "UPDATE `detalle_referencia` SET   `valor` = '$valor'  WHERE cod_operacion = '$cod_operacion1'";
$result3 = $db->Execute($sql3);
	  }

 
$nro_pra = "";

$result5->MoveNext();
		}
$a = $contame - $co;
$a = "";
$co = "";
$contame = "";

$result20->MoveNext();
		}

$leyenda = "SE GUARDARON LAS MODIFICACIONES";
include ("../../../alertas/campo_informacion.php");
$band =1;
 header ("Location: buscar_paciente_trabajo.php");
exit; 
?>

