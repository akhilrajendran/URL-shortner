<?php
require('database.php');
require('index.php');
session_start();
error_reporting(E_ERROR | E_PARSE);
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select username,password from login_details where username='$username' and password='$password'";
$result=$conn->query($sql);

if(mysqli_num_rows($result))
{
    $_SESSION['username']=$username;
    
    header("Location:search.php");
}
else
{
    echo '<script>alert("incorrect login!")</script>';
}
?>