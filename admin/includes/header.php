<!-- This is my admin page header - all the pages inside the "admin" folder use this same archive as a header, thanks to a
function that I used on them to do that so -->

<?php //Starting session - this needs to be the 1st command in my page, to inicialize the sessions that I'll create below
session_start();
//those includes guarantee that other parts of my website will be part of this page and work properly
include '../config/config.php';
include '../libraries/Database.php';
include '../helpers/format_helper.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Server Side Web Assignment 2">
    <meta name="author" content="Rakky Curvelo">

    <title>Rakky Blog | Admin Area</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/custom.css" rel="stylesheet">
    <!-- Script to run my WYSIWYG Editor / I'm using tinymce -->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

    <script>
    tinymce.init({
      selector: '#mytextarea',
      theme: 'modern',

      plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor'
    ],
    });
    </script>

  </head>

  <body>
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="logo"> <img src="../images/logo.jpg" width="200"> </div>
		    <h2>Admin Area</h2>
        <div class="navbar-expand-sm">
          <nav>
            <?php if (isset($_SESSION['id'])) { ?>
            <p align="right">Signed in as <?php echo $_SESSION['name'] ?> </p>
         </nav>
         <a class="p-2 text-muted" href="../logout.php">Log Out</a>
         <a class="p-2 text-muted" href="index.php">Dashboard</a>
         <a class="p-2 text-muted" href="add_post.php">New Post</a>
         <a class="p-2 text-muted" href="add_category.php">New Category</a>
         <a class="p-2 text-muted" href="../index.php">Visit Blog</a>
       </div>

      </div>
      </div>
      <?php } else { ?>
        <nav>
          <?php //here, I'm using a new page to sent the user that's not logged in my system, a simple way to guarantee that my content will be safe.
           header("Location: nologin.php"); ?>
       </nav>

        <?php } ?>

		</header>
