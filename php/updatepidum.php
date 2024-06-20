<?php  
 
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $Tahun = $_POST['Tahun1'];
      $Bulan = $_POST['Bulan1'];
      $Perkara = $_POST['Perkara1'];
      $EOH = $_POST['eoh'];
      $EKU = $_POST['eku'];
      $ENZ = $_POST['enz'];
      $noPidum = $_GET['idpidum'];

      $query_update="UPDATE pidum SET 
      tahun='$Tahun', 
      bulan='$Bulan',
      nopidum='$Perkara',
      EOH='$EOH',
      EKU='$EKU',
      ENZ='$ENZ'
       WHERE idpidum='$noPidum' 
      ";
      
      if($noPidum){
         mysqli_query($conn,$query_update);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/index3.php";</script>';  
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/index3.php";</script>';
      }
      exit();
   }

if(isset($_POST["back"])){
    echo '<script language="javascript">document.location="../admin/index3.php";</script>'; 
}  

 ?>  