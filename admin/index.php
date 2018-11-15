<!-- This page will be my dashboard and first page that a logged user will see after login -->
<?php //including the header - same proposal expaned on my index file
 include ('includes/header.php'); ?>

<div class="row">
   <div class="col-sm-12 blog-main">
<?php if(isset($_GET['msg'])) : ?>
 <div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>
<?php endif; ?>

<?php

//Create DB Object
$db = new Database;
//Create Query (Here, I'll collect the posts and categories from my database, connecting them and making them work together)
$query = "SELECT rakky_posts.*, rakky_categories.name FROM rakky_posts INNER JOIN rakky_categories
			ON rakky_posts.category = rakky_categories.id
			ORDER BY rakky_posts.title DESC";

  //Run Query
  $posts = $db->select($query);

	//Create Query
	$query = "SELECT * FROM rakky_categories ORDER BY name DESC";
	//Run Query
	$categories = $db->select($query);
?>

<table class="table table-striped">
	<tr>
		<th>Post ID#</th>
		<th>Post Title</th>
		<th>Category</th>
		<th>Author</th>
		<th>Date</th>
	</tr>
  <?php while($row = $posts->fetch_assoc()): ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['author']; ?></td>
      <td><?php echo formatDate($row['date']); ?></td>
    </tr>
  <?php endwhile; ?>
</table>


<table class=" table table-striped">
	<tr>
		<th>Category ID#</th>
		<th>Category Name</th>
	</tr>
	<?php while($row = $categories->fetch_assoc()) : ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
			</tr>
		<?php endwhile; ?>
</table>

<?php //including the footer - same proposal expaned on my index file
include ('includes/footer.php');?>
