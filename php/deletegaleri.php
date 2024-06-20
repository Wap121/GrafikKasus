<?php
	include ('connect.php');
	$db= mysqli_connect($db_host,$db_username,$db_password,$db_database);

	$id=$_GET['id'];
	// ".$_GET['id']."
	$query="DELETE FROM galeri WHERE id = '$id' ";
	$result = mysqli_query($conn, $query);

	if( $result) {
            echo '<script language="javascript">alert("Data Berhasil Dihapus");document.location="../admin/index5.php";</script>';
    }else{
          echo '<script language="javascript">alert("Data Gagal Dihapus");document.location="../admin/index5.php";</script>';
    }
    mysqli_close($conn);
?>