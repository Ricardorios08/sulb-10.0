<style type="text/css">
<!--
.Estilo1 {color: #FFFFCC}
.Estilo13 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}
.Estilo16 {color: #FFFFCC; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 10px; }
.Estilo17 {color: #FFFFFF}
.Estilo19 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 10px; }
.Estilo23 {color: #000099}
.Estilo24 {
	color: #006633;
	font-weight: bold;
}
.Estilo25 {color: #FF0000}
.Estilo27 {color: #FF0000; font-weight: bold; }
.Estilo32 {
	color: #000000;
	font-weight: bold;
}
.Estilo26 {font-size: 12px}
.Estilo28 {font-family: Arial, Helvetica, sans-serif}
.Estilo30 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo31 {color: #0000FF; font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
-->
</style>

<?php $hoy=date("d/m/y");?>
<table width="103%" border="0">
  <tr bgcolor="#000099">
    <td width="100%" colspan="2" scope="col"><div align="right"><span class="Estilo17">Listado de Ordenes. Emitido el: <?php echo $hoy;?></span></div></td>
  </tr>
    

<?php 

//$a = "MEDIFE-JULIO-09.xls";
//header("Content-type: application/vnd.ms-excel");
//header("Content-Disposition: attachment; filename=$a");



$busca = $_REQUEST['busca'];
 $anio= $_REQUEST['anio'];
$nro_laboratorio= $_REQUEST['laboratorio'];
$nro_orden= trim($_REQUEST['nro_orden']);
$nro_afiliado= $_REQUEST['nro_afiliado'];
$lote= $_REQUEST['lote'];
$afiliado= $_REQUEST['afiliado'];


$me=$_POST["mes"];
for ($i=0;$i<count($me);$i++)    
{     
$mes= $me[$i];    
}

$buscado=$_POST["buscador"];
for ($i=0;$i<count($buscado);$i++)    
{     
$buscador= $buscado[$i];    
}

$ordena=$_POST["ordenar"];
for ($i=0;$i<count($ordena);$i++)    
{     
$ordenar= $ordena[$i];    
}

if ($ordenar == ""){
$ordenar = "nro_orden";
}

if ($ordenar == "1"){
$ordenar = "''";
}

$ordenar;
 $mes;



include ("../../conexiones/config_os.php");

$sql2="select * from datos_os where nro_os like '$busca'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);


switch ($anio){
case "08":{
$ordenes = "ordenes_2008";
$detalle = "detalle_2009";
break;
		}

case "09":{
$ordenes = "ordenes_2009";
$detalle = "detalle_2009";

break;
		}

case "10":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

		case "11":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

		case "12":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

		case "13":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

				case "14":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

				case "15":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}



}

include ("../../conexiones/config_gb.php");
$busca;
if (($busca == "2616") and ($mes == "12") and ($anio == "09")){

$ordenes = "ordenes";
$detalle= "detalle";
}


switch ($buscador){
	case "1":{ //grabadas

if (($busca=="") && ($nro_laboratorio=="")){// && ($mes == 13)){
if ($mes == 13){
$sql="select * from $ordenes where ano = $anio;";
}
else{
 $sql="select * from $ordenes where periodo = $mes and ano = $anio order by $ordenar";
}
}elseif (($busca == "") && ($nro_laboratorio!="")){
if ($mes == 13){
$sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and ano = $anio order by $ordenar";
 	   $mostrar_lab = 1;
}
else{
$sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and periodo = $mes and ano = $anio  order by $ordenar";
 	   $mostrar_lab = 1;
}
}
else{
	if ($nro_laboratorio == ""){
 $sql="select * from $ordenes where nro_os = $busca and periodo = $mes  and ano = $anio  order by $ordenar";
	}
	else
	{
	  $sql="select * from $ordenes where nro_os = $busca and periodo = $mes and nro_laboratorio = $nro_laboratorio and ano = $anio order by $ordenar";
	$mostrar_lab = 1;
	}
}
break;
	}

	case "2":{
if (($busca=="") && ($nro_laboratorio=="")){// && ($mes == 13)){
if ($mes == 13){
$sql="select * from $ordenes where (confirmada = 1 or confirmada = 10 or confirmada = 7) and ano = $anio order by $ordenar";

}
else{
 $sql="select * from $ordenes where periodo = $mes and (confirmada = 1 or confirmada = 10 or confirmada = 7) and ano = $anio order by $ordenar";
}
}elseif (($busca == "") && ($nro_laboratorio!="")){
if ($mes == 13){
 $sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and (confirmada = 1 or confirmada = 10 or confirmada = 7) and ano = $anio order by $ordenar";

}
else{
 $sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and periodo = $mes and and ano = $anio and (confirmada = 1 or confirmada = 10 or confirmada = 7) order by $ordenar";
}
}
else{

if ($nro_laboratorio == ""){
 $sql="select * from $ordenes where nro_os = $busca and periodo = $mes  and ano = $anio and (confirmada = 1 or confirmada = 10 or confirmada = 7)  order by $ordenar";

}
else
	{
$sql="select * from $ordenes where nro_os = $busca and periodo = '$mes' and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) and nro_laboratorio = $nro_laboratorio order by $ordenar";
	   $mostrar_lab = 1;
	}

}
break;
	}

case "3":{
if (($busca=="") && ($nro_laboratorio=="")){// && ($mes == 13)){
if ($mes == 13){
   echo "6".$sql="select * from $ordenes where (confirmada = 1 or confirmada = 10 or confirmada = 7) and ano = '$anio' order by $ordenar";

}
else{
 echo "5".$sql="select * from $ordenes where periodo = $mes and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) order by order by $ordenar";
}
}elseif (($busca == "") && ($nro_laboratorio!="")){
if ($mes == 13){
 echo "4".$sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) order by $ordenar";

}
else{
 echo "3".$sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and periodo = $mes and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) order by $ordenar";
}
}
else{

if ($nro_laboratorio == ""){
 echo "2". $sql="select * from $ordenes where nro_os = $busca and periodo = $mes  and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7)  order by $ordenar";

}
else
	{
 echo "1".$sql="select * from $ordenes where  ( `periodo` = $mes AND `ano` LIKE '$anio' AND `nro_os` = $busca AND `nro_laboratorio` = '$nro_laboratorio' AND `confirmada` = 7 ) or ( `periodo` = $mes AND `ano` LIKE '$anio' AND `nro_os` = $busca AND `nro_laboratorio` = '$nro_laboratorio' AND `confirmada` = 10 ) order by '$ordenar'";
	
	
	
	/*
	nro_os = $busca and periodo = $mes and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) and nro_laboratorio = $nro_laboratorio order by $ordenar";

	$sql = 'SELECT * '
        . ' FROM `ordenes` '
        . ' WHERE 1 AND ( `periodo` = 08 AND `ano` '
        . ' LIKE \'10\' AND `nro_os` '
        . ' LIKE \'5073\' AND `nro_laboratorio` = 221 AND `confirmada` = 7 ) OR ( `periodo` = 08 AND `ano` '
        . ' LIKE \'10\' AND `nro_os` '
        . ' LIKE \'5073\' AND `nro_laboratorio` = 221 AND `confirmada` = 10 ) LIMIT 0, 30'; 
*/

	   $mostrar_lab = 1;
	}

}
break;
	}
case "4":{
if (($busca=="") && ($nro_laboratorio=="") && ($nro_orden =="")){// && ($mes == 13)){
if ($mes == 13){
$sql="select * from $ordenes where (confirmada = 1 or confirmada = 10 or confirmada = 7) and ano = '$anio' order by '$ordenar'";

}
else{
	if ($lote == ""){
$sql="select * from $ordenes where periodo = $mes and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) order by '$ordenar'";
	} else{
 $sql="select * from $ordenes where periodo = $mes and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) and lote like '%$lote' order by '$ordenar'";
	}
}
}elseif (($busca == "") && ($nro_laboratorio!="")){
if ($mes == 13){
 $sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) order by '$ordenar'";

}
else{
$sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and periodo = $mes and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) order by '$ordenar'";
}
}
elseif (($nro_laboratorio == "") && ($nro_orden == "")){
	if ($lote == ""){
$sql="select * from $ordenes where nro_os = $busca and periodo = $mes  and ano = '$anio' and(confirmada = 1 or confirmada = 10 or confirmada = 7)  order by '$ordenar'";
	}else{
$sql="select * from $ordenes where nro_os = $busca and periodo = $mes  and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7)  and lote  like '%$lote' order by '$ordenar'";
	}
}
else
	{
	if ($nro_laboratorio == ""){
 $sql="select * from $ordenes where nro_orden like '$nro_orden%' and nro_os = $busca and periodo = $mes and ano = '$anio' order by '$ordenar'";
	}else{
 if ($lote == ""){
 $sql="select * from $ordenes where nro_orden like '%$nro_orden%' and nro_os = $busca and periodo = $mes and ano = '$anio' and nro_laboratorio = $nro_laboratorio order by '$ordenar'";
 }else{
 $sql="select * from $ordenes where nro_orden like '%$nro_orden%' and nro_os = $busca and periodo = $mes and ano = '$anio' and nro_laboratorio = $nro_laboratorio and lote like '%$lote' order by '$ordenar'";
 }
	}


	   $mostrar_labo = 1;
}


if (($busca == "") && ($nro_laboratorio=="") && ($nro_orden!="")) {
$sql="select * from $ordenes where nro_orden like '$nro_orden%' and periodo = $mes and ano = '$anio' order by '$ordenar'";
	   $mostrar_lab = 1;
}

break;
}



//por operador

case "5":{

include ("operador.php");
exit;
break;
}

case "7":{

include ("afiliado.php");
exit;
break;
}

case "6":{
if (($busca=="") && ($nro_laboratorio=="") && ($nro_orden =="") && ($lote =="")){// && ($mes == 13)){
if ($mes == 13){
$sql="select * from $ordenes where (confirmada = 1 or confirmada = 10 or confirmada = 7) and ano = '$anio' order by $ordenar";

}
else{
 $sql="select * from $ordenes where periodo = $mes and (confirmada = 1 or confirmada = 10 or confirmada = 7) and ano = '$anio' order by $ordenar";
}
}elseif (($busca == "") && ($nro_laboratorio!="")){
if ($mes == 13){
$sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and ano = '$anio' and (confirmada = 1 or confirmada = 10 or confirmada = 7) order by $ordenar";

}
else{
$sql="select * from $ordenes where nro_laboratorio = $nro_laboratorio and periodo = $mes and ano = '$anio' and confirmada = 7 order by $ordenar";
}
}
elseif (($nro_laboratorio == "") && ($nro_orden == "")){
$sql="select * from $ordenes where operador = $busca and periodo = $mes  and ano = '$anio' and confirmada = 7  order by $ordenar";

}
else
	{
 $sql="select * from $ordenes where nro_orden like '$nro_orden%' and ano = '$anio' and operador = $busca and periodo = $mes order by $ordenar";
	   $mostrar_lab = 1;
}


if (($busca == "") && ($nro_laboratorio=="") && ($nro_orden!="")) {
 $sql="select * from $ordenes where nro_orden like '$nro_orden%' and periodo = $mes and ano = '$anio' order by $ordenar";
	   $mostrar_lab = 1;
}

break;
}

}

