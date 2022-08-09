<!--
CST8285, Section 301 - Web Programming
Author - Thomas Graham
Assignment 2
Professor: Hala Own
-->

<?php
require_once('credentials.php');
require_once('connect.php');

$db = connect();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $age      = $_POST["age"];
  $height   = $_POST["height"];
  $weight   = $_POST["weight"];

  if($username=="") {
    $error_username = "<span class='warning'>Please enter your username.</span>";
  }
  elseif(strlen($username)>20) {
    $error_username = "<span class='warning'>Username can not be longer than 20 characters.";
  }
  elseif($age=="") {
    $error_age   = "<span class='warning'>Please enter your age.</span>";
  }
  elseif(is_numeric(trim($age))) {
    $error_age   = "<span class='warning'>Please enter a number.</span>";
  }
  elseif(Integer.parseInt($age)<10 || Integer.parseInt($age)>100) {
    $error_age   = "<span class='warning'>Please enter a number between 10 and 100.</span>";
  }
  elseif($height=="") {
    $error_height   = "<span class='warning'>Please enter your height in cm.</span>";
  }
  elseif(is_numeric(trim($height))) {
    $error_height   = "<span class='warning'>Please enter a number.</span>";
  }
  elseif(Integer.parseInt($height)<90 || Integer.parseInt($height)>243) {
    $error_height   = "<span class='warning'>Please enter a number between 90 and 243.</span>";
  }
  elseif($weight=="") {
    $error_weight   = "<span class='warning'>Please enter your weight in pounds.</span>";
  }
  elseif(is_numeric(trim($weight))) {
    $error_weight   = "<span class='warning'>Please enter a number.</span>";
  }
  elseif(Integer.parseInt($weight)<50 || Integer.parseInt($weight)>600) {
    $error_weight   = "<span class='warning'>Please enter a number between 50 and 600.</span>";
  }
  else{
    $sql = "INSERT INTO users (username, height, weight) VALUES ('$username','$height','$weight')";
    $result = mysqli_query($db, $sql);
    $id = mysqli_insert_id($db);
    header("Location: showUser.php?id= $id");
  }
}
else {
  header("Location: newUser.php");
}
?>
