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



if (file_exists('respuesta_boreal.xml')) {

	$xml = simplexml_load_file('respuesta_boreal.xml');

//var_dump($xml);

//LECTURA DEL ARRAY
//$result = obj2array($xml);
//echo $respuestas=$result['Practicas'];


//var_dump ($respuestas);



// $practicas = $xml->Practicas->Practica->PracticaId;
// echo$coseguro = $xml->Practicas->Practica->PracticaCoseguro;
// echo$estado = $xml->Practicas->Practica->PracticaIdEstado;
// echo$desc = $xml->Practicas->Practica->PracticaDes;




/* Para cada <personaje>, mostramos cada <nombre>. */
foreach ($xml->Practicas->Practica as $personaje) {

 
  $PracticaId =  $personaje->PracticaId;
  $PracticaDes =  $personaje->PracticaDes;
  $PracticaCoseguro =  $personaje->PracticaCoseguro;
  $PracticaIdEstado =  $personaje->PracticaIdEstado;

  if ($PracticaCoseguro == 0){
	  $PracticaCoseguro = "";
	  }

$Prestacion = substr($PracticaId,2,4)*1;

  if ($PracticaId != 660001){
	 
	  
?><td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;&nbsp;&nbsp;<?php echo $Prestacion;?> - <?php echo $PracticaDes;?> <?php echo $PracticaCoseguro;?></span></td>
   </tr><?php
}
}



  //  print_r($xml);
} else {
    exit('Error abriendo respuesta_pami.xml.');
}






?>

