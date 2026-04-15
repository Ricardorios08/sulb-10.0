<?php 
include ("../../../conexiones/config.inc.php");
$nro_os="4975";

 $Alta=$_POST["Alta"];//110
$cod_practica=$_POST["cod_practica"];//110


switch ($Alta){
	case "Guardar":{

$cod_practica=$_POST["cod_practica"];//110
$practica=$_POST["practica"];//110

$categori=$_POST["categoria"];
for ($i=0;$i<count($categori);$i++)    
	{     
	$categoria = $categori[$i];    
	}

$honorarios=$_POST["honorarios"];
 




$metod=$_POST["metodo"];
for ($i=0;$i<count($metod);$i++)    
	{     
	$metodo = $metod[$i];    
	}




$referencia=$_POST["referencia"];
$referencia1=$_POST["referencia1"];
$referencia2=$_POST["referencia2"];
$referencia3=$_POST["referencia3"];

$por=$_POST["por"];


$unida=$_POST["unidades"];
for ($i=0;$i<count($unida);$i++)    
	{     
	$unidades = $unida[$i];    
	}

	$tipo_de=$_POST["tipo_det"];
for ($i=0;$i<count($tipo_de);$i++)    
	{     
	$tipo_det = $tipo_de[$i];    
	}

$nueva_unidad=$_POST["nueva_unidad"];

$metod=$_POST["metodo"];
for ($i=0;$i<count($metod);$i++)    
	{     
	$metodo = $metod[$i];    
	}

$nuevo_metodo=$_POST["nuevo_metodo"];


$lab_realizacio=$_POST["lab_realizacion"];
for ($i=0;$i<count($lab_realizacio);$i++)    
	{     
	$lab_realizacion = $lab_realizacio[$i];    
	}



$clas=$_POST["clase"];
for ($i=0;$i<count($clas);$i++)    
	{     
	$clase = $clas[$i];    
	}

$clase;
IF ($clase == ""){

$sql1="SELECT * FROM convenio_practica where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$clase=$result1->fields["clase"];
}



$deriva=$_POST["deriva"];
if ($nueva_unidad != ""){


	
 $sql = "SELECT * FROM unidades order by cod_unidad desc";
$result = $db->Execute($sql);
$cod_unidad=$result->fields["cod_unidad"] + 1;

$sql = "INSERT INTO unidades (`cod_unidad`, `unidad`, `nombre_unidad`) VALUES ('$cod_unidad', '$nueva_unidad', '$nueva_unidad')";
$result = $db->Execute($sql);
$unidades = $nueva_unidad;
}

$salto=$_POST["salto"];

if (($cod_practica != 475) or ($cod_practica != 471) or ($cod_practica != 711) or ($cod_practica != 736)){

IF (($salto == 1) OR ($salto == '001')){
$prioridad = 1;
}else{
$prioridad = 0;
}

}

IF ($unidades == ""){

 $sql1="SELECT * FROM convenio_practica where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$unidades=$result1->fields["unidad"];
}

IF ($metodo == ""){

 $sql1="SELECT * FROM convenio_practica where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$metodo=$result1->fields["metodo"];
}





IF ($tipo_det == ""){

 $sql1="SELECT * FROM convenio_practica where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$tipo_det=$result1->fields["tipo_det"];
}


if ($nueva_unidad != ""){
 $sql = "SELECT * FROM unidades order by cod_unidad desc";
$result = $db->Execute($sql);
$cod_unidad=$result->fields["cod_unidad"] + 1;

$sql = "INSERT INTO unidades (`cod_unidad`, `unidad`, `nombre_unidad`) VALUES ('$cod_unidad', '$nueva_unidad', '$nueva_unidad')";
$result = $db->Execute($sql);
$unidades = $nueva_unidad;
}

if ($nuevo_metodo != ""){
 $sql = "SELECT * FROM metodos order by cod_metodo desc";
$result = $db->Execute($sql);
$cod_metodo=$result->fields["cod_metodo"] + 1;

 $sql = "INSERT INTO metodos (`cod_metodo`, `metodo`) VALUES ('$cod_metodo', '$nuevo_metodo')";
$result = $db->Execute($sql);
$metodo = $nuevo_metodo;
}

if ($metodo == "seleccione"){
$metodo = "";
}

if ($unidad == "seleccione"){
$unidad = "";
}

$decimal=$_POST["decimal"];

//$sql = "INSERT INTO `convenio_practica` ( `cod_practica`, `nro_os`, `cod_equivalencia`, `categoria`, `honorarios`, `gastos`, `valor`, `practica`, `metodo`, `referencia`, `prioridad`, `salto`, `referencia1`, `referencia2`, `referencia3`, `unidad` , `nueva`) VALUES ( '$cod_practica' , '$nro_os' , '$equivalencia' , '$categoria' , '$honorarios' , '$gastos' ,  '$valor' ,  '$practica' ,  '$metodo' ,  '$referencia' , '$prioridad' , '$salto' , '$referencia1' , '$referencia2' , '$referencia3' , '$unidad' , '1')";
//mysql_query($sql);




if ($tipo_det == ""){
$tipo_det = "Sin Valor Ref.";
}

if ($clase == ""){
$clase = "0";
}

if ($decimal == ""){
$decimal = "0";
}


 echo $sql = "INSERT INTO `convenio_practica` (`cod_practica`, `nro_os`, `cod_equivalencia`, `categoria`, `honorarios`, `gastos`, `valor`, `practica`, `metodo`, `referencia`, `prioridad`, `salto`, `referencia1`, `referencia2`, `referencia3`, `unidad`, `nueva`, `por`, `tipo_det`, `deriva`, `lab_derivacion`, `clase`, `decimal`) VALUES ('$cod_practica', '$nro_os', '$cod_equivalencia', '$categoria', '$honorarios', '$gastos', '$valor', '$practica', '$metodo', '$referencia', '$prioridad', '$salto', '$referencia1', '$referencia2', '$referencia3', '$unidades', '$nueva', '$por', '$tipo_det', '$deriva', '$lab_realizacion', '$clase', '$decimal')";
mysql_query($sql);


 $sql1 = "INSERT INTO `convenio_practica_factura` (`cod_practica`, `nro_os`, `cod_equivalencia`, `categoria`, `honorarios`, `gastos`, `valor`, `practica`) VALUES ('$cod_practica', '$nro_os', '$cod_equivalencia', '$categoria', '$honorarios', '$gastos', '$valor', '$practica')";
mysql_query($sql1);

$leyenda = "SE MODIFICO LA PRACTICA";
include ("../../alertas/campo_informacion.php");

	break;}

	case "OK":{

 


$tip=$_POST["tipo"];
for ($i=0;$i<count($tip);$i++)    
	{     
	$tipo = $tip[$i];    
	}


$desde=$_POST["desde"];
$hasta=$_POST["hasta"];
$columna1=$_POST["columna1"];
$columna2=$_POST["columna2"];
$anio_d=$_POST["anio_d"];
$anio_h=$_POST["anio_h"];

$nro_refe=$_POST["nro_ref"];
for ($i=0;$i<count($nro_refe);$i++)    
	{     
	$nro_ref = $nro_refe[$i];    
	}




  $sql = "INSERT INTO  convenio_referencia (`cod_practica`, `cod_operacion`, `tipo`, `desde`, `hasta`, `unidades`, `columna1`, `columna2`, `anio_d`, `anio_h` , `nro_ref`) VALUES ('$cod_practica', '$cod_operacion', '$tipo', '$desde', '$hasta', '$unidades', '$columna1', '$columna2', '$anio_d', '$anio_h' , '$nro_ref');";
$result = $db->Execute($sql);


$practica=$_POST["practica"];//110

$categori=$_POST["categoria"];
for ($i=0;$i<count($categori);$i++)    
	{     
	$categoria = $categori[$i];    
	}

$clas=$_POST["clase"];
for ($i=0;$i<count($clas);$i++)    
	{     
	$clase = $clas[$i];    
	}

IF ($clase == ""){

 $sql1="SELECT * FROM convenio_practica where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$clase=$result1->fields["clase"];
}

$honorarios=$_POST["honorarios"];
$metodo=$_POST["metodo"];
$referencia=$_POST["referencia"];
$referencia1=$_POST["referencia1"];
$referencia2=$_POST["referencia2"];
$referencia3=$_POST["referencia3"];

$por=$_POST["por"];


$unida=$_POST["unidades"];
for ($i=0;$i<count($unida);$i++)    
	{     
	$unidades = $unida[$i];    
	}

	$tipo_de=$_POST["tipo_det"];
for ($i=0;$i<count($tipo_de);$i++)    
	{     
	$tipo_det = $tipo_de[$i];    
	}

$nueva_unidad=$_POST["nueva_unidad"];


if ($nueva_unidad != ""){
	
 $sql = "SELECT * FROM unidades order by cod_unidad desc";
$result = $db->Execute($sql);
$cod_unidad=$result->fields["cod_unidad"] + 1;

$sql = "INSERT INTO unidades (`cod_unidad`, `unidad`, `nombre_unidad`) VALUES ('$cod_unidad', '$nueva_unidad', '$nueva_unidad')";
$result = $db->Execute($sql);
$unidades = $nueva_unidad;
}


$metod=$_POST["metodo"];
for ($i=0;$i<count($metod);$i++)    
	{     
	$metodo = $metod[$i];    
	}

$nuevo_metodo=$_POST["nuevo_metodo"];


if ($nuevo_metodo != ""){
 $sql = "SELECT * FROM metodos order by cod_metodo desc";
$result = $db->Execute($sql);
$cod_metodo=$result->fields["cod_metodo"] + 1;

$sql = "INSERT INTO metodos (`cod_metodo`, `metodo`) VALUES ('$cod_metodo', '$nuevo_metodo')";
$result = $db->Execute($sql);
$metodo = $nuevo_metodo;
}


$salto=$_POST["salto"];

if (($cod_practica != 475) or ($cod_practica != 471) or ($cod_practica != 711) or ($cod_practica != 736)){

IF (($salto == 1) OR ($salto == '001')){
$prioridad = 1;
}else{
$prioridad = 0;
}

}

IF ($unidades == ""){

 $sql1="SELECT * FROM convenio_practica where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$unidades=$result1->fields["unidad"];
}

IF ($tipo_det == ""){

 $sql1="SELECT * FROM convenio_practica where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$tipo_det=$result1->fields["tipo_det"];
}


if ($metodo == "seleccione"){
$metodo = "";
}

if ($unidad == "seleccione"){
$unidad = "";
}

  $sql = "UPDATE convenio_practica SET `practica` = '$practica' , `metodo` = '$metodo' , prioridad = '$prioridad'   , unidad = '$unidades' , tipo_det = '$tipo_det' , `por` = '$por' , `clase` = '$clase'   WHERE `cod_practica` = '$cod_practica'  LIMIT 1";
$result = $db->Execute($sql);

$decimal=$_POST["decimal"];
      $sql = "UPDATE convenio_practica SET `honorarios` = '$honorarios' , `practica` = '$practica' , `metodo` = '$metodo' , prioridad = '$prioridad'   , unidad = '$unidades' , tipo_det = '$tipo_det' , `por` = '$por' , `clase` = '$clase' , `lab_derivacion` = '$lab_realizacion' , `deriva` = '$deriva' , `decimal` = '$decimal' WHERE `cod_practica` = '$cod_practica'  LIMIT 1";
$result = $db->Execute($sql);
break;}


}


