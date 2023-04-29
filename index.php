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

    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<style>
  .body_up{
    display: grid;
    align-items: center;
    margin-left: 20%;
    margin-top: 5%;
    max-width: 100%;
  max-height:100%; 
 grid-template-columns: 1fr 1fr 1fr;
 column-gap: 5px;
 
  }


</style>

</head>
    <!-- <h1>This is the title </h1> -->
    <!-- Nav Bar Start -->
    <nav <?php getNavMode() ?> >
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
                <a class="nav-link active link-danger" href="#">Find Salaries</a>
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

<div class="body_up">
  <h1 style="font-size: 250%;">
Find the perfect <br>
 one here.
  </h1>
  <img  style="float:inline-end;  max-width: 100%;
  max-height:100%;" src="./img/indexjob.jpg" alt="">
</div>



   <div style="text-align:center;margin-bottom:10px;margin-top:10px " > 
   <h1 style="font-size: 150%; margin-top:5%; margin-bottom:2%; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">How to create an account ?</h1>
   <iframe width="500" height="250" src="https://www.youtube.com/embed/Jm0MLlE4x0U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

      </div>

  </body>



  
<!-- Footer Start -->
<footer style="
   bottom:0;margin-top:5px;
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