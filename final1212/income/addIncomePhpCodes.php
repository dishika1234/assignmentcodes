<?php

  session_start();
  if(isset($_POST["submit"])){
    require_once "../includes/database.php";  //connect to database
    $date = $_POST["date"]; // to fetch value from date field in form
    $type = $_POST["type"]; // to fetch value from type field in form
    $money = $_POST["money"]; // to fetch value from money field in form
    $stmt = mysqli_stmt_init($conn); // return an object mysqli_stmt_prepare();
    $sql = "INSERT INTO income(incomeDate,type,money, userId) VALUES (?, ?, ?, ?);"; // sql query to insert data in income field
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: addIncome.php?error=sqlerror"); // in case there is an error in statement
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "ssdi",  $date, $type, $money, $_SESSION['sessionId']); //to insert values from user into sql
      mysqli_stmt_execute($stmt);  //execution of prepared statement
      mysqli_stmt_store_result($stmt); // store result of prepared statement
      header("Location: showIncome.php?sucess=incomeadded");//  user directed to showIncome.php

}
}
