<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['login_button'])) { //Login button pressed

  $emailorusername = filter_var($_POST['usernameoremail'], FILTER_SANITIZE_EMAIL); //Sanitize email

  $check_database_query = mysqli_query($con,"SELECT * FROM humanusers WHERE hemail='$emailorusername' OR husername='$emailorusername'");
  $check_login_query = mysqli_num_rows($check_database_query);
  
  if($check_login_query == 1) { //Check 1 row returned from db if username or email exists
    $row = mysqli_fetch_array($check_database_query);
    $username = $row['husername'];
    $email = $row['hemail'];

    $user_closed_query = mysqli_query($con,"SELECT * FROM humanusers WHERE hemail='$email' AND huser_closed='yes'");
    if(mysqli_num_rows($user_closed_query) == 1) {
      $reopen_account = mysqli_query($con,"UPDATE humanusers SET huser_closed='no' WHERE hemail='$email'");
    }
    
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header("Location: login_otp.php");
    exit();
  } //End process username and password
  else {
    array_push($error_array, "Email or Username not found.");
    echo "Username or Email not found. <a href='http://helihallproject.com.au/mg/register.php'>Register?</a>";
  }
 
} //End of If login button pressed


?>