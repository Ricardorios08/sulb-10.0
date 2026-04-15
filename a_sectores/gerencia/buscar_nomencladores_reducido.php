<style type="text/css">
<!--
.Estilo3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}
-->

H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}
</STYLE>

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
        . ' where obrasocial.datos_os.nro_os < 9999'
        . ' ORDER BY obrasocial.datos_os.nro_os';

}

else{
	if (is_numeric($palabra))  {
$sql="select * from convenios where nro_os = '$palabra' and nro_os < 9999 order by nro_os";


}
else {

//$sql1="select nro_os from datos_os where sigla = '$palabra' or denominacion = '$palabra' ORDER BY ";

$sql="select nomenclador, nro_os from arancel where nomenclador = '$palabra' and nro_os < 9999 order by nro_os";
$result = $db->Execute($sql);

//$a=$result->fields["nro_os"];	

}
}

$result = $db->Execute($sql);
$pru=$result->fields["nro_os"];	

$sql="select * from datos_os order by nro_os ";
$a=$result1->fields["nro_os"];	
$a1= "convenio_".$pru.".xls";
?><body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">

<table width="86%" height="323" border="0">

  
    <?php 


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
$uh_especiales=strtoupper($result2->fields["uh_especiales"]);
$ug_especiales=strtoupper($result2->fields["ug_especiales"]);

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

$coseguro_esp=$result8->fields["coseguro_esp"];
$valor_porc_esp=$result8->fields["valor_porc_esp"];

$coseguro_comp=ucwords($result8->fields["coseguro_comp"]);
$valor_porc_comp=ucwords($result8->fields["valor_porc_comp"]);
$iva_convenido=ucwords($result8->fields["iva"]);

$porcentaje_total=ucwords($result8->fields["porcentaje_total"]);
$operacion_orden=ucwords($result8->fields["operacion_orden"]);
$denominacion_ajuste=ucwords($result8->fields["denominacion_ajuste"]);


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

switch ($coseguro_esp){
	case "1":
	{
$coseguro_esp =	"Valor por pract. $";
		break;
	}

	case "2":
	{
$coseguro_esp =	"Valor por Orden";
		break;
	}

	case "3":
	{
$coseguro_esp =	"% por Practica";
		break;
	}

	case "4":
	{
$coseguro_esp =	"% por Orden";
		break;
	}

	case "5":
	{
$coseguro_esp =	"Ninguno";
		break;
	}

	case "6":
	{
$coseguro_esp =	"% por Afiliado";
		break;
	}

}

switch ($coseguro_comp){
	case "1":
	{
$coseguro_comp =	"Valor por pract. $";
		break;
	}

	case "2":
	{
$coseguro_comp =	"Valor por Orden";
		break;
	}

	case "3":
	{
$coseguro_comp =	"% por Practica";
		break;
	}

	case "4":
	{
$coseguro_comp =	"% por Orden";
		break;
	}

	case "5":
	{
$coseguro_comp =	"Ninguno";
		break;
	}

	case "6":
	{
$coseguro_comp =	"% por Afiliado";
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

						


?>

    <tr>
      <td colspan="8" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Obra Social <strong><?php print("$nro_os");?> - <?php print("$sigla");?> (<?php print("$denominacion");?>)</strong></font></div></td>
      <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Nomenclador:</font><font size="2"> <?php print("$nomenclador");?></font></div></td>
    </tr>
    <tr bgcolor="#999999">
      <td colspan="2"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td width="48"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Modalidad</font></td>
      <td width="46"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Gastos</font></td>
      <td width="81"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"> Bioquimicos</font></td>
      <td width="79"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Coseguro</font></div></td>
      <td width="102"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Val/Porc</font></div></td>
      <td colspan="3"><div align="center"></div> <div align="center"></div>        <div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#E6E6E6">&nbsp;</td>
      <td colspan="5" bgcolor="#E6E6E6"><hr noshade></td>
      <td colspan="3" bgcolor="#E6E6E6">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Practicas Comunes: </font> </div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$modalidad");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$ug");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$uh");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$coseguro");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$valor_porcentaje");?></font></div></td>
      <td colspan="3" bgcolor="#E6E6E6"><div align="center"></div>        <div align="center"></div>        <div align="center"></div></td>
    </tr>
    <tr>

      <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="1" face="Arial, Helvetica, sans-serif">Practicas Especiales:</font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$modalidad_especiales");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$ug_especiales");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$uh_especiales");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$coseguro_esp");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$valor_porc_esp");?></font></div></td>
      <td colspan="3" bgcolor="#E6E6E6"><div align="center"></div>        <div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="1" face="Arial, Helvetica, sans-serif">Alta Complejidad: </font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$modalidad_alta");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$ug_alta");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$uh_alta");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$coseguro_comp");?></font></div></td>
      <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$valor_porc_comp");?></font></div></td>
      <td colspan="3" bgcolor="#E6E6E6"><div align="center"></div>        <div align="center"></div></td>
    </tr>
