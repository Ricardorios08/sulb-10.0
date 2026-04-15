<?php
include ("../../conexiones/config.inc.php");

ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);

ini_set("soap.wsdl_cache_enabled", 0);


try{

//require_once('lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);

ini_set("soap.wsdl_cache_enabled", 0);

$sql="select * from datos_osde";
 $result = $db->Execute($sql);

 $cuenta_abm=strtoupper($result->fields["cuenta_abm"]);





$afiliado_prueba = "15035460300300";

$afiliado = "15058196880600";
echo "Usuario: ".$cod_usu = $cuenta_abm;
$clave = $cuenta_abm;
//$numero_credencial = "15057131730900";
echo "<br>";


$oSoapClient = new soapclient('http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoConsulta.asmx?wsdl');
$aParametros = array("pParameters" => "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='$cod_usu' Clave='$clave'/><Afiliado NroAfi='$numero_credencial'/></Requerimiento>");

//var_dump($aParametros);

$result=$oSoapClient->PamiMendozaAfiliadoConsulta($aParametros);
$result->PamiMendozaAfiliadoConsultaResult;
//var_dump($result);


$myText = (string)$result->PamiMendozaAfiliadoConsultaResult;
//var_dump($myText);

 file_put_contents("envio_elegibilidad_pami.xml", $aParametros);
 file_put_contents("respuesta_pami.xml", $myText);


}catch(Exception $e){

echo "a".$e->faultcode; echo "<br>";
echo "b".$e->faultstring;echo "<br>";
echo "c".$e->faultactor;echo "<br>";
echo "d".$e->detail;echo "<br>";
echo "e".$e->faultname;echo "<br>";
echo "f".$e->headerfault;echo "<br>";


//var_dump($e);
 $a = 1;

	ECHO "Error de conexión PAMI, Intente nuevamente o cargue los datos manualmente";
ini_set("soap.wsdl_cache_enabled", 0);
ini_set('soap.wsdl_cache_ttl',0);
?>

<style type="text/css">
<!--
.Estilo48 {font-family: "Trebuchet MS"}
.Estilo49 {font-size: 12px}
.Estilo50 {font-family: Geneva, Arial, Helvetica, sans-serif}
-->
</style>


<table width="850" border="0" cellspacing="0">
 
    <tr align="center" bordercolor="#FFFFFF">
	  <td colspan="8" bgcolor="#CCCCCC"><div align="center" class="Estilo42"><font face="Trebuchet MS">DATOS PERSONALES </font></div></td>
    </tr>


    <tr align="center" bordercolor="#FFFFFF">
      <td width="157" height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25 Estilo48">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td width="100" bgcolor="#EDEDED"><div align="right" class="Estilo38 Estilo48 Estilo49"><font color="#000000">N&deg;: </font></div></td>
      <td width="229" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $NroPlan;?></font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25 Estilo48">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)" value="<?php echo $numero_credencial;?>"  size="20" maxlength="20">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38 Estilo48 Estilo49"><font color="#000000">PLAN: </font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $plan_codi;?>
        <input name="plan" type="hidden" value = "<?php echo $plan;?>">


        <input name="activo" type="hidden" value = "<?php echo $estado;?>">
      </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="left" class="Estilo25 Estilo48"><font color="#000000" size="2">TIPO AFILIADO </font></div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="select" id="select"onkeypress="return verif_caracter(this,event)">
          <option value="0">NO GRAVADO (OBLIGATORIO) EXENTO</option>
          <option value="1">GRAVADO    (VOLUNTARIO)  CON IVA</option>
        </select>
      </font></strong></font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38 Estilo48 Estilo49"><font color="#000000">COSEGURO:</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $coseguro;?>
        <input name="coseguro" type="hidden" value = "<?php echo $coseguro;?>">
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo38 Estilo48 Estilo49">AUTORIZAR</div>        
      <div align="center" class="Estilo36 Estilo48 Estilo49"></div></td>
  </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo48 Estilo49">COMUNES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $comunes;?></font></span></td>
  </tr>


    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
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
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo48 Estilo49">ESPECIALES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $especiales;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_docu;?>" size="8" maxlength="8">
        <input name="nro_os" type="hidden" value = "<?php echo $nro_os;?>">
      </font></strong><font size="2"><span class="Estilo44">* Obligatorio</span></font> </td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo48 Estilo49">ALTA</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $alta;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"><font size="2">DOMICILIO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo38"></div></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
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
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38"></div></td>
      <td bgcolor="#EDEDED">&nbsp;</td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"><font size="2">TEL. FIJO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo38 Estilo48 Estilo49">DETALLE DEL PLAN </div></td>
  <tr bordercolor="#FFFFFF">

      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"><font size="2">CELULAR</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
      <td colspan="2" rowspan="3" bgcolor="#EDEDED"><div align="center"><font color="#000000"><?php echo $texto;?></font></div></td>
  
    
	  
<?php
	
echo "aa".$a;

if ($a == 1){$a = 4;?>
 

<tr bordercolor="#FFFFFF">
  <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"><font size="2">SEXO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><?php echo $sexo;?>
     
	 <select name="sexo[]" id="select6" onkeypress="return verif_caracter(this,event)">
          <option value="">Seleccione Sexo</option>
		  <option value="Masculino">Masculino</option>
          <option value ="Femenino">Femenino</option>
        </select>

      </font><font size="2"><span class="Estilo44"> * Necesario </span></font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2">
	     <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
      </font><font size="2"><span class="Estilo44">* Necesario </span></font></td>
</tr>
<?}else{?>

<tr bordercolor="#FFFFFF">
	  <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><?php echo $sexo;?>
          <input name="sexo2" type="hidden" value = "<?php echo $sexo;?>">
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo48">
        <div align="left"></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><?php echo $dia_nac;?><?php echo $mes_nac;?><?php echo $anio_nac;?>
          <input type="hidden" name="dia2" id="dia2"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $dia_nac;?>>
          <input type="hidden" name="mes2" id="mes2"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $mes_nac;?>>
          <input type="hidden" name="anio2" id="anio2"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4" value = <?php echo $anio_nac;?>>
    </font></td>
</tr>
	  <?php }?>



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


<?php



}

