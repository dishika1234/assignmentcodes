<?php

include ("../includes/database.php");


$id = $_GET['id'];
$query = "DELETE FROM expense WHERE id = '$id'";
$data = mysqli_query($conn, $query);
if($data){
  header("Location: showexpense.php");
}else{
  echo "Failed to delete record from databse";
}

 ?>
