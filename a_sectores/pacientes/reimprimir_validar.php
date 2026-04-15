<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
<link href="../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo55 {font-family: "Trebuchet MS"; font-size: 10px; }
.Estilo56 {font-family: "Trebuchet MS"; font-weight: bold; }
.Estilo63 {font-family: "Trebuchet MS"; font-size: 14px; font-weight: bold; }
.Estilo65 {font-family: "Trebuchet MS"; font-size: 14px; }
.Estilo4 {
	font-size: 12px;
	font-weight: bold;
}
.Estilo5 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>

<script language="javascript">

function imprimir()
{
hhh.style.visibility = 'hidden';
window.print();
} 

function ver()
{
hhh.style.visibility = 'visible';
} 



</script>


<body  onLoad="window.imprimir();   ">
<?php




 $cod_grabacion = $_REQUEST['cod_grabacion'];
$usuario = $_REQUEST['usuario'];

include ("../../conexiones/config.inc.php");
 $sql1="select * from ordenes where cod_grabacion = '$cod_grabacion'";
 $result1 = $db->Execute($sql1);

  $nro_afiliado=$result1->fields["nro_afiliado"];
  $numero_credencial=$result1->fields["nro_afiliado"];

  $mensaje_osde=$result1->fields["mensaje_osde"];
 // $mensaje_osde = nl2br( stripslashes( htmlentities($mensaje_osde)));


  $Descripcionrespuesta=$result1->fields["mensaje_osde"];

    $autorizacion_ws=$result1->fields["autorizacion_ws"];
	  $autorizacion=$result1->fields["autorizacion"];
 $nro_os=$result1->fields["nro_os"];
 $fecha_osde=$result1->fields["fecha_osde"];
 $fecha_sancor=$result1->fields["fecha_osde"];
  $nro_paciente=$result1->fields["nro_paciente"];
  $cuit=$result1->fields["cuit_osde"];

 $dia11 = substr($fecha_osde,6,2);
  $mes11= substr($fecha_osde,4,2);
   $anio11 = substr($fecha_osde,0,4);

$fecha_osde = $dia11."/".$mes11."/".$anio11;


 $dia11 = substr($fecha_osde,6,2);
  $mes11= substr($fecha_osde,4,2);
   $anio11 = substr($fecha_osde,0,4);
$fecha_sancor = $dia11."/".$mes11."/".$anio11;


 $sql="select * from pacientes where nro_paciente = $nro_paciente";
 $result = $db->Execute($sql);

 	
 $nro_paciente=$result->fields["nro_paciente"];
 $nombre=strtoupper($result->fields["nombre"]);
  $apellido=strtoupper($result->fields["apellido"]);
    $Planrta=strtoupper($result->fields["plan"]);

 $sql="select * from datos_osde where cuit = $cuit";
 $result5 = $db->Execute($sql);

$nro_laboratorio1=strtoupper($result5->fields["cuenta_abm"]);
$sucursal=strtoupper($result5->fields["sucursal"]);
$prestador=strtoupper($result5->fields["prestador"]);




$leyenda1 = "N° ABM ".$autorizacion;






