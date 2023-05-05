<?php

$con = mysqli_connect("localhost", "root", "", "job_portal");

if (!$con) {
  die('Connection Failed' . mysqli_connect_error());
}


function searchDatabase($searchTerm)
{
  global $con;
  $sql = "SELECT * FROM jobs WHERE (Location LIKE '%$searchTerm%' OR Job_Title LIKE '%$searchTerm%' OR Job_Description LIKE '%$searchTerm%' OR Company_Name LIKE '%$searchTerm%' OR Qualification LIKE '%$searchTerm%')";
  $result = $con->query($sql);
  return $result;
}

function searchSalary($searchSal)
{
  global $con;
  $sql = "SELECT * FROM jobs WHERE Salary LIKE '%$searchSal%'";
  $result = $con->query($sql);
  return $result;
}

function searchCity($searchCity)
{
  global $con;
  $sql = "SELECT * FROM jobs WHERE Location LIKE '%$searchCity%'";
  $result = $con->query($sql);
  return $result;
}


function usearchDatabase($searchTerm)
{
  global $con;
  $sql = "SELECT * FROM jobs WHERE (Location LIKE '%$searchTerm%' OR Job_Title LIKE '%$searchTerm%' OR Job_Description LIKE '%$searchTerm%' OR Company_Name LIKE '%$searchTerm%' OR Qualification LIKE '%$searchTerm%') AND jobs.Job_ID NOT IN (SELECT Job_ID FROM apply INNER JOIN temp ON temp.User_ID = apply.User_ID)";
  $result = $con->query($sql);
  return $result;
}

function usearchSalary($searchSal)
{
  global $con;
  $sql = "SELECT * FROM jobs WHERE Salary LIKE '%$searchSal%' AND jobs.Job_ID NOT IN (SELECT Job_ID FROM apply)";
  $result = $con->query($sql);
  return $result;
}

function usearchCity($searchCity)
{
  global $con;
  $sql = "SELECT * FROM jobs WHERE Location LIKE '%$searchCity%' AND jobs.Job_ID NOT IN (SELECT Job_ID FROM apply)";
  $result = $con->query($sql);
  return $result;
}



function stillLoggedin()
{
  global $con;
  $sql = "SELECT * FROM temp";
  $result = $con->query($sql);
  return $result;
}

function storeData($Email, $Password, $val, $notifSet)
{
  global $con;
  $sql0 = "SELECT User_ID, City, Password FROM applicant WHERE Email = '$Email' AND Password = '$Password'";
  $res = $con->query($sql0);
  if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $ID = $row['User_ID'];
    $CITY = $row['City'];
    $PW = $row['Password'];
    $sql = "INSERT INTO temp (User_ID, City, Password, switchmode, notifSet) VALUES ('$ID', '$CITY', '$PW', '$val', '$notifSet')";
    $out = $con->query($sql);
  }
}


function loggedOut()
{
  global $con;
  $sql = "DELETE FROM temp";
  $result = $con->query($sql);
}

function applying()
{
  global $con;
  $sql = "SELECT * FROM temp";
  $result = $con->query($sql);
  return $result;
}

function jobsInYourcity()
{
  global $con;
  $sql0 = "SELECT City FROM temp";
  $res = $con->query($sql0);
  if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $CITY = $row['City'];
    $val = usearchCity($CITY);
    return $val;
  }
}



function notificationCounter()
{
  global $con;
  $sql = "SELECT * FROM temp";
  $res = $con->query($sql);
  if (ugetNotifSet() == 0) {
    if ($res->num_rows > 0) {
      $sql1 = "SELECT COUNT(Status) AS Number FROM apply NATURAL JOIN temp WHERE apply.User_ID = temp.User_ID AND apply.Notify_user = '2'";
      $count = $con->query($sql1);
      if ($count->num_rows > 0) {
        $row = $count->fetch_assoc();
        $counter = $row['Number'];
        return $counter;
      } else {
        return 0;
      }
    }
  } else {
    if ($res->num_rows > 0) {
      $sql1 = "SELECT COUNT(Status) AS Number FROM apply NATURAL JOIN temp WHERE apply.User_ID = temp.User_ID AND apply.Notify_user = '2' AND apply.Status = '2'";
      $count = $con->query($sql1);
      if ($count->num_rows > 0) {
        $row = $count->fetch_assoc();
        $counter = $row['Number'];
        return $counter;
      } else {
        return 0;
      }
    }
  }



}

