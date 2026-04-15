
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo40 {
	font-size: 16px;
	font-weight: bold;
}
body {
	
	background-color: #FFFFFF;
}
.Estilo42 {
	font-size: 18px;
	font-weight: bold;
}
.Estilo43 {color: #FFFFFF}
.Estilo44 {
	font-size: x-large;
	font-weight: bold;
}
.Estilo45 {font-size: 16px}
.Estilo46 {font-family: Arial, Helvetica, sans-serif}
.Estilo47 {
	color: #FF0000;
	font-weight: bold;
	font-size: 16px;
}
.Estilo48 {font-size: 14px}
-->
</style>

<?php 
include ("../../conexiones/config.inc.php");

$buscar=$_REQUEST["buscar"];

$palabra=$_REQUEST["palabra"];



	$planes_o=$_POST["planes_os"];
	for ($i=0;$i<count($planes_o);$i++)    
	{     
 $nombre_plan = $planes_o[$i];    
	}


	$nro_o=$_POST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
 $nro_os = $nro_o[$i];    
	}


 //$r=  list($nro_os, $nombre_plan) = explode("*",$buscar_plan);




$sql1="select * from datos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);
$nombre_os=$result1->fields["denominacion"];
$sigla=$result1->fields["sigla"];


$sql1="select * from requisitos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);
$requisitos=$result1->fields["requisitos"];
$version=$result1->fields["version"];
$suspendido=$result1->fields["suspendido"];
$vigencia=$result1->fields["vigencia"];

 $dia = substr($vigencia,8,2);
 $mes = substr($vigencia,5,2);
 $anio = substr($vigencia,0,4);

 $vigencia = $dia."/".$mes."/".$anio;


$comunes=$result1->fields["comunes"];
$especiales=$result1->fields["alta"];
$alta=$result1->fields["alta"];
$planes=$result1->fields["planes"];
$diagnostico=$result1->fields["diagnostico"];


