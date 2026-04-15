<?php // content="text/plain; charset=utf-8"


require_once ('../../../drivers/jpgraph/src/jpgraph.php');
require_once ('../../../drivers/jpgraph/src/jpgraph_log.php');
require_once ('../../../drivers/jpgraph/src/jpgraph_line.php');
 
 
$ydata=array($uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve,$diez,$once, $doce);
$datax = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT" , "NOV", "DIC");
 
// Create the graph. These two calls are always required
$graph = new Graph(800,400);
$graph->SetScale("textlog");
 
$graph->img->SetMargin(40,110,20,40);
$graph->SetShadow();
 
$graph->ygrid->Show(true,true);
$graph->xgrid->Show(true,false);
 
// Specify the tick labels
$a = $gDateLocale->GetShortMonth();
$graph->xaxis->SetTickLabels($a);
 
// Create the linear plot
$lineplot=new LinePlot($ydata);
 
// Add the plot to the graph
$graph->Add($lineplot);
 
$graph->title->Set("Pacientes por mes");
$graph->xaxis->title->Set("MESES");
$graph->yaxis->title->Set("CANTIDAD");
 
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
$lineplot->SetColor("blue");
$lineplot->SetWeight(2);
 
$graph->yaxis->SetColor("blue");
 
$lineplot->SetLegend("Plot 1");
 
$graph->legend->Pos(0.05,0.5,"right","center");
 
// Display the graph
$graph->Stroke();
?>
