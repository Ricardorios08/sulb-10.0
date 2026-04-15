<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="../../menus_validacion.css" />
	<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
		<link href="../../css/css/bootstrap.css" rel="stylesheet" type="text/css" />
<title>Men? Principal (ADMINISTRADOR)</title>
<style type="text/css">
<!--
body {
	background-image: url(../../imagenes/cuadrado.jpg);
	background-repeat: repeat-x;
background-color: #B9D1F5;
}
.Estilo65 {
	font-family: "Trebuchet MS";
	font-size: 12px;
	font-weight: bold;
}
.Estilo66 {
	font-family: "Trebuchet MS";
	font-size: 12px;
	color: #FFFFFF;
}
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo67 {color: #FFFFFF}
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


<BODY onLoad="on_load()" class="degrade"> 


<form action="../../a_sectores/pacientes/buscar_paciente_validar.php" method="post" target ="central">

<?php

include ("../../conexiones/config.inc.php");
$usuario = $_REQUEST['usuario'];
$CARATULA1=$_REQUEST["CARATULA1"];
$palabra=$_REQUEST["palabra"];


 $sql="select * from usuario where id = $usuario";
$result = $db->Execute($sql);

$rol=$result->fields["rol"];
$nombre=strtoupper($result->fields["usuario"]);
$contrasena=$result->fields["contrasena"];
 $usuario1 = $nombre." / ".$rol;


?>


<div id="menuh">

		<ul>
			 <li><a href="../../a_sectores/menu_pacientes_validar.php?usuario=<?php print("$usuario");?>" target = "izquierda">PACIENTES</a></li> 
			<li><a href="../../a_sectores/validacion/menu_practicas_validacion.php?usuario=<?php print("$usuario");?>" target = "izquierda">PRACTICAS</a></li>	
						<!-- <li><a href="../../a_sectores/orden_rapida/select_dependientes.php?usuario=<?php print("$usuario");?>" target = "izquierda">ORDEN RAPIDA</a></li> -->	
			<!-- <li><a href="../../a_sectores/auditoria/menu_practicas.php?usuario=<?php print("$usuario");?>" target = "izquierda">PRACTICAS</a></li>
<li><a href="../../a_sectores/auditoria/menu_modulos.php?usuario=<?php print("$usuario");?>" target = "izquierda">MODULOS</a></li> -->
			<li><a href="../../a_sectores/secretaria/secretaria_validar.php?usuario=<?php print("$usuario");?>" target = "izquierda" >OBRAS SOC.</a></li>
	<!-- <li><a href="../../a_sectores/facturacion/facturacion.php?usuario=<?php print("$usuario");?>" target = "izquierda">FACTURACION</a></li> 
		<li><a href="../../a_sectores/derivaciones.php?usuario=<?php print("$usuario");?>" target = "izquierda">DERIVACIONES</a></li> 
	<li><a href="../../a_sectores/gerencia/estadisticas/estadistica.php?usuario=<?php print("$usuario");?>" target = "izquierda">ESTADISTICAS</a></li> 	 -->
			<li><a href="../../a_sectores/gerencia/gerencia_validar.php?usuario=<?php print("$usuario");?>" target = "izquierda">ABM</a></li>
<!-- <li><a href="../../a_sectores/webservice/webservice.php?usuario=<?php print("$usuario");?>" target = "izquierda">WEB-SERVICE</a></li> -->
			<!-- <li><a href="../../validar/usuarios/agenda.php?usuario=<?php print("$usuario");?>" target="izquierda">AGENDA</a></li> -->
			<li><a href="../../index.php" target="_TOP">SALIR</a></li>
		</ul>
</div>

  <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="334" height="52" rowspan="2"><div align="left">
          <input class="form-control" type = "text" name = "palabra" size = "27"  id = "palabra" / value = "<?php echo $palabra?>" class = "ctxt" placeholder="Buscar paciente ingresado..." />
          <input style="margin-top: 6px;" class="form-control" type = "submit" name = "ok" value = "BUSCAR AHORA" class = "bot1"/>

<input class="form-control" type = "hidden" name = "tipo_operador" value = "val"> 

          <!-- <input type = "submit" name = "ok" value = "PRO" class = "bot1"/> -->

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



$dia = date ("d");
$mes = date("m");
$anio = date("y");


?>
</div></td>

        <td width="238" rowspan="2" style=" padding-left: 24px; "><div align="center">
          <select class="form-control" name="planillas[]" class="titulo1">
		  	 <option value="7" selected="selected">Autorizaciones OSDE</option>
			<option value="13" >Autorizaciones SANCOR</option>
			<option value="14" >Autorizaciones BOREAL</option>
	<option value="15" >Autorizaciones SWISS</option>
				<option value="16" >Autorizaciones PAMI</option>

			 <option value="1" >Busqueda Diaria</option>
	          <!-- <option value="6">Busqueda x Protocolo</option> -->
             <option value="3">Listado de Pacientes</option>
          </select>
        </div></td>
        <td width="17">&nbsp;</td>
        <td width="771">


<div class="row">

       <div class="col-xs-3">
			 <div class="input-group">
				<input type="text" class="form-control" name = "dia_d" type = "text" id="dia_d" size = "2" maxlength="2"   value  = "<?php echo $dia;?>" />
				<span class="input-group-addon" id="basic-addon1">/</span>
			</div>
       </div>

	  <div class="col-xs-3">
			<div class="input-group">				
				 <input type="text" class="form-control" name = "mes_d" type = "text" id="mes_d" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
				 <span class="input-group-addon" id="basic-addon1">/</span>
			</div>

      </div>

      <div class="col-xs-3">
		    <div class="input-group">
			    <span class="input-group-addon" id="basic-addon1">20</span>
				<input type="text" class="form-control" name = "anio_d" type = "text" id="anio_d" size = "2" maxlength="2" value  = "<?php echo $anio;?>" />
			</div> 
      </div>
	  <div class="col-xs-3">
			<img src="../../imagenes/logo_transparente.png" style="position: fixed;top: 40px;;width: 210px; right: 40px;">
			
	</div> 
  
</div>
		
<div class="row">

       <div class="col-xs-3">
			 <div class="input-group">
				<input type="text" class="form-control" name = "dia_h" id="dia_h" size = "2" maxlength="2" value  = "<?php echo $dia;?>" />
				<span class="input-group-addon" id="basic-addon1">/</span>
			</div>
       </div>

	  <div class="col-xs-3">
			<div class="input-group">	
			     <input type="text" class="form-control" name = "mes_h" type = "text" id="mes_h" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
				 <span class="input-group-addon" id="basic-addon1">/</span>
			</div>

      </div>

      <div class="col-xs-3">
		    <div class="input-group">
			    <span class="input-group-addon" id="basic-addon1">20</span>
			    <input type="text" class="form-control" name = "anio_h" type = "text" id="anio_h" size = "2" maxlength="2" value  = "<?php echo $anio;?>" />
			</div> 
      </div>
			  <input type = "hidden" name = "usuario2" value="<?php echo $usuario;?>" />
		<div class="col-xs-3">
			<input class="form-control" type = "submit" name = "ok2" value = "OK" class = "bot1"/ >	    
		</div> 
	</td>
  
</div>

 </td>
      </tr>
      <tr>
      
        <td>
		

      </tr>
  </table>	
</table>


</FORM>

  <table width="1020" border="0" cellpadding="0" cellspacing="0">
<form action="frame_arriba.php" method="post" target ="arriba">

  <tr>
    <td width="850" height="34" valign="bottom">
<input type="hidden" name="usuario"  value="<?php echo $usuario;?>">
  <input type="hidden" name="palabra"  value="<?php echo $palabra;?>"></td>
    <td width="300" valign="bottom"><div align="right">
    <FONT SIZE="2" FACE="arial" COLOR=white> <MARQUEE scrollamount="1" scrolldelay="50"> <b>Análisis y Programación:</b> Ricardo Rios Rolla | <b>Diseño:</b> Yael Todaro </MARQUEE> </FONT> 
    </div></td>
  </tr>
</table>

</form>
</body>
</html>
