<?php 
	

	if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {

$nombre_fichero = '../../../prueba/logo_a.jpg';
if (file_exists($nombre_fichero)) {
unlink ("../../../prueba/logo_a.jpg");
} 


		

	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		$ruta = "../../../prueba/logo_a.jpg";
		if (!file_exists($ruta)){
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";} else {echo "";
			}
		} else {	echo $_FILES['imagen']['name'] . ", este archivo existe";
		}	} else {		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

if ($_FILES["firma"]["error"] > 0){
	echo "ha ocurrido un error";
} else {

$nombre_fichero = '../../../prueba/firma_a.jpg';
if (file_exists($nombre_fichero)) {
		unlink ("../../../prueba/firma_a.jpg");
} 


	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['firma']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		$ruta = "../../../prueba/firma_a.jpg";
		if (!file_exists($ruta)){
			$resultado = @move_uploaded_file($_FILES["firma"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";} else {echo "";
			}
		} else {	echo $_FILES['firma']['name'] . ", este archivo existe";
		}	} else {		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}


/////////////////////



	if ($_FILES["imagen_b"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
		

				$nombre_fichero = '../../../prueba/logo_b.jpg';
if (file_exists($nombre_fichero)) {
		unlink ("../../../prueba/logo_b.jpg");
} 

	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['imagen_b']['type'], $permitidos) && $_FILES['imagen_b']['size'] <= $limite_kb * 1024){
		$ruta = "../../../prueba/logo_b.jpg";
		if (!file_exists($ruta)){
			$resultado = @move_uploaded_file($_FILES["imagen_b"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";} else {echo "";
			}
		} else {	echo $_FILES['imagen_b']['name'] . ", este archivo existe";
		}	} else {		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

if ($_FILES["firma_b"]["error"] > 0){
	echo "ha ocurrido un error";
} else {

				
				$nombre_fichero = '../../../prueba/firma_b.jpg';
if (file_exists($nombre_fichero)) {
	unlink ("../../../prueba/firma_b.jpg");
} 
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['firma_b']['type'], $permitidos) && $_FILES['firma_b']['size'] <= $limite_kb * 1024){
		$ruta = "../../../prueba/firma_b.jpg";
		if (!file_exists($ruta)){
			$resultado = @move_uploaded_file($_FILES["firma_b"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";} else {echo "";
			}
		} else {	echo $_FILES['firma_b']['name'] . ", este archivo existe";
		}	} else {		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

///////////////


	if ($_FILES["imagen_c"]["error"] > 0){
	echo "ha ocurrido un error";
} else {


				
$nombre_fichero = '../../../prueba/logo_c.jpg';
if (file_exists($nombre_fichero)) {
	unlink ("../../../prueba/logo_c.jpg");
} 
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['imagen_c']['type'], $permitidos) && $_FILES['imagen_c']['size'] <= $limite_kb * 1024){
		$ruta = "../../../prueba/logo_c.jpg";
		if (!file_exists($ruta)){
			$resultado = @move_uploaded_file($_FILES["imagen_c"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";} else {echo "";
			}
		} else {	echo $_FILES['imagen_c']['name'] . ", este archivo existe";
		}	} else {		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

if ($_FILES["firma_c"]["error"] > 0){
	echo "ha ocurrido un error";
} else {

	$nombre_fichero = '../../../prueba/firma_c.jpg';
if (file_exists($nombre_fichero)) {
	unlink ("../../../prueba/firma_c.jpg");
} 			
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['firma_c']['type'], $permitidos) && $_FILES['firma_c']['size'] <= $limite_kb * 1024){
		$ruta = "../../../prueba/firma_c.jpg";
		if (!file_exists($ruta)){
			$resultado = @move_uploaded_file($_FILES["firma_c"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";} else {echo "";
			}
		} else {	echo $_FILES['firma_c']['name'] . ", este archivo existe";
		}	} else {		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}


///////////////


	if ($_FILES["imagen_d"]["error"] > 0){
	echo "ha ocurrido un error";
} else {

		$nombre_fichero = '../../../prueba/logo_d.jpg';
if (file_exists($nombre_fichero)) {
	unlink ("../../../prueba/logo_d.jpg");
} 		
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['imagen_d']['type'], $permitidos) && $_FILES['imagen_d']['size'] <= $limite_kb * 1024){
		$ruta = "../../../prueba/logo_d.jpg";
		if (!file_exists($ruta)){
			$resultado = @move_uploaded_file($_FILES["imagen_d"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";} else {echo "";
			}
		} else {	echo $_FILES['imagen_d']['name'] . ", este archivo existe";
		}	} else {		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

if ($_FILES["firma_d"]["error"] > 0){
	echo "ha ocurrido un error";
} else {

	$nombre_fichero = '../../../prueba/firma_d.jpg';
if (file_exists($nombre_fichero)) {
	unlink ("../../../prueba/firma_d.jpg");
} 
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['firma_d']['type'], $permitidos) && $_FILES['firma_d']['size'] <= $limite_kb * 1024){
		$ruta = "../../../prueba/firma_d.jpg";
		if (!file_exists($ruta)){
			$resultado = @move_uploaded_file($_FILES["firma_d"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";} else {echo "";
			}
		} else {	echo $_FILES['firma_d']['name'] . ", este archivo existe";
		}	} else {		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

?>