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
				$table = "CREATE TABLE reservation (GuestID INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(GuestID),
				RmID INT NOT NULL,CheckIN DATE NOT NULL, CheckOUT INT NOT NULL)";
			if (mysqli_query($conn,$table)) {
				echo "No table existed so one was created.";
			} else{
				if(isset($_POST["submit"])){
					$inputName = $_SESSION['user_name'];
					$sql="INSERT INTO reservation (GuestID,CheckIN,CheckOUT) VALUES ('$_SESSION[user_name]','$_POST[CheckIN]','$_POST[CheckOUT]')";
					if (!mysqli_query($conn,$sql)){
						echo('Error: ' . mysqli_error($conn));
					}
				}
			 }
			 }
			 
		?>

		<form name= "exampleform"  method="post">
		Check In Date: <input type= "text" name="CheckIN" size="25">
        <br />
        Check Out Date: <input type= "text" name="CheckOUT">
        <br />
		<input type = "submit" value = "Enter into System" name = "submit">
		</form>
        
        
        
		<br />
		
			
	<?php
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
	
	echo "Your currently booked rooms: <br/>";
	$user = $_SESSION['user_name'];
	$result = mysqli_query($conn,"SELECT * FROM reservation WHERE UserName = '$user'");
	mysqli_error($conn);
	$classCount = 0;
	$gpaCount = 0;
	while($row = mysqli_fetch_array($result))
	  {
		  echo $row['ClassName'] . " with a grade of " . $row['GPA'];
		  echo "<br>";
		  $classCount++;
		  $gpaCount += $row['GPA'];
	  }
	if($classCount != 0){
		$cumGPA = ($gpaCount / $classCount);
		echo "<br>";  
		echo "You have a Cumulative GPA of: " . $cumGPA;;
	}else{
		echo "No classes entered.";
	}
	
	?>
</div>


<div>
<br />
<br />
    <a href="index.php?logout">Logout</a>
</div>