<!-- This is an extra page to refer to the original places where you can find the content used in this application  -->


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
            <h2 class="blog-post-title"> All My Site Content </h2>
            <p class="blog-post-meta">
            <a href="#"> </a><br>

            <div class="logo"> <img src="images/content.jpg" width="400"> </div>
      			<p> If you're thinking about where all this website content can be found,
              this page will help you a lot! Find below all the links that you need to get this posts and a
              lot of other good stuff, as references to older jobs that I have done! This is basically
              everything that I have done during my Masters in Applied Digital Media and also, some links in Brazilian Portuguese
            with a bit of my life before it!  </p>

              <ol class="list-unstyled">
				    	<li><a href="https://rakkywebauthoringblog.tumblr.com/"target="_blank"> Web Authoring Blog </a></li>
              <li><a href="https://rakkyvisualcommunicationblog.tumblr.com/"target="_blank"> Visual Communication Blog </a></li>
              <li><a href="https://soundcloud.com/rakky-curvelo/raquelline-curvelo-2957739-web-authoring-podcast"target="_blank"> Web Authoring Podcast </a></li>
              <li><a href="https://blogdarakky.wordpress.com/"target="_blank"> My Personal Blog (Portuguese Only)</a></li>
              <li><a href="http://skankarados.com.br/"target="_blank"> A website that I created for a fan-club (Portuguese Only)</a></li>
              <li><a href="https://vimeo.com/247794579"target="_blank"> My Documentary </a></li>


              <iframe src="https://player.vimeo.com/video/247794579" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
<p><a href="https://vimeo.com/247794579">With a Little Help From My Friends</a> from <a href="https://vimeo.com/user77136370">Rakky Curvelo</a> on <a href="https://vimeo.com">Vimeo</a>.</p>


              </ol>
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
