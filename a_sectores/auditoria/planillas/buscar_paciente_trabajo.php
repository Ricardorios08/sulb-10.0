<?php
include ("../../../conexiones/config.inc.php");
if ($band != 1){
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
}
$sql10="select * from planillas where cod_modulo = $planillas";
$result10 = $db->Execute($sql10);
 $nombre_modulo=strtoupper($result10->fields["nombre_modulo"]);


switch ($por){

case "1":{ 
?>	<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();"> 
	<?php
break;}

case "2":{ 
$b=$nombre_modulo.$desde_m." al ".$hasta_m.".xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$b");
break;}

case "3":{
	 
	include ("cm.php");
	exit;
break;}


}


?>
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

?>
<form action="guardar_planilla.php" method="post"  target ="central">
 <table width="100%" border="1" cellspacing="0">
  <!--DWLayoutTable-->

  <tr bgcolor="#CECECE">
    <td colspan="11" valign="top"><div align="center">Planilla de Trabajo de <?php echo $nombre_modulo;?>. Desde: <?php echo $desde_m;?> Hasta: <?php echo $hasta_m;?></div></td>
  </tr>
 </table>


  <table width="100%" border="1" cellspacing="0">
    <tr>
	 <td width="60" bgcolor="#F0F0F0"><div align="center"></div></td>
      <td width="69" bgcolor="#F0F0F0"><div align="center">
        <input type="submit" name="Submit" value="Guardar">
      </div></td>
      <td width="856" bgcolor="#F0F0F0"><div align="center"></div></td>

  <?php

     $sql2="select * from deta_planillas_ver where cod_modulo = $planillas order by cod_operacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo1".$db->ErrorMsg());
  while (!$result20->EOF) {

 $nombre_columna=strtoupper($result20->fields["nombre_columna"]);
 $cod_practica=strtoupper($result20->fields["cod_practica"]);
$contame = $contame + 1;

    ?>  <td width="301" bgcolor="#F0F0F0"><div align="center"><?php echo $nombre_columna;?></div></td>

  

<?php


$result20->MoveNext();
		}



		?>
    </tr>
	 <tr><td width="60" bgcolor="#F0F0F0"><div align="center">Nº</div></td>
	   <td width="69" bgcolor="#F0F0F0"><div align="center">PROT.</div></td>
	   <!-- <td width="30" bgcolor="#F0F0F0"><div align="center">PRO</div></td> -->
      <td width="856" bgcolor="#F0F0F0"><div align="center">PACIENTE</div></td>
  <?php

    $sql2="select * from deta_planillas_ver where cod_modulo = $planillas order by cod_operacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo1".$db->ErrorMsg());
  while (!$result20->EOF) {

 $nombre_columna=strtoupper($result20->fields["nombre_columna"]);
 $cod_practica=strtoupper($result20->fields["cod_practica"]);
$contame = $contame + 1;

    ?>  <td width="301" bgcolor="#F0F0F0"><div align="center"><?php echo $cod_practica;?>
  </div></td>

  

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

$nombre_completo = substr($nombre_completo,0,10);
$nombre_completo = $nombre_completo." (".$nro_paciente.")";

?> 

<tr><td width="60" bgcolor="#F0F0F0"><div align="center"><?php echo $conta;?></div></td>
  <td width="69" bgcolor="#F0F0F0"><div align="center"><?php echo $cod_grabacion;?></div></td>
  <td width="856" bgcolor="#F0F0F0"><div align="left"></div>   <?php echo $nombre_completo;?></td>
<?PHP


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


if ($nro_pra == ""){

echo " <td bgcolor='#FFFF33'><div align='center'>* * * *</div></td>";
 



	  }else{
 
 ?> <td> <input type="text" name="<?php echo valor.$cod_operacion1;?>" value = "<?php echo $valor;?>" size = "10"> </td> <?php
	  }

 

$nro_pra = "";

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


<input type = "hidden" name = "por" value = "<?php echo $por;?>" />
<input type = "hidden" name = "dia_d" value = "<?php echo $dia_d;?>" />
<input type = "hidden" name = "mes_d" value = "<?php echo $mes_d;?>" />
<input type = "hidden" name = "anio_d" value = "<?php echo $anio_d;?>" />

<input type = "hidden" name = "dia_h" value = "<?php echo $dia_h;?>" />
<input type = "hidden" name = "mes_h" value = "<?php echo $mes_h;?>" />
<input type = "hidden" name = "anio_h" value = "<?php echo $anio_h;?>" />

<input type = "hidden" name = "desde" value = "<?php echo $desde;?>" />
<input type = "hidden" name = "hasta" value = "<?php echo $hasta;?>" />

<input type = "hidden" name = "desde_m" value = "<?php echo $desde_m;?>" />
<input type = "hidden" name = "hasta_m" value = "<?php echo $hasta_m;?>" />
 

<input type = "hidden" name = "cod_modulo" value = "<?php echo $cod_modulo;?>" />
<input type = "hidden" name = "planillas[]" value = "<?php echo $planillas;?>" />
<input type = "hidden" name = "hasta_m" value = "<?php echo $hasta_m;?>" />
<input type = "hidden" name = "hasta_m" value = "<?php echo $hasta_m;?>" />


 


 



</form>