<?php
require 'config/humans.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
require 'otp.php';
require 'otp_handler.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

go_otp($con);
$_SESSION['otp_sent'] = "SENT";
$email = $_SESSION['email'];



?>

<html>
<head>
<title>OTP</title>
</head>
<body>

 
 <h1>Enter the OTP sent to your email</h1> 
     
<form action="login_otp.php" method="POST">
<input type="li_otp" name="li_otp" placeholder="OTP">
<br>
<input type="submit" name="login_otp_button" value="Submit">
<br>
 </form>
          
     

</body>
</html>