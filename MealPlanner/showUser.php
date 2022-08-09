<!--
CST8285, Section 301 - Web Programming
Author - Thomas Graham
Style - Tasmiara Islam
Assignment 2
Professor: Hala Own
Shows the new/selected user
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
require_once('credentials.php');
require_once('connect.php');
$db = connect();

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE userID= '$id' ";
$result_set = mysqli_query($db, $sql);
$result = mysqli_fetch_assoc($result_set);
?>

<section class="header">
  <nav>
    <div class="nav-links actions">
      <ul>
      <li><a class="backtolist"  href="newUser.php"> Back to New User Entry</a></li>
      <li><a class="backtolist"  href="addFood.php"> Add Food Items</a></li>
      <li><a class="backtolist" href="<?php echo 'indexUser.php'; ?>">View List of Users</a></li>
      <li><a class="backtolist" href="<?php echo 'GetMealPlan.php'; ?>">View Meal Plans</a></li>
    </ul>
</div>
</nav>

<div id="content">

    <div class="attribs">
        <div class="textfield">
            <label>Username</label>
            <dd><?php echo $result['username']; ?><dd>
        </div>
        <div class="textfield">
            <label>Height</label>
            <dd><?php echo $result['height']; ?><dd>

            </div>
            <div class="textfield">
            <label>Weight</label>
            <dd><?php echo $result['weight']; ?><dd>
            </div>
    </div>
</div>
</body>
</html>

