<style type="text/css">
<!--
.Estilo1 {color: #FFFFCC}
.Estilo2 {
	color: #0000FF;
	font-size: 10px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo13 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}
.Estilo16 {color: #FFFFCC; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 10px; }
.Estilo17 {color: #FFFFFF}
.Estilo19 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 10px; }
.Estilo22 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
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
-->
</style>

<?php $hoy=date("d/m/y");?>
<table width="103%" border="0">
  <tr bgcolor="#000099">
    <td width="100%" colspan="2" scope="col"><div align="right"><span class="Estilo17">Listado de Ordenes. Emitido el: <?php echo $hoy;?></span></div></td>
  </tr>
    
<?php 

$nro_os = $_REQUEST['nro_os1'];
$nro_laboratorio= $_REQUEST['laboratorio1'];


$me=$_POST["mes1"];
for ($i=0;$i<count($me);$i++)    
{     
$mes= $me[$i];    
}


$buscado=$_POST["buscador"];
for ($i=0;$i<count($buscado);$i++)    
{     
$buscador= $buscado[$i];    
}


include ("../../../conexiones/config_os.php");
$sql2="select * from datos_os where nro_os like '$nro_os'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);



?>

<tr bgcolor="#E6E6E6">
    <td scope="row"><div align="center"><span class="Estilo23">Obra Social: <span class="Estilo27"><?php echo "(".$nro_os.") ".$sigla;?></span></span></div></td>
<?php 
include ("../../../conexiones/config_gb.php");

switch ($buscador){
	case "1":{

if (($nro_os=="") && ($nro_laboratorio=="")){// && ($mes == 13)){
if ($mes == 13){
$sql="select * from ordenes";
}
else{
 $sql="select * from ordenes where periodo = $mes order by nro_laboratorio";
}
}elseif (($nro_os == "") && ($nro_laboratorio!="")){
if ($mes == 13){
 $sql="select * from ordenes where nro_laboratorio = $nro_laboratorio order by nro_laboratorio";
 	   $mostrar_lab = 1;
}
else{
$sql="select * from ordenes where nro_laboratorio = $nro_laboratorio and periodo = $mes order by nro_laboratorio";
 	   $mostrar_lab = 1;
}
}
else{
	if ($nro_laboratorio == ""){
$sql="select * from ordenes where nro_os = $nro_os and periodo = $mes  order by nro_laboratorio";
	}
	else
	{
 $sql="select * from ordenes where nro_os = $nro_os and periodo = $mes and nro_laboratorio = $nro_laboratorio order by nro_laboratorio";
	$mostrar_lab = 1;
	}
}
break;
	}

	case "2":{
if (($nro_os=="") && ($nro_laboratorio=="")){// && ($mes == 13)){
if ($mes == 13){
 $sql="select * from ordenes where confirmada = 1 order by nro_laboratorio";

}
else{
 $sql="select * from ordenes where periodo = $mes and confirmada like '1' order by nro_laboratorio";
}
}elseif (($nro_os == "") && ($nro_laboratorio!="")){
if ($mes == 13){
$sql="select * from ordenes where nro_laboratorio = $nro_laboratorio and confirmada = 1 order by nro_laboratorio";

}
else{
 $sql="select * from ordenes where nro_laboratorio = $nro_laboratorio and periodo = $mes and confirmada = 1 order by nro_laboratorio";
}
}
else{

if ($nro_laboratorio == ""){
$sql="select * from ordenes where nro_os = $nro_os and periodo = $mes  and confirmada = 1  order by nro_laboratorio";

}
else
	{
	   $sql="select * from ordenes where nro_os = $nro_os and periodo = $mes  and confirmada = 1 and nro_laboratorio = $nro_laboratorio order by nro_laboratorio";
	   $mostrar_lab = 1;
	}

}
break;
	}

	case "3":{
if (($nro_os=="") && ($nro_laboratorio=="")){// && ($mes == 13)){
if ($mes == 13){
 $sql="select * from ordenes where confirmada = 7 order by nro_laboratorio";

}
else{
 $sql="select * from ordenes where periodo = $mes and confirmada like '7' order by nro_laboratorio";
}
}elseif (($nro_os == "") && ($nro_laboratorio!="")){
if ($mes == 13){
$sql="select * from ordenes where nro_laboratorio = $nro_laboratorio and confirmada = 7 order by nro_laboratorio";

}
else{
 $sql="select * from ordenes where nro_laboratorio = $nro_laboratorio and periodo = $mes and confirmada = 7 order by nro_laboratorio";
}
}
else{

if ($nro_laboratorio == ""){
$sql="select * from ordenes where nro_os = $nro_os and periodo = $mes  and confirmada = 7  order by nro_laboratorio";

}
else
	{
	  $sql="select * from ordenes where nro_os = $nro_os and periodo = $mes  and confirmada = 7 and nro_laboratorio = $nro_laboratorio order by nro_laboratorio";
	   $mostrar_lab = 1;
	}

}
break;
	}
}

$result = $db->Execute($sql);

$año=strtoupper($result->fields["ano"]);
?>    <td scope="row"><div align="center"><span class="Estilo23">Periodo: <span class="Estilo24"><span class="Estilo25"><?php echo $mes;?></span></span> Año: <span class="Estilo27"><?php echo $año;?></span>        <span class="Estilo25">
  <?php 
$nro_lab = 2;
?>
</span></span></div></td>
</tr>
</table>

<table width="103%" border="0">
  <tr bgcolor="#000099">
<?php  if ($mostrar_lab != 1){?>
    <th scope="row"><div align="center" class="Estilo1 Estilo13"><strong>N&ordm;</strong></div>      </th>
    <td width="32%"><div align="center" class="Estilo16 Estilo17">Laboratorio</div></td>
	<?php }?>
    <td width="12%"><div align="center" class="Estilo19"> Autorización </div></td>
    <td width="12%"><div align="center" class="Estilo19"> Orden </div></td>
    <td width="14%"><div align="center" class="Estilo19">Afiliado </div></td>
    <td width="12%"><div align="center" class="Estilo19">Fecha</div></td>
    <td width="18%"><div align="center" class="Estilo19">Detalle</div></td>
  </tr>
<?php 

if ($mostrar_lab == 1){
	
include ("../../../conexiones/config.inc.php");
$sql1 = "select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db->Execute($sql1);
$nombre=substr($result1->fields["nombre_laboratorio"],0,28);
?>


<tr bgcolor="#E6E6E6">
  <th colspan="6" scope="row"> <?php echo $nombre;?> </tr>
<tr bgcolor="#E8DCFC">
<?php }



 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_os=strtoupper($result->fields["nro_os"]);
$nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$periodo=strtoupper($result->fields["periodo"]);
$año=strtoupper($result->fields["ano"]);
$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$nro_orden=strtoupper($result->fields["nro_orden"]);
$autorizacion=strtoupper($result->fields["autorizacion"]);

$cod_grabacion=strtoupper($result->fields["cod_grabacion"]);

$fecha=strtoupper($result->fields["fecha"]);
$matricula=strtoupper($result->fields["matricula"]);
$confirmada=strtoupper($result->fields["confirmada"]);


include ("../../../conexiones/config.inc.php");

$sql1 = "select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db->Execute($sql1);
$nombre=substr($result1->fields["nombre_laboratorio"],0,28);



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


<?php if ($mostrar_lab != 1){?>
    <th scope="row">      <span class="Estilo22"><?php echo $nro_laboratorio;?></span>
    <td> 
	<span class="Estilo22">
	<?php echo $nombre;?> 
      </span>	<div align="left" class="Estilo22"></div>
<?php }?>
	
	<td><div align="center"><span class="Estilo22"><?php echo $autorizacion;?></span> </div>
	<td><div align="center"><span class="Estilo22"><?php echo $nro_orden;?></span> </div>
    <td><div align="center"><span class="Estilo22"><?php echo $nro_afiliado;?></span>
    </div>
    <td><div align="center"><span class="Estilo22"><?php echo $fecha;?></span>
    </div>
    <td><div align="center" class="Estilo2"><a href="../detalle.php?id=<?php print("$cod_grabacion");?>&bande_2=1&confirmada=<?php print("$confirmada");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&nombre_laboratorio=<?php print("$nombre_laboratorio");?>">[+]</a></div>
	
	
	
	</td>
</tr>




<?php 
	$cont = $cont + 1;
$result->MoveNext();
	} ?>
<tr bgcolor="#E6E6E6">
  <td colspan="6" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>

</table>
<div align="center"></div>
