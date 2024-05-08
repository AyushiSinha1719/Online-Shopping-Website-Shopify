<?php
$conn=new mysqli("localhost","root","","acme");
if($conn->connect_error)
{
    echo "Error in SQL Connection";
    die;
}


?>