<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo12 {color: #FFFFFF}
.Estilo5 {font-size: 12px}
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<script language="javascript">
function on_load()
{
document.getElementById("nro_os").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				

				case "mes":
				document.getElementById("anio").focus();
				break;
				
				case "anio":
				document.getElementById("nro_os").focus();
				break;

				case "nro_os":
				document.getElementById("Alta").focus();
				break;

				
				break;
		}
		return false;
	}
	return true;
}



</script>

</head>

<body  onload = "on_load ()" background="../../../IMAGENES/botones/barra/fondo.gif">


<FORM name="form" ACTION="<?php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
<?php $primera = 1;
 $anio_actual = date("y");
?>

	<table width="894" border="0">
          <tr bgcolor="#000099">
            <th colspan="2" scope="col"><span class="Estilo12">LABORATORIOS RECEPCIONADOS QUE NO HAN SIDO GRABADOS</span></th>
          </tr>
      <tr bgcolor="#E6E6E6">
        <td width="694"> Seleccione Mes
              <select name="mes[]" id="select2" onkeypress="return verif_caracter(this,event)">
                <option value = "01">ENERO</option>
                <option value = "02">FEBRERO</option>
                <option value = "03">MARZO</option>
                <option value = "04">ABRIL</option>
                <option value = "05">MAYO</option>
                <option value = "06">JUNIO</option>
                <option value = "07">JULIO</option>
                <option value = "08">AGOSTO</option>
                <option value = "09">SETIEMBRE</option>
                <option value = "10">OCTUBRE</option>
                <option value = "11">NOVIEMBRE</option>
                <option value = "12">DICIEMBRE</option>
              </select>
               Año: <input name="anio" type="text" id="anio" value="<?php echo $anio_actual;?>" size="5" onkeypress="return verif_caracter(this,event)">
Obra Social: 
<input name="nro_os" type="text" id="nro_os" size="5" onkeypress="return verif_caracter(this,event)">
<input name="primera" type="hidden" value="2">
            <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" > 
<input name="Alta" type="IMAGE" value="IMPRIMIR" id ="Alta" size = "10" SRC="../../imagenes/botones//btn_imprimir.gif">         
	    </td>
        <td width="190"><?php echo $hoy=date("d/m/y");?></td>
      </tr>
  </table>
</form>