function notificationSeen()
{
  global $con;
  $sql1 = "UPDATE apply SET apply.Notify_user = '1' WHERE apply.Notify_user != '0' AND apply.User_ID IN (SELECT temp.User_ID FROM temp WHERE temp.User_ID = apply.User_ID)";
  $count = $con->query($sql1);
}


function notifications()
{
  global $con;
  if (ugetNotifSet() == 0) {
    $sql = "SELECT * FROM apply JOIN temp ON apply.User_ID = temp.User_ID JOIN jobs ON apply.Job_ID = jobs.Job_ID WHERE apply.Notify_user = '1' OR apply.Notify_user = '2' ORDER BY Admin_ID DESC";
    $res = $con->query($sql);
    return $res;
  } else {
    $sql = "SELECT * FROM apply JOIN temp ON apply.User_ID = temp.User_ID JOIN jobs ON apply.Job_ID = jobs.Job_ID WHERE apply.Status = '2' AND (apply.Notify_user = '1' OR apply.Notify_user = '2') ORDER BY Admin_ID DESC";
    $res = $con->query($sql);
    return $res;
  }

}





function adminNotificationCounter()
{
  global $con;
  $sql1 = "SELECT COUNT(Notify_admin) AS Number FROM apply WHERE apply.Notify_admin = '1'";
  $count = $con->query($sql1);
  if ($count->num_rows > 0) {
    $row = $count->fetch_assoc();
    $counter = $row['Number'];
    return $counter;
  } else {
    return 0;
  }
}



function adminNotificationSeen()
{
  global $con;
  $sql1 = "UPDATE apply SET apply.Notify_admin = '2' WHERE apply.Notify_admin != '0'";
  $count = $con->query($sql1);
}




function adminNotifications()
{
  global $con;
  $sql = "SELECT * FROM  apply JOIN applicant ON apply.User_ID = applicant.User_ID JOIN jobs ON apply.Job_ID = jobs.Job_ID WHERE apply.Notify_admin = '1' OR apply.Notify_admin = '2' ORDER BY Admin_ID DESC";
  $res = $con->query($sql);
  return $res;
}






function getFiles($user_id)
{
  global $con;
  $sql = "SELECT * FROM files WHERE User_ID = '$user_id' ";
  $result = $con->query($sql);
  return $result;
}



//New Code From Here For Navbar Light/Dark Mode And uIndex.php Page Code

function getMode()
{
  global $con;
  $sql = "SELECT switchmode FROM temp";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $switchmode = $row['switchmode'];
  if ($switchmode == "1") {
    echo ' href="./css/dark.css"';
  } else {
    echo ' href="./css/style.css"';
  }
}


function ugetModeNorm()
{
  global $con;
  $sql = "SELECT switchmode FROM temp";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $switchmode = $row['switchmode'];
  if ($switchmode == "1") {
    echo '<link rel="stylesheet" href="./css/darkprofile.css"/>';
    echo '<link rel="stylesheet" href="./css/test.css"/>';
  } else {
    echo '<link rel="stylesheet" href="./css/style.css"/>';
    echo '<link rel="stylesheet" href="./css/lightprofile.css"/>';
  }
}


function getModeNorm()
{
  global $con;
  $sql = "SELECT theme FROM settings";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $switchmode = $row['theme'];
  if ($switchmode == "1") {
    echo '<link rel="stylesheet" href="./css/test.css "/>';
  } else {
    echo '<link rel="stylesheet" href="./css/style.css"/>';
  }
}




