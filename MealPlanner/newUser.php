<!--
CST8285, Section 301 - Web Programming
Author - Thomas Graham
Assignment 2
Professor: Hala Own
-->
<?php
  include('createUser.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TITLE</title>
    <link rel="stylesheet" href="assignment2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Sans+Libre:wght@300;400;700&family=Raleway:wght@100;300;400;600;700&family=Sansita:wght@400;700;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="content">
    <a class="backtolist"  href="newUser.php"> Back to New User Entry</a><br>
    <a class="backtolist"  href="addFood.php"> Add Food Items</a><br>
    <a class="backtolist" href="<?php echo 'indexUser.php'; ?>">View List of Users</a>
    <a class="backtolist" href="<?php echo 'GetMealPlan.php'; ?>">View Meal Plans</a>

        <div class="new user">
            <h1>Create New User</h1>

            <form action='createUser.php' method="post">
              <div class="textfield">
              <label for=“username”>USERNAME:<br></label>
              <input type=“text” name=“username” id=“username” required>
              <?php echo $error_username;?>
              </div>

              <div class="textfield">
              <label for=age>AGE:<br></label>
              <input type=“text” name=“age” id=“age” required>
              <?php echo $error_age;?>
              </div>

              <div class="textfield">
              <label for=“height”>HEIGHT:<br></label>
              <input type=“text” name=“height” id=“height” required>
              <?php echo $error_height;?>
              </div>

              <div class="textfield">
              <label for=“weight”>WEIGHT:<br></label>
              <input type=“text” name=“weight” id=“weight” required>
              <?php echo $error_weight;?>
              </div>

              <div class="textfield">
                <label for="weightGoal">Choose an option:</label>
                <select id="weightGoal" name="weightGoal">
                  <option value="Decrease Weight">Decrease</option>
                  <option value="Maintain Weight">Maintain</option>
                  <option value="Increase Weight">Increase</option>
                </select>
              </div>

              <input type="submit" name="Submit" value="Submit" />
            </form>
        </div>
    </div>
</body>
