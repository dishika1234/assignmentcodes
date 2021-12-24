<?php
  //establish database connection
   require_once "database.php";

   //if form gets submitted
   if(isset($_POST["submit"])){
        $fullname = $_POST["fullname"]; // data user has input in field where name of field is fullname
        $email = $_POST["email"]; // data user has input in field where name of field is  email
        $password = $_POST["password"]; // data user has input in field where name of field is password
        $confirmPass = $_POST["confirmPass"]; // data user has input in field where name of field is confirmPass



        $sql = "SELECT email FROM users where  email = ?"; // To select column email from databse users
        $stmt = mysqli_stmt_init($conn); // return an object mysqli_stmt_prepare();
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../register.php?error=sqlerror");   //in case there is an error in prepared statement
          exit();
        }else{
          mysqli_stmt_bind_param($stmt, "s",  $email); // to include variable $email in sql query
          mysqli_stmt_execute($stmt); //prepared statement gets executed
          mysqli_stmt_store_result($stmt); //result gets stored
          $rowCount = mysqli_stmt_num_rows($stmt); //number of rows of result

          if($rowCount>0){
            header("Location: ../register.php?error=usernametaken"); //in case email already exists
            exit();
          }else{
            $sql = "INSERT INTO users(fullname,email, password) VALUES (?, ?, ?)"; //in case email does not already exist
            $stmt = mysqli_stmt_init($conn); //initializing prepared statement
            if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: register.php?error=sqlerror"); // in case error with preapred statement
              exit();
            }else{
              //hashing passwords
              $password = password_hash($password, PASSWORD_DEFAULT); // to save user password more secure in database

              mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $password); // to save users' data in database
              mysqli_stmt_execute($stmt); // prepared statement gets executed


              header("Location: ../login.php?success=registered"); // in case data gets inserted successfully in database user is directed to login.php
              exit();

            }
          }























}
}



 ?>