if ($nro_os == 1041){
 $leyenda = "OSDE: ".$autorizacion_ws;

 //echo $mensaje_osde;
?>

<!-- <table width="215" border="0" cellpadding="0" cellspacing="0">

  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3"><?php echo $apellido;?><?php echo $nombre;?></div>     </td>
  </tr>
      
   <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3"> -->
	
	
	<?php 
	
	/*$porciones = explode("--------------------------------------", $mensaje_osde);
	echo $porciones[0]; // porción1
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[1]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[2]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[3]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[4]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[5]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[6]; // porción2


/*
$practicas = $porciones[6]; // porción2

$practi = explode("(P", $practicas);
echo "(P".$practi[0];
echo "<br>";
echo "(P".$practi[1];
echo "<br>";
echo "(P".$practi[2];
echo "<br>";
echo "(P".$practi[3];


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


echo "<br>";
echo "--------------------------------------";
echo "<br>";
 

echo $firma = substr($fir,0,38);
echo "<br>";
echo $aclaracion = substr($porciones[8],38,38);
echo "<br>";
echo $tipo = substr($porciones[8],76,38);
echo "<br>";
echo $tipo2 = substr($porciones[8],114,38);
echo "<br>";

*/
?><!-- </span></td>
  </tr>


</table> -->
    <table width="230" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#F0F0F0"><div align="left" class="Estilo3">
            <?php  $apellido;?>
            <?php  $nombre;?>
        </div></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0"><span class="Estilo3">
          <?php 
	
	//  $mensaje_printer = nl2br( stripslashes( htmlentities($mensaje_printer)));
 echo $mensaje_osde;

	/*$porciones = explode("--------------------------------------", $mensaje_printer);
	echo $porciones[0]; // porci&oacute;n1
echo "<br>";
echo "*--------------------------------------";
echo "<br>";
echo $porciones[1]; // porci&oacute;n2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[2]; // porci&oacute;n2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[3]; // porci&oacute;n2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[4]; // porci&oacute;n2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[5]; // porci&oacute;n2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[6]; // porci&oacute;n2

*/


/*
$practicas = $porciones[6]; // porci&oacute;n2

$practi = explode("(P", $practicas);
echo "(P".$practi[0];
echo "<br>";
echo "(P".$practi[1];
echo "<br>";
echo "(P".$practi[2];
echo "<br>";
echo "(P".$practi[3];


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
*/

/*
echo "<br>";
echo "--------------------------------------";
echo "<br>";
 

echo $firma = substr($fir,0,38);
echo "<br>";
echo $aclaracion = substr($porciones[8],38,38);
echo "<br>";
echo $tipo = substr($porciones[8],76,38);
echo "<br>";
echo $tipo2 = substr($porciones[8],114,38);
echo "<br>";
*/

?>
        </span></td>
      </tr>
    </table>
<table width="230" border="2" cellspacing="0">
  <tr>
    <th height="31" bgcolor="#EDEDED" scope="col"><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </th>
  </tr>
</table>

<?php


} elseif ($nro_os == 4723){



 $leyenda = "SWISS: ".$autorizacion_ws;

 ?>
 <table width="230" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#F0F0F0"><div align="left" class="Estilo3">
            <?php  $apellido;?>
            <?php  $nombre;?>
        </div></td>
      </tr>
      <tr>
        <td bgcolor="#F0F0F0"><span class="Estilo3">
          <?php 
	

 echo $mensaje_osde;

?>
        </span></td>
      </tr>
    </table>

<table width="230" border="2" cellspacing="0">
  <tr>
    <th height="31" bgcolor="#EDEDED" scope="col"><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </th>
  </tr>
</table>

<?php


}elseIF ($nro_os == 5080){
 $leyenda = "SANCOR: ".$autorizacion_ws;
?>
<table width="315" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo56">VALIDACION SANCOR - SULB </div></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Fecha Validación: <?php echo $fecha_osde;?> </span></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1"><?php echo $nro_laboratorio1;?> <?php echo $prestador;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Cuit: <?php echo $cuit;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><div align="left" class="Estilo3"><span class="Estilo3 Estilo1">Afiliado: <?php echo $apellido;?>, <?php echo $nombre;?></span></div>     </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">N&deg; Credencial: <?php echo $numero_credencial;?></span></td>
  </tr>
  

  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Plan: <?php echo $Planrta;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Rta Sancor:</span></div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><div align="center"><span class="Estilo3 Estilo1"><span class="Estilo5"> <?php echo $Descripcionrespuesta;?></span></span></div></td>
  </tr>
      
	   <?php $sql10="select * from detalle WHERE (cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000) or (cod_grabacion = '$cod_grabacion' and facturar = 1 and nro_practica < 10000)";
$result10 = $db->Execute($sql10);
if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
  $nro_practica=$result10->fields["nro_practica"];


$cont = $cont + 1;

$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

$practica = substr($practica,0,40);

 ?>  <tr>
     <td width="41" height="21" bgcolor="#F0F0F0"><div align="right"><span class="Estilo4 Estilo1"><?php echo $nro_practica;?>&nbsp;</span></div></td>
     <td width="268" bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;<?php echo $practica;?></span></td>
	   </tr>

<?php


$result10->MoveNext();
	}



?>
</table>


<table width="315" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><center><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </center></th>
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

<?PHP

	}elseIF ($nro_os == 5543){
 $leyenda = "STAFF MEDICO: ".$autorizacion_ws;
?>
<table width="315" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo56">VALIDACION STAFF - SULB </div></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Fecha Validación: <?php echo $fecha_osde;?> </span></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1"><?php echo $nro_laboratorio1;?> <?php echo $prestador;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Cuit: <?php echo $cuit;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><div align="left" class="Estilo3"><span class="Estilo3 Estilo1">Afiliado: <?php echo $apellido;?>, <?php echo $nombre;?></span></div>     </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">N&deg; Credencial: <?php echo $numero_credencial;?></span></td>
  </tr>
  

  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Plan: <?php echo $Planrta;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Rta STAFF: </span></div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><div align="center"><span class="Estilo3 Estilo1"><span class="Estilo5"> <?php echo $Descripcionrespuesta;?></span></span></div></td>
  </tr>
      
	   <?php $sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000";
$result10 = $db->Execute($sql10);
if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
  $nro_practica=$result10->fields["nro_practica"];


$cont = $cont + 1;

$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

$practica = substr($practica,0,40);

 ?>  <tr>
     <td width="41" height="21" bgcolor="#F0F0F0"><div align="right"><span class="Estilo4 Estilo1"><?php echo $nro_practica;?>&nbsp;</span></div></td>
     <td width="268" bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;<?php echo $practica;?></span></td>
	   </tr>

<?php


$result10->MoveNext();
	}



