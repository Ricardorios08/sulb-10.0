<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo12 {color: #FFFFFF}
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
.Estilo30 {font-size: 12px}
.Estilo31 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
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
<?$primera = 1;
 $anio_actual = date("y");
?>

	<table width="894" border="0">
          <tr bgcolor="#000099">
            <th colspan="2" scope="col"><span class="Estilo12">AFILIADOS ERRONEOS</span></th>
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
               Año: <input name="anio" type="text" id="anio" value="<?echo $anio_actual;?>" size="5" onkeypress="return verif_caracter(this,event)">
Obra Social: 
<input name="nro_os" type="text" id="nro_os" size="5" onkeypress="return verif_caracter(this,event)">
<input name="primera" type="hidden" value="2">
            <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" > 
	    </td>
        <td width="190"><?echo $hoy=date("d/m/y");?></td>
      </tr>
  </table>
</form>

<?


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

<?
global $total;
include ("../../../conexiones/config_or.php");


$hoy = date("d/m/y");



include ("../../../conexiones/config_os.php");
$sql2="select * from datos_os where nro_os like '$nro_os'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);
$denominacion=strtoupper($result2->fields["denominacion"]);?>

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">

  
  <?



include ("../../../conexiones/config_gb.php");		
$sql = "SELECT cod_grabacion, nro_afiliado, nro_orden, nro_laboratorio FROM `ordenes`  WHERE  `nro_os` = $nro_os AND `periodo` = $mes AND `ano`  LIKE '$anio' AND confirmada = 7  ORDER BY nro_laboratorio";
$result = $db->Execute($sql);


	
if (!$result) die("fallo".$db->ErrorMsg());
 while (!$result->EOF) {


$nro_afiliado_orden=$result->fields["nro_afiliado"];

$nro_orden=$result->fields["nro_orden"];
$nro_laboratorio=$result->fields["nro_laboratorio"];

/*
include ("../../../conexiones/config.inc.php");
 $sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
*/

echo "fds".$nro1 = substr($nro_afiliado_orden,3,-5);
$nro1 = "00000000".$nro1;

include ("../../../conexiones/config_os.php");	
echo  $sql1 = "SELECT nro_afiliado FROM `afiliados`  WHERE  `nro_afiliado` like '$nro1'";
$result1 = $db->Execute($sql1);
$nro_afiliado_padron=$result1->fields["nro_afiliado"];


if ($nro_afiliado_padron == ""){
	if ($nro_os == "4975"){
$cod_grabacion=$result->fields["cod_grabacion"];
include ("../../../conexiones/config_gb.php");	
$sql2 = "UPDATE `ordenes` SET `confirmada` = '8' WHERE `cod_grabacion` like '$cod_grabacion'";
//mysql_query($sql2);
$sql3 = "UPDATE `detalle` SET `confirmada` = '8' WHERE `cod_grabacion` like '$cod_grabacion'";
//mysql_query($sql3);
	}


$renglon = $renglon + 1;

?><!-- <tr bgcolor="#E8DCFC">
    <td height="23"><div align="center" class="Estilo6 Estilo30"><?echo $renglon;?>
      </div>
    <div align="center" class="Estilo31"></div></td>
	    <td height="23"><div align="center" class="Estilo31"><?echo $nro_orden;?>
</div>
        <div align="center" class="Estilo31"></div></td>
	    <td height="23"><span class="Estilo31"><?echo $nro_laboratorio;?> <? $nombre_laboratorio;?>
        </span>
        <div align="center" class="Estilo31"></div></td>
	    <td height="23"><div align="center" class="Estilo31"><?echo $nro_afiliado_orden;?>
          </div>
        <div align="center" class="Estilo31"></div></td>
	    <td height="23">	      <div align="center" class="Estilo31"></div></td>
	    <td height="23">&nbsp;</td>
	    <td height="23" colspan="7"><div align="center"></div></td>
  </tr> --><?
}


$result->MoveNext(); 

 
 }


include ("ver_afiliados_pendientes.php");

break;
 }
	}
 
		}
 

?> </table>
</html>

