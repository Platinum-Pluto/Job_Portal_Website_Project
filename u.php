<?php
session_start();
if ($_SESSION['user'] != 1) {
  header("Location: index.php");
  exit(0);
}
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

  <script src="functions.js"></script>

  <style>
    .job-card {
      background-color: #f9f9f9;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      max-width: 300px;
      transition: transform 0.3s ease-in-out;
    }

    .job-card:hover {
      transform: scale(1.05) translate(0, -5px);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .job-image {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
      margin-right: 10px;
      flex-shrink: 0;
    }

    .job-title {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 5px;
      color: #007bff;
    }

    .job-description {
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 5px;
      color: #343a40;
    }

    .job-cta {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .job-cta a {
      font-weight: 600;
      background-color: #007bff;
      color: #fff;
      padding: 5px 10px;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .job-cta a:hover {
      background-color: #0062cc;
      text-decoration: none;
    }
  </style>
</head>
<!-- <h1>This is the title </h1> -->
<!-- Nav Bar Start -->
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

          <form action="code.php" method="POST">
            <input type="hidden" name="umodechange" value="uindex.php">
            <button type="submit" class="btn-primary-outline"><i style="font-size: 20px;
            cursor: pointer;
            left: 42%" <?php ugetTheme() ?>></i></button>
          </form>

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
  <div class="container">
    <div class="ticker">
      <div class="title">
        <p>
        <h4 class="match">Latest Feed</h4>
        </p>
      </div>
      <div class="news">
        <marquee>
          <?php
          $value = getLatestNews();
          $company_names = '';
          $posts = '';
          foreach ($value as $row) {
            if (!empty($row['Company_Name'])) {
              $company_names .= $row['Company_Name'] . ", ";
              $posts .= $row['Job_Title'] . ", ";
            }
          }
          $company_names = rtrim($company_names, ', ') . " are recruiting for the posts " . rtrim($posts, ', ');
          echo "<p class = 'match'>" . $company_names . "</p>";
          ?>
        </marquee>
      </div>
    </div>
  </div>



  <div>
    <p>
    <h1 class="match">Latest Job Circulars</h1>
    </p>
  </div>



  <div class="container py-3">
    <div class="row">

      <?php
      $result = getLatest();

      if ($result->num_rows > 10) {
        $i = 0;

        foreach ($result as $results) {
          $i++;
          if ($i > 10) {
            break;
          } else {
            ?>

            <div class="col-md-3">
              <div class="job-card">
                <img src="./img/logo.png" alt="Job Image" class="job-image">
                <div class="job-info">
                  <p class="job-title">
                    <?= $results['Company_Name']; ?>
                  </p>
                  <p class="job-description">
                  <h6>
                    <?= $results['Job_Title']; ?>
                  </h6>
                  </p>
                  <details>
                    <summary>More Information</summary>
                    Location :
                    <?= $results['Location']; ?><br>
                    Salary :
                    <?= $results['Salary']; ?><br>
                    Qualification:
                    <?= $results['Qualification']; ?><br>
                    Job Description:
                    <?= $results['Job_Description']; ?>
                  </details><br>
                  <div class="job-cta">
                    <form action="code.php" method="POST" class="d-inline">
                      <button type="submit" name="applicationIndex" value="<?= $results['Job_ID']; ?>"
                        class="btn btn-danger btn-sm">Apply Now</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }

        }

      } else if ($result->num_rows < 10) {
        $i = 0;
        $val = $result->num_rows;
        foreach ($result as $results) {
          $i++;
          if ($i > $val) {
            break;
          } else {
            ?>

              <div class="col-md-3">
                <div class="job-card">
                  <img src="./img/logo.png" alt="Job Image" class="job-image">
                  <div class="job-info">
                    <p class="job-title">
                    <?= $results['Company_Name']; ?>
                    </p>
                    <p class="job-description">
                    <h6>
                    <?= $results['Job_Title']; ?>
                    </h6>
                    </p>
                    <details>
                      <summary>More Information</summary>
                      Location :
                    <?= $results['Location']; ?><br>
                      Salary :
                    <?= $results['Salary']; ?><br>
                      Qualification:
                    <?= $results['Qualification']; ?><br>
                      Job Description:
                    <?= $results['Job_Description']; ?>
                    </details><br>
                    <div class="job-cta">
                      <form action="code.php" method="POST" class="d-inline">
                        <button type="submit" name="applicationIndex" value="<?= $results['Job_ID']; ?>"
                          class="btn btn-danger btn-sm">Apply Now</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            <?php
          }

        }
      } else {
        echo "<h2 class='match'>No matching results found</h2>";
      }


      ?>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


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