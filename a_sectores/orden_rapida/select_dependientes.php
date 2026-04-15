<?php
function generaPaises()
{
	include 'conexion.php';
	conectar();
	$consulta=mysql_query("SELECT nro_os, sigla FROM datos_os order by sigla");
	desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='paises[]' id='paises' onChange='cargaContenido(this.id)' class = 'ctxt'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>AJAX, Ejemplos: Combos (select) dependientes, codigo fuente - ejemplo</title>
<link rel="stylesheet" type="text/css" href="select_dependientes.css">
<link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="select_dependientes.js"></script>
</head>

<body>

<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">PRACTICAS</div></td>
  </tr>


<form action="../validacion/buscar_convenida_validacion.php" method="post"  target ="central">


			
		
		
		 <tr>
              <td><?php generaPaises(); ?></td>
            </tr>
	
            <tr>
              <td>			  
			  <select disabled="disabled" name="estados" id="estados" >
			  <option value="0">Selecciona opci&oacute;n...</option>
			</select>
					
					</td>
            </tr>
           
			
  <tr>
    <td>
      <div align="CENTER">
        <input name = "palabra" type = "text" size = "15" class = 'ctxt'/>
        </div></td>
  </tr>
  
  <tr>
    <td><div align="center"><span class="Estilo5">
      <input type = "hidden" name = "usuario" value = "<?php echo $usuario;?>" />
      <input type = "submit" name = "buscar" value = "BUSCAR" class ='bot1' >
    </span></div></td>
  </tr>
</table>
</form>




</body>
</html>