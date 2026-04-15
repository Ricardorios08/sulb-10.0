<link href="../../css/fondFo.css" rel="stylesheet" type="text/css" />
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
.Estilo40 {
	font-family: "Trebuchet MS";
	font-weight: bold;
}
.Estilo41 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo44 {color: #FF0000;
	font-family: "Trebuchet MS";
}
.Estilo45 {font-size: 12px}
-->
</style>

 
 <link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />


<BODY onload = "on_load()">

<?php 
include ("../../conexiones/config.inc.php");

$nro_paciente = $_REQUEST['nro_paciente'];
$usuario = $_REQUEST['usuario'];

$tipo_operador = $_REQUEST['tipo_operador'];
 $sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

$nro_paciente=$result->fields["nro_paciente"];
$nro_afiliado=$result->fields["nro_afiliado"];
$nombre=$result->fields["nombre"];
$apellido=$result->fields["apellido"];
$tipo_doc=$result->fields["tipo_doc"];
$nro_documento=$result->fields["nro_documento"];
$nro_os=$result->fields["nro_os"];

$plan=$result->fields["plan"];

 $sql2="select * from planes_os where nro_os like '$nro_os' and nro_plan = '$plan' OR nombre_plan = '$plan'";
$result2 = $db->Execute($sql2);


 $nombre_plan=$result2->fields["nombre_plan"];




 $sql1="SELECT * FROM datos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);

$sigla=$result1->fields["sigla"];

$domicilio=$result->fields["domicilio"];
$localidad=$result->fields["localidad"];
$telefono=$result->fields["telefono"];
$celular=$result->fields["celular"];
$sexo=$result->fields["sexo"];
 $fecha_nacimiento=$result->fields["fecha_nacimiento"];
$tipo_afiliado=$result->fields["tipo_afiliado"];

 
switch ($tipo_afiliado){
	case "0":{
		
$tp_afiliado = "NO GRAVADO (OBLIGATORIO) EXENTO";

		BREAK;
	}

		case "1":{
		
$tp_afiliado = "GRAVADO (VOLUNTARIO) CON IVA";

		BREAK;
	}



}




if ($fecha_nacimiento == "0000-00-00"){
$dia = "";
$mes = "";
$anio = "";

}else{
$dia = substr($fecha_nacimiento,8,2);
$mes= substr($fecha_nacimiento,5,2);
$anio = substr($fecha_nacimiento,0,4);
}
	 	
?>
<form action="modificar_paciente.php" method="post">
<table width="829" border="0" cellspacing="0">
    <!--DWLayoutTable-->
  <tr bgcolor="#CECECE">
    <td colspan="2" bgcolor="#CECECE"><div align="center" class="titulo"><font face="Trebuchet MS">MODIFICAR DATOS PERSONALES </font></div></td>
    <td bgcolor="#CECECE"><div align="center" class="titulo"><font face="Trebuchet MS">PLANES</font></div></td>
  </tr>
    <tr align="center" >
      <td width="135" height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo41">
        <div align="left"><font color="#000000"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td bgcolor="#F0F0F0"><div align="left" class="Estilo41">
        <font color="#000000">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font>Cambiar N&deg;Paciente por <font color="#000000">
      <input name="nro_paciente_cambiar" type="text" id="nro_paciente_cambiar" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8">
      </font></div>        <span class="Estilo41"><font color="#000000"> </font></span></td>
      <td width="244" bgcolor="#F0F0F0"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr  >
      <td height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo41">
        <div align="left"><font color="#000000">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#F0F0F0">        <span class="Estilo41"><font color="#000000">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_afiliado;?>"  size="20" maxlength="20">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></span></td>
      <td rowspan="13" align="center" valign="top" bgcolor="#F0F0F0"><span class="Estilo45">
        <?php 
$sql = "SELECT * FROM planes_os where nro_os = $nro_os";
$result = $db->Execute($sql);
echo "<select name=nombre_plan[] size=16 id =nombre_plan onKeyPress='return verif_caracter(this,event)'>";
 ?>          <optgroup label="SELECCIONADA">        
		     <option value="<?php echo $plan;?>"><?php echo $plan;?></option>
             <?php

echo"<option value=''>Seleccione PLAN</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod_operacion=$result->fields["cod_operacion"];
 $nombre_plan=strtoupper($result->fields["nombre_plan"]);
$nro_plan=strtoupper($result->fields["nro_plan"]);
echo"<option value='$nombre_plan'>$nombre_plan ($nro_plan)</option>";
$result->MoveNext();
	}
echo"</select>";



