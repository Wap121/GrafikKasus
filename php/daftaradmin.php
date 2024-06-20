<?php  

include('access.php');
 require_once ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database); 
 if (mysqli_connect_errno()){
   die("Could not connect to database : ".mysqli_connect_error());
} 
 
if (isset($_POST['save'])){
      

      $Username = $_POST['username'];
      $Password = $_POST['password'];

      $query_save="INSERT INTO user SET 
      username='$Username',
      password='$Password'
      ";

      if (mysqli_query($conn,$query_save)){
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/tambahadmin.php";</script>';  
      
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/tambahadmin.php";</script>';
         
      }
      exit();
   }
 ?>  