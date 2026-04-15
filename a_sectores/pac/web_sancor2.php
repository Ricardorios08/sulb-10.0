<?php


requiere_once "../../nusoap/lib/nusoap.php";

$client= new nusoap_client("http://x.esancorsalud.com.ar/apawe_ssa.aspx?wsdl", 'wsdl');

$resultado= $client->call("PAWE_SSA.ELEGIBILIDAD", array(
"Entidad"     =>  "30400",  
"Tiponroefector"   =>  "CU",
"Nroefector" =>  "20125735496",
"Formaidafiliado" =>  "AS",
"Afiliado" =>  "12129700",
"Usuario" =>  "WSRVSSA",
"Clave" =>  "15WSSA08"
) );



print_r($resultado);





?>