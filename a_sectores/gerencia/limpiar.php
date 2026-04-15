
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
.Estilo5 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo6 {
	font-family: "Trebuchet MS";
	font-size: 14px;
}
-->
</style>
<BODY onload = "on_load()">
<form action="../borra_todo.php" method="post">
<table width="800" border="0" align="center">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td height="26" colspan="3" bgcolor="#F0F0F0"><div align="center" class="Estilo6">LIMPIAR SISTEMA </div></td>
  </tr>
  
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" colspan="2"><span class="Estilo5">CONTRASE&Ntilde;A</span></td>
    <td width="502"><div align="left"><font color="#000000" size="2">
      <input name="contra" type="password" id="contra"onKeyPress="return verif_caracter(this,event)"   size="10" >
    </font>Borra pacientes y ordenes no borra valores de referencia </div></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td height="26" colspan="3" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>
            <input type = "hidden" name = "usuario" value="<?php echo $usuario;?>">
            <input type="Submit" name="Submit" id ="GUARDAR" value="LIMPIAR">
    </div></td>
</table>
