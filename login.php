<?php

require_once dirname(__FILE__) . "/connections/database.php";
require_once dirname(__FILE__) . "/functions/login.php";
require_once dirname(__FILE__) . "/functions/check.php";

if (isset($_POST['login']))
  login();

if (check())
  header('location: index.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pesawat - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <style>
    body {
      background: url(img/airbus.jpg);
      background-size: cover;
      background-repeat: no-repeat;
    }

    .card {
      background: rgb(0, 0, 0, 0.3);
    }
  </style>
</head>

<body class="">


  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Alert Messages -->
          <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= $_SESSION['success'] ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php unset($_SESSION['success']); ?>
          <?php endif; ?>

          <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= $_SESSION['error'] ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php unset($_SESSION['error']); ?>
          <?php endif; ?>
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-white mb-4">Welcome Back!</h1>
            </div>
            <form method="POST" class="user">
              <div class="form-group">
                <input name="username" type="text" class="form-control form-control-user" id="exampleInputUsername"
                  aria-describedby="UsernameHelp" placeholder="Enter Username Address...">
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword"
                  placeholder="Password">
              </div>
              <!-- <div class="form-group">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="customCheck">
                  <label class="custom-control-label text-white" for="customCheck">Remember Me</label>
                </div> -->
              <!-- </div> -->
              <button name="login" class="btn btn-primary btn-user btn-block">
                Login
              </button>
              <a href="register.php" type="daftar" class="btn btn-secondary btn-user btn-block">
                Daftar
              </a>

              <!-- <hr> -->
            </form>
            <!-- <hr> -->
            <!-- <div class="text-center">
              <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="register.html">Create an Account!</a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>