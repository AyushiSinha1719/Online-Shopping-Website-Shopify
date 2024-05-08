<?php
include_once "../shared/connection.php";

$cartid=$_GET['cartid'];
$status=mysqli_query($conn,"delete from cart where cartid=$cartid");
if($status)
{
    header("location:viewCart.php");
}
else
{
    echo mysqli_error($conn);
}


?>