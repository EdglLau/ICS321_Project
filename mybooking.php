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
            <li><a href="register.php">Register</a></li>
            <li class="active"><a href="mybooking.php">Booking</a></li>
            <li><a href="about.php">About</a></li>
            
          </ul>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Reservations</h1>
        <br>
		
        <h2 class="lead">My reservations</h2>
        
    <div class="reserve-table">   
    <?php
		$host  = "localhost";
		$un    = "user1";
		$pw    = "password1";
		$db    = "database";
		
		$conn = mysqli_connect($host, $un, $pw, $db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		//echo "Your currently booked rooms: <br/>";
		//$user = $_SESSION['user_name'];
		$res = mysqli_query($conn,"SELECT *
							      FROM reservations");

		echo "<table border='1'>
		<tr>
		<th>Room ID</th>
		<th>Guest ID</th>
    	<th>Check In</th>
    	<th>Check Out</th>
		</tr>";

		while($row = mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>" . $row['RmID'] . "</td>";
			echo "<td>" . $row['GuestID'] . "</td>";
          	echo "<td>" . $row['InDate'] . "</td>";
          	echo "<td>" . $row['OutDate'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		mysqli_close($conn);
		
		?>
		</div> 
      </div>

    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
