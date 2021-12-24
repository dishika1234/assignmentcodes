<?php
  require_once "includes/homepage.php";
  require_once "includes/database.php";

?>

<?php // Login Form ?>
    <section class= "create my-5">
      <div class = "container">
        <div class = "text-center">
          <h1 data-aos="fade-up" data-aos-offset="200">Your Expense Tracker</h1>

         </div>
         <div class="row">
           <div class="col-sm-12 col-md-4 col-lg-4 col-12"></div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-12">
               <p >Login</p>
               <form action="includes/login_inc.php" method="post" onsubmit =  "return validate()">
                 <div class="mb-3">
                   <label for="formGroupExampleInput2" class="form-label"><i class="fa fa-user fa-lg"></i></label>
                   <input type="text" class="form-control" name="fullname" id="fullname" placeholder="User Name">
                 </div>
                 <div class="mb-3">
                   <label for="formGroupExampleInput2" class="form-label"><i class="fa fa-lock fa-lg"></i></label>
                     <input type="password" class="form-control" name ="password" id="password" placeholder="Password">
                 </div>
                 <div class="mb-3">
                   <button type = "submit" class="btn btn-primary" name="submit">Login</button>
                 </div>
               </form>
               <p>No account yet?<a href="register.php">Register</a></P>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-12"></div>
         </div>
      </div>
    </section>


  </body>
</html>










 <script src ="js/validation1.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
