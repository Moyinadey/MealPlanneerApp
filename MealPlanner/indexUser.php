<!--
CST8285, Section 301 - Web Programming
Author - Thomas Graham
Style - Tasmiara Islam
Assignment 2
Professor: Hala Own
Provides a display of the users table
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
?>

<?php
// selects all from users table
    $sql = "SELECT * FROM users ";
    $sql .= "ORDER by userID ASC";
    $result_set = mysqli_query($db,$sql);
?>

<section class="header">
  <nav>
    <div class="nav-links actions">
      <ul>
        <li><a class="backtolist"  href="newUser.php">Back to New User Entry</a></li>
        <li><a class="backtolist" href="<?php echo 'GetMealPlan.php'; ?>">View Meal Plans</a></li>
    </ul>
</div>
</nav>

<div id="content">
    

    <h1>Users</h1>
    <table class="list">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>height</th>
            <th>weight</th>
        </tr>
        <!-- displays users as a table with options on each row -->
        <?php while($results = mysqli_fetch_assoc($result_set)) { ?>
            <tr>
                <td><?php echo $results['userID']; ?></td>
                <td><?php echo $results['username']; ?></td>
                <td><?php echo $results['height']; ?></td>
                <td><?php echo $results['weight']; ?></td>
                <td><a class="action" href="<?php echo "editUser.php?id=" . $results['userID']; ?>">Edit</a></td>
                <td><a class="action" href="<?php echo "showUser.php?id=" . $results['userID']; ?>">View</a></td>
                <td><a class="action" href="<?php echo "deleteUser.php?id=" . $results['userID']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>


