<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>ICS321 Hotel Reservation List</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hotel Reservation List</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="register.php">Register</a></li>
            <li><a href="mybooking.php">Booking</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Registration</h1>
        <br>
		<?php
			if (version_compare(PHP_VERSION, '5.3.7', '<')) {
 			   exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
			} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
   				 require_once("libraries/password_compatibility_library.php");
			}
			require_once("config/db.php");
			require_once("classes/Registration.php");
			
			$registration = new Registration();
			include("views/register.php");
		?>

      </div>

    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
