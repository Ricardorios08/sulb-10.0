<?php


 $numero_credencial = $nro_afiliado;
  $nf = substr($numero_credencial,11,2);

//11779800

include ("../../conexiones/config.inc.php");

$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

$nro_laboratorio1=$result10->fields["matricula"];
$cuit_prestador=$result10->fields["cuit"];

//$cuit_prestador = 30710747101;
$cuit_prestador= 20125735496;
  
  $cod_usu = $cuenta_abm;
$clave = $cuenta_abm;
//$numero_credencial = "15057131730900";
 




$soapClient = new SoapClient("http://181.15.123.114/WS_PAMIMENDOZA/ConsultaAfiliado.asmx?wsdl"); 
$ap_param = array(
'codUsu'     =>  $cod_usu,  
'clave'   =>  $clave,
'nroAfi' =>  $numero_credencial,
);

//var_dump($ap_param);

$info = $soapClient->__call("elegibilidad2", array($ap_param));
//var_dump($info);
$elegibilidad2Result = $info->elegibilidad2Result;


/*
$soapClient = new SoapClient("http://181.15.123.114/WS_PAMIMENDOZA/ConsultaAfiliado.asmx?wsdl"); 
$ap_param = array("XMLRequerimiento" => "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='$cod_usu' Clave='$clave'/><Afiliado NroAfi='$numero_credencial'/></Requerimiento>");
$info = $soapClient->__call("elegibilidad", array($ap_param));
echo "<br>";
echo "++++++".$elegibilidadResult = $info->elegibilidad2Result;
 

 $soapClient = new SoapClient("http://181.15.123.114/WS_PAMIMENDOZA/ConsultaAfiliado.asmx?wsdl"); 
$ap_param = array("XMLRequerimiento" => "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='$cod_usu' Clave='$clave'/><Afiliado NroAfi='$numero_credencial'/></Requerimiento>");
$info = $soapClient->__call("elegibilidad", array($ap_param));
echo "<br>";
echo "++++++".$elegibilidadResult = $info->elegibilidad2Result;


$soapClient = new soapclient('http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoConsulta.asmx?wsdl');
$ap_param = array("pParameters" => "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='$cod_usu' Clave='$clave'/><Afiliado NroAfi='$numero_credencial'/></Requerimiento>");
$info = $soapClient->__call("PamiMendozaAfiliadoConsulta", array($ap_param));

echo "<br>";
echo "*****".$elegibilidadResult = $info->elegibilidadResult;



unset($soapClient); 


/*foreach ($elegibilidadResult as $k => $v) {
$c = $c.$v."*";
}

*/
//echo "<br>";
$r=  list($nombre_efector, $a, $Nombreafiliado,  $sexo, $fecha_nacimiento, $mensaje_display) = explode("-",$elegibilidad2Result);

/*
echo $nombre_efector;
echo "<br>";
echo $a;
echo "<br>";
echo $Nombreafiliado;
echo "<br>";
echo $sexo;
echo "<br>";
echo $fecha_nacimiento;
echo "<br>";
echo $mensaje_display;
*/


$r=  list($apellido, $nombre, $nombre2, $nombre3) = explode(" ",$Nombreafiliado);
$nombre = $nombre." ".$nombre2." ".$nombre3;

/*
$Nombreefector = $info->Nombreefector;
$Nombreafiliado = $info->Nombreafiliado;
$Edad = $info->Edad;
$Codigorespuesta = $info->Codigorespuesta;
$Descripcionrespuesta = $info->Descripcionrespuesta;
$Planrta = $info->Planrta;
$nombre = $info->Nombre;
$apellido = $info->Apellido;
$credencial  = $info->numero_credencial;
$nro_documento = $info->Nrodocumento;
$fecha_nacimiento  = $info->Fechanacimiento;
$Edad  = $info->Edad;
$sexo = $info->Sexo; //solicittar
$mensaje_display  = $info->Codigorespuesta;
$mensaje_display1  = $info->Descripcionrespuesta;
$NroPlan= $info->Planrta;
$plan= $info->Planrta;
$tp_afiliado = $info->Condicionafiliado;
*/

 //var_dump($info);

unset($soapClient); 

 
 



$dia_nac = substr($fecha_nacimiento,0,2);
$mes_nac = substr($fecha_nacimiento,3,2);
$anio_nac = substr($fecha_nacimiento,6,4);


if ($sexo == "F"){
$sexo = "Femenino";
}else{
$sexo = "Masculino";
}






$mensaje_display;

if ($mensaje_display == "Existe el afiliado"){


  $sql="select * from planes_os where nro_os like '$nro_os' and nro_plan = $NroPlan";
$result = $db->Execute($sql);

$nro_os1=strtoupper($result->fields["nro_os"]);
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
	  <!-- <select name="sexo[]" id="select6" onkeypress="return verif_caracter(this,event)">
          <option value="">Seleccione Sexo</option>
		  <option value="Masculino">Masculino</option>
          <option value ="Femenino">Femenino</option>
        </select> -->
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


	         <input name="nro_os" type="hidden" value = "<?php echo $nro_os;?>">
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

