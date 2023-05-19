<?php
require 'config/humans.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/vendor/PHPMailer/src/Exception.php';
require '/vendor/PHPMailer/src/PHPMailer.php';
require '/vendor/PHPMailer/src/SMTP.php';
//require 'includes/form_handlers/register_handler.php';
//require 'includes/form_handlers/login_handler.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// generate OTP
$otp = rand(100000,999999);
$reg_email = $_POST['reg_email'];
echo $reg_email;
echo '<br>';
echo $otp;
echo '<br>';
$reg_email = '<' . $reg_email . '\>';
echo $reg_email;

$mail = new PHPMailer();

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "mail.example.com";    // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->Username   = "username";            // SMTP account username example
$mail->Password   = "password";            // SMTP account password example

// Content
$mail->setFrom('domain@example.com');   
$mail->addAddress('receipt@domain.com');

$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();



?>