<!--
CST8285, Section 301 - Web Programming
Author - Thomas Graham
Style- Tasmiara Islam
Assignment 2
Professor: Hala Own
Edit an existing user
-->

<?php
// connect to database
require_once('credentials.php');
require_once('connect.php');
$db = connect();

$id = $_GET['id'];

// gets new user parameters, updates the user table with new values
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username']; 
  $height= $_POST['height'] ;
  $weight= $_POST['weight'] ;

  $sql="UPDATE users SET username = '$username' , height = '$height' , weight = '$weight' where userID = '$id' ";
  $result = mysqli_query($db, $sql);
    header("Location: showUser.php?id=  $id");
  }
  else {
$sql = "SELECT * FROM users WHERE userID= '$id' ";
$result_set = mysqli_query($db, $sql);
$result = mysqli_fetch_assoc($result_set);
  }

?>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TITLE</title>
    <link rel="stylesheet" href="stylesheet/assignment2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Sans+Libre:wght@300;400;700&family=Raleway:wght@100;300;400;600;700&family=Sansita:wght@400;700;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<section class="header">
  <nav>
    <div class="nav-links actions">
      <ul>
        <li><a class="backtolist" href="indexUser.php">Back to List of Users</a></li>
    </ul>
</div>
</nav>
  <div class="edit">
    <h1>Edit User</h1>
    <form form action="<?php echo 'editUser.php?id=' . $result['userID']; ?>"  method="post">
    <div class="textfield">
        <label for="username">Username</label>
        <dd><input type="text" name="username" value="<?php echo $result['username']; ?>" /></dd>
</div>
<div class="textfield">
        <label for="height">Height</label>
        <dd><input type="text" name="height" value="<?php echo $result['height']; ?>" /></dd>
        </dd>
      </div>
      <div class="textfield">
        <label for="weight">Weight</label>
        <dd><input type="text" name="weight" value="<?php echo $result['weight']; ?>" /></dd>
        </dd>
      </div>
        <input type="submit" class="submitbtn" value="Edit User" />
    </form>
</div>
</body>
