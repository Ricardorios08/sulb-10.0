<?

$sql12="select * from liquidacion where `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion and operacion = 2000 order by operacion, motivo";
$result12 = $db_liq->Execute($sql12);
$ope=strtoupper($result12->fields["operacion"]);

if ($ope == ""){

?>



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

<?$acree = 2;

$pasada = "";
}else{

	$acree = 2;

?><tr>
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
     -<? ECHO number_format($total_neg,2);?>
    </div></td>
    <td width="73" class="Estilo7" scope="col"><div align="right">
      <?ECHO  number_format($total_pos,2);?>
    </div></td>
    <td width="73" scope="col"><div align="right"><span class="Estilo7"><strong><? echo number_format($saldo_novedades,2);?></strong></span></div></td>
  </tr>

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
</tr>
<?

	$pasada = "";
}