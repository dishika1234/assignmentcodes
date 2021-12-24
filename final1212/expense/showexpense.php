<?php
  require_once "common2.php";  //vertical navigation bar
 ?>

    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="row">
          <div class="col-sm-12 col-lg-12">
            <div class="container">
              <div class="col-sm-12 col-lg-12">
                <h1 class="text-center m-5">Expense</h1>
                <div class="table-responsive mt-5">
                <?php //table below to show all expenses recorded ?>
                 <table class="table table-bordered table-hover table-striped">
                   <thead>
                     <tr class="bg-dark text-white">
                       <th scope="col">Date</th>
                       <th scope="col">Item</th>
                       <th scope="col">Cost</th>
                       <th scope="col" colspan="2">Operation</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php
                       $id = $_SESSION['sessionId'];
                       require_once "../includes/database.php";
                       $query = "SELECT * FROM expense WHERE userID = $id ";  //to select data that match with user id
                       $data = mysqli_query($conn, $query); // sql query is performed on database
                       $total = mysqli_num_rows($data); // number of rows of result from the sql query is determined
                         if($total!= 0){  // if number of rows of result from the sql query is greater than 0
                           while($result = mysqli_fetch_assoc($data)){ // fetch result from sql query in form of array
                             $result["id"];
                             echo "
                               <tr>
                               <td>".$result["expenseDate"]."</td>
                               <td>".$result["item"]."</td>
                               <td>".$result["cost"]."</td>
                               <td><a href = 'delete.php?id=$result[id]' onclick ='return checkDelete()'>Delete</a></td>
                               </tr>
                              ";
                           }
                           }else{
                             echo "No records found!"; // in case number of rows of result from the sql query is zero
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
    </div>
   <script src ="../js/delete.js"></script> <?php // to alert user if they really want to delete the record ?>
  </body>
</html>
