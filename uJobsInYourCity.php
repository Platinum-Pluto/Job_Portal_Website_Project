<?php
session_start();
require 'dbcon.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>

<!--DONE BACKEND-->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job search</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	
    

<style>
      button{
			background-color: white;
			color: black;
			font-size: large;
			border: 1px solid green;
			padding:2px;
			padding-left: 10px;
			padding-right: 10px;
			border-radius: 5px;
		}
	button:hover {
  background-color: green; /* Green */
  color: white;
}
.uupload{
font-size: medium;
margin-top: auto;
margin-bottom: auto;
font-size: 90%;
margin-right: 6px;
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

</style>
    <script src="functions.js"></script>
    
</head>
     <!-- <h1>This is the title </h1> -->
    <!-- Nav Bar Start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <img style="margin-right:2%;" src="./img/logo.png" alt="">
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active link-primary" aria-current="page" href="uIndex.php">Home</a>
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
    <h1 class="text-center mb-4"></h1>
    <table class="table">
      <thead>
        <tr>
          <th>Job Title</th>
          <th>Company Name</th>
          <th>Location</th>
          <th>Salary</th>
          <th>Qualification</th>
          <th>Job Description</th>
          <th>Apply</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $result = jobsInYourcity();
            if($result->num_rows > 0) {
              echo "<h2>Matching Results: $result->num_rows Found</h2>";
              foreach($result as $results){
                ?>
                  <tr>
                  <td><?= $results['Job_Title']; ?></td>
                  <td><?= $results['Company_Name']; ?></td>
                  <td><?= $results['Location']; ?></td>
                  <td><?= $results['Salary']; ?></td>
                  <td><?= $results['Qualification']; ?></td>
                  <td><?= $results['Job_Description']; ?></td>
                  <td>
                  <form action="code.php" method="POST" class="d-inline">
                  <button type="submit" name="application2" value="<?=$results['Job_ID'];?>" class="btn btn-danger btn-sm">Apply Now</button>
                  </form>                            
                  </td>
                  </tr>
                 <?php
               }
            
            }
            else{
              echo "<h1>No matching results found</h2>";
            }
          
            
          ?>
      </tbody>
    </table>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  </body>
<!-- Footer Start -->
<footer style="position:;
   bottom:0;
" >
  <!-- <h1>Our Policy</h1> -->
  <div class="fotcontent">
      <a style="font-size: 200%;" href="" class="fa-fade">Contract</a>
      <!-- <a href="" class="fa-fade">Terms of Service</a>
      <a href="" class="fa-fade">Privacy Policy</a>
      <a href="" class="fa-fade">Privacy Setting</a> -->
  </div>
  <div class="social">
      <a href="#" class="fa-brands fa-facebook fa-fade fa-sm"></a>
      <a href="#" class="fa-brands fa-twitter fa-fade fa-sm"></a>
      <a href="#" class="fa-brands fa-instagram fa-fade fa-sm"></a>
      <a href="#" class="fa-brands fa-linkedin fa-fade fa-sm"></a>
      <a href="#" class="fa-brands fa-snapchat fa-fade fa-sm"></a>
      <a href="#" class="fa-brands fa-google fa-fade fa-sm"></a>
      <a href="#" class="fa-brands fa-yahoo fa-fade fa-sm"></a>

  </div>
</footer>
<!--  Footer End -->
 
    <script src="https://kit.fontawesome.com/b2e0266282.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>