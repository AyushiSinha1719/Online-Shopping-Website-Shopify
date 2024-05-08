<?php
include_once "authgaurd.php";
include_once "../shared/connection.php";
include_once "menu.html";
$userid=$_SESSION['userid'];

$sql_cursor=mysqli_query($conn,"select * from ordered_product,orders,product where ordered_product.userid=orders.order_by and ordered_product.pid=product.pid and product.uploaded_by=$userid");
    while($row=mysqli_fetch_assoc($sql_cursor)){

    $fullname=$row['fullname'];
    $number=$row['number'];
    $address=$row['address'];
    $pincode=$row['pincode'];
    $order_by=$row['order_by'];
    $pid=$row['pid'];
    echo "<br><br>
        <div class='card bg-warning' style='width: 18rem; display:inline-block;'>
        <div class='card-header'>
        Order Details
        </div>
        <ul class='list-group list-group-flush'>
        <li class='list-group-item'>ProductId- $pid</li>
        <li class='list-group-item'>Name- $fullname</li>
        <li class='list-group-item'>Phone Number- $number</li>
        <li class='list-group-item'>Address- $address</li>
        <li class='list-group-item'>Pincode- $pincode</li>
        </ul>
        </div>";

}


?>