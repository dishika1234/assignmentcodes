<?php

  session_start();



  if(isset($_POST["submit"])){
    require_once "../includes/database.php"; // connect to database
    $date = $_POST["date"];  //to get value from date field in form
    $item = $_POST["item"];  //to get value from item field in form
    $cost = $_POST["cost"];  //to get value from cost field in form
    $stmt = mysqli_stmt_init($conn); // return an object mysqli_stmt_prepare();
    $sql = "INSERT INTO expense(expenseDate,item, cost, userId) VALUES (?, ?, ?, ?)";  //sql query
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: addExpense.php?error=sqlerror");  //in case there is an error in sql query
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "ssdi",  $date, $item, $cost, $_SESSION['sessionId']);  //to insert values diven by user insql query
      mysqli_stmt_execute($stmt);  //execution of statement
      mysqli_stmt_store_result($stmt); // result of statement is stored
      header("Location: showexpense.php?sucess=expenseadded");  //user is directed to showexpense.php
    }
}