<tr>
  <td width="88" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Material Desc..</font></div></td>
  <td width="97" bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Toma</font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Acto/Bioq.</font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Separaci&oacute;n</font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">IVA</font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Efector</font></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Prescriptor</font></div></td>
  <td width="39" bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Afiliados</font></div></td>
  <td width="113" bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Detslle</font></div></td>
  <td width="102" bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Medios</font></div></td>
</tr>
<tr>
  <td colspan="10" bgcolor="#E6E6E6"><hr noshade></td>
  </tr>
<tr>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$material_descartable");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$toma_muestra");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$acto_bioquimico");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$separacion");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$iva_convenido");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$efector");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$prescriptor");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$afiliados");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$detalle");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$post_factura");?></font></div></td>
</tr>
<tr bgcolor="#000000">
  <td colspan="4" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Ajuste al valor Practicas</font></div></td>
  <td colspan="6" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Ajuste al valor Orden</font></div></td>
  </tr>
<tr>
  <td bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">% Hon</font></div></td>
  <td bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">% Gas</font></div></td>
  <td colspan="2" bgcolor="#999999"><div align="center"></div>    <div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Operacion</font></div></td>
  <td colspan="2" bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Porcentaje Total</font></div>    <div align="center"></div></td>
  <td bordercolor="#0066FF" bgcolor="#999999"><div align="center"></div>    <div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Operacion</font></div></td>
  <td colspan="3" bordercolor="#0066FF" bgcolor="#999999"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">Denominaci&oacute;n</font></div></td>
  </tr>
<tr>
  <td height="21" colspan="10" bgcolor="#E6E6E6"><hr noshade></td>
  </tr>
<tr>
  <td bgcolor="#E6E6E6"><div align="center"></div>    <div align="center"><font size="1"><?php print("$honorarios");?></font></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$gastos");?></font></div></td>
  <td colspan="2" bgcolor="#E6E6E6"><div align="center"></div>    <div align="center"><font size="1"><?php print("$operacion");?></font></div></td>
  <td colspan="2" bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$porcentaje_total");?></font></div>    <div align="center"></div></td>
  <td bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$operacion_orden");?></font></div></td>
  <td colspan="3" bgcolor="#E6E6E6"><div align="center"><font size="1"><?php print("$denominacion_ajuste");?></font></div></td>
  </tr>
  
<?php 

$cont = $cont + 1;
$cont_enter = $cont_enter + 1;

if ($cont_enter == 3){
	$pag = $pag + 1;
	?>
  <td colspan="18" bgcolor="#FFFFFF"><div align="right" class="Estilo3"><?php echo "Pag ".$pag;?>
    </div>
    <div align="right"></div></td></tr>

<H1 class=SaltoDePagina> </H1><?php 
	$cont_enter=0;
$result->MoveNext();
?><td colspan="18" bgcolor="#FFFFFF"><HR noshade></td>
</TR><?php 
	}
else{

$result->MoveNext();
?><td colspan="18" bgcolor="#FFFFFF"><HR noshade></td>
</TR><?php 
}

}




?><?php 
$hoy = date("d/m/y");

?>
 <tr bgcolor="#E6E6E6"><td colspan="18">Cantidad de Obras Sociales con convenio <?php echo $cont?> Emitido el: <?php echo $hoy?></td> 
</table>
