<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo1 {color: #FF0000}
-->
</style></head>
<body>

<?php  include("../../../conexiones/config.inc.php");

$sql="select * from datos_personales order by matricula asc";
$result = $db_bq->Execute($sql);


?>
<table width="1495" border="0">
  <tr bgcolor="#FFFFFF">
    <td colspan="9"><div align="center">LISTADO DE BIOQUIMICOS CONTRA CUENTAS ABM</div></td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td width="45">MATRIC</font></div></td>
    <td width="279">NOMBRE BIOQUIMICO </font></div></td>
    <td width="51">ESTADO</td>
    <td width="346"><div align="center">CUENTA CON ABM</div></td>
    <td width="122"><div align="center">FACTURANTE</font>
        </div>
    </div></td>
    <td width="122"><div align="center">SIT IVA </div></td>
    <td width="122"><div align="center">TIPO SOCIEDAD</div></td>
    <td width="122"><div align="center">RET AFIP </div></td>
    <td width="122"><div align="center">RET ING BRUTOS </div></td>
  </tr>


<?php 

  if (!$result) die("fallo".$db_bq->ErrorMsg());
  while (!$result->EOF) {

	
$matricula=$result->fields["matricula"];
$apellido=strtoupper($result->fields["apellido"]);
$nombre=strtoupper($result->fields["nombre"]);

$estado=strtoupper($result->fields["estado"]); 
$cuenta_descontar_cuota=$result->fields["cuenta_descontar_cuota"];

$sql2="select * from afip where nro_laboratorio = $nro_laboratorio";
$result2 = $db_bq->Execute($sql2);
$sit_iva=$result2->fields["sit_iva"];
$requisitos_afip=$result2->fields["requisitos_afip"];


switch ($requisitos_afip){
case "0":{$requisitos_afip = "BIOQ S/ RET";break;}
case "1":{$requisitos_afip = "BIOQ C/ RET";break;}
case "2":{$requisitos_afip = "SOC S/ RET";break;}
case "3":{$requisitos_afip = "SOC C/ DIS";break;}
case "4":{$requisitos_afip = "BIOQ C/ RET";break;}
	}    


switch ($sit_iva){
case "1":{$sit_iva = "RI";break;}
case "2":{$sit_iva = "RNI";break;}
case "3":{$sit_iva = "MON";break;}
case "4":{$sit_iva = "EXE";break;}
	} 


$sql2="select * from ing_bruto where nro_laboratorio = $nro_laboratorio";
$result2 = $db_bq->Execute($sql2);
$requisitos_ib=$result2->fields["requisitos_ib"];

switch ($requisitos_ib){
case "0":{$requisitos_ib = "BIOQ S/ RET";break;}
case "1":{$requisitos_ib = "BIOQ C/ RET";break;}
case "2":{$requisitos_ib = "SOC S/ RET";break;}
case "3":{$requisitos_ib = "SOC C/ DIS";break;}
case "4":{$requisitos_ib = "BIOQ C/ RET";break;}
	}    

$sql2="select * from facturante where nro_laboratorio = $nro_laboratorio";
$result2 = $db_bq->Execute($sql2);
$facturante=$result2->fields["facturante"];

if ($facturante == ""){
$facturante = "SIN REG";
}

$sql2="select * from datos_laboratorio where nro_laboratorio = $matricula";
$result2 = $db_bq->Execute($sql2);

$nro_laboratorio=$result2->fields["nro_laboratorio"];
$nombre_laboratorio=$result2->fields["nombre_laboratorio"];
$tipo_sociedad=$result2->fields["tipo_sociedad"];

switch ($tipo_sociedad){
case "0":{$tipo_sociedad = "Ninguna";break;}
case "1":{$tipo_sociedad = "Soc. Hecho ";break;}
case "2":{$tipo_sociedad = "S.R.L";break;}
case "3":{$tipo_sociedad = "S.A.";break;}
case "4":{$tipo_sociedad = "Soc. Hecho - Inscripta";break;}

	}


if ($nro_laboratorio == ""){
	$nro_laboratorio = "SIN CUENTA EN SISTEMA ABM";

?>  <tr bgcolor="#FFFFCC">
    <td><span class="Estilo1"><?php print("$matricula");?></span></td>
    <td><span class="Estilo1"><?php print("$apellido"."  ");?> - <?php print("$nombre");?></span></td>
    <td><div align="center" class="Estilo1"><?php echo $estado;?></div></td>
    <td><span class="Estilo1"><blink><?php echo $nro_laboratorio;?> <?php echo $nombre_laboratorio;?></blink></span></td>
    <td><div align="center"><span class="Estilo1"><?php echo $facturante;?></span></div></td>
    <td><div align="center"><span class="Estilo1"><?php echo $sit_iva;?></span></div></td>
    <td><div align="center"><span class="Estilo1"><?php echo $tipo_sociedad;?></span></div></td>
    <td><div align="center"><span class="Estilo1"><?php echo $requisitos_afip;?></span></div></td>
    <td><div align="center"><span class="Estilo1"><?php echo $requisitos_ib;?></span></div></td>
    </tr><?php 

}
else{

?>  <tr>
    <td><?php print("$matricula");?></td>
    <td><?php print("$apellido"."  ");?> - <?php print("$nombre");?></td>
    <td><div align="center"><?php echo $estado;?></div></td>
    <td><?php echo $nro_laboratorio;?> <?php echo $nombre_laboratorio;?></td>
    <td><div align="center"><?php echo $facturante;?></div></td>
    <td><div align="center"><?php echo $sit_iva;?></div></td>
    <td><div align="center"><?php echo $tipo_sociedad;?></div></td>
    <td><div align="center"><?php echo $requisitos_afip;?></div></td>
    <td><div align="center"><?php echo $requisitos_ib;?></div></td>
    </tr>
  <?php 
}


?>


<?php 


	

$result->MoveNext();
	}

?>
</table>
</body>
