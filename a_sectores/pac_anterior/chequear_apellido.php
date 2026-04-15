 


<script language="javascript">
function on_load()
{
document.getElementById("apellido").focus();
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
.Estilo44 {	color: #FF0000;
	font-family: "Trebuchet MS";
}
.Estilo41 {font-size: 12px}
.Estilo45 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo46 {font-family: "Trebuchet MS"; font-size: 24px; }
-->
</style>
<BODY onload = "on_load()">

<?php 
include ("../../conexiones/config.inc.php");

$apellido = strtoupper($_REQUEST['nombre']);
$numero_credencial_lector = strtoupper($_REQUEST['numero_credencial_lector']);

$nro_o=$_POST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
	$nro_os = $nro_o[$i];    
	}


$sql="select * from datos_os where nro_os = $nro_os";
$result = $db->Execute($sql);
$sigla=$result->fields["sigla"];


$sql="select * from pacientes where apellido = '$numero_credencial_lector' and nro_os = '$nro_os' order by apellido, nombre";
$result = $db->Execute($sql);

include ("buscar_paciente_apellido.php");



