<?php

	/* 
        En caso de que no puedas enviar los correos electrónicos y no puedas o quieras
        editar el archivo de configuración 'php.ini', descomenta las siguientes líneas con
        las que modificamos la configuración en tiempo de ejecución. Si es necesario, modifica
		el valor adecuado.
	*/
	//ini_set('SMTP', "localhost");
	//ini_set('smtp_port', 25);
	//ini_set('sendmail_from', "postmaster@localhost.com");
	//ini_set('display_errors', "On");    // Mostrar los errores (usar sólo durante las pruebas)

    // Comprobar si llegaron los datos requeridos:
    if(  !empty($_POST) && 
		 (isset($_POST['txtNombre'])  && !empty($_POST['txtNombre']))  &&
		 (isset($_POST['txtMail'])	  && !empty($_POST['txtMail']))	   &&
		 (isset($_POST['txtMensaje']) && !empty($_POST['txtMensaje'])) 
	  )
	{

		$mensaje = "Mensaje de: ".$_POST['txtNombre'].PHP_EOL;
		$mensaje .= "EMail: ".$_POST['txtMail'].PHP_EOL.PHP_EOL;
		$mensaje .= $_POST['txtMensaje'];
		
		// Indicar cabecera con el nombre del remitente. Si no indicamos la dirección de correo puede que 
		// no se realice el envío a a otros servicios como Hotmail o Yahoo
		$cabecera = "From: TU_NOMBRE <TU_CUENTA_DE_EMAIL@TU_SERVIDOR.com>";

		// IMPORTANTE: debes sustituir la dirección de correo por aquella en que deseas recibir el EMail:
		$ok = mail( trim($_POST['txtMail']), "Mensaje de prueba", $mensaje, $cabecera );

		if( $ok == true )
			echo "<p>El E-Mail ha sido enviado</p>";
		else
			echo "<p>ERROR al enviar el E-Mail</p>";

		echo "<p>Haz <a href='01_mail_texto_plano.html'>click para volver al formulario</a></p>";

	}
	else
	{

		$html  = "<html>";
		$html .= "<head>";

		// Después de cuatro segundos de mostrarse esta página web de error se redirigiría a la URL especificada.
		$html .= "<meta http-equiv='refresh' content='4;url=01_mail_texto_plano.html'>";

		$html .= "</head>";
		$html .= "<body>";
		$html .= "No han llegado todos los datos. En unos segundos será redirigido a la página principal.";
		$html .= "</body>";
		$html .= "</html>";

		echo $html;

	}

?>

