<?php
session_start();
require 'dbcon.php';


$admin = 0;

$user = 0;
$userID = -5;

$city = -5;

if($admin != 0){
}

    if(isset($_POST['delete_job']))
    {
        $Job_ID = mysqli_real_escape_string($con, $_POST['delete_job']);
    
        $query = "DELETE FROM Jobs WHERE Job_ID ='$Job_ID' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Job Deleted Successfully";
            header("Location: posted_jobs.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Job Has Not Been Deleted";
            header("Location: posted_jobs.php");
            exit(0);
        }
    }
    
    if(isset($_POST['update_job']))
    {
        $Job_ID = mysqli_real_escape_string($con, $_POST['Job_ID']);
    
        $jobTitle = mysqli_real_escape_string($con, $_POST['Job_Title']);
        $companyName = mysqli_real_escape_string($con, $_POST['Company_Name']);
        $location = mysqli_real_escape_string($con, $_POST['Location']);
        $salary = mysqli_real_escape_string($con, $_POST['Salary']);
        $qualification = mysqli_real_escape_string($con, $_POST['Qualification']);
        $jobDescription = mysqli_real_escape_string($con, $_POST['Job_Description']);
        $interviewDate = mysqli_real_escape_string($con, $_POST['interviewDate']);
        $interviewTime = mysqli_real_escape_string($con, $_POST['interviewTime']);
    
        $query = "UPDATE jobs SET Job_Title  ='$jobTitle', Company_Name ='$companyName', Location ='$location', Salary  ='$salary', Qualification = '$qualification', Job_Description = '$jobDescription',  Interview_Date = '$interviewDate', Interview_Time = '$interviewTime' WHERE Job_ID ='$Job_ID' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Job Updated Successfully";
            header("Location: posted_jobs.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Job Not Updated";
            header("Location: posted_jobs.php");
            exit(0);
        }
    
    }
    
    //Job Post Code
    if(isset($_POST['add_job']))
    {
        $jobTitle = mysqli_real_escape_string($con, $_POST['jobTitle']);
        $companyName = mysqli_real_escape_string($con, $_POST['companyName']);
        $location = mysqli_real_escape_string($con, $_POST['location']);
        $salary = mysqli_real_escape_string($con, $_POST['salary']);
        $qualification = mysqli_real_escape_string($con, $_POST['qualification']);
        $jobDescription = mysqli_real_escape_string($con, $_POST['jobDescription']);
        $interviewDate = mysqli_real_escape_string($con, $_POST['interviewDate']);
        $interviewTime = mysqli_real_escape_string($con, $_POST['interviewTime']);
    
        $query = "INSERT INTO jobs (Job_Title,Job_Description,Salary,Location,Company_Name,Qualification,Interview_Date,Interview_Time) 
        VALUES ('$jobTitle','$jobDescription','$salary','$location','$companyName','$qualification','$interviewDate','$interviewTime')";

        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Job Has Been Posted Successfully";
            header("Location: Post_Job.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Job Was Not Created";
            header("Location: Post_Job.php");
            exit(0);
        }
    }