<?php 


		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		case "OK":{

$primera=$_POST["primera"];		
$anio=$_POST["anio"];
$anio2 = "20".$anio;

$nro_os=$_POST["nro_os"];		
$me=$_POST["mes"];
	for ($i=0;$i<count($me);$i++)    
	{     
	$mes = $me[$i];    
	}



				switch ($mes)
	{
		case "1":{$periodo= "ENERO";}break;
		case "2":{$periodo= "FEBRERO";}break;
		case "3":{$periodo= "MARZO";}break;
		case "4":{$periodo= "ABRIL";}break;
		case "5":{$periodo= "MAYO";}break;
		case "6":{$periodo= "JUNIO";}break;
		case "7":{$periodo= "JULIO";}break;
		case "8":{$periodo= "AGOSTO";}break;
		case "9":{$periodo= "SETIEMBRE";}break;
		case "10":{$periodo="OCTUBRE";}break;
		case "11":{$periodo="NOVIEMBRE";}break;
		case "12":{$periodo="DICIEMBRE";}break;
				}
	
//$periodo = "MAYO";

?>
<style type="text/css">
<!--
.Estilo26 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo27 {font-family: Arial, Helvetica, sans-serif}
.Estilo28 {font-size: 12px}
.Estilo29 {color: #000000}
-->
</style>

<?php 
global $total;
include ("../../../conexiones/config_or.php");

//$nro_os = "4940";
//$mes = "04";
//$anio = "08";
//$anio2 = "2008";
$hoy = date("d/m/y");


?>
 <!-- <a href="imprimir_validada.php?hoy=<?php print("$hoy");?>&&periodo=<?php print("$periodo");?> &&mes=<?php print("$mes");?>&&anio=<?php print("$anio");?>&&anio2=<?php print("$anio2");?>&&nro_os=<?php print("$nro_os");?>"><IMG SRC="../../../imagenes/botones//btn_imprimir.gif" alt="Imprimir" border = "0"></a> -->



<?php include ("../../../conexiones/config_os.php");
$sql2="select * from datos_os where nro_os like '$nro_os'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);
$denominacion=strtoupper($result2->fields["denominacion"]);?>

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<table width="92%" height="62" border="1">
  <tr bgcolor="#E1F2EF">
<td width="53%" height="31" colspan="8"><div align="center" class="Estilo28"><span class="Estilo29 Estilo6"><strong>CONTROL CRUZADO:    <strong>PERIODO: <?php  echo $mes." - ".$anio;?> OBRA SOCIAL: <?php  echo $sigla." - ".$nro_os;?> </strong>Emitido el:<strong><?php  echo $hoy;?></strong></span></div></td>
  </tr>
  
  <?php 


//include ("../../../conexiones/config_or.php");		
//$sql = "SELECT ordenes_recepcion.recibos.nro_laboratorio, ordenes_recepcion.recibos.nro_recibo , ordenes_recepcion.detalle.nro_os, ordenes_recepcion.detalle.cantidad FROM ordenes_recepcion.recibos INNER JOIN ordenes_recepcion.detalle ON ordenes_recepcion.recibos.nro_recibo = ordenes_recepcion.detalle.nro_recibo WHERE ordenes_recepcion.detalle.nro_os LIKE '$nro_os' AND ordenes_recepcion.detalle.mes LIKE '$mes' AND ordenes_recepcion.detalle.anio LIKE '$anio' GROUP BY ordenes_recepcion.recibos.nro_laboratorio";

include ("../../../conexiones/config_or.php");		
$sql = "SELECT * FROM `detalle`  WHERE  `nro_os` = '$nro_os' AND `mes` = $mes AND `anio`  LIKE '20$anio' ORDER BY nro_recibo";
$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());
 while (!$result->EOF) {

 $nro_recibo=$result->fields["nro_recibo"];

include ("../../../conexiones/config_or.php");		
$sql32= "select * from recibos where nro_recibo like '$nro_recibo'";
$result32 = $db->Execute($sql32);

$nro_laboratorio=$result32->fields["nro_laboratorio"];





include ("../../../conexiones/config_gb.php");		
$sql1 = "SELECT nro_laboratorio FROM `ordenes`  WHERE  `nro_laboratorio` = $nro_laboratorio AND `periodo` = $mes AND `ano`  LIKE '$anio' and nro_os = '$nro_os' AND (confirmada = 7 or confirmada = 10) GROUP BY nro_laboratorio ORDER BY nro_laboratorio";
$result2 = $db->Execute($sql1);

$nro_lab_grab=$result2->fields["nro_laboratorio"];




if ($nro_laboratorio != $nro_lab_grab){
	include ("../../../conexiones/config.inc.php");
 $sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio." (".$nro_laboratorio.")";
?><tr bgcolor="#E8DCFC">
    <td height="23" colspan="8"><?php echo "Falta grabar el Laboratorio ".$nro_laboratorio. " - ".$nombre_laboratorio;?></td>
  </tr><?php 

$result->MoveNext(); // sdsd
}
else {
$result->MoveNext(); // sdsd
 }
}


/*
include ("../../../conexiones/config_gb.php");		
$sql25 = "SELECT * FROM `ordenes`  WHERE  `nro_os` = $nro_os AND `periodo` = $mes AND `ano`  LIKE '$anio' GROUP BY nro_laboratorio ORDER BY nro_laboratorio";
$result25 = $db->Execute($sql25);

if (!$result25) die("fallo".$db->ErrorMsg());
 while (!$resul25->EOF) {

$nro_lab=$result25->fields["nro_laboratorio"];

include ("../../../conexiones/config_or.php");		
$sql26= "select * from recibos where nro_laboratorio like '$nro_lab' and `periodo` = $mes AND `anio` LIKE '20$anio'";
$result26 = $db->Execute($sql26);

$nro_recibo=$result26->fields["nro_recibo"];

$sql27= "select * from detalle where nro_recibo like '$nro_recibo' and nro_os = $nro_os";
$result27 = $db->Execute($sql27);

$nro_os_1=$result27->fields["nro_os"];

if ($nro_os_1 != ""){
	$nro_lab_recep=$result26->fields["nro_laboratorio"];
//if ($nro_lab


if ($nro_lab != $nro_lab_recep){
	include ("../../../conexiones/config.inc.php");
 $sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_lab";
$result5 = $db->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio." (".$nro_laboratorio.")";
?><!-- <tr bgcolor="#E8DCFC">
    <td height="23" colspan="8"><?php echo "Falta grabar el Laboratorio ".$nro_lab. " - ".$nombre_laboratorio;?></td>
  </tr> --><?php 
/*
$result25->MoveNext(); // sdsd
}
else {
$result25->MoveNext(); // sdsd
 }

}}
*/
break;
 }
	}}
 
 
 

?> </table>
</html><?php 


		
?>

