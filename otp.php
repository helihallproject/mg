<!doctype html>
<?php
//require 'config/humans.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


$to_email = '';

function go_otp($con){

    if (isset($_SESSION['email'])) {
        $to_email = $_SESSION['email'];
    }


    if ($_SESSION['otp_sent'] == 'NOTSENT'){

        // generate OTP
        $otp = rand(100000,999999);

        // Insert into db with expiry time
        $insert_query = mysqli_query($con, "UPDATE humanusers SET `hotp`= $otp,`hotp_expiry` = '" . date("Y-m-d H:i:s") . "',`otp_isexpired`='0' WHERE `hemail` = '$to_email'");
        //Checks for 




        $mail = new PHPMailer();
        // Settings
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';

        $mail->Host       = "ventraip.email";    // SMTP server example
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Port       = 465;  
        $mail->SMTPSecure = "ssl";                   
        $mail->Username   = "heli@helihallproject.com.au";            // SMTP account username example
        $mail->Password   = "";            // SMTP account password example

        $mail->setFrom('heli@helihallproject.com.au');   
        $mail->addAddress($to_email);

        $mail->isHTML(true);                       // Set email format to HTML
        $mail->Subject = 'OTP';
        $mail->Body    = 'Your OTP: <b>' . $otp . '</b>';
        $mail->AltBody = 'Your OTP:';

        $mail->send();
    }


};



?>