//Admin Login
if(isset($_POST['adminLogin']))
{
    $User_Name = mysqli_real_escape_string($con, $_POST['User_Name']);
    $Password = mysqli_real_escape_string($con, $_POST['Password']);
    $query = "SELECT * FROM admin WHERE User_Name = '$User_Name' AND Password = '$Password'";
    $query_run = mysqli_query($con, $query);
    if(mysqli_num_rows($query_run) > 0)
    {
        $_SESSION['message'] = "Login Succesful";
        $admin = 1;
        header("Location: Post_Job.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Login Failed";
        header("Location: Admin_index.php");
        exit(0);
    }
}


//Admin Logout
if(isset($_POST['adminLogout']))
{
    $admin = 0;
    if($admin == 0)
    {
        $_SESSION['message'] = "Logout Succesfull";
        header("Location: Admin_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Logout Failed";
        header("Location: Post_Job.php");
        exit(0);
    }
}




if($admin == 0){




    
}


if(isset($_POST['accept']))
    {
        $buttonVal = $_POST['accept'];
        $buttonVals = explode('|', $buttonVal); 
        $Job_ID = $buttonVals[0];
        $Email = $buttonVals[1];
    
        $query = "UPDATE apply
        JOIN applicant ON apply.User_ID = applicant.User_ID
        SET apply.Status = '2', apply.Notify_user = '2'
        WHERE apply.Job_ID ='$Job_ID' AND applicant.Email = '$Email'";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Accepted";
            header("Location: List_of_Applicants.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Invalid";
            header("Location: List_of_Applicants.php");
            exit(0);
        }
    }

    if(isset($_POST['reject']))
    {
        $buttonVal = $_POST['reject'];
        $buttonVals = explode('|', $buttonVal); 
        $Job_ID = $buttonVals[0];
        $Email = $buttonVals[1];
    
        $query = "UPDATE apply
        JOIN applicant ON apply.User_ID = applicant.User_ID
        SET apply.Status = '0', apply.Notify_user = '2'
        WHERE apply.Job_ID ='$Job_ID' AND applicant.Email = '$Email'";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Rejected";
            header("Location: List_of_Applicants.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Invalid";
            header("Location: List_of_Applicants.php");
            exit(0);
        }
    }









//Applicant Sign Up
if(isset($_POST['signup']))
{
    $NID = mysqli_real_escape_string($con, $_POST['NID']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $User_Name = mysqli_real_escape_string($con, $_POST['User_Name']);
    $Password = mysqli_real_escape_string($con, $_POST['Password']);
    $City = mysqli_real_escape_string($con, $_POST['City']);
    

    $query = "INSERT INTO applicant (NID,Email,User_Name,Password,City) 
    VALUES ('$NID','$Email','$User_Name','$Password','$City')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Account Has Been Created Successfully";
        $user = 1;
        storeData($Email,$Password);
        header("Location: uIndex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Account Was Not Created";
        header("Location: index.php");
        exit(0);
    }
}



//Applicant Login
if(isset($_POST['userLogin']))
{
   
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $Password = mysqli_real_escape_string($con, $_POST['Password']);
    $query = "SELECT * FROM applicant WHERE Email = '$Email' AND Password = '$Password'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $_SESSION['message'] = "Login Succesful";
        $admin = 0;
        $user = 1;
        storeData($Email,$Password);
        header("Location: uIndex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Login Failed";
        header("Location: index.php");
        exit(0);
    }
}



//Applicant Logout
if(isset($_POST['userLogout']))
{
    
    if($user == 0)
    {
        $admin = 0;
        $user = 0;
        loggedOut();
        $_SESSION['message'] = "Logout Succesful";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Logout Failed";
        header("Location: uIndex.php");
        exit(0);
    }
}




//User page codes starts here
//if($user == 1){


    //Discover_Apply
    if(isset($_POST['application']))
    {
        $Job_ID = mysqli_real_escape_string($con, $_POST['application']);
        $Status = 1;
        $Notify_user = 1;
        $Notify_admin = 1;
        $res = applying();
        if($res->num_rows > 0) {
            foreach($res as $results){
                $userID = $results['User_ID'];
             }
          
          }
        $query = "INSERT INTO apply (Job_ID,User_ID,Status,Notify_user,Notify_admin) 
        VALUES ('$Job_ID','$userID','$Status','$Notify_user','$Notify_admin')";
        $query_run = mysqli_query($con, $query);


        if($query_run)
        {
            $_SESSION['message'] = "Applied Successfully";
            header("Location: uDiscoverJobs.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Application Failed";
            header("Location: uDiscoverJobs.php");
            exit(0);
        }
    }
  
  
     //FindSalary Apply
     if(isset($_POST['application1']))
     {
         $Job_ID = mysqli_real_escape_string($con, $_POST['application1']);
         $Status = 1;
         $Notify_user = 1;
         $Notify_admin = 1;
         $res = applying();
         if($res->num_rows > 0) {
             foreach($res as $results){
                 $userID = $results['User_ID'];
              }
           
           }
         $query = "INSERT INTO apply (Job_ID,User_ID,Status,Notify_user,Notify_admin) 
         VALUES ('$Job_ID','$userID','$Status','$Notify_user','$Notify_admin')";
     
         $query_run = mysqli_query($con, $query);
         if($query_run)
         {
             $_SESSION['message'] = "Applied Successfully";
             header("Location: uFindSalaries.php");
             exit(0);
         }
         else
         {
             $_SESSION['message'] = "Application Failed";
             header("Location: uFindSalaries.php");
             exit(0);
         }
     }
  
     //City Apply
     if(isset($_POST['application2']))
     {
         $Job_ID = mysqli_real_escape_string($con, $_POST['application2']);
         $Status = 1;
         $Notify_user = 1;
         $Notify_admin = 1;
         $res = applying();
         if($res->num_rows > 0) {
             foreach($res as $results){
                 $userID = $results['User_ID'];
              }
           
           }
         $query = "INSERT INTO apply (Job_ID,User_ID,Status,Notify_user,Notify_admin) 
         VALUES ('$Job_ID','$userID','$Status','$Notify_user','$Notify_admin')";
     
         $query_run = mysqli_query($con, $query);
         if($query_run)
         {
             $_SESSION['message'] = "Applied Successfully";
             header("Location: uJobsInYourCity.php");
             exit(0);
         }
         else
         {
             $_SESSION['message'] = "Application Failed";
             header("Location: uJobsInYourCity.php");
             exit(0);
         }
     }
  
      
  //}
  
 // else{
   //   $_SESSION['message'] = "User Login Required To Apply";
     // header("Location: index.php");
      //exit(0);
  //}








  
    
// Check if the form was submitted
if (isset($_POST['submit'])) {
    $res = applying();
    if($res->num_rows > 0) {
        foreach($res as $results){
            $User_ID = $results['User_ID'];
         }
      
      }

    $sql2 = "DELETE FROM files WHERE User_ID = '$User_ID'";
    $query_run = mysqli_query($con, $sql2);



    $targetDir = "uploads/";
    $fileName = $User_ID . '_' . basename($_FILES["uploadedFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowedExtensions = array("jpg", "jpeg", "png", "gif", "pdf", "txt", "doc", "docx");
    if (in_array(strtolower($fileType), $allowedExtensions)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $targetFilePath)) {
            // Insert file info into the database
            $sql = "INSERT INTO files (User_ID, file_name, file_path) VALUES ('$User_ID', '$fileName', '$targetFilePath')";
            if ($con->query($sql) === TRUE) {
                $message = "The file " . htmlspecialchars($fileName) . " has been uploaded.";
                echo '<script>showMessage("' . $message . '");</script>';
                header("Location: uIndex.php");
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            
                                 
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, TXT, DOC, and DOCX files are allowed.";
    }
}

    



if(isset($_POST['adminClear']))
     {
        // Execute the SQL query to clear all notifications
    	$sql = "UPDATE apply SET Notify_admin = 0";
    	$result = mysqli_query($con, $sql);

    	if ($result) {
        	echo "Notifications cleared successfully!";
            header("Location: admin_notification.php");

    	} else {
        	echo "Error clearing notifications: " . mysqli_error($con);
            header("Location: admin_notification.php");
    	}
    }




    if(isset($_POST['userClear']))
     {
        // Execute the SQL query to clear all notifications
    	$sql = "UPDATE apply SET Notify_user = 0";
    	$result = mysqli_query($con, $sql);

    	if ($result) {
        	echo "Notifications cleared successfully!";
            header("Location: uNotifications.php");
    	} else {
        	echo "Error clearing notifications: " . mysqli_error($con);
            header("Location: uNotifications.php");
    	}
    }




  
?>





