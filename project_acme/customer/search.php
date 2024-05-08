<!DOCTYPE html>
<html lang="en">
<head>
<style>
        .card{
            width:300px;            
            display:inline-block !important;
            margin:10px;
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
        }
        .price::before{
            content:"Rs ";
        }
        
    </style>
</head>
<body>
</body>
</html>

<?php
include_once "authgaurd.php";
include_once "../shared/connection.php";
include_once "menu.html";
$userid=$_SESSION['userid'];
$value=$_GET['value'];

$sql_cursor=mysqli_query($conn,"select * from product");

while($row=mysqli_fetch_assoc($sql_cursor)){

    $pid=$row['pid'];
    $name=$row['name'];
    $details=$row['details'];
    $price=$row['price'];
    $impath=$row['impath'];

    if($name==$value)
   {
    echo "<div class='card'>
        <div class='card-body'>
            <h2 class='card-title'>$name</h2>
            <div class='price'>$price</div>
            <div class='pdtimg-container'>
                <img class='pdtimg' src='$impath'>
            </div>
            <div class='card-text'>$details</div>
            <div class='mt-2 d-flex  justify-content-center'>
                
            <a href='addCart.php?pid=$pid'>
                <button onclick='pop()' class='btn btn-warning'>Add to Cart</button>
            </a>    

                
            </div>
            </div>
    </div>";
   }
}
echo"<a href='home.php'><button class='btn btn-warning'>Back</button></a>";
?>