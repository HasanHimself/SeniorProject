<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpw = "";
	$dbname = "senior_project";
	$db = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);

	$email = "";
	$password = "";
	$phone = "";
	$first_name = "";
	$last_name = "";

	if(mysqli_connect_errno())
	{
		printf("Couldn't connect to the database: %s\n", mysqli_connect_error($db));
	}

	if(isset($_POST['submit']))
	{
		if(isset($_POST['email']) && filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL))
		{
			$email = $_POST['email'];
		}
		if(isset($_POST['password']))
		{
			$password = $_POST['password'];
		}
		if(isset($_POST['phone']))
		{
			$phone = $_POST['phone'];
		}
		if(isset($_POST['first_name']))
		{
			$first_name = $_POST['first_name'];
		}
		if(isset($_POST['last_name']))
		{
			$last_name = $_POST['last_name'];
		}

		$query ="INSERT INTO user(email, password, phone, first_name, last_name) VALUES('$email', '$password', '$phone', '$first_name', '$last_name')";
		if(!mysqli_query($db, $query))
			{
				echo mysqli_error($db);

			}


	}
?>