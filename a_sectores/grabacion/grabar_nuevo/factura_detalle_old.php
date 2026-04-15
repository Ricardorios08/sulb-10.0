<style type="text/css">
<!--

.Estilo6 {color: #FF0000}
-->
H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}
.Estilo27 {color: #000000}
.Estilo28 {font-family: Arial, Helvetica, sans-serif; font-size: 12px;}
.Estilo29 {
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
	font-size: large;
}
.Estilo41 {font-family: Arial, Helvetica, sans-serif}
.Estilo42 {font-size: 10px}
.Estilo43 {
	font-size: 12px;
	font-weight: bold;
	color: #0000FF;
}
.Estilo44 {font-size: 12px}
.Estilo45 {color: #006600}
.Estilo46 {color: #FF9900}
.Estilo48 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo50 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-style: italic; font-size: 12px; }
.Estilo52 {color: #0000FF; font-style: italic; font-family: Arial, Helvetica, sans-serif; }
.Estilo54 {color: #000000; font-weight: bold; }
.Estilo57 {font-size: 9px}
.Estilo58 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.Estilo59 {color: #FF0000; font-size: 10px; }
.Estilo61 {color: #FF0000; font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
</STYLE>
<body  onLoad="window.print(); window.close();">
<?php 
global $count;
global $sigla;
global $denominacion;
global $domicilio_l;
global $cuit;
global $mes_actual;
global $importe;
global $total_importe_ordenes;
global $valor_677;
global $contame;
global $observaciones;
global $cont1;
global $band;
global $material;
global $importe;
global $importe1;
global $importe_998;
global $mes_actual;

include ("../../../conexiones/config.inc.php");

$nro_factura=$_REQUEST["nro_factura"];
//$nro_factura='102227';
//$tipo_fact='B';
$tipo_fact=$_REQUEST["tipo_fact"];

$sql="select * from factura where nro_factura like '$nro_factura' and tipo_fact = '$tipo_fact'";

$result = $db_fa->Execute($sql);

$fecha = ucwords($result->fields["fecha"]);
$nro_os= ucwords($result->fields["nro_os"]);
$mes = ucwords($result->fields["periodo"]);
$año = ucwords($result->fields["anio"]);
$anio_a_fact = ucwords($result->fields["anio"]);

$cant_ordenes= ucwords($result->fields["cant_ordenes"]);
$cant_bioquimicos= ucwords($result->fields["cant_bioquimicos"]);

 $iva = ucwords($result->fields["iva"]);
//$leyenda = ucwords($result->fields["leyenda"]);
$estado = ucwords($result->fields["estado"]);
$lote = ucwords($result->fields["lote"]);
$marca = ucwords($result->fields["marca"]);
$leyenda = ucwords($result->fields["leyenda"]);
$total= ucwords($result->fields["total"]);

$leyenda1=$_REQUEST['leyenda1'];



$bruto = $total - $iva;


if (strlen($anio) == 4){
$anio = substr($anio,2);
}

switch ($mes)
					{
		case "01":{$periodo1= "ENERO"; $mes_actual="01";}break;
		case "02":{$periodo1= "FEBRERO";$mes_actual="02";}break;
		case "03":{$periodo1= "MARZO";$mes_actual="03";}break;
		case "04":{$periodo1= "ABRIL";$mes_actual="04";}break;
		case "05":{$periodo1= "MAYO";$mes_actual="05";}break;
		case "06":{$periodo1= "JUNIO";$mes_actual="06";}break;
		case "07":{$periodo1= "JULIO";$mes_actual="07";}break;
		case "08":{$periodo1= "AGOSTO";$mes_actual="08";}break;
		case "09":{$periodo1= "SETIEMBRE";$mes_actual="09";break;}
		case "10":{$periodo1= "OCTUBRE";$mes_actual="10";}break;
		case "11":{$periodo1= "NOVIEMBRE";$mes_actual="11";}break;
		case "12":{$periodo1= "DICIEMBRE";$mes_actual="12";}break;
					}


 $sql="select * from datos_os where nro_os like '$nro_os'";
$result = $db_os->Execute($sql);
  
 $domicilio_l=ucwords($result->fields["domicilio_l"]);
 $denominacion=ucwords($result->fields["denominacion"]);
 $cuit=ucwords($result->fields["cuit"]);
 $sigla=ucwords($result->fields["sigla"]);
 $inscripcion=ucwords($result->fields["inscripcion"]);


switch ($inscripcion){
case "1":
	{
	$tipo_fact= "A";
	$tipo_iva = "RESPONSABLE INSCRIPTO";
	break;
}
case "2":
	{
	$tipo_fact= "B";
		$tipo_iva = "RESPONSABLE NO INSCRIPTO";
	break;
}

case "3":
	{
	$tipo_fact= "B";
		$tipo_iva = "MONOTRIBUTISTA";
	break;
}

case "4":
	{
	$tipo_fact= "B";
		$tipo_iva = "EXENTO";
	break;
}


}
  
  if ($cuit == 1){
  }


//*********************** encabezados *******************************************************************
$hora_inicio  = time();
?>

<!-- <iframe src="factura_papel.php?nro_factura=7130" width="100%" height="160" align="center">

Texto alternativo para los usuarios que no ven iFrames. Por lo general se recomienda poner un enlace a la pagina contenida dentro del iFrame. Noticias iFrame.

</iframe> -->
<?php 

if ($leyenda1 ==  "CONCEPTOS"){
$sql3="select * from detalle_factura where nro_factura like '$nro_factura' and tipo_factura = '$tipo_fact'";
$result3 = $db_fa->Execute($sql3);
$renglon1= ucwords($result3->fields["renglon1"]);
$renglon2= ucwords($result3->fields["renglon2"]);
$renglon3= ucwords($result3->fields["renglon3"]);
$renglon4= ucwords($result3->fields["renglon4"]);
$observaciones= ucwords($result3->fields["leyenda"]);

?>
<table width="707" border="0">
   <!--DWLayoutTable-->
      <tr>
        <td height="20" colspan="6" scope="col"><span class="Estilo97 Estilo41 Estilo43">N&ordm; FACTURA: <?php ECHO $tipo_fact;?></span> - <span class="Estilo97 Estilo41 Estilo43"><?php ECHO $nro_factura;?></span></td>
      </tr>
      <tr>
        <td height="20" colspan="6" scope="col"><span class="Estilo97 Estilo41 Estilo43">OBRA SOCIAL: <?php ECHO $sigla;?></span></td>
      </tr>
      <tr>
        <td height="20" colspan="6" scope="col"><div align="right"><span class="Estilo97 Estilo41 Estilo43 Estilo6">TOTAL: <?php ECHO $total;?></span></div></td>
      </tr>


      <tr>
        <td height="21" colspan="5" valign="top" scope="col"><hr noshade></td>
      <tr>
  <td width="116" height="21" valign="top" scope="col"><div align="center" class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45">RENGLON 1</div></td>
  <td width="581" colspan="4" valign="top" scope="col"><div align="center" class="Estilo58">
    <div align="left"><span class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45"><?php ECHO $renglon1;?></span></div>
  </div>    </td>
  <tr>
    <td height="21" valign="top" scope="col"><div align="center">
      <div align="center" class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45">RENGLON 2</div>
    </div></td>
    <td colspan="4" valign="top" scope="col"><div align="left"><span class="Estilo58"><?php ECHO $renglon2;?></span></div></td>
  <tr>
        <td height="21" valign="top" scope="col"><div align="center">
          <div align="center" class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45">RENGLON 3</div>
        </div></td>
        <td colspan="4" valign="top" scope="col"><div align="left"><span class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45"><?php ECHO $renglon3;?></span></div></td>
  <tr>
        <td height="21" valign="top" scope="col"><div align="center">
          <div align="center" class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45">RENGLON 4</div>
        </div></td>
        <td colspan="4" valign="top" scope="col"><div align="left"><span class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45"><?php ECHO $renglon4;?></span></div></td>
  <tr>
        <td height="21" valign="top" scope="col"><div align="center">
          <div align="center" class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45">LEYENDA</div>
        </div></td>
        <td colspan="4" valign="top" scope="col"><div align="left"><span class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45"><?php ECHO $observaciones;?></span></div></td>
</table>

<?php 
exit;
}
?>

<table width="707" border="0">
      <tr>
        <td colspan="4"><div align="center">
          <p class="Estilo27"><blink><span class="Estilo46">------------ Documento no v&aacute;lido como Factura ------------</span></blink>
        </div>          </td>
      </tr>
    <tr>
      <td width="312" rowspan="6"><div align="center"><span class="Estilo27"><span class="Estilo28"><strong>ASOCIACION BIOQUIMICA DE MENDOZA <BR>
  PERSONERIA JURIDICA DTO. NRO 2201/69 <BR>
  BELGRANO 925 - 5500 - MENDOZA<br>
  Telefono: 424-6974</strong><BR>
  IVA RESPONSABLE INSCRIPTO </span> </span></div></td>
      <td width="39" rowspan="6"><div align="center"><span class="Estilo29">X</span></div></td>
      <td bordercolor="#CCCCCC"><div align="right" class="Estilo48">Factura Nº: </div></td>
      <td bordercolor="#CCCCCC"><div align="left" class="Estilo48"><?php echo $nro_factura;?></div></td>
  </tr>
  <tr>
    <td width="156" bordercolor="#CCCCCC"><div align="right" class="Estilo48">Fecha: </div></td>
    <td width="182" bordercolor="#CCCCCC"><div align="left" class="Estilo48"><?php echo $fecha;?> - <span class="Estilo41"><span class="Estilo44"><span class="Estilo27"><em><span class="Estilo27 Estilo15 Estilo16 Estilo41 Estilo44"><em><em><em><em><?php  echo date("h:i:s",$hora_inicio);?></em></em></em></em></span></em></span></span></span></div></td>
  </tr>
  <tr>
    <td bordercolor="#CCCCCC"><div align="right" class="Estilo48">C.U.I.T N&ordm;: </div></td>
    <td bordercolor="#CCCCCC"><div align="left" class="Estilo48">30-54550865-2</div></td>
  </tr>
  <tr>
    <td bordercolor="#CCCCCC"><div align="right" class="Estilo48">Ingresos Brutos: </div></td>
    <td bordercolor="#CCCCCC"><div align="left" class="Estilo48">Exento</div></td>
  </tr>
  <tr>
    <td bordercolor="#CCCCCC"><div align="right" class="Estilo48">Jub. Comercio: </div></td>
    <td bordercolor="#CCCCCC"><div align="left" class="Estilo48">54550865</div></td>
  </tr>
  <tr>
    <td height="17" bordercolor="#CCCCCC"><div align="right" class="Estilo48">inicio Activ: </div></td>
    <td bordercolor="#CCCCCC"><div align="left" class="Estilo48">24/05/69 </div></td>
  </tr>
  <tr class="Estilo6">
    <td colspan="3"><span class="Estilo50">OBRA SOCIAL: <strong><?php print("$denominacion");?> 
      <?php print "(".$sigla.")";?>
      <?php  print "(".$nro_os.")";?>      <?php if ($facturar == "NO"){
		  echo "<br>";
	  echo "Facturado con el nomenclador de Obra Social: ".$nro_os2." - ".$sigla;}?></strong> </span></td>
    <td><div align="center"><span class="Estilo28"><span class="Estilo54"><?php print("$periodo1");?> - <?php print("$año");?></span></span></div></td>
  </tr>
  <tr class="Estilo6">
    <td colspan="3"><span class="Estilo50">DOMICILIO: <strong><?php print("$domicilio_l");?></strong></span>      <div align="right"><span class="Estilo41"><span class="Estilo44"><span class="Estilo27"><em><span class="Estilo27 Estilo15 Estilo16 Estilo41 Estilo44"><em><em><em></em></em></em></span></em></span></span></span></div></td>
    <td><div align="center"><span class="Estilo28"></span></div></td>
  </tr>
  
  <tr class="Estilo6">
    <td><span class="Estilo50">I.V.A: <strong><em><?php print("$tipo_iva");?></em></strong></span></td>

    <td colspan="2"><span class="Estilo50">C.U.I.T. <strong><?php print("$cuit");?></strong></span></td>
    <td><div align="right" class="Estilo28"><span class="Estilo27"><em><strong><?php print("$leyenda");?></strong></em></span></div></td>
  </tr>
  <tr class="Estilo6">
    <td colspan="2"><div align="left"><span class="Estilo6"><span class="Estilo27"><em><span class="Estilo27 Estilo15 Estilo16 Estilo41 Estilo44"><em><em><em></em></em><em>Lote: <em><em><em><?php  echo $lote;?></em></em></em></em></em></span></em></span></span></div></td>
  <?php IF ($iva != 0.00){?>
	<td colspan="2"><div align="right" class="Estilo61"><strong>*** BRUTO: <?php ECHO "$ ". $bruto;?> - IVA<strong><?php ECHO "$ ". number_format($iva,2);?></strong> ***</strong></div></td>
  </tr>
	<?php }?>
  <tr class="Estilo6">
    <td colspan="2"><div align="left" class="Estilo44 Estilo41 Estilo16 Estilo15  Estilo27"><em>Cantidad Ordenes: (<?php  echo $cant_ordenes;?>) - Cantidad Laboratorios: (<?php  echo $cant_bioquimicos;?>)</div>      
    </td>
    <td colspan="2"><div align="right"><span class="Estilo28"><strong>*** TOTAL <strong>FACTURADO <?php ECHO "$ ". number_format($total,2);?> </strong>***</strong></span></div></td>
  </tr>
</table>
<table width="707" border="0">
   <!--DWLayoutTable-->
 
<?php 

include ("../../../conexiones/config.inc.php");


 $sql = "SELECT nro_laboratorio, nro_factura, fecha_factura, nro_os, importe, cantidad_ordenes FROM `composicion` WHERE  nro_factura = $nro_factura ORDER BY `nro_laboratorio` , fecha_factura, nro_factura ASC";
$result = $db_liq->Execute($sql);

if (!$result) die("fallo".$db_liq->ErrorMsg());
	 while (!$result->EOF) { 

$nro_lab = $nro_laboratorio;
$nro_laboratorio=ucwords($result->fields["nro_laboratorio"]);

$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` like $nro_laboratorio";
$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$todo = $nombre_laboratorio." (".$nro_laboratorio.")";

if ($nro_laboratorio != $nro_lab){
?>

<tr>
        <th height="22" colspan="6" scope="col"><hr noshade></th>
  </tr>
      <tr>
        <td height="20" colspan="6" scope="col"><span class="Estilo97 Estilo41 Estilo43">LABORATORIO: <?php ECHO $todo;?></span></td>
      </tr>
	   <tr valign="bottom">
        <td height="21" scope="col"><div align="center"><span class="Estilo58">Afiliados</span></div></td>
        <td scope="col"><div align="center"><span class="Estilo58">Orden</span></div></td>
        <td scope="col"><div align="center"><span class="Estilo58">Fecha</span></div></td>
        <td scope="col"><span class="Estilo42"></span></td>
        <td scope="col"><span class="Estilo58">Prestaciones</span></td>
        <td scope="col"><div align="center"><span class="Estilo58">Importe</span></div></td>
      </tr>

      <?php 
}

$nro_factura=$result->fields["nro_factura"];
$fecha_factura=ucwords($result->fields["fecha_factura"]);
$nro_os=$result->fields["nro_os"];
$cantidad_ordenes=$result->fields["cantidad_ordenes"];
$importe=$result->fields["importe"];
$suma_por_bioquimico = $suma_por_bioquimico + $importe;
		$sql2="select denominacion, sigla from datos_os where nro_os like '$nro_os'";
$result2 = $db_os->Execute($sql2);
 
 $denominacion=ucwords($result2->fields["denominacion"]);
 $sigla=ucwords($result2->fields["sigla"]);

$sql12="select coseguro,valor_porcentaje , coseguro_esp , valor_porc_esp , coseguro_comp , valor_porc_comp  from op_facturacion where nro_os like '$nro_os'";
$result12 = $db_os->Execute($sql12);

$coseguro=ucwords($result12->fields["coseguro"]);
$valor_porcentaje=ucwords($result12->fields["valor_porcentaje"]);
$coseguro_esp=$result12->fields["coseguro_esp"];
 $valor_porc_esp=$result12->fields["valor_porc_esp"];
$coseguro_comp=ucwords($result12->fields["coseguro_comp"]);
$valor_porc_comp=ucwords($result12->fields["valor_porc_comp"]);


?>
     
     
<?php 
$sql3 = "SELECT nro_orden, cod_grabacion FROM `detalle` WHERE `nro_factura` like '$nro_factura' and nro_laboratorio = $nro_laboratorio order by nro_orden";
//$sql3 = "SELECT nro_orden, cod_grabacion FROM `detalle` WHERE `nro_factura` = 7116 and nro_laboratorio = $nro_laboratorio order by nro_orden";
$result3 = $db_gb->Execute($sql3);


if (!$result3) die("fallo".$db_gb->ErrorMsg());
	 while (!$result3->EOF) { 

$nro_ord = $nro_orden;
$nro_orden=$result3->fields["nro_orden"];
$cod_grabacion=$result3->fields["cod_grabacion"];


$sql4 = "SELECT nro_afiliado, fecha, autorizacion, coseguro, suma_coseguro FROM `ordenes` WHERE cod_grabacion like '$cod_grabacion'";
$result4 = $db_gb->Execute($sql4);

$nro_afiliado=$result4->fields["nro_afiliado"];
$fecha_orden=$result4->fields["fecha"];

$dia_orden = substr($fecha_orden,8,2);
$mes_orden = substr($fecha_orden,5,2);
$anio_orden = substr($fecha_orden,0,4);
$fecha_orden = $dia."-".$mes."-".$anio;

$autorizacion=$result4->fields["autorizacion"];
$suma_coseguro1=$result4->fields["suma_coseguro"];
$coseguro_en_orden=$result4->fields["coseguro"];

if ($nro_os == "5073"){
	if (($nro_orden == 0) or ($nro_orden == '')){
$nro_orden = $autorizacion;
	}

}
if ($nro_ord != $nro_orden){
?>
     

      <tr>
  <td width="49" height="21" valign="top" scope="col"><div align="center" class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45"><?php ECHO $nro_afiliado;?></div></td>
  <td width="50" valign="top" scope="col"><div align="center" class="Estilo58"><?php ECHO $nro_orden;?></div></td>
  <td width="52" valign="top" scope="col"><div align="center" class="Estilo58 Estilo76 Estilo57 Estilo98 Estilo41 Estilo42 Estilo45"><?php ECHO $fecha_orden;?></div></td>
  <td width="7" valign="top" scope="col"><span class="Estilo45"></span></td>
  <td width="452" valign="top" scope="col">
  
    <div align="justify" class="Estilo99 Estilo41 Estilo42 Estilo45"><span class="Estilo95">
 <?php 
		$sql5 = "SELECT nro_practica, valor, categoria FROM `detalle` WHERE `cod_grabacion` like '$cod_grabacion' order by cod_operacion, nro_orden, nro_practica desc";

//$sql5 = "SELECT   ordenes_grabadas.detalle.nro_practica,  practicas.convenio_practica.valor, practicas.convenio_practica.categoria FROM ordenes_grabadas.detalle INNER JOIN practicas.convenio_practica ON ordenes_grabadas.detalle.nro_practica = practicas.convenio_practica.cod_practica WHERE ordenes_grabadas.detalle.cod_grabacion like '$cod_grabacion' ";


$result5 = $db_gb->Execute($sql5);

if (!$result5) die("fallo".$db_gb->ErrorMsg());
	 while (!$result5->EOF) { 
$nro_practica=$result5->fields["nro_practica"];
$valor=$result5->fields["valor"];
$categoria=$result5->fields["categoria"];

if ($nro_os == 3764){

$sql7 = "SELECT valor FROM `convenio_practica` WHERE cod_practica = $nro_practica and nro_os = 37641";
$result7 = $db_pr->Execute($sql7);
$valor_cimesa=$result7->fields["valor"];
$nro_practica;
$valor_cimesa;

$total_ac_cimesa = $total_ac_cimesa + $valor_cimesa;
}

//$sql6 = "SELECT categoria FROM `convenio_practica` WHERE `cod_practica` like '$nro_practica' and nro_os = '$nro_os'";
//$result6 = $db_pr->Execute($sql6);
//$categoria=$result6->fields["categoria"];

$valor = number_format($valor,2);
ECHO "(".$nro_practica." - $".$valor.") ";
  $suma_orden = $suma_orden + $valor;

if (($nro_os == 2511) && ($lote == 'ESPECIAL')){
	$coseguro = 5;
	$coseguro_esp = 5;
	$coseguro_comp = 5;

}


if (($coseguro != 5) or ($coseguro_esp != 5 ) or ($coseguro_comp != 5 )){
switch ($categoria){
	case "1":{
		$contador_comunes = $contador_comunes + 1;
		$total_comunes = $total_comunes + $valor;

include("../coseguro.php");
		BREAK;}
	case "2":{
		$contador_especiales = $contador_especiales + 1;
		$total_especiales = $total_especiales + $valor;
		include("../coseguro_esp.php");
		BREAK;}
	case "3":{
		$contador_alta = $contador_alta + 1;
		$total_alta = $total_alta + $valor;
include("../coseguro_comp.php");
		BREAK;	}
}
}


$result5->MoveNext(); // cambia de practica 
	 }

if ($coseguro_en_orden != ""){
	if ($nro_os == 3764){

$total_ac_cimesa;
$coseguro_en_orden;
$cos = round(($total_ac_cimesa * $coseguro_en_orden) / 100,2);

echo "(Cos. $".round($suma_coseguro1,2).")";
echo $sql = "UPDATE `ordenes` SET `suma_coseguro` = '$cos' WHERE `cod_grabacion` = '$cod_grabacion'";
$db_gb->Execute($sql);
$suma_orden = $suma_orden - $cos;
$cos= 0;
$total_ac_cimesa = 0;


	}
	else
	{
echo "(Cos. $".round($suma_coseguro1,2).")";
echo $sql = "UPDATE `ordenes` SET `suma_coseguro` = '$coseguro_en_orden' WHERE `cod_grabacion` = '$cod_grabacion'";
$db_gb->Execute($sql);
$suma_orden= $suma_orden - $coseguro_en_orden;
}

	}



$suma_coseguro = $suma_coseguro + $coseguro_en_orden; 
$total_or = $total_or + $suma_orden;
$suma_orden;

if ($coseguro != 5){
	
$coseguro_final = $total_coseguro_comunes + $total_coseguro_especiales + $total_coseguro_alta;
$total_coseguro_comunes = 0;
$total_coseguro_especiales = 0;
$total_coseguro_alta = 0;
$total_epeciales = 0;
$total_coseguro_especiales = 0;
$total_coseguro_alta = 0;
	?>
        </span>  <span class="Estilo2 Estilo57  Estilo76">(Cos. -<?php echo round($suma_coseguro1,2).")";?></span><span class="Estilo57 Estilo76 ">
        <?php 

echo $sql = "UPDATE `ordenes` SET `suma_coseguro` = '$coseguro_final' WHERE `cod_grabacion` = '$cod_grabacion'";
$db_gb->Execute($sql);

$suma_orden;
$total_or = $total_or - $coseguro_final;
$suma_orden = $suma_orden - $coseguro_final;

$coseguro_final1 = $coseguro_final;
$coseguro_final = 0;
$valor_coseguro = 0;
$total_coseguro_comunes = 0;
$total_coseguro_especiales = 0;
$total_coseguro_alta = 0;
$coseguro_a_facturar = 0;
$contador_practicas = 0;
$contador_comunes = 0;
$contador_especiales = 0;
$contador_alta = 0;
$total_comunes = 0;
$total_especiales = 0;
$total_alta = 0;
$suma_coseguro_orden = $suma_coseguro_orden + $suma_coseguro1;
$coseguro_total = $coseguro_total + $coseguro_final1;
}

?>
      </span>     </div></td>
  <td width="71" valign="top" scope="col"><div align="center" class="Estilo99 Estilo41 Estilo42 Estilo45">
    <div align="right">$<?php ECHO number_format($suma_orden,2);?></div>
  </div></td>
      </tr>


<?php $suma_orden = "";}?>

      


  <?php 


$result3->MoveNext();
	 } //cambia de orden

?>
  <tr>
    <td height="21" colspan="3" scope="col"><span class="Estilo99 Estilo41 Estilo6 Estilo42"><strong>Cant Ordenes: </strong></span><span class="Estilo99 Estilo41 Estilo6 Estilo42"><span class="Estilo59"><?php ECHO $cantidad_ordenes;?></span></span><span class="Estilo99 Estilo41 Estilo6 Estilo42"></span></td>
    <td valign="middle" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle" scope="col"><span class="Estilo58 Estilo59"><span class="Estilo99 Estilo41 Estilo6 Estilo44"><span class="Estilo99 Estilo41 Estilo6 Estilo42">
	
<?php if ($coseguro_en_orden != ""){?>
	<strong>Cos.</strong></span><span class="Estilo42"><?php ECHO number_format($suma_coseguro_orden,2);
$suma_coseguro_orden= 0;
?>
	<?php }?>
	</span></span></span></td>
    <td scope="col"><hr noshade></td>
  </tr>
  <tr>
        <td height="21" scope="col"><span class="Estilo99 Estilo41 Estilo6 Estilo42"></span></td>
        <td scope="col"><div align="center" class="Estilo99 Estilo41 Estilo6 Estilo42"></div></td>
        <td valign="middle" scope="col"><div align="right" class="Estilo99 Estilo41 Estilo6 Estilo42"></div></td>
        <td valign="top" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
        <td valign="middle" scope="col"><span class="Estilo58 Estilo59"></span></td>
    <td scope="col"><div align="center" class="Estilo42 Estilo41 Estilo99">
      <div align="right" class="Estilo6 Estilo44"><strong>$<?php ECHO number_format($total_or,2);?></strong></div>
    </div></td>
  </tr>
 

	  <?php 

	$suma_coseguro = 0;
	$total_or = 0;

$result->MoveNext();
	
?><!-- <H1 class=SaltoDePagina> </H1 --><?php 
	} // cambia de laboratorio


$hora_final  = time();
date("h:i:s",$hora_final);
?>
 <tr>
<td height="22" colspan="6" valign="top"> <HR NOSHADE> </td>
 </TR>
 <tr>
    <td height="21" colspan="6" scope="col"><div align="right" class="Estilo52">
        <div align="center"><strong>*** COSEGURO TOTAL <strong><?php ECHO "$ ". number_format($coseguro_total,2);?></strong>*** </strong></div>
    </div>      <div align="center" class="Estilo52"></div></td>
  </tr>
  <tr>
    <td height="21" colspan="6" scope="col"><div align="right" class="Estilo52">
        <div align="center"><strong>*** TOTAL FACTURADO <strong><?php ECHO "$ ". number_format($total,2);?></strong>*** </strong></div>
    </div>      <div align="center" class="Estilo52"></div></td>
  </tr>
</table>





