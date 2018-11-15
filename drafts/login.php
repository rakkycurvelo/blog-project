<?php
//This page process the login form submission.
// Here, I used Larry Ullman PHP and MySQL book as a reference and this lesson starts at page 383 (5th edition, 2018)

//Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //Now I need to include my helper files:
  require ('includes/login_functions.inc.php');

  //Check the login:
  list ($check, $data) = check_login($con, $_POST['email'], $_POST['password']);

  if ($check) { //If everything is ok!
    //Set the session data:
    session_start();
    $_SESSION['id'] = $data['id'];
    $_SESSION['name'] = $data['name'];

    //store the HTTP_USER_AGENT (This I'll make my section more secure,
    //adding some 32-character hexadecimal string / hash based on a value - in theory, no 2 strings will have the same sha1() result)
    $_SESSION['agent'] = sha1 ($_SERVER['HTTP_USER_AGENT']);

    //redirect
    redirect_user('loggedin.php');

  } else { //Something is wrong
    //Assign $data to $errors for login_page.inc.php:
    $errors = $data;
  }

  mysqli_close($con); //cole the database connection

} //End of the main submit conditional

//Create the page:
include ('includes/login_page.inc.php');
?>
