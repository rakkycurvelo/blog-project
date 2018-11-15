<?php
//including the header - same proposal expaned on my index file
include 'includes/header.php'; ?>
<title> Rakky Blog | Register </title>
</head>
<?php include ('includes/nav-bar.php'); ?>

<?php

if(isset($_SESSION['id'])) {
  header("Location: index.php");
}

//set validation error flag as false

$error = false;

//check if form is submitted and, if not, ask the user to submit its information
if (isset($_POST['signup'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

   //testing if the name has a valid format (alpha characters and spaces only)
   if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
      $error = true;
      $name_error = "♪ Your 'Name' must contain only alphabets and space ♫ ";
   }
   //testing if the email has a valid format using the PHP filter to do that so
   if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      $error = true;
      $email_error = "♪ To be register, you need to provide us a valid email address ♫ ";
   }
   //testing if the password is in a good format - more than 5 characters
   if(strlen($password) < 5) {
      $error = true;
      $password_error = "♪ To your security, your password must have at least 5 characters ♫";
   }
   //checking if password and confirming password are the same - if not, showing an error
   if($password != $cpassword) {
      $error = true;
      $cpassword_error = "♪ I don't think you put the same password on both fields... try again! ♫";
   }
   //saving the information on the database
   if (!$error) {
      if(mysqli_query($con, "INSERT INTO rakky_users(name,email,password) VALUES('" . $name . "', '" .
$email . "', '" . md5($password) . "')")) {
         $successmsg = "♪ Welcome to Rakky Blog! <a href='login.php'>Log here</a>♫ ";
      } else {
         $errormsg = "♪ I have a bad feeling about this... sorry, something is wrong, try again later! ♫  ";
        }
      }
}

?>

<!-- The code below will be used to create a form to my users to put their data and register theirselves in the site !-->


        <div class="container">
          <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
              <form role="form" action="<?php
              // I'm using HTML and PHP to create that form and it starts here...
              echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                  <legend>Register </legend>

                  <div class="form-group">
                    <label for="name"><strong> Name </strong></label>
                      <input type="text" name="name" placeholder="♪ Insert your full name ♫" required value="<?php if($error) echo $name; ?>" class="form-control">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?> </span>
                  </div>

                  <div class="form-group">
                  <label for="name"> <strong>Email </strong></label>
                    <input type="text" name="email" placeholder="♪ Insert your Email ♫" required value="<?php if($error) echo $email; ?>" class="form-control">
                      <span class="text-danger"><?php if (isset($email_error)) echo $email_error;?></span>
                  </div>

                  <div class="form-group">
                    <label for="name"><strong> Password </strong></label><br>
                      <input type="password" name="password" placeholder="♪ Choose a password ♫" requiredclass="form-control">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                  </div>

                  <div class="form-group">
                    <label for="name"><strong>Confirm Password </strong></label>
                    <input type="password" name="cpassword" placeholder="♪ Confirm your password ♫" required class="form-control">
                    <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                  </div>

                  <div class="form-group">
                    <input type="submit" name="signup" value="Register" class="btn btn-primary">
                      <a href="index.php" class="btn btn-warning">Cancel</a>
                      <div class="col-md-offset-4 well"> Already Registered? Click <a href="login.php">here </a> to Login  </div> <br>
                  </div>

                </fieldset>
              </form>

                <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            </div>
          </div>
        </div>

<?php
include_once 'includes/footer.php';
?>
