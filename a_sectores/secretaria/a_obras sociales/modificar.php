<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />
<?php 

include ("../../../conexiones/config.inc.php");

$a = $_GET['id'];

$sql="select * from datos_os where nro_os like $a";
$result = $db->Execute($sql);

$nro_os=strtoupper($result->fields["nro_os"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$sigla=strtoupper($result->fields["sigla"]);
 $inscripcion=strtoupper($result->fields["inscripcion"]);

switch ($inscripcion){
case "1":{
	$sit_iva = "RI";
	BREAK;
}
case "3":{
	$sit_iva = "MONOTRIBUTISTA";
	BREAK;
}
case "4":{
	$sit_iva = "EXENTO";
	BREAK;
}


}

$cuit=strtoupper($result->fields["cuit"]);
$domicilio_l=strtoupper($result->fields["domicilio_l"]);
$cod_area_l=strtoupper($result->fields["cod_area_l"]);
$telefono_l=strtoupper($result->fields["telefono_l"]);
$telefax_l=strtoupper($result->fields["telefax_l"]);
$email_l=strtoupper($result->fields["email_l"]);

$domicilio_n=strtoupper($result->fields["domicilio_n"]);
$cod_area_n=strtoupper($result->fields["cod_area_n"]);
$telefono_n=strtoupper($result->fields["telefono_n"]);
$telefax_n=strtoupper($result->fields["telefax_n"]);
$email_n=strtoupper($result->fields["email_n"]);

$nro_prestador=strtoupper($result->fields["nro_prestador"]);
$contacto=strtoupper($result->fields["contacto"]);
$nivel=strtoupper($result->fields["nivel"]);
$cargo=strtoupper($result->fields["cargo"]);
$webservice=strtoupper($result->fields["webservice"]);
$nro_os_facturar=strtoupper($result->fields["nro_os_facturar"]);


if ($webservice == ""){
$webservice = "NO";
}

?>

<style type="text/css">
<!--
.Estilo1 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
-->
</style>
<BODY background="../../IMAGENES/IZQUIERDA.PNG">
<form action="modificar_os.php" method="post">
  <table width="750" border="0">
    <tr bordercolor="#FFFFCC" bgcolor="#E6E6E6"> 
      <td colspan="2"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong> 
      <img src="../../../imagenes/obras.jpg" width="846" height="35"></strong></font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td width="48%"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Numero</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input type="text" name="nro_os" id="nro_os" readonly = "true" value ="<?php print("$nro_os");?>" onKeyPress="return verif_caracter(this,event)" size = "8" >
      </strong> </font>        <div align="right"></div>        </td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="denominacion" id="denominacion" value ="<?php print("$denominacion");?>"
onKeyPress="return verif_caracter(this,event)" size = "30">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Sigla</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input type="text" name="sigla" id="sigla" value ="<?php print("$sigla");?>" onKeyPress="return verif_caracter(this,event)" size = "12">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Inscripcion </font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <select name="inscripcion[]" id="select"  onKeyPress="return verif_caracter(this,event)">

  <option value selected= "<?php "$inscripcion";?>"> <?php print("$sit_iva");?></option>
          <option value="1">R.I</option>
          <option value ="2">R.N.I</option>
          <option value ="3">MONOTRIBUTISTA</option>
		  <option value ="4">EXENTO</option>
        </select>

      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">C.U.I.T</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="cuit" id="cuit" maxlength ="14" value ="<?php print("$cuit");?>"
 onKeyPress="return verif_caracter(this,event)" size = "13"> 
      </strong> </font>        <div align="right"></div>        </td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Domicilio</font></div></td>
      <td width="52%" bordercolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="domicilio_l" id="domicilio_l"value ="<?php print("$domicilio_l");?>"
 onKeyPress="return verif_caracter(this,event)" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Telefono </font></div></td>
      <td bordercolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="cod_area_l" id="cod_area_l" value ="<?php print("$cod_area_l");?>"
 onKeyPress="return verif_caracter(this,event)" size = "7" maxlength = "5">
        <input type="text" name="telefono_l" id="telefono_l" value ="<?php print("$telefono_l");?>"
 onKeyPress="return verif_caracter(this,event)" size = "9" maxlength = "7">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Tel-Fax</font></div></td>
      <td bordercolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="telefax_l" id="telefax_l" value="<?php print("$telefax_l");?>"
 onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td><div align="right"></div>        <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">E-mail &nbsp;</font></div></td>
      <td bordercolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="email_l" id="email_l" value ="<?php print("$email_l");?>"
 onKeyPress="return verif_caracter(this,event)" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td width="48%"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Id prestador</font></div></td>
      <td width="52%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="nro_prestador" id="nro_prestador" value ="<?php print("$nro_prestador");?>"
 onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Contacto</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="contacto" id="contacto" value ="<?php print("$contacto");?>" onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nivel </font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="nivel" id="nivel" value ="<?php print("$nivel");?>"
 onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cargo</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input type="text" name="cargo" id="cargo" value ="<?php print("$cargo");?>"
 onKeyPress="return verif_caracter(this,event)" size = "15">
      </strong></font></td>
    </tr>


<?PHP if ($webservice == "SI"){?>
    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Webservice</font></div></td>
      <td><label>
        <span class="Estilo1">SI
        <input name="webservice" type="radio" value="SI" checked>
        NO        </span>
        <input name="webservice" type="radio" value="NO">
      </label></td>
    </tr>
<?PHP }ELSE{?>
    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Webservice</font></div></td>
      <td><label>
        <span class="Estilo1">SI
        <input name="webservice" type="radio" value="SI">
        NO        </span>
        <input name="webservice" type="radio" value="NO" checked>
      </label></td>
    </tr>


<?php } ?>


    <tr bordercolor="#FFFFFF">
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Facturar con </font></div></td>
      <td><label>
        <input name="nro_os_facturar" type="text" id="nro_os_facturar" value="<?php print("$nro_os_facturar");?>" size="4" maxlength="4">
      </label></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td colspan="2"><div align="center"><strong> 
          <input type="submit" name="Submit" value="Guardar Modificaci&oacute;n de Obra Social">
      </strong></div></td>
    </tr>
  </table>

</form>
</body>