<?php //including the header - same proposal expaned on my index file
 include ('includes/header.php'); ?>

 <title> Rakky Blog - Post </title>
 </head>

 <?php include ('includes/nav-bar.php') // try to put this statements after the get constant to print the title of the post on the nav bar ; ?>

<?php
	$id = $_GET['id'];

	//Create DB Object
	$db = new Database();
	//Create Query (This variable will call and store everything that is in my table of posts where the $id value is equal to
	//the value of the id, getted accordin on which post the user chooses to read)
	$query = "SELECT * FROM rakky_posts WHERE id = ".$id;
	//Run Query
	$post = $db->select($query)->fetch_assoc();

	//Create Query
	$query = "SELECT * FROM rakky_categories";
	//Run Query
	$categories = $db->select($query)->fetch_assoc();
?>

				<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
            <img src="<?php echo $post['image']; ?>" class="post_image" alt="">
            <p class="blog-post-meta"><?php echo date("F j, Y ", strtotime($post["date"])); ?>
          by <a href="posts.php?=<?php echo $post['id']; ?>"><?php echo $post['author']; ?></a> <br>

				<?php echo $post['body']; ?>
          </div><!-- /.blog-post -->

<?php //including the footer - same proposal expaned on my index file
include ('includes/footer.php');?>
