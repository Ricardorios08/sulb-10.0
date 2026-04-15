<?php 
global  $titulo;
global  $universidad;
global  $fecha_egresado;
global  $asoc_origen;
global $docente;
global $cargo;
global $fecha_inicio;
global $empleo_publico;
global $domicilio_p;
global $fecha_nom;
global $telefono_c;
global $fecha_inicio;
global $nivel;



include ("../../../conexiones/config.inc.php");
	
$sql="select * from datos_profesional where matricula like '$matricula'";
$result = $db->Execute($sql);
$publico_cargo=$result->fields["publico_cargo"];
$cargo=$result->fields["cargo"];
$establecimiento=$result->fields["establecimiento"];
$fecha_nombramiento=$result->fields["fecha_nombramiento"];
$anio_nom = substr($fecha_nombramiento,4,4);
$mes_nom = substr($fecha_nombramiento,3,2);
$dia_nom = substr($fecha_nombramiento,0,2);



$telefono=$result->fields["telefono"];
$docente=$result->fields["docente"];
$fecha_inicio=$result->fields["fecha_inicio"];
$anio_doc = substr($fecha_inicio,6,4);
$mes_doc = substr($fecha_inicio,3,2);
$dia_doc = substr($fecha_inicio,0,2);

$nivel=$result->fields["nivel"];

$sql="select * from datos_estudio where matricula like '$matricula'";
$result = $db->Execute($sql);
$fecha_egresado=$result->fields["fecha_egresado"];
$anio_egr = substr($fecha_egresado,4,4);
$mes_egr = substr($fecha_egresado,3,2);
$dia_egr = substr($fecha_egresado,0,2);

$universidad=$result->fields["universidad"];
$titulo=$result->fields["titulo"];

$fecha_abm=$result->fields["fecha_abm"];
$anio_abm = substr($fecha_egresado,4,4);
$mes_abm = substr($fecha_egresado,3,2);
$dia_abm = substr($fecha_egresado,0,2);

?>

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

<form action="modificar_profesional.php" method="post">
<table width="103%" border="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="29" colspan="5"><div align="center"><font color="#000000" size="2"><strong><font face="Arial, Helvetica, sans-serif">DATOS PROFESIONALES</font></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
    </font></div>      </td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF">
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">1. Matricula </font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
      
	 
	 <input type="text" name="matricula" id="matricula" onKeyPress="return verif_caracter(this,event)" size = "15" value = "<?php echo $matricula;?>">

 

	 
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td width="47%"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">2. Titulo</font></div></td>
    <td width="53%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        </strong></font><font size="2">
          <input type="text" name="titulo" value ="<?php print("$titulo");?>" id="titulo"onKeyPress="return verif_caracter(this,event)">
    </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>          </strong> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF">
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">3. Universidad</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
      </strong></font><font size="1">
        <input type="text" name="universidad" value ="<?php print("$universidad");?>" id="universidad2"onKeyPress="return verif_caracter(this,event)">
    </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>        </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">4. Fecha 
    de Egresado</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="dia1" type="text" id="dia1"onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia_egr;?>" size="2" maxlength="2">
        / 
        <input name="mes1" type="text" id="mes1"onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes_egr;?>" size="2" maxlength="2">
        / 
        <input name="año1" type="text" id="año1"onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio_egr;?>" size="4" maxlength="4">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">5. Fecha ingreso ABM </font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
<input name="dia_abm" type="text" id="dia_abm"onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia_abm;?>" size="2" maxlength="2">
/
<input name="mes_abm" type="text" id="mes_abm"onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes_abm;?>" size="2" maxlength="2">
/
<input name="ano_abm" type="text" id="ano_abm"onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio_abm;?>" size="4" maxlength="4">
</strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">6. Docente</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 

<?php if ($docente == "SI"){?>
       <input type="radio" name="docente" id="docente" checked="TRUE"  value="SI" onKeyPress="return verif_caracter(this,event)">
      </strong>        SI 
      <input type="radio" name="docente" id="docente1" value="NO" onKeyPress="return verif_caracter(this,event)">
      NO
	 <?php }else{?>
       <input type="radio" name="docente" id="docente" value="SI" onKeyPress="return verif_caracter(this,event)">
      </strong>        SI 
      <input type="radio" name="docente" id="docente1" value="NO" checked="TRUE" onKeyPress="return verif_caracter(this,event)">
      NO
<?php }?>	  
    </font>      <div align="right"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">7. Fecha 
    Inicio</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="dia2" type="text" id="dia2"onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia_doc;?>" size="2" maxlength="2">
        / 
        <input name="mes2" type="text" id="mes2"onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes_doc;?>" size="2" maxlength="2">
        / 
        <input name="año2" type="text" id="año2"onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio_doc;?>" size="4" maxlength="4">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">8. Nivel</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
      </strong></font><font size="1">
        <input type="text" name="nivel" value ="<?php print("$nivel");?>" id="nivel2"onKeyPress="return verif_caracter(this,event)">
    </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>        </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">9. Empleo / 10. Cargo
    </font></div></td>

    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <select name="publico_cargo[]" id="publico_cargo"onkeypress="return verif_caracter(this,event)">
<optgroup label = "Seleccionada">
    <option value selected = "<?php echo $publico_cargo;?>"><?php echo $publico_cargo;?></option>
</optgroup>
<optgroup label = "Cambiar por:">
           <option value = "Ninguno">Ninguno </option>
          <option value = "Publico">Publico </option>
          <option value = "Cargo">Cargo</option>
		  </optgroup>
        </select>
      </strong></font><font size="1">
        <input type="text" name="cargo" value ="<?php print("$cargo");?>"id="cargo"onKeyPress="return verif_caracter(this,event)">
    </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>        </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF">
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 11. Telefono</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
      </strong></font><font size="1">
        <input type="text" name="telefono_c" value ="<?php print("$telefono");?>" id="telefono_c2"onKeyPress="return verif_caracter(this,event)">
    </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>        </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">12. Establecimiento</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
      </strong></font><font size="1">
        <input type="text" name="domicilio_p" value ="<?php print("$establecimiento");?>" id="domicilio_p3"onKeyPress="return verif_caracter(this,event)">
    </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>        </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">13. Fecha Nombramiento</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="dia3" type="text" id="dia3"onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia_nom;?>" size="2" maxlength="2">
        / 
        <input name="mes3" type="text" id="mes3"onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes_nom;?>" size="2" maxlength="2">
        / 
        <input name="año3" type="text" id="año3" onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio_nom;?>" size="4" maxlength="4">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td colspan="2" bgcolor="#E6E6E6"><div align="center"><font size="2">
	 <input type="hidden" name="facturante" value = "<?php echo $facturante;?>">
        <input type="Submit" name="Submit343" value="GUARDAR DATOS PROFESIONALES" target = "arriba">
    </font></div></td>
  </tr>
</table>
