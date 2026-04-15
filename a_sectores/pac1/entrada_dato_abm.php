<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
<link href="../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<script src="../../css/js/bootstrap.min.js"></script>
<script src="../../css/js/jquery.min.js"></script>

<script language="javascript">
function on_load()
{
document.getElementById("numero_credencial_lector").focus();
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


function reemplazar(cadena,id)
{
var cadena = cadena.replace(/\W/g,"_");
document.getElementById(id).value=cadena;
}





</script>

<style type="text/css">
<!--
.Estilo25 {font-family: "Trebuchet MS"}
.Estilo26 {
	font-family: "Trebuchet MS";
	font-size: 18px;
	font-weight: bold;
	color: #FFFFFF;
}


.styled-select select {
   background: transparent;
   width: 268px;
   padding: 5px;
   font-size: 16px;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 34px;
   -webkit-appearance: none;
   }


body {
	background-color: #FFFFFF;
}
.Estilo20 {
	color: #FF0000;
	font-style: italic;
	font-family: "Trebuchet MS";
}


.styled-select1 select {
   background: #F2EC68;
color: #000;
      width: 268px;
   padding: 5px;
   font-size: 16px;
font-weight: bold;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 34px;
   -webkit-appearance: none;
   }
.Estilo28 {font-family: "Trebuchet MS"; font-size: 14px; font-weight: bold; color: #990000; }
.Estilo30 {font-size: 14px}
.Estilo31 {font-family: "Trebuchet MS"; font-size: 14px; font-weight: bold; color: #FFFFFF; }
.Estilo33 {font-family: "Trebuchet MS"; font-size: 12px; }


-->
</style>
<BODY onload = "on_load()">

<?php 
include ("../../conexiones/config.inc.php");

 $nro_os = $_REQUEST['nro_os'];


if ($nro_os != ""){
$sql="select * from datos_os where nro_os = $nro_os";
$result = $db->Execute($sql);
$sigla=$result->fields["sigla"];

}


$apellido = strtoupper($_REQUEST['nombre']);


if(is_numeric($nombre)) {
$nro_documento = $nombre;
$nombre = "";
}ELSE
{
$apellido = $apellido;
$nro_documento = "";


}

$sql="select * from pacientes ORDER BY nro_paciente DESC";
$result = $db->Execute($sql);

$nro_paciente=($result->fields["nro_paciente"] + 1);



 $sql = "SELECT count(cuit) as cant_bioq FROM datos_osde";
$result = $db->Execute($sql);

 $cant_bioq=$result->fields["cant_bioq"];



?>
<form action="validar_os.php" method="post">
<table width="840" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td height="37" colspan="3" bgcolor="#666666"><div align="center" class="Estilo26">VALIDACION EN LINEA ASOCIACION BIOQUIMICA - OBRAS SOCIALES </div></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td width="225" height="24" bgcolor="#B8B8B8" class="Estilo25">
      <div align="right" class="Estilo25">
        <div align="left"><font size="2">OBRA SOCIAL </font></div>
    </div></td>
    <td bgcolor="#F0F0F0"><font color="#000000" size="2"><strong><font color="#000000" size="2">
      <?php 
$sql = "SELECT * FROM datos_os where nro_os > 999 order by  sigla, nro_os";
$result = $db->Execute($sql);


if ($nro_os != ""){
echo "<div class='styled-select1'>";
}
ELSE{
echo "<div class='styled-select'>";
}


echo "<select name=nro_os[] size=1 id =nro_os onKeyPress='return verif_caracter(this,event)'>";

if ($nro_os != ""){
	?>          <optgroup label="SELECCIONADA">        
		     <option value="<?php echo $nro_os;?>"><?php echo $sigla;?> (<?php echo $nro_os;?>)</option>
             <?php
}else{
echo"<option value=''>Seleccione OBRA SOCIAL</option>";
}


if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_os=$result->fields["nro_os"];
$sigla=strtoupper($result->fields["sigla"]);
echo"<option value=$nro_os>$sigla ($nro_os)</option>";
$result->MoveNext();
	}
echo"</select>";
echo"</div>";
?>
    </font></strong></font></td>
    <td align="center" valign="middle" bgcolor="#F0F0F0"><div align="center"></div>      <div align="center"><font color="#000000" size="2"><span class="col-xs-6"><font color="#000000" size="2">
    </font></span></font></div>      <div align="center"></div></td>
  </tr>

<?php if ($cant_bioq > 1){
?>
<tr bordercolor="#FFFFFF">
    <td height="24" bgcolor="#B8B8B8" class="Estilo25"><span class="Estilo33">BIOQUIMICO VERIFICADOR  </span></td>
    <td bgcolor="#F0F0F0"> <?php 
$sql = "SELECT * FROM datos_osde order by cod_operacion desc";
$result = $db->Execute($sql);

echo "<div class='styled-select'>";
echo "<select name=cuit[] size=1 id =cuit onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione CUIT</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cuit=$result->fields["cuit"];
$prestador=strtoupper($result->fields["prestador"]);
$sucursal=strtoupper($result->fields["sucursal"]);

echo"<option value=$cuit>$cuit ($prestador) </option>";
$result->MoveNext();
	}
echo"</select>";
echo "<div>";
?></td>
    <td align="center" valign="middle" bgcolor="#F0F0F0"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>

  <?php




}else{
$sql = "SELECT * FROM datos_osde";
$result = $db->Execute($sql);

$cuit=$result->fields["cuit"];
$prestador=$result->fields["prestador"];
?>
<tr bordercolor="#FFFFFF">
    <td height="24" bgcolor="#B8B8B8" class="Estilo25"><span class="Estilo33">BIOQUIMICO VERIFICADOR </span></td>
    <td bgcolor="#F0F0F0"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2"> <input name="cuit[]" type="hidden"   value = "<?php echo $cuit;?>" > &nbsp;&nbsp;<?php echo $prestador;?> - <?php echo $cuit;?></font></strong>
    </font></strong></font></td>
    <td align="center" valign="middle" bgcolor="#F0F0F0"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <?php 


}


?>


  <tr bordercolor="#FFFFFF">
    <td height="24" bgcolor="#B8B8B8" class="Estilo25"><span class="Estilo25"><font color="#000000" size="2">N&ordm; AFILIADO </font></span></td>
    <td bgcolor="#F0F0F0"><font color="#000000" size="2">
	 <div class="col-xs-6">
      <input name="numero_credencial_lector" type="text" class="style-2 form-control" id="numero_credencial_lector"  size="38">
      <font color="#000000" size="2">      </font></div>
    </font></td>
    <td align="center" valign="middle" bgcolor="#F0F0F0"><font color="#000000" size="2"><span class="col-xs-6"><font color="#000000" size="2">
      <input name="Submit" type="Submit" class="Estilo28" id ="GUARDAR" value="BUSCAR Y CONTROLAR AFILIADO">
    </font></span></font></td>
  </tr>
  <!-- <tr bordercolor="#FFFFFF">
    <td height="24" bgcolor="#B8B8B8"><font color="#000000" size="2">BANDA MAGNETICA </font></td>
    <td colspan="2" bgcolor="#F0F0F0"><font color="#000000" size="2">

<input type="text" id="track" name = "track" size="100" onKeyPress="if ((event.keyCode ? event.keyCode : event.which)==13) {reemplazar(this.value,id);}"> 

    </font></td>
  </tr> -->
  <tr>
    <td height="0"></td>
    <td width="313"></td>
    <td width="296"></td>
  </tr>
</table>
<table width="818" border="0" cellpadding="0" cellspacing="0">
  
  <tr>
    <td colspan="7" bgcolor="#006600"><div align="center" class="Estilo26"> 
      <div align="left" class="Estilo30">AUTORIZACION EN LINEA </div>
    </div></td>
  </tr>
  
  <tr>
    <td valign="middle" bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=1041"><img  src="os/osde.jpg"  alt="OSDE" width="105" height="76" class="hover_os" ></a></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=5080"><img  src="os/sancor.jpg"  alt="sancor" width="124" height="80" class="hover_os"></a></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=5396"><img  src="os/boreal.jpg"  alt="HOPE" width="101" height="57" class="hover_os" /></a></div></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="6" bgcolor="#990000"><div align="left"><span class="Estilo31"> CONTROL DE AFILIADOS </span></div></td>
  </tr>
  
  <tr>
   <td width="20%" bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=1041"><a href="entrada_dato_abm.php?nro_os=2042"><img class="hover_os"  src="os/osapm.png"  alt="AAPM" width="61" ></a></div></td>
    <td width="10%" bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=5171"><img class="hover_os"  src="os/ospe.jpg" width="68"  alt="OSPE"></a></div></td>
    <td width="11%" bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=3771"><img class="hover_os"  src="os/osdipp.png"  alt="OSDIP"></a></div></td>
    <td width="15%" bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=2462"><img class="hover_os"  src="os/servesalud.jpg" width="128"  alt="SERVESALUD"></a></div></td>
    <td width="15%" bgcolor="#FFFFFF"><div align="right"><a href="entrada_dato_abm.php?nro_os=5291"><img class="hover_os"  src="os/hope.png" width="100"  alt="HOPE"></a></div></td>
    <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center"></div></td>
    <td bgcolor="#FFFFFF"><div align="center"></div></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td colspan="6" bgcolor="#FFFF00"><div align="left"><span class="Estilo28">PROXIMAMENTE...</span></div></td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=5185"><img class="hover_os"  src="os/medimas.jpg" width="160"  alt="MEDIMAS"></div></td>
   
	<td bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=5073"><img class="hover_os"  src="os/pami.jpg"   alt="PAMI" width="100"  ></div></td>
   
  
	<td bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=4723"><img  src="os/swiss.jpg"  alt="SWISS MEDICAL" width="94" height="88" class="hover_os" /></a></div></td>
	<td bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=5192"><img  src="os/aca.jpg"  alt="ACA" width="101" height="69" class="hover_os" /></a></div></td>
	<td bgcolor="#FFFFFF"><div align="center"><a href="entrada_dato_abm.php?nro_os=5240"><img  src="os/scis.jpg"  alt="SCIS" width="83" height="71" class="hover_os" /></a></div></td>
	<td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="6" bgcolor="#FFFFFF"><div align="left"><span class="Estilo20">Nota: Las obras sociales que tienen el logo son las que estan habilitadas para controlar afiliados. <br>Click sobre cada logo para controlar afiliado. <br>Click
	OSDE = Prontopago</span></div></td>
  </tr>
</table>
<br><br><br><br>

<table width="850" border="0" cellpadding="0">
  <tr>
    <th colspan="2" scope="col">PACIENTES DE PRUEBA VALIDACION EN LINEA </th>
  </tr>
  <tr>
    <td width="415" bgcolor="#F0F0F0"><div align="center">OBRA SOCIAL </div></td>
    <td width="429" bgcolor="#F0F0F0"><div align="center"> N&deg; AFILIADO </div></td>
  </tr>
  <tr>
    <td><div align="center">OSDE</div></td>
    <td><div align="center">61569197701 - 61805245201</div></td>
  </tr>
  <tr>
    <td><div align="center">OSAPM</div></td>
    <td><div align="center">1800794200 - 1609301</div></td>
  </tr>
  <tr>
    <td><div align="center">SERVESALUD</div></td>
    <td><div align="center">4078801 - 850901 - 2293510</div></td>
  </tr>
  <tr>
    <td><div align="center">OSPE</div></td>
    <td><div align="center">2014378066000</div></td>
  </tr>
  <tr>
    <td><div align="center">OSDIPP</div></td>
    <td><div align="center">3766151202 - 323255700 - 2247601</div></td>
  </tr>
  <tr>
    <td><div align="center">MEDIMAS</div></td>
    <td><div align="center">1711864500</div></td>
  </tr>
  <tr>
    <td><div align="center">PAMI</div></td>
    <td><div align="center">15064203570000 - 15066438310900</div></td>
  </tr>
  <tr>
    <td><div align="center">SANCOR SALUD </div></td>
    <td><div align="center">52115501</div></td>
  </tr>
  <tr>
    <td><div align="center">HOPE</div></td>
    <td><div align="center">145720446 - 132315973</div></td>
  </tr>
    <tr>
    <td><div align="center">BOREAL</div></td>
    <td><div align="center"> <strong>2956248800 </strong> </div></td>
  </tr>


  <tr>
    <td><div align="center">SCIS</div></td>
    <td><div align="center"> 0710008265702 </div></td>
  </tr>
  <tr>
    <td><div align="center">SWISS</div></td>
    <td><div align="center"> <strong>7180171000054 </strong> </div></td>
  </tr>

  
  <tr>
    <td><div align="center">ACA</div></td>
    <td><div align="center"> 0071 599988 00 50, &oacute; 0071 599989 00 01 &oacute; 0071 599990 00 21</div></td>
  </tr>
</table>
