<?php
	session_start();
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

	$errors = array();

	if(isset($_POST['submit']))
	{
		if(empty($_POST['email']))
			{
				array_push($errors, 'An email is required');
			}
		elseif(!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL))
		{
			array_push($errors, 'Invalid email');
		}
		else
			{
				$email = clean_input($_POST['email']);
				$email = strtolower($email);
			}
		if(empty($_POST['password']))
			{
				array_push($errors, 'A password is required');
			}
		else
			{
				$password = clean_input($_POST['password']);
				$password = md5($password);
			}			

		if(empty($_POST['phone']))
			{
				array_push($errors, 'A phone number is required');
			}
		elseif(strlen($_POST['phone']) != 10)
		{
			array_push($errors, 'Invalid phone number');
		}
		else
			{
				$phone = clean_input($_POST['phone']);
			}

		if(empty($_POST['first_name']))
		{
			array_push($errors, 'A first name is required');
		}
		else
		{
			$first_name = clean_input($_POST['first_name']);
		}

		if(empty($_POST['last_name']))
		{
			array_push($errors, 'A last name is required');
		}
		else
		{
			$last_name = $_POST['last_name'];
		}
		
		$result = mysqli_query($db, "SELECT * FROM user WHERE email = '$email'");

		if(!$result)
		{
			printf("Couldn't retrieve data: %s\n", mysqli_error($db));
		}

		else
		{
			$num_rows = mysqli_num_rows($result);

			if($num_rows > 0)
			{
				array_push($errors, 'Email is already taken');
			}	

			$result = mysqli_query($db, "SELECT * FROM user WHERE phone = '$phone'");
			$num_rows = mysqli_num_rows($result);

			if($num_rows > 0)
			{
				array_push($errors, 'Phone number already exists');
			}	

			foreach($errors as $error)
			{
				echo $error;
			}
			if(count($errors) == 0)
			{
				$query = "INSERT INTO user(email, password, phone, first_name, last_name) VALUES('$email', '$password', '$phone', '$first_name', '$last_name')";
				if(mysqli_query($db, $query))
				{
					$_SESSION['name'] = $name;
					header('location: /proj');
				}
				else
				{
					printf("Couldn't insert into the database: %s\n", mysqli_error($db));
				}
			}
		}

	}

	function clean_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>