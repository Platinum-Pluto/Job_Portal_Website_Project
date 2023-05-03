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
  <?php ugetModeNorm() ?>
  <script src="script.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />



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

  <script src="functions.js"></script>


</head>


<nav <?php ugetNavMode() ?>>
  <div class="container-fluid">
    <img style="margin-right:2%;" src="./img/logo.png" alt="">
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
          <form action="code.php" method="POST">
            <input type="hidden" name="umodechange" value="uApplied.php">
            <button type="submit" class="btn-primary-outline"><i style="font-size: 20px;
            cursor: pointer;
            left: 42%" <?php ugetTheme() ?>></i></button>
          </form>
        </li>
      </ul>
      <!-- Nav left side end  -->
      <span class="navbar-text">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


          <li class="nav-item">
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

          <h3>|</h3>
          <div class="uupload">
            <span>
              <form action="code.php" method="post" enctype="multipart/form-data">
                <input type="file" name="uploadedFile" id="uploadedFile">
                <button style="font-size: 110%; margin-left:0%;" type="submit" name="submit">Upload File</button>
              </form>
            </span>
            <div id="message"></div>
          </div>
          <h3>|</h3>
          <li class="nav-item">
            <a class="nav-link active link-danger" href="uNotifications.php">Notifications (
              <?php echo notificationCounter(); ?>)
            </a>
          </li>

          <li class="nav-item">
            <form action="code.php" method="POST">
              <button style="margin-right: 18px;" type="submit" name="userLogout" class="btn btn-danger">Log
                Out</button>
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





<body class="bodystyle">







  <div class="container1">
    <div class="left-nav1">
      <div class="nav-item1">
        <i class="fas fa-user"></i>
        <a href="uProfile1.php"><span>
            <h5 class="match">My Account</h5>
          </span></a>
      </div>
      <div class="nav-item1">
        <i class="fas fa-shield-alt"></i>
        <a href="uSecurity.php"><span>
            <h5 class="match">Security</h5>
          </span></a>
      </div>
      <div class="nav-item1">
        <i class="fas fa-bell"></i>
        <a href="uNotif.php"><span>
            <h5 class="match">Notifications</h5>
          </span></a>
      </div>

      <div class="nav-item1">
        <i class="fas fa-headset"></i>
        <a href="uApplied.php"><span>
            <h5 class="match">Applied Jobs</h5>
          </span></a>
      </div>

      <div class="nav-item1">
        <i class="fas fa-headset"></i>
        <a href="uApplied.php"><span>
            <h5 class="match">Download Resume</h5>
          </span></a>
      </div>

    </div>



    <div class="right1-content">
      <h2 class="title1">Applied Jobs</h2>

      <div class="form1-group" style="height: 80%; overflow-y: auto;">
        <label for="username">List of applied jobs here</label>
        <?php
        // Example list of applied jobs
        $rows = uAppliedJobs();

        foreach ($rows as $row) {
          ?>
          <input class="input1" id="username" name="username[]"
            value="Applied for the post <?php echo $row['Job_Title']; ?> at <?php echo $row['Company_Name']; ?>"
            readonly>
          <?php
        }
        ?>
      </div>

    </div>

  </div>

</body>

</html>