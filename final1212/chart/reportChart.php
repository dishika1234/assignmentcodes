<?php
  require_once "common5.php";  // vertical navigation bar
  require_once "../includes/database.php"; // connection to database
  $date1 = $_POST['date1']; // fetch date user has input into field having name date1
  $date2 = $_POST['date2']; //fetch date user has input into field having name date2
  $id = $_SESSION['sessionId']; // user id

  //$query1 to select item and cost from expense table
  $query1 = "SELECT item, SUM(cost) FROM expense WHERE expenseDate BETWEEN '$date1' AND '$date2' AND  userId = $id  GROUP BY item";
  //$data1 - $query1 is performed on database
  $data1 = mysqli_query($conn, $query1);
  //$query2 to select total cost from expense table
  $query2 = "SELECT SUM(cost) FROM expense WHERE expenseDate BETWEEN '$date1' AND '$date2' AND  userId = $id";
  //$data2 - $query2 is performed on database
  $data2 = mysqli_query($conn, $query2);
  //$query3 to select total income from income table
  $query3 = "SELECT SUM(money) FROM income WHERE incomeDate BETWEEN '$date1' AND '$date2' AND  userId = $id";
  //$data3 - $query3 is performed on database
  $data3 = mysqli_query($conn, $query3);
  $json = []; //array to store result fetched from database
  $json2= []; //array to store result fetched from database
  $result2 = mysqli_fetch_assoc($data2); // result from database stored in form of database
  $result3 = mysqli_fetch_assoc($data3); // result from database stored in form of database
  $json3= ['expense','income']; //array used in chart that shows expense vs income
  $json4= [(int)$result2['SUM(cost)'], (int)$result3['SUM(money)']]; //array used in chart that shows expense vs income
  while($result = mysqli_fetch_assoc($data1)){
    $json[] = $result['item']; //to populate array with item from expense
    $json2[] =  (int)$result['SUM(cost)']; //to populate array with cost of item from expense
    echo "<br>";
}

 ?>

    <div class="page-content-wrapper">
      <div class="page-content">
        <div class= "container">
          <h3 class="mb-5 mt-5 text-primary">From <?php echo $date1 ?> To <?php echo $date2 ?> <h3>
          <h3 class="mb-5">Expense Amount Spent per Item Bar Chart</h3>
          <canvas id="myChart" class="w-100"></canvas> <?php //chart is displayed here via these tags ?>
          <?php //connect to chartjs via cdn below?>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" ></script>
          <?php //script to make chart ?>
            <script type="text/javascript">
              var ctx = document.getElementById('myChart').getContext('2d');
              var chart = new Chart(ctx, {
              // The type of chart we want to create
              type: 'bar',
              // The data for our dataset
              data: {
                labels: <?php echo json_encode($json);  ?>,
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



      <h3 class= "p-5">Income vs Expense Pie Chart</h3>
      <div class="chart-container" style="position: relative; height:40vh; width:30vw">
         <canvas id="myChart2"></canvas>
      </div>

      <script type="text/javascript">


      var ctx = document.getElementById('myChart2').getContext('2d');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'pie',

          // The data for our dataset
          data: {
              labels: <?php echo json_encode($json3);  ?>,
              datasets: [{
                  label: "Expense Amount Per item",
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'blue',
                  data: <?php echo json_encode($json4);  ?>,
              }]
          },

          // Configuration options go here
          options: {}
      });

      </script>

     </div>



   </div>
 </div>
