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

include ("../../../conexiones/config_os.php");
$sql="select * from datos_os ORDER BY nro_os DESC";
$result = $db->Execute($sql);

$id=($result->fields["nro_os"] + 1);

?>

<BODY background="../../IMAGENES/IZQUIERDA.PNG">
<form action="guardar_os.php" method="post">
  <table width="70%" border="0">
    <tr bordercolor="#FFFFCC" bgcolor="#993300"> 
      <td colspan="2"><div align="center"><strong><font color="#FFFFCC"> 
          OBRA SOCIAL</font></strong></div></td>
      <td colspan="2"><div align="center"><strong><font color="#FFFFCC">Prestador</font></strong></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td width="14%"><div align="right"><font color="#000000">Numero</font></div></td>
      <td><strong> 
        <input type="text" name="nro_os" id="nro_os" value =<?php print("$id");?> onKeyPress="return verif_caracter(this,event)" size = "8" >
        </strong>        <div align="right"><strong></strong></div>        </td>
      <td width="21%" bgcolor="#FFFF99"><div align="right"><font color="#000000">Id prestador</font></div></td>
      <td width="25%" bgcolor="#FFFF99"><strong>
        <input type="text" name="nro_prestador" id="nro_prestador" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
      <td><div align="right"><font color="#000000">Nombre</font></div></td>
      <td><strong>
        <input type="text" name="denominacion" id="denominacion" onKeyPress="return verif_caracter(this,event)" size = "30">
      </strong></td>
      <td bgcolor="#FFFF99"><div align="right"><font color="#000000">Contacto</font></div></td>
      <td bgcolor="#FFFF99"><strong>
        <input type="text" name="contacto" id="contacto" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td><div align="right"><font color="#000000">Sigla</font></div></td>
      <td><strong> 
        <input type="text" name="sigla" id="sigla" onKeyPress="return verif_caracter(this,event)" size = "12">
        </strong></td>
      <td bgcolor="#FFFF99"><div align="right"><font color="#000000">Nivel </font></div></td>
      <td bgcolor="#FFFF99"><strong>
        <input type="text" name="nivel" id="nivel" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
      <td><div align="right"><font color="#000000">Inscripcion </font></div></td>
      <td><strong>
      <select name="inscripcion[]" id="select" onkeypress="return verif_caracter(this,event)">
        <option value="1">R.I</option>
        <option value ="2">R.N.I</option>
        <option value ="3">EXENTO</option>
        <option value ="4">MONOTRIBUTISTA</option>
      </select>
</strong></td>
      <td bgcolor="#FFFF99"><div align="right"><font color="#000000">Cargo</font></div></td>
      <td bgcolor="#FFFF99"><strong>
        <input type="text" name="cargo" id="cargo" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td><div align="right"><font color="#000000">C.U.I.T</font></div></td>
      <td><strong>
        <input type="text" name="cuit" id="cuit" maxlength ="14" onKeyPress="return verif_caracter(this,event)" size = "13"> 
        </strong>        <div align="right"><strong></strong></div>        </td>
      <td bgcolor="#FFFF99"><div align="right">Domiciio p/ Facturar</div></td>
      <td bgcolor="#FFFF99"><strong>
        <select name="facturar" id="facturar" onkeypress="return verif_caracter(this,event)">
          <option value="1">LOCAL</option>
          <option value ="2">NACIONAL</option>

        </select>
      </strong></td>
    </tr>
    <tr bordercolor="#FFFFCC" bgcolor="#993300"> 
      <td colspan="2"><div align="center"><strong><font color="#FFFFCC">          Locales</font></strong></div></td>
      <td colspan="2"><div align="center"><strong><font color="#FFFFCC">Nacionales </font></strong></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td><div align="right"><font color="#000000">Domicilio</font></div></td>
      <td width="40%" bordercolor="#FFFFCC"><strong>
        <input type="text" name="domicilio_l" id="domicilio_l" onKeyPress="return verif_caracter(this,event)" size = "35">
      </strong></td>
      <td colspan="2" bgcolor="#FFFF99"><div align="right"></div>        <strong>
        <input type="text" name="domicilio_n" id="domicilio_n" onKeyPress="return verif_caracter(this,event)" size = "35">
              </strong></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
      <td bgcolor="#FFFFCC"><div align="right"><font color="#000000">Localidad</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#FFFFCC"><strong>
        <input type="text" name="localidad_l" id="localidad_l" onKeyPress="return verif_caracter(this,event)" size = "15"> 
        </strong>Cod. Postal <strong>
        <input type="text" name="cod_postal_l" id="cod_postal_l" onKeyPress="return verif_caracter(this,event)" size = "9" maxlength = "7">
        </strong></td>
      <td colspan="2" bgcolor="#FFFF99"><strong>
        <input type="text" name="localidad_n" id="localidad_n" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong>Cod. Postal <strong>
      <input type="text" name="cod_postal_n" id="cod_postal_n" onKeyPress="return verif_caracter(this,event)" size = "9" maxlength = "7">
      </strong></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
      <td bgcolor="#FFFFCC"><div align="right"><font color="#000000">Telefono </font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#FFFFCC"><strong>
        <input type="text" name="cod_area_l" id="cod_area_l" onKeyPress="return verif_caracter(this,event)" size = "7" maxlength = "5" value ="0261">
        <input type="text" name="telefono_1" id="telefono_1" onKeyPress="return verif_caracter(this,event)" size = "9" maxlength = "7">
</strong></td>
      <td colspan="2" bgcolor="#FFFF99"><div align="right"></div>        <strong>        
	  <input type="text" name="cod_area_n" id="cod_area_n" onKeyPress="return verif_caracter(this,event)" size = "7" maxlength = "5" >
        <input type="text" name="telefono_n" id="telefono_n" onKeyPress="return verif_caracter(this,event)" size = "9">      
              </strong></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
      <td bgcolor="#FFFFCC"><div align="right"><font color="#000000">Tel-Fax</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#FFFFCC"><strong>
        <input type="text" name="telefax_l" id="telefax_l3" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></td>
      <td colspan="2" bgcolor="#FFFF99"><div align="right"></div>        <strong>
        <input type="text" name="telefax_n" id="telefax_n" onKeyPress="return verif_caracter(this,event)" size = "15">
              </strong></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bgcolor="#FFFFCC"><div align="right"></div>        <div align="right"><font color="#000000">E-mail &nbsp;</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#FFFFCC"><strong>
        <input type="text" name="email_l" id="email_l" onKeyPress="return verif_caracter(this,event)" size = "35">
      </strong></td>
      <td colspan="2" bgcolor="#FFFF99"><div align="right"></div>        <strong>
        <input type="text" name="email_n" id="email_n" onKeyPress="return verif_caracter(this,event)" size = "35">
              </strong></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#999999"> 
      <td colspan="4"><div align="center"><strong> 
          <input type="submit" name="Submit" value="GUARDAR">
          </strong></div></td>
    </tr>
  </table>

</form>
</body>