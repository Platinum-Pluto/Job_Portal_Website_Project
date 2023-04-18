<?php
    session_start();
    require 'dbcon.php';
?>

<!--DONE-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Post Information Form</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
    <!-- <h1>This is the title </h1> -->
    <!-- Nav Bar Start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Job Portal</a>
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active link-primary" aria-current="page" href="List_of_Applicants.php">List Of Applicants</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-info" href="./posted_jobs.php">Posted jobs</a>
              </li>
            </ul>
            <!-- Nav left side end  -->
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                      <a class="nav-link active link-danger" href="admin_notification.php">Notifications (<?php echo adminNotificationCounter();?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-danger" href="#">English</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link link-danger" href="#">বাংলা </a>
                      </li>
                      <h3>|</h3>
                    <li class="nav-item">
                       <form action="code.php" method="POST">
		                     <button type="submit"  name="adminLogout" class="btn btn-primary">Log Out</button>
		                   </form>
                      </li>
                        <h3>|</h3>
                      <li class="nav-item">
                        <a class="nav-link link-info" href="#">Employers/Post job </a>
                      </li>
                  </ul>
            </span>
          </div>
        </div>
      </nav>
    <!-- Nav Bar End -->

    <!-- Search bar Start -->
   <body>
             
    <div class="container">
      <h1 class="text-center mb-4">Job Post Information</h1>
      <form action="code.php" method="POST">
        <div class="form-group">
          <label for="jobTitle">Job Title</label>
          <input type="text" class="form-control" name="jobTitle" placeholder="Enter job title">
        </div>
        <div class="form-group">
          <label for="companyName">Company Name</label>
          <input type="text" class="form-control" name="companyName" placeholder="Enter company name">
        </div>
        <div class="form-group">
          <label for="location">Location</label>
          <input type="text" class="form-control" name="location" placeholder="Enter job location">
        </div>
        <div class="form-group">
          <label for="salary">Salary</label>
          <input type="number" class="form-control" name="salary" placeholder="Enter salary">
        </div>
        <div class="form-group">
          <label for="qualification">Qualification</label>
          <input type="text" class="form-control" name="qualification" placeholder="Enter qualification">
        </div>
        <div class="form-group">
          <label for="jobDescription">Job Description</label>
          <textarea class="form-control" name="jobDescription" rows="5" placeholder="Enter job description"></textarea>
        </div>


        <div class="form-group">
         <label for="interviewDate">Interview Date</label>
         <input type="date" class="form-control" name="interviewDate" placeholder="Enter interview date">
        </div>
        <div class="form-group">
          <label for="interviewTime">Interview Time</label>
          <input type="time" class="form-control" name="interviewTime" placeholder="Enter interview time">
        </div>



        <button type="submit"  name="add_job" class="btn btn-primary">Post</button>
      </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

  </body>
<!-- Footer Start -->
<footer>
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