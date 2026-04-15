<?php
	switch ($nro_practica){

		case "5":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 109";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 139";
mysql_query($sql);

  $sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 404";
mysql_query($sql);

  $sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 716";
mysql_query($sql);

  $sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 742";
mysql_query($sql);
break;}

		case "109":
		case "139":
		case "404":
		case "716":
		case "742":

 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 5";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;

///////////////////////////////////////////////

case "102":
 $sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 101";
mysql_query($sql);
break;



//////////////////////////

	case "101":

 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 102";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;




/////////////////////////
case "171":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 169";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 746";
mysql_query($sql);

  $sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 771";
mysql_query($sql);

  $sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 887";
mysql_query($sql);

break;}

		case "169":
		case "746":
		case "771":
		case "887":


 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 171";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;

/////////////////////////
case "187":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 104";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 105";
mysql_query($sql);


break;}

		case "104":
		case "105":
	

 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 187";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;

//////////////////////////
case "193":
 $sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 192";
mysql_query($sql);
break;



	case "192":

 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 193";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "245":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 242";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 243";
mysql_query($sql);


break;}

		case "242":
		case "243":
	

 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 245";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "309":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 105";
mysql_query($sql);



break;}

		case "105":
		
	

 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 309";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "433":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 813";
mysql_query($sql);




break;}

		case "813":
		
 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 433";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "468":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 105";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 665";
mysql_query($sql);


break;}

		case "105":
		case "665":
	

 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 468";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;


/////////////////////////
case "475":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 354";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 409";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 410";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 466";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 470";
mysql_query($sql);


break;}

		case "354":
		case "409":
		case "410":
		case "466":
		case "470":

	

 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 475";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;


/////////////////////////
case "481":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 110";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 357";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 873";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 874";
mysql_query($sql);




break;}

		case "110":
		case "357":
		case "873":
		case "874":
	
	

 $sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 481";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;


/////////////////////////
case "546":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 753";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 839";
mysql_query($sql);
break;}

		case "753":
		case "839":
$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 546";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;


/////////////////////////
case "547":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 754";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 839";
mysql_query($sql);
break;}

		case "754":
		case "839":
$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 547";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "665":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 664";
mysql_query($sql);

break;}

		case "664":

$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 665";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "764":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 15";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 763";
mysql_query($sql);
break;}

		case "15":
		case "763":
$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 764";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "903":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 105";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 665";
mysql_query($sql);
break;}

		case "105":
		case "665":
$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 903";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;




/////////////////////////
case "911":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 105";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 176";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 35";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 711";
mysql_query($sql);


break;}

		case "105":
		case "176":
		case "35":
		case "711":

$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 911";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;

/// si en una orden se encuentran los cuatro item borrarlos y grabar 911


/////////////////////////
case "1160":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 9580";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 9588";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 1150";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 1030";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 6050";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 6076";
mysql_query($sql);


break;}

		case "9580":
		case "9588":
		case "1150":
		case "1030":
		case "6050":
		case "6076":

$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 1160";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;


/////////////////////////
case "1195":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 338";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 7777";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 7785";
mysql_query($sql);



break;}

		case "338":
		case "7777":
		case "7785":


$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 1195";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;


/////////////////////////
case "1196":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 338";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 7777";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 7785";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 7768";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 7759";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 7751";
mysql_query($sql);


break;}

		case "338":
		case "7777":
		case "7785":
		case "7768":
		case "7759":
		case "7751":

$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 1196";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "2709":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 770";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 771";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 887";
mysql_query($sql);



break;}

		case "770":
		case "771":
		case "887":


$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 2709";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;


/////////////////////////
case "2734":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 1000";
mysql_query($sql);

break;}

		case "1000":

$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 2734";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "4858":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 298";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 167";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 4862";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 355";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 5478";
mysql_query($sql);



break;}

		case "298":
		case "167":
		case "4862":
		case "355":
		case "5478":
		

$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 4858";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "8298":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 174";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 1035";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 1040";
mysql_query($sql);

$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 876";
mysql_query($sql);



break;}

		case "174":
		case "1035":
		case "1040":
		case "876":


$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 8298";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;



/////////////////////////
case "9759":{
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 7700";
mysql_query($sql);

break;}

		case "7700":

$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = 9759";
$result10 = $db->Execute($sql10);

$nro_pra=strtoupper($result10->fields["nro_practica"]);

if ($nro_pra != ''){
$sql="Delete From detalle_temp where cod_grabacion = $operador and operador = $operador and nro_practica = $nro_practica";
mysql_query($sql);
}
break;
/////////****************//////////////////**************************/////////////////////*

}
?>