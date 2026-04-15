<table width="728" border="1">
  <?php 
include("../../conexiones/config.inc.php");

 $archivo = "MEDIFE.TXT";
 $carpeta = "c:/informes/PADRONES/";
 $hoy = date("Y-m-d");

 if (file_exists($carpeta.$archivo) == true){
unlink ($carpeta.$archivo);
 }


	$a = "MEDIFE.TXT";
	
if (is_uploaded_file($HTTP_POST_FILES['archivo']['tmp_name'])) {
      copy($HTTP_POST_FILES['archivo']['tmp_name'], $a);
      $subio = true;
	 $archiv = $HTTP_POST_FILES['archivo']['tmp_name'];


include("../../conexiones/config.inc.php");
echo $sql = "TRUNCATE TABLE `afiliados_medife`";
$result = $db_os->Execute($sql);



 $lines = file('MEDIFE.TXT');
  
  ?>
  
  
  <?php 
  foreach ($lines as $line_num => $line) {
         
      $datos = explode(";", $line);
/*              
echo $datos[0];
echo $datos[1];
echo $datos[2];
echo $datos[3];
echo $datos[4];
echo $datos[5];
echo $datos[6];
echo $datos[7];
echo $datos[8];
echo $datos[9];
echo $datos[10];
echo $datos[11];

*/

 $sql2 = "INSERT INTO afiliados_medife (`nodo` , `cuenta` , `adherente` , `efector` , `plan` , `estado` , `tipo_cliente` , `a` , `b` , `apellido` , `nombre` , `fecha_cambio` ) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]' , '$datos[7]' , '$datos[8]', '$datos[9]' , '$datos[10]' , '$hoy')";
$result2 = $db_os->Execute($sql2);
$cont = $cont +1;


       } //fin foreach

    }

 $archiv = $HTTP_POST_FILES['archivo']['tmp_name'];
if($subio) {
   
	?><tr>
    <td bgcolor="#C4D7E6"> <div align="center"><span class="Estilo5"><?php echo "El archivo fue cargado con exito. ";?></span></div></td>
	    <td bgcolor="#C4D7E6"> <div align="center"><span class="Estilo5"><?php echo "SE CARGARON ".$cont." REGISTROS";?></span></div></td>
  </tr><?php 
} else {
    ?><!-- <tr>
    <td bgcolor="#C4D7E6">  <div align="center"><span class="Estilo5"><?php echo "El archivo no cumple con las reglas establecidas";?></span></div></td>
  </tr> --><?php 

}







$row = 1;





 



//echo $sql = "LOAD DATA INFILE '$archiv' REPLACE INTO TABLE `cuota` FIELDS TERMINATED BY ';'";
?>
