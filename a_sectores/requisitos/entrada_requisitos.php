<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function on_load()
{
document.getElementById("nro_os").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_os":
				document.getElementById("denominacion").focus();
				
				break;
				case "denominacion":
				document.getElementById("sigla").focus();
				break;
				case "sigla":
				document.getElementById("inscripcion").focus();
				break;
				case "inscripcion":
				document.getElementById("cuit").focus();
				break;
				case "cuit":
				document.getElementById("domicilio_l").focus();
				break;
				case "domicilio_l":
				document.getElementById("telefono_1").focus();
				break;
				case "telefono_1":
				document.getElementById("telefax_l").focus();
				break;
				case "telefax_l":
				document.getElementById("email_l").focus();
				break;
				case "email_l":
				document.getElementById("domicilio_n").focus();
				break;
				case "domicilio_n":
				document.getElementById("telefono_n").focus();
				break;

				case "telefono_n":
				document.getElementById("telefax_n").focus();
				break;
				case "telefax_n":
				document.getElementById("email_n").focus();
				break;
				case "email_n":
				document.getElementById("nro_prestador").focus();
				break;
				case "nro_prestador":
				document.getElementById("contacto").focus();
				break;
				case "contacto":
				document.getElementById("nivel").focus();
				break;
				case "nivel":
				document.getElementById("cargo").focus();
				break;
				
				
				
		}
		return false;
	}
	return true;
}


</script>

<?php 

$nro_os = $_REQUEST['nro_os'];
$sigla= $_REQUEST['sigla'];


include ("../../conexiones/config.inc.php");
$sql1="select * from requisitos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);
$requisitios=$result1->fields["requisitios"];

$requisitos=$result1->fields["requisitos"];
$version=$result1->fields["version"];
$suspendido=$result1->fields["suspendido"];
$vigencia=$result1->fields["vigencia"];

$planes=$result1->fields["planes"];
$diagnostico=$result1->fields["diagnostico"];
$info_planes=$result1->fields["info_planes"];
$planes_rechazados=$result1->fields["planes_rechazados"];
$motivo_rechazo=$result1->fields["motivo_rechazo"];




$sql1="select * from arancel where nro_os = $nro_os";
$result1 = $db->Execute($sql1);
$comunes=$result1->fields["uh"];
$especiales=$result1->fields["uh_especiales"];
$alta=$result1->fields["uh_alta"];


?>


<BODY onload = "on_load()">

<BODY background="../../IMAGENES/IZQUIERDA.PNG">
<form action="mod_requisito.php" method="post" >
  <table width="850" border="0" cellspacing="0">
    <tr bordercolor="#FFFFCC" bgcolor="#E6E6E6"> 
      <td colspan="2"><div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">REQUISITOS OBRAS SOCIALES </font></strong></div></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td width="17%" bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Numero</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
       <?php print("$id");?>
      </strong> <?php print("$id");?></font>        <div align="right"></div>        </td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php print("$denominacion");?> </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Sigla</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php print("$sigla");?> </strong></font></td>
    </tr>

    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Mensaje </font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="requisitos" cols="100" rows="6" id="requisitos" onKeyPress="return verif_caracter(this,event)"><?php echo $requisitos;?></textarea>
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Version</font></div></td>
      <td bgcolor="#F0F0F0"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="version" type="text" id="version" onKeyPress="return verif_caracter(this,event)" value="<?php echo $version;?>" size = "35">
      </strong></font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Suspendido</font></div></td>
      <td width="83%" bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="suspendido" type="text" id="suspendido" onKeyPress="return verif_caracter(this,event)" value="<?php echo $suspendido;?>" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Vigencia</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="vigencia" type="text" id="vigencia" onKeyPress="return verif_caracter(this,event)" value="<?php echo $vigencia;?>" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Comunes</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="comunes" type="text" id="comunes" onKeyPress="return verif_caracter(this,event)" value="<?php echo $comunes;?>" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Especiales</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="especiales" type="text" id="especiales" onKeyPress="return verif_caracter(this,event)" value="<?php echo $especiales;?>" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Alta</font></div></td>
      <td bordercolor="#FFFFCC" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="alta" type="text" id="alta" onKeyPress="return verif_caracter(this,event)" value="<?php echo $alta;?>" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td width="17%" bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Antibiograma</font></div></td>
      <td width="83%" bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="antibiograma" type="text" id="antibiograma" onKeyPress="return verif_caracter(this,event)" value="<?php echo $antibiograma;?>" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Diagnostico</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="diagnostico" type="text" id="diagnostico" onKeyPress="return verif_caracter(this,event)" value="<?php echo $diagnostico;?>" size = "35">
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">planes</font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="planes" cols="100" rows="3" id="planes" onKeyPress="return verif_caracter(this,event)"><?php echo $planes;?></textarea>
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Info Planes </font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="info_planes" cols="100" id="cargo" onKeyPress="return verif_caracter(this,event)"><?php echo $info_palnes;?></textarea>
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Planes Rechazados </font></div></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="planes_rechazados" cols="100" rows="3" id="planes_rechazados" onKeyPress="return verif_caracter(this,event)"><?php echo $planes_rechazados;?></textarea>
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#B8B8B8"><font size="2" face="Arial, Helvetica, sans-serif">Motivo Rechazo </font></td>
      <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="motivo_rechazo" cols="100" rows="3" id="motivo_rechazo" onKeyPress="return verif_caracter(this,event)"><?php echo $motivo_rechazo;?></textarea>
      </strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF"> 
      <td colspan="2" bgcolor="#B8B8B8"><div align="center"><strong> 


	   <input name="nro_os" type="hidden" value="<?php echo $nro_os;?>">


          <input type="submit" name="Submit" value="MODIFICAR">
      </strong></div></td>
    </tr>
  </table>

</form>
</body>