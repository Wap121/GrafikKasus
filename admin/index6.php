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

      $rowperpage = 5;
      $row = 0;
      $rowperpage1 = 10;
      $row6 = 0;
      $rowperpage2 = 10;
      $row7 = 0;

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

        <div class="row">
         

            <div class="col-lg-12" data-aos="fade-up">
              <h3 class="resume-title"><center>Foto Bagan</center></h3>
            </div>
            <div class="table-responsive" data-aos="fade-up">
              <table id="Tahun" class="table table-bordered table-striped" border="1" align="center" width="95%">
                <thead>
                  <tr>
                    <th><center>Foto Bagan</center></th>
                    <th colspan="2"><center>Opsi</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php

                $query1="SELECT * FROM bagan";
                $result1=mysqli_query($conn, $query1);
                if ($result1->num_rows > 0){
                  while ($row1 = $result1-> fetch_assoc()){
                  echo "<tr>";
                  echo '<td><img class="d-block w-100" width= "50%" height="auto" src="data:image/jpeg;base64,'.base64_encode($row1['bagan'] ).'" /></a></td>';
                  echo "<td><a href='isibagan.php?id=".$row1['id']."'>Edit</a></td>";
                  echo "</tr>";
                  }
                }
                else {
                  echo "0 result";
                }
                ?>
                </tbody>
              </table>
            </div>

      </div>
    </section><!-- End Resume Section -->

  </main><!-- End #main -->

  
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>



</body>

</html>