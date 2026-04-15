
 <?php
 
/* $respuesta_error = nl2br( stripslashes( htmlentities($respuesta_error)));
 $respuesta1 = nl2br( stripslashes( htmlentities($respuesta1)));
  $respuesta = nl2br( stripslashes( htmlentities($respuesta)));
*/
?>

<table width="245" border="0" cellspacing="0">
    <!--DWLayoutTable-->

    <!-- <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#FFFF33"><div align="center" class="Estilo43"><font color="#000000"> <?php echo $respuesta1;?> - <?php echo $respuesta;?></font></div></td>
    </tr> -->

	   <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#FFFF33"><div align="center" class="Estilo43"><font color="#000000">  <?php echo $respuesta;?></font></div></td>
    </tr>

	 <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#FFFF33"><div align="center" class="Estilo43"><font color="#000000"> <?php echo $respuesta_error;?> </font></div></td>
    </tr>


	   <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#FFFF33"><div align="center" class="Estilo43"><font color="#000000"><?php echo $mensaje_display;?></font></div></td>
    </tr>

		   <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#FFFF33"><div align="center" class="Estilo43"><font color="#000000"><?php echo $mensaje_printer;?></font></div></td>
    </tr>

 <tr>
    <th height="36" bgcolor="#FFFF33" scope="col"><div align="center"><span class="Estilo1 Estilo4">
    <input name="button" type="button" id ="boton" onClick="history.back()" onKeyPress="history.back()" value="Presione ENTER">
</span></div></th>
  </tr>
</table>