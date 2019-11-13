<?php
session_start();
require_once('database.php');
error_reporting(E_ERROR | E_PARSE);
$username=$_POST['username'];
$password=$_POST['password'];
$password1=$_POST['password1'];
if($password!=$password1)

$sql="create table login_details(username varchar(40) primary key,password varchar(20))";
$result=$conn->query($sql);
$sql="select * from login_details where username='$username' and password='$password'";//for checking if the username already exist
$result=$conn->query($sql);
if(mysqli_num_rows($result)==1)
{
    echo '<script>alert("already registered")</script>';
    header("Location:index.php");
}
else
{
    $sql="insert into login_details(username,password) values('$username','$password')";
    $result=$conn->query($sql);
    if($result)
    {
    $_SESSION['register']=1;
    header("Location:index.php");
    }
    else
    {
    echo '<script>alert("username name and password should be less than 20 characters")</script>';
    }

}
?>