<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>



    <link rel="stylesheet" href="../css/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

      @font-face {
        font-family: raleway;
        src: url(Raleway-VariableFont_wght.ttf) format("truetype");
      }

    </style>


  </head>
  <body>
    <?php
      session_start();
    ?>
    <?php // creating vertical navigation bar ?>
    <div class="page-wrapper">
      <div class="sidebar-wrapper">
        <div class="sidebar" id= "sidebar">
          <div class="logo-section d-flex justify-content-center align-items-center">
            <div class="d-flex justify-content-center align-items-center">
              <img src="../images/logo.jpg" alt="logo" class="logo-icon">
                <span class="logo-text">YET</span>
            </div>
          </div>
          <div class="user-info py-3">
            <div class="d-flex flex-column justify-content-center align-items-center">
              <div>
                <img src="../images/profile.png" alt="profile" class="profile-img">
              </div>
              <div class="user-desc">
                <h5><?php echo
                $_SESSION['sessionUser'];  // Fetch user name from login_inc.php
                ?>
              </h5>
                <p><?php echo $_SESSION['sessionEmail']; //fetch user email from login_inc.php?></p>
              </div>
            </div>
          </div>
          <?php //Navigation Bar ?>
          <div class="menus px-3">
            <ul class= "nav flex-column">
              <li><a href="../dashboard.php" class= "nav-link"><i class= "fa fa-dashboard"></i>Dashboard</a></li>
              <li><a href="addExpense.php" class= "nav-link"><i class= "fa fa-plus"></i>Add Expense</a></li>
              <li><a href="../income/addIncome.php" class= "nav-link"><i class= "fa fa-plus"></i>Add Income</a></li>
              <li><a href = "showexpense.php" class= "nav-link"><i class ="fa fa-money"></i>Manage Expenses</a></li>
              <li><a href = "../income/showIncome.php" class= "nav-link"><i class ="fa fa-money"></i>Manage Income</a></li>
              <li><a href = "../report/expensevsIncome.php" class= "nav-link"><i class ="fa fa-file"></i>Expense vs Income</a></li>
              <li><a href = "../report/expensesummary.php" class= "nav-link"><i class ="fa fa-file"></i>Expense Summary</a></li>
              <li><a href = "../report/expensedetail.php" class= "nav-link"><i class ="fa fa-file"></i>Expense Detail</a></li>
              <li><a href="../chart/chart.php" class= "nav-link" class= "nav-link"><i class= "fa fa-pie-chart"></i>Charts</a></li>
              <li><a href="../logout.php" class= "nav-link" class= "nav-link"><i class= "fa fa-sign-out"></i>Log Out</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
