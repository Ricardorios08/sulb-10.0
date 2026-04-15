<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
<link href="../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<script src="../../css/js/bootstrap.min.js"></script>
<script src="../../css/js/jquery.min.js"></script>

	
<script language="javascript">
function on_load()
{
document.getElementById("nro_afiliado").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_paciente":
				document.getElementById("nro_afiliado").focus();
				break;
				case "nro_afiliado":
				document.getElementById("apellido").focus();
				break;
					case "apellido":
				document.getElementById("nombre").focus();
				break;

				case "nombre":
				document.getElementById("nro_documento").focus();
				break;
				case "nro_documento":
				document.getElementById("domicilio").focus();
				break;
			
				case "domicilio":
				document.getElementById("telefono").focus();
				break;
				case "telefono":
				document.getElementById("celular").focus();
				break;
				case "celular":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("GUARDAR").focus();
				break;

				


				
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
.Estilo25 {font-family: "Trebuchet MS"}
.Estilo26 {font-size: 18px}
.Estilo27 {font-family: "Trebuchet MS"; font-size: 18px; }
.Estilo45, .Estilo42 {
	font-size: 24px;
	font-weight: bold;
}

.Estilo46 {font-size: 16px}
-->
</style>
<BODY onload = "on_load()">
<form action="guardar_abm.php" method="post">
<?php 


include ("../../conexiones/config.inc.php");


$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

$nro_laboratorio1=$result10->fields["matricula"];
//$cuit_prestador=$result10->fields["cuit"];
$terminal=$result10->fields["terminal"];





$sql="select * from pacientes ORDER BY nro_paciente DESC";
$result = $db->Execute($sql);
$nro_paciente=($result->fields["nro_paciente"] + 1);
$track=$_POST["track"];

//123_20B_20AFILIADO_20PRUEBA_20AUTORIZ_AUTOM__20310201510_20121_20__610531606719562017_151010150120000008_
//123_B_AFILIADO_PRUEBA_AUTORIZ_AUTOM__20310201510__135___610531606719562017_151010150120000008_

 $nro_afiliado=$_POST["nro_afiliado"];
$nro_afiliado=$_POST["numero_credencial_lector"];

if ($track != ""){
 $numero_credencial = substr($track,73,11);
}else{
 $numero_credencial = $nro_afiliado;
}



  $sql="select * from pacientes where nro_afiliado = '$numero_credencial' and nro_os = '$nro_os'";
$result = $db->Execute($sql);

$nro_pac=$result->fields["nro_paciente"];

if ($nro_pac != ''){
$bande_nuevo = 1;
$palabra = $nro_pac;
$bande = 2;

include ("buscar_paciente_individual.php");
exit;
}


if ($nro_os == ""){
$leyenda = "NO INGRESO OBRA SOCIAL";
include ("../../alertas/campo_informacion2.php");
EXIT;
}

 $sql1="SELECT * FROM datos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);

$sigla=$result1->fields["sigla"];


  $sql1="select * from requisitos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$requisitos=$result1->fields["requisitos"];
$version=$result1->fields["version"];
$suspendido=$result1->fields["suspendido"];
$vigencia=$result1->fields["vigencia"];
$comunes=$result1->fields["comunes"];
$especiales=$result1->fields["alta"];
$alta=$result1->fields["alta"];


$planes=$result1->fields["planes"];
$diagnostico=$result1->fields["diagnostico"];
$info_planes=$result1->fields["info_planes"];
$planes_rechazados=$result1->fields["planes_rechazados"];
$motivo_rechazo=$result1->fields["motivo_rechazo"];



?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	

  
  <tr bgcolor="#CECECE">
    <td colspan="7" bgcolor="#EDEDED"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="8" bgcolor="#CCCCCC"><div align="center" class="Estilo42"><font face="Trebuchet MS">REQUISITOS OBRA SOCIAL:  <?php echo $nro_os;?> <?php echo $sigla;?></font></div></td>
      </tr>
      
	  <?php

	  if ($requisitos != ""){ ?>
	  
      <tr>
		 <td height="33" colspan="2" style="padding: 20px;" bgcolor="#D8F1FA"><span class="Estilo46"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $requisitos;?></font></span></td>
      </tr>
    <?php }else{  ?>

  <tr>
         <td height="33" colspan="2" bgcolor="#FFFFFF"><span class="Estilo46"><font color="#000000" face="Trebuchet MS">No hay requisitos<?php echo $requisitos;?></font></span></td>
      </tr>

 <?php } ?>


</table>

<?php






//$cuit_prestador = "30708402911"; // prestador de prueba
 





 // biosoft 8285
 
/////////////////////////////////////////////////
if ($nro_os == 1041)  {
include_once ("web_itc.php");
}elseif ($nro_os == 4723){ // SWISS
include ("web_itc1.php");

}elseif ($nro_os == 5192){ //ACA
include ("web_itc.php");
}elseif ($nro_os == 5240){ // SCIS
include ("web_itc.php");

}elseif ($nro_os == 5291){ // HOPE
include ("web_itc.php");
}elseif ($nro_os == 2462){ // SERVESALUD
include_once ("web_itc.php");
}elseif ($nro_os == 2042){ // AAPM
include_once ("web_itc.php");
}elseif ($nro_os == 3771){ // OSDIPP
include_once ("web_itc.php");
}elseif ($nro_os == 5171){ // OSPE
include_once ("web_ospe.php");
}elseif ($nro_os == 5185){ // MEDIMAS
include_once ("web_medimas.php");
}elseif ($nro_os == 5073){ // PAMI
include_once ("web_pami.php");
}elseif ($nro_os == 5080){ // SANCOR
include_once ("web_sancor.php");
}elseif ($nro_os == 5543){ // SANCOR
include_once ("web_sancor.php");

}else{ /// sin webservice

include_once ("entrada_dato_sin_ws.php");

}


?>








