<?php
require 'config/humans.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<title>Log in or Reg</title>
</head>
<body>

  <div class="wrapper">
   
      <div class="login_box">

        <div class="login_header">
          <h1>Login or Sign up below</h1> 
        </div>

        
        <div id="first">
          
        
            <form action="regme.php" method="POST">
              <input type="email" name="log_email" placeholder="Email Address" value="<?php if (isset($_SESSION['log_email'])) { echo $_SESSION['log_email']; }?>" required>
              <br>
              <input type="submit" name="login_button" value="Login">
              <br>
              <a href="#" id="signup" class="signup">Need an account? Register here</a>


            </form>
          
      </div>
  <br>
  <br>
  <br>
  <div id="second">
            <form action="regme.php" method="POST">
              <input type="text" name="reg_uname" placeholder="Username" value="<?php 
              if(isset($_SESSION['reg_uname'])) {
                echo $_SESSION['reg_uname']; //If session variable set, populate with first name
              }
              ?>" required>
              <br>
              <?php if(in_array("Your username should be between 2 and 40 characters",$error_array)) echo "Your username should be between 2 and 40 characters<br>";
              else if(in_array("Username already in use",$error_array)) echo "Username already in use<br>";?>

              <input type="email" name="reg_email" placeholder="Email" value="<?php 
              if(isset($_SESSION['reg_email'])) {
                echo $_SESSION['reg_email']; //If session variable set, populate with email
              }
              ?>" required>
              <br>
              <?php if(in_array("Email already in use",$error_array)) echo "Email already in use<br>";
               else if(in_array("Invalid email format",$error_array)) echo "Invalid email format<br>";?>


              <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
              if(isset($_SESSION['reg_email2'])) {
                echo $_SESSION['reg_email2']; //If session variable set, populate with email2
              }
              ?>" required>
              <br>
              <?php if(in_array("Emails don't match",$error_array)) echo "Emails don't match<br>";?>

              <input type="password" name="reg_password" placeholder="Password" required>
              <br>
              <?php if(in_array("Your password can only contain letters and numbers (for now..)",$error_array)) echo "Your password can only contain letters and numbers (for now..)<br>";
               else if(in_array("Your password should be atleast 8 characters",$error_array)) echo "Your password should be atleast 8 characters<br>";?>


              <input type="password" name="reg_password2" placeholder="Confirm Password" required>
              <br>
              <?php if(in_array("Passwords don't match",$error_array)) echo "Passwords don't match<br>";?>

              <input type="submit" name="reg_button" value="Register">
              <br>
              <a href="#" id="signin" class="signin">Already have an account? Sign in here</a>

            </form>
  </div>
        
        
  </div>
  
  </div>

</body>
</html>
