<!-- This page will hold the functions to allow my register user to add categories on the blog -->

<?php //including the header - same proposal expaned on my index file
 include ('includes/header.php'); ?>
<?php
	//Create DB Object
	$db = new Database();

	if(isset($_POST['submit'])){
		//Assign Vars
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		//check if everything is ok
		if($name == ''){
			//Set Error
			$error = '♪ You must fill out all required fields... ♫  ';
		} else {
			$query = "INSERT INTO rakky_categories (name) VALUES('$name')";

			$update_row = $db->update($query);
		}
	}
?>
<!-- HTML form -->
<form role="form" method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-info" value="Submit" />
  <a href="index.php" class="btn btn-warning">Cancel</a>
  </div>
  <br>
</form>
<?php //including the footer - same proposal expaned on my index file
include ('includes/footer.php');?>
