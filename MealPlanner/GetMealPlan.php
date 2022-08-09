<!--
CST8285, Section 301 - Web Programming
Author - Fionn McKercher
Style - Tasmiara Islam
Assignment 2
Professor: Hala Own
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

<body id="body">
<section class=" header2">
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
    <div class="formcontainer">
    <hr>
    <form name="getMealPlan" action="FoodInfo.html" method="get">

        <div class="textfield" id="caloriesField">
        <label for="caloriesField">User Name<br></label>
        <input type="text" name="user" id="user">
        </div>

        <div class="textfield" id="neededCalories">
        <label for="neededCalories">Calories Needed<br></label>
        <input type="text" name="neededCals" id="neededCals">
        </div>

<?php

$foodarray2 = array(
    array("id"=>"1", "name"=>"2 Cups of Broccoli", "calories"=>"62"),
    array("id"=>"2", "name"=>"1 Chicken Breast", "calories"=>"400"),
    array("id"=>"3", "name"=>"1 Cup of Rice", "calories"=>"206"),
    array("id"=>"4", "name"=>"1 McDonald's Double Cheeseburger", "calories"=>"620"),
    array("id"=>"5", "name"=>"1/2 Cup Raspberries", "calories"=>"85"),
    array("id"=>"6", "name"=>"A Whole Frozen Pizza", "calories"=>"928"),
    array("id"=>"7", "name"=>"4 Perogies", "calories"=>"310"),
    array("id"=>"8", "name"=>"1 Cabbage Roll", "calories"=>"472"),
    array("id"=>"9", "name"=>"1 Can of Campells Tomato Soup", "calories"=>"288"),
    array("id"=>"10", "name"=>"1 Drumstick Icecream Cone", "calories"=>"502"),
    array("id"=>"11", "name"=>"1 Oreo Icecream Sandwich", "calories"=>"408")
);
?>

        <button type="button" class="submitbtn" onclick="createMealPlan();">Get Meal Plan</button>
        <button type="button" class="submitbtn" onclick="clearMealPlan();">Clear Meal Plan</button>

        <script type="text/javascript" id="mealPlanScript">
            var foodJSON = <?php echo json_encode($foodarray2); ?>;
            function createMealPlan(){ 
                let cals = (document.getElementById('neededCals').value); //Calories required for user
                let minCals = cals - 300;
                let maxCals = cals + 300;
                let neededCals = 0;
                let foodArray = [];
                let mealPlan = [];

            //Convert JSON to a JS array
            for(var i = 0; i < foodJSON.length; i++){
                foodArray.push(Object.values(foodJSON[i])); 
            }

            /*While loop. While the total calories of the meal plan (neededCals) is less than the lower end of the range of
              the required calories for the user (minCals), a random food item is added to the meal plan. If the total
              calories of the meal plan exceeds the upper end of the range of the required calories for the user (maxCals),
              the function removes the most recent addition to the meal plan and continues executing. 
            */
            while(neededCals<minCals){
                let ranFood = Math.floor(Math.random()*(foodJSON.length)); //Random number is generated
                let ranFoodNum = parseInt(ranFood); //Converted to an int because it was causing issues
                let ranArray = foodArray[ranFoodNum]; //Assigns the random number to one of the array objects
                let neededCalsInt = parseInt(neededCals); //Converted to an int because it was causing issues
                let maxCalsInt = parseInt(maxCals); //Converted to an int because it was causing issues
                let ranCals = ranArray[2]; //Gets the value of the calories for the randomly selected food item
                let ranFoodItem = ranArray[1]; //Gets the value for the name of the randomly selected food item

                /*Calories of random food item get converted to an int and added to the needed calories, then the values for the random food item
                name and number of calories are pushed into the meal plan (a blank array called mealPlan)
                */
                neededCals = neededCalsInt + (parseInt(ranCals));
                mealPlan.push([ranFoodItem, ranCals]);

                //If needed calories exceed maximum range of calories, most recent addition is removed
                if (neededCalsInt > maxCalsInt) {
                    neededCals = (neededCalsInt - (parseInt(ranCals)));
                }
            }
            //Code for this part was from a stack overflow page: https://stackoverflow.com/questions/11958641/print-out-javascript-array-in-table
            //creates a table and assigns it to the variable mealTable
            //console.log(typeof mealTable);
            if(typeof mealTable == "undefined"){
            let mealTable = document.createElement("table");
            mealTable.setAttribute("id", "mealTable");
            //for loop to create tale from the mealPlan array
            for (i = 0; i < mealPlan.length; i++){
                let row = mealTable.insertRow(-1);//creating rows for the table
                foodNameCell = row.insertCell(-1);//cells for the name of the food item
                foodNameCell.appendChild(document.createTextNode(mealPlan[i][0]));//adds the food cells to the page
                let caloriesCell = row.insertCell(-1);//cells for the calorie amount
                caloriesCell.appendChild(document.createTextNode(mealPlan[i][1]));//adds the calorie cells to the page
            }   
            document.body.appendChild(mealTable);//adds table to the page
            }
            console.log(mealPlan);
            };

            function clearMealPlan(){
                if(typeof mealTable != "undefined"){
                    let parent = document.getElementById('body');
                    let child = document.getElementById('mealTable');
                    parent.removeChild(child);
                }
            };
        </script>
    </form>
    </div>
</section>
</body>
</html>