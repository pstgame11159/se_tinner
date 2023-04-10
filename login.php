<?php   
session_start();    
require_once "connection/server.php";
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login tinner</title>

<meta name="viewport" content="width=device-width, initial-scale=1">



<link rel="stylesheet" type="text/css" href="./Login V16_files/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="./Login V16_files/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="./Login V16_files/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="./Login V16_files/animate.css">

<link rel="stylesheet" type="text/css" href="./Login V16_files/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="./Login V16_files/animsition.min.css">

<link rel="stylesheet" type="text/css" href="./Login V16_files/select2.min.css">

<link rel="stylesheet" type="text/css" href="./Login V16_files/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="./Login V16_files/util.css">
<link rel="stylesheet" type="text/css" href="./Login V16_files/main.css">

<meta name="robots" content="noindex, follow">
<body>
<div class="limiter">
<div class="container-login100" style="background: linear-gradient(to right, rgba(254, 116, 85,1), rgba(251, 43, 122, 1))">
<div class="wrap-login100 p-t-30 p-b-50">
<span class="login100-form-title p-b-41">
Account Login
</span>



<form class="login100-form validate-form p-b-33 p-t-5" action="signin_db.php" method="post" >
<div class="wrap-input100 validate-input" data-validate="Enter username">
<input class="input100" type="email" name="email" placeholder="Email" required>
<span class="focus-input100" data-placeholder=""></span>
</div>




<div class="wrap-input100 validate-input" data-validate="Enter password">
<input class="input100" type="password" name="password" placeholder="Password" required>
<span class="focus-input100" data-placeholder=""></span>
</div>





<div class="container-login100-form-btn m-t-32">
<button type="submit" name="signin" class="login100-form-btn">Login</button>
















</div>
<center>
<h3><a href="register.php"class="fw-bold text-body"><u>Don't have an account yet?</u></a></h3>
</center>
</form>

</div>
</div>
</div>






</body>
</html>