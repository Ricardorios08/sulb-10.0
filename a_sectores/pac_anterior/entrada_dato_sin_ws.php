<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
<link href="../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<script src="../../css/js/bootstrap.min.js"></script>
<script src="../../css/js/jquery.min.js"></script>

<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo4 {font-family: "Trebuchet MS"; font-size: 14px; }
.Estilo5 {font-size: 14px}
-->
</style>
<form action="guardar.php" method="post">
<table width="800" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    
    <!-- <tr align="center" bordercolor="#FFFFFF">
	  <td colspan="8" bgcolor="#CCCCCC"><div align="center" class="Estilo45"><font face="Trebuchet MS">DATOS PERSONALES</font></div></td>
    </tr> -->
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" align="center" valign="middle" bgcolor="#EDEDED"><div align="center" class="Estilo4">
        <div align="right">O.S<font color="#000000"> &nbsp;&nbsp;</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><div align="left"><font color="#000000" size="2"><strong><font color="#000000" size="2"><?php echo $nro_os;?> <?php echo $sigla;?>
          <input name="nro_os[]" type="hidden" value = "<?php echo $nro_os;?>">
          <input name="band" type="hidden" value = "1">
      </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></strong></font></div></td>
      <td colspan="2" align="center" bgcolor="#EDEDED"><font color="#000000">PLAN</font>ES</td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="90" height="24" valign="middle" bgcolor="#EDEDED">
      <div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right"><font color="#000000"> N&ordm;  &nbsp;&nbsp; </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" class="form-control-sm" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td width="141" colspan="2" rowspan="13" valign="top" bgcolor="#EDEDED"><span class="Estilo41">
        <?php 
$sql = "SELECT * FROM planes_os where nro_os = $nro_os";
$result = $db->Execute($sql);
echo "<select class='form-control-sm' name=nombre_plan[] size=20 id =nombre_plan onKeyPress='return verif_caracter(this,event)'>";
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
    
    <tr bordercolor="#FFFFFF">
      <td height="24" valign="middle" bgcolor="#EDEDED">
      <div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right"><font color="#000000">N&ordm; AFILIADO &nbsp;&nbsp; </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input class="form-control-sm " placeholder="Campo Obligatorio"  name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)"  value = "<?php echo $nro_afiliado;?>" size="20" maxlength="20" >      
      </font><font size="2"><span class="Estilo44"></span> </font></td>
    </tr>
    
    <tr bordercolor="#FFFFFF">
      <td height="24" valign="middle" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right"><font color="#000000">APELLIDO &nbsp;&nbsp;</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input class="form-control" placeholder="Campo Obligatorio" name="apellido" type="text" id="apellido" onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44"></span> </font></td>
    </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24" valign="middle" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right"><font color="#000000">NOMBRE &nbsp;&nbsp; </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input  class="form-control" placeholder="Campo Obligatorio" name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font></td>
    </tr>


      <tr bordercolor="#FFFFFF">
        <td height="24" valign="middle" bgcolor="#EDEDED"><div align="center" class="Estilo4">
          <div align="right"><span class="Estilo25"><font color="#000000">TIPO &nbsp;&nbsp; </font></span></div>
        </div></td>
        <td bgcolor="#EDEDED">
          <select class='form-control' name="tipo_afiliado[]" id="tipo_afiliado[]"onkeypress="return verif_caracter(this,event)">
            <option value="0">No Gravado (Obligatorio) Exento</option>
            <option value="1">Gravado    (Voluntario)  Con IVA</option>
          </select>
        </td>
    <tr bordercolor="#FFFFFF">
      <td height="24" valign="middle" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right"><font color="#000000">TIPO DOC.&nbsp; &nbsp;&nbsp;</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        
        <select class='form-control' name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
    
      </td>
    <tr bordercolor="#FFFFFF">
      <td height="24" valign="middle" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right"><font color="#000000"> DOC &nbsp;&nbsp;</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2">
        <input class="form-control" placeholder="Campo Obligatorio" name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">
      </font>      <font size="2"><span class="Estilo44"></span></font> </td>
    <tr bordercolor="#FFFFFF">
      <td height="26" valign="middle" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right">DOMICILIO &nbsp;&nbsp;</div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input class="form-control"  name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
    <tr bordercolor="#FFFFFF">
      <td height="26" valign="middle" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right">LOCALIDAD &nbsp;&nbsp;</div>
      </div></td>
      <td bgcolor="#EDEDED"><?php 
$sql = "SELECT * FROM localidades order by cod_operacion";
$result = $db->Execute($sql);
echo "<select class='form-control' name=localidad[] size=1 id =localidad onKeyPress='return verif_caracter(this,event)'>";
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
      <td height="26" valign="middle" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right">TEL. &nbsp;&nbsp; </div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input class="form-control"  name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
    <tr bordercolor="#FFFFFF" bgcolor="#EDEDED">
      <td height="26" valign="middle"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right">CELULAR &nbsp;&nbsp;</div>
      </div></td>
      <td><font size="2">
        <input class="form-control"  name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
    <tr bordercolor="#FFFFFF" bgcolor="#EDEDED">
      <td height="26" valign="middle"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right">SEXO &nbsp;&nbsp;</div>
      </div></td>
      <td><font size="2">
        <select class="form-control" name="sexo[]" id="select6" onkeypress="return verif_caracter(this,event)">
          <option value="">Seleccione Sexo</option>
		  <option value="Masculino">Masculino</option>
          <option value ="Femenino">Femenino</option>
        </select>
      </font><font size="2"><span class="Estilo44"> </span> </font></td>
    <tr bordercolor="#FFFFFF" bgcolor="#EDEDED">
      <td height="24" valign="middle"><div align="right" class="Estilo25 Estilo1 Estilo5">
        <div align="right"> NACIMIENTO &nbsp;&nbsp; </div>
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
    <td width="563"></td>
    <td colspan="2"></td>
  </tr>  
</table>
</form>