$result = $db->Execute($sql);

$año=strtoupper($result->fields["ano"]);





?>    

<?php if ($buscador == 5){
	
	include ("../../conexiones/config.inc.php");
	$sql8="select * from usuarios where id = '$busca'";
$result8 = $db->Execute($sql8);
$nombre_operador=strtoupper($result8->fields["usuario"]);

	?>
<tr bgcolor="#E6E6E6">
    <td scope="row"><div align="center"><span class="Estilo23">Operador: <span class="Estilo27"><?php echo "(".$busca.") ".$nombre_operador;?></span></span></div></td>
<?php }else{
		
include ("../../conexiones/config_gb.php");
?>
<tr bgcolor="#E6E6E6">
    <td scope="row"><div align="center"><span class="Estilo23">Obra Social: <span class="Estilo27"><?php echo "(".$busca.") ".$sigla;?></span></span></div></td>
	<?php }?>

<td scope="row"><div align="center"><span class="Estilo23">Periodo: <span class="Estilo24"><span class="Estilo25"><?php echo $mes;?></span></span> Año: <span class="Estilo27"><?php echo $anio;?></span>        <span class="Estilo25">
  <?php 
$nro_lab = 2;
?>
</span></span></div></td>
</tr>
</table>

<table width="99%" height="149" border="0">
  <tr bgcolor="#000099">

  <td width="3%"><div align="center" class="Estilo19"> N&ordm; </div></td>

