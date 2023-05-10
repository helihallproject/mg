<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Declaring variables to prevent errors
$uname = ""; //User name
$em = ""; //Email 1
$em2 = ""; //Email 2
$password = ""; //Password
$password2 = ""; //Password 2
$datesup = ""; //Date user signed up
$error_array = array(); //Holds error messages
$em_check = ""; //Query to check existing email
$num_rows_em = 0; //Number of rows returned by email check query




if(isset($_POST['reg_button'])){ //If the register submit button is set i.e. pressed!

  //Registration form values
  
  //First Name
	$uname = strip_tags($_POST['reg_uname']); //Remove html tags
	$uname = str_replace(' ','',$uname); //Remove spaces
  $_SESSION['reg_uname'] = $uname; //Store uname in session
  
  //Email
	$em = strip_tags($_POST['reg_email']); //Remove html tags
	$em = str_replace(' ','',$em); //Remove spaces
	$em = ucfirst(strtolower($em)); //Uppercase first letter
  $_SESSION['reg_email'] = $em; //Store email in session
  
  //Email2
	$em2 = strip_tags($_POST['reg_email2']); //Remove html tags
	$em2 = str_replace(' ','',$em2); //Remove spaces
	$em2 = ucfirst(strtolower($em2)); //Uppercase first letter
  $_SESSION['reg_email2'] = $em2; //Store email2 in session
  
  //Password 1 and 2
	$password = strip_tags($_POST['reg_password']); //Remove html tags
  $password2 = strip_tags($_POST['reg_password2']); //Remove html tags
  
  //Date they signed up
  $datesup = date("y-m-d");
  
  //Check emails match
  if($em == $em2) {
    //Check if email is in valid format
    if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
      
      $em = filter_var($em, FILTER_VALIDATE_EMAIL);
      
      //Check if email already exists
      $em_check = mysqli_query($con, "SELECT hemail FROM humanusers WHERE hemail = '$em'");
      
      //Count rows returned
      $num_rows_em = mysqli_num_rows($em_check);
      
      
      if($num_rows_em > 0) {       
        array_push($error_array, "Email already in use");       
      }

      //Check if username already exists
     
      
    }
    else {
     array_push($error_array, "Invalid email format");
    }
  }
  else {
    array_push($error_array, "Emails don't match");
  }
  
  //Check passwords match
  if($password != $password2) {
    array_push($error_array, "Passwords don't match");
  }
  else {
    if(preg_match('/[^A-Za-z0-9]/',$password)){
      array_push($error_array, "Your password can only contain letters and numbers (for now..)");
    }
    
  }
  
  //Check length of password
  if(strlen($password) < 8) {
    array_push($error_array, "Your password should be atleast 8 characters");
  }
  
  //Check length of uname
  if(strlen($uname)  > 40 || strlen($uname) < 2) {
     array_push($error_array, "Your username should be between 2 and 40 characters");
  }
  
  $un_check = mysqli_query($con, "SELECT husername FROM humanusers WHERE husername = '$uname'");
      
  //Count rows returned
  $num_rows_uname = mysqli_num_rows($un_check);
        
        
  if($num_rows_uname > 0) {       
     array_push($error_array, "Username already in use");       
  }

  
  if(empty($error_array)) {
   
    $password = md5($password); //Encrypt password before sending to database

   
    
    //Profile pic - To Do
    //$profile_pic = "";
    
    //$insert_query = mysqli_query($con, "INSERT INTO users values ('','$em','$password','$username','$datesup')");
    $insert_query = mysqli_query($con, "INSERT INTO humanusers (hemail,hpassword,husername,datesignedup,huser_closed,hgalleryname) values ('$em','$password','$uname','$datesup','no','$uname')");
    
    array_push($error_array,"<span style='color: #14C000'>Youre all set! Log in!</span></br>");
    
    //Clear session variables
    $_SESSION['reg_fname'] = "";
    $_SESSION['reg_lname'] = "";
    $_SESSION['reg_email'] = "";
    $_SESSION['reg_email2'] = "";
    
    
    
    //header("Refresh:0.2; url=http://www.helihallproject.com.au/submitted.php");
    
  }//End empty error_array


} //End If register submit button pressed





?>