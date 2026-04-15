<?php 
global $palabra;
global $sigla;

//ini_set('include_path', '/www');



$B = 1;

$palabra=$_POST["busca"];
$buscador_rapido=$_POST["buscador_rapido"];

$buscador_rapid=$_POST["buscador_rapido"];
for ($i=0;$i<count($buscador_rapid);$i++)    
{     
$buscador_rapido= $buscador_rapid[$i];    
}


if ($buscador_rapido == 11){
	include ("buscar_nomencladores_reducido.php");

	exit;}

	
/*         <option value = "2">Arancel</option>
           <option value = "3">Arancel</option>
            <option value = "4">Tratamiento</option>
            <option value = "5">Criterios</option>
            <option value = "6">Opciones </option>
            <option value = "7">Capitacion
*/

include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "obrasocial");



if ($palabra=="")
	{

//$sql="select * from convenios order by nro_os";
$sql = 'SELECT obrasocial.datos_os.sigla, obrasocial.convenios.nro_os, obrasocial.convenios.tipo, obrasocial.convenios.inicio, obrasocial.convenios.fin'
        . ' FROM obrasocial.convenios'
        . ' INNER JOIN obrasocial.datos_os ON obrasocial.datos_os.nro_os = obrasocial.convenios.nro_os'
        . ' ORDER BY obrasocial.datos_os.nro_os';

}

else{
	if (is_numeric($palabra))  {
$sql="select * from convenios where nro_os = '$palabra' order by nro_os";


}
else {

//$sql1="select nro_os from datos_os where sigla = '$palabra' or denominacion = '$palabra' ORDER BY ";

$sql="select nomenclador, nro_os from arancel where nomenclador = '$palabra' order by nro_os";
$result = $db->Execute($sql);

//$a=$result->fields["nro_os"];	

}
}




$result = $db->Execute($sql);
$pru=$result->fields["nro_os"];	

