<style type="text/css">
<!--
.Estilo65 {color: #FF0000}
-->
</style>
 <table width="200" border="0" cellpadding="0" cellspacing="0">
   <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#cc6600'; this.style.color='white'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'"><td width="300">
 <?php 
#E0EDF3
  $sql10="select * from detalle where cod_grabacion = $cod_grabacion order by orden, cod_operacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {

$nro_practica=strtoupper($result10->fields["nro_practica"]);
$deriva=strtoupper($result10->fields["deriva"]);
$completo=strtoupper($result10->fields["completo"]);
$nro_os=strtoupper($result10->fields["nro_os"]);

//////////

  $sql11="select * from convenio_practica where cod_practica = $nro_practica";
$result11 = $db->Execute($sql11);
$honorarios=$result11->fields["honorarios"];
$categoria=$result11->fields["categoria"];


$sql="select * from arancel where nro_os = $nro_os";
$result8 = $db->Execute($sql);
 
$modalidad=ucwords($result8->fields["modalidad"]);
$vuh=$result8->fields["uh"];
$vug=$result8->fields["ug"];

$modalidad_especiales=ucwords($result8->fields["modalidad_especiales"]);
$vuh_especiales=ucwords($result8->fields["uh_especiales"]);
$vug_especiales=ucwords($result8->fields["ug_especiales"]);

$modalidad_alta=ucwords($result8->fields["modalidad_alta"]);
$vuh_alta=ucwords($result8->fields["uh_alta"]);
$vug_alta=ucwords($result8->fields["ug_alta"]);


$vuh1=$result8->fields["uh"];
$vug1=$result8->fields["ug"];



$sql11="select * from incremento where nro_os = $nro_os";
$result811 = $db->Execute($sql11);

$material_descartable=ucwords($result811->fields["material_descartable"]);
$acto_bioquimico=ucwords($result811->fields["acto_bioquimico"]);
$toma_muestra=ucwords($result811->fields["toma_muestra"]);


switch ($categoria){
	case "1":{
		

$valor = (round($vuh * $honorarios,2));

		BREAK;
	}

		case "2":{

$valor = (round($vuh_especiales * $honorarios,2));
		
		BREAK;
	}

		case "3":{

$valor = (round($vuh_alta * $honorarios,2));	
		BREAK;
	}

}


//////////////

if ($completo == 0){
	$estado = "";
}
else{
	$estado = "OK";
}

$total_orden = $total_orden + $valor;
$total_acumulado = $total_acumulado + $valor;

if ($deriva == 1){
?> <span class="Estilo65">(<?php echo $nro_practica;?>)</span> 
 <?php  
}else{

?> (<?php echo $nro_practica;?>) <?php  
}




$result10->MoveNext();

	}


?>
       

</td>
</tr>
</table>   






