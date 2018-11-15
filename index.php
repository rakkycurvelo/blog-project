
<?php
//inserting my header - with this file and that connection I only need to have one header in my site,
//that will be the same for all of my pages, which makes the edition process easier
include ('includes/header.php');
?>

<title>Rakky Blog | Home </title>
</head>

<?php

include ('includes/nav-bar.php');
?>
<?php

	//Create DB Object (Here, I'm creating and calling the class that is created on my config folder)
	$db = new Database();

	//Create Query (that variable will manage all the data that is inside my database,
	//calling them from the newest to the lastest post)
	$query = "SELECT * FROM rakky_posts ORDER BY rakky_posts.date DESC";

	//Run Query
	$posts = $db->select($query);

	//Create Query
	$query = "SELECT * FROM rakky_categories";
	//Run Query
	$categories = $db->select($query);

?>
  <div class="row">
    <div class="col-md-8 blog-main">
      <?php if($posts) :
				//The functions used here and all over my project(formatData and shortenText)
				//are defined on my "format_helper" archive, inside the "helpers" foder ?>
      	<?php while($row = $posts->fetch_assoc()) : ?>
      		<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by
            <a href="author.php?author=<?php echo $row['author']; ?>"><?php echo $row['author']; ?></a>
				</p>
      			<?php echo shortenText($row['body']); ?>
            <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
          </div><!-- /.blog-post -->
	<?php endwhile; ?>

<?php else : ?>
	<p>There are no posts yet</p>
<?php endif; ?>

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
