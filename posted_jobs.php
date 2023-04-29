<?php
    session_start();
    require 'dbcon.php';
?>

 <!-- <h1>DONE </h1> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posted Jobs</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
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
                <a class="nav-link active link-primary" aria-current="page" href="List_of_Applicants.php">List Of Applicants</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active link-info" href="#">Posted jobs</a>
              </li>
            </ul>
            <!-- Nav left side end  -->
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active link-danger" href="admin_notification.php">Notifications (<?php echo adminNotificationCounter();?>)</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link link-danger" href="#">English</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link link-danger" href="#">বাংলা </a>
                      </li> -->
                      <h3>|</h3>
                    <li class="nav-item">
                       <form action="code.php" method="POST">
		                     <button type="submit"  name="adminLogout" class="btn btn-danger">Log Out</button>
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


    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Posted Jobs
                            <a href="Post_Job.php" class="btn btn-primary float-end">Add Jobs</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Job ID</th>
                                    <th>Job Title</th>
                                    <th>Company Name</th>
                                    <th>Location</th>
                                    <th>Salary</th>
                                    <th>Qualification</th>
                                    <th>Interview Date</th>
                                    <th>Interview Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM jobs";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $Job)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $Job['Job_ID']; ?></td>
                                                <td><?= $Job['Job_Title']; ?></td>
                                                <td><?= $Job['Company_Name']; ?></td>
                                                <td><?= $Job['Location']; ?></td>
                                                <td><?= $Job['Salary']; ?></td>
                                                <td><?= $Job['Qualification']; ?></td>
                                                <td><?= $Job['Interview_Date']; ?></td>
                                                <td><?= $Job['Interview_Time']; ?></td>
                                                <td>
                                                    <a href="view_job.php?Job_ID=<?= $Job['Job_ID']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_job" value="<?=$Job['Job_ID'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


   </body>

</html>