<?php  if ($mostrar_lab != 1){?>
    <th width="3%" scope="row"><div align="center" class="Estilo1 Estilo13"><strong>N&ordm;</strong></div>      </th>
    <td width="13%"><div align="center" class="Estilo16 Estilo17">Laboratorio</div></td>
	<?php }?>

	<?php if (($nro_os == "5073") or ($nro_os == "3764")) {?>
    <td width="10%"><div align="center" class="Estilo19"> Autorización </div></td>
	<?php }?>
    <td width="6%"><div align="center" class="Estilo19"> Orden </div></td>
<td width="9%"><div align="center" class="Estilo19">Lote</div></td>
<td width="9%"><div align="center" class="Estilo19">Sit. Orden</div></td>

    <td width="8%"><div align="center"><span class="Estilo19">Marca</span></div></td>
    <td width="8%"><div align="center" class="Estilo19">Afiliado </div></td>
    <td width="7%"><div align="center" class="Estilo19">Fecha</div></td>
    <td width="6%"><div align="center" class="Estilo19">Detalle</div></td>
<?php if ($buscador == 4){?>
    <td width="7%"><div align="center" class="Estilo19">Modificar</div></td>
	<td width="6%"><div align="center" class="Estilo19">Eliminar</div></td>
<?php }?>


  </tr>
