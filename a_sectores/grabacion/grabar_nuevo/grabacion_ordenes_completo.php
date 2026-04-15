<!DOCTYPE html>
<html>
<html lang="es">
<head>
    <!-- <meta charset="utf-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Grabación de Ordenes</title>
    <link rel="stylesheet" href="../../../drivers/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../drivers/assets/css/Select-Search.css">
    <link rel="stylesheet" href="../../../drivers/assets/css/styles.css">
</head>


<style type="text/css">
<!--
.Estilo33 {
	font-size: 24px;
	font-family: "Trebuchet MS";
}
-->
</style>

 <link href="../../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../../css/botonera.css" rel="stylesheet" type="text/css" />


<head>
<title>GRABACION</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 
<script language="javascript">
function on_load()
{
document.getElementById("nombre_medico").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
							case "operador":
				document.getElementById("lote").focus();
				break;

				case "periodo":
				document.getElementById("anio").focus();
				break;
				
				case "anio":
				document.getElementById("lote").focus();
				break;



				
				case "lote":
				document.getElementById("nombre_medico").focus();
				break;
				
				case "periodo":
				document.getElementById("anio").focus();
				break;
				
				case "anio":
				document.getElementById("nro_os").focus();
				break;

				case "nro_os":
				document.getElementById("nro_paciente").focus();
				break;

				case "nro_paciente":
				document.getElementById("nombre_medico").focus();
				break;

				case "nombre_medico":
				document.getElementById("medico").focus();
				break;

				case "medico":
				document.getElementById("dia4").focus();
				break;
				
				case "dia4":
				document.getElementById("mes4").focus();
				break;

				case "mes4":
				document.getElementById("anio_o4").focus();
				break;

				case "anio_o4":
				document.getElementById("dia_r4").focus();
				break;

				case "dia_r4":
				document.getElementById("mes_r4").focus();
				break;

				case "mes_r4":
				document.getElementById("anio_o_r4").focus();
				break;

				case "anio_o_r4":
				document.getElementById("diagnostico").focus();
				break;

				case "diagnostico":
				document.getElementById("motivo").focus();
				break;

				case "motivo":
				document.getElementById("observaciones").focus();
				break;

				case "observaciones":
				document.getElementById("OK").focus();
				break;
					
								
		}
		return false;
	}
	return true;
}


</script>