?>
      </span></td>
    </tr>
    <tr  >
      <td height="24" bgcolor="#EDEDED"><span class="Estilo41"><font color="#000000">TIPO AFILIADO </font></span></td>
      <td bgcolor="#F0F0F0"><select name="tipo_afiliado[]" id="tipo_afiliado[]"onkeypress="return verif_caracter(this,event)">
        <optgroup label="SELECCIONADA"> </optgroup>
        <option value="<?php echo $tipo_afiliado;?>"><?php echo $tp_afiliado;?></option>
        <option value="0">NO GRAVADO (OBLIGATORIO) EXENTO</option>
        <option value="1">GRAVADO (VOLUNTARIO) CON IVA</option>
      </select></td>
    </tr>
    <tr  >
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left"><font color="#000000">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#F0F0F0">        <span class="Estilo41"><font color="#000000">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" value="<?php echo $apellido;?>" size="30" maxlength="30">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></span></td>
    </tr>

	    <tr  >
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left"><font color="#000000">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#F0F0F0">        <span class="Estilo41"><font color="#000000">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" value="<?php echo $nombre;?>" size="30" maxlength="30">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></span></td>
    </tr>


    <tr  >
      <td bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left"><font color="#000000">TIPO DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#F0F0F0"><select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)"><optgroup label="SELECCIONADA"> </optgroup>
        <option value="<?php echo $tipo_doc;?>"><span class="Estilo41"><font color="#000000"><strong><?php echo $tipo_doc;?></strong></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font></span></option>
        </optgroup>
        
        <option value = "D.N.I"><span class="Estilo41"><font color="#000000"><strong>D.N.I </strong></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font></span></option>
        <option value = "L.E"><span class="Estilo41"><font color="#000000"><strong>L.E </strong></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font></span></option>
        <option value = "L.C"><span class="Estilo41"><font color="#000000"><strong>L.C </strong></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font></span></option>
      </select>      </td>
    <tr  >
      <td bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left"><font color="#000000">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#F0F0F0"><span class="Estilo41"><strong><font color="#000000">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_documento;?>"  size="8" maxlength="8">
      </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></strong></span></td>
    <tr  >
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left">OBRA SOCIAL </div>
      </div></td>
      <td bgcolor="#F0F0F0">
	  
        <?php 
$sql = "SELECT * FROM datos_os order by nro_os, sigla";
$result = $db->Execute($sql);
echo "<select name=nro_os[] size=1 id =nro_os onKeyPress='return verif_caracter(this,event)'>";
?>          <optgroup label="SELECCIONADA">        
		     <option value="<?php echo $nro_os;?>"><?php echo $sigla;?></option>
      <?php
echo"<option value=''>Seleccione OBRA SOCIAL</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_os=$result->fields["nro_os"];
$sigla=strtoupper($result->fields["sigla"]);
echo"<option value=$nro_os>$sigla ($nro_os)</option>";
$result->MoveNext();
	}
echo"</select>";
?>    <font size="2"><span class="Estilo44">* Obligatorio</span></font></td>
    <tr  >
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left">DOMICILIO</div>
      </div></td>
      <td bgcolor="#F0F0F0"><span class="Estilo41">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" value="<?php echo $domicilio;?>" size="40" maxlength="40">
      </span></td>
    <tr  >
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left">LOCALIDAD</div>
      </div></td>
      <td bgcolor="#F0F0F0"><select name="localidad[]" id="select5"onkeypress="return verif_caracter(this,event)"><optgroup label="SELECCIONADA"> </optgroup>
        <option value="<?php echo $localidad;?>"><span class="Estilo41"><?php echo $localidad;?><font size="2"></font><font size="2"></font><font size="2"></font><font size="2"></font></span></option>
        </optgroup>
        
		  <?php 
$sql = "SELECT * FROM localidades order by cod_operacion";
$result = $db->Execute($sql);
 
echo"<option value=''>Seleccione LOCALIDAD</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$localidad=$result->fields["localidad"];


 
 

$departamento=strtoupper($result->fields["departamento"]);
echo"<option value='$localidad'>$departamento ($localidad)</option>";
$result->MoveNext();
	}
 

?>
		
		
      </select>      </td>
    <tr  >
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left">TEL. FIJO </div>
      </div></td>
      <td bgcolor="#F0F0F0"><span class="Estilo41"><strong><font color="#000000">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)" value="<?php echo $telefono;?>"  size="12" maxlength="12">
      </font></strong></span></td>
    <tr  >
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left">CELULAR</div>
      </div></td>
      <td bgcolor="#F0F0F0"><span class="Estilo41">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)" value="<?php echo $celular;?>"size="12" maxlength="12">
      </span></td>
    <tr  >
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left">SEXO</div>
      </div></td>
      <td bgcolor="#F0F0F0"><select name="sexo[]" id="select6" onkeypress="return verif_caracter(this,event)"><optgroup label="SELECCIONADA"> </optgroup>
        <option value="<?php echo $sexo;?>"><span class="Estilo41"><font color="#000000"><?php echo $sexo;?></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font></span></option>
        </optgroup>
        
        
        <option value="Masculino"><span class="Estilo41"><font color="#000000">Masculino</font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font></span></option>
        <option value ="Femenino"><span class="Estilo41"><font color="#000000">Femenino</font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000"></font><font color="#000000" size="2"></font><font color="#000000" size="2"></font></span></option>
      </select>      </td>
    <tr  >
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo41">
        <div align="left">FECHA NACIMIENTO </div>
      </div></td>
      <td bgcolor="#F0F0F0"><span class="Estilo41"><font color="#000000">
        <input name="dia" type="text" id="dia"onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia;?>" size="2" maxlength="2">
/
<input name="mes" type="text" id="mes"onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes;?>" size="2" maxlength="2">
/
<input name="anio" type="text" id="anio"onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio;?>" size="3" maxlength="4">
      </font></span></td>
    <tr bordercolor="#FFFFFF" bgcolor="#CDCCC7">
      <td height="26" colspan="3"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>            <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE">
	  	   <input type="hidden" name="tipo_operador" value= "<?php echo $tipo_operador;?>" >
<input type="hidden" name="usuario" value= "<?php echo $usuario;?>" >

      </div></td>
</table>
