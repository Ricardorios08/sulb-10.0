<style type="text/css">
<!--
.Estilo31 {font-family: Arial, Helvetica, sans-serif}
.Estilo32 {font-size: 12px}
.Estilo33 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>
<table width="92%" height="83" border="1">
  <tr bgcolor="#E1F2EF">
<td height="31" colspan="7"><div align="center" class="Estilo28"><span class="Estilo29 Estilo6"><strong>CONTROL AFILIADOS:    <strong>PERIODO: <? echo $mes." - ".$anio;?> OBRA SOCIAL: <? echo $sigla." - ".$nro_os;?> </strong>Emitido el:<strong><? echo $hoy;?></strong></span></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td width="5%" height="19"><div align="center" class="Estilo31 Estilo32">N&ordm;</div></td>
    <td width="10%" height="19"><div align="center" class="Estilo33">Orden</div></td>
    <td width="31%" height="19"> <div align="center" class="Estilo33">Laboratorio </div></td>
    <td width="14%" height="19"><div align="center" class="Estilo33">Afiliado</div></td>
    <td width="12%" height="19"><div align="center" class="Estilo33">Con Iva </div></td>
    <td width="10%"> <div align="center" class="Estilo33">Sin Iva </div></td>
    <td width="18%" height="19"><div align="center" class="Estilo33">Observaciones</div></td>
  </tr>
<?

include ("../../../conexiones/config_gb.php");		
$sql = "SELECT cod_grabacion, nro_afiliado, nro_orden, nro_laboratorio FROM `ordenes`  WHERE  `nro_os` = $nro_os AND `periodo` = $mes AND `ano`  LIKE '$anio' AND confirmada = 8  ORDER BY nro_laboratorio";
$result = $db->Execute($sql);


include ("../../../conexiones/config_os.php");	
if (!$result) die("fallo".$db->ErrorMsg());
 while (!$result->EOF) {


$nro_afiliado_orden=$result->fields["nro_afiliado"];
$cod_grabacion=$result->fields["cod_grabacion"];


$nro_orden=$result->fields["nro_orden"];
$nro_laboratorio=$result->fields["nro_laboratorio"];


include ("../../../conexiones/config.inc.php");
 $sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);


$nro1 = substr($nro_afiliado_orden,3,-5);
$nro1 = "00000000".$nro1;
	
 

$renglon = $renglon + 1;
?>
<tr bgcolor="#E8DCFC">
    <td width="5%" height="23"><div align="center" class="Estilo6 Estilo30 Estilo31 Estilo32"><?echo $renglon;?>
</div>
    <div align="center" class="Estilo33"></div></td>
	    <td width="10%" height="23"><div align="center" class="Estilo33"><?echo $nro_orden;?>
</div>
        <div align="center" class="Estilo33"></div></td>
	    <td width="31%" height="23"><span class="Estilo33"><?echo $nro_laboratorio;?> -  <? echo$nombre_laboratorio;?>
</span>
          <div align="center" class="Estilo33"></div></td>
	    <td width="14%" height="23"><div align="center" class="Estilo33"><?echo $nro_afiliado_orden;?></div>
        <div align="center" class="Estilo33"></div></td>
	    <td width="12%" height="23">	      <div align="center" class="Estilo31"></div></td>
	    <td width="10%" height="23">&nbsp;</td>
	    <td width="18%" height="23" colspan="7"><div align="center"></div></td>
</tr><?



$result->MoveNext(); 

 
 }


 

 
		
 

?> </table>
</html>

