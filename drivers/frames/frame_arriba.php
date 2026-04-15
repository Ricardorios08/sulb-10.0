<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="../../menus.css" />
	<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
<title>Men? Principal (ADMINISTRADOR)</title>
<style type="text/css">
<!--
body {
	background-image: url(../../imagenes/cuadrado.jpg);
	background-repeat: repeat-x;
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


<form action="../../a_sectores/pacientes/buscar_paciente.php" method="post" target ="central">

<?php

include ("../../conexiones/config.inc.php");
$usuario = $_REQUEST['usuario'];
$CARATULA1=$_REQUEST["CARATULA1"];
  $palabra=$_REQUEST["palabra"];
 $palabra1=$_REQUEST["palabra1"];

 $sql="select * from usuario where id = $usuario";
$result = $db->Execute($sql);

$rol=$result->fields["rol"];
$nombre=strtoupper($result->fields["usuario"]);
$contrasena=$result->fields["contrasena"];
 $usuario1 = $nombre." / ".$rol;


?>

<div id="menuh">
<div class="logo"></div>
		<ul>
			 <li><a href="../../a_sectores/menu_pacientes.php?usuario=<?php print("$usuario");?>" target = "izquierda">PACIENTES</a></li> 
				
			<li><a href="../../a_sectores/auditoria/menu_practicas.php?usuario=<?php print("$usuario");?>" target = "izquierda">PRACTICAS</a></li>
				<li><a href="../../a_sectores/validacion/menu_practicas_validacion.php?usuario=<?php print("$usuario");?>" target = "izquierda">REQUISITOS</a></li>
<li><a href="../../a_sectores/auditoria/menu_planillas.php?usuario=<?php print("$usuario");?>" target = "izquierda">PLANILLAS</a></li>
<li><a href="../../a_sectores/auditoria/menu_modulos.php?usuario=<?php print("$usuario");?>" target = "izquierda">MODULOS</a></li>
			<li><a href="../../a_sectores/secretaria/secretaria.php?usuario=<?php print("$usuario");?>" target = "izquierda" >OBRAS SOC.</a></li>
	<li><a href="../../a_sectores/facturacion/facturacion.php?usuario=<?php print("$usuario");?>" target = "izquierda">FACTURACION</a></li> 
		<li><a href="../../a_sectores/derivaciones.php?usuario=<?php print("$usuario");?>" target = "izquierda">ESTADISTICAS</a></li> 
	<!-- <li><a href="../../a_sectores/gerencia/estadisticas/estadistica.php?usuario=<?php print("$usuario");?>" target = "izquierda">ESTADISTICAS</a></li> 	 -->
			<li><a href="../../a_sectores/gerencia/gerencia.php?usuario=<?php print("$usuario");?>" target = "izquierda">CONFIG</a></li>
<!-- <li><a href="../../a_sectores/webservice/webservice.php?usuario=<?php print("$usuario");?>" target = "izquierda">WEB-SERVICE</a></li> -->
			<li><a href="../../validar/usuarios/agenda.php?usuario=<?php print("$usuario");?>" target="izquierda">ABM</a></li>
			<!-- <li><a href="../../index.php" target="_TOP">SALIR</a></li> -->
			
		</ul>
</div>

  <table width="1360" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="383" height="52" rowspan="2"><div align="left">
          <input type = "text" name = "palabra" size = "27"  id = "palabra" / value = "<?php echo $palabra1?>" class = "ctxt" />
          <input type = "submit" name = "ok" value = "OK" class = "bot1"/>
          <input type = "submit" name = "ok" value = "PROT" class = "bot1"/>
          <input name = "ok" type = "submit" class = "bot1" id="ok" value = "PRAC"/>
          <?php 



if ($CARATULA1 == "CARATULA"){
 
$modelo=$_REQUEST["modelo"];
 
 //$sql = "UPDATE `ei000052_laboratorio`.`informe` SET `modelo` = '$modelo' where id = '$usuario' LIMIT 1;";
 $sql = "UPDATE `informe` SET `modelo` = '$modelo' where id = '$usuario' LIMIT 1;";


mysql_query($sql);

}






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
        <td width="211" rowspan="2"><div align="center">
          <select name="planillas[]" class="titulo1">
            <option value="1" selected="selected">Busqueda Diaria</option>
            <option value="7" >Autorizaciones OSDE</option>
			<option value="13" >Autorizaciones SANCOR</option>
			<option value="14" >Autorizaciones BOREAL</option>
				<option value="15" >Autorizaciones SWISS</option>
				<option value="16" >Autorizaciones PAMI</option>
            <option value="6">Busqueda x Protocolo</option>
            <option value="2">Planilla Megalaboratorio</option>
            <option value="3">Listado de Pacientes</option>
			<option value="12">Listado de Pacientes Excel</option>
            <option value="4">Ocurrencias x Practicas</option>
            <option value="5">Ocurrencias x Obras Sociales</option>
            <option value="8">Informes incompletos</option>
		
          </select>
        </div></td>
        <td width="9">&nbsp;</td>
        <td width="767"><input name = "dia_d" type = "text" id="dia_d" size = "2" maxlength="2"   value  = "<?php echo $dia;?>" />
/
  <input name = "mes_d" type = "text" id="mes_d" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
20
<input name = "anio_d" type = "text" id="anio_d" size = "2" maxlength="2" value  = "<?php echo $anio;?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name = "dia_h" type = "text" id="dia_h" size = "2" maxlength="2" value  = "<?php echo $dia;?>" />
/
  <input name = "mes_h" type = "text" id="mes_h" size = "2" maxlength="2" value  = "<?php echo $mes;?>" />
20
<input name = "anio_h" type = "text" id="anio_h" size = "2" maxlength="2" value  = "<?php echo $anio;?>" />
<input type = "hidden" name = "usuario2" value="<?php echo $usuario;?>" />
<input type = "submit" name = "ok2" value = "OK" class = "bot1"/ ></td>
      </tr>
  </table>	
</table>


</FORM>

  <table width="1020" border="0" cellpadding="0" cellspacing="0">
<form action="frame_arriba.php" method="post" target ="arriba">


  <tr>
    <td width="850" height="34" valign="bottom"><span class="Estilo66">  
      <?php switch ($modelo){

		  case "A":{?>
</span>      <div align="left" class="Estilo66">
        <input name="modelo" type="radio" value="A" checked="checked" />
  A
  <input name="modelo" type="radio" value="B" />
  B
  <input name="modelo" type="radio" value="C" />
  C
  <input name="modelo" type="radio" value="D" />
  D 
 <input name="modelo" type="radio" value="E" />
  E
<input name="modelo" type="radio" value="F" />
F
  <input name = "CARATULA1" type = "submit" id="CARATULA1" value = "CARATULA" class = "bot1"/>
     <?php echo $usuario1;?> </div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <span class="Estilo67">
      <?php break;}


		  case "B":{?>      
      </span>
      <div align="left" class="Estilo66">
        <input name="modelo" type="radio" value="A"  />
A
<input name="modelo" type="radio" value="B" checked="checked"/>
B
<input name="modelo" type="radio" value="C" />
C
<input name="modelo" type="radio" value="D" />
D
<input name="modelo" type="radio" value="E" />
E
<input name="modelo" type="radio" value="F" />
F

<input name = "CARATULA1" type = "submit" id="CARATULA1" value = "CARATULA" class = "bot1"/>
   <?php echo $usuario1;?>   </div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <span class="Estilo67">
      <?php break;}

		  case "C":{?>      
      </span>
      <div align="left" class="Estilo66">
        <input name="modelo" type="radio" value="A" />
A
<input name="modelo" type="radio" value="B" />
B
<input name="modelo" type="radio" value="C" checked="checked"  />
C
<input name="modelo" type="radio" value="D" />
D
<input name="modelo" type="radio" value="E" />
E
<input name="modelo" type="radio" value="F" />
F
<input name = "CARATULA1" type = "submit" id="CARATULA1" value = "CARATULA" class = "bot1"/>
    <?php echo $usuario1;?>  </div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <span class="Estilo67">
      <?php break;}

		  case "D":{?>      
      </span>
      <div align="left" class="Estilo66">
        <input name="modelo" type="radio" value="A"   />
A
<input name="modelo" type="radio" value="B" />
B
<input name="modelo" type="radio" value="C" />
C
<input name="modelo" type="radio" value="D" checked="checked"  />
D
<input name="modelo" type="radio" value="E" />
E
<input name="modelo" type="radio" value="F" />
F
<input name = "CARATULA1" type = "submit" id="CARATULA1" value = "CARATULA" class = "bot1"/>
   <?php echo $usuario1;?>   </div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <span class="Estilo67">
      <?php break;}

 case "E":{?>      
      </span>
      <div align="left" class="Estilo66">
        <input name="modelo" type="radio" value="A"   />
A
<input name="modelo" type="radio" value="B" />
B
<input name="modelo" type="radio" value="C" />
C
<input name="modelo" type="radio" value="D"  />
D
<input name="modelo" type="radio" value="E" checked="checked" />
E
<input name="modelo" type="radio" value="F" />
F
<input name = "CARATULA1" type = "submit" id="CARATULA1" value = "CARATULA" class = "bot1"/>
   <?php echo $usuario1;?>   </div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <span class="Estilo67">
      <?php break;}


 case "F":{?>      
      </span>
      <div align="left" class="Estilo66">
        <input name="modelo" type="radio" value="A"   />
A
<input name="modelo" type="radio" value="B" />
B
<input name="modelo" type="radio" value="C" />
C
<input name="modelo" type="radio" value="D"  />
D
<input name="modelo" type="radio" value="E" />
E
<input name="modelo" type="radio" value="F" checked="checked" />
F
<input name = "CARATULA1" type = "submit" id="CARATULA1" value = "CARATULA" class = "bot1"/>
   <?php echo $usuario1;?>   </div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <div align="left" class="Estilo66"></div>
      <span class="Estilo67">
      <?php break;}





 case "":{?>      
      </span>
      <div align="left" class="Estilo66">
        <input name="modelo" type="radio" value="A" checked="checked" />
A
<input name="modelo" type="radio" value="B" />
B
<input name="modelo" type="radio" value="C" />
C
<input name="modelo" type="radio" value="D" />
D
<input name="modelo" type="radio" value="E" />
E
<input name="modelo" type="radio" value="F" checked="checked" />
F
<input name = "CARATULA1" type = "submit" id="CARATULA1" value = "CARATULA" class = "bot1"/>
      <?php echo $usuario1;?></div>
      <div align="left" class="Estilo2"></div>
      <div align="left" class="Estilo2"></div>
      <div align="left" class="Estilo2"></div>
      <?php break;}

	


 }?>
  <input type="hidden" name="usuario"  value="<?php echo $usuario;?>">
  <input type="hidden" name="palabra"  value="<?php echo $palabra;?>">
  
    <input type="hidden" name="palabra1"  value="<?php echo $palabra;?>">
  </td>
    <td width="300" valign="bottom"><div align="right">
      <FONT SIZE="2" FACE="arial" COLOR=white> <MARQUEE scrollamount="1" scrolldelay="50"> <b>Análisis y Programación:</b> Ricardo Rios Rolla | <b>Diseño:</b> Yael Todaro </MARQUEE> </FONT>
    </div></td>
  </tr>
</table>

</form>
</body>
</html>
