<?php 
include ('php/connect.php');

$imageid = $_GET['id'];

$query = "SELECT foto FROM galeri WHERE id = '$imageid'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);

header("Content-type: image/jpeg");

echo $row['foto'];
?>