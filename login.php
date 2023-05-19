<?php
require 'config/humans.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
require 'otp_handler.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_SESSION['otp_sent'] = "NOTSENT";



?>

<html>
<head>
<title>Log In</title>
</head>
<body>

 <h1>Log In</h1> 
     
<form action="login.php" method="POST">
<input type="usernameoremail" name="usernameoremail" placeholder="Username or Email">
<br>
<input type="submit" name="login_button" value="Login">
<br>
 </form>
          
     

</body>
</html>