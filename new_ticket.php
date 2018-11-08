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
		$branchId = $_POST['branch'];
		$serviceId = $_POST['service'];
		if(!empty($branchId) && !empty($serviceId))
		{
			$userId = $_SESSION['id'];
			$currTicket = 2;
			$lastTicket = 4;
			$number = $lastTicket + 1;
			date_default_timezone_set('Asia/Riyadh');
			$startTime = date("h:i:sa", strtotime("now"));
			$endTime = date("h:i:sa", strtotime("+30 minutes"));
			$query = "INSERT INTO ticket(userId, serviceId, branchId, number, startTime, endTime) VALUES('$userId', '$serviceId', '$branchId', '$number', '$startTime', '$endTime')";
			if(!mysqli_query($db, $query))
			{
				echo mysqli_error($db);
			}
			//header('location: /');
		}
	}
 ?>