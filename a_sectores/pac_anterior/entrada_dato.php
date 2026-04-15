 


<script language="javascript">
function on_load()
{
document.getElementById("apellido").focus();
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
				document.getElementById("apellido").focus();
				break;
					case "apellido":
				document.getElementById("nombre").focus();
				break;

				case "nombre":
				document.getElementById("nro_documento").focus();
				break;
				case "nro_documento":
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
.Estilo25 {font-family: "Trebuchet MS"}
.Estilo44 {	color: #FF0000;
	font-family: "Trebuchet MS";
}
.Estilo41 {font-size: 12px}
.Estilo45 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo46 {font-family: "Trebuchet MS"; font-size: 24px; }
-->
</style>
<BODY onload = "on_load()">

<?php 

$apellido = strtoupper($_REQUEST['nombre']);
$numero_credencial_lector = strtoupper($_REQUEST['numero_credencial_lector']);

if(is_numeric($nombre)) {
$nro_documento = $nombre;
$nombre = "";
}ELSE
{
$apellido = $apellido;
$nro_documento = "";


}
include ("../../conexiones/config.inc.php");
$sql="select * from pacientes ORDER BY nro_paciente DESC";
$result = $db->Execute($sql);

$nro_paciente=($result->fields["nro_paciente"] + 1);


$nro_o=$_POST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
	$nro_os = $nro_o[$i];    
	}


if ($nro_os == ""){
$leyenda = "NO INGRESO OBRA SOCIAL";
include ("../../alertas/campo_informacion2.php");
exit;
}

  $sql="select * from datos_os where nro_os = $nro_os";
$result = $db->Execute($sql);
$sigla=$result->fields["sigla"];



  $sql="select * from pacientes where nro_afiliado = '$numero_credencial_lector' and nro_os = '$nro_os'";
$result = $db->Execute($sql);

$nro_pac=$result->fields["nro_paciente"];

if ($nro_pac != ''){

	$bande_nuevo = 1;
$palabra = $numero_credencial_lector;
$bande = 2;

include ("buscar_paciente_individual.php");
exit;
}


if ($numero_credencial_lector == ""){
$numero_credencial_lector = $nro_paciente;
$nro_documento= $nro_paciente;

}

?>
<form action="guardar.php" method="post">
<table width="800" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="37" colspan="3"><div align="center" class="Estilo46">DATOS PACIENTES </div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="146" height="24" bgcolor="#F0F0F0">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td bgcolor="#F0F0F0"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td bgcolor="#F0F0F0"><span class="Estilo45"><font color="#000000">PLAN</font>ES</span></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#F0F0F0">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#F0F0F0">        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado" value = "<?php echo $numero_credencial_lector;?>" onKeyPress="return verif_caracter(this,event)"  size="20" maxlength="20">      
      </font></td>
      <td rowspan="13" valign="top" bgcolor="#F0F0F0"><div align="center"><span class="Estilo41">
        <?php 
$sql = "SELECT * FROM planes_os where nro_os = $nro_os";
$result = $db->Execute($sql);
echo "<select name=nombre_plan[] size=16 id =nombre_plan onKeyPress='return verif_caracter(this,event)'>";
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
      </span></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#F0F0F0"><div align="left" class="Estilo25"><font color="#000000" size="2">TIPO AFILIADO </font></div></td>
      <td bgcolor="#F0F0F0"><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_afiliado[]" id="tipo_afiliado[]"onkeypress="return verif_caracter(this,event)">
          <option value="0">NO GRAVADO (OBLIGATORIO) EXENTO</option>
          <option value="1">GRAVADO (VOLUNTARIO) CON IVA</option>
      </select>
      </font></strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#F0F0F0">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></td>
  </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#F0F0F0">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></td>
  </tr>


    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">TIPO DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#F0F0F0">        <font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
      </font></strong>
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
    </div></td>
      <td bgcolor="#F0F0F0"><strong><font color="#000000" size="2">
      
		<!-- <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8"> -->
	<input name="nro_documento" type="text" id="nro_documento"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">

    </font></strong></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font size="2">OBRA SOCIAL </font></div>
    </div></td>
      <td bgcolor="#F0F0F0"><font color="#000000" size="2"><strong><font color="#000000" size="2">

	   <input name="nro_os[]" type="hidden" value = "<?php echo $nro_os;?>">
	   <?php echo $nro_os;?> -  <?php echo $sigla;?>


       
      </font></strong>
    </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font size="2">DOMICILIO</font></div>
    </div></td>
      <td bgcolor="#F0F0F0"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
    </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font size="2">LOCALIDAD</font></div>
    </div></td>
      <td bgcolor="#F0F0F0"><font size="2">

	  <?php 
$sql = "SELECT * FROM localidades order by cod_operacion";
$result = $db->Execute($sql);
echo "<select name=localidad[] size=1 id =localidad onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione LOCALIDAD</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$localidad=$result->fields["localidad"];


 


$departamento=strtoupper($result->fields["departamento"]);
echo"<option value='$localidad'>$departamento ($localidad)</option>";
$result->MoveNext();
	}
echo"</select>";

?>  </td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font size="2">TEL. FIJO </font></div>
    </div></td>
      <td bgcolor="#F0F0F0"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
    </font></strong></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font size="2">CELULAR</font></div>
    </div></td>
      <td bgcolor="#F0F0F0"><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
    </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font size="2">SEXO</font></div>
    </div></td>
      <td bgcolor="#F0F0F0"><font color="#000000" size="2">
        <select name="sexo[]" id="select6" onkeypress="return verif_caracter(this,event)">
          <option value="">Seleccione Sexo</option>
		  <option value="Masculino">Masculino</option>
          <option value ="Femenino">Femenino</option>
        </select>
    </font><font size="2"><span class="Estilo44">* Necesario </span></font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
    </div></td>
      <td bgcolor="#F0F0F0"><font color="#000000" size="2">
        <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
    </font><font size="2"><span class="Estilo44">* Necesario</span></font></td>
  <tr bordercolor="#FFFFFF">
    <td height="26" colspan="3" valign="top" bgcolor="#B8B8B8"><div align="center">
      <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE">
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="442"></td>
    <td width="254"></td>
  </tr>  
</table>
