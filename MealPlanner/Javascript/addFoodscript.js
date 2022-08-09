// by Moyin Adeyemo
let inputDivs = document.querySelectorAll(".textfield");

let foodInput=document.querySelector("#foodName");
let caloriesInput=document.querySelector("#calories");
let mealTypeInput=document.querySelector("#mealType");

let foodError=document.createElement('p');
foodError.setAttribute("class","warning");
inputDivs[0].append(foodError);

let caloriesError=document.createElement('p');
caloriesError.setAttribute("class","warning");
inputDivs[1].append(caloriesError);

let mealTypeError=document.createElement('p');
mealTypeError.setAttribute("class","warning");
inputDivs[2].append(mealTypeError);

let defaultMessage = "";
let foodErrorMessage = "Food must be between 3 and 20 characters";
let caloriesErrorMessage = "Number of calories must be between 0 and 1200";
let mealTypeErrorMessage = "You must select a meal type";


function validateFood(){
    let food = foodInput.value; 

    if(food == null || food == ""){
        error = foodErrorMessage;
    }
    else{
        if(food.length < 3){
            error = foodErrorMessage;
        }
        else{
            if(food.length > 20){
                error = foodErrorMessage
            }
            else{
            error = defaultMessage;
            }
    }
}
return error;
};

function validateCalories(){
    let calories = caloriesInput.value;
    let caloriesNum = parseInt(caloriesInput.value);

    if(calories == null || calories == "") {
        error = caloriesErrorMessage;
        }
        else {
            if(caloriesNum > 1200) {
                error = caloriesErrorMessage;
            }
            else {
            if(caloriesNum < 10) {
                error = caloriesErrorMessage
            }
            else {
                if(isNaN(calories)){
                    error = caloriesErrorMessage
                }
                else {
                error = defaultMessage;
                }
            }
        }
    }
        return error;
};

function validateMealType() {
    let mealType = mealTypeInput.value;

    if(mealType == ""){
        error = mealTypeErrorMessage
    }
    else{
        error = defaultMessage;
    }
    console.log(error);
    return error;
};

function validate(){
    let valid = true;
    let foodValidation=validateFood();
    let caloriesValidation=validateCalories();
    let mealtypeValidation=validateMealType();
    
        if(foodValidation !== defaultMessage){
            foodError.textContent = foodValidation;
            valid = false;
        }
        if(caloriesValidation !== defaultMessage){
            caloriesError.textContent = caloriesValidation;
            valid = false;
        }
        
        if(!valid) {
            event.preventDefault();//Prevents form from submitting if any of the fields are not valid.
        }
        return valid;
    };

    function resetForm() { //Sets all error elements to defaultMsg(blank)
        foodError.textContent = defaultMessage;
        caloriesError.textContent = defaultMessage;
        //mealTypeError.textContent = defaultMessage;
    }

    document.AddFood.addEventListener("submit", validate);
    document.AddFood.addEventListener("reset", resetForm);