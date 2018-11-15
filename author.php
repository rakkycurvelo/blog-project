<?php //including the header - same proposal expaned on my index file
include ('includes/header.php'); ?>

 <title> Rakky Blog - Authors </title>
 </head>

 <?php include ('includes/nav-bar.php'); ?>

<?php
	//This is the page that will holds all my author profile and the author filter page

	//Create DB Object
	$db = new Database();

	//Check URL For author
	if(isset($_GET['author'])){
		$author = $_GET['author'];
		//Create Query to pick blog post of a particular author from the blog post table to display in the posts section of this page
		$query = "SELECT * FROM rakky_posts WHERE author = '".$author."'";
		//Run query by select function and assign var posts
		$posts = $db->select($query);
		}

		//Create Query - this is to pick info from the author table to display in the author section of this page - the author's name is a string
		$query = "SELECT * FROM rakky_authors WHERE author = '".$author."'";
		//Run query by select function and assign var author
		$author = $db->select($query)->fetch_assoc();

		//Create select query to get info from categories table - this is for the footer categories
		$query = "SELECT * FROM rakky_categories";
		//Run query by select function and assign var categories
		$categories = $db->select($query);

?>
<!--if the $author variable successfuly run, create a loop to echo authors data to the screen !-->
<?php if($author) : ?>
	<div class="author">
		<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $author['author']; ?></h2>
            <div class="author"> <img src="<?php echo $author['photo'];?>" width="300"> </div>
            <p class="blog-post-meta"><?php echo ($author['profile']); ?></p>
          </div><!-- /author-infor -->
<!--echo a message if there is no author in the author_profile table !-->
<?php else : ?>
	<h2 class="blog-post-title"> ♪♫ I just got looooosssttttt!!! </h2>
	<br>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/Pkgeai985rA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br>
<p class="blog-post-meta"> ♪♫ Every table that I tried to query (wasn't there!) ... <br>
Every variable I ever tried wasn't fetching... <br>
<em> (okay, the lyric is not like that, but you got the feeling, right?) </em> <br>
Oh and I'm just waiting 'til the shine wears off... <br>
(Yeah, sorry, there's nothing for you here... ) Click <a href="index.php"> here </a> to come back to the home page! </p>

<?php endif; ?>
	</div>

	<div class="p-3">
		<h4 class="font-italic">♪♫ Posts from <?php echo $author['author']; ?> ♪♫ </h4>

<!--if the $post variable successfuly run, create a loop to echo blog posts data to the screen !-->
<!--using format date and shortentext functions to make it easier for users to read data !-->
<?php if($posts) : ?>
	<?php while($row = $posts->fetch_assoc()) : ?>
		<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
				<?php echo shortenText($row['body']); ?>
           <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
          </div><!-- /.blog-post -->
	<?php endwhile; ?>
<!--echo a message if author have no post !-->
<?php else : ?>
	<p>There are no posts yet</p>
<?php endif; ?>
</div>

<?php //including the footer - same proposal expaned on my index file
include ('includes/footer.php');?>
