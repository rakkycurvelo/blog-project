<?php
//This page will appear only when the user is loggedin and it wil be redirected here from login.php
// Here, I used Larry Ullman PHP and MySQL book as a reference and this lesson starts at page 383 (5th edition, 2018)

session_start(); //start the session.

//if no session value is present, redirect the user / validate the HTTP_USER_AGENT

if(!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
  //need the functions:
  require('includes/login_functions.inc.php');
  redirect_user();
}

//set the page title and include the HTML header:
$page_title = 'Logged In!';
include('includes/header.php');

//print a customized message:
echo "<h1>Logged In!</h1>
<p> You are now logged in, {$_SESSION['name']}!</p>
<p> <a href=\"logout.php\">Logout</a></p>";

//include my footer
include ('includes/footer.php');
?>
