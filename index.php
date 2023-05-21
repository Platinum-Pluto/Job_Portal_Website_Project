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
  <?php getModeNorm(); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <script src="script.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">



  <style>
    .body_up {
      display: grid;
      align-items: center;
      margin-left: 20%;
      margin-top: 5%;
      max-width: 100%;
      max-height: 100%;
      grid-template-columns: 1fr 1fr 1fr;
      column-gap: 5px;

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

    .btn-primary-outline {
      background-color: transparent;
      border-color: transparent;
    }
  </style>

</head>
<!-- <h1>This is the title </h1> -->
<!-- Nav Bar Start -->
<nav <?php getNavMode() ?>>
  <div class="container-fluid">
    <img style="margin-right:2%;" src="./img/logo.png" alt="">
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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

          <form action="code.php" method="POST">
            <input type="hidden" name="modechange" value="index.php">
            <button type="submit" class="btn-primary-outline"><i style="font-size: 20px;
            cursor: pointer;
            left: 42%" <?php getTheme() ?>></i></button>
          </form>

        </li>

      </ul>
      <!-- Nav left side end  -->
      <span class="navbar-text">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <!-- Google translate -->

          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle global_button" type="button" id="dropdownMenuButton"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            $(document).ready(function () {
              $('.dropdown-toggle').click(function () {
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



<body class='bodystyle'>

  <div class="body_up">
    <h1 class='match' style="font-size: 250%;">
      Find the perfect <br>
      one here.
    </h1>
    <img style="float:inline-end;  max-width: 100%;
  max-height:100%;" src="./img/indexjob.jpg" alt="">
  </div>



  <div style="text-align:center;margin-bottom:10px;margin-top:10px ">
    <h1
      style="font-size: 150%; margin-top:5%; margin-bottom:2%; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
      How to create an account ?</h1>

    <iframe width="500" height="250" src=" https://youtube.com/embed/6tg22han6rU" title="YouTube video player"
      frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      allowfullscreen></iframe>

  </div>

</body>




<!-- Footer Start -->
<footer style="bottom:0;">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</html>