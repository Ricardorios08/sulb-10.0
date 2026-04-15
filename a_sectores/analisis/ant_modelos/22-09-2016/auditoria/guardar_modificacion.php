<?php 
include ("../../conexiones/config.inc.php");
$nro_os="4975";

$cod_practica=$_POST["cod_practica"];//110
$practica=$_POST["practica"];//110

$categori=$_POST["categoria"];
for ($i=0;$i<count($categori);$i++)    
	{     
	$categoria = $categori[$i];    
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

$nueva_unidad=$_POST["nueva_unidad"];


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



$sql = "UPDATE convenio_practica SET `practica` = '$practica' , `metodo` = '$metodo' , `referencia` = '$referencia' , `honorarios` = '$honorarios'  , `salto` = '$salto'  , `referencia1` = '$referencia1' , `referencia2` = '$referencia2' , `referencia3` = '$referencia3' , prioridad = '$prioridad'   , unidad = '$unidades' , `por` = '$por'  WHERE `cod_practica` = '$cod_practica'  LIMIT 1";
$result = $db->Execute($sql);


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



$leyenda = "SE MODIFICO LA PRACTICA";
include ("../../alertas/campo_informacion.php");