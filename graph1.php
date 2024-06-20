<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');
require_once ('php/connect.php');


include ('php/connect.php');
$sql = mysqli_query($conn, "SELECT SUM(SD) as total, SUM(SMP) as total1, SUM(SMA) as total2, SUM(D3) as total3, SUM(usia1) as total4, SUM(usia2) as total5, SUM(usia3) as total6, SUM(usia4) as total7, SUM(laki) as total8, SUM(perempuan) as total9 FROM kasus");
$row = mysqli_fetch_array($sql);
$sum = $row['total'];
$sum1 = $row['total1'];
$sum2 = $row['total2'];
$sum3 = $row['total3'];
$sum4 = $row['total4'];
$sum5 = $row['total5'];
$sum6 = $row['total6'];
$sum7 = $row['total7'];
$sum8 = $row['total8'];
$sum9 = $row['total9'];

$datay=array($sum, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9);


// Create the graph. These two calls are always required
$graph = new Graph(350,220,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array($sum, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9), array(15,45,75,105,135,151,452,753,1054,1355));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('A','B','C','D','E','F','G','H','I','J'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("Bar Gradient(Left reflection)");

// Display the graph
$graph->Stroke();
?>