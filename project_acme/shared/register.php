<?php

$uname=$_POST["username"];
$upass=$_POST["password"];
$utype=$_POST["user_type"];
$encpass=md5($upass); //Passowrd was visible in database earlier

//$conn=new mysqli("localhost","root","","acme");
include_once "connection.php";

//$cur1=mysqli_query($conn,"select * from user where username='$uname'"); //Username of two user can't be same
//mysqli_num_rows($cur1);

$status=mysqli_query($conn,"insert into user(username,password,user_type) values('$uname','$encpass','$utype')");
if($status)
{
    echo "Registration Successfull";
    header("location:login.html");
}
else
{
    echo "Error in registration";
    echo mysqli_error($conn);
}

?>