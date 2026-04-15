<?php

 $numero_credencial = $nro_afiliado;
  $nf = substr($numero_credencial,11,2);


  $soapClient = new SoapClient("http://wsospeonline.gmssa.com.ar/wsoPadronSAN.asmx?wsdl");

       // Setup the RemoteFunction parameters
       $ap_param = array(
'cuil'     =>  $numero_credencial,  
'nf'   =>  $nf,
'username' =>  '30545508652',
'password' =>  'cb1999ae13d1c438abd1b43c5fe08f8e'
);
                 
       // Call RemoteFunction ()
       $error = 0;
       try {
           $info = $soapClient->__call("ObtenerInfoPadron", array($ap_param));
       } catch (SoapFault $fault) {
           $error = 1;
           print("Sorry, the WebService returned the following ERROR: ".$fault->faultcode."-".$fault->faultstring.". We will now take you back to our home page.");
       }
     
       if ($error == 0) {      
//print_r($info->ObtenerInfoPadronResult);

$resultado = $info->ObtenerInfoPadronResult;
//var_dump($info);
}
 
unset($soapClient); 


foreach ($resultado as $k => $v) {
$c = $c.$v."*";
}

$r=  list($nombre, $apellido, $credencial,  $TipoDocumento, $nro_documento, $CUIL,  $NF, $fecha_nacimiento,  $Edad,  $sexo, $Parentesco,  $mensaje_display,  $NroPlan, $plan, $coseguro,  $CodigoPostal, $Localidad,  $Provincia, $ProvinciaDesc, $NivelPlan, $Saldo) = explode("*",$c);





$dia_nac = substr($fecha_nacimiento,6,2);
$mes_nac = substr($fecha_nacimiento,4,2);
$anio_nac = substr($fecha_nacimiento,0,4);


if ($sexo == "F"){
$sexo = "Femenino";
}else{
$sexo = "Masculino";
}








if ($mensaje_display == "SI"){


  $sql="select * from planes_os where nro_os like '$nro_os' and nro_plan = $NroPlan";
$result = $db->Execute($sql);

//$nro_os=strtoupper($result->fields["nro_os"]);
$cod_operacion=$result->fields["cod_operacion"];
$nro_plan=$result->fields["nro_plan"];
$nombre_plan=$result->fields["nombre_plan"];
$reducido_plan=$result->fields["reducido_plan"];
$coseguro=$result->fields["coseguro"];
$comunes=$result->fields["comunes"];
$especiales=$result->fields["especiales"];
$alta=$result->fields["alta"];
$pmo=$result->fields["pmo"];
$texto=$result->fields["texto"];

 $mensaje_display;

?>
<table width="800" border="0" cellspacing="0">
 
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#FFFF33"><div align="center" class="Estilo43"><font color="#000000">RESPUESTA OBRA SOCIAL: ACTIVO</font></div></td>
    </tr>


    <tr align="center" bordercolor="#FFFFFF">
      <td width="157" height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td width="100" bgcolor="#EDEDED"><div align="right" class="Estilo38"><font color="#000000">N&deg; </font></div></td>
      <td width="229" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $NroPlan;?></font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_afiliado;?>"  size="20" maxlength="20">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38"><font color="#000000">PLAN</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $plan;?>
        <input name="plan" type="hidden" value = "<?php echo $plan;?>">


        <input name="activo" type="hidden" value = "<?php echo $mensaje_display;?>">
      </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="left" class="Estilo25"><font color="#000000" size="2">TIPO AFILIADO </font></div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><?php echo $tp_afiliado;?>
	  
	   <input name="tipo_afiliado" type="hidden" value = "<?php echo $tipo_afiliado;?>">
	  
	  </font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38"><font color="#000000">COSEGURO:</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $coseguro;?>
        <input name="coseguro" type="hidden" value = "<?php echo $coseguro;?>">
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td colspan="2" bgcolor="#FFFF33"><div align="center" class="Estilo38">AUTORIZAR</div>        <div align="center" class="Estilo36"></div></td>
  </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">COMUNES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $comunes;?></font></span></td>
  </tr>


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
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">ESPECIALES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $especiales;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">
		
        <input name="nro_os" type="hidden" value = "<?php echo $nro_os;?>">
      </font></strong><font size="2"><span class="Estilo44">* Obligatorio</span></font> </td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">ALTA</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $alta;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">DOMICILIO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
      <td colspan="2" bgcolor="#FFFF33"><div align="center" class="Estilo38">PMO</div></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">LOCALIDAD</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">

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
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">PLAN PMO </div></td>
      <td bgcolor="#EDEDED"><span class="Estilo25 Estilo41"><font color="#000000"><?php echo $pmo;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">TEL. FIJO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
      <td colspan="2" bgcolor="#FFFF33"><div align="center" class="Estilo38">DETALLE DEL PLAN </div></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">CELULAR</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
      <td colspan="2" rowspan="3" bgcolor="#EDEDED"><div align="center"><font color="#000000"><?php echo $texto;?></font></div></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">SEXO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2">
      <?php echo $sexo;?>    <input name="sexo" type="hidden" value = "<?php echo $sexo;?>">
      </font><font size="2"><span class="Estilo44"> * Necesario </span> </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2">

<?php echo $dia_nac;?> / <?php echo $mes_nac;?> / <?php echo $anio_nac;?>
        <input type="hidden" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $dia_nac;?>>

<input type="hidden" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $mes_nac;?>>

<input type="hidden" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4" value = <?php echo $anio_nac;?>>
      </font><font size="2"><span class="Estilo44">* Necesario </span> </font></td>
  <tr bordercolor="#FFFFFF">
    <td height="26" colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center">
      <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE">
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="306"></td>
    <td colspan="2"></td>
  </tr>  
</table>
</form>

  <?php }ELSE{ ?>
<table width="800" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#FFFF33"><div align="center" class="Estilo43"><font color="#000000">RESPUESTA OBRA SOCIAL:  NO ACTIVO </font></div></td>
    </tr>

 <tr>
    <th height="36" bgcolor="#EDEDED" scope="col"><span class="Estilo1 Estilo4">
      <input name="button" type="button" id ="boton" onClick="history.back()" onKeyPress="history.back()" value="Presione ENTER">
    </span></th>
  </tr>
</table>

<?php

  }

