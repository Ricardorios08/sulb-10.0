<script language="javascript">
function on_load()
{
document.getElementById("matricula").focus();
}

function pagina2()
{
document.getElementById("titulo").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "matricula":
				document.getElementById("apellido").focus();
				
				break;
				case "apellido":
				document.getElementById("apellido_materno").focus();
				break;
				case "apellido_materno":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("nom_esposa").focus();
				break;
				case "nom_esposa":
				document.getElementById("estado_civil").focus();
				break;
				case "estado_civil":
				document.getElementById("sexo").focus();
				break;
				case "sexo":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("año").focus();
				break;
				case "año":
				document.getElementById("tipo_doc").focus();
				break;

				case "tipo_doc":
				document.getElementById("documento").focus();
				break;
				case "documento":
				document.getElementById("telefono").focus();
				break;
				case "telefono":
				document.getElementById("fax").focus();
				break;
				case "fax":
				document.getElementById("celular").focus();
				break;
				case "celular":
				document.getElementById("e_mail").focus();
				break;
				case "e_mail":
				document.getElementById("domicilio").focus();
				break;
				case "domicilio":
				document.getElementById("nro_domicilio").focus();
				break;
				case "nro_domicilio":
				document.getElementById("referencia").focus();
				break;
				case "referencia":
				document.getElementById("departamento").focus();
				break;
				case "departamento":
				document.getElementById("cod_postal").focus();
				break;
				case "cod_postal":
				document.getElementById("localidad").focus();
				break;
				case "localidad":
				document.getElementById("estado").focus();
				break;
				
				case "estado":
				document.getElementById("dia_estado").focus();
				break;
				case "dia_estado":
				document.getElementById("mes_estado").focus();
				break;
								case "mes_estado":
				document.getElementById("anio_estado").focus();
				break;

				case "anio_estado":
				document.getElementById("facturante").focus();
				break;
				
				case "facturante":
				document.getElementById("guardar").focus();
				break;
				



				
		}
		return false;
	}
	return true;
}


</script>

<BODY onload = "on_load()">
<form action="a_bioquimicos/modificar_bioquimicos.php" method="post">
<table width="548" border="0">
    <!--DWLayoutTable-->
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="26" colspan="3" valign="top"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>DATOS PERSONALES</strong></font> </div></td>
      <td colspan="2" valign="top">        <input type="Submit" name="Submit" value="MODIFICAR BIOQUIMICO"></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td width="113" height="24" bgcolor="#C9FADF">
      <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">1. MATRICULA </font></div></td>
      <td width="141" bgcolor="#C9FADF"><div align="left">
          <font color="#000000" size="2"></font><font size="1">
<input type="text" name="matricula" id="matricula" readonly = "true" value ="<?php print("$id");?>"onKeyPress="return verif_caracter(this,event)"size="6" >
</font><font color="#000000" size="2">      </font></div></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">13. Celular</font></div></td>
      <td bgcolor="#D0F9FB"><div align="left"><font size="2">
        </font><font size="1">
          <input type="text" name="celular" value ="<?php print("$celular");?>" id="celular2"size="15" onKeyPress="return verif_caracter(this,event)">
      </font><font size="2">          </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24" bgcolor="#C9FADF">
      <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">2. Apellido</font></div></td>
      <td bgcolor="#C9FADF">        <font color="#000000" size="2">&nbsp;
</font><font size="1">
<input type="text" name="apellido" id="apellido2"  value ="<?php print("$apellido");?>" size="15"onKeyPress="return verif_caracter(this,event)">
</font><font color="#000000" size="2">&nbsp;      </font></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">14. E-mail</font></div></td>
      <td width="161" bgcolor="#D0F9FB"> <font size="2">&nbsp;
      </font><font size="1">
        <input type="text" name="e_mail" value ="<?php print("$e_mail");?>" id="e_mail2"  size="15" onKeyPress="return verif_caracter(this,event)">
      </font><font size="2">&nbsp;        </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">3. Ap. Materno</font></div></td>
      <td bgcolor="#C9FADF">        <font color="#000000" size="2">&nbsp;