switch ($buscar){
	case "AGREGAR PRACTICA":{ 



?>

<table width="814" border="1" cellpadding="0" cellspacing="0">
            
            <tr>
              <td height="74" colspan="8" bgcolor="#B8B8B8"><div align="center" class="Estilo44"><font color="#000000" face="Trebuchet MS">REQUISITOS <?php echo $sigla;?></font></div></td>
            </tr>
            
          
            <tr>
              <td height="63" colspan="2" bgcolor="#EDEDED" class="Estilo45"><span class="Estilo46"><font color="#000000"><?php echo $requisitos;?></font></span></td>
            </tr>
</table>

<?php


include("../../conexiones/config.inc.php");
$sql="select * from planes_os where nro_os like '$nro_os' and nombre_plan = '$nombre_plan'";
$result8 = $db->Execute($sql);
$nro_plan=strtoupper($result8->fields["nro_plan"]);

if ($nro_plan != ""){

?>
<table width="815" border="1" cellpadding="0" cellspacing="0">
 
  <tr>
    <td width="21%" bgcolor="#D6DDEF"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"> PLAN </font></div>      <div align="center"></div></td>
    <td width="8%" bgcolor="#D6DDEF"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">COSEGURO</font></div></td>
    <td width="9%" bgcolor="#D6DDEF"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">AUT. COM</font></div></td>
    <td width="9%" bgcolor="#D6DDEF"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">AUT. ESP</font></div></td>
    <td width="9%" bgcolor="#D6DDEF"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">AUT. ALT</font></div></td>
    <td width="48%" bgcolor="#D6DDEF"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">TEXTO</font></div></td>
  </tr>



  <?php
if ($plan == ""){
  $sql="select * from planes_os where nro_os like '$nro_os' and nombre_plan = '$nombre_plan'";
  }
  else
	{
 $sql="select * from planes_os where nro_os like '$nro_os' and nro_plan = '$plan' OR nombre_plan = '$plan'";
	}


$result8 = $db->Execute($sql);

   if (!$result8) die("fallo".$db->ErrorMsg());
  while (!$result8->EOF) {
$nro_os=strtoupper($result8->fields["nro_os"]);




$cod_operacion=$result8->fields["cod_operacion"];
$nro_plan=$result8->fields["nro_plan"];
$nombre_plan=$result8->fields["nombre_plan"];
$reducido_plan=$result8->fields["reducido_plan"];
$coseguro=$result8->fields["coseguro"];
$comunes=$result8->fields["comunes"];
$especiales=$result8->fields["especiales"];
$alta=$result8->fields["alta"];
$pmo=$result8->fields["pmo"];
$texto=$result8->fields["texto"];


?>

  <tr>
    <td bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $nombre_plan;?></font></div>
    <div align="center"><font color="#000000" size="2" face="Trebuchet MS"></font></div>      <div align="center"><font color="#000000" size="2" face="Trebuchet MS"></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $coseguro;?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $comunes;?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $especiales;?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $alta;?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $texto;?></font></div></td>
  </tr>
  



<?php 


	$result8->MoveNext();
	}



  ?>
</table>

<?php }?>





<table width="816" border="1" cellspacing="0">
<!--DWLayoutTable-->
<tr bordercolor="#0066FF" bgcolor="#333333"> 
<td width="44" height="18"><div align="center" class="Estilo1 Estilo43"><font size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
<td colspan="3"><div align="center" class="Estilo1 Estilo43"><font size="2" face="Arial, Helvetica, sans-serif">PRACTICA</font></div></td>
<td width="67" valign="top"><div align="center" class="Estilo1 Estilo43"><font size="2" face="Arial, Helvetica, sans-serif">TIPO</font></div></td>
<td width="53" valign="top"><div align="center" class="Estilo1 Estilo43"><font size="2" face="Arial, Helvetica, sans-serif">UNIDAD</font></div></td>
<td width="106" valign="top"><div align="center" class="Estilo1 Estilo43"><font size="2" face="Arial, Helvetica, sans-serif">TOTAL</font></div></td>

<?php

 $sql1="select * from convenio_practica  where  (cod_practica like '%$palabra') or (practica like '%$palabra%') order by cod_practica asc";
$result = $db->Execute($sql1);

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
	
$cod_practica=strtoupper($result->fields["cod_practica"]);
$practica=strtoupper($result->fields["practica"]);
$categoria=strtoupper($result->fields["categoria"]);
$honorarios=$result->fields["honorarios"];
$gastos=$result->fields["gastos"];
$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];
$valor=$result->fields["valor"];
$metodo=$result->fields["metodo"];
$tipo_det=$result->fields["tipo_det"];
$metodo=$result->fields["metodo"];
$unidad=$result->fields["unidad"];

//echo nl2br( stripslashes( htmlentities($referencia=$result->fields["referencia"])));
 //$referencia=$result->fields["referencia"];

switch ($categoria){
	case "1":{$categoria = "COM.";
	BREAK;}
	Case "2":{$categoria = "ESP.";BREAK;}
	case "3":{$categoria = "ALTA.";BREAK;}
}



  $sql11="select * from convenio_practica where cod_practica = $cod_practica";
$result11 = $db->Execute($sql11);
$honorarios=$result11->fields["honorarios"];
$categoria=$result11->fields["categoria"];


 $sql="select * from arancel where nro_os = $nro_os";
$result8 = $db->Execute($sql);
 
$modalidad=ucwords($result8->fields["modalidad"]);
 $vuh=$result8->fields["uh"];
$vug=$result8->fields["ug"];

$modalidad_especiales=ucwords($result8->fields["modalidad_especiales"]);
$vuh_especiales=ucwords($result8->fields["uh_especiales"]);
$vug_especiales=ucwords($result8->fields["ug_especiales"]);

$modalidad_alta=ucwords($result8->fields["modalidad_alta"]);
$vuh_alta=ucwords($result8->fields["uh_alta"]);
$vug_alta=ucwords($result8->fields["ug_alta"]);


$vuh1=$result8->fields["uh"];
$vug1=$result8->fields["ug"];



$sql11="select * from incremento where nro_os = $nro_os";
$result811 = $db->Execute($sql11);

$material_descartable=ucwords($result811->fields["material_descartable"]);
$acto_bioquimico=ucwords($result811->fields["acto_bioquimico"]);
$toma_muestra=ucwords($result811->fields["toma_muestra"]);


switch ($categoria){
	case "1":{
$valor = (round($vuh * $honorarios,2));
$cat = "COM";
		BREAK;
	}

		case "2":{
			$cat = "ESP";
$valor = (round($vuh_especiales * $honorarios,2));
	BREAK;
	}

		case "3":{
						$cat = "A. COMP.";
$valor = (round($vuh_alta * $honorarios,2));	
		BREAK;
	}

}






  $sql8="select * from a_practicas_rechazadas where cod_practica = '$cod_practica' and nro_os = $nro_os and plan = '$nro_plan'";
$result8 = $db->Execute($sql8);
$cod_practi=$result8->fields["cod_practica"];
$motivo=$result8->fields["motivo"];
$fecha4=$result8->fields["fecha"];


IF ($cod_practi == ""){
 $sql8="select * from a_practicas_rechazadas where cod_practica = '$cod_practica' and nro_os = $nro_os";
$result8 = $db->Execute($sql8);
$cod_practi=$result8->fields["cod_practica"];
$motivo=$result8->fields["motivo"];
$fecha4=$result8->fields["fecha"];

}

if ($cod_practi != ""){
$motivo1 = "RECHAZA PRACTICA N° ".$cod_practica."  ".$nombre_practica." de la Obra Social: ".$sigla." (".$nro_os.") MOTIVO: ".$motivo." FECHA INHIBICION: (".$fecha4.")";
$autorizar = "AUTORIZAR";
}else
	 {
$autorizar = "";
	 }



IF (($nro_os == 5080) OR ($nro_os == 4975) OR ($nro_os == 4940)){
 $sql8="select * from a_practicas_rechazadas where cod_practica = '$cod_practica' and nro_os = $nro_os and plan = '$nombre_plan'";
$result8 = $db->Execute($sql8);
$cod_practi=$result8->fields["cod_practica"];
$motivo=$result8->fields["motivo"];
$fecha4=$result8->fields["fecha"];
 $tipo=$result8->fields["tipo"];
}else{
 $sql8="select * from a_practicas_rechazadas where cod_practica = '$cod_practica' and nro_os = $nro_os";
$result8 = $db->Execute($sql8);
$cod_practi=$result8->fields["cod_practica"];
$motivo=$result8->fields["motivo"];
$fecha4=$result8->fields["fecha"];
$tipo=$result8->fields["tipo"];
}


$dia4 = substr($fecha4,8,2);
$mes4 = substr($fecha4,5,2);
$anio4 = substr($fecha4,0,4);
$fecha4 = $dia4."/".$mes4."/".$anio4;


if ($cod_practi != ""){
$motivo1 = "RECHAZA PRACTICA N° ".$cod_practica."  ".$nombre_practica." de la Obra Social: ".$sigla." (".$nro_os.") MOTIVO: ".$motivo." FECHA INHIBICION: (".$fecha4.")";
$autorizar = "AUTORICE PRACTICA O SERA DEBITADAa";
}else
	 {
$autorizar = "";
	 }




 

if (($comunes1 == "SI") and ($categoria == 1)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}
if (($especiales1== "SI") and ($categoria == 2)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}
if (($alta1== "SI")and ($categoria == 3)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}

if ($tipo == "A"){$autorizar = "AUTORIZAR";}
if ($tipo == "R"){$autorizar = "RECHAZADA";}
if ($tipo == "E"){$autorizar = "EXCLUIDA";}

if ($categoria == 0){
 $autorizar = "PRACTICA PROPIA LABORATORIO";
}



?>
<tr bordercolor="#FFFFFF"> 
<td width="44" height="22" bgcolor="#F0F0F0"><div align="center" class="Estilo40"><?php print("$cod_practica");?></div></td>
<td width="359" valign="top" bgcolor="#F0F0F0"><div align="left"><?php print("$practica");?>  <a href="agregar_practica.php?cod_practica=<?php print("$cod_practica");?>&&nombre_plan=<?php print("$nombre_plan");?>&&nro_os=<?php print("$nro_os");?>" target = "central"></a></div></td>
<td width="33" valign="top" bgcolor="#F0F0F0"><div align="right"><a href="agregar_practica.php?cod_practica=<?php print("$cod_practica");?>&&nombre_plan=<?php print("$nombre_plan");?>&&nro_os=<?php print("$nro_os");?>" target = "central"><img src="../../imagenes/office//316.ico" alt="Modificar" border = "0"></a></div></td>
<td width="124" valign="top" bgcolor="#F0F0F0"><div align="center" class="Estilo47 Estilo48"><?php if ($autorizar != ''){ print("$autorizar");}?></div></td>
<td valign="top" bgcolor="#F0F0F0"><div align="center"><?php print("$cat");?><a></div></td>
<td valign="top" bgcolor="#F0F0F0"><div align="center"><?php print("$honorarios");?></div></td>
<td valign="top" bgcolor="#F0F0F0"><div align="right" class="Estilo42">$ <?php echo number_format($valor,2);?></div></td>

<?php if ($autorizar != ''){?>
 
<?php }


 
$result->MoveNext();
	}

$valor_final = 0;
$valor_toma = 0;

?>
</table>

<?PHP break;}

case "VER PRESUPUESTO":{

include_once ("ver_presupuesto.php");

	BREAK;
}

case "         LIMPIAR TODO     ":{

$sql8="delete from detalle_presupuesto ";
$result8 = $db->Execute($sql8);
include_once ("ver_presupuesto.php");
	BREAK;
}

}



?>

</body>
</html>
