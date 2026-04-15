 
<style type="text/css">
<!--
.Estilo25 {color: #FFFFFF}
-->
</style>

<table width="828" border="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#0066FF" bgcolor="#000066">
    <td colspan="8"><div align="center"><strong><img src="../../imagenes/obras.jpg"></strong></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#333333"> 
<td width="19"><div align="center" class="Estilo25"><font size="2" face="Arial, Helvetica, sans-serif">ID</font></div></td>
    <td width="167"><div align="center" class="Estilo25"><font size="2" face="Arial, Helvetica, sans-serif">SIGLA</font></div></td>
    <td width="410"><div align="center" class="Estilo25">
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">RAZON SOCIAL</font></div>
    </div></td>
   
    <td width="60"><div align="center" class="Estilo25">
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Convenio</font></div>
    </div></td>
	    <td width="65"><div align="right" class="Estilo25">
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Requisito</font></div>
    </div></td>
    <td width="52"><div align="center" class="Estilo25">
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Mod</font></div>
    </div></td>
    <td width="47"><div align="center" class="Estilo25">
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Eli</font></div>
    </div></td>
    <td width="65"><div align="right" class="Estilo25">
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Ficha</font></div>
    </div></td>
  </tr>
  </table>


  <?php 

$buscador_rapido=2;

$busqued=$_POST["busqueda"];

	for ($i=0;$i<count($busqued);$i++)    
	{     
	$busqueda = $busqued[$i];    
	}

$busca=$_POST["busca"];

$requisito=$_POST["requisito"];



$palabra = $busca;

$busqueda = "TODAS";
	switch ($busqueda)
	{



	case "TODAS":
		{
//	include ("a_obras sociales/buscar_os.php");

?><iframe src="a_obras sociales/os_m.php?palabra=<?php print("$busca");?>&&requisito=<?php print("$requisito");?>" width="850" height = "300"  frameborder="0"> </iframe>

<?php


	break;
		}




				



}