var fullname = document.getElementById("fullname");
var email = document.getElementById("email");
var password = document.getElementById('password');
var confirmPass = document.getElementById('confirmPass');

function validate(){

  if(fullname.value.trim() == "" || email.value.trim() == "" || password.value.trim() == "" || confirmPass.value.trim == ""){
    alert("No blank spaces are allowed");
    return false;
  }else if(password.value !== confirmPass.value){
      alert("Password do not match");
      return false;
    }else if(password.value.trim().length<5){
        alert("Password too short! Must be greater than 5 characters");
        return false;
      }



    else{
      return true;
  }

}
