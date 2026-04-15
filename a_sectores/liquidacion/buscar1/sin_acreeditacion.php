<?php 

$sql12="select * from liquidacion where `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion and operacion = 2000 order by operacion, motivo";
$result12 = $db->Execute($sql12);
$ope=strtoupper($result12->fields["operacion"]);

if ($ope == ""){

?>


<table width="641" border="0">
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<tr>
  <td colspan="10" bordercolor="#000000" bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo6">
    <div align="center"><strong>LIQUIDACION SIN ACREDITACION</strong></div>
  </div></td>
</tr>
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr>

<?php $acree = 2;

$pasada = "";
}else{

	$acree = 2;

?><table width="641" border="0"><tr>
    <td class="Estilo2" scope="col"><div align="center"></div></td>
    <td colspan="3" class="Estilo7" scope="col"><div align="right"><span class="Estilo7">  
</span></div>      <div align="right">
    <hr noshade>
      </div><div align="right">
</div></td>
</tr>
  <tr>
    <td class="Estilo2" scope="col"><div align="left"><span class="Estilo5"><span class="Estilo25">SUB - TOTAL ACREEDITACIONES Y DESCUENTOS </span></span></div></td>
    <td width="92" class="Estilo7" scope="col"><div align="right">
     -<?php  ECHO number_format($total_neg,2);?>
    </div></td>
    <td width="73" class="Estilo7" scope="col"><div align="right">
      <?php ECHO  number_format($total_pos,2);?>
    </div></td>
    <td width="73" scope="col"><div align="right"><span class="Estilo7"><strong><?php  echo number_format($saldo_novedades,2);?></strong></span></div></td>
  </tr>
</table>
<table width="641" border="0">
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<tr>
  <td colspan="10" bordercolor="#000000" bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo6">
    <div align="center"><strong>LIQUIDACION SIN ACREDITACION, CON DEUDA</strong></div>
  </div></td>
</tr>
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr></table>

<table width="641" border="0">

<tr bgcolor="#FFFFFF" class="Estilo6">
  <td colspan="9" scope="col"><div align="center" class="Estilo12">ESTADO DE CTA CTE POR OPERACIONES ADEUDADAS A LA ASOCIACION BIOQUIMICA DE MENDOZA</div></td>
</tr>
	
<tr class="Estilo6 Estilo4 Estilo9">
  <td colspan="10" bgcolor="#FFFFFF" class="Estilo6 Estilo4 Estilo9"  scope="col"><CENTER><STRONG>CUENTA: <?php echo $nombre_laboratorio;?>  <BR>
  <BR>
  </STRONG>
  </CENTER></td>
</tr>
<tr bgcolor="#FFFFFF" class="Estilo8">
  <td colspan="9" class="Estilo5 Estilo9" scope="col"><div align="center"><STRONG>DETALLE DE LA DEUDA </STRONG></div></td>
  </tr>
<tr bgcolor="#E6E6E6" class="Estilo8">
  <td class="Estilo5 Estilo9" scope="col">Fecha orig.</td>
  <td width="182" class="Estilo5 Estilo9" scope="col">Operacion</td>
  <td width="38" class="Estilo5 Estilo9" scope="col">Comp.</td>
  <td class="Estilo5" scope="col"><div align="center" class="Estilo9">Importe</div></td>
  <td class="Estilo5" scope="col"><div align="center" class="Estilo9">Dto x Liq</div>    </td>
  <td class="Estilo5" scope="col"><div align="center" class="Estilo9">Fec. Caja</div></td>
  <td colspan="2" class="Estilo5 Estilo9" scope="col">Pago Caja </td>
  <td width="70" class="Estilo5" scope="col"><div align="center" class="Estilo9">Saldo Deudor</div></td>
</tr>
</table>
<?php 

	$pasada = "";
}