switch ($buscador_rapido)
{
	case "1"://mostrar sin modificar
	{ 
		?>
<table width="487" height="70" border="0">
  <tr bordercolor="#0066FF" bgcolor="#0033FF">
    <td height="34" colspan="5" bgcolor="#004080"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999"> 
  <td width="63" height="30"><div align="center"><strong><font color="#FFFFFF"><font size="2">NRO</font></font></strong></div></td>
  <td width="270"><div align="center"><strong><font color="#FFFFFF"><font size="2">DENOMINACION</font></font></strong></div></td>
  <td width="78"><div align="center"><strong><font color="#FFFFFF"><font size="2">MODALIDAD</font></font></strong></div></td>
 <td width="40"><div align="center"><font color="#999999"><strong><font color="#FFFFFF" size="2">FICHA</font></strong></font></div></td>
  </tr>
  

  <?php 
	  break;
	}
	
	case "2": //VIGENCIA
	{

?>
<table width="83%" height="70" border="0">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
<tr bordercolor="#0066FF" bgcolor="#999999">
<td width="90"><div align="center"><font color="#FFFFFF"><strong><font size="2">NRO</font></strong></font></div></td>
<td width="81"><div align="center"><font color="#FFFFFF"><strong><font size="2">SIGLA</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">TIPO</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">INICIO</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">FIN</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">FICHA</font></strong></font></div></td>
</tr>
  

  

    <?php 

break;
	}

case "3": //ARANCEL
	{

?>
<table width="83%" height="70" border="0">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999">
    <td width="90"><div align="center"><font color="#FFFFFF"><strong><font size="2">NRO</font></strong></font></div></td>
    <td width="81"><div align="center"><font color="#FFFFFF"><strong><font size="2">SIGLA</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">MODALIDAD</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">GASTOS</font></strong></font></div></td>

    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">HONORARIOS</font></strong></font></div></td>
	
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">NOMENCLADOR</font></strong></font></div></td>
	    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">FICHA</font></strong></font></div></td>
  </tr>
  

  

    <?php 

break;
	}


case "4": //TRATAMIENTO
	{

?>
<table width="83%" height="70" border="0">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999">
    <td width="90"><div align="center"><font color="#FFFFFF"><strong><font size="2">NRO</font></strong></font></div></td>
    <td width="81"><div align="center"><font color="#FFFFFF"><strong><font size="2">SIGLA</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">MAT. DESC.</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">TOMA/MUESTRA</font></strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">ACTO/BIOQ.</font></strong></font></div></td>
	    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">FICHA</font></strong></font></div></td>
  </tr>
  

  

    <?php 

break;
	}

case "5": //CRITERIOS
	{

?>
<table width="83%" height="70" border="0">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999">
    <td width="90"><div align="center"><font color="#FFFFFF"><strong><font size="2">NRO</font></strong></font></div></td>
    <td width="81"><div align="center"><font color="#FFFFFF"><strong><font size="2">SIGLA</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">SEPARACION</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">COSEGURO</font></strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">VAL/PORC.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">% HON.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">% GAS.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">SUM/RES</font></strong></font></div></td>

  </tr>
  

  

    <?php 

break;
	}


case "6": //OPCIONES
	{

?>
<table width="83%" height="70" border="0">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999">
    <td width="90"><div align="center"><font color="#FFFFFF"><strong><font size="2">NRO</font></strong></font></div></td>
    <td width="81"><div align="center"><font color="#FFFFFF"><strong><font size="2">SIGLA</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">EFECTOR</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">PRESCRIPTOR</font></strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">AFILIADOS</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">DETALLE</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">POS/FACT.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">FICHA</font></strong></font></div></td>
  </tr>
  

  

    <?php 

break;
	}

case "7": //CAPITACION
	{

?>
<table width="83%" height="70" border="0">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999">
    <td width="90"><div align="center"><font color="#FFFFFF"><strong><font size="2">NRO</font></strong></font></div></td>
    <td width="81"><div align="center"><font color="#FFFFFF"><strong><font size="2">SIGLA</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">PRORRATEO</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">CUOTA</font></strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">VALOR.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">% CUOTA</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">FICHA</font></strong></font></div></td>
  </tr>
  

  

    <?php 

break;
	}

case "8": //MODIFICAR
	{

?>
<table width="83%" height="70" border="0">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999">
<td width="90" bgcolor="#999999"><div align="center"><font color="#FFFFFF"><strong><font size="2">NRO</font></strong></font></div></td>
<td width="81" bgcolor="#999999"><div align="center"><font color="#FFFFFF"><strong><font size="2">SIGLA</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">MODIFICAR</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">ELIMINAR</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">FICHA</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">IMPRIMIR</font></strong></font></div></td>
  </tr>
  

  

    <?php 
	
break;
	}


	case "9":
	{
$sql="select * from datos_os order by nro_os";
$a=$result1->fields["nro_os"];	
$a1= "convenio_".$pru.".xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$a1");
?>
<table width="83%" height="70" border="0">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999">
<td width="90"><div align="center"><font color="#FFFFFF"><strong><font size="2">NRO</font></strong></font></div></td>
<td width="81"><div align="center"><font color="#FFFFFF"><strong><font size="2">SIGLA</font></strong></font></div></td>
<td width="78"><div align="center"><strong><font color="#FFFFFF"><font size="2">MODALIDAD</font></font></strong></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">TIPO</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">INICIO</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">FIN</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">MODALIDAD</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">GASTOS</font></strong></font></div></td>

    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">HONORARIOS</font></strong></font></div></td>
	
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">NOMENCLADOR</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">MAT. DESC.</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">TOMA/MUESTRA</font></strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">ACTO/BIOQ.</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">SEPARACION</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">COSEGURO</font></strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">VAL/PORC.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">% HON.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">% GAS.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">SUM/RES</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">EFECTOR</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">PRESCRIPTOR</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">AFILIADOS</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">DETALLE</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">POS/FACT.</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">PRORRATEO</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">CUOTA</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">VALOR.</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">% CUOTA</font></strong></font></div></td>

</tr>
  
  
    <?php 

break;
	}

