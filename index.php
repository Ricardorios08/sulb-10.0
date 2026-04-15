<!DOCTYPE html>
<html lang="es">
<head>

	<title>SULB | Sistema Unico Laboratorios Bioquímicos</title>

	<link href="css/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script language="javascript">
	function on_load()
	{
	document.getElementById("usuario").focus();
	}

	function verif_caracter(obj,evt)
	{

		evt = (evt) ? evt : event;
		var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
		if (charCode == 13) 

		{
			switch(obj.id)
			{
					case "usuario":
					document.getElementById("password3").focus();					
					
					
			}
			return false;
		}
		return true;
	}


	</script>
</head>


<?php include("conexiones/config.inc.php");?>

<body onload = "on_load()">

<link rel="shortcut icon" href="favicon.png" type="image/png" />

	<form class="form-signin" ACTION="validar.php" method="post" TARGET = "_top">

		<div class="container" style=" background-color: #fff;">

			<div class="row">

		        <div class="col-md-7 col-lg-7 col-md-offset-2">

					<img  class="img-responsive" src="imagenes/sulb5.png" style=" width: 60%;  margin: 0 auto; ">

					<div class="form-group">
						<input type="text" class="form-control input-lg" name="usuario" placeholder="Usuario" required="" autofocus="" />
					</div>

					<div class="form-group">
						<input type="password" class="form-control input-lg" name="password" placeholder="Contraseña" required=""/>
					 </div>
					<div class="form-group">
						<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar »</button>
					</div>
						<div class="row">

							<!-- <div class="col-sm-6 col-md-6 col-lg-6">
							<ol class="rounded-list">
							    <li><a href="#">Valide en su laboratorio.</a></li>
							    <li><a href="#">Fácil y sencillo.</a></li>
							    <li><a href="#">Evite débitos.</a></li>                   
							</ol>
									
							</div>

							<div class="col-sm-6 col-md-6 col-lg-6">
							<ol class="rounded-list">
							    <li><a href="#">Informe sus resultados.</a></li>
							    <li><a href="#">Rápido y prolijo.</a></li>
							    <li><a href="#">Recupere tiempo.</a></li>                      
							</ol>
														
						   </div> -->
					    </div>					
				</div>

		        <div class="col-md-12 col-lg-12">

						
						<div class="page-header text-left">
						  <h3>Algunos de <small>Nuestros Clientes</small></h3>
						</div>

					
					   <?php

						$sql2="select * from sulb order by cuit";
						$result2 = $db->Execute($sql2);

						if (!$result2) die("fallo 1".$db->ErrorMsg());
						 while (!$result2->EOF) {


						$nombre_laboratorio=strtoupper($result2->fields["nombre_laboratorio"]);
						$nombre_laboratorio=substr($nombre_laboratorio,0,30);
					   ?>
		            
		             <div class="col-sm-3 col-md-3 col-lg-3">
		             
		             <p style="FONT-SIZE: x-small;"> <?php echo $nombre_laboratorio;?></p>
		              <?php $result2->MoveNext();
						$nombre_laboratorio=strtoupper($result2->fields["nombre_laboratorio"]);
						$nombre_laboratorio=substr($nombre_laboratorio,0,30);
					   ?>
					 </div>


				     <div class="col-sm-3 col-md-3 col-lg-3">
		             <p style="FONT-SIZE: x-small;"> <?php echo $nombre_laboratorio;?></p>
		              <?php $result2->MoveNext();
						$nombre_laboratorio=strtoupper($result2->fields["nombre_laboratorio"]);
						$nombre_laboratorio=substr($nombre_laboratorio,0,30);
					   ?>
					 </div>

					 <div class="col-sm-3 col-md-3 col-lg-3">
		             <p style="FONT-SIZE: x-small;"> <?php echo $nombre_laboratorio;?></p>
		              <?php $result2->MoveNext();
						$nombre_laboratorio=strtoupper($result2->fields["nombre_laboratorio"]);
						$nombre_laboratorio=substr($nombre_laboratorio,0,30);
					   ?>
					 </div>

		             <div class="col-sm-3 col-md-3 col-lg-3">
					 <p style="FONT-SIZE: x-small;"> <?php echo $nombre_laboratorio;?></p>
		             </div>

		              <?php

						$result2->MoveNext();
						}

					  ?>
				</div>
			</div>     
		</div> 
	</form>

</body>
</html>


