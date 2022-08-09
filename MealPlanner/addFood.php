<!--
CST8285, Section 301 - Web Programming
Author - Thomas Graham
Style - Tasmiara Islam
Assignment 2
Professor: Hala Own
Adds a new food item to the food table
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

<?php
// connect to food database
require_once('credentials.php');
require_once('connect.php');
$db = connect();

$sql = "SELECT username FROM users";
$result_set = mysqli_query($db, $sql);
?>

<body>
<section class="header2">
  <nav>
    <div class="nav-links">
      <ul>
        <li><a class="backtolist"  href="newUser.php">Back to New User Entry</a></li>
        <li><a class="backtolist"  href="addFood.php">Add Food Items</a></li>
        <li><a class="backtolist" href="<?php echo 'indexUser.php'; ?>">View List of Users</a></li>
        <li><a class="backtolist" href="<?php echo 'GetMealPlan.php'; ?>">View Meal Plans</a></li>
    </ul>
</div>
</nav>

    <div id="content">
        <div class="new food">
            <h1>Create New Food Item for User</h1>

            <form action='createFood.php' method="POST" id="foodform">
            <div class="textfield">
                    <dt>Username</dt>
                    <dd>
                        <select name="usernames" class= "optionbox" form="foodform">
                        <?php
                        while($results = mysqli_fetch_assoc($result_set))
                        {
                            $username = $results['username'];
                            echo "<option value='$username'>$username</option>";
                        }
                        ?>
                        </select>
                    </dd>
                    </div>
                    <div class="textfield">
                    <label for= "name" > Food Name:</label>
                    <input type="text" name="name" />
                    </div>
                    <div class="textfield">
                    <label for="calories">Calories</label>
                    <input type="text" label name="calories" />
                    </div>

                <input type="submit" class= "submitbtn" value="Create Food Item" />
            </form>
        </div>
    </div>
</body>



</html>