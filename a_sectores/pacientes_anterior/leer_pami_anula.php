<?php

include("xmlToArray.php");
$xmlNode = simplexml_load_file('respuesta_pami_anula.xml');
$arrayData = xmlToArray($xmlNode);

//aca lo recorres para ir viendo las clave  y los valores
foreach ($arrayData AS $key => $value) {
    foreach ($arrayData[$key] AS $key2 => $value2) {
     
        foreach ($value2 AS $key3 => $valor2) {
           $a = $valor2.";".$a;
		





			//aca hay otro array asi que tendras que seguir iterando porque depende del xml
			if(is_array($valor2)){
            foreach ($valor2 AS $key4 => $valor3) {
            $b= $b.";".$valor3;
            }
			}


        }
    }
}


  echo $a = utf8_decode($a);

  $b = utf8_decode($b);




list($a1,$a2,$a3) = explode(";",$a);



$fecha_anula = $a1;
$mensaje_display = $a2;
$Nroautorizacion = $a3;


?>


	<table width="350" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo42 Estilo1 Estilo4">RESPUESTA DE OBRA SOCIAL PAMI </div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3"><?php echo $apellido;?><?php echo $nombre;?></div>     </td>
  </tr>
      <tr>
    <td bgcolor="#F0F0F0"><div align="left"><span class="Estilo1"><span class="Estilo2"></span></span><span class="Estilo3"><?php echo $mensaje_display;?></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3"><?php echo $Nroautorizacion;?></span></td>
  </tr>

  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3">ORDEN ANULADA: <?php echo $autorizacion_ws;?></span></td>
  </tr>
 

</table>


	
