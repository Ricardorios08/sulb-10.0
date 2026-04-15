 <?php

global $inicio;
global $fin;
global $tipo;
global $modalidad;
global $ug;
global $uh;
global $prorrateo;
global $cuota;
global $porcentaje;
global $porcentaje_cuota;
global $vencimiento;
global $antiguedad;
global $interes;
global $plan;
global $material_descartable;
global $acto_bioquimico;
global $toma_muestra;
global $detalle;
global $post_factura;
global $separacion;
global $coseguro;
global $valor_porcentaje;
global $gastos;
global $honorarios;
global $operacion;
global $efector;
global $prescriptor;
global $afiliado;

$fecha = date("d/m/y");
include ("../../conexiones/config_os.php");
global $a;
$a=$_REQUEST['id'];

/* $sql6="select * from convenios where nro_os like '$a'";
$result6 = $db->Execute($sql6);

$inicio=strtoupper($result6->fields["inicio"]);
$fin=strtoupper($result6->fields["fin"]);
$tipo=strtoupper($result6->fields["tipo"]);

 $sql9="select * from datos_os where nro_os like '$a'";
$result9 = $db->Execute($sql9);

$denominacion=strtoupper($result9->fields["denominacion"]);
$sigla=strtoupper($result9->fields["sigla"]);



$sql="select * from arancel where nro_os like '$a'";
$result = $db->Execute($sql);

$modalidad=strtoupper($result->fields["modalidad"]);
$ug=strtoupper($result->fields["ug"]);
$uh=strtoupper($result->fields["uh"]);
$nomenclador=strtoupper($result->fields["nomenclador"]);


 $sql1="select * from capitacion where nro_os like '$a'";
$result1 = $db->Execute($sql1);

$prorrateo=strtoupper($result1->fields["prorrateo"]);
$cuota=strtoupper($result1->fields["cuota"]);
$porcentaje=strtoupper($result1->fields["porcentaje"]);
$porcentaje_cuota=strtoupper($result1->fields["porcentaje_cuota"]);


 $sql2="select * from forma_pago where nro_os like '$a'";
$result2 = $db->Execute($sql2);

$vencimiento=strtoupper($result2->fields["vencimiento"]);
$antiguedad=strtoupper($result2->fields["antiguedad"]);
$interes=strtoupper($result2->fields["interes"]);
$plan=strtoupper($result2->fields["plan"]);


 $sql3="select * from incremento where nro_os like '$a'";
$result3 = $db->Execute($sql3);

$material_descartable=strtoupper($result3->fields["material_descartable"]);
$acto_bioquimico=strtoupper($result3->fields["acto_bioquimico"]);
$toma_muestra=strtoupper($result3->fields["toma_muestra"]);

 $sql4="select * from op_facturacion where nro_os like '$a'";
$result4 = $db->Execute($sql4);

$detalle=strtoupper($result4->fields["detalle"]);
$post_factura=strtoupper($result4->fields["post_factura"]);
$separacion=strtoupper($result4->fields["separacion"]);
$coseguro=strtoupper($result4->fields["coseguro"]);
$valor_porcentaje=strtoupper($result4->fields["valor_porcentaje"]);
$gastos=strtoupper($result4->fields["gastos"]);
$honorarios=strtoupper($result4->fields["honorarios"]);
$operacion=strtoupper($result4->fields["operacion"]);


 $sql5="select * from op_practicas where nro_os like '$a'";
$result5 = $db->Execute($sql5);

$efector=strtoupper($result5->fields["efector"]);
$prescriptor=strtoupper($result5->fields["prescriptor"]);
$afiliado=strtoupper($result5->fields["afiliado"]);

*/
$bande_variables = 2;
include ("variables_convenio.php");
?>
<style type="text/css">
<!--
.Estilo1 {font-style: italic}
.Estilo2 {
	font-size: 24px;
	font-weight: bold;
}
.Estilo3 {
	font-size: 10px;
	font-style: italic;
}
.Estilo4 {
	font-size: 10px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo6 {font-size: 10px; font-style: italic; font-family: Arial, Helvetica, sans-serif; }
.Estilo10 {
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo18 {font-size: x-small}
.Estilo19 {font-size: x-small; font-family: Arial, Helvetica, sans-serif; }
-->
</style>




<table width="103%" height="1024" border="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="28" colspan="11"><div align="center"><span class="Estilo2">Asociaci&oacute;n Bioqu&iacute;mica de Mendoza</span></div></td>
    <td height="28" colspan="3"><div align="right"><strong>Mendoza, <?echo $fecha;;?></strong></div></td>
  </tr>
  <tr bgcolor="#000000">
    <td height="21" colspan="14"><div align="center" class="Estilo10">
      <div align="left">DATOS DE OBRAS SOCIALES: </div>
    </div></td>
  </tr>
  <tr>
    <td height="20" colspan="7"><div align="right" class="Estilo4 Estilo18">
      <div align="left">Obra Social: <span class="Estilo5"><strong><?echo $denominacion;?></strong></span></div>
    </div>      </td>
    <td colspan="4"><div align="right" class="Estilo19">
        <div align="left">Sigla: <span class="Estilo5"><strong><?echo $sigla;?></strong></span></div>
    </div></td>
    <td width="3%"><div align="right" class="Estilo19">N&ordm;</div></td>
    <td colspan="2"><span class="Estilo19"><strong><?echo $a;?></strong></span></td>
  </tr>
  <tr>
    <td height="20" colspan="4"><div align="right" class="Estilo19">
      <div align="left">Incripcion: <span class="Estilo5"><strong><?echo $inscripcion;?></strong></span></div>
    </div>      </td>
    <td colspan="10" class="Estilo19">Cuit:<strong><?echo $cuit;?></strong></td>
  </tr>
  <tr>
    <td height="20" colspan="7"><div align="right" class="Estilo19">
      <div align="left">Domicilio Local: <span class="Estilo5"><strong><?echo $domicilio_l;?></strong></span></div>
    </div>      </td>
    <td colspan="6"><div align="right" class="Estilo19">
      <div align="left">Email: <span class="Estilo5"><strong><?echo $email_l;?></strong></span></div>
    </div>      
    </td>
    <td width="24%"><span class="Estilo19">@</span></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><div align="right" class="Estilo19">
      <div align="left">Cod Area<span class="Estilo5">: <strong><?echo $cod_area_l;?></strong></span></div>
    </div>      </td>
    <td colspan="3"><div align="right" class="Estilo19">
      <div align="left">Telefono: <strong><?echo $telefono_l;?></strong>:</div>
    </div>      <div align="left" class="Estilo19"></div></td>
    <td colspan="7"><div align="right" class="Estilo19">
      <div align="left">Telefax: <strong><?echo $telefax_l;?></strong></div>
    </div>      </td>
  </tr>
  <tr>
    <td height="20" colspan="7"><div align="right" class="Estilo19">
      <div align="left">Domicilio Nacional: <span class="Estilo5"><strong><?echo $domicilio_n;?></strong></span></div>
    </div>      </td>
    <td colspan="6"><div align="right" class="Estilo19">
      <div align="left">Email: <span class="Estilo5"><strong><?echo $email_n;?></strong></span></div>
    </div>      </td>
    <td><span class="Estilo19">@</span></td>
  </tr>
  <tr>
    <td height="20" colspan="4"><div align="right" class="Estilo19">
      <div align="left">Cod Area: <span class="Estilo5"><strong><?echo $cod_area_n;?></strong></span></div>
    </div>      </td>
    <td colspan="3"><div align="right" class="Estilo19">
      <div align="left">Telefono:<span class="Estilo5"><strong><?echo $telefono_n;?></strong></span></div>
    </div>      
    </td>
    <td colspan="7"><div align="right" class="Estilo19">
      <div align="left">Telefax: <span class="Estilo5"><strong><?echo $telefax_n;?></strong></span></div>
    </div>      
    </td>
  </tr>
  <tr>
    <td height="21" colspan="4"><span class="Estilo19">Contacto:<strong> <?echo $contacto;?></strong></span></td>
    <td colspan="3"><span class="Estilo19">N&ordm; Prestador: <strong><?echo $nro_prestador;?></strong></span></td>
    <td colspan="6"><div align="right" class="Estilo5 Estilo18">
      <div align="left">Nivel: <span class="Estilo5"><strong><?echo $nivel;?></strong></span></div>
    </div>      
    </td>
    <td><span class="Estilo19">Cargo<strong>: <?echo $cargo;?></strong></span></td>
  </tr>
  <tr>
    <td height="22" colspan="14"><HR noshade class="Estilo2"></td>
  </tr>
  <tr>
    <td height="21" colspan="14"><div align="left"><strong>VIGENCIA / TIPO DE VIGENCIA:</strong></div>      </td>
  </tr>
  <tr>
    <td height="21" colspan="5"><div align="left">Nomenclador:<strong> <?echo $nomenclador;?></strong></div></td>
    <td colspan="9"><div align="left">Tipo:<strong> <?echo $tipo;?></strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="5"><div align="left">Inicio: <strong><?echo $inicio;?></strong> </div></td>
    <td colspan="9">Fin: <strong><?echo $fin;?></strong> </td>
  </tr>
  <tr>
    <td height="22" colspan="14"><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="14"><div align="left"><strong>ARANCEL:</strong>Modalidad:<strong><?echo $modalida;?> </strong>/ U. Gastos:<strong> <?echo $ug;?> </strong>/ U. Bioqu&iacute;micos:<strong> <?echo $uh;?></strong></div></td>
  </tr>
  <tr>
    <td height="22" colspan="14"><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="14"><div align="left"><strong>TRATAMIENTO</strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="14"><div align="left">Material Descartable: 1 por <strong><?echo $mat;?></strong></div>      
    </td>
  </tr>
  <tr>
    <td height="21" colspan="14"><div align="left">Toma y Muestra:1 por<strong> <?echo $tom;?></strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="14"><div align="left">Acto Bioquimico:<strong><?echo $acto_bioquimico;?></strong></div>      </td>
  </tr>
  <tr>
    <td height="22" colspan="14"><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="14"><div align="left"><strong>CRITERIOS PARA FACTURAR </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="14"><div align="left">Separacion de Facturas: <strong><?echo $separacio;?></strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><div align="left">Coseguro Prac. Comunes </div>      <div align="right"></div></td>
    <td colspan="3"><strong><?$cosegur;?></strong>      <div align="right"></div></td>
    <td width="3%"><div align="right">N&ordm;</div></td>
    <td width="6%"><strong><?echo $valor_porcentaje;?></strong></td>
    <td colspan="5"><div align="center" class="Estilo3 Estilo5">OPCIONES DE COSEGURO </div></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><div align="left">Coseguro Prac. Especiales </div>      <div align="right"></div></td>
    <td colspan="3"><strong><?$coseguro_es;?></strong>      <div align="right"></div></td>
    <td><div align="right">N&ordm;</div></td>
    <td><strong><?echo $valor_porc_esp;?></strong></td>
    <td colspan="3"><div align="right" class="Estilo6">1. % por Practica</div></td>
    <td colspan="2"><div align="right" class="Estilo6">2. % por Orden </div></td>
  </tr>
  <tr>
    <td height="21" colspan="4" class=""><div align="left">Coseguro Alta Complejidad </div>      <div align="right"></div></td>
    <td colspan="3" class=""><strong><?$coseguro_com;?></strong>      <div align="right"></div></td>
    <td><div align="right">N&ordm;</div></td>
    <td class="Estilo1"><strong><?echo $valor_porc_esp;?></strong></td>
    <td colspan="3"><div align="right" class="Estilo6">3. Valor por Practica</div></td>
    <td colspan="2"><div align="right" class="Estilo4">4. Valor por Orden</div></td>
  </tr>
  <tr>
    <td height="22" colspan="14" ><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="14" ><div align="center"><strong>INCREMENTO A LAS UNIDADES </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="14"><div align="left">Porcentaje sobre Unidades Gastos: <strong><?echo $gastos;?> </strong>%</div></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class=""><div align="left">Porcentaje sobre Unidades de Bioquimicos: <strong><?echo $honorarios;?> </strong>%</div></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class=""><div align="left">Operacion:<strong>
      <?$operacion;?>
</strong></div></td>
  </tr>
  <tr>
    <td height="22" colspan="14" class=""><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class=""><div align="center"><strong>OPCIONES DE CONTROL </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class=""><div align="left">1. Efector:<strong>
      <?$efector;?>
    </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class=""><div align="left">2. Imprimir Detalle:<strong>
      <?$detalle;?>
    </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class=""><div align="left">3. Medios Magneticos <strong>
      <? $post_factura;?>
    </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class="">4. Prescriptor:<strong>
    <?$prescriptor;?>
    </strong></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class="">5. Afiliados:<strong>
    <?$afiliado;?>
    </strong></td>
  </tr>
  <tr>
    <td height="22" colspan="14" class=""><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class=""><div align="center"><strong>CAPITACION</strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="2" class="">Prorrateo:</td>
    <td width="8%" class=""><?echo $prorrateo;?></td>
    <td width="6%" class=""><div align="right">Cuota:</div></td>
    <td colspan="2" class=""><?echo $cuota;?></td>
    <td width="10%" class=""><div align="right">Valor:</div></td>
    <td colspan="2" class=""><?echo $porcentaje;?></td>
    <td colspan="2" class=""><div align="right">Porcentaje:</div></td>
    <td colspan="3" class=""><?echo $porcentaje_cuota;?></td>
  </tr>
  <tr>
    <td height="22" colspan="14" class=""><hr noshade></td>
  </tr>
  <tr>
    <td height="21" colspan="14" class=""><div align="center"><strong>FORMAS DE PAGO </strong></div></td>
  </tr>
  <tr>
    <td width="11%" height="21" class=""><div align="left">Vencimiento:</div></td>
    <td colspan="4" class=""><?$dia_3;?>      dias </td>
    <td width="10%" class="">Antiguedad:</td>
    <td colspan="2" class=""><?echo $antiguedad;?> </td>
    <td class="">Interes:</td>
    <td width="4%" colspan="" class=""><div align="LEFT"><?echo $interes;?>
</div></td>
    <td width="9%" class=""><div align="right">Plan:</div></td>
    <td colspan="3"  class=""><?echo $plan;?></td>
  </tr>
</table>
