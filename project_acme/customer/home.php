<?php
include_once "authgaurd.php";
include "menu.html";
include_once "../shared/connection.php";
?>
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
    
<script>
    function pop()
    {
        alert("Product added to Cart Successfully!!");
    }
    function searchit()
    {
            searchObj=document.getElementById('search');
            var value=searchObj.value;
            window.location=`search.php?value=${value}`;
    }
    
</script>
</body>
</html>
<?php

$userid=$_SESSION['userid'];
$sql_cursor=mysqli_query($conn,"select * from product");

echo "<div class='input-group mb-3 mt-2'>
<div class='input-group-prepend'>
  <span class='input-group-text'>??</span>
</div>
<input type='text' id='search' class='form-control' placeholder='SEARCH HERE......'>
<button class='btn btn-warning' onclick='searchit()'>Search</button>
</div>";

while($row=mysqli_fetch_assoc($sql_cursor)){

    $pid=$row['pid'];
    $name=$row['name'];
    $details=$row['details'];
    $price=$row['price'];
    $impath=$row['impath'];

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
?>