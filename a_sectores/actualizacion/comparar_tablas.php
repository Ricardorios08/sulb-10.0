<?php 

$base1 = $_REQUEST['base1'];
$base2 = $_REQUEST['base2'];
$contra1= $_REQUEST['contra1'];

if ($contra1 == "Civico05"){

IF ($base1 == ""){
$leyenda = "NO INGRESO BASE 1";
include ("../../alertas/campo_informacion2.php");
}

IF ($base2 == ""){
$leyenda = "NO INGRESO BASE 2";
include ("../../alertas/campo_informacion2.php");
}



$dbuser="root";   //usuario mysql
$dbpass=""; //Clave mysqñ
 
$schema2compare= array('Sch1' => $base1, 'Sch2' => $base2);
$k= mysql_connect('localhost',$dbuser,$dbpass);
if (!$k)
{
    echo "No me pude conectar al servidor mysql<br>";
    exit();
}
 
 
//Comparacion de las dos bases de datos (Schemas) tabla por tabla
foreach ($schema2compare as $schema)
{
     $sql="show tables from $schema"; //Filtro para comparar solo algunas tablas  
    $res=mysql_query($sql);
    if (!$res)
    {
        echo "Error de BD, no se pudieron listar las tablas<br>";
        echo 'Error MySQL: ' . mysql_error();
        exit;
    }
    while ($r = mysql_fetch_row($res))
    {
        $base[$schema]['tabla'][$r[0]]=1;
    }
}
 
//Muestro las tablas que no estan en las dos bases de datos
 
$tablas_diferentes[$schema2compare['Sch1']]=(array_diff_key($base[$schema2compare['Sch1']]['tabla'], $base[$schema2compare['Sch2']]['tabla']));
$tablas_diferentes[$schema2compare['Sch2']]=(array_diff_key($base[$schema2compare['Sch2']]['tabla'], $base[$schema2compare['Sch1']]['tabla']));
?>
<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
-->
</style>

<div align="center"><h1 class="Estilo1"> Tablas Diferentes </h1>
</div>
<table align="center">
<tr>
<?php 
foreach ($tablas_diferentes as $tabla_diferente=>$valor)
{
    ?>
        <td valign="top" bgcolor="#66CCFF">
        <table border="1" cellpadding="0" cellpadding="0">
  <tr>
    <th bgcolor="#6699FF"><span class="Estilo1">
      <?php  echo $tabla_diferente ?></span></th> 
  </tr>
    <?php 
    foreach($valor as $v=>$val)
    {
        echo "<tr><td>$v</td></tr>";  
    }
    ?>
</table>
        </td>
    <?php 
}
?>
</tr>
</table>
</table>
<?php 
 
 
// Comparacion de las tablas que existen en las dos bases de datos
?>
<div align="center"><h1 class="Estilo1">Columnas Diferentes de las Tablas Presentes en las dos Bases </h1>
</div>
 
 
<?php 
$tablas_iguales=(array_intersect_key($base[$schema2compare['Sch1']]['tabla'], $base[$schema2compare['Sch2']]['tabla']));
foreach($tablas_iguales as $tabla_igual=>$valor)
{
    foreach ($schema2compare as $schema)
    {
        $sql="describe $schema.$tabla_igual";
        $res=mysql_query($sql);
        while ($r=mysql_fetch_row($res))
        {
           $tabla[$schema]['columna'][$r[0]]=1;  
        }
    }
    $columnas_diferentes[$schema2compare['Sch1']]=(array_diff_key($tabla[$schema2compare['Sch1']]['columna'], $tabla[$schema2compare['Sch2']]['columna']));
    $columnas_diferentes[$schema2compare['Sch2']]=(array_diff_key($tabla[$schema2compare['Sch2']]['columna'], $tabla[$schema2compare['Sch1']]['columna']));
    if ($columnas_diferentes[$schema2compare['Sch1']])
    {
        ?>
        <table border="0" align="center" cellspacing="0">
            <tr>
                <th colspan="2" bgcolor="#66CCFF"><?php  echo $tabla_igual ?></th>
            </tr>
            <tr>
        <?php 
        foreach ($columnas_diferentes as $columna_diferente=>$valor)
        {
        ?>
            <td valign="top">
            <table border="1" cellpadding="0" cellpadding="0">
            <tr><th bgcolor="#6699FF"><?php  echo $columna_diferente ?></th> 
            </tr>
        <?php 
            foreach($valor as $v=>$val)
            {
                echo "<tr><td>$v</td></tr>";  
            }
            ?>
</table>
                </td>
            <?php 
        }
        ?>
        </tr>
        </table>
        <hr />
        <?php 
 
        
    }
    $columnas_diferentes=array();
    $tabla=array();
}

}else{

$leyenda = "CONTRASEÑA INCORRECTA";
include ("../../alertas/campo_informacion2.php");
}
?>