<?php 

if ($mostrar_lab == 1){
	
include ("../../conexiones/config.inc.php");
$sql1 = "select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db->Execute($sql1);
$nombre=substr($result1->fields["nombre_laboratorio"],0,28);
?>


<tr bgcolor="#E6E6E6">
  <th colspan="8" scope="row"> <?php echo $nombre;?> </tr>
<tr bgcolor="#E8DCFC">
<?php }



 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

 $nro_os=strtoupper($result->fields["nro_os"]);
 $nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$periodo=strtoupper($result->fields["periodo"]);
$marca=strtoupper($result->fields["marca"]);
$lote=strtoupper($result->fields["lote"]);
$cod_operacion=strtoupper($result->fields["cod_operacion"]);

if ($marca == ""){
	$marca = " - ";
}

if ($lote == ""){
	$lote = " - ";
}

$nro_a = $nro_afiliado;


$año=strtoupper($result->fields["ano"]);
$nro_afiliado=$result->fields["nro_afiliado"];
$nro_orden=$result->fields["nro_orden"];
$autorizacion=strtoupper($result->fields["autorizacion"]);
$operador=strtoupper($result->fields["operador"]);


$cod_grabacion=strtoupper($result->fields["cod_grabacion"]);

$fecha=strtoupper($result->fields["fecha"]);
$matricula=strtoupper($result->fields["matricula"]);
$prescriptor=strtoupper($result->fields["medico"]);
$confirmada=strtoupper($result->fields["confirmada"]);

include ("../../conexiones/config_gb.php");
$sql6 = "SELECT * FROM $detalle where cod_grabacion = $cod_grabacion";
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


if ($nro_a == $nro_afiliado){
	$poner = "*";}
	else{
		$poner = "";
	}



$dia = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio_o = substr($fecha,0,4);

$fecha_mostrar = $dia."/".$mes."/".$anio_o;
$contador = $contador + 1;
include ("../../conexiones/config.inc.php");

$sql1 = "select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db->Execute($sql1);
$nombre=substr($result1->fields["nombre_laboratorio"],0,17);
$nombre = strtoupper($nombre);

