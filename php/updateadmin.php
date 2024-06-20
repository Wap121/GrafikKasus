<?php  
 
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $Username = $_POST['username'];
      $Password = $_POST['password'];
      $noAdm = $_GET['id'];

      $query_update="UPDATE user SET 
      username='$Username',
      password='$Password' 
      WHERE id='$noAdm' 
      ";
      
      if($noAdm){
         mysqli_query($conn,$query_update);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/admin.php";</script>';  
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/admin.php";</script>';
      }
      exit();
   }
if(isset($_POST["back"])){
    echo '<script language="javascript">document.location="../admin/admin.php";</script>'; 
}  
 ?>  