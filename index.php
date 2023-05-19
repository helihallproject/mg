<?php
session_start();

echo $_SESSION['username'] . "<br>";
?>

<html>
<head>
	<title>MG</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		/* CSS code for the page layout */
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}
		header {
			background-color: #f0efed;
			color: black;
			padding: 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			border-bottom-width: medium;
			border-bottom-color: #000;
		}
		h1 {
			margin: 0;
			font-size: 24px;
			font-weight: normal;
		}
		form {
			display: flex;
			align-items: center;
		}
		input[type="text"],
		input[type="password"] {
			padding: 8px;
			margin-right: 10px;
			border-radius: 4px;
			border: none;
			font-size: 14px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 8px 12px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 14px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
		main {
			padding: 20px;
			min-height: 500px;
		}
		footer {
			position: fixed;
  			left: 0;
  			bottom: 0;
  			width: 100%;
  			background-color: #f0efed;
  			color: black;
			padding: 5px;
  			text-align: left;
		}
		.social-icons {
			display: flex;
			align-items: right;
		}
		.social-icons a {
			margin-right: 10px;
			color: #333;
			font-size: 18px;
		}
		.social-icons a:hover {
			color: #fff;
		}
	</style>
</head>
<body>
	<header>
		<h1>MG</h1>

		<?php 
		//if (!empty($_SESSION['username']) && ($_SESSION['loggedin'] == 'YES')){
		//	echo $_SESSION['username'] . "<br>";
		//} else {
		//echo "<a href='http://helihallproject.com.au/mg/register.php'>Register!</a> or <a href='http://helihallproject.com.au/mg/login.php'>Log In</a>";
		//};
		?>

<a href='http://helihallproject.com.au/mg/login.php'>Log In</a>

	</header>
	<main>
		<p>Hi.</p>
		<?php 
		echo "-" . $_SESSION['username'] . "<br>";
		echo "-" . $_SESSION['email'] . "<br>";
		echo "-" . $_SESSION['loggedin'] . "<br>";

		?>


	</main>
	<footer>
		<p>&copy; 2023 mojogallery</p>
		<div class="social-icons">
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-instagram"></i></a>
		</div>
	</footer>
</body>
</html>