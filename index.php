<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['register']==1){//to check if the registration is successful or not
echo '<script>alert("successfully Registered!Please Login to Continue")</script>';
unset($_SESSION['register']);
}
?>
<html>
  <head>
    <title> URL Shortner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <style>
      body{
      overflow-y:hidden;
      }
      </style>
    <link rel="stylesheet" type="text/css" href="extern.css"></link>
  </head>
  <body>
<div id="title1">
<b>URL SHORTNER</b>
</div>
<div class="heading">
Login
</div>
<div class="login-page">
  <div class="form"  method="post">
    <form class="login-form" method="post" action='checklogin.php'>
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="register.html" id="#reg">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>
