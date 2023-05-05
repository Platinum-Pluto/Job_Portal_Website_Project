<?php


require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//connect to the database
$conn = mysqli_connect("localhost", "root", "", "job_portal");

//check for database connection errors
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


$server_Acct = "";
$server_Pw = "";

//get the email address entered by the user
$email = $_POST['email'];

//query the database to get the password for the entered email address
$sql = "SELECT Password FROM applicant WHERE Email='$email'";
$result = mysqli_query($conn, $sql);

//check if there are any results
if (mysqli_num_rows($result) > 0) {
	//fetch the password from the result set
	$row = mysqli_fetch_assoc($result);
	$password = $row['Password'];

	//send the password to the email address
	$to = $email;
	$subject = "Your Password";
	$message = "Your password is: $password";
	//$headers = "From: your_email@example.com";




	$mail = new PHPMailer();

	$mail->isSMTP();

	$mail->Host = "smtp.gmail.com";

	$mail->SMTPAuth = true;

	$mail->SMTPSecure = "tls";

	$mail->Port = "587";

	$mail->Username = $server_Acct;

	$mail->Password = $server_Pw;

	$mail->Subject = $subject;
	//Set sender email
	$mail->setFrom($server_Acct);
	//Enable HTML
	$mail->isHTML(true);
	//Email body
	$mail->Body = "<h4>" . $message . "</h4>";
	//Add recipient
	$mail->addAddress($to);
	//Finally send email
	if ($mail->send()) {
		echo "Email Sent";
		$mail->smtpClose();
		header("Location: Password_Sent.php");
		exit(0);

	} else {

		echo "Message could not be sent. Mailer Error";
		$mail->smtpClose();
		header("Location: userlogin.php");
		exit(0);

	}


} else {
	echo "Email Does Not Exist";
	$mail->smtpClose();
	header("Location: userlogin.php");
	exit(0);
}



?>