/*if ($nro_orden != ""){
	$bandera = 1;
	include ("grabar/pagina_modificar.php");
	exit;}
*/

$renglon = $renglon + 1;
if ($band== 1){
?>  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="cursor:hand" onMouseOver="this.style.background='#FFFF99'; this.style.color='blue'" onMouseOut="this.style.background='#FFFFFF'; this.style.color='black'"><?php 
	$band=2;
}
else
	  {
?>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC" style="cursor:hand" onMouseOver="this.style.background='#FFFF99'; this.style.color='blue'" onMouseOut="this.style.background='#E8DCFC'; this.style.color='black'">
  <?php 
$band=1;
}
?>

<td class="Estilo26"><div align="center"><span class="Estilo28"><?php echo $contador;?></span> </div>   
<?php if ($mostrar_lab != 1){?>
    <th scope="row">      <span class="Estilo30"><?php echo $nro_laboratorio;?></span>
    <td> 
	  <span class="Estilo30">
	  <span class="Estilo28"><?php echo $nombre;?></span></span>      <div align="left" class="Estilo30"></div>    <span class="Estilo26">
      <?php }?>
	
<?php 
	
if (($busca == "5073") or ($busca == "3764")) {

		if ($confirmada == 1){
?><td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $autorizacion;?></span> </div>	  <span class="Estilo26"><?php 
		}

		else{

?></span><td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_orden;?></span> </div><?php 

		}



}

else{

		?></span><td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_orden;?></span> </div><?php 

}



?>
	
	
<td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $lote;?></span> </div>
<td><div align="center"><span class="Estilo26"><span class="Estilo28"><?php echo $conf;?></span></span></div>

<?php if ($nro_os == 4975){?>
<td><div  class="Estilo26"><span class="Estilo28">
<a href="grabar/pagina_modificar_medife.php?$band_mes=1&&cod_grabacion=<?php print("$cod_grabacion");?>&periodo=<?php print("$periodo");?>&&anio_o=<?php print("$año");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"> <?php echo $marca;?>  </a></span><?php echo $marca;?> <blink><?php echo $mar;?></blink> </div>
<?php }else{?>
<td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $marca;?> <blink><?php echo $mar;?></blink></span> </div>
<?php }?>


<?php if ($poner == "*"){?>
    <td bgcolor="#00FF66"><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_afiliado;?> </span>
</div>
<?php }else{?>
    <td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_afiliado;?> </span>
</div>
<?php }?>

    <td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $fecha_mostrar;?></span>
    </div>
    <td><div align="center" class="Estilo31"><a href="detalle.php?id=<?php print("$cod_grabacion");?>&bande_2=1&confirmada=<?php print("$confirmada");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&nombre_laboratorio=<?php print("$nombre_laboratorio");?>&anio=<?php print("$anio");?>"><IMG SRC="../../imagenes/office//137.ico" alt="Imprimir" border = "0"></a></div>

		<span class="Estilo26">
		<?php if ($buscador == 4){?>
        </span>
    <td><div align="center" class="Estilo31"><a href="grabar/pagina_modificar.php?$band_mes=1&&cod_grabacion=<?php print("$cod_grabacion");?>&periodo=<?php print("$periodo");?>&&anio_o=<?php print("$año");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../imagenes/office//295.ico" alt="Modificar" border = "0"> </a></div>
    <td width="5%"><div align="center" class="Estilo31">
		
		<a href="eliminar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&bande_2=1&confirmada=<?php print("$confirmada");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&nombre_laboratorio=<?php print("$nombre_laboratorio");?>&anio=<?php print("$anio");?>" onclick="return confirm('¿Está seguro de Borrar esta orden?');"><IMG SRC="../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div>
	  <span class="Estilo26">
	  <?php }?>
	
	  </span></td>
</tr>




<?php 

	$mar = "";
	$conf = "";
	$cont = $cont + 1;
$result->MoveNext();
	} ?>
<tr bgcolor="#E6E6E6">

		<?php if ($buscador == 4){?>
  <td colspan="13" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>
<?php }else{?>
  <td colspan="13" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>
<?php }?>
</table>
<div align="center"></div>