<style type="text/css">
<!--
.Estilo27 {font-family: Arial, Helvetica, sans-serif}
.Estilo29 {font-size: 12px}
.Estilo30 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo3 {font-size: 12px; font-family: "Trebuchet MS";}
.Estilo21 {
	font-size: 12px;
	font-family: "Trebuchet MS";
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo36 {
	font-size: 18;
	font-weight: bold;
}
-->
</style>
</head>



<?php 

include ("../../../conexiones/config.inc.php");


$sql="select * from ordenes order by cod_grabacion desc";
$result = $db->Execute($sql);

$nro_protocolo=$result->fields["cod_grabacion"] + 1;


$mes_anterior = date("m");
$anio = date("y");

if ($mes_anterior == 01){
$mes_anterior = "01";

if (strlen($anio) == 1){
$anio = "0".$anio;
}
}
else{

$mes_anterior = $mes_anterior;


if (strlen($mes_anterior) == 1){
$mes_anterior= "0".$mes_anterior;
}
}
if ($band != 1){
$nro_paciente= $_REQUEST['nro_paciente'];
}

$mes = date("m");
$dia= date("d");

if ($bande != 2){
$nro_os = $_REQUEST['nro_os'];
}



$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$nombre=$result->fields["nombre"];
$apellido=$result->fields["apellido"];
$nombre = $apellido." ".$nombre;
$nro_afiliado=$result->fields["nro_afiliado"];


$sql="select * from datos_os where nro_os = $nro_os";
$result = $db->Execute($sql);
$sigla=$result->fields["sigla"];


 $sql = "REPAIR TABLE grabadas_temp";// where nro_laboratorio = $nro_paciente";
$result = $db->Execute($sql);

 $sql = "REPAIR TABLE detalle_temp";// where nro_laboratorio = $nro_paciente";
$result = $db->Execute($sql);



 $sql = "DELETE FROM  grabadas_temp";// where nro_laboratorio = $nro_paciente";
$result = $db->Execute($sql);

 $sql = "DELETE FROM  detalle_temp";// where nro_laboratorio = $nro_paciente";
$result = $db->Execute($sql);



//4264188
?>

<BODY onload = "on_load()" onsubmit="document.getElementById('Espere').style .visibility='visible'">

<FORM name="form" ACTION="pagina_completa_reducida.php" METHOD = "POST">
<table width="850" cellpadding="2" cellspacing="0">

     <tr bgcolor="#CECECE">
    <td colspan="5" bgcolor="#CECECE"><div align="center" class="titulo"><font face="Trebuchet MS">ENCABEZADO DE LA ORDEN </font></div></td>
  </tr>

     <tr >
       <td colspan="2" bgcolor="#003366" class="left" ><div align="center" class="Estilo21">INGRESE DATOS </div></td>
       <td colspan="2" bgcolor="#003366" class="left" ><div align="center" class="Estilo21">DATOS INTERNOS </div></td>
     </tr>
     <tr >
       <td bgcolor="#F0F0F0" class="left" ><div align="center" class="Estilo5 Estilo27 Estilo29">
           <div align="right">Periodo: </div>
       </div></td>
       <td bgcolor="#F0F0F0" class="left" ><input name="periodo" type="text" id="periodo" tabindex = "1" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $mes_anterior;?>" size="2" maxlength="2">
           <span class="Estilo27"><span class="Estilo29">A&ntilde;o</span>:</span>
           <input name="anio" type="text" id="anio" tabindex = "2" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $anio;?>" size="2" maxlength="2"></td>
       <td bgcolor="#F0F0F0" class="left" ><div align="right"><strong><span class="Estilo30">Obra Social </span></strong></div></td>
       <td bgcolor="#F0F0F0" class="Estilo3 left" ><span class="Estilo36">
        <input type="hidden" size="5" name="nro_os" class="text" value="<?php echo $nro_os;?>" id="nro_os" onKeyPress="return verif_caracter(this,event)" tabindex = "5">
          </span><span class="Estilo36"><?php echo $nro_os;?> (<?php echo $sigla;?>)</span></td>
     </tr>
     <tr >
       <td bgcolor="#F0F0F0" class="left" ><div align="right"><span class="Estilo27 Estilo29">Lote para separar: </span></div></td>
       <td bgcolor="#F0F0F0" class="left" ><span class="Estilo5">
         <input type="text" size="10" name="lote" id="lote" onKeyPress="return verif_caracter(this,event)" tabindex = "3" maxlength="20">
      
		
		 
		 <?php 

		 if ($nro_os == 5073){

$sql = "SELECT * FROM lote";
$result = $db->Execute($sql);
echo "<select name=lote1[] size=1 id =lote1 onKeyPress='return verif_caracter(this,event)'>";

echo"<option value='Sema'>Sema</option>";
echo"<option value=''>Sin Lote</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["lote"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
		 


		 }else{
$sql = "SELECT * FROM lote";
$result = $db->Execute($sql);
echo "<select name=lote1[] size=1 id =lote1 onKeyPress='return verif_caracter(this,event)'>";

echo"<option value=''>Sin Lote</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$antibiotico=$result->fields["lote"];
 
echo"<option value='$antibiotico'>$antibiotico</option>";
$result->MoveNext();
	}
echo"</select>";
		 }
		 
		 ?>



         </span>
           <div align="center" class="Estilo3"></div></td>
       <td bgcolor="#F0F0F0" class="left" ><div align="right"><span class="Estilo30">Paciente</span></div></td>
       <td bgcolor="#F0F0F0" class="left Estilo3" ><input name="nro_paciente" type="hidden" class="text" id = "nro_paciente" tabindex = "6" onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_paciente;?>" size="5">
           <span class="right "> <?php echo $nombre;?> (<?php echo $nro_paciente;?>)</span></td>
     </tr>
     <tr >
       <td bgcolor="#F0F0F0" class="left" ><div align="right"><span class="Estilo30">Medico: </span></div></td>
       <td bgcolor="#F0F0F0" class="left" ><span class="Estilo5">
       <?php 
$sql = "SELECT * FROM ordenes group by nombre_medico";
$result = $db->Execute($sql);
?>

<select class="custom-select chosen"  style="color: #B9CAF0;" name='medico1[]' size='1' id ='medico1' onKeyPress='return verif_caracter(this,event)'>

<?php

echo"<option value=''></option>";
if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$medico=$result->fields["medico"];
 $nombre_medico=$result->fields["nombre_medico"];
echo"<option value='$medico*$nombre_medico'>$medico $nombre_medico</option>";
$result->MoveNext();
	}
echo"</select>";


