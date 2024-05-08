<?php

include_once "../customer/authgaurd.php";
include_once "../customer/menu.html";
include_once "connection.php";

$userid=$_SESSION["userid"];

$fullname=$_POST['fullname'];
$number=$_POST['number'];
$address=$_POST['address'];
$pincode=$_POST['pincode'];

$status=mysqli_query($conn,'insert into ordered_product(cartid,pid,userid)
SELECT cartid,pid,userid FROM cart;');
$status=mysqli_query($conn,"insert into orders(fullname,number,address,pincode,order_by) values('$fullname','$number','$address','$pincode','$userid')");
if($status)
{
    echo "Order Placed Successfuully";
    $status=mysqli_query($conn,"delete from cart where userid=$userid");
    header("location:../customer/home.php");
    
}
else
{
    echo "Error in Placing the order";
    echo mysqli_error($conn);
}


?>