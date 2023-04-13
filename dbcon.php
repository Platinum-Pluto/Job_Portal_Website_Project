<?php

$con = mysqli_connect("localhost","root","","job_portal");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}



$cityy = -5;

function searchDatabase($searchTerm) {
    global $con;
    $sql = "SELECT * FROM jobs WHERE Location LIKE '%$searchTerm%' OR Job_Title LIKE '%$searchTerm%' OR Job_Description LIKE '%$searchTerm%' OR Company_Name LIKE '%$searchTerm%' OR Qualification LIKE '%$searchTerm%' ";
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


?>