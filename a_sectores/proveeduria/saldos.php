<?php
include("../../conexiones/config.inc.php");

$cuenta_ab=$_POST["cuenta_abm"];
for ($i=0;$i<count($cuenta_ab);$i++)    
{     
$cuenta_abm = $cuenta_ab[$i];    
}
 $cuenta_abm;


$contra=$_POST["contra"];

if ($contra != "321"){
$leyenda = "NO ESTA AUTORIZADO A REALIZAR ESTA CONSULTA";
include("../../alertas/campo_informacion2.php");
exit;
}

require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('variable1'=>$cuenta_abm , 'variable2'=>$hasta);
 $response= $client->call('proveeduria_facturas', $param1);

   $sql = "TRUNCATE TABLE facturas_provee";
 $result = $db->Execute($sql);


   $a = "INSERT INTO facturas_provee (`cuenta`, `tipo_cuenta`, `tipo_fact`, `comprobante`, `fecha_emision`, `importe_original`, `fecha_pago`, `saldo`, `vencimiento`, `cuotas`, `cuotas_pagadas`, `cod_movimiento`) VALUES ".$response.";";
$result = $db->Execute($a);


//




$sql="select * from facturas_provee where saldo > 0 and cuenta = $cuenta_abm order by fecha_emision, comprobante";
$result = $db->Execute($sql);

$tipo_cuenta=strtoupper($result->fields["tipo_cuenta"]);


?>
<table width="850"  border="0">
  <tr bordercolor="#FFFFCC" bgcolor="#000099">
    <td colspan="12" bgcolor="#B8B8B8"><div align="right"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong> DETALLE COMPOSICION DE SALDO PROVEEDURIA </strong> <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td colspan="8"><font face="Arial, Helvetica, sans-serif"><strong><font size="2"><?php print("$palabra");?> - <?php print("$denominacion");?></font></strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">

	<td width="10%" height="19" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">FECHA</font></div></td>
    <td width="15%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">MOVIMIENTO</font></div></td>

    <td width="6%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">CUENTA</font></div></td>
    <td width="10%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">COMPROBANTE</font></div></td>


	<td width="12%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">IMPORTE ORIGINAL </font></div></td>
    <td width="16%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">FECHA DE PAGO </font></div></td>

<td width="19%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">SALDO</font></div></td>
<td width="12%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">AC. SALDO</font></div></td>
</tr>

  <?php 



$anio_actual = date("y");
$mes_actual = date ("m");



  if (!$result) die("fallo".$db_pro->ErrorMsg());
  while (!$result->EOF) {


	

$cuenta=strtoupper($result->fields["cuenta"]);
 
$comprobante=strtoupper($result->fields["comprobante"]);
$precio=strtoupper($result->fields["importe"]);
$cod_movimiento=strtoupper($result->fields["cod_movimiento"]);
$importe_original=strtoupper($result->fields["importe_original"]);
 
$tipo_fact=strtoupper($result->fields["tipo_fact"]);
$saldo=strtoupper($result->fields["saldo"]);



$vencimiento=strtoupper($result->fields["vencimiento"]);
$cuotas=strtoupper($result->fields["cuotas"]);
$cuotas_pagadas=strtoupper($result->fields["cuotas_pagadas"]);

$saldo_acumulado = $saldo + $saldo_acumulado;


$fecha_emision=strtoupper($result->fields["fecha_emision"]);

$dia = substr($fecha_emision,8,2);
$mes = substr($fecha_emision,5,2);
$anio  = substr($fecha_emision,0,4);
$fecha_emision = $dia."/".$mes."/".$anio;



$fecha_pago=strtoupper($result->fields["fecha_pago"]);
$dia = substr($fecha_pago,8,2);
$mes = substr($fecha_pago,5,2);
$anio  = substr($fecha_pago,0,4);
$fecha_pago = $dia."/".$mes."/".$anio;

if ($fecha_pago == '00/00/0000'){

$fecha_pago = 'Sin Descontar';
}

?>
    <tr><td bgcolor="#FFFFFF"><div align="center"><font size="2"><?php print("$fecha_emision");?></font></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><font size="2"><?php print("$cod_movimiento");?></font></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><font size="2"><?php print("$cuenta");?></font></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><font size="2"><?php print("$comprobante");?></font></div></td>
	<td bgcolor="#FFFFFF"><div align="center"><font size="2">$ <?php echo number_format($importe_original,2);?></font></div></td>
<td bgcolor="#FFFFFF"><div align="center"><font size="2"><?php echo $fecha_pago;?></font></div></td>
	<td bgcolor="#FFFFFF"><div align="center"><font size="2"> $ <?php echo number_format($saldo,2);?></font></div></td>
	<td bgcolor="#FFFFFF"><div align="center"><font size="2"> $ <?php echo number_format($saldo_acumulado,2);?></font></div></td>
</tr>   
  
<?php 
	
	
$result->MoveNext();
	}
  

?>

<tr bgcolor="#C4D7E6">
    <td colspan="8" bgcolor="#B8B8B8"><div align="right"><font color="#FFFFFF" size="3"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">TOTAL $ <?php echo number_format($saldo_acumulado,2);?></font></strong></font></div></td>
  </tr>
</table>
 