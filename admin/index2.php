<?php 
  include ('../php/access.php');
  require_once ('../php/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kejaksaan Negeri Cilacap - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/Kejari2.jpg" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/datatables/dataTables.bootstrap.min.css" rel="stylesheet"/>
  <link href="../assets/orgchart/jquery.orgchart.css" rel="stylesheet"/>
  
  


  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v1.4.1
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <h1 class="text-light"><a href="#">Kejaksaan Negeri Cilacap</a></h1>
      </div>

      <nav class="nav-menu">
        <ul>
        <li class="nav-item dropdown no-arrow active">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-file-blank"></i><span>Lihat Data</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" style = "color:dodgerblue" href="index2.php">
                  Data Kasus SPDP
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:dodgerblue" href="index3.php">
                  Data Pidum
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:dodgerblue" href="index4.php">
                  Data Tahun, Pasal, dan Pidum
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:dodgerblue" href="index5.php">
                  Foto Grafik
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:dodgerblue" href="index6.php">
                  Bagan
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:dodgerblue" href="admin.php">
                  Admin
                </a>
              
              </div>  
          </li>
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-book-content"></i><span>Isi Data</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" style = "color:dodgerblue" href="data.php">
                  Tambah Kasus
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:dodgerblue" href="pidum.php">
                  Tambah Pidum
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:dodgerblue" href="tahun.php">
                  Tambah Tahun, Pasal, dan Pidum
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:dodgerblue" href="galeri.php">
                  Tambah Foto Grafik
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:dodgerblue" href="tambahadmin.php">
                  Tambah Admin
                </a>
              </div>
          </li>
          <li><a href="../php/logout.php"><i class="bx bx-user"></i> <span>Logout</span></a></li>

        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">
      <?php

        include ('../php/connect.php');
        $query1="SELECT * FROM data_tahun";
        $result1=mysqli_query($conn, $query1);
        $query3="SELECT * FROM data_pasal";
        $result3=mysqli_query($conn, $query3);
        $row=0;
        if (isset($_POST['save1'])){
          $Tahun = $_POST['Tahun1'];
          $Pasal = $_POST['Pasal1'];

          $querysss="SELECT *
          FROM kasus 
          INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
          INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
          INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal 
          WHERE tahun=$Tahun AND pasal=$Pasal";
          $resultsss = mysqli_query($conn,$querysss);
          if ($resultsss->num_rows > 0){
            while ($rowss = $resultsss-> fetch_assoc()){
              $Pasalss = $rowss['nama_pasal'];
              $Tahunss = $rowss['nama_tahun'];
            }
          } else {
              $Pasalss = '';
              $Tahunss = '';
          }
        ?>

        <!-- Tampilan grafik -->
        <div class="section-title">
          <h4 class="resume-title"><center>Grafik <?php echo $Pasalss;?></center></h4>
          <h5 class="resume-title"><center>Tahun <?php echo $Tahunss;?></center></h5>
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
	        </div>
        </div>
        

        <!-- Pencarian -->
        <div class="row">
          <div class="col-lg-12" data-aos="fade-up">
            <h3 class="resume-title">Cari</h3>
            </div>
            <div class="resume-item" data-aos="fade-up">
                <form method="POST">
                    <div class="form-group">
                    <label for="Pasal">Pilih Tahun :</label><br/>
                      <select name="Tahun1" required>
                        <option value="">Tahun :</option>
                          <?php
                          while($row1=mysqli_fetch_array($result1)){
                            echo '<option value='.$row1['idtahun'].'>'.$row1['nama_tahun'].'<br/></option>';
                            } 
                          ?>                         
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="Pasal">Pilih Pasal</label><br/>
                      <select name="Pasal1" required>
                        <option value="">Pasal :</option>
                          <?php
                          while($row3=mysqli_fetch_array($result3)){
                            echo '<option value='.$row3['idpasal'].'>'.$row3['nama_pasal'].'<br/></option>';
                            } 
                          ?>                         
                      </select>
                    </div>
                        
                  <button type="submit" class="btn btn-primary btn-block" name="save1">Cari</button><br/>
                </form>           
            </div>
        </div>

        <!-- Tabel -->
        <div class="row">
          <div class="col-lg-12" data-aos="fade-up">
            <h3 class="resume-title">Tabel</h3>
            </div>
            <div class="table-responsive" data-aos="fade-up">
              <h4 class="resume-title"><center>Tabel <?php echo $Pasalss;?></center></h4>
              <h5 class="resume-title"><center>Tahun <?php echo $Tahunss;?></center></h5>
              <table id="kasus" class="table table-bordered table-striped" border="1" align="center" width="90%">
                <thead>
                  <tr>
                    <th rowspan="2"><center>No</center></th>
                    <th rowspan="2"><center>Tahun</center></th>
                    <th rowspan="2"><center>Bulan</center></th>
                    <th rowspan="2"><center>Pasal</center></th>
                    <th colspan="4"><center>Pendidikan</center></th>
                    <th colspan="4"><center>Usia</center></th>
                    <th colspan="2"><center>Jenis Kelamin</center></th>
                    <th rowspan="2" colspan="2"><center>Opsi</center></th>
                  </tr>
                  <tr>
                    <th><center>SD</center></th>
                    <th><center>SMP</center></th>
                    <th><center>SMA</center></th>
                    <th><center>D3/S1</center></th>
                    <th><center>< 18 tahun</center></th>
                    <th><center>18-25 tahun</center></th>
                    <th><center>25-50 tahun</center></th>
                    <th><center>>50 tahun</center></th>
                    <th><center>Laki-laki</center></th>
                    <th><center>Perempuan</center></th>
                  </tr>
                </thead>
                <tbody>
                      <?php

                      $query="SELECT *
                      FROM kasus 
                      INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
                      INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
                      INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal 
                      WHERE tahun=$Tahun AND pasal=$Pasal";
                      $nobaris = $row + 1;
                      $sumSD= 0;
                      $sumSMP= 0;
                      $sumSMA= 0;
                      $sumD3= 0;
                      $sumUMUR1= 0;
                      $sumUMUR2= 0;
                      $sumUMUR3= 0;
                      $sumUMUR4= 0;
                      $sumLAKI= 0;
                      $sumCEWEK= 0;
                      $result = mysqli_query($conn,$query);
                      while ($rows= mysqli_fetch_array($result)){
                        $idKasus = $rows['idkasus'];
                        $Tahun = $rows['tahun'];
                       $sumTahun = $sumSD + $Tahun;
                       $Tahun1 = $rows['nama_tahun'];
                       $Bulan = $rows['bulan'];
                       $Bulan1 = $rows['nama_bulan'];
                       $Pasal = $rows['pasal'];
                       $Pasal1 = $rows['nama_pasal'];
                       $SD = $rows['SD'];
                       $sumSD = $sumSD + $SD;
                       $SMP = $rows['SMP'];
                       $sumSMP = $sumSMP + $SMP;
                       $SMA = $rows['SMA'];
                       $sumSMA = $sumSMA + $SMA;
                       $D3 = $rows['D3'];
                       $sumD3 = $sumD3 + $D3;
                       $Umur1 = $rows['usia1'];
                       $sumUMUR1 = $sumUMUR1 + $Umur1;
                       $Umur2 = $rows['usia2'];
                       $sumUMUR2 = $sumUMUR2 + $Umur2;
                       $Umur3 = $rows['usia3'];
                       $sumUMUR3 = $sumUMUR3 + $Umur3;
                       $Umur4 = $rows['usia4'];
                       $sumUMUR4 = $sumUMUR4 + $Umur4;
                       $Laki = $rows['laki'];
                       $sumLAKI = $sumLAKI + $Laki;
                       $Cewek = $rows['perempuan'];
                       $sumCEWEK = $sumCEWEK + $Cewek;
                  ?>
                      <tr>
                        <td><center><?php echo $nobaris; ?></center></td>
                        <td><?php echo $Tahun1 ?></td>
                        <td><?php echo $Bulan1 ?></td>
                        <td><?php echo $Pasal1 ?></td>
                        <td><?php echo $SD; ?></td>
                        <td><?php echo $SMP; ?></td>
                        <td><?php echo $SMA; ?></td>
                        <td><?php echo $D3; ?></td>
                        <td><?php echo $Umur1; ?></td>
                        <td><?php echo $Umur2; ?></td>
                        <td><?php echo $Umur3; ?></td>
                        <td><?php echo $Umur4; ?></td>
                        <td><?php echo $Laki; ?></td>
                        <td><?php echo $Cewek; ?></td>
                        <td><a href='isidata.php?idkasus=<?php echo $idKasus?>'>Edit</a></td>
                        <td><a onclick='javascript:confirmationDelete($(this));return false;' href='../php/deletekasus.php?idkasus=<?php echo $idKasus?>'>Delete</a></td>
                      </tr>
                    <?php $nobaris ++;
                  }
                }
                else{
                  ?>
                    
                <!-- Tampilan grafik -->
        <div class="section-title">
	        </div>
        </div>
        

        <!-- Pencarian -->
        <div class="row">
          <div class="col-lg-12" data-aos="fade-up">
            <h3 class="resume-title">Cari</h3>
            </div>
            <div class="resume-item" data-aos="fade-up">
                <form method="POST">
                    <div class="form-group">
                    <label for="Pasal">Pilih Tahun :</label><br/>
                      <select name="Tahun1" required>
                        <option value="">Tahun :</option>
                          <?php
                          while($row1=mysqli_fetch_array($result1)){
                            echo '<option value='.$row1['idtahun'].'>'.$row1['nama_tahun'].'<br/></option>';
                            } 
                          ?>                         
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="Pasal">Pilih Pasal</label><br/>
                      <select name="Pasal1" required>
                        <option value="">Pasal :</option>
                          <?php
                          while($row3=mysqli_fetch_array($result3)){
                            echo '<option value='.$row3['idpasal'].'>'.$row3['nama_pasal'].'<br/></option>';
                            } 
                          ?>                         
                      </select>
                    </div>
                        
                  <button type="submit" class="btn btn-primary btn-block" name="save1">Cari</button><br/>
                </form>           
            </div>
        </div>

        <!-- Tabel -->
        <div class="row">
          <div class="col-lg-12" data-aos="fade-up">
            <h3 class="resume-title">Tabel</h3>
            </div>
            <div class="table-responsive" data-aos="fade-up">
                <table id="kasus" class="table table-bordered table-striped" border="1" align="center" width="90%">
                <thead>
                  <tr>
                    <th rowspan="2"><center>No</center></th>
                    <th rowspan="2"><center>Tahun</center></th>
                    <th rowspan="2"><center>Bulan</center></th>
                    <th rowspan="2"><center>Pasal</center></th>
                    <th colspan="4"><center>Pendidikan</center></th>
                    <th colspan="4"><center>Usia</center></th>
                    <th colspan="2"><center>Jenis Kelamin</center></th>
                    <th rowspan="2" colspan="2"><center>Opsi</center></th>
                  </tr>
                  <tr>
                    <th><center>SD</center></th>
                    <th><center>SMP</center></th>
                    <th><center>SMA</center></th>
                    <th><center>D3/S1</center></th>
                    <th><center>< 18 tahun</center></th>
                    <th><center>18-25 tahun</center></th>
                    <th><center>25-50 tahun</center></th>
                    <th><center>>50 tahun</center></th>
                    <th><center>Laki-laki</center></th>
                    <th><center>Perempuan</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // count total number of rows

                  $query="SELECT *
                  FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
                  INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
                  INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal 
                  ";
                  $nobaris = $row + 1;
                  $sumSD= 0;
                  $sumSMP= 0;
                  $sumSMA= 0;
                  $sumD3= 0;
                  $sumUMUR1= 0;
                  $sumUMUR2= 0;
                  $sumUMUR3= 0;
                  $sumUMUR4= 0;
                  $sumLAKI= 0;
                  $sumCEWEK= 0;
                  $result = mysqli_query($conn,$query);
                  while ($rows= mysqli_fetch_array($result)){
                    $idKasus = $rows['idkasus'];
                   $Tahun = $rows['tahun'];
                   $sumTahun = $sumSD + $Tahun;
                   $Tahun1 = $rows['nama_tahun'];
                   $Bulan = $rows['bulan'];
                   $Bulan1 = $rows['nama_bulan'];
                   $Pasal = $rows['pasal'];
                   $Pasal1 = $rows['nama_pasal'];
                   $SD = $rows['SD'];
                   $sumSD = $sumSD + $SD;
                   $SMP = $rows['SMP'];
                   $sumSMP = $sumSMP + $SMP;
                   $SMA = $rows['SMA'];
                   $sumSMA = $sumSMA + $SMA;
                   $D3 = $rows['D3'];
                   $sumD3 = $sumD3 + $D3;
                   $Umur1 = $rows['usia1'];
                   $sumUMUR1 = $sumUMUR1 + $Umur1;
                   $Umur2 = $rows['usia2'];
                   $sumUMUR2 = $sumUMUR2 + $Umur2;
                   $Umur3 = $rows['usia3'];
                   $sumUMUR3 = $sumUMUR3 + $Umur3;
                   $Umur4 = $rows['usia4'];
                   $sumUMUR4 = $sumUMUR4 + $Umur4;
                   $Laki = $rows['laki'];
                   $sumLAKI = $sumLAKI + $Laki;
                   $Cewek = $rows['perempuan'];
                   $sumCEWEK = $sumCEWEK + $Cewek;
              ?>
                  <tr>
                    <td><center><?php echo $nobaris; ?></center></td>
                    <td><?php echo $Tahun1 ?></td>
                    <td><?php echo $Bulan1 ?></td>
                    <td><?php echo $Pasal1 ?></td>
                    <td><?php echo $SD; ?></td>
                    <td><?php echo $SMP ?></td>
                    <td><?php echo $SMA; ?></td>
                    <td><?php echo $D3; ?></td>
                    <td><?php echo $Umur1; ?></td>
                    <td><?php echo $Umur2; ?></td>
                    <td><?php echo $Umur3; ?></td>
                    <td><?php echo $Umur4; ?></td>
                    <td><?php echo $Laki; ?></td>
                    <td><?php echo $Cewek; ?></td>
                    <td><a href='isidata.php?idkasus=<?php echo $idKasus?>'>Edit</a></td>
                    <td><a onclick='javascript:confirmationDelete($(this));return false;' href='../php/deletekasus.php?idkasus=<?php echo $idKasus?>'>Delete</a></td>
                  </tr>
                <?php
                  $nobaris ++;
                }
                }
                ?>
                    
                  </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4" rowspan="2">Total</td>
                    <td>SD</td>
                    <td>SMP</td>
                    <td>SMA</td>
                    <td>D3/S1</td>
                    <td> < 18 tahun </td>
                    <td>18-25 tahun</td>
                    <td>25-50 tahun</td>
                    <td> > 50 tahun</td>
                    <td>Laki-laki</td>
                    <td>Perempuan</td>
                  </tr>
                  <tr>
                    <th><?php echo $sumSD;?></th>
                    <th><?php echo $sumSMP;?></th>
                    <th><?php echo $sumSMA;?></th>
                    <th><?php echo $sumD3;?></th>
                    <th><?php echo $sumUMUR1;?></th>
                    <th><?php echo $sumUMUR2;?></th>
                    <th><?php echo $sumUMUR3;?></th>
                    <th><?php echo $sumUMUR4;?></th>
                    <th><?php echo $sumLAKI;?></th>
                    <th><?php echo $sumCEWEK;?></th>
                    
                  </tr>
                </tfoot>
              </table>
          </div>




          <!-- Menghitung jumlah per bulan -->
          <?php
           $query="SELECT *
           FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
           INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
           INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
           WHERE tahun='$Tahun' AND bulan='1' AND pasal='$Pasal'";
            $sumSD1= 0;
            $sumSMP1= 0;
            $sumSMA1= 0;
            $sumD31= 0;
            $sumUMUR11= 0;
            $sumUMUR21= 0;
            $sumUMUR31= 0;
            $sumUMUR41= 0;
            $sumLAKI1= 0;
            $sumCEWEK1= 0;
            $result = mysqli_query($conn,$query);
                  
            while ($rows= mysqli_fetch_array($result)){
              $idKasus1 = $rows['idkasus'];
              $Tahun1 = $rows['tahun'];
              $Tahun11 = $rows['nama_tahun'];
              $Bulan1 = $rows['bulan'];
              $Bulan11 = $rows['nama_bulan'];
              $Pasal1 = $rows['pasal'];
              $Pasal11 = $rows['nama_pasal'];
              $SD1 = $rows['SD'];
              $sumSD1 = $sumSD1 + $SD1;
              $SMP1 = $rows['SMP'];
              $sumSMP1 = $sumSMP1 + $SMP1;
              $SMA1 = $rows['SMA'];
              $sumSMA1 = $sumSMA1 + $SMA1;
              $D31 = $rows['D3'];
              $sumD31 = $sumD31 + $D31;
              $Umur11 = $rows['usia1'];
              $sumUMUR11 = $sumUMUR11 + $Umur11;
              $Umur21 = $rows['usia2'];
              $sumUMUR21 = $sumUMUR21 + $Umur21;
              $Umur31 = $rows['usia3'];
              $sumUMUR31 = $sumUMUR31 + $Umur31;
              $Umur41 = $rows['usia4'];
              $sumUMUR41 = $sumUMUR41 + $Umur41;
              $Laki1 = $rows['laki'];
              $sumLAKI1 = $sumLAKI1 + $Laki1;
              $Cewek1 = $rows['perempuan'];
              $sumCEWEK1 = $sumCEWEK1 + $Cewek1;
            }
        
            $query2="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='2' AND pasal='$Pasal'";
             $sumSD2= 0;
             $sumSMP2= 0;
             $sumSMA2= 0;
             $sumD32= 0;
             $sumUMUR12= 0;
             $sumUMUR22= 0;
             $sumUMUR32= 0;
             $sumUMUR42= 0;
             $sumLAKI2= 0;
             $sumCEWEK2= 0;
             $result2 = mysqli_query($conn,$query2);
                   
             while ($rows1= mysqli_fetch_array($result2)){
               $idKasus2 = $rows1['idkasus'];
               $Tahun2 = $rows1['tahun'];
               $Tahun12 = $rows1['nama_tahun'];
               $Bulan2 = $rows1['bulan'];
               $Bulan12 = $rows1['nama_bulan'];
               $Pasal2 = $rows1['pasal'];
               $Pasal12 = $rows1['nama_pasal'];
               $SD2 = $rows1['SD'];
               $sumSD2 = $sumSD2 + $SD2;
               $SMP2 = $rows1['SMP'];
               $sumSMP2 = $sumSMP2 + $SMP2;
               $SMA2 = $rows1['SMA'];
               $sumSMA2 = $sumSMA2 + $SMA2;
               $D32 = $rows1['D3'];
               $sumD32 = $sumD32 + $D32;
               $Umur12 = $rows1['usia1'];
               $sumUMUR12 = $sumUMUR12 + $Umur12;
               $Umur22 = $rows1['usia2'];
               $sumUMUR22 = $sumUMUR22 + $Umur22;
               $Umur32 = $rows1['usia3'];
               $sumUMUR32 = $sumUMUR32 + $Umur32;
               $Umur42 = $rows1['usia4'];
               $sumUMUR42 = $sumUMUR42 + $Umur42;
               $Laki2 = $rows1['laki'];
               $sumLAKI2 = $sumLAKI2 + $Laki2;
               $Cewek2 = $rows1['perempuan'];
               $sumCEWEK2 = $sumCEWEK2 + $Cewek2;
            }

            $query3="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='3' AND pasal='$Pasal'";
             $sumSD3= 0;
             $sumSMP3= 0;
             $sumSMA3= 0;
             $sumD33= 0;
             $sumUMUR13= 0;
             $sumUMUR23= 0;
             $sumUMUR33= 0;
             $sumUMUR43= 0;
             $sumLAKI3= 0;
             $sumCEWEK3= 0;
             $result3 = mysqli_query($conn,$query3);
                   
             while ($rows2= mysqli_fetch_array($result3)){
               $idKasus3 = $rows2['idkasus'];
               $Tahun3 = $rows2['tahun'];
               $Tahun13 = $rows2['nama_tahun'];
               $Bulan3 = $rows2['bulan'];
               $Bulan13 = $rows2['nama_bulan'];
               $Pasal3 = $rows2['pasal'];
               $Pasal13 = $rows2['nama_pasal'];
               $SD3 = $rows2['SD'];
               $sumSD3 = $sumSD3 + $SD3;
               $SMP3 = $rows2['SMP'];
               $sumSMP3 = $sumSMP3 + $SMP3;
               $SMA3 = $rows2['SMA'];
               $sumSMA3 = $sumSMA3 + $SMA3;
               $D33 = $rows2['D3'];
               $sumD33 = $sumD33 + $D33;
               $Umur13 = $rows2['usia1'];
               $sumUMUR13 = $sumUMUR13 + $Umur13;
               $Umur23 = $rows2['usia2'];
               $sumUMUR23 = $sumUMUR23 + $Umur23;
               $Umur33 = $rows2['usia3'];
               $sumUMUR33 = $sumUMUR33 + $Umur33;
               $Umur43 = $rows2['usia4'];
               $sumUMUR43 = $sumUMUR43 + $Umur43;
               $Laki3 = $rows2['laki'];
               $sumLAKI3 = $sumLAKI3 + $Laki3;
               $Cewek3 = $rows2['perempuan'];
               $sumCEWEK3 = $sumCEWEK3 + $Cewek3;
            }

            $query4="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='4' AND pasal='$Pasal'";
             $sumSD4= 0;
             $sumSMP4= 0;
             $sumSMA4= 0;
             $sumD34= 0;
             $sumUMUR14= 0;
             $sumUMUR24= 0;
             $sumUMUR34= 0;
             $sumUMUR44= 0;
             $sumLAKI4= 0;
             $sumCEWEK4= 0;
             $result4 = mysqli_query($conn,$query4);
                   
             while ($rows3= mysqli_fetch_array($result4)){
               $idKasus4 = $rows3['idkasus'];
               $Tahun4 = $rows3['tahun'];
               $Tahun14 = $rows3['nama_tahun'];
               $Bulan4 = $rows3['bulan'];
               $Bulan14 = $rows3['nama_bulan'];
               $Pasal4 = $rows3['pasal'];
               $Pasal14 = $rows3['nama_pasal'];
               $SD4 = $rows3['SD'];
               $sumSD4 = $sumSD4 + $SD4;
               $SMP4 = $rows3['SMP'];
               $sumSMP4 = $sumSMP4 + $SMP4;
               $SMA4 = $rows3['SMA'];
               $sumSMA4 = $sumSMA4 + $SMA4;
               $D34 = $rows3['D3'];
               $sumD34 = $sumD34 + $D34;
               $Umur14 = $rows3['usia1'];
               $sumUMUR14 = $sumUMUR14 + $Umur14;
               $Umur24 = $rows3['usia2'];
               $sumUMUR24 = $sumUMUR24 + $Umur24;
               $Umur34 = $rows3['usia3'];
               $sumUMUR34 = $sumUMUR34 + $Umur34;
               $Umur44 = $rows3['usia4'];
               $sumUMUR44 = $sumUMUR44 + $Umur44;
               $Laki4 = $rows3['laki'];
               $sumLAKI4 = $sumLAKI4 + $Laki4;
               $Cewek4 = $rows3['perempuan'];
               $sumCEWEK4 = $sumCEWEK4 + $Cewek4;
            }

            $query5="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='5' AND pasal='$Pasal'";
             $sumSD5= 0;
             $sumSMP5= 0;
             $sumSMA5= 0;
             $sumD35= 0;
             $sumUMUR15= 0;
             $sumUMUR25= 0;
             $sumUMUR35= 0;
             $sumUMUR45= 0;
             $sumLAKI5= 0;
             $sumCEWEK5= 0;
             $result5 = mysqli_query($conn,$query5);
                   
             while ($rows4= mysqli_fetch_array($result5)){
               $idKasus5 = $rows4['idkasus'];
               $Tahun5 = $rows4['tahun'];
               $Tahun15 = $rows4['nama_tahun'];
               $Bulan5 = $rows4['bulan'];
               $Bulan15 = $rows4['nama_bulan'];
               $Pasal5 = $rows4['pasal'];
               $Pasal15 = $rows4['nama_pasal'];
               $SD5 = $rows4['SD'];
               $sumSD5 = $sumSD5 + $SD5;
               $SMP5 = $rows4['SMP'];
               $sumSMP5 = $sumSMP5 + $SMP5;
               $SMA5 = $rows4['SMA'];
               $sumSMA5 = $sumSMA5 + $SMA5;
               $D35 = $rows4['D3'];
               $sumD35 = $sumD35 + $D35;
               $Umur15 = $rows4['usia1'];
               $sumUMUR15 = $sumUMUR15 + $Umur15;
               $Umur25 = $rows4['usia2'];
               $sumUMUR25 = $sumUMUR25 + $Umur25;
               $Umur35 = $rows4['usia3'];
               $sumUMUR35 = $sumUMUR35 + $Umur35;
               $Umur45 = $rows4['usia4'];
               $sumUMUR45 = $sumUMUR45 + $Umur45;
               $Laki5 = $rows4['laki'];
               $sumLAKI5 = $sumLAKI5 + $Laki5;
               $Cewek5 = $rows4['perempuan'];
               $sumCEWEK5 = $sumCEWEK5 + $Cewek5;
            }

            $query6="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='6' AND pasal='$Pasal'";
             $sumSD6= 0;
             $sumSMP6= 0;
             $sumSMA6= 0;
             $sumD36= 0;
             $sumUMUR16= 0;
             $sumUMUR26= 0;
             $sumUMUR36= 0;
             $sumUMUR46= 0;
             $sumLAKI6= 0;
             $sumCEWEK6= 0;
             $result6 = mysqli_query($conn,$query6);
                   
             while ($rows5= mysqli_fetch_array($result6)){
               $idKasus6 = $rows5['idkasus'];
               $Tahun6 = $rows5['tahun'];
               $Tahun16 = $rows5['nama_tahun'];
               $Bulan6 = $rows5['bulan'];
               $Bulan16 = $rows5['nama_bulan'];
               $Pasal6 = $rows5['pasal'];
               $Pasal16 = $rows5['nama_pasal'];
               $SD6 = $rows5['SD'];
               $sumSD6 = $sumSD6 + $SD6;
               $SMP6 = $rows5['SMP'];
               $sumSMP6 = $sumSMP6 + $SMP6;
               $SMA6 = $rows5['SMA'];
               $sumSMA6 = $sumSMA6 + $SMA6;
               $D36 = $rows5['D3'];
               $sumD36 = $sumD36 + $D36;
               $Umur16 = $rows5['usia1'];
               $sumUMUR16 = $sumUMUR16 + $Umur16;
               $Umur26 = $rows5['usia2'];
               $sumUMUR26 = $sumUMUR26 + $Umur26;
               $Umur36 = $rows5['usia3'];
               $sumUMUR36 = $sumUMUR36 + $Umur36;
               $Umur46 = $rows5['usia4'];
               $sumUMUR46 = $sumUMUR46 + $Umur46;
               $Laki6 = $rows5['laki'];
               $sumLAKI6 = $sumLAKI6 + $Laki6;
               $Cewek6 = $rows5['perempuan'];
               $sumCEWEK6 = $sumCEWEK6 + $Cewek6;
            }

            $query7="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='7' AND pasal='$Pasal'";
             $sumSD7= 0;
             $sumSMP7= 0;
             $sumSMA7= 0;
             $sumD37= 0;
             $sumUMUR17= 0;
             $sumUMUR27= 0;
             $sumUMUR37= 0;
             $sumUMUR47= 0;
             $sumLAKI7= 0;
             $sumCEWEK7= 0;
             $result7 = mysqli_query($conn,$query7);
                   
             while ($rows6= mysqli_fetch_array($result7)){
               $idKasus7 = $rows6['idkasus'];
               $Tahun7 = $rows6['tahun'];
               $Tahun17 = $rows6['nama_tahun'];
               $Bulan7 = $rows6['bulan'];
               $Bulan17 = $rows6['nama_bulan'];
               $Pasal7 = $rows6['pasal'];
               $Pasal17 = $rows6['nama_pasal'];
               $SD7 = $rows6['SD'];
               $sumSD7 = $sumSD7 + $SD7;
               $SMP7 = $rows6['SMP'];
               $sumSMP7 = $sumSMP7 + $SMP7;
               $SMA7 = $rows6['SMA'];
               $sumSMA7 = $sumSMA7 + $SMA7;
               $D37 = $rows6['D3'];
               $sumD37 = $sumD37 + $D37;
               $Umur17 = $rows6['usia1'];
               $sumUMUR17 = $sumUMUR17 + $Umur17;
               $Umur27 = $rows6['usia2'];
               $sumUMUR27 = $sumUMUR27 + $Umur27;
               $Umur37 = $rows6['usia3'];
               $sumUMUR37 = $sumUMUR37 + $Umur37;
               $Umur47 = $rows6['usia4'];
               $sumUMUR47 = $sumUMUR47 + $Umur47;
               $Laki7 = $rows6['laki'];
               $sumLAKI7 = $sumLAKI7 + $Laki7;
               $Cewek7 = $rows6['perempuan'];
               $sumCEWEK7 = $sumCEWEK7 + $Cewek7;
            }

            $query8="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='8' AND pasal='$Pasal'";
             $sumSD8= 0;
             $sumSMP8= 0;
             $sumSMA8= 0;
             $sumD38= 0;
             $sumUMUR18= 0;
             $sumUMUR28= 0;
             $sumUMUR38= 0;
             $sumUMUR48= 0;
             $sumLAKI8= 0;
             $sumCEWEK8= 0;
             $result8 = mysqli_query($conn,$query8);
                   
             while ($rows7= mysqli_fetch_array($result8)){
               $idKasus8 = $rows7['idkasus'];
               $Tahun8 = $rows7['tahun'];
               $Tahun18 = $rows7['nama_tahun'];
               $Bulan8 = $rows7['bulan'];
               $Bulan18 = $rows7['nama_bulan'];
               $Pasal8 = $rows7['pasal'];
               $Pasal18 = $rows7['nama_pasal'];
               $SD8 = $rows7['SD'];
               $sumSD8 = $sumSD8 + $SD8;
               $SMP8 = $rows7['SMP'];
               $sumSMP8 = $sumSMP8 + $SMP8;
               $SMA8 = $rows7['SMA'];
               $sumSMA8 = $sumSMA8 + $SMA8;
               $D38 = $rows7['D3'];
               $sumD38 = $sumD38 + $D38;
               $Umur18 = $rows7['usia1'];
               $sumUMUR18 = $sumUMUR18 + $Umur18;
               $Umur28 = $rows7['usia2'];
               $sumUMUR28 = $sumUMUR28 + $Umur28;
               $Umur38 = $rows7['usia3'];
               $sumUMUR38 = $sumUMUR38 + $Umur38;
               $Umur48 = $rows7['usia4'];
               $sumUMUR48 = $sumUMUR48 + $Umur48;
               $Laki8 = $rows7['laki'];
               $sumLAKI8 = $sumLAKI8 + $Laki8;
               $Cewek8 = $rows7['perempuan'];
               $sumCEWEK8 = $sumCEWEK8 + $Cewek8;
            }

            $query9="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='9' AND pasal='$Pasal'";
             $sumSD9= 0;
             $sumSMP9= 0;
             $sumSMA9= 0;
             $sumD39= 0;
             $sumUMUR19= 0;
             $sumUMUR29= 0;
             $sumUMUR39= 0;
             $sumUMUR49= 0;
             $sumLAKI9= 0;
             $sumCEWEK9= 0;
             $result9 = mysqli_query($conn,$query9);
                   
             while ($rows8= mysqli_fetch_array($result9)){
               $idKasus9 = $rows8['idkasus'];
               $Tahun9 = $rows8['tahun'];
               $Tahun19 = $rows8['nama_tahun'];
               $Bulan9 = $rows8['bulan'];
               $Bulan19 = $rows8['nama_bulan'];
               $Pasal9 = $rows8['pasal'];
               $Pasal19 = $rows8['nama_pasal'];
               $SD9 = $rows8['SD'];
               $sumSD9 = $sumSD9 + $SD9;
               $SMP9 = $rows8['SMP'];
               $sumSMP9 = $sumSMP9 + $SMP9;
               $SMA9 = $rows8['SMA'];
               $sumSMA9 = $sumSMA9 + $SMA9;
               $D39 = $rows8['D3'];
               $sumD39 = $sumD39 + $D39;
               $Umur19 = $rows8['usia1'];
               $sumUMUR19 = $sumUMUR19 + $Umur19;
               $Umur29 = $rows8['usia2'];
               $sumUMUR29 = $sumUMUR29 + $Umur29;
               $Umur39 = $rows8['usia3'];
               $sumUMUR39 = $sumUMUR39 + $Umur39;
               $Umur49 = $rows8['usia4'];
               $sumUMUR49 = $sumUMUR49 + $Umur49;
               $Laki9 = $rows8['laki'];
               $sumLAKI9 = $sumLAKI9 + $Laki9;
               $Cewek9 = $rows8['perempuan'];
               $sumCEWEK9 = $sumCEWEK9 + $Cewek9;
            }

            $query10="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='10' AND pasal='$Pasal'";
             $sumSD10= 0;
             $sumSMP10= 0;
             $sumSMA10= 0;
             $sumD310= 0;
             $sumUMUR110= 0;
             $sumUMUR210= 0;
             $sumUMUR310= 0;
             $sumUMUR410= 0;
             $sumLAKI10= 0;
             $sumCEWEK10= 0;
             $result10 = mysqli_query($conn,$query10);
                   
             while ($rows9= mysqli_fetch_array($result10)){
               $idKasus10 = $rows9['idkasus'];
               $Tahun10 = $rows9['tahun'];
               $Tahun110 = $rows9['nama_tahun'];
               $Bulan10 = $rows9['bulan'];
               $Bulan110 = $rows9['nama_bulan'];
               $Pasal10 = $rows9['pasal'];
               $Pasal110 = $rows9['nama_pasal'];
               $SD10 = $rows9['SD'];
               $sumSD10 = $sumSD10 + $SD10;
               $SMP10 = $rows9['SMP'];
               $sumSMP10 = $sumSMP10 + $SMP10;
               $SMA10 = $rows9['SMA'];
               $sumSMA10 = $sumSMA10 + $SMA10;
               $D310 = $rows9['D3'];
               $sumD310 = $sumD310 + $D310;
               $Umur110 = $rows9['usia1'];
               $sumUMUR110 = $sumUMUR110 + $Umur110;
               $Umur210 = $rows9['usia2'];
               $sumUMUR210 = $sumUMUR210 + $Umur210;
               $Umur310 = $rows9['usia3'];
               $sumUMUR310 = $sumUMUR310 + $Umur310;
               $Umur410 = $rows9['usia4'];
               $sumUMUR410 = $sumUMUR410 + $Umur410;
               $Laki10 = $rows9['laki'];
               $sumLAKI10 = $sumLAKI10 + $Laki10;
               $Cewek10 = $rows9['perempuan'];
               $sumCEWEK10 = $sumCEWEK10 + $Cewek10;
            }

            $query11="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='11' AND pasal='$Pasal'";
             $sumSD11= 0;
             $sumSMP11= 0;
             $sumSMA11= 0;
             $sumD311= 0;
             $sumUMUR111= 0;
             $sumUMUR211= 0;
             $sumUMUR311= 0;
             $sumUMUR411= 0;
             $sumLAKI11= 0;
             $sumCEWEK11= 0;
             $result11 = mysqli_query($conn,$query11);
                   
             while ($rows10= mysqli_fetch_array($result11)){
               $idKasus11 = $rows10['idkasus'];
               $Tahun11 = $rows10['tahun'];
               $Tahun111 = $rows10['nama_tahun'];
               $Bulan11 = $rows10['bulan'];
               $Bulan111 = $rows10['nama_bulan'];
               $Pasal11 = $rows10['pasal'];
               $Pasal111 = $rows10['nama_pasal'];
               $SD11 = $rows10['SD'];
               $sumSD11 = $sumSD11 + $SD11;
               $SMP11 = $rows10['SMP'];
               $sumSMP11 = $sumSMP11 + $SMP11;
               $SMA11 = $rows10['SMA'];
               $sumSMA11 = $sumSMA11 + $SMA11;
               $D311 = $rows10['D3'];
               $sumD311 = $sumD311 + $D311;
               $Umur111 = $rows10['usia1'];
               $sumUMUR111 = $sumUMUR111 + $Umur111;
               $Umur211 = $rows10['usia2'];
               $sumUMUR211 = $sumUMUR211 + $Umur211;
               $Umur311 = $rows10['usia3'];
               $sumUMUR311 = $sumUMUR311 + $Umur311;
               $Umur411 = $rows10['usia4'];
               $sumUMUR411 = $sumUMUR411 + $Umur411;
               $Laki11 = $rows10['laki'];
               $sumLAKI11 = $sumLAKI11 + $Laki11;
               $Cewek11 = $rows10['perempuan'];
               $sumCEWEK11 = $sumCEWEK11 + $Cewek11;
            }

            $query12="SELECT *
            FROM kasus INNER JOIN data_tahun ON kasus.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON kasus.bulan=data_bulan.idbulan 
            INNER JOIN data_pasal ON kasus.pasal=data_pasal.idpasal
            WHERE tahun='$Tahun' AND bulan='12' AND pasal='$Pasal'";
             $sumSD12= 0;
             $sumSMP12= 0;
             $sumSMA12= 0;
             $sumD312= 0;
             $sumUMUR112= 0;
             $sumUMUR212= 0;
             $sumUMUR312= 0;
             $sumUMUR412= 0;
             $sumLAKI12= 0;
             $sumCEWEK12= 0;
             $result12 = mysqli_query($conn,$query12);
                   
             while ($rows11= mysqli_fetch_array($result12)){
               $idKasus12 = $rows11['idkasus'];
               $Tahun12 = $rows11['tahun'];
               $Tahun112 = $rows11['nama_tahun'];
               $Bulan12 = $rows11['bulan'];
               $Bulan112 = $rows11['nama_bulan'];
               $Pasal12 = $rows11['pasal'];
               $Pasal112 = $rows11['nama_pasal'];
               $SD12 = $rows11['SD'];
               $sumSD12 = $sumSD12 + $SD12;
               $SMP12 = $rows11['SMP'];
               $sumSMP12 = $sumSMP12 + $SMP12;
               $SMA12 = $rows11['SMA'];
               $sumSMA12 = $sumSMA12 + $SMA12;
               $D312 = $rows11['D3'];
               $sumD312 = $sumD312 + $D312;
               $Umur112 = $rows11['usia1'];
               $sumUMUR112 = $sumUMUR112 + $Umur112;
               $Umur212 = $rows11['usia2'];
               $sumUMUR212 = $sumUMUR212 + $Umur212;
               $Umur312 = $rows11['usia3'];
               $sumUMUR312 = $sumUMUR312 + $Umur312;
               $Umur412 = $rows11['usia4'];
               $sumUMUR412 = $sumUMUR412 + $Umur412;
               $Laki12 = $rows11['laki'];
               $sumLAKI12 = $sumLAKI12 + $Laki12;
               $Cewek12 = $rows11['perempuan'];
               $sumCEWEK12 = $sumCEWEK12 + $Cewek12;
            }
              
            ?>
            
      </div>
    </section><!-- End Resume Section -->

  </main><!-- End #main -->

  
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/jquery/delete.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/typed.js/typed.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/datatables/dataTables.bootstrap.min.js"></script>  
  <script src="../assets/orgchart/jquery.orgchart.min.js"></script>
  <script type="text/javascript" src="../assets/js/coba.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
window.onload = function () {
    var sd = <?php echo $sumSD1 ?>;
    var smp = <?php echo $sumSMP1 ?>;
    var sma = <?php echo $sumSMA1 ?>;
    var d3 = <?php echo $sumD31 ?>;
    var umur1 = <?php echo $sumUMUR11 ?>;
    var umur2 = <?php echo $sumUMUR21 ?>;
    var umur3 = <?php echo $sumUMUR31 ?>;
    var umur4 = <?php echo $sumUMUR41 ?>;
    var laki = <?php echo $sumLAKI1 ?>;
    var cewek = <?php echo $sumCEWEK1 ?>;

    var sd2 = <?php echo $sumSD2 ?>;
    var smp2 = <?php echo $sumSMP2 ?>;
    var sma2 = <?php echo $sumSMA2 ?>;
    var d32 = <?php echo $sumD32 ?>;
    var umur12 = <?php echo $sumUMUR12 ?>;
    var umur22 = <?php echo $sumUMUR22 ?>;
    var umur32 = <?php echo $sumUMUR32 ?>;
    var umur42 = <?php echo $sumUMUR42 ?>;
    var laki2 = <?php echo $sumLAKI2 ?>;
    var cewek2 = <?php echo $sumCEWEK2 ?>;

    var sd3 = <?php echo $sumSD3 ?>;
    var smp3 = <?php echo $sumSMP3 ?>;
    var sma3 = <?php echo $sumSMA3 ?>;
    var d33 = <?php echo $sumD33 ?>;
    var umur13 = <?php echo $sumUMUR13 ?>;
    var umur23 = <?php echo $sumUMUR23 ?>;
    var umur33 = <?php echo $sumUMUR33 ?>;
    var umur43 = <?php echo $sumUMUR43 ?>;
    var laki3 = <?php echo $sumLAKI3 ?>;
    var cewek3 = <?php echo $sumCEWEK3 ?>;

    var sd4 = <?php echo $sumSD4 ?>;
    var smp4 = <?php echo $sumSMP4 ?>;
    var sma4 = <?php echo $sumSMA4 ?>;
    var d34 = <?php echo $sumD34 ?>;
    var umur14 = <?php echo $sumUMUR14 ?>;
    var umur24 = <?php echo $sumUMUR24 ?>;
    var umur34 = <?php echo $sumUMUR34 ?>;
    var umur44 = <?php echo $sumUMUR44 ?>;
    var laki4 = <?php echo $sumLAKI4 ?>;
    var cewek4 = <?php echo $sumCEWEK4 ?>;

    var sd5 = <?php echo $sumSD5 ?>;
    var smp5 = <?php echo $sumSMP5 ?>;
    var sma5 = <?php echo $sumSMA5 ?>;
    var d35 = <?php echo $sumD35 ?>;
    var umur15 = <?php echo $sumUMUR15 ?>;
    var umur25 = <?php echo $sumUMUR25 ?>;
    var umur35 = <?php echo $sumUMUR35 ?>;
    var umur45 = <?php echo $sumUMUR45 ?>;
    var laki5 = <?php echo $sumLAKI5 ?>;
    var cewek5 = <?php echo $sumCEWEK5 ?>;

    var sd6 = <?php echo $sumSD6 ?>;
    var smp6 = <?php echo $sumSMP6 ?>;
    var sma6 = <?php echo $sumSMA6 ?>;
    var d36 = <?php echo $sumD36 ?>;
    var umur16 = <?php echo $sumUMUR16 ?>;
    var umur26 = <?php echo $sumUMUR26 ?>;
    var umur36 = <?php echo $sumUMUR36 ?>;
    var umur46 = <?php echo $sumUMUR46 ?>;
    var laki6 = <?php echo $sumLAKI6 ?>;
    var cewek6 = <?php echo $sumCEWEK6 ?>;

    var sd7 = <?php echo $sumSD7 ?>;
    var smp7 = <?php echo $sumSMP7 ?>;
    var sma7 = <?php echo $sumSMA7 ?>;
    var d37 = <?php echo $sumD37 ?>;
    var umur17 = <?php echo $sumUMUR17 ?>;
    var umur27 = <?php echo $sumUMUR27 ?>;
    var umur37 = <?php echo $sumUMUR37 ?>;
    var umur47 = <?php echo $sumUMUR47 ?>;
    var laki7 = <?php echo $sumLAKI7 ?>;
    var cewek7 = <?php echo $sumCEWEK7 ?>;

    var sd8 = <?php echo $sumSD8 ?>;
    var smp8 = <?php echo $sumSMP8 ?>;
    var sma8 = <?php echo $sumSMA8 ?>;
    var d38 = <?php echo $sumD38 ?>;
    var umur18 = <?php echo $sumUMUR18 ?>;
    var umur28 = <?php echo $sumUMUR28 ?>;
    var umur38 = <?php echo $sumUMUR38 ?>;
    var umur48 = <?php echo $sumUMUR48 ?>;
    var laki8 = <?php echo $sumLAKI8 ?>;
    var cewek8 = <?php echo $sumCEWEK8 ?>;

    var sd9 = <?php echo $sumSD9 ?>;
    var smp9 = <?php echo $sumSMP9 ?>;
    var sma9 = <?php echo $sumSMA9 ?>;
    var d39 = <?php echo $sumD39 ?>;
    var umur19 = <?php echo $sumUMUR19 ?>;
    var umur29 = <?php echo $sumUMUR29 ?>;
    var umur39 = <?php echo $sumUMUR39 ?>;
    var umur49 = <?php echo $sumUMUR49 ?>;
    var laki9 = <?php echo $sumLAKI9 ?>;
    var cewek9 = <?php echo $sumCEWEK9 ?>;

    var sd10 = <?php echo $sumSD10 ?>;
    var smp10 = <?php echo $sumSMP10 ?>;
    var sma10 = <?php echo $sumSMA10 ?>;
    var d310 = <?php echo $sumD310 ?>;
    var umur110 = <?php echo $sumUMUR110 ?>;
    var umur210 = <?php echo $sumUMUR210 ?>;
    var umur310 = <?php echo $sumUMUR310 ?>;
    var umur410 = <?php echo $sumUMUR410 ?>;
    var laki10 = <?php echo $sumLAKI10 ?>;
    var cewek10 = <?php echo $sumCEWEK10 ?>;

    var sd11 = <?php echo $sumSD11 ?>;
    var smp11 = <?php echo $sumSMP11 ?>;
    var sma11 = <?php echo $sumSMA11 ?>;
    var d311 = <?php echo $sumD311 ?>;
    var umur111 = <?php echo $sumUMUR111 ?>;
    var umur211 = <?php echo $sumUMUR211 ?>;
    var umur311 = <?php echo $sumUMUR311 ?>;
    var umur411 = <?php echo $sumUMUR411 ?>;
    var laki11 = <?php echo $sumLAKI11 ?>;
    var cewek11 = <?php echo $sumCEWEK11 ?>;

    var sd12 = <?php echo $sumSD12 ?>;
    var smp12 = <?php echo $sumSMP12 ?>;
    var sma12 = <?php echo $sumSMA12 ?>;
    var d312 = <?php echo $sumD312 ?>;
    var umur112 = <?php echo $sumUMUR112 ?>;
    var umur212 = <?php echo $sumUMUR212 ?>;
    var umur312 = <?php echo $sumUMUR312 ?>;
    var umur412 = <?php echo $sumUMUR412 ?>;
    var laki12 = <?php echo $sumLAKI12 ?>;
    var cewek12 = <?php echo $sumCEWEK12 ?>;

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: ""
	},	
	axisY: {
		
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},	

    axisY3: {
		
		lineColor: "#008744",
		labelFontColor: "#008744",
		tickColor: "#008744"
	},

    axisY4: {
		
		lineColor: "#be29ec",
		labelFontColor: "#be29ec",
		tickColor: "#be29ec"
	},		

    axisY5: {
		
		lineColor: "#0e1111",
		labelFontColor: "#0e1111",
		tickColor: "#0e1111"
	},	

    axisY6: {
		
		lineColor: "#999999",
		labelFontColor: "#999999",
		tickColor: "#999999"
	},	

    axisY7: {
		
		lineColor: "#e35d6a",
		labelFontColor: "#e35d6a",
		tickColor: "#e35d6a"
	},	

    axisY8: {
		
		lineColor: "#008080",
		labelFontColor: "#008080",
		tickColor: "#008080"
	},	

    axisY9: {
		
		lineColor: "#008744",
		labelFontColor: "#008744",
		tickColor: "#008744"
	},	

    axisY10: {
		
		lineColor: "#f1cbff",
		labelFontColor: "#f1cbff",
		tickColor: "#f1cbff"
	},	

	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "SD",
		legendText: "SD",
		showInLegend: true, 
		dataPoints:[
			{ label: "Januari", y: sd },
			{ label: "Februari", y: sd2 },
			{ label: "Maret", y: sd3 },
			{ label: "April", y: sd4 },
			{ label: "Mei", y: sd5 },
			{ label: "Juni", y: sd6 },
      { label: "Juli", y: sd7 },
			{ label: "Agustus", y: sd8 },
			{ label: "September", y: sd9 },
			{ label: "Oktober", y: sd10 },
			{ label: "November", y: sd11 },
			{ label: "Desember", y: sd12 }
		]
	},
	{
		type: "column",	
		name: "SMP",
		legendText: "SMP",
		showInLegend: true,
		dataPoints:[
			{ label: "Januari", y: smp },
			{ label: "Februari", y: smp2 },
			{ label: "Maret", y: smp3 },
			{ label: "April", y: smp4 },
			{ label: "Mei", y: smp5 },
			{ label: "Juni", y: smp6 },
            { label: "Juli", y: smp7 },
			{ label: "Agustus", y: smp8 },
			{ label: "September", y: smp9 },
			{ label: "Oktober", y: smp10 },
			{ label: "November", y: smp11 },
			{ label: "Desember", y: smp12 }
		]
	},
    {
		type: "column",	
		name: "SMA",
		legendText: "SMA",
		showInLegend: true,
		dataPoints:[
			{ label: "Januari", y: sma },
			{ label: "Februari", y: sma2 },
			{ label: "Maret", y: sma3 },
			{ label: "April", y: sma4 },
			{ label: "Mei", y: sma5 },
			{ label: "Juni", y: sma6 },
            { label: "Juli", y: sma7 },
			{ label: "Agustus", y: sma8 },
			{ label: "September", y: sma9 },
			{ label: "Oktober", y: sma10 },
			{ label: "November", y: sma11 },
			{ label: "Desember", y: sma12 }
		]
	},
    {
		type: "column",	
		name: "D3/S1",
		legendText: "D3/S1",
		showInLegend: true,
		dataPoints:[
			{ label: "Januari", y: d3 },
			{ label: "Februari", y: d32 },
			{ label: "Maret", y: d33 },
			{ label: "April", y: d34 },
			{ label: "Mei", y: d35 },
			{ label: "Juni", y: d36 },
            { label: "Juli", y: d37 },
			{ label: "Agustus", y: d38 },
			{ label: "September", y: d39 },
			{ label: "Oktober", y: d310 },
			{ label: "November", y: d311 },
			{ label: "Desember", y: d312 }
		]
	},
    {
		type: "column",	
		name: "<18 tahun",
		legendText: "< 18 tahun",
		showInLegend: true,
		dataPoints:[
			{ label: "Januari", y: umur1 },
			{ label: "Februari", y: umur12 },
			{ label: "Maret", y: umur13 },
			{ label: "April", y: umur14 },
			{ label: "Mei", y: umur15 },
			{ label: "Juni", y: umur16 },
            { label: "Juli", y: umur17 },
			{ label: "Agustus", y: umur18 },
			{ label: "September", y: umur19 },
			{ label: "Oktober", y: umur110 },
			{ label: "November", y: umur111 },
			{ label: "Desember", y: umur112 }
		]
	},
    {
		type: "column",	
		name: "18-25 tahun",
		legendText: "18-25 tahun",
		showInLegend: true,
		dataPoints:[
			{ label: "Januari", y: umur2 },
			{ label: "Februari", y: umur22 },
			{ label: "Maret", y: umur23 },
			{ label: "April", y: umur24 },
			{ label: "Mei", y: umur25 },
			{ label: "Juni", y: umur26 },
            { label: "Juli", y: umur27 },
			{ label: "Agustus", y: umur28 },
			{ label: "September", y: umur29 },
			{ label: "Oktober", y: umur210 },
			{ label: "November", y: umur211 },
			{ label: "Desember", y: umur212 }
		]
	},
    {
		type: "column",	
		name: "25-50 tahun",
		legendText: "25-50 tahun",
		showInLegend: true,
		dataPoints:[
			{ label: "Januari", y: umur3 },
			{ label: "Februari", y: umur32 },
			{ label: "Maret", y: umur33 },
			{ label: "April", y: umur34 },
			{ label: "Mei", y: umur35 },
			{ label: "Juni", y: umur36 },
      { label: "Juli", y: umur37 },
			{ label: "Agustus", y: umur38 },
			{ label: "September", y: umur39 },
			{ label: "Oktober", y: umur310 },
			{ label: "November", y: umur311 },
			{ label: "Desember", y: umur312 }
		]
	},
    {
		type: "column",	
		name: "> 50 tahun",
		legendText: "> 50 tahun",
		showInLegend: true,
		dataPoints:[
			{ label: "Januari", y: umur4 },
			{ label: "Februari", y: umur42 },
			{ label: "Maret", y: umur43 },
			{ label: "April", y: umur44 },
			{ label: "Mei", y: umur45 },
			{ label: "Juni", y: umur46 },
            { label: "Juli", y: umur47 },
			{ label: "Agustus", y: umur48 },
			{ label: "September", y: umur49 },
			{ label: "Oktober", y: umur410 },
			{ label: "November", y: umur411 },
			{ label: "Desember", y: umur412 }
		]
	},
    {
		type: "column",	
		name: "Pria",
		legendText: "Pria",
		showInLegend: true,
		dataPoints:[
			{ label: "Januari", y: laki },
			{ label: "Februari", y: laki2 },
			{ label: "Maret", y: laki3 },
			{ label: "April", y: laki4 },
			{ label: "Mei", y: laki5 },
			{ label: "Juni", y: laki6 },
            { label: "Juli", y: laki7 },
			{ label: "Agustus", y: laki8 },
			{ label: "September", y: laki9 },
			{ label: "Oktober", y: laki10 },
			{ label: "November", y: laki11 },
			{ label: "Desember", y: laki12 }
		]
	},
    {
		type: "column",	
		name: "Wanita",
		legendText: "Wanita",
		showInLegend: true,
		dataPoints:[
			{ label: "Januari", y: cewek },
			{ label: "Februari", y: cewek2 },
			{ label: "Maret", y: cewek3 },
			{ label: "April", y: cewek4 },
			{ label: "Mei", y: cewek5 },
			{ label: "Juni", y: cewek6 },
            { label: "Juli", y: cewek7 },
			{ label: "Agustus", y: cewek8 },
			{ label: "September", y: cewek9 },
			{ label: "Oktober", y: cewek10 },
			{ label: "November", y: cewek11 },
			{ label: "Desember", y: cewek12 }
		]
	}]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>



</body>

</html>