?>
</table>


<table width="315" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><center><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </center></th>
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

<?PHP
}elseIF ($nro_os == 5396){
 $leyenda = "BOREAL: ".$autorizacion_ws;
?>
<table width="315" border="1" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->

  <tr>
    <td height="24" colspan="3" valign="top" bgcolor="#B8B8B8"><div align="center" class="Estilo56">VALIDACION BOREAL - SULB </div></td>
  </tr>

  <tr>
    <td height="22" colspan="3" valign="top" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Fecha Validación: <?php echo $fecha_osde;?></span></td>
  </tr>

  <tr>
    <td height="21" colspan="3" valign="top" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1"><?php echo $nro_laboratorio1;?> <?php echo $prestador;?></span></td>
  </tr>

  <tr>
    <td height="22" colspan="3" valign="top" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Cuit: <?php echo $cuit;?></span></td>
  </tr>
  <tr>
    <td height="22" colspan="3" valign="top" bgcolor="#F0F0F0"><div align="left" class="Estilo3"><span class="Estilo3 Estilo1">Afiliado: <?php echo $apellido;?>, <?php echo $nombre;?></span></div></td>
  </tr>
  <tr>
    <td height="22" colspan="3" valign="top" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">N&deg; Credencial: <?php echo $numero_credencial;?></span></td>
  </tr>
  

  <tr>
    <td height="22" colspan="3" valign="top" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Plan: <?php echo $Planrta;?></span></td>
  </tr>
  <tr>
    <td height="20" colspan="3" valign="top" bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Rta BOREAL:</span></div></td>
  </tr>
  <tr>
    <td height="21" colspan="3" valign="top" bgcolor="#F0F0F0"><div align="center"><span class="Estilo3 Estilo1"><span class="Estilo5"> <?php echo $Descripcionrespuesta;?></span></span></div></td>
  </tr>

<tr>
  <td colspan="2" bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Practicas informadas </span></div></td>
  <td width="34" bgcolor="#B8B8B8"><div align="center"><span class="Estilo4">Cos.</span></div></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>

      
	   <td>&nbsp;</td>
	   <?php $sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000";
$result10 = $db->Execute($sql10);
if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
  $nro_practica=$result10->fields["nro_practica"];
  $coseguro=$result10->fields["coseguro"];
$PracticaObs=$result10->fields["PracticaObs"];
    if ($coseguro == 0){
	  $coseguro = "";
	  }


$cont = $cont + 1;

$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
$practica = substr($practica,0,40);

 ?>  
<tr>


<td width="38" bgcolor="#F0F0F0"><div align="right"><span class="Estilo4 Estilo1"> <?php echo $nro_practica;?>&nbsp;</span></div></td>
   <td width="235" bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;<?php echo $practica;?> <?php echo $PracticaObs;?></span></td>
   <td bgcolor="#F0F0F0"><div align="right"><span class="Estilo4 Estilo1"><?php echo $coseguro;?></span></div></td>
</tr>


<?php


$result10->MoveNext();
	}



?>
</table>

	
<table width="315" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><center><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </center></th>
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

<?PHP
}elseIF ($nro_os == 5073){
 $leyenda = "PAMI: ".$autorizacion_ws;
?>
<table width="315" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo56">VALIDACION PAMI - SULB </div></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Fecha Validación: <?php echo $fecha_osde;?></span></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1"><?php echo $nro_laboratorio1;?> <?php echo $prestador;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Cuit: <?php echo $cuit;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><div align="left" class="Estilo3"><span class="Estilo3 Estilo1">Afiliado: <?php echo $apellido;?>, <?php echo $nombre;?></span></div>     </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">N&deg; Credencial: <?php echo $numero_credencial;?></span></td>
  </tr>
  

  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Plan: <?php echo $Planrta;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Rta PAMI</span></div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><div align="center"><span class="Estilo3 Estilo1"><span class="Estilo5"> <?php echo $Descripcionrespuesta;?></span></span></div></td>
  </tr>

  <tr>
  <td colspan="2" bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Practicas informadas </span></div></td>
</tr>
<tr>

      
	   <?php $sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000";
$result10 = $db->Execute($sql10);
if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
  $nro_practica=$result10->fields["nro_practica"];
$PracticaObs=$result10->fields["PracticaObs"];

$cont = $cont + 1;

$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
$practica = substr($practica,0,40);

 ?>     <tr>  <td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1 Estilo2">&nbsp; <?php echo $nro_practica;?> <?php echo $practica;?></span><span class="Estilo4 Estilo1 Estilo2">&nbsp;&nbsp;</span></td>
   </tr>  <tr>
     <td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1 Estilo2">&nbsp;&nbsp;&nbsp; &nbsp; <?php echo $PracticaObs;?> </span></td>
     </tr>

<?php


$result10->MoveNext();
	}




