<?php  
 
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $Pasal = $_POST['pasal'];
      $noPas = $_GET['idpasal'];

      $query_update="UPDATE data_pasal SET 
      nama_pasal='$Pasal' WHERE idpasal='$noPas' 
      ";
      
      if($noPas){
         mysqli_query($conn,$query_update);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/index4.php";</script>';  
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/index4.php";</script>';
      }
      exit();
   }
if(isset($_POST["back"])){
    echo '<script language="javascript">document.location="../admin/index4.php";</script>'; 
}  
 ?>  