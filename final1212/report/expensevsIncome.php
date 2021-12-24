<?php
  require_once "common4.php"; //vertical navigation bar

?>


    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="row">
          <div class="col-sm-12 col-lg-12">
            <h1 class="p-5">Monthwise Expense vs Income Report</h1>
          </div>
        </div>
        <div class="row">
          <?php //form below to enable user to neter first date of month for which for they want to see report ?>
          <div class="col-lg-12 col-sm-12">
            <form action = "report1.php" method = "POST">
              <div class="form-group">
                <label for="date1" class="font-weight-bold">Enter First Date of the month</label>
                <input type="date" name = "date1" class="form-control" id="date1">
             </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
