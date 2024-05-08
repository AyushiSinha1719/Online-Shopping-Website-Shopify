<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .list-group-item{
            text-align:center;
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

$sql_cursor=mysqli_query($conn,"select * from orders");
while($row=mysqli_fetch_assoc($sql_cursor))
{
    $fullname=$row['fullname'];
    $number=$row['number'];
    $address=$row['address'];
    $pincode=$row['pincode'];
    $order_id=$row['order_id'];
    $order_by=$row['order_by'];

    echo "<br>
    <div class='card bg-warning' style='width: 18rem;'>
    <div class='card-header'>
      Customer with Order Details 
    </div>
    <ul class='list-group list-group-flush'>
      <li class='list-group-item'>Customer-ID: $order_by</li>
      <li class='list-group-item'>Order-ID: $order_id</li>
      <li class='list-group-item'>Name- $fullname</li>
      <li class='list-group-item'>Phone Number- $number</li>
      <li class='list-group-item'>Address- $address</li>
      <li class='list-group-item'>Pincode- $pincode</li>
    </ul>
  </div>
  <br>";
}

?>