function ugetNavMode()
{
  global $con;
  $sql = "SELECT switchmode FROM temp";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $switchmode = $row['switchmode'];
  if ($switchmode == "1") {
    echo ' class = "navbar navbar-expand-lg navbar-dark bg-dark"';
  } else {
    echo ' class = "navbar navbar-expand-lg bg-body-tertiary"';
  }
}

function getNavMode()
{
  global $con;
  $sql = "SELECT theme FROM settings";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $switchmode = $row['theme'];
  if ($switchmode == "1") {
    echo ' class = "navbar navbar-expand-lg navbar-dark bg-dark"';
  } else {
    echo ' class = "navbar navbar-expand-lg bg-body-tertiary"';
  }
}



function getLatest()
{
  global $con;

  $sql = "SELECT * FROM jobs WHERE jobs.Job_ID NOT IN 
  (SELECT Job_ID FROM apply INNER JOIN temp ON temp.User_ID = apply.User_ID)
  ORDER BY Job_ID DESC;";

  $result = $con->query($sql);
  return $result;
}

function getLatestNews()
{
  global $con;
  $sql = "SELECT * FROM jobs ORDER BY Job_ID DESC LIMIT 3";
  $result = $con->query($sql);
  $rows = array();
  $companies = array(); // keep track of companies that have already been added
  while ($row = $result->fetch_assoc()) {
    $company_name = $row['Company_Name'];
    if (!isset($companies[$company_name])) { // check if company has already been added
      $rows[] = $row; // add row to result array
      $companies[$company_name] = true; // mark company as added
    }
  }
  return $rows;
}




function getTheme()
{
  global $con;
  $sql = "SELECT theme FROM settings";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $switchmode = $row['theme'];
  if ($switchmode == "1") {
    echo ' class="bi bi-moon"';
  } else {
    echo ' class="bi bi-brightness-high"';
  }
}

function ugetTheme()
{
  global $con;
  $sql = "SELECT switchmode	 FROM temp";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $switch = $row['switchmode'];
  if ($switch == "1") {
    echo ' class="bi bi-moon"';
  } else {
    echo ' class="bi bi-brightness-high"';
  }
}


function ugetUserInfo()
{
  global $con;

  $sql = "SELECT applicant.User_ID, applicant.User_Name, applicant.Password, 
  applicant.Email, applicant.City, applicant.NID, applicant.switchmode 
  FROM applicant INNER JOIN temp ON applicant.User_ID=temp.User_ID; ";

  $result = $con->query($sql);
  $row = $result->fetch_array();
  return $row;
}

function uAppliedJobs()
{

  global $con;

  $sql = "SELECT jobs.Job_Title, jobs.Company_Name FROM jobs INNER JOIN apply ON apply.Job_ID = jobs.Job_ID 
  AND apply.User_ID IN (SELECT User_ID FROM temp)";

  $result = $con->query($sql);
  $rows = array();
  while ($row = $result->fetch_array()) {
    $rows[] = $row;
  }
  return $rows;
}


function ugetNotifSet()
{
  global $con;
  $sql = "SELECT notifSet	 FROM temp";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $notifysettings = $row['notifSet'];
  return $notifysettings;
}

function uChangeNotif($change)
{
  global $con;
  $sql = "UPDATE temp SET notifSet = '$change'";
  $con->query($sql);

  $sql0 = "SELECT User_ID FROM temp";
  $result0 = $con->query($sql0);
  $row = $result0->fetch_assoc();
  $uid = $row['User_ID'];

  $sql1 = "UPDATE applicant SET notifSet = '$change' WHERE User_ID = '$uid'";
  $con->query($sql1);
}


function downloadFile()
{
  global $con;
  $sql = "SELECT * FROM files NATURAL JOIN temp";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
   return "<a href=\"" . htmlspecialchars($row['file_path']) . "\" download><span><h5 class=\"match\">Download Resume</h5></span></a>";
  } else {
    return "No files found";
  }
}


?>