<?php
//in order to display the vertical navigation bar
require_once "includes/common.php";
// to establish database connection
require_once "includes/database.php";
 ?>

      <div class="page-content-wrapper">
        <div class="page-content">
            <div class="welcome-banner">
              <div class="row">
                <div class="col-lg-7 col-md-12">
                  <div class="d-flex align-items-center">
                    <div class="user-info">
                      <img src="images/img1.png" alt="" class="profile-img">
                    </div>
                    <div class="user-text ml-3">
                      <h3>Hello, <?php echo $_SESSION['sessionUser']; //display name of user on page ?></h3>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="container">
              <div class="row mt-5">
                <div class="col-lg-6 col-sm-6">
                  <div class="mat-card">
                    <div class="dash-card bg-danger">
                      <i class= "fa fa-calendar fa-3x"></i>
                      <h4>Rs<?php
                        $id = $_SESSION['sessionId']; //get userId
                        //$query below is a sql query to select total sum of expense for current month based on userId
                        $query = "SELECT SUM(cost) FROM expense WHERE month(expenseDate) = month(current_date()) AND userId = $id";//sql query
                        $data  = mysqli_query($conn, $query); // to perform query on mysql
                        $result = mysqli_fetch_assoc($data); // to save data in an array
                        echo " " .$result["SUM(cost)"]; // to display total of expense for current month on page
                        ?></h4>
                        <p>Current Expense This Month</p>
                    </div>
                  </div>

                </div>
                <div class="col-lg-6 col-sm-6">
                  <div class="mat-card">
                    <div class="dash-card bg-primary">
                      <i class= "fa fa-calendar fa-3x"></i>
                        <h4>Rs<?php
                          $id = $_SESSION['sessionId']; // fetch userId
                          //$query below to get total income for current month based on userId
                          $query = "SELECT SUM(money) FROM income WHERE month(incomeDate) = month(current_date()) AND userId = $id"; //sql query - total income for current month
                          $data  = mysqli_query($conn, $query); // query is performed on table in database
                          $result = mysqli_fetch_assoc($data); // data is stored in an array
                          echo " " .$result["SUM(money)"]; // data gets display - total income for current month
                          ?></h4>
                          <p>Current Income for this month</p>
                    </div>
                  </div>

                </div>
            </div>
              <div class= "row mt-5">
                <div class="col-lg-6 col-sm-6">
                  <div class="mat-card">
                    <div class="dash-card bg-info">
                      <i class= "fa fa-money fa-3x"></i>
                      <h4>Rs<?php
                      $id = $_SESSION['sessionId'];
                        //$query below to get total expense for that particular user
                      $query = "SELECT SUM(cost) FROM expense WHERE userId = $id";
                      $data  = mysqli_query($conn, $query); // query is performed on table in database
                      $result = mysqli_fetch_assoc($data); //data is stored in an array
                      $expense = $result["SUM(cost)"]; // data assigned to a variable $expense
                      echo " " .$expense; // data gets displayed
                      ?></h4>
                      <p>Your Total Expense</p>
                    </div>
                  </div>

                </div>
                <div class="col-lg-6 col-sm-6">
                  <div class="mat-card">
                    <div class="dash-card bg-success">
                      <i class= "fa fa-money fa-3x"></i>
                      <h4><?php
                       $id = $_SESSION['sessionId'];
                       //to get total income for that particular user
                       $query = "SELECT SUM(money) FROM income WHERE userId = $id"; //sql query
                       $data  = mysqli_query($conn, $query); // sql query performed on database
                       $result = mysqli_fetch_assoc($data); // data is stored in an array
                       $income = $result["SUM(money)"]; // data assigned to variable $income
                       $balance = $income - $expense; // balance is obtained n=by subtracting $expense from $income
                       echo " " .$balance; // $balance is displayed
                       ?></h4>
                       <p>Your Current Total Balance</p>
                    </div>
                  </div>
                </div>
              </div>
            <?php // Section below to show a chart of income vs expense ?>
              <div class="row mt-5">
                <div class="col-lg-12 col-sm-12">
                  <div class="container">
                    <div class="card-header bg-danger">
                      Expense Vs Income This month
                    </div>
                    <div class="container">
                      <div class="chart-container" style="position: relative; height:40vh; width:30vw">
                         <canvas id="myChart"></canvas> <?php //pie chart is display here  ?>
                      </div>
                    </div>
                      <?php
                          //sql query to select total  of expense for current month
                          $query1 = "SELECT SUM(cost) FROM expense WHERE month(expenseDate) = month(current_date) AND  userId = $id";
                          $data1 = mysqli_query($conn, $query1); // sql query is performed on database to get total expense
                          //sql query to select total  of income for current month
                          $query2 = "SELECT SUM(money) FROM income WHERE month(incomeDate) = month(current_date) AND  userId = $id";
                          $data2  = mysqli_query($conn, $query2); // sql query is performed on database to get total income
                          $result1 = mysqli_fetch_assoc($data1); // data fetched from $query1 is stored in an array
                          $result2 = mysqli_fetch_assoc($data2);// data fetched from $query2 is stored in an array
                          $json1= ['expense','income']; // fisrt array to be linked to pie chart
                          $json2= [(int)$result1['SUM(cost)'], (int)$result2['SUM(money)']]; // second array to be linked to pie chart
                      ?>
                      <?php //script below from chart js to be able to display pie chart ?>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" ></script>
                      <script type="text/javascript">
                      var ctx = document.getElementById('myChart').getContext('2d');
                      var chart = new Chart(ctx, {
                          // The type of chart we want to create
                          type: 'pie',

                          // The data for our dataset
                          data: {
                              labels: <?php echo json_encode($json1);  ?>,
                              datasets: [{
                                  label: "Expense Amount Per item",
                                  backgroundColor: 'rgb(255, 99, 132)',
                                  borderColor: 'blue',
                                  data: <?php echo json_encode($json2);  ?>,
                              }]
                          },

                          // Configuration options go here
                          options: {}
                      });

                      </script>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>



  <?php //cdn from bootstrap 4?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  </body>
</html>
