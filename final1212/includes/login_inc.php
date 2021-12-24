<?php

if(isset($_POST["submit"])){
  require "database.php";  // to establish connection to the database
  $fullname = $_POST["fullname"]; // to fetch what user has inserted into field which has name "fullname"
  $password = $_POST["password"]; //to fetch what user has inserted into field which has name "password"

  $sql = "SELECT * FROM users WHERE fullname = ?"; //sql query for prepared statment
  $stmt = mysqli_stmt_init($conn); // initialize prepared statement
  if(!mysqli_stmt_prepare($stmt, $sql)){ //execute sql query on table in database
    header("Location: login.php?error=sqlerror"); // in case if prepared statement does not work
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "s", $fullname); // variable $fullname is included in the sql query
    mysqli_stmt_execute($stmt); //statement gets executed
    $result = mysqli_stmt_get_result($stmt); // data is saved

    if($row = mysqli_fetch_assoc($result)){ //data is stored in form of array

      $passCheck = password_verify($password, $row['password']); //to verify if password match with database
      if($passCheck == false){
        header("Location: ../login.php?error=Wrongpassword"); //if password is wrong
        exit();
      }else{
        session_start();
        $_SESSION['sessionId'] = $row['id'];  // To fetch column id from table users in database
        $_SESSION['sessionUser'] = $row['fullname']; // To fetch column fullname from table users in database
        $_SESSION['sessionEmail'] = $row['email']; // To fetch column email from table users in database
        header("Location: ../dashboard.php?success=loggedin"); // redirect to page dashboard.php
        exit();

      }
    }else{
      header("Location: ../login.php?error=nouser"); //in case no data shown from database it means user has not registered yet
      exit();
    }
  }
}

























 ?>
