<html>
<head>
<?php
// Load the calendar class
require('calendar/tc_calendar.php');
?>
</head>





<div>
    <p class="lead">Welcome, <?php echo $_SESSION['user_name']; ?>. </p>
    <?php
		$host  = "localhost";
		$un    = "user1";
		$pw    = "password1";
		$db    = "database";
		
			$conn = mysqli_connect($host, $un, $pw, $db);
			if ($conn -> connect_errno){
				echo "Failed to connect to MySQL: (".$conn->connect_errno.")".$conn->connect_error;
			} else{
				$table = "CREATE TABLE Reservations (RmID INT NOT NULL, 
				 GuestID INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(GuestID),
				 InDate DATE NOT NULL, 
				 OutDate DATE NOT NULL)";
				
			if (mysqli_query($conn,$table)) {
				echo "No table existed so one was created.";
			} else{
				if(isset($_POST["submit"])){
					$inputName = $_SESSION['user_name'];
					$sql="INSERT INTO Reservations (RmID, InDate, OutDate) VALUES ('$_POST[RmID]', '$_POST[InDate]','$_POST[OutDate]')";
					if (!mysqli_query($conn,$sql)){
						echo('Error: ' . mysqli_error($conn));
					}
				}
			 }
			 }
			 mysqli_close($conn);
		?>

		<form name= "exampleform"  method="post">
		Full Name: <input type= "text" name="name">
        <br />
        
        
		Check In Date: <input type= "text" name="InDate" size="25">
        <br />
        Check Out Date: <input type= "text" name="OutDate">
        <br />
        Room Number: <input type= "text" name="RmID">
        <br />
		<input type = "submit" value = "Enter into System" name = "submit">
		</form>
        
		<br />


		
			
	<?php
	
	/**
	
	function getGpa($conn,$user_name,$counter){
		$count = 0;
		$users = "SELECT DISTINCT UserName FROM reservation";
		$getUserGPA = mysqli_query($conn, $users);
		while ($row = mysqli_fetch_array($getUserGPA)){
			if ($counter == 0){
				echo $row['gpa']."<br>";	
			}
		$count +=1;
		}
	return $count;
  	}
	*/
  	
  	 
  	$conn = mysqli_connect($host, $un, $pw, $db);
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	echo "Your currently booked rooms: <br/>";
	$user = $_SESSION['user_name'];
	$res = mysqli_query($conn,"SELECT * 
							      FROM reservations");
	while($row = mysqli_fetch_array($res))
	{
		echo $row['RmID'] . " " . $row['GuestID'] . " " . $row['InDate'] . " " . $row['OutDate'] ;
		echo "<br>";
	}
	mysqli_close($conn);
	//;mysqli_error($conn);
	
	
	
	
	
//	$classCount = 0;
//	$gpaCount = 0;
//	while($row = mysqli_fetch_array($result))
//	  {
//		  echo $row['ClassName'] . " with a grade of " . $row['GPA'];
//		  echo "<br>";
//		  $classCount++;
//		  $gpaCount += $row['GPA'];
//	  }
//	if($classCount != 0){
//		$cumGPA = ($gpaCount / $classCount);
//		echo "<br>";  
//		echo "You have a Cumulative GPA of: " . $cumGPA;;
//	}else{
//		echo "No classes entered.";
//	}
	
	?>
</div>


<div>
<br />
<br />
    <a href="index.php?logout">Logout</a>
</div>

</html>
