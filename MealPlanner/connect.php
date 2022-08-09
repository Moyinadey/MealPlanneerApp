<!--
CST8285, Section 301 - Web Programming
Author - Thomas Graham
Assignment 2
Professor: Hala Own
Connection to foodDatabase
-->

<?php

// gets database credentials
require_once('credentials.php');

// connect to food database
function connect() {
    $connection = mysqli_connect(SERVER, USER, PASS, NAME);
    confirm_connection();
    return $connection;
}

// display error if cannot connect
function confirm_connection() {
    if(mysqli_connect_errno()){
        $msg = "Connection to Food Database failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_error() . ")";
        exit ($msg);
    }
}

// disconnect from database
function disconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

// display error if a query fails
function confirm_result_set($result_set){
    if (!$result_set) {
        exit("Food Database query failed");
    }
}

?>