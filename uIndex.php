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



   <!-- <link rel="stylesheet" href="./css/style.css"> -->




  <?php 

  $switchmode = getMode();

    if ($switchmode == "1") { 
      echo '<link rel="stylesheet" href="./css/dark.css"/>';
    } else {
      echo '<link rel="stylesheet" href="./css/style.css"/>';
    }
  ?>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <script src="functions.js"></script>
  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    
    
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
            </ul>
            <!-- Nav left side end  -->
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link link-danger" href="#">English</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link link-danger" href="#">বাংলা </a>
                      </li>

                   
                      
                 
                    <li class="nav-item">
                    <p class="nav-link link-success">Upload your resume </p>

                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="uploadedFile" id="uploadedFile">
                        <button type="submit" name="submit">Upload File</button>
                    </form>
                    <div id="message"></div>

                    </li>

                    <li class="nav-item">
                      <a class="nav-link active link-danger" href="uNotifications.php">Notifications (<?php echo notificationCounter();?>)</a>
                    </li>


                      <h3>|</h3>
                      <li class="nav-item">
                       <form action="code.php" method="POST">
		                     <button type="submit"  name="userLogout" class="btn btn-primary">Log Out</button>
		                   </form>
                      </li>
                        <h3>|</h3>
                  </ul>
            </span>
          </div>
        </div>
      </nav>
    <!-- Nav Bar End -->


   

   <body>

  

   <div class="container">
      <div class="ticker">
        <div class="title"><h5>Latest Feed</h5></div>
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
          echo "<p>" . $company_names . "</p>";
          ?>
          </marquee>
        </div>
      </div>
    </div>


    
   <div>
    <p><h1>Latest Job Circulars</h1></p>
   </div>

  

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
        $result = getLatest();

            if($result->num_rows > 10) {
              $i = 0;
              
              foreach($result as $results){
                $i++;
                if($i>10){
                  break;
                }
                else{
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
                  <button type="submit" name="application" value="<?=$results['Job_ID'];?>" class="btn btn-danger btn-sm">Apply Now</button>
                  </form>                      
                  </td>
                  </tr>
                 <?php
                }
                
               }
            
            }
           else if($result->num_rows < 10) {
              $i = 0;
              $val = $result->num_rows;
              foreach($result as $results){
                $i++;
                if($i>$val){
                  break;
                }
                else{
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
                  <button type="submit" name="application" value="<?=$results['Job_ID'];?>" class="btn btn-danger btn-sm">Apply Now</button>
                  </form>                      
                  </td>
                  </tr>
                 <?php
                }

            }
          }
            else{
              echo "<h2>No matching results found</h2>";
            }
         
            
          ?>
      </tbody>
    </table>
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