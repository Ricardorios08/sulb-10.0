<?php switch ($modalidad){
	case "1": //NBU
		{

if ($honorarios != 0){
$valor =  (round($vuh_alta * $honorarios,2));
}


?>

<body class="Estilo6"> 
 
      <?php 
		   $nro_prac = $nro_practica;
	      $val = $valor;
echo "(".$nro_practica=ucwords($result3->fields["nro_practica"])." - $".number_format($val,2).") ";?>
      </span>
      <?php 
	if ($toma == "SI"){
$contador_practicas_1 = $contador_practicas_1 + 1;
}
if ($mate == "SI"){
$contador_practicas_2 = $contador_practicas_2 + 1;
}
$nro_practi=ucwords($result3->fields["nro_practica"]);


if ($facturar == "SI"){
$sql = "UPDATE `detalle` SET `valor` = '$valor', `nro_factura` = '$nro_factura' , `confirmada` = '10'  WHERE `cod_grabacion` = '$cod_grabacion' and `nro_practica` = '$nro_practi'";
//mysql_query($sql);
}

$importe = ($importe + $valor);//valor de practicas
$importe1 = ($importe1 + $valor); //valor por orden
$total_acumulado = $total_acumulado + $valor; //

		break;
	}

		case "2"://unid gastos / unid bioq
		{
 if (($gastos == 0) && ($honorarios == 0))
					{

	 ?> 
     
      <?php  $nro_prac = $nro_practica;
	      $val = $valor;
	echo "(".$nro_practica=ucwords($result3->fields["nro_practica"])." - $".number_format($val,2).") ";
	if ($toma == "SI"){
$contador_practicas_1 = $contador_practicas_1 + 1;
	}
	if ($mate == "SI"){
$contador_practicas_2 = $contador_practicas_2 + 1;
}
$importe = ($importe + $valor);//valor de practicas
$importe1 = ($importe1 + $valor); //valor por orden
$total_acumulado = $total_acumulado + $valor; //
					}
				else
					{

					if ($toma == "SI"){
$contador_practicas_1 = $contador_practicas_1 + 1;
					}
					if ($mate == "SI"){
$contador_practicas_2 = $contador_practicas_2 + 1;
}

$valor = $valor + round($vuh_alta * $honorarios,2) + round($vug_alta * $gastos,2);

?> 
    
      <?php  $nro_prac = $nro_practica;
	      $val = $valor;
echo "(".$nro_practica=ucwords($result3->fields["nro_practica"])." - $".number_format($val,2).") ";
$importe = ($importe + $valor);//valor de practicas
$importe1 = ($importe1 + $valor); //valor por orden
$total_acumulado = $total_acumulado + $valor; //

$nro_practi=ucwords($result3->fields["nro_practica"]);


if ($facturar == "SI"){
$sql = "UPDATE `detalle` SET `valor` = '$valor', `nro_factura` = '$nro_factura' , `confirmada` = '10'  WHERE `cod_grabacion` = '$cod_grabacion' and `nro_practica` = '$nro_practi'";
//mysql_query($sql);
}
					}


		break;
	}

		case "3"://valor
			{
?> 
     
      <?php 
 $nro_prac = $nro_practica;
    $val = $valor;
echo "(".$nro_practica=ucwords($result3->fields["nro_practica"])." - $".number_format($val,2).") ";
$nro_practi=ucwords($result3->fields["nro_practica"]);
if ($toma == "SI"){
$contador_practicas_1 = $contador_practicas_1 + 1;
}
if ($mate == "SI"){
$contador_practicas_2 = $contador_practicas_2 + 1;

}

$contador_practicas = $contador_practicas + 1;
?>
      </span>
      <?php 


if ($facturar == "SI"){
$sql = "UPDATE `detalle` SET `valor` = '$valor', `nro_factura` = '$nro_factura' , `confirmada` = '10'  WHERE `cod_grabacion` = '$cod_grabacion' and `nro_practica` = '$nro_practi'";
//mysql_query($sql);
}
$importe = ($importe + $valor);//valor de practicas
$importe1 = ($importe1 + $valor); //valor por orden
$total_acumulado = $total_acumulado + $valor; //

		break;
	}
}


if ($facturar == "SI"){
$sql = "UPDATE `ordenes` SET `fecha_fac` = '$hoy_pr',`nro_fac` = '$nro_factura' , `confirmada` = '10' WHERE `cod_grabacion` = '$cod_grabacion'";
}
//mysql_query($sql);
?>