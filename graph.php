<?php // content="text/plain; charset=utf-8"
          require_once ('jpgraph/src/jpgraph.php');
          require_once ('jpgraph/src/jpgraph_bar.php');
          require_once ('php/connect.php');
          require_once ('../admin/index2.php');
          
         $sql = mysqli_query($conn, "SELECT SUM(SD) as total, SUM(SMP) as total1, SUM(SMA) as total2, SUM(D3) as total3, SUM(usia1) as total4, SUM(usia2) as total5, SUM(usia3) as total6, SUM(usia4) as total7, SUM(laki) as total8, SUM(perempuan) as total9 FROM kasus WHERE pasal='$Pasal' AND bulan='1'");
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

            $sql2 = mysqli_query($conn, "SELECT SUM(SD) as totall, SUM(SMP) as totall1, SUM(SMA) as totall2, SUM(D3) as totall3, SUM(usia1) as totall4, SUM(usia2) as totall5, SUM(usia3) as totall6, SUM(usia4) as totall7, SUM(laki) as totall8, SUM(perempuan) as totall9 FROM kasus WHERE pasal='$Pasal' AND bulan='2'");
            $rows = mysqli_fetch_array($sql2);
            $sums = $rows['totall'];
            $sums1 = $rows['totall1'];
            $sums2 = $rows['totall2'];
            $sums3 = $rows['totall3'];
            $sums4 = $rows['totall4'];
            $sums5 = $rows['totall5'];
            $sums6 = $rows['totall6'];
            $sums7 = $rows['totall7'];
            $sums8 = $rows['totall8'];
            $sums9 = $rows['totall9'];

            $sql3 = mysqli_query($conn, "SELECT SUM(SD) as totalll, SUM(SMP) as totalll1, SUM(SMA) as totalll2, SUM(D3) as totalll3, SUM(usia1) as totalll4, SUM(usia2) as totalll5, SUM(usia3) as totalll6, SUM(usia4) as totalll7, SUM(laki) as totalll8, SUM(perempuan) as totalll9 FROM kasus WHERE pasal='$Pasal' AND bulan='3'");
            $rowz = mysqli_fetch_array($sql3);
            $sumz = $rowz['totalll'];
            $sumz1 = $rowz['totalll1'];
            $sumz2 = $rowz['totalll2'];
            $sumz3 = $rowz['totalll3'];
            $sumz4 = $rowz['totalll4'];
            $sumz5 = $rowz['totalll5'];
            $sumz6 = $rowz['totalll6'];
            $sumz7 = $rowz['totalll7'];
            $sumz8 = $rowz['totalll8'];
            $sumz9 = $rowz['totalll9'];

            $sql4 = mysqli_query($conn, "SELECT SUM(SD) as totald, SUM(SMP) as totald1, SUM(SMA) as totald2, SUM(D3) as totald3, SUM(usia1) as totald4, SUM(usia2) as totald5, SUM(usia3) as totald6, SUM(usia4) as totald7, SUM(laki) as totald8, SUM(perempuan) as totald9 FROM kasus WHERE pasal='$Pasal' AND bulan='4'");
            $rowd = mysqli_fetch_array($sql4);
            $sumd = $rowd['totald'];
            $sumd1 = $rowd['totald1'];
            $sumd2 = $rowd['totald2'];
            $sumd3 = $rowd['totald3'];
            $sumd4 = $rowd['totald4'];
            $sumd5 = $rowd['totald5'];
            $sumd6 = $rowd['totald6'];
            $sumd7 = $rowd['totald7'];
            $sumd8 = $rowd['totald8'];
            $sumd9 = $rowd['totald9'];

            $sql5 = mysqli_query($conn, "SELECT SUM(SD) as totalq, SUM(SMP) as totalq1, SUM(SMA) as totalq2, SUM(D3) as totalq3, SUM(usia1) as totalq4, SUM(usia2) as totalq5, SUM(usia3) as totalq6, SUM(usia4) as totalq7, SUM(laki) as totalq8, SUM(perempuan) as totalq9 FROM kasus WHERE pasal='$Pasal' AND bulan='5'");
            $rowq = mysqli_fetch_array($sql5);
            $sumq = $rowq['totalq'];
            $sumq1 = $rowq['totalq1'];
            $sumq2 = $rowq['totalq2'];
            $sumq3 = $rowq['totalq3'];
            $sumq4 = $rowq['totalq4'];
            $sumq5 = $rowq['totalq5'];
            $sumq6 = $rowq['totalq6'];
            $sumq7 = $rowq['totalq7'];
            $sumq8 = $rowq['totalq8'];
            $sumq9 = $rowq['totalq9'];

            $sql6 = mysqli_query($conn, "SELECT SUM(SD) as totalw, SUM(SMP) as totalw1, SUM(SMA) as totalw2, SUM(D3) as totalw3, SUM(usia1) as totalw4, SUM(usia2) as totalw5, SUM(usia3) as totalw6, SUM(usia4) as totalw7, SUM(laki) as totalw8, SUM(perempuan) as totalw9 FROM kasus WHERE pasal='$Pasal' AND bulan='6'");
            $roww = mysqli_fetch_array($sql6);
            $sumw = $roww['totalw'];
            $sumw1 = $roww['totalw1'];
            $sumw2 = $roww['totalw2'];
            $sumw3 = $roww['totalw3'];
            $sumw4 = $roww['totalw4'];
            $sumw5 = $roww['totalw5'];
            $sumw6 = $roww['totalw6'];
            $sumw7 = $roww['totalw7'];
            $sumw8 = $roww['totalw8'];
            $sumw9 = $roww['totalw9'];

            $sql7 = mysqli_query($conn, "SELECT SUM(SD) as totale, SUM(SMP) as totale1, SUM(SMA) as totale2, SUM(D3) as totale3, SUM(usia1) as totale4, SUM(usia2) as totale5, SUM(usia3) as totale6, SUM(usia4) as totale7, SUM(laki) as totale8, SUM(perempuan) as totale9 FROM kasus WHERE pasal='$Pasal' AND bulan='7'");
            $rowe = mysqli_fetch_array($sql7);
            $sume = $rowe['totale'];
            $sume1 = $rowe['totale1'];
            $sume2 = $rowe['totale2'];
            $sume3 = $rowe['totale3'];
            $sume4 = $rowe['totale4'];
            $sume5 = $rowe['totale5'];
            $sume6 = $rowe['totale6'];
            $sume7 = $rowe['totale7'];
            $sume8 = $rowe['totale8'];
            $sume9 = $rowe['totale9'];
            

          $dataay=array($sum, $sums, $sumz, $sumd, $sumq, $sumw, $sume);
          $data1y=array($sum1, $sums1, $sumz1, $sumd1, $sumq1, $sumw1, $sume1);
          $data2y=array($sum2, $sums2, $sumz3, $sumd2, $sumq2, $sumw2, $sume2);
          $data3y=array($sum3, $sums3, $sumz3, $sumd3, $sumq3, $sumw3, $sume3);
          $data4y=array($sum4, $sums4, $sumz4, $sumd4, $sumq4, $sumw4, $sume4);
          $data5y=array($sum5, $sums5, $sumz5, $sumd5, $sumq5, $sumw5, $sume5);
          $data6y=array($sum6, $sums6, $sumz6, $sumd6, $sumq6, $sumw6, $sume6);
          $data7y=array($sum7, $sums7, $sumz7, $sumd7, $sumq7, $sumw7, $sume7);
          $data8y=array($sum8, $sums8, $sumz8, $sumd8, $sumq8, $sumw8, $sume8);
          $data9y=array($sum9, $sums9, $sumz9, $sumd9, $sumq9, $sumw9, $sume9);
          
          
          // Create the graph. These two calls are always required
          $graph = new Graph(1000,500,'auto');
          $graph->SetScale("textlin");
          
          $theme_class=new UniversalTheme;
          $graph->SetTheme($theme_class);
          
          $graph->yaxis->SetTickPositions(array(0,10,20,30,40,50,60,70), array(15,45,75,105,135));
          $graph->SetBox(false);
          
          $graph->ygrid->SetFill(false);
          $graph->xaxis->SetTickLabels(array('Januari','Februari','Maret','April','Mei','Juni','Juli'));
          $graph->yaxis->HideLine(false);
          $graph->yaxis->HideTicks(false,false);
          
          // Create the bar plots
          $baplot = new BarPlot($dataay);
          $b1plot = new BarPlot($data1y);
          $b2plot = new BarPlot($data2y);
          $b3plot = new BarPlot($data3y);
          $b4plot = new BarPlot($data4y);
          $b5plot = new BarPlot($data5y);
          $b6plot = new BarPlot($data6y);
          $b7plot = new BarPlot($data7y);
          $b8plot = new BarPlot($data8y);
          $b9plot = new BarPlot($data9y);
          
          // Create the grouped bar plot
          $gbplot = new GroupBarPlot(array($baplot,$b1plot,$b2plot,$b3plot,$b4plot,$b5plot,$b6plot,$b7plot,$b8plot,$b9plot));
          // ...and add it to the graPH
          $graph->Add($gbplot);
          
          $baplot->SetColor("white");
          $baplot->SetFillColor("#61ccc7");
          
          $b1plot->SetColor("white");
          $b1plot->SetFillColor("#cc1111");
          
          $b2plot->SetColor("white");
          $b2plot->SetFillColor("#11cccc");
          
          $b3plot->SetColor("white");
          $b3plot->SetFillColor("#1111cc");

          $b4plot->SetColor("white");
          $b4plot->SetFillColor("#43e8d8");

          $b5plot->SetColor("white");
          $b5plot->SetFillColor("#ee4d2e");

          $b6plot->SetColor("white");
          $b6plot->SetFillColor("#161618");

          $b7plot->SetColor("white");
          $b7plot->SetFillColor("#43e8d8");

          $b8plot->SetColor("white");
          $b8plot->SetFillColor("#875743");

          $b9plot->SetColor("white");
          $b9plot->SetFillColor("#efd566");

          $graph->title->Set("TAHUN 2020");
          
          // Display the graph
          $graph->Stroke();
          ?>