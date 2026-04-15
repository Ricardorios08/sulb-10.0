<?php 

$nro_orden = $_REQUEST['id'];
$confirmada = $_REQUEST['confirmada'];
$nro_factura= $_REQUEST['nro_factura'];
$tipo_fact = $_REQUEST['tipo_fact'];
$nro_laboratorio = $_REQUEST['nro_laboratorio'];

include ("../../conexiones/config_fa.php");
$sql_deta="select * from factura where nro_factura = $nro_factura and tipo_fact  = '$tipo_fact'";
$result_deta = $db->Execute($sql_deta);
$periodo=ucwords($result_deta->fields["periodo"]);
$anio=ucwords($result_deta->fields["anio"]);

switch ($anio){
case "08":{
$detalle = "detalle_2008";
$ordenes= "ordenes_2008";
break;
	}

case "09":{
$detalle = "detalle_2009";
$ordenes= "ordenes_2009";
break;
	}

	case "10":{
$detalle = "detalle";
$ordenes= "ordenes";
break;
	}

	case "11":{
$detalle = "detalle";
$ordenes= "ordenes";
break;
	}

		case "12":{
$detalle = "detalle";
$ordenes= "ordenes";
break;
	}

		case "13":{
$detalle = "detalle";
$ordenes= "ordenes";
break;
	}

		case "14":{
$detalle = "detalle";
$ordenes= "ordenes";
break;
	}

		case "15":{
$detalle = "detalle";
$ordenes= "ordenes";
break;
	}

}


include ("../../conexiones/config_gb.php");
 $sql="select * from $ordenes where nro_orden = $nro_orden and nro_fac = $nro_factura and tipo_fact = '$tipo_fact'  and nro_laboratorio = $nro_laboratorio";
$result = $db->Execute($sql);

$nro_os=strtoupper($result->fields["nro_os"]);
//$nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$periodo=strtoupper($result->fields["periodo"]);
$año=strtoupper($result->fields["ano"]);
$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$nro_prescriptor=strtoupper($result->fields["medico"]);
$nro_orden=strtoupper($result->fields["nro_orden"]);
$fecha=strtoupper($result->fields["fecha"]);
$matricula=strtoupper($result->fields["matricula"]);
$confirmada=strtoupper($result->fields["confirmada"]);
$autorizacion=strtoupper($result->fields["autorizacion"]);



$dia = substr($fecha,8,4);
$mes= substr($fecha,5,2);
$año = substr($fecha,0, 4);
$fecha = $dia."/".$mes."/".$año;

switch ($confirmada){
	case "1":{
	$confirmada = "CONFIRMADA";
		break;
	}

	case "2":{
	$confirmada = "ANULADA O DESCONFIRMADA";
		break;
	}

	case "5":{
	$confirmada = "NO TRATADA O AUSENTE";
		break;
	}

		case "0":{
	$confirmada = "NO TRATADA O AUSENTE";
		break;
	}


}

include ("../../conexiones/config.inc.php");
$sql1 = "select * from datos_laboratorio where nro_laboratorio = $nro_laboratorio";
$result1 = $db->Execute($sql1);
$nombre=$result1->fields["nombre_laboratorio"];
$nombre_completo = $nombre." (".$nro_laboratorio.")";

include ("../../conexiones/config_os.php");
$sql2="select * from afiliados where nro_afiliado = '$nro_afiliado'";
$result2 = $db->Execute($sql2);
$afiliado=strtoupper($result2->fields["nombre"]);
$afiliado_completo = $afiliado." (".$nro_afiliado.")";

$sql2="select * from prescriptor where matricula = $nro_prescriptor";
$result2 = $db->Execute($sql2);
$prescriptor=strtoupper($result2->fields["nombre"]);
$prescriptor_completo = $prescriptor." (".$nro_prescriptor.")";

$sql2="select * from datos_os where nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);
$denominacion=strtoupper($result2->fields["denominacion"]);

$os_completa = $sigla." (".$nro_os.") ";



?>
<table width="582" border="0">
  <tr bgcolor="#000099">
    <th colspan="2" scope="col"><div align="center"><font color="#FFFFFF">ORDEN N&ordm; <?php echo $nro_orden;?> </font></div></th>
  </tr>
  <tr>
    <th bgcolor="#D0F9FB" scope="row">Obra Social </th>
    <td><?php echo $os_completa;?></td>
  </tr>
  <tr>
    <th width="197" bgcolor="#D0F9FB" scope="row">Afiliado</th>
    <td width="375"><?php echo $afiliado_completo;?></td>
  </tr>
  <tr>
    <th bgcolor="#D0F9FB" scope="row">Prescriptor</th>
    <td><?php echo $prescriptor_completo;?></td>
  </tr>
  <tr>
    <th bgcolor="#D0F9FB" scope="row">Codigo de Autorizaci&oacute;n</th>
    <td><strong><?php echo $autorizacion;?></strong></td>
  </tr>
  <tr>
    <th bgcolor="#D0F9FB" scope="row">Fecha</th>
    <td><?php echo $fecha;?></td>
  </tr>
  <tr>
    <th bgcolor="#D0F9FB" scope="row">Estado de Orden </th>
    <td><?php echo $confirmada;?></td>
  </tr>
</table>
<table width="582" height="76" border="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFD988">
    <td height="21" colspan="4" bgcolor="#000099" scope="col"><font color="#FFFFFF">DETALLE DE ORDEN</font></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#D0F9FB">
    <td width="38" height="21" scope="col"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cant. </font></td>
    <td width="38" scope="col"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
    <td colspan="2" scope="col"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n de la Pr&aacute;ctica </font></div>      <div align="center"></div></td>
  </tr>
  <?php 
include ("../../conexiones/config_gb.php");
  $sql2 = "SELECT *  FROM $detalle WHERE `nro_orden` = $nro_orden and nro_factura = $nro_factura and tipo_fact = '$tipo_fact'";
$result2 = $db->Execute($sql2);





 if (!$result2) die("NO EXISTE ORDEN CON ESE NUMERO DE AUTORIZACION");
  while (!$result2->EOF) {

$nro_os="5073";
$nro_practica=$result2->fields["nro_practica"];
$cod_operacio=$result2->fields["cod_operacion"];



include ("../../conexiones/config_pr.php");
$sql1 = "SELECT * FROM `convenio_practica` WHERE `cod_practica` = '$nro_practica' and nro_os = $nro_os";
$result1 = $db->Execute($sql1);
$practica=$result1->fields["practica"];
$cantidad = $cantidad + 1;


?>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td height="26" scope="col"><font color="#0000FF" size="1" face="Arial, Helvetica, sans-serif"><?php echo $cantidad;?></font></td>
    <td scope="col"><font color="#0000FF" size="1" face="Arial, Helvetica, sans-serif"><?php echo $nro_practica;?></font></td>
    <input type = "hidden" name = "nro_pra" id="nro_pra" size = "10"  value ="<?php echo $nro_practica;?>">
    <td scope="col"><div align="left"><font color="#0000FF" size="1" face="Arial, Helvetica, sans-serif"> <?php echo $practica;?>
        <input type = "hidden" name = "cod_operacio" id="cod_operacio" size = "10"  value ="<?php echo $cod_operacio;?>">
</font></div></td>
  </tr>
  <?php 


$result2->MoveNext();
}

?>
</table>
