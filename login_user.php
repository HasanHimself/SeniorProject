<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpw = "";
	$dbname = "senior_project";

	$db = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
	$errors = array();
	$error = false;

	if(isset($_POST['submit']))
	{
		if(empty($_POST['email']))
		{
			array_push($errors, "Email can't be left blank");
		}
		if(empty($_POST['password']))
		{
			array_push($errors, "Password can't be left blank");
		}
		foreach($errors as $error)
		{
			echo $error;
		}
		if(count($errors) == 0)
		{
			$email = clean_input($_POST['email']);
			$email = strtolower($email);
			$password = clean_input($_POST['password']);
			$password = md5($password);
			$query = "SELECT first_name FROM user WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($db, $query);
			$num_rows = mysqli_num_rows($result);
			if($num_rows > 0)
			{
				$_SESSION['name'] = mysqli_fetch_assoc($result)['first_name'];
				header('location: /proj');
			}
			else
			{
				array_push($errors, 'Invalid email and password');
				$error = true;
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