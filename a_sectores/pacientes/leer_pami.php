<?php

include("xmlToArray.php");
$xmlNode = simplexml_load_file('respuesta_pami.xml');
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


 $a = utf8_decode($a);

 $b = utf8_decode($b);


  $a;

list($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8, $a9 ) = explode(";",$a);


$Descripcionrespuesta = $a8;
 $a9;
  $Codigorespuesta = $a8;
  $Nroautorizacion = $a9;
$Apellido = $a7;

   $a3 = $a3;
 

	if ($Codigorespuesta == 'AUTOR. ACEPTADA - IMPRIMA'){

 $xmlfile = file_get_contents("respuesta_pami.xml");
 $ob= simplexml_load_string($xmlfile);
 $json  = json_encode($ob);
 $configData = json_decode($json, true);
 //var_dump($configData);

 //te da el numero de autored
 ($configData["Autorizacion"]["@attributes"]["NroAutoRed"]);
//el listado de prestaciones lo accedes asi
$Prestaciones = $configData["ListaPrestaciones"]["Prestacion"];
//aca te da el de la primera posicion. Hace un for para acceder a todas
  $Prestaciones[0]["@attributes"]["Nombre"];
  $Prestaciones[0]["@attributes"]["Respuesta"];

foreach ($Prestaciones AS $key => $value3) {

  $practica = $Prestaciones[$key]["@attributes"]["Respuesta"];
  $observacion =  $Prestaciones[$key]["@attributes"]["Nombre"];
   
$cod_practica = $practica * 1;

 

 $practica = preg_replace('/[0-9]+/', '', $practica);

$practica = substr($practica, 5); 

 $practica = utf8_decode($practica);


  $sql = "UPDATE `detalle` SET `PracticaObs` = '$practica' WHERE cod_grabacion = '$cod_grabacion' and  nro_practica = '$cod_practica'";
mysql_query($sql);
 
	}

	}// cierra autorizada
	



 ?>



<?php



	if ($Codigorespuesta == 'AUTOR. ACEPTADA - IMPRIMA'){

?>
<style type="text/css">
<!--
.Estilo1 {font-family: Geneva, Arial, Helvetica, sans-serif}
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-weight: bold}
.Estilo5 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>


<table width="315" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td width="311" height="25" bgcolor="#B8B8B8"><div align="center" class="Estilo2 Estilo3">VALIDACION <strong>PAMI</strong> SULB </div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo2 Estilo3"><?php echo $nro_laboratorio1;?> <?php echo $prestador;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo2 Estilo3">Cuit: <?php echo $cuit_prestador;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo2 Estilo3">Afiliado: <?php echo $Apellido;?></div>     </td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo2 Estilo3">N° Credencial: <?php echo $numero_credencial;?></span></td>
  </tr>
      <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo2 Estilo3">Plan: <?php echo $Planrta;?></span></td>
    </tr>
    <tr>
      <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Respuesta PAMI</span></div></td>
    </tr>
  <tr>
    <td height="36" bgcolor="#F0F0F0"><div align="center"><span class="Estilo3 Estilo1"><span class="Estilo5"><?php echo $Descripcionrespuesta;?></span></span></div></td>
  </tr>

<?php

  $sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000";
$result10 = $db->Execute($sql10);
if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
  $nro_practica=$result10->fields["nro_practica"];
$PracticaObs=$result10->fields["PracticaObs"];

$cont = $cont + 1;

$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);


 ?>  


     <tr>  <td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1 Estilo2">&nbsp; <?php echo $nro_practica;?> <?php echo $practica;?></span><span class="Estilo4 Estilo1 Estilo2">&nbsp;&nbsp;</span></td>
   </tr>  <tr>
     <td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1 Estilo2">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $PracticaObs;?></span></td>
     </tr>

<?php


$result10->MoveNext();
	}


	?>
</table>


<?php 
	
	if ($Codigorespuesta == 'AUTOR. ACEPTADA - IMPRIMA'){

		   $sql = "UPDATE pacientes SET  `nombre` = '$Nombre', `apellido` = '$Apellido',`nro_documento` = '$nro_documento', `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' , `ultima_01a` = '$fechaTrx' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
//mysql_query($sql);

$leyenda = "PAMI: ".$Nroautorizacion;

?>
<table width="316" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </th>
  </tr>
</table>
<table width="315" border="0" cellpadding="0">
  <tr>
    <th width="311" scope="col"><div align="left"><span class="Estilo3">Firma: ......................................................</span></div></th>
  </tr>
  <tr>
    <th scope="col"><div align="left"><span class="Estilo3">Tipo y Nro Doc: ........................................ </span></div></th>
  </tr>
  <tr>
    <th scope="col"><div align="left"><span class="Estilo3">Aclaracion: ..............................................</span></div></th>
  </tr>
</table>

<table width="315" border="1">
  <tr>
    <td width="166"><div align="center"><a href="buscar_paciente_individual_validar.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"> Volver al paciente</a></div></td>
    <td width="133"><div align="center"><a href="reimprimir_validar.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>">RE-IMPRIMIR</a></div></td>
  </tr>
</table>


<?php 

	include ("abm_ws.php");

	}


	}

	?> 

