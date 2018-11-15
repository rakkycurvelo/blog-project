<?php
//This page let the user logout
// Here, I used Larry Ullman PHP and MySQL book as a reference and this lesson starts at page 383 (5th edition, 2018)

/* session_start(); //Acess the existing session
//if no session variable exists, redirect the user:
   if(isset($_SESSION['id'])) {
     //need the functions:
     require('includes/login_functions.inc.php');
     redirect_user();
   } else { //cancel the session
     $SESSION = []; //Clear the variables
     session_destroy(); //destroy the session itself
     setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0); //Destroy the cookie.
   }

   //Set the page title and include the header:
   $page_title = 'Logged Out!';
   include('includes/header.php');

   //Print a customized message:
   echo "<h1> Logged Out! </h1>
   <p> You are now logged out!</p>";
   include('includes/footer.php');  */


   session_start();
   if(isset($_SESSION['id'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    header("Location: index.php");
   } else {
    header("Location: index.php");
   }


?>
