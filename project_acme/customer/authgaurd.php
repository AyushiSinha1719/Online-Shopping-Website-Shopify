<?php
session_start();
if(!isset($_SESSION["login_status"]))
{
    echo "Illegal Attemp";
    die;
}
if($_SESSION["login_status"]==false)
{
    echo "Unauthorized Attemp";
    die;
}
if($_SESSION["user_type"]!="customer")
{
    echo "You have no permission to access this resource";
    die;
}
$username = $_SESSION['username'];
$user_type = $_SESSION['user_type'];
$userid = $_SESSION['userid'];
echo "<div class='d-flex justify-content-evenly bg-secondary text-white'>
<div>Hello!! $username</div>
<div>User-type = $user_type</div>
<div>User-id = $userid</div>
</div>";
?>