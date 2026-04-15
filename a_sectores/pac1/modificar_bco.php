
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
$a = $_GET['id'];

if ($a==""){
$sql="select * from datos_personales where matricula like '$a'";
}
else
{
$sql="select * from datos_personales where matricula like '$a'";
}
$result = $db->Execute($sql);
   
	
$id=strtoupper($result->fields["matricula"]);
$apellido=strtoupper($result->fields["apellido"]);
$nombre=strtoupper($result->fields["nombre"]);
$apellido_materno=strtoupper($result->fields["apellido_materno"]);
$sexo=strtoupper($result->fields["sexo"]);
$fecha_nac=strtoupper($result->fields["fecha_nac"]);

$dia= substr($fecha_nac,8,5);
$mes = substr($fecha_nac,5,2);
$anio = substr($fecha_nac,0,4);

$estado_civil=strtoupper($result->fields["estado_civil"]);
//$nacimiento=ucwords($result->fields["nacimiento"]);
$nom_esposa=strtoupper($result->fields["nom_esposa"]);
$tipo_doc=strtoupper($result->fields["tipo_doc"]);
$documento=strtoupper($result->fields["documento"]);
$referencia=strtoupper($result->fields["referencia"]);
$cod_postal=strtoupper($result->fields["cod_postal"]);
$celular=strtoupper($result->fields["celular"]);
$fax=strtoupper($result->fields["fax"]);
$e_mail=$result->fields["e_mail"];
$domicilio=strtoupper($result->fields["domicilio"]); 
$nro_domicilio=$result->fields["nro_domicilio"];
$localidad=strtoupper($result->fields["localidad"]);
$departamento=strtoupper($result->fields["departamento"]);
$telefono=$result->fields["telefono"];
$estado=$result->fields["estado"];
$fecha_estado=$result->fields["fecha_estado"];

$anio_estado = substr($fecha_estado,0,4);
$mes_estado = substr($fecha_estado,5,2);
 $dia_estado = substr($fecha_estado,8,2);



$sql="select * from facturante where nro_laboratorio like '$a'";
$result = $db->Execute($sql);
	
 $facturante=strtoupper($result->fields["facturante"]);



?>

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
<form action="a_bioquimicos/modificar_bioquimicos_bco.php" method="post">
<table width="93%" border="0">
    <!--DWLayoutTable-->
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="26" colspan="3" valign="top"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>DATOS PERSONALES</strong></font> </div></td>
      <td colspan="2" valign="top">        <input type="Submit" name="Submit" value="MODIFICAR BIOQUIMICO"></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td width="96" height="24" bgcolor="#C9FADF">
      <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">1. MATRICULA </font></div></td>
      <td width="158" bgcolor="#C9FADF"><div align="left">
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
      <td bgcolor="#C9FADF">        <div align="left"><font color="#000000" size="2">
        
        <input type="text" name="apellido" id="apellido2"  value ="<?php print("$apellido");?>" size="30"onKeyPress="return verif_caracter(this,event)">
      </font><font size="1">
      </font><font color="#000000" size="2">      </font></div></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">14. E-mail</font></div></td>
      <td width="237" bgcolor="#D0F9FB"> <font size="2">
        <div align="left">
        <input type="text" name="e_mail" value ="<?php print("$e_mail");?>" id="e_mail2"  size="35" onKeyPress="return verif_caracter(this,event)">
		</div>
     </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">3. Ap. Materno</font></div></td>
      <td bgcolor="#C9FADF">        <div align="left"><font color="#000000" size="2">

        <input type="text" name="apellido_materno" value ="<?php print("$apellido_materno");?>"id="apellido_materno2" size="30"onKeyPress="return verif_caracter(this,event)">        
        </font><font size="1">
      </font><font color="#000000" size="2">      </font></div></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">15. Domiclio</font></div></td>
      <td bgcolor="#D0F9FB">     
        <input type="text" name="domicilio"  value ="<?php print("$domicilio");?>" id="domicilio2" size="35" onKeyPress="return verif_caracter(this,event)">
</font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="27" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">4. Nombre</font></div></td>
      <td bgcolor="#C9FADF">         <div align="left"><font color="#000000" size="2">
        
        <input type="text" name="nombre"   value="<?php print("$nombre");?>" id="nombre2"  size="30" onKeyPress="return verif_caracter(this,event)">
		</font><font size="1">
      </font><font color="#000000" size="2">      </font></div></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">16. Numero</font></div></td>
      <td bgcolor="#D0F9FB"> <font size="2">
             <input type="text" name="nro_domicilio" value ="<?php print("$nro_domicilio");?>" id="nro_domicilio2" size="5" onKeyPress="return verif_caracter(this,event)">
      </font> </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 5. Esposa/o</font></div></td>
      <td bgcolor="#C9FADF">        <div align="left"><font color="#000000" size="2">
        
        <input type="text" name="nom_esposa" value ="<?php print("$nom_esposa");?>"id="nom_esposa2" size="30" onKeyPress="return verif_caracter(this,event)">
</font><font size="1">
</font><font color="#000000" size="2">      </font></div></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">17. Referencia</font></div></td>
      <td bgcolor="#D0F9FB"><div align="left"><font size="2">
        <div align="left">  
          <input type="text" name="referencia" value ="<?php print("$referencia");?>" id="referencia2" size="15" onKeyPress="return verif_caracter(this,event)">
	    </div>
  </font><font size="1">
      </font><font size="2">        </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="26" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">6. Estado Civil</font></div></td>
      <td bgcolor="#C9FADF"><div align="left">

