
<BODY background="pescar.bmp"><CENTER><TABLE WIDTH="90%" BORDER=0><TR><TD>  

<?php 
include ("../../../conexiones/config.inc.php");
$nro_os=$_POST["nro_os"];//110

$sigla=$_POST["sigla"];//110
$cod_practica=$_POST["cod_practica"];//110
$practica=$_POST["practica"];//110

$categori=$_POST["categoria"];
for ($i=0;$i<count($categori);$i++)    
	{     
	$categoria = $categori[$i];    
	}



$honorarios="";
$gastos="";
$material_descartable=$_POST["material_descartable"];
$toma=$_POST["toma"];
$urgencia=$_POST["urgencia"];
$valor=$_POST["valor"];
$autorizada=$_POST["autorizada"];
$equivalencia=$_POST["equivalencia"];

//include ("../../../conexiones/config_os.php");
//$sql1="select * from datos_os where nro_os like '$sigla'";
//$result1 = $db->Execute($sql1);

//if (!$result1) die("no existe obra social".$db->ErrorMsg());
//while (!$result1->EOF) {
//$nro_os=$result1->fields["nro_os"];
//$result1->MoveNext();
//}

include ("../../../conexiones/config.inc.php");

$sql1="SELECT COUNT(*) as convenio_practica FROM convenio_practica where cod_practica = '$cod_practica' and nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);


$cantidad=$result1->fields["convenio_practica"];


switch ($cantidad) 
	 {

	case "0":
		 {
		echo "Esta practica no existe";
 $sql = "INSERT INTO `convenio_practica` ( `cod_practica` , `nro_os` , `cod_equivalencia` ,`categoria` , `honorarios` , `gastos` , `toma` , `urgencia` , `material_descartable` , `valor` , `autorizada` ) VALUES ( '$cod_practica' , '$nro_os' , '$equivalencia' , '$categoria' , '$honorarios' , '$gastos' , '$toma' , '$urgencia' , '$material_descartable' , '$valor' , '$autorizada')";
mysql_query($sql);
	 
	 break;

	 }

	 case "1":
	 {
	 echo "Esa practica ya existe";

	break;
	 }

 }





 $cod_practica = $cod_practica +1;
$prueba = $cod_practica +1;
include ("valor.php");



/* $result2 = $db->Execute("select * from practica");

if (!$result2) die("No existe esa practica".$db->ErrorMsg());
 while (!$result2->EOF) {


echo "y que te pasa.".$practica4=$result2->fields["practica"];
$cod_practica=$result2->fields["cod_practica"];

$result2->MoveNext();
	}

//	echo "y que te pasa.".$practica4;

//include ("valor.php");




/*

echo $practica=$_POST["practica"];//110
	

include ("../../../conexiones/config.inc.php");
$sql="select * from practica where cod_practica like '$practica'";
$result = $db->Execute($sql);
//if (!$result) die("No existe esa practica".$db->ErrorMsg());

//while (!$result->EOF) {
//$cod_practica=$result->fields["cod_practica"];
//$result->MoveNext();
//	}


$sigla=$_POST["sigla"];//10
	




 $categoria=$_POST["categoria"];
 $honorarios=$_POST["honorarios"];
 $gastos=$_POST["gastos"];
 $material_descartable=$_POST["material_descartable"];
 $toma=$_POST["toma"];
 $urgencia=$_POST["urgencia"];
 $valor=$_POST["valor"];
 $autorizada=$_POST["autorizada"];




include ("../../../conexiones/config.inc.php");
$sql2="select * from convenio_practica where nro_os like '$sigla' and cod_practica like '$practica' ";
$result2 = $db->Execute($sql2);

$cod_practica=$result->fields["cod_practica"];


$sql = "INSERT INTO `convenio_practica` ( `cod_practica` , `nro_os` , `categoria` , `honorarios` , `gastos` , `toma` , `urgencia` , `material_descartable` , `valor` , `autorizada` ) VALUES ( '$cod_practica' , '$nro_os' , '$categoria' , '$honorarios' , '$gastos' , '$toma' , '$urgencia' , '$material_descartable' , '$valor' , '$autorizada')";
mysql_query($sql);


include ("../../../a_sectores/auditoria/a_practicas/detalle.php");

*/
