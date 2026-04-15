<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="../../menus.css" />
<title>Men? Principal (ADMINISTRADOR)</title>
<style type="text/css">
<!--
body {
	background-image: url(../../imagenes/celeste_nuevo_sulb_fondo.jpg);
	background-repeat: repeat;
}
.Estilo65 {
	font-family: "Trebuchet MS";
	font-size: 12px;
	font-weight: bold;
}
.Estilo72 {font-family: "Trebuchet MS"}
.Estilo73 {font-size: 16px; }
.Estilo74 {
	font-size: 36px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
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


?>


  <table width="1016" border="0" align="center" cellpadding="0" cellspacing="0">
            
            <tr>
              <td width="348">&nbsp;</td>
              <td width="348"><div align="center"></div></td>
              <td width="320"><div align="center"></div></td>
              <td width="320">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="4"><div align="center" class="Estilo74">INFORMES PARA <?PHP echo $nombre_os;?></div></td>
            </tr>
            <tr>
              <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
              <td rowspan="4"><img src="../..//logos/labfast.jpg" width="236" height="78" alt="b" /></td>
              <td><div align="center" class="Estilo73"><span class="Estilo72">Ingrese Paciente </span></div></td>
              <td>
                <div align="left">
                  <input type = "text" name = "palabra" size = "27"  id = "palabra" / value = "<?php echo $palabra?>" />
                  <?php 









 $sql="select * from datos_principales where id = $usuario";
$result = $db->Execute($sql);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);


$sql = "SELECT * FROM archivos";
$result = $db->Execute($sql);
$id=$result->fields["id"];

$sql="select * from informe where id = $usuario";
 $result = $db->Execute($sql);

$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);
$modelo=strtoupper($result->fields["modelo"]);

$modelo = "A";

$dia = date ("d");
$mes = date("m");
$anio = date("y");


?>
                </div></td>
              <td rowspan="4"><div align="right"><img src="../..//imagenes/sulb1.png" width="197" height="80" alt="a" /></div></td>
            </tr>
            <tr>
              <td><div align="center" class="Estilo73"><span class="Estilo72">Tipo Planilla</span></div></td>
              <td><span class="Estilo65">
                <select name="planillas[]">
                    <option value="1" selected="selected">Busqueda Diaria</option>
                   
                  </select>
              </span></td>
            </tr>
          <tr>
            <td><div align="center" class="Estilo73"><span class="Estilo72">Desde</span></div></td>
            <td><input name = "dia_d" type = "text" id="dia_d" size = "2" maxlength="2"   value  = "<?php echo $dia;?>" />
/
  <input name = "mes_d" type = "text" id="mes_d" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
20
<input name = "anio_d" type = "text" id="anio_d" size = "2" maxlength="2" value  = "<?php echo $anio;?>" /></td>
          </tr>
          <tr>
            <td><div align="center" class="Estilo73"><span class="Estilo72">Hasta</span></div></td>
            <td><input name = "dia_h" type = "text" id="dia_h" size = "2" maxlength="2" value  = "<?php echo $dia;?>" />
/
  <input name = "mes_h" type = "text" id="mes_h" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
20
<input name = "anio_h" type = "text" id="anio_h" size = "2" maxlength="2" value  = "<?php echo $anio;?>" />
<input type = "hidden" name = "usuario" value="<?php echo $usuario;?>" /></td>
          </tr>
        <tr>
          <td colspan="4" bordercolor="#C0C0C0" bgcolor="#C0C0C0"><div align="center">
            <input type = "submit" name = "ok2" value = "BUSCAR"/>
          </div></td>
        </tr>
  </table>	




</FORM>

 

</form>
</body>
</html>
