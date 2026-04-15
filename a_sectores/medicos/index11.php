<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.12.3, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.12.3, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo4.png" type="image/x-icon">
  <meta name="description" content="">
  
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <title>Laboratorio de Análisis Clínicos</title>


  
  
  
</head>
<body>

 <?php 

include("../../conexiones/config.inc.php");

 
   $palabra = $_REQUEST['usuario'];
   $password = $_REQUEST['password'];

if (($palabra == '1234') and ($password == "yael")){
include ("prueba_yael.php");
exit;
}

if (($palabra == '') and ($password == "")){

exit;
}

?>

<body style="background:linear-gradient(rgba(36, 35, 89, 0.65), rgba(54, 44, 125, 0.65)), url('assets/img/bg.jpg');">
   
	<!-- 
	<h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3" style="color: #e5e3ec !important;">LABORATORIO MARTIN TORRES</span><span class="site-heading-lower"></span></h1> -->


    <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4 fixed-top" style="background-color: #3f3d5e !important;" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded " style="color: #fdfbf8 !important;" href="#">Lab Martín Torres</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../../../">Casa</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="nosotros.html">Nosotros</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="servicios.html">Servicios</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link" href="obras.html">Obras Sociales</a></li>
                     
					 <li class="nav-item" role="presentation"><a class="nav-link" href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm1">Mis Informes</a></li>

					 <li class="nav-item" role="presentation"><a class="nav-link" href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Laboratorio</a></li>
                </ul>


			 


        </div>
        </div>
    </nav>


<br><br><br><br><br>
  <!-- <div class="container " style="height: 500px; overflow-y: scroll; margin-bottom: 1em"> -->
 

  <div class="container " style="height: 500px; overflow-y: scroll; margin-bottom: 1em">
 
      <div class=" text-white">

<h1> <center>RESULTADOS INFORMES ONLINE </center></H1>





<div class="table-responsive">
  <table class="table" >


 
 <tr  class="table-secondary">
   <td  >Protocolo</span></td>
   <td  > Fecha</div></td>
   <td  > Paciente</div></td>
    <td  > Edad</div></td>
    <td  >
      <div align="center"> Solicitadas </div>
    </div>    </div></td>
    <td  > VER INFORME </div></td>
 </tr>


<?php



$ordenes = "ordenes";
$detalle = "detalle";

 include("../../conexiones/config.inc.php");

//     $sql2="select * from $ordenes where nro_paciente like '$nro_paciente' and lote = '$user' order by cod_grabacion";

  	  $sql2="select * from pacientes where nro_documento like '$palabra' ";
$result201 = $db->Execute($sql2);

 

 if (!$result201) die("falloff".$db->ErrorMsg());
  while (!$result201->EOF) {

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


$a�o=strtoupper($result20->fields["ano"]);
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
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">
	
	<a href="../analisis/modelos/elegir_modelos_idema.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>" target  onClick="window.open(this.href, this.target, 'width=600,height=400'); return false;" ><img src="descargar.ico" alt="Informe" border = "0"></a>
	
		<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.<?php $cod_grabacion;?>" data-whatever="@getbootstrap">VER</button>  /// data-toggle="modal.'<?php $cant;?>" data-target=".bd-example-modal-lg"  -->
		
		</font></div></td>
 </tr>
<?php 

 
$result20->MoveNext();
		}


 

 $result201->MoveNext();
		}

?>


 </table> 
 
 <br><br><br><br><br></div>

  
    </div>
 


 </header>    



<!-- Modal -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<form  ACTION="../../../laboratorio.6.0/validar.php" method="post">
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Ingreso a Laboratorio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" name = "usuario" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Usuario</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name = "password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Contraseña</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Ingresar</button>
      </div>
    </div>
  </div>
</form>
</div> <!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="modalLoginForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<form  ACTION="../../../laboratorio.6.0/a_sectores/medicos/index.php" method="post">
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Mis Informes</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" name = "usuario" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Documento</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name = "password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Contraseña</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Consultar</button>
      </div>
    </div>
  </div>
</form>
</div> <!-- Modal -->
 





<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Visitanos Hoy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<div class = "container" align = "center">
	<br>
	
	<h4> Extracción:<br>
	  Lunes a Viernes de 8 a 9 hs
	  <h4>

	  <br><br>

	  <h4> Retiro de resultados<br>
	  Lunes a Viernes de 10 a 18 hs
	  <h4>

	  <br><br>

	<h4> Donde:<br>
	  Don Bosco xxx - 
	  <h4>

 
</div>
      <div class="modal-body">
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
     
      </div>
      
    </div>
  </div>
</div>
<!-- Modal -->


   <footer class="footer text-faded text-center py-5" style="background-color: rgba(57, 56, 87, 0.9) !important;">
        <div class="container">
            <p class="m-0 small">Copyright&nbsp;©&nbsp;RyS 2020</p>
        </div>
    </footer>

  
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script>
  <script src="https://apis.google.com/js/plusone.js"></script>
  <script src="assets/facebook-plugin/facebook-script.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>