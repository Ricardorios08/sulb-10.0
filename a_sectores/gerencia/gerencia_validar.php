<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
<!--
.Estilo3 {
	font-family: "Trebuchet MS";
	color: #FFFFFF;
}
-->
</style>
<link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo13 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo6 {color: #0000FF}
.Estilo14 {font-family: "Trebuchet MS"}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 12px}
-->
</style>
</head>

<body>

<?php $usuario = $_REQUEST['usuario'];
 ?>


<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">ABM</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>

  		<li><a href="../../a_sectores/gerencia/abm/abm.php?usuario=<?php print("$usuario");?>" target = "central">1. Presentación ABM</a></li>
		<li><a href="../../a_sectores/gerencia/datos_laboratorio/entrada_dato.php?usuario=<?php print("$usuario");?>" target = "central" title="Ingrese un nuevo convenio o modifique alguno">2. Datos Laboratorio</a></li>
		  		<li><a href="../../a_sectores/gerencia/osde/datos_osde.php?usuario=<?php print("$usuario");?>" target = "central">3. Datos ABM</a></li>
		<!-- <li><a href="../../a_sectores/gerencia/informe/datos_informe.php?usuario=<?php print("$usuario");?>" target = "central">3. Conf. Informe </a></li>
		<!-- <li><a href="../../a_sectores/gerencia/imagen/formulario.php?usuario=<?php print("$usuario");?>" target = "central" title="Ingrese un nuevo convenio o modifique alguno" >2. Ingresar Logo</a></li>  -->
		<!-- <li><a href="../../a_sectores/gerencia/informe/arranque_protocolo.php?usuario=<?php print("$usuario");?>" target = "central">4. Arranque Protocolo</a></li> -->
		<!-- <li><a href="../../a_sectores/gerencia/Valores de Referencia.pdf?usuario=<?php print("$usuario");?>" target = "central">5. Valores de Ref.</a></li>  -->

		<!-- <li><a href="../../a_sectores/gerencia/actualizar/actualizar.php" target = "central" title = "Busca Liquidaciones anteriores"                >3. Act. Convenios</a></li> -->
		<!-- <li><a href="../../a_sectores/mega/convenio/actualizar_precios.php" target = "central" onmouseover="window.status='Ingreso Nuevo Paciente';return true" onmouseout="window.status='';return true">7. Act. MEGA</a></li> -->

		<!-- <li><a href="../../a_sectores/mega/convenio/actualizar_requisitos.php" target = "central" onmouseover="window.status='Ingreso Nuevo Paciente';return true" onmouseout="window.status='';return true">8. Act. REQUISITOS</a></li> -->

		<!-- <li><a href="../../a_sectores/liquidacion/buscar/menu_buscar_liquidaciones.php" target ="izquierda" title = "Busca Liquidaciones anteriores" >9. Liquidaciones</a></li>
		<li><a href="../../a_sectores/proveeduria/saldos.php" target ="central" title = "Busca Liquidaciones anteriores" >10. Proveeduria</a></li>
		<li><a href="../../a_sectores/proveeduria/saldos_mega.php" target ="central" title = "Busca Liquidaciones anteriores" >11. Mega</a></li>
		<li><a href="../../a_sectores/exportar/excel/a/admin.php" target ="central" title = "Busca Liquidaciones anteriores" >12. Importar</a></li> -->


	<li><a href="../../a_sectores/gerencia/exportar/exportar.php" target ="central" title = "Busca Liquidaciones anteriores" >4. Exportar</a></li>
	<!-- <li><a href="../../a_sectores/gerencia/usuarios/usuario.php?usuario=<?php print("$usuario");?>" target ="central" title = "Busca Liquidaciones anteriores" >10. Usuarios</a></li> -->


		 


		<!-- <li><a href="../../a_sectores/gerencia/poo1.php" target = "central">5. POO.</a></li>	
        <li><a href="../../a_sectores/pacientes/grid/01-eye-php-datagrid-1.1/ex1.php" target = "central">1. GRID.</a></li>	
        <li><a href="../../a_sectores/pacientes/grid/01-eye-php-datagrid-1.1/ex2.php" target = "central">2. GRID.</a></li>	
        <li><a href="../../a_sectores/pacientes/grid/01-eye-php-datagrid-1.1/ex3.php" target = "central">3. GRID.</a></li>	
        <li><a href="../../a_sectores/pacientes/grid/01-eye-php-datagrid-1.1/ex4.php" target = "central">4. GRID.</a></li>	
        <li><a href="../../a_sectores/pacientes/grid/01-eye-php-datagrid-1.1/ex5.php" target = "central">5. GRID.</a></li>	
<li><a href="../../a_sectores/pacientes/grid/01-eye-php-datagrid-1.1/ex1-ajax.php" target = "central">5. GRID.</a></li>	
<li><a href="../../a_sectores/pacientes/grid/php_datagrid_class_4_2_8/index.html" target = "central">5. GRID.</a></li>	
<li><a href="../../a_sectores/pacientes/grid/apphp_tabs_102/code_example.php" target = "central">5. apID.</a></li> -->

<!-- <li><a href="../../a_sectores/gerencia/actualizar.php?usuario=<?php print("$usuario");?>" target = "central">4. Prueba</a></li> -->


<li><a href="../../a_sectores/proveeduria/elige_cuenta_liq.php" target ="central" title = "Busca Liquidaciones anteriores" >5. Liquidaciones</a></li>


		<li><a href="../../a_sectores/proveeduria/elige_cuenta.php" target ="central" title = "Busca Liquidaciones anteriores" >6. Proveeduria</a></li>
		<li><a href="../../a_sectores/proveeduria/elige_cuenta_mega.php" target ="central" title = "Busca Liquidaciones anteriores" >7. Mega</a></li>

<li><a href="../../a_sectores/actualizacion/compara_base.php" target = "central">8. Comparar Base </a></li>

		  </ul>
		</ul>
</div>
  

</body>
</html>

