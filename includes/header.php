<?php
// error_reporting(0);

$connection = mysqli_connect('localhost', 'root', '', 'Force COA');
ini_set('session.gc_maxlifetime', 1800);
session_start();
if(!$_SESSION['name']){
    header("Location: login.php");
}

$select_balance_query = mysqli_query($connection, "SELECT * FROM budget WHERE month_year = DATE_FORMAT(NOW(), '%Y-%m')");
$budget = mysqli_fetch_array($select_balance_query);
if($budget == null){
  $balance = 0;
}else{
  $balance = $budget['budget'];
}
$_SESSION['balance'] = $balance;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Force COA- Evaluation Test</title>
    <link href="assets/css/style.css" rel="stylesheet">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
    </style>

    
    <!-- Custom styles for this template -->
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">


  <!-- <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a> -->

  </button>
  <div>
  </div>
  <ul class="nav ">
          <li class="nav-item">
              <?php 

    echo "  <button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModalDefault\">
    Balance: ".$_SESSION['balance']."Frw
    </button>";

  ?>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="categories.php">
              <span data-feather="list"></span>
              Categories
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="accounts.php">
              <span data-feather="credit-card"></span>
              Accounts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transaction.php">
              <span data-feather="bar-chart-2"></span>
              Transactions 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report.php">
              <span data-feather="file-text"></span>
              Generate
            </a>
          </li>
  </ul>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="signout.php">Sign out</a>
    </div>
  </div>
</header>
<div class="container-fluid">
  <div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <?php
      
      if(isset($_POST['update-budget'])){

        $balance_query = mysqli_query($connection, "SELECT * FROM budget WHERE month_year = DATE_FORMAT(NOW(), '%Y-%m')");
        $row = mysqli_fetch_array($balance_query);

        if($row == null){
          $the_budget = $_POST['budget'];
          $insert_balance_query = mysqli_query($connection, "INSERT INTO budget VALUES('', DATE_FORMAT(NOW(), '%m-%Y'), $the_budget)");

          if($insert_balance_query){
            echo"<script>
            setTimeout(function() {
            window.location.href = 'index.php';
            }, 1000);
            </script>";
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Budget Added Successfuly
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php } }else{ ?>

    <?php 
        $id = $row['id'];
        $new_budget = $row['budget'] + $_POST['budget'];
        $update_balance_query = mysqli_query($connection, "UPDATE budget SET budget = $new_budget where month_year = DATE_FORMAT(NOW(), '%Y-%m')");

        if($update_balance_query){
          echo"<script>
          setTimeout(function() {
          window.location.href = 'index.php';
          }, 2000);
          </script>";
          ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Budget Updated Successfuly
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
  <?php
        }
      }
      }
    ?>
<?php
$date = date('Y-m-d');
$theFirstday = date("d");
$monthName = date('F', strtotime($date));
if ($theFirstday == 1 && $_SESSION['balance'] == 0) {
?>
<div class="popup-overlay">
        <div class="popup-content">
           <h1>Add <?php   echo $monthName; ?> Budget</h1>
           <hr>

           <?php
            if (isset($_POST['add-budget'])) {
              $new_budget = $_POST['new-budget'];
              $add_budget_query = mysqli_query($connection, "INSERT INTO budget VALUES('', DATE_FORMAT(NOW(), '%Y-%m'), $new_budget)");
              if($add_budget_query){
                echo"<script>
                setTimeout(function() {
                window.location.href = 'index.php';
                }, 1000);
                </script>";
            }
           }
           ?>

           <form action="" method="post">
            <div class=" mb-3">
                  <label>Amount:</label>
                  <input type="number" name="new-budget" class="form-control" placeholder="10000000" required><br>
                  <input type="submit" name="add-budget" class="btn btn-primary" value="Update">

              </div>
           </form>
            <!-- <button id="close-popup">Close</button> -->
        </div>
    </div>

<?php }