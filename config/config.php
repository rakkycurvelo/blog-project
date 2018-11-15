<?php

//Here, I'll define the constants of the data in my SQL and provide it to the rest of my code, using PHP constants.

define('DB_HOST','localhost');
define('DB_USER','root@localhost');
define('DB_PASS','');
define('DB_NAME','rakky_site');

//Here, I'll create a connection between my archive and my database
$con = mysqli_connect('localhost', 'root@localhost', '', 'rakky_site') or die('Error ' . mysqli_error($con));

//Here, I'll create a variable to store some information about my site, that I'll call if I need to use it at some point of the content.
$site_description = 'This is a blog application created as my Server Side Web Development and Databases course, during my Masters in Apllied Digital Media';
