<body>
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <?php //create a login / logout link:
              if (isset($_SESSION['id'])) { ?>
                <p> Hi <?php echo $_SESSION['name'] ?>! <br>Click <a class="p-2" href="admin/index.php">here </a> to go to the admin page! </p>
                <?php echo '<a class="btn btn-sm btn-outline-secondary" href="logout.php">Log Out</a><br><br>';
              }else{
                echo '<a class="btn btn-sm btn-outline-secondary" href="login.php">Login</a><br><br>';
              }
              ?>
              </div>

          <div class="logo"> <img src="images/logo.jpg" width="200"> </div>
					<div class="col-4 d-flex justify-content-end align-items-center">

            <!-- search button
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a> !-->

            <a class="btn btn-sm btn-outline-secondary" href="register.php">Register</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="index.php">Home</a>
          <a class="p-2 text-muted" href="about-a-band.php">About a Band</a>
          <a class="p-2 text-muted" href="content.php">My Content</a>
          <a class="p-2 text-muted" href="about.php">Who is Rakky?</a>
        </nav>
      </div>
