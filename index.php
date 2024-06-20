<?php 
  include 'php/connect.php';
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
  <link href="assets/img/Kejari2.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v1.4.1
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <?php

      $rowperpage = 20;
      $row = 0;

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
        <h1 class="text-light"><a href="index.php">Kejaksaan Negeri Cilacap</a></h1>
      </div>

      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#resume"><i class="bx bx-file-blank"></i> <span>Bagan</span></a></li>
          <li><a href="#portfolio"><i class="bx bx-book-content"></i>Grafik</a></li>
          <li><a href="login.php"><i class="bx bx-user"></i> <span>Login</span></a></li>

        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <!-- ======= Home ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Selamat Datang</h1>
      <p>Di <span class="typed" data-typed-items="Website Kejaksaan Negeri Cilacap"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    

    <!-- ======= Bagan  ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Bagan</h2>
          <?php
          $query2="SELECT * FROM bagan";
          $result_query2=mysqli_query($conn, $query2); 
          $row2 = mysqli_fetch_array($result_query2);
              echo '
                <img src="data:image/jpeg;base64,'.base64_encode($row2['bagan'] ).'" width= "100%" height="auto">
              ';   
          ?>
        </div>

      </div>
    </section>

    <!-- ======= Grafik ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="15000">
          <div class="carousel-inner">
          <?php
            $ImageArray = array();
            $queryImages = "SELECT * FROM galeri ";
            $result = mysqli_query($conn,$queryImages);
            if(mysqli_num_rows($result) >0){
                while ($row1 = mysqli_fetch_array($result)){
                    $ImageArray[] = $row1;
                }
            }

            for($j=0;$j<count($ImageArray);$j++){
                    //If it is the first image set it as active
                    if($j==0){
                        echo '<div class="carousel-item active">

                              <!--Using image id and url  -->

                            <img class="d-block w-100" width= "100%" height="auto" src="GetImageID.php?id=' .$ImageArray[$j]['id'].'" /> 

                              <!-- or using base64_encode

                              <img width= "100%" height="auto" src="data:image/jpeg;base64,'.base64_encode($ImageArray[$j]['foto']).'"/>

                              -->
                              </div>';
                    }

                    else{
                        echo '<div class="carousel-item" >
                                <img class="d-block w-100" src="GetImageID.php?id=' .$ImageArray[$j]['id'].'" /> 
                              </div>';
                    }
            }
          ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/coba.js"></script>

</body>

</html>