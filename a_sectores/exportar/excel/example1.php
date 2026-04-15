<?php
 
	include_once 'PHPepeExcel.php';
	
	$options = array ('start' => 1, 'limit'=>5);
	echo PHPepeExcel::xls2sql ( 'example1.xls', array ("RemitoAnio", "RemitoMes", null, null, null, "Deposito" ), "remitos", $options );
