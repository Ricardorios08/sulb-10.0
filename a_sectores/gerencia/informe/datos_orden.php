<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />

<script language="javascript">
function on_load()
{
document.getElementById("nro_paciente").focus();
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
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("nro_documento").focus();
				break;
				case "nro_documento":
				document.getElementById("nro_os").focus();
				break;
				case "nro_os":
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
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<BODY onload = "on_load()">

<?php 
include ("../../../conexiones/config.inc.php");

$sql="select * from datos_orden";
$result = $db->Execute($sql);

$orden=strtoupper($result->fields["orden"]);



?>
<form action="guardar_orden.php" method="post">
<table width="850" border="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="26" colspan="2"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><img src="../../../imagenes/datos_orden.jpg" width="846" height="35"></font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="403" height="24">
      <div align="right" class="Estilo1"><font color="#000000" size="2"><font color="#000000">Los datos que graba de la orden los prefiere: </font>   </font></div></td>
      <td width="439">
	  
<?php  if ($orden == "SI"){?>
<div align="left" class="Estilo2"><input name="orden" type="radio" value="SI" checked>
COMPLETO
  <input name="orden" type="radio" value="NO">
  REDUCIDO</div>
<?php }else{?>
<div align="left" class="Estilo2"><input name="orden" type="radio" value="SI">
  COMPLETO
  <input name="orden" type="radio" value="NO" checked>
  REDUCIDO</div>
<?php }?>	  </td>
  </tr>
    
    <tr bordercolor="#FFFFFF">
      <td height="26" colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>            <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
      </div></td>
</table>
