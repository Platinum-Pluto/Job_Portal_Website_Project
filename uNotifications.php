<?php
session_start();
require 'dbcon.php';
if ($_SESSION['user'] != 1) {
	header("Location: index.php");
	exit(0);
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Notification Page</title>
	<style>
		body {
			background-color: #f8f8f8;
			font-family: Arial, sans-serif;
			color: #333;
			margin: 0;
			padding: 0;
		}

		h1 {
			text-align: center;
			margin-top: 20px;
			font-size: 1.5rem;
			color: #444;
			text-shadow: 1px 1px #ccc;
		}

		.notification {
			background-color: #fff;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
			padding: 10px;
			margin: 10px;
			border-radius: 3px;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		.notification-icon {
			font-size: 1.2rem;
			color: #777;
			margin-right: 10px;
		}

		.notification-text {
			font-size: 1.1rem;
			flex: 1;
		}

		.notification-view {
			background-color: #008CBA;
			color: #fff;
			padding: 5px 10px;
			border-radius: 3px;
			font-size: 1.1rem;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		.notification-view:hover {
			background-color: #006080;
		}

		.view-back {
			background-color: #fff;
			color: #008CBA;
			border: 1px solid #008CBA;
			padding: 5px 10px;
			border-radius: 3px;
			font-size: 1.1rem;
			cursor: pointer;
			transition: background-color 0.3s ease;
			position: absolute;
			top: 20px;
			left: 20px;
		}

		.view-back:hover {
			background-color: #008CBA;
			color: #fff;
		}

		.clear-all {
			background-color: #fff;
			color: #008CBA;
			border: 1px solid #008CBA;
			padding: 5px 10px;
			border-radius: 3px;
			font-size: 1.1rem;
			cursor: pointer;
			transition: background-color 0.3s ease;
			position: absolute;
			top: 20px;
			right: 20px;
		}

		.clear-all:hover {
			background-color: #008CBA;
			color: #fff;
		}
	</style>
</head>

<body>
	<a href="uIndex.php" class="view-back">Back</a>
	<h1>Notifications</h1>

	<form action="code.php" method="POST">
		<button type="submit" name="userClear" class="clear-all">Clear All</button>
	</form>



	<?php

	$query = notifications();
	if ($query->num_rows > 0) {
		foreach ($query as $notify) {
			?>


			<div class="notification">
				<i class="notification-icon fa fa-user"></i>
				<div class="notification-text">
					<?php if ($notify['Status']) { ?>
						You have been accepted for the post
						<?php echo $notify['Job_Title'] ?>, Interview Date:
						<?php echo $notify['Interview_Date'] ?>, Interview Time:
						<?php echo $notify['Interview_Time']; ?>
					<?php } else { ?>
						You have been rejected for the post
						<?php echo $notify['Job_Title']; ?>
					<?php } ?>
				</div>
			</div>



			<?php
		}
	} else {
		?>
		<div class="notification">
			<i class="notification-icon fa fa-user"></i>
			<div class="notification-text">No Notifications</div>
		</div>
		<?php
	}
	?>



	<?php
	notificationSeen();
	?>

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>