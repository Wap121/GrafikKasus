<?php  
 include ('../php/access.php');
  require_once ('../php/connect.php');
        $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);
        if (mysqli_connect_errno()){
            die("Could not connect to database : ".mysqli_connect_error());
        }
        
 if(isset($_POST["save"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO galeri(foto) VALUES ('$file')";
      if(mysqli_query($conn, $query)){ 
      echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/galeri.php";</script>';  
      
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/galeri.php";</script>';
         
      }
    }  
 ?> 