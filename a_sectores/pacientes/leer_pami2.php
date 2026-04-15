<?php 


function obj2array($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array($val);
         break;
      case is_array($val):
         $out[$key] = obj2array($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}


$xml = simplexml_load_file("respuesta_pami.xml");

$file_xml = "respuesta_pami.xml";
$xml = simplexml_load_file($file_xml, 'SimpleXMLElement',LIBXML_NOCDATA);
   
    print_r($xml); 