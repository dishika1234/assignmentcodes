<?php
//create those variables step 1
$dbhost = "sql312.epizy.com";
$dbUser = "epiz_30600610";   //default username of xampp
$dbPass = "7As24j8Ffc";
$dbName = "epiz_30600610_assignment";

// create a database connection
// i stands for improved
$conn = mysqli_connect($dbhost,$dbUser, $dbPass, $dbName);  //parameters must be in the order shown

if(!$conn){
  die("Database connection failed!");
}




 ?>
