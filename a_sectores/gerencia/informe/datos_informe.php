<link href="../../../css/fondjjo.css" rel="stylesheet" type="text/css" />

<script language="javascript">
function on_load()
{
document.getElementById("nro_paciente").focus();
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
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo3 {font-size: 12px}
-->
</style>
<BODY onload = "on_load()">

<?php 
include ("../../../conexiones/config.inc.php");

$usuario = $_REQUEST['usuario'];

 
$sql="select * from informe where id = $usuario";
 
$result = $db->Execute($sql);

$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);
$modelo=strtoupper($result->fields["modelo"]);


?>
<form action="guardar.php" method="post">
<table width="850" border="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="26" colspan="2"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><img src="../../../imagenes/datos_informe.jpg" width="846" height="35"></font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="388" height="24">
      <div align="right" class="Estilo1"><font color="#000000" size="2"><font color="#000000">Desea Imprimir la Caratula </font>  </font></div></td>
      <td width="454">
	  
<?php  if ($caratula == "SI"){?>
<div align="left" class="Estilo2"><input name="caratula" type="radio" value="SI" checked>SI
<input name="caratula" type="radio" value="NO">NO</div>
<?php }else{?>
<div align="left" class="Estilo2"><input name="caratula" type="radio" value="SI">SI
<input name="caratula" type="radio" value="NO" checked>NO</div>
<?php }?>	  </td>
  </tr>
   
	
	
	
	

  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo1"><font color="#000000" size="2">Desea Imprimir el final con Fecha y Firma </font></div></td>
      <td>
	  
	  
	  

	  <?php  if ($firma == "SI"){?>
<div align="left" class="Estilo2"><input name="firma" type="radio" value="SI" checked>SI
<input name="firma" type="radio" value="NO">NO</div>
<?php }else{?>
<div align="left" class="Estilo2"><input name="firma" type="radio" value="SI">SI
<input name="firma" type="radio" value="NO" checked>NO</div>
<?php }?>	  </td>
	  <tr bordercolor="#FFFFFF">
	    <td height="26" colspan="2" bgcolor="#F0F0F0"><div align="center" class="Estilo3">
	      <div align="center"><span class="Estilo1"><font color="#000000"> Informes </font></span></div>
	    </div></td>
      <tr bordercolor="#FFFFFF">
        <td height="26"><div align="center" class="Estilo3">
          <div align="right"><span class="Estilo1">Renglon1</span></div>
        </div></td>
        <td height="26"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <tr bordercolor="#FFFFFF">
        <td height="26"><div align="right">
          <div align="center" class="Estilo3">
            <div align="right"><span class="Estilo1">Renglon2</span></div>
          </div>
        </div></td>
        <td height="26"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <tr bordercolor="#FFFFFF">
        <td height="26"><div align="center" class="Estilo3">
          <div align="right"><span class="Estilo1">Renglon3</span></div>
        </div></td>
        <td height="26"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <tr bordercolor="#FFFFFF">
        <td height="26"><div align="center" class="Estilo3">
          <div align="right"><span class="Estilo1">Direcci&oacute;n:</span></div>
        </div></td>
        <td height="26"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <tr bordercolor="#FFFFFF">
        <td height="26" colspan="2" bgcolor="#F0F0F0">          <div align="center" class="Estilo3">
          <div align="center"><span class="Estilo1">Ubicaci&oacute;n del logo: </span></div>
        </div></td>
      <tr bordercolor="#FFFFFF">
        <td height="26"><div align="center" class="Estilo3">
          <div align="right"><span class="Estilo1">Arriba:</span></div>
        </div></td>
        <td height="26"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <tr bordercolor="#FFFFFF">
        <td height="26"><div align="center" class="Estilo3">
          <div align="right"><span class="Estilo1">Derecha:</span></div>
        </div></td>
        <td height="26"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <tr bordercolor="#FFFFFF">
        <td height="26"><div align="center" class="Estilo3">
          <div align="right"><span class="Estilo1">Tama&ntilde;o:</span></div>
        </div></td>
        <td height="26"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <tr bordercolor="#FFFFFF">

    <td height="26" colspan="2" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>        
	  <input type="hidden" name="usuario"  value="<?php echo $usuario;?>">
	  <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
    </div></td>
</table>
