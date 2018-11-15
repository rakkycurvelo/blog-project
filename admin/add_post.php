<!-- This page will hold the functions to allow my register user to add posts on the blog -->
<?php //including the header - same proposal expaned on my index file
 include ('includes/header.php'); ?>

<?php
	//Create DB Object
	$db = new Database();
	//check if the post was submitted (if the button submit was clicked)
	if(isset($_POST['submit'])){
		//Assign values inside the fields to the values retrieved by my database table
		$title = mysqli_real_escape_string($db->link, $_POST['title']);
		$body = mysqli_real_escape_string($db->link, $_POST['body']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);
		$author = mysqli_real_escape_string($db->link, $_POST['author']);
		$tags = mysqli_real_escape_string($db->link, $_POST['tags']);

		//Check if all the fields are filled
		if($title == '' || $body == '' || $category == '' || $author == ''){
			//Set Error
			$error = ' ♪ Don\'t be lazy and put all the info that we need to create a new post! ♫  ';
		} else { //insert the information retrieved in my database table
			$query = "INSERT INTO rakky_posts (title, body, category, author, tags)
				VALUES('$title', '$body', $category, '$author', '$tags')";

			$insert_row = $db->insert($query);
		}
	}
?>
<?php
	//Create Query
	$query = "SELECT * FROM rakky_categories";
	//Run Query
	$categories = $db->select($query);

  //Create Query
  $query = "SELECT * FROM rakky_authors";
  //Run Query
  $authors = $db->select($query);

?>

<!-- HTML Form-->
<form role="form" method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label>Post Body</label>

    <textarea id="mytextarea" name="body" class="form-control" placeholder="Enter Post Body" rows="6" cols="80"></textarea>
	</div> <!--editor !-->

  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
		<?php while($row = $categories->fetch_assoc()) : ?>
			<?php if($row['id'] == $post['category']){
				$selected = 'selected';
			} else {
				$selected = '';
			}
			?>
			<option <?php echo $selected; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		<?php endwhile; ?>
	</select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <!-- Try check if it works on Clound 9
    <input name="author" class="form-control">
    <?php /* //while($row = $authors->fetch_assoc()) : ?>
      <?php //if($row['author'] == $post['author']){
        //$selected = 'selected';
      } //else {
        //$selected = '';
      }
      ?>
      <option <?php //echo $selected; ?> value="<?php //echo $row['author']; ?>"><?php //echo $row['author']; ?></option>
    <?php //endwhile;  */ ?> !-->
    <input name="author" type="text" class="form-control" placeholder="Enter Author">


  </input>
  </div>

  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
  </div>
  <div>
	<input name="submit" type="submit" class="btn btn-info" value="Submit" />
	<a href="index.php" class="btn btn-warning">Cancel</a>
  </div>
  <br>
</form>


<?php include ('includes/footer.php');?>
