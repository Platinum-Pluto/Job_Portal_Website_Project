<?php
session_start();
require 'dbcon.php';
?>

<!-- <h1>DONE </h1> -->

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
	<?php logSign(); ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

</head>

<body>

	<div class="text">
		<p>
		<h1>Find Your Ideal Job <br>That You Have Been Looking For</h1>
		</p>
	</div>

	<div class="login-box">
		<h2>Login</h2>
		<form action="code.php" method="POST">
			<div class="user-box">
				<input type="text" name="Email" required="">

				<label>Email</label>
			</div>
			<div class="user-box">
				<input type="password" name="Password" required="">
				<label>Password</label>
			</div>
			<button type="submit" name="userLogin" class="btn btn-primary"><span></span>
				<span></span>
				<span></span>
				<span></span>Login
			</button>
		</form>
		<div class="forgot-password ">
			<a href="forgot.php">
				<h6>Forgot Password?</h6>
			</a>
		</div>
		<div class="forgot-password">
			<a href="index.php">
				<h6>Back To Home Page</h6>
			</a>
		</div>
	</div>

	<div class="animation-area">
		<ul class="box-area">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>


</body>

</html>