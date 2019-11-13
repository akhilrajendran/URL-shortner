<?php 
include 'database.php';
require('search.php');
session_start();
error_reporting(E_ERROR | E_PARSE);
header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");
$no_of_urls=$_POST['no_of_url'];
$long_url=$_POST['long_url'];
$logout=$_POST['logout'];
$prev=$_POST['prev'];
$username=$_SESSION['username'];
//to check if URL is valid or not
if (filter_var($long_url, FILTER_VALIDATE_URL) === FALSE&&$long_url) {
    die('Not a valid URL');
}
if($logout)
{
    unset($_SESSION['username']);
    header("Location:index.php");
}
//if user clicked submit button without inserting into text
if($_POST['search_btn']&&!$long_url)
{
echo '<script>alert("please enter your URL!")</script>'; 
exit(0);
}
//to fetch all previously shortened URL
if($prev)
{   
    
    echo '<div id="results">';
    $sql="select * from Shortner where username='$username'";
    $result = $conn->query($sql);

    if($result->num_rows==0)
    echo '<script>alert("No Records Found")</script>';
    
else if ($result->num_rows > 0)
{
    echo '<b>Yours History<br><br></b>';
    while($row = $result->fetch_assoc()) 
    {
      echo '<b>URL:&nbsp&nbsp&nbsp</b>'.$row['longurl'].'<b><br>SHORT_URL:</b>&nbsp&nbsp&nbsp<a href="http://urlshortner.epizy.com/'.$row['short_url1'].'">http://urlshortner.epizy.com/'.$row['short_url1'].'</a><br>';

    }
} 
echo '</div>';
}

$length_of_string=7;
$url=substr(md5(rand()), 0, $length_of_string);
//to insert new entered URL with corresponding shortened URL into the database
if($long_url)
{
  $sql="create table Shortner(url_id int primary key AUTO_INCREMENT,username varchar(20) references Login_details,longurl text,short_url1 varchar(8),click int)";
  $conn->query($sql);
  $query1="select * from Shortner where longurl='$long_url'";
  $result=$conn->query($query1);
 if(mysqli_num_rows($result)==1)
  {
   $row = $result->fetch_assoc();
   $url=$row['short_url1'];
  }
 else
  {
  $query="insert into Shortner(longurl,short_url1,username)VALUES('$long_url','$url','$username')";
  $conn->query($query);
  }
 echo '<table id="table1" border="1" align="center"><thead><tr><th>URL</th><th>Short_URL1</th>';
 echo '<tr><td>'.$long_url.'</td><td><a href="http://urlshortner.epizy.com/'.$url.'">http://urlshortner.epizy.com/'.$url.'</td>';
}
?> 