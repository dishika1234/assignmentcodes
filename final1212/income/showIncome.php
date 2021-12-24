<?php
   require_once "common3.php";  //vertical navigation bar
 ?>
    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="row">
          <div class="col-sm-12 col-lg-12">
            <div class="container">
              <h1 class="text-center m-5">Income</h1>
              <?php //table below to display income table based on user id ?>
              <div class="table-responsive mt-5">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="bg-dark text-white">
                    <th scope="col">Date</th>
                    <th scope="col">Income Type</th>
                    <th scope="col">Money</th>
                    <th scope="col" colspan="2">Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once "../includes/database.php";  //connect to the database
                      $id = $_SESSION['sessionId'];  // to get user id
                      $query = "SELECT * FROM income WHERE userID = $id"; //sql query to select data from income table based on user id
                      $data = mysqli_query($conn, $query); // sql query is performed on database
                      $total = mysqli_num_rows($data); // number of rows of result from sql query is determined
                      if($total!= 0){ // if number of rows of assigned to $total is not equal to zero
                        $id = $_SESSION['sessionId'];
                        while($result = mysqli_fetch_assoc($data)){
                          $result["id"];
                          echo "
                             <tr>
                              <td>".$result["incomeDate"]."</td>
                              <td>".$result["type"]."</td>
                              <td>".$result["money"]."</td>

                              <td><a href = 'delete1.php?id=$result[id]' onclick ='return checkDelete()'>Delete</a></td>

                              ";
                      }
                      }else{
                        echo "No records found!"; // if number of rows of result assigned to $total is zero
                       }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src ="../js/delete.js"></script>  <?php // to alert user if they really want to delete the record?>

  </body>
</html>
