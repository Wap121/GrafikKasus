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
    <?php

      $rowperpage = 20;
      $row = 0;
      $row6 = 0;
      

      // Previous Button
      if(isset($_POST['but_prev'])){
      $row = $_POST['row'];
      $row =(int)$row - (int)$rowperpage;
      if( $row < 0 ){
        $row = 0;
        }
      }

      // Next Button
      if(isset($_POST['but_next'])){
      $row = $_POST['row'];
      $allcount = $_POST['allcount'];

      $val = (int)$row + (int)$rowperpage;
        if( $val < $allcount ){
          $row = $val;
        }
      }
    ?>
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <h1 class="text-light"><a href="index2.php">Kejaksaan Negeri Cilacap</a></h1>
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
                  Galeri
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
        $query3="SELECT * FROM data_perkara";
        $result3=mysqli_query($conn, $query3);

        if (isset($_POST['save1'])){
          $Tahun = $_POST['Tahun1'];
          $Perkara = $_POST['Perkara1'];

          $querysss="SELECT *
          FROM pidum 
          INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
          INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
          INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
          WHERE tahun=$Tahun AND nopidum=$Perkara";
          $resultsss = mysqli_query($conn,$querysss);
          if ($resultsss->num_rows > 0){
            while ($rowss = $resultsss-> fetch_assoc()){
              $Perkarass = $rowss['nama_perkara'];
              $Tahunss = $rowss['nama_tahun'];
            }
          } else {
              $Perkarass = '';
              $Tahunss = '';
          }
        ?>
        <div class="section-title">
          <h4 class="resume-title"><center>Grafik <?php echo $Perkarass;?></center></h4>
          <h5 class="resume-title"><center>Tahun <?php echo $Tahunss;?></center></h5>
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
         
        </div>

        <div class="row">
          <div class="col-lg-12" data-aos="fade-up">
            <h3 class="resume-title">Cari</h3>
            </div>
            <div class="resume-item" data-aos="fade-up">
                <form method="POST">
                    <div class="form-group">
                    <label for="Tahun">Pilih Tahun :</label><br/>
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
                    <label for="Perkara">Pilih Perkara</label><br/>
                      <select name="Perkara1" required>
                        <option value="">Perkara :</option>
                          <?php
                          while($row3=mysqli_fetch_array($result3)){
                            echo '<option value='.$row3['idperkara'].'>'.$row3['nama_perkara'].'<br/></option>';
                            } 
                          ?>                         
                      </select>
                    </div>
                        
                  <button type="submit" class="btn btn-primary btn-block" name="save1">Cari</button><br/>
                </form>           
            </div>
        </div>

        <div class="row">
          <div class="col-lg-12" data-aos="fade-up">
            <h3 class="resume-title">Tabel</h3>
            </div>

            <div class="col-lg-12" data-aos="fade-up">
              <h3 class="resume-title">Data Pidum</h3>
            </div>
            <div class="table-responsive" data-aos="fade-up">
              <h4 class="resume-title"><center>Tabel <?php echo $Perkarass;?></center></h4>
              <h5 class="resume-title"><center>Tahun <?php echo $Tahunss;?></center></h5>
              <table id="Tahun" class="table table-bordered table-striped" border="1" align="center" width="95%">
                <thead>
                  <tr>
                    <th><center>No</center></th>
                    <th><center>Tahun</center></th>
                    <th><center>Bulan</center></th>
                    <th><center>Perkara</center></th>
                    <th><center>EOH</center></th>
                    <th><center>EKU</center></th>
                    <th><center>ENZ</center></th>
                    <th colspan="2"><center>Opsi</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php

                  include ('../php/connect.php');

                  $query4="SELECT *
                  FROM pidum 
                  INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
                  INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
                  INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
                  WHERE tahun=$Tahun AND nopidum=$Perkara";
                  $nobaris1 = $row6 + 1;
                  $sumEOH= 0;
                  $sumEKU= 0;
                  $sumENZ= 0;
                  $result4 = mysqli_query($conn,$query4);
                  while ($row4= mysqli_fetch_array($result4)){
                    $idPidum = $row4['idpidum'];
                    $Tahun = $row4['tahun'];
                  $Tahun1 = $row4['nama_tahun'];
                  $Bulan = $row4['bulan'];
                  $Bulan1 = $row4['nama_bulan'];
                  $Perkara = $row4['nopidum'];
                  $Perkara1 = $row4['nama_perkara'];
                  $EOH = $row4['EOH'];
                  $sumEOH = $sumEOH + $EOH;
                  $EKU = $row4['EKU'];
                  $sumEKU = $sumEKU + $EKU;
                  $ENZ = $row4['ENZ'];
                  $sumENZ = $sumENZ + $ENZ;
                  ?>
                  <tr>
                    <td><?php echo $nobaris1; ?></td>
                    <td><?php echo $Tahun1 ?></td>
                    <td><?php echo $Bulan1 ?></td>
                    <td><?php echo $Perkara1 ?></td>
                    <td><?php echo $EOH; ?></td>
                    <td><?php echo $EKU; ?></td>
                    <td><?php echo $ENZ; ?></td>
                    <td><a href='isipidum.php?idpidum=<?php echo $idPidum?>'>Edit</a></td>
                    <td><a onclick='javascript:confirmationDelete($(this));return false;' href='../php/deletepidum.php?idpidum=<?php echo $idPidum?>'>Delete</a></td>
                  </tr>
                  <?php
                  $nobaris1 ++;
                  }
                }else{
                ?>
                <div class="row">
                <div class="col-lg-12" data-aos="fade-up">
                  <h3 class="resume-title">Cari</h3>
                  </div>
                  <div class="resume-item" data-aos="fade-up">
                      <form method="POST">
                          <div class="form-group">
                          <label for="Tahun">Pilih Tahun :</label><br/>
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
                          <label for="Perkara">Pilih Perkara</label><br/>
                            <select name="Perkara1" required>
                              <option value="">Perkara :</option>
                                <?php
                                while($row3=mysqli_fetch_array($result3)){
                                  echo '<option value='.$row3['idperkara'].'>'.$row3['nama_perkara'].'<br/></option>';
                                  } 
                                ?>                         
                            </select>
                          </div>
                              
                        <button type="submit" class="btn btn-primary btn-block" name="save1">Cari</button><br/>
                      </form>           
                  </div>
              </div>

              <div class="row">
                <div class="col-lg-12" data-aos="fade-up">
                  <h3 class="resume-title">Tabel</h3>
                  </div>

                  <div class="col-lg-12" data-aos="fade-up">
                    <h3 class="resume-title">Data Pidum</h3>
                  </div>
                  <div class="table-responsive" data-aos="fade-up">
                    <table id="Tahun" class="table table-bordered table-striped" border="1" align="center" width="95%">
                    <thead>
                      <tr>
                        <th><center>No</center></th>
                        <th><center>Tahun</center></th>
                        <th><center>Bulan</center></th>
                        <th><center>Perkara</center></th>
                        <th><center>EOH</center></th>
                        <th><center>EKU</center></th>
                        <th><center>ENZ</center></th>
                        <th colspan="2"><center>Opsi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
    
                      include ('../php/connect.php');
                      // count total number of rows
    
                      $query4="SELECT *
                      FROM pidum 
                      INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
                      INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
                      INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara";
                      $nobaris1 = $row6 + 1;
                      $sumEOH= 0;
                      $sumEKU= 0;
                      $sumENZ= 0;
                      $result4 = mysqli_query($conn,$query4);
                      while ($row4= mysqli_fetch_array($result4)){
                        $idPidum = $row4['idpidum'];
                        $Tahun = $row4['tahun'];
                      $Tahun1 = $row4['nama_tahun'];
                      $Bulan = $row4['bulan'];
                      $Bulan1 = $row4['nama_bulan'];
                      $Perkara = $row4['nopidum'];
                      $Perkara1 = $row4['nama_perkara'];
                      $EOH = $row4['EOH'];
                      $sumEOH = $sumEOH + $EOH;
                      $EKU = $row4['EKU'];
                      $sumEKU = $sumEKU + $EKU;
                      $ENZ = $row4['ENZ'];
                      $sumENZ = $sumENZ + $ENZ;
                      ?>
                      <tr>
                        <td><?php echo $nobaris1; ?></td>
                        <td><?php echo $Tahun1 ?></td>
                        <td><?php echo $Bulan1 ?></td>
                        <td><?php echo $Perkara1 ?></td>
                        <td><?php echo $EOH; ?></td>
                        <td><?php echo $EKU; ?></td>
                        <td><?php echo $ENZ; ?></td>
                        <td><a href='isipidum.php?idpidum=<?php echo $idPidum?>'>Edit</a></td>
                        <td><a onclick='javascript:confirmationDelete($(this));return false;' href='../php/deletepidum.php?idpidum=<?php echo $idPidum?>'>Delete</a></td>
                      </tr>
                      <?php
                      $nobaris1 ++;
                      }
                    }
                  ?>
                
                
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4" rowspan="2">Total</td>
                    <td>EOS</td>
                    <td>EKU</td>
                    <td>ENZ</td>
                  </tr>
                  <tr>
                    <th><?php echo $sumEOH;?></th>
                    <th><?php echo $sumEKU;?></th>
                    <th><?php echo $sumENZ;?></th>
                  </tr>
                </tfoot>
              </table>
              </div>
            </div>
            </div>


            <?php

           $querys1="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='1' AND nopidum='$Perkara'";
            $sumEOH1= 0;
            $sumEKU1= 0;
            $sumENZ1= 0;
            $results1 = mysqli_query($conn,$querys1);
                  
            while ($rows1= mysqli_fetch_array($results1)){
                $idPidums1 = $rows1['idpidum'];
                $Tahuns1 = $rows1['tahun'];
                $Tahuns11 = $rows1['nama_tahun'];
                $Bulans1 = $rows1['bulan'];
                $Bulans11 = $rows1['nama_bulan'];
                $Perkaras1 = $rows1['nopidum'];
                $Perkaras11 = $rows1['nama_perkara'];
                $EOH1 = $rows1['EOH'];
                $sumEOH1 = $sumEOH1 + $EOH1;
                $EKU1 = $rows1['EKU'];
                $sumEKU1 = $sumEKU1 + $EKU1;
                $ENZ1 = $rows1['ENZ'];
                $sumENZ1 = $sumENZ1 + $ENZ1;
            }
        
            $querys2="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='2' AND nopidum='$Perkara'";
            $sumEOH2= 0;
            $sumEKU2= 0;
            $sumENZ2= 0;
            $results2 = mysqli_query($conn,$querys2);
                  
            while ($rows2= mysqli_fetch_array($results2)){
                $idPidums2 = $rows2['idpidum'];
                $Tahuns2 = $rows2['tahun'];
                $Tahuns12 = $rows2['nama_tahun'];
                $Bulans2 = $rows2['bulan'];
                $Bulans12 = $rows2['nama_bulan'];
                $Perkaras2 = $rows2['nopidum'];
                $Perkaras12 = $rows2['nama_perkara'];
                $EOH2 = $rows2['EOH'];
                $sumEOH2 = $sumEOH2 + $EOH2;
                $EKU2 = $rows2['EKU'];
                $sumEKU2 = $sumEKU2 + $EKU2;
                $ENZ2 = $rows2['ENZ'];
                $sumENZ2 = $sumENZ2 + $ENZ2;
            }

            $querys3="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='3' AND nopidum='$Perkara'";
            $sumEOH3= 0;
            $sumEKU3= 0;
            $sumENZ3= 0;
            $results3 = mysqli_query($conn,$querys3);
                  
            while ($rows3= mysqli_fetch_array($results3)){
                $idPidums3 = $rows3['idpidum'];
                $Tahuns3 = $rows3['tahun'];
                $Tahuns13 = $rows3['nama_tahun'];
                $Bulans3 = $rows3['bulan'];
                $Bulans13 = $rows3['nama_bulan'];
                $Perkaras3 = $rows3['nopidum'];
                $Perkaras13 = $rows3['nama_perkara'];
                $EOH3 = $rows3['EOH'];
                $sumEOH3 = $sumEOH3 + $EOH3;
                $EKU3 = $rows3['EKU'];
                $sumEKU3 = $sumEKU3 + $EKU3;
                $ENZ3 = $rows3['ENZ'];
                $sumENZ3 = $sumENZ3 + $ENZ3;
            }

            $querys4="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='4' AND nopidum='$Perkara'";
            $sumEOH4= 0;
            $sumEKU4= 0;
            $sumENZ4= 0;
            $results4 = mysqli_query($conn,$querys4);
                  
            while ($rows4= mysqli_fetch_array($results4)){
                $idPidums4 = $rows4['idpidum'];
                $Tahuns4 = $rows4['tahun'];
                $Tahuns14 = $rows4['nama_tahun'];
                $Bulans4 = $rows4['bulan'];
                $Bulans14 = $rows4['nama_bulan'];
                $Perkaras4 = $rows4['nopidum'];
                $Perkaras14 = $rows4['nama_perkara'];
                $EOH4 = $rows4['EOH'];
                $sumEOH4 = $sumEOH4 + $EOH4;
                $EKU4 = $rows4['EKU'];
                $sumEKU4 = $sumEKU4 + $EKU4;
                $ENZ4 = $rows4['ENZ'];
                $sumENZ4 = $sumENZ4 + $ENZ4;
            }

            $querys5="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='5' AND nopidum='$Perkara'";
            $sumEOH5= 0;
            $sumEKU5= 0;
            $sumENZ5= 0;
            $results5 = mysqli_query($conn,$querys5);
                  
            while ($rows5= mysqli_fetch_array($results5)){
                $idPidums5 = $rows5['idpidum'];
                $Tahuns5 = $rows5['tahun'];
                $Tahuns15 = $rows5['nama_tahun'];
                $Bulans5 = $rows5['bulan'];
                $Bulans15 = $rows5['nama_bulan'];
                $Perkaras5 = $rows5['nopidum'];
                $Perkaras15 = $rows5['nama_perkara'];
                $EOH5 = $rows5['EOH'];
                $sumEOH5 = $sumEOH5 + $EOH5;
                $EKU5 = $rows5['EKU'];
                $sumEKU5 = $sumEKU5 + $EKU5;
                $ENZ5 = $rows5['ENZ'];
                $sumENZ5 = $sumENZ5 + $ENZ5;
            }

            $querys6="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='6' AND nopidum='$Perkara'";
            $sumEOH6= 0;
            $sumEKU6= 0;
            $sumENZ6= 0;
            $results6 = mysqli_query($conn,$querys6);
                  
            while ($rows6= mysqli_fetch_array($results6)){
                $idPidums6 = $rows6['idpidum'];
                $Tahuns6 = $rows6['tahun'];
                $Tahuns16 = $rows6['nama_tahun'];
                $Bulans6 = $rows6['bulan'];
                $Bulans16 = $rows6['nama_bulan'];
                $Perkaras6 = $rows6['nopidum'];
                $Perkaras16 = $rows6['nama_perkara'];
                $EOH6 = $rows6['EOH'];
                $sumEOH6 = $sumEOH6 + $EOH6;
                $EKU6 = $rows6['EKU'];
                $sumEKU6 = $sumEKU6 + $EKU6;
                $ENZ6 = $rows6['ENZ'];
                $sumENZ6 = $sumENZ6 + $ENZ6;
            }

            $querys7="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='7' AND nopidum='$Perkara'";
            $sumEOH7= 0;
            $sumEKU7= 0;
            $sumENZ7= 0;
            $results7 = mysqli_query($conn,$querys7);
                  
            while ($rows7= mysqli_fetch_array($results7)){
                $idPidums7 = $rows7['idpidum'];
                $Tahuns7 = $rows7['tahun'];
                $Tahuns17 = $rows7['nama_tahun'];
                $Bulans7 = $rows7['bulan'];
                $Bulans17 = $rows7['nama_bulan'];
                $Perkaras7 = $rows7['nopidum'];
                $Perkaras17 = $rows7['nama_perkara'];
                $EOH7 = $rows7['EOH'];
                $sumEOH7 = $sumEOH7 + $EOH7;
                $EKU7 = $rows7['EKU'];
                $sumEKU7 = $sumEKU7 + $EKU7;
                $ENZ7 = $rows7['ENZ'];
                $sumENZ7 = $sumENZ7 + $ENZ7;
            }

            $querys8="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='8' AND nopidum='$Perkara'";
            $sumEOH8= 0;
            $sumEKU8= 0;
            $sumENZ8= 0;
            $results8 = mysqli_query($conn,$querys8);
                  
            while ($rows8= mysqli_fetch_array($results8)){
                $idPidums8 = $rows8['idpidum'];
                $Tahuns8 = $rows8['tahun'];
                $Tahuns18 = $rows8['nama_tahun'];
                $Bulans8 = $rows8['bulan'];
                $Bulans18 = $rows8['nama_bulan'];
                $Perkaras8 = $rows8['nopidum'];
                $Perkaras18 = $rows8['nama_perkara'];
                $EOH8 = $rows8['EOH'];
                $sumEOH8 = $sumEOH8 + $EOH8;
                $EKU8 = $rows8['EKU'];
                $sumEKU8 = $sumEKU8 + $EKU8;
                $ENZ8 = $rows8['ENZ'];
                $sumENZ8 = $sumENZ8 + $ENZ8;
            }

            $querys9="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='9' AND nopidum='$Perkara'";
            $sumEOH9= 0;
            $sumEKU9= 0;
            $sumENZ9= 0;
            $results9 = mysqli_query($conn,$querys9);
                  
            while ($rows9= mysqli_fetch_array($results9)){
                $idPidums9 = $rows9['idpidum'];
                $Tahuns9 = $rows9['tahun'];
                $Tahuns19 = $rows9['nama_tahun'];
                $Bulans9 = $rows9['bulan'];
                $Bulans19 = $rows9['nama_bulan'];
                $Perkaras9 = $rows9['nopidum'];
                $Perkaras19 = $rows9['nama_perkara'];
                $EOH9 = $rows9['EOH'];
                $sumEOH9 = $sumEOH9 + $EOH9;
                $EKU9 = $rows9['EKU'];
                $sumEKU9 = $sumEKU9 + $EKU9;
                $ENZ9 = $rows9['ENZ'];
                $sumENZ9 = $sumENZ9 + $ENZ9;
            }

            $querys10="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='10' AND nopidum='$Perkara'";
            $sumEOH10= 0;
            $sumEKU10= 0;
            $sumENZ10= 0;
            $results10 = mysqli_query($conn,$querys10);
                  
            while ($rows10= mysqli_fetch_array($results10)){
                $idPidums10 = $rows10['idpidum'];
                $Tahuns10 = $rows10['tahun'];
                $Tahuns110 = $rows10['nama_tahun'];
                $Bulans10 = $rows10['bulan'];
                $Bulans110 = $rows10['nama_bulan'];
                $Perkaras10 = $rows10['nopidum'];
                $Perkaras110 = $rows10['nama_perkara'];
                $EOH10 = $rows10['EOH'];
                $sumEOH10 = $sumEOH10 + $EOH10;
                $EKU10 = $rows10['EKU'];
                $sumEKU10 = $sumEKU10 + $EKU10;
                $ENZ10 = $rows10['ENZ'];
                $sumENZ10 = $sumENZ10 + $ENZ10;
            }

            $querys11="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='11' AND nopidum='$Perkara'";
            $sumEOH11= 0;
            $sumEKU11= 0;
            $sumENZ11= 0;
            $results11 = mysqli_query($conn,$querys11);
                  
            while ($rows11= mysqli_fetch_array($results11)){
                $idPidums11 = $rows11['idpidum'];
                $Tahuns11 = $rows11['tahun'];
                $Tahuns111 = $rows11['nama_tahun'];
                $Bulans11 = $rows11['bulan'];
                $Bulans111 = $rows11['nama_bulan'];
                $Perkaras11 = $rows11['nopidum'];
                $Perkaras111 = $rows11['nama_perkara'];
                $EOH11 = $rows11['EOH'];
                $sumEOH11 = $sumEOH11 + $EOH11;
                $EKU11 = $rows11['EKU'];
                $sumEKU11 = $sumEKU11 + $EKU11;
                $ENZ11 = $rows11['ENZ'];
                $sumENZ11 = $sumENZ11 + $ENZ11;
            }

            $querys12="SELECT *
            FROM pidum 
            INNER JOIN data_tahun ON pidum.tahun=data_tahun.idtahun 
            INNER JOIN data_bulan ON pidum.bulan=data_bulan.idbulan
            INNER JOIN data_perkara ON pidum.nopidum=data_perkara.idperkara 
            WHERE tahun='$Tahun' AND bulan='12' AND nopidum='$Perkara'";
            $sumEOH12= 0;
            $sumEKU12= 0;
            $sumENZ12= 0;
            $results12 = mysqli_query($conn,$querys12);
                  
            while ($rows12= mysqli_fetch_array($results12)){
                $idPidums12 = $rows12['idpidum'];
                $Tahuns12 = $rows12['tahun'];
                $Tahuns112 = $rows12['nama_tahun'];
                $Bulans12 = $rows12['bulan'];
                $Bulans112 = $rows12['nama_bulan'];
                $Perkaras12 = $rows12['nopidum'];
                $Perkaras112 = $rows12['nama_perkara'];
                $EOH12 = $rows12['EOH'];
                $sumEOH12 = $sumEOH12 + $EOH12;
                $EKU12 = $rows12['EKU'];
                $sumEKU12 = $sumEKU12 + $EKU12;
                $ENZ12 = $rows12['ENZ'];
                $sumENZ12 = $sumENZ12 + $ENZ12;
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
        var eoh1 = <?php echo $sumEOH1 ?>;
        var eku1 = <?php echo $sumEKU1 ?>;
        var enz1 = <?php echo $sumENZ1 ?>;

        var eoh2 = <?php echo $sumEOH2 ?>;
        var eku2 = <?php echo $sumEKU2 ?>;
        var enz2 = <?php echo $sumENZ2 ?>;

        var eoh3 = <?php echo $sumEOH3 ?>;
        var eku3 = <?php echo $sumEKU3 ?>;
        var enz3 = <?php echo $sumENZ3 ?>;

        var eoh4 = <?php echo $sumEOH4 ?>;
        var eku4 = <?php echo $sumEKU4 ?>;
        var enz4 = <?php echo $sumENZ4 ?>;

        var eoh5 = <?php echo $sumEOH5 ?>;
        var eku5 = <?php echo $sumEKU5 ?>;
        var enz5 = <?php echo $sumENZ5 ?>;

        var eoh6 = <?php echo $sumEOH6 ?>;
        var eku6 = <?php echo $sumEKU6 ?>;
        var enz6 = <?php echo $sumENZ6 ?>;

        var eoh7 = <?php echo $sumEOH7 ?>;
        var eku7 = <?php echo $sumEKU7 ?>;
        var enz7 = <?php echo $sumENZ7 ?>;

        var eoh8 = <?php echo $sumEOH8 ?>;
        var eku8 = <?php echo $sumEKU8 ?>;
        var enz8 = <?php echo $sumENZ8 ?>;

        var eoh9 = <?php echo $sumEOH9 ?>;
        var eku9 = <?php echo $sumEKU9 ?>;
        var enz9 = <?php echo $sumENZ9 ?>;

        var eoh10 = <?php echo $sumEOH10 ?>;
        var eku10 = <?php echo $sumEKU10 ?>;
        var enz10 = <?php echo $sumENZ10 ?>;

        var eoh11 = <?php echo $sumEOH11 ?>;
        var eku11 = <?php echo $sumEKU11 ?>;
        var enz11 = <?php echo $sumENZ11 ?>;

        var eoh12 = <?php echo $sumEOH12 ?>;
        var eku12 = <?php echo $sumEKU12 ?>;
        var enz12 = <?php echo $sumENZ12 ?>;

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
        toolTip: {
        shared: true
      },
      legend: {
        cursor:"pointer",
        itemclick: toggleDataSeries
      },

      data: [{
        type: "column",
        name: "EOH",
        legendText: "EOH",
        showInLegend: true, 
        dataPoints:[
          { label: "Januari", y: eoh1 },
          { label: "Februari", y: eoh2 },
          { label: "Maret", y: eoh3 },
          { label: "April", y: eoh4 },
          { label: "Mei", y: eoh5 },
          { label: "Juni", y: eoh6 },
                { label: "Juli", y: eoh7 },
          { label: "Agustus", y: eoh8 },
          { label: "September", y: eoh9 },
          { label: "Oktober", y: eoh10 },
          { label: "November", y: eoh11 },
          { label: "Desember", y: eoh12 }
        ]
      },
      {
        type: "column",	
        name: "EKU",
        legendText: "EKU",
        showInLegend: true,
        dataPoints:[
          { label: "Januari", y: eku1 },
          { label: "Februari", y: eku2 },
          { label: "Maret", y: eku3 },
          { label: "April", y: eku4 },
          { label: "Mei", y: eku5 },
          { label: "Juni", y: eku6 },
                { label: "Juli", y: eku7 },
          { label: "Agustus", y: eku8 },
          { label: "September", y: eku9 },
          { label: "Oktober", y: eku10 },
          { label: "November", y: eku11 },
          { label: "Desember", y: eku12 }
        ]
      },
        {
        type: "column",	
        name: "ENZ",
        legendText: "ENZ",
        showInLegend: true,
        dataPoints:[
          { label: "Januari", y: enz1 },
          { label: "Februari", y: enz2 },
          { label: "Maret", y: enz3 },
          { label: "April", y: enz4 },
          { label: "Mei", y: enz5 },
          { label: "Juni", y: enz6 },
          { label: "Juli", y: enz7 },
          { label: "Agustus", y: enz8 },
          { label: "September", y: enz9 },
          { label: "Oktober", y: enz10 },
          { label: "November", y: enz11 },
          { label: "Desember", y: enz12 }
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

