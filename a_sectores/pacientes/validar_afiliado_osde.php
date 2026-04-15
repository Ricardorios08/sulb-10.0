<?php
$numero_credencial = $nro_afiliado;
	
$tipo_transaccion = "01A";
$fechaTrx = date("Ymd");
$HoraTrx = time("hms");
$cuit_financiador = "30546741253";
$cuit_prestador = "30580910927";
$afil = "62090275102";
$id = rand();

$ws = "ws.itcsoluciones.com:48080/jSitelServlet/Do?";
$pas = "pas=32dbf220f1ab2303592b4a076162c221600ef704";


 $mensaje = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>20130520</FechaTrx><HoraTrx>190620</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>11</CodigoFinanciador><CuitFinanciador>30546741253</CuitFinanciador></Financiador><Prestador><CuitPrestador>30708402911</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial></Mensaje>";

$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $mensaje);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $consulta);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$resp=curl_exec ($ch);
curl_close ($ch);

$xml = new SimpleXmlElement($resp, LIBXML_NOCDATA);

foreach($xml->EncabezadoMensaje->Rta->MensajeDisplay as $item1){
$mensaje_display = $item1;
}

foreach($xml->EncabezadoMensaje->Rta->MensajePrinter as $item2){
$mensaje_printer = $item2;
}

foreach($xml->EncabezadoMensaje->IdMsj as $item3){
$id = $item3;
}

foreach($xml->EncabezadoAtencion->Credencial->NumeroCredencial as $item4){
$credencial = $item4;
}

foreach($xml->EncabezadoAtencion->Credencial->NumeroCredencial as $item4){
$credencial = $item4;
}

foreach($xml->EncabezadoAtencion->Credencial->PlanCredencial as $item5){
$plan = $item5;
}

foreach($xml->EncabezadoAtencion->Credencial->CondicionIVA as $item6){
$iva = $item6;
}

foreach($xml->EncabezadoAtencion->Beneficiario->ApellidoBeneficiario as $item6){
$apellido = $item6;
}

foreach($xml->EncabezadoAtencion->Beneficiario->NombreBeneficiario as $item7){
$nombre = $item7;
}

foreach($xml->EncabezadoAtencion->Beneficiario->Sexo as $item8){
$sexo = $item8;
}


foreach($xml->EncabezadoMensaje->NroReferencia as $item9){
$transaccion = $item9;
}

foreach($xml->EncabezadoAtencion->NroDocBeneficiario as $item10){
$nro_documento = $item10;
}

foreach($xml->EncabezadoAtencion->Beneficiario->FechaNacimiento as $item11){
$fecha_nacimiento = $item11;
}

foreach($xml->EncabezadoMensaje->Rta->CodRtaGeneral as $item12){
 $respuesta1 = $item12;
}


/////////////////

