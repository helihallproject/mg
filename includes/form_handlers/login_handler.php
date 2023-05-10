<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['login_button'])) { //Login button pressed
  $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //Sanitize email
  
  $_SESSION['log_email'] = $email; //Store email in session variable
  $password = md5($_POST['log_password']); //Get password
  
  $check_database_query = mysqli_query($con,"SELECT * FROM humanusers WHERE hemail='$email' AND hpassword='$password'");
  $check_login_query = mysqli_num_rows($check_database_query);
  
  if($check_login_query == 1) { //Check 1 row returned from db if username and password exist and are correct
    $row = mysqli_fetch_array($check_database_query);
    $username = $row['husername'];
    //$fname = $row['first_name'];
    
    $user_closed_query = mysqli_query($con,"SELECT * FROM humanusers WHERE hemail='$email' AND huser_closed='yes'");
    if(mysqli_num_rows($user_closed_query) == 1) {
      $reopen_account = mysqli_query($con,"UPDATE humanusers SET huser_closed='no' WHERE hemail='$email'");
    }
    
    $_SESSION['username'] = $username;
    //$_SESSION['fname'] = $fname;
    header("Location: home.php");
    exit();
  } //End process username and password
  else {
    array_push($error_array, "Email or password was incorrect");
  }
 
} //End of If login button pressed

?>