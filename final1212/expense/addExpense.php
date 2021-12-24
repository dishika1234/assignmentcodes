<?php
  // to add database connection

  require_once "common2.php";
  require_once "../includes/database.php";
 ?>


    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="row">
          <div class="col-sm-12 col-lg-12">
             <h1 class="p-5">Expense</h1>
          </div>
        </div>
        <?php //form that allows user to record expense ?>
        <div class="row">
          <div class="col-sm-12 col-lg-12">
            <?php //return validate() function from javascript file that does not allow user to submit blank form?>
            <form action = "addExpensePhpCodes.php" method="POST" class= "ml-5" onsubmit =  "return validate()">
              <div class="form-group">
                <label for="date" class="font-weight-bold">Date of Expense</label>
                <input id="date" type="date" name="date" class="form-control"   placeholder="Enter date">
              </div>
              <div class="form-group">
                <label for="item" class="font-weight-bold">Item</label>
                <input type="text" name = "item" class="form-control" id="item" placeholder="Enter item">
              </div>
              <div class="form-group">
                <label for="cost" class="font-weight-bold">Cost of Item</label>
                <input type="number" name="cost" class="form-control" id="cost" placeholder="Enter Cost of Item">
              </div>
              <button type="submit" name = "submit" class="btn btn-primary my-5">Add</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php // to connect to javascript file from js folder to add validation ?>
    <script src ="../js/expenseValidation.js"></script>
    <?php //cdn from bootstrap 4?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    </body>
  </html>
