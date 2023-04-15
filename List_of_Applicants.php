<?php
    session_start();
    require 'dbcon.php';
?>

<!--DONE-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Applicants</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
                <a class="nav-link active link-primary" aria-current="page" href="#">List Of Applicants</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-info" href="posted_jobs.php">Posted jobs</a>
              </li>
            </ul>
            <!-- Nav left side end  -->
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link link-danger" href="#">Notifications</a>
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
                        <a class="nav-link link-danger" href="Post_Job.php">Employers/Post job</a>
                      </li>
                  </ul>
            </span>
          </div>
        </div>
      </nav>
    <!-- Nav Bar End -->



<body>
<div class="container">
    <h1>List of Applicants</h1>
    <hr>
    <?php 
        $query = "SELECT * FROM jobs";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0){
            foreach($query_run as $Job){ ?>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?= $Job['Job_Title']; ?></button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           <th>Name</th>
                                           <th>Email</th>
                                           <th>Resume</th>
                                           <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM applicant INNER JOIN apply ON apply.Job_ID = ".$Job['Job_ID']." AND applicant.User_ID = apply.User_ID AND apply.Status ='1'";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $applicant){ 
                                                  $U_ID = $applicant['User_ID'];
                                                  ?>
                                                    <tr>
                                                        <td>
                                                            <a href="#" data-toggle="modal" data-target="#applicantModal<?php echo $applicant['User_ID']; ?>"><?php echo $applicant['User_Name']; ?></a>
                                                        </td>
                                                        <td><?= $applicant['Email']; ?></td>
                                                   <!-- <td><a href="#">Download Resume</a></td>-->
                                                        <td>
                                                        <form action="code.php" method="POST" class="d-inline">
                                                            <button type="submit" name="downloadResume" value="<?=$applicant['Job_ID'].'|'.$applicant['User_ID'];?>" class="btn btn-success">Download</button>
                                                        </form>  
                                                        </td>

                                                        <td>
                                                            <div class="btn-group" role="group">
                                                            <form action="code.php" method="POST" class="d-inline">
                                                            <button type="submit" name="accept" value="<?=$applicant['Job_ID'].'|'.$applicant['Email'];?>" class="btn btn-success">Accept</button>
                                                            <button type="submit" name="reject" value="<?=$applicant['Job_ID'].'|'.$applicant['Email'];?>" class="btn btn-danger">Reject</button>
                                                            </form>  
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            }
                                            else{
                                                echo "<h5> No Applicants Have Applied Yet </h5>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } // endforeach
        }
        else{
            echo "<h5> No Jobs Have Been Posted Yet </h5>";
        }         
    ?>            
</div>

<!-- Modal for Applicant Information -->
<div class="modal fade" id="applicantModal<?php echo $applicant['User_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applicantModalLabel">Applicant Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong><?php echo $applicant['User_Name']; ?></p>
                <p><strong>Email:</strong><?php echo $applicant['Email']; ?></p>
                <p><strong>City:</strong><?php echo $applicant['City']; ?></p>
                <p><strong>Resume:</strong> <a href="#">Download Resume</a></p>
                
           </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

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

<script src="https://kit.fontawesome.com/b2e0266282.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</html>


