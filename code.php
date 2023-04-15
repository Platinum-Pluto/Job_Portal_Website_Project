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
        $Job_ID = $buttonValues[0];
        $User_ID = $buttonValues[1];
    
        $query = "UPDATE apply SET Status = '0', Notify_user = '2' WHERE Job_ID ='$Job_ID' AND User_ID = '$User_ID'";
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




  if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

    // Get the user ID from the form data

    $sql1 = "SELECT User_ID FROM temp";
    $U_ID = $con->query($sql1);
    if($U_ID->num_rows > 0){
      $row = $U_ID->fetch_assoc();
      $ID = $row['User_ID'];
    }
    $User_ID = $ID;

    $sql2 = "DELETE FROM form_data WHERE form_data.User_ID IN (SELECT temp.User_ID FROM temp)";
    $con->query($sql2);

    // Get the file name and contents
    $file_name = $_FILES['file']['name'];
    $file_contents = file_get_contents($_FILES['file']['tmp_name']);

    // Add the file to the database
    $sql = "INSERT INTO form_data (User_ID, file_name, submitted_on) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $submitted_on = date('Y-m-d H:i:s');
    $stmt->bind_param("sss", $User_ID, $file_name, $submitted_on);

    $stmt->execute();


    // Check if the query was successful
    if($stmt->affected_rows > 0){
        // Get the ID of the newly added record
        $new_id = $stmt->insert_id;

        // Save the file to disk
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $new_id . '_' . $file_name);

        echo 'Uploaded';
    }else{
        echo 'Error';
    }

}else{
    echo 'Error';
}



  
?>