switch ($respuesta1){
case "00": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "01": { 	$respuesta = "ERROR, ERROR VALIDACION TO. LLAME A ITC 	";break;}
case "02": {	$respuesta = "ERROR, ADMINISTRADORA NO VIGENTE O INEXISTENTE 	";break;}
case "03": { 	$respuesta = "ERROR, TERMINAL INEXISTENTE 	";break;}
case "04": { 	$respuesta = "ERROR, TERMINAL DADA DE BAJA 	";break;}
case "05": { 	$respuesta = "ERROR, TERMINAL INEXISTENTE EN ADMINISTRADORA 	";break;}
case "06": { 	$respuesta = "ERROR, TIPO DE TRANSACCION INEXISTENTE 	";break;}
case "07": { 	$respuesta = "ERROR, TIPO DE TRANSACCION NO HABILITADA 	";break;}
case "10": { 	$respuesta = "ERROR, EL NUMERO DE ASOCIADO XX ES INEXISTENTE O INCORRECTO. 	";break;}
case "11": { 	$respuesta = "ERROR, EL ASOCIADO NUMERO XX NO ESTA VIGENTE. 	";break;}
case "12": { 	$respuesta = "ERROR, EL ASOCIADO NUMERO XX NO ESTA HABILITADO, COMUNIQUESE CON YY. 	";break;}
case "13": { 	$respuesta = "ERROR, LA CREDENCIAL SE ENCUENTRA VENCIDA. 	";break;}
case "14": { 	$respuesta = "ERROR, EL ASOCIADO NUMERO XX SE ENCUENTRA SUSPENDIDO. ";break;}	
case "20": { 	$respuesta = "ERROR, PRESTADOR INVALIDO O NO HABILITADO. 	";break;}
case "21": { 	$respuesta = "ERROR, PRESTADOR NO AUTORIZADO PARA EL SERVICIO. 	";break;}
case "22": { 	$respuesta = "ERROR, PLAN NO CONTRATADO. 	";break;}
case "23": { 	$respuesta = "ERROR, TIPO DE TRANSACCION INHABILITADA";break;} 	
case "30": { 	$respuesta = "ERROR, LA PRESTACION XX Y/O EL PLAN DEL ASOCIADO NO ESTA HABILITADO. 	";break;}
case "31": { 	$respuesta = "ERROR, PRESTACION XX NO CONTRATADA. 	";break;}
case "32": { 	$respuesta = "ERROR, LA PRESTACION XX ES INEXISTENTE. 	";break;}
case "33": { 	$respuesta = "ERROR, LA PRESTACION XX NO ESTA HABILITADA, ASOCIADO CON CARENCIAS O PREEXISTENCIAS. 	";break;}
case "34": { 	$respuesta = "ERROR, LA PRESTACION XX REQUIERE AUTORIZACION PREVIA. 	";break;}
case "35": { 	$respuesta = "ERROR, LA PRESTACION XX SUPERA EL TOPE. 	";break;}
case "36": { 	$respuesta = "ERROR, LA PRESTACION XX NO REQUIERE AUTORIZACION PREVIA. 	";break;}
case "37": { 	$respuesta = "ERROR, LA PRESTACION XX REQUIERE AUDITORIA MEDICA U ORDEN DE INTERNACION. 	";break;}
case "38": { 	$respuesta = "ERROR, LA PRESTACION XX NO ESTA INCLUIDA EN EL PLAN. 	";break;}
case "39": { 	$respuesta = "ERROR, PRESTACION XX REPETIDA 	";break;}
case "40": { 	$respuesta = "ERROR, LA FECHA INGRESADA DE LA PRESTACION NO ES VALIDA. 	";break;}
case "41": { 	$respuesta = "ERROR, HA SUPERADO LOS DIAS PARA REGISTRAR UNA PRESTACION. 	";break;}
case "42": { 	$respuesta = "ERROR, SEXO INVALIDO PARA LA PRESTACION XX. 	";break;}
case "43": { 	$respuesta = "ERROR, FECHA FUERA DE RANGO PARA LA PRESTACION XX 	";break;}
case "50": { 	$respuesta = "ERROR, LA ORDEN DE AUTORIZACION NUMERO XX NO EXISTE. 	";break;}
case "51": { 	$respuesta = "ERROR, LA ORDEN DE AUTORIZACION NUMERO XX NO SE PUEDE ANULAR. ";break;}	
case "52": { 	$respuesta = "ERROR, LA ORDEN DE AUTORIZACION NUMERO XX FUE RECHAZADA. 	";break;}
case "53": { 	$respuesta = "ERROR, EL ASOCIADO NUMERO XX NO TIENE ORDENES DE AUTORIZACION VIGENTES. 	";break;}
case "60": { 	$respuesta = "ERROR, ANULACION INVALIDA, NUMERO DE TRANSACCION XX INEXISTENTE. 	";break;}
case "61": { 	$respuesta = "ERROR, ANULACION INVALIDA, TRANSACCION NUMERO XX NO ANULABLE. 	";break;}
case "62": { 	$respuesta = "ERROR, LA TRANSACCION NUMERO XX YA FUE ANULADA. 	";break;}
case "70": { 	$respuesta = "ERROR, EL NUMERO DE ASOCIADO XX NO SE ENCUENTRA HABILITADO. (Para caso de TO) 	";break;}
case "71": { 	$respuesta = "ERROR, NO HAY COMUNICACION CON EL SISTEMA. INTENTE NUEVAMENTE. (Para caso de TO) 	";break;}
case "72": { 	$respuesta = "ERROR, NO HAY COMUNICACION CON EL SISTEMA. INTENTE NUEVAMENTE. (Para caso de TO) 	";break;}
case "80": { 	$respuesta = "ERROR, TRANSACCION CON FORMATO INVALIDO 	";break;}
case "92": { $respuesta = "ERROR, COMUNIQUESE CON ITC 	";break;}
case "101": { $respuesta = "Validador de destino NO habilitado. La transacción no puede ser procesada por XX. 	";break;}
case "102": { $respuesta = "Financiador de destino NO habilitado. La transacción no puede ser procesada por XX. 	";break;}
case "200": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO TROQUEL XX INEXISTENTE. REVISE EL TROQUEL ENVIADO. ";break;}	
case "201": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX DADO DE BAJA 	";break;}
case "202": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX NO CUBIERTO 	";break;}
case "203": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX CUBIERTO POR REINTEGRO ";break;}	
case "204": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX PROVISTO POR FINANCIADOR 	";break;}
case "205": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX DE VENTA LIBRE 	";break;}
case "206": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX SOLO AUTORIZADO PM/PMI 	";break;}
case "207": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX RESTRINGIDO REQ.AUT. 	";break;}
case "208": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX AUT. SOLO RES.310/04 	";break;}
case "209": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX RESTRINGIDO REQ.AUT. 	";break;}
case "210": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA TROQUEL XX - XX DUPLICADO 	";break;}
case "211": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA FECHA DE RECETA INCORRECTA 	";break;}
case "212": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA PRECIO INVALIDO MEDICAMENTO XX - XX 	";break;}
case "213": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA CANTIDAD EXCEDIDA DE MEDICAMENTOS 	";break;}
case "214": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA NO HAY RECETA AUTORIZADA 	";break;}
case "215": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO TROQUEL XX NO ESTA EN TICKET 	";break;}
case "216": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA TAMAÑO DEL MEDICAMENTO XX - XX INVALIDO 	";break;}
case "217": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA PERIODO DE CONSUMO INVALIDO MEDICAMENTO XX 	";break;}
case "218": { $respuesta = "ERROR, DEBE INGRESAR AL MENOS 1 MEDICAMENTO DEBE INGRESAR AL MENOS 1 MEDICAMENTO. 	";break;}
case "300": { $respuesta = "Error en Cierre de Lote. No hay tickets para procesar 	";break;}
case "301": { $respuesta = "Error en Cierre de Lote. No existe Cierre 	";break;}
case "302": { $respuesta = "Error en Cierre de Lote. Ticket ya ingresado en cierre ";break;}	
case "303": { $respuesta = "Error en Cierre de Lote. Rango de fechas solicitado erroneo 	";break;}
case "400": { $respuesta = "Error en Médico No existe el médico efector 	";break;}
case "401": { $respuesta = "Error No existe el medico prescriptor 	";break;}
case "402": { $respuesta = "Error, Médico prescriptor No Habilitado 	";break;}
case "410": { $respuesta = "Error en Receta o Recetario, número de Receta Inválido 	";break;}
case "411": { $respuesta = "Error en Receta o Recetario Recetario ya utilizado 	";break;}
case "412": { $respuesta = "Error en Receta o Recetario Vencido 	";break;}
case "420": { $respuesta = "Error en Diagnóstico. No existe diagnóstico ingresado ";break;}
}

