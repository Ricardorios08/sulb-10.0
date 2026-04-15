<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function on_load()
{
document.getElementById("nro_os").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_os":
				document.getElementById("denominacion").focus();
				
				break;
				case "denominacion":
				document.getElementById("sigla").focus();
				break;
				case "sigla":
				document.getElementById("inscripcion").focus();
				break;
				case "inscripcion":
				document.getElementById("cuit").focus();
				break;
				case "cuit":
				document.getElementById("domicilio_l").focus();
				break;
				case "domicilio_l":
				document.getElementById("telefono_1").focus();
				break;
				case "telefono_1":
				document.getElementById("telefax_l").focus();
				break;
				case "telefax_l":
				document.getElementById("email_l").focus();
				break;
				case "email_l":
				document.getElementById("domicilio_n").focus();
				break;
				case "domicilio_n":
				document.getElementById("telefono_n").focus();
				break;

				case "telefono_n":
				document.getElementById("telefax_n").focus();
				break;
				case "telefax_n":
				document.getElementById("email_n").focus();
				break;
				case "email_n":
				document.getElementById("nro_prestador").focus();
				break;
				case "nro_prestador":
				document.getElementById("contacto").focus();
				break;
				case "contacto":
				document.getElementById("nivel").focus();
				break;
				case "nivel":
				document.getElementById("cargo").focus();
				break;
				
				
				
		}
		return false;
	}
	return true;
}


</script>

<?php 

include ("../../../conexiones/config.inc.php");
$sql="select * from datos_os where nro_os < 900 ORDER BY nro_os DESC LIMIT 1";
$result = $db->Execute($sql);

$id=($result->fields["nro_os"] + 1);

?>
<BODY onload = "on_load()">

<BODY background="../../IMAGENES/IZQUIERDA.PNG">
<form action="guardar_os.php" method="post" >
  <table width="850" border="0" cellspacing="0">
    <tr bordercolor="#FFFFCC" bgcolor="#E6E6E6"> 
      <td colspan="2"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong> 
      <img src="../../../imagenes/obras.jpg" width="846" height="35"></strong></font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td width="17%" bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Numero</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input type="text" name="nro_os" id="nro_os" value =<?php print("$id");?> onKeyPress="return verif_caracter(this,event)" size = "8" >
      </strong> </font>        <div align="right"></div>        </td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="denominacion" id="denominacion" onKeyPress="return verif_caracter(this,event)" size = "30">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Sigla</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input type="text" name="sigla" id="sigla" onKeyPress="return verif_caracter(this,event)" size = "12">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Inscripcion </font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
      <select name="inscripcion[]" id="select" onkeypress="return verif_caracter(this,event)">
          <option value="1">R.I</option>

          <option value ="2">R.N.I</option>
         <option value ="3">MONOTRIBUTISTA</option>
            <option value ="4">EXENTO</option>
      </select>
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">C.U.I.T</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="cuit" id="cuit" maxlength ="14" onKeyPress="return verif_caracter(this,event)" size = "13"> 
      </strong> </font>        <div align="right"></div>        </td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Domicilio</font></div></td>
      <td width="83%" bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="domicilio_l" id="domicilio_l" onKeyPress="return verif_caracter(this,event)" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Localidad</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="localidad_l" id="localidad_l" onKeyPress="return verif_caracter(this,event)" size = "12"> 
        </strong>Cod. Postal <strong>
        <input type="text" name="cod_postal_l" id="cod_postal_l" onKeyPress="return verif_caracter(this,event)" size = "4" maxlength = "7">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Telefono </font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="cod_area_l" id="cod_area_l" onKeyPress="return verif_caracter(this,event)" size = "4" maxlength = "5" value ="0261">
        <input type="text" name="telefono_1" id="telefono_1" onKeyPress="return verif_caracter(this,event)" size = "7" maxlength = "7">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Tel-Fax</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="telefax_l" id="telefax_l3" onKeyPress="return verif_caracter(this,event)" size = "8">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">E-mail &nbsp;</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="email_l" id="email_l" onKeyPress="return verif_caracter(this,event)" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td width="17%" bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Id prestador</font></div></td>
      <td width="83%" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="nro_prestador" id="nro_prestador" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Contacto</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="contacto" id="contacto" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nivel </font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="nivel" id="nivel" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cargo</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="cargo" id="cargo" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Domiciio p/ Facturar</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <select name="facturar" id="facturar" onkeypress="return verif_caracter(this,event)">
          <option value="1">LOCAL</option>
          <option value ="2">NACIONAL</option>
        </select>
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td colspan="2" bgcolor="#B8B8B8"><div align="center"><strong> 
          <input type="submit" name="Submit" value="GUARDAR OBRA SOCIAL">
      </strong></div></td>
    </tr>
  </table>

</form>
</body>