<select name="estado_civil[]" id="estado_civil" onkeypress="return verif_caracter(this,event)">
<optgroup label = "Opcion Seleccionada">
		  <option value selected = "<?php print("$estado_civil");?>"><?php print("$estado_civil");?></option> 
		  </optgroup>
		  <optgroup label = "Cambiar por">

            <option value="Casado/a">Casado/a</option>
            <option value ="Soltero/a">Soltero/a</option>
             <option value ="Divorciado/a">Divorciado/a</option>
              <option value ="Viudo/a">Viudo/a</option>
        </select>
	  </div></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">18. Departamen.</font></div></td>
      <td valign="top" bgcolor="#D0F9FB">
        <select name="departamento[]" id="departamento"onkeypress="return verif_caracter(this,event)">
 <optgroup label = "Opcion Seleccionada">
		  <option value selected = "<?php print("$departamento");?>"><?php print("$departamento");?></option> 
		  </optgroup>
		  <optgroup label = "Cambiar por">
		  
		  <optgroup label="Gran Mendoza">
          <option value="Ciudad"><font size="2">Capital</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Godoy Cruz"><font size="2">Godoy Cruz</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Las Heras"><font size="2">Las Heras</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Guaymallén"><font size="2">Guaymallen</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Lujan"><font size="2">Lujan</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Maipu"><font size="2">Maipu</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          </optgroup>
          <optgroup label="Valle de Uco">
          <option value="Tupungato"><font size="2">Tupungato</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          <option value="Tunuyan"><font size="2">Tunuyan</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
          </optgroup>
          <optgroup label="Este"> </optgroup>
		 <option value="San Martin"><font size="2">San Martin</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		 <option value="Palmira"><font size="2">Palmira</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		 <option value="Rivadavia"><font size="2">Rivadavia</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
 		 <option value="Junin"><font size="2">Junin</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		   </optgroup>
        </select></td>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="26" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">7. Sexo</font></div></td>
      <td bgcolor="#C9FADF">        <font color="#000000" size="2">
	  
	  <select name="sexo[]" id="select2" value ="<?php print("$sexo");?>" onKeyPress="return verif_caracter(this,event)">
		  <optgroup label = "Opcion Seleccionada">
		  <option value selected = "<?php print("$sexo");?>"><?php print("$sexo");?></option>      
		  </optgroup>
		  <optgroup label = "Cambiar por">
		  <option value = "MASCULINO">MASCULINO </option>
          <option value = "FEMENINO">FEMENINO </option>
      </select> 
        </font></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">19. Cod. Postal</font></div></td>
      <td valign="top" bgcolor="#D0F9FB"> 
      <font size="2"><input type="text" name="cod_postal" value ="<?php print("$cod_postal");?>" id ="cod_postal2" size="5" onKeyPress="return verif_caracter(this,event)">
      </font>          </td>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24" valign="top" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">8. Nacimiento</font></div></td>
      <td valign="top" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2">

 <input type="text" name="dia" id="dia" value ="<?php print("$dia");?>" onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/<input type="text" name="mes" value ="<?php print("$mes");?>" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/<input type="text" name="anio" value ="<?php print("$anio");?>" id="año"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">  

      </font></div></td>
      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">20. Localidad</font></div></td>
      <td bgcolor="#D0F9FB"> <font size="2">      <input type="text" name="localidad" value ="<?php print("$localidad");?>" id="referencia" size="30" onKeyPress="return verif_caracter(this,event)">
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="26" bgcolor="#C9FADF"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">9. Tipo de Doc.</font></div></td>
      <td bgcolor="#C9FADF">        <strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
		<optgroup label = "Opcion Seleccionada">
		  <option value selected = "<?php print("$tipo_doc");?>"><?php print("$tipo_doc");?></option>      
		  </optgroup>
		  <optgroup label = "Cambiar por">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
		   </optgroup>
        </select>
      </font></strong></td>

      <td colspan="2" bgcolor="#D0F9FB"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">21. Estado</font></div></td>
      <td bgcolor="#D0F9FB">
      <font size="2">
      <select name="estado[]" id="select2" onkeypress="return verif_caracter(this,event)">
	  <optgroup label = "Opcion Seleccionada">
		  <option value selected = "<?php print("$estado");?>"><?php print("$estado");?></option>      
		  </optgroup>
		  <optgroup label = "Cambiar por">
        <option value="Activo">Activo</option>
        <option value ="Renuncia">Renuncia</option>
        <option value ="Baja">Baja</option>
        <option value ="Suspendido">Suspendido</option>
        <option value ="Vitalicio">Vitalicio</option>
        <option value ="Fallecido">Fallecido</option>
		</optgroup>
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
        
<input type="text" name="dia_estado" id="dia_estado" value = "<?php print("$dia_estado");?>" onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="mes_estado" id="mes_estado" value = "<?php print("$mes_estado");?>" onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="anio_estado" id="anio_estado" value = "<?php print("$anio_estado");?>" onKeyPress="return verif_caracter(this,event)" size="4" maxlength="4">

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


<?php if ($facturante == "SI"){?>
<input type="radio" name="facturante" value="SI"tabindex="26" checked="TRUE" id="facturante" onKeyPress="return verif_caracter(this,event)">
SI
<input type="radio" name="facturante" value="NO" tabindex="27">
NO 
<?php }else{?>
<input type="radio" name="facturante" value="SI"tabindex="26"  id="facturante" onKeyPress="return verif_caracter(this,event)">
SI
<input type="radio" name="facturante" value="NO" checked="TRUE" tabindex="27">
NO 
<?php }?>

</font><font size="2">&nbsp;
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
