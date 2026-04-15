
<?php 

include("../../conexiones/config.inc.php");

 
   $palabra = $_REQUEST['usuario1'];
   $password = $_REQUEST['password1'];

if (($palabra == '1234') and ($password == "yael")){
include ("prueba_yael.php");
exit;
}

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://use.fontawesome.com/52a3ff53fa.js"></script>

    <title>Imprimir Informe</title>
    <style type="text/css">
<!--
.Estilo1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 24px;
}
.Estilo2 {font-family: Arial, Helvetica, sans-serif}
-->
    </style>
</head>
  <body>
  

<div class="container" style=" background-color: #fff;">

	<div class="row">

		<div class="col-md-6 col-lg-6 ">
		</div>
	</div>
</div>


<div class="container" style=" background-color: #fff;">

	<div class="row">
		<div class="col-md-6 col-lg-6 ">
			<p align="center" class="Estilo1">Laboratorio de Análisis Clínicos</p>
			<p align="center" class="Estilo2">Descarga de informes - <a href="../../../index.html">Salir</a></p>
		</div>
	</div>


<div class="card">

   <div class="row">
    <div class="col-sm-12 col-lg-4">
      <small>Fecha: </small>
    </div>
       <div class="col-sm-12 col-lg-4"
      <small>Paciente: </small>
    </div>
       <div class="col-sm-12 col-lg-4">
      <small> Ver Informe </a></small>
    </div>
	
  </div>
</div>

<?php



$ordenes = "ordenes";
$detalle = "detalle";

 include("../../conexiones/config.inc.php");

//     $sql2="select * from $ordenes where nro_paciente like '$nro_paciente' and lote = '$user' order by cod_grabacion";

  	  $sql2="select * from pacientes where nro_documento like '$palabra' ";
$result201 = $db->Execute($sql2);
 $nro_paciente=strtoupper($result201->fields["nro_paciente"]);
 



  	  $sql2="select * from $ordenes where nro_paciente like '$nro_paciente' and validada = 1 order by cod_grabacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("falloff".$db->ErrorMsg());
  while (!$result20->EOF) {

  $cod_grabacion=strtoupper($result20->fields["cod_grabacion"]);
$nro_os=strtoupper($result20->fields["nro_os"]);
$nro_paciente=strtoupper($result20->fields["nro_paciente"]);
$periodo=strtoupper($result20->fields["periodo"]);
$marca=strtoupper($result20->fields["marca"]);
$lote=strtoupper($result20->fields["lote"]);
$cod_operacion=strtoupper($result20->fields["cod_operacion"]);
$modulo=strtoupper($result20->fields["modulo"]);
$autorizacion=strtoupper($result20->fields["autorizacion"]);


$ano=strtoupper($result20->fields["ano"]);
$nro_afiliado=$result20->fields["nro_afiliado"];
$nro_orden=$result20->fields["nro_orden"];

$autorizacion=strtoupper($result20->fields["autorizacion"]);
$autorizacion_ws=strtoupper($result20->fields["autorizacion_ws"]);



$operador=strtoupper($result20->fields["operador"]);


$cod_grabacion=strtoupper($result20->fields["cod_grabacion"]);

$fecha_grabacion=strtoupper($result20->fields["fecha"]);

$dia = substr($fecha_grabacion,8,2);
$mes= substr($fecha_grabacion,5,2);
$anio = substr($fecha_grabacion,0,4);
$fecha_grabacion = $dia."-".$mes."-".$anio;


$fecha=strtoupper($result20->fields["fecha"]);


$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);
$fecha = $dia."-".$mes."-".$anio;



$matricula=strtoupper($result20->fields["matricula"]);
$prescriptor=strtoupper($result20->fields["medico"]);
$confirmada=strtoupper($result20->fields["confirmada"]);

 $sql="select * from pacientes where nro_paciente = $nro_paciente";
 $result30 = $db->Execute($sql);
 	
// $nro_paciente=$result30->fields["nro_paciente"];
 $nombre=strtoupper($result30->fields["nombre"]);
 $apellido=strtoupper($result30->fields["apellido"]);
$nro_os=$result30->fields["nro_os"];
$nro_documento=$result30->fields["nro_documento"];
$fecha_nacimiento=$result30->fields["fecha_nacimiento"];
if ($autorizacion == 0){
$autorizacion = "S/A";
}
 
 $nombre_completo = $apellido." ".$nombre;
$nombre_completo = substr($nombre_completo,0,20);

 $cant = $cant + 1;
 ?>



<div class="card">

   <div class="row">
    <div class="col-sm-12 col-lg-4">
     <?php echo $fecha_grabacion;?>
    </div>
       <div class="col-sm-12 col-lg-4">
    <?php echo $nombre_completo;?> <?php echo $nro_paciente;?>
    </div>
       <div class="col-sm-12 col-lg-4">
      <p><a href="../analisis/modelos/elegir_modelos_idema.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>" target  onClick="window.open(this.href, this.target, 'width=600,height=400'); return false;" ><h5><b><i class="fa fa-file-pdf-o" aria-hidden="true"></i></b></h5>
 <?php //include ("practicas.php");?> </a></p>
    </div>
	
  </div>
</div>


 
 <?php 

 
$result20->MoveNext();
		}


?>



 
</div>
