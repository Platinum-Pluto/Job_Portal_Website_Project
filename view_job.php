<?php
session_start();
require 'dbcon.php';
if ($_SESSION['admin'] != 1) {
  header("Location: index.php");
  exit(0);
}
?>

<!-- DONE -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Post View</title>
  <link rel="stylesheet" href="./css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<!-- <h1>This is the title </h1> -->
<!-- Nav Bar Start -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img style="margin-right:2%;" src="./img/logo.png" alt="">
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active link-primary" aria-current="page" href="List_of_Applicants.php">List Of
            Applicants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active link-info" href="posted_jobs.php">Posted jobs</a>
        </li>
      </ul>
      <!-- Nav left side end  -->
      <span class="navbar-text">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active link-danger" href="admin_notification.php">Notifications (
              <?php echo adminNotificationCounter(); ?>)
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-danger" href="#">English</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-danger" href="#">বাংলা </a>
          </li>
          <h3>|</h3>
          <li class="nav-item">
            <a class="nav-link active link-warning " href="#">Log Out </a>
          </li>
          <h3>|</h3>
          <li class="nav-item">
            <a class="nav-link link-info" href="Post_Job.php">Employers/Post job </a>
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
    <?php
    if (isset($_GET['Job_ID'])) {
      $Job_ID = mysqli_real_escape_string($con, $_GET['Job_ID']);
      $query = "SELECT * FROM jobs WHERE Job_ID='$Job_ID'";
      $query_run = mysqli_query($con, $query);

      if (mysqli_num_rows($query_run) > 0) {
        $job = mysqli_fetch_array($query_run);
        ?>
        <form action="code.php" method="POST">
          <input type="hidden" name="Job_ID" value="<?= $job['Job_ID']; ?>">
          <div class="form-group">
            <label for="jobTitle">Job Title</label>
            <input type="text" name="Job_Title" value="<?= $job['Job_Title']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="companyName">Company Name</label>
            <input type="text" name="Company_Name" value="<?= $job['Company_Name']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="Location" value="<?= $job['Location']; ?>" class="form-control">

          </div>
          <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="Salary" value="<?= $job['Salary']; ?>" class="form-control">

          </div>
          <div class="form-group">
            <label for="qualification">Qualification</label>
            <input type="text" name="Qualification" value="<?= $job['Qualification']; ?>" class="form-control">

          </div>
          <div class="form-group">
            <label for="jobDescription">Job Description</label>
            <textarea class="form-control" name="Job_Description" rows="5"><?= $job['Job_Description']; ?></textarea>
          </div>

          <div class="form-group">
            <label for="interviewDate">Interview Date</label>
            <input type="date" class="form-control" name="interviewDate" placeholder="Enter interview date">
          </div>
          <div class="form-group">
            <label for="interviewTime">Interview Time</label>
            <input type="time" class="form-control" name="interviewTime" placeholder="Enter interview time">
          </div>


          <div class="mb-3">
            <button type="submit" name="update_job" value="<?= $Job['Job_ID']; ?>" class="btn btn-primary">
              Update Post
            </button>
          </div>

        </form>
        <?php
      } else {
        echo "<h4>No Such Job ID Found</h4>";
      }
    }
    ?>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>

<!-- Footer Start -->

<!--  Footer End -->
<script src="https://kit.fontawesome.com/b2e0266282.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</html>