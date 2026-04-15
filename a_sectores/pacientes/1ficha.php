

<script language="javascript">
function on_load()
{
document.getElementById("nro_paciente").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_paciente":
				document.getElementById("nro_afiliado").focus();
				break;
				case "nro_afiliado":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("nro_documento").focus();
				break;
				case "nro_documento":
				document.getElementById("nro_os").focus();
				break;
				case "nro_os":
				document.getElementById("domicilio").focus();
				break;

				case "domicilio":
				document.getElementById("telefono").focus();
				break;
				case "telefono":
				document.getElementById("celular").focus();
				break;
				case "celular":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("GUARDAR").focus();
				break;

				


				
		}
		return false;
	}
	return true;
}


</script>



<style type="text/css">
<!--
body {
	background-image: url(../../imagenes/ficha.jpg);
	background-repeat: no-repeat;
}
.Estilo1 {font-family: Geneva, Arial, Helvetica, sans-serif}
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo5 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
}
-->
</style>

<!-- <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();"> -->


<?php 

 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}



include ("../../conexiones/config.inc.php");

$nro_paciente = $_REQUEST['nro_paciente'];


$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

$nro_paciente=$result->fields["nro_paciente"];
$nro_afiliado=$result->fields["nro_afiliado"];
$nombre=$result->fields["nombre"];
$apellido=$result->fields["apellido"];
$tipo_doc=$result->fields["tipo_doc"];
$nro_documento=$result->fields["nro_documento"];
$nro_os=$result->fields["nro_os"];
$domicilio=$result->fields["domicilio"];
$localidad=$result->fields["localidad"];
$telefono=$result->fields["telefono"];
$celular=$result->fields["celular"];
$sexo=$result->fields["sexo"];
$fecha_nacimiento=$result->fields["fecha_nacimiento"];

$dia = substr($fecha_nacimiento,8,2);
$mes= substr($fecha_nacimiento,5,2);
$anio = substr($fecha_nacimiento,0,4);

	IF ($fecha_nacimiento == "0000-00-00"){
$edad = "SIN CARGAR";
}ELSE{
$edad = calculaEdad($fecha_nacimiento);
}

 $sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$denominacion=strtoupper($result1->fields["denominacion"]);



?>
<form action="modificar_paciente.php" method="post">
<table width="731" height="514" border="0" cellspacing="0" bordercolor="#000000">
    <!--DWLayoutTable-->
    <tr valign="middle" bordercolor="#FFFFFF">
      <td height="45" colspan="3"><div align="left" class="Estilo1 Estilo2">
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <p><strong></strong></p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </div></td>
  </tr>
    <tr align="center" bordercolor="#000000">
      <td height="29"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr align="center" bordercolor="#000000">
      <td width="290" height="29">
      <div align="right" class="Estilo3"> N&ordm; PACIENTE </div></td>
      <td width="161" bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td width="266"><div align="left" class="Estilo3">
      <?php echo $nro_paciente;?>     </div></td>
    </tr>
    <tr bordercolor="#000000">
      <td height="29">
      <div align="right" class="Estilo3">N&ordm; AFILIADO </div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>        <span class="Estilo3"><?php echo $nro_afiliado;?></span> </td>
    </tr>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">APELLIDO Y NOMBRE </div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>      <span class="Estilo3"><?php echo $apellido;?>  <?php echo $nombre;?></span></td>
    </tr>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">TIPO DOCUMENTO</div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>                <span class="Estilo3"><?php echo $tipo_doc;?></span></td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">N&ordm; DOCUMENTO</div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>
        <span class="Estilo3"><?php echo $nro_documento;?></span></td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">OBRA SOCIAL </div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><span class="Estilo3"><?php echo $denominacion;?> (<?php echo $nro_os;?>)  </span></td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">DOMICILIO</div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><span class="Estilo3"><?php echo $domicilio;?></span></td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">LOCALIDAD</div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><span class="Estilo3"><?php echo $localidad;?><font size="2">&nbsp;      </span></td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">TEL. FIJO </div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><span class="Estilo5">
      <?php echo $telefono;?></span></td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right"><span class="Estilo3">CELULAR</span></div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><span class="Estilo5"><?php echo $celular;?></span></td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">EDAD</div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><span class="Estilo3"><?php echo $edad;?></span> </td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">FECHA NACIMIENTO</div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><span class="Estilo3"><?php echo $dia;?> / <?php echo $mes;?> / <?php echo $anio;?></span></td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right" class="Estilo3">SEXO</div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>        <span class="Estilo3"><?php echo $sexo;?></span> </td>
    <tr bordercolor="#000000">
      <td height="29"><div align="right"><span class="Estilo1"><span class="Estilo2"></span></span></div></td>
      <td bordercolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
</table>
