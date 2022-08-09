<!--
CST8285, Section 301 - Web Programming
Author - Thomas Graham
Style - Tasmiara Islam
Assignment 2
Professor: Hala Own
Deletes a user from the table (only works on newly added users)
-->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planner</title>
    <link rel="stylesheet" href="./stylesheet/assignment2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Sans+Libre:wght@300;400;700&family=Raleway:wght@100;300;400;600;700&family=Sansita:wght@400;700;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<?php
// connect to database
require_once('credentials.php');
require_once('connect.php');

$db = connect();

$id = $_GET['id'];

// deletes user from the table based on userID
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "DELETE FROM users WHERE userID ='$id' ";
    $result = mysqli_query($db, $sql);

  header("Location: indexUser.php");
} 
else 
{
    $sql = "SELECT * FROM users WHERE userID='$id' ";
    $result_set = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($result_set);
}
?>
<section class="header">
  <nav>
    <div class="nav-links">
      <ul>
      <li><a class="backtolist" href="indexUser.php">Back to List of Users</a></li>
</ul>
</div>
</nav>

    <h1>Delete User</h1>
    <p>Are you sure you want to delete this User?</p>
    <p class="item"><?php echo $result['username']; ?></p>

    <form form action="<?php echo 'deleteUser.php?id=' . $result['userID']; ?>"  method="post">
        <input type="submit" class="submitbtn" name="commit" value="Delete User" />
    </form>
</div>
</section>

