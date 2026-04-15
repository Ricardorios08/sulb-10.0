<?php

global $buscador_rapido;



 include("adodb.inc.php");

 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "obrasocial");

$B = 1;

$buscador_rapido=$_POST["buscador_rapido"];
$palabra=$_POST["busca"];


if (($nro_os == "")&&($palabra=="")) {
include ("buscar_prescriptores.php");
}
else
{

}







 
