<?php //including the header - same proposal expaned on my index file
 include ('includes/header.php'); ?>

 <title> Rakky Blog | Posts </title>
 </head>

 <?php include ('includes/nav-bar.php'); ?>

<?php
	//Create DB Object
	$db = new Database();

	//Check URL For Category
	if(isset($_GET['category'])){
		$category = $_GET['category'];
		//Create Query
    $query = "SELECT rakky_posts.*, rakky_categories.name FROM rakky_posts INNER JOIN rakky_categories
    			ON rakky_posts.category = rakky_categories.name
    			ORDER BY rakky_posts.title DESC";

		//Run Query
		$posts = $db->select($query);
	} else {
		//Create Query
		$query = "SELECT * FROM rakky_posts ORDER BY id DESC";
		//Run Query
		$posts = $db->select($query);
	}

	//Create Query
	$query = "SELECT * FROM rakky_categories";
	//Run Query
	$categories = $db->select($query);
?>

	<?php if($posts) : ?>
		<?php while($row = $posts->fetch_assoc()) : ?>
			<div class="blog-post">
	      <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
	      <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by
	      <a href="author.php?author=<?php echo $row['author']; ?>"><?php echo $row['author']; ?></a>  <br>
				<?php echo shortenText($row['body']); ?>
	      <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
	    </div><!-- /.blog-post -->
		<?php endwhile; ?>

	<?php else : ?>
		<h2 class="blog-post-title"> ♪♫ As our U2 friends would say... ♪♫ </h2>
		<br>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/e3-5YC_oHjE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br>
<p class="blog-post-meta"> ♪♫ We stiiiiiillllllllll haven't found what you're looking for! ♪♫ (or there's nothing yet for you to see here, sorry!)
Click <a href="index.php"> here </a> to come back to the home page!
</p>

	<?php endif; ?>

<?php //including the footer - same proposal expaned on my index file
include ('includes/footer.php');?>
