<!DOCTYPE html>
<html lang="en">
<head>
<style>
.card
{
    display : inline-block !important;
    width:300px;
    margin:10px;
}
.price
{
        font-size:24px;
        color:violet;
}
.price::before
{
    content:"Rs "
}
</style>
</head>
<body>
</body>
</html>

<?php
include "authgaurd.php";
include_once "../Shared/connection.php";
include "menu.html";

$userid=$_SESSION['userid'];

$sql_cursor=mysqli_query($conn,"select * from ordered_product join product on ordered_product.pid=product.pid where userid=$userid");
$total=0;
echo"<div class='d-flex justify-content-center'>
<h1><u>Order Details</u></h1>
</div>";
while($row=mysqli_fetch_assoc($sql_cursor))
{
    $cartid=$row['cartid'];
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $impath=$row['impath'];
   
    $total+=$price;

    echo"<div class='card'>
    <img src='$impath' class='card-img-top'>
    <div class='card-body'>
      <h5 class='card-title'>$name</h5>
      <p class='price'>$price</p>
    </div>
  </div>";
}
echo"<div class='d-flex gap-2'>
<h2>Total Amount={$total}</h2>
</div>";

$sql_cursor2=mysqli_query($conn,"select * from orders where order_by=$userid");
while($row=mysqli_fetch_assoc($sql_cursor2))
{
    $fullname=$row['fullname'];
    $number=$row['number'];
    $address=$row['address'];
    $pincode=$row['pincode'];

    echo"<div class='card bg-warning' style='width: 18rem;'>
    <div class='card-header'>
      Address Details
    </div>
    <ul class='list-group list-group-flush'>
      <li class='list-group-item'>Name- $fullname</li>
      <li class='list-group-item'>Phone Number- $number</li>
      <li class='list-group-item'>Address- $address</li>
      <li class='list-group-item'>Pincode- $pincode</li>
    </ul>
  </div>";
}

?>