?>
</table>

	
<table width="315" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><center><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </center></th>
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
	}elseif (($nro_os != 5080) and ($nro_os != 1041) and ($nro_os != 5396) and ($nro_os != 5073) ){?>

<table width="315" border="0" cellpadding="0">
  <tr>
    <th colspan="4" bgcolor="#B8B8B8" scope="col"><span class="Estilo56">REGISTRACION</span></th>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#F0F0F0"><div align="center" class="Estilo65">ABM</div></td>
  </tr>
  <tr>
    <td colspan="4">----------------------------------</td>
  </tr>
  <tr>
    <td colspan="4"><span class="Estilo63"><?php echo $leyenda1;?></span></td>
  </tr>
  <tr>
    <td colspan="4"><span class="Estilo55">Fecha: <?php echo $fecha_osde;?></span></td>
  </tr>
  <tr>
    <td colspan="4">----------------------------------</td>
  </tr>
  <tr>
    <td colspan="4"><span class="Estilo55">Afiliado: <?php echo $apellido;?> <?php echo $nombre;?></span></td>
  </tr>
  <tr>
    <td colspan="4">----------------------------------</td>
  </tr>
  <tr>
    <td colspan="4"><span class="Estilo55">N&deg; Afiliado: <?php echo $nro_afiliado;?></span></td>
  </tr>
  <tr>
    <td colspan="4">----------------------------------</td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#F0F0F0"><div align="center"><span class="Estilo65">Practicas:</span></div></td>
  </tr>
 
  
  <?php
 $sql10="select * from detalle where cod_grabacion = $cod_grabacion order by orden, cod_operacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

 $nro_practica=strtoupper($result10->fields["nro_practica"]);

 $sql8="select * from a_practicas_rechazadas where cod_practica = '$nro_practica' and nro_os = $nro_os";
$result8 = $db->Execute($sql8);
$cod_practi=$result8->fields["cod_practica"];
$motivo=$result8->fields["motivo"];
$fecha4=$result8->fields["fecha"];

$dia4 = substr($fecha4,8,2);
$mes4 = substr($fecha4,5,2);
$anio4 = substr($fecha4,0,4);
$fecha4 = $dia4."/".$mes4."/".$anio4;


if ($cod_practi != ""){
$motivo1 = "RECHAZA PRACTICA N° ".$cod_practica."  ".$nombre_practica." de la Obra Social: ".$sigla." (".$nro_os.") MOTIVO: ".$motivo." FECHA INHIBICION: (".$fecha4.")";
$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";
}
 

  $sql8="select * from planes_os where nro_os = $nro_os and nombre_plan = 'TODOS'";
$result8 = $db->Execute($sql8);

 $nombre_plan=$result8->fields["nombre_plan"];
 $comunes=$result8->fields["comunes"];
$especiales=$result8->fields["especiales"];
 $alta=$result8->fields["alta"];

if (($comunes1 == "SI") and ($categoria == 1)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}
if (($especiales1== "SI") and ($categoria == 2)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}
if (($alta1== "SI")and ($categoria == 3)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}


$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
$categoria=strtoupper($result8->fields["categoria"]);
$honorarios=strtoupper($result8->fields["honorarios"]);
$practica = substr($practica,0,40);

?>

  <tr>
    <td width="38" height="18"><span class="Estilo55"><?php echo $nro_practica;?></span></td>
    <td width="104"><span class="Estilo55"><?php echo $practica;?></span></td>
    <td width="66"><div align="center"><span class="Estilo55"><?php echo $autorizar;?></span></div></td>
  </tr>

<?php

$result10->MoveNext();
		}

?>

  <tr>
    <td height="48" colspan="3" bgcolor="#F0F0F0"><div align="center" class="Estilo56">
      <div align="center">SULB - ABM </div>
    </div></td>
  </tr>
</table>
<?php


}

?>

 
  <table width="315" border="1">
    <tr>
      <td width="166"><div align="center"><a href="buscar_paciente_individual_validar.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"> Volver al paciente</a></div></td>
      <td width="133"><div align="center"><a href="reimprimir_validar.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>">RE-IMPRIMIR</a></div></td>
    </tr>
  </table>
 
