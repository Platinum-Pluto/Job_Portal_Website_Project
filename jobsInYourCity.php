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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <script>
      function showMessage() {
       alert("User Login Required");
        }
    </script>
    
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
                <a class="nav-link active link-primary" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-info" href="discoverjobs.php">Discover jobs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-success" href="jobsInYourCity.php">Jobs In your City</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-danger" href="findSalaries.php">Find Salaries</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-warning" href="contact.php">Contact</a>
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

                 <li>
                       <a class="nav-link link-success" href="userlogin.php">Upload your resume </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active link-danger" href="signup.php">Sign in </a>
                    </li>
                      <h3>|</h3>
                    <li class="nav-item">
                        <a class="nav-link active link-warning " href="userlogin.php">Log in </a>
                      </li>
                        <h3>|</h3>
                      <li class="nav-item">
                        <a class="nav-link link-info" href="Admin_index.php">Employers/Post job </a>
                      </li>
                  </ul>
            </span>
          </div>
        </div>
      </nav>
    <!-- Nav Bar End -->
<body>

<form method="POST">
	<div class="input-group rounded">
		<input type="text" class="form-control rounded" placeholder="Search City" aria-label="Search" aria-describedby="search-addon" name="searchCity">
		<button type="submit" name="search" class="btn btn-primary">Search</button>
	</div>
</form>


   <div style="margin-bottom: 10%;" class="container">
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
           if(isset($_POST['search'])) {
            $searchCity = $_POST['searchCity'];
            $result = searchCity($searchCity);
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
                  
                  <button onclick="showMessage()" class="btn btn-danger btn-sm">Apply Now</button>
                                     
                  </td>
                  </tr>
                 <?php
               }
            
            }
            else{
              echo "<h2>No matching results found</h2>";
            }
           }
            
          ?>
      </tbody>
    </table>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  </body>
<!-- Footer Start -->
<footer style="   position:absolute;
   bottom:0;
">
  <h1>Our Policy</h1>
  <div class="fotcontent">
      <a href="" class="fa-fade">Contract Us</a>
      <a href="" class="fa-fade">Terms of Service</a>
      <a href="" class="fa-fade">Privacy Policy</a>
      <a href="" class="fa-fade">Privacy Setting</a>
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