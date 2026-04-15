<script type="text/javascript">
function ocultamenu(){
  var menu = document.getElementById("Atributos");
  menu.style.display = "none";
}
function despliega(){
  var menu = document.getElementById("Atributos");
    if(menu.style.display == "none"){
      menu.style.display = "block";
    }
    else{
      menu.style.display = "none";
    }
}


function on_load()
{
document.getElementById("nro_laboratorio").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				

					case "nro_laboratorio":
				document.getElementById("nro_liquidacion").focus();
				break;

				case "nro_liquidacion":
				document.getElementById("periodo").focus();
				break;

				
				case "periodo":
				document.getElementById("anio").focus();
				break;

				case "anio":
				document.getElementById("buscar").focus();
				break;
				

		}
		return false;
	}
	return true;
}


</script>


<?include ("../../../conexiones/config.inc.php");
$sql1="select * from fecha_ultima_liq";
$result1 = $db_liq->Execute($sql1);
 $nro_liquidacion=$result1->fields["nro_liquidacion"];
$periodo=$result1->fields["periodo"];
$anio=$result1->fields["anio"];

$result1 = $db_liq->Close($sql1);

?>


<BODY background="../../../IMAGENES/IZQUIERDA.PNG" onload = "on_load ()"">

	  <form action="buscar_liquidacion.php" method="post"  target ="central">
	    <table width="152" border="0">
      <tr bgcolor="#000099">
        <td colspan="2"><div align="center"><font color="#FFFFFF"><strong>INDIVIDUAL</strong></font> </div></td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td width="57">
        
            <div align="right"><font color="#0000FF">Cuenta:</font></div>
         
        </div></td>
        <td width="85"><input type = "text" name = "nro_laboratorio" size = "4" id = "nro_laboratorio"  onKeyPress="return verif_caracter(this,event)"> </td>
		<input type = "hidden" name = "buscador_rapido" value = "1">
      </tr>
      <tr bordercolor="#FFFFFF">
        <td><div align="right"><font color="#0000FF">N&ordm; Liq.:</font></div></td>
        <td><strong><font color="#000000" size="2">
          <input name = "nro_liquidacion" type = "text" value="<?echo $nro_liquidacion;?>" size = "4" id = "nro_liquidacion"  onKeyPress="return verif_caracter(this,event)">
        </font></strong></td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td><div align="right">
          <font color="#0000FF">Periodo:</font>
        </div></td>
        <td>
		
		
		
		<input name = "periodo" type = "text" value="<?echo $periodo;?>" size = "4" id = "periodo"  onKeyPress="return verif_caracter(this,event)"> </td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF">A&ntilde;o:</font></div></td>
        <td><strong><font color="#000000" size="2">
          <input name = "anio" type = "text" value="<?echo $anio;?>" size = "4" id = "anio"  onKeyPress="return verif_caracter(this,event)">
        </font></strong></td>
      </tr>
      <tr>
        <td colspan="2"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="que_ver" type="radio" value="1" checked>
      LIQUIDACION</font></div></td>
      </tr>
      <tr>
        <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="que_ver" type="radio" value="2">
DEUDA MASIVA </font></td>
      </tr>
      <tr>
        <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="que_ver" type="radio" value="4">
        MASIVA


</font></td>
      </tr>
      <tr>
        <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="que_ver" type="radio" value="5">
        IVA
</font></td>
      </tr>
      <tr>
        <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="que_ver" type="radio" value="8">
IVA </font><font size="2" face="Arial, Helvetica, sans-serif">MASIVA</font></td>
      </tr>



      <tr bgcolor="#000099">
        <td colspan="2"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">IMPRIMIR</font></div></td>
      </tr>
      <tr>
        <td colspan="2">          <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="radiobutton" type="radio" value="1" checked>
          1
(1 - 300)                 
      </font></div></td>
      </tr>
      <tr>
        <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="radiobutton" type="radio" value="2">
        2 (300 - 600)       </font></td>
      </tr>
      <tr>
        <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="radiobutton" type="radio" value="3">
3
(600 - 900)        </font></td>
      </tr>
      <tr>
        <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="radiobutton" type="radio" value="4">
4
(900 - 7999)        </font></td>
      </tr>
      <tr>
        <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="radiobutton" type="radio" value="5">
        Sociedades
(&gt;8000)</font></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type = "submit" name = "buscar" value = "BUSCAR" id = "buscar">
        </div></td>
      </tr>
	     <tr bgcolor="#000099">
        <td colspan="2"><div align="center"><font color="#FFFFFF"><strong>IR A....</strong></font> </div></td>
      </tr>
      <tr>
        <td height="12" colspan="2"><div align="center"></div>
		
        <div align="center"><a href="../../consulta_bq/laboratorios/informes.php" target ="izquierda"><font color="#0000FF">Atras</font></a> </div></td>
      </tr>

      <tr>
        <td colspan="2"><div align="center"><font color="#0000FF"><a href="../../../index.html" target ="_top".>Salir</a></font></div></td>
      </tr>
      <tr>
    
</table>
</form>
</body>
