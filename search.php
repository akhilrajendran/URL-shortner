<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if(!$_SESSION['username'])
header("Location:index.php");
else
echo '<b><i>Welcome:  '.$_SESSION['username'].'</i></b>';
?>
<html>
    
    <head>
    
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="author" content="url shortener">
            <title>MakeItShort!</title>
            <link rel="stylesheet" type="text/css" href="extern.css"></link>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
    </head>
    <body>
    <form method="post" action="backend.php">
           <div class="searchbox">
            <input id="search" type="text" placeholder="Enter URL here" name="long_url" >
            <input id="search_btn" type="submit" value="Short it!" name="search_btn">
            </div>
            
            <input id="Prev" type="submit" value="Previous URL" name="prev">
            <input id="logout" type="submit" value="Logout" name="logout">
            
    </form>
    
    </body>
    </html>
