<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

 
 

<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo3 {
	font-size: 12px;
	font-weight: bold;
}
.Estilo33 {
	font-family: "Trebuchet MS";
	font-weight: bold;
	font-size: 12px;
}
.Estilo35 {font-size: 12px; font-family: "Trebuchet MS"; }
.Estilo37 {font-family: "Trebuchet MS"}
-->
</style>



</head>





<table width="784" border="1" cellspacing="0">
  <!--DWLayoutTable-->

  <tr >
    <td colspan="7" valign="top"><div align="center" class = "titulo3">Listado de Pacientes</div></td>
  </tr>
  <tr>
    <td width="68" bgcolor="#B8B8B8"><div align="center" class="Estilo35">Ultima Atenci&oacute;n </div></td>
    <td width="259" bgcolor="#B8B8B8"><span class="Estilo35">Nombre y Apellido del Paciente </span></td>
	<td width="42" bgcolor="#B8B8B8"><div align="center" class="Estilo35">Sexo </div></td>
    <td width="52" bgcolor="#B8B8B8"><div align="center" class="Estilo33">Afiliado</div></td>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo35">Obra Social </div></td>

    <td width="81" bgcolor="#B8B8B8"><div align="center" class="Estilo35">Historia Cl&iacute;nica </div></td>
  </tr>


<?php 

//$sql="select * from pacientes  where ultima_fecha between '$desde' and '$hasta' order by  ultima_fecha, nro_llegada, nombre";

$sql="select * from pacientes ORDER BY apellido";
$result = $db->Execute($sql);


 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $nro_paciente=$result->fields["nro_paciente"];
 $nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$ultima_fecha=strtoupper($result->fields["ultima_fecha"]);
$sexo=strtoupper($result->fields["sexo"]);

$dia  = substr($ultima_fecha,8,2);
$mes  = substr($ultima_fecha,5,2);
$anio = substr($ultima_fecha,0,4);
$ultima_fecha = $dia."/".$mes."/".$anio;


 $nro_os=$result->fields["nro_os"];
 $nro_documento=$result->fields["nro_afiliado"];

$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);






?>
  

  <tr>
    <td valign="middle" bgcolor="#FFFFFF"><div align="left" class="Estilo37">
      <div align="center"><span class="Estilo3"><?php echo $ultima_fecha;?></span></div>
    </div></td>
    <td valign="middle" bgcolor="#FFFFFF"><span class="Estilo37"><span class="Estilo3"><?php echo $apellido;?> <?php echo $nombre;?> (<?php echo $nro_paciente;?>)</span></span></td>
<td valign="middle" bgcolor="#FFFFFF"><div align="center" class="Estilo37"><font size="1"><span class="Estilo3"><?php echo $sexo;?></span></font></div></td>
    <td valign="middle" bgcolor="#FFFFFF"><div align="center" class="Estilo37"><font size="1"><span class="Estilo3"><?php echo $nro_documento;?></span></font></div></td>
    <td width="36" valign="middle" bgcolor="#FFFFFF"><div align="center" class="Estilo35"><span class="Estilo37"><?php echo $nro_os;?></span></div></td>
    <td width="216" valign="middle" bgcolor="#FFFFFF"><span class="Estilo37"><span class="Estilo35"><?php echo $sigla;?></span></span></td>
    <td valign="middle" bgcolor="#FFFFFF"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="buscar_paciente_individual.php?palabra=<?php print("$nro_paciente");?>" target = "central"><img src="../../imagenes/office//027.ico" alt="Modificar" border = "0"></a></font></div></td>
  </tr>
  
  
 


 <?php 

$ordenes = "ordenes";
$detalle = "detalle";

$sql3="select * from $ordenes where nro_paciente = $nro_paciente order by fecha_grabacion";
$result3 = $db->Execute($sql3);

 if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {

$diagnostico=strtoupper($result3->fields["diagnostico"]);
$motivo=strtoupper($result3->fields["motivo"]);
$observaciones=strtoupper($result3->fields["observaciones"]);
$fecha_grabacion=strtoupper($result3->fields["fecha_grabacion"]);

$dia = substr($fecha_grabacion,8,2);
$mes= substr($fecha_grabacion,5,2);
$anio = substr($fecha_grabacion,0,4);
$fecha_grabacion = $dia."-".$mes."-".$anio;


?>
 

<?php 

$result3->MoveNext();
		}



$ordenes = "ordenes";
$detalle = "detalle";

$sql2="select * from $ordenes where nro_paciente = $nro_paciente order by fecha_grabacion";
$result2 = $db->Execute($sql2);

 if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {

$nro_os=strtoupper($result2->fields["nro_os"]);
$nro_paciente=strtoupper($result2->fields["nro_paciente"]);
$periodo=strtoupper($result2->fields["periodo"]);
$marca=strtoupper($result2->fields["marca"]);
$lote=strtoupper($result2->fields["lote"]);
$cod_operacion=strtoupper($result2->fields["cod_operacion"]);



$año=strtoupper($result2->fields["ano"]);
$nro_afiliado=$result2->fields["nro_afiliado"];
$nro_orden=$result2->fields["nro_orden"];
$autorizacion=strtoupper($result2->fields["autorizacion"]);
$operador=strtoupper($result2->fields["operador"]);


$cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);

$fecha_grabacion=strtoupper($result2->fields["fecha_grabacion"]);

$dia = substr($fecha_grabacion,8,2);
$mes= substr($fecha_grabacion,5,2);
$anio = substr($fecha_grabacion,0,4);
$fecha_grabacion = $dia."-".$mes."-".$anio;


$fecha=strtoupper($result2->fields["fecha"]);


$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);
$fecha = $dia."-".$mes."-".$anio;



$matricula=strtoupper($result2->fields["matricula"]);
$prescriptor=strtoupper($result2->fields["medico"]);
$confirmada=strtoupper($result2->fields["confirmada"]);

 
 if ($band == 1){
 $band = 2;
 ?>
 
  <?php }?>
  
<?php 

$result2->MoveNext();
		}

$result->MoveNext();
		}

		if ($nombre == ""){?>
		

<?php }else{?>
  
<?php }?>
</table>

</body>
</html>