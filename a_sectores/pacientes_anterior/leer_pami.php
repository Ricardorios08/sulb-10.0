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

echo  $a3 = $a3;
 
 ?>

 <table width="215" border="1">
  <tr>
    <td width="101"><div align="center"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"></a><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"> Volver al paciente</a></div></td> 
</table>


<?php



	if ($Codigorespuesta == 'AUTOR. ACEPTADA - IMPRIMA'){

?>

<table width="315" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo2">VALIDACION PAMI SULB </div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3 Estilo1"><?php echo $nro_laboratorio1;?> <?php echo $prestador;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Cuit: <?php echo $cuit_prestador;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3 Estilo1">Afiliado: <?php echo $Apellido;?></div>     </td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">N° Credencial: <?php echo $numero_credencial;?></span></td>
  </tr>
      <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Plan: <?php echo $Planrta;?></span></td>
    </tr>
    <tr>
      <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Respuesta PAMI</span></div></td>
    </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="center"><span class="Estilo3 Estilo1"><span class="Estilo5"><?php echo $Descripcionrespuesta;?></span></span></div></td>
  </tr>

<?php

  $sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000";
$result10 = $db->Execute($sql10);
if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
  $nro_practica=$result10->fields["nro_practica"];


$cont = $cont + 1;

$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);


 ?>  


     <td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;&nbsp;&nbsp;<?php echo $nro_practica;?> - <?php echo $practica;?></span></td>
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
<table width="315" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </th>
  </tr>
</table>
<table width="316" border="0" cellpadding="0">
  <tr>
    <th width="312" scope="col"><div align="left"><span class="Estilo3">Firma: ......................................................</span></div></th>
  </tr>
  <tr>
    <th scope="col"><div align="left"><span class="Estilo3">Tipo y Nro Doc: ........................................ </span></div></th>
  </tr>
  <tr>
    <th scope="col"><div align="left"><span class="Estilo3">Aclaracion: ..............................................</span></div></th>
  </tr>
</table>
<?php 

	include ("abm_ws.php");

	}


	}
	?>


	
