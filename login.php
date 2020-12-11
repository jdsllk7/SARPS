<?php
include_once 'db/connect.php';
if (isset($_COOKIE["userId"])) {
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARPS | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">

    <!-- /.login-logo -->
    <div class="card">
      <h4 class="text-center pt-4 mb-0 pb-0">
        <a><b>Login to</b> <br> <br> Results Publication System</a>
      </h4>
      <div class="card-body login-card-body">
        <p class="text-center m-0 p-0 feedbackMsg"></p>
        <form id="loginForm">
          <label for="userNumber">User ID</label>
          <div class="input-group mb-3">
            <input name="userNumber" type="number" class="form-control" placeholder="Enter User ID">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-badge"></span>
              </div>
            </div>
          </div>
          <label for="userNumber">Password</label>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Enter password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12 mt-3">
              <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <?php include_once "footer.php"; ?>

</body>

</html>