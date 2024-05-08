<?php

include_once "../shared/connection.php";
include_once "authgaurd.php";
$userid=$_SESSION['userid'];
//print_r($_FILES['image']['tmp_name']);

$name=$_POST["name"];
$price=$_POST["price"];
$details=$_POST["details"];

$dest_file_path="../shared/images/".$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],$dest_file_path);

$status=mysqli_query($conn,"insert into product(name,price,details,impath,uploaded_by) values('$name',$price,'$details','$dest_file_path',$userid)");
if($status)
{
    echo "Product uploaded successfully";
    header("location:view.php");
}
else
{
    echo mysqli_error($conn);
}



?>