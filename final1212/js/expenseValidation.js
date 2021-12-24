var date= document.getElementById("date");
var item = document.getElementById("item");
var cost = document.getElementById('cost');
var info = document.getElementById('info');


function validate(){

  if(date.value.trim() == "" || item.value.trim() == "" || cost.value.trim() == "" || info.value.trim == ""){
    alert("No blank spaces are allowed");
    return false;
  }



}
