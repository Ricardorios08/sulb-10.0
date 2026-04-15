<?php 
$desde= $_REQUEST['desde'];
$hasta= $_REQUEST['hasta'];
$usuario = 3;
$sql="select * from informe where id = $usuario";
$result = $db->Execute($sql);
$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);
$modelo=strtoupper($result->fields["modelo"]);

if ($hoja == 'A5'){
  switch ($modelo){
	 case "A":{include ("a5/w_garcia/emision_todos.php");break;}
 	 case "B":{include ("a5/b/emision_reducidal.php");break;}
 	 case "C":{include ("a5/c/emision_reducidal.php");break;}
	 case "D":{include ("a5/d/emision_reducidal.php");break;}
	 case "E":{include ("a5/e/emision_reducidal.php");break;}
				 }
				 }
elseif($hoja == 'A4'){

 switch ($modelo){
	 case "A":{include ("a4/a/emision_reducidal.php");break;}
 	 case "B":{include ("a4/b/emision_reducidal.php");break;}
 	 case "C":{include ("a4/c/emision_reducidal.php");break;}
	 case "D":{include ("a4/d/emision_reducidal.php");break;}
				}
				} 