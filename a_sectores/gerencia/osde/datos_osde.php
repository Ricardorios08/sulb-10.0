
<script language="javascript">
function on_load()
{
document.getElementById("cuit").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "denominacion1":
				document.getElementById("Buscar").focus();
				break;

		case "denominacion2":
				document.getElementById("Buscar").focus();
				break;

						case "denominacion3":
				document.getElementById("Buscar").focus();
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
.Estilo5 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo6 {
	font-family: "Trebuchet MS";
	font-size: 14px;
}
-->
</style>
<BODY onload = "on_load()">

<?php 
include ("../../../conexiones/config.inc.php");

$usuario = $_REQUEST['usuario'];


  $cuit1;


?>
<form action="guardar.php" method="post">
<table width="850" border="0" cellpadding="0">
  <tr>
    <td><table width="394" border="0" align="center">
      <!--DWLayoutTable-->
      <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
        <td height="26" colspan="3" bgcolor="#F0F0F0"><div align="center" class="Estilo6">DATOS ABM </div></td>
      </tr>
      <tr align="center" bordercolor="#FFFFFF">
        <td height="24" colspan="2"><span class="Estilo5">CUIT</span></td>
        <td width="180"><div align="left"><font color="#000000" size="2">
            <input name="cuit" type="text" id="cuit"  value=""  size="30">
        </font></div></td>
      </tr>
      <tr align="center" bordercolor="#FFFFFF">
        <td height="24" colspan="2"><span class="Estilo5">SUCURSAL</span></td>
        <td><div align="left"><font color="#000000" size="2">
            <input name="sucursal" type="text" id="sucursal"  value="<?php echo $sucursal;?>"  size="6" maxlength="6">
        </font></div></td>
      </tr>
      <tr align="center" bordercolor="#FFFFFF">
        <td height="24" colspan="2"><span class="Estilo5">CONTRASE&Ntilde;A</span></td>
        <td><div align="left"><font color="#000000" size="2">
            <input name="contra" type="password" id="contra"  size="10" >
        </font></div></td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td height="26" colspan="3" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>
                <input type = "hidden" name = "usuario" value="<?php echo $usuario;?>">
                <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
        </div></td>
    </table></td>
    <td><table width="395" border="0" align="center">
      <!--DWLayoutTable-->
      <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
        <td height="26" colspan="3" bgcolor="#F0F0F0"><div align="center" class="Estilo6">BUSCAR EN ABM  </div></td>
      </tr>
      <tr align="center" bordercolor="#FFFFFF">
        <td height="24" colspan="2"><span class="Estilo5">DENOMINACION</span></td>
        <td width="184"><div align="left"><font color="#000000" size="2">
            <input name="denominacion1" type="text" id="denominacion1"  size="30" onKeyPress='return verif_caracter(this,event)'>
        </font></div></td>
      </tr>
      <tr align="center" bordercolor="#FFFFFF">
        <td height="24" colspan="2"><span class="Estilo5">CUIT</span></td>
        <td><div align="left"><font color="#000000" size="2">
          <input name="denominacion2" type="text" id="denominacion2" size="30" onKeyPress='return verif_caracter(this,event)'>
        </font></div></td>
      </tr>
      <tr align="center" bordercolor="#FFFFFF">
        <td height="24" colspan="2"><span class="Estilo5">CUENTA</span></td>
        <td><div align="left"><font color="#000000" size="2">
          <input name="denominacion3" type="text" id="denominacion3"  size="30" onKeyPress='return verif_caracter(this,event)'>
        </font></div></td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td height="26" colspan="3" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>
                <input type = "hidden" name = "usuario2" value="<?php echo $usuario;?>">
                <input type="Submit" name="Submit" id ="Buscar" value="BUSCAR">
        </div></td>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <table width="800" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="378" bgcolor="#6699FF"><div align="center" class="Estilo5">PRESTADOR</div></td>
          <td width="135" bgcolor="#6699FF"><div align="center" class="Estilo5">CUIT</div></td>
          <td width="105" bgcolor="#6699FF"><div align="center"><span class="Estilo5">CUENTA ABM </span></div></td>
          <td width="119" bgcolor="#6699FF"><div align="center" class="Estilo5">SUCURSAL</div></td>
          <td width="47" bgcolor="#6699FF"><div align="center" class="Estilo5">MOD</div></td>
          <td width="52" bgcolor="#6699FF"><div align="center" class="Estilo5">ELIMINAR</div></td>
        </tr>
        <?php

 $sql="select * from datos_osde order by cod_operacion desc";
 $result = $db->Execute($sql);

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_operacion=strtoupper($result->fields["cod_operacion"]);
$prestador=strtoupper($result->fields["prestador"]);
$cuit=strtoupper($result->fields["cuit"]);
$sucursal=strtoupper($result->fields["sucursal"]);
$cuenta_abm=strtoupper($result->fields["cuenta_abm"]);

 ?>
        <tr>
          <td><span class="Estilo5"><?php echo $prestador;?></span></td>
          <td><div align="center" class="Estilo5"><?php echo $cuit;?></div></td>
          <td><div align="center" class="Estilo5"><?php echo $cuenta_abm;?></div></td>
          <td><div align="center" class="Estilo5"><?php echo $sucursal;?></div></td>
          <td><div align="center"><a href="moldificar_osde.php?cod_operacion=<?php print("$cod_operacion");?>&&usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Modificar?');"><IMG SRC="../../../imagenes/office//005.ico" alt="Borrar" border = "0"></a></div></td>
          <td><div align="center"><a href="eliminar_osde.php?cod_operacion=<?php print("$cod_operacion");?>&&usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar?');"><IMG SRC="../../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
        </tr>
        <?php


$result->MoveNext();
		}

?>
      </table>
    </div></td>
  </tr>
</table>






