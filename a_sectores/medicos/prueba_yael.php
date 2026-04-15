<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  

<div class="container" style=" background-color: #fff;">

	<div class="row">

		<div class="col-md-6 col-lg-6 ">
			<img  class="img-responsive" src="logo_b.jpg" style=" width: 200px;  margin: 0 auto; ">
		</div>
	</div>
</div>


<div class="container" style=" background-color: #fff;">

	<div class="row">
		<div class="col-md-6 col-lg-6 ">
			<p>Bioq. Gisel Ortiz - Mat: 1441</p>
			<p>Especialista Bioquímica Clínica</p>
		</div>
	</div>
</div>

<table width="829" border="1" align="center" cellspacing="0">
 <tr >
   <td width="63" bgcolor="#666666"><span class="Estilo35">Protocolo</span></td>
   <td width="77" bgcolor="#666666"><div align="center" class="Estilo35">Fecha</div></td>
   <td width="360" bgcolor="#666666"><div align="center" class="Estilo35">Paciente</div></td>
    <td width="34" bgcolor="#666666"><div align="center" class="Estilo35">Edad</div></td>
    <td width="181" bgcolor="#666666"><div align="center" class="Estilo27 Estilo35">
      <div align="center"> Solicitadas </div>
    </div>      <div align="center" class="Estilo27 Estilo35"></div></td>
    <td width="88" bgcolor="#666666"><div align="center" class="Estilo35">VER INFORME </div></td>
 </tr>


<?php 

include("../../conexiones/config.inc.php");

 
   $palabra = $_REQUEST['usuario1'];
   $password = $_REQUEST['password1'];


$ordenes = "ordenes";
$detalle = "detalle";

 include("../../conexiones/config.inc.php");

//     $sql2="select * from $ordenes where nro_paciente like '$nro_paciente' and lote = '$user' order by cod_grabacion";

  	  $sql2="select * from pacientes where nro_documento like '$palabra' ";
$result201 = $db->Execute($sql2);
 $nro_paciente=strtoupper($result201->fields["nro_paciente"]);
 



  	  $sql2="select * from $ordenes where nro_paciente like '$nro_paciente'  order by cod_grabacion";
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


$año=strtoupper($result20->fields["ano"]);
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
 <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $cod_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $fecha_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"> <?php echo $nombre_completo;?> <?php echo $nro_paciente;?> </td>
    <td bgcolor="#E0EDF3"><div align="center">
      <div align="center"><?php echo $edad;?></div>
    </div></td>
    <td bgcolor="#E0EDF3"><?php include ("practicas.php");?>
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div></td>
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../analisis/modelos/elegir_modelos_idema.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>" data-toggle="modal" data-target=".bd-example-modal-lg"><img src="../../imagenes/office//005.ico" alt="Informe" border = "0"></a></font></div></td>
 </tr>
<?php 

 
$result20->MoveNext();
		}


?></table>


 

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
		<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <iframe src="../analisis/modelos/elegir_modelos_idema.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"></iframe> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div> -->


<!-- Large modal -->



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <iframe src="../analisis/modelos/elegir_modelos_idema.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>" style="height: 100vh;"></iframe> 
    </div>
  </div>
</div>




      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>