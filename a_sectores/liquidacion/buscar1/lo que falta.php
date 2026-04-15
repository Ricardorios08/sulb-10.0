

switch ($operacion){
case "100":{
?>
<tr>
    <td height="21" colspan="7"><span class="Estilo7">FACTURAS ACREEDITADAS A LA FECHA: </span></td>
    <td height="21" colspan="2"><div align="right" class="Estilo7">
      </div>      <div align="right" class="Estilo7">
        <div align="center" class="Estilo7">$ <?ECHO  number_format($importe,2);?>
        </div>
    </div></td>
  </tr>

	<?
$result2->MoveNext();
break;

	}

case "200":{


include ("../../../conexiones/config_fa.php");
$sql1="select * from factura where nro_factura = '$nro_factura'"; //4
$result1 = $db->Execute($sql1);

$nro_os=strtoupper($result1->fields["nro_os"]); // 2617
$fecha_pago_fact=strtoupper($result1->fields["fecha_pago_fact"]); // 2617


include ("../../../conexiones/config_os.php");
$sql12="select * from datos_os where nro_os like '$nro_os'";
$result12 = $db->Execute($sql12);
$sigla=strtoupper($result12->fields["sigla"]);


?>
<tr class="Estilo7">
    <td height="21"><span class="Estilo2"><?echo $fecha_pago_fact;?></span></td>
    <td><span class="Estilo10"><?echo $sigla." (".$nro_os.")";?></span></td>
    <td><span class="Estilo10"><?echo $tipo_pago;?></span></td>
    <td><div align="center" class="Estilo11"><span class="Estilo2"><?echo $nro_factura;?></span></div></td>
    <td><span class="Estilo10"><?echo $fecha;?></span></td>
    <td><span class="Estilo11"></span></td>
    <td><div align="right" class="Estilo2" > <?echo "$".number_format($importe,2);?>
    </div></td>
    <td><div align="right" class="Estilo2"><? "$".number_format($importe,2);?>
    </div></td>
</tr>
<?


  $result2->MoveNext();

break;

}//CIERRA EL CASE 200

case "400":{//DEBITTOS


if ($band == 1){
?>

<table width="608" border="0">
  <tr bgcolor="#C9FADF">
    <td colspan="8" scope="col"><div align="center" class="Estilo12">AJUSTES SOBRE FACTURAS PAGADAS</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="8" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td width="84" scope="col"><div align="center" class="Estilo3 Estilo4"><span class="Estilo5">Fec. Mov. </span></div></td>
    <td width="58" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">O. Social </span></div></td>
    <td width="71" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Comp.</span></div></td>
    <td width="52" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Fec. Orig.</span></div></td>
    <td width="131" scope="col"><div align="center" class="Estilo5">Motivo</div></td>
    <td width="50" scope="col"><div align="center" class="Estilo5"><span class="Estilo7 "><span class="Estilo5">Debitos</span></span></div></td>
    <td width="46" scope="col"><div align="center" class="Estilo5">Cr&eacute;dito</div></td>
    <td width="82" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Neto</span></div></td>
  </tr>


  <tr class="Estilo7">
    <td scope="col"><span class="Estilo2"><?ECHO $fecha;?></span></td>
    <td colspan="5" scope="col"><span class="Estilo2">BRUTO PAGADO </span></td>
    <td scope="col"><div align="center"></div></td>
    <td scope="col"><div align="right"><span class="Estilo2">$ <?ECHO number_format($total_bruto,2);?></span></div></td>
  </tr>
<?$band = 2;
	}

$a = $total_bruto;
include ("../../../conexiones/config_liq.php");
$sql_deb="select * from liquidacion WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` = '$anio' and periodo = $periodo and nro_liquidacion = $nro_liquidacion and operacion = 400";

$result_deb = $db->Execute($sql_deb);

if (!$result_deb) die("fallo".$db->ErrorMsg());
while (!$result_deb->EOF) {

$fecha= $result_deb->fields["fecha"];
$motivo= $result_deb->fields["motivo"];
$importe_debito = $importe;


//$total_bruto = $total_bruto - $importe_debito;


	
include ("../../../conexiones/config_fa.php");
$sql1="select fecha from factura where nro_factura like '$nro_factura'";
$result1 = $db->Execute($sql1);
$fecha_original=$result1->fields["fecha"];

include ("../../../conexiones/config_os.php");
$sql1="select sigla from datos_os where nro_os like '$nro_os'";
$result1 = $db->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);

$a = $a - $importe_debito;


?>
  <tr class="Estilo7">
    <td scope="col"><span class="Estilo2"><?ECHO $fecha;?></span></td>
    <td scope="col"><span class="Estilo2"><?ECHO $sigla;?></span></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $nro_factura;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $fecha_original;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $motivo;?></span></div></td>



    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($importe_debito,2);?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO "-";?></span></div></td>
    <td scope="col"><div align="right"><span class="Estilo2">$ <?ECHO number_format($total_bruto,2);?></span></div></td>
  </tr>
  

<?



 $result_deb->MoveNext();
}

//$total_bruto = $total_bruto - $debitos;



//$debitos = 0;


	break;

	$result2->MoveNext();
	?>
<tr class="Estilo7">
  <td colspan="5" scope="col">&nbsp;</td>
  <td colspan="3" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="5" scope="col"><div align="right" class="Estilo2">Sub-Total </div></td>
  <td class="Estilo2" scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($debitos,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($total_creditos,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo2">$<?ECHO number_format($total_bruto,2);?></span></div>
  </div></td>
</tr>
<tr>
  <td colspan="8" scope="col"><hr noshade></td>
  </tr>

</table><?
}//CIERRA EL CASE 300 DEBITOS


case "600":{

if ($bande == 1){

?>

<table width="608" border="0">
  <tr bgcolor="#C9FADF">
    <td colspan="8" scope="col"><div align="center" class="Estilo12">AJUSTES SOBRE FACTURAS ANTERIORES</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="8" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td width="84" scope="col"><div align="center" class="Estilo3 Estilo4"><span class="Estilo5">Fec. Mov. </span></div></td>
    <td width="58" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">O. Social </span></div></td>
    <td width="71" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Comp.</span></div></td>
    <td width="52" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Fec. Orig.</span></div></td>
    <td width="131" scope="col"><div align="center" class="Estilo5">Motivo</div></td>
    <td width="56" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Debitos</span></div></td>
    <td width="40" scope="col"><div align="center" class="Estilo5">Cr&eacute;dito</div></td>
    <td width="82" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Neto</span></div></td>
  </tr>
<?$bande = 2;
	}?>
  <tr class="Estilo7">
    <td scope="col"><span class="Estilo2"><?ECHO $fecha;?></span></td>
    <td colspan="5" class="Estilo2" scope="col"><span class="Estilo2">NETO DE AJUSTES </span></td>
    <td class="Estilo2" scope="col"><div align="center"></div></td>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2">$ <?ECHO number_format($total_bruto,2);?></span></div></td>
  </tr>

<?
$a = $total_bruto;
include ("../../../conexiones/config_liq.php");

//$sql_deb="select * from liquidacion WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` = '$anio' and periodo = $periodo and nro_liquidacion = $nro_liquidacion and operacion = 600 and nro_factura = $nro_factura order by nro_factura";

//$result_deb = $db->Execute($sql_deb);

  //if (!$result_deb) die("fallo".$db->ErrorMsg());
  //while (!$result_deb->EOF) {

//$fecha= $result_deb->fields["fecha"];
//$cod_operacion= $result_deb->fields["cod_operacion"];
//$importe_debito = $result_deb->fields["importe"];

//$total_bruto = $total_bruto - $importe_debito;

//$ajuste= $result_deb->fields["motivo"];
//$nro_factura=$result_deb->fields["nro_factura"];
//$nro_os=$result_deb->fields["nro_os"];
//$nro_practica=$result_deb->fields["nro_practica"];
//$nro_orden=$result_deb->fields["nro_orden"];

/*include ("../../../conexiones/config_liq.php");
 $sql_ajuste = "SELECT ajuste FROM `ajuste` WHERE `cod_ajuste` = $ajuste";
$result_ajuste = $db->Execute($sql_ajuste);
$motivo= $result_ajuste->fields["ajuste"];
	
include ("../../../conexiones/config_fa.php");
$sql1="select fecha from factura where nro_factura like '$nro_factura'";
$result1 = $db->Execute($sql1);
$fecha_original=$result1->fields["fecha"];

include ("../../../conexiones/config_os.php");
$sql1="select sigla from datos_os where nro_os like '$nro_os'";
$result1 = $db->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);
$a = $a - $importe_debito;
*/
?>
  <tr class="Estilo7">
    <td scope="col"><span class="Estilo2"><?ECHO $fecha;?></span></td>
    <td scope="col"><span class="Estilo2"><?ECHO $sigla;?></span></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $nro_factura;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $fecha_original;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $motivo;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO number_format($importe_debito,2);?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO "-";?></span></div></td>
    <td scope="col"><div align="right"><span class="Estilo2">$ <?ECHO $total_bruto;?></span></div></td>
  </tr>
  

<?

	$debitos = $debitos + $importe_debito;

//include ("../../../conexiones/config_liq.php");
//$result_deb->MoveNext();
//	}

//$total_bruto = $total_bruto - $debitos;


?>
</table>
<?

$result2->MoveNext(); //mueve registro matricula
break;
}

case "800":{



if ($bande1 == 1){
	include ("../../../conexiones/config_liq.php");
$sql_ret = "SELECT * FROM `liquidacion` WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` = '$anio' and periodo = $periodo and nro_liquidacion = $nro_liquidacion and operacion = 800";
$result_ret = $db->Execute($sql_ret);

?>

<table width="608" border="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#C9FADF">
    <td colspan="5" scope="col"><div align="center" class="Estilo12">RETENCIONES</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="5" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td scope="col"><div align="center" class="Estilo9">
      <div align="center" class="Estilo8">Retenci&oacute;n </div>
    </div>      <div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8"></div></td>
    <td scope="col"><div align="center"><span class="Estilo8"><span class="Estilo5">Base</span></span></div></td>
    <td width="58" scope="col"><div align="center" class="Estilo8">Porcentaje</div></td>
    <td width="48" scope="col"><div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8"><span class="Estilo5">Importe</span></div></td>
    <td width="85" scope="col"><div align="center" class="Estilo9"><span class="Estilo8">Neto</span></div>      
    <div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8"></div>      <div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8"></div></td>
  </tr>
<?
	$bande1=2;
	}
	else{
	

  if (!$result_ret) die("fallo".$db->ErrorMsg());
  while (!$result_ret->EOF) {

$motivo= $result_ret->fields["motivo"];


switch ($motivo) {
	case "10": {

$total_bruto= $result_ret->fields["importe"];
$gastos_adm= $result_ret->fields["porcentaje"];
?>


<tr class="Estilo7">
    <td height="21" class="Estilo2" scope="col"><span class="Estilo10">Sub-Total Sujeto a Retenciones</span></td>
    <td class="Estilo2" scope="col">&nbsp;</td>
    <td valign="top" class="Estilo2" scope="col"><div align="center"></div></td>
    <td valign="top" class="Estilo2" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td scope="col"><div align="right"><span class="Estilo2">$ <?ECHO number_format($total_bruto,2);?></span></div></td>
  </tr><?
		break;
	}

		case "20": {

$retencion_gastos_adm= $result_ret->fields["importe"];
?>  <tr class="Estilo7">
    <td width="260" height="20" class="Estilo2" scope="col"><span class="Estilo10">Gastos Administrativos:       </span>      <div align="center" class="Estilo10"></div></td>
    <td width="132" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo10"><?ECHO number_format($total_bruto,2);?></span></div></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo10"><?ECHO number_format($gastos_adm,2)." %";?>  </span></div></td>
    <td class="Estilo2" scope="col"><div align="center" class="Estilo10">
      <span class="Estilo10">$ 
    <?
	$total_bruto = $total_bruto - $retencion_gastos_adm;
	ECHO number_format($retencion_gastos_adm,2);?>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2">$ <?ECHO number_format($total_bruto,2);?></span> </div>
<?
		break;
	}

		case "30": {

$retencion_gastos_dgi= $result_ret->fields["importe"];
?>  
  <tr class="Estilo7">
    <td width="260" height="20" class="Estilo2" scope="col"><span class="Estilo10">DGI Retención:       </span>      <div align="center" class="Estilo10"></div></td>
    <td width="132" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo10"><?ECHO number_format($total_bruto,2);?></span></div></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo10"><?ECHO number_format($gastos_dgi,2)." %";?>  </span></div></td>
    <td valign="top" class="Estilo2" scope="col"><div align="center" class="Estilo10">
      <span class="Estilo10">$ 
    <?
	$total_bruto = $total_bruto - $retencion_gastos_dgi;
	ECHO number_format($retencion_gastos_dgi,2);?>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2">$ <?ECHO number_format($total_bruto,2);?></span> </div>
<?
		break;
	}


		case "40": {

$retencion_gastos_dgr= $result_ret->fields["importe"];
?>  
  <tr class="Estilo7">
    <td width="260" height="20" class="Estilo2" scope="col"><span class="Estilo10">DGR Retención:       </span>      <div align="center" class="Estilo10"></div></td>
    <td width="132" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo10"><?ECHO number_format($total_bruto,2);?></span></div></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo10"><?ECHO number_format($gastos_dgr,2)." %";?>  </span></div></td>
    <td valign="top" class="Estilo2" scope="col"><div align="center" class="Estilo10">
      <span class="Estilo10">$ 
    <?
	$total_bruto = $total_bruto - $retencion_gastos_dgr;
	ECHO number_format($retencion_gastos_dgr,2);?>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2">$ <?ECHO number_format($total_bruto,2);?></span> </div>
<?
		break;
	}


} // cierra case clases de retencion


$result_ret->MoveNext(); //mueve registro matricula

}
$result2->MoveNext();


?>
<tr class="Estilo7">
  <td class="Estilo2" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td class="Estilo2" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td colspan="3" class="Estilo2" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7"><td class="Estilo2" scope="col"><div align="right" class="Estilo2">Sub -Total descontando las Retenciones:</div></td>
  <td class="Estilo2" scope="col">&nbsp;</td>
  <td class="Estilo2" scope="col">&nbsp;</td>
  <td class="Estilo2" scope="col"><div align="center"><span class="Estilo10">$ <?ECHO number_format($total_bruto,2);?>
  </span></div></td>
  <td scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo10">
      $ <?

//$total_bruto = $total_bruto - ($retencion_gastos_adm);

  
  ECHO number_format($total_bruto,2);?>
    </span></div>
  </div></td>
  </tr>
<tr class="Estilo2">
  <td colspan="5" class="Estilo2" scope="col"><hr noshade></td>
  </tr>
</table>

<?
$result2->MoveNext();

}

break;}

case "900":
	{


	include ("../../../conexiones/config_liq.php");
$sql_nov = "SELECT * FROM `liquidacion` WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` = '$anio' and periodo = $periodo and nro_liquidacion = $nro_liquidacion and operacion = 900";
$result_nov = $db->Execute($sql_nov);


?>	

	<table width="608" border="0">
  <tr bgcolor="#C9FADF">
    <td colspan="10" scope="col"><div align="center" class="Estilo12">ACREDITACIONES Y DESCUENTOS</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="10" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td width="63" class="Estilo5" scope="col"><div align="center" class="Estilo4 Estilo3"><span class="Estilo5">Fec. Mov. </span></div></td>
    <td colspan="3" class="Estilo5" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Motivo</span></div></td>
    <td width="59" class="Estilo5" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Comp.</span></div></td>
    <td width="59" class="Estilo5" scope="col"><div align="center" class="Estilo5">Fec. Orig<span class="Estilo7 ">.</span></div></td>
    <td width="61" class="Estilo5" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Debitos</span></div></td>
    <td width="45" class="Estilo5" scope="col"><div align="center" class="Estilo5">Cr&eacute;dito</div></td>
    <td colspan="2" class="Estilo5" scope="col"><div align="center" class="Estilo5"><span class="Estilo5">Neto</span></div></td>
  </tr>

  <tr>
    <td class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $fecha_liquidacion;?></span></td>
    <td colspan="6" class="Estilo2" scope="col"><span class="Estilo7">SUB - TOTAL NETO DE RETENCIONES </span></td>
    <td class="Estilo2" scope="col"><div align="center"></div></td>
    <td colspan="2" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">$ <?ECHO number_format($total_bruto,2);?></span></div></td>
  </tr>
<?
	
	



break;
	}


case "1000":
	{

if ($bande2 == 1){
	include ("../../../conexiones/config_liq.php");
$sql_nov = "SELECT * FROM `liquidacion` WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` = '$anio' and periodo = $periodo and nro_liquidacion = $nro_liquidacion and operacion = 1000";
$result_nov = $db->Execute($sql_nov);


  if (!$result_nov) die("fallo".$db->ErrorMsg());
  while (!$result_nov->EOF) {

$fecha= $result_nov->fields["fecha"];
$comprobante= $result_nov->fields["nro_factura"];
$motivo= $result_nov->fields["motivo"];
$importe= $result_nov->fields["importe"];
$transaccion = $result_nov->fields["tipo_pago"];

?>
  <tr>
    <td class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $fecha_liquidacion;?></span></td>
    <td colspan="3" class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $motivo;?></span></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $comprobante;?></span></div></td>
    <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $fecha;?></span></div></td>


<?	switch ($transaccion){
case "TR_NEGATIVA"://novedades al debito
		{
			$total_bruto = $total_bruto - $importe;
?><td class="Estilo7" scope="col"><div align="center"><span class="Estilo7">$ <?ECHO number_format($importe,2);?></span></div></td>
<td class="Estilo7" scope="col"><div align="center"><span class="Estilo7"> - <? number_format($importe,2);?></span></div></td>
<td width="47" scope="col"><div align="right"><span class="Estilo7">$ <?ECHO number_format($total_bruto,2);?></span></div></td>
  </tr>
<?	


		break;}

case "TR_POSITIVA":{
				$total_bruto = $total_bruto + $importe;
?><td class="Estilo7" scope="col"><div align="center"><span class="Estilo7"> - <? number_format($importe,2);?></span></div></td>
<td class="Estilo7" scope="col"><div align="center"><span class="Estilo7">$ <?ECHO number_format($importe,2);?></span></div></td>
<td width="47" scope="col"><div align="right"><span class="Estilo7">$ <?ECHO number_format($total_bruto,2);?></span></div></td>
  </tr>
<?
		break;}
}




$result_nov->MoveNext(); //mueve registro matricula

}
?></table>
	<?
$result2->MoveNext();

}


	break;
	}

	case "1100":{
include ("../../../conexiones/config_liq.php");
$sql_acr = "SELECT * FROM `liquidacion` WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` = '$anio' and periodo = $periodo and nro_liquidacion = $nro_liquidacion and operacion = 1100";
$result_acr = $db->Execute($sql_acr);

$nro_laboratorio= $result_acr->fields["nro_laboratorio"];
$total_bruto= $result_acr->fields["importe"];




include ("../../../conexiones/config.inc.php");
 $sql_facturante = "SELECT * FROM `facturante` WHERE `nro_laboratorio` = $nro_laboratorio";
$result_facturante = $db->Execute($sql_facturante);

$banco= $result_facturante->fields["banco"];
$nro_cuenta= $result_facturante->fields["nro_cuenta"];
$cuenta= $result_facturante->fields["cuenta"];

$sucursal = substr($nro_cuenta,0,3);
$nro_cuenta = substr($nro_cuenta,4,6);

?>

<table width="608" border="0">
<tr class="Estilo2">
  <td colspan="10" scope="col">&nbsp;</td>
  </tr>
<tr class="Estilo2">
  <td colspan="10" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="7" scope="col"><strong>IMPORTE ACREDITADO EN BANCO</strong><span class="Estilo15"><strong>:</strong></span><strong><?ECHO $banco;?> - SUCURSAL: </strong><strong><?ECHO $sucursal;?> - TIPO:</strong><strong> <?ECHO $cuenta;?> - N&ordm;: <?ECHO $nro_cuenta;?> </strong></td>
  <td colspan="3" scope="col"><div align="right" class="Estilo15"><strong><span class="Estilo7">$ <?ECHO number_format($total_bruto,2);?></span></strong></div></td>
  </tr></table>
<?


	break;}






}//CIERRA TODOS LOS CASE

//---------------------------------deudas------------------------------------------


$result2->MoveNext(); //mueve registro matricula

}
?>
<H1 class=SaltoDePagina> </H1>
<table width="608" border="0">
<tr class="Estilo2">
  <td colspan="10" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo2">
  <td colspan="10" scope="col">&nbsp;</td>
