<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="../../menus.css" />
<title>Men? Principal (ADMINISTRADOR)</title>
<style type="text/css">
<!--
body {
	background-image: url(imagenes/escamas.jpg);
	background-repeat: repeat;
}
.Estilo65 {
	font-family: "Trebuchet MS";
	font-size: 12px;
	font-weight: bold;
}
.Estilo72 {font-family: "Trebuchet MS"}
.Estilo74 {
	font-size: 36px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo75 {font-size: 14px}
.Estilo76 {color: #FFFFFF}
.Estilo78 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>


<script language="javascript">
<!--




function on_load()
{
document.getElementById("palabra").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "usuario5":
				document.getElementById("password3").focus();
				
				break;
				case "password3":
				document.getElementById("entrar").focus();
				break;
			
		}
		return false;
	}
	return true;
}




</script>



</head>


<BODY onLoad="on_load()" > 


<form action="../../a_sectores/pacientes/buscar_paciente_idema.php?nro_os=<?php print("$nro_os");?>" method="post" target ="central">

<?php

include ("../../conexiones/config.inc.php");
$usuario = $_REQUEST['usuario'];
$CARATULA1=$_REQUEST["CARATULA1"];
$palabra=$_REQUEST["palabra"];
$lote=$_REQUEST["lote"];
$nro_os=$_REQUEST["nro_os"];

if ($nro_os == 2){
	$nombre_os = "IDEMA";
}

if ($nro_os == 3){
	$nombre_os = "SAN ANDRES";
}

 $sql="select * from usuario where id = $usuario";
$result = $db->Execute($sql);

$rol=$result->fields["rol"];
$nombre=strtoupper($result->fields["usuario"]);
$contrasena=$result->fields["contrasena"];
 $usuario1 = $nombre." / ".$rol;

$dia = date("d");
$mes = date("m");
$anio = date("y");



?>


  <table width="1016" border="0" align="center" cellpadding="0" cellspacing="0">
            
            <tr>
              <td width="272"><div align="center" class="Estilo72"><em><strong>LABORATORIO DR GUSTAVO YAPUR
              </strong></em></div>                <div align="center"></div></td>
              <td colspan="2"><div align="center"></div></td>
            </tr>
            <tr bgcolor="#003366">
              <td colspan="3"><div align="center" class="Estilo74 Estilo76">INFORMES PARA  <?PHP echo strtoupper($lote);?></div></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
          <tr>
            <td><div align="center" class="Estilo78">Desde</div></td>
            <td width="239"><span class="Estilo78">
      <input name = "dia_d" type = "text" id="dia_d" size = "2" maxlength="2"   value  = "<?php echo $dia;?>" />
  /
    <input name = "mes_d" type = "text" id="mes_d" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
  20
  <input name = "anio_d" type = "text" id="anio_d" size = "2" maxlength="2" value  = "<?php echo $anio;?>" />
            </span></td>
            <td width="505" rowspan="2">
              
              <div align="center">
                <input name="palabra" type="text" id="palabra" accesskey="b" size="50" />
                </div>
                  <div align="center">
                    <input name = "ok2" type = "submit" class="Estilo74" value = "BUSCAR"/>
                  </div></td></tr>
          <tr>
            <td><div align="center" class="Estilo78">Hasta</div></td>
            <td><span class="Estilo78">
              <input name = "dia_h" type = "text" id="dia_h2" size = "2" maxlength="2" value  = "<?php echo $dia;?>" />
/
<input name = "mes_h" type = "text" id="mes_h2" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
20
<input name = "anio_h" type = "text" id="anio_h2" size = "2" maxlength="2" value  = "<?php echo $anio;?>" />
<input type = "hidden" name = "usuario" value="<?php echo $usuario;?>" />
<input type = "hidden" name = "lote" value="<?php echo $lote;?>" />
            </span></td>
          </tr>
  </table>	




</FORM>

 

</form>
</body>
</html>
