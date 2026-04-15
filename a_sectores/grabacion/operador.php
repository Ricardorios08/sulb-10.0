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


    
<?php 



$operador= $_REQUEST['operador'];


$ordenar;



include ("../../conexiones/config_os.php");

$sql2="select * from datos_os where nro_os like '$busca'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);




include ("../../conexiones/config_gb.php");

if ($operador == ""){
exit;}

$nro_os = $busca;
    if (($nro_os == "") && ($nro_laboratorio == "") && ($nro_orden == "") && ($lote == "")){
 $sql="select * from ordenes where operador like '$operador' and periodo = $mes and ano = '$anio' order by $ordenar";
$mostrar_os = "SI";}
elseif (($nro_os != "") && ($nro_laboratorio == "") && ($nro_orden == "") && ($lote == "")){
$sql="select * from ordenes where operador like '$operador' and nro_os = $nro_os and periodo = $mes and ano = '$anio' order by $ordenar";}
elseif (($nro_os != "") && ($nro_laboratorio != "") && ($nro_orden == "") && ($lote == "")){
$sql="select * from ordenes where operador like '$operador' and nro_os = $nro_os and nro_laboratorio = $nro_laboratorio and periodo = $mes and ano = '$anio' order by $ordenar";}
elseif (($nro_os != "") && ($nro_laboratorio != "") && ($nro_orden != "") && ($lote == "")){
 $sql="select * from ordenes where operador like '$operador' and nro_os = $nro_os and nro_laboratorio = $nro_laboratorio and nro_orden like '%$nro_orden' and periodo = $mes and ano = '$anio' order by $ordenar" ;}
elseif (($nro_os != "") && ($nro_laboratorio != "") && ($nro_orden != "") && ($lote != "")){
 $sql="select * from ordenes where operador like '$operador' and nro_os = $nro_os and nro_laboratorio = $nro_laboratorio and lote like '$lote%' and periodo = $mes and ano = '$anio' order by $ordenar";}
elseif (($nro_os != "") && ($nro_laboratorio != "") && ($nro_orden == "") && ($lote != "")){
 $sql="select * from ordenes where operador like '$operador' and nro_os = $nro_os and nro_laboratorio = $nro_laboratorio and lote like '$lote%' and periodo = $mes order by $ordenar";}
elseif (($nro_os != "") && ($nro_laboratorio == "") && ($nro_orden == "") && ($lote != "")){
 $sql="select * from ordenes where operador like '$operador' and nro_os = $nro_os and lote like '$lote%' and periodo = $mes order by $ordenar";}
elseif (($nro_os == "") && ($nro_laboratorio == "") && ($nro_orden == "") && ($lote != "")){
$sql="select * from ordenes where lote like '$lote%' and periodo = $mes and ano = '$anio' order by $ordenar";}
elseif (($nro_os != "") && ($nro_laboratorio == "") && ($nro_orden != "") && ($lote != "")){
 $sql="select * from ordenes where operador like '$operador' and nro_os = $nro_os and ano = '$anio' and nro_orden like '%$nro_orden' and lote like '$lote%' and periodo = $mes order by $ordenar";}
elseif (($nro_os != "") && ($nro_laboratorio == "") && ($nro_orden != "") && ($lote == "")){
$sql="select * from ordenes where operador like '$operador' and nro_os = $nro_os and ano = '$anio' and nro_orden like '%$nro_orden' and periodo = $mes order by $ordenar";}
elseif (($nro_os == "") && ($nro_laboratorio == "") && ($nro_orden != "") && ($lote == "")){
 $sql="select * from ordenes where operador like '$operador' and ano = '$anio' and nro_orden like '%$nro_orden' and periodo = $mes order by $ordenar";
$mostrar_os = "SI";}
$result = $db->Execute($sql);





$año=strtoupper($result->fields["ano"]);

	
	include ("../../conexiones/config.inc.php");
	$sql8="select * from usuarios where id = '$operador'";
$result8 = $db->Execute($sql8);
$nombre_operador=strtoupper($result8->fields["usuario"]);

	?>
<tr bgcolor="#E6E6E6">
    <td scope="row"><div align="center"><span class="Estilo23">Operador: <span class="Estilo27"><?php echo "(".$operador.") ".$nombre_operador;?> Obra Social: <?php echo "(".$busca.") ".$sigla;?></span></span></div></td>

	<td scope="row"><div align="center"><span class="Estilo23">Periodo: <span class="Estilo24"><span class="Estilo25"><?php echo $mes;?></span></span> Año: <span class="Estilo27"><?php echo $año;?></span>        <span class="Estilo25">
  <?php 
