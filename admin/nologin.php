<!-- This is the redirection page for the users that aren't logged in, if someone tries to get inside the blog admin using the address bar.
This helps me to keep my admin page secure -->

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

    <title> No Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/custom.css" rel="stylesheet">
    <!-- Ckeditor Script-->
    <script src="../js/ckeditor_document/ckeditor.js"></script>
  </head>

  <body>
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="logo"> <img src="../images/logo.png" width="200" height="50"> </div>
		    <h2>Create an account or Login </h2>
        <div class="navbar-expand-sm">
          <nav>
          <p align="right">Do you have an account? </p>
          <a class="p-2 text-muted" href="../login.php">Login</a>
          <a class="p-2 text-muted" href="../register.php">Register </a>
          </nav>
<?php
          //Create DB Object (Here, I'm creating and calling the class that is created on my config folder)
        	$db = new Database();

          //Create Query (that variable will manage all the data that is inside my database,
        	//calling them from the newest to the lastest post)
        	$query = "SELECT * FROM rakky_posts ORDER BY id DESC";

        	//Run Query
        	$posts = $db->select($query);
          //Create Query
        	$query = "SELECT * FROM rakky_categories";
        	//Run Query
        	$categories = $db->select($query);
        ?>

</header>

  <div class="row">
    <div class="col-md-8 blog-main">
      		<div class="blog-post">
            <h2 class="blog-post-title"> ♪♫ Listen... (uuuuhhhh-aaaaaahhhhh-uuuuuhhhhhhh) ♪♫ </h2>
            <p class="blog-post-meta"> Do you want to know a secreeeeetttt????/ (uuuuhhhh-aaaaaahhhhh-uuuuuhhhhhhh) </p>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/3T7iFfkX_nA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

              <p class="blog-post-meta"> You need to have an account to access the admin page. <br>
                 Login or create your account using the links above or click <a class="p-2 text-muted" href="../index.php">here</a> to go back to the homepage.  </p>

          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">♪♫ About ♪♫ </h4>
            <p class="mb-0"> <?php echo $site_description ?> </p>
          </div>

          <div class="p-3">
            <h4 class="font-italic">♪♫ Categories ♪♫ </h4>

              <?php if($categories) : ?>
              <ol class="list-unstyled">
				      <?php while($row = $categories->fetch_assoc()) : ?>
				    	<li><a href="../posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
				      <?php endwhile; ?>
            </ol>
			      <?php else : ?>
				    <p>There are no categories yet</p>
			      <?php endif; ?>

           </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">♪♫ Rakky Elsewhere... ♪♫ </h4>
            <ol class="list-unstyled">
              <li><a href="https://github.com/rakkycurvelo" target="_blank">GitHub</a></li>
              <li><a href="https://twitter.com/rakky_curvelo" target="_blank">Twitter</a></li>
              <li><a href="https://www.facebook.com/rakky.curvelo" target="_blank">Facebook</a></li>
              <li><a href="https://www.linkedin.com/in/rakkycurvelo/" target="_blank">LinkedIn</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->
      </div><!-- /.row -->


<?php
//inserting my footer - with this file I only need to have one footer in my site,
//that will be the same for all of my pages, which makes the edition process easier

include ('includes/footer.php'); ?>
