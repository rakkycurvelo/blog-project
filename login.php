<?php

  if(isset($_SESSION['id'])!="") {
  header("Location: ../admin/index.php");
  exit();
}

//including the header - same proposal expaned on my index file
include 'includes/header.php'; ?>
<title> Rakky Blog | Login </title>
</head>

<?php include ('includes/nav-bar.php');


//check if form is submitted
  if (isset($_POST['login'])) {
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $password = mysqli_real_escape_string($con, $_POST['password']);
   $result = mysqli_query($con, "SELECT * FROM rakky_users WHERE email = '" . $email. "' and password
  = '" . md5($password) . "'");
   if ($row = mysqli_fetch_array($result)) {
   $_SESSION['id'] = $row['id'];
   $_SESSION['name'] = $row['name'];
   header("Location: index.php");
   } else {
   $errormsg = "Incorrect Email or Password!!!";
   }
  }
?>

      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
              <fieldset>
                <legend>Login</legend>
                  <div class="form-group">
                    <label for="name"><strong>Email</strong></label>
                    <input type="text" name="email" placeholder="♪ Insert your Email ♫" required class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="name"><strong>Password</strong> </label>
                    <input type="password" name="password" placeholder="♪ Insert your Password ♫" required class="form-control">
                  </div>

                  <div class="form-group">
                    <input type="submit" name="login" value="Login" class="btn btn-primary">
                    <a href="index.php" class="btn btn-warning">Cancel</a>
                  </div>
              </fieldset>
            </form>

            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
          </div>
        </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center"> New User? <a href="register.php">Register Here</a></div>
      </div>
    </div>

<?php
  include_once 'includes/footer.php';
?>