?>
       </span></td>
       <td width="11%" bgcolor="#F0F0F0" class="left" ><div align="right"><span class="right  Estilo3">N&deg;Afiliado</span></div></td>
       <td bgcolor="#F0F0F0" class="left" ><span class="right  Estilo3"><?php echo $nro_afiliado;?>
           <input name="nro_afiliado" type="hidden" class="text" id = "nro_afiliado" value="<?php echo $nro_afiliado;?>">
       </span></td>
     </tr>
     <tr >
       <td bgcolor="#F0F0F0" class="left" ><div align="right"><span class="Estilo30">Nuevo Medico: </span></div></td>
       <td bgcolor="#F0F0F0" class="left" ><span class="right">
         <input name="nombre_medico" type="text" id="nombre_medico" onKeyPress="return verif_caracter(this,event)" value="" size="40" tabindex = "5">
       </span></td>
       <td bgcolor="#F0F0F0" class="left" ><div align="right"><span class="Estilo3">Proximo N&deg;</span></div></td>
       <td bgcolor="#F0F0F0" class="left" ><span class="Estilo33">
         <input name="cod_grabacion" type="text" id="cod_grabacion" value="<?php echo $nro_protocolo;?>">
       </span></td>
     </tr>
    <tr >
   <td width="19%" bgcolor="#F0F0F0" class="left" ><div align="right" class="Estilo30">Nueva Matricula: </div></td>
   <td width="43%" bgcolor="#F0F0F0" class="left" ><span class="right">
     <input type="text" size="5" name="medico" class="text" value="" id="medico" onKeyPress="return verif_caracter(this,event)" tabindex = "6">
   </span></td>
   <td bgcolor="#F0F0F0" class="left" >&nbsp;</td>
   <td bgcolor="#F0F0F0" class="left" >&nbsp;</td>
    </tr>
 <tr >
   <td bgcolor="#F0F0F0" class="left" ><div align="right" class="Estilo3">Fecha An&aacute;lisis: </div></td>
   <td bgcolor="#F0F0F0" class="left" ><span class="right Estilo3">
     <input type="text" size="2" name="dia"  value= "<?php echo $dia;?>"  id="dia4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "7">
/
<input type="text" size="2" name="mes"  value= "<?php echo $mes;?>"  id="mes4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "8">
/ 20
<input type="text" size="2" name="anio_o" value= "<?php echo $anio;?>"  id="anio_o4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "9">
   </span></td>
   <td bgcolor="#F0F0F0" class="left" >&nbsp;</td>
   <td bgcolor="#F0F0F0" class="left" >&nbsp;</td>
   </tr>
 <tr >
   <td bgcolor="#F0F0F0" class="left" ><div align="right" class="Estilo30">Fecha Medico:</div></td>
   <td bgcolor="#F0F0F0" class="left" ><span class="right Estilo3">
     <input type="text" size="2" name="dia_r"  value= "<?php echo $dia;?>"  id="dia_r4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "10">
/
<input type="text" size="2" name="mes_r"  value= "<?php echo $mes;?>"  id="mes_r4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "11">
/ 20
<input type="text" size="2" name="anio_o_r" value= "<?php echo $anio;?>"  id="anio_o_r4" maxlength="2" tabindex = "13">
   </span></td>
   <td bgcolor="#F0F0F0" class="left" >&nbsp;</td>
   <td bgcolor="#F0F0F0" class="left" >&nbsp;</td>
   </tr>
 
 
 <!-- <tr class="Estilo30" >
   <td bgcolor="#F0F0F0" class="left" ><div align="right">Diagnostico</div></td>
   <td colspan="3" bgcolor="#F0F0F0" class="left" ><span class="right">
     <input name="diagnostico" type="text" id="diagnostico" onKeyPress="return verif_caracter(this,event)" value="" size="60" maxlength="120" tabindex = "15">
   </span></td>
   </tr>
 <tr class="Estilo30" >
   <td bgcolor="#F0F0F0" class="left" ><div align="right">Motivo</div></td>
   <td colspan="3" bgcolor="#F0F0F0" class="left" ><span class="right">
     <input name="motivo" type="text" id="motivo" onKeyPress="return verif_caracter(this,event)" value="" size="60" maxlength="120" tabindex = "16">
   </span></td>
   </tr>
 <tr class="Estilo30" >
   <td bgcolor="#F0F0F0" class="left" ><div align="right">Observaciones</div></td>
   <td colspan="3" bgcolor="#F0F0F0" class="left" ><span class="right">
     <input name="observaciones" type="text" id="observaciones" onKeyPress="return verif_caracter(this,event)" value="" size="60" maxlength="120" tabindex = "17">
   </span></td>
   </tr> -->
 <tr >
   <td bgcolor="#C0C0C0" class="left" >&nbsp;</td>
   <td colspan="3" bgcolor="#C0C0C0" class="left" ><span class="right">
     <input type="submit" name="Alta" value="Continuar" id = "Alta3" tabindex = "18">
     <input type="hidden" name="primera_vez" value="SI" >
	    <input type="hidden" name="tipo_operador" value= "<?php echo $tipo_operador;?>" >


        <input name="banda_gris" type="hidden"  value="1">
   </span></td>
 </tr>
  </TABLE>
</form>


</body>





 <script src="../../../drivers/assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <script src="../../../drivers/assets/js/Select-Search.js"></script>
</body>

</html>


 


