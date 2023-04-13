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
    
        $query = "UPDATE jobs SET Job_Title  ='$jobTitle', Company_Name ='$companyName', Location ='$location', Salary  ='$salary', Qualification = '$qualification', Job_Description = '$jobDescription' WHERE Job_ID ='$Job_ID' ";
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
    
        $query = "INSERT INTO jobs (Job_Title,Job_Description,Salary,Location,Company_Name,Qualification) 
        VALUES ('$jobTitle','$jobDescription','$salary','$location','$companyName','$qualification')";
    
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
        $query_result = mysqli_query($con, "SELECT User_ID, City FROM applicant WHERE NID='$NID'");
        $row = mysqli_fetch_assoc($query_result);
        $userID = $row['User_ID'];
        $city = $row['City'];
        $cityy = $city;
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
   
    $User_Name = mysqli_real_escape_string($con, $_POST['User_Name']);
    $Password = mysqli_real_escape_string($con, $_POST['Password']);
    $query = "SELECT * FROM applicant WHERE User_Name = '$User_Name' AND Password = '$Password'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $_SESSION['message'] = "Login Succesful";
        $admin = 0;
        $user = 1;
        $row = mysqli_fetch_assoc($query_run);
        $userID = $row['User_ID'];
        $city = $row['City'];
        $cityy =$city;
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
        $userID = -5;
        $city = -5;

        $cityy = -5;
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
if($user == 1){


    //Discover_Apply
    if(isset($_POST['application']))
    {
        $Job_ID = mysqli_real_escape_string($con, $_POST['Job_ID']);
        $Status = 1;
        $Notify_user = 1;
        $Notify_admin = 1;
        $query = "INSERT INTO apply (Job_ID,User_ID,Stat,Notify_user,Notify_admin) 
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
         $Job_ID = mysqli_real_escape_string($con, $_POST['Job_ID']);
         $Status = 1;
         $Notify_user = 1;
         $Notify_admin = 1;
         $query = "INSERT INTO apply (Job_ID,User_ID,Stat,Notify_user,Notify_admin) 
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
         $Job_ID = mysqli_real_escape_string($con, $_POST['Job_ID']);
         $Status = 1;
         $Notify_user = 1;
         $Notify_admin = 1;
         $query = "INSERT INTO apply (Job_ID,User_ID,Status,Notify_user,Notify_admin) 
         VALUES ('$Job_ID','$userID','$Status','$Notify_user','$Notify_admin')";
     
         $query_run = mysqli_query($con, $query);
         if($query_run)
         {
             $_SESSION['message'] = "Applied Successfully";
             header("Location: uJobInYourCity.php");
             exit(0);
         }
         else
         {
             $_SESSION['message'] = "Application Failed";
             header("Location: uJobInYourCity.php");
             exit(0);
         }
     }
  
      
  }
  
  else{
      $_SESSION['message'] = "User Login Required To Apply";
      header("Location: index.php");
      exit(0);
  }
















?>



