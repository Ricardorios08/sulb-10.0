<style type="text/css">
<!--
.Estilo1 {
	color: #FFFFCC;
	font-size: 12px;
}
.Estilo13 {
	font-family: "Trebuchet MS";
	font-size: 12px;
	color: #000000;
}
.Estilo17 {color: #FFFFFF}
.Estilo32 {
	color: #000000;
	font-weight: bold;
}
.Estilo26 {font-size: 12px}
.Estilo28 {font-family: Arial, Helvetica, sans-serif}
.Estilo31 {color: #0000FF; font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo38 {color: #000000; font-family: "Trebuchet MS"; font-weight: bold; font-size: 12px; }
.Estilo39 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>

<?php $hoy=date("d/m/y");?>
<table width="850" border="0">
  <tr bgcolor="#000099">
    <td " colspan="10" bgcolor="#CCCCCC" scope="col"><div align="right"><span class="Estilo13">Listado de Ordenes. Emitido el: <?php echo $hoy;?></span></div></td>
  </tr>
    

<?php 




/*
$sql2="select * from datos_os where nro_os like '$busca'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);
*/

include ("../../conexiones/config.inc.php");

$sql="select * from ordenes where periodo = $mes and ano = $anio order by nro_os";
$result = $db->Execute($sql);

?>    


  <tr bgcolor="#000099">
    <th width="7%" bgcolor="#CCCCCC" scope="row"><span class="Estilo38">Fecha</span></th>

  <th width="7%" bgcolor="#CCCCCC" scope="row"><div align="center" class="Estilo1 Estilo13"><strong>Protocolo </strong></div>      </th>
    <td width="26%" bgcolor="#CCCCCC"><div align="center" class="Estilo38 Estilo17 Estilo26">Paciente</div></td>
	

    <td width="10%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo38">Afiliado</span></div></td>
    <td width="16%" bgcolor="#CCCCCC"><div align="center" class="Estilo38"> OS </div></td>
<td width="10%" bgcolor="#CCCCCC"><div align="center" class="Estilo38">Lote</div></td>
<td width="5%" bgcolor="#CCCCCC"><div align="center" class="Estilo38">Detalle</div></td>

    <td width="7%" bgcolor="#CCCCCC"><div align="center" class="Estilo38">Modificar</div></td>

  </tr>

<?php 


 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_os=strtoupper($result->fields["nro_os"]);
$periodo=strtoupper($result->fields["periodo"]);
$lote=strtoupper($result->fields["lote"]);
$cod_operacion=strtoupper($result->fields["cod_operacion"]);


if ($lote == ""){
	$lote = " - ";
}

$sql2="select * from datos_os where nro_os like '$nro_os'";
$result2 = $db->Execute($sql2);
$nombre_os=strtoupper($result2->fields["sigla"]);


$nro_afiliado=$result->fields["nro_afiliado"];
$nro_orden=$result->fields["nro_orden"];
$nro_paciente=strtoupper($result->fields["nro_paciente"]);

$cod_grabacion=strtoupper($result->fields["cod_grabacion"]);

$fecha=strtoupper($result->fields["fecha"]);
$matricula=strtoupper($result->fields["matricula"]);
$prescriptor=strtoupper($result->fields["medico"]);
$confirmada=strtoupper($result->fields["confirmada"]);

 
$sql6 = "SELECT * FROM detalle where cod_grabacion = $cod_grabacion";
$result6 = $db->Execute($sql6);

$nro_ord=$result6->fields["nro_orden"];
if ($nro_ord == ""){
$mar = "S/Pract.";
}



switch ($confirmada){
	case "1":{
		$conf = "CONF.";
		break;
	}

	case "5":{
		$conf = "S/CONF.";
		break;
	}

	case "10":{
	$conf = "FACTURADA";
		break;
	}

	case "7":{
		$conf = "GRABADA";
		break;
	}

}




$dia = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio_o = substr($fecha,0,4);

$fecha_mostrar = $dia."/".$mes."/".$anio_o;
$contador = $contador + 1;


$sql1 = "select * from pacientes where nro_paciente = '$nro_paciente'";
$result1 = $db->Execute($sql1);
$nombre=substr($result1->fields["nombre"],0,30);
$nombre = strtoupper($nombre);



$renglon = $renglon + 1;


?>  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC" style="cursor:hand" onMouseOver="this.style.background='#FFFF99'; this.style.color='blue'" onMouseOut="this.style.background='#E8DCFC'; this.style.color='black'">
  <th bgcolor="#E6E6E6" scope="row"><span class="Estilo26"><span class="Estilo28"><?php echo $fecha_mostrar;?></span></span>
  <th bgcolor="#E6E6E6" scope="row"><span class="Estilo26"><?php echo $cod_grabacion;?></span>
<td bgcolor="#E6E6E6"><span class="Estilo26"><?php echo $nombre;?></span>
<td bgcolor="#E6E6E6"><div align="center"><span class="Estilo39"><?php echo $nro_afiliado;?></span></div>
<td bgcolor="#E6E6E6"><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_os;?> - <?php echo $nombre_os;?></span></div>
<td bgcolor="#E6E6E6"><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $lote;?></span></div>
<td bgcolor="#E6E6E6"><div align="center" class="Estilo31"><a href="detalle.php?id=<?php print("$cod_grabacion");?>&bande_2=1&confirmada=<?php print("$confirmada");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&nombre_laboratorio=<?php print("$nombre_laboratorio");?>&anio=<?php print("$anio");?>"><IMG SRC="../../imagenes/office//137.ico" alt="Imprimir" border = "0"></a></div>
    <td bgcolor="#E6E6E6"><div align="center" class="Estilo31"><a href="grabar/pagina_modificar.php?$band_mes=1&&cod_grabacion=<?php print("$cod_grabacion");?>&periodo=<?php print("$periodo");?>&&anio_o=<?php print("$año");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../imagenes/office//295.ico" alt="Modificar" border = "0"> </a></div>

		
	
</tr>




<?php 


	$cont = $cont + 1;
$result->MoveNext();
	} ?>
<tr bgcolor="#E6E6E6">


  <td colspan="10" bgcolor="#CCCCCC" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>
</table>
<div align="center"></div>
