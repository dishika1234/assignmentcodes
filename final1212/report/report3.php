<?php
  require_once "common4.php"; //vertical navigation bar
  require_once "../includes/database.php"; //connection to database
  $date1 = $_POST['date1']; //date user input in field date1 in form
  $date2 = $_POST['date2']; //date user input in field date2 in form
?>
    <div class="page-content-wrapper">
      <div class="page-content">
        <div class= "container">
          <h3 class= "p-5">Expense Report Detail</h3>
          <h3 class="px-5 text-primary">From <?php echo $date1 ?> To <?php echo $date2 ?> <h3>
          <?php //table below show expense in detail according to date  ?>
          <div class="table-responsive mt-5">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Item</th>
                  <th scope="col">Rs</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $id = $_SESSION['sessionId'];
                  $query = "SELECT expenseDate, item, cost FROM expense WHERE expenseDate BETWEEN '$date1' AND '$date2' AND userId = $id"; //sql query
                  $data = mysqli_query($conn, $query); //sql query performed on database
                  $total = mysqli_num_rows($data); // number of rows of result fetched from database
                  while($resultE = mysqli_fetch_assoc($data)){ // result is stored in form of an array
                    echo "
                      <tr>
                        <td>".$resultE["expenseDate"]."</td>
                        <td>".$resultE["item"]."</td>
                        <td>".$resultE["cost"]."</td>
                      </tr>
                    ";
                    }
              ?>
                <tr>
                  <td></td>
                  <td><b>Total</b></td>
                  <?php
                    //total of expenses
                    $query = "SELECT SUM(cost) From expense WHERE expenseDATE BETWEEN '$date1' AND '$date2' AND userId = $id ;";  //sql query
                    $data = mysqli_query($conn, $query); //sql query performed on database
                    $resultE = mysqli_fetch_assoc($data); //result from database stored in form of an array
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