case "10":
	{
$sql="select * from datos_os order by nro_os";
$a=$result1->fields["nro_os"];	
$a1= "convenio_".$pru.".xls";
?><body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<table width="83%" height="70" border="1">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999">
<td width="90"><div align="center"><font color="#FFFFFF"><strong><font size="2">NRO</font></strong></font></div></td>
<td width="81"><div align="center"><font color="#FFFFFF"><strong><font size="2">SIGLA</font></strong></font></div></td>
<td width="78"><div align="center"><strong><font color="#FFFFFF"><font size="2">MODALIDAD</font></font></strong></div></td>



<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">TIPO</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">INICIO</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">FIN</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">MODALIDAD</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">GASTOS</font></strong></font></div></td>

    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">HONORARIOS</font></strong></font></div></td>
	
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">NOMENCLADOR</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">MAT. DESC.</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">TOMA/MUESTRA</font></strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">ACTO/BIOQ.</font></strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">SEPARACION</font></strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">COSEGURO</font></strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">VAL/PORC.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">% HON.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">% GAS.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">SUM/RES</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">EFECTOR</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">PRESCRIPTOR</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">AFILIADOS</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">DETALLE</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">POS/FACT.</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">PRORRATEO</font></strong></font></div></td>
<td width="107"><div align="center"><font color="#FFFFFF"><strong><font size="2">CUOTA</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">VALOR.</font></strong></font></div></td>
<td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="2">% CUOTA</font></strong></font></div></td>

</tr>
  
  
    <?php 

break;
	}

case "11":
	{
$sql="select * from datos_os order by nro_os ORDER BY nro_os";
$a=$result1->fields["nro_os"];	
$a1= "convenio_".$pru.".xls";
?><body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<table width="83%" height="70" border="0">
  <tr align="center" valign="middle" bordercolor="#0066FF" bgcolor="#0099CC">
    <td height="34" colspan="8"><div align="center"><strong><font color="#FFFFFF">LISTADO DE CONVENIOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#999999">
<td width="90"><div align="center"><font color="#FFFFFF" size="1"><strong>NRO</strong></font></div></td>
<td width="81"><div align="center"><font color="#FFFFFF" size="1"><strong>SIGLA</strong></font></div></td>

	<td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>COMUNES</strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>GASTOS</strong></font></div></td>

    <td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong> BIOQUIM.</strong></font></div></td>
	
	<td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>ESPECIALES</strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>GASTOS</strong></font></div></td>

    <td width="99"><div align="center"><font color="#FFFFFF" size="1"><strong>BIOQUIM</strong></font></div></td>

	<td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>ALTA COMPLEJIDAD</strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>GASTOS</strong></font></div></td>

    <td width="99"><div align="center"><font color="#FFFFFF" size="1"><strong>BIOQUIM</strong></font></div></td>


    <td width="99"><div align="center"><font color="#FFFFFF" size="1"><strong>NN</strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>MATERIAL DESC.</strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>TOMA</strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF" size="1"><strong>ACTO BIOQ.</strong></font></div></td>
    <td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>SEPARACION</strong></font></div></td>
	<td width="107"><div align="center"><font color="#FFFFFF" size="1"><strong>COSEGURO</strong></font></div></td>
    <td width="99"><div align="center"><font color="#FFFFFF"><strong><font size="1">VAL/PORC.</font></strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF" size="1"><strong>% HON.</strong></font></div></td>
	<td width="99"><div align="center"><font color="#FFFFFF" size="1"><strong>% GAS.</strong></font></div></td>
	
</tr>
  
  
    <?php 

break;
	}
}


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_os=$result->fields["nro_os"];	
$inicio=strtoupper($result->fields["inicio"]);
$fin=strtoupper($result->fields["fin"]);
$tipo=strtoupper($result->fields["tipo"]);

switch($tipo)
		{
				case "1":{
$tipo = "PERMANENTE";
				break;}
				case "2":{
$tipo = "RENOVABLE";
				break;}
		}


$sql2="select * from arancel where nro_os = '$nro_os'";
$result2 = $db->Execute($sql2);
$modalidad=strtoupper($result2->fields["modalidad"]);
$uh=strtoupper($result2->fields["uh"]);
$ug=strtoupper($result2->fields["ug"]);
$modalidad_especiales=strtoupper($result2->fields["modalidad_especiales"]);
$uh=strtoupper($result2->fields["uh_especiales"]);
$ug=strtoupper($result2->fields["ug_especiales"]);
$modalidad_alta=strtoupper($result2->fields["modalidad_alta"]);
$uh_alta=strtoupper($result2->fields["uh_alta"]);
$ug_alta=strtoupper($result2->fields["ug_alta"]);


