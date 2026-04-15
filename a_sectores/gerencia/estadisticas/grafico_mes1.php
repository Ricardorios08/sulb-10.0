<?php // content="text/plain; charset=utf-8"

require_once ('../../../drivers/jpgraph/src/jpgraph.php');
require_once ('../../../drivers/jpgraph/src/jpgraph_line.php');
 
// Some data

$datay=array($uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve,$diez,$once, $doce);

 
 
// Setup the graph
$graph = new Graph(800,400);
$graph->SetMargin(40,40,20,30);    
$graph->SetScale("intlin");
$graph->SetMarginColor('darkgreen@0.8');
 
$graph->title->Set('Gradient filled line plot');
$graph->yscale->SetAutoMin(0);
 
// Create the line
$p1 = new LinePlot($datay);
$p1->SetColor("blue");
$p1->SetWeight(0);
$p1->SetFillGradient('red','yellow');
 
$graph->Add($p1);
 
// Output line
$graph->Stroke();
 
?>
?>

