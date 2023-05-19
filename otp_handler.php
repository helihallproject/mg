<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['login_otp_button'])) { //Login OTP button pressed
  
  $submitted_otp = filter_var($_POST['li_otp']);
  $email = $_SESSION['email'];

  $check_database_query = mysqli_query($con,"SELECT * FROM humanusers WHERE hemail='$email'");
  $check_login_query = mysqli_num_rows($check_database_query);
  
  if($check_login_query == 1) { //Check 1 row returned from db if username or email exists
    $row = mysqli_fetch_array($check_database_query);
    $username = $row['husername'];
    $email = $row['hemail'];
    $hotp = $row['hotp'];
    $hotp_exp_dt = $row['hotp_expiry'];
    $hopt_isexpired = $row['otp_isexpired'];


    $otp_expiry = strtotime( $hotp_exp_dt ) + 600;
    $rightnow = strtotime(date("Y-m-d H:i:s"));

   


    if ($submitted_otp <> $hotp){
      echo "Invalid OTP - try again or log in<br>";
      //$_SESSION['loggedin'] = 'NO';
    };


    if ($rightnow  > $otp_expiry){

      echo "OTP Expired<br>";
      //$_SESSION['otp_sent'] = "NOTSENT";
      //$_SESSION['loggedin'] = 'NO';
      //echo $_SESSION['loggedin'];
    };

    //If OTP is correct and not expired - log in and set session variables
    if (($rightnow  < $otp_expiry) && ($submitted_otp == $hotp)){
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = 'YES';
        header("Location: index.php");
        exit;
    };



  } //End if OTP submit button pressed
  else {
    array_push($error_array, "Email or Username not found.");
    echo "Username or Email not found. <a href='http://helihallproject.com.au/mg/register.php'>Register?</a>";
  }


} // End of If login OTP button pressed

?>