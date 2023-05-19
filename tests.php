<?php

session_start();
//
//$_SESSION['username'] = 'rree';
//$_SESSION['email'] = 'jamesbackinaus@gmail.com';
//$_SESSION['loggedin'] = 'YES';
//header("Location: index.php");

$_SESSION['username'] = 'NULL';
$_SESSION['email'] = 'NULL';
$_SESSION['loggedin'] = 'NO';
header("Location: index.php");

?>