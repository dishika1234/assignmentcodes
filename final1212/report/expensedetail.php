<?php
  require_once "common4.php"; // vertical navigation bar
 ?>
    <div class="page-content-wrapper">
      <div class="page-content">
       <div class= "container">
          <h1 class="my-5">Expense Detail</h1>
          <?php //form below to ask user to input time period for viewing expense report in detail ?>
          <form action = "report3.php" method = "post" onsubmit = "return validate()">
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

    <script src ="../js/date.js"></script>
  </body>
</html>
