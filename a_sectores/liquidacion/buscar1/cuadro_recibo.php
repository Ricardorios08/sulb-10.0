<table width="641" height="120" border="1" cellpadding="1" cellspacing="0">

<tr bgcolor="#CCCCCC" class="Estilo2">
  <td height="38" colspan="2" class="Estilo2"  scope="col"><div align="center" class="Estilo6 Estilo4 Estilo9"><strong>RECIBO</strong></div></td>
</tr>
<tr class="Estilo2">
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo6"></div>    
    <div align="left"><span class="Estilo6"><STRONG>BRUTO SUJETO A RETENCIONES <?echo number_format($bruto_sujeto_a,2);?></STRONG></span></div></td>
  </tr>
<tr class="Estilo2">
  <td width="529" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo6"> EXENTO </div></td>
  <td width="102" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo23"><STRONG><span class="Estilo6"><span class="Estilo12">&nbsp;&nbsp;<?echo number_format($total_exento,2);?></span></span></STRONG></span></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo6">NETO GRAVADO</div></td>
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo23"><STRONG><span class="Estilo6"><span class="Estilo12">&nbsp;&nbsp;<?echo number_format($total_neto_gravado,2);?></span></span></STRONG></span></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo6">IVA</span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo23"><STRONG>&nbsp;<span class="Estilo12">&nbsp;<strong><?echo number_format($total_iva,2);?></strong></span></STRONG></span></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC"   scope="col"><div align="right"></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo12"><strong>TOTAL</strong></div></td>
  <td bgcolor="#FFFFFF"   scope="col"><div align="right"><span class="Estilo12">&nbsp;&nbsp;<?echo number_format($total,2);?></STRONG></span></div></td>
</tr>
</table>