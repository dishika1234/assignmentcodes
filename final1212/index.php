<?php

  // for layout
  require_once "includes/homepage.php";




 ?>

  <?php // Login form ?>
    <section class= "create my-5">
      <div class = "container">
         <div class = "text-center">
            <h1 data-aos="fade-up" data-aos-offset="200">Create an Account</h1>
         </div>
        <div class="row">
           <div class="col-sm-12 col-md-4 col-lg-4 col-12"></div>
           <div class="col-sm-12 col-md-4 col-lg-4 col-12">
             <form action="includes/register_inc.php" method="post" enctype="multipart/form-data" onsubmit = "return validate()">
               <div class="mb-3">
                 <label for="formGroupExampleInput" class="form-label"><i class="fa fa-user fa-lg"></i></label>
                 <input type="text" class="form-control" name = "fullname" id="fullname" placeholder="Full name">
               </div>
               <div class="mb-3">
                 <label for="formGroupExampleInput2" class="form-label"><i class="fa fa-envelope fa-lg"></i></label>
                 <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
               </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label"><i class="fa fa-lock fa-lg"></i></label>
                <input type="password" class="form-control" name ="password" id="password" placeholder="Password">
              </div>
              <div class="mb-3">
               <label for="formGroupExampleInput2" class="form-label"><i class="fa fa-lock fa-lg"></i></label>
               <input type="password" class="form-control" name = "confirmPass" id="confirmPass" placeholder="Repeat Password">
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Register</button>
              </div>
             </form>
             <p>Already have an account?<a href="login.php">Login</a></P>
          </div>
         <div class="col-sm-12 col-md-4 col-lg-4 col-12"></div>
         </div>
      </div>

    </section>









       <script src = "js/validation1.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   </body>
</html>