/////////////


$dia_nac = substr($fecha_nacimiento,6,2);
$mes_nac = substr($fecha_nacimiento,4,2);
$anio_nac = substr($fecha_nacimiento,0,4);





 $fecha_nacimiento;


if ($iva == "E"){
$tp_afiliado = "NO GRAVADO (OBLIGATORIO) EXENTO";
$tipo_afiliado = 0;
}else{
$tp_afiliado = "GRAVADO (VOLUNTARIO) CON IVA";
$tipo_afiliado = 1;
}

if ($sexo == "F"){
$sexo = "Femenino";
}else{
$sexo = "Masculino";
}


 $sql1="SELECT * FROM datos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);

$sigla=$result1->fields["sigla"];



 if ($respuesta1 == 00){?>

<table width="800" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="37" colspan="4"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">VALIDACION EN LINEA  AFILIADOS</font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#FFFF33"><div align="left"><font color="#000000" size="2">RESPUESTA OBRA SOCIAL:  <?php echo $respuesta1;?> - <?php echo $respuesta;?></font></div></td>
    </tr>


    <tr align="center" bordercolor="#FFFFFF">
      <td width="140" height="24">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td width="149"><div align="right"><font color="#000000" size="2">PLAN:</font></div></td>
      <td width="144"><div align="left"><font color="#000000" size="2"><?php echo $plan;?></font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td>        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_afiliado;?>"  size="20" maxlength="20">      
      </font></td>
      <td align="center"><div align="right"><font color="#000000" size="2">COSEGURO:</font></div></td>
      <td align="center"><div align="left"><font color="#000000" size="2"><?php echo $coseguro;?></font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24"><div align="left" class="Estilo25"><font color="#000000" size="2">TIPO AFILIADO </font></div></td>
      <td><font color="#000000" size="2"><?php echo $tp_afiliado;?>
	  
	   <input name="iva" type="hidden" value = "<?php echo $tipo_afiliado;?>">
	  
	  </font></td>
      <td align="center"><div align="right"></div></td>
      <td align="center"><div align="left"></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td colspan="3">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font></td>
  </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td colspan="3">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font></td>
  </tr>


    <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">TIPO DOCUMENTO</font></div>
      </div></td>
      <td colspan="3">        <font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
      </font></strong>
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td colspan="3"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">
      </font></strong></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">OBRA SOCIAL </font></div>
      </div></td>
      <td colspan="3"><font color="#000000" size="2"><strong><font color="#000000" size="2">

     <?php echo $nro_os;?> <?php echo $sigla;?>    <input name="nro_os" type="hidden" value = "<?php echo $nro_os;?>"></font></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">DOMICILIO</font></div>
      </div></td>
      <td colspan="3"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">LOCALIDAD</font></div>
      </div></td>
      <td colspan="3"><font size="2">

	  <?php 
$sql = "SELECT * FROM localidades order by cod_operacion";
$result = $db->Execute($sql);
echo "<select name=localidad[] size=1 id =localidad onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione LOCALIDAD</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$localidad=$result->fields["localidad"];



$departamento=strtoupper($result->fields["departamento"]);
echo"<option value=$localidad>$departamento ($localidad)</option>";
$result->MoveNext();
	}
