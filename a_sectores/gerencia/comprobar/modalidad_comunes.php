
<?php switch ($modalidad){


case 1:
	{
$valor = ($honorarios * $vuh);
?>  <td><div align="center"><strong>$ <?php echo number_format($valor,2)?></strong></div></td><?php 	break;
}
case 2:
	{
		 if (($gastos == 0) && ($honorarios == 0))
					{
$valor = $valor;
?>  <td width="18%"><div align="center"><strong>$ <?php echo number_format($valor,2)?></strong></div></td><?php 					}
				else
					{
$valor = ($valor) + (($vuh * $honorarios) + ($vug * $gastos));
?>  <td width="2%"><div align="center"><strong>$ <?php echo number_format($valor,2)?></strong></div></td><?php 
					}

break;
}

case 3:
{
?>  <td width="2%"><div align="center"><strong>$ <?php echo number_format($valor,2)?></strong></div></td><?php break;
}
}
