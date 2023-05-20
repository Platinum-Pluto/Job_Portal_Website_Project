<?php
session_start();
require 'dbcon.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
	<?php logSign(); ?>
	
</head>
<body>

<div class="text">
		<p>
		<h1>Find Your Ideal Job <br>That You Have Been Looking For</h1>
		</p>
	</div>


	<div class="login-box">
		<h1>Sign Up</h1>
		<form  action="code.php" method="POST">
			<div class="user-box">
			<input type="text"  name="NID"  required="">
			<label>NID</label>
			</div>
			
			<div class="user-box">
			<input type="text"  name="Email"  required="">
			<label>Email</label>
			</div>
			
			<div class="user-box">
			<input type="text"  name="User_Name"  required="">
			<label>Username</label>
			</div>
			
			<div class="user-box">
			<input type="password"  name="Password"  required="">
			<label>Password</label>
			</div>
			
			<div class="user-box">
			<input type="text" name="City"  required="">
			<label>City</label>
			</div>
			

			<button  type="submit" name="signup" class="btn btn-primary"><span></span>
				<span></span>
				<span></span>
				<span></span>Create Account</button>

		</form>

		<div class="forgot-password">
		<a href="index.php"><h6>Back To Home Page</h6></a>
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
