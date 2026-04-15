


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


function reemplazar(cadena,id)
{
var cadena = cadena.replace(/\W/g,"_");
document.getElementById(id).value=cadena;
}


</script>
<style type="text/css">
<!--
.Estilo25 {font-family: "Trebuchet MS"}
.Estilo26 {
	font-family: "Trebuchet MS";
	font-size: 18px;
	font-weight: bold;
	color: #FFFFFF;
}


.styled-select select {
   background: transparent;
   width: 268px;
   padding: 5px;
   font-size: 16px;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 34px;
   -webkit-appearance: none;
   }
body {
	background-color: #FFFFFF;
}

-->
</style>
<BODY onload = "on_load()">

<?php 

$apellido = strtoupper($_REQUEST['nombre']);


if(is_numeric($nombre)) {
$nro_documento = $nombre;
$nombre = "";
}ELSE
{
$apellido = $apellido;
$nro_documento = "";


}
include ("../../conexiones/config.inc.php");
$sql="select * from pacientes ORDER BY nro_paciente DESC";
$result = $db->Execute($sql);

$nro_paciente=($result->fields["nro_paciente"] + 1);

?>
<form action="entrada_dato.php" method="post">
<table width="850" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td height="37" colspan="3" bgcolor="#666666"><div align="center" class="Estilo26">INGRESO DE PACIENTES FUERA DE LINEA</div></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td width="180" height="24" bgcolor="#B8B8B8">
      <div align="right" class="Estilo25">
        <div align="left"><font size="2">OBRA SOCIAL </font></div>
    </div></td>
    <td colspan="2" bgcolor="#F0F0F0"><font color="#000000" size="2"><strong><font color="#000000" size="2">
      <?php 
$sql = "SELECT * FROM datos_os  order by  sigla, nro_os";
$result = $db->Execute($sql);
echo "<div class='styled-select'>";
echo "<select name=nro_os[] size=1 id =nro_os onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione OBRA SOCIAL</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_os=$result->fields["nro_os"];
$sigla=strtoupper($result->fields["sigla"]);
echo"<option value=$nro_os>$sigla ($nro_os)</option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </font></strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td height="24" bgcolor="#B8B8B8"><font color="#000000" size="2">N&ordm; AFILIADO </font></td>
    <td colspan="2" bgcolor="#F0F0F0"><font color="#000000" size="2">
      <input name="numero_credencial_lector" type="text" id="numero_credencial_lector"onKeyPress="return verif_caracter(this,event)"  size="14">
    </font></td>
  </tr>
  
  <tr bordercolor="#FFFFFF">
    <td height="26" colspan="3" valign="top" bgcolor="#666666"><div align="center">
        <input type="Submit" name="Submit" id ="GUARDAR" value="INGRESAR">
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="349"></td>
    <td width="315"></td>
  </tr>
</table>