$nomenclador=strtoupper($result2->fields["nomenclador"]);
if ($ug == 0.00){
	$ug = "-";
}
if ($uh == 0.00){
	$uh = "-";
}

if ($ug_especiales == 0.00){
	$ug_especiales = "-";
}
if ($uh_especiales == 0.00){
	$uh_especiales = "-";
}

if ($ug_alta == 0.00){
	$ug_alta = "-";
}
if ($uh_alta == 0.00){
	$uh_alta = "-";
}

switch($modalidad)
		{
				case "1":{
$modalidad = "U. Bioq";
				break;}
				case "2":{
$modalidad = "Gas/Bioq.";
				break;}
				case "3":{
$modalidad = "Valor";
				break;}
		}

		switch($modalidad_especiales)
		{
				case "1":{
$modalidad_especiales = "U. Bioq";
				break;}
				case "2":{
$modalidad_especiales = "Gas/Bioq.";
				break;}
				case "3":{
$modalidad_especiales = "Valor";
				break;}
		}

				switch($modalidad_alta)
		{
				case "1":{
$modalidad_alta = "U. Bioq";
				break;}
				case "2":{
$modalidad_alta = "Gas/Bioq.";
				break;}
				case "3":{
$modalidad_alta = "Valor";
				break;}
		}

$sql1="select sigla, denominacion from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);
$denominacion=strtoupper($result1->fields["denominacion"]);

$sql4="select * from capitacion where nro_os = '$nro_os'";
$result4 = $db->Execute($sql4);
$prorrateo=strtoupper($result4->fields["prorrateo"]);
$cuota=strtoupper($result4->fields["cuota"]);
$porcentaje=strtoupper($result4->fields["porcentaje"]);
$porcentaje_cuota=strtoupper($result4->fields["porcentaje_cuota"]);

$sql5="select * from forma_pago where nro_os = '$nro_os'";
$result5 = $db->Execute($sql5);
$vencimiento=strtoupper($result5->fields["vencimiento"]);
$interes=strtoupper($result5->fields["interes"]);
$antiguedad=strtoupper($result5->fields["antiguedad"]);
$plan=strtoupper($result5->fields["plan"]);


$sql6="select * from incremento where nro_os = '$nro_os'";
$result6 = $db->Execute($sql6);
$material_descartable=strtoupper($result6->fields["material_descartable"]);
switch ($material_descartable)
{
	case "1":
	{
		$material_descartable = "NO";
		break;
	}

case "2":
	{
	$material_descartable = "PRACTICA";
		break;
	}

	case "3":
	{
	$material_descartable = "ORDEN";
		break;
	}
	}
$acto_bioquimico=strtoupper($result6->fields["acto_bioquimico"]);
$toma_muestra=strtoupper($result6->fields["toma_muestra"]);
switch ($toma_muestra)
{
	case "1":
	{
		$toma_muestra= "NO";
		break;
	}

case "2":
	{
	$toma_muestra = "PRACTICA";
		break;
	}

	case "3":
	{
	$toma_muestra = "ORDEN";
		break;
	}
	}


$sql7="select * from op_practicas where nro_os = '$nro_os'";
$result7 = $db->Execute($sql7);
$efector=strtoupper($result7->fields["efector"]);
$prescriptor=strtoupper($result7->fields["prescriptor"]);
$afiliados=strtoupper($result7->fields["afiliado"]);

$sql8="select * from op_facturacion where nro_os = '$nro_os'";
$result8 = $db->Execute($sql8);
$detalle=strtoupper($result8->fields["detalle"]);
$post_factura=strtoupper($result8->fields["post_factura"]);
$separacion=strtoupper($result8->fields["separacion"]);
$coseguro=strtoupper($result8->fields["coseguro"]);
$valor_porcentaje=strtoupper($result8->fields["valor_porcentaje"]);
$gastos=strtoupper($result8->fields["gastos"]);
$honorarios=strtoupper($result8->fields["honorarios"]);
$operacion=strtoupper($result8->fields["operacion"]);

