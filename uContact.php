<?php
    session_start();
    require 'dbcon.php';
?>



<!DOCTYPE html>
<html lang="en">
<!--Iftekhar-->
<!--NOT DONE-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job search</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
		.contact-box {
			background-color: #f9f9f9;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
			padding: 20px;
			margin-bottom: 20px;
			border-radius: 10px;
			text-align: center;
		}

		.contact-box:hover {
			transform: translateY(-5px);
			box-shadow: 0 0 15px rgba(0,0,0,0.2);
		}

		.contact-icon {
			font-size: 40px;
			color: #007bff;
			margin-bottom: 10px;
		}

		.contact-label {
			font-weight: 600;
			margin-bottom: 5px;
		}

		.contact-text {
			color: #343a40;
			text-decoration: none;
		}

		.contact-text:hover {
			color: #007bff;
			text-decoration: none;
		}
    footer
  {
    width: 100%;
  }
	</style>
  
<head>
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
<div class="translate">
  <div id="google_translate_element">
    <div dir="ltr" class="skiptranslate goog-te-gadget">
      <div id=":0.targetLanguage">
        <!-- <select class="goog-te-combo"> -->
    
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <!-- </select> -->
      </div>
      <!-- Powered by  -->
      <!-- <span style="white-space: nowrap;"> -->
        <!-- <a class="goog-logo-link" href="http://translate.google.com" target="_blank"> -->
          <!-- <img style="padding-right: 3px;" src="http://www.google.com/images/logos/google_logo_41.png" width="37" height="13"> -->
          <!-- Translate -->
        </a>
      </span>
    </div>
  </div>
  <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en'
      }, 'google_translate_element');
    }
  </script>
 
</div>
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
                  </ul>
            </span>
          </div>
        </div>
      </nav>

<body>         
<div class="container py-3">
		<div class="row">
			<div class="col-md-4">
				<div class="contact-box">
					<!-- <i class="fas fa-phone-alt contact-icon"></i> -->
					<p class="contact-label">Phone</p>
					<a href="tel:+1234567890" class="contact-text">123-456-7890</a>
				</div>
			</div>
      <div class="col-md-4">
				<div class="contact-box">
					<!-- <i class="far fa-envelope contact-icon"></i> -->
					<p class="contact-label">Email</p>
					<a href="mailto:info@example.com" class="contact-text">info@example.com</a>
				</div>
			</div>
      <div class="col-md-4">
				<div class="contact-box">
					<!-- <i class="fab fa-facebook-f contact-icon"></i> -->
					<p class="contact-label">Facebook</p>
					<a href="https://www.facebook.com/example" target="_blank" class="contact-text">Visit our Facebook page</a>
				</div>
			</div>
      	
			<div class="col-md-4">
				<div class="contact-box">
					<!-- <i class="fab fa-twitter contact-icon"></i> -->
					<p class="contact-label">Twitter</p>
					<a href="https://twitter.com/example" target="_blank" class="contact-text">Follow us on Twitter</a>
				</div>
			</div>
      <div class="col-md-4">
				<div class="contact-box">
					<!-- <i class="fab fa-github contact-icon"></i> -->
					<p class="contact-label">github</p>
					<a href="https://github.com/example" target="_blank" class="contact-text">Follow us on github</a>
				</div>
			</div>
      <div class="col-md-4">
				<div class="contact-box">
					<!-- <i class="fab fa-twitter contact-icon"></i> -->
					<p class="contact-label">linkedin</p>
					<a href="https://linkedin.com/example" target="_blank" class="contact-text">Follow us on linkedin</a>
				</div>
			</div>
    </div>
  </div>
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>
<!-- Footer Start -->
<footer style="position:absolute;
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

