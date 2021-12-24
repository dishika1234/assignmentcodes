<?php
  require_once "common4.php"; //vertical navigation bar
  require_once "../includes/database.php"; //connection to database
  $date1 = $_POST['date1'];  //from page expensevsincome.php
?>
    <div class="page-content-wrapper">
      <div class="page-content">
      <h1 class="p-5">Monthwise Expense vs Income Report</h1>
      <h3 class="px-5 text-primary">From <?php echo $date1 ?> To <?php
        $query = "SELECT DATE_ADD('$date1', INTERVAL 1 MONTH)";
        $data = mysqli_query($conn, $query);
        $resultD = mysqli_fetch_assoc($data);
        echo $resultD["DATE_ADD('$date1', INTERVAL 1 MONTH)"]; //echo date after one month of date given by user
    ?><h3>

      <h3 class= "p-5">Income</h3>
      <?php //table below show income ?>
      <div class="table-responsive mt-5">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Category</th>
              <th scope="col">Rs</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $id = $_SESSION['sessionId'];  // user id
            $query = "SELECT type,SUM(money) FROM income WHERE incomeDate BETWEEN '$date1' AND DATE_ADD('$date1', INTERVAL 1 MONTH) AND userId = $id GROUP BY type;";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data); // total number of rows of result fetched from database

            while($resultI = mysqli_fetch_assoc($data)){  // result is stored in form of an array
              echo "
                <tr>
                <td>".$resultI["type"]."</td>
                <td>".$resultI["SUM(money)"]."</td>
                </tr>
              ";

            }

            ?>
            <tr>
              <td><b>Total</b></td>
               <?php
                $query = "SELECT SUM(money) From income WHERE incomeDATE BETWEEN '$date1' AND DATE_ADD('$date1', INTERVAL 1 MONTH) AND userId = $id ;"; //sql query
                $data = mysqli_query($conn, $query); //sql query is performed on database
                $resultI = mysqli_fetch_assoc($data); // result of sql quey is stored in an array
                echo "
                <td><b>".$resultI["SUM(money)"]."</b></td>
              "; //total of income
              ?>
            </tr>
        </tbody>

      </table>
    </div>
      <h3 class= "p-5">Expense</h3>
       <?php //table below show expense ?>
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
                $query = "SELECT item,SUM(cost) FROM expense WHERE expenseDate BETWEEN '$date1' AND DATE_ADD('$date1', INTERVAL 1 MONTH) AND userId = $id  GROUP BY item;";  //sql query
                $data = mysqli_query($conn, $query); // sql query is performed on database
                $total = mysqli_num_rows($data); // total number of rows of result assigned to variable $total
               while($resultE = mysqli_fetch_assoc($data)){ // result is stored in the form of an array
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
                  //total of expenses
                  $query = "SELECT SUM(cost) From expense WHERE expenseDATE BETWEEN '$date1' AND DATE_ADD('$date1', INTERVAL 1 MONTH) AND userId = $id ;";
                  $data = mysqli_query($conn, $query);
                  $resultE = mysqli_fetch_assoc($data);
                  echo "
                  <td><b>".$resultE["SUM(cost)"]."</b></td>
              ";
              ?>

              </tr>
            </tbody>
          </table>
        </div>
      <h3 class= "p-5">Income - Expense</h3>
       <?php //table below to show balance where total expense is subtracted from total income ?>
        <div class="table-responsive mt-5">
          <table class="table table-hover">
            <thead>
              <?php
                $income = $resultI["SUM(money)"];
                $expense = $resultE["SUM(cost)"];
                $balance = $income - $expense;
                echo
                "
                 <tr>
                   <td><b>Balance</b></td>
                   <td><b>$balance</b></td>
                 </tr>
                ";
              ?>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
