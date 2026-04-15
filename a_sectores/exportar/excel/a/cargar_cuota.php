<table width="728" border="1">
  <?php 
include("../../../../conexiones/config.inc.php");

 $archivo = "libretas.txt";
  $carpeta = "C:\utiles/";

 if (file_exists($carpeta.$archivo) == true){
//unlink ($carpeta.$archivo);
 }

 
	$a = "C:\utiles/libretas.txt";
	
 



if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
      copy($_FILES['archivo']['tmp_name'], $a);
     ECHO $subio = true;
	 $archiv = $_FILES['archivo']['tmp_name'];




$sql = "TRUNCATE TABLE `ordenes_expel`";
mysql_query($sql);



 $lines = file('C:\utiles/libretas.txt');
  
  ?>
  
  
  <?php 
  foreach ($lines as $line_num => $line) {
         
      $datos = explode(";", $line);

if ($datos[0] != ""){
 $sql = "INSERT INTO `ordenes_expel` (`cuit`, `paciente`, `empresa`, `modulo`, `sexo`) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')";
mysql_query($sql);



$cont = $cont +1;

}


       } //fin foreach

    }

 $archiv = $HTTP_POST_FILES['archivo']['tmp_name'];
if($subio) {
   
	?><tr>
    <td bgcolor="#C4D7E6"> <div align="center"><span class="Estilo5"><?php echo "El archivo fue cargado con exito. ";?></span></div></td>
	    <td bgcolor="#C4D7E6"> <div align="center"><span class="Estilo5"><?php echo "SE CARGARON ".$cont." REGISTROS";?></span></div></td>
  </tr><?php 
} else {
    ?><tr>
    <td bgcolor="#C4D7E6">  <div align="center"><span class="Estilo5"><?php echo "El archivo no cumple con las reglas establecidas";?></span></div></td>
  </tr><?php 

}




$row = 1;





  include("../../../../conexiones/config.inc.php");

$sql = "SELECT * FROM pacientes order by nro_paciente desc";
$result = $db->Execute($sql);
$nro_paciente=$result->fields["nro_paciente"]+1;

$sql = "SELECT * FROM ordenes_expel order by paciente";
$result = $db->Execute($sql);


if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {

$cuit=$result->fields["cuit"];
$paciente=$result->fields["paciente"];
$empresa=$result->fields["empresa"];
$sexo=$result->fields["sexo"];
$nro_paciente = $nro_paciente + 1;

switch ($sexo){
	case "F":{$sexo = "Femenino";break;}
	case "M":{$sexo = "Masculino";break;}
}


$sql= "INSERT INTO pacientes ( `nro_paciente`, `nro_afiliado`, `nombre`, `tipo_doc`, `nro_documento`, `nro_os`, `domicilio`, `localidad`, `telefono`, `celular`, `sexo`, `fecha_nacimiento` , `apellido` ) VALUES ( '$nro_paciente', '$cuit', '$empresa', '$tipo_doc', '$nro_documento', '$nro_os', '$domicilio', '$localidad', '$telefono', '$celular', '$sexo', '$fecha_nacimiento' , '$paciente' )";
mysql_query($sql);





 $sql4 = "INSERT INTO `ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_paciente` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` , `suma_coseguro` , `tipo_fact` , `cod_diag` , `cod_grabacion1` , `fecha_grabacion`, `iva` , `neto_gravado` , `exento` , `total_orden` , `fecha_realizacion` , `diagnostico` , `motivo` , `observaciones` , `modulo` , `nombre_medico`) VALUES ( '' , '$mes' , '$anio' , '6' , '$nro_paciente' , '$matricula' , '$cuit' , '$nro_orden' , '$fecha_orden' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , '$confirmada' , '$marca' , '$lote' , '$operador' , '' , '' , '' , '' , '$fecha_orden' , '' , '' , '' , '' , '$fecha_orden' , '$diagnostico' , '$motivo' , '$observaciones' , '$modulo', '$nombre_medico')";
mysql_query($sql4);
 

$idgenerado = mysql_insert_id();




$sql4="select * from deta_modulo where cod_modulo = $modulo order by cod_operacion";
$result4 = $db->Execute($sql4);
 

 if (!$result4) die("fallo".$db->ErrorMsg());
  while (!$result4->EOF) {


$cod_practica=$result4->fields["cod_practica"];

$sql1="select * from convenio_practica where cod_practica = $cod_practica";
$result1 = $db->Execute($sql1);
$clase=$result1->fields["cod_practica"];


$sql5 ="INSERT INTO `detalle` ( `cod_grabacion` , `nro_os` , `nro_paciente` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` , `marca` , `lote`, `operador` , `categoria` , `coseguro` , `tipo_fact` , `prioridad` , `imprimir` , `deriva` , `cod_mega` ,	`nro_lab`, `fecha` , `clase`) VALUES ('$idgenerado' , '6' , '$nro_paciente' , '$nro_orden' , '$cod_practica' , '$valor' ,'$mes' , '$anio' , '' , '7' , '' , '' , '' , '$operador' , '' , '' , '' , '' , '1' , 	'' , '' , '' , '$fecha_orden' , '$clase')";
mysql_query($sql5);



$result4->MoveNext();
}





$result->MoveNext();
	}



?>