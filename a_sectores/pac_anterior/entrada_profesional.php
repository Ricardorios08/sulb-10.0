<script language="javascript">
function on_load()
{
document.getElementById("matricula").focus();
}

function on_load1()
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
				document.getElementById("titulo").focus();
				break;
				case "titulo":
				document.getElementById("universidad").focus();
					break;

				case "universidad":
				document.getElementById("dia1").focus();
					break;
				
				
				case "dia1":
				document.getElementById("mes1").focus();
				break;
				case "mes1":
				document.getElementById("año1").focus();
				break;
				case "año1":
				document.getElementById("dia_abm").focus();
				break;


				case "dia_abm":
				document.getElementById("mes_abm").focus();
				break;
				case "mes_abm":
				document.getElementById("ano_abm").focus();
				break;
				case "ano_abm":
				document.getElementById("docente").focus();
				break;
				
				case "docente":
				document.getElementById("dia2").focus();
					break;
				case "dia2":
				document.getElementById("mes2").focus();
					break;
				case "mes2":
				document.getElementById("año2").focus();
				break;
				case "año2":
				document.getElementById("nivel").focus();
				break;
				case "nivel":
				document.getElementById("empleo").focus();
				break;
				case "empleo":
				document.getElementById("cargo").focus();
				break;
				case "cargo":
				document.getElementById("telefono_c").focus();
				break;
				
				case "telefono_c":
				document.getElementById("domicilio_p").focus();
				break;
				case "domicilio_p":
				document.getElementById("dia3").focus();
				break;
				case "dia3":
				document.getElementById("mes3").focus();
				break;
				case "mes3":
				document.getElementById("año3").focus();
					break;
				


				
		}
		return false;
	}
	return true;
}


</script>

<?php if ($facturante == "SI"){
?><BODY onload = "on_load1()"><?php }
else{
?><BODY onload = "on_load()"><?php }?>

<form action="guardar_profesional.php" method="post">
<table width="103%" border="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="29" colspan="5"><div align="center"><font color="#000000" size="2"><strong><font face="Arial, Helvetica, sans-serif">DATOS PROFESIONALES</font></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
    </font></div>      </td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">1. Matricula </font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
      
	
<input type="text" name="matricula" id="matricula" onKeyPress="return verif_caracter(this,event)" size = "15" value = "<?php echo $matricula;?>">
	 
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="47%"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">2. Titulo</font></div></td>
    <td width="53%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
          <input type="text" name="titulo" id="titulo" onKeyPress="return verif_caracter(this,event)" size = "15">
    </strong> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">3. Universidad</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="universidad" type="text" id="universidad" onKeyPress="return verif_caracter(this,event)" value="" size ="15">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">4. Fecha 
                de Egresado</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input type="text" name="dia1" id="dia1"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
        / 
        <input type="text" name="mes1" id="mes1"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
        / 
        <input type="text" name="año1" id="año1"onKeyPress="return verif_caracter(this,event)" size="4" maxlength="4">
     </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">5. Fecha ingreso ABM </font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
<input type="text" name="dia_abm" id="dia_abm"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="mes_abm" id="mes_abm"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="ano_abm" id="ano_abm"onKeyPress="return verif_caracter(this,event)" size="4" maxlength="4">
</strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">6. Docente</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input type="radio" name="docente" id="docente" value="SI" onKeyPress="return verif_caracter(this,event)">
      </strong>        SI 
      <input type="radio" name="docente" id="docente1" value="NO" checked="TRUE" onKeyPress="return verif_caracter(this,event)">
      NO
    </font>      <div align="right"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">7. Fecha 
                Inicio</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input type="text" name="dia2" id="dia2"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
        / 
        <input type="text" name="mes2" id="mes2"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
        / 
        <input type="text" name="año2" id="año2"onKeyPress="return verif_caracter(this,event)" size="4" maxlength="4">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">8. Nivel</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input type="text" size = "15" name="nivel" id="nivel"onKeyPress="return verif_caracter(this,event)">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">9. Empleo / 10. Cargo
        </font></div></td>

    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <select name="publico_cargo[]" id="publico_cargo"onkeypress="return verif_caracter(this,event)">
          <option value = "Ninguno">Ninguno </option>
          <option value = "Publico">Publico </option>
          <option value = "Publico">Cargo</option>
        </select>

        <input type="text"  size = "15" name="cargo" id="cargo2"onKeyPress="return verif_caracter(this,event)">
</strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 11. Telefono</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" size ="15" name="telefono_c"id="telefono_c"onKeyPress="return verif_caracter(this,event)">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">12. Establecimiento</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input type="text" size ="15" name="domicilio_p" id="domicilio_p"onKeyPress="return verif_caracter(this,event)">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">13. Fecha Nombramiento</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="dia3" id="dia3"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
        / 
        <input type="text" name="mes3" id="mes3"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
        / 
        <input type="text" name="año3" id="año3" onKeyPress="return verif_caracter(this,event)" size="4" maxlength="4">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td colspan="2" bgcolor="#E6E6E6"><div align="center"><font size="2">
	 <input type="hidden" name="facturante" value = "<?php echo $facturante;?>">
        <input type="Submit" name="Submit343" value="GUARDAR DATOS PROFESIONALES" target = "arriba">
    </font></div></td>
  </tr>
</table>