$modulo1=$_POST["modulo1"];
$modulo2=$_POST["modulo2"];
$modulo3=$_POST["modulo3"];
$modulo4=$_POST["modulo4"];
$modulo5=$_POST["modulo5"];
$modulo6=$_POST["modulo6"];
$modulo7=$_POST["modulo7"];
$modulo8=$_POST["modulo8"];
$modulo9=$_POST["modulo9"];
$modulo10=$_POST["modulo10"];
$modulo11=$_POST["modulo11"];
$modulo12=$_POST["modulo12"];
$modulo13=$_POST["modulo13"];

 $sql1="SELECT * FROM convenio_practica_modulo where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$cod_pra=$result1->fields["cod_practica"];

if ($clase == 2){
if ($cod_pra == ""){
 $sql = "INSERT INTO  convenio_practica_modulo (`cod_practica`, `modulo1`, `modulo2`, `modulo3`, `modulo4`, `modulo5`, `modulo6`, `modulo7`, `modulo8`, `modulo9`, `modulo10`, `modulo11`, `modulo12`, `modulo13`) VALUES ('$cod_practica', '$modulo1', '$modulo2', '$modulo3', '$modulo4', '$modulo5', '$modulo6', '$modulo7', '$modulo8', '$modulo9', '$modulo10', '$modulo11', '$modulo12', '$modulo13');";
$result = $db->Execute($sql);
}
else
{
 $sql = "UPDATE convenio_practica_modulo SET   `modulo1` = '$modulo1' ,  `modulo2` = '$modulo2' , `modulo3` = '$modulo3' , `modulo4` = '$modulo4' , `modulo5` = '$modulo5' , `modulo6` = '$modulo6' , `modulo7` = '$modulo7' , `modulo8` = '$modulo8' , `modulo9` = '$modulo9' , `modulo10` = '$modulo10' , `modulo11` = '$modulo11' , `modulo12` = '$modulo12' , `modulo13` = '$modulo13'   WHERE `cod_practica` = '$cod_practica' ";
$result = $db->Execute($sql);

}

}



$band = 1;
include ("modificar_referencia.php");