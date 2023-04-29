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
	<style>
		* {
			box-sizing: border-box;
			font-family: 'Montserrat', sans-serif;
			margin: 0;
			padding: 0;
		}

		body {
			background-color:azure;
  opacity: 1;
		}

		.container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
			margin: 50px auto;
			max-width: 500px;
			padding: 30px;
			text-align: center;
		}
		button{
			background-color: white;
			color: black;
			font-size: large;
			border: 1px solid grey;
			padding:8px;
			padding-left: 30px;
			padding-right: 30px;
			border-radius: 5px;
		}
	button:hover {
  background-color: grey; 
  color: white;
}
		h1 {
			color: #333;
			font-size: 36px;
			margin-bottom: 30px;
			text-transform: uppercase;
		}

		form input {
			background-color: #f5f5f5;
			border: none;
			border-radius: 5px;
			color: #333;
			font-size: 18px;
			margin-bottom: 20px;
			padding: 15px;
			width: 100%;
		}

		form input[type="submit"] {
			background-color: #008CBA;
			color: #fff;
			cursor: pointer;
			font-weight: bold;
			transition: background-color 0.2s ease-in-out;
		}

		form input[type="submit"]:hover {
			background-color: #006F8F;
		}
	

		@media screen and (max-width: 600px) {
			.container {
				margin: 20px auto;
				padding: 20px;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Sign Up</h1>
		<form  action="code.php" method="POST">
			<input type="text"  name="NID" placeholder="NID Number">
			<input type="text"  name="Email" placeholder="Email">
			<input type="text"  name="User_Name" placeholder="Username">
			<input type="text"  name="Password" placeholder="Password">
			<input type="text" name="City" placeholder="City Name">
			<button  type="submit" name="signup" class="btn">Create</button>

		</form>
	</div>
</body>

</html>
