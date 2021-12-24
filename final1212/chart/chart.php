<?php
  require_once "common5.php";  //vertical navigation bar
 ?>


    <div class="page-content-wrapper">
      <div class="page-content">
        <div class= "container">
          <h1 class="my-5">View Charts</h1>
          <?php //user is asked to input two dates in order to view chart ?>
          <form action = "reportChart.php" method = "post">
            <div class="form-group">
              <label for="date1"><b>From</b></label>
              <input type="date" class="form-control" id="date1" name = "date1">
            </div>
            <div class="form-group">
              <label for="date2"><b>To</b></label>
              <input type="date" class="form-control" id="date2" name = "date2">
            </div>
           <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>









    </div>
  </div>
