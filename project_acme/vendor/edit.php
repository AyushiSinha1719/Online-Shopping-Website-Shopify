<?php
include_once "authgaurd.php";
include_once "menu.html";
include_once "../Shared/connection.php";

$userid=$_SESSION['userid'];
$pid=$_GET['pid'];
$sql_cursor=mysqli_query($conn,"select * from product where pid=$pid");
while($row=mysqli_fetch_assoc($sql_cursor))
{
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $impath=$row['impath'];

echo"<div class='d-flex justify-content-center align-items-center mt-5'>
<form action='update.php?pid=$pid' class='bg-success p-4' method='POST' enctype='multipart/form-data'>
    <div class='text-center text-white'>
        <h3>Edit Products....</h3>
    </div>
    <input type='text' value='$name' name='name' class='form-control mt-2'>
    <input type='number' value='$price' name='price' class='form-control mt-2'>
    <textarea name='details' cols='10' rows='5' class='form-control mt-2'>$details</textarea>
    <input type='file' name='photo' value='$impath' class='form-control mt-2'>
    <div class='text-center'><button class='btn btn-warning mt-2'>Submit</button></div>
</form>
</div>";
}
?>




