
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
	
</head>
<body>

<div class="text">
		<p>
		<h1>Find The Ideal Employees <br>That You Have Been Looking For</h1>
		</p>
	</div>


	<div class="login-box">
		<h2>Admin Login</h2>
		<form action="code.php" method="POST">



		  <div class="user-box">
				<input type="text" name="User_Name" required="">
				<label>Username</label>
			</div>

				<div class="user-box">
				<input type="password" name="Password" required="">
				<label>Password</label>
			    </div>


				<button type="submit"  name="adminLogin" class="btn btn-primary"><span></span>
				<span></span>
				<span></span>
				<span></span>Login
			</button>
		</form>
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
