<!-- This is an extra page to refer to my YouTube Channel and give my site user an opportunity to get to know me better -->


<?php //including the header - same proposal expaned on my index file
 include ('includes/header.php'); ?>

 <title>About a Band </title>
 </head>

 <?php include ('includes/nav-bar.php'); ?>
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
  <div class="row">
    <div class="col-md-8 blog-main">
      		<div class="blog-post">
            <h2 class="blog-post-title"> About a Band </h2>
            <p class="blog-post-meta">
            <div class="logo"> <img src="images/mefala.jpg" width="100"> </div>
      			<p> Get to know some of my videos, talking about Brazilian and international bands.
              The channel is published on YouTube and it's called "Tell Me a Band" in free translation.
              The content is only available in Portuguese. </p>

              <iframe width="560" height="315" src="https://www.youtube.com/embed/M5BbvF3BzZs" frameborder="0"
              allow="autoplay; encrypted-media" allowfullscreen></iframe>

              <iframe width="560" height="315" src="https://www.youtube.com/embed/ONI0cxF7hpc" frameborder="0"
              allow="autoplay; encrypted-media" allowfullscreen></iframe>

              <iframe width="560" height="315" src="https://www.youtube.com/embed/-VxOT2y52IE" frameborder="0"
              allow="autoplay; encrypted-media" allowfullscreen></iframe>

              <iframe width="560" height="315" src="https://www.youtube.com/embed/2PnVuYRgdVU" frameborder="0"
              allow="autoplay; encrypted-media" allowfullscreen></iframe>

              <iframe width="560" height="315" src="https://www.youtube.com/embed/dEcXisV8M1Y" frameborder="0"
              allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
				    	<li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
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
              <li><a href="https://github.com/rakkycurvelo">GitHub</a></li>
              <li><a href="https://twitter.com/rakky_curvelo">Twitter</a></li>
              <li><a href="https://www.facebook.com/rakky.curvelo">Facebook</a></li>
              <li><a href="https://www.linkedin.com/in/rakkycurvelo/">LinkedIn</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->
      </div><!-- /.row -->


<?php //including the footer - same proposal expaned on my index file
      include ('includes/footer.php');?>
