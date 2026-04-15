<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />


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
				document.getElementById("apellido").focus();
				break;
					case "apellido":
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
.Estilo25 {font-family: "Trebuchet MS"}
-->
</style>
<BODY onload = "on_load()">

<?php 

echo "a";


include ("../../conexiones/config.inc.php");
$sql="select * from pacientes ORDER BY nro_paciente DESC";
$result = $db->Execute($sql);

$nro_paciente=($result->fields["nro_paciente"] + 1);

?>
<form action="guardar.php" method="post">


<table width="800" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="37" colspan="4"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><img src="../../imagenes/pacientes.jpg" width="846" height="35"></font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="140" height="24">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td width="149"><div align="right"><font color="#000000" size="2">PLAN:</font></div></td>
      <td width="144"><div align="left"><font color="#000000" size="2"><?php echo $plan;?></font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td>        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_afiliado;?>"  size="20" maxlength="20">      
      </font></td>
      <td align="center"><div align="right"><font color="#000000" size="2">COSEGURO:</font></div></td>
      <td align="center"><div align="left"><font color="#000000" size="2"><?php echo $coseguro;?></font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24"><div align="left" class="Estilo25"><font color="#000000" size="2">TIPO AFILIADO </font></div></td>
      <td><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_afiliado[]" id="tipo_afiliado[]"onkeypress="return verif_caracter(this,event)">
          <option value="0">NO GRAVADO (OBLIGATORIO) EXENTO</option>
          <option value="1">GRAVADO (VOLUNTARIO) CON IVA</option>
                        </select>
      </font></strong></font></td>
      <td align="center"><div align="right"><font color="#000000" size="2">IVA:</font></div></td>
      <td align="center"><div align="left"><font color="#000000" size="2"><?php echo $iva;?></font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td colspan="3">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font></td>
  </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td colspan="3">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font></td>
  </tr>


    <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">TIPO DOCUMENTO</font></div>
      </div></td>
      <td colspan="3">        <font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
      </font></strong>
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td colspan="3"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">
      </font></strong></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">OBRA SOCIAL </font></div>
      </div></td>
      <td colspan="3"><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <?php 
$sql = "SELECT * FROM datos_os order by  sigla, nro_os";
$result = $db->Execute($sql);
echo "<select name=nro_os[] size=1 id =nro_os onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione OBRA SOCIAL</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_os=$result->fields["nro_os"];
$sigla=strtoupper($result->fields["sigla"]);
echo"<option value=$nro_os>$sigla ($nro_os)</option>";
$result->MoveNext();
	}
echo"</select>";
?> 
      </font></strong>
     <?php echo $nro_os;?> </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">DOMICILIO</font></div>
      </div></td>
      <td colspan="3"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">LOCALIDAD</font></div>
      </div></td>
      <td colspan="3"><font size="2">

	  <?php 
$sql = "SELECT * FROM localidades order by cod_operacion";
$result = $db->Execute($sql);
echo "<select name=localidad[] size=1 id =localidad onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione LOCALIDAD</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$localidad=$result->fields["localidad"];


 


$departamento=strtoupper($result->fields["departamento"]);
echo"<option value=$localidad>$departamento ($localidad)</option>";
$result->MoveNext();
	}
echo"</select>";

?>  </td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">TEL. FIJO </font></div>
      </div></td>
      <td colspan="3"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">CELULAR</font></div>
      </div></td>
      <td colspan="3"><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">SEXO</font></div>
      </div></td>
      <td colspan="3"><font color="#000000" size="2">
        <select name="sexo[]" id="select6" onkeypress="return verif_caracter(this,event)">
          <option value="">Seleccione Sexo</option>
		  <option value="Masculino">Masculino</option>
          <option value ="Femenino">Femenino</option>
        </select>
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
      </div></td>
      <td colspan="3"><font color="#000000" size="2">
        <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
      </font></td>
  <tr bordercolor="#FFFFFF">
    <td height="26" colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center">
      <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE">
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="273"></td>
    <td colspan="2"></td>
  </tr>  
</table>
