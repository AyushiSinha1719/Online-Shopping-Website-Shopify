<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card
        {
            width:300px;
            margin:10px;
            display:inline-block !important;
        }
        .pdtimg-container
        {
            width:100%;
        }
        .pdtimg
        {
            width:100%;
        }
        .price
        {
            font-size:24px;
            color:violet;
        }
        .price::before
        {
            content:"Rs ";
        }
    </style>
</head>
<body>
    <script>
        function confirmDelete(pid)
        {
            res=confirm("Are you sure want to delete product="+pid);
            if(res){
                window.location=`deletePdt.php?pid=${pid}`;
            }
        }
        function editproduct(pid)
        {
            window.location=`edit.php?pid=${pid}`;
        }
    </script>
</body>
</html>

<?php
include_once "authgaurd.php";
include_once "../shared/connection.php";
include_once "menu.html";
$userid=$_SESSION['userid'];

$sql_cursor=mysqli_query($conn,"select * from product where uploaded_by=$userid");
while($row=mysqli_fetch_assoc($sql_cursor))
{
   $name=$row['name'];
   $price=$row['price'];
   $details=$row['details'];
   $impath=$row['impath'];
   $pid=$row['pid'];

   echo "<div class='card'>
   <div class='card-body'>
       <h2 class='card-title'>$name</h2>
       <div class='price'>$price</div>
       <div class='pdtimg-container'>
           <img class='pdtimg' src='$impath'>
       </div>
       <div class='card-text'>$details</div>
       <div class='mt-2 d-flex  gap-3'>
           <button onclick='editproduct($pid)' class='btn btn-warning'>Edit</button>                
           <button onclick='confirmDelete($pid)' class='btn btn-danger'>Delete</button>
           

           
       </div>
       </div>


</div>";
}
?>