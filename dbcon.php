<?php

$con = mysqli_connect("localhost","root","","job_portal");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}


function searchDatabase($searchTerm) {
    global $con;
    $sql = "SELECT * FROM jobs WHERE (Location LIKE '%$searchTerm%' OR Job_Title LIKE '%$searchTerm%' OR Job_Description LIKE '%$searchTerm%' OR Company_Name LIKE '%$searchTerm%' OR Qualification LIKE '%$searchTerm%')";
    $result = $con->query($sql);
    return $result;
  }

  function searchSalary($searchSal) {
    global $con;
    $sql = "SELECT * FROM jobs WHERE Salary LIKE '%$searchSal%'";
    $result = $con->query($sql);
    return $result;
  }

  function searchCity($searchCity) {
    global $con;
    $sql = "SELECT * FROM jobs WHERE Location LIKE '%$searchCity%'";
    $result = $con->query($sql);
    return $result;
  }


  function usearchDatabase($searchTerm) {
    global $con;
    $sql = "SELECT * FROM jobs WHERE (Location LIKE '%$searchTerm%' OR Job_Title LIKE '%$searchTerm%' OR Job_Description LIKE '%$searchTerm%' OR Company_Name LIKE '%$searchTerm%' OR Qualification LIKE '%$searchTerm%') AND jobs.Job_ID NOT IN (SELECT Job_ID FROM apply INNER JOIN temp ON temp.User_ID = apply.User_ID)";
    $result = $con->query($sql);
    return $result;
  }

  function usearchSalary($searchSal) {
    global $con;
    $sql = "SELECT * FROM jobs WHERE Salary LIKE '%$searchSal%' AND jobs.Job_ID NOT IN (SELECT Job_ID FROM apply)";
    $result = $con->query($sql);
    return $result;
  }

  function usearchCity($searchCity) {
    global $con;
    $sql = "SELECT * FROM jobs WHERE Location LIKE '%$searchCity%' AND jobs.Job_ID NOT IN (SELECT Job_ID FROM apply)";
    $result = $con->query($sql);
    return $result;
  }



  function stillLoggedin(){
    global $con;
    $sql = "SELECT * FROM temp";
    $result = $con->query($sql);
    return $result;
  }

  function storeData($Email, $Password) {
    global $con;
    $sql0 = "SELECT User_ID, City, Password FROM applicant WHERE Email = '$Email' AND Password = '$Password'";
    $res = $con->query($sql0);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $ID = $row['User_ID'];
        $CITY = $row['City'];
        $PW = $row['Password'];
        $sql = "INSERT INTO temp (User_ID, City, Password) VALUES ('$ID', '$CITY', '$PW')";
        $out = $con->query($sql);
    }
}


  function loggedOut(){
    global $con;
    $sql = "DELETE FROM temp";
    $result = $con->query($sql);
  }

  function applying(){
    global $con;
    $sql = "SELECT * FROM temp";
    $result = $con->query($sql);
    return $result;
  }

  function jobsInYourcity(){
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


 
 function notificationCounter(){
  global $con;
  $sql = "SELECT * FROM temp";
  $res = $con->query($sql);
  if($res->num_rows > 0){
    $sql1 = "SELECT COUNT(Status) AS Number FROM apply NATURAL JOIN temp WHERE apply.User_ID = temp.User_ID AND apply.Notify_user = '2'";
    $count = $con->query($sql1);
    if($count->num_rows > 0){
      $row = $count->fetch_assoc();
      $counter = $row['Number'];
      return $counter;
    }
    else{
      return 0;
    }
  }
 }

function notificationSeen(){
  global $con;
  $sql1 = "UPDATE apply SET apply.Notify_user = '1' WHERE apply.User_ID IN (SELECT temp.User_ID FROM temp WHERE temp.User_ID = apply.User_ID)";
  $count = $con->query($sql1);
}


function notifications(){
  global $con;
  $sql = "SELECT * FROM apply NATURAL JOIN temp WHERE apply.User_ID = temp.User_ID AND apply.Notify_user = '2'";
  $res = $con->query($sql);
  if($res->num_rows > 0){
      return $res;
  }
  else{
    return 0;
  }
 }


  //Changes here
function getFiles($user_id){
  global $con;
$sql = "SELECT * FROM files WHERE User_ID = '$user_id' ";
$result = $con->query($sql);
return $result;
}





?>