<?php include ("../../conexiones/config.inc.php");

echo "por aca";

?>

<form action="guardar.php" method="post">
<table width="100%" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    
    <tr align="center" bordercolor="#FFFFFF">
	  <td colspan="8" bgcolor="#CCCCCC"><div align="center" class="Estilo45"><font face="Trebuchet MS">DATOS PERSONALES</font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="156" height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td colspan="2" bgcolor="#EDEDED"><div align="right" class="Estilo38">
        <div align="center"><font color="#000000">PLAN</font>ES</div>
      </div>        <div align="left" class="Estilo41"></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><font size="2">OBRA SOCIAL </font></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2"> <?php echo $nro_os;?> <?php echo $sigla;?>
              <input name="nro_os[]" type="hidden" value = "<?php echo $nro_os;?>">
              <input name="band" type="hidden" value = "1">
      </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></strong></font></td>
      <td width="192" colspan="2" rowspan="13" align="center" valign="top" bgcolor="#EDEDED"><span class="Estilo41">
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
      </span>
      <div align="right" class="Estilo38"></div>        <div align="left" class="Estilo41"></div>      <div align="center"></div>      <div align="center"></div>      <div align="center"></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)"  value = "<?php echo $nro_afiliado;?>" size="20" maxlength="20" >      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
    </tr>
    
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
    </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
    </tr>


      <tr bordercolor="#FFFFFF">
        <td height="24" bgcolor="#EDEDED"><div align="left"><span class="Estilo25"><font color="#000000" size="2">TIPO AFILIADO </font></span></div></td>
        <td bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2">
          <select name="tipo_afiliado[]" id="tipo_afiliado[]"onkeypress="return verif_caracter(this,event)">
            <option value="0">NO GRAVADO (OBLIGATORIO) EXENTO</option>
            <option value="1">GRAVADO    (VOLUNTARIO)  CON IVA</option>
          </select>
        </font></strong></font></td>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">TIPO DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
      </font></strong>
      </font></td>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">
      </font></strong>      <font size="2"><span class="Estilo44">* Obligatorio</span></font> </td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">DOMICILIO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">LOCALIDAD</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><?php 
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
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">TEL. FIJO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
    <tr bordercolor="#FFFFFF" bgcolor="#EDEDED">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">CELULAR</font></div>
      </div></td>
      <td><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
    <tr bordercolor="#FFFFFF" bgcolor="#EDEDED">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">SEXO</font></div>
      </div></td>
      <td><font color="#000000" size="2">
        <select name="sexo[]" id="select6" onkeypress="return verif_caracter(this,event)">
          <option value="">Seleccione Sexo</option>
		  <option value="Masculino">Masculino</option>
          <option value ="Femenino">Femenino</option>
        </select>
      </font><font size="2"><span class="Estilo44">* Necesario </span> </font></td>
    <tr bordercolor="#FFFFFF" bgcolor="#EDEDED">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
      </div></td>
      <td><font color="#000000" size="2">
        <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
      </font><font size="2"><span class="Estilo44">* Necesario </span> </font></td>
    <tr bordercolor="#FFFFFF">
    <td height="26" colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center">
      <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE" class = 'bot1'>
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="308"></td>
    <td colspan="2"></td>
  </tr>  
</table>
</form>
<?php