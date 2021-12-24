<?php

include ("../includes/database.php");


$id = $_GET['id'];
$query = "DELETE FROM income WHERE id = '$id'";
$data = mysqli_query($conn, $query);
if($data){
  header("Location: showIncome.php");
}else{
  echo "Failed to delete record from databse";
}

 ?>