</font><font size="1">
<input type="text" name="apellido_materno" value ="<?php print("$apellido_materno");?>"id="apellido_materno2" size="15"onKeyPress="return verif_caracter(this,event)">
</font><font color="#000000" size="2">&nbsp;      </font></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">15. Domiclio</font></div></td>
      <td bgcolor="#D0F9FB"> <font size="2">&nbsp;
      </font><font size="1">
        <input type="text" name="domicilio"  value ="<?php print("$domicilio");?>" id="domicilio2" size="15" onKeyPress="return verif_caracter(this,event)">
      </font><font size="2">&nbsp;        </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="27" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">4. Nombre</font></div></td>
      <td bgcolor="#C9FADF">         <font color="#000000" size="2">&nbsp;
</font><font size="1">
<input type="text" name="nombre"   value="<?php print("$nombre");?>" id="nombre2"  size="15" onKeyPress="return verif_caracter(this,event)">
</font><font color="#000000" size="2">&nbsp;      </font></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">16. Numero</font></div></td>
      <td bgcolor="#D0F9FB"> <font size="2">&nbsp;
      </font><font size="1">
        <input type="text" name="nro_domicilio" value ="<?php print("$nro_domicilio");?>" id="nro_domicilio2" size="5" onKeyPress="return verif_caracter(this,event)">
      </font><font size="2">&nbsp;        </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 5. Esposa/o</font></div></td>
      <td bgcolor="#C9FADF">        <font color="#000000" size="2">&nbsp;
</font><font size="1">
<input type="text" name="nom_esposa" value ="<?php print("$nom_esposa");?>"id="nom_esposa2" size="15" onKeyPress="return verif_caracter(this,event)">
</font><font color="#000000" size="2">&nbsp;      </font></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">17. Referencia</font></div></td>
      <td bgcolor="#D0F9FB"><font size="2">&nbsp;
      </font><font size="1">
        <input type="text" name="referencia" value ="<?php print("$referencia");?>" id="referencia2" size="15" onKeyPress="return verif_caracter(this,event)">
      </font><font size="2">&nbsp;        </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="26" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">6. Estado Civil</font></div></td>
      <td bgcolor="#C9FADF">        <font color="#000000" size="2">&nbsp;
</font><font size="1">
<input type="text" name="estado_civil" value ="<?php print("$estado_civil");?>" id="estado_civil2" size="15"onKeyPress="return verif_caracter(this,event)">
</font><font color="#000000" size="2">&nbsp;      </font></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">18. Departamento</font></div></td>
      <td valign="top" bgcolor="#D0F9FB"><font size="2">
        <select name="departamento" id="departamento"onkeypress="return verif_caracter(this,event)">
          <optgroup label="Gran Mendoza">
          <option value="Ciudad"><font size="2">Capital</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Ciudad"><font size="2">Godoy Cruz</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Ciudad"><font size="2">Las Heras</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Ciudad"><font size="2">Guaymallen</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Ciudad"><font size="2">Lujan</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Ciudad"><font size="2">Maipu</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          </optgroup>
          <optgroup label="Valle de Uco">
          <option value="Ciudad"><font size="2">Tupungato</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Ciudad"><font size="2">Tunuyan</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          </optgroup>
          <optgroup label="Sur"> </optgroup>
          <optgroup label="Norte"> </optgroup>
        </select>
      </font></td>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="26" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">7. Sexo</font></div></td>
      <td bgcolor="#C9FADF">        <font color="#000000" size="2"> <select name="sexo[]" id="select" value ="<?php print("$sexo");?>" onKeyPress="return verif_caracter(this,event)">
          <option value="Masculino">Masculino</option>
          <option value ="Femenino">Femenino</option>
        </select>
      </font></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">19. Cod. Postal</font></div></td>
      <td valign="top" bgcolor="#D0F9FB"> 
      <font size="2">
      <input type="text" name="cod_postal" id ="cod_postal" size="5" onKeyPress="return verif_caracter(this,event)">
