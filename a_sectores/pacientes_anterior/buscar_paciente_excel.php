<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

 
 <link href="../../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../../css/botonera.css" rel="stylesheet" type="text/css" />

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

<?php

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=pacientes_matile.xls"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

?>



<table width="784" border="1" cellspacing="0">
  <!--DWLayoutTable-->

  <tr>
    <!-- <td width="68" bgcolor="#B8B8B8"><div align="center" class="Estilo35">Ultima Atenci&oacute;n </div></td> -->
    <td width="270" bgcolor="#B8B8B8"><span class="Estilo35">Nombre y Apellido del Paciente </span></td>
	<td width="67" bgcolor="#B8B8B8"><div align="center" class="Estilo35">Documento </div></td>
    <td width="312" bgcolor="#B8B8B8"><div align="center" class="Estilo33">Direccion</div></td>
    <td width="128" bgcolor="#B8B8B8"><div align="center" class="Estilo35">Telefono</div></td>
  </tr>


<?php 

//$sql="select * from pacientes  where ultima_fecha between '$desde' and '$hasta' order by  ultima_fecha, nro_llegada, nombre";

$sql="select * from pacientes ORDER BY nro_os, apellido";
$result = $db->Execute($sql);


 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $nro_paciente=$result->fields["nro_paciente"];
 $nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);

$domicilio=strtoupper($result->fields["domicilio"]);
$localidad=strtoupper($result->fields["localidad"]);

$domicilio = $domicilio." ".$localidad;


$ultima_fecha=strtoupper($result->fields["ultima_fecha"]);
$sexo=strtoupper($result->fields["sexo"]);

$dia  = substr($ultima_fecha,8,2);
$mes  = substr($ultima_fecha,5,2);
$anio = substr($ultima_fecha,0,4);
$ultima_fecha = $dia."/".$mes."/".$anio;


 $nro_os=$result->fields["nro_os"];
 $nro_documento=$result->fields["nro_documento"];

 






?>
  

  <tr>
    <!-- <td valign="middle" bgcolor="#FFFFFF"><div align="left" class="Estilo37">
      <div align="center"><span class="Estilo3"><?php echo $ultima_fecha;?></span></div>
    </div></td> -->
    <td valign="middle" bgcolor="#FFFFFF"><span class="Estilo37"><span class="Estilo3"><?php echo $apellido;?> <?php echo $nombre;?> (<?php echo $nro_paciente;?>)</span></span></td>
<td valign="middle" bgcolor="#FFFFFF"><div align="center" class="Estilo37"><font size="1"><span class="Estilo3"><?php echo $nro_documento;?></span></font></div></td>
    <td valign="middle" bgcolor="#FFFFFF"><div align="center" class="Estilo37"><font size="1"><span class="Estilo3"><?php echo $domicilio;?></span></font></div></td>
    <td valign="middle" bgcolor="#FFFFFF"><div align="center" class="Estilo35"><span class="Estilo37"><?php echo $telefono;?></span></div>      </td>
  </tr>
  
  
 
 <?php 


$result->MoveNext();
		}

 
 ?>
</table>

</body>
</html>