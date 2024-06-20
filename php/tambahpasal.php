<?php  

include('access.php');
 require_once ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database); 
 if (mysqli_connect_errno()){
   die("Could not connect to database : ".mysqli_connect_error());
} 
 
if (isset($_POST['save'])){
      

      $Pasal = $_POST['pasal'];

      $query_save="INSERT INTO data_pasal SET 
      nama_pasal='$Pasal'
      ";

      if (mysqli_query($conn,$query_save)){
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/tahun.php";</script>';  
      
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/index2.php";</script>';
         
      }
      exit();
   }
 ?>  