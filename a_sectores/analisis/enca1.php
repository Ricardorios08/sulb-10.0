<style type="text/css">
<!--
.Estilo1 {font-weight: bold}
.Estilo2 {font-weight: bold}
.Estilo3 {font-weight: bold}
.Estilo4 {font-weight: bold}
-->
</style>





 
<table width="850" border="0" cellspacing="0">
  <tr bgcolor="#CECECE">
    <td colspan="4"><div align="center"><img src="../../imagenes/titulo_personal.jpg"></div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo50">
      <div align="right">NOMBhhRE Y APELLIDO DEL PACIENTE: </div>
    </div></td>
    <td width="12" colspan="-3">&nbsp;</td>
    <td width="240"><div align="center" class="Estilo50 Estilo2">
      <div align="left">
	  
	  <a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><?php echo $apellido;?> <?php echo $nombre;?> <?php echo $nro_paciente;?></a>


	</div>
    </div></td>
    <td width="298" rowspan="5"><div align="center"><a href="emision/emision_pdf.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><img src="../../imagenes/bt_informe.png" alt="Informe" border = "0"></a></div></td>
  </tr>
  <tr>
    <td valign="middle"><div align="center" class="Estilo50">
      <div align="right">PROTOCOLO:</div>
    </div></td>
    <td colspan="-3">&nbsp;</td>
    <td><div align="center" class="Estilo50 Estilo2">
      <div align="left"><?php echo $cod_grabacion;?></div>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo50">
      <div align="right">DOCUMENTO:</div>
    </div></td>
    <td colspan="-3">&nbsp;</td>
    <td><div align="center" class="Estilo50 Estilo3">
      <div align="left"><?php echo $nro_documento;?></div>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo50">
      <div align="right">FECHA:</div>
    </div></td>
    <td colspan="-3">&nbsp;</td>
    <td><div align="center" class="Estilo50 Estilo4"><strong>
      <div align="left"><?php echo $fecha;?></div>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo50">
      <div align="right">OBRA SOCIAL:</div>
    </div></td>
    <td colspan="-3">&nbsp;</td>
    <td><div align="left"><strong><span class="Estilo51"><span class="Estilo50"><?php echo $sigla;?> <?php echo $nro_os;?></span></span></strong></div></td>
  </tr>
 
</table>
</form>

