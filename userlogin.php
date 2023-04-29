
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
	<style>
		* {
			box-sizing: border-box;
			font-family: 'Montserrat', sans-serif;
			margin: 0;
			padding: 0;
		}

		body {
			background-color: #f5f5f5;
		}

		.container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
			margin:10% 30%;
			max-width: 40%;
			padding: 50px;
			text-align: center;
		}
		body {
			background-color: lightsteelblue;
  opacity: 1;
		}
		button{
			background-color: white;
			color: black;
			font-size: large;
			border: 1px solid green;
			padding:8px;
			padding-left: 30px;
			padding-right: 30px;
			border-radius: 5px;
		}
	button:hover {
  background-color: green; /* Green */
  color: white;
}
		h1 {
			font-size: 36px;
			margin-bottom: 30px;
			text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%);
	  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  /* animation: textclip 2s linear infinite; */
  display: inline-block;
	  
	  
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
		<h1>Login</h1>
		<form action="code.php" method="POST">
			<input type="text" name="Email" placeholder="Email">
			<input type="password" name="Password" placeholder="Password">
			<button type="submit"  name="userLogin" class="btn btn-primary">Login</button>
		</form>
	</div>
</body>
</html>
