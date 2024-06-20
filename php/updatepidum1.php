<?php  
 
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $Perkara = $_POST['perkara'];
      $noPerk = $_GET['idperkara'];

      $query_update="UPDATE data_perkara SET 
      nama_perkara='$Perkara' WHERE idperkara='$noPerk' 
      ";
      
      if($noPerk){
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