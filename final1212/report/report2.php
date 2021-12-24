<?php
  require_once "common4.php"; // vertical navigation bar
  require_once "../includes/database.php"; // to coonect to the database
  $date1 = $_POST['date1']; // to get date user has input from field name = date1
  $date2 = $_POST['date2']; // to get date user has input from field name = date2
?>

    <div class="page-content-wrapper">
      <div class="page-content">
        <div class= "container">
          <h3 class= "p-5">Expense Report Summary</h3>
          <h3 class="px-5 text-primary">From <?php echo $date1 ?> To <?php echo $date2 ?> <h3>
          <?php //table below show summary of expense according to date given from user ?>
          <div class="table-responsive mt-5">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Item</th>
                  <th scope="col">Rs</th>
                </tr>
              </thead>
              <tbody>
             <?php
               $id = $_SESSION['sessionId'];
               $query = "SELECT item,SUM(cost) FROM expense WHERE expenseDate BETWEEN '$date1' AND '$date2' AND userId = $id GROUP BY item "; //sql query
               $data = mysqli_query($conn, $query); //sql query performed on database
               $total = mysqli_num_rows($data); // number of rows of result fetched from database
               while($resultE = mysqli_fetch_assoc($data)){ // result is stored in form of array
                 echo "
                   <tr>
                     <td>".$resultE["item"]."</td>
                     <td>".$resultE["SUM(cost)"]."</td>
                   </tr>

                ";

               }

              ?>
              <tr>
                 <td><b>Total</b></td>
                 <?php
                  //query below to get total of expense for the given dates
                  $query = "SELECT SUM(cost) From expense WHERE expenseDATE BETWEEN '$date1' AND '$date2' AND userId = $id ;"; //sql query
                  $data = mysqli_query($conn, $query); //query performed on database
                  $resultE = mysqli_fetch_assoc($data); // result from databse is stored in form of an array
                  echo "
                    <td><b>".$resultE["SUM(cost)"]."</b></td>
                  ";
                 ?>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
