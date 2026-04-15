<?php


if (file_exists('respuesta_pami.xml')) {

	$xml = simplexml_load_file('respuesta_pami.xml');

var_dump($xml);

echo $xml->Autorizacion->attributes->NroAutoRed; // mostrara Juan Carlos




  //  print_r($xml);
} else {
    exit('Error abriendo respuesta_pami.xml.');
}






?>

