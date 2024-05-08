<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card{
            width:300px;            
            display:inline-block !important;
            margin:10px;
        }
        .vendorId{
            font-size:24px;
            text-align:center;
        }
        .card-title{
            font-size:18px;
        }
        .pdtimg-container{
            width:100%;            
        }
        .pdtimg{
            width:100%;
        }
        .price{
            font-size:24px;
            color:violet;
            text-align:center;
        }
        .price::before{
            content:"Rs ";
        }
        .card-text{
            font-size:22px;
            text-align:center;
            color:violet;
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

$sql_cursor=mysqli_query($conn,"select * from product");
while($row=mysqli_fetch_assoc($sql_cursor)){

    $uploaded_by=$row['uploaded_by'];
    $pid=$row['pid'];
    $name=$row['name'];
    $details=$row['details'];
    $price=$row['price'];
    $impath=$row['impath'];

    echo "<div class='card'>
        <div class='card-body'>
            <h1 class='vendorId'>Vendor-ID: $uploaded_by</h1>
            <h3 class='card-title'>Product-ID: $pid</h3>
            <h3 class='card-title'>Name: $name</h3>
            <div class='price'>$price</div>
            <div class='pdtimg-container'>
                <img class='pdtimg' src='$impath'>
            </div>
            <div class='card-text'>$details</div>
            </div>


    </div>";

}

?>