$nro_lab = 2;
?>
</span></span></div></td>
</tr>
</table>

<table width="91%" height="149" border="0">
  <tr bgcolor="#000099">

  <td width="2%"><div align="center" class="Estilo19"> N&ordm; </div></td>

<?php  if ($mostrar_lab != 1){?>
    <th width="3%" scope="row"><div align="center" class="Estilo1 Estilo13"><strong>N&ordm;</strong></div>      </th>
    <td width="20%"><div align="center" class="Estilo16 Estilo17">Laboratorio</div></td>
	<?php }?>

	<?php if ($nro_os == "5073"){?>
    <td width="8%"><div align="center" class="Estilo19"> Autorización </div></td>
	<?php }?>

    <td width="8%"><div align="center" class="Estilo19"> Orden </div></td>

		<?php if ($mostrar_os== "SI"){?>
    <td width="8%"><div align="center" class="Estilo19"> Obr. Soc </div></td>
	<?php }?>
<td width="11%"><div align="center" class="Estilo19">Lote</div></td>
<td width="12%"><div align="center" class="Estilo19">Marca</div></td>

    <td width="10%"><div align="center" class="Estilo19">Afiliado </div></td>
    <td width="5%"><div align="center" class="Estilo19">Fecha</div></td>
    <td width="4%"><div align="center" class="Estilo19">Detalle</div></td>
<?php if ($buscador == 4){?>
    <td width="6%"><div align="center" class="Estilo19">Modificar</div></td>
	<td width="11%"><div align="center" class="Estilo19">Eliminar</div></td>
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
  <th colspan="7" scope="row"> <?php echo $nombre;?> </tr>
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

$dia = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio_o = substr($fecha,0,4);

include ("../../conexiones/config.inc.php");

$sql1 = "select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db->Execute($sql1);
$nombre=substr($result1->fields["nombre_laboratorio"],0,17);
$nombre = strtoupper($nombre);

$renglon = $renglon + 1;
if ($band== 1){
?><tr bgcolor="#FFFFFF"><?php 
	$band=2;
}
else
	  {
?><tr bgcolor="#E8DCFC">	  <?php 
$band=1;
}
?>

<td class="Estilo26"><div align="center"><span class="Estilo28"><?php echo $renglon;?></span> </div>   
<?php if ($mostrar_lab != 1){?>
    <th scope="row">      <span class="Estilo30"><?php echo $nro_laboratorio;?></span>
    <td> 
	  <span class="Estilo30">
	  <?php echo $nombre;?> 
      </span>	  <div align="left" class="Estilo30"></div>
      <span class="Estilo26">
      <?php }?>
	
		<?php if ($nro_os == "5073"){?>
	  </span>
    <td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $autorizacion;?></span> </div>
	  <span class="Estilo26">
	  <?php }else{?>
	  </span>
    <td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_orden;?></span> </div>
<?php }?>

	<?php if ($mostrar_os == "SI"){?>

    <td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_os;?></span> </div>
<?php }?>


<td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $lote;?></span> </div>
<td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $marca;?></span> </div>


    <td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_afiliado;?></span>
</div>
    <td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $fecha;?></span>
    </div>
    <td><div align="center" class="Estilo31"><a href="detalle.php?id=<?php print("$cod_grabacion");?>&bande_2=1&confirmada=<?php print("$confirmada");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&nombre_laboratorio=<?php print("$nombre_laboratorio");?>"><IMG SRC="../../imagenes/office//137.ico" alt="Imprimir" border = "0"></a></div>

		<span class="Estilo26">
		<?php if ($buscador == 4){?>
        </span>
    <td><div align="center" class="Estilo31"><a href="grabar/pagina_modificar.php?$band_mes=1&&cod_grabacion=<?php print("$cod_grabacion");?>&periodo=<?php print("$periodo");?>&&anio_o=<?php print("$año");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../imagenes/office//295.ico" alt="Modificar" border = "0"> </a></div>
    <td><div align="center" class="Estilo31">
		
		<a href="eliminar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&bande_2=1&confirmada=<?php print("$confirmada");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&nombre_laboratorio=<?php print("$nombre_laboratorio");?>"><IMG SRC="../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div>
	  <span class="Estilo26">
	  <?php }?>
	
	  </span></td>
</tr>




<?php 
	$cont = $cont + 1;
$result->MoveNext();
	} ?>
<tr bgcolor="#E6E6E6">

		<?php if ($buscador == 4){?>
  <td colspan="9" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>
<?php }else{?>
  <td colspan="9" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>
<?php }?>
</table>
<div align="center"></div>
