<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo35 {color: #FFFFFF}
-->
</style>



</head>

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


if ($por == 2){

$b=$nombre_modulo.$desde_m." al ".$hasta_m.".xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$b");

}else{
?>	<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();"> <?php

}


?>

 <table width="100%" border="1" cellspacing="0">
  <!--DWLayoutTable-->

  <tr bgcolor="#CECECE">
    <td colspan="11" valign="top"><div align="center">Planilla de Trabajo de <?php echo $nombre_modulo;?>. Desde: <?php echo $desde_m;?> Hasta: <?php echo $hasta_m;?></div></td>
  </tr>
 </table>


  <table width="100%" height="100%" border="1">
    <tr>
	 <td width="30" height="22" bgcolor="#F0F0F0"><div align="center"></div></td>
      <td width="350" bgcolor="#F0F0F0"><div align="center"></div></td>

  <?php

    $sql2="select * from deta_planillas_ver where cod_modulo = $planillas order by cod_operacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo1".$db->ErrorMsg());
  while (!$result20->EOF) {

 $nombre_columna=strtoupper($result20->fields["nombre_columna"]);
 $cod_practica=strtoupper($result20->fields["cod_practica"]);
$contame = $contame + 1;

    ?>  <td width="250" bgcolor="#F0F0F0"><div align="center"><?php echo $nombre_columna;?></div></td>

  

<?php


$result20->MoveNext();
		}



		?>
    </tr>
	 <td width="30" height="22" bgcolor="#F0F0F0"><div align="center">Nº</div></td>
	 <!-- <td width="30" bgcolor="#F0F0F0"><div align="center">PRO</div></td> -->
      <td width="100" bgcolor="#F0F0F0"><div align="center">PACIENTE</div></td>
  <?php

    $sql2="select * from deta_planillas_ver where cod_modulo = $planillas order by cod_operacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo1".$db->ErrorMsg());
  while (!$result20->EOF) {

 $nombre_columna=strtoupper($result20->fields["nombre_columna"]);
 $cod_practica=strtoupper($result20->fields["cod_practica"]);
$contame = $contame + 1;

    ?>  <td width="100" height="22" bgcolor="#F0F0F0"><div align="center"><?php echo $cod_practica;?></div></td>

  

<?php


$result20->MoveNext();
		}



		?>
    </tr>



<?php 

 $contame;

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

$nombre_completo = substr($nombre_completo,0,5);
$nombre_completo = $nombre_completo." (".$nro_paciente.")";

?> 

<td width="100" height="22" bgcolor="#F0F0F0"><div align="center"><?php echo $conta;?></div></td>
<td width="100" height="22" bgcolor="#F0F0F0"><div align="center"><?php echo $nombre_completo;?></div></td>


  

<?PHP


  $sql="select * from deta_planillas where cod_modulo = $planillas order by cod_operacion";
 $result5 = $db->Execute($sql);

 if (!$result5) die("fallo".$db->ErrorMsg());
  while (!$result5->EOF) {

  $cod_practica=$result5->fields["cod_practica"];

  $sql1="select * from detalle where cod_grabacion = $cod_grabacion and nro_practica = $cod_practica";
 $result1 = $db->Execute($sql1);

 	   $nro_pra=$result1->fields["nro_practica"];
	   
	 $sql1="select count(cod_practica) as cant from deta_planillas_ver where cod_modulo = $planillas and cod_practica = $nro_pra order by cod_operacion";
 $result1 = $db->Execute($sql1);

 	  $cant=$result1->fields["cant"];




if ($nro_pra == ""){

	$co = $co + 1;
 $sql1="select count(cod_practica) as cant from deta_planillas_ver where cod_modulo = $planillas and cod_practica = $cod_practica";
 $result1 = $db->Execute($sql1);

$cant=$result1->fields["cant"];


		if ($cant > 1){

$x=1;

while($x<=$cant) {
echo " <td bgcolor='#FFFF33'><div align='center'>-----</div></td>";
  $x++;
}







}else
{
echo " <td bgcolor='#FFFF33'><div align='center'>-----</div></td>";
}





}
else
	  {
	$co = $co + 1;

	if ($cant > 1){

$x=1;

while($x<=$cant) {
   echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
  $x++;
}
}else
{
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
}



	  }






$result5->MoveNext();
		}

 $a = $contame - $co;


/*	
$x=1;

while($x<=$a) {
   echo "<td>&nbsp;</td>";
  $x++;


} 
*/


?>



</tr>

<?php

$a = "";
$co = "";
$contame = "";


$result20->MoveNext();


		}

?></table>

 