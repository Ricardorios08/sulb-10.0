<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

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
							
				case "lote":
				document.getElementById("periodo").focus();
				break;
				
				case "periodo":
				document.getElementById("anio").focus();
				break;
				
				case "anio":
				document.getElementById("nro_os").focus();
				break;

				case "nro_os":
				document.getElementById("nro_laboratorio").focus();
				break;

				case "nro_laboratorio":
				document.getElementById("OK").focus();
				break;
					
								
		}
		return false;
	}
	return true;
}


</script>



<style type="text/css">
<!--
.Estilo1 {color: #000000}
.Estilo25 {color: #FF0000}
.Estilo26 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
}
.Estilo27 {font-family: Arial, Helvetica, sans-serif}
.Estilo28 {
	color: #FF0000;
	font-family: Arial, Helvetica, sans-serif;
	font-style: italic;
	font-size: 12px;
}
.Estilo29 {font-size: 12px}
.Estilo30 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo31 {
	font-size: 12px;
	color: #FF0000;
	font-style: italic;
}
-->
</style>
</head>

<?php 

$cod_grabacion=$_REQUEST['cod_grabacion'];
$periodo=$_REQUEST['periodo'];
$anio= $_REQUEST['anio'];
$operador=$_REQUEST['operador'];


include ("../../../conexiones/config_gb.php");
$sql="select * from grabadas_temp where cod_grabacion = $operador ";
$result = $db->Execute($sql);

$periodo1=strtoupper($result->fields["periodo"]);
$ano=strtoupper($result->fields["ano"]);
$nro_os=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$nombre_afiliado=strtoupper($result->fields["nombre_afiliado"]);
$nro_orden=strtoupper($result->fields["nro_orden"]);
$fecha=strtoupper($result->fields["fecha"]);
$fecha_realizacion=strtoupper($result->fields["fecha_realizacion"]);
$medico=strtoupper($result->fields["medico"]);
$nombre_medico=strtoupper($result->fields["nombre_medico"]);
$coseguro=strtoupper($result->fields["coseguro"]);
$autorizacion=strtoupper($result->fields["autorizacion"]);
$confirmada=strtoupper($result->fields["confirmada"]);
$marca=strtoupper($result->fields["marca"]);
$lote=strtoupper($result->fields["lote"]);

$operador=strtoupper($result->fields["operador"]);
$nombre_operador=strtoupper($result->fields["nombre_operador"]);

if (strlen($periodo1) == 1){
$periodo1 = "0".$periodo1;
}

 /*$sql1="select * from ordenes where cod_grabacion = $cod_grabacion";
$result1 = $db->Execute($sql1);
 $cod_gra=strtoupper($result1->fields["cod_grabacion"]);

$cod_grabaci = $cod_grabacion;

if ($cod_gra != ""){

$cod_grabacion = $cod_gra + 1;

$sql1="select * from grabadas_temp order by cod_grabacion desc";
$result1 = $db->Execute($sql1);
 $cod_gra1=strtoupper($result1->fields["cod_grabacion"]);
$cod_grabacion = $cod_gra1 + 1;


 $sql1="select * from ordenes order by cod_grabacion desc";
$result1 = $db->Execute($sql1);
 $cod_gra1=strtoupper($result1->fields["cod_grabacion"]);
$cod_grabacion = $cod_gra1 + 1;


 $sql80 = "UPDATE detalle_temp SET `cod_grabacion` = $cod_grabacion WHERE `cod_grabacion` = '$cod_grabaci'";
mysql_query($sql80);
 $sql90 = "UPDATE grabadas_temp SET `cod_grabacion` = $cod_grabacion WHERE `cod_grabacion` = '$cod_grabaci'";
mysql_query($sql90);

}
else
{
$cod_grabacion = $cod_grabacion;
}

*/




$fecha_grabacion = date("Y-m-d");
include ("../../../conexiones/config_gb.php");
$sql = "INSERT INTO `ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_laboratorio` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` , `suma_coseguro` , `tipo_fact` , `cod_diag` , `cod_grabacion1` , `fecha_grabacion`, `iva` , `neto_gravado` , `exento` , `total_orden` , `fecha_realizacion` ) VALUES ( '' , '$periodo1' , '$ano' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$nro_afiliado' , '$nro_orden' , '$fecha' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , '$confirmada' , '$marca' , '$lote' , '$operador' , '' , '' , '' , '' , '$fecha_grabacion' , '' , '' , '' , '' , '$fecha_realizacion')";
mysql_query($sql);

$idgenerado = mysql_insert_id();


$sql = "DELETE FROM grabadas_temp where cod_grabacion = $operador";
mysql_query($sql);


$sql10="select * from detalle_temp where cod_grabacion = $operador";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_grabacion2=strtoupper($result10->fields["cod_grabacion"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nro_practica=strtoupper($result10->fields["nro_practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);

include ("../../../conexiones/config_gb.php");
 $sql ="INSERT INTO `detalle` ( `cod_grabacion` , `nro_os` , `nro_laboratorio` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` , `marca` , `lote`, `operador`  ) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '$valor' ,'$periodo1' , '$ano' , '$nro_factura' , '$confirmada' , '' , '$marca' , '$lote' , '$operador')";
mysql_query($sql);

$result10->MoveNext();

	}
include ("../../../conexiones/config_gb.php");
$sql = "DELETE FROM detalle_temp where cod_grabacion = $operador";
mysql_query($sql);

//}

/*else{
$leyenda = "NUMERO DUPLICADO";
INCLUDE ("../../../alertas/campo_informacion2.php");
exit;

}*/
/*
$ano = date("y");
if (strlen($ano) == 1){
$ano = "0".$ano;
}

*/
?>



<BODY onload = "on_load()">

<FORM name="form" ACTION="pagina1.php" METHOD = "POST">
<table width="103%" cellpadding="2" cellspacing="0">
 <tr bgcolor="#000099" >
   <td colspan="2" class="left" ><div align="center" class="Estilo1 Estilo26">GRABACION DE ORDENES </div></td>
   <td bgcolor="#FF0000" class="left" ><div align="center"><span class="Estilo1 Estilo26">OPERADORES</span></div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right"><span class="Estilo27 Estilo29"><span class="Estilo1">Operador</span></span></div></td>
   <td class="left" ><input type="text" size="5" name="operador" class="text"  value = "<?php echo $operador;?>" id="nro_os3" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
   <td width="30%" bgcolor="#F8C8A5" class="left" ><div align="left">106. ESTHER</div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td width="32%" bgcolor="#C4D7E6" class="left" ><div align="right" class="Estilo27 Estilo29"><span class="Estilo1">Nom</span>bre de Archivo o Lote:</div></td>
   <td width="37%" class="left" ><span class="Estilo5">
   <input type="text" size="25" name="lote" id="lote" onKeyPress="return verif_caracter(this,event)" tabindex = "1" value = "<?php echo $lote;?>" maxlength="20">
   <span class="Estilo28">* (Opcional) </span></span></td>
   <td width="30%" valign="top" bgcolor="#F8C8A5" class="left" ><div align="left">107. </div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" >       <div align="center" class="Estilo5 Estilo27 Estilo29">
         <div align="right">Periodo:         </div>
      </div></td>
   <td class="left" ><input type="text" size="2" name="periodo" id="periodo" value = "<?php echo $periodo1;?>" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
     <span class="Estilo27"><span class="Estilo29">A&ntilde;o</span>:</span>     <input type="text" size="2" name="anio" id="anio" value = "<?php echo $ano;?>" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
   <td width="30%" valign="top" bgcolor="#F8C8A5" class="left" ><div align="left">108. </div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right" class="Estilo30">O. Social:
      </div></td>
   <td class="left" ><input type="text" size="5" name="nro_os" class="text"  id="nro_os" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
   <td width="30%" valign="top" bgcolor="#F8C8A5" class="left" ><div align="left">109.CARLOS</div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right" class="Estilo30">Nº Laboratorio:</div></td>
   <td class="left" >
     <input type="text" size="5" name="nro_laboratorio" id = "nro_laboratorio" class="text" tabindex = "3" onKeyPress="return verif_caracter(this,event)">
     <span class="right">
     <input type="submit" name="Alta" value="OK" id = "Alta" tabindex = "4">
     </span></td>
   <td width="30%" valign="top" bgcolor="#F8C8A5" class="left" ><div align="left">110. GICO</div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" >&nbsp;</td>
   <td class="left" >&nbsp;</td>
   <td valign="top" bgcolor="#F8C8A5" class="left" ><div align="left"></div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td colspan="3" bgcolor="#FFFFFF" class="left" ><div align="center"></div>     <div align="center"><span class="Estilo31">* Cuando en alguna Obra Social exista alg&uacute;n tipo de separaci&oacute;n ingrese nombre o lote.<em>ej: Andar-Visitar se graba en archivos o lotes separados. O en los casos de Lotes con IVA o Sin IVA. </em></span></div>     <div align="center"></div></td>
   </tr>
  </TABLE>
</form>





</body>



<?php //include ("buscar_orden.php");?>



</html>

