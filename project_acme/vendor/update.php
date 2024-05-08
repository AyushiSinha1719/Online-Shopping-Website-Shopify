<?php
include_once "authguard.php";
include_once "../Shared/connection.php";
$userid=$_SESSION['userid'];

$pid=$_GET['pid'];
$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];

$dest_file_path="../Shared/images/".$_FILES['photo']['name']; 
move_uploaded_file($_FILES['photo']['tmp_name'],$dest_file_path); 


$sql = "UPDATE product SET name='$name',price='$price',details='$details',impath='$dest_file_path' WHERE pid=$pid";

if(mysqli_query($conn, $sql)){
  echo "Record updated successfully";
  header("location:view.php");
} 
else {
  echo "Error updating record: " . $conn->error;
}

?>