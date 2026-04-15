<link href="../../../css/foñndo.css" rel="stylesheet" type="text/css" />

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
.Estilo1 {
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo2 {font-family: "Trebuchet MS"}
.Estilo20 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<BODY onload = "on_load()">

<?php 


$dia_d = 21;
$mes_d= date("m") - 1;
$mes_d = str_pad($mes_d, 2, "0", STR_PAD_LEFT);




$anio_d = date ("y");

$dia_h = 20;
$mes_h= date("m");
$anio_h = date ("y");




?>
<form action="ver_informe.php" method="post">
<table width="850" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="26" colspan="2" bgcolor="#666666"><div align="center" class="Estilo1"><font face="Arial, Helvetica, sans-serif">PRESENTAR ORDEN EN ABM </font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="403" height="24" bordercolor="#666666" bgcolor="#CCCCCC"> <div align="right" class="Estilo20">DESDE
        </div>
      <div align="right" class="Estilo2"> </div></td>
      <td width="439" bordercolor="#666666" bgcolor="#CCCCCC"><div align="left" class="Estilo2">
          <font color="#000000" size="2">
          <input name="dia_d" type="text" id="dia_d"onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia_d;?>"  size="2" maxlength="2"> 
          /
          <input name="mes_d" type="text" id="mes_d"onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes_d;?>"  size="2" maxlength="2">
          / 20 
          <input name="anio_d" type="text" id="anio_d"onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio_d;?>"  size="2" maxlength="2">
          </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bordercolor="#666666" bgcolor="#CCCCCC">
      <div align="right" class="Estilo20"><font color="#000000">HASTA</font></div></td>
      <td bordercolor="#666666" bgcolor="#CCCCCC">        <span class="Estilo2"><font color="#000000" size="2">
      <input name="dia_h" type="text" id="dia_h"onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia_h;?>"  size="2" maxlength="2">
/
<input name="mes_h" type="text" id="mes_h"onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes_h;?>"  size="2" maxlength="2">
/ 20
<input name="anio_h" type="text" id="anio_h"onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio_h;?>"  size="2" maxlength="2">
      </font></span></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bordercolor="#666666" bgcolor="#CCCCCC"><div align="right" class="Estilo20">&iquest;Desea Valorizar el informe? </div></td>
      <td bordercolor="#666666" bgcolor="#CCCCCC"><label>
        <input name="valorizar" type="checkbox" id="valorizar" value="1">
        <font color="#000000" size="2">
        Contrase&ntilde;a
        <input name="contra" type="password" id="contra"onKeyPress="return verif_caracter(this,event)">
      </font></label></td>
    </tr>
  <tr bordercolor="#FFFFFF">
      <td height="26" colspan="2" bordercolor="#666666" bgcolor="#666666"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>            
        <input type="Submit" name="Submit" id ="GUARDAR" value="VER PRESENTACION">
      </div></td>
</table>
