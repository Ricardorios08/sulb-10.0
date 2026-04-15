<?php 
$buscador_rapido;
include ("../conexiones/config_pr.php");
$hoy = date("d-m-y");
?>
<font color="#FF0000"><strong>
</strong></font>
<table width="500" border="0">
  <tr>
    <td bgcolor="#E8DCFC" scope="col"><div align="center"><font face="Arial, Helvetica, sans-serif">Comparaci&oacute;n de una practica en todas las obras Sociales. <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr>
    <td width="344" bgcolor="#E6E6E6" scope="col"><div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif">N&ordm;<strong>
        <font color="#00CC00">
        <font color="#FF0000">
        <?php 
echo $palabra;
?>
        </font></font><font color="#FF0000"> </font></strong>-  Practica: </font> <font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"> <strong>
        <?php 

include ("../conexiones/config_pr.php");
	
	
	 $sql1="select * from convenio_practica  where cod_practica like '$palabra' order by cod_practica asc";
	$result = $db->Execute($sql1);


$practica =$result->fields["practica"];
echo $practica;






?> 
      </strong></font></div></td>
  </tr>
</table>
<font color="#FF0000"><strong>
</strong></font>
<table width="83%" height="58" border="0">
  <tr bordercolor="#0066FF" bgcolor="#E1F2EF"> 

    <td width="75%"><div align="center"><font color="#333333" face="Arial, Helvetica, sans-serif"><font size="2">Obra Social</font></font></div></td>
    <td width="25%"><div align="center"><font color="#333333" face="Arial, Helvetica, sans-serif"><font size="2">Valor</font></font></div></td>
	
<?php if ($buscador_rapido =! 2){?>
  </tr>
  
  <?php 
}

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


	




$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];

$autorizar=$result->fields["autorizada"];
$nro_os=$result->fields["nro_os"];


$categoria=strtoupper($result->fields["categoria"]);
$modalidad=strtoupper($result->fields["modalidad"]);

$honorarios=$result->fields["honorarios"];
$gastos=$result->fields["gastos"];
$valor=$result->fields["valor"];



include ("../conexiones/config_os.php");
$sql3="select * from datos_os  where nro_os = '$nro_os'";
$result3 = $db->Execute($sql3);
$sigla=$result3->fields["sigla"];
$denominacion=$result3->fields["denominacion"];


$sql="select * from arancel where nro_os = $nro_os";
$result = $db->Execute($sql);
 
$modalidad=ucwords($result->fields["modalidad"]);
$vuh=ucwords($result->fields["uh"]);
$vug=ucwords($result->fields["ug"]);

$modalidad_especiales=ucwords($result->fields["modalidad_especiales"]);
$vuh_especiales=ucwords($result->fields["uh_especiales"]);
$vug_especiales=ucwords($result->fields["ug_especiales"]);

$modalidad_alta=ucwords($result->fields["modalidad_alta"]);
$vuh_alta=ucwords($result->fields["uh_alta"]);
$vug_alta=ucwords($result->fields["ug_alta"]);


$vuh1=ucwords($result->fields["uh"]);
$vug1=ucwords($result->fields["ug"]);


$sql11="select * from incremento where nro_os = $nro_os";
$result11 = $db->Execute($sql11);

$material_descartable=ucwords($result11->fields["material_descartable"]);
$acto_bioquimico=ucwords($result11->fields["acto_bioquimico"]);
$toma_muestra=ucwords($result11->fields["toma_muestra"]);

$sql12="select * from op_facturacion where nro_os = $nro_os";
$result12 = $db->Execute($sql12);

$operacion=ucwords($result12->fields["operacion"]);
$porc_gastos=ucwords($result12->fields["gastos"]);
$porc_honorarios=ucwords($result12->fields["honorarios"]);

$coseguro=ucwords($result12->fields["coseguro"]);
$valor_porcentaje=ucwords($result12->fields["valor_porcentaje"]);

$coseguro_esp=$result12->fields["coseguro_esp"];
$valor_porc_esp=$result12->fields["valor_porc_esp"];

$coseguro_comp=ucwords($result12->fields["coseguro_comp"]);
$valor_porc_comp=ucwords($result12->fields["valor_porc_comp"]);


$coseguro_esp=ucwords($result12->fields["coseguro"]);
$valor_porc_esp=ucwords($result12->fields["valor_porcentaje"]);

$coseguro_comp=ucwords($result12->fields["coseguro"]);
$valor_porc_comp=ucwords($result12->fields["valor_porcentaje"]);





$vuh1 = $vuh1." + ".$porc_honorarios." %";
$vug1 = $vug1." + ".$porc_gastos." %";

if ($operacion == "SUMA"){
$porc_vuh = (($vuh * $porc_honorarios)/100);
$vuh = $vuh + $porc_vuh;
$porc_vug = (($vug * $porc_gastos)/100);
$vug = $vug + $porc_vug;
}



switch ($categoria){
	case "1":{
		
$contador_comunes = $contador_comunes + 1;
		include ("modalidad_comunes.php");

		BREAK;
	}

		case "2":{
$contador_especiales = $contador_especiales + 1;
		include ("modalidad_especiales.php");
		BREAK;
	}

		case "3":{
$contador_alta = $contador_alta + 1;
		include ("modalidad_alta.php");
		BREAK;
	}

}





	if ($B == 1) {

?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#E6E6E6"> <?php 

			}

?>

   <!--  <td><div align="left"><font size="2">(<?php print("$nro_os");?>) - </font><font size="2"><?php print("$denominacion");?></font></div>      </td>
    <td><div align="center"><font color="#0000FF" size="2"><strong><?php echo $valor;?></strong></font></div></td> -->
    

    <?php 


	   



$result->MoveNext();
	}

?>
</table>
  