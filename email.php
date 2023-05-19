<!doctype html>
<?php
require 'config/humans.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';



echo "yo1<br>";

$mail = new PHPMailer();

echo "yo1<br>";
// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "ventraip.email";    // SMTP server example
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 465;  
$mail->SMTPSecure = "ssl";                   
$mail->Username   = "heli@helihallproject.com.au";            // SMTP account username example
$mail->Password   = "";            // SMTP account password example

echo "yo2<br>";
// Content
$mail->setFrom('heli@helihallproject.com.au');   
$mail->addAddress('jamesnotinaus@gmail.com');

$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'Heli - OTP';
$mail->Body    = 'Your OTP: <b>in bold!</b>';
$mail->AltBody = 'Your OTP:';


echo "yo3<br>";
$mail->send();

echo "yo4<br>";

?>