switch ($coseguro){
	case "1":
	{
$coseguro =	"Valor por pract. $";
		break;
	}

	case "2":
	{
$coseguro =	"Valor por Orden";
		break;
	}

	case "3":
	{
$coseguro =	"% por Practica";
		break;
	}

	case "4":
	{
$coseguro =	"% por Orden";
		break;
	}

	case "5":
	{
$coseguro =	"Ninguno";
		break;
	}

	case "6":
	{
$coseguro =	"% por Afiliado";
		break;
	}

}


switch ($separacion){
	case "1":
	{
$separacion ="IVA";
		break;
	}

case "2":
	{
$separacion ="Sin IVA";
		break;
	}

	case "3":
	{
$separacion ="Plan";
		break;
	}

	case "4":
	{
$separacion ="Ninguna";
		break;
	}

}

						

switch ($buscador_rapido)
{
	case "1"://mostrar sin modificar
	{ 
		?>

 
  <tr><td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
    <td><div align="left"><font size="2"><?php print("$denominacion");?></font></div></td>
     
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$modalidad");?></font></div></td>

	   <td><div align="center"><font color="#000000" size="2"><a href="ficha.php?id=<?php print("$nro_os");?>"><IMG SRC="../imagenes/office//005.ico" alt="Ficha" border = "0"></a> </font></div></td>
  </tr>

  <?php 
	  break;
	}
	
	case "2":
	{

?>

<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$tipo");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$inicio");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$fin");?></font></div></td>
<td><div align="center"><font color="#000000" size="2"><a href="ficha.php?id=<?php print("$nro_os");?>"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></a> </font></div></td>

</tr>
  
  
    <?php 

break;
	}

case "3":
	{

?>

<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$modalidad");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$ug");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$uh");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nomenclador");?></font></div></td>
<td><div align="center"><font color="#000000" size="2"><a 
href="ficha.php?id=<?php print("$nro_os");?>"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></a> </font></div></td>
</tr>
  
  
    <?php 

break;
	}





case "4":
	{

?>

<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$material_descartable");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$toma_muestra");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$acto_bioquimico");?></font></div></td>
<td><div align="center"><font color="#000000" size="2"><a href="ficha.php?id=<?php print("$nro_os");?>"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></a> </font></div></td>
</tr>
  
  
    <?php 

break;
	}

case "5":
	{

?>

<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$separacion");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$coseguro");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$valor_porcentaje");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$honorarios");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$gastos");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$operacion");?></font></div></td>
</tr>
  
  
    <?php 

break;
	}

case "6":
	{

?>

<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$efector");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$prescriptor");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$afiliados");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$detalle");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$post_factura");?></font></div></td>
<td><div align="center"><font color="#000000" size="2"><a href="ficha.php?id=<?php print("$nro_os");?>"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></a> </font></div></td>
</tr>
  
  
    <?php 

break;
	}

case "7":
	{

?>

<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$prorrateo");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$cuota");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$porcentaje");?></font></div></td>
<td bgcolor="#FFFFFF"><div align="center"><font size="2"><?php print("$porcentaje_cuota");?></font></div></td>

<td><div align="center"><font color="#DAFAFC" size="2"><a href="ficha.php?id=<?php print("$nro_os");?>"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></a> </font></div></td>
</tr>
  
  
    <?php 

break;
	}

	case "8":
	{

?>

<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font color="#000000" size="2"><a href="convenios.php?nro_os=<?php print("$nro_os");?>"><IMG SRC="../../imagenes/office//027.ico" alt="Modificar" border = "0"></a> </font></font></div></td>
<td><div align="center"> <font color="#000000" size="2"><a href="borra.php?id=<?php print("$nro_os");?>"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a> </font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font color="#000000" size="2"><a href="ficha.php?id=<?php print("$nro_os");?>"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></a> </font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font color="#000000" size="2"><a href="imprimir.php?id=<?php print("$nro_os");?>"><IMG SRC="../../imagenes/office//004.ico" alt="Imprimir" border = "0"></a> </font></div></td>
</tr>
  
  
    <?php 

break;
	}

	case "9": //TODOS
	{

?>

<tr><td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$modalidad");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$tipo");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$inicio");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$fin");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$modalidad");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$ug");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$uh");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nomenclador");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$material_descartable");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$toma_muestra");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$acto_bioquimico");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$separacion");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$coseguro");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$valor_porcentaje");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$honorarios");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$gastos");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$operacion");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$efector");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$prescriptor");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$afiliados");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$detalle");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$post_factura");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$prorrateo");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$cuota");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$porcentaje");?></font></div></td>
<td bgcolor="#FFFFFF"><div align="center"><font size="2"><?php print("$porcentaje_cuota");?></font></div></td>

