<?php  
 
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $Tahun = $_POST['Tahun1'];
      $Bulan = $_POST['Bulan1'];
      $Pasal = $_POST['Pasal1'];
      $SD = $_POST['sd'];
      $SMP = $_POST['smp'];
      $SMA = $_POST['sma'];
      $D3 = $_POST['d3'];
      $Umur1 = $_POST['umur1'];
      $Umur2 = $_POST['umur2'];
      $Umur3 = $_POST['umur3'];
      $Umur4 = $_POST['umur4'];
      $Laki = $_POST['lelaki'];
      $Cewek = $_POST['perempuan'];
      $noKas = $_GET['idkasus'];

      $query_update="UPDATE kasus SET 
      tahun='$Tahun', 
      bulan='$Bulan',
      pasal='$Pasal',
      SD='$SD',
      SMP='$SMP',
      SMA='$SMA',
      D3='$D3',
      usia1='$Umur1',
      usia2='$Umur2',
      usia3='$Umur3',
      usia4='$Umur4',
      laki='$Laki',
      perempuan='$Cewek' WHERE idkasus='$noKas' 
      ";
      
      if($noKas){
         mysqli_query($conn,$query_update);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/index2.php";</script>';  
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/index2.php";</script>';
      }
      exit();
   }
if(isset($_POST["back"])){
    echo '<script language="javascript">document.location="../admin/index2.php";</script>'; 
}  
 ?>  