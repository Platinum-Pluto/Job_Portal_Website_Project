<?php
    session_start();
    require 'dbcon.php';
?>




<!DOCTYPE html>
<html>
<head>


	
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job search</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	


<style>
          button{
			background-color: white;
			color: black;
			font-size:small;
			border: 1px solid green;
			border-radius: 5px;
		}
	button:hover {
  background-color: green; /* Green */
  color: white;
}

.uupload{
font-size: medium;
margin-top: auto;
/* background-color: none; */
margin-bottom: auto;
font-size: 90%;
margin-right: 6px;
}

h1{
  text-align: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 250%;
  margin-top: 5%;
}

.global_button {
  background-color: transparent;
  border-color: transparent;
}
.global_button i {
  color: rgb(53, 137, 247);
}
.global_button:hover {
background-color: transparent;
border-color: transparent;
box-shadow: none;
}
.global_button:focus {
box-shadow: none !important;
outline: none;
background-color: transparent !important;
    border-color: transparent !important;
    outline-color: transparent !important;
  
}


.container {
  display: flex;
  justify-content: space-between;
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.left-nav {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 200px;
}

.nav-item {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #7289da;
  cursor: pointer;
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 20px; /* Add this line */
}


.nav-item.active {
  background-color: #7289da;
  color: #fff;
}

.right-content {
  flex: 1;
  margin-left: 40px;
}

.form-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

label {
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  padding: 10px;
  border: none;
  border-radius: 5px;
  margin-bottom: 10px;
}

button[type="submit"] {
  background-color: #7289da;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #677bc4;
}


    </style>
    <script src="functions.js"></script>


</head>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <img style="margin-right:2%;" src="./img/logo.png" alt="">
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active link-primary" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-info" href="uDiscoverJobs.php">Discover jobs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-success" href="uJobsInYourCity.php">Jobs In your City</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-danger" href="uFindSalaries.php">Find Salaries</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-warning" href="uContact.php">Contact</a>
              </li>
              <li class="nav-item">
              <i style="font-size: 20px;
    cursor: pointer;
    left: 42%;
    transform: translate(-50%, -50%);" class="bi bi-brightness-high-fill" id="toggleDark"></i>
              </li>
            </ul>
            <!-- Nav left side end  -->
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                
                <li class="nav-item">
                        <!-- Google translate -->

                        <div class="dropdown">
		<button class="btn btn-secondary dropdown-toggle global_button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="bi bi-globe"></i>
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="google_translate_element">
		    <div dir="ltr" class="skiptranslate goog-te-gadget">
		      	<span style="white-space: nowrap;">
		        	<a class="goog-logo-link" href="http://translate.google.com" target="_blank">
		        	</a>
		      	</span>
		    </div>
	  	</div>
	</div>

  	<script>
		$(document).ready(function(){
		    $('.dropdown-toggle').click(function(){
		        $('#google_translate_element').toggle();
		    });
		});

	    function googleTranslateElementInit() {
	      	new google.translate.TranslateElement({
	        	pageLanguage: 'en'
	      	}, 'google_translate_element');
	    }
	</script>



	<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



<!-- Google translate -->
                      </li>
                    
                      <h3>|</h3>
                      <div class="uupload">
<span>
<form action="code.php" method="post" enctype="multipart/form-data">
<input type="file" name="uploadedFile" id="uploadedFile">
<button style="font-size: 110%; margin-left:0%;" type="submit" name="submit">Upload File</button>
</form>
</span>
         <div id="message"></div>
         </div>   <h3>|</h3>
         <li class="nav-item">
                      <a class="nav-link active link-danger" href="uNotifications.php">Notifications (<?php echo notificationCounter();?>)</a>
                    </li>
                   
                        <li class="nav-item">
                       <form action="code.php" method="POST">
		                     <button style="margin-right: 18px;" type="submit"  name="userLogout" class="btn btn-danger">Log Out</button>
		                   </form>
                      </li>

                      <li class="nav-item">
                      <a class="nav-link active link-danger" href="uProfile1.php">Profile</a>
                    </li>

                  </ul>
            </span>
          </div>
        </div>
      </nav>
    <!-- Nav Bar End -->





<body>







    
<div class="container">
        <div class="left-nav">
          <div class="nav-item">
            <i class="fas fa-user"></i>
            <a href="uProfile1.php"><span><h5>My Account</h5></span></a>
          </div>
          <div class="nav-item">
            <i class="fas fa-shield-alt"></i>
            <a href="uSecurity.php"><span><h5>Security</h5></span></a>
          </div>
          <div class="nav-item">
            <i class="fas fa-bell"></i>
            <a href="#"><span><h5>Notifications</h5></span></a>
          </div>
        
          <div class="nav-item">
            <i class="fas fa-desktop"></i>
            <a href="uAppearance.php"><span><h5>Appearance</h5></span></a>
          </div>
         
          
          
          <div class="nav-item">
            <i class="fas fa-microphone"></i>
            <a href="#"><span><h5>View Resume</h5></span></a>
          </div>
          <div class="nav-item">
            <i class="fas fa-headset"></i>
            <a href="uApplied.php"><span><h5>Applied Jobs</h5></span></a>
          </div>
        </div>


        <div class="right-content">
            <h2 class="title">Notifications</h2>
            <form class="form">
              <div class="form-group">
                <label for="username">Button for true false - Get Notified For Only Accepted Jobs</label>
                <input type="text" id="username" name="username" value="example_user">
              </div>
              <div class="form-group">
                <label for="email">Button for true false - Do Not Get Notifications</label>
                <input type="email" id="email" name="email" value="example_user@example.com">
              </div>
              <button type="submit" class="btn">Save Changes</button>
            </form>
          </div>




          <style>
            .right-content {
              padding: 20px;
              background-color: #f2f2f2;
              border-radius: 5px;
            }
          
            .title {
              font-size: 24px;
              margin-bottom: 20px;
            }
          
            .form {
              display: flex;
              flex-direction: column;
            }
          
            .form-group {
              margin-bottom: 15px;
            }
          
            label {
              font-weight: bold;
            }
          
            input[type="text"],
            input[type="email"],
            input[type="password"] {
              width: 100%;
              padding: 10px;
              border: 1px solid #ccc;
              border-radius: 5px;
              font-size: 16px;
            }
          
            .btn {
              background-color: #4CAF50;
              color: white;
              border: none;
              border-radius: 5px;
              padding: 10px 20px;
              font-size: 16px;
              cursor: pointer;
            }
          
            .btn:hover {
              background-color: #3e8e41;
            }
          </style>
          
      </div>
      
</body>
</html>

