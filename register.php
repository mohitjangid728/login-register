<?php
  include 'server.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign Up</h5>
            <form class="form-signin" action="register.php" method="post">
              <?php include('errors.php'); ?>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <input type="text" id="inputFirst" class="form-control" name="firstName" placeholder="First Name" required autofocus>
                    <label for="inputFirst">First Name</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <input type="text" id="inputLast" class="form-control" name="lastName" placeholder="Last Name" required autofocus>
                    <label for="inputLast">Last Name</label>
                  </div>
                </div>
              </div>
              <div class="form-label-group">
                <input type="text" id="inputUser" class="form-control" name="userName" placeholder="Username" required autofocus>
                <label for="inputUser">Username</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="reg_user" type="submit">Sign in</button>
              <br>
              <center>
              <label>Already a Member?</label><a href="login.php"> Sign In</a>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js" type="text/javascript"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  
</body>
</html>