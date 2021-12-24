var date= document.getElementById("date");
var type = document.getElementById("type");
var money = document.getElementById('money');



function validate(){

  if(date.value.trim() == "" || type.value.trim() == "" || money.value.trim() == ""){
    alert("No blank spaces are allowed");
    return false;
  }



}
