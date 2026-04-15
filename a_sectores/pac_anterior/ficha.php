

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
<table width="766" height="436" border="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF">
      <td height="29" colspan="3"><div align="left">
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <p>&nbsp;</p>
                <p><strong>FICHA  PACIENTE </strong></p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </div></td>
  </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="306" height="29">
      <div align="right"> N&ordm; PACIENTE </div></td>
      <td width="145"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td width="301"><div align="left">
      <?php echo $nro_paciente;?>     </div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="29">
      <div align="right">N&ordm; AFILIADO </div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>        <?php echo $nro_afiliado;?>    </td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">APELLIDO Y NOMBRE </div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>        <?php echo $nombre;?></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">TIPO DOCUMENTO</div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>                <?php echo $tipo_doc;?></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">N&ordm; DOCUMENTO</div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>
  <?php echo $nro_documento;?></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">OBRA SOCIAL </div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><?php echo $denominacion;?> (<?php echo $nro_os;?>)  </td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">DOMICILIO</div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><?php echo $domicilio;?></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">LOCALIDAD</div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><?php echo $localidad;?><font size="2">&nbsp;      </td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">TEL. FIJO </div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><strong>
   <?php echo $telefono;?>   </strong></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">EDAD</div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><?php echo $edad;?> </td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">FECHA NACIMIENTO</div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><?php echo $dia;?> / <?php echo $mes;?> / <?php echo $anio;?></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">SEXO</div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>        <?php echo $sexo;?> </td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right"></div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
</table>