echo"</select>";

?>  </td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">TEL. FIJO </font></div>
      </div></td>
      <td colspan="3"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">CELULAR</font></div>
      </div></td>
      <td colspan="3"><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">SEXO</font></div>
      </div></td>
      <td colspan="3"><font color="#000000" size="2">
      <?php echo $sexo;?>    <input name="sexo" type="hidden" value = "<?php echo $sexo;?>"></font></td>
      </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
      </div></td>
      <td colspan="3"><font color="#000000" size="2">

<?php echo $dia_nac;?> / <?php echo $mes_nac;?> / <?php echo $anio_nac;?>
        <input type="hidden" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $dia_nac;?>>

<input type="hidden" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $mes_nac;?>>

<input type="hidden" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4" value = <?php echo $anio_nac;?>>
      </font></td>
  <tr bordercolor="#FFFFFF">
    <td height="26" colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center">
      <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE">
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="273"></td>
    <td colspan="2"></td>
  </tr>  


</table>
  <?php }ELSE{ ?>
<table width="800" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="37" colspan="4"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">VALIDACION EN LINEA  AFILIADOS</font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#FFFF33"><div align="left"><font color="#000000" size="2">RESPUESTA OBRA SOCIAL:  <?php echo $respuesta1;?> - <?php echo $respuesta;?></font></div></td>
    </tr>

 <tr>
    <th height="36" bgcolor="#EDEDED" scope="col"><span class="Estilo1 Estilo4">
      <input name="button" type="button" id ="boton" onClick="history.back()" onKeyPress="history.back()" value="Presione ENTER">
    </span></th>
  </tr>
</table>


<?php
}
}
