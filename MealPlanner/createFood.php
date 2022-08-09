<!--
CST8285, Section 301 - Web Programming
Author - Thomas Graham
Assignment 2
Professor: Hala Own
Creation script for a new food item
-->

<?php

// connect to database
require_once('credentials.php');
require_once('connect.php');

$db = connect();

// get food parameters
$username = $_POST['username'];
$name = $_POST['name'];
$calories = $_POST['calories'];

// insert new food value
$sql = "INSERT INTO food (name, calories, foodUserID) VALUES ('$name','$calories',1)";
$result = mysqli_query($db, $sql);

$id = mysqli_insert_id($db);
    header("Location: showFood.php?id= $id");
?>
