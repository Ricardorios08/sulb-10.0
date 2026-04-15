<?php function ceros_nro_orden_damsu($palabra) {
		
		if (strlen($palabra) == 1){
return	$resultado = "00000000000".$palabra;
		}

		if (strlen($palabra) == 2){
return	$resultado = "0000000000".$palabra;
		}

if (strlen($palabra) == 3){
return	$resultado = "000000000".$palabra;
		}

		if (strlen($palabra) == 4){
return	$resultado = "00000000".$palabra;
		}

		if (strlen($palabra) == 5){
return	$resultado = "0000000".$palabra;
		}

	if (strlen($palabra) == 5){
return	$resultado = "0000000".$palabra;
		}

			if (strlen($palabra) == 6){
return	$resultado = "000000".$palabra;
		}

			if (strlen($palabra) == 7){
return	$resultado = "00000".$palabra;
		}

			if (strlen($palabra) == 8){
return	$resultado = "0000".$palabra;
		}

			if (strlen($palabra) == 9){
return	$resultado = "000".$palabra;
		}

			if (strlen($palabra) == 10){
return	$resultado = "00".$palabra;
		}

if (strlen($palabra) == 11){
return	$resultado = "0".$palabra;
		}

if (strlen($palabra) == 12){
return	$resultado = $palabra;
		}

					}

					?>