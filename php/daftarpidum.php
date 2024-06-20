<?php  

include('access.php');
 require_once ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database); 
 if (mysqli_connect_errno()){
   die("Could not connect to database : ".mysqli_connect_error());
} 
 
if (isset($_POST['save'])){
      

      $Tahun = $_POST['Tahun1'];
      $Bulan = $_POST['Bulan1'];
      $Perkara = $_POST['Perkara1'];
      $EOH = $_POST['eoh'];
      $EKU = $_POST['eku'];
      $ENZ = $_POST['enz'];

      $query_save="INSERT INTO pidum SET 
      tahun='$Tahun', 
      bulan='$Bulan',
      nopidum='$Perkara',
      EOH='$EOH',
      EKU='$EKU',
      ENZ='$ENZ'
      ";

      if (mysqli_query($conn,$query_save)){
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/pidum.php";</script>';  
      
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/pidum.php";</script>';
         
      }
      exit();
   }
 ?>  