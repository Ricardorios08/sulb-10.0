<?php
include ("conexiones/config.inc.php");
 $user = $_POST["usuario"];
  $pass = $_POST["password"];



 $sql= "select * from usuario where usuario like '$user' and contrasena like '$pass'" ;
$result = $db->Execute($sql);

   $rol=strtoupper($result->fields["rol"]);
 $id=strtoupper($result->fields["id"]);

 $sql= "repair table ordenes" ;
$result = $db->Execute($sql);

switch($rol)
	{

		case "ADMIN":{

//session_start ();
//session_register ("$user");
//session_register ("$pass");
$usuario = $id;


include ("aindex.php");

//header ("Location: aindex.php?$usuario=2");		
			break;

}

		case "TECNICA":{

//session_start ();
//session_register ("$user");
//session_register ("$pass");
$usuario = $id;


include ("aindex_tecnica.php");

//header ("Location: aindex.php?$usuario=2");		
			break;

}


	case "VALIDACION":{

//session_start ();
//session_register ("$user");
//session_register ("$pass");
$usuario = $id;
include ("aindex_validacion.php");

//header ("Location: aindex.php?$usuario=2");		
			break;

}

	case "AUTORIZACION":{

//session_start ();
//session_register ("$user");
//session_register ("$pass");
$usuario = $id;
include ("aindex_validacion.php");

//header ("Location: aindex.php?$usuario=2");		
			break;

}


		case "ABM":{

$usuario = $id;
 
include ("aindex1.html");
 
break;
}

		case "IDEMA":{
$usuario = $id;
$nro_os = 2; 
include ("idema.php");
 
break;
}

		case "SANANDRES":{
$usuario = $id;
$nro_os = 3; 
include ("idema.php");
 
break;
}


		case "ABM":{

$usuario = $id;
 
include ("aindex1.html");
 
break;
}




		case "":{
//session_start ();
//ession_register ("$user");
//session_register ("$pass");
$usuario = $id;
include ("index.php");
		
			break;

}


	}

?>


