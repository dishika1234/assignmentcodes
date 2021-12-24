<?php
  require_once 'common3.php'; // vertical navigation bar
 ?>

     <div class="page-content-wrapper">
       <div class="page-content">
         <div class="row">
           <div class="col-sm-12 col-lg-12">
             <h1 class="p-5">Income</h1>
           </div>
         </div>
         <?php // form to allow user to record income ?>
         <div class="row">
           <div class="col-sm-12 col-lg-12">
             <form action ="addIncomePhpCodes.php" method="POST" class= "ml-5" onsubmit =  "return validate()">
               <div class="form-group">
                <label for="date" class="font-weight-bold">Date of Income</label>
                <input id="date" type="date" name="date" class="form-control"   placeholder="Enter date">
               </div>
               <div class="form-group">
                <label for="item" class="font-weight-bold">Income Type</label>
                <input type="text" name = "type" class="form-control" id="type" placeholder="Enter income">
               </div>
               <div class="form-group">
                <label for="cost" class="font-weight-bold">Money</label>
                <input type="number" name="money" class="form-control" id="money" placeholder="Enter money">
               </div>
               <button type="submit" name = "submit" class="btn btn-primary my-5">Add</button>
             </form>
           </div>
         </div>
       </div>
     </div>
    <script src ="../js/incomeValidation.js"></script> <?php //js validation t prevent form from getting submitted in case user leaves empty fields  ?>
  </body>
</html>
