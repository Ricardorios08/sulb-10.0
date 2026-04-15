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
.Estilo42 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo43 {
	color: #FF0000;
	font-size: 12px;
	font-family: "Trebuchet MS";
}
.Estilo44 {
	color: #0000FF;
	font-family: "Trebuchet MS";
}
-->
</style>
<BODY onload = "on_load()">

<?php 
include ("../../../conexiones/config.inc.php");

$sql="select * from ordenes order by cod_grabacion desc";
$result = $db->Execute($sql);

$cod_grabacion=$result->fields["cod_grabacion"];

$cod_grabacion1=$result->fields["cod_grabacion"] + 1;

?>
<form action="guardar_protocolo.php" method="post">
<table width="850" border="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="26" colspan="2"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><img src="../../../imagenes/datos_informe.jpg" width="846" height="35"></font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="2"><span class="Estilo43">Recuerde que no puede ingresar un numero inferior al Protocolo usado actualmente </span></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24"><div align="right"><span class="Estilo42">Actualmente el N&deg; Protocolo es: </span></div></td>
      <td><div align="left"><span class="Estilo42"><?php echo $cod_grabacion;?></span></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="2"><span class="Estilo44">Para cambiar el N&deg; de Protocolo </span></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="403" height="24"><div align="right"><span class="Estilo1"><font color="#000000" size="2"><font color="#000000"><font color="#000000" size="2"><font color="#000000">Ingrese el &uacute;ltimo N&deg;  USAD</font></font>O </font></font></span></div></td>
      <td width="439"><div align="left"><input name="cod_grabacion" type="text" id="cod_grabacion" value = "<?php $cod_grabacion1;?>">
        </div>
      </label></td>
    </tr>
    
    <tr bordercolor="#FFFFFF">
      <td height="26" colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>            <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
      </div></td>
</table>