</tr>
<tr bgcolor="#C9FADF" class="Estilo6">


  <td colspan="10" scope="col"><div align="center" class="Estilo12">ESTADO DE CTA CTE POR OPERACIONES ADEUDADAS </div></td>
</tr>
<tr bgcolor="#FFFFFF" class="Estilo6">
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<tr class="Estilo8">
  <td bgcolor="#000099" class="Estilo5" scope="col">Fecha</td>
  <td width="73" bgcolor="#000099" class="Estilo5" scope="col">Operacion</td>
  <td width="44" bgcolor="#000099" class="Estilo5" scope="col">Comp.</td>
  <td width="53" bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Fec. Orig</div></td>
  <td bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Importe</div></td>
  <td bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Dto x Liq</div>    </td>
  <td bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Fec. Caja</div></td>
  <td colspan="2" bgcolor="#000099" class="Estilo5" scope="col">Pago Caja </td>
  <td width="65" bgcolor="#000099" class="Estilo5" scope="col"><div align="center">Saldo </div></td>
</tr>
<?

include ("../../../conexiones/config_liq.php");
$sql_deuda = "SELECT * FROM `deudas` WHERE `nro_laboratorio` = $nro_laboratorio";
$result_deuda = $db->Execute($sql_deuda);

  if (!$result_deuda) die("fallo".$db->ErrorMsg());
  while (!$result_deuda->EOF) {

$fecha_origen= $result_deuda->fields["fecha_origen"];
$importe= $result_deuda->fields["importe_original"];
$nro_factura= $result_deuda->fields["nro_factura"];
$importe_pagado= $result_deuda->fields["importe_pagado"];
$saldo= $result_deuda->fields["saldo"];


$cod_ajuste= $result_deuda->fields["cod_movimiento"];

include ("../../../conexiones/config_cont.php");
 $sql_ajuste = "SELECT ajuste FROM `ajustes` WHERE `cod_ajuste` = $ajuste and `tipo_ajuste` = '$transaccion'";
$result_ajuste = $db->Execute($sql_ajuste);

$motivo= $result_ajuste->fields["ajuste"];

$hoy = date("d/m/y");
	?>



<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><?echo $hoy;?></td>
  <td bgcolor="#FFFFFF" class="Estilo17" scope="col"><?echo $motivo;?></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><?echo $nro_factura;?>
    <div align="center"></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="center"><span class="Estilo2"><?echo $fecha_origen;?></span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="center"><span class="Estilo2">$ <?echo $importe;?></span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="center"><span class="Estilo2">$ <?echo $importe_pagado;?></span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right"><span class="Estilo2">$ <?echo $saldo;?></span></div></td>
</tr>






<?
	$importe_total = $importe_total + $importe;
	$importe_pagado_total = $importe_pagado_total + $importe_pagado;
	$saldo_total = $saldo_total + $saldo;

  $result_deuda->MoveNext();
	}


?>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo17" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td colspan="6" bgcolor="#FFFFFF" class="Estilo2" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo2">
  <td colspan="4" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right">Total:</div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="center">$ <?echo $importe_total;?></div></td>

  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="center">$ <?echo $importe_pagado_total;?></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col">&nbsp;</td>
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="center">$ </div></td>
  <td bgcolor="#FFFFFF" class="Estilo2" scope="col"><div align="right">$ <?echo $saldo_total;?>
    </div></td>
</tr>
<tr class="Estilo2">
  <td colspan="10" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><hr noshade></td>
  </tr>
</table>



</body>