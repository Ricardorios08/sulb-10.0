<?php
function conectar()
{
	mysql_connect("localhost", "root", "");
	mysql_select_db("laboratorio");
}

function desconectar()
{
	mysql_close();
}
?>