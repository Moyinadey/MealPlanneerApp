// by Moyin Adeyemo
function calculateCalories(){
  let weightGoal=document.getElementById('weightGoal').value;
  let caloriesField=document.getElementById('calories');
  let age=document.getElementById('age').value;
  let weight=document.getElementById('weight').value;
  let height=document.getElementById('height').value;
  let caloriesNeeded=(10*weight+6.25*height-5*age+5);
  console.log(caloriesNeeded);
  if(weightGoal="Maintain"){
      caloriesField.value=caloriesNeeded;
      console.log(caloriesField.value);
  }
  if(weightGoal="Decrease"){
      caloriesField.value=caloriesNeeded*0.9;
      console.log(caloriesField.value);
  }
  if(weightGoal="Increase"){
      caloriesField.value=caloriesNeeded*1.1;
      console.log(caloriesField.value);
  }
  
}