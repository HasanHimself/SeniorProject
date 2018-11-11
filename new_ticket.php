<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpw = "";
	$dbname = "senior_project";
	$db = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
	if(mysqli_connect_errno())	
	{
		printf("Couldn't connect to the database: %s\n", mysqli_connect_error($db));
		exit();
	}

	if(isset($_POST['submit']))
	{
		$serviceId = $_POST['service'];
		if(!empty($serviceId))
		{
			
			$query = "SELECT * FROM parameters WHERE serviceId = '$serviceId'";
			$result = mysqli_fetch_assoc(mysqli_query($db, $query));
			$currentTicket = $result['currentTicket'];
			$lastTicket = $result['lastTicket'];
			$number = $lastTicket + 1;
			mysqli_query($db, "UPDATE parameters SET lastTicket=lastTicket+1 WHERE serviceId = '$serviceId'");
			$userId = $_SESSION['id'];
			date_default_timezone_set('Asia/Riyadh');
			$today = date("Y-m-d");
			$startTime = date("h:i:s", strtotime("now"));
			$timeLeft = $result['estimatedTime'] * ($lastTicket - $currentTicket) / $result['countNum'];
			$query = "INSERT INTO ticket(userId, serviceId, number, date, startTime, timeLeft) VALUES('$userId', '$serviceId','$number', '$today', '$startTime', '$timeLeft')";
			if(!mysqli_query($db, $query))
			{
				echo mysqli_error($db);
			}
			else
			{
				header('location: /proj');
			}
		}
	}
 ?>