</tr>  
  
    <?php 

break;
	}


	case "10": //Imprimir
	{

?>

<tr><td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$modalidad");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$tipo");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$inicio");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$fin");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$modalidad");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$ug");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$uh");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$nomenclador");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$material_descartable");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$toma_muestra");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$acto_bioquimico");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$separacion");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$coseguro");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$valor_porcentaje");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$honorarios");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$gastos");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$operacion");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$efector");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$prescriptor");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$afiliados");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$detalle");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$post_factura");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$prorrateo");?></font></div></td>
<td><div align="center"><font size="2"><?php print("$cuota");?></font></div></td>
<td bgcolor="#DAFAFC"><div align="center"><font size="2"><?php print("$porcentaje");?></font></div></td>
<td bgcolor="#FFFFFF"><div align="center"><font size="2"><?php print("$porcentaje_cuota");?></font></div></td>

</tr>  
  
    <?php 

break;
	}

		case "11": //Imprimir reducido
	{

?>

<tr><td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$nro_os");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$sigla");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$modalidad");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$ug");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$uh");?></font></div></td>

<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$modalidad_especiales");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$ug_especiales");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$uh_especiales");?></font></div></td>

<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$modalidad_alta");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$ug_alta");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$uh_alta");?></font></div></td>


<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$nomenclador");?></font></div></td>

<td bgcolor="#E6E6E6"><div align="center"></div></td>
<td bgcolor="#E6E6E6"><div align="center"></div></td>
<td bgcolor="#E6E6E6"><div align="center"></div></td>
<td bgcolor="#E6E6E6"><div align="center"></div></td>
<td bgcolor="#E6E6E6"><div align="center"></div></td>
<td bgcolor="#E6E6E6"><div align="center"></div></td>
<td bgcolor="#E6E6E6"><div align="center"></div></td>
<td bgcolor="#E6E6E6"><div align="center"></div></td>

</tr>
<tr>
  <td bgcolor="#999999"><font color="#FFFFFF" size="1"><strong>MATERIAL DESC.</strong></font></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1"><strong>TOMA</strong></font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1"><strong>ACTO BIOQ.</strong></font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1"><strong>SEPARACION</strong></font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1"><strong>COSEGURO</strong></font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF"><strong><font size="1">VAL/PORC.</font></strong></font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1"><strong>% HON.</strong></font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1"><strong>% GAS.</strong></font></div></td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
</tr>
<tr>
  <td bgcolor="#E6E6E6"><font size="2"><?php print("$material_descartable");?></font></td>
  <td bgcolor="#E6E6E6"><font size="2"><?php print("$toma_muestra");?></font></td>
  <td bgcolor="#E6E6E6"><font size="2"><?php print("$acto_bioquimico");?></font></td>
  <td bgcolor="#E6E6E6"><font size="2"><?php print("$separacion");?></font></td>
  <td bgcolor="#E6E6E6"><font size="2"><?php print("$coseguro");?></font></td>
  <td bgcolor="#E6E6E6"><font size="2"><?php print("$valor_porcentaje");?></font></td>
  <td bgcolor="#E6E6E6"><font size="2"><?php print("$honorarios");?></font></td>
  <td bgcolor="#E6E6E6"><font size="2"><?php print("$gastos");?></font></td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
  <td bgcolor="#E6E6E6">&nbsp;</td>
</tr>  
  
    <?php 

break;
	}
}


$cont = $cont + 1;
$result->MoveNext();
?><td colspan="28" bgcolor="#FFFFFF"><HR></td>
</TR><?php 
	}

?><?php 
$hoy = date("d/m/y");

?>
  <td colspan="28" bgcolor="#DAFAFC">Cantidad de Obras Sociales con convenio <?php echo $cont?> Emitido el: <?php echo $hoy?></td>
</table>
