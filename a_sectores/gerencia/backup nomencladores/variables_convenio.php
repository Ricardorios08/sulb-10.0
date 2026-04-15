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

include ("../../../conexiones/config_os.php");
global $a;
 $a;

$periodo=$_REQUEST['periodo'];
$anio=$_REQUEST['anio'];
$nro_os=$_REQUEST['nro_os'];

 $hoy=$_REQUEST['hoy'];
$periodo=$_REQUEST['periodo'];
 $anio=$_REQUEST['anio'];
$nombre_arancel=$_REQUEST['nombre_arancel'];
 $observaciones=$_REQUEST['detalle'];
 

$a = $nro_os;




$sql="select * from datos_os where nro_os like $a";
$result = $db->Execute($sql);

$denominacion=strtoupper($result->fields["denominacion"]);
$sigla=strtoupper($result->fields["sigla"]);
$inscripcion=strtoupper($result->fields["inscripcion"]);
$cuit=strtoupper($result->fields["cuit"]);
$domicilio_l=strtoupper($result->fields["domicilio_l"]);
$localidad_l=strtoupper($result->fields["localidad_l"]);
$cod_area_l=strtoupper($result->fields["cod_area_l"]);
$telefono_l=strtoupper($result->fields["telefono_l"]);
$telefax_l=strtoupper($result->fields["telefax_l"]);
$email_l=strtoupper($result->fields["email_l"]);
$domicilio_n=strtoupper($result->fields["domicilio_n"]);
$cod_area_n=strtoupper($result->fields["cod_area_n"]);
$telefono_n=strtoupper($result->fields["telefono_n"]);
$telefax_n=strtoupper($result->fields["telefax_n"]);
$email_n=strtoupper($result->fields["email_n"]);
$nro_prestador=strtoupper($result->fields["nro_prestador"]);
$contacto=strtoupper($result->fields["contacto"]);
$nivel=strtoupper($result->fields["nivel"]);
$cargo=strtoupper($result->fields["cargo"]);

$sql6="select * from convenios where nro_os like '$a'";
$result6 = $db->Execute($sql6);

$inicio=strtoupper($result6->fields["inicio"]);
$dia = substr($inicio,0,2);
$mes = $inicio{3}.$inicio{4};
$año= substr($inicio,-2,2);

$fin=strtoupper($result6->fields["fin"]);
$dia_2 = substr($fin,0,2);
$mes_2 = $fin{3}.$fin{4};
$año_2= substr($fin,-2,2);

$tipo=strtoupper($result6->fields["tipo"]);

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
$dia_3 = substr($vencimiento,0,2);

$mes_3 = $vencimiento{3}.$vencimiento{4};
$año_3= substr($vencimiento,-2,2);;
 

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
$coseguro_esp=strtoupper($result4->fields["coseguro_esp"]);
$valor_porc_esp=strtoupper($result4->fields["valor_porc_esp"]);
$coseguro_comp=strtoupper($result4->fields["coseguro"]);
$valor_porc_comp=strtoupper($result4->fields["valor_porc_comp"]);
$iva=strtoupper($result4->fields["iva"]);

$gastos=strtoupper($result4->fields["gastos"]);
$honorarios=strtoupper($result4->fields["honorarios"]);
$operacion=strtoupper($result4->fields["operacion"]);

$porcentaje_total=strtoupper($result4->fields["porcentaje_total"]);
$denominacion_ajuste=strtoupper($result4->fields["denominacion_ajuste"]);
$operacion_orden=strtoupper($result4->fields["operacion_orden"]);

 $sql5="select * from op_practicas where nro_os like '$a'";
$result5 = $db->Execute($sql5);

$efector=strtoupper($result5->fields["efector"]);
$prescriptor=strtoupper($result5->fields["prescriptor"]);
$afiliado=strtoupper($result5->fields["afiliado"]);




