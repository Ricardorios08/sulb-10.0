<?php

class Menu {
  private $enlaces=array();
  private $titulos=array();
  public function cargarOpcion($en,$tit)
  {
    $this->enlaces[]=$en;
    $this->titulos[]=$tit;
  }
  public function mostrar()
  {
    for($f=0;$f<count($this->enlaces);$f++)
    {
      echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
      echo "-";
    }
  }
}


class conexion{
	private $conection;
	private $total_consultas;
	private $respuesta;
	function conexion($server,$user,$password,$database_name){
	$this->valor=$user;
	$this->conection=mysql_connect($server,$user,$password);
	mysql_select_db($database_name,$this->conection);

	}
	function datos_personales($table_name){
	 $query="select * from ".$table_name;

		echo($this->valor);

		$this->respuesta=mysql_query($query,$this->conection) or die(mysql_error());

		while ($row = mysql_fetch_array($this->respuesta, 3)) {

?>

<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo1 {font-size: 10px}
.Estilo3 {
	font-size: 12px;
	font-weight: bold;
}
.Estilo33 {font-family: "Trebuchet MS"; font-weight: bold; }
.Estilo34 {font-size: 10px; font-family: "Trebuchet MS"; }
-->
</style>

<table width="800" border="0">
  <!--DWLayoutTable-->

  <tr bgcolor="#CECECE">
    <td colspan="10"><div align="center"><img src="../../imagenes/titulo_personal.jpg"></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center" class="Estilo34">NOMBRE Y APELLIDO DEL PACIENTE </div></td>
    <td colspan="3"><div align="center" class="Estilo33"><font size="1">DOCUMENTO</font></div></td>
    <td width="235"><div align="center"><span class="Estilo34">OBRA SOCIAL</span></div></td>
    <td width="103"><div align="center"><font size="1">HISTORIA CLINICA</font></div></td>
  </tr>





<?php


printf("
ID: %s  Name: %s Paciente Paterno: %s", $row[0], $row[1],$row[2]);
		

		?><tr>
    <td colspan="5" valign="middle"><div align="left"><a href="../grabacion/grabar_nuevo\grabacion_ordenes.php?nro_paciente=<?php print("$row[0]");?>&&nro_os=<?php print("$nro_os");?>"> </a>      <span class="Estilo3"><font face="Arial, Helvetica, sans-serif"><?php echo $row[1];?> (<?php echo $row[0];?>)</font></span></div></td>
    <td colspan="3" valign="middle"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><span class="Estilo3"><font face="Arial, Helvetica, sans-serif"><?php echo $row[2];?></font></span></font></div></td>
    <td valign="middle"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><span class="Estilo1"><?php echo $sigla;?> <?php echo $nro_os;?></span></font></div></td>
    <td valign="middle"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="buscar_paciente_individual.php?palabra=<?php print("$nro_paciente");?>" target = "central"><img src="../../imagenes/office//027.ico" alt="Modificar" border = "0"></a></font></div></td>
  </tr><?php

}

		$this->total_consultas=mysql_num_rows($this->respuesta);

		echo("
".$this->total_consultas);

	}

}

$obj = new conexion("localhost","root","","asensio");

?>