</font>          </td>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24" valign="top" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">8. Nacimiento</font></div></td>
      <td valign="top" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2">
          <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
            <input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
          
    /
    <input type="text" name="a&ntilde;o" id="año"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">      
      </font></div></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">20. Localidad</font></div></td>
      <td bgcolor="#D0F9FB"> <font size="2">
      <select name="localidad[]" value ="<?php print("$localidad");?>" id="select4"onkeypress="return verif_caracter(this,event)">
          <optgroup label="Capital">
          <option value="Ciudad"><font size="2">Ciudad</font></option>
          </optgroup>
          <optgroup label="Guaymall&eacute;n">
          <option value ="Guaymallen"><font size="2">San Jose</font></option>
          <option value ="Guaymallen"><font size="2">Dorrego</font></option>
          <option value ="Guaymallen"><font size="2">Villa Nueva</font></option>
          <option value ="Guaymallen"><font size="2">Pedro Molina</font></option>
          <option value ="Guaymallen"><font size="2">Rodeo del Medio</font></option>
          <option value ="Guaymallen"><font size="2">Rodeo de la Cruz</font></option>
          </optgroup>
          <optgroup label="Godoy Cruz">
          <option value = "Godoy Cruz"><font size="2">Godoy Cruz</font></option>
          </optgroup>
          <optgroup label="Las Heras">
          <option value = "Las Heras"><font size="2"> Las Heras</font></option>
          </optgroup>
        </select>
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="26" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">9. Tipo de Doc.</font></div></td>
      <td bgcolor="#C9FADF">        <strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
      </font></strong></td>

      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">21. Estado</font></div></td>
      <td bgcolor="#D0F9FB">
      <font size="2">
      <select name="estado" id="select2" onkeypress="return verif_caracter(this,event)">
        <option value="Activo">Activo</option>
        <option value ="Renuncia">Renuncia</option>
        <option value ="Baja">Baja</option>
        <option value ="Suspendido">Suspendido</option>
        <option value ="Vitalicio">Vitalicio</option>
        <option value ="Fallecido">Fallecido</option>
      </select>
</font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="26" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">10. Documento</font></div></td>
      <td valign="top" bgcolor="#C9FADF">        <strong><font size="1">
        <input type="text" name="documento"  value ="<?php print("$documento");?>" id="documento2" size="15" onKeyPress="return verif_caracter(this,event)">
      </font><font color="#000000" size="2">
      </font></strong></td>
      <td colspan="2" valign="top" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">22. Fecha</font></div></td>
      <td bgcolor="#D0F9FB"><font size="2">
        <input type="text" name="dia_estado" id="dia_estado"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="mes_estado" id="mes_estado"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="anio_estado" id="anio_estado"onKeyPress="return verif_caracter(this,event)" size="4" maxlength="4">

      </font></td>
    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" valign="top" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">11. Tel. </font></div>      </td>
    <td valign="top" bgcolor="#C9FADF"><strong><font color="#000000" size="2">
      </font><font size="1">
        <input type="text" name="telefono" value ="<?php print("$telefono");?>" id="telefono2"  size="15"onKeyPress="return verif_caracter(this,event)">
    </font><font color="#000000" size="2">        </font></strong></td>
    <td colspan="2" valign="top" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">23. Facturante</font></div></td>
    <td valign="top" bgcolor="#D0F9FB"><font size="2" face="Arial, Helvetica, sans-serif">
      <input type="radio" name="facturante" value="SI"tabindex="26" checked="TRUE" id="facturante" onKeyPress="return verif_caracter(this,event)">
SI
<input type="radio" name="facturante" value="NO" tabindex="27">
NO </font><font size="2">&nbsp;
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" valign="top" bgcolor="#C9FADF"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">12. Fax</font>    </td>
    <td valign="top" bgcolor="#C9FADF"><strong><font size="2">
      </font><font size="1">
      <input type="text" name="fax" id="fax2" size="15" value ="<?php print("$fax");?>"onKeyPress="return verif_caracter(this,event)">
      </font><font size="2">      </font><font color="#000000" size="2">
      
    </font></strong></td>
    <td colspan="3" align="center" bgcolor="#E6E6E6"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
        <input type="Submit" name="Submit"  value="MODIFICAR BIOQUIMICO">
    </font></div></td>
  </tr>
</table>
