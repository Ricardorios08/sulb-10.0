<?php
include_once ("poo.php");

$menu1=new Menu();
$menu1->cargarOpcion('conexion.php','Conexion');
$menu1->cargarOpcion('http://www.yahoo.com','Yhahoo');
$menu1->cargarOpcion('http://www.msn.com','MSN');
$menu1->mostrar();
