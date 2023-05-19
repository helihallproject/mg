<?php
require 'config/humans.php';
//require 'includes/form_handlers/register_handler.php';
//require 'includes/form_handlers/login_handler.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<title>Reg</title>
</head>
<body>

 
 <h1>Log in or Register</h1> 
     
<form action="register_otp.php" method="POST">
<input type="email" name="reg_email" placeholder="Email Address">
<br>
<input type="submit" name="login_button" value="Go">
<br>
 </form>
          
     

</body>
</html>