unset($oSoapClient); 





$xml = new SimpleXmlElement($myText, LIBXML_NOCDATA);

foreach($xml->Bioquimico as $item1){
$prestador = $item1;
}

foreach($xml->EstLogIn as $item1){
$estado = $item1;
}

foreach($xml->ApeNom as $item1){
$apellido = $item1;
}

foreach($xml->N_Docu as $item1){
$nro_docu = $item1;
}

foreach($xml->Sexo as $item1){
$sexo = $item1;
}

foreach($xml->F_Nac as $item1){
$fecha_nac = $item1;
}


list($ape,$nom) = explode(" ",$apellido);

     $apellido = $ape; // Imprime 12
     $nombre = $nom; // Imprime 01
  
/*

echo "<br>";
echo "<br>";


echo $prestador;
echo "<br>";
echo $estado;
echo "<br>";
echo $apellido;
echo "<br>";
echo $nro_docu;
echo "<br>";
echo $sexo;
echo "<br>";
echo $fecha_nac;
echo "<br>";
 */

 
if ($sexo == "F "){
$sexo = "Femenino";
}else{
$sexo = "Masculino";
}


$fecha_nac = date("Y-m-d",strtotime($fecha_nac));

$dia_nac = substr($fecha_nac,8,2);
$mes_nac = substr($fecha_nac,5,2);
$anio_nac = substr($fecha_nac,0,4);

/*
$sql = "INSERT INTO `afiliado_pami` (`afiliado`) VALUES ('$a')";
$result = $db->Execute($sql);
*/

//if ($estado == "S"){


	/*unlink("http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoConsulta.asmx?wsdl");*/
clearstatcache(); 

ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);

?>


<table width="850" border="0" cellspacing="0">
 
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#B8B8B8"><div align="center" class="Estilo43">
        <div align="center" class="Estilo42"><font face="Trebuchet MS">DATOS PERSONALES: <?php echo $estado;?></font></div>
      </div></td>
    </tr>


    <tr align="center" bordercolor="#FFFFFF">
      <td width="157" height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left"><font color="#000000"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td width="100" bgcolor="#EDEDED"><div align="right" class="Estilo38 Estilo48 Estilo49"><font color="#000000">N&deg;: </font></div></td>

      <td width="229" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $NroPlan;?></font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left"><font color="#000000">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)" value="<?php echo $numero_credencial;?>"  size="20" maxlength="20">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38 Estilo48 Estilo49"><font color="#000000">PLAN: </font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $plan_codi;?>
        <input name="plan" type="hidden" value = "<?php echo $plan;?>">


        <input name="activo" type="hidden" value = "<?php echo $estado;?>">
      </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="left" class="Estilo25 Estilo50 Estilo49"><font color="#000000">TIPO AFILIADO </font></div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="select" id="select"onkeypress="return verif_caracter(this,event)">
          <option value="0">NO GRAVADO (OBLIGATORIO) EXENTO</option>
          <option value="1">GRAVADO    (VOLUNTARIO)  CON IVA</option>
        </select>
      </font></strong></font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38 Estilo48 Estilo49"><font color="#000000">COSEGURO:</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $coseguro;?>
        <input name="coseguro" type="hidden" value = "<?php echo $coseguro;?>">
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left"><font color="#000000">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo38 Estilo48 Estilo49">AUTORIZAR</div>        
      <div align="center" class="Estilo36 Estilo48 Estilo49"></div></td>
  </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left"><font color="#000000">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo48 Estilo49">COMUNES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $comunes;?></font></span></td>
  </tr>


    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left"><font color="#000000">TIPO DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
      </font></strong>
      </font></td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo48 Estilo49">ESPECIALES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $especiales;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left"><font color="#000000">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_docu;?>" size="8" maxlength="8">
        <input name="nro_os" type="hidden" value = "<?php echo $nro_os;?>">
      </font></strong><font size="2"><span class="Estilo44">* Obligatorio</span></font> </td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo48 Estilo49">ALTA</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $alta;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left">DOMICILIO</div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo38"></div></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left">LOCALIDAD</div>
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
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38"></div></td>
      <td bgcolor="#EDEDED">&nbsp;</td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left">TEL. FIJO </div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo38 Estilo48 Estilo49">DETALLE DEL PLAN </div></td>
  <tr bordercolor="#FFFFFF">

      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left">CELULAR</div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
      <td colspan="2" rowspan="3" bgcolor="#EDEDED"><div align="center"><font color="#000000"><?php echo $texto;?></font></div></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left">SEXO</div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><?php echo $sexo;?>
          <input name="sexo2" type="hidden" value = "<?php echo $sexo;?>">
      </font><font size="2"><span class="Estilo44"> * Necesario </span></font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25 Estilo50 Estilo49">
        <div align="left">FECHA NACIMIENTO </div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><?php echo $dia_nac;?> / <?php echo $mes_nac;?> / <?php echo $anio_nac;?>
          <input type="hidden" name="dia2" id="dia2"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $dia_nac;?>>
          <input type="hidden" name="mes2" id="mes2"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $mes_nac;?>>
          <input type="hidden" name="anio2" id="anio2"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4" value = <?php echo $anio_nac;?>>
      </font><font size="2"><span class="Estilo44">* Necesario </span></font></td>
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
<?PHP //}?>