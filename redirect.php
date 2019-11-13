<?php 
session_start();
require_once('database.php');
$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";   
$search_url = substr($link, strpos($link, "com/") + 4); 
$sql="select * from shortner where short_url1='$search_url'";   
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo $row['longurl'];
?>