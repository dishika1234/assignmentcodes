<?php
  require_once "common4.php";


 ?>


 <div class="page-content-wrapper">
   <div class="page-content">
     <div class= "container">

          <h1 class="my-5">Expense Summary</h1>


      <form action = "report2.php" method = "post" onsubmit="return validate()">
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
